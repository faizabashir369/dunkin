<?php
                
                $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/getFavouriteOrdersOfCustomer?mob_no=$phone&lang=$lang",
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
                     
                     
                    <?php foreach($data['favourite_orders'] as $val) { 
                    
                    $orders=$val['orders']; 
                    if(is_array($orders))
                    {
                        
                        foreach($orders as $ord)
                        {
                            $order_type= $ord['order_type'];
                        }
                        
                        
                    }?>
                    
                   
                         
                            <div class="row fav_orders valign-wrapper">
                                <div class="col s2 m2 l2" onclick="document.getElementById('<?php echo $val['id'];?>').submit()" >
                                    <img class="responsive-img list-img" src="images/active_order.svg">
                                </div>
                                <div class="col s8 m5 l5" onclick="document.getElementById('<?php echo $val['id'];?>').submit()" >
                                    <p class="meal center-align center"><button type="submit" class="fav_btn"><?php echo $val['fav_order_title']; ?></button></p>
                                </div>
                                <div class="col s3 m2 l2">
                                    <?php  if($order_type=='pickup'){?>
                                    <img onclick="document.getElementById('<?php echo 're'.$val['id'];?>').submit()" class="responsive-img reorder left-align margin-left" src="images/Reorder.svg">
                                    <form action="branches_list.php?reorder=1" method="post" id="<?php echo 're'.$val['id'];?>">
                                        <?php foreach($val['orders'] as $v) {?>
                                            <?php foreach($v['products'] as $value) {
                                            $opt_value=explode("/",$value['variant_title']);?>
                                                <input type="hidden" name="title[]" value="<?php  echo $val['fav_order_title'];?>" >
                                                <input type="hidden" name="variant_title[]" value="<?php  echo $opt_value[0];?>" >
                                                <input type="hidden" name="variant_milk[]" value="<?php echo $opt_value[1];?>">
                                        
                                                <input type="hidden" name="order_id[]" value="<?php  echo $value['shopify_order_number'];?>">
                                                <input type="hidden" name="product_id[]" value="<?php  echo $value['product_id'];?>">
                                                <input type="hidden" name="product_variant_id[]" value="<?php  echo $value['product_variant_id'];?>">
                                                <input type="hidden" name="product_name[]" value="<?php  echo $value['product_name'];?>">
                                                <input type="hidden" name="product_category[]" value="<?php  echo $value['product_category'];?>">
                                                <input type="hidden" name="product_price[]" value="<?php  echo $value['product_price'];?>">
                                                <input type="hidden" name="product_quantity[]" value="<?php  echo $value['product_quanitity'];?>">
                                                <input type="hidden" name="note[]" value="<?php  echo $value['note'];?>">
                                                <input type="hidden" name="product_image[]" value="<?php  echo $value['product_image'];?>">
                                                <input type="hidden" name="product_description[]" value="<?php  echo $value['product_description'];?>">
                                            <?php } 
                                        } ?> 
                                    </form> 
                                    <?php } ?>
                                </div>
                                <div class="col s2 m2 l2">
                                    <input type="image" id="remove_fav" value="<?php echo $val['id'];?>" class="remove_fav responsive-img remove left-align margin-left" src="images/Remove.svg"/>
                                </div>
                            </div>
                        <form action="favourite_orders.php" method="post" id="<?php echo $val['id'];?>">
                        <?php foreach($val['orders'] as $v) {?>
                       
                            <?php foreach($v['products'] as $value) { $opt_value=explode("/",$value['variant_title']);?>
                                <input type="hidden" name="title" value="<?php  echo $val['fav_order_title'];?>" >
                                <input type="hidden" name="variant_title[]" value="<?php  echo $opt_value[0];?>" >
                                <input type="hidden" name="variant_milk[]" value="<?php echo $opt_value[1];?>">
                                        
                                <input type="hidden" name="order_id[]" value="<?php  echo $value['shopify_order_id'];?>">
                                <input type="hidden" name="product_id[]" value="<?php  echo $value['product_id'];?>">
                                <input type="hidden" name="product_variant_id[]" value="<?php  echo $value['product_variant_id'];?>">
                                <input type="hidden" name="product_name[]" value="<?php  echo $value['product_name'];?>">
                                <input type="hidden" name="product_category[]" value="<?php  echo $value['product_category'];?>">
                                <input type="hidden" name="product_price[]" value="<?php  echo $value['product_price'];?>">
                                <input type="hidden" name="product_quanitity[]" value="<?php  echo $value['product_quanitity'];?>">
                                <input type="hidden" name="note[]" value="<?php  echo $value['note'];?>">
                                <input type="hidden" name="product_image[]" value="<?php  echo $value['product_image'];?>">
                                <input type="hidden" name="product_description[]" value="<?php  echo $value['product_description'];?>">
                            <?php } } ?> 
                        </form> 
                    <?php } ?>
               