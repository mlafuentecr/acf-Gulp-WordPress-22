// PUT IT IN THE ROOT
// let cacheName = 'clientName-pwa';
// /* Start the service worker and cache all of the app's content */
// self.addEventListener('install', e => {
// 	e.waitUntil(
// 		caches.open(cacheName).then(function (cache) {
// 			return cache.addAll(filesToCache);
// 		})
// 	);
// });

// /* Serve cached content when offline */
// self.addEventListener('fetch', e => {
// 	e.respondWith(
// 		caches.match(e.request).then(response => {
// 			return response || fetch(e.request);
// 		})
// 	);
// });

self.addEventListener('fetch', function (event) {
	// do nothing here, just log all the network requests
	console.log(event.request.url);
});

self.addEventListener('install', event => {
	console.log('Service worker installed');
});
self.addEventListener('activate', event => {
	console.log('Service worker activated');
});
