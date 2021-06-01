<?php
    $variant_title=$_POST['variant_title'];
    $title=$_POST['title'];
    $order_id=$_POST['order_id'];
    $product_id=$_POST['product_id'];
    $product_variant_id=$_POST['product_variant_id'];
    $product_name=$_POST['product_name'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_quanitity=$_POST['product_quanitity'];
    $note=$_POST['note'];
    $product_image=$_POST['product_image'];
    $product_description=$_POST['product_description'];
    $total=0;
    if(isset($_COOKIE["customer_id"]))
    {
        //echo $_SESSION["customer_id"];
    }
    else
    {
         header("Location:login.php");
    }
    include 'header.php';?>
    
    <?php include 'sidebar.php';?>

                <div id="orders" class="fav-orders fav_details">
                    
                <h2><?php echo $title; ?></h2>
                 <form action="branches_list.php?reorder=1" method="post" id="reorder_form" class="center-align">
                <?php $count=1;array_map(function($variant, $order,$p_id,$variant_id,$name,$category,$price,$quantity,$not,$image,$description){ 
                 $var = preg_split("#/#", $variant);
                ?> 
                    
                    <div class="row valign-wrapper fav">
                        <div class="col s2 m2 l2">
                          <img class="responsive-img" src="<?php echo $image;?>">
                        </div>
                        <div class="col s7 m7 l7">
                            <div class="item-name">
                            <p><?php echo $name;?>
                          <?php if($var[0]=="S" || $var[0]=="M" || $var[0]=="L" || $var[0]=="XL" || $var[0]=="S " || $var[0]=="M " || $var[0]=="L " || $var[0]=="XL "){?>
                          <span class="item-size"><?php echo $var[0];?></span><br>
                          <?php } ?>
                        </p>
                        </div>
                        <?php $c= count($var);if($c==2){
                        if($_COOKIE["lang"]=="ar")
                        {
                            
                            if($var[1]==" No Milk" || $var[1]=="No Milk")
                            {
                                $var[1]="بدون حليب";
                            }
                            else if($var[1]==" Full Fat" || $var[1]=="Full Fat")
                            {
                                
                                $var[1]="حليب كامل الدسم";
                            }
                            if($var[1]==" Low Fat" || $var[1]=="Low Fat")
                            {
                                
                                
                               $var[1]= "حليب قليل الدسم";
                            }
                        } ?>
                        
                          <button class="flavor"><?php echo $var[1];?></button>
                        <?php } ?>
                        <?php if($not!=""){?>
                              <button class="sugar"><?php echo $not; ?></button>
                        <?php } ?>
                        </div>
                        
                        <div class="col s1 m1 l1">
                            <span class="item-qua"><?php echo $quantity;?></span>
                        </div>
                        <div class="col s2 m2 l2">
                          <p class="item-price">SR <?php echo number_format((float)$price*$quantity, 2, '.', '');?></p>
                        </div>
                        
                    </div>
                    
                 
                                        
                                                <input type="hidden" name="variant_title[]" value="<?php  echo $variant;?>" >
                                                <input type="hidden" name="variant_milk[]" value="<?php echo $var[1];?>">
                                        
                                                <input type="hidden" name="order_id[]" value="<?php  echo $order;?>">
                                                <input type="hidden" name="product_id[]" value="<?php  echo $p_id;?>">
                                                <input type="hidden" name="product_variant_id[]" value="<?php  echo $variant_id;?>">
                                                <input type="hidden" name="product_name[]" value="<?php  echo $name;?>">
                                                <input type="hidden" name="product_category[]" value="<?php  echo $category;?>">
                                                <input type="hidden" name="product_price[]" value="<?php  echo $price;?>">
                                                <input type="hidden" name="product_quantity[]" value="<?php  echo $quantity;?>">
                                                <input type="hidden" name="note[]" value="<?php  echo $not;?>">
                                                <input type="hidden" name="product_image[]" value="<?php  echo $image;?>">
                                                <input type="hidden" name="product_description[]" value="<?php  echo $description;?>">
                                        
                          
                 <?php $count++; }, $variant_title, $order_id,$product_id,$product_variant_id,$product_name,$product_category,$product_price,$product_quanitity,$note,$product_image,$product_description  /* , Add more arrays if needed manually */);?>
                 <div class="row valign-wrapper fav last_row">
                        <div class="col offset-s6">
                            
                           <?php $total=0;
                           foreach( $product_price as $index => $pr ) { 
                                 $total=$total+($pr*$product_quanitity[$index]); 
                            } ?>
                            <p class="left-align item-price"><?php if($lang=='ar'){ echo "الاجمالي : ";}  
                                else
                                { echo 'Total : SR ';}  ?><?php echo number_format((float)$total, 2, '.', '');?></p><br><br>
                        </div>
                 </div>
                 <button class="submit register reorder" type="submit"><?php if($lang=='ar'){ echo "اعادة الطلب";}  
                                else
                                { echo 'Reorder';}  ?></button>
                    </form> 
                
                 <!--
                    <div class="row valign-wrapper fav">
                        <div class="col s2 m2 l2">
                            
                          <img class="responsive-img img-circle" src="images/image.svg">
                        </div>
                        <div class="col s7 m7 l7">
                        <p>
                          <span class="fav-item-no">Item 1</span>
                          <span class="item-size">L</span><br>
                        </p>
                        <div class="item-name">
                            <p>Cappuccino</p>
                        </div>
                          <button class="flavor">Milk low fat</button>
                          <button class="sugar">zero sugar</button>
                        </div>
                        <div class="col s1 m1 l1">
                            <span class="item-qua">4</span>
                        </div>
                        <div class="col s2 m2 l2">
                          <p class="item-price">$20.00</p>
                        </div>
                    </div>
                    
                    
                    <div class="row valign-wrapper fav">
                        <div class="col s2 m2 l2">
                            
                          <img class="responsive-img img-circle" src="images/image.svg">
                        </div>
                        <div class="col s7 m7 l7">
                        <p>
                          <span class="fav-item-no">Item 1</span>
                          <span class="item-size">L</span><br>
                        </p>
                        <div class="item-name">
                            <p>Cappuccino</p>
                        </div>
                          <button class="flavor">Milk low fat</button>
                          <button class="sugar">zero sugar</button>
                        </div>
                        <div class="col s1 m1 l1">
                            <span class="item-qua">4</span>
                        </div>
                        <div class="col s2 m2 l2">
                          <p class="item-price">$20.00</p>
                        </div>
                    </div>
                    
                    <div class="row active_orders">
                        <div class="col offset-l7 s6 m6 l5 right">
                            <span class="total">Total : </span><span class="total-price">$112.00</span>
                        </div>
                    </div>
                    
                     <div class="row active_orders center-align">  
                        <button class="full_width pink-clr cart-btn center-align">Add to Cart</button>
                    </div>
                    
                    
                    
                        
                    
                    
                    -->

                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
        $('form').on('submit', function (e) {
           
            e.preventDefault();
            var lang=$.cookie("lang");
            var car_count=localStorage.getItem("cartCount");
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
                                            document.getElementById("reorder_form").submit();
                                        }
                                    });
                      }
                      else
                      {
                          
                            document.getElementById("reorder_form").submit();
                      }
            
        });
    </script>
<?php include 'footer.php';?>