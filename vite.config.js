import { defineConfig, splitVendorChunkPlugin } from 'vite'
import liveReload from 'vite-plugin-live-reload'
export default defineConfig({
    root: './resources',
    base: process.env.APP_ENV === 'development' ? '/' : '/dist/',
    plugins: [
        liveReload(['/(modules|config|views|widgets)/**/*.php']),
        splitVendorChunkPlugin()
    ],
    build: {
        // generate manifest.json in outDir
        manifest: true,
        // output dir for production build
        outDir: '../web/resources/dist/',
        rollupOptions: {
            input: './resources/main.js',
        }
    },
    server: {
        // we need a strict port to match on PHP side
        // change freely, but update on PHP to match the same port
        // tip: choose a different port per project to run them at the same time
        strictPort: true,
        port: 5173
    }
})