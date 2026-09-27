<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 7 · QUIÉN TE VA A ASESORAR ══ */ ?>
<?php /* Admite más de un consultor sin rediseño: basta con agregar elementos a $consultores. */ ?>
<?php $consultores = [
        [
            'nombre' => 'Jerónimo Rocha',
            'cargo' => 'Consultor principal · Dhessir Consultant',
            'foto' => 'images/jeronimo.jpg',
            'bio' => 'Tecnólogo con más de 5 años de experiencia en recursos humanos en compañías multinacionales. Como generalista de RR. HH. brindó coaching a directores y gerentes, desarrolló programas de liderazgo y comunicación efectiva, y acompañó procesos de selección en múltiples sectores. Hoy lleva ese conocimiento del sector a quienes más lo necesitan: universitarios y profesionales que buscan su próxima oportunidad.',
            'datos' => [['5+ años', 'En recursos humanos en multinacionales'], ['Selección', 'Procesos en múltiples sectores'], ['Bogotá', 'Atención 100 % virtual']],
            'linkedin' => 'https://www.linkedin.com/in/dhessir',
        ],
    ]; ?>
<section class="bg-gris-50 py-12 md:py-16" id="consultores" aria-labelledby="consultor-titulo">
    <div class="contenedor">
        <?php dh_cabecera( array( 'eyebrow' => 'Quién te va a asesorar', 'titulo' => 'No es un curso grabado. Es una persona con nombre.', 'id' => 'consultor-titulo' ) ); ?>

        <?php foreach ( $consultores as $c ) : ?>
            <div class="grid items-start gap-8 lg:grid-cols-[300px_1fr] lg:gap-12">
                <div class="group revelar relative max-w-[300px]">
                    <div class="absolute inset-0 translate-x-3 translate-y-3 rounded-marca bg-teal-300/40 transition-transform duration-300 ease-in-out group-hover:translate-x-4 group-hover:translate-y-4" aria-hidden="true"></div>
                    <div class="relative aspect-[3/4] overflow-hidden rounded-marca border border-gris-200 bg-gris-50 shadow-xl transition-all duration-300 ease-in-out group-hover:-translate-y-1 group-hover:shadow-2xl">
                        <img src="<?php echo esc_url( dh_asset( $c['foto']) ); ?>" alt="Retrato de <?php echo esc_html( $c['nombre'] ); ?>, consultor de Dhessir Consultant"
                             width="600" height="800" loading="lazy"
                             class="size-full object-cover object-[center_15%] transition-transform duration-500 ease-in-out group-hover:scale-105">
                    </div>
                </div>
                <div class="revelar">
                    <p class="font-display text-h3 leading-[1.15] font-bold text-azul-900"><?php echo esc_html( $c['nombre'] ); ?></p>
                    <p class="mt-1.5 font-semibold text-teal-800"><?php echo esc_html( $c['cargo'] ); ?></p>
                    <p class="mt-6 max-w-[62ch] text-lg leading-[1.6] text-gris-600"><?php echo esc_html( $c['bio'] ); ?></p>

                    <div class="mt-8 grid gap-4 border-t border-gris-200 pt-6 md:grid-cols-3 md:gap-6">
                        <?php foreach ( $c['datos'] as [$fuerte, $texto] ) : ?>
                            <div class="rounded-marca p-3 transition-all duration-300 ease-in-out hover:-translate-y-1 hover:bg-white hover:shadow-lg">
                                <strong class="block font-display text-h4 text-azul-900"><?php echo esc_html( $fuerte ); ?></strong>
                                <span class="text-sm text-gris-600"><?php echo esc_html( $texto ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <a class="group/li mt-6 inline-flex min-h-11 items-center gap-2 font-semibold text-teal-800 underline-offset-4 transition-all duration-300 hover:gap-3 hover:text-azul-900 hover:underline"
                       href="<?php echo esc_url( $c['linkedin'] ); ?>" target="_blank" rel="noopener">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M17 1H3a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V3a2 2 0 00-2-2zM6.5 16h-2.5V8h2.5v8zM5.2 6.7A1.45 1.45 0 115.2 3.8a1.45 1.45 0 010 2.9zM16 16h-2.5v-4.3c0-1-.4-1.7-1.3-1.7-.7 0-1.1.5-1.3 1-.1.2-.1.4-.1.7V16H7.5s.03-7.2 0-8H10v1.1c.3-.5 1-1.3 2.4-1.3 1.8 0 3.1 1.2 3.1 3.7V16z"/></svg>
                        Verificar su perfil en LinkedIn
                    </a>
                    <p class="mt-4 max-w-[62ch] text-sm leading-normal text-gris-600">Puedes comprobar la trayectoria antes de agendar. Preferimos que lo hagas: es el respaldo más fuerte que tenemos hoy.</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
