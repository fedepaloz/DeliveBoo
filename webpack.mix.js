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
    .js("resources/js/res-form-validation.js", "public/js")
    .js("resources/js/items-form-validation.js", "public/js")
    .js("resources/js/image_preview.js", "public/js")
    .js("resources/js/cart.js", "public/js")
    .js('resources/js/front.js', 'public/js')
    .js('resources/js/router.js', 'public/js')
    .sass("resources/sass/app.scss", "public/css")
    .options({ processCssUrls: false });
