let mix = require('laravel-mix');
let lodash = require('lodash');

const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};

var assets = {
    js: [
        "resources/js/vendor/jquery.slimscroll.js",
        "resources/js/vendor/metisMenu.js",
        "resources/js/vendor/waves.js",
        "resources/js/vendor/jquery.waypoints.min.js",
        "resources/js/vendor/jquery.counterup.min.js"
    ]
};

mix.js('resources/js/app.js', 'public/js')
    .react('resources/react/components.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/scss/bootstrap.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap.css")
    .sass('resources/scss/icons.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/icons.css")
    .sass('resources/scss/app.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app.css")
    .combine(assets.js, folder.dist_assets + "js/vendor.js").minify(folder.dist_assets + "js/vendor.js")
    .combine('resources/js/ubold.js', folder.dist_assets + "js/app.min.js")
    .version();
