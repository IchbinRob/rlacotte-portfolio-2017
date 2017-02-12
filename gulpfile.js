var gulp = require('gulp'),
    sass = require('gulp-sass'),
    uncss = require('gulp-uncss'),
    postcss = require('gulp-postcss'),
    pxtorem = require('postcss-pxtorem'),
    cleanCSS = require('gulp-clean-css'),
    sourcemaps = require('gulp-sourcemaps'),
    imagemin = require('gulp-imagemin'),
    sync = require('browser-sync').create();

    //gulp flex svg

gulp.task('html', function() {
    gulp.src('app/index.html')
        .pipe(gulp.dest('dist'))
        .pipe(sync.stream());
});

gulp.task('img', function(){
  gulp.src('app/img/*')
    .pipe(gulp.dest('dist/img/'))
    .pipe(sync.stream());
});

gulp.task('js', function(){
  gulp.src('app/js/*')
    .pipe(gulp.dest('dist/js/'))
    .pipe(sync.stream());
});

// gulp.task('imagemin', function(){
//     return gulp.src('app/img/*')
//         .pipe(imagemin())
//         .pipe(gulp.dest('dist/img'))
//         .pipe(sync.stream());
// });

gulp.task('css', function () {
    return gulp.src('app/scss/*.scss')
        .pipe( sourcemaps.init() )
        .pipe(sass())
        .pipe( postcss([ require('precss'), require('autoprefixer'), pxtorem ]) )
        // .pipe(uncss({
        //               html: ['dist/index.html']
        //             }))
        // .pipe(cleanCSS())
        .pipe( sourcemaps.write('.') )
        .pipe( gulp.dest('dist/css/') )
        .pipe(sync.stream());
});

gulp.task('watch', function() {
  gulp.watch(['./app/scss/**/*.scss'], ['css']);
  gulp.watch(['./app/index.html'], ['html']);
  gulp.watch(['./app/img/*'], ['img']);
  gulp.watch(['./app/js/**/*.js'], ['js']);
});


gulp.task('sync', ['html', 'js', 'img','css', 'watch'], function() {
    sync.init({
        server: __dirname + '/dist'
    });
});

gulp.task('default', ['sync'], function() {});
