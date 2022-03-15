/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? internal() : document.addEventListener('DOMContentLoaded', () => internal());

function internal() {
	console.log('intern ');
	//ABOUT
	if (document.querySelector('#youtubeModal')) {
		console.log('Yuutube video detected intern.js');
		const video = document.querySelector('#youtubeModal');
		video.addEventListener('click', () => stopVideo());
	}

	///FOR LATES POST (is a page)
	//If I font load more post
	if (document.querySelector('.load-more-post')) {
		console.log('load more is present');
		const btnLoadMore = document.querySelector('.load-more-post');
		btnLoadMore.addEventListener('click', () => fetchPost2());
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

function fetchPost() {
	const dataVid = document.querySelector('.post-list');
	console.log(dataVid);
	const max_post = dataVid.dataset.max;
	const current_page = dataVid.dataset.page;

	var data = {
		action: 'loadmore_posts',
		current_page: current_page,
		max_post: max_post,
		data: JSON.stringify(data),
	};

	var ajaxscript = { ajax_url: `${window.location.hostname}/wp-admin/admin-ajax.php` };

	let xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		myFunction1(xhttp);
	};
	xhttp.open('POST', ajaxscript);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	xhttp.send(encodeURI(data));
}

function fetchPost2() {
	const dataVid = document.querySelector('.post-list');

	var ppp = 9;
	var loaded = ppp;
	var max_post = 50;
	let current_page = 1;
	var ajaxurl = { ajax_url: `${window.location.hostname}/wp-admin/admin-ajax.php` };
	var ajaxurl2 = `/wp-admin/admin-ajax.php`;

	const data = new FormData();

	data.append('action', 'loadmore_posts');

	fetch(ajaxurl2, {
		method: 'POST',
		credentials: 'same-origin',
		body: JSON.stringify(data),
		headers: {
			'content-type': 'application/x-www-form-urlencoded; charset=UTF-8',
		},
	})
		.then(response => response.json())
		.then(data => {
			console.log(data);
		})
		.catch(error => {
			console.log('ERROR');
			console.error(error);
		});

	var data1 = {
		action: 'loadmore_posts',
		current_page: current_page,
		max_post: max_post,
		//data: JSON.stringify(data),
	};

	// console.log(ajaxurl.ajax_url);

	// let xhttp = new XMLHttpRequest();
	// xhttp.open('POST', ajaxurl.ajax_url);

	// xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	// xhttp.send();
}

function myFunction1(xhttp) {
	// action goes here
	//document.getElementById('demo').innerHTML = this.responseText;
	console.log('respuesta: ', JSON.stringify(xhttp));
}
