<?php 
session_start();
$_COOKIE["url"] = $_COOKIE['REQUEST_URI'];
    if(isset($_COOKIE["phone"])) {
      $phone=$_COOKIE["phone"];
      $phone=str_replace("+966", "",$phone);
    }
    else
    {
        header("Location:login.php");
    }
    $total_price=floatval(0);
    $total_p=floatval(0);
    //print_r($_POST['google_map_link']);
    include 'header.php';
    include 'sidebar.php';?>

                <div id="orders" class="fav-orders reciept_page">
               
                   <!-- <h2>Reciept</h2> -->
                   <br><br>
                    <div class="container">
                    <div class="row valign-wrapper reciepts center-align">
                        <div class="col s12 m12 l12">
                             <?php
                      //  if($details!="")
                        {
                        

                            $curl = curl_init();
                            
                            curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/get-order-detail",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('shopify_order_number' => $_POST['shopify_order_number'],'session_key' => $_COOKIE['session_key']),
                            CURLOPT_HTTPHEADER => array(
                            "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
                            "X-localization: $lang"
                            ),
                            ));
                            $response = curl_exec($curl);
                            
                            curl_close($curl);
                            $datas=json_decode($response,true);
                            //print_r($datas);
                            if($datas['code']=='401')
                            {
                                ?>
                                    <script>
                                        location.href='login.php';
                                    </script>

                                <?php
                            }
                            $data=$datas['data'];
                          //  echo $order_no;
                            $order=$data['order'];
                            $address=$order['shipping_address'];
                          //  print_r($data);
                          //  var_dump($data);
                      
                            $order_no=$_POST['shopify_order_number'];
                            $order_id=$_POST['order_no'];
                            
                            $tracking_num=$order['tracking_number'];
                            //var_dump($details);
                            if($tracking_num!=NULL)
                            {
                           
                           // echo $tracking_num;
                           // var_dump($tracking_num);
                             /*   if($tracking_num==null)
                                {
                                   $tracking_num=array("tracking_number"=>"0");
                                    
                                }*/
                              ?>
                            <h3 class="place-order"><?php if($lang=='ar'){ echo "رقم الشحنة";}  
                                else
                                { echo 'Tracking Number';}  ?></h3>
                            <span class="tn"><a class="tn" href="https://www.smsaexpress.com/trackingdetails?tracknumbers=<?php echo $tracking_num;?>"><?php echo $tracking_num;?></a></span>
                            
                            <div class="tm"><?php if($order['smsa_shipment_status']=="Data Recieved" && $lang=="ar")
                            {
                                echo "تم استلام بيانات الشحنة";
                            
                            }else
                            {
                                echo $order['smsa_shipment_status'];
                            }?></div>
                            <p class="tm"><?php if($lang=='ar'){ echo "يرجى الضغط على رقم الشحنة للحصول على اخر التحديثات";}  
                                else
                                { echo 'Click tracking number to get updated information about your shipment';}  ?></p>
                            <?php }else{?>
                            <h3 class="place-order"><?php if($lang=='ar'){ echo "اعد هذا الطلب لاحقا بخطوة واحدة";}  
                                else
                                { echo 'Place this order again with one tap';}  ?></h3>
                           
                            <button class="favourite-btn" type="button" onclick="saveFav()">
                                <?php if($lang=='ar'){ echo "حفظ في المفضلة";}  
                                else
                                { echo 'Save as favourite';}  ?></button>
                           
                            <?php } ?>
                        </div>
                    </div>
                     <div class="space-20">
                         
                     </div>      
                    <div>
                        <?php 
                        $a=explode(" ",$_POST['time']);
                        $time_in_12_hour_format  = date("h:i:s a", strtotime($a[1]));
                        $date=date_create($a[0]);
                        $d= date_format($date,"d-m-Y");
                        ?>
                    <div class="row valign-wrapper  reciept center-align">
                        <div class="col s12 m12 l12">
                            <p class="ordr"><?php if($lang=='ar'){ echo "رقم الطلب:";}  
                                else
                                { echo 'Order Number';}  ?> <?php echo $_POST['shopify_order_number'];?></p>
                            <span class="tm"><i class="material-icons clock">access_time</i><?php echo $time_in_12_hour_format; echo " ".$d;?></span>
                        </div>
                    </div>
                    <?php $count=0; 
                    
                        array_map(function($nam,$variant,$price,$quantity,$note,$image)
                            { 
                                $count++;

                                $variant=explode('/',$variant);
                               // echo $total_price=floatval($total_price)+floatval($price);
                               //echo $total_price=$total_price+$price;
                            ?> 
                    <div class="row valign-wrapper  reciept">

                        <div class="col s2 m2 l2">
                          <img class="responsive-img" src="<?php echo $image;?>">
                        </div>
                        <div class="col s7 m7 l7">
                        <p>
                          
                          
                        </p>
                        <div class="item-name">
                            <p><?php echo $nam;?>
                            <?php if($variant[0]=="S" || $variant[0]=="M" || $variant[0]=="L" || $variant[0]=="XL" || $variant[0]=="S " || $variant[0]=="M " || $variant[0]=="L " || $variant[0]=="XL ")
                                  {?>
                                      <span class="item-size"><?php echo $variant[0]; ?></span><br>
                            <?php }?>
                            </p>
                        </div>
                            <?php 
                                $c=count($variant);
                                
                                
                                
                                
                           
                                if($c==2){     if($_COOKIE["lang"]=="ar")
                        {
                            
                            if($variant[1]==" No Milk" || $variant[1]=="No Milk")
                            {
                                $variant[1]="بدون حليب";
                            }
                            else if($variant[1]==" Full Fat" || $variant[1]=="Full Fat")
                            {
                                
                                $variant[1]="حليب كامل الدسم";
                            }
                            if($variant[1]==" Low Fat" || $variant[1]=="Low Fat")
                            {
                                
                                $variant[1]="حليب قليل الدس";
                            }
                        }?>
                                    <button class="flavor"><?php echo $variant[1]; ?></button>
                            <?php } ?>
                            <?php 
                                if($note!=""){?>
                                        <button class="flavor"><?php echo $note; ?></button>
                            <?php } ?>
        
                        </div>
                        <div class="col s1 m1 l1">
                            <span class="item-qua"><?php echo $quantity;?></span>
                        </div>
                        <div class="col s2 m2 l2 no-padding">
                          <p class="item-price">SR <?php 
                          $t_price=$quantity*$price;
                            echo $t_price= number_format((float)$t_price, 1, '.', '');
                              
                           ?></p>

                        </div>
                    </div>
                    <?php }, $_POST['product_name'], $_POST['variant_title'],$_POST['product_price'],$_POST['product_quantity'],$_POST['note'],$_POST['product_image'] /* , Add more arrays if needed manually */);?>
                                    
                    <?php 
                     $t=0;
                           
                            foreach($_POST['product_price'] as $p){
                                 $t=$t+$p;
    
                            }
                            foreach (array_combine($_POST['product_price'], $_POST['product_quantity']) as $code => $name) {
                             $product_p=$name*$code;
                               $total_p=$total_p+$product_p;
}
                    ?>
                    
                    <div class="row reciept">
                        <div class="col s12 m12 l12 right ">
                            <span class="total"><?php if($lang=='ar'){ echo "الإجمالي (شاملا الضريبة)";}  
                                else
    { echo 'Total (VAT included) ';}  ?> </span><span class="total-price">SR <?php echo number_format((float)$total_p, 1, '.', '');;?> </span>
                            
                        </div>
                    </div>
                    <div class="space-20">
                        
                    </div>
                    
                    <div class="row no-padding reciepts last center-align">
                        
                                <!--     <div class="col s12 m12 l12">
                                <h1 class="pick_up_loc center-align">
                                <?php if($lang=='ar'){ echo "عنوان التوصيل";}  
                                else
                                { echo 'Delivery Address';}  ?></h1>
                              
                                <p class="pick_up_loc center-align"><?php echo $address['address'];?></p>
                                <p class="pick_up_loc center-align"><?php echo $address['city'];?> , <?php echo $address['zip'];?> , <?php echo $address['country'];?></p>
                                <br>
                        </div>
                           --> 
                        <div class="col s6 m6 l6">
                            
                            <h1 class="pick_up_loc">
                            <?php if($_POST['order_type']=="delivery")
                            { 
                                
                                if($lang=='ar'){ echo "عنوان التوصيل";}  
                                else
                                { echo 'Delivery Address';}
                            }
                            else if($_POST['order_type']=="pickup")
                            {
                                if($lang=='ar'){ echo "عنوان الاستلام";}  
                                else
                                { echo 'PICK-UP location ';}
                            }
                            ?></h1>
                            <?php if($_POST['order_type']=="delivery")
                            {?>
                                <p class="pick_up_loc"><?php echo $address['address'];?></p>
                            <p class="pick_up_loc"><?php echo $address['city'];?> , <?php echo $address['zip'];?> , <?php echo $address['country'];?></p>
                              <?php 
                            }
                            else
                            {?>
                            <p class="pick_up_loc"><?php echo $_POST['store'];?></p>
                            <p class="pick_up_loc"><?php echo $_POST['address'];?></p>
                            <p class="pick_up_loc"><?php echo $_POST['city'];?></p>
                            <p class="pick_up_loc"><?php echo $_POST['country'];?></p>
                            <?php } ?>
                            <?php if($_POST['order_type']=="pickup")
                            {?>
                            <p class="get-directions">
                                <a class="pink-font" href="<?php echo $_POST['map_link'];?>"><i class="material-icons">location_on</i>Get directions</a>
                            </p>
                            <?php } ?>
                           
                        </div>
                    
                        <div class="col s6 m6 l6" style="line-height:0">
                            <img class="active-map" src="images/map_3.PNG" alt="map" class ="responsive-img">
                        </div>
                        
                         <?php } ?>
                    </div>
                    </div>
                
                 </div>      
            
            
                    <div class="col s6 m4 l1">
                         
                    
                    </div>
        </div>
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
  
    <script>
        function saveFav()
        {
            var lang=$.cookie("lang");
                        if(lang=="ar")
                        {
                            
            
                            var save_future='احفظ طلبك المفضل لطلبه لاحقا';
                            var save_btn='حفظ في المفضلة';
                            var add_name='اختر اسم لطلبك المفضل';
                            //var name='الاسم';
                        }
                        else
                        {
                            var save_future='Save your favorite order for the future';
                            var save_btn='Save as Favourite';
                            var add_name='Add a name to your favorite order';
                            //var name="Order Name";
                        }

            Swal.fire({
              title: '<p class="trans-rejected save-padding">'+save_future+'</p>',
              showCloseButton: true,
              showConfirmButton:true,
              confirmButtonText: save_btn,
              html:
              '<form action="form_submit.php" method="post" enctype="multipart/form-data" id="fav-order">'+
'<input type="hidden" id="savFav" name="savFav" value="1">'+
'<input type="hidden" name="favTitle" id="favTitle" value="Favourite">'+
'<input type="hidden" id="orderId" name="orderId" value="<?php echo $_POST['order_no'];?>">'+
'<input type="hidden" id="mobile_no" name="mobile_no" value="<?php echo $phone; ?>">'+
'<input id="save_fav" name="favourite" type="text" class="save-favo"  placeholder="'+add_name+'">'+
//'<label for="favourite" id="lbl_fav">'+name+'</label>'+
               '</form>',
              
              width:'690px',
              padding: '0',
              customClass: 'save-fav',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            }).then(function (result) {
                if (result.value) {
                    /* Swal.fire(`
                    Title: ${result.value.title}
                    id: ${result.value.id}
                  `.trim()) */
                    //  loader_timer();
                    //  $("#loaderIcon").show();
                    //  $('#fav-order')[0].submit();
                      //$('form').submit();
                    //  $('form').submit(function(e){
                    //   e.preventDefault();
                     //       var post_url = $(this).attr("action"); 
                    var formData = new FormData($('#fav-order')[0]);
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
                    $.ajax({
                        type: 'post',
                        url: 'form_submit.php',
                        data: formData,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        beforeSend: function(){
                        $("#loaderIcon").show();
                       },
                        complete:function(data){
                          $("#loaderIcon").hide();
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
                                    })
                               
                            }
                            else
                            {
                                Swal.fire({
                                  
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  confirmButtonText:ok,
                                  html:
                                  '<p class="trans-rejected">'+response.message+'</p>',
                                  width:'690px',
                                  
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
                           Swal.fire({
                                  icon: 'error',
                                  title: response.status,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  html:
                                  '<p class="trans-rejected">'+textStatus+'</p>',
                                  width:'690px',
                                  customClass: 'error-msg',
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                            
                        })
                        
                    

             
                    
            } 
            else {
                // handle cancel
            }
            });
                
        }
        
  
        function loader_timer()
        {
            var countdown = 600;  // your countdown in milliseconds

            setTimeout(function() {
                // hide your loading image after "countdown" milliseconds
                $("#loaderIcon").hide();
            
            }, countdown);
            
          //  $('form').submit();
        }


            
                  
    </script>
<?php include 'footer.php';?>