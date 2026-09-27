<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 4 · MÉTODO PREP ══ */ ?>
<section class="bg-white py-12 md:py-16" id="prep" aria-labelledby="metodo-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Nuestro método', 'titulo' => 'PREP: cuatro etapas, en este orden', 'id' => 'metodo-titulo', 'lede' => 'Una plantilla gratuita te da un formato. El método te dice qué poner dentro, para qué vacante y cómo sustentarlo en la entrevista.' ) ); ?>

        <ol class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <?php foreach ( [
                ['P · Perfil', 'Dónde está el bloqueo', 'Diagnóstico del punto exacto en el que te estás quedando, definición de tu propuesta de valor y ajuste técnico de la hoja de vida y del perfil de LinkedIn para sistemas ATS.',
                 '<circle cx="9" cy="7.5" r="3.5" stroke="#035A55" stroke-width="1.6"/><path d="M2.5 19c0-3.6 2.9-6.5 6.5-6.5s6.5 2.9 6.5 6.5" stroke="#035A55" stroke-width="1.6" stroke-linecap="round"/><path d="M16 5.5l1.5 1.5L20.5 4" stroke="#F2A63C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>'],
                ['R · Ruta', 'Hacia dónde apuntar', 'Definición del objetivo profesional, selección de vacantes que sí corresponden a tu perfil y mapeo del mercado y de las empresas objetivo de tu sector.',
                 '<path d="M3 5.5l5.5-2 5 2 5.5-2v13l-5.5 2-5-2-5.5 2v-13z" stroke="#035A55" stroke-width="1.6" stroke-linejoin="round"/><path d="M8.5 3.5v13M13.5 5.5v13" stroke="#035A55" stroke-width="1.3" stroke-dasharray="2 2"/>'],
                ['E · Ejecución', 'Cómo se hace', 'Estrategia de postulación, preparación de entrevista con metodología STAR para sustentar tus logros y construcción de red de contactos en el sector al que apuntas.',
                 '<path d="M11 2.5l2.2 4.5 5 .7-3.6 3.5.9 4.9L11 13.8l-4.5 2.3.9-4.9L3.8 7.7l5-.7L11 2.5z" stroke="#035A55" stroke-width="1.6" stroke-linejoin="round"/><path d="M6 19.5h10" stroke="#F2A63C" stroke-width="1.8" stroke-linecap="round"/>'],
                ['P · Progreso', 'Si funciona o no', 'Medición de postulaciones frente a llamadas obtenidas, ajustes iterativos sobre lo que no está dando resultado y acompañamiento continuo durante el plan.',
                 '<path d="M3 19h16" stroke="#035A55" stroke-width="1.6" stroke-linecap="round"/><rect x="4.5" y="12" width="3.2" height="7" stroke="#035A55" stroke-width="1.5"/><rect x="9.4" y="8" width="3.2" height="11" stroke="#035A55" stroke-width="1.5"/><rect x="14.3" y="4" width="3.2" height="15" stroke="#F2A63C" stroke-width="1.7"/>'],
            ] as $i => [$letra, $titulo, $texto, $icono] ) : ?>
                <li class="tarjeta group revelar relative flex flex-col gap-3 overflow-hidden p-6">
                    <span class="absolute top-4 right-5 font-display text-5xl font-extrabold text-gris-50 transition-colors duration-300 group-hover:text-teal-300/25" aria-hidden="true">0<?php echo esc_html( $i + 1 ); ?></span>
                    <span class="relative flex size-12 shrink-0 items-center justify-center rounded-[10px] border border-gris-200 bg-gris-50 transition-all duration-300 ease-in-out group-hover:-rotate-6 group-hover:bg-white group-hover:shadow-md">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" aria-hidden="true"><?php echo $icono; ?></svg>
                    </span>
                    <span class="relative font-display text-sm font-bold tracking-[0.12em] text-teal-800 uppercase"><?php echo esc_html( $letra ); ?></span>
                    <h3 class="relative !text-h4"><?php echo esc_html( $titulo ); ?></h3>
                    <p class="relative leading-[1.55] text-gris-600"><?php echo esc_html( $texto ); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
