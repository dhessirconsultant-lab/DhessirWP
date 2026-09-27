<?php
/**
 * Tema Dhessir: configuración, estilos y funcionalidad.
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/inc/ayudantes.php';
require_once __DIR__ . '/inc/solicitudes.php';
require_once __DIR__ . '/inc/seguridad.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 146,
			'width'       => 451,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	// El resumen de cada página se usa como texto bajo el título del encabezado
	add_post_type_support( 'page', 'excerpt' );

	register_nav_menus(
		array(
			'principal' => __( 'Menú principal', 'dhessir' ),
		)
	);
} );

/* Título de la pestaña: "Página | Dhessir" y en la portada "Consultoría de empleo | Dhessir" */
add_filter( 'document_title_separator', fn () => '|' );
add_filter(
	'document_title_parts',
	function ( array $partes ) {
		if ( is_front_page() ) {
			return array( 'title' => 'Consultoría de empleo', 'site' => 'Dhessir' );
		}
		$partes['site'] = 'Dhessir';
		unset( $partes['tagline'] );
		return $partes;
	}
);

/* Estilos y scripts compilados con Vite (dist/.vite/manifest.json) */
add_action( 'wp_enqueue_scripts', function () {
	$manifiesto = get_theme_file_path( 'dist/.vite/manifest.json' );
	if ( ! file_exists( $manifiesto ) ) {
		return;
	}
	$archivos = json_decode( file_get_contents( $manifiesto ), true );
	$css      = $archivos['resources/css/app.css']['file'] ?? null;
	$js       = $archivos['resources/js/app.js']['file'] ?? null;

	if ( $css ) {
		wp_enqueue_style( 'dhessir', get_theme_file_uri( 'dist/' . $css ), array(), null );
	}
	if ( $js ) {
		wp_enqueue_script( 'dhessir', get_theme_file_uri( 'dist/' . $js ), array(), null, array( 'strategy' => 'defer', 'in_footer' => true ) );
	}

	// El tema no usa bloques en el front: se quitan los estilos que WordPress añade por defecto
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
} );

add_filter(
	'script_loader_tag',
	function ( string $etiqueta, string $handle ) {
		return 'dhessir' === $handle ? str_replace( '<script ', '<script type="module" ', $etiqueta ) : $etiqueta;
	},
	10,
	2
);

/* Ícono de la pestaña (si no se configuró uno en el Personalizador) */
add_action( 'wp_head', function () {
	if ( has_site_icon() ) {
		return;
	}
	printf( '<link rel="icon" href="%s" type="image/png" sizes="32x32">' . "\n", esc_url( dh_asset( 'images/favicon-32.png' ) ) );
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( dh_asset( 'images/favicon.svg' ) ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( dh_asset( 'images/favicon-180.png' ) ) );
	echo '<meta name="theme-color" content="#184264">' . "\n";
} );

/* Sin JS el contenido se muestra completo; con JS se activan las animaciones de entrada */
add_action( 'wp_head', fn () => print "<script>document.documentElement.classList.add('js')</script>\n", 1 );

/* Limpieza del <head> */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
