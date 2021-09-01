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
//Admin
.js('resources/js/admin/custom.js','public/js/admin/custom.js')
.js('resources/js/admin/alert.js','public/js/admin/alert.js')
.sass('resources/sass/admin/main-style.scss', 'public/css/admin/main-style.css')

.js('resources/js/websites/stellar.js', 'public/js/websites/stellar.js')
    .js('resources/js/websites/simpleLightbox.min.js', 'public/js/websites/simpleLightbox.min.js')
    .js('resources/js/websites/popper.js', 'public/js/websites/popper.js')
    .js('resources/js/websites/owl.carousel.min.js', 'public/js/websites/owl.carousel.min.js')
    .js('resources/js/websites/nice-select.min.js', 'public/js/websites/nice-select.min.js')
    .js('resources/js/websites/main-theme.js', 'public/js/websites/main-theme.js')
    .js('resources/js/websites/mail-script.js', 'public/js/websites/mail-script.js')
    .js('resources/js/websites/jquery.waypoints.min.js', 'public/js/websites/jquery.waypoints.min.js')
    .js('resources/js/websites/jquery.magnific-popup.min.js', 'public/js/websites/jquery.magnific-popup.min.js')
    .js('resources/js/websites/jquery.js', 'public/js/websites/jquery.js')
    .js('resources/js/websites/jquery.counterup.js', 'public/js/websites/jquery.counterup.js')
    .js('resources/js/websites/jquery.ajaxchimp.min.js', 'public/js/websites/jquery.ajaxchimp.min.js')
    .js('resources/js/websites/isotope.pkgd.min.js', 'public/js/websites/isotope.pkgd.min.js')
    .js('resources/js/websites/imagesloaded.pkgd.min.js', 'public/js/websites/imagesloaded.pkgd.min.js')
    .js('resources/js/websites/bootsrapt.js', 'public/js/websites/bootsrapt.js')
    .js('resources/js/websites/beacon.min.js', 'public/js/websites/beacon.min.js')
    .js('resources/js/websites/custom.js', 'public/js/websites/custom.js')
    .sass('resources/sass/websites/theme.scss', 'public/css/websites/theme.css')
   .sass('resources/sass/app.scss', 'public/css')
   .copy(
    'node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/webfonts'
);
