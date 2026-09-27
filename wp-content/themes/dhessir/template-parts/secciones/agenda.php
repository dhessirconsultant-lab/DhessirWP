<?php
/**
 * 13 · Agendamiento: el formulario se envía a admin-post.php (inc/solicitudes.php).
 */

defined( 'ABSPATH' ) || exit;

$estado  = dh_estado_formulario();
$errores = $estado['errores'];
$datos   = $estado['datos'];

$campo    = 'min-h-12 w-full rounded-lg border bg-white px-3.5 py-3 font-body text-base text-texto shadow-xs transition-all duration-300 ease-in-out placeholder:text-gris-600/75 hover:border-teal-500 focus:border-teal-800 focus:shadow-md';
$etiqueta = 'mb-1.5 block font-display text-sm font-semibold text-azul-900';

/** Clases del borde y atributos ARIA de un campo según si tiene error. */
$borde = fn ( string $nombre ) => isset( $errores[ $nombre ] ) ? 'border-error' : 'border-gris-200';
$error = function ( string $nombre ) use ( $errores ): void {
	if ( isset( $errores[ $nombre ] ) ) {
		printf( '<p id="%s-error" class="mt-1.5 text-sm text-error">%s</p>', esc_attr( $nombre ), esc_html( $errores[ $nombre ] ) );
	}
};
$aria = function ( string $nombre, string $ayuda = '' ) use ( $errores ): string {
	$describe = trim( $ayuda . ( isset( $errores[ $nombre ] ) ? ' ' . $nombre . '-error' : '' ) );
	return ( isset( $errores[ $nombre ] ) ? 'aria-invalid="true" ' : '' )
		. ( $describe ? 'aria-describedby="' . esc_attr( $describe ) . '"' : '' );
};

