document.addEventListener('DOMContentLoaded', () => {
	/*-----------------------------------------------------------------------------------*/
	/*  Menu Search
	/*-----------------------------------------------------------------------------------*/
	if (document.querySelector('#searchform')) {
		const searchform = document.querySelector('.search-icon');
		const searchinput = document.querySelector('.search-input');
		console.log(searchform);
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
