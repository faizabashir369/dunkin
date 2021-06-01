<?php include 'header.php';?>
<?php include 'sidebar.php';
if(isset($_COOKIE["customer_id"]))
{
$customer_id=$_COOKIE["customer_id"];
}
else
{
    $customer_id="0";
}
$announce_id=$_POST['announce_id'];
$status=$_POST['status'];
?>
            <div class="notification_details">
                    <br>
                    <img class="notify_det_img" width="auto" src="<?php echo $_POST['n_image'];?>" alt="">
                    <div class="details">
                        <h3 class="notif_title pink-font"><?php echo $_POST['n_title'];?></h3>
                        
                       
                        <a style="display:none" class="calander btn-floating btn-large pink-clr" id="calander"><i class="large_icon material-icons">event_note</i></a>
                        <div class="time"><i class="material-icons clock">access_time</i><?php echo $_POST['n_time'];?>, <?php echo $_POST['n_date'];?></div><br><br>
                        <p><?php echo $_POST['n_description'];?></p>
                        <?php
                        
                        
                       //set it to writable location, a place for temp generated PNG files
                        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
                        
                        //html PNG location prefix
                        $PNG_WEB_DIR = 'temp/';
                    
                        include "Qrcode/qrlib.php";    
                        
                        //ofcourse we need rights to create temp dir
                        if (!file_exists($PNG_TEMP_DIR))
                            mkdir($PNG_TEMP_DIR);
                        
                        
                        $filename = $PNG_TEMP_DIR.$_POST['qr'].'.png';
                    
                        $errorCorrectionLevel = 'H';    
                    
                        $matrixPointSize = 10;
                        
                        $requestData="%".$_POST['qr']."?";
                        

                        $filename = $PNG_TEMP_DIR.'test'.md5($requestData.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                        QRcode::png($requestData, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
                                          
                ?>
                <div class="img_web">
                <img src="<?php echo $PNG_WEB_DIR.basename($filename); ?>" alt="QR Code" >
                </div>
                <div class="img_mobile">
                <img src="<?php echo $PNG_WEB_DIR.basename($filename); ?>" alt="QR Code" >
                </div>
                    
                         </div>
                        </div>
                
                    </div>
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
   
    </div>
    <script>
  var customer_id=$.cookie('id');
  var anouncement_id=<?php echo $announce_id;?>;
  var status=<?php echo $status;?>;
  if(status==0)
  {
                                    $.ajax({
                                    url: 'https://dunkinsa.abstractagency.net/api/v2/announcements/updateAnnouncementStatus/?customer_id='+customer_id+'&announcement_id='+anouncement_id,
                                    type: 'get',
                
                                    beforeSend: function(){
                                    
                                    },
                                    complete:function(data){
                                     
                                    }
                                    })
                                    .done  (function(response, textStatus, jqXHR)        
                                    { 
                                       //alert(document.getElementById(anouncement_id).classList);
                                       if (document.getElementById(anouncement_id).classList.contains('unread') ){
                                          document.getElementById(anouncement_id).classList.remove('unread');

                                       document.getElementById(anouncement_id).style.background="#fff";
                                       document.getElementById(anouncement_id).classList.add('read');
                                       var count=parseInt(document.getElementById('notifyCount').innerHTML,10);
                                       count=count-1;
                                       document.getElementById('notifyCount').innerHTML=count;
                                       }
                                       // alert(document.getElementById(anouncement_id).classList);

                                    });           
  }
    </script>
<?php include 'footer.php';?>