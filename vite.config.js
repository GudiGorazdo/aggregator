import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import autoprefixer from 'autoprefixer';
import  terser  from '@rollup/plugin-terser';

export default defineConfig({
    css: {
        postcss: {
            plugins: [
                autoprefixer({
                    overrideBrowserslist: ['last 2 versions'],
                }),
            ],
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/scripts/pages/home.js',
                'resources/js/scripts/pages/shop.js'
            ],
            refresh: true,
        }),
        terser({
            ecma: 2020,
            compress: {
                passes: 2,
                pure_getters: true,
                unsafe: true,
                unsafe_comps: true,
                unsafe_Function: true,
                unsafe_math: true,
                unsafe_symbols: true,
                unsafe_methods: true,
                unsafe_proto: true,
                unsafe_regexp: true,
                unsafe_undefined: true,
                hoist_funs: true,
                hoist_props: true,
                hoist_vars: true,
                pure_funcs: [
                    'console.debug',
                    'console.info',
                    'console.log',
                    'console.warn',
                ],
            },
            format: {
                comments: false,
            },
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    }
});
