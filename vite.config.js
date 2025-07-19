import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    base: '/build/',
    build: {
        manifest: true,
        outDir: 'public/build',
        assetsDir: 'assets',
        emptyOutDir: true,
        rollupOptions: {
            input: ['resources/css/app.css', 'resources/js/app.js'],
            output: {
                entryFileNames: 'assets/[name]-[hash].js',
                chunkFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash][extname]',
            },
        },
    },
});
