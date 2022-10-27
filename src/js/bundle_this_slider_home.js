document.readyState !== 'loading' ? sliderHome() : document.addEventListener('DOMContentLoaded', () => sliderHome());

function sliderHome() {
	const headline = document.querySelector('.block-hero-headline');
	const actionButtton = headline.querySelector('.contactUs');
	actionButtton.addEventListener('click', () => listenForClose());
}

function listenForClose() {
	//Listen close video
	const button = document.querySelector('.btn-closetext-white');

	button.addEventListener('click', () => stopVideos());
	//LIsten for keydown stop video on close or on escape
	document.onkeydown = function (evt) {
		evt = evt || window.event;
		var isEscape = false;
		if ('key' in evt) {
			isEscape = evt.key === 'Escape' || evt.key === 'Esc';
		} else {
			isEscape = evt.keyCode === 27;
		}
		if (isEscape) {
			stopVideos();
		}
	};
}

function stopVideos() {
	const videos = document.querySelectorAll('iframe, video');
	Array.prototype.forEach.call(videos, function (video) {
		if (video.tagName.toLowerCase() === 'video') {
			video.pause();
		} else {
			var src = video.src;
			video.src = src;
		}
	});
}
