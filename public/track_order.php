<?php include 'header.php';?>
<?php include 'sidebar.php';?>


                <div id="orders">
                    
                    <div class="track_order">
                        <h2><?php  if($lang=="ar"){ echo "متابعة الطلب";}else
                        {echo "Track Order";
                        }
                        echo $_POST['order_no'];?></h2>
                        <h5><?php if($lang=="ar"){ echo "وقت الاستلام";}else
                        {echo "Estimated time";
                        }?></h5>
                        <p><i class="large material-icons valign">access_alarm</i><?php echo $_POST['time'];?></p>
                    </div>
                    <?php if(isset($_POST['placed'])){?>
                    <div class="row active_orders order-stats valign-wrapper">
                        <div class="col s1 m1 l1 center-align">
                          <?php if(isset($_POST['placed'])){?>
                          <span class="v_align"><img class="responsive-img" src="images/radio.svg"></span>
                          <?php }else
                          {
                          ?>
                          <span><img class="responsive-img" src="images/radio-inactive.svg"></span>
                          <?php } ?>
                        </div>
                        <div class="col s10 m10 l10">
                        <p>
                          <div class="order-msg">
                              <?php
                            
                            
                              if($lang=="ar"){
                                        echo "تم ارسال الطلب";  
                                        }
                                         else {
                                             echo "Order has been placed";
                                        }
                             
                                ?></div>
                          <span class="order-time"><i class="large material-icons clock">access_alarm</i><?php echo $_POST['placed-time']?></span><br>
                        </p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($_POST['order_status']=="Rejected"){?>
                     <div class="row active_orders order-stats valign-wrapper">
                       <div class="col s1 m1 l1 center-align">
                        <?php if($_POST['order_status']=="Rejected"){?>
                          <span class="v_align"><img class="responsive-img" src="images/radio.svg"></span>
                          <?php }else
                          {
                          ?>
                          <span class="v_align"><img class="responsive-img" src="images/radio-inactive.svg"></span>
                          <?php } ?>
                        </div>
                        <div class="col s10 m10 l10">
                        <p>
                          <div class="order-msg">
                               <?php
                               if($_POST['order_status']=="Rejected" && $lang=="ar")
                             {
                                 echo "تم رفض الطلب";
                             }
                             elseif($_POST['order_status']=="Rejected" && $lang=="en")
                             {
                                 echo "Order isRejected";
                             }
                                ?></div>
                          <?php if(isset($_POST['processing'])){?>
                          <span class="order-time"><i class="large material-icons clock">access_alarm</i><?php echo $_POST['processing-time']?></span><br>
                          <?php } ?>
                        </p>
                        </div>
                    </div>
                  <?php } ?>
                    <?php if($_POST['order_status']=="Not Available"){?>
                    <div class="row active_orders order-stats valign-wrapper">
                       <div class="col s1 m1 l1 center-align">
                        <?php if($_POST['order_status']=="Not Available"){?>
                          <span class="v_align"><img class="responsive-img" src="images/radio.svg"></span>
                          <?php }else
                          {
                          ?>
                          <span class="v_align"><img class="responsive-img" src="images/radio-inactive.svg"></span>
                          <?php } ?>
                        </div>
                        <div class="col s10 m10 l10">
                        <p>
                          <div class="order-msg">
                               <?php
                              if($_POST['order_status']=="Not Available" && $lang=="ar")
                             {
                                echo "الطلب غير متوفر";
                             }
                             elseif($_POST['order_status']=="Not Available" && $lang=="en")
                             {
                                 echo "Order is not Available";
                             }
                                        
                                ?></div>
                          <?php if(isset($_POST['processing'])){?>
                          <span class="order-time"><i class="large material-icons clock">access_alarm</i><?php echo $_POST['processing-time']?></span><br>
                          <?php } ?>
                        </p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row active_orders order-stats valign-wrapper">
                       <div class="col s1 m1 l1 center-align">
                        <?php if(isset($_POST['processing'])){?>
                          <span class="v_align"><img class="responsive-img" src="images/radio.svg"></span>
                          <?php }else
                          {
                          ?>
                          <span class="v_align"><img class="responsive-img" src="images/radio-inactive.svg"></span>
                          <?php } ?>
                        </div>
                        <div class="col s10 m10 l10">
                        <p>
                          <div class="order-msg">
                               <?php
                              if($lang=="ar"){
                                        echo "جاري تحضير الطلب";  
                                        }
                                         else {
                                             echo "Order is under processing";
                                        }
                                ?></div>
                          <?php if(isset($_POST['processing'])){?>
                          <span class="order-time"><i class="large material-icons clock">access_alarm</i><?php echo $_POST['processing-time']?></span><br>
                          <?php } ?>
                        </p>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row active_orders order-stats valign-wrapper">
                        <div class="col s1 m1 l1 center-align">
                        <?php if(isset($_POST['ready'])){?>
                          <span class=""><img class="responsive-img" src="images/radio.svg"></span>
                          <?php }else
                          {
                          ?>
                          <span class=""><img class="responsive-img" src="images/radio-inactive.svg"></span>
                          <?php } ?>
                        </div>
                        <div class="col s10 m10 l10">
                        <p>
                          <div class="order-msg"><?php
                              if($lang=="ar"){
                                        echo "الطلب جاهز للاستلام";  
                                        }
                                         else {
                                             echo "Order is ready to pickup";
                                        }
                                ?></div>
                           <?php if(isset($_POST['ready'])){?>
                          <span class="order-time"><i class="large material-icons clock">access_alarm</i><?php echo $_POST['ready-time']?></span><br>
                          <?php } ?>
                        </p>
                        </div>
                    </div>
                    
                    
                    
                    
                 <!--   <div class="row active_orders order-stats valign-wrapper">
                        <div class="col s1 m1 l1 center-align">
                          <?php if(isset($_POST['completed'])){?>
                          <span class="v_align"><img class="responsive-img" src="images/radio.svg"></span>
                          <?php }else
                          {
                          ?>
                          <span><img class="responsive-img" src="images/radio-inactive.svg"></span>
                          <?php } ?>
                        </div>
                        <div class="col s10 m10 l10">
                        <p>
                            
                          <div class="order-msg">Order is completed</div>
                           <?php if(isset($_POST['completed'])){?>
                          <span class="order-time"><i class="large material-icons clock">access_alarm</i><?php echo $_POST['completed-time']?></span><br>
                           <?php } ?>
                        </p>
                        </div>
                    </div> -->
                    <div class="row no-padding reciepts last center-align">
                        <div class="col s12 m12 l12">
                        <?php
                           if(($_POST['order_status']=="Rejected" || $_POST['order_status']=="Not Available") && $lang=="en")
                           {?>
                           
                           <?php
                               echo "<p class='no-avail'>Sorry we can not process your order now.The total amount will be refunded within 24 to 48 hours</p>";
                           }
                           elseif(($_POST['order_status']=="Rejected" || $_POST['order_status']=="Not Available") && $lang=="ar")
                           {
                               echo "<p class='no-avail'>عذرا لا يمكننا معالجة طلبك الان. سيتم إعادة المبلغ خلال 24 الى 48 ساعة</p>";
 
                           }
                          
                           else
                           {
                        ?>
                        <div class="col s6 m6 l6">
                            <h1 class="pick_up_loc">
                                <?php
                              if($lang=="ar"){
                                        echo "موقع الاستلام";  
                                        }
                                         else {
                                             echo "PICK-UP location";
                                        }
                                ?>
                                </h1>
                            <p class="pick_up_loc"><?php echo $_POST['store'];?></p>
                            <p class="pick_up_loc"><?php echo $_POST['address'];?></p>
                            <p class="pick_up_loc"><?php echo $_POST['city'];?></p>
                            <p class="pick_up_loc"><?php echo $_POST['country'];?></p>
                            <p class="get-directions">
                                <a class="pink_font" href="<?php echo $_POST['map_link'];?>"><i class="material-icons">location_on</i><?php
                              if($lang=="ar"){
                                        echo "العنوان";  
                                        }
                                         else {
                                             echo "LOCATION";
                                        }
                                ?></a>
                            </p>
                        </div>
                    
                        <div class="col s6 m6 l6" style="line-height:0">
                            <img class="active-map" src="images/map_3.PNG" alt="map" class ="responsive-img">
                        </div>
                        <?php } ?>
                    
                    </div>
                    </div>
                </div>
            </div>
 
             <div class="col s6 m4 l1">
                 
            
            </div>
        </div>
      </div>
    
    </div>
<?php include 'footer.php';?>