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
        'resources/css/custom.css',
    ], 'public/css/custom.css')
    .scripts([
        'public/assets/lib/js/vendor/modernizr-3.5.0.min.js',
        'public/assets/lib/js/vendor/jquery-3.2.1.min.js',
        'public/assets/lib/js/popper.min.js',
        'public/assets/lib/js/bootstrap.min.js',
        'public/assets/lib/js/plugins.js',
        'public/assets/lib/js/active.js',
        'resources/js/logout.js',
        'resources/js/book_detail.js',
        'resources/js/notification.js',
        'resources/js/changeProfile.js',
        'resources/js/realtime.js',
        'resources/js/requestbook.js',
        'resources/js/follow.js',
        'resources/js/dataTable.js',
        'resources/js/chart_custom.js',
        'public/assets/lib/lib-admin/js/main.js',
        'public/assets/lib/lib-admin/js/plugins/pace.min.js',
        /*'public/assets/lib/lib-admin/js/plugins/chart.js',*/
        'public/assets/lib/lib-admin/js/something.js',
        'vendor/unisharp/laravel-ckeditor/ckeditor.js',

    ], 'public/js/custom.js')
    .copy('public/assets/chart.js/dist/Chart.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
