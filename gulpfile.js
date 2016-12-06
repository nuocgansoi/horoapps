const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

const sourceVendor = 'resources/assets/vendor/';
const publicVendor = 'public/vendor/';
const fontDir = 'public/fonts/';
elixir(mix => {
  mix.sass('app.scss')
    .sass('library.scss')
    .scripts('languages/en_US.js')
    .rollup('app.js', null, null, {
      moduleName: 'App'
    });
  mix.copy(
    sourceVendor + 'html5shiv/dist/html5shiv.min.js',
    publicVendor + 'html5shiv/html5shiv.min.js'
  );
  mix.copy(
    sourceVendor + 'respond/dest/respond.min.js',
    publicVendor + 'respond/respond.min.js'
  );
  mix.copy(
    sourceVendor + 'jquery/dist/jquery.min.js',
    publicVendor + 'jquery/jquery.min.js'
  );
  mix.copy(
    sourceVendor + 'bootstrap/dist/js/bootstrap.min.js',
    publicVendor + 'bootstrap/bootstrap.min.js'
  );
  mix.copy(
    sourceVendor + 'tether/dist/js/tether.min.js',
    publicVendor + 'tether/tether.min.js'
  );
});
