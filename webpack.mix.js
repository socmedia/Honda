const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/dist/js/app.js', 'public/js')
    .js('resources/dist/js/adm.js', 'public/js')
    .sass('resources/dist/sass/adm.scss', 'public/css')
    .sass('resources/dist/sass/honda.scss', 'public/css')
    .postCss('resources/dist/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
