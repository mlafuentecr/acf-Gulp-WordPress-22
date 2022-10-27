self.addEventListener("fetch", function (event) {
	// do nothing here, just log all the network requests
	console.log(event.request.url);
});

self.addEventListener("install", (event) => {
	console.log("Service worker installed");
});
self.addEventListener("activate", (event) => {
	console.log("Service worker activated");
});
