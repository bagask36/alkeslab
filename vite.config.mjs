import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        target: ['chrome90', 'edge90', 'firefox88', 'safari15'],
        cssTarget: ['chrome90', 'edge90', 'firefox88', 'safari15'],
    },
});
