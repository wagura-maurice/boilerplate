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
    .react()
    .sass('resources/scss/app.scss', 'public/css')
    .sass('resources/scss/bootstrap.scss', 'public/css')
    .sass('resources/scss/pages/auth.scss', 'public/css/pages')
    .sass('resources/scss/pages/error.scss', 'public/css/pages')
    .sass('resources/scss/pages/email.scss', 'public/css/pages')
    .sass('resources/scss/pages/chat.scss', 'public/css/pages')
    .sass('resources/scss/widgets/chat.scss', 'public/css/widgets')
    .sass('resources/scss/widgets/todo.scss', 'public/css/widgets')
    .copy([
        'node_modules/perfect-scrollbar',
        'node_modules/bootstrap-icons',
        'node_modules/tinymce'
    ], 'public/vendors');