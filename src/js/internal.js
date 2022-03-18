/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? internal() : document.addEventListener('DOMContentLoaded', () => internal());
let current_page = '';
let postsDiv = '';

function internal() {
	console.log('intern ');

	//ABOUT
	if (document.querySelector('#youtubeModal')) {
		console.log('Yuutube video detected intern.js');
		const video = document.querySelector('#youtubeModal');
		video.addEventListener('click', () => stopVideo());
	}
}

//stop video when someone click out of the popup
function stopVideo() {
	document.querySelectorAll('iframe').forEach(v => {
		v.src = v.src;
	});
	document.querySelectorAll('video').forEach(v => {
		v.pause();
	});
}
