
<?php 
    if($_COOKIE["customer"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
    }
    else
    {
        header("Location:login.php");
    }
    
        include 'header.php'; ?>
        <?php if(isset($_GET['giftCard']))
        {?>
            <script>
            var itemCount=localStorage.getItem('cartCount');
           
           
            var type=localStorage.getItem('type');
            console.log(type);
            var lang="<?php echo $lang;?>";
            if(itemCount>0){
               
            if(itemCount>0 && type=="pickup")
            {
                      if(lang=="ar")
                      {
                          message="يوجد لديك بالسلة طلب استلام من فرع، سيتم حذفه في حال الاستمرار. ";
                          var ok="موافق";
                          var dunkin="دانكن";
                     }
                      else
                      {
                           var ok="OK";
                           var dunkin="Dunkin";
                          message='You already have '+type+' orders in the cart. Do you want to delete orders?';
                      }
                
            }
            else if(itemCount>0 && type=="delivery")
            {
                 if(lang=="ar")
                      {
                          message="يوجد لديك بالسلة طلب توصيل لعنوان، سيتم حذفه في حال الاستمرار. ";
                          var ok="موافق";
                          var dunkin="دانكن";
                     }
                      else
                      {
                           var ok="OK";
                           var dunkin="Dunkin";
                          message='You already have '+type+' orders in the cart. Do you want to delete orders?';
                      }
                
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
                                            localStorage.removeItem("cart");
                                            localStorage.removeItem("branch_id");
                                            document.getElementById('cart').innerHTML="0";
                                            var storage = JSON.parse(localStorage.getItem("cart"));
                                            if(storage==null){
                                                }
                                            var item_name="<?php echo $_POST['name'];?>";
                                            var price="<?php echo $_POST['price'];?>";
                                            var images="<?php echo $_POST['image'];?>";
                                            var product_id="<?php echo $_POST['pid'];?>";
                                            var product_variant_id="<?php echo $_POST['vid'];?>";
                                            var size="";
                                            var variant_title="<?php echo $_POST['title'];?>";
                                            var product_category="Gift Card";
                                            var notes="";
                      
                         
                    {
                    
                    {
                        
                        
                        {
                            var data = {product_name:item_name,quantity:"1",product_price:price,variant_title:variant_title,
                        note:notes,product_image:images,product_id:product_id,product_category:product_category,product_variant_id:product_variant_id};
                       
                                    
                                    // Store it.
                                    //check for Navigation Timing API support
                                    if (window.performance) {
                                      console.info("window.performance works fine on this browser");
                                    }
                                    console.info(performance.navigation.type);
                                    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                                      console.info( "This page is reloaded" );
                                    } else {
                                        if(storage==null)
                                        {
                                            storage=[];
                                        }
                                      console.info( "This page is not reloaded");
                                       storage.push(data);

                                        localStorage.setItem("cart",JSON.stringify(storage));
                                       
                                        var storages = JSON.parse(localStorage.getItem("milkOption"));
                                        if(storages==null){
                                            storages = [];
                                        }
                                        /*
                                         var data = {milkopt:milkopt};
                                                storages.push(data);
                                                    
                                                // Store it.
                                        localStorage.setItem("milkOption",JSON.stringify(storages));
                                        */
                                        cartcount=localStorage.getItem("cartCount");
                                       // alert(cartcount);
                                        cartcount=parseInt(cartcount,10) + 1;
                                       //alert(cartcount);
                                        localStorage.setItem("cartCount",cartcount);
                                        document.getElementById('cart').innerHTML=cartcount;
                                        localStorage.setItem('type',"GiftCard");
                                            
                                            console.log("mydata"+storage);
                                    
                                    }
                        }
                    }
                    }  // end if length
                    
                        
                                    
                                            location.reload();
                                        } 
                                        else {
                                        // handle cancel
                                        }
                                    
                                       
                                });
                
               }
                else
                {
                   
                        localStorage.removeItem("branch_id");
                        var storage = JSON.parse(localStorage.getItem("cart"));
                        if(storage==null){
                                storage = [];
                            }
                        var item_name="<?php echo $_POST['name'];?>";
                        if(item_name!=""){
                        var price="<?php echo $_POST['price'];?>";
                        var images="<?php echo $_POST['image'];?>";
                        var product_id="<?php echo $_POST['pid'];?>";
                        var product_variant_id="<?php echo $_POST['vid'];?>";
                        var size="";
                        var variant_title="<?php echo $_POST['title'];?>";
                        var product_category="Gift Card";
                        var notes="";
                      var check =0;
                    if(storage.length>0)
                    {
                    var total_price=0;
                    for (var i in storage) {
                        
                        items = storage[i];
                    
                        var  name =items.product_name;
                        var  i_price = items.product_price;
                        var  vid = items.product_variant_id;
                        var  not = items.note;
                        var quantity=items.quantity;
                        //alert(name);
                        //alert(item_name);
                        //alert(vid);
                        //alert(product_variant_id);
                        if(name==item_name && vid==product_variant_id)
                        {
                            
                           /* var per_price = (storage[i].product_price)/(storage[i].quantity);
                            
                            var quant=parseInt(storage[i].quantity,10);
                            quant=quant+1;
                            //alert(quant);
                            storage[i].quantity = quant;
                            storage[i].product_price = per_price*quant;
                            if (window.performance) {
                              console.info("window.performance works fine on this browser");
                            }
                            console.info(performance.navigation.type);
                            if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                              console.info( "This page is reloaded" );
                            } else {
                              console.info( "This page is not reloaded");
                               storage.push(data);
                            window.localStorage.setItem('cart', JSON.stringify(storage));
                            var itemCount=localStorage.getItem('cartCount');
                            itemCount=parseInt(itemCount,10);
                           // alert(itemCount);
                            itemCount=(itemCount)+1;
                           // alert(itemCount);
                            localStorage.setItem('cartCount',itemCount);
                            document.getElementById('cart').innerHTML=itemCount;
                            window.navigator.vibrate(300);
                            
                        }      
                           */
                        
                            check=1;
                            
                        }
                    } // end for loop
                    }// end if length
                        if(check==0)
                        {
                           
                        var data = {product_name:item_name,quantity:"1",product_price:price,variant_title:variant_title,
                        note:notes,product_image:images,product_id:product_id,product_category:product_category,product_variant_id:product_variant_id};
                        
                        if (window.performance) {
                          console.info("window.performance works fine on this browser");
                        }
                        console.info(performance.navigation.type);
                        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                          console.info( "This page is reloaded" );
                        } else {
                          console.info( "This page is not reloaded");
                          
                                      storage.push(data);          
                                    // Store it.
                                    localStorage.setItem("cart",JSON.stringify(storage));
                                    
                                    cartcount=localStorage.getItem("cartCount");
                                   // alert(cartcount);
                                    cartcount=parseInt(cartcount,10) + 1;
                                 //  alert(cartcount);
                                    localStorage.setItem("cartCount",cartcount);
                                    document.getElementById('cart').innerHTML=cartcount;
                                    localStorage.setItem('type',"GiftCard");
                                            
                                            console.log("mydata"+storage);
}       
                        
                    }
                    
                    
                        }
                                    
               }
            
            
            </script>
            
        <?php  } ?>
                <div id="orders" class="list-orders">
                    <h2 id="list_heading"><?php if($lang=='ar'){ echo 'قائمة الطلبات';}else{ echo 'List of orders';} ?></h2>
                 
                  <a href="menu.php?type=<?php echo $_GET['type'];?>&branch_id=<?php echo $_COOKIE['branch_id'];?>" id="btn-add" class="btn-add btn-floating btn-large pink-clr">
                        <i class="large_icon material-icons">add</i>
                    <p id="add-item" class="add-item right-align">Add item</p>
                    
                  </a>
               
                    
                    <div id="active-order-wrapper">
                        <?php if(isset($_GET['reorder'])){
                        


                        

                        ?>
                            <script>
                                var itemCount=localStorage.getItem('cartCount');
                                var type=localStorage.getItem('type');
                                console.log(type);
                            </script>
                             <?php  array_map(function($id,$vid,$cat,$nam,$variant,$price,$quantity,$note,$image,$milk)
                                {?>
                                <script>
                                
                                    var cart_quantity= localStorage.getItem('cartCount');
                                    if(cart_quantity===null)
                                    {
                                        cart_quantity=0;
                                    }
                                  // alert(cart_quantity);
                                    var cart_new="<?php echo $quantity;?>";
                                  //  alert(cart_new);
                                    var qua=parseInt(cart_quantity,10)+parseInt(cart_new,10);
                                  //  alert(qua);
                                    localStorage.setItem('cartCount',qua);
                                    
                                     document.getElementById("cart").innerHTML=qua;
                                    
                                    var storage = JSON.parse(localStorage.getItem("cart"));
                                      if(storage==null){
                                        storage = [];
                                      }
                                      
                                     var variant="<?php echo $variant;?>";
                                     //alert(variant); 
                                     v_array=new Array();
                                     v_array=variant.split('/'); 
                                    var milkopt=v_array[1];
                                    
                                    var item_name = "<?php echo $nam;?>";
                                    
                                      console.log(item_name);
                                    var item_quantity = "<?php echo $quantity;?>";
                                        console.log(item_quantity);
                                    var price = "<?php echo $price;?>";
                                    price=price;//*item_quantity;
                                      console.log(price);
                                    var size= v_array[0];
                                    
                                    size = size.replace(/\s/g, '');
                                      console.log(size);
                                    var notes= "<?php echo $note;?>";
                                      console.log(notes);
                                    var images= "<?php echo $image;?>";
                                      console.log(images);
                                    var product_id= "<?php echo $id;?>";
                                      console.log(product_id);
                                    var product_variant_id= "<?php echo $vid;?>";
                                      console.log(product_variant_id);
                                    var product_category= "<?php echo $cat;?>";
                                      console.log(product_category);
                                    
                                       
                                   
                                      // Create an object to store.
                                    var data = {product_name:item_name,quantity:item_quantity,product_price:price,variant_title:variant,
                                    note:notes,product_image:images,product_id:product_id,product_category:product_category,product_variant_id:product_variant_id};
                                    storage.push(data);
                                    
                                    console.log("data"+data);
                                    var storages = JSON.parse(localStorage.getItem("milkOption"));
                                    if(storages==null){
                                        storages = [];
                                    }
                                     var data = {milkopt:milkopt};
                                            storages.push(data);
                                                
                                            // Store it.
                                    localStorage.setItem("milkOption",JSON.stringify(storages));
                                    console.log(data);
                                      // Store it.
                                     if (window.performance) {
                                       console.info("window.performance works fine on this browser");
                                    }
                                    console.info(performance.navigation.type);
                                    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                                      console.info( "This page is reloaded" );
                                    } else {
                                      console.info( "This page is not reloaded");
                                    localStorage.setItem("cart",JSON.stringify(storage));
                                    
                                    
                                     localStorage.setItem("type","pickup");
                                    }
                                </script>
                                    
                            
                            <?php  }, $_POST['product_id'],$_POST['product_variant_id'],$_POST['product_category'],$_POST['product_name'], $_POST['variant_title'],$_POST['product_price'],$_POST['product_quantity'],$_POST['note'],$_POST['product_image'],$_POST['variant_milk']);?>
                            <?php  }?>
                    </div>
                    <div id="message"></div>
                    <div class="row last_row active_orders" id="hide_row">
                        <div class="col s12 m6 l5 right">
                            <input type="hidden" id="tp" value="">
                            <span class="total">
                                <?php
                                 if($lang=='ar')
                                 {
                                     echo 'الاجمالي (شاملا الضريبة)';
                                 }
                                 else
                                 {
                                     echo 'Total ( VAT Included ):';
                                 }
                                
                                ?>
                                 
                                
                                </span><span class="total-price" id="total-price"></span>
                        </div>
                    </div>
                    
                    <div class="row last_row active_orders " id="remove_row">
                        <div class="col s6 m6 l6 center-align no-padding">
                        <button id="pickup_location" type="button" class="full_width pink-clr pickup-btn"><i class="material-icons">location_on</i>
                        </button>
                        </div>
                        <form action="order_summary.php" type="post" id="checkout" method="post">
                            
                        
                        <div class="col  s6 m6 l6 no-padding">
                        
                        <button type="button" id="pickup_time" class="full_width pink-clr pickup-btn"><i class="material-icons">access_time</i> <?php if($lang=='ar'){ echo 'وقت الاستلام';}else{ echo 'Pickup time';} ?>
                        <?php  
                        date_default_timezone_set('Kuwait/Riyadh');
                        $dateTime= date('Y-m-d H:i:s');
                        //echo $dateTime;
                      
