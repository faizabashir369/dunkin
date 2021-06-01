<?php
    session_start();
    if($_COOKIE["customer"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
    }
    else
    {
        header("Location:login.php");
    }


    include 'header.php';
    include 'sidebar.php';
?>
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
            url: "loyality_content.php",
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