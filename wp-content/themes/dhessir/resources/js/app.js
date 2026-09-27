import { iniciarMenu } from './menu';
import { iniciarDiagnostico } from './diagnostico';
import { iniciarAnatomia } from './anatomia';

/* ── Revelado al hacer scroll ─────────────────────────────── */
function iniciarRevelado() {
    const elementos = document.querySelectorAll('.revelar');
    if (!('IntersectionObserver' in window)) {
        elementos.forEach((el) => el.classList.add('visible'));
        return;
    }
    const observador = new IntersectionObserver((entradas) => {
        entradas.forEach((entrada) => {
            if (entrada.isIntersecting) {
                entrada.target.classList.add('visible');
                observador.unobserve(entrada.target);
            }
        });
    }, { rootMargin: '0px 0px -60px 0px', threshold: 0.1 });
    elementos.forEach((el) => observador.observe(el));
}

/* ── Sombra del encabezado y barra móvil de conversión ────── */
function iniciarScroll() {
    const encabezado = document.querySelector('[data-encabezado]');
    const barra = document.getElementById('barra-movil');
    const agenda = document.getElementById('agenda');

    const actualizar = () => {
        encabezado?.classList.toggle('shadow-lg', window.scrollY > 8);
        if (barra) {
            // Aparece tras 400px y se oculta cuando el formulario ya está en pantalla
            const enAgenda = agenda ? agenda.getBoundingClientRect().top < window.innerHeight * 0.9 : false;
            barra.dataset.visible = String(window.scrollY > 400 && !enAgenda);
        }
    };
    window.addEventListener('scroll', actualizar, { passive: true });
    actualizar();
}

/* ── Formulario: evita envíos dobles ──────────────────────── */
function iniciarFormulario() {
    document.querySelectorAll('[data-formulario]').forEach((form) => {
        form.addEventListener('submit', () => {
            const boton = form.querySelector('button[type="submit"]');
            if (boton) {
                boton.disabled = true;
                boton.textContent = 'Enviando…';
            }
        });
    });
}

iniciarMenu();
iniciarDiagnostico();
iniciarAnatomia();
iniciarRevelado();
iniciarScroll();
iniciarFormulario();
