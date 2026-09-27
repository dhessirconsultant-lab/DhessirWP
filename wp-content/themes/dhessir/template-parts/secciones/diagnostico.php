<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 2 · DIAGNÓSTICO · diferenciador principal ══ */ ?>
<section class="bg-gris-50 py-12 md:py-16" id="diagnostico" aria-labelledby="diag-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Empieza por aquí', 'titulo' => '¿En cuál de los tres te estás quedando?', 'id' => 'diag-titulo', 'lede' => 'Ninguna consultoría te pregunta esto antes de venderte. Elige tu caso y te decimos qué está pasando y con qué plan se resuelve.' ) ); ?>

        <div class="grid gap-4 md:grid-cols-3" role="group" aria-labelledby="diag-titulo">
            <?php foreach ( [
                ['hv', 'Mi hoja de vida no pasa los filtros', 'Aplicas y no recibes ni un correo de rechazo.'],
                ['entrevista', 'Llego a la entrevista y me quedo ahí', 'Te llaman, conversas bien y nunca hay segunda fase.'],
                ['ruta', 'No sé para qué debería estar aplicando', 'Aplicas a todo lo que aparece, sin un criterio claro.'],
            ] as $i => [$clave, $titulo, $pista] ) : ?>
                <button type="button" data-diag="<?php echo esc_attr( $clave ); ?>" aria-pressed="false" aria-controls="diag-panel"
                        class="group revelar flex min-h-40 cursor-pointer flex-col gap-3 rounded-marca border-2 border-gris-200 bg-white p-6 text-left shadow-sm transition-all duration-300 ease-in-out
                               hover:-translate-y-1 hover:border-teal-500 hover:shadow-xl
                               aria-pressed:-translate-y-1 aria-pressed:border-teal-800 aria-pressed:shadow-xl">
                    <span class="flex size-9 shrink-0 items-center justify-center rounded-full border border-gris-200 bg-gris-50 font-display font-bold text-teal-800 transition-colors duration-300 group-aria-pressed:border-teal-800 group-aria-pressed:bg-teal-800 group-aria-pressed:text-white"><?php echo esc_html( $i + 1 ); ?></span>
                    <span class="font-display text-lg leading-[1.3] font-semibold text-azul-900"><?php echo esc_html( $titulo ); ?></span>
                    <span class="text-sm leading-normal text-gris-600"><?php echo esc_html( $pista ); ?></span>
                    <span class="mt-auto flex items-center gap-1.5 text-sm font-semibold text-teal-800">
                        Ver diagnóstico
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true" class="transition-transform duration-300 group-hover:translate-x-1 group-aria-pressed:rotate-90"><path d="M3 7h8M8 4l3 3-3 3" stroke="#035A55" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                </button>
            <?php endforeach; ?>
        </div>

        <p id="diag-vacio" class="mt-4 rounded-marca border border-dashed border-gris-200 p-6 text-center text-sm text-gris-600">
            Selecciona una de las tres tarjetas para ver tu diagnóstico preliminar.
        </p>

        <div id="diag-panel" hidden role="region" aria-live="polite" aria-label="Diagnóstico preliminar"
             class="mt-4 animate-aparecer rounded-marca border border-l-4 border-gris-200 border-l-teal-800 bg-white px-6 py-6 shadow-lg md:px-8">
            <div class="grid items-start gap-8 lg:grid-cols-[1.5fr_1fr]">
                <div>
                    <p class="eyebrow" data-slot="etiqueta"></p>
                    <h3 class="mb-2 !text-h4" data-slot="titulo"></h3>
                    <p class="leading-[1.6] text-gris-600" data-slot="descripcion"></p>
                    <ul class="mt-4 flex flex-col gap-2" data-slot="lista"></ul>
                </div>
                <aside class="rounded-marca border border-gris-200 bg-gris-50 p-6">
                    <p class="mb-1.5 text-sm text-gris-600">Plan recomendado</p>
                    <strong class="mb-2 block font-display text-h4 text-azul-900" data-slot="plan"></strong>
                    <p class="text-sm leading-normal text-gris-600" data-slot="plan-razon"></p>
                    <a class="btn-primario mt-4 w-full" href="#agenda">Agendar mi sesión gratuita</a>
                    <p class="mt-2.5 text-center text-sm text-gris-600">Tu respuesta queda precargada en el formulario.</p>
                </aside>
            </div>
        </div>

        <?php /* Cifras del mercado como contexto del problema, nunca como resultados propios */ ?>
        <div class="revelar mt-12 border-t border-gris-200 pt-8">
            <p class="eyebrow">Por qué te pasa esto</p>
            <p class="max-w-[70ch] text-sm leading-normal text-gris-600">No es un problema individual: es el estado del mercado laboral en el que estás compitiendo. Estas cifras describen el contexto, no resultados de Dhessir.</p>
            <div class="mt-6 grid gap-6 md:grid-cols-3">
                <?php foreach ( [
                    ['17&nbsp;%', 'de desempleo juvenil en Colombia · DANE, primer trimestre 2026'],
                    ['55&nbsp;%', 'de la fuerza laboral colombiana está en la informalidad · DANE 2026'],
                    ['87&nbsp;%', 'de reclutadores consulta LinkedIn para evaluar candidatos · Jobvite Recruiter Nation'],
                ] as [$cifra, $texto] ) : ?>
                    <div class="border-l-3 border-teal-500 pl-4">
                        <p class="font-display text-h3 leading-none font-bold text-azul-900 tabular-nums"><?php echo $cifra; ?></p>
                        <p class="mt-1.5 text-sm leading-normal text-gris-600"><?php echo esc_html( $texto ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
