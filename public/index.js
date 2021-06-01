
        if('serviceWorker' in navigator) {
                    window.addEventListener('load', () => {
                        navigator.serviceWorker.register('/PWA2/serviceworker.js')
                            .then((reg) => console.log('Success: ', reg.scope))
                            .catch((err) => console.log('Failure: ', err));
                            
                    })
        }
        else
        {
        console.log('Your browser does not support service worker');
        }
        /*
        window.onload = function(e){ 
                  // Let's check if the browser supports notifications
                  if (!("Notification" in window)) {
                    console.log("This browser does not support desktop notification");
                  }
                
                  // Let's check whether notification permissions have already been granted
                  else if (Notification.permission === "granted") {
                    // If it's okay let's create a notification
                     Notification.requestPermission().then(function (permission) {
                      // If the user accepts, let's create a notification
                      if (permission === "granted") {
                        navigator.serviceWorker.getRegistration().then(sw => {
                           let options = {
                               body: "Welcome to Dunkin Donuts!",
                               icon: "images/logo.png",
                               badge: "images/icon.png",
                            };
                       sw.showNotification("This is test Notification!", options);
                       });
                  }
                  // Otherwise, we need to ask the user for permission
                  else if (Notification.permission !== 'denied' || Notification.permission === "default") {
    Notification.requestPermission(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        var notification = new Notification("Hi there!");
      }
    });
  }
                       else
                       {
                           console.log("You dont have permission for showing notification");
                           alert("You dont have permission for showing notification");
                       }
                    });
                  }
                
                  // At last, if the user has denied notifications, and you 
                  // want to be respectful there is no need to bother them any more.
                   
                }
                */
        window.addEventListener('beforeinstallprompt', (event) => {
              console.log('before install prompt');
              // Stash the event so it can be triggered later.
              window.deferredPrompt = event;
              // Remove the 'hidden' class from the install button container
             
            });

            butInstall.addEventListener('click', () => {
              console.log('butInstall clicked');
              const promptEvent = window.deferredPrompt;
              if (!promptEvent) {
                // The deferred prompt isn't available.
                return;
              }
              // Show the install prompt.
              promptEvent.prompt();
              // Log the result
              promptEvent.userChoice.then((result) => {
                console.log('userChoice', result);
                // Reset the deferred prompt variable, since
                // prompt() can only be called once.
                window.deferredPrompt = null;
                // Hide the install button.
                divInstall.classList.toggle('hidden', true);
              });
            });
            
            window.addEventListener('appinstalled', (event) => {
              console.log('appinstalled', event);
            });
            
            
            
            
