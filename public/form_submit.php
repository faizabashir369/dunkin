<?php
    	header('X-Frame-Options: DENY');
	header('X-XSS-Protection: 1; mode=block');
	header('X-Content-Type-Options: nosniff');    
	if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
    }
    else
    {
        $lang="en";
    }
    session_start();
    if(isset($_COOKIE['phone']))
    {
    $phone=$_COOKIE['phone'];
    $phone=str_replace("+966", "",$phone);
    $email=$_COOKIE['email'];
  }
    if(isset($_COOKIE['customer_id']))
    {
        $customer_id=$_COOKIE['customer_id'];
        $shopify_customer_id=$_COOKIE['shopify_customer_id'];
    }
    if(isset($_POST['job_id'])){
    $first_name=$_POST['first_name'];
  	$last_name=$_POST['last_name'];
  	$dob=$_POST['dob'];
  	$gender=$_POST['gender'];
  	$country=$_POST['country'];
  	$visa_status=$_POST['visa_status'];
  	$email=$_POST['email'];
  	$phone=$_POST['phone'];
    $religion=$_POST['religion']; 
  	$location=$_POST['location'];
  	$university=$_POST['university'];
  	$major=$_POST['major']; 
  	$start_date=$_POST['start_date'];
  	$end_date=$_POST['end_date'];
  	$grade=$_POST['grade'];
    $current_location=$_POST['current_location'];
    $address=$_POST['address'];
  	$eng_level=$_POST['eng_level'];
  	$arabic_level=$_POST['arabic_level'];
  	$job_catagory=$_POST['job_category'];
  	$job_role=$_POST['job_role'];
  	$years_exp=$_POST['years_exp'];
  	$referee_name=$_POST['referee_name'];
  	$referee_email=$_POST['referee_email'];
  	$referee_phone=$_POST['referee_phone'];
  	$error = "0";
  	$about=$_POST['about'];
    $job_id=$_POST['job_id'];
    if(isset($_FILES))
    {
                   
                 
}
  if ($error == "0") {
   if(isset($_FILES))
    {
                    // image file directory
                    $target = $_SERVER['DOCUMENT_ROOT'] . '/uploads/homepage/'.basename($image);
                    if (is_uploaded_file($_FILES['cv']['tmp_name']))
                    {
                       
                           $image = $_FILES['cv']['name'];

                   $image=$uploadURL.date("Y-m-d h:i:sa").$image;
                   $image = preg_replace('/\s+/', '', $image);
                   $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $mime = finfo_file($finfo, $_FILES['cv']['tmp_name']);
  finfo_close($finfo);
  $allowedExts = array("doc", "docx", "pdf", "odt", "png", "jpg" ,"jpeg");
  $allowedExt = array("application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.oasis.opendocument.text","application/msword","application/doc","application\/vnd.openxmlformats-officedocument.wordprocessingml.documentFile", "application/docx", "application/pdf", "application/odt", "image/png", "image/jpg" ,"image/jpeg");
  $temp = explode(".", $_FILES["cv"]["name"]);
   $extension = end($temp);

  


  if ($_FILES["cv"]["error"] > 0 && $_FILES["cv"]["error"]!=4) {
    $error = "1";
    echo json_encode(array("success" => '0',
                            "message" => "Error opening the file"
                                  ));      

  }
  elseif ( $_FILES["cv"]["type"] != "application/pdf" && $_FILES["cv"]["type"] != "image/png" && $_FILES["cv"]["type"] != "image/jpg" && $_FILES["cv"]["type"] != "image/jpeg" &&
      $_FILES["cv"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
      $_FILES["cv"]["type"] != "application/msword" &&
      $_FILES["cv"]["type"] != "application/vnd.oasis.opendocument.text") { 
    $error = "1";
  echo json_encode(array("success" => '0',
                                   "message" => $_FILES["cv"]["type"]."File type not allowed"
                                  )); 
  
  }
  elseif (!in_array($mime, $allowedExt) || !in_array($extension, $allowedExts)) {
   $error = "1";
    echo json_encode(array("success" => '0',
                                   "message" => $mime."File Extension not allowed".$extension
                                  )); 
    
  }
 /* if () {
   $error = "1";
    echo json_encode(array("success" => '0',
                                   "message" => "File Extension not allowed"
                                  )); 
    
  } */
  elseif ($_FILES["cv"]["size"] > 5000000) {
  $error = "1";
    echo json_encode(array("success" => '0',
                                   "message" => "File size shoud be less than 5 MB"
                                  )); 
  }
  $target = $_SERVER['DOCUMENT_ROOT'] . '/uploads/homepage/'.basename($image);
                    }
                    else
                    {
                        
                        
                    }
                    if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
                        $cv='/uploads/homepage/'.basename($image);
                    }
                    else {
                    
                      // print_r($_FILES['image']['error']);echo "error";
                      $cv="";
                       $error=1;
                    }
      }
      else
      {
        $cv="";
        $error=0;
      }
                    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/jobs/apply.php?lang=$lang",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('first_name' => $first_name, 'last_name' => $last_name,'address' => $address, 'dob' => $dob, 'gender'  => $gender,'country'  =>  $country,'visa_status'  => $visa_status, 'email' => $email, 'phone' => $phone,'address'  => $address,'address' => $address, 'religion' => $religion,  'location' => $location,  'university' => $university, 'major' => $major, 'start_date' => $start_date,'end_date'  => $end_date, 'grade'  => $grade, 'current_location' => $current_location, 'eng_level' => $eng_level,  'arabic_level' => $arabic_level, 'job_catagory' => $job_catagory,  'job_role' => $job_role,  'years_exp' => $years_exp,  'referee_name' => $referee_name, 'referee_email' => $referee_email,'referee_phone'  => $referee_phone, 'cv' => $cv, 'about' => $about, 'job_id' => $job_id),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}
}
    if(isset($_POST['customer_id']) && isset($_POST['order_rating']) )
   {
        $cust_id=$_POST['customer_id'];
        $rate=$_POST['order_rating'];
        $customer=$_POST['customer'];
     
       // $langs=$_COOKIE['lang'];
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/rating/index.php?lang=$lang",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('customer_id' => $cust_id,'customer' => $customer,'order_rating' => $rate,'lang' => $lang),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


   }
   if(isset($_POST['forgot_password']))
   {
        $phone=$_POST['phone'];
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/send-password-verification-code",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('phone' => $phone, 'session_key' => $_COOKIE['session_key']),
        CURLOPT_HTTPHEADER => array(
        "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
        "X-localization: $lang"
        ),
        ));
        
        $response = curl_exec($curl);
        if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        curl_close($curl);
        echo $response;

   }
    if(isset($_POST['edit_profile']))
   {
       $first_name=$_POST['f_name'];
       $last_name=$_POST['l_name'];
       $email=$_POST['email'];
       $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/update-shopify-customer-info",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('first_name' => $first_name,'last_name' => $last_name,'email' => $email,'shopify_customer_id' => $customer_id, 'session_key' => $_COOKIE['session_key']),
        CURLOPT_HTTPHEADER => array(
        "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
        "X-localization: $lang"
        ),
        
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        echo $response;
           }
   if(isset($_POST['survey']))
   {
      
       $rate_services=$_POST['rating-services'];
       $rate_product=$_POST['rating-products'];
       $rate_cleanliness=$_POST['rating-clean'];
       $rate_performance=$_POST['rating-seller'];
       $branch=$_POST['branch'];
       $note=$_POST['note'];
       $attachment = $_POST['base64_image'];
       $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/branches/AddBranchRatings/index.php?lang=$lang",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n \"attachment\": \"$attachment\",\n \"phone\": \"$phone\",\n\"email\": \"$email\",\n \"rate_product\": \"$rate_product\",\n  \"rate_services\": \"$rate_services\",\n   \"branch_id\": \"$branch\",\n    \"note\": \"$note\",\n     \"rate_performance\": \"$rate_performance\",\n      \"rate_cleanliness\": \"$rate_cleanliness\",\n \"lang\": \"$lang\"\n     }",
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
   }
   if(isset($_POST['editAddress']))
   {
      
       $address_id=$_POST['address_id'];
       $first_name=$_POST['first_name'];
       $last_name=$_POST['last_name'];
       $address1=$_POST['address1'];
       $city=$_POST['city'];
       $country=$_POST['country'];
       $address2=$_POST['address2'];
       $zip=$_POST['zip'];
       $province=$_POST['province'];
       
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/update-shopify-customer-address",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('shopify_customer_id' => $shopify_customer_id,'address_id' => $address_id,'first_name' => $first_name,'last_name' => $last_name,'address1' => $address1,'city' => $city,'country' => $country,'address2' =>  $address2,'zip' => $zip,'province' => $province, 'session_key' => $_COOKIE['session_key']),
          CURLOPT_HTTPHEADER => array(
            "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
            "X-localization: $lang"
          ),
        ));

        $response = curl_exec($curl);
        
        curl_close($curl);
        if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        echo $response;
   }
   
   if(isset($_POST['addAddress']))
   {
       $shopify_customer_id=$_POST['shopify_customer_id'];
       $first_name=$_POST['first_name'];
       $last_name=$_POST['last_name'];
       $address1=$_POST['address1'];
       $city=$_POST['city'];
       $country=$_POST['country'];
       $address2=$_POST['address2'];
       $zip=$_POST['zip'];
       $province=$_POST['province'];
       
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/create-shopify-customer-address",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('shopify_customer_id' => $shopify_customer_id,'first_name' => $first_name,'last_name' => $last_name,'address1' => $address1,'city' => $city,'country' => $country,'address2' =>  $address2,'zip' => $zip,'province' => $province, 'session_key' => $_COOKIE['session_key']),
          CURLOPT_HTTPHEADER => array(
            "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
            "X-localization: $lang"
          ),
        ));

        $response = curl_exec($curl);

        if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        
        curl_close($curl);
        echo $response;
   }

     if(isset($_POST['savFav']))
    {
        
          $title=$_POST['favourite'];
          $id=$_POST['orderId'];
          $mob=$_POST['mobile_no'];
        
        $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/createFavouriteOrder/index.php?lang=$lang",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('order_id' => $id,'fav_order_title' => $title,'mob_no' => $mob),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;

        
    }

    if(isset($_POST['contactForm']))
    {

        
        $name=$_POST['name'];
        $mobile_no=$_POST['mobile_no'];
        $email=$_POST['email'];
        $reason = $_POST['notes'];
        $message = $_POST['reason'];
        $attachment = $_POST['base64_image'];
       $error=0;
        
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

       
       {
        $url = $_FILES['image']['tmp_name'][$i];
//echo $url;
//print_r(get_headers($url));
//print_r(get_headers($url, 1));

                    $image = $_FILES['image']['name'][$i];
                   
                   
                   $image=$uploadURL.date("Y-m-d h:i:sa").$image;
                   $image = preg_replace('/\s+/', '', $image);
                  $allowedExts = array("doc", "docx", "pdf", "odt", "png", "jpg" ,"jpeg");
                  $temp = explode(".", $_FILES["image"]["name"][$i]);
                  $extension = end($temp);



  if($lang=='ar')
  {
    $message='غير مسموح';
  }
  else
  {
    $message='File type not allowed';
  }
if ($_FILES["image"]["type"][$i] != "image/png" && $_FILES["image"]["type"][$i] != "image/jpg"  && $_FILES["image"]["type"][$i] != "image/jpeg"
  && $_FILES["image"]["type"][$i] != "application/jpeg" && $_FILES["image"]["error"][$i]!=4 ) 
{ 
    $error = "2";
  
  echo json_encode(array("success" => '0',
                                   "message" => $message
                                  )); 
  die();
  }
  elseif (!in_array($extension, $allowedExts) && $_FILES["image"]["error"][$i]!=4) {
   $error = "3";
    echo json_encode(array("success" => '0',
                                   "message" => $message
                                  )); 
  die();
  }
  elseif ($_FILES["image"]["error"][$i] > 0 && $_FILES["image"]["error"][$i]!=4) {
    $error = "1";
    $error1="1";
    echo json_encode(array("success" => '0',
                            "message" => $message
                                  ));    
  die(); 

  }
  elseif($error=="2" || $error=="3" && $_FILES["image"]["error"][$i]!=4)
  {
    $error3=1;
    echo json_encode(array("success" => '0',
                                   "message" => $message
                                  ));
    die(); 
  }
  
  elseif ($_FILES["image"]["size"][$i] > 2097152 && $_FILES["image"]["error"][$i]!=4) {
  $error = "1";
    echo json_encode(array("success" => '0',
                                   "message" => "File size shoud be less than 2 MB"
                                  )); 
    die();
  }
 }
}
  if ($error == "0") {
   
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/contact/index.php?lang=$lang",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{      \"email\" : \"$email\",\"mobile_no\" : \"$mobile_no\",\"name\" : \"$name\",\"reason\" : \"$reason\",\r\n        \"message\" : \"$message\",\r\n        \"attachment\" : \"$attachment\"\r\n    \r\n}\r\n",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo  $response;
            }  
            
        

        }

    }

    if (isset($_POST['transfer']))
    {
        $postData['source_card']=$_POST['choose_card'];
        $postData['receiver_card']=$_POST['card_to'];
        $postData['points']=$_POST['amount'];
        $postData['session_key'] = $_COOKIE['session_key'];
        

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/transfer-points",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postData,
          CURLOPT_HTTPHEADER => array(
            "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
            "X-localization: $lang"
          ),
        ));
        
        $response = curl_exec($curl);
        if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        curl_close($curl);
        echo $response;

    }

    if (isset($_POST['login']))
    {
        $postData['phone']=$_POST['phone'];
        $postData['password']=$_POST['password'];
        $postData['device_id']=$_COOKIE['device_id'];
        $postData['device_type']="PWA";

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/login",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postData,
          CURLOPT_HTTPHEADER => array(
            "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
            "X-localization: $lang"
          ),
    ));

