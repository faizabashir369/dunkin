<?php 

    $_COOKIE["url"] = $_SERVER['REQUEST_URI'];
    if($_COOKIE["customer"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
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
 //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "Qrcode/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $errorCorrectionLevel = 'H';    

    $matrixPointSize = 10;
        
                        $total_points=0;
                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/get-customer-gift-cards",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => true,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => array('shopify_customer_id' => $customer_id, 'session_key' => $_COOKIE['session_key']),
                          CURLOPT_HTTPHEADER => array(
                            "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
                            "X-localization: $lang"
                          ),
                        ));
                        
                        $response = curl_exec($curl);
                        
                        curl_close($curl);
                        $data = json_decode($response, true);
                         if($data['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
                        
                    ?>
            
                    <br>
                <h2><?php if($lang=='ar'){ echo "شحن رصيد دنكاوي";}  
                                else
                                { echo "Add Dunkawy Credit";} ?></h2>
             
             <!--   <div class="third-menu">
<a class="tablinks active" href="#" onclick="openTab(event, 'mycards')"><?php if($lang=='ar'){ echo "شحن رصيد دنكاوي";}  
                                else
                                { echo "My Dunkinha cards";} ?></a> 
                    <a href="#" class="tablinks" onclick="openTab(event, 'addcards')"> 
                    <?php if($lang=='ar'){ echo "اضافة بطاقة دنكنها ";}  
                                else
                                { echo "Add Dunkinha card";} ?></a> </a> 
                </div> 
                    <div id="mycards" class="tabcontent"> 
                    <br><br><br>
                     <div class="carousel carousel-slider" data-indicators="true">
                            <?php $total_points=0; 
                            foreach($data['data'] as $val) 
                             { 
                                 foreach($val as $card) 
                                { 
                                    $total_points=$card['active_points']; 
                                   $card_point= $card['active_points']." SAR";?>
                                    <div class="carousel-item  white-text">
                                        <!-- <img class="responsive-img" src="images/card_bg1.png"> -->
                                        <div class="container"><br>
                                            <h3><?php if($lang=='ar'){ echo "دانكن ";}  
                                else
                                { echo "DUNKIN'";} ?> </h3>
                                           <!-- <h5>Hi! <?php echo $_COOKIE['first_name'];?></h5><br>-->
                                            <h5><?php if($lang=='ar'){ echo "رقم البطاقة: ";}  
                                else
                                { echo "Card No :";} ?>  <?php echo $card['card_number'];?></h5><br>
                                            <h5><?php if($lang=='ar'){ echo "لديك ";}  
                                else
                                { echo "You have : ";} ?>  <br> <?php echo $card_point;?></h5><br>
                                        </div>  
                                    
                                    <?php 
                                        $filename = $PNG_TEMP_DIR.$card['card_number'];
                                
                                        $requestData="%".$card['card_number']."?";
                                    
                                
                                        $filename = $PNG_TEMP_DIR.'test'.md5($requestData.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                                        QRcode::png($requestData, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
                                        ?>
                                          <br><br><br><br><br><br>                                  
                                        <div class="img_web">
                                            <img src="<?php echo $PNG_WEB_DIR.basename($filename); ?>" alt="transfer" >
                                        </div>
                                        <div class="img_mobile">
                                            <img src="<?php echo $PNG_WEB_DIR.basename($filename); ?>" alt="transfer" >
                                        </div>
                        
                                         <h4 class="h_points"><?php echo $total_points; ?> SAR</h4>
                                         <div class="space-70"> 
                                      
                                         </div>
                                         </div>
                                        <?php
                                        
                                        
                                            }
                                        }
                                        
                                        ?>
                        </div>
                    

                     </div>
                
                    -->
                    <div id="addcards" class="tabcontent" style="display:block">
                    <div class="row">
                        
                        <?php

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/products/index.php?branch_id=10011&collection_id=163026010197&lang=$lang",
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

<?php foreach($data['products'] as $val) { 
    foreach($val['images'] as $img){ 
       $images=$img['src'];
    }
   if($data['success']==0)
                          {
                              echo '<p class="message">Cards not found</p>';
                          }
   
    foreach($val['variants'] as $var){ ;?>
    
                        <div class="col s12 m12 l6 card_row">
                          <div class="containers">
                            <img class="responsive-img" src="images/card_bg1.png" alt="Snow">
                            <div class="caption center-align centered">
                                  <h3><?php if($lang=='ar'){ echo "دانكن ";}  
                                else
                                { echo "DUNKIN'";} ?></h3>
                                  <h5><?php if($lang=='ar'){ echo "مرحبا ";}  
                                else
                                { echo "Hi!";} ?> <?php echo $_COOKIE['first_name'];?></h5><br>
                                  
                                  <h5>SR <?php echo $var['price'];?></h5><br>
                                  <form action="orders_list.php?giftCard=1" method="post" id="<?php echo $var['v_id'];?>">
                                      <input type="hidden" id="price" name="price" value="<?php echo $var['price'];?>" >
                                      <input type="hidden" id="product_id" name="pid" value="<?php echo $var['product_id'];?>" >
                                      <input type="hidden" id="variant_id" name="vid" value="<?php echo $var['v_id'];?>" >
                                      <input type="hidden" id="name" name="name" value="<?php echo $val['title_eng'];?>" >
                                      <input type="hidden" id="image" name="image" value="<?php echo $images;?>" >
                                      <input type="hidden" id="title" name="title" value="<?php echo $var['title'];?>" >
                                  <button  class="card_btn" type="submit"><?php if($lang=='ar'){ echo "شراء البطاقة ";}  
                                else
                                { echo "Buy Card";} ?></button>
                                  </form>
                            </div>
                        
                        </div> <!-- end container -->
                        </div> <!-- endcardrow -->
                        
 <?php }}?> 
<br><br>
 <div class="space-70">
                  
                    </div>
                      
                      
        </div>
        </div>
                    
                        
                    
            
             
     <script>
     function openTab(evt, tabName) {
         //alert(tabName);
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
    
    $('.carousel').carousel({ 
        full_width: true,
        indicators:true,
        autoplay:false,
        numVisible:1,
        height : 177, // default - height : 400
        interval: 4000, // default - interval: 6000
        onCycleTo: function(data) {
     
      var slide_index=$(data).index(); // the slide's index
     
       }
        })
    


    $('select').formSelect();
    function buyCards()
    {
        
        var storage = JSON.parse(localStorage.getItem("cart"));
              if(storage==null){
                storage = [];
              }
        
            var item_name = document.getElementById('name').value;
            var item_quantity = 1;
            var price = document.getElementById('price').value;
            var product_id = document.getElementById('product_id').value;
            var variant_id = document.getElementById('variant_id').value;
            var images = document.getElementById('image').value;
            var title = document.getElementById('title').value;
    
              // Create an object to store.
            var data = {product_name:item_name,quantity:item_quantity,product_price:price,variant_title:title,note:"",product_image:images,product_id:product_id,product_category:"Gift Cards",product_variant_id:variant_id};
            storage.push(data);
            
              // Store it.
            
            
            storage = JSON.parse(localStorage.getItem("cart"));
            var cart=parseInt(document.getElementById('cart').innerHTML);
            cart=cart+1;
            
            var itemCount=localStorage.getItem('cartCount');
            if(itemCount>0)
            {
                                Swal.fire({
                    
                                      title: "Dunkin KSA",
                                      showCloseButton: true,
                                      showConfirmButton:true,
                                      html:
                                      '<p class="trans-rejected">You already have orders in the cart. Do you want to delete orders?</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                        }).then(function() {
                                            //alert(localStorage.getItem("cartCount"));
                                            localStorage.removeItem("cartCount")
                                            
                                            localStorage.removeItem("cart");
                                            var cnt=document.getElementById('cart').innerHTML=cart;
                                            
                                           // alert(localStorage.getsetItem("cart",JSON.stringify(storage)));
                                            console.log(storage);
                                            
                                            
                                            $('form').submit();
                                            window.location.href="order_summary.php?gift_cards=1";
                                    })
                                    
                                    
            }
        
    }
    $('form').on('submit', function (e) {
       e.preventDefault();
   //   alert(this.id);
      var form_id=this.id;
            var type=localStorage.getItem("type");
            var lang=$.cookie("lang");
            if(lang=='ar')
                {
                    var ok="موافق";
                    var dunkin="دانكن";
                 //  var message="يوجد لديك بالسلة طلب استلام من فرع، سيتم حذفه في حال الاستمرار. ";
                 }
                else
                {
                    var ok="OK";
                    var dunkin="Dunkin";
                   // var message="You already have gift card in the cart. Selecting branch will remove it from cart. ";
                }
            var itemCount=localStorage.getItem('cartCount');
            if(itemCount>0)
            {
              if(type=='GiftCard')
              {
                if(lang=='ar')
                {
                    var ok="موافق";
                    var dunkin="دانكن";
                   var message="سوف يتم ازالة كل المنتجات من السلة، هل تريد المتابعة؟";
                 }
                else
                {
                    var ok="OK";
                    var dunkin="Dunkin";
                    var message="You already have gift card in the cart. Do you want to delete it ? ";
                }
              }
              else if(type=='pickup')
              {
                if(lang=='ar')
                {
                  var message="سوف يتم ازالة كل المنتجات من السلة، هل تريد المتابعة؟";
                }
                else
                {
                    var message='You have pickup order in the cart. Selecting card will remove it from cart.';
             
                }

              }
              else if(type=='delivery')
              {
                if(lang=='ar')
                {
                  var message="سوف يتم ازالة كل المنتجات من السلة، هل تريد المتابعة؟";
                }
                else
                {
                    var message="You have delivery order in the cart. Selecting card will remove it from cart.";
             
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
                                              localStorage.removeItem("milkOption");
                                              
                                              document.getElementById(form_id).submit(); 
                                        } 
                                        else {
                                        // handle cancel
                                        }
                                    })

            }
            else
            {
             document.getElementById(form_id).submit();
            }
    })
    </script>
