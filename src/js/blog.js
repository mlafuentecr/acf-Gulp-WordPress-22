document.readyState !== 'loading' ? blog() : document.addEventListener('DOMContentLoaded', () => blog());

function blog() {
	if (document.querySelector('#blog') || document.querySelector('#blog-single')) {
		console.log('BLOG');
		//Get COLOR AND PUT IT IN HEADER
		changeHeaderColor();
	}
}

function changeHeaderColor() {
	const header = document.querySelector('#menu-top');
	const div_color = document.querySelector('.getColor');
	const bgColor = div_color.dataset.color;
	header.style.backgroundColor = `${bgColor}`;
}
