# Dhessir Consultant · Sitio en WordPress

Réplica en WordPress del sitio de **Dhessir Consultant**, consultoría de empleabilidad 100 % virtual con sede en Bogotá. Conserva la misma marca, logo, paleta, sombras y microinteracciones del sitio hecho en código ([DhessirApp](https://github.com/dhessirconsultant-lab/DhessirApp)).

Taller Práctico CMS · Diseño y Programación Web · UNILATINA · 2026-II

## Stack

| Capa | Tecnología |
|---|---|
| Entorno | Ubuntu 24.04 sobre WSL 2 · Docker · Lando (`recipe: wordpress`) |
| CMS | WordPress en español (es_CO) con PHP 8.2 y MariaDB |
| Maquetación | **Ruta A:** tema a medida `dhessir` con Tailwind CSS 4 compilado con Vite |
| Interacción | JavaScript modular sin dependencias |

## Cómo ejecutarlo

Requisitos: Ubuntu en WSL 2, Docker y [Lando](https://lando.dev).

```bash
git clone https://github.com/dhessirconsultant-lab/DhessirWP.git
cd DhessirWP
lando start
lando wp core download --locale=es_CO --skip-content
lando wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database --locale=es_CO
lando db-import database.sql
```

Sitio: **https://dhessir-wp.lndo.site** · Panel: **https://dhessir-wp.lndo.site/wp-admin** (usuario `dhessir`; la contraseña se entrega por aparte).

Los estilos compilados ya vienen en `wp-content/themes/dhessir/dist/`. Para modificarlos:

```bash
lando npm install
lando build            # o `lando npm run dev` para recompilar en cada cambio
```

Otros comandos:

```bash
lando db-export --stdout > database.sql                  # actualiza el volcado de la base de datos
lando info                                              # URLs y datos de conexión
lando stop
```

### Instalación desde cero (sin `database.sql`)

`scripts/configurar-sitio.sh` arma todo el contenido sobre un WordPress recién instalado: activa el tema, crea las páginas y el menú, y sube el logo y el ícono.

## Páginas y menú

El menú principal se gestiona en **Apariencia → Menús** y tiene cinco páginas. En pantallas pequeñas se convierte en menú hamburguesa.

| Página | Slug | Plantilla | Contenido |
|---|---|---|---|
| Inicio | `inicio` (portada) | `front-page.php` | Hero, diagnóstico interactivo, compatibilidad ATS, caso y agendamiento |
| Método | `metodo` | `page-metodo.php` | Método PREP, para quién es y anatomía interactiva de una hoja de vida |
| Planes | `planes` | `page-planes.php` | Planes Brújula, Mapa y Expedición, y preguntas frecuentes |
| Nosotros | `nosotros` | `page-nosotros.php` | Consultor, podcast (reproductor de Spotify) y blog |
| Contacto | `contacto` | `page-contacto.php` | Canales de contacto y formulario de agendamiento |

Además está la **Política de datos** (`politica-de-datos`), exigida por la Ley 1581 de 2012. Su texto se edita directamente en el editor de WordPress.

### Qué se edita desde el panel

- **Menú:** Apariencia → Menús.
- **Logo:** Apariencia → Personalizar → Identidad del sitio. Es el SVG oficial, que aparece en el encabezado.
- **Encabezado de cada página:** el titular grande sale del campo personalizado `dh_titular` y el texto de apoyo sale del **Extracto** de la página.
- **Política de datos:** el contenido completo de la página.
- **Solicitudes del formulario:** menú **Solicitudes**, con nombre, correo, WhatsApp, en qué punto se está quedando la persona y la fecha de autorización de datos.

## Sistema de diseño

El tema usa los mismos tokens del sitio en código, definidos en [`resources/css/app.css`](wp-content/themes/dhessir/resources/css/app.css):

| Token | Color | Uso |
|---|---|---|
| `azul-900` | `#184264` | Titulares, texto principal y fondos oscuros |
| `teal-800` | `#035A55` | Enlaces, botón secundario y foco |
| `teal-500` | `#59908B` | Iconos y bordes |
| `teal-300` | `#76ABA5` | Fondos y decoración |
| `acento` | `#F2A63C` | Solo el botón principal (con texto azul, nunca blanco) |

- **Tipografía:** Manrope para titulares e Inter para el cuerpo. Se sirven desde el propio tema, sin peticiones a Google.
- **Sombras multicapa:** la escala `shadow-sm` … `shadow-2xl` está redefinida con sombras de varias capas teñidas con el azul de la marca.
- **Microinteracciones:** tarjetas y botones se elevan con `hover:-translate-y-1` y `transition-all duration-300 ease-in-out`. Las secciones aparecen con animación al hacer scroll.
- **Sin apariencia de plantilla:** el tema no usa los estilos de bloques de WordPress en el sitio público; todo el diseño es propio.
- **Accesibilidad:** zonas táctiles de 44 px, foco visible, enlace para saltar al contenido, un solo `<h1>` por página y respeto por `prefers-reduced-motion`.

## Seguridad

- Formulario con nonce de WordPress, validación en el servidor y mensajes en español
- Consentimiento obligatorio de tratamiento de datos (Ley 1581 de 2012)
- Límite de 5 envíos por minuto por IP y campo trampa contra bots
- Las solicitudes se guardan como contenido privado, visible solo en el panel
- Redirecciones solo a páginas propias del sitio
- Encabezados HTTP de seguridad (`X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`)
- Subida de SVG permitida solo a administradores, rechazando archivos con scripts
- `wp-config.php` no se versiona

## Estructura

```
.lando.yml                         Receta de Lando (WordPress + MariaDB + Node)
database.sql                       Volcado de la base de datos (lando db-export)
scripts/configurar-sitio.sh        Crea páginas, menú, logo e ícono en una instalación limpia
wp-content/uploads/                Logo e ícono subidos a la biblioteca de medios
wp-content/themes/dhessir/
├── functions.php                  Configuración del tema y carga de estilos
├── inc/                           Ayudantes, formulario (solicitudes) y seguridad
├── header.php · footer.php        Encabezado con menú y pie de página
├── front-page.php · page-*.php    Plantillas de cada página
├── template-parts/secciones/      Las 13 secciones del sitio
├── resources/css · resources/js   Fuentes de Tailwind y JavaScript
├── dist/                          Estilos y scripts compilados
└── assets/images/                 Logo, ícono y fotos
```

## Entrega

El `.zip` para Google Drive se genera desde el repositorio (sin `node_modules/`):

```bash
git archive --format=zip --output=DhessirWP.zip HEAD
```
