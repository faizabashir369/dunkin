

<section id="rate-website">
    <?php $lang= $_COOKIE["lang"]; ?>
    <form action="form_submit.php" method="post" id="rate-web">
        <?php if(isset($_COOKIE["shopify_customer_id"]) && isset($_COOKIE["customer_id"])){
        $customer_id=$_COOKIE["customer_id"];
        $shopify_customer_id=$_COOKIE["shopify_customer_id"];
    }
    else
    {
        $customer_id="0";
    }
     ?>
    <div class="rating-stars text-center">
                <div class="stars star-rating center-align" id="star-rating-2">
                    <span class="fa fa-star-o" data-rating="1"></span>
                    <span class="fa fa-star-o" data-rating="2"></span>
                    <span class="fa fa-star-o" data-rating="3"></span>
                    <span class="fa fa-star-o" data-rating="4"></span>
                    <span class="fa fa-star-o" data-rating="5"></span>
                    <input type="text" name="order_rating" id="order_rating"  id="rating-services" class="rating-value"/>
                    <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $_COOKIE["customer_id"];?>">
                    <input type="hidden" id="customer" name="customer" value="<?php echo $_COOKIE["customer"];?>">
               
                </div>
    </div>
    <p class="wf-text-1 center-align"><?php if($lang=='ar'){ echo " كيف تقيم خدمتنا؟ ";}  
                                else
                                { echo "How Do You Rate Our Services?";} ?></p>
    
    <?php if(isset($_COOKIE["customer"] ) && isset($_COOKIE["customer_id"])){  ?>

    <input type="submit" class="hpts_e_btn center-align" value="<?php if($lang=='ar'){ echo "التقييم";}  
                                else
                                { echo "RATE US";} ?>">

<?php } else { ?>

   <div> <a href="/PWA2/public/login.php" class="hpts_e_btn center-align"><?php if($lang=='ar'){ echo "التقييم";}  
                                else
                                { echo "RATE US";} ?></a> </div>

<?php } ?>


    </form>
    <br><br><br>
</section>
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
                        
                        
                    $('form#rate-web').on('submit', function (e) {
                        console.log("button clicked");
                        var post_url = $('form#rate-web').attr("action"); 
                        var formData = new FormData($('form#rate-web')[0]);
                        var order_rating=document.getElementById("order_rating").value;
                        var customer_id=document.getElementById("customer_id").value;
                        var customer=document.getElementById("customer").value;
                        
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
                        if(order_rating=="")
                        {
                             var message="<?php if($lang=='ar'){ echo "يرجى التقييم للمتابعة";}else{ echo "Please select rating to proceed";} ?>";
                    
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
                        
                      $.ajax({
                        type: 'post',
                        url: 'form_submit.php',
                        data: { 'customer' : customer,'customer_id' : customer_id, 'order_rating' : order_rating },
                        
                        beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                        }
                        
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                            console.log(response);
                            console.log(textStatus);
                            response=JSON.parse(response);
                        var lang=<?php echo $lang; ?>;
                        lang=<?php echo $lang= $_COOKIE["lang"]; ?>;
                        if(response.language=='ar')
                        {
                            var ok="موافق";
                            var dunkin="دانكن";
                        }
                        else
                        {
                             ok="OK";
                             dunkin="Dunkin";
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
                                    })
                        })
                        .fail  (function(jqXHR, textStatus, errorThrown) 
                        {  
                            Swal.fire(
                                      errorThrown,
                                      textStatus,
                                      'error'
                                    )
                            
                        })
                        
                        }        
                    });
            
                 
                  
                  
                        </script>
