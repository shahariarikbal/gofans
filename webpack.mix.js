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

const resourcesAssets = 'resources/';
const publicAssets = 'public/goweb/';

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

//All css added
mix.styles([
    publicAssets+'css/main.min.css',
    publicAssets+'css/style.css',
    publicAssets+'css/color.css',
    publicAssets+'css/responsive.css',
], publicAssets+'css/all.css');


//All js added
mix.scripts([
    publicAssets+'js/main.min.js',
    publicAssets+'js/email-decode.min.js',
    publicAssets+'js/script.js',
    publicAssets+'js/map-init.js',
], publicAssets+'js/all.js');

