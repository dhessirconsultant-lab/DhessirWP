<?php
/**
 * Encabezado de las páginas internas. Todo se edita desde WordPress:
 * - Ruta de navegación: el título de la página.
 * - Titular (<h1>): el campo personalizado "dh_titular" (si está vacío se usa el título).
 * - Texto de apoyo: el extracto de la página.
 */

defined( 'ABSPATH' ) || exit;

$titular = get_post_meta( get_the_ID(), 'dh_titular', true ) ?: get_the_title();
?>
<section class="relative overflow-hidden bg-azul-900 py-16 text-white md:py-20" aria-labelledby="pagina-titulo">
	<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(118deg,rgb(118_171_165/0.16)_0_42%,transparent_42%)]" aria-hidden="true"></div>
	<div class="pointer-events-none absolute -top-24 -right-24 size-80 animate-flotar rounded-full border-[40px] border-teal-300/10" aria-hidden="true"></div>
	<div class="contenedor relative animate-aparecer">
		<nav aria-label="Ruta de navegación" class="mb-6 text-sm">
			<ol class="flex flex-wrap items-center gap-2 text-white/70">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white/70 underline-offset-4 transition-colors duration-300 hover:text-white hover:underline">Inicio</a></li>
				<li aria-hidden="true">/</li>
				<li aria-current="page" class="font-semibold text-teal-300"><?php the_title(); ?></li>
			</ol>
		</nav>
		<h1 id="pagina-titulo" class="max-w-[22ch] !text-white"><?php echo esc_html( $titular ); ?></h1>
		<?php if ( has_excerpt() ) : ?>
			<p class="mt-6 max-w-[62ch] text-lg leading-[1.6] text-white/[0.78]"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>
	</div>
</section>
