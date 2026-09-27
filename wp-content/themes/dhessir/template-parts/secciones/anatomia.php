<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 10 · ANATOMÍA DE UNA HOJA DE VIDA ══ */ ?>
<?php // Botón de 44x44 (zona táctil); el círculo ámbar visible de 32px se dibuja con ::before
    $punto = 'group/punto relative z-[3] ml-auto flex size-11 cursor-pointer items-center justify-center rounded-full border-0 bg-transparent p-0 lg:absolute lg:-right-[18px] lg:ml-0
              before:flex before:size-8 before:items-center before:justify-center before:rounded-full before:border-2 before:border-white before:bg-acento before:font-display before:text-[0.8125rem] before:font-bold before:text-azul-900 before:shadow-md before:content-[attr(data-punto)]
              before:transition-all before:duration-300 before:ease-in-out hover:before:scale-115 hover:before:bg-acento-hover hover:before:shadow-lg
              aria-expanded:before:scale-115 aria-expanded:before:bg-azul-900 aria-expanded:before:text-white
              after:absolute after:inset-1.5 after:-z-10 after:animate-ping after:rounded-full after:bg-acento/40 aria-expanded:after:hidden motion-reduce:after:hidden';
    $explicaciones = [
        1 => ['Encabezado y datos de contacto', 'El encabezado es lo primero que lee el sistema y lo primero que descarta un reclutador. Se elimina la foto, la dirección exacta, el estado civil y el número de documento: no aportan a la decisión y en muchos sistemas rompen la lectura del archivo.',
              ['Lo que suele aparecer', 'Foto, cédula, dirección completa, edad y estado civil en una tabla de dos columnas.'],
              ['Lo que hacemos', 'Nombre, ciudad, correo profesional, celular y URL de LinkedIn en una sola línea de texto plano, legible para cualquier ATS.'], null],
        2 => ['Perfil profesional', 'Aquí es donde se gana o se pierde la lectura. El perfil no describe aspiraciones: declara qué eres, cuánta experiencia tienes y en qué te especializas, usando el lenguaje de la vacante a la que apuntas.',
              ['Antes', '«Profesional proactiva, responsable y con deseos de crecer en una empresa que me permita desarrollarme.»'],
              ['Después', '«Profesional en administración con cuatro años en gestión de talento humano. Especializada en selección de alto volumen y reducción de tiempos de contratación.»'],
              'Corresponde a la etapa <strong>Perfil</strong> del método PREP.'],
        3 => ['Logros con metodología STAR', 'Una responsabilidad dice qué te pagaban por hacer. Un logro dice qué pasó porque tú estabas ahí. Cada viñeta se construye con situación, tarea, acción y resultado — y el resultado va con número.',
              ['Responsabilidad (débil)', '«Encargada de los procesos de selección de la compañía.»'],
              ['Logro STAR (fuerte)', '«Reduje el tiempo promedio de contratación de 38 a 24 días al rediseñar el flujo de preselección para 12 vacantes simultáneas.»'],
              'Esta es la misma estructura que vas a usar para responder en la entrevista. Corresponde a la etapa <strong>Ejecución</strong>.'],
        4 => ['Competencias y palabras clave', 'Los sistemas ATS puntúan coincidencia de términos. Las competencias no se inventan: se toman del texto de las vacantes reales a las que vas a aplicar, y solo se listan las que puedes sustentar en una entrevista.',
              ['Lo que resta', 'Barras de progreso, estrellas o porcentajes de dominio. El sistema no las lee y el reclutador no las cree.'],
              ['Lo que suma', 'Términos técnicos en texto plano, tomados del lenguaje del sector al que apuntas.'],
              'Corresponde a la etapa <strong>Ruta</strong>: qué palabras usar depende de a dónde quieres llegar.'],
        5 => ['Formato y legibilidad', 'El archivo tiene que sobrevivir a la conversión a texto. Una hoja de vida bien diseñada en un editor gráfico puede llegar vacía al reclutador si el sistema no logra extraer su contenido.',
              ['Rompe la lectura', 'Tablas, columnas, cuadros de texto, iconos, encabezados y pies de página, y el contenido exportado como imagen.'],
              ['Se lee siempre', 'Una sola columna, jerarquía con negrita y tamaño, fechas en formato consistente y exportación a PDF con texto seleccionable.'],
              'Prueba rápida: abre tu PDF e intenta seleccionar el texto con el cursor. Si no puedes, el sistema tampoco.'],
    ]; ?>
