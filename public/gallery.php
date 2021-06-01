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

                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/gallery?lang=$lang",
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
                <h2><?php if($lang=='ar'){ echo "معرض الصور";}else{ echo "Our Gallery";} ?></h2>
                
               <!-- <p class="career-p">Dunkin' KSA</p> -->
                <br><br>
                
                      <div class="row gallery">
                         <?php 
                         foreach($data['data'] as $val) {
                           $img=  explode(',',$val['image_url']);
                           $src=$img[0];
                     ?> 
                        <form action="gallery_images.php?id=<?php echo $val['id'];?>" method="post" class="event col s12 m3 l3 gallery-col" id="<?php echo $val['id'];?>" onclick="document.getElementById('<?php echo $val['id'];?>').submit()">
                          <input type="hidden" name="id" value="<?php echo $val['id'];?>">
                          <input type="hidden" name="title" value="<?php echo $val['title'];?>">
                          <input type="hidden" name="date" value="<?php echo $val['date'];?>">
                          <div class="event_img">
                              <img src="<?php  echo "https://dunkinsa.abstractagency.net/".$src;?>">
                          </div>
                          <div class="event-text">
                              <h1 class="event_time"><?php echo $val['date'];?></h1>
                              <h2 class="event_title left-align"><?php echo $val['title'];?></h2>
                          </div>
                        </form>
                     <?php } ?>   

                      
                
                      </div>

                <br><br>
            </div>
            
            
    
    <script language="JavaScript" type="text/javascript">
     
    </script>
    <?php include 'footer.php';?>

