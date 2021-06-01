<?php include 'header.php';?>
<?php include 'sidebar.php';?>
            
            <div id="products_menu" class="about_us">
                <?php

                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/about_us/?request=1&lang=$lang",
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
                
                <h2 class="about"><?php echo $data['data']['title_eng']; ?></h2>
                <div class="row">
                    <h5 class="about"><?php echo $data['data']['h_history_eng'];?></h5>
                    <p class="about"><?php echo $data['data']['history_eng'];?></p>
                </div>
                <div class="row">
                <h5 class="about"><?php echo $data['data']['h_about_eng'];?></h5>
                <p class="about"><?php echo $data['data']['about_eng'];?></p>
                </div>
                <div class="row" id="vision">
                <h5 class="about"><?php echo $data['data']['h_vision_eng'];?></h5>
                <p class="about"><?php echo $data['data']['vision_eng'];?></p>
                </div>
                <div class="row" id="mission">
                <h5 class="about"><?php echo $data['data']['h_mission_eng'];?></h5>
                <p class="about"><?php echo $data['data']['mission_eng'];?></p>
                </div>
                
              
                
                    
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    
  <?php include 'footer.php';?>

