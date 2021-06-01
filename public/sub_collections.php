<?php include 'header.php';?>

<?php include 'sidebar.php';
?>
            
            <div id="products_menu">
                <h2> <?php 
                            if($lang=='ar'){
                                  echo 'قائمة المنتجات';
                                }
                                else
                                {
                                    echo 'Menu List';
                                }
                            ?></h2>
                
                
                                <div class="row" id="menu">
                                    <?php 
                                        if(isset($_POST['image'])) {
                                            $image=array();
                                            $image=$_POST['image'];
                                            $name=array();
                                            $name=$_POST['product_name'];?>
                            <ul id="tabs-swipe-demo" class="tabs">
                                
                            
                            
                                   <?php   array_map(function($img, $nam,$c){ ?> 
                         
                    <li class="tab col s4 m2 l2"><a href="#<?php  echo $c;?>"><?php  echo $nam;?></a></li>
                                <?php }, $image, $name,$_POST['collection_id'] /* , Add more arrays if needed manually */);
                            ?>
                            </ul>
                         <?php  array_map(function($img, $nam,$c){ ?> 
                                    <div class="tabcontent" id="<?php  echo $c;?>">
                                     
                <?php     echo $order_type; if($order_type=="")
                {
                   $lang=$_COOKIE['lang'];
                   $branch_id=htmlspecialchars($_POST['branch']);
                   
                $curl = curl_init();
               // echo "https://dunkinsa.abstractagency.net/api/v2/products/index.php?collection_id=$c&branch_id=$branch_id";
                //echo $lang;
                //echo "https://dunkinsa.abstractagency.net/api/v2/products/index.php?collection_id=$c&branch_id=$branch_id&lang=$lang";
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/products/index.php?collection_id=$c&branch_id=$branch_id&lang=$lang",
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
                
                 $order_type="pickup";
                }
                elseif($order_type=="delivery")
                {
                    
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/products/index.php?collection_id=$collection_id&lang=$lang",
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
                    
                }
                         $data = json_decode($response, true);
                        //print_r($data);
                          $i=0;
                          if(sizeof($data['products'])==0)
                          {
                              echo '<p class="message">No Product found in collection</p>';
                          }
                        
                         ?>
                        <div class="row product flex" id="menu">
                            <?php foreach($data['products'] as $val) {?> 
                                    <div class="col s6 m6 l3 collections">
                                       
                                        <?php foreach($val['images'] as $img) {?> 
                                        
                                           <img onclick="document.getElementById('<?php echo $value['v_id']; ?>').submit()" class="product-img responsive-img"  src="<?php  echo $img['src'];?>">
                            
                                        <?php $image=$img['src'];} ?>
 
                                    <?php if (array_key_exists("variants", $val)){
                                    
                                        //print_r($val['variants']);
                                      
                                        
                                    ?>
                                        
                                        <form action="product_details.php" method="post" id="<?php echo $value['v_id']; ?>">
                                            
                                            <?php foreach($val['variants'] as $value) { ?>
                                                <input type="hidden" name="image" value="<?php  echo $image;?>">
                                                <input type="hidden" name="vid[]" value="<?php  echo $value['v_id'];?>">
                                                <input type="hidden" name="product_id" value="<?php  echo $value['product_id'];?>">
                                                <input type="hidden" name="title" value="<?php  echo $value['title'];?>">
                                                <input type="hidden" name="price[]" value="<?php  echo $value['price'];?>">
                                                <input type="hidden" name="inventory_policy" value="<?php  echo $value['inventory_policy'];?>">
                                                <input type="hidden" name="created_at" value="<?php  echo $value['created_at'];?>">
                                                <input type="hidden" name="updated_at" value="<?php  echo $value['updated_at'];?>">
                                                <input type="hidden" name="calories[]" value="<?php  echo $value['calories'];?>">
                                                <input type="hidden" name="product_name" value="<?php  echo $val['title_eng'];?>">
                                                <input type="hidden" name="option1[]" value="<?php  echo $value['option1'];?>">
                                                <input type="hidden" name="description" value="<?php  echo $val['description_eng'];?>">
                                                <input type="hidden" name="option2[]" value="<?php  echo $value['option2'];?>">
                                                
                                            <?php } 
                                                foreach($val['options'] as $opt) { ?>
                                                 <?php   $option=implode(",",$opt['value']);?>
                                                 <input type="hidden" name="optns[]" value="<?php   echo $option;?>">
                                                 <input type="hidden" name="optns_name[]" value="<?php   echo $opt['name'];?>">
                                            <?php
                                                 }
                                            ?>
                                                <input type="hidden" name="collection_name" value="<?php  echo $collection_name;?>">
                                                <input type="hidden" name="store" value="<?php  echo $store;?>">
                                                <input type="hidden" name="branch_id" value="<?php  echo $branch_id;?>">
                                                <input type="hidden" name="type" value="<?php if($order_type=="" || $order_type=="pickup"){ echo "pickup";} else{ echo $order_type;}?>">
                                                <button type="submit" class="collecion_name"><?php  echo $val['title_eng'];?></button>
                                                </form>
                                            <?php 
                                        } 
                                        else{ ?>
                                                <form action="product_details.php" method="post" id="<?php echo $value['v_id']; ?>">
                                                <input type="hidden" name="image" value="<?php  echo $val['image'];?>">
                                                <input type="hidden" name="product_name" value="<?php  echo $val['title_eng'];?>">
                                                <input type="hidden" name="store" value="<?php  echo  $store;;?>">
                                                <input type="hidden" name="description" value="<?php  echo $val['description_eng'];?>">
                                                <input type="hidden" name="branch_id" value="<?php  echo $branch_id;?>">
                                                <input type="text" name="type" value="<?php   if($order_type==""){ echo "pickup";} else{ echo $order_type;}?>">
                                                <button type="submit" class="collecion_name"><?php  echo $val['title_eng'];?></button>
                                                </form>
                                        <?php } 
                                        ?>
                                    </form>
                                </div>
                                </a>
                                <?php
                                 $i++;
                                 } ?>
                                </div>
                                    </div>
                                    <?php }, $image, $name,$_POST['collection_id'] /* , Add more arrays if needed manually */);}
                                     
                                      ?>
                                      
                            </div>

            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
   $(document).ready(function(){
    $('ul.tabs').tabs({
      swipeable : true,
      responsiveThreshold : 1920
    });
  });
 /*   function openTab(evt, tabName) {
        console.log(tabName);
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
            */
    </script>
  <?php include 'footer.php';?>

