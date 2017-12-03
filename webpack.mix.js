const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/assets/js')
   // .js(['resources/assets/js/back.js', 'resources/assets/js/back/*'], 'public/assets/js')
   .js('resources/assets/js/back.js', 'public/assets/js')
   .sass('resources/assets/sass/app.scss', 'public/assets/css')
   .sass('resources/assets/sass/back.scss', 'public/assets/css');
