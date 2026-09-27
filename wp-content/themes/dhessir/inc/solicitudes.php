<?php
/**
 * Formulario de agendamiento: guarda cada solicitud como contenido privado
 * visible en el panel (menú "Solicitudes").
 */

defined( 'ABSPATH' ) || exit;

const DH_PUNTOS = array(
	'hv'         => 'Mi hoja de vida no pasa los filtros',
	'entrevista' => 'Llego a la entrevista y me quedo ahí',
	'ruta'       => 'No sé para qué debería estar aplicando',
	'otro'       => 'Todavía no lo tengo claro',
);

add_action( 'init', function () {
	register_post_type(
		'dh_solicitud',
		array(
			'labels'              => array(
				'name'          => 'Solicitudes',
				'singular_name' => 'Solicitud',
				'menu_name'     => 'Solicitudes',
				'all_items'     => 'Todas las solicitudes',
				'edit_item'     => 'Ver solicitud',
				'search_items'  => 'Buscar solicitudes',
				'not_found'     => 'Todavía no hay solicitudes.',
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-calendar-alt',
			'menu_position'       => 25,
			'supports'            => array( 'title' ),
			'capability_type'     => 'post',
			'capabilities'        => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'        => true,
			'exclude_from_search' => true,
		)
	);
} );

/* Columnas del listado en el panel */
add_filter(
	'manage_dh_solicitud_posts_columns',
	fn () => array(
		'cb'       => '<input type="checkbox" />',
		'title'    => 'Nombre',
		'correo'   => 'Correo',
		'whatsapp' => 'WhatsApp',
		'punto'    => 'Dónde se está quedando',
		'date'     => 'Fecha',
	)
);
add_action(
	'manage_dh_solicitud_posts_custom_column',
	function ( string $columna, int $id ) {
		$valor = get_post_meta( $id, '_dh_' . $columna, true );
		if ( 'punto' === $columna ) {
			$valor = DH_PUNTOS[ $valor ] ?? $valor;
		}
		echo esc_html( $valor );
	},
	10,
	2
);

/* Datos de la solicitud dentro de la pantalla de edición */
add_action( 'add_meta_boxes_dh_solicitud', function () {
	add_meta_box(
		'dh_datos',
		'Datos de la solicitud',
		function ( WP_Post $post ) {
			$campos = array(
				'correo'          => 'Correo',
				'whatsapp'        => 'WhatsApp',
				'punto'           => 'Dónde se está quedando',
				'consentimiento'  => 'Autorizó el tratamiento de datos',
			);
			echo '<table class="form-table"><tbody>';
			foreach ( $campos as $clave => $etiqueta ) {
				$valor = get_post_meta( $post->ID, '_dh_' . $clave, true );
				if ( 'punto' === $clave ) {
					$valor = DH_PUNTOS[ $valor ] ?? $valor;
				}
				printf( '<tr><th>%s</th><td>%s</td></tr>', esc_html( $etiqueta ), esc_html( $valor ) );
			}
			echo '</tbody></table>';
		},
		'dh_solicitud',
		'normal',
		'high'
	);
} );

/**
 * Valida los datos del formulario.
 *
 * @return array{0: array<string, string>, 1: array<string, string>} [datos limpios, errores]
 */
function dh_validar_solicitud( array $entrada ): array {
	$datos = array(
		'nombre'   => sanitize_text_field( wp_unslash( $entrada['nombre'] ?? '' ) ),
		'correo'   => sanitize_email( wp_unslash( $entrada['correo'] ?? '' ) ),
		'whatsapp' => sanitize_text_field( wp_unslash( $entrada['whatsapp'] ?? '' ) ),
		'punto'    => sanitize_key( $entrada['punto'] ?? '' ),
	);
	$errores = array();

	$largo = mb_strlen( $datos['nombre'] );
	if ( $largo < 3 ) {
		$errores['nombre'] = 'Escribe tu nombre completo.';
	} elseif ( $largo > 120 ) {
		$errores['nombre'] = 'El nombre no puede tener más de 120 caracteres.';
	}

	if ( '' === trim( (string) ( $entrada['correo'] ?? '' ) ) ) {
		$errores['correo'] = 'Escribe tu correo electrónico.';
	} elseif ( ! is_email( $datos['correo'] ) || mb_strlen( $datos['correo'] ) > 160 ) {
		$errores['correo'] = 'Escribe un correo válido, por ejemplo tucorreo@ejemplo.com.';
	}

	if ( '' === $datos['whatsapp'] ) {
		$errores['whatsapp'] = 'Escribe tu número de WhatsApp.';
	} elseif ( ! preg_match( '/^\+?[0-9\s\-()]{7,20}$/', $datos['whatsapp'] ) ) {
		$errores['whatsapp'] = 'Escribe solo números, por ejemplo +57 315 000 0000.';
	}

	if ( '' === $datos['punto'] ) {
		$errores['punto'] = 'Elige en qué punto te estás quedando.';
	} elseif ( ! isset( DH_PUNTOS[ $datos['punto'] ] ) ) {
		$errores['punto'] = 'Elige una de las opciones de la lista.';
	}

	if ( empty( $entrada['consentimiento'] ) ) {
		$errores['consentimiento'] = 'Necesitamos tu autorización para tratar tus datos y contactarte.';
	}

	return array( $datos, $errores );
}

function dh_recibir_solicitud(): void {
	// Solo se vuelve a páginas propias que contienen el formulario
	$volver = ( isset( $_POST['origen'] ) && 'contacto' === $_POST['origen'] ) ? dh_url( 'contacto' ) : dh_url( 'inicio' );
	$ir     = function ( array $args ) use ( $volver ): never {
		wp_safe_redirect( add_query_arg( $args, $volver ) . '#agenda' );
		exit;
	};

	if ( ! isset( $_POST['_dh_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['_dh_nonce'] ), 'dh_solicitud' ) ) {
		wp_die( 'La sesión del formulario expiró. Vuelve a la página e inténtalo de nuevo.', 'Formulario expirado', array( 'response' => 403, 'back_link' => true ) );
	}

	// Campo trampa: si viene lleno es un bot. Respondemos como si todo saliera bien.
	if ( ! empty( $_POST['sitio_web'] ) ) {
		$ir( array( 'enviado' => 1 ) );
	}

	// Máximo 5 envíos por minuto desde una misma IP
	$ip_hash = 'dh_envios_' . md5( sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ) );
	$envios  = (int) get_transient( $ip_hash );
	if ( $envios >= 5 ) {
		wp_die( 'Hiciste demasiados envíos seguidos. Espera un minuto y vuelve a intentarlo.', 'Demasiados envíos', array( 'response' => 429, 'back_link' => true ) );
	}
	set_transient( $ip_hash, $envios + 1, MINUTE_IN_SECONDS );

	[ $datos, $errores ] = dh_validar_solicitud( $_POST );

	if ( $errores ) {
		// Errores y lo escrito se guardan 10 minutos para volver a mostrarlos en el formulario
		$clave = wp_generate_password( 12, false );
		set_transient( 'dh_form_' . $clave, array( 'errores' => $errores, 'datos' => $datos, 'consentimiento' => ! empty( $_POST['consentimiento'] ) ), 10 * MINUTE_IN_SECONDS );
		$ir( array( 'formulario' => $clave ) );
	}

	$id = wp_insert_post(
		array(
			'post_type'   => 'dh_solicitud',
			'post_status' => 'private',
			'post_title'  => $datos['nombre'],
		)
	);
	update_post_meta( $id, '_dh_correo', $datos['correo'] );
	update_post_meta( $id, '_dh_whatsapp', $datos['whatsapp'] );
	update_post_meta( $id, '_dh_punto', $datos['punto'] );
	// Fecha en que la persona autorizó el tratamiento de datos (Ley 1581 de 2012)
	update_post_meta( $id, '_dh_consentimiento', current_time( 'mysql' ) );

	$ir( array( 'enviado' => 1 ) );
}
add_action( 'admin_post_nopriv_dh_solicitud', 'dh_recibir_solicitud' );
add_action( 'admin_post_dh_solicitud', 'dh_recibir_solicitud' );

/**
 * Estado del formulario tras una redirección: errores, datos escritos y si se envió.
 *
 * @return array{errores: array<string, string>, datos: array<string, string>, consentimiento: bool, enviado: bool}
 */
function dh_estado_formulario(): array {
	$estado = array( 'errores' => array(), 'datos' => array(), 'consentimiento' => false, 'enviado' => ! empty( $_GET['enviado'] ) );
	if ( ! empty( $_GET['formulario'] ) ) {
		$guardado = get_transient( 'dh_form_' . sanitize_key( $_GET['formulario'] ) );
		if ( is_array( $guardado ) ) {
			$estado = array_merge( $estado, $guardado );
		}
	}
	return $estado;
}
