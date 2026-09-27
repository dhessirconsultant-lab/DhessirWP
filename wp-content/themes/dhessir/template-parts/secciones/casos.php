<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 8 · CASOS ══ */ ?>
<section class="bg-white py-12 md:py-16" id="casos" aria-labelledby="casos-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Casos', 'titulo' => 'El primero, documentado con autorización', 'id' => 'casos-titulo', 'lede' => 'Publicamos un caso cuando la persona nos autoriza a contarlo y podemos mostrar qué cambió. Ni uno más.' ) ); ?>

        <article class="revelar grid items-center gap-8 rounded-marca border border-gris-200 bg-white p-6 shadow-xl transition-all duration-300 ease-in-out hover:shadow-2xl md:p-8 lg:grid-cols-2 lg:gap-12">
            <div>
                <blockquote class="font-display text-h4 leading-[1.45] font-medium text-azul-900 before:mb-2 before:block before:text-5xl before:leading-[0.6] before:text-teal-500 before:content-['“']">
                    Estaba en un empleo mal remunerado. Hoy soy Coordinadora Académica en una universidad. El proceso fue honesto, claro y me dio exactamente el mapa que necesitaba.
                </blockquote>
                <div class="mt-6 flex items-center gap-3 border-t border-gris-200 pt-6">
                    <span class="flex size-12 shrink-0 items-center justify-center rounded-full bg-teal-800 font-display text-lg font-bold text-white shadow-md" aria-hidden="true">K</span>
                    <div>
                        <p class="font-display font-bold text-azul-900">Katherin Rocha</p>
                        <p class="text-sm text-gris-600">Coordinadora Académica · Universidad Agraria de Colombia</p>
                    </div>
                </div>
            </div>

            <dl class="grid gap-4 md:grid-cols-2">
                <div class="rounded-marca border border-gris-200 bg-gris-50 p-6 transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-md">
                    <dt class="mb-2 text-sm font-bold tracking-[0.08em] text-gris-600 uppercase">Antes</dt>
                    <dd class="leading-normal text-texto">Hoja de vida cronológica de tres páginas, sin logros medibles. Aplicaba a cargos administrativos generales sin un sector definido.</dd>
                </div>
                <div class="rounded-marca border-2 border-teal-800 bg-white p-6 shadow-md transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
                    <dt class="mb-2 text-sm font-bold tracking-[0.08em] text-teal-800 uppercase">Después</dt>
                    <dd class="leading-normal text-texto">Hoja de vida de una página orientada a coordinación académica, con logros en formato STAR y ruta de postulación enfocada en el sector educativo.</dd>
                </div>
            </dl>
        </article>
    </div>
</section>
