<?php
if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
    }
    else
    {
        $lang="en";
    }
$_POST = file_get_contents('php://input');


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/delete-shopify-customer-address",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('shopify_customer_id'=>$_COOKIE['customer_id'],'address_id'=>$_POST,'session_key'=>$_COOKIE['session_key']),
  CURLOPT_HTTPHEADER => array(
    "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
    "X-localization: $lang"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



?>