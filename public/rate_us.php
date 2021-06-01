<?php 
if($_COOKIE["customer"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
    }
    else
    {
        header("Location:login.php");
    }
include 'header.php';
if(isset($_GET['branch']))
{
    $branch=$_GET['branch'];
}
?>
<?php include 'sidebar.php';?>

                <div id="products_menu" class="survey center-align">
                    <h2><?php if($lang=='ar'){ echo "التقييم";}else{ echo "Evaluation";} ?></h2>
               <form action="form_submit.php" method="post" enctype="multipart/form-data">
                
                      <div class="row survey_row">
                        <div class="input-field col s12 m12 l12">
                          <p><?php if($lang=='ar'){ echo "ما مدى رضاك عن خدماتنا؟";}else{ echo "How satisfied are you with our services";} ?></p>
                            <div class="stars star-rating left-align" id="star-rating-2"> 
                                 <span class="fa fa-star-o" data-rating="1"></span>
                                 <span class="fa fa-star-o" data-rating="2"></span>
                                 <span class="fa fa-star-o" data-rating="3"></span>
                                 <span class="fa fa-star-o" data-rating="4"></span>
                                 <span class="fa fa-star-o" data-rating="5"></span>
                            
                                <input type="text" name="rating-services"  id="rating-services" class="rating-value" />
                            </div>
                         
                        </div>
                      </div>
                      
                      <div class="row survey_row">
                        <div class="input-field col s12 m12 l12">
                           <p><?php if($lang=='ar'){ echo "ما مدى رضاك عن منتجاتنا؟";}else{ echo "How satisfied are you with our products";} ?></p>
                            <div class="stars star-rating left-align" id="star-rating-2"> <span class="fa fa-star-o" data-rating="1"></span>
                                 <span class="fa fa-star-o" data-rating="2"></span>
                                 <span class="fa fa-star-o" data-rating="3"></span>
                                 <span class="fa fa-star-o" data-rating="4"></span>
                                 <span class="fa fa-star-o" data-rating="5"></span>
                            
                                <input type="text" name="rating-products"  id="rating-products" class="rating-value"  />
                            </div>
                        
                        </div>
                      </div>
                      
                      <div class="row survey_row">
                        <div class="input-field col s12 m12 l12">
                          <p><?php if($lang=='ar'){ echo "ما مدى رضاك عن نظافة المحل؟";}else{ echo "How satisfied are you with our Cleanliness of our shop";} ?></p>
                             <div class="stars star-rating left-align" id="star-rating-2"> <span class="fa fa-star-o" data-rating="1"></span>
                             <span class="fa fa-star-o" data-rating="2"></span>
                             <span class="fa fa-star-o" data-rating="3"></span>
                             <span class="fa fa-star-o" data-rating="4"></span>
                             <span class="fa fa-star-o" data-rating="5"></span>
                            
                                <input type="text" name="rating-clean"  id="rating-clean" class="rating-value"  />
                            </div>
                          
                        </div>
                      </div>
                      
                      <div class="row survey_row survey_last">
                        <div class="input-field col s12 m12 l12">
                          <p><?php if($lang=='ar'){ echo "ماهو تقييمك لمظهر وخدمة البائع؟";}else{ echo "How do you rate the appearance and performance of the seller";} ?></p>
                            <div class="stars star-rating left-align" id="star-rating-2"> <span class="fa fa-star-o" data-rating="1"></span>
                              <span class="fa fa-star-o" data-rating="2"></span>
                              <span class="fa fa-star-o" data-rating="3"></span>
                              <span class="fa fa-star-o" data-rating="4"></span>
                              <span class="fa fa-star-o" data-rating="5"></span>
                            
                                <input type="text" name="rating-seller"  id="rating-seller" class="rating-value"/>
                            </div>
                          
                        </div>
                      </div>
                      <div class="row survey_row survey_last ">
                       <div class="col s12 m12 l12 survey_msg">
                            <p class="product_name survey_name"><?php if($lang=='ar'){ echo "مشاركة لنا بالتقييم يساعدنا في تحسين خدماتنا لارضائك";}else{ echo "Sharing your experience with us would 
                                help us to enhance our daily services 
                                and hopefully satisfy you.";} ?></p>
                            <div class = "row center-align" >
                               <div class = "input-field col s12 survey_msg">
                                  <textarea id = "notes_survey" class = "materialize-textarea survey_msg" name="note" placeholder="<?php if($lang=='ar'){ echo " اضف رسالتك";}else{ echo "Add your message...";} ?>"></textarea>
                                 <!-- <label for ="notes" class="notes_survey"><i class = "material-icons edit">mode_edit</i>Add your message...</label>-->
                               </div>
                            </div>
                        </div>
                      </div>
                      
                        <div class = "row survey_row survey_last" id="survey_padding">
                           <div class = "file-field input-field">
                               <div class="btn attachment_btn">
                                 <span><img src="images/attach.png"></span>
                                 <input type = "hidden"  id="base64" name="base64_image" value=""/>
                                 <input type = "file" multiple id="file" />
                              </div>
                              <div class = "file-path-wrapper">
                                 <input class = "file-path validate" type = "text" style="width:120%;"/>
                              </div>
                              
                           </div>    
                           <p id="b64"></p>
                            <img id="img">
                        </div>
                            <div class = "row survey_row survey_last ">
                                <input type = "hidden" name="survey" value="1"/>
                                <input type = "hidden" name="branch" value="<?php echo $branch;?>"/>
                            <button class="submit submit_que" name="submit"><?php if($lang=='ar'){ echo "ارسل الان";}else{ echo "Submit";} ?></button>
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
                            var $star_rating = $('.star-rating .fa');
                            
                            var SetRatingStar = function($star_rating_parent) {
                              return $star_rating_parent.find('.fa').each(function() {
                                if (parseInt($star_rating_parent.find('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                                  return $(this).removeClass('fa-star-o').addClass('fa-star');
                                } else {
                                  return $(this).removeClass('fa-star').addClass('fa-star-o');
                                }
                              });
                            };

                        $star_rating.on('click', function() {
                          $(this).siblings('input.rating-value').val($(this).data('rating'));
                          return SetRatingStar($(this).parent());
                        });
                        </script>
    <script>
    $(function () {
            
                    $('form').on('submit', function (e) {
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
                      e.preventDefault();
                        var seller=document.getElementById("rating-seller").value;
                        var clean=document.getElementById("rating-clean").value;
                        var pro=document.getElementById("rating-products").value;
                        var service=document.getElementById("rating-services").value;
                        var message="<?php if($lang=='ar'){ echo "يرجى التقييم للمتابعة";}else{ echo "Please select rating to proceed";} ?>";
                        if(seller=="" || clean=="" || pro=="" || service=="")
                        {
                            Swal.fire({
                                      
                                      title: dunkin,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                      html:
                                      '<p class="trans-rejected">'+message+'</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    });
                                   
                        }
                        else
                        {
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
                          var data = JSON.parse(response);
                          console.log(data.status);
                          console.log(data.message);
                          if(data.success==1)
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
                                        
                                                
                                                window.location.href="index.php";
                                       
                                    })
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
                        }
            
                  });
                  });
                  
                function readFile() {
                    var file = this.files[0];
                    var fileType = file.type;
                    var match = ['image/jpeg', 'image/png', 'image/jpg'];
                    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
                        alert('Sorry, onlyJPG, JPEG, & PNG files are allowed to upload.');
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
</script>
<?php include 'footer.php';?>
