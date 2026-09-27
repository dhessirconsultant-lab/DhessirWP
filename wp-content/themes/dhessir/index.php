<?php
/**
 * Plantilla de respaldo (obligatoria en todo tema). El sitio no tiene blog de entradas todavía.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="bg-white py-16" aria-labelledby="index-titulo">
	<div class="contenedor">
		<?php if ( have_posts() ) : ?>
			<h1 id="index-titulo" class="mb-8"><?php echo esc_html( wp_get_document_title() ); ?></h1>
			<div class="grid gap-6 md:grid-cols-3">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="tarjeta p-6">
						<h2 class="!text-h4"><a href="<?php the_permalink(); ?>" class="text-azul-900"><?php the_title(); ?></a></h2>
						<p class="mt-2 text-gris-600"><?php echo esc_html( get_the_excerpt() ); ?></p>
					</article>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p class="eyebrow">Error 404</p>
			<h1 id="index-titulo">No encontramos esta página</h1>
			<p class="lede mt-4">Puede que el enlace haya cambiado. Vuelve al inicio o agenda tu sesión gratuita.</p>
			<div class="mt-8 flex flex-wrap gap-3">
				<a class="btn-primario" href="<?php echo esc_url( dh_url( 'contacto', 'agenda' ) ); ?>">Agenda tu sesión gratuita</a>
				<a class="btn-secundario" href="<?php echo esc_url( home_url( '/' ) ); ?>">Volver al inicio</a>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
