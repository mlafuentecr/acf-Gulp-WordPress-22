/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/

document.readyState !== 'loading' ? customerg2Init() : document.addEventListener('DOMContentLoaded', () => customerg2Init());

function customerg2Init() {
	console.log('g2');

	const URL2 = '/wp-content/themes/heylaika_vr5/inc/parts/fetchingG2.php';

	fetch(URL2)
		//.then(response => console.log(response))
		.then(response => response.json())
		.then(data => {
			console.log('Success:', data);
		})
		.catch(error => {
			console.error('Error:', error);
		});
}
