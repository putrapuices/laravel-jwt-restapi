const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css')
//    .sourceMaps()
//    .styles([
//       'node_modules/bootstrap/dist/css/bootstrap.css',
//       'resources/css/custom.css' // Jika Anda ingin menambahkan gaya kustom
//    ], 'public/css/all.css')
//    .scripts([
//       'node_modules/bootstrap/dist/js/bootstrap.js',
//       'resources/js/custom.js' // Jika Anda ingin menambahkan skrip kustom
//    ], 'public/js/all.js');
