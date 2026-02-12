const CACHE_NAME = 'sosial-menyapa-v3';
const urlsToCache = [
  './index.php?r=site/registrasi-psm',
  './index.php?r=site/index',
  './css/site.css',
  './logo-icon.png'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(async cache => {
        console.log('Opened cache');
        // Cache files one by one to avoid one failure breaking everything
        for (const url of urlsToCache) {
          try {
            await cache.add(url);
          } catch (error) {
            console.error('Failed to cache:', url, error);
          }
        }
      })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        if (response) {
          return response;
        }
        return fetch(event.request);
      })
  );
});

self.addEventListener('activate', event => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
