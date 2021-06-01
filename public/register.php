 <?php include 'header.php';?>
 <?php include 'sidebar.php';?>
            
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="registration_form">
                <h2><?php if($lang=='ar'){ echo "إنشاء حساب";}  
                                else
                                { echo 'Register Account';}  ?></h2><br><br>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">perm_identity</i>
                          <input id="f_name" name="f_name" type="text" class="validate" required="" aria-required="true">
                          <label for="f_name">
                              <?php if($lang=='ar'){ echo " الاسم الاول";}  
                                else
                                { echo 'First Name';}  ?>
                              
                              </label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">perm_identity</i>
                          <input id="l_name" name="l_name" type="text" class="validate" required="" aria-required="true">
                          <label for="l_name">
                              <?php if($lang=='ar'){ echo "اسم العائلة";}  
                                else
                                { echo 'Last Name';}  ?>
                              
                              </label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">email</i>
                          <input id="email" type="email" name="email" class="validate" required="" aria-required="true">
                          <label for="email">
                              <?php if($lang=='ar'){ echo "البريد الالكتروني";}  
                                else
                                { echo 'Email Address';}  ?>
                              </label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">phone_android</i>
                          <input id="cell-phone" type="tel" maxLength="13" minLength="13" name="cell-phone" class="validate" required="" aria-required="true" value="+966">
                          <label for="cell-phone" id="phone-label">
                              <?php if($lang=='ar'){ echo "رقم الجوال";}  
                                else
                                { echo 'Phone';}  ?>
                                </label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">event</i>
                          <input id="dob" type="text"  name="dob" class="datepicker validate" required="" aria-required="true">
                          <label for="dob">
                              <?php if($lang=='ar'){ echo "تاريخ الميلاد";}  
                                else
                                { echo 'DOB';}  ?>
                              </label>
                        </div>
                      </div>
                      
                       
                  <!--    <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">recent_actors</i>
    
                          <input id="saudi_id" type="text" oninput="numberOnly(this.id);"  name="saudi_id" maxLength="10" minLength="10"  class="validate" required="required" aria-required="true">
                          
                          <label for="saudi_id">Saudi ID</label>
                        </div>
                      </div>
                  -->    
                  <input id="saudi_id" type="hidden" oninput="numberOnly(this.id);"  name="saudi_id" maxLength="10" minLength="10"  class="validate" required="required" aria-required="true" value="12345">
                          
                      <div class="row">
                        <div class="input-field col  s12 m12 l12">
                        <i class="material-icons prefix">public</i>
                              <select name="country" required="" aria-required="true">
                                <option value="Saudi Arabia"  selected>
                                    <?php if($lang=='ar'){ echo "السعودية";}  
                                else
                                { echo 'Saudi Arabia';}  ?></option>
                              </select>
                        </div>
                        </div>
                      
                        <div class="row">
                            <div class="input-field col  s12 m12 l12">
                                <i class="material-icons prefix">people</i>
                                    <select name="gender" required="" aria-required="true">
                                        <option value="0"  selected><?php if($lang=='ar'){ echo "الجنس";}  
                                else
                                { echo 'Gender';}  ?></option>
                                        <option value="1"><?php if($lang=='ar'){ echo "ذكر";}  
                                else
                                { echo 'Male';}  ?></option>
                                        <option value="2"><?php if($lang=='ar'){ echo "أنثى";}  
                                else
                                { echo 'Female';}  ?></option>
                                    </select>
                            </div>
                        </div>

                      
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">location_on</i>
                          <input id="Address" name="address" type="text" class="validate" required="" aria-required="true">
                          <label for="address"><?php if($lang=='ar'){ echo "العنوان";}  
                                else
                                { echo 'Address';}  ?></label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col  s12 m12 l12">
                        <i class="material-icons prefix">location_city</i>
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
                            <select name="city" required="required" aria-required="true">
                                <option value="" disabled selected><?php if($lang=='ar'){ echo "المدينة";}  
                                else
                                { echo 'City';}  ?></option>
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
                        
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">lock_outline</i>
                          <input id="password" type="password" name="password" placeholder="Enter Password(Ex: Dunkin@123)" class="validate" required="" aria-required="true">
                          <label for="password">
                              <?php if($lang=='ar'){ echo "الرقم السري";}  
                                else
                                { echo 'Password';}  ?>
                              </label>
                        </div>
                      </div>
                      
                      
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">lock_outline</i>
                          <input id="con_pass" type="password" name="con_pass" placeholder="Re Enter your password" onfocusout="validatePassword()"   class="validate" required="" aria-required="true">
                          <label for="con_pass" data-error="Password does not match" data-success="Password Match">
                              <?php if($lang=='ar'){ echo "تأكيد الرقم السري";}  
                                else
                                { echo 'Confirm Password';}  ?>
                                </label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">card_membership</i>
                          <input id="card_no" type="text" name="card_no" >
                          <label for="card_no" id="card-label">
                              <?php if($lang=='ar'){ echo "رقم بطاقة دنكاوي (إختياري)";}  
                                else
                                { echo 'Loyality Card Number (optional)';}  ?>
                                 </label>
                        </div>
                      </div>
                      
                      <div class="row">
                      <div class="input-field col s12 m12 l12">
                          <div class="reg-btn">
                            <input type="hidden" name="register" value="1">
                            <button class="submit register" name="submit">
                                <?php if($lang=='ar'){ echo "إنشاء حساب";}  
                                else
                                { echo 'Register';}  ?></button>
                         </div>
                      <p class="login">
                           <?php if($lang=='ar'){ 
                               
                                ?>
                               اذا سبق لك التسجيل اذهب الى صفحة   <a href="login.php" class="login">تسجيل الدخول</a>
                               <?php
                           }
                                else
                                {  ?> 
                                If you already have an account start <a href="login.php" class="login">login</a>
                                <?php } ?>
                          
                          
                          </p>
                      </div>
                      </div>
                      
                      
                       
    
    
            </form>
            <div id="verify_c">
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="v_form">
                 <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="v_code" name="v_code" type="text" class="validate" required="" aria-required="true">
                          <label for="v_code">
                              <?php
                                  if($lang=="ar")
                                  {
                                    echo "ادخل رمز التحقق";
                                  }
                                  else
                                  {
                                    echo "Enter Verification Code";
                                  }
                               ?>
                          </label>
                        </div>
                        <button class="submit verify" name="submit">
                          <?php
                                  if($lang=="ar")
                                  {
                                    echo "تحقق";
                                  }
                                  else
                                  {
                                    echo "Verify";
                                  }
                          ?>
                                
                               </button>
                 </div>
            </form>
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="resend_form">
                 <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="resend_code" name="resend_code" type="hidden" value="resend" class="validate">
                        </div>
        
                        <button class="submit re-send" name="re-send">
                        <?php
                                  if($lang=="ar")
                                  {
                                    echo "اعادة ارسال رمز التحقق";
                                  }
                                  else
                                  {
                                    echo "Resend Verification code";
                                  }
                          ?>
                        </button>
                 </div>
            </form>
            <div>
                
            </div>
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
  
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
    $('select').formSelect();
    });
    
        //match password and confirm password
        function validatePassword(){
            var password = document.getElementById("password");
              con_pass = document.getElementById("con_pass");
            
              if(password.value != con_pass.value) {
                if($.cookie("lang")=="ar")
                 {
                  con_pass.setCustomValidity("الرمز السري غير متطابق");
                 }
              else
                {
                      con_pass.setCustomValidity("Passwords Don't Match");
                
                }
              } 
              else
              {
                  con_pass.setCustomValidity('');
              }
              
            var str=password.value;
            var re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            var result=re.test(str);
             if(result==0)
             {
              if($.cookie("lang")=="ar")
               {
                password.setCustomValidity("يجب ان يكون طول الرمز السري اكثر من 6 احرف، كما يجب ان يحتوي على حرف كبير وحرف صغير ورمز خاص (مثال Ma1363$)");
             
               }
               else
               {
               
                 password.setCustomValidity("Password should  be mix of upercase lower case letters numbers and special character");
               
               }
            }
             else
             {
                 password.setCustomValidity('');
             }
             password.onchange = validatePassword;
        };
        
        function checkPassword()
          {
              
            // at least one number, one lowercase and one uppercase letter
            // at least six characters that are letters, numbers or the underscore
             var password = document.getElementById("password");
             var str=password.value.toString();
             alert(str);
            var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
            var result=re.test(str);
             if(result==0)
             {
               if($.cookie("lang")=="ar")
               {
                con_pass.setCustomValidity("يجب ان يكون طول الرمز السري اكثر من 6 احرف، كما يجب ان يحتوي على حرف كبير وحرف صغير ورمز خاص (مثال Ma1363$)");
             
               }
               else
               {
               
                 con_pass.setCustomValidity("Password should  be mix of upercase lower case letters numbers and special character");
               
               }
             }
             else
             {
                 con_pass.setCustomValidity('');
             }
             password.onchange = checkPassword;
          }

    
        

        var d = new Date();
        var n = d.getFullYear();
 
        
        $('.datepicker').datepicker({
                selectMonths: true,
                format: 'yyyy-mm-dd',
                yearRange: [1900,n],
                maxDate: d
            });
            
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
        function numberOnly(id) {
            var element = document.getElementById(id);
            var regex = /[^0-9]/gi;
            element.value = element.value.replace(regex, "");
            }
      /*      // Extension pour comptabilité avec materialize.css
            $.validator.setDefaults({
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

            $("form").validate({
  rules: {
    dateField: {
      date: true
    }
  }
}); */
            
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
                    $('#v_form').on('submit', function (e) {
            
                      e.preventDefault();
                     var post_url = $(this).attr("action"); 
                     var formData = new FormData($(this)[0]);
                      $.ajax({
                        type: 'post',
                        url: post_url,
                        data: formData,
                        dataType: 'json',
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
                            //alert(response);
                           
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
                                                
                                               
                                                location.href="login.php";
                                      } else {
                                        // handle cancel
                                      }
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
                    $('#resend_form').on('submit', function (e) {
            
                      e.preventDefault();
                     var post_url = $(this).attr("action"); 
                     var formData = new FormData($(this)[0]);
                      $.ajax({
                        type: 'post',
                        url: post_url,
                        data: formData,
                        dataType: 'json',
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
                            //alert(response);
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
            
                    $('#registration_form').on('submit', function (e) {
            
                      e.preventDefault();
                     var post_url = $(this).attr("action"); 
                     var formData = new FormData($(this)[0]);
                      $.ajax({
                        type: 'post',
                        url: post_url,
                        data: formData,
                        dataType: 'json',
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
                            
                            console.log(document.getElementById("cell-phone").value);
                           // response=JSON.parse(response);
                            $.cookie('myCookie', document.getElementById("cell-phone").value);
                           // alert(response.error_obj.phone);
                           if(response.error_obj!=undefined)
                           {
                                if(response.error_obj.phone[0]!=undefined)
                                {
                                  
                                   Swal.fire({
                                    title: dunkin,
                                    showCloseButton: false,
                                    showConfirmButton:true,
                                    confirmButtonText:ok,
                                    html:
                                    '<p class="trans-rejected">'+response.error_obj.phone[0]+'</p>',
                                    width:'690px',
                                    background: '#fff',
                                    backdrop: `
                                     rgba(38, 38, 38, 0.8);
                                    `
                                  })
                                }
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
                                    })
                               document.getElementById("registration_form").style.display = "none";
                               document.getElementById("verify_c").style.display = "block";
                                window.scrollTo(0, 0);
                            }
                            else if(response.error_obj!=undefined)
                            {
                              if(response.error_obj.email!=undefined)
                              {
                                Swal.fire({
                                  
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  confirmButtonText:ok,
                                  html:
                                  '<p class="trans-rejected">'+response.error_obj.email+'</p>',
                                  width:'690px',
                                  
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                              }
                            }
                            else if(response.error_obj!=undefined)
                            
                            {

                              if(response.error_obj.phone[0]!=undefined)
                              {
                                Swal.fire({
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  confirmButtonText:ok,
                                  html:
                                  '<p class="trans-rejected">'+response.error_obj.phone[0]+'</p>',
                                  width:'690px',
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                              }
                                console.log("failed");
                            }
                            else
                            {

                                Swal.fire({
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  confirmButtonText:ok,
                                  html:
                                  '<p class="trans-rejected">'+response.message+'</p>',
                                  width:'690px',
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                            }
                        })
                        .fail  (function(jqXHR, textStatus, errorThrown) 
                        {  
                            Swal.fire({
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  confirmButtonText:ok,
                                  html:
                                  '<p class="trans-rejected">'+textStatus+'</p>',
                                  width:'690px',
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                            
                        })
                        
                                
                    });
            
                  });
            $(document).click(function(){
                $('li[id^="select-options"]').on('touchend', function (e) {
                    e.stopPropagation();
                });
            });
            </script>
            <style>
                label:not(.active)
                {
                    padding-right:70px !important;
                }
                label.active)
                {
                    padding-right:60px !important;
                }
            </style>
            <?php include 'footer.php';?>

