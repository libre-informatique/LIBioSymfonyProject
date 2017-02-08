var gulp = require('gulp');
var chug = require('gulp-chug');

gulp.task('sylius-admin', function() {
    gulp.src('vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Gulpfile.js', { read: false })
        .pipe(chug())
    ;
});

gulp.task('sylius-shop', function() {
    // original file : vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Gulpfile.js
    gulp.src('app/themes/LisemTheme/SyliusShopBundle/Gulpfile.js', { read: false })
        .pipe(chug())
    ;
});

gulp.task('default', ['sylius-admin', 'sylius-shop']);
