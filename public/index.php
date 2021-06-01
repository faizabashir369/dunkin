<?php
require_once 'paytabs.php';
$pt = new paytabs("mjehad@dunkindonuts.sa", "NCqgpDmKmTcXAvKO5J6kvV7fDwhfQjnDVNUlqg6NaiKLOuzTeFeJBlZeRhuIBRlwEfS5wYSHgCs471YmHc6iy6xpn28YTtvyJnDf");
$result = $pt->verify_payment($_POST['payment_reference']);
?>


<?php include 'header.php';?>
<?php

                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/homepage?lang=$lang",
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
                
                $i=0;
                ?>
       <div class="a">
           <div class="mar-left">
               <div class="row banner center-align">
             <!--  <div class="col s2 m2 l1"><br><br><br><br>
                   
                   <a href="#" class="btn-floating icon-block  indigo accent-1">
                        <i class="material-icons">perm_identity</i> 
                    </a><br><br>
                    <a href="#" class="btn-floating icon-block red">
                         <i class="material-icons">play_arrow</i> 
                    </a>
                    
                </div>
            -->
                <div class="col s12 m12 l12 align-content">
                    <br><br>
                  <?php  if($lang=='ar'){ echo "<h2 class='headin1_arabic'>دانكن</h2>";}  
                                else
                                { echo '<img class="logo-img" src="images/logo.svg">';} 
                   ?>
                  
                   <h2><?php foreach($data['data'] as $val) {
                        if($lang=='ar'){ echo $val['heading1_arabic'];}  
                                else
                                { echo $val['heading_1'];} 
                   
                   
                   } ?></h2>
                   <p class="p-color <?php if($lang=='ar'){ echo 'heading2_arabic';}?>"><?php foreach($data['data'] as $val) { 
                   if($lang=='ar'){ echo $val['heading2_arabic'];}  
                                else
                                { echo $val['heading_2'];}
                   
                   } ?></p>
                   <span>
                    <p class="center-align"><?php foreach($data['data'] as $val) {
                    
                    if($lang=='ar'){ echo $val['paragraph_arabic'];}  
                                else
                                { echo $val['paragraph'];}
                    }?></p>
                   </span><br>
                   
                   <a href="branches_list.php?pickup=1" class="center-align"><button class="pickup center-align">
                       <?php if($lang=='ar'){ echo "طلب استلام ";}  
                                else
                                { echo "Pick Up";} ?></button></a>
                   <a href="menu.php?type=delivery" class="center-align"><button class="location center-align"><?php if($lang=='ar'){ echo "طلب توصيل ";}  
                                else
                                { echo "Delivery";} ?></button></a>
                    <br><br><br>
                   </div>
                  
                   </div>
           </div>
        </div>
        
           <div class="mobile_banner">
               <img src="<?php foreach($data['data'] as $val) { echo 'https://dunkinsa.abstractagency.net'.$val['image_url'];} ?>" class="responsive-img" width="100%" alt="banner">
           </div>
        <div class="row center-align flex hide-on-med-and-down">
            <div class="col s12 m12 l6">
                <img class="map_image" src="images/mask.png">
            </div>
            <div class="col s12 m12 l6"><br><br><br>
                <h3 class="center-align visit"><?php if($lang=='ar'){ echo "قم بزيارتنا ";}  
                                else
                                { echo "COME <br> VISIT";} ?></h3>
                <p class="p-color center-align"><?php if($lang=='ar'){ echo "أبحث عن اقرب فرع دانكن";}  
                                else
                                { echo "Find a dunkin near you";} ?></p>
                <a href="branches_list.php"><button class="view_loc loc center-align"><?php if($lang=='ar'){ echo "الفروع ";}  
                                else
                                { echo "View Locations";} ?></button></a><br><br><br><br>
            </div>
            
            
       </div>
       <div class="container">
       <div class="row center-align flex hide-on-med-and-up">
            <div class="col s12 m12 l6">
                <h3 class="center-align visit"> <?php if($lang=='ar'){ echo "قم بزيارتنا ";}  
                                else
                                { echo "COME <br> VISIT";} ?></h3>
                <p class="p-color center-align"><?php if($lang=='ar'){ echo  "أبحث عن اقرب فرع دانكن";}  
                                else
                                { echo "Find a dunkin near you";} ?></p>
                <a href="branches_list.php"><button class="loc center-align"><?php if($lang=='ar'){ echo "الفروع ";}  
                                else
                                { echo "View Locations";} ?></button></a><br><br><br><br>
            </div>
            
            <div class="col s12 m12 l6">
                <img class="map_image" src="images/mask.png">
            </div>
       </div>
      </div>
      <?php include 'footer.php';
      $success=$_GET['success'];
        
          if(isset($_POST['payment_reference']))
            {
                
                      
                if($result->response_code=="100")
                    {?>
                        <script>
                        var lang="<?php echo $lang;?>";
                        if(lang=="ar")
                        {
                            var ok="موافق";
                            var dunkin="دانكن";
                        }
                        else
                        {
                            var ok="Dunkin";
                            var dunkin="OK";
                        }
                        $( document ).ready(function() {
                            var products = JSON.parse(localStorage.getItem("cart"));
                            var transaction_id="<?php echo $result->transaction_id;?>";
            
                            var date= "<?php  $date = date_create($_POST['pickup_time']);
                                              echo date_format($date, 'Y-m-d H:i:s'); ;?>";
                                              //alert(date);
                            var discount_code=document.getElementById("discount_code").value;
                           // console.log(discount_code);
                            var discount_type=document.getElementById("discount_type").value;
                            var discount_amount=document.getElementById("discount_amount").value;
                            var name="<?php echo $_COOKIE['customer'];?>";
                            var phone="<?php echo $phone=str_replace("+966", "",$_COOKIE['phone']);?>";
                            var email="<?php echo $_COOKIE['email'];?>";
                            var first_name="<?php echo $_COOKIE['first_name'];?>";
                            var last_name="<?php echo $_COOKIE['last_name'];?>";
                            
                            var total_price=document.getElementById('total').value;
                           // alert(total_price);
                           
                            var cust_device_id=$.cookie("device_id");
                            var cust_device_type="PWA";
                            
                            if(localStorage.getItem("branch_id")=="")
                            {
                                var branch_id="0";
                                
                            }
                            else
                            {
                                 var branch_id=localStorage.getItem("branch_id");
                            }
            
                         var products = JSON.parse(localStorage.getItem("cart"));
                               // console.log("my products"+products);
                                var customer={
                                  "first_name": first_name,
                                  "last_name": last_name,
                                  "email": email
                                };
                                 
                               var billing_address= {
                                  "first_name": first_name,
                                  "last_name": last_name,
                                  "address1": localStorage.getItem("address1"),
                                  "phone": localStorage.getItem("phone"),
                                  "city": localStorage.getItem("city"),
                                  "province": localStorage.getItem("province"),
                                  "country": localStorage.getItem("country"),
                                  "zip": localStorage.getItem("zip")
                                };
                                var shipping_address={
                                  "first_name": first_name,
                                  "last_name": last_name,
                                  "address1": localStorage.getItem("address1"),
                                  "phone": localStorage.getItem("phone"),
                                  "city": localStorage.getItem("city"),
                                  "province": localStorage.getItem("province"),
                                  "country": localStorage.getItem("country"),
                                  "zip": localStorage.getItem("zip")
                                };
                                var shiping_charges=document.getElementById("shipping_charges").value;
                                //alert("shipping"+shiping_charges);
                                var shipping_lines=[];
                                shipping_lines.push({
                                        price: shiping_charges,
                                        source: "SMSA",
                                        title: "SMSA"
                                    });
                                   if(products.length == 0) {
                                        document.write("no item found");
                                    }
                                    var jsonArr = [];
                                    var products1= [];
        
                                    for (var i in products) {
                                        var items = products[i];
                                        jsonArr.push({
                                        variant_id: items.product_variant_id,
                                        quantity: items.quantity
                                    });
                                    
                                    
                                    products1.push({
                                        variant_title: items.variant_title, 
                                    	product_id: items.product_id, 
                                    	product_image: items.product_image,
                                    	quantity: items.quantity, 
                                    	product_category: items.product_category, 
                                    	product_price: items.product_price, 
                                    	product_name: items.product_name, 
                                    	product_variant_id: items.product_variant_id,
                                        note: items.note
                                    });
            
                                    }
                  
        
                                json_data=JSON.stringify({products:jsonArr,customer:customer,discount_code:discount_code,discount_type:discount_type,
                                discount_amount:discount_amount,billing_address:billing_address,shipping_address:shipping_address,
                                shipping_lines:shipping_lines,cust_name:name,cust_mob_no:phone,cust_email:email,
                                cust_device_id:cust_device_id,cust_device_type:cust_device_type,total_price:total_price,financial_status:"paid",products1:products1});
                               console.log("json"+json_data);
                            var type=localStorage.getItem("type");
                            if(type=="delivery")
                            {
                                $.ajax({
                                type: 'POST',
                                url: 'createOrderShopify.php',
                                cache: false,
                                contentType:false,
                                processData: false,
                                data: json_data,
                                beforeSend: function(){
                                $("#loaderIcon").show();
                                },
                                complete:function(data){
                                    $('#loaderIcon').hide();
                                }
                                })
                                .done (function(response, textStatus, jqXHR)        
                                { 
                                    
                                    response=JSON.parse(response);
                                    console.log(response);
                                   // alert(response);
                                    order_id=response.order_id;
                                    console.log(response.cust_email);
                                    
                                    localStorage.setItem("order_no",order_id);
                                    
                                })  
                                .fail  (function(jqXHR, textStatus, errorThrown) 
                                                    {  
                                                            console.log(jqXHR);
                                                            console.log(errorThrown);
                                                            console.log(textStatus);
                                                           // alert(jqXHR);
                                                            console.log(JSON.stringify(jqXHR));
                                                                    
                                })
                                
                            }
                            if(localStorage.getItem("type")=="GiftCard")
                                { 
                                        var products=JSON.parse(localStorage.getItem("cart"));
                                        var jsonArr = [];
                            
                                        for (var i in products) {
                                            var items = products[i];
                                            jsonArr.push({
                                            variant_id: items.product_variant_id,
                                            quantity: items.quantity
                                        });
                                    
                                        }
                                         var cust_email=$.cookie('email');
                                         var products = JSON.parse(localStorage.getItem("cart"));
                                            json_data=JSON.stringify({products:jsonArr,cust_email:cust_email});
                                            console.log(json_data);
                                            $.ajax({
                                            type: 'POST',
                                            url: 'createGiftCards.php',
                                            cache: false,
                                            contentType:false,
                                            processData: false,
                                            data: json_data,
                                            beforeSend: function(){
                                                    $("#loaderIcon").show();
                                                    },
                                                    complete:function(data){
                                                        $('#loaderIcon').hide();
                                                    }
                                            })
                                            .done (function(response, textStatus, jqXHR)        
                                            { 
                                                
                                                response=JSON.parse(response);
                                                
                                                 order_id=response.order_id;
                                                 localStorage.setItem("order_no",order_id);
                                                var cart = localStorage.getItem("cart");
                                                console.log("cart"+cart);
                                            })
                                            .fail  (function(jqXHR, textStatus, errorThrown) 
                                                                {  
                                                                        console.log(jqXHR);
                                                                        console.log(errorThrown);
                                                                        console.log(textStatus);
                                                                       // alert(jqXHR);
                                                                        console.log(JSON.stringify(jqXHR));
                                                                                
                                            })
                                }
                            var branch_id=localStorage.getItem("branch_id");
                            var order_id=localStorage.getItem("order_id");
                            console.log("id"+order_id);
                            //alert(transaction_id);
                            if(localStorage.getItem("type")=="GiftCard" || localStorage.getItem("type")=="pickup")
                            {
                               
                                $.ajax({
                                    type: 'POST',
                                    url: 'form_submit.php?order_id='+order_id+'&branch_id='+branch_id+'&order_status='+'Pending&transaction_id='+transaction_id,
                                   
                                    cache: false,
                                    contentType:false,
                                    processData: false,
                                    data : cart,
                                    beforeSend: function(){
                                   $("#loaderIcon").show();
                                   },
                                    complete:function(data){
                                        $('#loaderIcon').hide();
                                    }
                                    })
                                    .done (function(response, textStatus, jqXHR)        
                                    { 
                                            //alert(response);
                                            var message="<?php if($lang=='ar'){ echo 'تم انشاء الطلب بنجاح';}else{ echo 'Order placed Successfully'; }?>";
                                            localStorage.removeItem("order_id");
                                            response=JSON.parse(response);
                                            var lang=<?php echo $lang; ?>;
                        if(lang=="ar")
                        {
                            var ok="موافق";
                            var dunkin="دانكن";
                        }
                        else
                        {
                            var ok="Dunkin";
                            var dunkin="OK";
                        }
                        Swal.fire({
                                      
                                      title: dunkin,
                                      showCloseButton: false,
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
                                             }).then(function() {
                                               
                                                localStorage.setItem("cartCount","0");
                                                localStorage.removeItem("cart");
                                                localStorage.removeItem("milkOption");
                                                localStorage.removeItem("branch");
                                                localStorage.removeItem("branch_id");
                                                localStorage.removeItem("type");
                                                location.href="index.php";
                                            })
                                            
                                    })
                                    
                                    
                            }
                            else
                            {
                                var message="<?php if($lang=='ar'){ echo 'تم انشاء الطلب بنجاح';}else{ echo 'Order placed Successfully'; }?>";
                                 var lang=<?php echo $lang; ?>;
                        if(lang=="ar")
                        {
                            var ok="موافق";
                            var dunkin="دانكن";
                        }
                        else
                        {
                            var ok="Dunkin";
                            var dunkin="OK";
                        }
                        Swal.fire({
                                      
                                      title: dunkin,
                                      showCloseButton: false,
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
                                             }).then(function() {
                                               
                                                localStorage.setItem("cartCount","0");
                                                localStorage.removeItem("cart");
                                                localStorage.removeItem("milkOption");
                                                localStorage.removeItem("branch");
                                                localStorage.removeItem("branch_id");
                                                localStorage.removeItem("type");
                                                location.href="index.php";
                                            })
                            }
                            
                        });
                        </script>
                    <?php
                    } // end if response code
            
                    else
                    {?>
                    <script>
                                        Swal.fire({
                                        title: dunkin,
                                        showCloseButton: false,
                                        showConfirmButton:true,
                                        confirmButtonText:ok,
                                        html:
                                        '<p class="trans-rejected"><?php echo $result->result; ?></p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                        }).then(function() {
                                                location.href="index.php";
                                            })
                    </script>
    
                    <?php
                      } // end else
                    
            } //end if
         // end get success
     /* if(isset($_GET['success']))
        { 
        $success=$_GET['success'];
      //  print_r($result);
          if(isset($_POST['payment_reference']))
            {
               // if($result->response_code=="100")
               if(isset($_POST['payment_reference']))
                    {?>
                        <script>
                    
                                if(localStorage.getItem("type")=="GiftCard")
                                { 
                                        var products=JSON.parse(localStorage.getItem("cart"));
                                        var jsonArr = [];
                            
                                        for (var i in products) {
                                            var items = products[i];
                                            jsonArr.push({
                                            variant_id: items.product_variant_id,
                                            quantity: items.quantity
                                        });
                                    
                                        }
                                         var cust_email=$.cookie('email');
                                         var products = JSON.parse(localStorage.getItem("cart"));
                                            json_data=JSON.stringify({products:jsonArr,cust_email:cust_email});
                                            console.log(json_data);
                                            $.ajax({
                                            type: 'POST',
                                            url: 'createGiftCards.php',
                                            cache: false,
                                            contentType:false,
                                            processData: false,
                                            data: json_data,
                                            beforeSend: function(){
                                                    $("#loaderIcon").show();
                                                    },
                                                    complete:function(data){
                                                        $('#loaderIcon').hide();
                                                    }
                                            })
                                            .done (function(response, textStatus, jqXHR)        
                                            { 
                                                console.log(response);
                                                response=JSON.parse(response);
                                                console.log(response);
                                                console.log(response.shopify_order_number);
                                                order_id=response.shopify_order_number;mob
                                                var cart = localStorage.getItem("cart");
                                                console.log("cart"+cart);
                                            })
                                            .fail  (function(jqXHR, textStatus, errorThrown) 
                                                                {  
                                                                        console.log(jqXHR);
                                                                        console.log(errorThrown);
                                                                        console.log(textStatus);
                                                                       // alert(jqXHR);
                                                                        console.log(JSON.stringify(jqXHR));
                                                                                
                                            })
                                }
                                
                            var branch_id=localStorage.getItem("branch_id");
                            if(branch_id==null)
                            {
                                branch_id=0;
                            }
                            var order_id="<?php echo $result->reference_no;?>";
                            console.log("reference:"+order_id);
                            $.ajax({
                                type: 'POST',
                                url: 'form_submit.php?order_id='+order_id+'&branch_id='+branch_id+'&order_status='+'Pending',
                                async: false,
                                cache: false,
                                contentType:false,
                                processData: false,
                                data : cart
                                })
                                .done (function(response, textStatus, jqXHR)        
                                { 
                                        //alert(response);
                                        response=JSON.parse(response);
                                        //alert(response.message);
                                         Swal.fire({
                                        title: "Dunkin KSA",
                                        showCloseButton: false,
                                        showConfirmButton:true,
                                        html:
                                        '<p class="trans-rejected">Order placed Successfully</p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                         }).then(function() {
                                           
                                            localStorage.setItem("cartCount","0");
                                            localStorage.removeItem("cart");
                                            localStorage.removeItem("milkOption");
                                            localStorage.removeItem("branch");
                                            localStorage.removeItem("branch_id");
                                            localStorage.removeItem("type");
                                            //location.href="index.php";
                                        })
                                })
                        </script>
                    <?php
                    } // end if response code
            
                    else
                    {?>
                    <script>
                                        Swal.fire({
                                        title: "Dunkin KSA",
                                        showCloseButton: false,
                                        showConfirmButton:true,
                                        html:
                                        '<p class="trans-rejected"><?php echo $result->result; ?></p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                        });
                    </script>
    
                    <?php
                      } // end else
                    
            } //end if
        } // end get success*/
            ?>
