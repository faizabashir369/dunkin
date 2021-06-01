    <?php   
    session_start();
    
     if(isset($_COOKIE["phone"])) {
        $phone=$_COOKIE["phone"];
        $phone=str_replace("+966", "",$phone);
    }
  
    $_COOKIE["path"] = $_SERVER['REQUEST_URI'];
    
    include 'header.php';
    include 'sidebar.php';
     
   
    if(isset($_GET['branch']))
     {
         $branch_id=htmlspecialchars($_GET['branch']);
         $store=htmlspecialchars(urldecode($_GET['name']));
     }
    
    if(isset($_GET['type']))
     {
         if($_GET['type']=="delivery")
         {
             $order_type=$_GET['type'];
         }
         else
         {
             $order_type="";
         }
     }
     else
     {
        $order_type=$_COOKIE["type"];
        setcookie("type","value",time()-3600);
     }
      
?>
            
            <div id="products_menu">
                <h2>
                    <?php if($lang=="ar")
                    {
                         echo "قائمة المنتجات";
                    }
                    else
                    {
                        echo "Menu List";
                    }
                    ?>
                    
                    </h2><br>
                
                <?php
                
                if($order_type=="pickup")
                {
                    $order_type="";
                }
                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/collections/index.php?request=1&cat=$order_type&lang=$lang",
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
                          if(sizeof($data['smart_collections'])==0)
                          {
                              echo '<p class="message">No Collection found</p>';
                          }
                            
                         ?>
                        <div class="row product tabcontent flex" id="menu">
                            <?php foreach($data['smart_collections'] as $val) {?> 
                                    <div class="col s6 m6 l3 collections">
                                   
 
                                    <?php if (array_key_exists("subcollections", $val)){ ?>
                                     
                                       <img class="product-img responsive-img" onclick="document.getElementById('<?php  echo $value['id'];?>').submit()" src="<?php  echo $val['image'];?>">
                                    
                                        <form action="sub_collections.php" method="post" id="<?php  echo $value['id'];?>">
                                            <?php foreach($val['subcollections'] as $value) {?>
                                                <input type="hidden" name="image[]" value="<?php  echo $value['image'];?>">
                                                <input type="hidden" name="product_name[]" value="<?php  echo $value['title_eng'];?>">
                                                <input type="hidden" name="collection_id[]" value="<?php  echo $value['id'];?>">
                                                <input type="hidden" name="branch" value="<?php  echo $branch_id;?>">
                                                <input type="hidden" name="store" value="<?php  echo $store;?>">
                                                <input type="hidden" name="type" value="<?php  echo $order_type;?>">
                                            <?php } ?>
                                                <button type="submit" class="collecion_name"><?php  echo $val['title_eng'];?></button>
                                                </form>
                                        <?php 
                                        } 
                                        else{?>
                                        <a href="collections.php?collection_id=<?php echo $val['id']?>&branch=<?php echo $branch_id?>&name=<?php echo $name;?>">
                                       <img class="product-img responsive-img"  src="<?php  echo $val['image'];?>">
                                        </a>
                                                <form action="collections.php" method="GET">
                                                <input type="hidden" name="branch" value="<?php  echo $branch_id;?>">
                                                <input type="hidden" name="collection_id" value="<?php  echo $val['id'];?>">
                                                <input type="hidden" name="collection_name" value="<?php  echo $val['title_eng'];?>">
                                                <input type="hidden" name="store" value="<?php  echo $store;?>">
                                                <input type="hidden" name="type" value="<?php  echo $order_type;?>">
                                                <button type="submit" class="collecion_name"><?php  echo $val['title_eng'];?></button>
                                                </form>
                                        <?php } 
                                        ?>
                                    </form>
                                </div>
                                </a>
                                <?php
                                 $i++;
                                 } ?>
                                </div>
                            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>

    <script>
        $(document).ready(function(){
            var itemCount=localStorage.getItem('cartCount');
            
            var  branch=localStorage.getItem("branch_id");
                       /* alert(branch);
                        const state = { 'page_id': 1, 'user_id': 5 }
            const title = ''
            const url = 'menu.php?branch='+branch;
            
            history.pushState(state, title, url)*/
            var type=localStorage.getItem("type");
            var order_type="<?php echo $_GET['type'];?>";
            var lang=$.cookie("lang");
            var order_type="<?php echo $_GET['type']; ?>";
            
            if(itemCount>0)
            {
                if(type=="GiftCard"){
                      if(lang=="ar")
                      {
                          message="لديك طلب بطاقة دنكاوي بالسلة، سيتم حذفها في حال الاستمرار. ";
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
                else if(type=='pickup' && order_type=='delivery')
                {
                    if(lang=="ar")
                      {
                          message="سوف يتم ازالة كل المنتجات من السلة، هل تريد المتابعة؟ ";
                      
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
            console.log(type);
                                Swal.fire({
                    
                                      title: dunkin,
                                      showCloseButton: true,
                                      showConfirmButton:true,
                                      closeOnConfirm: false,
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
                                         
                                            localStorage.removeItem("cartCount")
                                            localStorage.removeItem("cart");
                                            location.reload();
                                        } 
                                        else {
                                          
                                         window.location.href="index.php";
                                       
                                        }
                                    
                                       
                                });
                                            
                                            
                                            
                                  
                   
                                    
            }
        });
        
    </script>
  <?php include 'footer.php';?>

