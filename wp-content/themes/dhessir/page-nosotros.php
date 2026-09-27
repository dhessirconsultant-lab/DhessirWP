<?php
/**
 * Página "Nosotros" (slug nosotros): consultor, podcast y blog.
 */

defined( 'ABSPATH' ) || exit;

get_header();
the_post();
get_template_part( 'template-parts/encabezado-pagina' );
dh_seccion( 'consultor' );
dh_seccion( 'podcast' );
dh_seccion( 'blog' );
get_template_part( 'template-parts/banda-cta' );
get_footer();
