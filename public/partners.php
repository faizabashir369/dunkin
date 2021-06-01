<?php include 'header.php';?>
<?php include 'sidebar.php';?>
            
            <div id="products_menu" class="about_us partners_page">
                <?php

                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/delivery_partners/?request=1&lang=$lang",
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
                     
                     foreach($data['data'] as $val) { ?>
                     <div class="row valign-wrapper" id="partners" data-href="<?php echo $val['url'];?>">
                        <div class="responsive-img" class="col s2 m2 l2 offset-l3 p_logo">
                            <img src="<?php echo $val["icon"];?>" class="partner-logo" alt="<?php echo $val["name"]; ?>">
                        </div>
                        <div class="col s4 m4 l4 p_name left-align">
                            <span class="partner_name"><?php echo $val["name"];?></span>
                        </div>
                    </div>
                 <?php }?>
               
                    
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            
            const clickable_row=document.querySelectorAll("div[data-href]");
            console.log(clickable_row);
            clickable_row.forEach(row => {
                
                row.addEventListener('click', () => {
                    window.location.href=row.dataset.href;
                });
            });
        });
    </script>
    
  <?php include 'footer.php';?>

