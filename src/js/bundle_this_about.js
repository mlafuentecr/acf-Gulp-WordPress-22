document.readyState !== 'loading' ? about() : document.addEventListener('DOMContentLoaded', () => about());

function about() {
	if (document.querySelector('#about')) {
		console.log('about*************');
		const about_item = document.querySelectorAll('.about_item');
		const btn_next = document.querySelector('.btn_next');
		const about_itemArr = Array.from(about_item);
		const totalIems = about_item.length;
		let clickIndex = 1;

		about_itemArr[0].classList.add('active');

		btn_next.addEventListener('click', e => {
			e.preventDefault();
			console.log('click', clickIndex, totalIems);
			clickIndex > totalIems - 1 ? (clickIndex = 0) : '';

			about_itemArr.map(item => item.classList.remove('active'));
			about_itemArr[clickIndex].classList.add('active');
			clickIndex++;
		});
	}
}
