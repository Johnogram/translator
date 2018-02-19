var gulp            = require('gulp');
var sass            = require('gulp-sass');
var cleanCSS        = require('gulp-clean-css');
var autoprefixer    = require('gulp-autoprefixer');
var watch           = require('gulp-watch');
var concat          = require('gulp-concat');
var rename          = require('gulp-rename');
var uglify          = require('gulp-uglify');

var JS_FILES = [
    'node_modules/js-cookie/src/js.cookie.js',
    'assets/js/script.js'
];

gulp.task('sass-dev',function(done){
    gulp.src('assets/sass/style.sass')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest('./'));
    done();
});

gulp.task('sass-build',function(done){
    gulp.src('assets/sass/style.sass')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleanCSS({compatibility: 'ie9'}))
        .pipe(gulp.dest('./'));
    done();
});

gulp.task('scripts-dev', function(done) {
    return gulp.src(JS_FILES)
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'));
    done();
});

gulp.task('scripts-build', function(done) {
    return gulp.src(JS_FILES)
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'));
    done();
});

gulp.task('dev', function(done){
    gulp.watch('assets/sass/**/*.sass', gulp.series(['sass-dev']));
    gulp.watch('assets/js/**/*.js', gulp.series(['scripts-dev']));
    done();
});

gulp.task('build', gulp.series(['sass-build', 'scripts-build']));

gulp.task('default', gulp.series(['sass-dev']));