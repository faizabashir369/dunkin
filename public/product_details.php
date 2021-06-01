<?php 

if(isset($_COOKIE['lang']))
{
    $lang=$_COOKIE['lang'];
}
else
{
    $_COOKIE['lang']="en";
    $lang="en";
}

//print_r($_POST['title']);
        $pr= array();
        $pr=$_POST['price'];
       // print_r($_POST);
        $calorie=$_POST['calories'];
       // print_r($calorie);
        include 'header.php';?>
        <?php include 'sidebar.php';?>
            <div class="product_details">
                <input type="hidden" class="price" id="price" value="<?php echo number_format($pr[0], 1);?>">
                <input type="hidden" class="cupsize" id="cupsize" value="">
                <input type="hidden" class="cupsize" id="variant_title" value="<?php echo $_POST['title'][0]; ?>">
                <input type="hidden" class="milk" id="milk" value="">
                <div class="row product-row">
                    <div class="col s12 m12 l12 center-align">
                        <?php 
                        if(isset($_POST["image"]))
                        {
                            $image=$_POST["image"];?>
                            <img class="product_image" src="<?php echo $image; ?>" >
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col s12 m12 l12">
                        <?php 
                            if(isset($_POST["product_name"])){
                        ?>
                    <p class="product_name" id="product_name"><?php echo htmlspecialchars($_POST["product_name"]);?></p>
                    <?php } ?>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="row" style="margin:0px !important">
                            <div class="col s12 m12 l12 no-padding">
                                <p class="product_name" style="margin-left:0">
                            <?php 
                                if($lang=='ar'){
                                  echo 'الكمية';
                                }
                                else
                                {
                                    echo 'Quantity';
                                }
                            ?>
                            </p>
                            </div>
                            <div class="col s12 m12 l12">
                                <p class="quantity-selector" style="padding-left:10px"><span>
                                    <img class="minus" onclick="decrementValue()" src="images/minus.png"></span>
                                    <span class="quantity" id="quantity">1</span>
                                    <span><img class="plus" onclick="incrementValue()" src="images/Union.png"></span></p>
                            </div>
                        </div>
                    </div>
                        <?php $options=$_POST["optns"];
                      // print_r($options);
                        $opt_name=array();
                        
                        $opt_name=$_POST["optns_name"];
                       // print_r($opt_name);
                        
                         array_map(function($name, $value){ ?> 
                    <div class="col s12 m12 l12">
                        <p class="product_name"><?php  if(($name=="بحجم"||$name=="Size") && $_COOKIE['lang']=='en') { echo "Cup Size";}
                        else if(($name=="بحجم"||$name=="Size")&& $_COOKIE['lang']=="ar"){ echo "حجم";}else if($name=="Milk"  && $_COOKIE['lang']=='en'){ echo "Milk Option";} else if($name=="Milk"  && $_COOKIE['lang']=='ar'){ echo "اختيار الحليب";} ?> </p>
                        
                            <div class="row  product-size">
                                <?php  
                                $opt_value=explode(",",$value);?>
                                
                                <div class="col s12 m12 l12 left-align">
                                    <div id="myDIV">
                                        <?php $c=0; foreach($opt_value as $op){
                                            
                                       
                                        ?>
                                            <?php if($name=="Milk"){
                                            
                                       if($_COOKIE['lang']=="ar")
                                        {
                                           
                                            if($op=="Full Fat")
                                            {
                                                $opts="حليب كامل الدسم";
                                            }
                                            else if($op=="Low Fat")
                                            {
                                                $opts="حليب قليل الدسم";
                                            }
                                            else if($op=="No Milk")
                                            {
                                                $opts="بدون حليب";
                                            }
                                            
                                        }
                                        else
                                        {
                                            if($op=="Full Fat")
                                            {
                                                $opts="Full Fat";
                                            }
                                            else if($op=="Low Fat")
                                            {
                                                $opts="Low Fat";
                                            }
                                            else if($op=="No Milk")
                                            {
                                                $opts="No Milk";
                                            }
                                        }
                                            
                                            
                                            ?>
                                                <button type="button" class="flavor <?php if($c==0){ echo "active";} ?> milk" id="<?php echo str_replace(" ","-",$op);?>" value="<?php echo $op;?>"><?php echo $opts;?></button>
                                             <?php $c++;} }?>
                                    </div>
                                </div> 
                                
                                <?php 
                                
                                 $count=count($opt_value);
                                foreach($opt_value as $op){
                                     if($name=="بحجم" || $name=="Size") { 

                                         if($op=="S"){
                                ?>
                                
                                <div class="col s3 m2 l2 center-align size <?php if($opt_value[0]=='S'){ echo 'active selected';}?>" id="S">
                                    
                                    <img src="images/Small.png">
                                    <p class="cs">
                                    <?php if($_COOKIE['lang']=="ar")
                                    {
                                        echo "صغير";
                                    }
                                    else
                                        {
                                           echo "S"; 
                                        }?>
                                        </p>
                                    
                                    
                                </div>
                                <?php } 
                                 if($op=="M"){
                                
                                ?>
                                <div class="col s3  m2 l2 center-align size <?php if($opt_value[0]=='M'){ echo 'active selected';}?>" id="M">
                                    <img  src="images/Medium.png">
                                     <p class="cs">
                                    <?php if($_COOKIE['lang']=="ar")
                                    {
                                        echo "وسط";
                                    }
                                    else
                                        {
                                           echo "M"; 
                                        }?></p>
                                </div>
                                <?php } 
                                 if($op=="L"){
                                
                                ?>
                     <div class="col s3  m2 l2 center-align size large <?php if($opt_value[0]=='L'){ echo 'active selected';}?>" id="L">
                                    <img class=""  src="images/LARGE.png">
                                     <p class="cs"><?php if($_COOKIE['lang']=="ar")
                                    {
                                        echo "كبير";
                                    }
                                    else
                                        {
                                           echo "L"; 
                                        }?></p>
                                </div>
                                <?php } 
                                 if($op=="XL"){
                                
                                ?>
                                <div class="col s3  m2 l2 center-align size <?php if($opt_value[0]=='XL'){ echo 'active selected';}?>" id="XL">
                                    <img src="images/X-LARGE.png">
                                     <p class="cs"><?php if($_COOKIE['lang']=="ar")
                                    {
                                        echo "كبير جدا";
                                    }
                                    else
                                        {
                                           echo "XL"; 
                                        }?></p>
                                </div>
                                <?php
                                }
                                
                                 if($op=="Single"){?>
                            
                                <p class="left-align">
                                  <label for="<?php echo $op;?>">
                                    <input class="with-gap" type="radio"  name="option" value="<?php echo $op;?>" id="<?php echo $op;?>"/>
                                    <span><?php echo $op;?></span>
                                  </label>
                                </p>
                                <?php }
                                
                                 if($op=="Double"){?>
                            
                                <p class="left-align">
                                  <label for="<?php echo $op;?>">
                                    <input class="with-gap" type="radio"  name="option" value="<?php echo $op;?>" id="<?php echo $op;?>"/>
                                    <span><?php echo $op;?></span>
                                  </label>
                                </p>
                                
                        
                                <?php } }  }?>
                            </div>
                        
                        </div>
                        <?php }, $opt_name, $options /* , Add more arrays if needed manually */);?>
                        <div id="message"></div>
                        <div class="col s12 m12 l12">
                            <p class="product_name">
                               <?php  
                               if($lang=='ar') 
                                   { echo "ملاحظة";}
                               else{ echo "Notes";}
                               ?>
                            </p>
                            <div class = "row center-align" >
                               <div class = "col s12">
                                  <textarea id = "notes" class = "materialize-textarea" placeholder="<?php  
                               if($lang=='ar') 
                                   { echo "";}
                               else{ echo "Add your notes";}
                               ?>"></textarea>
                               </textarea>
                                  
                               </div>
                            </div>
                        </div>
                        <div class="col s12 m12 l12">
                            <p class="product_name"><?php  
                               if($lang=='ar') 
                                   { echo "وصف المنتج";}
                               else{ echo "Overview";}
                               ?></p>
                            <p class="overview left-align"><?php echo htmlspecialchars($_POST['description']);?></p>
                            <span class="calories" id="calories"><?php  if($lang=='ar') 
                                   { echo "السعرات الحرارية";}
                               else{ echo "Calories : ";}
                               echo $calorie[0];?></span><br>
                        <br>
                        </div>
                        <div class="col s12 m12 l12 center-align">
                            <button class="order_price" onclick="addToCart()">
                              
                               <?php  
                               if($lang=='ar') 
                                   { echo "اضافة المنتج";}
                               else{ echo "Add to order";}
                               ?>
                               <?php echo number_format($pr[0], 1);?>
                               <?php  
                               if($lang=='ar') 
                                   { echo "ريال";}
                               else{ echo "SR";}
                               ?>
                            </button>
                        </div>
                        <div class="col s12 m12 l12 center-align">
                            <a href="orders_list.php"><button class="go_to_cart">
                                <?php  
                               if($lang=='ar') 
                                   { echo "الذهاب الى السلة";}
                               else{ echo "Go to the cart";}
                               ?>
                               </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m4 l1">
            </div>
            </div>
       </div>
    </div>
     

    <script>
    $(document).ready(function(){
        var header = document.getElementById("myDIV");
        
        $("#Double").click(function(){
            document.getElementById("calories").innerHTML="<?php  if($lang=='ar') 
                                   { echo "السعرات الحرارية";}
                               else{ echo "Calories : ";} ?>"+"<?php echo $calorie[1];?>";
            v_price="<?php echo $pr[1];?>";
            document.getElementById('price').value=v_price;
            
            var values = parseInt(document.getElementById('quantity').innerHTML,10);
           // $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order"); 
           var lang="<?php echo $lang; ?>";
           if(lang=='ar')
            {
                 $('.order_price').text(
                           " اضافة المنتج"
                            + parseFloat(values*v_price).toFixed(1) + 
                            " ريال"
                            );
            }
            else
            {
                $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order");
            }
        });
        $("#Single").click(function(){
            document.getElementById("calories").innerHTML="<?php  if($lang=='ar') 
                                   { echo "السعرات الحرارية";}
                               else{ echo "Calories : ";}?>"+"<?php echo $calorie[0];?>";
            v_price="<?php echo $pr[0];?>";
            console.log("single");
            document.getElementById('price').value=v_price;
            
            var values = parseInt(document.getElementById('quantity').innerHTML,10);
            var lang="<?php echo $lang; ?>";
            if(lang=='ar')
            {
                
                 $('.order_price').text(
                           " اضافة المنتج"
                            + parseFloat(values*v_price).toFixed(1) + 
                            " ريال"
                            );
            }
            else
            {
                $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order");
            }
           // $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order");  
        });

         //$('#change-image').attr('src','/yellow.jpg');
        $(".size").click(function(){
            
            var size = $(this).attr("id");
               
            $(this).addClass("active selected");
            $(".size").not(this).removeClass("active selected");
            $(this).src='pic_bulbon.gif';
          //  $(this).addClass("selected");
          //  $(".size").not(this).removeClass("selected");
        


            var element=document.getElementsByClassName("size active");
            if(element.length>0 && element != null)
            {
                var size=document.getElementsByClassName("size active")[0].id;
            }
            
            var vids=new Array();
            var opt1=new Array();
            var opt2=new Array();
            var price=new Array();
            
            if(typeof($(".flavor.active" ).val()) != 'undefined' && $(".flavor.active" ).val() != null)
            {
                var milkopt=$(".flavor.active" ).val();
            }
            else
            {
                milkopt="";
            }
            
            price=<?php echo json_encode($_POST['price']);?>;
            vids= <?php echo json_encode($_POST['vid']);?>;
            opt1=<?php echo json_encode($_POST['option1']); ?>;
            opt2=<?php echo json_encode($_POST['option2']); ?> ;
            calorie=<?php echo json_encode($_POST['calories']); ?> ;
        
            var variant_id=0;
            var v_price=0;
            var id=0;
            var calories=0;
            for(i=0;i<vids.length;i++){
                if((milkopt==opt2[i])&&(size==opt1[i]))
                    {
                         variant_id=vids[i];
                         v_price=price[i];
                          calories=calorie[i];

                    }
            }
            if(v_price==0)
            {
                document.getElementById("message").innerHTML="Variant not available";
                $('.order_price').removeAttr('onclick');
            }
            else
            {
                $('.order_price').attr('onclick','addToCart()');
                document.getElementById("message").innerHTML="";
            }
            document.getElementById('price').value=v_price;
            document.getElementById('calories').innerHTML="<?php  if($lang=='ar') 
                                   { echo "السعرات الحرارية";}
                               else{ echo "Calories : ";}?>"+calories;
            
            
            var values = parseInt(document.getElementById('quantity').innerHTML,10);
            var lang="<?php echo $lang; ?>";
            if(lang=='ar')
            {
                
                 $('.order_price').text(
                           " اضافة المنتج"
                            + parseFloat(values*v_price).toFixed(1) + 
                            " ريال"
                            );
            }
            else
            {
                $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order");
            }
           
            document.getElementById('variant_title').value=size+"/"+milkopt;
            
                      
        });
            $(".flavor").click(function(){
            
                $(this).addClass("active");
                $(".flavor").not(this).removeClass("active");
                
                var element=document.getElementsByClassName("size active");
                if(element.length>0 && element != null)
                {
                var size=document.getElementsByClassName("size active")[0].id;
                }
                if(typeof($(".flavor.active" ).val()) != 'undefined' && $(".flavor.active" ).val() != null)
                {
                    var milkopt=$(".flavor.active" ).val();
                
                }
                
                var vids=new Array();
                var opt1=new Array();
                var opt2=new Array();
                var price=new Array();
                
                price=<?php echo json_encode($_POST['price']);?>;
                vids= <?php echo json_encode($_POST['vid']);?>;
                opt1=<?php echo json_encode($_POST['option1']);?>;
                opt2=<?php echo json_encode($_POST['option2']);?> ;
                calorie=<?php echo json_encode($_POST['calories']); ?> ;
            
                var variant_id=0;
                var v_price=0;
                var id=0;
                
                for(i=0;i<vids.length;i++){
                   /* 
                     alert(milkopt);
                     alert(opt2[i]);
                     
                     alert(opt1[i]);
                     alert(size);
                     
                     alert(price[i]);*/
                     
                    if((milkopt==opt2[i])&&(size==opt1[i]))
                        {
                             variant_id=vids[i];
                             v_price=price[i];
                             
                            calories=calorie[i];
    
                        }
                }
                
                document.getElementById('price').value=v_price;
                document.getElementById('calories').innerHTML="<?php  if($lang=='ar') 
                                   { echo "السعرات الحرارية";}
                               else{ echo "Calories : ";}?> "+calories;
                 if(v_price==0)
                {
                    document.getElementById("message").innerHTML="Variant not available";
                    $('.order_price').removeAttr('onclick');
                }
                else
                {
                    $('.order_price').attr('onclick','addToCart()');
                    document.getElementById("message").innerHTML="";
                }
                var values = parseInt(document.getElementById('quantity').innerHTML,10);
             //   $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order");
                
                var lang="<?php echo $lang; ?>";
            if(lang=='ar')
            {
                
                 $('.order_price').text(
                           " اضافة المنتج"
                            + parseFloat(values*v_price).toFixed(1) + 
                            " ريال"
                            );
            }
            else
            {
                $('.order_price').text("SR "+parseFloat(values*v_price).toFixed(1)+ " Add to order");
            }
            document.getElementById('variant_title').value=size+"/"+milkopt;
        });
        });
    
        function incrementValue()
            {
                var values = parseInt(document.getElementById('quantity').innerHTML,10);
                document.getElementById('quantity').innerHTML
                var price=parseInt(document.getElementById('price').value,10);
                
                
                values++;
                document.getElementById('quantity').innerHTML=values;
                if(isNaN(price))
                {
                    
                }
                else
                {
                    var lang="<?php echo $lang; ?>";
                    if(lang=='ar')
                    {
                        
                        $('.order_price').text(
                           " اضافة المنتج"
                            + parseFloat(values*price).toFixed(1) + 
                            " ريال"
                            );
                    }
                    else
                    {
                        $('.order_price').text("SR "+parseFloat(values*price).toFixed(1)+ " Add to order");
                    }
                    //$('.order_price').text("SR "+parseFloat(values*price).toFixed(1)+" Add to order");
                    
                }
                
                
            }
        function decrementValue()
            {
               var values = parseInt(document.getElementById('quantity').innerHTML,10);
               var price=parseInt(document.getElementById('price').value,10);
                if(values>1)
                {
                values--;
                }
                document.getElementById('quantity').innerHTML=values;
                var lang="<?php echo $lang; ?>";
            if(lang=='ar')
            {
                 $('.order_price').text(
                           " اضافة المنتج"
                            + parseFloat(values*price).toFixed(1) + 
                            " ريال"
                            );
            }
            else
            {
                $('.order_price').text("SR "+parseFloat(values*price).toFixed(1)+ " Add to order");
            }
               // $('.order_price').text("SR "+parseFloat(values*price).toFixed(1)+ " Add to order");
                
                
            }
       
    
        function addToCart()
        {
            
            var cart=parseInt(document.getElementById('cart').innerHTML);
            var quantity=parseInt(document.getElementById('quantity').innerHTML);
            var notes=document.getElementById('notes').value;
            
            var images = $('.product_image').attr('src');
            var product_id="<?php echo htmlspecialchars($_POST['product_id']); ?>";
            
            var collection_name="<?php echo htmlspecialchars($_POST['collection_name']); ?>";
            
            var element=document.getElementsByClassName("size active");
            if(element.length>0 && element != null)
            {
               var size=document.getElementsByClassName("size active")[0].id;
             //  alert(size);
            }
            else
            {
                size="Default Title";
            }
            if(typeof($(".flavor.active" ).val()) != 'undefined' && $(".flavor.active" ).val() != null)
            {
                var milkopt=$(".flavor.active" ).val();
            }
            else
            {
                var milkopt="";
            }
            
            var vids=new Array();
            var opt1=new Array();
            var opt2=new Array();
            
            vids= <?php echo json_encode($_POST['vid']);?>;
            opt1=<?php echo json_encode($_POST['option1']); ?>;
            opt2=<?php echo json_encode($_POST['option2']); ?> ;
        
            console.log(vids.length);
            var variant_id=0;
            
            for(i=0;i<vids.length;i++)
            {
                console.log(milkopt);
               // console.log(opt2[i]);
                console.log(size);
               // console.log(opt1[i]);
                console.log(vids[i]);
                if((milkopt==opt2[i] || milkopt=="")&&(size==opt1[i] || size=="Default Title"))
                {
                     variant_id=vids[i];
                     console.log("variant_id"+variant_id);
                }
            }
            
            console.log(milkopt);
            cart=cart+quantity;
            document.getElementById('cart').innerHTML=cart;
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            localStorage.setItem('cartCount',document.getElementById('cart').innerHTML);
            //alert("<?php echo $_POST['store'];?>");
            <?php if(isset($_POST['store']))
            if($_POST['store']!=""){
            {?>
            console.log("<?php echo htmlspecialchars($_POST['store']);?>");
            localStorage.setItem('branch',"<?php echo htmlspecialchars($_POST['store']);?>");
            <?php } } ?>
         //   $.cookie('branch_id',"<?php echo htmlspecialchars($_POST['branch_id']);?>");
         //   localStorage.setItem('branch_id',"<?php echo htmlspecialchars($_POST['branch_id']);?>");
            var order_t="<?php echo htmlspecialchars($_POST['type']);?>";
            
            if(order_t=="delivery")
            {
                localStorage.removeItem("branch");
                localStorage.removeItem("branch_id");
            }
            localStorage.setItem('type',"<?php echo htmlspecialchars($_POST['type']);?>");
            $.cookie('type',"<?php echo htmlspecialchars($_POST['type']);?>");
            $.cookie('store',"<?php echo htmlspecialchars($_POST['store']);?>");
           
            var item_name = document.getElementById('product_name').innerHTML;
              
            var item_quantity = document.getElementById('quantity').innerHTML;
              
            var price = document.getElementById('price').value;
            if(price==0)
            {
                document.getElementById("message").innerHTML="Variant not available";
                $('.order_price').removeAttr('onclick');
            }
            else
            {
                $('.order_price').attr('onclick','addToCart()');
                // check if item is already added in cart
                var storage = JSON.parse(localStorage.getItem("cart"));
                if(storage==null){
                    storage = [];
                }
                
                if(storage.length>0)
                {
                    var total_price=0;
                    for (var i in storage) {
                        
                        var  items = storage[i];
                       //alert(items.product_name);
                       // alert(product_name);
                        var  name = items.product_name ;
                        //var  i_price = items.product_price;
                        var  vid = items.product_variant_id;
                        var  not = items.note;
                        var quantity=items.quantity;
                    } // end for
                        if(name==item_name && vid==variant_id && notes==not)
                        {
                            
                            var per_price = (storage[i].product_price);//(storage[i].quantity);
                            
                            var quant=parseInt(storage[i].quantity,10);
                            quant=quant+parseInt(item_quantity,10);
                            storage[i].quantity = quant;
                            //storage[i].product_price = per_price*quant;
                            window.localStorage.setItem('cart', JSON.stringify(storage));
                            var itemCount=localStorage.getItem('cartCount');
                            itemCount=parseInt(itemCount,10);
                           // alert(itemCount);
                           // itemCount=(itemCount)+1;
                           // alert(itemCount);
                            localStorage.setItem('cartCount',itemCount);
                            document.getElementById('cart').innerHTML=itemCount;
                            window.navigator.vibrate(300);
                            
                            return false;
                        }
                        else
                        {
                            
                        }
                    } // end if length
                
                        document.getElementById("message").innerHTML="";
                        price=price;
                        variant_title=document.getElementById("variant_title").value;
                        // Create an object to store.
                        
                        var data = {product_name:item_name,quantity:item_quantity,product_price:price,variant_title:variant_title,note:notes,product_image:images,product_id:product_id,product_category:collection_name,product_variant_id:variant_id};
                        storage.push(data);
                            
                        // Store it.
                        localStorage.setItem("cart",JSON.stringify(storage));
                            
                        storage = JSON.parse(localStorage.getItem("cart"));
                        console.log(storage);
                        window.navigator.vibrate(300);
                        var storages = JSON.parse(localStorage.getItem("milkOption"));
                if(storages==null){
                    storages = [];
                }
              //  alert("milkopt "+milkopt);
                 var data = {milkopt:milkopt};
                        storages.push(data);
                            
                        // Store it.
                        localStorage.setItem("milkOption",JSON.stringify(storages));
                            
            
            }
        }
       // var type=localStorage.getItem("type");
       // window.location.search = '?'+type+'=1';        
                
    </script>
    
<?php include 'footer.php';?>