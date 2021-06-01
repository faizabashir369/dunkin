<?php 
if (isset($_POST['services']))
     {
         $postData['phone'] = $_POST['cell-phone'];

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/branches/AddBranchRatings/index.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>$postData,
          CURLOPT_HTTPHEADER => array(
            "Content-Type: multipart/form-data"
          ),
            ));
          $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo json_encode($response);
            }  

}
?>