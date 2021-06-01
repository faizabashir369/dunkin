 
 <?php include 'header.php';?>
 <?php include 'sidebar.php';?>
            
            <form action="verify_password_change.php" method="post" enctype="multipart/form-data" id="login_form" class="change_password center-align">
                <h2><?php if($lang=='ar'){ echo " اعادة ضبط الرمز السري";}  
                                else
                                { echo 'Reset Password';}  ?></h2>
                      <p class="login_p">
                               <?php if($lang=='ar'){ echo "يرجى ادخال رمز التحقق المرسل الى جوالك لتغيير الرمز السري";}  
                                else
                                { echo 'Please enter verification code to renew your password';}  ?></p>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">phone_android</i>
                          <input id="verification_code" type="text" name="v_code" class="validate" required="" aria-required="true">
                          <input type="hidden" name="change_password" value="1">
                          <label for="phone"><?php if($lang=='ar'){ echo "رمز التحقق";}  
                                else
                                { echo 'Verification Code';}  ?></label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">lock_outline</i>
                          <input id="password" type="password" name="password" class="validate" required="" aria-required="true">
                          <label for="password">
                          <?php if($lang=='ar'){ echo "الرمز السري الجديد";}  
                                else
                                { echo 'Password';}  ?></label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">lock_outline</i>
                          <input id="con_pass" type="password" name="con_pass" onfocusout="validatePassword()"   class="validate" required="" aria-required="true">
                          <label for="con_pass" data-error="Password does not match" data-success="Password Match">
                               <?php if($lang=='ar'){ echo "اعادة ادخال الرمز السري الجديد";}  
                                else
                                { echo 'Confirm Password';}  ?>
                                </label>
                        </div>
                      </div>
                      
                      <div class="row">
                      <div class="input-field col s12 m12 l12">
                          <div class="reg-btn">
                            <button class="submit register log_in" name="submit"><?php if($lang=='ar'){ echo "ارسال";}  
                                else
                                { echo 'Submit';}  ?></button>
                         </div>
                      
                      </div>
                      </div>
            </form>
            
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    <script language="JavaScript" type="text/javascript">
        function validatePassword(){
            var password = document.getElementById("password");
              con_pass = document.getElementById("con_pass");
            
              if(password.value != con_pass.value) {
                con_pass.setCustomValidity("Passwords Don't Match");
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
                 password.setCustomValidity("Password should  be mix of upercase lower case letters numbers and special character");
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
                 con_pass.setCustomValidity("Password should  be mix of upercase lower case letters numbers and special character");
             }
             else
             {
                 con_pass.setCustomValidity('');
             }
             password.onchange = checkPassword;
          }
        
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
                    $('form').on('submit', function (e) {
            
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
                            //console.log(response);
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
                                    }).then(function() {
                                      document.cookie = 'customer=; Path=/PWA2/public; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
document.cookie = 'customer_id=; Path=/PWA2/public; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
document.cookie = 'email=; Path=/PWA2/public; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                          
                                           localStorage.clear();
                                           location.href='login.php?relogin=1';
                                    })
                                    
                                
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

