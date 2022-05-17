document.readyState !== 'loading' ? blog() : document.addEventListener('DOMContentLoaded', () => blog());

function blog() {
	if (document.querySelector('#blog') || document.querySelector('#blog-single')) {
		console.log('BLOG');
		//Get COLOR AND PUT IT IN HEADER
		changeHeaderColor();
		searchForm();
	}

	///FOR LATES POST (is a page)
	//If I font load more post
	if (document.querySelector('.load-more-post')) {
		///GET THIS INFO HERE SO IT CAN INCRESE
		postsDiv = document.querySelector('.post-list');
		console.log('load more is present', postsDiv);
		current_page = postsDiv.dataset.currentpg;
		max_pos = '';
		const btnLoadMore = document.querySelector('.load-more-post');
		btnLoadMore.addEventListener('click', () => fetchPost());
	}
}

function changeHeaderColor() {
	const header = document.querySelector('#main-menu-top');
	const div_color = document.querySelector('.getColor');
	const bgColor = div_color.dataset.color;
	header.style.backgroundColor = `${bgColor}`;
}

/*-----------------------------------------------------------------------------------*/
/*  Menu Search
	/*-----------------------------------------------------------------------------------*/
function searchForm() {
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
}

/*   LOAD MORE JS */
function fetchPost() {
	current_page++;
	max_post = postsDiv.dataset.max;
	offset = postsDiv.dataset.offset;
	posts_per_page = postsDiv.dataset.posts_per_page;
	const url = `/wp-admin/admin-ajax.php?action=loadmore_posts`;
	const data = {
		current_page: current_page,
		offset: offset,
		posts_per_page: posts_per_page,
	};

	//FETCHING DATA BY XMLHttpRequest
	//startHttpRequest(url, data);
	fetchingRequest(url, data);
}

/* FETCHING DATA BY XMLHttpRequest*/
function fetchingRequest(url, data) {
	console.log(url, data, postsDiv);
	////CHECK IF I REACH THE MAX PAGES
	if (max_post <= current_page) {
		console.log('NO more post remove load more btn', max_post);
		return;
	} else {
		console.log('Keep going', max_post);
	}

	fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded',
		},
		body: JSON.stringify(data),
	})
		.then(response => response.text())
		.then(data => {
			const content = JSON.parse(data);
			postsDiv.insertAdjacentHTML('beforeend', content.data);
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
	console.log('html', data);
	const oReq = new XMLHttpRequest();
	oReq.addEventListener('load', reqListener);
	oReq.addEventListener('error', transferFailed);
	oReq.open('POST', url, true);
	oReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	oReq.send(data);
}

function reqListener() {
	const content = JSON.parse(this.responseText);
	console.log(content.data);
	postsDiv.insertAdjacentHTML('beforeend', content.data);
}
function transferFailed(evt) {
	console.log('An error occurred while transferring the file.');
}
//////////////////////////////////////////
