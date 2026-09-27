<?php
/**
 * Seguridad: encabezados HTTP y subida de SVG solo para administradores.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'send_headers', function () {
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=()' );
	if ( is_ssl() && 'production' === wp_get_environment_type() ) {
		header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains' );
	}
} );

/* Permite subir el logo en SVG. Solo administradores: un SVG puede contener código. */
add_filter(
	'upload_mimes',
	function ( array $tipos ) {
		if ( current_user_can( 'manage_options' ) ) {
			$tipos['svg'] = 'image/svg+xml';
		}
		return $tipos;
	}
);

add_filter(
	'wp_check_filetype_and_ext',
	function ( array $datos, string $archivo, string $nombre ) {
		if ( current_user_can( 'manage_options' ) && 'svg' === strtolower( pathinfo( $nombre, PATHINFO_EXTENSION ) ) ) {
			$contenido = (string) file_get_contents( $archivo );
			// Rechaza SVG con scripts o manejadores de eventos
			if ( preg_match( '/<script|on[a-z]+\s*=|javascript:/i', $contenido ) ) {
				return array( 'ext' => false, 'type' => false, 'proper_filename' => false );
			}
			return array( 'ext' => 'svg', 'type' => 'image/svg+xml', 'proper_filename' => $nombre );
		}
		return $datos;
	},
	10,
	3
);

/* No mostrar qué usuario existe en los errores de inicio de sesión */
add_filter( 'login_errors', fn () => 'Usuario o contraseña incorrectos.' );
