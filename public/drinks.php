 <?php include 'header.php';?>
 <?php include 'sidebar.php';?>

            
            <div id="products_menu">
                <h2>Drinks</h2>
                <div class="third-menu" style="display:none;">
                          <a class="tablinks active" href="#" onclick="openTab(event, 'menu')">Menu</a> 
                          <a href="#" class="tablinks" onclick="openTab(event, 'favourities')">Favourities</a>
                          <a href="#" class="tablinks" onclick="openTab(event, 'recent')">Recent</a>
                </div>
               <?php

                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://2891e62039758c683b5e8acd645f259a:03982c997e9239e6922cdc4c5df2f254@dunkinsa.myshopify.com/admin/api/2020-04/products.json",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => true,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "Cookie: __cfduid=dd174bbe7d4a302a72bdc53ce21cb8b581598304992"
                          ),
                        ));
                        
                        $response = curl_exec($curl);
                        
                        curl_close($curl);
                        
                        $data = json_decode($response, true);
                          $i=0;
                          if(sizeof($data['products'])==0)
                          {
                              echo '<p class="message">No Drink found</p>';
                          }
                            
                    ?>
                            <div class="row product tabcontent" id="menu">
                                <?php foreach($data['products'] as $val) {
                                    if($val['tags']=='hotdrinks' || $val['tags']=='colddrinks') {
                                        foreach($val['images'] as $vals) {
                                ?>
                                
                                <div class="col s6 m6 l3">
                                  <img class="product-img responsive-img" src="<?php  echo $vals['src'];?>" >
                                  <form action="product_details.php" method="post">
                                      <input type="hidden" name="image" value="<?php  echo $vals['src'];?>">
                                      <input type="hidden" name="product_name" value="<?php  echo $val['title'];?>">
                                      <button type="submit" class="collecion_name"><?php  echo $val['title'];?></button>
                                  </form>
    
                                </div>
                                <?php
                                 $i++;
                                 
                                        }
                                    }
                                 } ?>
                                </div>
                            </div>
                    
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
        function openTab(evt, tabName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(tabName).style.display = "block";
            
              evt.currentTarget.className += " active";
        }
    </script>
  <?php include 'footer.php';?>

