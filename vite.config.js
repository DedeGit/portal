import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/assets/scss/style.scss',  // path ke SCSS Anda
                'resources/js/app.js',             // path ke JS Laravel standar
            ],
            refresh: true,
        }),
    ],
});
