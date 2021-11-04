const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.postCss('resources/css/plugins/fontawesome-free/css/all.min.css', 'public/css/plugins/fontawesome')
    .postCss('resources/css/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'public/css/plugins/icheck-bootstrap')
    .postCss('resources/css/app.css', 'public/css');

mix.js([
    'resources/js/plugins/jquery/jquery.js',
    'resources/js/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/js/app.js'
], 'public/js/app.js');

if (mix.inProduction()) {
    mix.version();
}


