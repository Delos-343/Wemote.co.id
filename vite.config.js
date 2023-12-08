import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
import react from '@vitejs/plugin-react';
=======
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: 'resources/js/app.tsx',
            refresh: true,
        }),
        react(),
=======
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
    ],
});
