<?php
/**
 * Páginas con contenido libre (por ejemplo, la política de datos): se editan en el editor de WordPress.
 */

defined( 'ABSPATH' ) || exit;

get_header();
the_post();
get_template_part( 'template-parts/encabezado-pagina' );
?>
<section class="bg-white py-12 md:py-16" aria-label="Contenido de la página">
	<div class="contenedor">
		<div class="mx-auto max-w-[70ch] leading-[1.7] text-texto
		            [&_h2]:mt-10 [&_h2]:mb-3 [&_h2]:!text-h4 [&_h2:first-child]:mt-0 [&_h3]:mt-8 [&_h3]:mb-2 [&_h3]:!text-lg
		            [&_p+p]:mt-3 [&_ul+p]:mt-3 [&_ol+p]:mt-3 [&_ul]:mt-3 [&_ul]:list-disc [&_ul]:space-y-1.5 [&_ul]:pl-6 [&_ol]:mt-3 [&_ol]:list-decimal [&_ol]:pl-6
		            [&_a]:font-semibold [&_a]:underline-offset-2 hover:[&_a]:underline">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<?php
get_footer();
