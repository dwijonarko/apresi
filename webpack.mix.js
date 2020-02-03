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

// mix.js('node_modules/@coreui/coreui/dist/js', 'public/js')
    mix.copy([
        'node_modules/font-awesome/fonts',
        'node_modules/@coreui/icons/fonts',
        'node_modules/simple-line-icons/fonts', 
    ], 'public/fonts')
    .styles([
        'node_modules/@coreui/coreui/dist/css/coreui.min.css',
        'node_modules/@coreui/icons/css/coreui-icons.min.css', 
        'node_modules/eonasdan-bootstrap-datetimepicker/build/css/cbootstrap-datetimepicker.min.css',
        'node_modules/font-awesome/css/font-awesome.min.css', 
        'node_modules/simple-line-icons/css/simple-line-icons.css',
        'node_modules/select2/dist/css/select2.min.css',
        'https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css'
    ], 'public/css/coreui.css')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/@coreui/coreui/dist/js/coreui.min.js',
        'node_modules/select2/dist/js/select2.min.js',
        'node_modules/moment/moment.js',
        'node_modules/eonasdan-bootstrap-datetimepicker/build/js/cbootstrap-datetimepicker.min.js',
    ],'public/js/app.js').sourceMaps();
