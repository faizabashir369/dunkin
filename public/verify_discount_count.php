<?php
        session_start();
         if(isset($_COOKIE["lang"])) {
                $lang=$_COOKIE["lang"];
            }
            else
            {
                $_COOKIE["lang"]="en";
                $lang="en";
            }
        $customer_id=$_COOKIE['customer_id'];
        $customer_phone=$_COOKIE['phone'];
        $_POST = file_get_contents('php://input');
        $code=$_POST;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/verifyDiscountCode?discount_code=$_POST&customer_id=$customer_id&customer_phone=$customer_phone&lang=$lang",
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