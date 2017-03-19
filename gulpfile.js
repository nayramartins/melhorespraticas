var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    watch = require('gulp-watch'),
	runSequence = require('run-sequence'),
    del = require('del'),
    sasslint = require('gulp-sass-lint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    cssFolder = 'css',
    jsFolder = 'js';

gulp.task('clean-old-files', function() {
    return del([
        './style.css',
        jsFolder + '/*.min.js'
    ]);
});


// CSS
gulp.task('sass', function() {
  return gulp.src(cssFolder + '/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(cssFolder));
});

gulp.task('cssnano', function() {
    return gulp.src(cssFolder + '/*.css')
        .pipe(cssnano({
            discardComments: {removeAll: false}
        }))
        .pipe(gulp.dest('.'));
});

gulp.task('sasslint', function() {
  return gulp.src(cssFolder + '/*.scss')
    .pipe(sasslint({
      options: {
        formatter: 'stylish'
      },
      files: {ignore: cssFolder + '/_variables.scss'},
      config: '.sass-lint.yml'
    }))
    .pipe(sasslint.format())
    .pipe(sasslint.failOnError())
});

gulp.task('buildcss', function() {
    runSequence('sasslint', 'sass', 'cssnano', function() {
        console.log('========================== CSS completed ==========================');
    });
});

// JS
gulp.task('scriptMin', function() {
  return gulp.src([jsFolder + '/main.js', jsFolder + '/jquery.load-posts.js'])
    .pipe(concat('smero-main.min.js'))
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(gulp.dest(jsFolder));
} );

gulp.task( 'scriptSingleMin', function() {
  return gulp.src([jsFolder + '/gallery.js', jsFolder + '/share.js', jsFolder + '/main.js', jsFolder + '/jquery.recaptcha.js'])
    .pipe(concat('smero-single.min.js'))
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(gulp.dest(jsFolder));
} );

gulp.task('buildjs', function() {
    runSequence('scriptMin', 'scriptSingleMin', function() {
        console.log('========================== JS completed ==========================');
    });
});

gulp.task('theme:dev', function() {
    var watchOptions = { usePolling: true },
        gulpTasks = {
            scripts: function () { gulp.start('buildjs') },
            styles: function () { gulp.start('buildcss') }
        };

    watch(jsFolder + '/*.js', watchOptions, gulpTasks.scripts);
    watch(cssFolder + '/*.scss', watchOptions, gulpTasks.styles);
});

gulp.task('default', ['clean-old-files', 'buildcss', 'scriptMin', 'scriptSingleMin']);
gulp.task('localdev', ['default', 'theme:dev']);
gulp.task('qa', ['default']);