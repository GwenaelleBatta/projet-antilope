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


mix.setPublicPath('./wp-content/themes/ecosphair/public')
    .js('wp-content/themes/ecosphair/resources/js/script.js', 'wp-content/themes/ecosphair/public/js/')
    .sass('wp-content/themes/ecosphair/resources/sass/style.scss', 'wp-content/themes/ecosphair/public/css/')
    .options({
        processCssUrls: false
    })
    .browserSync({
        proxy: 'ecosphair.localhost',
        notify: false
    })
    .version();
