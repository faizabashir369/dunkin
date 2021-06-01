<?php 

    session_start();

    $_COOKIE["url"] = $_COOKIE['REQUEST_URI'];
    if(isset($_COOKIE["phone"])) {
        $phone=$_COOKIE["phone"];
        $phone=str_replace("+966", "",$phone);
    }
    else
    {
        header("Location:login.php");
    }
include 'header.php';?>
<?php include 'sidebar.php';?>


                <div id="orders">
                    <?php if($lang=="ar"){?>
                    <h2 id="active_order">الطلبات الفعالة</h2>
                    <?php }else{ ?>
                    <h2 id="active_order">My Active Orders</h2>
                    <?php } ?>
                    <div id="rec-orders">
                        
                    </div>
                  
                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
        $( document ).ready(function() {
           console.log("document is ready");
            $.ajax({
            type: "GET",
            url: "active_content.php",
            dataType: "html",
             beforeSend: function(){
                $("#loaderIcon").show();
            },
            complete:function(data){
                $('#loaderIcon').hide();
            }
            }).done(function( data ) {
                $('#rec-orders').html(data);
              
           });
        });
   </script>
<?php include 'footer.php';?>