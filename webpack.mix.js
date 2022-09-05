const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
mix.js('resources/js/company/create.js', 'public/js/company/create.js');
mix.js('resources/js/company/edit.js', 'public/js/company/edit.js');
mix.js('resources/js/company/index.js', 'public/js/company/index.js');
mix.js('resources/js/employee/create.js', 'public/js/employee/create.js');
mix.js('resources/js/employee/edit.js', 'public/js/employee/edit.js');
mix.js('resources/js/employee/index.js', 'public/js/employee/index.js');