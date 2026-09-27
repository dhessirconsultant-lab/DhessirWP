/* Componente de diagnóstico: una tarjeta activa a la vez; pulsar la activa la colapsa.
   Al elegir una, el campo "¿En qué punto te estás quedando?" del formulario se precarga. */
const DIAGNOSTICOS = {
    hv: {
        etiqueta: 'Punto 1 · El documento',
        titulo: 'El problema está antes de que alguien te lea',
        descripcion: 'Si aplicas y no recibes ni un rechazo automático, lo más probable es que tu hoja de vida no esté llegando a una persona. El sistema no la está leyendo bien o no encuentra en ella los términos de la vacante.',
        lista: [
            'Formato con tablas, columnas o cuadros de texto que el sistema no logra extraer.',
            'Perfil profesional escrito en aspiraciones en lugar de especialidad y experiencia.',
            'Ausencia de las palabras clave que usa la vacante a la que estás aplicando.',
            'Responsabilidades en lugar de logros medibles.',
        ],
        plan: 'Plan Brújula · $70.000',
        razon: 'Resuelve exactamente esto: hoja de vida ajustada a filtros ATS, LinkedIn optimizado, una sesión de 60 minutos y tu guía descargable.',
    },
    entrevista: {
        etiqueta: 'Punto 2 · La entrevista',
        titulo: 'Tu documento funciona. La conversación no cierra.',
        descripcion: 'Si te llaman pero nunca hay segunda fase, el documento ya está haciendo su trabajo. Lo que falta es estructura en las respuestas: contar logros sin método suena a relato y no a evidencia.',
        lista: [
            'Respuestas improvisadas, sin situación, tarea, acción y resultado.',
            'Logros sin cifras que los sustenten.',
            'Ninguna respuesta preparada para la pregunta de debilidades o de salario.',
            'Falta de conexión explícita entre tu experiencia y lo que pide la vacante.',
        ],
        plan: 'Plan Mapa · $150.000',
        razon: 'Incluye todo lo de Brújula más el simulacro de entrevista con metodología STAR y la retroalimentación escrita. Tres sesiones.',
    },
    ruta: {
        etiqueta: 'Punto 3 · El rumbo',
        titulo: 'Estás aplicando a todo, y eso te está costando',
        descripcion: 'Postular de forma dispersa parece aumentar las probabilidades, pero produce lo contrario: un perfil que no le queda claro a nadie. Sin un objetivo definido no hay documento ni entrevista que funcione.',
        lista: [
            'Postulaciones a cargos de niveles y sectores muy distintos entre sí.',
            'Sin claridad sobre el cargo objetivo ni el rango salarial realista.',
            'Sin lista de empresas objetivo ni criterio para armarla.',
            'Volumen alto de aplicaciones con tasa de respuesta muy baja.',
        ],
        plan: 'Plan Expedición · $200.000',
        razon: 'Todo lo de Mapa más cuatro semanas de acompañamiento en la estrategia de postulación, negociación salarial y soporte por WhatsApp. Cinco sesiones.',
    },
};

const ICONO = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="mt-1 shrink-0"><circle cx="8" cy="8" r="7" stroke="#59908B" stroke-width="1.3"/><path d="M8 4.8v4.4M8 11.2h.01" stroke="#035A55" stroke-width="1.6" stroke-linecap="round"/></svg>';

export function iniciarDiagnostico() {
    const panel = document.getElementById('diag-panel');
    const vacio = document.getElementById('diag-vacio');
    const tarjetas = document.querySelectorAll('[data-diag]');
    if (!panel || !tarjetas.length) return;

    const selectPunto = document.getElementById('punto');
    const ayudaPunto = document.getElementById('punto-ayuda');
    const slot = (nombre) => panel.querySelector(`[data-slot="${nombre}"]`);

    tarjetas.forEach((tarjeta) => {
        tarjeta.addEventListener('click', () => {
            const clave = tarjeta.dataset.diag;
            const yaActiva = tarjeta.getAttribute('aria-pressed') === 'true';
            tarjetas.forEach((t) => t.setAttribute('aria-pressed', 'false'));

            if (yaActiva) {
                panel.hidden = true;
                vacio.hidden = false;
                return;
            }

            const d = DIAGNOSTICOS[clave];
            tarjeta.setAttribute('aria-pressed', 'true');
            slot('etiqueta').textContent = d.etiqueta;
            slot('titulo').textContent = d.titulo;
            slot('descripcion').textContent = d.descripcion;
            slot('plan').textContent = d.plan;
            slot('plan-razon').textContent = d.razon;

            const lista = slot('lista');
            lista.replaceChildren(...d.lista.map((texto) => {
                const li = document.createElement('li');
                li.className = 'flex gap-2.5 leading-normal';
                li.innerHTML = ICONO + '<span></span>';
                li.querySelector('span').textContent = texto;
                return li;
            }));

            panel.hidden = false;
            vacio.hidden = true;

            if (selectPunto) {
                selectPunto.value = clave;
                if (ayudaPunto) ayudaPunto.textContent = 'Precargado desde tu selección en el diagnóstico. Puedes cambiarlo.';
            }
        });
    });
}
