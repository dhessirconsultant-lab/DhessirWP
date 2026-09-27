<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 11 · BLOG ══ */ ?>
<section class="bg-gris-50 py-12 md:py-16" id="blog" aria-labelledby="blog-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Blog', 'titulo' => 'Lo que publicamos, sin pedirte el correo', 'id' => 'blog-titulo', 'lede' => 'Contenido de consulta abierto. Si resuelves tu caso leyendo, nos parece bien.' ) ); ?>

        <div class="grid gap-6 md:grid-cols-3">
            <?php foreach ( [
                ['bg-teal-500', 'Filtros ATS', 'Las siete cosas que hacen que un ATS descarte tu hoja de vida', 'Tablas, columnas, encabezados y cuatro errores más de formato que impiden que el sistema lea tu documento.', 'Lectura de 6 min'],
                ['bg-acento', 'Entrevistas', 'Cómo responder «háblame de ti» sin improvisar', 'La estructura de 90 segundos que conecta tu experiencia con la vacante desde la primera respuesta.', 'Lectura de 5 min'],
                ['bg-azul-900', 'Estrategia', 'Por qué aplicar a 50 vacantes por semana te está costando el empleo', 'El costo real de la postulación dispersa y cómo construir una lista de vacantes con criterio.', 'Lectura de 7 min'],
            ] as [$color, $tema, $titulo, $resumen, $lectura] ) : ?>
                <article class="tarjeta group revelar flex flex-col overflow-hidden">
                    <div class="h-1.5 <?php echo esc_html( $color ); ?> transition-all duration-300 ease-in-out group-hover:h-2.5"></div>
                    <div class="flex flex-1 flex-col gap-2.5 p-6">
                        <p class="text-sm font-bold tracking-[0.08em] text-teal-800 uppercase"><?php echo esc_html( $tema ); ?></p>
                        <h3 class="!text-h4"><?php echo esc_html( $titulo ); ?></h3>
                        <p class="flex-1 leading-[1.55] text-gris-600"><?php echo esc_html( $resumen ); ?></p>
                        <div class="flex items-center gap-2.5 border-t border-gris-200 pt-3 text-sm text-gris-600">
                            <span><?php echo esc_html( $lectura ); ?></span>
                            <span aria-hidden="true">·</span>
                            <span class="inline-flex min-h-11 items-center font-semibold text-teal-800">Próximamente</span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
