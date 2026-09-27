<?php
/**
 * Página "Método" (slug metodo): PREP, para quién es y anatomía de una hoja de vida.
 */

defined( 'ABSPATH' ) || exit;

get_header();
the_post();
get_template_part( 'template-parts/encabezado-pagina' );
dh_seccion( 'prep' );
dh_seccion( 'para-quien' );
dh_seccion( 'anatomia' );
get_template_part( 'template-parts/banda-cta' );
get_footer();
