<?php
/**
 * Encabezado: menú principal gestionado en Apariencia → Menús y menú móvil.
 */

defined( 'ABSPATH' ) || exit;

$menu   = dh_menu();
$agenda = dh_url_agenda();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'pb-[76px] md:pb-0' ); ?>>
<?php wp_body_open(); ?>

<a href="#contenido"
   class="absolute top-[-100px] left-4 z-[2000] rounded-marca bg-acento px-5 py-3 font-display font-bold text-azul-900 transition-[top] duration-150 focus:top-4">
	Saltar al contenido principal
</a>

<header class="sticky top-0 z-50 border-b border-gris-200 bg-white/[0.88] backdrop-blur-md transition-shadow duration-300" data-encabezado>
	<div class="contenedor flex min-h-[72px] items-center gap-8">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="group flex shrink-0 items-center" aria-label="Dhessir Consultant, ir al inicio">
			<?php dh_logo_sitio( 'h-10 w-auto transition-transform duration-300 ease-in-out group-hover:scale-105' ); ?>
		</a>

		<nav class="ml-auto hidden items-center gap-6 lg:flex" aria-label="Navegación principal">
			<ul class="flex items-center gap-1">
				<?php foreach ( $menu as $item ) : ?>
					<li>
						<a href="<?php echo esc_url( $item['url'] ); ?>" <?php echo $item['actual'] ? 'aria-current="page"' : ''; ?>
						   class="relative flex min-h-11 items-center rounded-lg px-3 font-display text-[0.9375rem] font-semibold text-azul-900 no-underline transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:bg-gris-50 aria-[current=page]:text-teal-800
						          after:absolute after:inset-x-3 after:bottom-1.5 after:h-0.5 after:origin-left after:scale-x-0 after:rounded-full after:bg-teal-800 after:transition-transform after:duration-300 after:ease-in-out hover:after:scale-x-100 aria-[current=page]:after:scale-x-100">
							<?php echo esc_html( $item['texto'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<a class="btn-primario" href="<?php echo esc_url( $agenda ); ?>">Agenda tu sesión gratuita</a>
		</nav>

		<button type="button"
		        class="ml-auto flex size-12 cursor-pointer items-center justify-center rounded-[10px] border border-gris-200 bg-white shadow-sm transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:shadow-lg lg:hidden"
		        aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="menu-movil" data-abrir-menu>
			<svg width="22" height="22" viewBox="0 0 22 22" fill="none" aria-hidden="true">
				<path d="M3 6h16M3 11h16M3 16h16" stroke="#184264" stroke-width="2" stroke-linecap="round"/>
			</svg>
		</button>
	</div>
</header>

<div id="menu-movil" class="fixed inset-0 z-[1500] hidden flex-col overflow-y-auto bg-azul-900 p-6 data-[abierto=true]:flex"
     data-abierto="false" role="dialog" aria-modal="true" aria-label="Menú de navegación">
	<div class="flex min-h-12 items-center justify-between">
		<?php dh_logo_claro( 'h-9 w-auto' ); ?>
		<button type="button" data-cerrar-menu aria-label="Cerrar menú"
		        class="flex size-12 cursor-pointer items-center justify-center rounded-[10px] border border-white/30 text-2xl leading-none text-white transition-all duration-300 hover:rotate-90 hover:bg-white/10">
			&times;
		</button>
	</div>
	<ul class="mt-12 flex flex-col gap-2">
		<?php
		$movil   = $menu;
		$movil[] = array( 'url' => dh_url( 'planes', 'faq' ), 'texto' => 'Preguntas frecuentes', 'actual' => false );
		foreach ( $movil as $i => $item ) :
			?>
			<li class="animate-aparecer" style="animation-delay: <?php echo (int) ( 60 * $i ); ?>ms">
				<a href="<?php echo esc_url( $item['url'] ); ?>" data-cerrar-menu <?php echo $item['actual'] ? 'aria-current="page"' : ''; ?>
				   class="flex min-h-14 items-center justify-between border-b border-teal-300/25 font-display text-h4 font-semibold text-white no-underline transition-all duration-300 hover:pl-2 hover:text-teal-300 aria-[current=page]:text-teal-300">
					<?php echo esc_html( $item['texto'] ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<a class="btn-primario mt-auto w-full" href="<?php echo esc_url( $agenda ); ?>" data-cerrar-menu>Agenda tu sesión gratuita</a>
</div>

<main id="contenido">
