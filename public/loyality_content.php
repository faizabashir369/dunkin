   
        <?php
        if($_COOKIE["customer"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
        }
        else
        {
            header("Location:login.php");
        }

        if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
        }
        else
        {
            $lang="en";
        }
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/get-customer-loyalty-cards",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('shopify_customer_id' => $customer_id, 'session_key' => $_COOKIE['session_key']),
        CURLOPT_HTTPHEADER => array(
        "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
        "X-localization: $lang"
        ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $data= json_decode($response,true);
        if($data['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        else
        {


        $data=$data['data'];
        $cards=$data['cards'];
        foreach($cards as $card)
        {
            $_SESSION['loyality_card_number']=$card['card_number'];
        ?>

                <div class="card_balance">
                <div class="space-20">
                  
                </div>
                       <h2><?php if($lang=='ar'){ echo "رقم بطاقة دنكاوي ";}  
                                else
                                { echo "Card Number";} ?></h2>
                       <h4><?php  echo $card['card_number'];?></h4>
                <div class="space-20">
                  
                </div>
                <?php
                    
                       //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "Qrcode/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';

    $errorCorrectionLevel = 'H';    

    $matrixPointSize = 10;
    
    $requestData="%".$card['card_number']."?";
    

        $filename = $PNG_TEMP_DIR.'test'.md5($requestData.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($requestData, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        

                ?>
                <div class="img_web">
                <img src="<?php echo $PNG_WEB_DIR.basename($filename); ?>" alt="transfer" >
                </div>
                <div class="img_mobile">
                <img src="<?php echo $PNG_WEB_DIR.basename($filename); ?>" alt="transfer" >
                </div>
    
                      <h4 class="h_points"><?php if($lang=='ar'){ echo "رمز دنكاوي";}  
                                else
                                { echo "Dunkway QR Code";} ?></h4>
                      <div class="bottom-text">
                      <p><?php if($lang=='ar'){ echo "امسح رمز الاستجابة السريعة لإضافة أو استبدال النقاط إلى رصيدك ";}  
                                else
                                { echo "Scan the QR code to purchase any of your favourite dunkin items form our stores";} ?>
                                </p>
                      </div>
                      <div class="balance">
                          <h3><?php if($lang=='ar'){ echo "لديك ";}  
                                else
                                { echo "You have";} ?></h4>
                          <h4>SAR <?php echo $card['active_points'];?></h4>
                      </div> 
            </div>
            <?php } }?>
            
     <script>
    $(document).ready(function(){

    $('.slider').slider({ 
        full_width: false,
        height : 197, // default - height : 400
        interval: 8000 // default - interval: 6000
    });

    });
    $('select').formSelect();
    </script>
