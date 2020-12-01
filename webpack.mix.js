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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .scripts([
        'resources/js/assets/crop-img/dropzone.js',
        'resources/js/assets/crop-img/cropper.js',
        'resources/js/assets/crop-img/crop.js',
    ], 'public/js/cropper.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css');

mix.copy(['resources/sass/assets/admin/fonts'], 'public/fonts');
