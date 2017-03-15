var gulp = require('gulp'),
    watch = require('gulp-watch'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync').create();


gulp.task('watch', ['connect-sync'], function() {

  browserSync.init({
    proxy: '127.0.0.1:8000',
    port: 8080,
    open: true,
    notify: false
  });

  watch('./app/index.html', function() {
    browserSync.reload();
  });

  watch('./app/assets/styles/**/*.css', function() {
    gulp.start('cssInject');
  });

  watch(['./app/*.php', './app/**/*.php', './app/**/**/*.php'], function() {
    browserSync.reload();
  });

  watch('./app/assets/scripts/**/*.js', function() {
    gulp.start('scriptsRefresh');
  });

});

gulp.task('cssInject', ['styles'], function() {
    return gulp.src('./app/assets/styles/styles.css')
        .pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'], function() {
  browserSync.reload();
});


gulp.task('connect-sync', function() {
    connect.server({
        base: 'app',
        port: 8000,
        keepalive: true
    });
});
