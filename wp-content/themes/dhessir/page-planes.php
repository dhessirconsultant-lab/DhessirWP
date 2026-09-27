<?php
/**
 * Página "Planes" (slug planes): planes y preguntas frecuentes.
 */

defined( 'ABSPATH' ) || exit;

get_header();
the_post();
get_template_part( 'template-parts/encabezado-pagina' );
dh_seccion( 'planes' );
dh_seccion( 'faq' );
get_template_part( 'template-parts/banda-cta', null, array( 'titulo' => '¿No sabes cuál plan te corresponde?' ) );
get_footer();
