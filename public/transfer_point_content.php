 
  
  <?php
   $lang=$_COOKIE['lang'];
 
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
        $data=$data['data'];
        $cards=$data['cards'];
        foreach($cards as $card)
        {
            $card_number=$card['card_number'];
            $points= $card['active_points'];
        }
        
?>

            <form action="form_submit.php" method="post" enctype="multipart/form-data" class="transfer_points" id="transfer_points">
                <div class="img_web">
                <img src="images/transfer_points.png" alt="transfer" >
                </div>
                <div class="img_mobile">
                <img src="images/transfer_points.png" alt="transfer" style="max-width: 100%;max-height: 100%;">
                </div>
    <?php
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
                      <h4><?php if($lang=='ar'){ echo 'تحويل النقاط';}else{ echo 'Transfer Points';} ?></h4>
                      <p><?php if($lang=='ar'){ echo 'يرجى اختيار بطاقة دنكاوي او دنكنها المراد تحويل النقاط منها';}else{ echo 'Please Enter Dunkawy / Dunkinha Card you want to transfer Point to';} ?></p>
                      <div class="row">
                        <div class="input-field col  s12 m12 l12">
                              <select class="browser-default" id="card_select" name="choose_card" required="" aria-required="true">
                                <option value="" disabled selected><?php if($lang=='ar'){ echo ' اختر البطاقة';}else{ echo 'Choose Your Card';} ?></option>
                                <option value="<?php echo $card_number;?>"><?php if($lang=='ar'){ echo 'رقم البطاقة :';}else{ echo 'Card Number:';} ?> <?php echo $card_number;?>, SR : <?php echo $points;?></option>
                                <?php 
                                foreach($data['data'] as $val) 
                                 { 
                                
                                foreach($val as $card) 
                                { ?>
                                <option value="<?php echo $card['card_number'];?>"><?php if($lang=='ar'){ echo 'رقم البطاقة   :';}else{ echo 'Card Number:';} ?> <?php echo $card['card_number'];?>, SR : <?php echo $card['active_points'];?></option>
                                
                                <?php } } ?>
                                
                              </select>
                        </div>
                        </div>
                        
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="card_to" type="text" oninput="numberOnly(this.id);"  name="card_to" maxLength="7" minLength="7"  class="validate" required="required" aria-required="true">
                          <label for="card_to"><?php if($lang=='ar'){ echo 'الى رقم بطاقة دنكاوي';}else{ echo 'To Dunkaway Card number';} ?></label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="amount" type="number" name="amount" min="1" class="validate" required="required" aria-required="true">
                          <label for="amount"><?php if($lang=='ar'){ echo 'ادخل المبلغ';}else{ echo 'Enter Amount';} ?></label>
                        </div>
                      </div>
                      
                      <div class="row">
                      <div class="input-field col s12 m12 l12">
                          <div class="reg-btn">
                              <input  type="hidden" name="transfer" class="validate" value="1">
                            <button class="submit transfer" type="submit" name="submit"><?php if($lang=='ar'){ echo 'تحويل النقاط';}else{ echo 'Transfer Points';} ?></button>
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
     
    
     $("select[required]").css({
      display: "inline",
      height: 0,
      padding: 0,
      width: 0
    });
    function numberOnly(id) {
    var element = document.getElementById(id);
    var regex = /[^0-9]/gi;
    element.value = element.value.replace(regex, "");
    }

    $(function () {
            
                    $('#transfer_points').on('submit', function (e) {
            
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
                            
                            console.log(document.getElementById("amount").value);
                            
                           var lang=$.cookie('lang');
                        
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
                        
                        
                            if(response.status == "success")
                            {
                               if(response.message=="messages.Transfer Completed!")
                               {
                                response.message="Transfer Completed!";
                               }
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
                                    } 
                                    else {

                                    }
                                    });
                                   // document.getElementById('transfer_points').reset();
                             
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
   
 

