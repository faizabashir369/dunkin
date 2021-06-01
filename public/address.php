<?php 
 session_start();
  $count=0;
    $_COOKIE["url"] = $_COOKIE['REQUEST_URI'];
    if(isset($_COOKIE["customer_id"]))
    {
        //echo $_SESSION["customer_id"];
    }
    else
    {
         header("Location:login.php");
    }
    $customer_id=$_COOKIE["customer_id"];
    if(isset($_GET["select"]))
    {
        if($_GET["select"]==1)
        {
             $select=$_GET["select"];
        }
    }
    include 'header.php';
    
    include 'sidebar.php';?>


                <div id="orders" class="list-orders center-align branch_address">
                    <img class="responsive-img map_img" src="images/map.svg" alt="map">
                    <h2><?php if($lang=='ar'){ echo "عناويني";}  
                                else
                                { echo 'Addresses';}  ?>
                    </h2>
                    
                                      <?php

                                    $curl = curl_init();
                                    
                                    curl_setopt_array($curl, array(
                                      CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/get-shopify-customer-addresses",
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
                          $i=0;
                          if(sizeof($data['data'])==0)
                          {
                              echo '<p class="message">No address Found</p>';
                          }
                         $data= json_decode($response,true);
        if($data['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        
                          
                            foreach($data['data'] as $add) { 
                                
                                foreach($add as $addr) { 
                                    $counter=count($add);echo '<br>';
                                    $count++;
                                
                        ?>
                        <div class="rp">
                            <?php
                            
                            
                            $arabic_array=array(
                                 "ابها"
                , "ابو عريش"
                , "الدمام"
                , "الدلم"
                , "الدرعية"
                , "الدوادمي"
                , "الظهران"
                , "عفيف"
                , "احد المسارحة"
                , "احد رفيده"
                , "الاحساء"
                , "البدائع"
                , "الباحة"
                , "البكيرية"
                , "الغاط"
                , "الحريق"
                , "الهفوف"
                , "الجبيل"
                , "الجموم"
                , "الخفجي"
                , "الخرج"
                , "الخبر"
                , "الخرمة"
                , "المدينة المنورة"
                , "المجاردة"
                , "المجمعة"
                , "المذنب"
                , "المبرز"
                , "المزاحمية"
                , "القطيف"
                , "القنفذة"
                , "القريات"
                , "العلا"
                , "الوجه"
                , "النعيرية"
                , "الرس"
                , "عرعر"
                , "السليل"
                , "الشنان"
                , "الطائف"
                , "الزلفي"
                , "بدر"
                , "بللسمر"
                , "بيشة"
                , "بقيق"
                , "بريدة"
                , "دومة الجندل"
                , "ضبا"
                , "ضرما"
                , "حفر الباطن"
                , "حائل"
                , "حقل"
                , "حوطة بني تميم"
                , "حريملاء"
                , "عنك"
                , "جازان"
                , "جدة"
                , "خميس مشيط"
                , "خيبر"
                , "خليص"
                , "مدينة الملك عبدالله الاقتصادية"
                , "مكة المكرمة"
                , "محايل"
                , "نجران"
                , "قرية العليا"
                , "القويعية"
                , "رابغ"
                , "رفحاء"
                , "راس تنورة"
                , "رياض الخبراء"
                , "الرياض"
                , "صبيا"
                , "صفوى"
                , "سكاكا"
                , "صامطة"
                , "سيهات"
                , "شقراء"
                , "شرورة"
                , "تبوك"
                , "تاروت"
                , "تثليث"
                , "تيماء"
                , "ثادق"
                , "ثول"
                , "تمير"
                , "طريف"
                , "تربه"
                , "املج"
                , "عنيزة"
                , "ينبع" 
                );
                
                $array = array("Abha",
        "Abu Areish",
        "Dammam",
        "Daelim",
        "Dere'iyeh",
        "Dawadmi",
        "Dhahran",
        "Afif",
        "Ahad Masarha", 
        "Ahad Rufaidah",
        "Al Hassa",
        "Badaya",
        "Baha",
        "Bukeiriah",
        "Alghat",
        "Hareeq",
        "Hofuf",
        "Jubail", 
        "Jumum",
        "Khafji",
        "Kharj",
        "Khobar", 
        "Khurma",
        "Madinah",
        "Majarda",
        "Majma",
        "Midinhab",
        "Mubaraz",
        "Muzahmiah",
        "Qatif",
        "Qunfudah",
        "Qurayat",
        "Oula", 
        "Wajeh (Al Wajh)",
        "Noweirieh",
        "AlRass", 
        "Arar",
        "Sulaiyl",
        "Hail", 
        "Taif",
        "Zulfi",
        "Bader", 
        "Balasmar",
        "Bisha",
        "Abqaiq", 
        "Buraidah",
        "Domat Al Jandal", 
        "Duba", 
        "Dhurma", 
        "Hafer Al Batin", 
        "Hail",
        "Haqil", 
        "Hawtat Bani Tamim",
        "Horaimal", 
        "Anak",
        "Gizan", 
        "Jeddah", 
        "Khamis Mushait", 
        "Khaibar",
        "Khulais",
        "Towal",
        "Makkah", 
        "Mohayel Aseer",
        "Najran",
        "Qariya Al Olaya",
        "Quwei'ieh",
        "Rabigh",
        "Rafha",
        "Ras Tanura",
        "Riyadh Al Khabra",
        "Riyadh", 
        "Sabya", 
        "Safwa", 
        "Sakaka", 
        "Samtah",
        "Seihat",
        "Shaqra", 
        "Sharourah", 
        "Tabuk", 
        "Tarut", 
        "Tatleeth", 
        "Tayma", 
        "Thadek", 
        "Towal",
        "Thumair", 
        "Turaif", 
        "Turba",
        "Umluj",
        "Onaiza",
        "Yanbu");
        
                              
        
        
        ?>
                          <form <?php if($select==1){?> action="order_summary.php"<?php }else{?> action="edit_address.php" <?php } ?> method="post" id="<?php  echo $addr['id'];?>">
                                <input type="hidden" name="first_name" value="<?php  echo $addr['first_name'];?>" >
                            <?php    foreach (array_combine($array, $arabic_array) as $value => $arabic) {
                                
                                 ?>
                                <input type="hidden" name="last_name" value="<?php  echo $addr['last_name'];?>" >
                                <input type="hidden" name="city" value="<?php  echo $addr['city'];?>">
                                <input type="hidden" name="country" value="<?php  echo $addr['city'];}  
                                ?>">
                                <input type="hidden" name="province" value="<?php  echo $addr['province'];?>">
                                <input type="hidden" name="address1" value="<?php  echo $addr['address1'];?>">
                                <input type="hidden" name="address2" value="<?php  echo $addr['address2'];?>">
                                <input type="hidden" name="zip" value="<?php  echo $addr['zip'];?>">
                                <input type="hidden" name="address_id" value="<?php  echo $addr['id'];?>">
                                <input type="hidden" name="phone" value="<?php  echo $addr['phone'];?>">
                                
                            
                                    <div class="row active_orders address_row valign-wrapper" id="<?php if($count==$counter){echo "last_row";}?>" >
                                        <div class="col s2 m2 l2 left-align" onclick="document.getElementById('<?php  echo $addr['id'];?>').submit()" >
                                          <img class="responsive-img location_img" src="images/location.svg">
                                        </div>
                                        <div class="col s8 m8 l8 left-align" onclick="document.getElementById('<?php  echo $addr['id'];?>').submit()" >
                                            <h3 class="address-heading"><?php echo $addr['address1'];?></h3>
                                            <?php    foreach (array_combine($array, $arabic_array) as $value => $arabic) {
                            if($addr['city']==$value)
                                 {
                                     if($_COOKIE['lang']=="ar")
                                     {
                                         $city=$arabic;
                                     }
                                     else
                                     {
                                         $city=$value;
                                     }
                                 }
                            }
                                 ?>
                                            <p class="addresses"><?php echo $city;?></p>
                                            <p class="addresses"><?php if($lang=='ar'){ echo "السعودية";}  
                                else
                                { echo 'Saudi Arabia';}  ?></p>
                                          
                                        </div>
                                        <div class="col s2 m2 l2">
                                            <?php if($addr['default']==false && $_GET["select"]!=1)
                                            {?>
                                            <input type="image" value="<?php echo $addr['id'];?>" class="responsive-img remove" name="remove_address" src="images/Remove.svg">
                                            <?php } ?>
                                        </div>
                                    </div>
                        
                        </form>
                        
                                   <?php 
                                } }
                                    ?>
                    
                        <div class="row">
                            <div class="col  s12 m12 l12">
                                <br></br>
                                <?php 
                                    if (isset($_GET['select']))
                                    {
                                        
                                    }
                                    else
                                    {
                                ?>
                                <a href="add_address.php"><button class="pink-clr add_address">
                                    <?php if($lang=='ar'){ echo "اضافة عنوان جديد";}  
                                else
                                { echo 'Add Address';}  ?>
                                </button></a>
                                <?php } ?>
                                <br><br><br><br>
                            </div>
                        </div>
                      </div> <!-- end rp -->
                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
        </div>
      </div>
    
    
    <script>
   
      
         $(function () {
            
                    $('.remove').on('click', function (e) {
                       var fav_ids=$(this).val();
                      e.preventDefault();
                       var data = {
                            fav_id: fav_ids,
                        }
                    
                     
                      $.ajax({
                        type: 'post',
                        url: 'remove_address.php',
                        data: fav_ids,
                        cache: false,
                        contentType: false,
                        beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                           var response=JSON.parse(response);
                           var lang="<?php echo $lang?>";
                            if(lang=="ar")
                              {
                                  
                                  var ok="موافق";
                                  var dunkin="دانكن" 
                              }
                              else
                              {
                                  
                                  var ok="OK";
                                  var dunkin="Dunkin KSA";
                              }
                            if(response.status == "success")
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
                        
                                
                    });
            
                  });
                  
                 
    </script>
    
<?php include 'footer.php';?>