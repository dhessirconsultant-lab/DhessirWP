<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 12 · PREGUNTAS FRECUENTES · <details> nativos, sin JS ══ */ ?>
<section class="bg-white py-12 md:py-16" id="faq" aria-labelledby="faq-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Preguntas frecuentes', 'titulo' => 'Lo que nos preguntan antes de agendar', 'id' => 'faq-titulo', 'centrado' => true ) ); ?>

        <div class="mx-auto max-w-[860px]">
            <?php foreach ( [
                ['¿En qué se diferencia esto de una plantilla gratis o de una herramienta de IA?', [
                    'Una plantilla te da un formato y una herramienta de IA te da un texto. Ninguna de las dos te dice <strong>en cuál de los tres puntos te estás quedando</strong>, ni si el cargo al que estás aplicando corresponde a tu perfil, ni cómo sustentar en voz alta lo que escribiste.',
                    'Si tu único problema es el formato, una plantilla te sirve y te lo vamos a decir en la sesión gratuita. El trabajo empieza cuando el problema es el criterio: qué poner, para qué vacante y cómo defenderlo en la entrevista.']],
                ['¿La sesión gratuita de verdad no tiene costo?', [
                    'Sí. Son 30 minutos por videollamada, sin costo y sin compromiso de compra. No pedimos datos de tarjeta y no hay letra menuda.',
                    'Existe porque nos conviene: evita que pagues por un plan que no necesitas y nos permite llegar preparados. Si al final de la sesión vemos que no necesitas un plan, te lo decimos.']],
                ['¿Me garantizan que consigo empleo?', [
                    '<strong>No.</strong> Nadie honesto puede garantizarlo: depende del mercado, del sector, del momento y de tu ejecución.',
                    'Lo que sí garantizamos es <strong>método, preparación y retroalimentación</strong>: sales con la hoja de vida ajustada a los filtros, el perfil de LinkedIn alineado, una ruta de postulación con criterio y tus respuestas de entrevista estructuradas. Cualquiera que te prometa la contratación te está vendiendo algo que no controla.']],
                ['¿Funciona si no tengo experiencia o si estoy cambiando de sector?', [
                    'Son dos de los tres perfiles que más atendemos. Sin experiencia formal el trabajo está en traducir prácticas, proyectos académicos y trabajos informales en logros medibles, y en definir un cargo de entrada realista.',
                    'En cambio de sector el trabajo está en las habilidades transferibles y en construir la narrativa que le da lógica al movimiento, porque esa es la primera pregunta que te van a hacer.']],
                ['¿Cuánto tiempo tengo que dedicarle?', [
                    'Las sesiones son de 30 a 60 minutos. Entre sesiones hay tareas concretas que toman entre una y dos horas por semana: ajustar el documento, preparar logros, armar la lista de vacantes.',
                    'Brújula se resuelve en una semana, Mapa en dos o tres y Expedición acompaña durante un mes completo. El plan no avanza solo: la ejecución es tuya.']],
                ['¿Cómo se paga y qué medios aceptan?', [
                    'Aceptamos tarjeta débito y crédito, PSE y Nequi. El cierre se hace por WhatsApp Business, que es el canal oficial de atención.',
                    'El plan Expedición puede dividirse en dos cuotas. También manejamos tarifas preferenciales si llegas por convenio con una universidad o una caja de compensación, y descuento por referido.']],
            ] as [$pregunta, $respuesta] ) : ?>
                <details class="group revelar mb-3 overflow-hidden rounded-marca border border-gris-200 bg-white shadow-xs transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:shadow-lg open:border-teal-800 open:shadow-xl">
                    <summary class="flex min-h-16 cursor-pointer list-none items-center justify-between gap-4 p-6 font-display text-lg font-semibold text-azul-900 [&::-webkit-details-marker]:hidden
                                    after:flex after:size-8 after:shrink-0 after:items-center after:justify-center after:rounded-full after:border after:border-gris-200 after:bg-gris-50 after:font-body after:text-xl after:font-normal after:text-teal-800 after:transition-all after:duration-300 after:content-['+']
                                    group-open:after:rotate-180 group-open:after:border-teal-800 group-open:after:bg-teal-800 group-open:after:text-white group-open:after:content-['–']">
                        <?php echo esc_html( $pregunta ); ?>
                    </summary>
                    <div class="max-w-[70ch] space-y-4 px-6 pb-6 leading-[1.6] text-gris-600 [&_strong]:text-azul-900">
                        <?php foreach ( $respuesta as $parrafo ) : ?>
                            <p><?php echo $parrafo; ?></p>
                        <?php endforeach; ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
