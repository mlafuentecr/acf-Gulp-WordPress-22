document.readyState !== 'loading' ? blog() : document.addEventListener('DOMContentLoaded', () => blog());

function blog() {
	if (document.querySelector('#blog')) {
		console.log('BLOG');
		//Get COLOR AND PUT IT IN HEADER
		const header = document.querySelector('#menu-top');
		const div_color = document.querySelector('.main-header');
		const bgColor = div_color.dataset.color;
		header.style.backgroundColor = `${bgColor}`;
	}
}
