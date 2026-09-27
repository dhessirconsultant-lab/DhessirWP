<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 6 · PLANES ══ */ ?>
<?php $wa = fn (string $plan, string $precio) => 'https://wa.me/573159608790?text='.rawurlencode("Hola, quiero el Plan {$plan} de {$precio} COP. Vengo de dhessir.co");
    $check = fn (string $fondo, string $opacidad, string $trazo) => '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true" class="mt-1 shrink-0"><circle cx="9" cy="9" r="8" fill="'.$fondo.'" fill-opacity="'.$opacidad.'"/><path d="M5.5 9.2l2.6 2.6L12.8 7" stroke="'.$trazo.'" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    $iconoWa = '<svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" aria-hidden="true"><path d="M9 1.5a7.4 7.4 0 00-6.3 11.3L1.5 16.5l3.9-1.1A7.4 7.4 0 109 1.5zm0 13.4a6 6 0 01-3.1-.9l-.2-.1-2.3.6.6-2.2-.1-.2A6 6 0 119 14.9z"/></svg>';
    $planes = [
        [
            'nombre' => 'Brújula', 'precio' => '$70.000', 'pago' => 'Pago único', 'sesiones' => '1 sesión', 'destacado' => false,
            'para' => 'Para quien necesita que su hoja de vida por fin llegue a ser leída.',
            'check' => $check('#035A55', '.12', '#035A55'),
            'incluye' => ['Revisión y ajuste de la hoja de vida para filtros ATS', 'Optimización del perfil de LinkedIn', 'Una sesión de 60 minutos por videollamada', 'Guía descargable personalizada'],
        ],
        [
            'nombre' => 'Mapa', 'precio' => '$150.000', 'pago' => 'Pago único', 'sesiones' => '3 sesiones', 'destacado' => true,
            'para' => 'Para quien ya sabe que el problema también está en la entrevista y en el rumbo.',
            'check' => $check('#184264', '.12', '#184264'),
            'incluye' => ['<strong>Todo lo de Brújula</strong>', 'Definición de la ruta de carrera', 'Simulacro de entrevista con metodología STAR', 'Retroalimentación escrita del simulacro'],
        ],
        [
            'nombre' => 'Expedición', 'precio' => '$200.000', 'pago' => 'Pago único o dos cuotas', 'sesiones' => '5 sesiones', 'destacado' => false,
            'para' => 'Para quien quiere acompañamiento durante todo el mes de búsqueda.',
            'check' => $check('#59908B', '.18', '#035A55'),
            'incluye' => ['<strong>Todo lo de Mapa</strong>', 'Cuatro semanas de acompañamiento en la estrategia de postulación', 'Preparación para la negociación salarial', 'Soporte por WhatsApp durante el plan'],
        ],
    ]; ?>
<section class="bg-white py-12 md:py-16" id="planes" aria-labelledby="planes-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Planes y precios', 'titulo' => 'Precios visibles, sin cotizaciones', 'id' => 'planes-titulo', 'lede' => 'Todos los planes parten de la sesión diagnóstica gratuita. Si en esa sesión vemos que no necesitas un plan, te lo decimos.' ) ); ?>

        <div class="grid items-start gap-6 md:grid-cols-3">
            <?php foreach ( $planes as $plan ) : ?>
                <article class="<?php echo esc_attr( dh_clases( [
                    'group revelar relative flex flex-col gap-4 rounded-marca bg-white px-6 py-8 transition-all duration-300 ease-in-out hover:-translate-y-1',
                    'order-first border-2 border-acento shadow-xl hover:shadow-2xl md:order-none md:-translate-y-2 md:hover:-translate-y-3' => $plan['destacado'],
                    'border border-gris-200 shadow-sm hover:shadow-xl' => ! $plan['destacado'],
                ] ) ); ?>">
                    <?php if ( $plan['destacado'] ) : ?>
                        <span class="absolute -top-[13px] left-6 rounded-full bg-acento px-3.5 py-1 font-display text-sm font-bold text-azul-900 shadow-md">Más elegido</span>
                    <?php endif; ?>
                    <div>
                        <h3 class="!text-h3 leading-[1.1] font-bold"><?php echo esc_html( $plan['nombre'] ); ?></h3>
                        <p class="mt-1 text-sm leading-normal font-semibold text-teal-800"><?php echo esc_html( $plan['para'] ); ?></p>
                    </div>
                    <div class="flex flex-wrap items-baseline gap-2 border-y border-gris-200 py-4">
                        <span class="font-display text-4xl leading-none font-bold text-azul-900 tabular-nums"><?php echo esc_html( $plan['precio'] ); ?></span>
                        <span class="text-sm text-gris-600">COP</span>
                        <span class="mt-0.5 w-full text-sm text-gris-600"><?php echo esc_html( $plan['pago'] ); ?></span>
                    </div>
                    <ul class="flex flex-1 flex-col gap-2.5">
                        <?php foreach ( $plan['incluye'] as $item ) : ?>
                            <li class="flex min-h-6 gap-2.5 leading-normal"><?php echo $plan['check']; ?> <span><?php echo $item; ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <span class="inline-flex items-center gap-2 self-start rounded-full border border-gris-200 bg-gris-50 px-3 py-1.5 text-sm font-semibold text-azul-900"><?php echo esc_html( $plan['sesiones'] ); ?></span>
                    <a href="<?php echo esc_url( $wa($plan['nombre'], $plan['precio']) ); ?>" target="_blank" rel="noopener"
                       class="<?php echo esc_attr( dh_clases( ['btn-primario w-full' => $plan['destacado'], 'btn-secundario w-full' => ! $plan['destacado']] ) ); ?>">
                        <?php echo $iconoWa; ?>
                        Quiero este plan
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <p class="mt-8 text-center text-sm text-gris-600">Medios de pago: tarjeta débito y crédito, PSE y Nequi. Tarifas preferenciales por convenio con universidades y cajas de compensación, y descuento por referido.</p>
    </div>
</section>
