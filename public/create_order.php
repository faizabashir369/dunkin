<?php 
{
     $payment_type=$_GET['payment_type'];
     $card_number=$_GET['loyality_card_number'];
      $_POST = file_get_contents('php://input');
   
     $a=$_POST;

     $str=$a;
     //echo $str;
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
CURLOPT_URL => 'https://dunkinsa.abstractagency.net/api/v2/orders/sendOrderBranch/indexPost.php?payment_type='.$payment_type.'&loyality_card_number='.$card_number,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS =>$str,
           CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
}

?>