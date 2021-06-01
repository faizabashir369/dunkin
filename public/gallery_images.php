 <?php 
  $_COOKIE["url"] = $_SERVER['REQUEST_URI'];
    if($_COOKIE["shopify_customer_id"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
        $shopify_customer_id=$_COOKIE["shopify_customer_id"];
    }
    else
    {
        $customer_id="0";
    }


 include 'header.php';
 ?>
 
    
                 <?php
                $id=htmlspecialchars($_POST['id']);
                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/gallery?id=$id&lang=$lang",
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
                $data = json_decode($response, true);
               
                ?>
               
                
        
            <div id="registration_form" class="no-padding">
                <div class="space-20"></div>
                <h2 style="color:#FF671F"><?php echo htmlspecialchars($_POST['title']);?></h2>
                
                <p class="career-p" style="color:#FF671F"><?php echo htmlspecialchars($_POST['date']);?></p>
                <br><br>
                
                      <div class="row gallery">
                         <?php 
                           
                         foreach($data['data'] as $val) {
                           $img=  explode(',',$val['image_url']);
                           $src=$img[0];
                           foreach($img as $vals) {
                ?> 
                
                        <div class="event col s12 m3 l3 gallery-col">
                          <div class="event_img">
                              <img src="<?php  echo "https://dunkinsa.abstractagency.net/".$vals;?>">
                          </div>
                          
                        </div>
                     <?php } }?>   

                      
                
                      </div>

                <br><br>
            </div>
            
            
    
    <script language="JavaScript" type="text/javascript">
     
    </script>
    <?php include 'footer.php';?>

