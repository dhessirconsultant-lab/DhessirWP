/* Menú móvil a pantalla completa: Escape o × lo cierran, el foco entra al primer
   enlace al abrir y vuelve a la hamburguesa al cerrar; el body bloquea el scroll. */
export function iniciarMenu() {
    const menu = document.getElementById('menu-movil');
    const abrir = document.querySelector('[data-abrir-menu]');
    if (!menu || !abrir) return;

    const estaAbierto = () => menu.dataset.abierto === 'true';

    function cambiar(abierto) {
        menu.dataset.abierto = String(abierto);
        abrir.setAttribute('aria-expanded', String(abierto));
        document.body.style.overflow = abierto ? 'hidden' : '';
        if (abierto) {
            menu.querySelector('a')?.focus();
        } else {
            abrir.focus();
        }
    }

    abrir.addEventListener('click', () => cambiar(!estaAbierto()));
    menu.querySelectorAll('[data-cerrar-menu]').forEach((el) => {
        el.addEventListener('click', () => cambiar(false));
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && estaAbierto()) cambiar(false);
    });
    // Si la pantalla crece hasta escritorio con el menú abierto, se cierra
    window.matchMedia('(min-width: 1024px)').addEventListener('change', (e) => {
        if (e.matches && estaAbierto()) cambiar(false);
    });
}
