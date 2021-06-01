        const CACHE_NAME = "version-4";
        const urlsToCache = []; /*'public/index.html', 
                              'public/style.css' ,
                               'public/index.js' ,
                              'public/images/logo.png',
                              'public/images/icon.png',
                              'public/images/BG.png',
                              'public/font/DunkinSans-Display.otf'
                              ];*/
        
        const self = this;
        
        // Install SW
        self.addEventListener('install', (event) => {
            event.waitUntil(
                caches.open(CACHE_NAME)
                    .then((cache) => {
                        console.log('Opened cache');
        
                        return cache.addAll(urlsToCache);
                    })
            )
        });
        
        // Listen for requests
        self.addEventListener('fetch', (event) => {
            event.respondWith(
                caches.match(event.request)
                    .then(() => {
                        return fetch(event.request) 
                            .catch(() => caches.match('public/index.php'))
                            
                    })
            )
        });
        
        // Activate the SW
        self.addEventListener('activate', (event) => {
            const cacheWhitelist = [];
            cacheWhitelist.push(CACHE_NAME);
        
            event.waitUntil(
                caches.keys().then((cacheNames) => Promise.all(
                    cacheNames.map((cacheName) => {
                        if(!cacheWhitelist.includes(cacheName)) {
                            return caches.delete(cacheName);
                        }
                    })
                ))
                    
            )
        });
        
        
        'use strict';
       
        self.addEventListener('push', function(event) {
         /* console.log('Push started');
          const promiseChain = self.registration.showNotification('Push Notification.');
        
          event.waitUntil(promiseChain);
          console.log('Push finished');*/
        });
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        