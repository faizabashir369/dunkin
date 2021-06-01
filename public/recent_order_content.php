   <?php  if(isset($_COOKIE["phone"])) {
        $phone=$_COOKIE["phone"];
        $phone=str_replace("+966", "",$phone);
        
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
    ?>
    
             
                <div class="container">   
                <div id="f_orders" class="tabcontent" style="display:none">
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
                                <div class="col s2 m2 l2 no-padding" onclick="document.getElementById('<?php echo "recent".$val['id'];?>').submit()" >
                                    <img class="responsive-img list-img" src="images/active_order.svg">
                                </div>
                                <div class="col s8 m5 l5 no-padding" onclick="document.getElementById('<?php echo "recent".$val['id'];?>').submit()" >
                                    <p class="meal center-align center"><button type="submit" class="fav_btn"><?php echo $val['fav_order_title']; ?></button></p>
                                </div>
                                <div class="col s3 m2 l2 no-padding">
                                    <?php  if($order_type=='pickup'){?>
                                    <img onclick="check_reorder('<?php echo 're'.$val['id'];?>')" class="responsive-img reorder reorder-img left-align margin-left" src="images/Reorder.svg">
                        <span class="reorder-text fav-reorder" onclick="check_reorder('<?php echo 're'.$val['id'];?>')"><?php if($lang=='ar'){ echo 'اعادة طلب';}  
                                else
                                { echo 'Reorder';} ?></span>
                                     
                                    <form action="branches_list.php?reorder=1" method="post" id="<?php echo 're'.$val['id'];?>">
                                        <?php foreach($val['orders'] as $v) {?>
                                            <?php foreach($v['products'] as $value) 
                                            {   $opt_value=explode("/",$value['variant_title']); ?>
                                                <input type="hidden" name="title[]" value="<?php  echo $val['fav_order_title'];?>" >
                                                
                                                <input type="hidden" name="variant_milk[]" value="<?php echo $opt_value[1];?>">
                                        
                                                <input type="hidden" name="variant_title[]" value="<?php  echo $value['variant_title'];?>" >
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
                                    
                                 <!--   <span class="remove-text"><?php if($lang=='ar'){ echo 'حذف';}   
                                else
                                { echo 'Remove';} ?></span>-->
                                </div>
                            </div>
                        <form action="favourite_orders.php" method="post" id="<?php echo "recent".$val['id'];?>">
                        <?php foreach($val['orders'] as $v) {?>
                       
                            <?php foreach($v['products'] as $value) { ?>
                                <input type="hidden" name="title" value="<?php  echo $val['fav_order_title'];?>" >
                                <input type="hidden" name="variant_title[]" value="<?php  echo $value['variant_title'];?>" >
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
               
                </div>
                
                <div id="recent" class="tabcontent" style="display:block;">
                <?php
                        
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/CheckOrderWithMobileNumber?mobile_no=$phone&completed=1&lang=$lang",
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
                        //print_r($data);
                        foreach($data['orders'] as $dat){
                            
                        
                            $branch=$dat['branch'];
                            //print_r($dat);
                            $product=$dat['products'];
                                     
                            $order_no=$dat['shopify_order_number'];
                         ?>
                            
                             <form action="reciept.php" method="post" id="<?php echo "fav".$dat['id'] ?>">
                                    <input type="hidden" name="time" value="<?php echo $dat['order_time'];?>">
                                    <input type="hidden" name="total_price" value="<?php echo $dat['total_price'];?>">
                                    <input type="hidden" name="id" value="<?php echo $dat['id'];?>">
                                    <input type="hidden" name="order_no" value="<?php echo $dat['id'];?>">
                                    <input type="hidden" name="shopify_order_number" value="<?php echo $dat['shopify_order_number'];?>">
                                    
                                     <input type="hidden" name="map_link" value="<?php echo $branch['google_map_link'];?>">
                                     <?php
                                    array_map(function($pro)
                                    {?>
                                        <input type="hidden" name="variant_title[]" value="<?php echo $pro['variant_title'];?>">
                                        <input type="hidden"   name="variant_milk[]" value="<?php echo $opt_value[1];?>">
                                        
                                        <input type="hidden" name="product_id[]" value="<?php echo $pro['product_id'];?>">
                                        <input type="hidden" name="product_variant_id[]" value="<?php echo $pro['product_variant_id'];?>">
                                        <input type="hidden" name="product_name[]" value="<?php echo $pro['product_name'];?>">
                                        <input type="hidden" name="product_price[]" value="<?php echo $pro['product_price'];?>">
                                        <input type="hidden" name="product_quantity[]" value="<?php echo $pro['product_quanitity'];?>">
                                        <input type="hidden" name="note[]" value="<?php echo $pro['note'];?>">
                                        <input type="hidden" name="product_image[]" value="<?php echo $pro['product_image'];?>">
                                        <input type="hidden" name="product_description[]" value="<?php echo $pro['product_description'];?>">
                                        <input type="hidden" name="product_category[]" value="<?php echo $pro['product_category'];?>">
                                        
                                        
                                        
                                        
                                    <?php },$product);?>
                                    <input type="hidden" name="order_type" value="<?php  echo $dat['order_type'];?>">
                                    <input type="hidden" name="store" value="<?php echo $branch['store_name'];?>">
                                    <input type="hidden" name="address" value="<?php echo $branch['address'];?>">
                                    <input type="hidden" name="city" value="<?php echo $branch['city'];?>">
                                    <input type="hidden" name="province" value="<?php echo $branch['province'];?>">
                                    <input type="hidden" name="country" value="<?php echo $branch['country'];?>">
                              </form>
                            <div  class="row fav_orders valign-wrapper">
                        
                              <div class="col s2 m2 l2" onclick="check_reorder('<?php echo $dat['id'] ?>')">
                                  <img class="responsive-img list-img" src="images/active_order.svg">
                                </div>
                                <div class="col s5 m4 l6" onclick="document.getElementById('<?php echo "fav".$dat['id'] ?>').submit()">
                                <p class="order-no <?php if($lang=='ar'){ echo 'right-align';}else{ echo 'left-align';}?>"><?php if($lang=='ar'){ echo 'رقم الطلب:';}  
                                else
                                { echo "Order Number : ";} ?> <?php echo $dat['shopify_order_number'];?></p>
                                <span><button class="sugar ordr_stat"><?php if($dat['order_type']=="pickup" && $lang=="ar"){ echo "استلام من فرع";}
                                elseif($dat['order_type']=="pickup" && $lang=="en") {echo "Pickup"; }
                                elseif($dat['order_type']=="delivery" && $lang=="ar") { echo "توصيل لعنوان";
                                }
                                else
                                {
                                    echo 'Delivery';
                                }
                                ?></button></span>
                                 
                                </div>
                              
                                <div class="col s2 m2 l2" <?php if($dat['order_type']=='delivery'){?> onclick="document.getElementById('<?php echo "fav".$dat['id'] ?>').submit()" <?php } ?>>
                                    <?php if($dat['order_type']=='pickup'){?>
                                       <form action="branches_list.php?reorder=1" method="post" id="<?php echo "reorder".$dat['id'] ?>">
                                         <input type="hidden" name="tracking_number" value="<?php echo $tracking_num;?>"> <?php
                            array_map(function($pro)
                                    { $opt_value=explode("/",$pro['variant_title']);?>
                                    
                                        <input type="hidden"   name="variant_title[]" value="<?php echo $pro['variant_title'];?>">
                                        <input type="hidden"   name="variant_milk[]" value="<?php echo $opt_value[1];?>">
                                        <input type="hidden" name="product_id[]" value="<?php echo $pro['product_id'];?>">
                                        <input type="hidden" name="product_variant_id[]" value="<?php echo $pro['product_variant_id'];?>">
                                        <input type="hidden" name="product_name[]" value="<?php echo $pro['product_name'];?>">
                                        <input type="hidden" name="product_price[]" value="<?php echo $pro['product_price'];?>">
                                        <input type="hidden" name="product_quantity[]" value="<?php echo $pro['product_quanitity'];?>">
                                        <input type="hidden" name="note[]" value="<?php echo $pro['note'];?>">
                                        <input type="hidden" name="product_image[]" value="<?php echo $pro['product_image'];?>">
                                        <input type="hidden" name="product_description[]" value="<?php echo $pro['product_description'];?>">
                                         <input type="hidden" name="product_category[]" value="<?php echo $pro['product_category'];?>">
                                        
                                        
                                        <input type="hidden" name="order_type[]" value="<?php  echo $dat['order_type'];?>">
                                    <?php },$product);?>
                            
                                    <input type="hidden" name="store" value="<?php echo $branch['store_name'];?>">
                                    <input type="hidden" name="address" value="<?php echo $branch['address'];?>">
                                    <input type="hidden" name="city" value="<?php echo $branch['city'];?>">
                                    <input type="hidden" name="province" value="<?php echo $branch['province'];?>">
                                    <input type="hidden" name="country" value="<?php echo $branch['country'];?>">
                                    <img onclick="check_reorder('<?php echo 'reorder'.$dat['id']; ?>')" class="responsive-img reorder center-align" id="<?php echo $dat['id'];?>" src="images/Reorder.svg">
                        <span class="reorder-text" onclick="check_reorder('<?php echo 're'.$val['id'];?>')"><?php if($lang=='ar'){ echo 'اعادة طلب';}  
                                else
                                { echo 'Reorder';} ?> </span>
                                     </form>
                                    <?php } ?>
                                </div>
                             
                                
                                <div class="col s3 m3 l2" onclick="document.getElementById('<?php echo "fav".$dat['id'] ?>').submit()">
                                    <p class="notify_time right-align">
                                    <?php foreach($dat['status'] as $status){
                                        if($status['status']=="Order Created")
                                        {
                                            //echo str_replace(' ',"\n",$status['time']);
                                            $a=explode(" ",$status['time']);
                                            
                                           echo $time_in_12_hour_format  = date("h:i a", strtotime($a[1]));
                                           $date=date_create($a[0]); echo '<br>';
                                           $d= date_format($date,"d-m-Y");
                                           $timestamp = strtotime($d);

                                           echo $day = date('D', $timestamp);echo " ";
                                           echo date("M", $timestamp);echo " ";
                                           echo date("d", $timestamp);
                                        }
                                    ?>
                                    <?php } ?>
                                   </p>
                                        
                                </div>
                            </div>
                         
                    
                        <?php } ?>
                    </div>
                </div>
            <script>
             var lang=$.cookie("lang");
                     
                     
                                     if(lang=="ar")
                                        {
                                            
                                              
                                              var ok="موافق";
                                              var dunkin="دانكن";
                                        }
                                         else
                                          {
                                               var ok="OK";
                                               var dunkin="Dunkin";
                                                }
                  function check_reorder(form_name)
                  {
                     // alert("reorder");
                      var lang=$.cookie("lang");
                     
                      var car_count=localStorage.getItem("cartCount");
                     // alert(car_count);
                      if(car_count>0)
                      {
                                     if(lang=="ar")
                                        {
                                            
                                              message="سوف يتم إزالة كل المنتجات من السلة، هل تريد المتابعة؟ ";
                                              var ok="موافق";
                                              var dunkin="دانكن";
                                        }
                                         else
                                          {
                                               var ok="OK";
                                               var dunkin="Dunkin";
                                              message='Reordering this order will remove existing items from the cart, are you sure?';
                                          }
                                   Swal.fire({
                                          title: dunkin,
                                          showCloseButton: true,
                                          showConfirmButton:true,
                                          confirmButtonText:ok,
                                          html:
                                          '<p class="trans-rejected">'+message+'</p>',
                                          width:'690px',
                                          customClass: 'success-msg',
                                          background: '#fff',
                                          backdrop: `
                                           rgba(38, 38, 38, 0.8);
                                          `
                                    }).then(function (result) {
                                        if (result.value) {
                                            localStorage.setItem("cartCount","0");
                                            document.getElementById('cart').innerHTML="0";
                                            localStorage.removeItem("cart");
                                            localStorage.removeItem("discount_code");
                                            localStorage.removeItem("discount_amount");
                                            localStorage.removeItem("discount_type");
                                            localStorage.removeItem("milkOption");
                                            localStorage.removeItem("branch_id");
                                            document.getElementById(form_name).submit();
                                        }
                                    });
                      }
                      else
                      {
                          
                            document.getElementById(form_name).submit();
                      }
                  }
        $(function () {
            
                    $('.remove_fav').on('click', function (e) {
                        console.log("button clicked");
                        
                       var fav_ids=$(this).val();
                       console.log(fav_ids);
                      e.preventDefault();
                       var data = {
                            fav_id: fav_ids,
                        }
                        var lang=$.cookie("lang");
                        if(lang=="ar")
                        {
                            var remove='هل تريد الحذف؟';
                        }
                        else
                        {
                            var remove='Are you sure you want to delete?';
                        }
                    Swal.fire({
                                      title: dunkin,
                                      showCloseButton: true,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                      html:
                                      '<p class="trans-rejected">'+remove+'</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    }).then(function (result) {
                                      if (result.value) {
                                                
                                               
                                                $.ajax({
                        type: 'post',
                        url: 'remove_favourite_order.php',
                        data: fav_ids,
                        cache: false,
                        contentType: false, beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                        }
                        
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                            var response=JSON.parse(response);
                            
                            if(response.success == "1")
                            {
                               Swal.fire({
                                      
                                      title: dunkin,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                      html:
                                      '<p class="trans-rejected">'+response.message+'</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    }).then(function (result) {
                                      if (result.value) {
                                                
                                               
                                                location.reload();
                                      } else {
                                        // handle cancel
                                      }
                                    })
                               
                            }
                            else
                            {
                                Swal.fire({
                                  icon: 'error',
                                  title: response.status,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  html:
                                  '<p class="trans-rejected">'+response.message+'</p>',
                                  width:'690px',
                                  customClass: 'error-msg',
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                                console.log("failed");
                            }
                        })
                        .fail  (function(jqXHR, textStatus, errorThrown) 
                        {  
                            Swal.fire(
                                      errorThrown,
                                      textStatus,
                                      'error'
                                    )
                            
                        })
                                      } else {
                                        // handle cancel
                                      }
                                    })
                     
                      
                        
                                
                    });
            
                  });
                  
                 
            </script>