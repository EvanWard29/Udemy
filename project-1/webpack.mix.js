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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/libs/blog-post.css', 'public/css/libs.css')
   .sass('resources/assets/libs/bootstrap.css', 'public/css/libs.css')
   .sass('resources/assets/libs/bootstrap.min.css', 'public/css/libs.css')
   .sass('resources/assets/libs/font-awesome.css', 'public/css/libs.css')
   .sass('resources/assets/libs/metisMenu.css', 'public/css/libs.css')
   .sass('resources/assets/libs/sb-admin-2.css', 'public/css/libs.css')
   .sass('resources/assets/libs/styles.css', 'public/css/libs.css')
   .sass('resources/assets/libs/bootstrap.js', 'public/js/libs.js')
   .sass('resources/assets/libs/bootstrap.min.js', 'public/js/libs.js')
   .sass('resources/assets/libs/jquery.js', 'public/js/libs.js')
   .sass('resources/assets/libs/metisMenu.js', 'public/js/libs.js')
   .sass('resources/assets/libs/sb-admin-2.js', 'public/js/libs.js')
   .sass('resources/assets/libs/scripts.js', 'public/js/libs.js')
