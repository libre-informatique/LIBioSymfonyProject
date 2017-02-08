/*
 * Copyright (C) Paweł Jędrzejewski
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// original file: vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Gulpfile.js

var concat = require('gulp-concat');
var env = process.env.GULP_ENV;
var gulp = require('gulp');
var gulpif = require('gulp-if');
var livereload = require('gulp-livereload');
var merge = require('merge-stream');
var order = require('gulp-order');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');

var rootPath = '../../../../web/assets/';
var shopRootPath = rootPath + 'shop/';

var paths = {
    shop: {
        js: [
//            '../../../../node_modules/jquery/dist/jquery.min.js',
            '../../../../vendor/sylius/sylius/node_modules/jquery/dist/jquery.min.js',
//            '../../../../node_modules/semantic-ui-css/semantic.min.js',
            '../../../../vendor/sylius/sylius/node_modules/semantic-ui-css/semantic.min.js',
//            '../UiBundle/Resources/private/js/**',
            '../../../../vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/private/js/**',
//            'Resources/private/js/**'
            '../../../../vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/private/js/**',
            
            '!../../../../vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/private/js/semantic-ui-api-actions.js',
            'Resources/private/js/**'
        ],
        sass: [
//            '../UiBundle/Resources/private/sass/**',
            '../../../../vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/private/sass/**',
//            'Resources/private/scss/**'
            '../../../../vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/private/scss/**'
        ],
        css: [
//            '../../../../node_modules/semantic-ui-css/semantic.min.css'
            '../../../../node_modules/semantic-ui-css/semantic.min.css'
        ],
        img: [
//            '../UiBundle/Resources/private/img/**'
            '../../../../vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/private/img/**'
        ]
    }
};

gulp.task('shop-js', function () {
    return gulp.src(paths.shop.js)
        .pipe(concat('app.js'))
        .pipe(gulpif(env === 'prod', uglify()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(shopRootPath + 'js/'))
    ;
});

gulp.task('shop-css', function() {
    gulp.src(['../../../../node_modules/semantic-ui-css/themes/**/*']).pipe(gulp.dest(shopRootPath + 'css/themes/'));

    var cssStream = gulp.src(paths.shop.css)
            .pipe(concat('css-files.css'))
        ;

    var sassStream = gulp.src(paths.shop.sass)
            .pipe(sass())
            .pipe(concat('sass-files.scss'))
        ;

    return merge(cssStream, sassStream)
        .pipe(order(['css-files.css', 'sass-files.scss']))
        .pipe(concat('style.css'))
        .pipe(gulpif(env === 'prod', uglifycss()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(shopRootPath + 'css/'))
        .pipe(livereload())
    ;
});

gulp.task('shop-img', function() {
    return gulp.src(paths.shop.img)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(shopRootPath + 'img/'))
    ;
});

gulp.task('shop-watch', function() {
    livereload.listen();

    var watcher = gulp.watch(paths.shop.js, ['shop-js']);
    
    watcher.on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });    
    gulp.watch(paths.shop.sass, ['shop-css']);
    gulp.watch(paths.shop.css, ['shop-css']);
    gulp.watch(paths.shop.img, ['shop-img']);
});

gulp.task('default', ['shop-js', 'shop-css', 'shop-img']);
gulp.task('watch', ['default', 'shop-watch']);
