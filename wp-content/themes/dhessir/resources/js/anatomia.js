/* Anatomía de una hoja de vida: cinco puntos calientes y una navegación numérica.
   Pulsar el punto activo lo colapsa y devuelve la pista inicial. */
export function iniciarAnatomia() {
    const puntos = document.querySelectorAll('[data-punto]');
    if (!puntos.length) return;

    const navegacion = document.querySelectorAll('[data-ir]');
    const pista = document.getElementById('anatomia-pista');

    function mostrar(n) {
        const activo = document.querySelector(`[data-punto="${n}"]`);
        const cerrar = activo?.getAttribute('aria-expanded') === 'true';

        puntos.forEach((p) => p.setAttribute('aria-expanded', 'false'));
        navegacion.forEach((b) => b.setAttribute('aria-current', 'false'));
        document.querySelectorAll('[id^="expl-"]').forEach((e) => { e.hidden = true; });

        if (cerrar) {
            pista.hidden = false;
            return;
        }

        activo?.setAttribute('aria-expanded', 'true');
        document.querySelector(`[data-ir="${n}"]`)?.setAttribute('aria-current', 'true');
        const explicacion = document.getElementById(`expl-${n}`);
        if (explicacion) explicacion.hidden = false;
        pista.hidden = true;
    }

    puntos.forEach((p) => p.addEventListener('click', () => mostrar(p.dataset.punto)));
    navegacion.forEach((b) => b.addEventListener('click', () => mostrar(b.dataset.ir)));
}
