var elixir = require('laravel-elixir');

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
 //to not create *.map file
elixir.config.sourcemaps = false;
elixir(function(mix) {
    // mix.sass('app.scss');
    

    mix.sass('gallery.scss', 'public/gallery/css/styles.css');
    mix.scripts([
    	'gallery/app.js'
    ],'public/gallery/js/app.js');

    mix.scripts([
    	'gallery/controllers/userController.js',
        'gallery/controllers/globalController.js',
        'gallery/controllers/navigationController.js',
        'gallery/controllers/galleryController.js'
    ],'public/gallery/js/controller.js');

    mix.scripts([
    	'gallery/models/userModel.js',
        'gallery/models/galleryModel.js'
    ],'public/gallery/js/models.js');
});
