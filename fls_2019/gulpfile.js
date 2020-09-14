const gulp = require('gulp'),
      plumber = require('gulp-plumber'),
      rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const imagemin = require('gulp-imagemin'),
      cache = require('gulp-cache');
const cleanCSS = require('gulp-clean-css');
const sass = require('gulp-sass');



    exec = require('child_process').exec,
    sys = require('util');

gulp.task('images', function(){
  gulp.src('images/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('dist/images/'));
});

gulp.task('styles', function(){
  gulp.src(['styles/**/*.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest('dist/css/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cleanCSS())
    .pipe(gulp.dest('dist/css/'))
//    .pipe(browserSync.reload({stream:true}))
});

gulp.task('scripts', function(){
  return gulp.src('scripts/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts/'))
    .pipe(rename({suffix: '.min'}))
    // .pipe(uglify())
    .pipe(terser())
    .pipe(gulp.dest('dist/scripts/'))
//    .pipe(browserSync.reload({stream:true}))
});

gulp.task('default', function(){
  gulp.watch("styles/**/*.scss", ['styles']);
  gulp.watch("scripts/**/*.js", ['scripts']);
});