<section class="bg-white py-12 md:py-16" id="anatomia" aria-labelledby="anatomia-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Anatomía de una hoja de vida', 'titulo' => 'Cinco decisiones técnicas, explicadas', 'id' => 'anatomia-titulo', 'lede' => 'Esta es una hoja de vida anonimizada, estructurada con el método PREP. Abre cada punto y ve exactamente qué se cambió y por qué.' ) ); ?>

        <div class="grid items-start gap-8 lg:grid-cols-[1.1fr_1fr]">
            <?php /* Maqueta de la hoja de vida con puntos calientes */ ?>
            <div class="revelar relative rounded-marca border border-gris-200 bg-white p-6 text-sm leading-normal shadow-2xl md:p-8 lg:mr-5">
                <p class="font-display text-xl font-bold tracking-[0.02em] text-azul-900">A. M. — Perfil anonimizado</p>
                <p class="mt-1 text-[0.8125rem] text-gris-600">Bogotá, Colombia · correo@ejemplo.com · +57 3XX XXX XXXX · linkedin.com/in/perfil</p>
                <button class="<?php echo esc_attr( $punto ); ?> lg:top-5" type="button" aria-expanded="false" aria-controls="expl-1" data-punto="1" aria-label="Ver explicación del punto 1: encabezado y contacto"></button>

                <div class="mt-6 border-t border-gris-200 pt-4">
                    <p class="mb-2 text-[0.6875rem] font-bold tracking-[0.12em] text-teal-800 uppercase">Perfil profesional</p>
                    <p>Profesional en administración con cuatro años en gestión de talento humano. Especializada en procesos de selección de alto volumen y en la reducción de tiempos de contratación en compañías de servicios.</p>
                    <button class="<?php echo esc_attr( $punto ); ?> lg:top-[144px]" type="button" aria-expanded="false" aria-controls="expl-2" data-punto="2" aria-label="Ver explicación del punto 2: perfil profesional"></button>
                </div>

                <div class="mt-6 border-t border-gris-200 pt-4">
                    <p class="mb-2 text-[0.6875rem] font-bold tracking-[0.12em] text-teal-800 uppercase">Experiencia</p>
                    <p class="font-semibold text-azul-900">Analista de selección</p>
                    <p class="text-[0.8125rem] text-gris-600">Compañía del sector servicios · 2023 – 2026</p>
                    <ul class="mt-2 flex flex-col gap-1.5">
                        <?php foreach ( [
                            'Reduje el tiempo promedio de contratación de 38 a 24 días al rediseñar el flujo de preselección para 12 vacantes simultáneas.',
                            'Aumenté en 30 % la tasa de aceptación de ofertas al estandarizar la comunicación salarial desde la primera entrevista.',
                            'Lideré la migración del proceso a un sistema ATS, capacitando a 9 personas del equipo.',
                        ] as $logro ) : ?>
                            <li class="relative pl-3.5 before:absolute before:top-2 before:left-0 before:size-[5px] before:rounded-full before:bg-teal-500"><?php echo esc_html( $logro ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button class="<?php echo esc_attr( $punto ); ?> lg:top-[262px]" type="button" aria-expanded="false" aria-controls="expl-3" data-punto="3" aria-label="Ver explicación del punto 3: logros con metodología STAR"></button>
                </div>

                <div class="mt-6 border-t border-gris-200 pt-4">
                    <p class="mb-2 text-[0.6875rem] font-bold tracking-[0.12em] text-teal-800 uppercase">Competencias técnicas</p>
                    <div class="mt-2 flex flex-wrap gap-1.5">
                        <?php foreach ( ['Selección por competencias', 'Sistemas ATS', 'Entrevista por incidentes críticos', 'Excel avanzado', 'Indicadores de gestión'] as $skill ) : ?>
                            <span class="rounded-full border border-gris-200 bg-gris-50 px-2.5 py-1 text-xs text-texto"><?php echo esc_html( $skill ); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <button class="<?php echo esc_attr( $punto ); ?> lg:bottom-[90px]" type="button" aria-expanded="false" aria-controls="expl-4" data-punto="4" aria-label="Ver explicación del punto 4: competencias y palabras clave"></button>
                </div>

                <div class="mt-6 border-t border-gris-200 pt-4">
                    <p class="mb-2 text-[0.6875rem] font-bold tracking-[0.12em] text-teal-800 uppercase">Formación</p>
                    <p class="font-semibold text-azul-900">Administración de Empresas</p>
                    <p class="text-[0.8125rem] text-gris-600">Universidad · Bogotá · 2022</p>
                    <button class="<?php echo esc_attr( $punto ); ?> lg:bottom-3" type="button" aria-expanded="false" aria-controls="expl-5" data-punto="5" aria-label="Ver explicación del punto 5: formato y legibilidad"></button>
                </div>
            </div>

            <?php /* Panel de explicaciones */ ?>
            <aside class="revelar rounded-marca border border-gris-200 bg-gris-50 p-6 shadow-lg md:p-8 lg:sticky lg:top-24" aria-live="polite">
                <p class="eyebrow">Explicación técnica</p>
                <p class="text-sm leading-normal text-gris-600" id="anatomia-pista">Toca cualquiera de los cinco puntos ámbar sobre la hoja de vida para ver qué decisión se tomó ahí y por qué.</p>

                <?php foreach ( $explicaciones as $n => [$titulo, $texto, $mal, $bien, $nota] ) : ?>
                    <div id="expl-<?php echo esc_html( $n ); ?>" hidden class="animate-aparecer">
                        <h3 class="mb-4 !text-h4"><?php echo esc_html( $n ); ?> · <?php echo esc_html( $titulo ); ?></h3>
                        <p class="mb-4 leading-[1.6] text-gris-600"><?php echo esc_html( $texto ); ?></p>
                        <div class="mt-4 grid gap-2.5">
                            <div class="rounded-lg border-l-3 border-error bg-error/6 px-3.5 py-3 text-sm leading-normal">
                                <strong class="mb-1 block text-xs tracking-[0.08em] text-error uppercase"><?php echo esc_html( $mal[0] ); ?></strong><?php echo esc_html( $mal[1] ); ?>
                            </div>
                            <div class="rounded-lg border-l-3 border-teal-800 bg-teal-800/7 px-3.5 py-3 text-sm leading-normal">
                                <strong class="mb-1 block text-xs tracking-[0.08em] text-teal-800 uppercase"><?php echo esc_html( $bien[0] ); ?></strong><?php echo esc_html( $bien[1] ); ?>
                            </div>
                        </div>
                        <?php if ( $nota ) : ?>
                            <p class="mt-4 text-sm leading-normal text-gris-600"><?php echo $nota; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <nav class="mt-6 flex gap-1.5 border-t border-gris-200 pt-6" aria-label="Navegar entre los puntos de la hoja de vida">
                    <?php foreach ( range(1, 5) as $n ) : ?>
                        <button type="button" data-ir="<?php echo esc_attr( $n ); ?>" aria-current="false"
                                class="size-11 cursor-pointer rounded-lg border border-gris-200 bg-white font-display font-bold text-gris-600 transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:shadow-md aria-[current=true]:border-azul-900 aria-[current=true]:bg-azul-900 aria-[current=true]:text-white"><?php echo esc_html( $n ); ?></button>
                    <?php endforeach; ?>
                </nav>
            </aside>
        </div>
    </div>
</section>
