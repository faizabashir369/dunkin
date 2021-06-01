 <?php include 'header.php';

 if(isset($_COOKIE['lang']))
  {
   $lang= $_COOKIE['lang'];
  }
  else
    {
      $_COOKIE['lang']='en';
      $lang=$_COOKIE['lang'];
    }?>
 <?php include 'sidebar.php';?>
 

            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="contact-form" class="center-align">
              <input type="hidden" name="contactForm"/>
                <h2><?php if($lang=='ar'){ echo "تواصل معنا";}else{ echo "Contact Us";} ?></h2>
                <p class="contact_p"><?php if($lang=='ar'){ echo "في سبيل تحسين خدماتنا، يرجى التواصل معنا لدى وجود اي شكوى او مقترح";}else{ echo "In order to improve the quality of our 
                services and products, we are open to receive 
                    your thoughts, criticism, and all your inquiries.";} ?> 
                    </p><br></br>
                      <div class="row">
                        <div class="input-field col s12 m12 l12 no-padding">
                          <i class="material-icons prefix">perm_identity</i>
                          <input id="name" name="name" type="text" class="validate" required="" aria-required="true"
                          value="<?php if(isset($_COOKIE["first_name"])) { echo $_COOKIE["first_name"];echo " ";echo $_COOKIE["last_name"];  }?>">
                          <label for="name"><?php if($lang=='ar'){ echo "الاسم";}else{ echo "Full Name";} ?></label>
                        </div>
                      </div>
                      
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12 no-padding">
                          <i class="material-icons prefix">mail_outline</i>
                          <input id="email" type="email" name="email" class="validate" required="" aria-required="true"
                          value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; }?>">
                          <label for="email"><?php if($lang=='ar'){ echo "البريد الالكتروني";}else{ echo "Email Address";} ?></label>
                        </div>
                      </div>
                      
                      
                      
                      
                        <div class="row">
                        <div class="input-field col s12 m12 l12 no-padding">
                          <i class="material-icons prefix">phone_android</i>
                          <input  id="mobile_no" type="tel"  name="mobile_no" class="validate" required="" aria-required="true" 
                          value="<?php if(isset($_COOKIE["phone"])) { echo $_COOKIE["phone"]; }?>">
                          <label for="mobile_no"><?php if($lang=='ar'){ echo "رقم الجوال";}else{ echo "Phone";} ?></label>
                        </div>
                      </div>
                      
                      
                      
                      <div class="row">
                          
                        <div class="input-field col  s12 m12 l12">
                        <i class="material-icons prefix" style="position:absolute;left:-2px;">format_align_justify</i>
                              <select name="reason" required="required" aria-required="true">
                                <option value="" disabled selected><?php if($lang=='ar'){ echo "سبب التواصل";}else{ echo "Select Reason Of Contact";} ?></option>
                                <option value="<?php if($lang=='ar'){ echo " مشكلة في بطاقة دنكاوي";}else{ echo "Dunkway Card Issue";} ?>"><?php if($lang=='ar'){ echo "مشكلة في بطاقة دنكاوي";}else{ echo "Dunkway Card Issue";} ?></option>
                                <option value="<?php if($lang=='ar'){ echo "مقترح لموقع جديد";}else{ echo "Site proposal for a new dunkin branch";} ?>"><?php if($lang=='ar'){ echo "مقترح لموقع جديد";}else{ echo "Site proposal for a new dunkin branch";} ?></option>
                                <option value="<?php if($lang=='ar'){ echo "استرجاع";}else{ echo "Returns";} ?>"><?php if($lang=='ar'){ echo "استرجاع";}else{ echo "Returns";} ?></option>
                                <option value="<?php if($lang=='ar'){ echo "مقترح";}else{ echo "Suggestions";} ?>"><?php if($lang=='ar'){ echo "مقترح";}else{ echo "Suggestions";} ?></option>
                              </select>
                        </div>
                      </div>
                      
                      <div class="row">
                       <div class="col s12 m12 l12">
                            
                            <div class = "row center-align" >
                               <div class = "input-field s12 m12 l12">
                                  <textarea id = "notes_survey" name="notes" placeholder="<?php if($lang=='ar'){ echo "";}else{ echo "Add you message";} ?>" class = "materialize-textarea contact_message" required></textarea>
                                  <!--<label for ="notes" class="notes_survey"><i class = "material-icons edit">mode_edit</i>Add your message...</label>-->
                               </div>
                            </div>
                        </div>
                      </div>
                      
                        <div class = "row">
                            <div class = "file-field input-field">
                               <div class="btn attachment_btn">
                                 <span><img src="images/attach.png"></span>
                                 <input type = "hidden"  id="base64" name="base64_image" value=""/>
                                 <input type ="file" name="image[]"  id="file" multiple/>
                                </div>
                                    <div class = "file-path-wrapper">
                                        <input class = "file-path validate" type = "text" style="width:120%;"/>
                                    </div>
                              
                            </div>    
                            <p id="b64"></p>
                              <img id="img">
                        </div>
                        
                        
                      
                      <div class="row">
                      <div class="input-field col s12 m12 l12">
                          <div class="reg-btn">
                            <button class="submit register log_in" id="submit" name="contact"><?php if($lang=='ar'){ echo " ارسل الان";}else{ echo "Send Now";} ?></button>
                         </div>
                      
                      </div>
                      </div>
    
            </form>
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
  
       
    <script>
    
        $(document).ready(function(){
             $('select').formSelect();
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
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                       
                        beforeSend: function(){
                       $("#loaderIcon").show();
                       },
                        success: function(response) {
                       // alert(response);
                          var data = JSON.parse(response);
                          
                          console.log(data.success);
                        //  alert(data);
                          
                          if(data.success=="1")
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
                                    })
                           }
                           else
                           {
                               Swal.fire({
                                      type: dunkin,
                                      title: data.status,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                      html:
                                      '<p class="trans-rejected">'+data.message+'</p>',
                                      width:'690px',
                                      background: '#fff',
                                      
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    })
                               
                           }
                            // Hide image container
                            
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
                  
            function readFile() {
                 var file = this.files[0];
                var fileType = file.type;
                var lang="<?php echo $_COOKIE['lang'];?>";
                
                if(lang=='ar')
                {
                  var msg='عذرا، لا يمكن رفع المرفقات الا بصيغة JPG, JPEG, PNG.';
                }
                else
                {
                  var msg='Sorry, onlyJPG, JPEG, & PNG files are allowed to upload.';
                }
                var match = ['image/jpeg', 'image/png', 'image/jpg'];
                if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
                    alert(msg);
                    $("#file").val('');
                    return false;
                }
                
                  if (this.files && this.files[0]) {
                    
                    var FR= new FileReader();
                    
                    FR.addEventListener("load", function(e) {
                      document.getElementById("img").src       = e.target.result;
                      document.getElementById("img").style.height="250px";
                      document.getElementById("base64").value = e.target.result;
                    }); 
                    
                    FR.readAsDataURL( this.files[0] );
                  }
                  
                }
                
            document.getElementById("file").addEventListener("change", readFile);

            // File type validation
            $("#file").change(function() {
                var file = this.files[0];
                var fileType = file.type;
                var lang="<?php echo $_COOKIE['lang'];?>";
                
                if(lang=='ar')
                {
                  var msg='عذرا، لا يمكن رفع المرفقات الا بصيغة JPG, JPEG, PNG.';
                }
                else
                {
                  var msg='Sorry, onlyJPG, JPEG, & PNG files are allowed to upload.';
                }
                var match = ['image/jpeg', 'image/png', 'image/jpg'];
                if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
                    alert(msg);
                    $("#file").val('');
                    return false;
                }
            });
    </script>
            <?php include 'footer.php';?>
           
<?php if($lang=='ar')
{?>
<style>
  .input-field .prefix ~ label {
   
    padding-right: 60px !important;
}

</style>
<?php }?>