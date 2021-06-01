  <?php
   if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
        }
        else
        {
            $lang="en";
        }
  $_COOKIE["url"] = $_COOKIE['REQUEST_URI'];
    if(isset($_COOKIE["phone"])) {
        $phone=$_COOKIE["phone"];
        $phone=str_replace("+966", "",$phone);
    }
    else
    {
        header("Location:login.php");
    }

                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/CheckOrderWithMobileNumber?active=1&mobile_no=$phone&lang=$lang",
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
                        $data=json_decode($response,true);
                     //   print_r($data);
                        foreach($data['orders'] as $dat)
                        {?>
                          <form action="track_order.php" method="post" id="<?php echo $dat['id'] ?>">
                            <div onclick="document.getElementById('<?php echo $dat['id']; ?>').submit()" class="row active_orders valign-wrapper">
                                <input type="hidden" name="time" value="<?php echo $dat['pickup_time'];?>">
                                <input type="hidden" name="order_no" value="<?php if($dat['shopify_order_number']!=""){echo $dat['shopify_order_number'];} else { echo $dat['id'];}?>">
                                
                                <input type="hidden" name="order_status" value="<?php echo $dat['order_status'];?>">
                                
                                <?php 
                                $branch=$dat['branch'];?>
                                <input type="hidden" name="store" value="<?php echo $branch['store_name'];?>">
                                <input type="hidden" name="address" value="<?php echo $branch['address'];?>">
                                <input type="hidden" name="city" value="<?php echo $branch['city'];?>">
                                <input type="hidden" name="province" value="<?php echo $branch['province'];?>">
                                <input type="hidden" name="country" value="<?php echo $branch['country'];?>">
                                <input type="hidden" name="map_link" value="<?php echo $branch['google_map_link'];?>">
                                <?php
                                
                                foreach($dat['status'] as $status){
                                if($status['status']=="Accepted Seller"){?>
                                <input type="hidden" name="processing" value="Order is under processing">
                                <input type="hidden" name="processing-time" value="<?php echo $status['time'];?>">
                                <?php }
                                
                                if($status['status']=="Ready"){?>
                                <input type="hidden" name="ready" value="Order is ready to pickup">
                                <input type="hidden" name="ready-time" value="<?php echo $status['time'];?>">
                                <?php }
                                 
                                if($status['status']=="Pending"){?>
                                <input type="hidden" name="placed" value="Order has been placed">
                                <input type="hidden" name="placed-time" value="<?php echo $status['time'];?>">
                                <?php }
                                
                                if($status['status']=="Completed"){?>
                                <input type="hidden" name="completed" value="Order is Completed">
                                <input type="hidden" name="completed-time" value="<?php echo $status['time'];?>">
                                <?php } } ?>
                            
                                <div class="col s2 m2 l2">
                                  <img class="responsive-img order-img" src="images/active_order.svg">
                                </div>
                                <div class="col s7 m7 l7">
                                    <?php if($dat['shopify_order_number']!=""){ $order_num= $dat['shopify_order_number'];} else { $order_num =  $dat['id'];?>
                                  <p class="order-no"><?php if($lang=="ar"){ echo '<span class="arabic">'."طلب رقم:".$order_num; echo '</span>';}else { echo "Order Number :".$order_num;} }?></p>
                                  <p class="order-status">
                                  <?php if($dat['order_status']=="Accepted Seller")
                                    {
                                        if($lang=="ar"){
                                        echo "جاري التحضير";  
                                        }
                                         else {
                                             echo "Under Process";
                                        }
                                    }
                                    else if($dat['order_status']=="Rejected"){
                                    if($lang=="ar"){
                                       echo "مرفوض";
                                       }
                                       else 
                                       { 
                                           echo "Rejected";
                                           
                                       }
                                  } 
                                   else if($dat['order_status']=="Rejected"){
                                    if($lang=="ar"){
                                       echo "غير متوفر";
                                       }
                                       else 
                                       { 
                                           echo "Not Available";
                                           
                                       }
                                  } 
                                  else if($dat['order_status']=="Pending"){
                                    if($lang=="ar"){
                                       echo "بانتظار الموافقة";
                                       }
                                       else 
                                       { 
                                           echo "Pending";
                                           
                                       }
                                  }   
                                  else if($dat['order_status']=="Ready"){
                                    if($lang=="ar"){
                                       echo "جاهز للاستلام";
                                       }
                                       else 
                                       { 
                                           echo "Ready";
                                           
                                       }
                                  }  
                                  else
                                  {
                                      echo $dat['order_status'];
                                  }
                                       ?></p>
                                  <p class="order-time"><i class="large material-icons clock">access_time</i><span><?php echo $dat['order_time'];?></span></p>
                                </div>
                                <div class="col s2 m2 l2">
                                    <?php 
                                    if($dat['order_status']=="Accepted Seller" || $dat['order_status']=="Ready" || $dat['order_status']=="Pending")
                            {?>
                    <button class="order-active"><?php if($lang=="ar"){ echo "فعال";}else { echo "Active";}?></button>
                          <?php  }
                        
                                    
                                    
                                    
                                    ?>
                                   
                                </div>
                                <div class="col s1 m1 l1">
                                  <img class="responsive-img arow" src="images/arrow-right.svg">
                                </div>
                            </div>
                            </form>
                    <?php }?>
                 