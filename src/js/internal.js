/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? internal() : document.addEventListener('DOMContentLoaded', () => internal());

function internal() {
	console.log('intern ');
	//ABOUT
	if (document.querySelector('#youtubeModal')) {
		console.log('YOutube video detected intern.js');
		const video = document.querySelector('#youtubeModal');
		function stopVideo() {
			document.querySelectorAll('iframe').forEach(v => {
				v.src = v.src;
			});
			document.querySelectorAll('video').forEach(v => {
				v.pause();
			});
		}
		video.addEventListener('click', () => stopVideo());
	}
}
