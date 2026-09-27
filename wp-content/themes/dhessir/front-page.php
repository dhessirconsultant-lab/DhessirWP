<?php
/**
 * Portada (Inicio): hero, diagnóstico, franja ATS, caso y agendamiento.
 */

defined( 'ABSPATH' ) || exit;

get_header();
dh_seccion( 'hero' );
dh_seccion( 'diagnostico' );
dh_seccion( 'ats' );
dh_seccion( 'casos' );
dh_seccion( 'agenda' );
get_footer();
