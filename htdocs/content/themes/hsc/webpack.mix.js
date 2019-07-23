let mix = require('laravel-mix');
let ImageminPlugin = require('imagemin-webpack-plugin').default;
let CopyWebpackPlugin = require('copy-webpack-plugin');
let imageminMozjpeg = require('imagemin-mozjpeg');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath('./dist/');
mix.setResourceRoot('../');

mix.options({
  processCssUrls: false
});

mix.js('assets/js/theme.js', 'dist/js/theme.min.js')
   .sass('assets/sass/style.scss', 'dist/css/theme.css');

mix.webpackConfig({
    plugins: [
        new CopyWebpackPlugin([{
            from: 'assets/img',
            to: 'img',
        }]),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            plugins: [
                imageminMozjpeg({
                    quality: 80,
                })
            ]
        })
    ]
});