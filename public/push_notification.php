<html>
<title>Firebase Messaging Demo</title>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
<body]
    <?php
// Server key from Firebase Console

$data = array("to" => "fWnRN1fe-Cq0ae2rr4523H:APA91bEADD4er93hQAkUqzAw2xdtbpMxhWKm9dD8idGIKFzfTSxB9aDGoMa8SEBr2iCO3Jp1OEY29xOUjz6qOWzb3c_s1scK1glA0yQQ6s_0t-40RHwUqmmOqXo_J8r2CXq5AfWEnxc9",
              "notification" => array( "title" => "Dunkin Push Notification", "body" => "Push notification from dunkin!","icon" => "icon.png", "click_action" => ""));                                                                    
$data_string = json_encode($data); 

echo "The Json Data : ".$data_string; 

$server_key = 'AAAAaQO2JCY:APA91bFxEKGyzn_aztafPiG-eyKQj_TDnBe53XTsRxe2mzNd4qzpFKHa6kDCfZkMsooi8ai_chpHVvVWNvBgCSt_5cE9NtchGR9cmcocfQEFVCR9b2vxyn0JnJXO_IafE0mnfuXeVNxz';
//header with content_type api key
$headers = array(
    'Content-Type:application/json',
    'Authorization:key='.$server_key
);                                                                             
                                                                                                                     
$ch = curl_init();  

curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
curl_setopt( $ch,CURLOPT_POST, true );  
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
                                                                                                                     
$result = curl_exec($ch);

curl_close ($ch);

echo "<p>&nbsp;</p>";
echo "The Result : ".$result; ?>

    <div id="token"></div>
    <div id="msg"></div>
    <div id="notis"></div>
    <div id="err"></div>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
    <script>
        MsgElem = document.getElementById("msg");
        TokenElem = document.getElementById("token");
        NotisElem = document.getElementById("notis");
        ErrElem = document.getElementById("err");
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        var config = {
            'messagingSenderId': '451033834534',
            'apiKey': 'AIzaSyAEvobbxLyxO-Tnf-5XBY6LlZZGJ5NGZDc',
            'projectId': 'dunkin-ksa-1574702746362',
            'appId': '1:451033834534:web:900d2532d3ae09dd95f2e7',
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");
                
                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                TokenElem.innerHTML = "token is : " + token
            })
            .catch(function (err) {
                ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

        let enableForegroundNotification = true;
        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload);

            if(enableForegroundNotification) {
                const {title, ...options} = JSON.parse(payload.data.notification);
                navigator.serviceWorker.getRegistrations().then(registration => {
                    registration[0].showNotification(title, options);
                });
            }
        });
  
    </script>



    </body>

</html>
