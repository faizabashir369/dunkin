<?php
 $lang=$_COOKIE["lang"];
session_start();

if(isset($_COOKIE['customer_id']))
{
    $customer_id=$_COOKIE['customer_id'];
}
else
{
    header("Location:login.php");
}
require_once 'paytabs.php';
$pt = new paytabs("mjehad@dunkindonuts.sa", "NCqgpDmKmTcXAvKO5J6kvV7fDwhfQjnDVNUlqg6NaiKLOuzTeFeJBlZeRhuIBRlwEfS5wYSHgCs471YmHc6iy6xpn28YTtvyJnDf");
$result = $pt->verify_payment($_POST['payment_reference']);
//echo $_POST['pickup_time'];
//echo $_REQUEST['payment_url'];
include 'header.php';?>
<?php include 'sidebar.php';

if(isset($_POST['address1']))
{?>
  <script>
                                  localStorage.setItem("address1","<?php echo $_POST['address1'];?>");
                                  localStorage.setItem("phone", "<?php echo $_POST['phone'];?>");
                                  localStorage.setItem("city", "<?php echo $_POST['city'];?>");
                                  localStorage.setItem("province", "<?php echo $_POST['province'];?>");
                                  localStorage.setItem("country", "<?php echo $_POST['country'];?>");
                                  localStorage.setItem("zip", "<?php echo $_POST['zip'];?>");
  </script>  
<?php }
?>


                <div id="orders" class="summary">
                    <h2><?php if($lang=='ar'){
                          echo 'ملخص الطلب';
                        }
                        else
                        {
                            echo 'Summary';
                        }?></h2>
                    <div id="active-order-wrapper">
               
                    </div>
                    
                    
                    <div class="row bor active_orders" id="hide_discount">
                        <div class="input-field col s12 m12 l12 no-padding">
                          <input id="discount_code" type="text" name="discount_code">
                          <span for="discount" id="discount">
                                <?php if($lang=='ar'){
                                   echo 'رمز الخصم';
                                }
                                else
                                {
                                    echo 'Discount Code';
                                }?>
                          </span>
                          <button class="discount-code">
                        <?php if($lang=='ar'){
                        
                           echo 'تحقق';
                        }
                        else
                        {
                            echo 'APPLY';
                        }?></button>
                          <button class="remove-code center-align" onclick="removeDiscount()"><i class="material-icons">delete</i></button>
                        </div>
                        <div id="success_m"></div>
                        <div id="message"></div>
                    </div>
                     <div class="row bor active_orders">
                        <div class="col s12 m12 l12 no-padding">
                        <span class="total">
                            <?php 
                            if($lang=='ar'){
                              echo 'المبلغ';
                            }
                            else
                            {
                                echo 'Subtotal';
                            }?>  
                        </span>
                        <span class="subtotal" id="subtotal">SR</span><span class="subtotal" id="subtotal"></span>
                            <input type="hidden" name="subtotal" id="total_amount">
                        </div>
            
                    <?php
                    
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/orders/getShippingRates/?delivery_city=".$_POST['city']."&lang=$lang",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    ));
                    
                    $response = curl_exec($curl);
                    
                    curl_close($curl);
                    
                    $data=json_decode($response,true);
                    
                    ?>
                   
                        <div class="col s12 m12 l12 no-padding" id="hide_charges">
                            <span class="total" >
                                <?php 
                            if($lang=='ar'){
                              echo 'رسوم الشحن';
                            }
                            else
                            {
                                echo 'Shipping fee';
                            }?> </span>
                            <span id="total-num" >SR <?php echo number_format($data['shipping_price'], 1);?></span>
                            <input type="hidden" id="shipping_charges" name="shipping_charges" value="<?php if(isset($data['shipping_price'])){echo $data['shipping_price'];}else{ echo "0";} ?>" >
                        </div>
                        <div class="col s12 m12 l12 no-padding" id="hide_charges">
                            <span class="total" id="discount-lbl">
                            <?php 
                            if($lang=='ar'){
                              echo 'الخصم';
                            }
                            else
                            {
                                echo 'Discount';
                            }?></span>
                            <span id="discount-num" >SR 0</span>
                        </div>
                    
                        <div class="col s12 m12 l12 no-padding" id="hide_total">
                            <span class="total" id="total-vat">
                            <?php 
                            if($lang=='ar'){
                              echo 'الاجمالي';
                            }
                            else
                            {
                                echo 'Total (VAT Included)';
                            }?>  </span><span class="total-price" 
                            id="total_price" style="float:right !important"></span>
                        </div>
                    </div>
                    <input type="hidden" id="discount_type" name="discount_type" value="">
                    <input type="hidden" id="applied" name="applied" value="0">
                    <input type="hidden" id="discount_amount" name="discount_amount" value="">
                    <input type="hidden" id="d_amount" name="d_amount" value="">
                    <input type="hidden" id="total" name="total" value="">
                    <input type="hidden" id="net_price" name="total" value="">
                    
                    <!-- <p class="center-align choose-method">Please choose one of the following payment method</p>
                    
                    <div class="row bor active_orders">
                        <button class="full_width black"><img src="images/apple.png" width="20" height:"20">Pay</button>
                    </div>
                        
                    <div class="row bor active_orders">
                        <button class="full_width pink-clr">DUNKIN' Pay</button>
                    </div>
                    -->
                     <div class="row bor active_orders">  
                        <button class="full_width pink-clr" onclick="createorder()">
                            <?php 
                            if($lang=='ar'){
                              echo 'ادفع الان';
                            }
                            else
                            {
                                echo 'Pay Now';
                            }?>
                            </button>
                    </div>
                    
                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
    $(document).ready(function () {
        if(localStorage.getItem("type")=="GiftCard")
        {
            document.getElementById("hide_discount").style.display="none";
            document.getElementById("hide_charges").style.display="none";
            document.getElementById("discount-num").style.display="none";
            document.getElementById("discount-lbl").style.display="none";
        }
        if(localStorage.getItem("type")=="pickup")
        {
            document.getElementById("hide_charges").style.display="none";
            
            //document.getElementById("hide_total").style.display="none";
        }
        
    var cart = JSON.parse(localStorage.getItem("cart"));
    var milkOption = JSON.parse(localStorage.getItem("milkOption"));
        console.log(cart);
    /*    if (cart==null || cart.length == 0) {
                document.write("no item found");
            }*/
            var total_price=0;
            for (var i=0; i<cart.length;i++) {
                
                var items = cart[i];
                if(milkOption!=null)
                {
                var options = milkOption[i];
                }
                
                var product_name = items.product_name ;
                var  product_price=items.product_price;
                var  product_image=items.product_image;
                var  notes=items.note;
                var  variant_title=items.variant_title;
             //   var  milk=items.milk_option;
                total_price=(parseInt(total_price,10))+(parseInt(product_price,10));
                total_price=parseFloat(total_price).toFixed(1);
                console.log(total_price);
                var quantity=items.quantity;
                var row= ' <div class="row active_orders valign-wrapper">';
                    row +=  '<div class="col s2 m2 l2 no-padding">';
                    row +=  '<img class="responsive-img" src="'+product_image+'">';
                    row +=  '</div>';
                    row +=  '<div class="col s6 m5 l5 no-padding">';
                    row +=  '<p>';
                    row +=  '<span class="item-no">'+product_name+'</span>';
                  
                    if(variant_title!="Default Title" && variant_title!="D")
                    {
                       
                    new_array=new Array();
                    new_array=variant_title.split('/'); 
                    
                   if(new_array[0]!="Default title")
                   {
                   
                  //  if((new_array[0]=='S') || (new_array[0]=='M') || (new_array[0]=='L') || (new_array[0]=='XL'))
                    
                       
                    row += '<span class="item-size">'+new_array[0]+'</span>';
                    
                    }
                   
                    if(variant_title!="Default title" && new_array[1]!="null" && new_array[1]!=undefined )
                    {
                       if($.cookie("lang")=="ar")
                        {
                            
                            if(new_array[1]==" No Milk" || new_array[1]=="No Milk")
                            {
                                new_array[1]="بدون حليب";
                            }
                            else if(new_array[1]==" Full Fat" || new_array[1]=="Full Fat")
                            {
                                
                                new_array[1]="حليب كامل الدسم";
                            }
                            if(new_array[1]==" Low Fat" || new_array[1]=="Low Fat")
                            {
                                
                                new_array[1]="حليب قليل الدسم";
                            }
                        }
                    
                     row +=    '<p>';
                     row += '<span class="flavor">'+new_array[1]+'</span>';
                      row +=    '</p>';
                    }
                    }
                   
                    
               /* if(milkOption!=null)
                {
                    if(options.milkopt!="")
                    {
                    row += '<span class="flavor">'+options.milkopt+'</span>';
                    }
                }
                */
                    if(notes!="")
                    {
                    row += '<br><div class="flavor notes">'+notes+'</div>';
                    }
                    row +=   '</div>';
                   
                      row +=   '<div class="col s2 m3 l3 no-padding">';
                      row +=       '<span class="item-qua"><span id="quantity">'+quantity+'</span></span>';
                      row +=   '</div>';
                      row +=   '<div class="col s2 m2 l2 no-padding">';
                      row +=    '<p class="item-price">SR '+parseFloat(product_price).toFixed(1);+'</p>';
                      row +=   '</div>';
                      row  +='</div>';
                    $("#active-order-wrapper").append(row);
                    
        }
        document.getElementById('subtotal').innerHTML="SR "+total_price;
        document.getElementById('total_amount').value=total_price;
        var subprice=total_price;
        
        var shiping_charges=document.getElementById('shipping_charges').value;
        if(localStorage.getItem("type")=="pickup" || localStorage.getItem("type")=="GiftCard")
        {
            shiping_charges=0;
        }
        total_price=parseInt(total_price,10)+parseInt(shiping_charges,10);
        total_price=parseFloat(total_price).toFixed(1);
        document.getElementById('total_price').innerHTML="SR "+total_price;
        document.getElementById('net_price').value=total_price;
        
        document.getElementById('total').value=total_price;
    });
    
        
        function deleteItem(i,quantity){

            var cart = JSON.parse(localStorage.getItem("cart"));
            console.log(cart.splice(i,1)); // delete item at index
            localStorage.cart = JSON.stringify(cart);
            var itemCount=localStorage.getItem('cartCount');
            itemCount=parseInt(itemCount,10);
            itemCount=(itemCount)-(quantity);
            localStorage.setItem('cartCount',itemCount);
            location.reload();
        }
        function updateItem(i){
            
        }
        if (window.performance) {
            console.info("window.performance works fine on this browser");
        }
        console.info(performance.navigation.type);
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            console.info( "This page is reloaded" );
            localStorage.removeItem("discount_type");
            localStorage.removeItem("discount_amount");
            localStorage.removeItem("discount_code");
        } 
        
        function removeDiscount()
        {
            var discount=document.getElementById("discount_amount").value;
            document.getElementById("discount_code").value="";
            
            var total=document.getElementById('total_amount').value;
            total=parseFloat(total,10).toFixed(1);
            discount=parseFloat(discount,10).toFixed(1);
            document.getElementById('total').value=total+discount;
            var total_amt=total+discount;
            if(localStorage.getItem("type")=='delivery')
            {
                shipping=document.getElementById("shipping_charges").value;
                
                total=parseFloat(total,10)+parseFloat(shipping,10);
                total=parseFloat(total,10).toFixed(1);
            }
            document.getElementById('total_price').innerHTML='SR '+total;
            document.getElementById('net_price').value=total;
            document.getElementById("discount_amount").value=0;
            document.getElementById("applied").value="0";
            document.getElementById("discount-num").innerHTML='SR 0';
            
            localStorage.removeItem("discount_type");
            localStorage.removeItem("discount_amount");
            localStorage.removeItem("discount_code");
                      
        }
            $(function () {
            
                $('.discount-code').on('click', function (e) {
                     e.preventDefault();
                    var code=document.getElementById("discount_code").value;
                  //  alert(code);
                      $.ajax({
                        type: 'post',
                        url: 'verify_discount_count.php',
                        data: code,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                         success: function(response)  
                        { 
                            $('#loaderIcon').hide();
                            if(document.getElementById("applied").value=="1")
                            {
                                document.getElementById('message').innerHTML="Discount already applied";
                                document.getElementById('success_m').innerHTML="";
                                return false;
                            }
                           
                           
                            document.getElementById("applied").value="1";
                            
                            response=JSON.parse(response);
                            console.log(response.discount.discount_price);
                            
                            var tp=document.getElementById('total_amount').value;
                            tp=parseFloat(tp).toFixed(1);
                            //alert(tp);
                            //alert(response.discount.discount_type);
                            if(response.discount.discount_type=="percentage")
                            {
                            var da=(tp*response.discount.discount_price)/100;
                            //alert(da);
                            var net_amount=(tp)-(da);
                            }
                            else
                            {
                                net_amount=tp-response.discount.discount_price;
                                da=response.discount.discount_price;
                            }
                                  
                            //document.getsxElementById('total_amount').value=net_amount;
                           // alert(document.getElementById('total').value=net_amount);
                           // alert(document.getElementById('total').value);
                            da=parseFloat(da).toFixed(1);
                            //document.getElementById('subtotal').innerHTML="SR "+parseFloat(net_amount).toFixed(1);
                            console.log(response.discount.discount_type);
                            
                            document.getElementById("discount_type").value=response.discount.discount_type;
                            if(localStorage.getItem("type")=='delivery')
                            {
                            net_amount=net_amount+parseInt(document.getElementById('shipping_charges').value,10);
                            }
                            net_amount=parseFloat(net_amount).toFixed(1);
                            total_price=parseFloat(total_price).toFixed(1);
                          //  alert(net_amount);
                           // alert(total_price);
                            document.getElementById('total_price').innerHTML="SR "+net_amount;
                            document.getElementById('net_price').value=net_amount;
                            //alert(response.discount.discount_price);
                            document.getElementById("discount_amount").value=da;
                            document.getElementById("total").value=response.discount.discount_price;
                            if(response.success == 1)
                            {
                              //document.getElementById('success_m').innerHTML="Discount is "+da;
                              document.getElementById('discount-num').innerHTML="SR "+da;
                              document.getElementById('message').innerHTML="";
                            
                            }
                            else
                            {
                                var message="<?php if($lang=='ar'){ echo 'رمز الخصم غير صحيح';}else{ echo 'Discount code is invalid';}?>";
                                document.getElementById('message').innerHTML=message;
                                document.getElementById("applied").value="2";
                                document.getElementById('success_m').innerHTML="";
                                document.getElementById('total').value=tp;
                                
                                document.getElementById('total_price').innerHTML='SR '+tp;
                                document.getElementById('net_price').value=tp;
                            }
                            
                                 //  alert(document.getElementById("discount_type").value);  
                                 //  alert(document.getElementById("discount_amount").value);  
                                 //  alert(document.getElementById("discount_code").value);  
                                 //  alert(document.getElementById("total").value);
                                localStorage.setItem("discount_type",document.getElementById("discount_type").value);
                                localStorage.setItem("discount_amount",document.getElementById("total").value);
                                //localStorage.setItem("discount_amount",document.getElementById("total").value);
                                localStorage.setItem("discount_code",document.getElementById("discount_code").value);
                        },
                        complete:function(response){
                            $('#loaderIcon').hide();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            
                            Swal.fire({
                                      type: 'error',
                                      title: errorThrown,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      html:
                                      '<p class="trans-rejected">'+textStatus+'</p>',
                                      width:'690px',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    })
                            
                        }
                        }) //end ajax
                       
                        
                                
                    }); // on click
            
                  }); //function
            </script>
            <script>
        
         function incrementValue(index) //increase item quantity
            {
                var data = localStorage.getItem('cart');
                if (data != null) {
                    let cart= JSON.parse(data);
                    var per_price = (cart[index].product_price)/(cart[index].quantity);
                    var quant=parseInt(cart[index].quantity,10);
                    quant++;
                    cart[index].quantity = quant;
                    cart[index].product_price = per_price*quant;
                    window.localStorage.setItem('cart', JSON.stringify(cart));
                    var itemCount=localStorage.getItem('cartCount');
                    itemCount=parseInt(itemCount,10);
                    itemCount=(itemCount)+1;
                    localStorage.setItem('cartCount',itemCount);
                } 
                location.reload();
            }
        function decrementValue(index) // decrease item quantity
            {
               var data = localStorage.getItem('cart');
                if (data != null) {
                    let cart= JSON.parse(data);
                    var per_price = (cart[index].product_price)/(cart[index].quantity);
                    var quant=parseInt(cart[index].quantity,10);
                    if(quant>1)
                    {
                        quant--;
                    }
                    cart[index].quantity = quant;
                    cart[index].product_price = per_price*quant;
                    window.localStorage.setItem('cart', JSON.stringify(cart));
                    var itemCount=localStorage.getItem('cartCount');
                    itemCount=parseInt(itemCount,10);
                    itemCount=(itemCount)-1;
                    localStorage.setItem('cartCount',itemCount);
                    location.reload();
                } 
                location.reload();
                
            }
            
        function replace(str, indexes){
    return str.split(' ').reduce(function(prev, curr, i){
        var separator = ~indexes.indexOf(i) ? '' : ' ';
        return prev + separator + curr;
    });
}
        function createorder()
        {
            var products = JSON.parse(localStorage.getItem("cart"));
            
            console.log("products"+products);
        //    var date= "<?php echo $_POST['pickup_time'];?>";
          var date= "<?php  $date = date_create($_POST['pickup_time']);
                                              echo date_format($date, 'Y-m-d H:i:s'); ;?>";
                                              
         /*  date=date.toString();
           date=date.toLowerCase();
            

            console.log(replace(date, [2]));
            date=replace(date, [2]);
            date = date.replace('pm','');
         */   
            var discount_code=document.getElementById("discount_code").value;
            console.log(discount_code);
            var discount_type=document.getElementById("discount_type").value;
            var discount_amount=document.getElementById("discount_amount").value;
            var name="<?php echo $_COOKIE['customer'];?>";
            var phone="<?php echo $phone=str_replace("+966", "",$_COOKIE['phone']);?>";
            var email="<?php echo $_COOKIE['email'];?>";
            var first_name="<?php echo $_COOKIE['first_name'];?>";
            var last_name="<?php echo $_COOKIE['last_name'];?>";
            
           // var total_price=document.getElementById('total_amount').value;
            var total_price=document.getElementById('total').value;
          //  alert(total_price);
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
            console.log("BID"+branch_id);
            console.log(localStorage.getItem("branch_id"));
            
            console.log("date"+date);
            var d_amt= document.getElementById("total").value;
            //  alert(total_price);
            var total_price=document.getElementById("total_amount").value;
            var total_price=parseFloat(document.getElementById("total_amount").value)-parseFloat(document.getElementById("discount_amount").value);
         //   alert("pickup order price"+total_price);
           data=JSON.stringify({products:products,pickup_time:date,discount_code:discount_code,discount_type:discount_type,discount_amount:d_amt,cust_name:name,cust_mob_no:phone,cust_email:email,cust_device_id:cust_device_id,cust_device_type:cust_device_type,branch_id:branch_id,total_price:total_price});
            console.log("data"+data);
                   
                               
            var giftCard="<?php echo $_GET['giftCard'];?>";
            if(giftCard==1)
            {
                console.log("gift card");
                           
                        var cart=localStorage.getItem("cart");
                          // alert(response.message);
                                            $.ajax({
                                            type: 'POST',
                                            url: 'test.php?amount='+total_price,
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
                                               
                                                console.log(response);
                                                
                                                response=JSON.parse(response);
                                                // alert(response.payment_url);
                                                console.log("payment_url"+response.payment_url);
                                                console.log(response.p_id);
                                                window.location.href=response.payment_url;
                                              
                                              
                                            })
                                            .fail  (function(jqXHR, textStatus, errorThrown) 
                                            {  
                                                    console.log(jqXHR);
                                                    console.log(errorThrown);
                                                    console.log(textStatus);
                                                    //alert(jqXHR);
                                                    console.log(JSON.stringify(jqXHR));
                                                            
                                            })
                        
                   
                        
                    }
            
                    if(localStorage.getItem('type')=="delivery")
                            {
                                
                                //alert("delivery order");
                                
                                
                                var products = JSON.parse(localStorage.getItem("cart"));
                                console.log("my products"+products);
                                var customer={
                                  "first_name": first_name,
                                  "last_name": last_name,
                                  "email": email
                                };
                               var billing_address= {
                                  "first_name": "<?php echo $_POST['first_name'];?>",
                                  "last_name": "<?php echo $_POST['last_name'];?>",
                                  "address1": "<?php echo $_POST['address1'];?>",
                                  "phone": "<?php echo $_POST['phone'];?>",
                                  "city": "<?php echo $_POST['city'];?>",
                                  "province": "<?php echo $_POST['province'];?>",
                                  "country": "<?php echo $_POST['country'];?>",
                                  "zip": "<?php echo $_POST['zip'];?>"
                                };
                                var shipping_address={
                                  "first_name": "<?php echo $_POST['first_name'];?>",
                                  "last_name": "<?php echo $_POST['last_name'];?>",
                                  "address1": "<?php echo $_POST['address1'];?>",
                                  "phone": "<?php echo $_POST['phone'];?>",
                                  "city": "<?php echo $_POST['city'];?>",
                                  "province": "<?php echo $_POST['province'];?>",
                                  "country": "<?php echo $_POST['country'];?>",
                                  "zip": "<?php echo $_POST['zip'];?>"
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
                                var discount_type=localStorage.getItem("discount_type");
                                var discount_price=localStorage.getItem("discount_amount");
                                var discount_code= localStorage.getItem("discount_code");
                                var total_price=document.getElementById('total_amount').value;
                                json_data=JSON.stringify({products:jsonArr,customer:customer,discount_code:discount_code,discount_type:discount_type,
                                discount_amount:discount_price,billing_address:billing_address,shipping_address:shipping_address,
                                shipping_lines:shipping_lines,cust_name:name,cust_mob_no:phone,cust_email:email,
                                cust_device_id:cust_device_id,cust_device_type:cust_device_type,total_price:total_price,financial_status:"paid",products1:products1});
                               
                               //alert("json"+json_data);
                                var cart = localStorage.getItem("cart");
                                var subttotal=document.getElementById("total_amount").value;
                                var shiping_charges=document.getElementById("shipping_charges").value;
                                console.log("shipping_charges"+shiping_charges);
                                    //alert(response.message);
                                  /*  
                                     var discount_codes={
                                  "code": discount_code,
                                  "amount": discount_price,
                                  "type": discount_type
                                };
                                var tota_amt=document.getElementById("net_price").value;
                                alert(tota_amt);
                                alert(tota_amt);
                                var json_data=JSON.stringify({products:jsonArr,customer:customer,discount_codes:discount_codes,billing_address:billing_address,shipping_address:shipping_address,
                                shipping_lines:shipping_lines,cust_name:name,cust_mob_no:phone,cust_email:email,
                                cust_device_id:cust_device_id,cust_device_type:cust_device_type,total_price:tota_amt,financial_status:"paid",products1:products1});
                               console.log("json"+json_data);
                            var type=localStorage.getItem("type");
                            if(type=="delivery")
                            {
                                alert(type);
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
                                    alert(order_id);
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
                            */
                                 $.ajax({
                                            type: 'POST',
                                            url: 'test.php?amount='+subttotal+'&discount='+discount_amount+'&shipping_charges='+shiping_charges,
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
                                                   // alert(response);
                                                    response=JSON.parse(response);
                                                       alert(response);
                                                    // alert(response.payment_url);
                                                    console.log(response.payment_url);
                                                    
                                                    //console.log(response.p_id);
                                                    window.location.href=response.payment_url;
                                                      
                                                    
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
                    else if(localStorage.getItem('type')=="pickup")
                    {
                    //alert("pickup");
                    console.log("data"+data);
                    $.ajax({
                    type: 'POST',
                    url: 'create_order.php',
                    
                    cache: false,
                    contentType:false,
                    processData: false,
                    data: data,
                    beforeSend: function(){
                        $("#loaderIcon").show();
                    },
                    complete:function(data){
                        $('#loaderIcon').hide();
                    }
                    })
                    .done (function(response, textStatus, jqXHR)        
                    { 
                       // alert(response);
                       console.log("dataa"+data);
                        response=JSON.parse(response);
                      //  alert(response);
                       console.log("response"+response.order_id);
                        
                        
                        if(response.success="1")
                        {
                           
                            var order_id=response.order_id;
                            console.log(order_id);
                            localStorage.setItem("order_id",order_id);
                            localStorage.setItem("order_no",order_id);
                            
                               total_price=document.getElementById("total_amount").value;
                                    var cart = localStorage.getItem("cart");
                                            $.ajax({
                                            type: 'POST',
                                            url: 'test.php?amount='+total_price+'&discount='+discount_amount+'&order_id='+order_id,
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
                                               
                                                
                                                response=JSON.parse(response);
                                                
                                               // console.log(response.payment_url);
                                                //console.log(response.p_id);
                                                window.location.href=response.payment_url;
                                              
                                              
                                            })
                                            .fail  (function(jqXHR, textStatus, errorThrown) 
                                            {  
                                                    console.log(jqXHR);
                                                    console.log(errorThrown);
                                                    console.log(textStatus);
                                                    //alert(jqXHR);
                                                    console.log(JSON.stringify(jqXHR));
                                                            
                                            })
                                
                                
                            
                                 
                } // end if
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
                       
            
        }
        
    </script>
<?php include 'footer.php';

        
          $success=$_GET['success'];
        
          if(isset($_POST['payment_reference']))
            {
                if($result->response_code=="100")
                    {?>
                        <script>
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
                            
                            var discount_code=localStorage;
                           // console.log(discount_code);
                            var discount_type=document.getElementById("discount_type").value;
                            var discount_amount=document.getElementById("discount_amount").value;
                            
                            
                            
                            var name="<?php echo $_COOKIE['customer'];?>";
                            var phone="<?php echo $phone=str_replace("+966", "",$_COOKIE['phone']);?>";
                            var email="<?php echo $_COOKIE['email'];?>";
                            var first_name="<?php echo $_COOKIE['first_name'];?>";
                            var last_name="<?php echo $_COOKIE['last_name'];?>";
                            
                            //var total_price=document.getElementById('total').value;
                            var total_price=document.getElementById('net_price').value;
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
                                console.log("my products"+products);
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
                                    
                                    console.log("v"+items.variant_title);
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
                               // alert(document.getElementById("total").value);
                               // alert(document.getElementById("subtotal").value);                                
                               // alert(document.getElementById("discount_type").value);
                               // alert(document.getElementById("discount_amount").value);
                               // alert(document.getElementById("discount_code").value);
                            //   alert(total_price);
                                var discount_type=localStorage.getItem("discount_type");
                                var discount_price=localStorage.getItem("discount_amount");
                                var discount_code= localStorage.getItem("discount_code");
                                   
                                var discount_codes={
                                  "code": discount_code,
                                  "amount": discount_price,
                                  "type": discount_type
                                };
                                
                                json_data=JSON.stringify({products:jsonArr,customer:customer,discount_codes:discount_codes,billing_address:billing_address,shipping_address:shipping_address,
                                shipping_lines:shipping_lines,cust_name:name,cust_mob_no:phone,cust_email:email,
                                cust_device_id:cust_device_id,cust_device_type:cust_device_type,total_price:total_price,financial_status:"paid",products1:products1});
                               console.log("json"+json_data);
                            var type=localStorage.getItem("type");
                            if(type=="delivery")
                            {
                                alert(cust_device_id);
                                alert(json_data);
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
                                   alert(response);
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
                                  //  alert(localStorage.getItem("type"));
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
                                               // alert(response);
                                                response=JSON.parse(response);
                                               // alert(response);
                                                 console.log("response.shopify_order_number"+response.shopify_order_number);
                                                 order_id=response.order_id;
                                                
                                                localStorage.setItem("order_no",order_id);
                                                var cart = localStorage.getItem("cart");
                                                console.log("cart"+cart);
                                                
                                        var message="<?php if($lang=='ar'){ echo 'تم شراء البطاقة بنجاح';}
                                        else{ echo 'You have purchased card successfully'; }?>";
                                            localStorage.removeItem("order_id");
                                            
                                            
                                            
                                          //  alert(response);
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
                                               
                                                $.removeCookie('branch_id', { path: '/' });
                                                localStorage.removeItem("type");
                                                localStorage.removeItem("discount_amount");
                                                localStorage.removeItem("discount_code");
                                                localStorage.removeItem("discount_type");
                                                //alert(localStorage.getItem("type"));
                                                
                                                    location.href="giftcard_content.php";
                                                
                                             })
                                               
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
                            var order_id=localStorage.getItem("order_no");
                            console.log("id"+order_id);
                            //alert(transaction_id);
                            if(localStorage.getItem("type")=="pickup")
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
                                          //  alert(response);
                                            var message="<?php if($lang=='ar'){ echo 'تم ارسال طلبك، يرجى التوجه الى قسم الطلبات الفعالة لمعرفة حالة الطلب. سيتم إضافة نقاط دنكاوي قريبا';
                                                
                                            }else{ echo 'Your order is created. Browse the active section to know order status. Dunkawy points will be added soon'; }?>";
                                            localStorage.removeItem("order_id");
                                            
                                            response=JSON.parse(response);
                                            
                                          //  alert(response);
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
                                                $.removeCookie('branch_id', { path: '/' });
                                                localStorage.removeItem("type");
                                                localStorage.removeItem("discount_amount");
                                                localStorage.removeItem("discount_code");
                                                localStorage.removeItem("discount_type");
                                                if(localStorage.getItem("type")=="GiftCard")
                                                {
                                                    location.href="giftcard_content.php";
                                                }
                                                else
                                                {
                                                    location.href="index.php";
                                                }
                                            })
                                            
                                    })
                                    
                                    
                            }
                            
                            if(localStorage.getItem("type")=="delivery")
                            {
                                var message="<?php if($lang=='ar'){ echo 'تم قبول طلبك ويمكنك معرفة رقم الشحنة من خلال صفحة الطلبات السابقة';}
                                else{ echo 'Your order is created. You can get the tracking number from recent order section'; }?>";
                                 var lang=$.cookie("lang");
                        if(lang=="ar")
                        {
                            var ok="موافق";
                            var dunkin="دانكن";
                        }
                        else
                        {
                            var ok="OK";
                            var dunkin="dunkin";
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
                                                $.removeCookie('branch_id', { path: '/' });
                                                localStorage.removeItem("type");
                                                //location.href="index.php";
                                            })
                            }
                            
                        });
                        </script>
                    <?php
                    } // end if response code
            
                    else
                    {?>
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
                            var dunkin="dunkin";
                        }
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
            ?>