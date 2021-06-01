<?php 
if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
    }
    else
    {
        $_COOKIE["lang"]="en";
        $lang="en";
    }


if(isset($_POST['change_password']))
   {
       
   $verification_code=$_POST['v_code'];
    
    $password=$_POST['password'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/reset-password",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array('verification_code' => $verification_code,'password' => $password),
    CURLOPT_HTTPHEADER => array(
    "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
    "X-localization: $lang"
    ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
   echo json_encode($response);
   }
   ?>