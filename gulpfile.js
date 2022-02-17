// Defining requirements
const { series, parallel, src, dest, watch } = require('gulp');

const prefix = require('gulp-autoprefixer'); // prefixes like -webkit and -moz
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));

function homepageScss() {
	return src(['./src/sass/homepage.scss'])
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(cleanCSS())
		.pipe(prefix())
		.pipe(concat('homepage.min.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./src/css/'));
}

function internalScss() {
	return src(['./src/sass/internal.scss'])
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(prefix())
		.pipe(cleanCSS())
		.pipe(concat('internal.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./src/css/'));
}

function individualScss() {
	return (
		src(['./src/sass/custom-editor-style.scss', './src/sass/login.scss'])
			.pipe(sass().on('error', sass.logError))
			.pipe(sourcemaps.init())
			.pipe(prefix())
			.pipe(cleanCSS())
			//.pipe(concat('custom-editor-style.css'))
			.pipe(sourcemaps.write('.'))
			.pipe(dest('./src/css/'))
	);
}

//copy to css files from dist to src and also copy map
function copyCss() {
	return src('./src/css/*.*').pipe(dest('./dist/css/'));
}
function copyadmincss() {
	return src('./src/css/admin/*.css').pipe(dest('./dist/css/'));
}

//Js //I used DIst direct bc if I put them on src will created a loop on gulp file
const jsIntern = ['./src/js/internal.js', './src/js/scroll.js', './src/js/menu-search.js'];
const jsHome = ['./src/js/pwa.js', './src/js/scroll.js', './src/js/menu-search.js'];
const jscopy = ['./src/js/block_jobs.js', './src/js/rich-text.js', './src/js/bundle_intern.js', './src/js/bundle_home.js'];

function js_bundle_Intern() {
	return src(jsIntern).pipe(babel()).pipe(uglify()).pipe(concat('bundle_intern.js')).pipe(dest('./src/js/'));
}
function js_bundle_home() {
	return src(jsHome).pipe(babel()).pipe(uglify()).pipe(concat('bundle_home.js')).pipe(dest('./src/js/'));
}
function copyJs() {
	return src(jscopy).pipe(dest('./dist/js/'));
}
function copyboostrapJs() {
	return src('./src/js/bootstrap.bundle.min.js').pipe(dest('./dist/js/'));
}

//paca vigila cuando algo cambia corre el , layoutscss
function watchtask() {
	watch(['./src/sass/*.scss'], internalScss);
	watch(['./src/sass/*.scss'], homepageScss);

	watch('./src/sass/custom-editor-style.scss', individualScss);
	watch('./src/sass/login.scss', individualScss);
	watch('./src/css/*.css', copyCss);

	watch(jsIntern, js_bundle_Intern);
	watch(jsHome, js_bundle_home);
	watch(jscopy, copyJs);
}

exports.default = series(parallel(js_bundle_home, copyboostrapJs, js_bundle_Intern, individualScss, homepageScss, internalScss, series(copyCss, copyadmincss, copyJs, watchtask)));