$response = curl_exec($curl);
if(isset($response['code']))
{
if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
          }
        }
curl_close($curl);
echo $response;
    }
    
     if (isset($_POST['resend_code']))
     {
        $postData['session_key'] = $_COOKIE['session_key'];
        $postData['phone'] = $_POST['cell-phone'];
        if(isset($_COOKIE['myCookie'])){
            $postData['phone']=json_decode($_COOKIE['myCookie']);
        }
        else{
            $postData['phone'] = $_POST['cell-phone'];
        }
        
        
        $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/resend-verification-code",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 300,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $postData,
              CURLOPT_HTTPHEADER => array(
                "apikey: dunkinsa-1qaz2wsx3edec-0okmnj9",
                "content-type: multipart/form-data",
        "X-localization: $lang"
            
              ),
            ));
            
            $response = curl_exec($curl);
            if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo json_encode($response);
            }  
         exit();
     }
    if (isset($_POST['v_code'])) {
       
          $postData['verification_code'] = $_POST['v_code'];
          $postData['session_key'] = $_COOKIE['session_key'];
          $postData['device_id']=$_COOKIE['device_id'];
          $postData['device_type']="PWA";
          $postData['session_key']=$_COOKIE['session_key'];
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/register-customer",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 300,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $postData,
              CURLOPT_HTTPHEADER => array(
                "apikey: dunkinsa-1qaz2wsx3edec-0okmnj9",
                "content-type: multipart/form-data",
                "X-localization: $lang"
            
              ),
            ));
            
            $response = curl_exec($curl);
            if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
             exit();
    }


