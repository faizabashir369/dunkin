<?php
   session_start();
   if(isset($_COOKIE['lang']))
   {
      $lang=$_COOKIE['lang'];
   }
   else
   {
      $lang='en';
   }
   $lang=$_COOKIE['lang'];
   unset($_SESSION["customer"]);
   unset($_SESSION["customer_id"]);
   session_destroy();
   setcookie("customer","",time()-3600);
   setcookie("customer_id","",time()-3600);
   setcookie("phone","",time()-3600);
   setcookie("email","",time()-3600);
   setcookie("shopify_customer_id","",time()-3600);
   setcookie("first_name","",time()-3600);
   setcookie("last_name","",time()-3600);
   setcookie("loyalty_card_number","",time()-3600);
   setcookie("url","",time()-3600);
   setcookie("session_key","",time()-3600);

   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dunkinsa.abstractagency.net/dunkinsa-api/api/logout',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('device_id' => $_COOKIE['device_id']),
  CURLOPT_HTTPHEADER => array(
    'apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9',
    'X-localization: $lang'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
   <script>
      localStorage.clear();
   </script>
   <?php
    
  header("Location:login.php");
   
?>