<footer>
        <div class="row">
        
        <div class="col s6 m4 l2" <?php if($lang=='ar'){ echo "style='float:right;'";}?>><!-- <a href="about_us.php">About Us</a> -->
        <ul>
            <?php if($lang=='ar'){?>
            <li><a href="about_us.php">نبذة عنا</a></li>
            <li><a href="about_us.php#vision">قيمنا</a></li>
            <li><a href="about_us.php#mission">مهمتنا</a></li>
            <li><a href="gallery.php">معرض الصور</a></li>
            <li><a href="news.php">الأخبار والفعاليات</a></li>
            <li><a href="faq.php">الاسئلة الشائعة</a></li>
                             <?php }   else
                                {?> 
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="about_us.php#vision">Our Vision</a></li>
            <li><a href="about_us.php#mission">Our Mission</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="news.php">News and Events</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <?php } ?>
        </ul>
        </div>
        <div class="col s6 m4 l2" <?php if($lang=='ar'){ echo "style='float:right;'";}?>><!-- <a href="#">Contact uS</a> -->
        <ul>
            <?php if($lang=='ar'){?>
            <li><a href="contact_us.php">تواصل معنا</a></li>
            <li><a href="career.php">الوظائف</a></li>
            <li><a href="loyality_balance.php">دنكاوي</a></li>
            <li><a href="giftcard_content.php">دنكنها</a></li>
            <?php }   else
                                {?> 
                                <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="career.php">Career</a></li>
            <li><a href="loyality_balance.php">Dunkawy</a></li>
            <li><a href="giftcard_content.php">Dunkinha</a></li>
            
             <?php } ?>
        </ul>
        </div>
         <div class="col s12 m4 l3" <?php if($lang=='ar'){ echo "style='float:right;'";}?> ><!-- <a href="policy.php">Privacy Policy</a> -->
        <ul>
            <?php if($lang=='en'){?>
            <li><a href="terms.php">Terms and Conditions</a></li>
            <li><a href="policy.php">Privacy Policy</a></li>
            <li><a href="terms.php#refund_policy">Refund Policy</a></li>
            <?php }   else
                                {?> 
                                <li><a href="terms.php">الشروط والاحكام</a></li>
            <li><a href="policy.php">سياسة الخصوصية</a></li>
            <li><a href="terms.php#refund_policy">سياسة الاسترجاع</a></li>
            <?php } ?>
        </ul>
        </div>
        <div class="col s12 m12 l5"> <!-- <a href="#">Newsletters</a>
        <p class="news">We will keep you informed of the latest products and seasonal offers:</p>
        <form>
           <input type="email" name="email" id="email" class="email" placeholder="   Email Address"/>
        
        <button type="button" class="submit loc">Submit </button> 
        </form>
        -->
        </div>
        </div>
        <div class="social">
            <a href="https://twitter.com/DunkinDonutsKSA" class="btn-floating">
                <i class="fa fa-twitter"></i> 
            </a>
            <span>&nbsp;&nbsp; </span>
            <a href="https://snapchat.com/dunkindonutsksa" class="btn-floating">
              <i class="fa fa-snapchat"></i> 
            </a>
            <span>&nbsp;&nbsp; </span>
            <a href="https://instagram.com/dunkindonutsksa" class="btn-floating">
                <i class="fa fa-instagram"></i> 
            </a>
            <span>&nbsp;&nbsp; </span>
            <a href="https://facebook.com//dunkindonutsksa" class="btn-floating">
               <i class="fa fa-facebook"></i> 
            </a>
            <span>&nbsp;&nbsp; </span>
            <span class="btn-floating share-btn">
                <i class="fa fa-share-alt"></i> 
            </span>
        </div>
        <div class="center-align copyright">
        <?php if($lang=='ar'){ 
        echo "جميع الحقوق محفوظة لدانكن السعودية";
       ?>
       <span class="number"><?php echo  date("Y");?></span> 
             
       <?php  }  else
                                { echo "© 2021 Dunkin’ Coffee Company. All rights reserved";} ?></div>
        <script>
        
        if (navigator.share) {
          // we can use web share!
        } else {
          // provide a fallback here
        }
        const shareBtn = document.querySelector('.share-btn');

        shareBtn.addEventListener('click', () => {
          if (navigator.share) {
            navigator.share({
              url: window.location.href
            }).then(() => {
              console.log('Thanks for sharing!');
            })
            .catch(err => {
              console.log(`Couldn't share because of`, err.message);
            });
          } else {
            console.log('web share not supported');
          }
        });

          //  const ogBtnContent = shareBtn.textContent;
          //  const title = document.querySelector('h1').textContent;
            const url = document.querySelector('link[rel=canonical]') &&
            document.querySelector('link[rel=canonical]').href ||
            window.location.href;

                
                if (localStorage.getItem('cartCount') !=null)
                {
                    var itemCount=localStorage.getItem('cartCount');
                   // document.getElementById('cart').innerHTML=itemCount;
                       if(Number.isNaN(localStorage.getItem('cartCount')))
                        {
                            document.getElementById('cart').innerHTML='0';
                        }
                        else
                        {
                            document.getElementById('cart').innerHTML=itemCount;
                        }
                
                }
            
            
        </script>
        <script src="js/materializedatetimepicker.js"></script>
            <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
    <script>
    if($.cookie("device_id")==null || $.cookie("device_id")==undefined)
    {
        $.cookie("device_id","gfshdgfh");
        var config = {
            'messagingSenderId': '451033834534',
            'apiKey': 'AIzaSyAEvobbxLyxO-Tnf-5XBY6LlZZGJ5NGZDc',
            'projectId': 'dunkin-ksa-1574702746362',
            'appId': '1:451033834534:web:900d2532d3ae09dd95f2e7',
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging.getToken().then(function(token) {
                localStorage.setItem("device_id",token);
                $.cookie("device_id",token);
                console.log(token);
            });
        messaging
            .requestPermission()
            .then(function () {
                
                console.log("Notification permission granted.");
                
                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                localStorage.setItem("device_id",token);
                $.cookie("device_id",token);
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
                localStorage.setItem("device_id","gfshdgfh");
                $.cookie("device_id","gfshdgfh");
            });

        let enableForegroundNotification = true;
        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload);

            if(enableForegroundNotification) {
                const {title, ...options} = JSON.parse(payload.data.notification);
                navigator.serviceWorker.getRegistrations().then(registration => {
                    registration[0].showNotification(title, options);
                });
            }
        });
    }
    </script>
    </footer>
    </html>
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
            console.log("rate");
            $(this).siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar($(this).parent());
            });

<?php if($lang=='ar')
{?>
//$("input[required], textarea[required], select[required]").attr("oninvalid", InvalidMsg(this));

$("input[required], textarea[required], select[required]").attr("oninvalid", "InvalidMsg(this)");

function InvalidMsg(textbox ) {
    if (textbox.value == '') {
        textbox.setCustomValidity('يرجى ادخال البيانات');
    }
    else if (textbox.validity.typeMismatch){
        textbox.setCustomValidity('Please enter valid value');
    }
    else {
       textbox.setCustomValidity('');
    }
    return true;
}

    

//$("input[required], textarea[required], select[required]").attr("oninput", "setCustomValidity('')");

<?php }?>

    </script>
            <div id="loaderIcon"><img src="images/loader.gif" ></div>
            <script>
               $('#loaderIcon').show();  // Hide it initially
            </script>