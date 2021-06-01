 
 <?php include 'header.php';?>
 <?php include 'sidebar.php';?>
            
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="login_form" class="center-align">
                <h2><?php if($lang=='ar'){ echo "؟هل نسيت الرمز السري؟";}  
                                else
                                { echo 'Did you forget your password';}  ?></h2>
                      <p class="login_p"><?php if($lang=='ar'){ echo "يرجى ادخال رقم الجوال لتحديث الرمز السري";}  
                                else
                                { echo 'Please enter your Phone number to renew your password';}  ?></p>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">phone_android</i>
                          <input id="phone_no" type="text" name="phone" class="validate" maxLength="13" minLength="13" required="" aria-required="true" value="+966">
                          <input type="hidden" name="forgot_password" value="1">
                          <label for="phone" id="login-label"><?php if($lang=='ar'){ echo "Phone";}  
                                else
                                { echo 'Phone';}  ?></label>
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
                        async: false,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false
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
                               }).then(function() {
                                           window.location.href="change_password.php";
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

