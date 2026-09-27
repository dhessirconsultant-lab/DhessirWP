<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 3 · FRANJA DE COMPATIBILIDAD ATS ══ */ ?>
<section class="bg-azul-900 py-12 text-white" aria-labelledby="ats-titulo">
    <div class="contenedor grid items-center gap-8 lg:grid-cols-[1fr_1.3fr] lg:gap-12">
        <div class="revelar">
            <p class="eyebrow !text-teal-300">Compatibilidad técnica</p>
            <h2 id="ats-titulo" class="!text-[1.5rem] !text-white md:!text-h3">Tu hoja de vida sale legible para los sistemas que la leen primero</h2>
            <p class="mt-4 text-white/[0.78]">Antes de que una persona la vea, tu hoja de vida pasa por un sistema de seguimiento de candidatos. Ajustamos el formato, la estructura y las palabras clave para que el documento se lea correctamente en los más usados del mercado.</p>
        </div>
        <div class="revelar">
            <ul class="flex flex-wrap gap-2.5">
                <?php foreach ( ['Workday', 'Taleo', 'Greenhouse', 'SuccessFactors', 'Lever'] as $ats ) : ?>
                    <li class="cursor-default rounded-marca border border-teal-300/45 bg-teal-300/12 px-[18px] py-3 font-display font-semibold text-white transition-all duration-300 ease-in-out hover:-translate-y-1 hover:border-teal-300 hover:bg-teal-300/20 hover:shadow-xl"><?php echo esc_html( $ats ); ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="mt-6 max-w-[64ch] text-sm leading-normal text-white/60">Estos nombres se mencionan únicamente como referencia de compatibilidad técnica de formato. Dhessir no tiene ninguna alianza comercial ni vínculo con estas compañías.</p>
        </div>
    </div>
</section>
