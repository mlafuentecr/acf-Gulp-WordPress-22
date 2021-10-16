/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/

document.readyState !== 'loading' ? pwa() :	document.addEventListener('DOMContentLoaded', ()=>pwa());

function pwa() {
	/*-----------------------------------------------------------------------------------*/
	/*  PWA pasar el worker al root
	/*-----------------------------------------------------------------------------------*/
	
	if ('serviceWorker' in navigator) {
			// Register a service worker hosted at the root of the
			// site using the default scope.
			navigator.serviceWorker.register('sw.js').then(function(registration) {
				console.log('Service worker registration succeeded:', registration);
	
				// return cache.addAll([
				//   '/',
				//   '/index.html',
				//   '/index.html?homescreen=1',
				//   '/?homescreen=1',
				//   '/styles/main.css',
				//   '/scripts/main.min.js',
				//   '/sounds/airhorn.mp3'
				// ]);
	
			}).catch(function(error) {
				console.log('Service worker registration failed:', error);
			});
		} else {
			console.log('Service workers are not supported.');
		}
	
	
	}