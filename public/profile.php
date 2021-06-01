<?php 
     $lang=$_COOKIE['lang'];
    ?>

<script>
     var lang="<?php echo $lang;?>";
     localStorage.setItem("lang",lang);
</script>
 <?php 
     $lang=$_COOKIE['lang'];
    $_COOKIE["url"] = $_SERVER['REQUEST_URI'];
    if($_COOKIE["shopify_customer_id"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
        $shopify_customer_id=$_COOKIE["shopify_customer_id"];
    }
    else
    {
        header("Location:login.php");
    }

 include 'header.php';
 include 'sidebar.php';
 
     
 
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/get-customer-loyalty-cards",
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
        $data= json_decode($response,true);
        //print_r($data);
        if($data['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
        $data=$data['data'];
       
        $cards=$data['cards'];
        $card="";
        foreach($cards as $card)
        {
            $card=$card['card_number'];
        }
        
    
 
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://dunkinsa.abstractagency.net/dunkinsa-api/api/get-shopify-customer-detail",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => array('shopify_customer_id' => $shopify_customer_id,'session_key' => $_COOKIE['session_key']),
CURLOPT_HTTPHEADER => array(
"apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9",
"X-localization: $lang"
),
));

$response = curl_exec($curl);

curl_close($curl);
$data=json_decode($response,true);
 if($data['code']=='401')
        {
           // header("Location:login.php");
           
            ?>
<script>
    location.href='login.php';
</script>

            <?php
        }
//print_r($data);
$a=$data['data'];
$b=$a['customer'];

$fname=$b['first_name'];
$lname=$b['last_name'];
$email=$b['email'];
$phone=$b['phone'];

?>
            
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="registration_form">
                <br>
                <h2><?php if($lang=='ar'){ echo 'الملف الشخصي';}  
                                else
                                { echo 'User Profile';}?></h2>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">perm_identity</i>
                          <input id="f_name" name="f_name" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $fname;?>">
                          
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">perm_identity</i>
                          <input id="l_name" name="l_name" type="text" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $lname;?>">
                          
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">email</i>
                          <input id="emails" type="email" name="email"  class="validate" readonly="readonly" required="" aria-required="true" value="<?php echo $email;?>">
                         
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">phone_android</i>
                          <input id="phone" type="tel" name="phone" readonly="readonly" class="validate" required="" aria-required="true" value="<?php echo $phone;?>">
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <i class="material-icons prefix">card_membership</i>
                          <input id="card_no" type="text"  readonly="readonly" name="card_no" value="<?php echo $card;?>">
                          <input  type="hidden" name="edit_profile" value="1">
                          
                        </div>
                      </div>
                      
                      <div class="row">
                      <div class="input-field col s12 m12 l12">
                          <div class="reg-btn">
                            <button id="edit_profile" class="submit register" onclick="change_button()" type="button">
                            <?php if($lang=='ar'){ echo 'تعديل';}  
                                else
                                { echo 'Edit Profile';}?></button>
                            <button id="update_profile" class="submit register" type="submit" style="dispay:none"><?php if($lang=='ar'){ echo 'تحديث';}  
                                else
                                { echo 'Update Profile';}?></button>
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
  
    <script language="JavaScript" type="text/javascript">
     function change_button()
     {
        document.getElementById("update_profile").style.display="block";
        document.getElementById("edit_profile").style.display="none";
        $("input[name='f_name']").removeAttr("readonly");  
        $("input[name='l_name']").removeAttr("readonly");  
        
         
     }
        
        $('select').formSelect();
        $(function () {
            
                    $('form').on('submit', function (e) {
            
                      e.preventDefault();
                     $.cookie("first_name",document.getElementById("f_name").value);
                     $.cookie("last_name",document.getElementById("l_name").value);
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
                        success: function(response) {
                        console.log(response.status);
                          var data = JSON.parse(response);
                          console.log(data.status);
                          if(data.status=="success")
                           {
                        var lang=localStorage.getItem("lang");
                       // alert(lang);
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
                                    })
                                    //location.href="profile.php";
                           }
                           else
                           {
                               Swal.fire({
                                      type: 'error',
                                      title: data.status,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      html:
                                      '<p class="trans-rejected">'+data.message+'</p>',
                                      width:'690px',
                                      background: '#fff',
                                      customClass: 'error-msg',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    })
                               
                           }
                        
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            
                            Swal.fire({
                                      type: 'error',
                                      title: errorThrown,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      html:
                                      '<p class="trans-rejected">'+textStatus+'</p>',
                                      width:'690px',
                                      customClass: 'error-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    })
                            
                        }
                       
                        
                                
                    });
            
                  });
                  });
    
    </script>
    <?php include 'footer.php';?>
<style>
    .cart {
    position: relative;
    left: auto;
    margin-top: 0.9%;
    right: 0px;
}
.circle {
    margin-left: 16px;
    margin-top: -25px;
}
@media only screen and (max-width: 600px)
        {
            .cart {
                    position: absolute;
                    left: auto;
                    margin-top: 15px;
                    right: 35px;
                }
                .circle {
                    margin-left: 16px;
                    margin-top: -32px;
                }
        }
</style>
