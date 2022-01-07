/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/

document.readyState !== 'loading' ? customerg2Init() : document.addEventListener('DOMContentLoaded', () => customerg2Init());

function customerg2Init() {
	console.log('g2');

	const URL = 'https://data.g2.com/api/v1/products/309cf298-0fa3-4bfb-9e22-ee8c75d4051c/product-rating';
	const URL2 = '/wp-content/themes/heylaika_vr5/inc/parts/fetchingG2.php';

	fetch(URL2)
		.then(response => console.log(response))
		.then(response => response.json())
		.then(data => {
			console.log('Success:', data);
		})
		.catch(error => {
			console.error('Error:', error);
		});
}