$newtimestamp = strtotime($dateTime.' + 20 minute');
 $newtimestamp=date('Y-m-d H:i:s', $newtimestamp);
  
                        ?>
                            <!--<input type="text"  required="" placeholder="Select time"  name="pickup_time" id="datetime"/>-->
<input type="text"  required="" placeholder="Select time"  name="pickup_time" id="datetimepicker7" value="<?php echo $newtimestamp;?>"readonly="readonly" />
    
                        </button>
                        
                        </div>
                        <div class="col  s12 m12 l12"><br>
                        
                        <button type="submit" class="full_width orange-clr">
                        <?php if($lang=='ar')
                            { echo 'إكمال الطلب';
                            }else{ echo 'Proceed to checkout';}
                        ?>
                        </button>
                        </div>
                        </form>
                    </div>
                    <!--
                     <div class="row last_row active_orders">  
                        <a href="card_payment.php"><button onclick="createorder()" type="submit" class="full_width orange-clr">Process to checkout</button></a>
                    </div> -->
 
                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
      </div>
    
    </div>
    <style>
        .select-wrapper .caret 
        {
            display:none;
        }
        .swal2-container .select-wrapper{
        display: none !important;
        }
    </style>
    <script>
        var gift_card="<?php echo $_GET['giftCard']?>";
        var checkout_form=document.getElementById("checkout");
        
        $('#checkout').on('submit', function (e) {
            
        if(localStorage.getItem('type')=="delivery")
        {
            e.preventDefault();
            $('#checkout').action = "address.php";
            document.getElementById("checkout").action = "address.php?select=1";
            window.location.href="address.php?select=1";
        }
        else if(localStorage.getItem('type')=="GiftCard")
        {
            document.getElementById("checkout").action = "order_summary.php?giftCard=1";
            document.getElementById("btn-add").style.display="none";
        }
        else
        {
            $('#checkout').action = "order_summary.php";
            document.getElementById("checkout").action = "order_summary.php";
        }
    
    });
       
    
      
  
    

        $(document).ready(function () {
            if(localStorage.getItem("type")=="GiftCard")
            {
                $('.subtr').hide(); 
                $('.plus').hide(); 
                
            }
       // M.AutoInit();
        //var DateField = MaterialDateTimePicker.create($('#datetime'))
        <?php
                                 if($lang=='ar')
                                 {?>
                                     
                                     document.getElementById("pickup_location").innerHTML +=" مكان الاستلام  "+localStorage.getItem('branch')+" الفرع";
                                 <?php }
                                 else
                                 {?>
                                     document.getElementById("pickup_location").innerHTML +=" Pickup Location "+localStorage.getItem('branch')+" Branch";
                                 <?php } ?>
                                
        
                 
             
            
        if(localStorage.getItem('type')=="delivery" || localStorage.getItem('type')=="GiftCard" || localStorage.getItem('type')=="null")
        {
            document.getElementById("pickup_location").style.display="none";
            document.getElementById("pickup_time").style.display="none";
            document.getElementById('pickup_time').required = false;
            document.getElementById("datetime").value="x";
            document.getElementById("datetime").style.display="none";
            
        }
        if(localStorage.getItem('type')=="GiftCard")
        {
            console.log(document.getElementById("btn-add").style.display="none");
            document.getElementById("btn-add").style.display="none";
        }
        console.log("branch"+localStorage.getItem('branch'));
        });
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
                    localStorage.setItem('cart', JSON.stringify(cart));
                    var itemCount=localStorage.getItem('cartCount');
                    itemCount=parseInt(itemCount,10);
                    itemCount=(itemCount)+1;
                    localStorage.setItem('cartCount',itemCount);
                    var id=index+'quantity';
                    var q=document.getElementById(id).innerHTML;
                      q=parseInt(q,10);
                    if(q>=1){
                    q++;
                    }
                   console.log(q);
                    document.getElementById(id).innerHTML=q;
                    var per=index+'pprice';
                    document.getElementById(per).innerHTML="SR "+parseFloat(q*parseInt(per_price,10)).toFixed(1);
                    var tp=document.getElementById('tp').value;
                    //alert(tp);
                    document.getElementById('total-price').innerHTML="SR "+(parseInt(tp,10)+parseInt(per_price,10)).toFixed(1);
                    document.getElementById('tp').value=(parseInt(tp,10)+parseInt(per_price,10)).toFixed(2);
                    var cc=document.getElementById("cart").innerHTML;
                    document.getElementById("cart").innerHTML=parseInt(cc,10)+1;
                } 
               
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
                    
                    var id=index+'quantity';
                    var q=document.getElementById(id).innerHTML;
                      q=parseInt(q,10);
                    if(q>1){
                    var cc=document.getElementById("cart").innerHTML;
                    itemCount=(itemCount)-1;
                    localStorage.setItem('cartCount',itemCount); 
                    document.getElementById("cart").innerHTML=itemCount;
                    q--;
                    
                   console.log(q);
                    document.getElementById(id).innerHTML=q;
                    var per=index+'pprice';
                    document.getElementById(per).innerHTML="SR "+parseFloat(q*parseInt(per_price,10)).toFixed(1);
                    
                    var tp=document.getElementById('tp').value;
                    
                    if(q!=0)
                    {
                    
                    document.getElementById('total-price').innerHTML="SR "+(parseInt(tp,10)-parseInt(per_price,10)).toFixed(2);
                    document.getElementById('tp').value=(parseInt(tp,10)-parseInt(per_price,10)).toFixed(2);
                    
                    }
                    }
                } 
                
                
            }
            
        var cart = JSON.parse(localStorage.getItem("cart"));
        console.log(cart);
        
       
        if(cart==null || cart.length==0)
        {
              // document.getElementById("message").innerHTML="Your cart is empty";
              var lang=$.cookie("lang");
              if(lang=="ar")
                        {
                            var ok="موافق";
                            var dunkin="دانكن";
                            var message="يرجى اضافة منتجات للسلة";
                        }
                        else
                        {
                            var ok="OK";
                            var dunkin="Dunkin";
                            var message="Please add items to the cart first";
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
                                         
                                            localStorage.setItem("cartCount","0")
                                            localStorage.removeItem("cart");
                                            document.getElementById('cart').innerHTML="0";
                                            window.location.href="index.php";
                                        } 
                                        else {
                                        // handle cancel
                                        window.location.href="index.php";
                                        }
                                    
                                       
                                });
                
               document.getElementsByClassName("last_row")[0].style.display="none";
               document.getElementsByClassName("last_row")[1].style.display="none";
        }
        if(localStorage.getItem("milkOption")!=null)
        {
            var milkOption = JSON.parse(localStorage.getItem("milkOption"));
        }
        
            var total_price=0;
            for (var i=0; i<cart.length; i++) {
                
                var items = cart[i];
                if(milkOption!=null)
                {
                var options = milkOption[i];
                //alert("options "+options);
                }
                else
                {
                 //   alert("Milk option is null "+milkOption);
                }
                
                var product_name = items.product_name ;
                var  product_price=items.product_price;
                product_price=parseFloat(product_price).toFixed(1);
                var  product_image=items.product_image;
                var  notes=items.note;
                var  variant_title=items.variant_title;
             //   var  milk=items.milk_option;
                total_price=(parseInt(total_price,10))+(parseInt(product_price,10));
                total_price=parseFloat(total_price).toFixed(1);
                console.log(total_price);
                var quantity=items.quantity;
                
                var row= ' <div class="row active_orders valign-wrapper">';
                    row +=  '<div class="col s3 m2 l2 no-padding">';
                    row +=  '<img class="responsive-img" src="'+product_image+'">';
                    row +=  '</div>';
                    row +=  '<div class="col s4 m4 l4 no-padding">';
                    row +=  '<p>';
                    row +=  '<span class="item-no">'+product_name+'</span>';
                   
                if(localStorage.getItem("type")!="GiftCard")
                    {
                    if(variant_title!="Default Title")
                    {
                       
                    new_array=new Array();
                    new_array=variant_title.split('/'); 
                    
                   
                   
                    if(new_array[0]!="Default Title" && variant_title!="D") {
                        
                    row += '<span class="item-size">'+new_array[0]+'</span><br>';
                     
                    }
                    
                    row +=    '</p>';
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

                  }
                    if(milkOption!=null)
                {
                    /*if(options.milkopt!="")
                    {
                     row += '<span class="flavor">'+options.milkopt+'</span>';
                    }*/
                }

                //alert("Mmilk Options "+options.milkopt);
                    if(notes!="")
                    {
                    row += '<br><div class="flavor notes">'+notes+'</div>';
                    }
                   
                    row +=   '</div>';
                   
                      row +=   '<div class="col s2 m3 l3 no-padding ltr">';
                      row +=       '<span class="item-qua"><i class="material-icons subtr" onclick="decrementValue('+i+')">remove</i><span id="'+i+'quantity"> '+quantity+' </span><i class="material-icons plus" onclick="incrementValue('+i+')">add</i></span>';
                      row +=   '</div>';
                      row +=   '<div class="col s2 m2 l2 no-padding">';
                      row +=    '<p class="item-price" id="'+i+'pprice">SR '+product_price+'</p>';
                      row +=   '</div>';
                      row +=   '<div class="col s1 m1 l1 no-padding">';
                       row +=      '<img onclick="deleteItem('+i+','+quantity+')" class="responsive-img remove" src="images/Remove.svg">';
                       row +=  '</div>';
                     row  +='</div>';
                    $("#active-order-wrapper").append(row);
                    
        }
        document.getElementById('total-price').innerHTML="SR "+total_price;
        document.getElementById('tp').value=total_price;
        function deleteItem(i,quantity){
            //alert(quantity);
            var cart = JSON.parse(localStorage.getItem("cart"));
            console.log(cart.splice(i,1)); // delete item at index
            localStorage.cart = JSON.stringify(cart);
            var itemCount=localStorage.getItem('cartCount');
            itemCount=parseInt(itemCount,10);
            itemCount=(itemCount)-parseInt(quantity,10);
            localStorage.setItem('cartCount',itemCount);
            location.href="orders_list.php";
            if(localStorage.getItem("cartCount")==0)
            {
                localStorage.removeItem("branch_id");
                localStorage.removeItem("branch");
                location.href="index.php";
            }
            else
            {
                 location.href="orders_list.php";
            }
        }
        function updateItem(i){
            
        }
        function createorder()
        {
          
            var data = localStorage.getItem("cart");
           
         /*   function getType(p) {
                if (Array.isArray(p)) return 'array';
                else if (typeof p == 'string') return 'string';
                else if (p != null && typeof p == 'object') return 'object';
                else return 'other';
            }
            console.log("'s' is " + getType(data));
                     //   data=JSON.parse(data);
            console.log("'s' is " + getType(data));
            */
            
            var cart=[];
            
            for (var i=0;i < data.length;i++) {
                
                var items = data[i];
                console.log(items.product_name);
                cart["product_name"]=items.product_name;
                cart["product_price"]=items.product_price;
                cart["product_image"]=items.product_image;
                cart["note"]=items.note;
                 
            }
            console.log(cart);
            
            
            $.ajax({
            type: 'POST',
            url: 'create_order.php',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: data
            })
            .done (function(response, textStatus, jqXHR)        
            { 
                console.log(response);
                $('#list_heading').innerHTML=response;
                
            })
            .fail  (function(jqXHR, textStatus, errorThrown) 
            {  
                    console.log(jqXHR);
                    console.log(errorThrown);
                    console.log(textStatus);
                   
                    console.log(JSON.stringify(jqXHR));
                            
            })
                        
            
        }
        
        function timeRequired()
          {
              
           
             var dateTime = document.getElementById("datetime");
             dateTime=dateTime.value;
             if(dateTime=="" || dateTime==null)
             {
                 dateTime.setCustomValidity("Pickup time is required");
             }
             else
             {
                 con_pass.setCustomValidity('');
             }
             dateTime.onchange = timeRequired;
          }
          
          if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
    </script>
    <script>
    var order_t=localStorage.getItem("type");
    
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?type='+order_t;
window.history.pushState({ path: newurl }, '', newurl);

var link = document.getElementById("btn-add");
   link.setAttribute("href", "menu.php?type="+order_t+"&branch="+$.cookie("branch_id"));
  
</script>
<script>
var checkPastTime = function(inputDateTime) {
    if (typeof(inputDateTime) != "undefined" && inputDateTime !== null) {
        var current = new Date();
 
        //check past year and month
        if (inputDateTime.getFullYear() < current.getFullYear()) {
            $('#datetimepicker7').datetimepicker('reset');
            alert("Sorry! Past date time not allow.");
        } else if ((inputDateTime.getFullYear() == current.getFullYear()) && (inputDateTime.getMonth() < current.getMonth())) {
            $('#datetimepicker7').datetimepicker('reset');
            alert("Sorry! Past date time not allow.");
        }
 
        // 'this' is jquery object datetimepicker
        // check input date equal to todate date
        if (inputDateTime.getDate() == current.getDate()) {
            if (inputDateTime.getHours() < current.getHours()) {
              
                $('#datetimepicker7').datetimepicker('reset');
            }

            var minutesToAdd=20;
var currentDate = new Date();
var futureDate = new Date(currentDate.getTime() + minutesToAdd*60000);
/*
var month1 = format(futureDate .getMonth() + 1);
    var day1 = format(futureDate .getDate());
    var year1 = format(futureDate .getFullYear());
    console.log(year1 + "-" + month1 + "-" + year1);
*/
            
              var new_minutes=current.getMinutes()+20;
             
            var minimumTime=current.getHours() + ":"+ new_minutes;
            console.log(futureDate);
            this.setOptions({
                minDate: futureDate,
                minTime: futureDate,
                step:5

            });
        } else {
            this.setOptions({
                minTime: false
            });
        }
    }
};
 
var currentYear = new Date();
var min_time="<?php echo $newtimestamp; ?>";
min_time=new Date(min_time);
var hours=min_time.getHours();
var minutes=min_time.getMinutes();
minutes=minutes+20;
var newtime=hours+':'+minutes;
//alert(newtime);
$('#datetimepicker7').datetimepicker({
    format:'Y-m-d H:i',
    minDate : 0,
    yearStart : currentYear.getFullYear(), // Start value for current Year selector
    onChangeDateTime:checkPastTime,
    onShow:checkPastTime
});
  </script>
<?php include 'footer.php';?>