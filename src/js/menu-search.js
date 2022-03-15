document.addEventListener('DOMContentLoaded', () => {
	/*-----------------------------------------------------------------------------------*/
	/*  Menu Search
	/*-----------------------------------------------------------------------------------*/
	if (document.querySelector('#searchform')) {
		const searchform = document.querySelector('.search-icon');
		const searchinput = document.querySelector('.search-input');
		searchform.addEventListener('click', () => searchinput.classList.toggle('extend'));
	}
});