if (isset($_POST['register'])) {
         
          $f_name =  $_POST['f_name'];
          $l_name =  $_POST['l_name'];
          $email =  $_POST['email'];
          $address =  $_POST['address'];
          $city =  $_POST['city'];
          $phone =  $_POST['phone'];
          $saudi_id =  $_POST['saudi_id'];
          $country =  $_POST['country'];
          $gender =  $_POST['gender'];
          $dob =  $_POST['dob'];
        
        //echo json_encode($_POST);
        if(isset($_POST['card_no'])){
            $postData['card_no']=$_POST['card_no'];
        }
        
        $postData['first_name'] = $_POST['f_name'];
        $postData['last_name'] = $_POST['l_name'];
        $postData['phone'] = $_POST['cell-phone'];
        $postData['password'] = $_POST['password'];
        $postData['gender'] = $_POST['gender'];
        $postData['dob'] = $_POST['dob'];
        $postData['email'] = $_POST['email'];
        $postData['saudi_id'] = $_POST['saudi_id'];
        $postData['city'] = $_POST['city'];
        $postData['address'] = $_POST['address'];
        $postData['country'] = $_POST['country'];
        $postData['device_id']=$_COOKIE['device_id'];
        $postData['device_type']="PWA";
        $postData['session_key']=$_COOKIE['session_key'];
      //  print_r($postData);
        
  
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/phone-verification",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 300,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postData,
          CURLOPT_HTTPHEADER => array(
            "apikey: dunkinsa-1qaz2wsx3edec-0okmnj9",
            "content-type: multipart/form-data",
        "X-localization: $lang"
        
          ),
        ));
        
        $response = curl_exec($curl);
        if($response['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
        
          echo $response;
        }  
         
  
  }
  else
  {
    /*   $response=array();
  $response["status"]=0;
  $response["message"]="verification code can not be sent";
  
  echo json_encode($response);*/
  }
   if(isset($_POST['change_password']))
   {
       
    echo $verification_code=$_POST['v_code'];
    exit();
     /*$password=$_POST['password'];
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
    "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9"
    ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
   echo json_encode($response);*/
   }
   if(isset($_GET['order_id']) && isset($_GET['branch_id']) && isset($_GET['order_status']) )
   {
       $order_id= $_GET['order_id'];
       $transaction_id=$_GET['transaction_id'];
       $branch_id=$_GET['branch_id'];
       $status=$_GET['order_status'];
       $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/customerUpdateOrderStatus?order_id=$order_id&branch_id=$branch_id&order_status=$status&transaction_id=$transaction_id&lang=$lang",
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

   }
   if(isset($_POST['rate_order']))
   {
        $order_id = $_POST['order_id'];
        $order_rating = $_POST['order_rating'];
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/addOrderRating/index.php?lang=$lang",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\n\"order_id\": \"$order_id\",\n\"order_rating\": \"$order_rating\" ,\n \"lang\": \"$lang\"\n }",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
             
   }
  ?>
 