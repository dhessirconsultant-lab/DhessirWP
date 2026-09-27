<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 5 · PARA QUIÉN ES ══ */ ?>
<section class="bg-gris-50 py-12 md:py-16" aria-labelledby="quien-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Para quién es', 'titulo' => 'Tres momentos, tres enfoques distintos', 'id' => 'quien-titulo', 'lede' => 'El diagnóstico es el mismo, pero lo que hay que corregir cambia según dónde estés hoy.' ) ); ?>

        <div class="grid gap-4 md:grid-cols-3">
            <?php foreach ( [
                ['Primer empleo', 'No tienes experiencia formal que mostrar y compites con quienes sí la tienen.', 'Traducir prácticas, proyectos académicos y trabajos informales en logros medibles, y definir un cargo de entrada realista en lugar de aplicar a todo.'],
                ['Cambio de sector', 'Tienes experiencia, pero en otra industria, y el reclutador no ve la conexión con la vacante.', 'Identificar las habilidades transferibles, reescribir la narrativa para que el cambio tenga lógica y construir la respuesta a la pregunta de por qué te estás moviendo.'],
                ['Estancamiento en el mismo cargo', 'Llevas años en la misma posición, aplicas a cargos superiores y no avanzas de la primera fase.', 'Reposicionar el perfil en nivel de responsabilidad y no en antigüedad, preparar la conversación salarial y trabajar la evidencia de liderazgo.'],
            ] as [$titulo, $reto, $enfoque] ) : ?>
                <article class="tarjeta group revelar overflow-hidden">
                    <div class="relative border-b border-gris-200 bg-gris-50 p-6">
                        <span class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-teal-800 transition-transform duration-300 ease-in-out group-hover:scale-x-100" aria-hidden="true"></span>
                        <h3 class="!text-h4"><?php echo esc_html( $titulo ); ?></h3>
                    </div>
                    <dl class="flex flex-col gap-4 p-6">
                        <div>
                            <dt class="mb-1 text-sm font-semibold tracking-[0.06em] text-teal-800 uppercase">Tu reto</dt>
                            <dd class="leading-[1.55] text-gris-600"><?php echo esc_html( $reto ); ?></dd>
                        </div>
                        <div>
                            <dt class="mb-1 text-sm font-semibold tracking-[0.06em] text-teal-800 uppercase">Nuestro enfoque</dt>
                            <dd class="leading-[1.55] text-gris-600"><?php echo esc_html( $enfoque ); ?></dd>
                        </div>
                    </dl>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
