    <?php include 'header.php';
       session_start();
       $customer_id=$_COOKIE['customer_id'];
       $first_name=$_POST['first_name'];
       $last_name=$_POST['last_name'];
       $address1=$_POST['address1'];
       $city=$_POST['city'];
       $country=$_POST['country'];
       $address2=$_POST['address2'];
       $zip=$_POST['zip'];
       $province=$_POST['province'];
       $address_id=$_POST['address_id'];
        include 'sidebar.php';?>


                <div id="orders" class="list-orders center-align edit_branch_address">
                    <img class="responsive-img map_img" src="images/map.svg" alt="map">
                    <form action="form_submit.php" method="post" id="update_addrr" enctype="multipart/form-data">

            <div class="rp">
                          <input type="hidden" name="address_id" value="<?php echo $address_id; ?>">
                          <input id="f_name" name="first_name" type="hidden"  value="<?php echo $first_name; ?>">
                         
                    
                          <input id="f_name" name="last_name" type="hidden"  value="<?php echo $last_name; ?>">
                          
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="f_name" name="address1" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $address1; ?>">
                          <label id="label" class="active" for="f_name"><?php if($lang=='ar'){ echo "العنوان الاول";}  
                                else
                                { echo 'Address 1';}
                                
                                ?>
                                </label>
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="f_name" name="address2" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $address2; ?>">
                          <label id="label" class="active" for="f_name">
                          <?php if($lang=='ar'){ echo "العنوان الإضافي";}  
                                else
                                { echo 'Address 2';}  ?>
                          
                          </label>
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                            <label id="label" class="active" for="city"><?php if($lang=='ar'){ echo "المدينة";}  
                                else
                                { echo 'City';}  ?></label>
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
                            <select class="browser-default" id="city" readonly="readonly" name="city" required="" aria-required="true">
                                <?php 
                                foreach (array_combine($array, $arabic_array) as $value => $arabic) {
                                
                                 ?>
                                <option  <?php if($value==$city){ echo "selected";}?> value="<?php echo $value;?>">
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
                     <br>
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="f_name" name="province" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $province; ?>">
                          <label id="label" class="active" for="f_name"><?php if($lang=='ar'){ echo "المنطقة";}  
                                else
                                { echo 'Province';}  ?></label>
                        </div>
                    </div>
                    
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                         <input id="country" name="country" type="hidden" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo 'Saudi Arabia'; ?>">
                         <input id="countrys" name="countrys" type="text" readonly="readonly" class="validate" required="" aria-required="true" 
                         value="<?php if($lang=='ar'){ echo "السعودية";}  
                                else
                                { echo 'Saudi Arabia';}  ?>">
                          <label id="label" class="active" for="f_name"><?php if($lang=='ar'){ echo "الدولة";}  
                                else
                                { echo 'Country';}  ?></label>
                        </div>
                    </div>
                    
                    <div class="row address_row">
                        <div class="input-field col s12 m12 l12">
                          <input id="f_name" name="zip" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $zip; ?>">
                          <label id="label" class="active" for="f_name"><?php if($lang=='ar'){ echo "العنوان الوطني";}  
                                else
                                { echo 'Zip';}  ?></label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="editAddress" value="1">
                    <div class="row">
                        <div class="col  s12 m12 l12 center-align">
<button class="pink-clr add_address edit_address" id="edit" onclick="change_button()" type="button"><?php if($lang=='ar'){ echo "تعديل العنوان";}  
                                else
                                { echo 'Edit Address';}  ?></button>
                        <button class="pink-clr add_address edit_address" id="update" style="display:none;margin:auto;">
                        <?php if($lang=='ar'){ echo "تحديث العنوان";}  
                                else
                                { echo 'Update address ';}  ?></button>
                        
                        </div>
                    </div>
                    
   </div>
   </form>
                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
      
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

     function change_button()
     {
        document.getElementById("update").style.display="block";
        document.getElementById("edit").style.display="none";
        $("input[name!='country']").removeAttr("readonly");
       
        $("option").removeAttr("disabled");
         
     }
// Extension pour comptabilité avec materialize.css
/*$.validator.setDefaults({
  highlight: function(element, errorClass, validClass) {
    if (element.tagName === 'SELECT')
    	$(element).closest('.select-wrapper').addClass('invalid');
    else
    	$(element).removeClass(validClass).addClass(errorClass);
  },
  unhighlight: function(element, errorClass, validClass) {
    if (element.tagName === 'SELECT')
    	$(element).closest('.select-wrapper').removeClass('invalid');
    else
    	$(element).removeClass(errorClass).addClass(validClass);
  },
  errorClass: 'invalid',
  validClass: "valid",
  errorPlacement: function(error, element) {
    if (element.prop('tagName')  === 'SELECT') {
      // alternate placement for select error
      error.appendTo( element.parent() );
      error.addClass('active');
    }
    else {
      $(element)
        .closest("form")
        .find("label[for='" + element.attr("id") + "']")
        .attr('data-error', error.text());
    }
  },
  submitHandler: function(form) {
    console.log('form ok');
  }
});

$("#form").validate({
  rules: {
    dateField: {
      date: true
    }
  }
});
*/
        $(function () {
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
                        
            
                    $('#update_addrr').on('submit', function (e) {
                    
                      e.preventDefault();
                     
                     var post_url = $(this).attr("action"); 
                     
                     var formData = new FormData($(this)[0]);
            
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
                            $('#loaderIcon').hide();
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                           
                            response=JSON.parse(response);
                            
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
                                        
                                                
                                                window.location.href="address.php";
                                       
                                    })
                              
                            }
                            else
                            {
                                Swal.fire({
                                  
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
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