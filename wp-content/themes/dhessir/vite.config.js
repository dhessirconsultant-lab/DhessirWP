import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

// Compila los estilos y scripts del tema en dist/. functions.php lee dist/.vite/manifest.json.
export default defineConfig({
    plugins: [tailwindcss()],
    base: './',
    build: {
        outDir: 'dist',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: ['resources/css/app.css', 'resources/js/app.js'],
        },
    },
});
