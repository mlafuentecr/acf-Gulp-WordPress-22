document.addEventListener('DOMContentLoaded', () => {
	/*-----------------------------------------------------------------------------------*/
	/*  Menu Search
	/*-----------------------------------------------------------------------------------*/
	if (document.querySelector('iframe')) {
		console.log('iframe-----');

		let myTimeout = '';

		function removeBorder() {
			console.log('checking');

			const iframe = document.querySelector('iframe');
			console.log(iframe, 'iframe');
			if (iframe.document.querySelector('.ui-droppable')) {
				const newssletter = iframe.document.querySelector('.ui-droppable');
				newssletter.style.border = 'none!important';
				console.log('removeborder-----');
				myStopFunction();
			} else {
				console.log('no iframe');
				startTimeout();
			}
		}

		function startTimeout() {
			console.log('starting timeout');
			myTimeout = setTimeout(removeBorder, 5000);
		}

		function myStopFunction() {
			clearTimeout(myTimeout);
		}

		//startTimeout();
	}
});
