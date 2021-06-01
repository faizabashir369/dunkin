<?php 
   if(isset($_COOKIE["customer_id"]))
    {
        //echo $_SESSION["customer_id"];
    }
    else
    {
         header("Location:login.php");
    }
    include 'header.php';
    include 'sidebar.php';?>


                <div id="orders" class="list-orders recent_orders">
                    <!-- <h2 id="list_heading center-align hide-on-med-and-down">List of orders</h2> -->
                           <div class="third-menu">
                          
                          <a href="#" class="tablinks s4 active " onclick="openTab(event, 'recent')"><?php if($lang=='ar'){ echo "الطلبات السابقة";}  
                                else
                                { echo 'Recent';}  ?></a>
                          <a href="#" class="tablinks s4" onclick="openTab(event, 'f_orders')">
                              <?php if($lang=='ar'){ echo "الطلبات المفضلة";}  
                                else
                                { echo 'Favourities';}  ?></a>
                          </div>
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
            url: "recent_order_content.php",
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
        function click_a(e,id) {
      //    alert(id);  
        //alert(e.target.id);
        e.stopPropagation();
       // alert('"'+e.target.id+'"');
        //var form_name=e.target.id;
        console.log(document.getElementById('"'+form_name+'"'));
        document.getElementById(id).action="branches_list.php";
        
       var res= document.getElementById(id).submit();
      //   alert(res);
        // alert(e.target.parentNode.id);
         window.location.href="branches_list.php?reorder=1";
          console.log("Anchor clicked");
        }
        function openTab(evt, tabName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(tabName).style.display = "block";
          evt.currentTarget.className += " active";
            }
    </script>

    </script>
<?php include 'footer.php';?>