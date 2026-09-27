<?php
/**
 * Funciones de ayuda usadas por las plantillas.
 */

defined( 'ABSPATH' ) || exit;

const DH_WHATSAPP = '573159608790';
const DH_SPOTIFY  = 'https://open.spotify.com/show/033imBCQi6XugEtRFy7RKl';
const DH_SPOTIFY_SHOW_ID = '033imBCQi6XugEtRFy7RKl';

/** URL de un archivo dentro de assets/ del tema. */
function dh_asset( string $ruta ): string {
	return get_theme_file_uri( 'assets/' . $ruta );
}

/** URL de una página del sitio por su slug ('inicio' es la portada). */
function dh_url( string $slug = 'inicio', string $ancla = '' ): string {
	$url = 'inicio' === $slug ? home_url( '/' ) : home_url( '/' . $slug . '/' );
	return $url . ( $ancla ? '#' . $ancla : '' );
}

/** Enlace al formulario: en Inicio y Contacto está en la misma página. */
function dh_url_agenda(): string {
	return ( is_front_page() || is_page( 'contacto' ) ) ? '#agenda' : dh_url( 'contacto', 'agenda' );
}

/** Enlace de WhatsApp con mensaje prellenado. */
function dh_whatsapp( string $mensaje = '' ): string {
	return 'https://wa.me/' . DH_WHATSAPP . ( $mensaje ? '?text=' . rawurlencode( $mensaje ) : '' );
}

/**
 * Elementos del menú principal gestionado en Apariencia → Menús.
 * Si todavía no hay menú asignado se usan las cinco páginas del sitio.
 *
 * @return array<int, array{url: string, texto: string, actual: bool}>
 */
function dh_menu(): array {
	$ubicaciones = get_nav_menu_locations();
	$items       = ! empty( $ubicaciones['principal'] ) ? wp_get_nav_menu_items( $ubicaciones['principal'] ) : array();
	$actual      = get_queried_object_id();
	$menu        = array();

	if ( $items ) {
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent ) {
				continue;
			}
			$es_actual = ( 'post_type' === $item->type && (int) $item->object_id === $actual )
				|| ( is_front_page() && untrailingslashit( $item->url ) === untrailingslashit( home_url( '/' ) ) );
			$menu[]    = array( 'url' => $item->url, 'texto' => $item->title, 'actual' => $es_actual );
		}
		return $menu;
	}

	foreach ( array( 'inicio' => 'Inicio', 'metodo' => 'Método', 'planes' => 'Planes', 'nosotros' => 'Nosotros', 'contacto' => 'Contacto' ) as $slug => $texto ) {
		$menu[] = array(
			'url'    => dh_url( $slug ),
			'texto'  => $texto,
			'actual' => 'inicio' === $slug ? is_front_page() : is_page( $slug ),
		);
	}
	return $menu;
}

/**
 * Logo del encabezado: el logo del sitio subido en WordPress (Apariencia → Personalizar → Identidad del sitio).
 * Si no hay uno configurado se usa el SVG del tema.
 */
function dh_logo_sitio( string $clases ): void {
	$id  = (int) get_theme_mod( 'custom_logo' );
	$url = $id ? wp_get_attachment_image_url( $id, 'full' ) : dh_asset( 'images/logo-dhessir.svg' );
	printf(
		'<img src="%s" alt="Dhessir Consultant" width="451" height="146" class="%s">',
		esc_url( $url ),
		esc_attr( $clases )
	);
}

/** Logo en versión clara para fondos oscuros (pie de página y menú móvil). */
function dh_logo_claro( string $clases ): void {
	printf(
		'<img src="%s" alt="Dhessir Consultant" width="451" height="146" loading="lazy" class="%s">',
		esc_url( dh_asset( 'images/logo-dhessir-blanco.svg' ) ),
		esc_attr( $clases )
	);
}

/**
 * Encabezado de sección: eyebrow, título h2 y texto de apoyo opcional.
 *
 * @param array{eyebrow: string, titulo: string, id: string, lede?: string, centrado?: bool} $a
 */
function dh_cabecera( array $a ): void {
	$centrado = ! empty( $a['centrado'] );
	?>
	<div class="revelar mb-12 max-w-[70ch] <?php echo $centrado ? 'mx-auto text-center' : ''; ?>">
		<p class="eyebrow"><?php echo esc_html( $a['eyebrow'] ); ?></p>
		<h2 id="<?php echo esc_attr( $a['id'] ); ?>"><?php echo esc_html( $a['titulo'] ); ?></h2>
		<?php if ( ! empty( $a['lede'] ) ) : ?>
			<p class="lede mt-4 <?php echo $centrado ? 'mx-auto' : ''; ?>"><?php echo esc_html( $a['lede'] ); ?></p>
		<?php endif; ?>
	</div>
	<?php
}

/** Incluye una sección de template-parts/secciones/. */
function dh_seccion( string $nombre ): void {
	get_template_part( 'template-parts/secciones/' . $nombre );
}

/**
 * Une clases CSS: las claves numéricas siempre se incluyen y las de texto solo si su valor es verdadero.
 * Ejemplo: dh_clases( array( 'base', 'activa' => $es_activa ) ).
 */
function dh_clases( array $clases ): string {
	$lista = array();
	foreach ( $clases as $clave => $valor ) {
		if ( is_int( $clave ) ) {
			$lista[] = $valor;
		} elseif ( $valor ) {
			$lista[] = $clave;
		}
	}
	return implode( ' ', $lista );
}
