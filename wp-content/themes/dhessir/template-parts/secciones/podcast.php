<?php defined( 'ABSPATH' ) || exit; ?>
<?php /* ══ 9 · PODCAST ══ */ ?>
<section class="bg-gris-50 py-12 md:py-16" id="podcast" aria-labelledby="podcast-titulo">
    <div class="contenedor grid items-center gap-8 lg:grid-cols-[1fr_1.2fr] lg:gap-12">
        <div class="revelar">
            <p class="eyebrow">Podcast</p>
            <h2 id="podcast-titulo">Escúchanos antes de contratarnos</h2>
            <p class="lede mt-4">El criterio con el que trabajamos está publicado y es gratis. Si lo que decimos en el podcast te sirve, la sesión te va a servir más.</p>
            <a class="btn-secundario mt-6" href="<?php echo esc_url( DH_SPOTIFY ); ?>" target="_blank" rel="noopener">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" aria-hidden="true"><path d="M9 .8a8.2 8.2 0 100 16.4A8.2 8.2 0 009 .8zm3.8 11.9a.64.64 0 01-.88.21c-2.4-1.47-5.42-1.8-8.98-.99a.64.64 0 11-.28-1.25c3.9-.89 7.24-.5 9.93 1.14.3.19.4.58.21.89zm1.01-2.26a.8.8 0 01-1.1.26c-2.75-1.69-6.94-2.18-10.19-1.19a.8.8 0 11-.46-1.53c3.71-1.13 8.33-.58 11.49 1.36a.8.8 0 01.26 1.1zm.09-2.35C10.6 6.13 5.35 5.95 2.2 6.9a.96.96 0 11-.56-1.84c3.62-1.1 9.42-.89 13.13 1.31a.96.96 0 01-.98 1.65z"/></svg>
                Ver todos los episodios en Spotify
            </a>
        </div>

        <?php /* Reproductor oficial de Spotify con los episodios reales del programa */ ?>
        <div class="revelar overflow-hidden rounded-marca bg-white shadow-xl transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl">
            <iframe src="https://open.spotify.com/embed/show/<?php echo esc_html( DH_SPOTIFY_SHOW_ID ); ?>?utm_source=generator"
                    width="100%" height="352" class="block border-0"
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy" title="Podcast de Dhessir Consultant en Spotify"></iframe>
        </div>
    </div>
</section>
