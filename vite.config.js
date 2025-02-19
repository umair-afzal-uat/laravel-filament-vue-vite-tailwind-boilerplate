import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: '0.0.0.0',  // Listen on all network interfaces
        port: 5173,
        hmr: {
            host: 'localhost',  // Use localhost for hot module replacement
        },
        watch: {
            usePolling: true, // Helps with file updates inside Docker
        },
    },
});
