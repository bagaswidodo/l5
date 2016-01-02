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
    

    // mix.sass('gallery.scss', 'public/gallery/css/styles.css');
    // mix.scripts([
    // 	'gallery/app.js'
    // ],'public/gallery/js/app.js');

    // mix.scripts([
    // 	'gallery/controllers/userController.js',
    //     'gallery/controllers/globalController.js',
    //     'gallery/controllers/navigationController.js',
    //     'gallery/controllers/galleryController.js'
    // ],'public/gallery/js/controller.js');

    // mix.scripts([
    // 	'gallery/models/userModel.js',
    //     'gallery/models/galleryModel.js'
    // ],'public/gallery/js/models.js');

    // var bowerDir= 'public/vendor/',
    //  jsDir = 'resources/assets/js/vendor';

    // mix.copy(bowerDir+ 'vue/dist/vue.min.js', jsDir);
    // mix.copy(bowerDir+ 'vue-resource/dist/vue-resource.min.js', jsDir);

    // mix.scripts([
    //     'vendor/vue.min.js',
    //     'vendor/vue-resource.min.js'
    // ], 'public/js/vendor/vue-vendor.js');

    // mix.scripts([
    //     'customer/services/customerService.js',
    //     'customer/filters/startFrom.js',
    //     'customer/controllers/listCtrl.js',
    //     'customer/controllers/editCtrl.js',
    //     'customer/app.js'
    // ],'public/customer/scripts.js');

    // mix.scripts([
    //     'todo/app.js',
    //     'todo/AuthController.js',
    //     'todo/TodoController.js'
    // ],'public/jwt/todo/build.js');


    //dream spa angular
    // mix.scripts([
    //     'dream/grayscale.js',
    //     'dream/jquery.easing.min.js',
    // ], 'public/dream/plugin.js');

    // mix.scripts([
    //     'vendor/jquery/dist/jquery.min.js',
    //     'vendor/bootstrap/dist/js/bootstrap.min.js',
    //     'vendor/angular/angular.min.js',       
    //     'vendor/angular-resource/angular-resource.min.js', 
    //     'vendor/angular-cookies/angular-cookies.min.js' 
    // ], 'public/dream/vendor.js','public/');

    // mix.scripts([
    //     'dream/vendor.js',
    //     'dream/plugin.js'
    // ], 'public/dream/lib.js','public/');

    // mix.scripts([
    //     'dream/mvc/app.js',
    //     'dream/mvc/controllers.js',
    //     'dream/mvc/services.js'
    // ], 'public/dream/app.js');
    
    //dream spa vue
    mix.scripts([
        'vendor/jquery/dist/jquery.min.js',
        'vendor/bootstrap/dist/js/bootstrap.min.js',
        'vendor/vue/dist/vue.min.js',
        'vendor/vue-resource/dist/vue-resource.min.js'
    ], 'public/dream/vue-vendor.js','public/');

    mix.scripts([
        'dream/grayscale.js',
        'dream/jquery.easing.min.js',
    ], 'public/dream/vue-plugin.js');

    mix.scripts([
        'dream/vue-vendor.js',
        'dream/vue-plugin.js'
    ], 'public/dream/vue-lib.js','public/');



});
