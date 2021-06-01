<?php 

    session_start();
    $_COOKIE["url"] = $_COOKIE['REQUEST_URI'];
    if(isset($_COOKIE['customer_id']))
    {
        //echo $_SESSION['customer_id'];
    }
    else
    {
         header("Location:login.php");
    }
    
     include 'header.php';
    
     include 'sidebar.php';?>


                <div id="orders" class="list-orders center-align edit_branch_address">
                    <img class="responsive-img map_img" src="images/map.svg" alt="map">
                <form action="form_submit.php" method="post" enctype="multipart/form-data">
                    <div class="rp">
                 <!--   <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="cust_id" name="shopify_customer_id" type="hidden" value="<?php echo $_COOKIE['customer_id'] ?>">
                          <input  name="addAddress" type="hidden" value="1">
                          <input id="f_name" name="first_name" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $_COOKIE['first_name'] ?>">
                         
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="l_name" name="last_name" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $_COOKIE['last_name'] ?>">
                        </div>
                    </div>
                -->    
                          <input id="cust_id" name="shopify_customer_id" type="hidden" value="<?php echo $_COOKIE['customer_id'] ?>">
                          <input  name="addAddress" type="hidden" value="1">
                          <input id="f_name" name="first_name" type="hidden" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $_COOKIE['first_name'] ?>">
                          <input id="l_name" name="last_name" type="hidden" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $_COOKIE['last_name'] ?>">
                       
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="address1" name="address1" type="text" class="validate" required="" aria-required="true">
                          <label id="add1" for="address1">
                                <?php if($lang=='ar'){ echo "العنوان الاول";}  
                                else
                                { echo 'Address 1';}  ?>
                                
                        </label>
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="address2" name="address2" type="text" class="validate" required="" aria-required="true">
                          <label id="add2" for="address2"><?php if($lang=='ar'){ echo "العنوان الإضافي";}  
                                else
                                { echo 'Address 2';}  ?></label>
                        </div>
                    </div>
                    
                    <div class="row address_row select_row">
                        <div class="input-field col s12 m12 l12">
        
                            <?php $array = array("Abha",
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
                              
        
        
        ?>
                            <select id="city" class="browser-default" name="city" required="" aria-required="true">
                                <option value="" disabled selected><?php if($lang=='ar'){ echo "المدينة";}  
                                else
                                { echo 'City';}  ?></option>
                                <?php 
                                foreach (array_combine($array, $arabic_array) as $value => $arabic) {
                                
                                 ?>
                                <option   value="<?php echo $value;?>">
                                    <?php if($lang=="ar")
                                    { 
                                        echo $arabic;
                                    }
                                    else
                                    { 
                                        echo $value;
                                    }
                                    ?></option>
                                <?php } ?>
                                
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="province" name="province" type="text" class="validate" required="" aria-required="true">
                          <label id="prov" for="province"><?php if($lang=='ar'){ echo "المنطقة";}  
                                else
                                { echo 'Province';}  ?></label>
                        </div>
                    </div>
                    
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                            <input id="country" name="country" type="hidden" class="validate" required="" aria-required="true" 
                            value="<?php  echo 'Saudi Arabia';  ?>" readonly="readonly">
                          <input id="countrys" name="countrys" type="text" class="validate" required="" aria-required="true" value="<?php if($lang=='ar'){ echo "السعودية";}  
                                else
                                { echo 'Saudi Arabia';}  ?>" readonly="readonly">
                          <label id="label" for="country"><?php if($lang=='ar'){ echo "الدولة";}  
                                else
                                { echo 'Country';}  ?></label>
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="zip" name="zip" type="text" class="validate" required="" aria-required="true">
                          <label id="lblzip" for="zip"><?php if($lang=='ar'){ echo "العنوان الوطني";}  
                                else
                                { echo 'Zip';}  ?></label>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col  s12 m12 l12">
                        <button class="pink-clr add_address edit_address"><?php if($lang=='ar'){ echo "اضافة";}  
                                else
                                { echo 'Add Address';}  ?></button>
                        </div>
                    </div>
                </form>
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
    $('select[required]').css({
      display: 'inline',
      position: 'absolute',
      float: 'left',
      padding: 0,
      margin: 0,
      border: '1px solid rgba(255,255,255,0)',
      height: 0, 
      width: 0,
      top: '2em',
      left: '3em',
      opacity: 0,
      pointerEvents: 'none'
    });
              $(function () {
            
                    $('form').on('submit', function (e) {
            
                      e.preventDefault();
                      e.stopImmediatePropagation();
                     var post_url = $(this).attr("action"); 
                     var formData = new FormData($(this)[0]);
                      $.ajax({
                        type: 'post',
                        url: post_url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                            data=JSON.parse(response);
                            
                            if(data.status=="success")
                            {
                               Swal.fire({
                                      title: dunkin,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                      html:
                                      '<p class="trans-rejected">'+data.message+'</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                               }).then(function (result) {
                                      if (result.value) {
                                               window.location.href="address.php";
                                      } else {
                                        // handle cancel
                                      }
                                    })
                                 
                                
                            }
                            
                            else
                            {
                                if(data.message.signature!=null)
                                {
                                    
                                    
                                    var message=data.message.signature[0];
                                }
                                else
                                {
                                    message=data.message;
                                }
                                
                                Swal.fire({
                                  title: data.status,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                  html:
                                  '<p class="trans-rejected">'+message+'</p>',
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




