const mix = require('laravel-mix');

// Compile plusieurs fichiers JS
mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/admin.js', 'public/js');

// Compile plusieurs fichiers Sass
mix.sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css');

   mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
]);

// Versionnement des fichiers pour la production
if (mix.inProduction()) {
    mix.version(); 
}
