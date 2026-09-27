#!/usr/bin/env bash
# Configura el contenido del sitio sobre una instalación limpia de WordPress:
# tema, páginas, menú, logo, ícono y ajustes. Se ejecuta desde la raíz del repositorio:
#   ./scripts/configurar-sitio.sh
# Si ya importaste database.sql no hace falta: el contenido ya viene en la base de datos.
set -euo pipefail
cd "$(dirname "$0")/.."

wp() { lando wp --user=dhessir "$@"; }
TEMA=wp-content/themes/dhessir

echo "→ Tema y ajustes generales"
wp theme activate dhessir
wp option update blogname "Dhessir Consultant"
wp option update blogdescription "Consultoría de empleo"
wp option update timezone_string "America/Bogota"
wp option update date_format "j \\d\\e F \\d\\e Y"
wp rewrite structure '/%postname%/'

echo "→ Contenido de ejemplo de WordPress"
wp post delete $(wp post list --post_type=post,page --format=ids) --force 2>/dev/null || true

# Crea una página y devuelve su ID. Uso: pagina TITULO SLUG ORDEN [TITULAR] [EXTRACTO] [ARCHIVO_CONTENIDO]
pagina() {
	local id
	id=$(wp post create --post_type=page --post_status=publish --post_title="$1" --post_name="$2" \
		--menu_order="$3" --post_excerpt="${5:-}" ${6:+"$6"} --porcelain)
	[ -n "${4:-}" ] && wp post meta update "$id" dh_titular "$4" >/dev/null
	echo "$id"
}

echo "→ Páginas"
INICIO=$(pagina "Inicio" "inicio" 1)
METODO=$(pagina "Método" "metodo" 2 "Primero se diagnostica. Después se ejecuta." \
	"El método PREP ordena tu búsqueda de empleo en cuatro etapas. El orden importa: diagnosticar antes de ejecutar es lo que evita que sigas aplicando sin respuesta.")
PLANES=$(pagina "Planes" "planes" 3 "Tres planes, un mismo punto de partida" \
	"Todos empiezan con la sesión diagnóstica gratuita. Ahí vemos cuál te corresponde — o si no necesitas ninguno.")
NOSOTROS=$(pagina "Nosotros" "nosotros" 4 "Del otro lado de la mesa de selección" \
	"Dhessir es una consultoría de empleabilidad 100 % virtual desde Bogotá. Te asesora alguien que ha estado en procesos de selección, no un curso grabado.")
CONTACTO=$(pagina "Contacto" "contacto" 5 "Hablemos de tu búsqueda de empleo" \
	"Agenda la sesión diagnóstica o escríbenos por el canal que prefieras. Respondemos en menos de 12 horas hábiles.")
POLITICA=$(pagina "Política de datos" "politica-de-datos" 6 "Política de tratamiento de datos personales" \
	"Cómo usamos los datos que nos compartes, conforme a la Ley 1581 de 2012 y sus decretos reglamentarios." \
	scripts/contenido/politica.html)

wp option update show_on_front page
wp option update page_on_front "$INICIO"
wp option update wp_page_for_privacy_policy "$POLITICA"

echo "→ Menú principal"
wp menu delete "Principal" 2>/dev/null || true
wp menu create "Principal" --porcelain >/dev/null
for id in "$INICIO" "$METODO" "$PLANES" "$NOSOTROS" "$CONTACTO"; do
	wp menu item add-post "Principal" "$id" >/dev/null
done
wp menu location assign "Principal" principal

echo "→ Logo (SVG) e ícono del sitio"
LOGO=$(wp media import "$TEMA/assets/images/logo-dhessir.svg" --title="Logo Dhessir Consultant" --alt="Dhessir Consultant" --porcelain)
wp theme mod set custom_logo "$LOGO"
ICONO=$(wp media import "$TEMA/assets/images/favicon-512.png" --title="Ícono Dhessir" --porcelain)
wp option update site_icon "$ICONO"

# Reglas de enlaces permanentes para Apache
if [ ! -f .htaccess ]; then
	cat > .htaccess <<'HT'
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
HT
fi
wp rewrite flush
echo "Listo: https://dhessir-wp.lndo.site"
