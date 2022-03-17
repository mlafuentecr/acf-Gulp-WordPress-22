/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? internal() : document.addEventListener('DOMContentLoaded', () => internal());
let current_page = '';
let postsDiv = '';

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
		postsDiv = document.querySelector('.post-list');

		console.log('load more is present', postsDiv);
		const btnLoadMore = document.querySelector('.load-more-post');
		btnLoadMore.addEventListener('click', () => fetchPost());
		current_page = postsDiv.dataset.page;
	}
}

function fetchPost() {
	console.log(postsDiv);
	const postInsert = document.querySelector('.postInsert');
	const max_post = postsDiv.dataset.max;
	current_page++;

	console.log('current_page ', current_page);
	const url = '/wp-admin/admin-ajax.php?action=loadmore_posts';
	const data = `current_page=${current_page}&posts_per_page=${max_post}`;

	//FETCHING DATA BY XMLHttpRequest
	//startHttpRequest(url, data);
	fetchinRequest(url, data, postInsert);
}

/* FETCHING DATA BY XMLHttpRequest*/
function fetchinRequest(url, data, postInsert) {
	fetch(url, {
		method: 'POST', // or 'PUT'
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded',
		},
		body: data,
	})
		.then(response => response.text())
		.then(data => {
			const content = JSON.parse(data);
			postInsert.innerHTML += content.data;
			//console.log('Success:', content);
		})
		.catch(error => {
			console.error('Error:', error);
		});
}

/* FETCHING DATA BY XMLHttpRequest*/
function startHttpRequest(url, data) {
	if (!window.XMLHttpRequest) {
		alert('Your browser does not support the native XMLHttpRequest object.');
		return;
	}
	const oReq = new XMLHttpRequest();
	oReq.addEventListener('load', reqListener);
	oReq.addEventListener('error', transferFailed);
	oReq.open('POST', url, true);
	oReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	oReq.send(data);
}

function reqListener() {
	console.log(this);
}
function transferFailed(evt) {
	console.log('An error occurred while transferring the file.');
}
//////////////////////////////////////////

//stop video when someone click out of the popup
function stopVideo() {
	document.querySelectorAll('iframe').forEach(v => {
		v.src = v.src;
	});
	document.querySelectorAll('video').forEach(v => {
		v.pause();
	});
}
