<?php
 if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
    }
    else
    {
        $_COOKIE["lang"]="en";
        $lang="en";
    }
$_POST = file_get_contents('php://input');


$curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/removeFavouriteOrder?fav_id=$_POST&lang=$lang",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;


?>