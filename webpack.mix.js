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
    .styles([
        'public/assets/lib/custom_css/custom.css',
    ], 'public/css/custom.css')
    .scripts([
        'public/assets/lib/js/vendor/modernizr-3.5.0.min.js',
        'public/assets/lib/js/vendor/jquery-3.2.1.min.js',
        'public/assets/lib/js/popper.min.js',
        'public/assets/lib/js/bootstrap.min.js',
        'public/assets/lib/js/plugins.js',
        'public/assets/lib/js/active.js',
        'public/assets/lib/custom_js/book_detail.js',
    ], 'public/js/custom.js')
    .sass('resources/sass/app.scss', 'public/css');

