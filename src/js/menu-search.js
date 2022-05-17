document.addEventListener('DOMContentLoaded', () => {
	console.log('searchform1******');
	/*-----------------------------------------------------------------------------------*/
	/*  Menu Search
	/*-----------------------------------------------------------------------------------*/
	if (document.querySelector('#searchform')) {
		console.log('searchform2******');
		const searchform = document.querySelector('.search-icon');
		const searchinput = document.querySelector('.search-input');

		searchform.addEventListener('click', () => {
			searchinput.classList.toggle('extend');
			if (searchinput.classList.contains('extend')) {
				searchinput.setAttribute('tabindex', '0');
			} else {
				searchinput.setAttribute('tabindex', '-1');
			}
		});
	}
});
