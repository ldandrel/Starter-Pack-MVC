const gulp         = require('gulp')
const plumber      = require('gulp-plumber')
const notify       = require('gulp-notify')
const sass         = require('gulp-sass')
const minify       = require('gulp-minify')
const sourcemaps   = require('gulp-sourcemaps')
const autoprefixer = require('gulp-autoprefixer')
const rename       = require('gulp-rename')
const imagemin     = require('gulp-imagemin')
const babel        = require('gulp-babel')

let config = {
    'src' : 'src/',
    'dist': 'public/',
}




gulp.task('sass', () => {
    return gulp.src(config.src + 'scss/*.scss')
        .pipe(plumber({errorHandler: notify.onError('SASS Error: <%= error.message %>')}))
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(rename(function (path) {
            path.basename += ".min"
        }))
        .pipe(gulp.dest(config.dist + 'assets/css'))
        .pipe(notify('SASS compiled: <%= file.relative %>'))
})

gulp.task('javascript', () => {
    return gulp.src(config.src + 'js/*.js')
        .pipe(plumber({errorHandler: notify.onError("JS Error: <%= error.message %>")}))
        .pipe(minify({
            ext:{
                src:'.js',
                min:'.min.js'
          },
          ignoreFiles: ['.min.js'],
          noSource: false
        }))
        .pipe(gulp.dest(config.dist + 'assets/js'))
        .pipe(notify('JS compiled: <%= file.relative %>'))
})

gulp.task('images', () => {
    return gulp.src(config.src + 'img/*')
        .pipe(imagemin())
        .pipe(gulp.dest(config.dist + 'assets/img'))
        .pipe(notify('Image minified: <%= file.relative %>'))
})


gulp.task('watch', () => {
    gulp.watch(config.src + 'scss/**/*.scss', ['sass'])
    gulp.watch(config.src + 'js/*.js', ['javascript'])
    gulp.watch(config.src + 'img/*', ['images'])
})



gulp.task('default', ['watch'], () => {})
