var gulp = require("gulp");
var minifycss = require("gulp-minify-css");
var autoprefixer = require("gulp-autoprefixer");
var sass = require("gulp-ruby-sass");

gulp.task('css', function() {
  return gulp.src('scss/app.scss')
        .pipe(sass({style: 'compressed'}))
        .pipe(autoprefixer('Last 15 Versions'))
        .pipe(gulp.dest('css'));
});

gulp.task('watch', function() {
  gulp.watch('scss/**/*.scss', function() {
    gulp.run('css');
  });
});

gulp.task('default', ['css', 'watch']);