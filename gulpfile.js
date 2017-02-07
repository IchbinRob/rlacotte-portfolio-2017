var gulp = require('gulp'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    pxtorem = require('postcss-pxtorem'),
    cleanCSS = require('gulp-clean-css'),
    sourcemaps = require('gulp-sourcemaps'),
    imagemin = require('gulp-imagemin'),
    sync = require('browser-sync').create();

gulp.task('html', function() {
    gulp.src('app/index.html')
        .pipe(gulp.dest('dist'))
        .pipe(sync.stream());
});

gulp.task('scss', function() {
    return gulp.src('app/scss/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('dist/css'))
        .pipe(sync.stream());
});

// gulp.task('img', function() {
//     gulp.src('app/img/*')
//         .pipe(gulp.dest('dist/img/'))
//         .pipe(sync.stream());
// });
gulp.task('imagemin', function(){
    return gulp.src('app/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/img'));
});

gulp.task('css', function () {
    return gulp.src('dist/css/*css')
        .pipe( sourcemaps.init() )
        .pipe( postcss([ require('precss'), require('autoprefixer'), pxtorem ]) )
        .pipe(cleanCSS())
        .pipe( sourcemaps.write('.') )
        .pipe( gulp.dest('dist/css/') );
});

gulp.task('watch', function() {
  gulp.watch(['./app/scss/**/*.scss'], ['scss']);
  gulp.watch(['./app/index.html'], ['html']);
});


gulp.task('sync', ['html', 'imagemin','scss', 'css', 'watch'], function() {
    sync.init({
        server: __dirname + '/dist'
    });
});

gulp.task('default', ['sync'], function() {});
