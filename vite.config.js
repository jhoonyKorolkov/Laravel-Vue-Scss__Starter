import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import svgLoader from 'vite-svg-loader'
import path from 'path'

export default defineConfig({
    resolve: {
        alias: {
            '@sprite': path.resolve(__dirname, 'resources'),
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/style/shop.scss',
                'resources/style/admin.scss',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

        svgLoader({
            svgo: true, // можно отключить если нужно сохранить атрибуты viewBox и т.д.
            svgoConfig: {
                plugins: [
                    {
                        name: 'removeAttrs',
                        params: {
                            params: {
                                // удаляет только fill со значениями, не удаляет currentColor
                                attrs: '(fill=(?!\\"currentColor\\").*|stroke)',
                            },
                        },
                    },
                ],
            },
        }),
    ],
})
