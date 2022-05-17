document.readyState !== 'loading' ? sliderHome() : document.addEventListener('DOMContentLoaded', () => sliderHome());

//console.log('1 VIDEO*******************');
function sliderHome() {
	//console.log('2 VIDEO*******************');

	setTimeout(() => {
		//check if we are on mobile or in desktop
		//console.log('3 VIDEO*******************');
		let { divVideo, videoUrl } = '';

		if (document.querySelector('#video-desktop')) {
			divVideo = document.querySelector('#video-desktop');
		} else {
			divVideo = document.querySelector('#video-mobile');
		}
		//Check content
		console.log(divVideo, 'divVideo');
		//get video from data
		videoUrl = divVideo.dataset.video;
		console.log(videoUrl);
		divVideo.innerHTML = `<source src="${videoUrl}" type="video/mp4" />`;
	}, 3500);
}
