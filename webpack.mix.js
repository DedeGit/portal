const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix menyediakan API yang mudah digunakan untuk mendefinisikan build steps
 | Webpack untuk aplikasi Laravel Anda.
 |
 */

mix.js('resources/js/app.js', 'public/assets/js')
   .sass('public/assets/scss/style.scss', 'public/assets/css')
   .options({
       processCssUrls: false
   })
   .sourceMaps();
