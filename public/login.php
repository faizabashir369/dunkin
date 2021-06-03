 <?php 

    session_start();
    if(isset($_SESSION["url"]))
    {
    $url=$_SESSION["url"];
  }
    if(isset($_SESSION["customer_id"]))
    {
        
    }
    if(isset($_GET["relogin"]))
    {
     
   unset($_SESSION["customer"]);
   unset($_SESSION["customer_id"]);
   session_destroy();
   setcookie("customer","",time()-3600);
   setcookie("customer_id","",time()-3600);
   setcookie("phone","",time()-3600);
   setcookie("email","",time()-3600);
   setcookie("shopify_customer_id","",time()-3600);
   setcookie("first_name","",time()-3600);
   setcookie("last_name","",time()-3600);
   setcookie("loyalty_card_number","",time()-3600);
   setcookie("url","",time()-3600);
   setcookie("session_key","",time()-3600);
?>
<script>
      localStorage.clear();
   </script>
<?php
    }
    
    if(isset($_COOKIE["customer_id"])) {
        /*$name=$_SESSION["customer"]=$_COOKIE["customer"];
        $_SESSION["customer_id"]=$_COOKIE["customer_id"];
        $_SESSION["first_name"]=$_COOKIE["first_name"];
        $_SESSION["last_name"]=$_COOKIE["last_name"];
        $_SESSION["email"]=$_COOKIE["email"];
        $_SESSION["phone"]=$_COOKIE["phone"];
        $_SESSION["loyalty_card_number"]=$_COOKIE["loyalty_card_number"];
        $_SESSION["shopify_customer_id"]=$_COOKIE["shopify_customer_id"];
        $_SESSION["id"]=$_COOKIE["id"];*/
        
      // header("Location:$url");
    }
    else
    {
       
    }
    
 include 'header.php';?>
 <?php include 'sidebar.php';?>
            
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="login_form" class="center-align">
                <h2><?php if($lang=='ar'){ echo "تسجيل دخول";}else{ echo "Login To Your Account";} ?></h2>
                      <p class="login_p"><?php if($lang=='ar'){ echo "يرجى ادخال رقم الجوال والرمز السري";}else{ echo "Please enter your Phone number and password";} ?></p>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix login_phone">phone_android</i>
                          <!--<p class="static-code login_static_code">+966</p>--><input id="cell-phone" type="tel" maxLength="13" minLength="13" name="phone" class="validate" required="" aria-required="true" value="+966">
                          <label for="phone" id="login-label"><?php if($lang=='ar'){ echo "ا";}else{ echo "Mobile";} ?></label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix lock-icon">lock_outline</i>
                          <input id="password" type="password" name="password" class="validate" required="" aria-required="true">
                          <label for="password" id="pass_label"><?php if($lang=='ar'){ echo "الرمز السري";}else{ echo "Password";} ?></label>
                        </div>
                      </div>
                      <input id="password" type="hidden" name="login" class="validate" required="" aria-required="true" value="1">
                      <div class="row">
                      <div class="input-field col s12 m12 l12">
                          <div class="reg-btn">
                            <button class="submit register log_in" name="login"><?php if($lang=='ar'){ echo "تسجيل دخول";}else{ echo "Login";} ?></button>
                         </div>
                      <p>
                        <?php if($lang=='ar')
                        {
                          echo " اذا لم يكن لديك حساب
                     ";
                        }?>
                        <a class="login" href="register.php">
                          <?php if($lang=='ar')
                      { echo "انشاء حساب جديد";
                      }
                      ?>
                      </a>
                      <?php
                      if($lang=='en')
                        { echo "Create an";} ?> <a href="register.php" class="login"><?php if($lang=='ar'){ echo "";}else{ echo "account";} ?></a> <?php if($lang=='ar'){ echo "";}else{ echo "if you still dont have";} ?><br> <a href="forgot_password.php" class="login"><?php if($lang=='ar'){ echo "نسيت رقمك السري";}else{ echo "Forgot your password";} ?> </a>
                      </a>
                      </a>
                      </p>
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
                           // $('#loaderIcon').hide();
                            
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { console.log("success");
                       
                            response=JSON.parse(response);
                            if(response.status == "success")
                            {
                              
                              /* Swal.fire({
                                      
                                      title: "Dunkin KSA",
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      html:
                                      '<p class="trans-rejected">'+response.message+'</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    })
                            */
                                 $.cookie('customer',response.data.customer.customer_name);
                                 $.cookie('session_key',response.data.session_key);
                                 
                                 $.cookie('id',response.data.customer.id);
                                 $.cookie('customer_id',response.data.customer.shopify_customer_id);
                                 $.cookie('first_name',response.data.customer.first_name);
                                 $.cookie('last_name',response.data.customer.last_name);
                                 $.cookie('email',response.data.customer.email);
                                 $.cookie('phone',response.data.customer.phone);
                                 $.cookie('loyalty_card_number',response.data.customer.loyalty_card_number);
                                 $.cookie('shopify_customer_id',response.data.customer.shopify_customer_id);
                                 
                                document.getElementById("log").innerHTML = 'Logout';
                               // window.history.back();
                              window.location.href="index.php";
                               
                                
                            }
                            
                            else
                            {
                              console.log("failed");
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
                        .fail  (function(jqXHR, exception) 
                        {  
                         /*   Swal.fire(
                                      errorThrown,
                                      textStatus,
                                      'error'
                                    ); */
                            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
                            
                            console.log("error");
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        })
                        
                                
                    });
            
                  });
                 
            </script>
            <?php include 'footer.php';?>

