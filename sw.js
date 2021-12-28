// const version = '0.1.19';
// const cacheName = `heylaika-${version}`;
// self.addEventListener('install', e => {
// 	e.waitUntil(
// 		caches.open(cacheName).then(cache => {
// 			return cache.addAll([`/`]).then(() => self.skipWaiting());
// 		})
// 	);
// });

// // // during the install phase you usually want to cache static assets
// // self.addEventListener('install', function(e) {
// // 	// once the SW is installed, go ahead and fetch the resources to make this work offline
// // 	e.waitUntil(
// // 			caches.open(cacheName).then(function(cache) {
// // 					return cache.addAll([
// // 							'./',
// // 							'./dist/css/homepage.min.css',
// // 							'./dist/css/internal.css',
// // 							'./dist/js/bootstrap.min.js',
// // 							'./dist/js/bundle_home.js',
// // 							'./dist/js/popper.min.js',
// // 							'./dist/js/jquery-3.6.0.min.js',
// // 					]).then(function() {
// // 							self.skipWaiting();
// // 					});
// // 			})
// // 	);
// // });

// self.addEventListener('activate', event => {
// 	event.waitUntil(self.clients.claim());
// });

// self.addEventListener('fetch', event => {
// 	event.respondWith(
// 		caches
// 			.open(cacheName)
// 			.then(cache => cache.match(event.request, { ignoreSearch: true }))
// 			.then(response => {
// 				return response || fetch(event.request);
// 			})
// 	);
// });
self.addEventListener('fetch', function (event) {
	// do nothing here, just log all the network requests
	console.log(event.request.url);
});
