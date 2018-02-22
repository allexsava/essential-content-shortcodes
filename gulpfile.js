/*
 * Load Plugins
 */
var gulp 		= require('gulp'),
    prefix 		= require('gulp-autoprefixer'),
    sass 		= require('gulp-sass'),
    sourcemaps	= require('gulp-sourcemaps'),
    jshint 		= require('gulp-jshint'),
    clean 		= require('gulp-clean'),
    zip 		= require('gulp-zip'),
    cache 		= require('gulp-cache'),
    lr 			= require('tiny-lr'),
    server 		= lr(),
    exec 		= require('gulp-exec'),
    replace 	= require('gulp-replace'),
    minify 		= require('gulp-minify-css'),
    concat 		= require('gulp-concat'),
    notify 		= require('gulp-notify'),
    beautify 	= require('gulp-beautify'),
    uglify 		= require('gulp-uglify'),
    csscomb 	= require('gulp-csscomb'),
    fs          = require('fs'),
    rtlcss 		= require('gulp-rtlcss'),
    postcss 	= require('gulp-postcss'),
    del         = require('del'),
    rename 		= require('gulp-rename'),
    bs          = require('browser-sync'),
    u           = require('gulp-util'),
    reload      = bs.reload,
    prompt = require('gulp-prompt');


/**
 *   #STYLES
 */
gulp.task('styles', ['style.css'], function () {
    return gulp.src('style.css')
        .pipe(rtlcss())
        .pipe(rename('rtl.css'))
        .pipe(gulp.dest('.'));
});

gulp.task('style.css', ['assets/css'], function () {
    return gulp.src(['assets/scss/style.scss', 'assets/scss/editor-style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('.', {"mode": "0644"}));
});

gulp.task('assets/css', function () {
    return gulp.src(['assets/scss/**/*.scss', '!assets/scss/style.scss', '!assets/scss/editor-style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./assets/css', {"mode": "0644"}));
});

gulp.task('browser-sync', function () {
    bs({
        // Point this to your pre-existing server.
        proxy: config.baseurl + (u.env.port ? ':' + u.env.port : ''),
        files: ['*.php', 'style.css', 'assets/js/main.js'],
        // This tells BrowserSync to auto-open a tab once it boots.
        open: true
    }, function(err, bs) {
        if (err) {
            console.log(bs.options);
        }
    });
});

gulp.task('bs', ['styles', 'scripts', 'browser-sync', 'watch']);

/**
 *   #SCRIPTS
 */

gulp.task('scripts', function () {
    gulp.src('./assets/js/plugins/*.js')
        .pipe(concat('plugins.js'))
        .pipe(gulp.dest('./assets/js/'));

    return gulp.src(jsFiles)
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./assets/js/'))
        .pipe(notify({message: 'Scripts task complete'}));
});

gulp.task('scripts-watch', function () {
    return gulp.watch('assets/js/**/*.js', ['scripts']);
});

gulp.task('watch', ['styles', 'scripts'], function () {
    gulp.watch('assets/scss/**/*.scss', ['styles']);
    gulp.watch('assets/js/**/*.js', ['scripts']);
});

gulp.task('watch-admin', function () {
    gulp.watch('assets/scss/admin/*.scss', ['styles-admin']);
});

// usually there is a default task for lazy people who just wanna type gulp
gulp.task('start', ['styles', 'scripts'], function () {
    // silence
});

/**
 * Create a zip archive out of the cleaned folder and delete the folder
 */
gulp.task( 'zip', ['build'], function() {

    return gulp.src( './' )
        .pipe( exec( 'cd ./../; rm -rf acidcodes.zip; cd ./build/; zip -r -X ./../acidcodes.zip ./acidcodes; cd ./../; rm -rf build' ) );

} );

/**
 * Copy theme folder outside in a build folder, recreate styles before that
 */
gulp.task( 'copy-folder', function() {

    return gulp.src( './' )
        .pipe( exec( 'rm -Rf ./../build; mkdir -p ./../build/acidcodes; cp -Rf ./* ./../build/acidcodes/' ) );
} );

/**
 * Clean the folder of unneeded files and folders
 */
gulp.task( 'build', ['copy-folder'], function() {

    // files that should not be present in build zip
    files_to_remove = [
        '**/codekit-config.json',
        'node_modules',
        'config.rb',
        'gulpfile.js',
        'package.json',
        'acidcodes-core/vendor/redux2',
        'acidcodes-core/features',
        'acidcodes-core/tests',
        'acidcodes-core/**/*.less',
        'acidcodes-core/**/*.scss',
        'acidcodes-core/**/*.rb',
        'acidcodes-core/**/sass',
        'acidcodes-core/**/scss',
        'acid.json',
        'build',
        '.idea',
        '**/*.css.map',
        '**/.sass*',
        '.sass*',
        '**/.git*',
        '*.sublime-project',
        '.DS_Store',
        '**/.DS_Store',
        '__MACOSX',
        '**/__MACOSX'
    ];

    files_to_remove.forEach( function( e, k ) {
        files_to_remove[k] = '../build/acidcodes/' + e;
    } );

    return gulp.src( files_to_remove, {read: false} )
        .pipe( clean( {force: true} ) );
} );


/**
 * Short commands help
 */


gulp.task('help', function () {

    var $help = '\nCommands available : \n \n' +
        '=== Build === \n' +
        'build              Create a zip archive out of the cleaned folder and delete the folder \n' +
        '=== Style === \n' +
        'styles             Compiles styles in development mode \n' +
        'styles-compressed  Compiles styles in development mode \n' +
        'styles-nested      Prepare the style for production (deletes all existing files in the css folder) \n' +
        '=== Scripts === \n' +
        'scripts            Concatenate all js scripts \n' +
        'scripts-compressed Concatenate all js scripts and compress the file with uglify \n' +
        '=== Watchers === \n' +
        'watch              Watches all js and scss files \n' +
        'watch-styles       Watch only styles\n' +
        'watch-scripts      Watch scripts only \n' +
        'watch-win          Watch on damn windows \n';

    console.log($help);

});

