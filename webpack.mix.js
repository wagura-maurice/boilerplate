const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .react()
    .copy(
        [
            "resources/dist/assets/js/bootstrap.bundle.min.js",
            "resources/dist/assets/js/bootstrap.min.js.map",
            "resources/dist/assets/js/main.js",
        ],
        "public/js"
    )
    .copy(
        [
            "resources/dist/assets/css/app.css",
            "resources/dist/assets/css/bootstrap.css",
        ],
        "public/css"
    )
    .copy(
        [
            "resources/dist/assets/css/pages/auth.css",
            "resources/dist/assets/css/pages/error.css",
            "resources/dist/assets/css/pages/email.css",
            "resources/dist/assets/css/pages/chat.css",
        ],
        "public/css/pages"
    )
    .copy(
        [
            "resources/dist/assets/css/widgets/chat.css",
            "resources/dist/assets/css/widgets/todo.css",
        ],
        "public/css/widgets"
    )
    .copy(
        [
            "resources/dist/assets/vendors/perfect-scrollbar",
            "resources/dist/assets/vendors/bootstrap-icons",
            "resources/dist/assets/vendors/tinymce",
        ],
        "public/vendors"
    )
    .copy(["resources/dist/assets/images"], "public/images");
