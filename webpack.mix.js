const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js').vue()
//     .scripts('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
//     .scripts('node_modules/popper.js/dist/umd/popper.min.js', 'public/js/popper.min.js')
//     .scripts('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
//     .scripts('resources/js/*', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         require('postcss-import'),
//         require('bootstrap'),
//         require('autoprefixer'),
//     ])
//     .webpackConfig(require('./webpack.config'));

mix.js('resources/js/app.js', 'public/js').vue()
    .scripts('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
    .scripts('node_modules/axios/dist/axios.min.js', 'public/js/axios.min.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.min.js')
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css/app.css')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
