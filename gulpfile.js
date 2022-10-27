// Defining requirements
const { series, parallel, src, dest, watch } = require('gulp');

const autoprefixer = require('gulp-autoprefixer'); // prefixes like -webkit and -moz
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');

const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));

const paths = {
	font: ['./src/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}'],
	img: ['./src/images/**/*.{gif,png,jpg,svg}'],
	jsIndividuals: ['./src/js/**/_*.js'],
	jsbundle: ['./src/js/**/bundle_*.js'],
	jsBOOTSTRAP: ['./src/bootstrap-5.1.3-dist/js/bootstrap.bundle.*'],
	cssBOOTSTRAP: ['./src/bootstrap-5.1.3-dist/css/bootstrap.min.*'],
	sass: ['./src/sass/**/*.scss'],
	distCSS: './dist/css/',
	distImg: './dist/img/',
	distJS: './dist/js/',
	distFont: './dist/fonts/',
};

/*--------------------------------
# Individuals JS or CSS
---------------------------------*/
function jsIndividuals() {
	return src(paths.jsIndividuals).pipe(babel()).pipe(uglify()).pipe(dest(paths.distJS));
}
/*--------------------------------
# BUNDLES
---------------------------------*/
function cssBundle() {
	return src(paths.sass)
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(rename({ suffix: '.min' }))
		.pipe(autoprefixer())
		.pipe(sourcemaps.write('.'))
		.pipe(dest(paths.distCSS));
}

function jsBundle() {
	return src(paths.jsbundle).pipe(babel()).pipe(uglify()).pipe(concat('mainBundle.js')).pipe(dest(paths.distJS));
}

/*--------------------------------
# COPY FILES
---------------------------------*/
function jsBootstrapCopy() {
	return src(paths.jsBOOTSTRAP).pipe(dest(paths.distJS));
}

function ccsBootstrapCopy() {
	return src(paths.cssBOOTSTRAP).pipe(dest(paths.distCSS));
}

function fontCopy() {
	return src(paths.font).pipe(dest(paths.distFont));
}
function imagesCopy() {
	return src(paths.img).pipe(dest(paths.distImg));
}

// /*--------------------------------
// # WATCH
// ---------------------------------*/
function watchtask() {
	watch(paths.sass, cssBundle);
	watch(paths.jsbundle, jsBundle);
	watch(paths.jsIndividuals, jsIndividuals);
	watch(paths.font, fontCopy);
	watch(paths.img, imagesCopy);
}

exports.default = series(parallel(series(cssBundle, jsBundle, jsIndividuals, fontCopy, imagesCopy, ccsBootstrapCopy, jsBootstrapCopy)));
//you can use gulp build or gulp
exports.build = series(parallel(series(cssBundle, jsBundle, jsIndividuals, fontCopy, imagesCopy, ccsBootstrapCopy, jsBootstrapCopy)));
//you can use watch to monitor changes on js and css
exports.watch = series(parallel(watchtask));