$revisa = array(
	array( 'Tu hoja de vida actual', 'Si la tienes a mano, la abrimos en la llamada y te mostramos qué está bloqueando la lectura del sistema.' ),
	array( 'Dónde se cae el proceso', 'Identificamos si el problema está en el documento, en la entrevista o en el rumbo al que estás aplicando.' ),
	array( 'Qué harías distinto esta semana', 'Sales con dos o tres acciones concretas, aunque no contrates ningún plan.' ),
	array( 'Qué plan te corresponde', 'Te recomendamos uno de los tres — o te decimos que no necesitas ninguno.' ),
);
?>
<section class="bg-azul-900 py-12 text-white md:py-16" id="agenda" aria-labelledby="agenda-titulo">
	<div class="contenedor grid items-start gap-8 lg:grid-cols-[1fr_1.1fr] lg:gap-12">
		<div class="revelar">
			<p class="eyebrow !text-teal-300">Sesión diagnóstica gratuita</p>
			<h2 id="agenda-titulo" class="!text-white">30 minutos para saber qué está pasando</h2>
			<p class="mt-4 max-w-[52ch] text-lg text-white/[0.78]">Sin costo, sin compromiso de compra y sin discurso de ventas. Esto es lo que revisamos en esos 30 minutos:</p>

			<ol class="mt-8 flex flex-col gap-4">
				<?php foreach ( $revisa as $i => [ $titulo, $texto ] ) : ?>
					<li class="group grid grid-cols-[32px_1fr] items-start gap-3.5">
						<span class="flex size-8 items-center justify-center rounded-full border border-teal-300/45 bg-teal-300/20 font-display text-sm font-bold text-teal-300 transition-all duration-300 ease-in-out group-hover:scale-110 group-hover:bg-teal-300 group-hover:text-azul-900"><?php echo (int) $i + 1; ?></span>
						<div>
							<strong class="mb-0.5 block font-display text-white"><?php echo esc_html( $titulo ); ?></strong>
							<span class="text-sm leading-normal text-white/70"><?php echo esc_html( $texto ); ?></span>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate data-formulario
		      class="revelar relative rounded-marca bg-white p-6 text-texto shadow-2xl md:p-8">
			<input type="hidden" name="action" value="dh_solicitud">
			<input type="hidden" name="origen" value="<?php echo is_page( 'contacto' ) ? 'contacto' : 'inicio'; ?>">
			<?php wp_nonce_field( 'dh_solicitud', '_dh_nonce' ); ?>

			<?php if ( $estado['enviado'] ) : ?>
				<div class="mb-6 animate-aparecer rounded-lg border-l-4 border-teal-800 bg-teal-800/7 p-4" role="status">
					<strong class="block font-display text-azul-900">¡Recibimos tu solicitud!</strong>
					<span class="text-sm text-gris-600">Te confirmamos horario por WhatsApp en menos de 12 horas hábiles.</span>
				</div>
			<?php endif; ?>

			<?php if ( $errores ) : ?>
				<div class="mb-6 rounded-lg border-l-4 border-error bg-error/6 p-4 text-sm text-error" role="alert">
					Revisa los campos marcados para poder agendar tu sesión.
				</div>
			<?php endif; ?>

			<?php /* Campo trampa contra bots: las personas no lo ven ni lo llenan */ ?>
			<div class="absolute -left-[9999px]" aria-hidden="true">
				<label for="sitio_web">No llenes este campo</label>
				<input type="text" id="sitio_web" name="sitio_web" tabindex="-1" autocomplete="off">
			</div>

			<div class="mb-6">
				<label for="nombre" class="<?php echo esc_attr( $etiqueta ); ?>">Nombre completo <span class="text-error" aria-hidden="true">*</span></label>
				<input type="text" id="nombre" name="nombre" autocomplete="name" placeholder="Como aparece en tu hoja de vida" required maxlength="120"
				       value="<?php echo esc_attr( $datos['nombre'] ?? '' ); ?>" <?php echo $aria( 'nombre' ); // phpcs:ignore ?> class="<?php echo esc_attr( $campo . ' ' . $borde( 'nombre' ) ); ?>">
				<?php $error( 'nombre' ); ?>
			</div>

			<div class="mb-6">
				<label for="correo" class="<?php echo esc_attr( $etiqueta ); ?>">Correo electrónico <span class="text-error" aria-hidden="true">*</span></label>
				<input type="email" id="correo" name="correo" autocomplete="email" placeholder="tucorreo@ejemplo.com" required maxlength="160"
				       value="<?php echo esc_attr( $datos['correo'] ?? '' ); ?>" <?php echo $aria( 'correo' ); // phpcs:ignore ?> class="<?php echo esc_attr( $campo . ' ' . $borde( 'correo' ) ); ?>">
				<?php $error( 'correo' ); ?>
			</div>

			<div class="mb-6">
				<label for="whatsapp" class="<?php echo esc_attr( $etiqueta ); ?>">Número de WhatsApp <span class="text-error" aria-hidden="true">*</span></label>
				<input type="tel" id="whatsapp" name="whatsapp" autocomplete="tel" inputmode="tel" placeholder="+57 3XX XXX XXXX" required maxlength="20"
				       value="<?php echo esc_attr( $datos['whatsapp'] ?? '' ); ?>" <?php echo $aria( 'whatsapp', 'whatsapp-ayuda' ); // phpcs:ignore ?> class="<?php echo esc_attr( $campo . ' ' . $borde( 'whatsapp' ) ); ?>">
				<p id="whatsapp-ayuda" class="mt-1.5 text-sm text-gris-600">Es el canal por el que confirmamos la sesión y enviamos el material.</p>
				<?php $error( 'whatsapp' ); ?>
			</div>

			<div class="mb-6">
				<label for="punto" class="<?php echo esc_attr( $etiqueta ); ?>">¿En qué punto te estás quedando? <span class="text-error" aria-hidden="true">*</span></label>
				<select id="punto" name="punto" required <?php echo $aria( 'punto', 'punto-ayuda' ); // phpcs:ignore ?> class="<?php echo esc_attr( $campo . ' ' . $borde( 'punto' ) . ' cursor-pointer' ); ?>">
					<option value="">Elige una opción</option>
					<?php foreach ( DH_PUNTOS as $valor => $texto ) : ?>
						<option value="<?php echo esc_attr( $valor ); ?>" <?php selected( $datos['punto'] ?? '', $valor ); ?>><?php echo esc_html( $texto ); ?></option>
					<?php endforeach; ?>
				</select>
				<p id="punto-ayuda" class="mt-1.5 text-sm text-gris-600">Esta respuesta permite que el consultor llegue preparado a la sesión.</p>
				<?php $error( 'punto' ); ?>
			</div>

			<div class="flex items-start gap-3 pt-4 pb-6">
				<input type="checkbox" id="consentimiento" name="consentimiento" value="1" required <?php checked( $estado['consentimiento'] ); ?>
				       <?php echo $aria( 'consentimiento' ); // phpcs:ignore ?> class="mt-0.5 size-6 shrink-0 cursor-pointer accent-teal-800">
				<div>
					<label for="consentimiento" class="text-sm leading-normal text-gris-600">Autorizo el tratamiento de mis datos personales conforme a la <a href="<?php echo esc_url( dh_url( 'politica-de-datos' ) ); ?>" class="font-semibold underline-offset-2 hover:underline">política de tratamiento de datos</a> de Dhessir Consultant y a la Ley 1581 de 2012. Mis datos se usan exclusivamente para contactarme y prestar este servicio.</label>
					<?php $error( 'consentimiento' ); ?>
				</div>
			</div>

			<button class="btn-primario w-full" type="submit">Agendar mi sesión gratuita</button>
			<p class="mt-4 text-center text-sm leading-normal text-gris-600">Te confirmamos horario por WhatsApp en menos de 12 horas hábiles. Cuatro campos, nada más: no pedimos edad, ciudad ni cargo actual.</p>
		</form>
	</div>
</section>
