<?php
/**
 * 1 · Hero
 */

defined( 'ABSPATH' ) || exit;

$badges = array(
	array( 'Consultores con experiencia en selección', '<path d="M8 1.6l1.9 3.9 4.3.6-3.1 3 .7 4.3L8 11.4 4.2 13.4l.7-4.3-3.1-3 4.3-.6L8 1.6z" stroke="#035A55" stroke-width="1.3" stroke-linejoin="round"/>' ),
	array( 'Podcast publicado en Spotify', '<path d="M8 10.5a2.5 2.5 0 002.5-2.5V4a2.5 2.5 0 00-5 0v4A2.5 2.5 0 008 10.5zM4 8a4 4 0 008 0M8 12.5v1.9" stroke="#035A55" stroke-width="1.3" stroke-linecap="round"/>' ),
	array( 'Primera sesión sin costo', '<path d="M3.5 8.2l3 3L12.5 5" stroke="#035A55" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>' ),
);
?>
<section class="relative overflow-hidden bg-white py-16" aria-labelledby="hero-titulo">
	<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(118deg,rgb(118_171_165/0.12)_0_46%,transparent_46%)]" aria-hidden="true"></div>

	<div class="contenedor relative grid items-center gap-8 lg:grid-cols-[7fr_5fr] lg:gap-12">
		<div class="animate-aparecer">
			<p class="eyebrow">¿Aplicas a todo y nadie te llama?</p>
			<h1 id="hero-titulo" class="mt-2 mb-6">El problema no eres tú.<br>Es tu método.</h1>
			<p class="lede">Consultoría de carrera con profesionales de selección de personal. Identificamos en qué punto te estás quedando y armamos tu plan.</p>

			<div class="mt-8 mb-4 flex flex-col gap-3 md:flex-row md:flex-wrap">
				<a class="btn-primario w-full md:w-auto" href="#agenda">Agenda tu sesión gratuita</a>
				<a class="btn-secundario w-full md:w-auto" href="<?php echo esc_url( dh_url( 'metodo' ) ); ?>">Conoce el método PREP</a>
			</div>

			<p class="flex items-center gap-2 text-sm text-gris-600">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="shrink-0"><circle cx="8" cy="8" r="6.5" stroke="#5B6B70" stroke-width="1.4"/><path d="M8 4.6V8l2.4 1.6" stroke="#5B6B70" stroke-width="1.4" stroke-linecap="round"/></svg>
				30 minutos, sin costo y sin compromiso de compra
			</p>

			<ul class="mt-8 flex flex-wrap gap-2.5 border-t border-gris-200 pt-6">
				<?php foreach ( $badges as [ $texto, $icono ] ) : ?>
					<li class="inline-flex items-center gap-2 rounded-full border border-gris-200 bg-gris-50 px-3.5 py-2 text-sm font-medium text-azul-900 transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:bg-white hover:shadow-md">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="shrink-0"><?php echo $icono; // phpcs:ignore -- SVG fijo del tema ?></svg>
						<?php echo esc_html( $texto ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="relative animate-aparecer [animation-delay:150ms]">
			<div class="group relative aspect-[3/2] overflow-hidden rounded-marca bg-azul-900 shadow-2xl">
				<img src="<?php echo esc_url( dh_asset( 'images/hero-sesion.jpg' ) ); ?>" alt="Candidata sonriendo durante una sesión diagnóstica por videollamada con un consultor"
				     width="1408" height="768" fetchpriority="high" class="size-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105">
			</div>
			<div class="absolute -bottom-6 left-4 flex animate-flotar items-center gap-3 rounded-marca border border-gris-200 bg-white px-4 py-3 shadow-2xl md:-left-6">
				<span class="flex size-10 items-center justify-center rounded-full bg-teal-800/10">
					<svg width="22" height="22" viewBox="0 0 40 40" fill="none" aria-hidden="true"><rect x="4" y="10" width="22" height="20" rx="3" stroke="#035A55" stroke-width="2.4"/><path d="M26 17l10-5v16l-10-5v-6z" stroke="#035A55" stroke-width="2.4" stroke-linejoin="round"/></svg>
				</span>
				<span>
					<strong class="block font-display text-sm text-azul-900">Sesión diagnóstica</strong>
					<span class="text-sm text-gris-600">30 min · por videollamada</span>
				</span>
			</div>
		</div>
	</div>
</section>
