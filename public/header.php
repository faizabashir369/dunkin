    <?php 
	header("X-XSS-Protection: 0");

    if(isset($_COOKIE["lang"])) {
        $lang=$_COOKIE["lang"];
        }
        else
        {
           $_COOKIE["lang"]="en";
           $lang=$_COOKIE["lang"];
        }
    if(isset($_COOKIE["customer_id"]))
    {
      $customer_id=$_COOKIE["customer_id"];

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
           $_SESSION['loyality_card_number']='';
           $_COOKIE['loyality_card_number']='';
           
        }
        else
        {


        $data=$data['data'];
        $cards=$data['cards'];
        foreach($cards as $card)
        {
            $_SESSION['loyality_card_number']=$card['card_number'];
            $_COOKIE['loyality_card_number']=$card['card_number'];
        }
      }


    }
    else
    {
        $customer_id="0";
    }
        
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/PWA2/public/images/favi.ico" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1" />
    
    <meta name="theme-color" content="#000000" />
    
    <meta name="description" content="Dunkin Donuts" />
   
    <link rel="apple-touch-startup-image" href="images/splash/launch-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="images/splash/launch-750x1294.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="images/splash/flaunch-1242x2148.png" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="images/splash/launch-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="images/splash/launch-1536x2048.png" media="(min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="images/splash/launch-1668x2224.png" media="(min-device-width: 834px) and (max-device-width: 834px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="images/splash/launch-2048x2732.png" media="(min-device-width: 1024px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">

    
    <link rel="apple-touch-icon" href="/PWA2/public/images/logo.svg" />
    
    <link rel="manifest" href="/PWA2/public/manifest.json" />
    
    
    
     <?php include 'style.php'; ?>
   
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css" rel="stylesheet">
    
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    
   
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="js/jquery.datetimepicker.css">
    
    <!-- Compiled and minified JavaScript -->
    
    <script src="index.js" defer></script>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.all.min.js"></script>
   
   <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
   <script src="js/jquery.datetimepicker.full.js" type="text/javascript"></script>
   
    <title>Dunkin  App</title>
  </head>
  <script>
  $("#loaderIcon").show();
  //$("#loaderIcon").css("background", "none");
  window.addEventListener("beforeunload", function (e) { 
    delete e['returnValue'];
    document.querySelector("body").style.visibility = "hidden";
     $("#mycards").hide();
    $("#loaderIcon").show();
   
  });
 
/*  $(document).bind('pageshow', function(event, data) {
    console.log("pageshow --> previous page: ");
});*/

/*var isOnIOS = navigator.userAgent.match(/iPad/i)|| navigator.userAgent.match(/iPhone/i);
var eventName = isOnIOS ? "pagehide" : "beforeunload";

window.addEventListener(eventName, function (event) { 
    window.event.cancelBubble = true; // Don't know if this works on iOS but it might!
    document.querySelector("body").style.visibility = "hidden";
    $("#loaderIcon").show();
} );

var unloaded = false;
window.addEventListener("beforeunload", function(e)
{
    if (unloaded)
        return;
    unloaded = true;
    document.querySelector("body").style.visibility = "hidden";
    $("#loaderIcon").show();
    console.log("beforeUnload");
});
window.addEventListener("visibilitychange", function(e)
{
    if (document.visibilityState == 'hidden')
    {
        if (unloaded)
            return;
        unloaded = true;
        document.querySelector("body").style.visibility = "hidden";
        $("#loaderIcon").show();
        console.log("beforeUnload");
    }
});
*/
  </script>
  <body style="visibility:hidden">
      
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div class="container">
    <nav class="white">
       
    <div class="nav-wrapper">
        <?php if($lang=="ar"){?>
        <a href="index.php">
            <svg class="arabic-logo"  width="118" height="44" viewBox="0 0 118 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M76.1758 3.76992C73.3114 3.76992 70.9347 6.14491 70.9347 9.01039C70.9347 11.8707 73.3452 14.2899 76.1758 14.2899C79.0451 14.2899 81.4162 11.9098 81.4162 9.01039C81.4162 6.06688 79.1195 3.76992 76.1758 3.76992Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M70.9347 20.6521V22.3952H67.7888H67.7882H67.741V22.0719C67.741 18.7855 66.7472 16.2035 64.5327 14.4804C62.3664 12.7948 59.1853 12.056 55.0816 12.056H42.8311L47.1552 10.4032L47.1573 10.4024C48.6915 9.81157 49.697 8.81516 50.1762 7.628C50.6493 6.45578 50.5738 5.18467 50.1153 4.09377C49.1917 1.89621 46.6532 0.320246 43.6261 1.50276L35.9315 4.50209L35.9311 4.50222C30.8026 6.50352 28.5714 10.0685 28.5714 13.5474C28.5714 17.8604 32.0018 21.8269 36.653 21.8269H52.9906C54.3105 21.8269 55.3212 21.8418 56.0993 21.8876C56.8893 21.9342 57.3775 22.0099 57.6818 22.1059C57.827 22.1518 57.9033 22.1942 57.9406 22.2205C57.9721 22.2426 57.9798 22.2554 57.984 22.2626C57.9937 22.2793 58.01 22.3161 58.0238 22.3952H29.7812C28.998 22.3952 28.4053 22.3778 27.9423 22.3292C27.4768 22.2804 27.1969 22.2051 27.0152 22.1201C26.7487 21.9953 26.5554 21.798 26.3004 20.9802C25.9111 19.6848 25.301 18.6233 24.4105 17.8865C23.5078 17.1395 22.3967 16.7924 21.1387 16.7924C19.578 16.7924 18.2324 17.339 17.2874 18.4079C16.3544 19.4634 15.8976 20.9303 15.8976 22.6242V27.8728C15.8976 28.9299 15.6494 29.6557 15.3013 30.0975C14.9755 30.511 14.4976 30.761 13.7984 30.761C13.1868 30.761 12.689 30.4883 12.3053 29.8949C11.8989 29.2665 11.621 28.2634 11.621 26.8866C11.621 26.4209 11.6662 25.8879 11.7158 25.3572C11.721 25.3013 11.7264 25.2449 11.7317 25.1883C11.7743 24.7383 11.8184 24.2728 11.8184 23.9268C11.8184 22.5363 11.3828 21.2949 10.532 20.3937C9.67606 19.4872 8.47159 19.0018 7.09 19.0018C5.08247 19.0018 3.52219 19.9792 2.51727 21.7697C1.54864 23.4956 1.1 25.956 1.1 29.0179C1.1 33.1937 2.20581 36.6663 4.28387 39.1103C6.37586 41.5708 9.37952 42.9 12.9704 42.9C16.8732 42.9 20.027 41.9798 22.3326 39.936C24.2111 38.2707 25.4383 35.9377 26.0933 32.9769C26.2884 33.1418 26.4981 33.2903 26.7232 33.4216C27.5851 33.9243 28.5977 34.132 29.7274 34.1382C29.7435 34.1392 29.7613 34.1398 29.7806 34.1398H67.7882H67.7888H72.9002C75.7672 34.1398 77.9845 33.634 79.4498 32.1508C80.9119 30.6707 81.4162 28.4279 81.4162 25.5058V20.6521C81.4162 17.6403 79.209 15.3712 76.1758 15.3712C73.221 15.3712 70.9347 17.7179 70.9347 20.6521Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M102.871 8.90189L102.869 8.90179C101.458 8.81089 100.114 9.17289 99.0698 10.003C98.0185 10.839 97.3419 12.0948 97.1812 13.6514C96.8569 16.6681 98.6571 19.113 101.53 19.6801C103.094 19.9963 104.437 20.348 105.386 20.9267C105.846 21.2073 106.182 21.5236 106.406 21.8872C106.499 22.0386 106.577 22.2066 106.637 22.3955H99.6939C98.0016 22.3955 96.5058 22.9852 95.4292 24.0379C94.3513 25.0918 93.7427 26.5622 93.7427 28.2273C93.7427 31.6059 96.2369 34.14 99.6939 34.14H111.374C114.516 34.14 116.852 31.8025 116.852 28.6625V24.8341C116.852 20.2938 115.613 16.4466 113.2 13.6509C110.779 10.8462 107.255 9.19132 102.871 8.90189Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M87.7772 2.58584C86.237 2.58584 84.8902 3.13085 83.9293 4.12243C82.9708 5.11137 82.4572 6.48089 82.4572 8.02335V29.2541C82.4572 30.7971 82.9708 32.1669 83.9292 33.156C84.8903 34.1477 86.237 34.6926 87.7772 34.6926C89.3171 34.6926 90.6637 34.1477 91.6245 33.1559C92.5828 32.1668 93.0961 30.7971 93.0961 29.2541V8.02335C93.0961 6.48097 92.5827 5.11148 91.6245 4.12252C90.6637 3.13089 89.3172 2.58584 87.7772 2.58584Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M17.174 16.1518L17.1741 16.1519L17.1781 16.1431C17.7005 15.0025 17.8514 13.4057 17.8514 11.4669C17.8514 9.58614 17.6595 8.00573 16.9877 6.8063C16.0458 5.11905 14.4411 4.41055 12.6103 4.41055C10.1666 4.41055 7.56704 6.17454 7.56704 9.37486C7.56704 9.87628 7.70584 10.7481 7.90525 11.6252C8.35769 13.6321 8.84756 15.345 9.62287 16.5585C10.0215 17.1824 10.5136 17.7049 11.1415 18.0669C11.7729 18.4309 12.4876 18.6013 13.2815 18.6013C14.8487 18.6013 16.3755 17.8471 17.174 16.1518Z" fill="#EA4397" stroke="white" stroke-width="1.8"></path>
</svg>
</a>
        <?php } else
        {?>
      <a href="index.php" class="brand-logo <?php if($lang=='ar'){ echo "arabic-logo";} ?>"><img src="images/logo.svg" class="responsive-img" alt="logo"></a>
      <?php  }
           if($lang=='ar')
           {?>
                <a href="#" class="sidenav-trigger arabic-side-nav show-on-large" data-target="mobile-links-arabic">
          <i class="material-icons menu-clr" id="menu_icon">menu</i>
      </a>

           <?php }
           else
           {?>
               <a href="#" class="sidenav-trigger show-on-large" data-target="mobile-links">
          <i class="material-icons menu-clr" id="menu_icon">menu</i>
      </a>
          <?php }
      ?>
     
      <ul  class="<?php if($lang=='ar'){ echo "arabic-menu";}else{ echo "eng-menu";} ?> hide-on-med-and-down ">
         <?php if($lang=='en'){?>
        <li><a href="active_orders.php"><i class="material-icons" style="display:inline;color:#542400">access_alarm</i> Orders</a></li>
        <li><a href="giftcard_content.php">Gift Cards</a></li>
        <li><a href="loyality_balance.php">Loyality Cards</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="career.php">Career</a></li>
        <li><?php if(isset($_COOKIE["customer"] ) && isset($_COOKIE["customer_id"])){  ?>
            <a class="login-btn" id="log" href="logout.php">Logout</a>
            <?php } else { ?>
            <a class="login-btn" id="log" href="login.php">Login</a>
            <?php } ?>
        </li>  
        <?php } else {?>
        <li><?php if(isset($_COOKIE["customer"] ) && isset($_COOKIE["customer_id"])){  ?>
            <a class="login-btn" id="log" href="logout.php">تسجيل خروج</a>
            <?php } else { ?>
            <a class="login-btn" id="log" href="login.php"> تسجيل دخول </a>
            <?php } ?>
        </li>  
        <li><a href="career.php">الوظائف</a></li>
        <li><a href="gallery.php">معرض الصور</a></li>
        <li><a href="loyality_balance.php">بطاقة دنكاوي</a></li>
        <li><a href="giftcard_content.php">بطاقات دنكنها</a></li>
        
        <li><a href="active_orders.php"><i class="material-icons" style="display:inline;color:#542400;float:right;padding-left: 10px;">access_alarm</i> فعالة </a></li>
        
        <?php } ?>
      </ul>
    </div>
    <div class="nav-content"> 
                <a id="active-order" class="hide-on-med-and-up <?php if($lang=='ar'){ echo "arabic-active";} ?>" href="active_orders.php"><i class="material-icons" style="display:inline;color:#FF671F">access_alarm</i></a>

                <span class="cart <?php if($lang=="ar"){ echo 'arabic-cart';} ?>" onclick="cartCheck()">
                <img src="images/basket.png" alt="cart-img"><div class="circle" id="cart">0</div></span>
                <?php if(isset($_COOKIE["customer"] ) && isset($_COOKIE["customer_id"])){  ?>
                <span><i class="material-icons menu-clr bell <?php if($lang=="ar"){ echo 'arabic-notification'; } ?>" id="notification" onclick="showNotify()" >notifications</i></span>
                <?php } ?>
                </div>
                
                <div class="card horizontal" style="z-index:9999" id="notification-container">
                  <div class="card-stacked">
                    <div class="card-content">
                      <ul id="notification-li">
            <?php
                $id=$_COOKIE["id"];
                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/announcements/getAnnouncements/?customer_id=$id&lang=$lang",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTPHEADER => array(
                "apiKey: dunkinsa-1qaz2wsx3edec-0okmnj9"
                ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                $data=json_decode($response,true);
                
                $count=0;
                foreach($data['announcement'] as $anounce)
                {
                  $qr=   $anounce['qr_code'];
                  $n_title=   $anounce['title'];
                  $id=$anounce['id'];
                  
                  $desc=  $anounce['description'];
                  $image=  $anounce['image_url'];
                 $status=  $anounce['read_status'];
                 if($status=="0")
                 {
                      $count++;
                 }
                  $time=  $anounce['time'];
                  $sec = strtotime($time);  
                  //echo date('D j M','2020-10-09');
                 // echo date('l j F',$time[0]);
                  //echo date('h:i A',$time[1]);
                  $time=explode(" ",$time);
                ?>
                
                <li <?php echo "id="."'".$anounce['id']."'";
                
                
                
                if($anounce['read_status']=="0"){ echo "class=unread";}else{ echo "class=read";} if($anounce['type']=="2"){ ?> onclick="rateOrder(<?php echo $anounce['title']?>,<?php echo $anounce['branch_id']?>,<?php echo $anounce['id']; ?>,<?php echo $anounce['read_status'];?>)" <?php } else { ?> onclick="document.getElementById('<?php echo 'notify'.$anounce['id'];?>').submit()" <?php } ?> >
                <?php if($anounce['type']=="1"){?>
                    <form action="notification_details.php" method="post" id="<?php echo 'notify'.$anounce['id']; ?>">
                        <input type="hidden" name="n_title" value="<?php echo $anounce['title'];?>" >
                        <input type="hidden" name="n_image" value="<?php echo $image;?>">
                        <input type="hidden" name="announce_id" value="<?php echo $anounce['id'];?>">
                        <input type="hidden" name="status" value="<?php echo $anounce['read_status'];?>">
                        <input type="hidden" name="n_description" value="<?php echo $desc;?>">
                        <input type="hidden" name="n_date" value="<?php echo $time[0]?>">
                        <input type="hidden" name="qr" value="<?php echo $qr?>">
                    </form>
                <?php } ?>
                        <div class="row">
                            <div class="col s9 m9 l9"><p class="meal">
                            <?php 
                            if($anounce['type']=="2"){ 
                                if($lang=="ar")
                                {
                                    echo "يرجى تقييم طلبك رقم:".$n_title;
                                }
                                else
                                {
                                    echo "Give us your feedback for the order:".$n_title;
                                }
                            }
                            else
                            {
                                echo $n_title;
                            }
                              ?></p></div>
                            <div  class="col s3 m3 l3 notify_time right-align"><?php echo $time[0];?> <br> <?php echo $time[1];?></div>
                        </div>
                    
                </li>
               
                <?php } ?>
                      </ul>
                    </div>
                  </div>
              </nav>
    
    
            
   
     
        
    


    <ul  class="sidenav profilenav" id="profile-links">
         <nav class="white">
    <div class="nav-wrapper">
         <?php if($lang=="ar"){?>
            <svg  style="margin-left: 70%;"width="118" height="44" viewBox="0 0 118 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M76.1758 3.76992C73.3114 3.76992 70.9347 6.14491 70.9347 9.01039C70.9347 11.8707 73.3452 14.2899 76.1758 14.2899C79.0451 14.2899 81.4162 11.9098 81.4162 9.01039C81.4162 6.06688 79.1195 3.76992 76.1758 3.76992Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M70.9347 20.6521V22.3952H67.7888H67.7882H67.741V22.0719C67.741 18.7855 66.7472 16.2035 64.5327 14.4804C62.3664 12.7948 59.1853 12.056 55.0816 12.056H42.8311L47.1552 10.4032L47.1573 10.4024C48.6915 9.81157 49.697 8.81516 50.1762 7.628C50.6493 6.45578 50.5738 5.18467 50.1153 4.09377C49.1917 1.89621 46.6532 0.320246 43.6261 1.50276L35.9315 4.50209L35.9311 4.50222C30.8026 6.50352 28.5714 10.0685 28.5714 13.5474C28.5714 17.8604 32.0018 21.8269 36.653 21.8269H52.9906C54.3105 21.8269 55.3212 21.8418 56.0993 21.8876C56.8893 21.9342 57.3775 22.0099 57.6818 22.1059C57.827 22.1518 57.9033 22.1942 57.9406 22.2205C57.9721 22.2426 57.9798 22.2554 57.984 22.2626C57.9937 22.2793 58.01 22.3161 58.0238 22.3952H29.7812C28.998 22.3952 28.4053 22.3778 27.9423 22.3292C27.4768 22.2804 27.1969 22.2051 27.0152 22.1201C26.7487 21.9953 26.5554 21.798 26.3004 20.9802C25.9111 19.6848 25.301 18.6233 24.4105 17.8865C23.5078 17.1395 22.3967 16.7924 21.1387 16.7924C19.578 16.7924 18.2324 17.339 17.2874 18.4079C16.3544 19.4634 15.8976 20.9303 15.8976 22.6242V27.8728C15.8976 28.9299 15.6494 29.6557 15.3013 30.0975C14.9755 30.511 14.4976 30.761 13.7984 30.761C13.1868 30.761 12.689 30.4883 12.3053 29.8949C11.8989 29.2665 11.621 28.2634 11.621 26.8866C11.621 26.4209 11.6662 25.8879 11.7158 25.3572C11.721 25.3013 11.7264 25.2449 11.7317 25.1883C11.7743 24.7383 11.8184 24.2728 11.8184 23.9268C11.8184 22.5363 11.3828 21.2949 10.532 20.3937C9.67606 19.4872 8.47159 19.0018 7.09 19.0018C5.08247 19.0018 3.52219 19.9792 2.51727 21.7697C1.54864 23.4956 1.1 25.956 1.1 29.0179C1.1 33.1937 2.20581 36.6663 4.28387 39.1103C6.37586 41.5708 9.37952 42.9 12.9704 42.9C16.8732 42.9 20.027 41.9798 22.3326 39.936C24.2111 38.2707 25.4383 35.9377 26.0933 32.9769C26.2884 33.1418 26.4981 33.2903 26.7232 33.4216C27.5851 33.9243 28.5977 34.132 29.7274 34.1382C29.7435 34.1392 29.7613 34.1398 29.7806 34.1398H67.7882H67.7888H72.9002C75.7672 34.1398 77.9845 33.634 79.4498 32.1508C80.9119 30.6707 81.4162 28.4279 81.4162 25.5058V20.6521C81.4162 17.6403 79.209 15.3712 76.1758 15.3712C73.221 15.3712 70.9347 17.7179 70.9347 20.6521Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M102.871 8.90189L102.869 8.90179C101.458 8.81089 100.114 9.17289 99.0698 10.003C98.0185 10.839 97.3419 12.0948 97.1812 13.6514C96.8569 16.6681 98.6571 19.113 101.53 19.6801C103.094 19.9963 104.437 20.348 105.386 20.9267C105.846 21.2073 106.182 21.5236 106.406 21.8872C106.499 22.0386 106.577 22.2066 106.637 22.3955H99.6939C98.0016 22.3955 96.5058 22.9852 95.4292 24.0379C94.3513 25.0918 93.7427 26.5622 93.7427 28.2273C93.7427 31.6059 96.2369 34.14 99.6939 34.14H111.374C114.516 34.14 116.852 31.8025 116.852 28.6625V24.8341C116.852 20.2938 115.613 16.4466 113.2 13.6509C110.779 10.8462 107.255 9.19132 102.871 8.90189Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M87.7772 2.58584C86.237 2.58584 84.8902 3.13085 83.9293 4.12243C82.9708 5.11137 82.4572 6.48089 82.4572 8.02335V29.2541C82.4572 30.7971 82.9708 32.1669 83.9292 33.156C84.8903 34.1477 86.237 34.6926 87.7772 34.6926C89.3171 34.6926 90.6637 34.1477 91.6245 33.1559C92.5828 32.1668 93.0961 30.7971 93.0961 29.2541V8.02335C93.0961 6.48097 92.5827 5.11148 91.6245 4.12252C90.6637 3.13089 89.3172 2.58584 87.7772 2.58584Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M17.174 16.1518L17.1741 16.1519L17.1781 16.1431C17.7005 15.0025 17.8514 13.4057 17.8514 11.4669C17.8514 9.58614 17.6595 8.00573 16.9877 6.8063C16.0458 5.11905 14.4411 4.41055 12.6103 4.41055C10.1666 4.41055 7.56704 6.17454 7.56704 9.37486C7.56704 9.87628 7.70584 10.7481 7.90525 11.6252C8.35769 13.6321 8.84756 15.345 9.62287 16.5585C10.0215 17.1824 10.5136 17.7049 11.1415 18.0669C11.7729 18.4309 12.4876 18.6013 13.2815 18.6013C14.8487 18.6013 16.3755 17.8471 17.174 16.1518Z" fill="#EA4397" stroke="white" stroke-width="1.8"></path>
</svg>
        <?php } else
        {?>
      <a href="index.php" class="brand-logo"><img src="images/logo.svg" class="responsive-img" alt="logo"></a>
      <?php } 
        ?>
      <a href="#" class="sidenav-trigger" data-target="mobile-links">
          <i class="material-icons menu-clr" id="menu_icon">menu</i>
          </a>
    </div>
  </nav>
  
  
        <li class="sidenav-close"><a href="profile.php"><i class="material-icons"><img class="menu-icons" src="images/profile.svg"></i>Personal Profile</a></li>
        
        <li class="sidenav-close"><a href="address.php"><i class="material-icons"><img class="menu-icons" src="images/address.svg"></i>My Addresses</a></li>
        
        <li class="sidenav-close"><a href="recent_orders.php"><i class="material-icons"><img class="menu-icons" src="images/recent.svg"></i>My Recent Orders</a></li>
        
        <li class="sidenav-close"><a href="fav_orders.php"><i class="material-icons"><img class="menu-icons" src="images/favourite.svg"></i>MY Favourite Orders</a></li>
        
        <li class="sidenav-close"><a href="active_orders.php"><i class="material-icons">access_alarm</i>My Active Orders</a></li>
                
     <!--   <li ><a href="#"><i class="material-icons"><img class="menu-icons" src="images/notify.svg"></i>Push Notifications <span class="switch"> 
    <label>
     
      <input id="pushNotif" type="checkbox">
      <span class="lever"></span>
      
    </label>
  </span></a></li>
        -->
        <li><a href="forgot_password.php"><i class="material-icons"><img class="menu-icons" src="images/lock.svg"></i>Change Password</a></li>
        
    </ul>
    
    <ul  class="sidenav mobile-profile profilenav profilenav_arabic" id="profile-links-arabic">
         <nav class="white">
    <div class="nav-wrapper">
        <?php if($lang=="ar"){?>
            <svg  style="margin-left: 70%;" width="118" height="44" viewBox="0 0 118 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M76.1758 3.76992C73.3114 3.76992 70.9347 6.14491 70.9347 9.01039C70.9347 11.8707 73.3452 14.2899 76.1758 14.2899C79.0451 14.2899 81.4162 11.9098 81.4162 9.01039C81.4162 6.06688 79.1195 3.76992 76.1758 3.76992Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M70.9347 20.6521V22.3952H67.7888H67.7882H67.741V22.0719C67.741 18.7855 66.7472 16.2035 64.5327 14.4804C62.3664 12.7948 59.1853 12.056 55.0816 12.056H42.8311L47.1552 10.4032L47.1573 10.4024C48.6915 9.81157 49.697 8.81516 50.1762 7.628C50.6493 6.45578 50.5738 5.18467 50.1153 4.09377C49.1917 1.89621 46.6532 0.320246 43.6261 1.50276L35.9315 4.50209L35.9311 4.50222C30.8026 6.50352 28.5714 10.0685 28.5714 13.5474C28.5714 17.8604 32.0018 21.8269 36.653 21.8269H52.9906C54.3105 21.8269 55.3212 21.8418 56.0993 21.8876C56.8893 21.9342 57.3775 22.0099 57.6818 22.1059C57.827 22.1518 57.9033 22.1942 57.9406 22.2205C57.9721 22.2426 57.9798 22.2554 57.984 22.2626C57.9937 22.2793 58.01 22.3161 58.0238 22.3952H29.7812C28.998 22.3952 28.4053 22.3778 27.9423 22.3292C27.4768 22.2804 27.1969 22.2051 27.0152 22.1201C26.7487 21.9953 26.5554 21.798 26.3004 20.9802C25.9111 19.6848 25.301 18.6233 24.4105 17.8865C23.5078 17.1395 22.3967 16.7924 21.1387 16.7924C19.578 16.7924 18.2324 17.339 17.2874 18.4079C16.3544 19.4634 15.8976 20.9303 15.8976 22.6242V27.8728C15.8976 28.9299 15.6494 29.6557 15.3013 30.0975C14.9755 30.511 14.4976 30.761 13.7984 30.761C13.1868 30.761 12.689 30.4883 12.3053 29.8949C11.8989 29.2665 11.621 28.2634 11.621 26.8866C11.621 26.4209 11.6662 25.8879 11.7158 25.3572C11.721 25.3013 11.7264 25.2449 11.7317 25.1883C11.7743 24.7383 11.8184 24.2728 11.8184 23.9268C11.8184 22.5363 11.3828 21.2949 10.532 20.3937C9.67606 19.4872 8.47159 19.0018 7.09 19.0018C5.08247 19.0018 3.52219 19.9792 2.51727 21.7697C1.54864 23.4956 1.1 25.956 1.1 29.0179C1.1 33.1937 2.20581 36.6663 4.28387 39.1103C6.37586 41.5708 9.37952 42.9 12.9704 42.9C16.8732 42.9 20.027 41.9798 22.3326 39.936C24.2111 38.2707 25.4383 35.9377 26.0933 32.9769C26.2884 33.1418 26.4981 33.2903 26.7232 33.4216C27.5851 33.9243 28.5977 34.132 29.7274 34.1382C29.7435 34.1392 29.7613 34.1398 29.7806 34.1398H67.7882H67.7888H72.9002C75.7672 34.1398 77.9845 33.634 79.4498 32.1508C80.9119 30.6707 81.4162 28.4279 81.4162 25.5058V20.6521C81.4162 17.6403 79.209 15.3712 76.1758 15.3712C73.221 15.3712 70.9347 17.7179 70.9347 20.6521Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M102.871 8.90189L102.869 8.90179C101.458 8.81089 100.114 9.17289 99.0698 10.003C98.0185 10.839 97.3419 12.0948 97.1812 13.6514C96.8569 16.6681 98.6571 19.113 101.53 19.6801C103.094 19.9963 104.437 20.348 105.386 20.9267C105.846 21.2073 106.182 21.5236 106.406 21.8872C106.499 22.0386 106.577 22.2066 106.637 22.3955H99.6939C98.0016 22.3955 96.5058 22.9852 95.4292 24.0379C94.3513 25.0918 93.7427 26.5622 93.7427 28.2273C93.7427 31.6059 96.2369 34.14 99.6939 34.14H111.374C114.516 34.14 116.852 31.8025 116.852 28.6625V24.8341C116.852 20.2938 115.613 16.4466 113.2 13.6509C110.779 10.8462 107.255 9.19132 102.871 8.90189Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M87.7772 2.58584C86.237 2.58584 84.8902 3.13085 83.9293 4.12243C82.9708 5.11137 82.4572 6.48089 82.4572 8.02335V29.2541C82.4572 30.7971 82.9708 32.1669 83.9292 33.156C84.8903 34.1477 86.237 34.6926 87.7772 34.6926C89.3171 34.6926 90.6637 34.1477 91.6245 33.1559C92.5828 32.1668 93.0961 30.7971 93.0961 29.2541V8.02335C93.0961 6.48097 92.5827 5.11148 91.6245 4.12252C90.6637 3.13089 89.3172 2.58584 87.7772 2.58584Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M17.174 16.1518L17.1741 16.1519L17.1781 16.1431C17.7005 15.0025 17.8514 13.4057 17.8514 11.4669C17.8514 9.58614 17.6595 8.00573 16.9877 6.8063C16.0458 5.11905 14.4411 4.41055 12.6103 4.41055C10.1666 4.41055 7.56704 6.17454 7.56704 9.37486C7.56704 9.87628 7.70584 10.7481 7.90525 11.6252C8.35769 13.6321 8.84756 15.345 9.62287 16.5585C10.0215 17.1824 10.5136 17.7049 11.1415 18.0669C11.7729 18.4309 12.4876 18.6013 13.2815 18.6013C14.8487 18.6013 16.3755 17.8471 17.174 16.1518Z" fill="#EA4397" stroke="white" stroke-width="1.8"></path>
</svg>
        <?php } else
        {?>
      <a href="index.php" class="brand-logo"><img src="images/logo.svg" class="responsive-img" alt="logo"></a>
      <?php } 
        ?>
      
    </div>
  </nav>
  
  
        <li class="sidenav-close"><a href="profile.php"><i class="material-icons"><img class="menu-icons" src="images/profile.svg"></i>الملف الشخصي</a></li>
        
        <li class="sidenav-close"><a href="address.php"><i class="material-icons"><img class="menu-icons" src="images/address.svg"></i>عناويني</a></li>
        
        <li class="sidenav-close"><a href="recent_orders.php"><i class="material-icons"><img class="menu-icons" src="images/recent.svg"></i>الطلبات السابقة</a></li>
        
        <li class="sidenav-close"><a href="fav_orders.php"><i class="material-icons"><img class="menu-icons" src="images/favourite.svg"></i>الطلبات المفضلة</a></li>
        
        <li class="sidenav-close"><a href="active_orders.php"><i class="material-icons">access_alarm</i>الطلبات الفعالة</a></li>
                
     <!--   <li ><a href="#"><i class="material-icons"><img class="menu-icons" src="images/notify.svg"></i>Push Notifications <span class="switch"> 
    <label>
     
      <input id="pushNotif" type="checkbox">
      <span class="lever"></span>
      
    </label>
  </span></a></li>
        -->
        <li><a href="forgot_password.php"><i class="material-icons"><img class="menu-icons" src="images/lock.svg"></i>
        تغيير الرمز السري
</a></li>
        
    </ul>
    
    <ul  class="sidenav sidenav-close helpnav" id="help-links">
        
        <nav class="white">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="images/logo.svg" class="responsive-img" alt="logo"></a>
        <?php if($lang=="ar"){?>
            <a href="#" class="sidenav-trigger" data-target="mobile-links-arabic">
          <i class="material-icons menu-clr">menu</i>
          </a>;  
        <?php }
        else {?>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
          <i class="material-icons menu-clr">menu</i>
          </a>
        <?php }
        ?>
      
    </div>
  </nav>
       
        <li><a href="faq.php"><i class="material-icons"><img class="menu-icons" src="images/help.svg" ></i>FAQ</a></li>
        
        <li><a href="about_us.php"><i class="material-icons"><img class="menu-icons" src="images/about.svg" ></i>About Us</a></li>
        
        <li><a href="branches_list.php?survey=1"><i class="material-icons"><img class="menu-icons" src="images/Survey.svg" ></i>Survey</a></li>
        
        <li><a href="terms.php"><i class="material-icons"><img class="menu-icons" src="images/term.svg" ></i>Terms Of Use</a></li>
                
        <li><a href="policy.php"><i class="material-icons"><img class="menu-icons" src="images/policy.svg" ></i>Privacy Policy</a></li>
        
        
    </ul>
    <ul  class="sidenav sidenav-close helpnav-arabic" id="help-links-arabic">
        
        <nav class="white">
    <div class="nav-wrapper">
        <?php if($lang=="ar"){?>
            <svg style="margin-left: 70%;" width="118" height="44" viewBox="0 0 118 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M76.1758 3.76992C73.3114 3.76992 70.9347 6.14491 70.9347 9.01039C70.9347 11.8707 73.3452 14.2899 76.1758 14.2899C79.0451 14.2899 81.4162 11.9098 81.4162 9.01039C81.4162 6.06688 79.1195 3.76992 76.1758 3.76992Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M70.9347 20.6521V22.3952H67.7888H67.7882H67.741V22.0719C67.741 18.7855 66.7472 16.2035 64.5327 14.4804C62.3664 12.7948 59.1853 12.056 55.0816 12.056H42.8311L47.1552 10.4032L47.1573 10.4024C48.6915 9.81157 49.697 8.81516 50.1762 7.628C50.6493 6.45578 50.5738 5.18467 50.1153 4.09377C49.1917 1.89621 46.6532 0.320246 43.6261 1.50276L35.9315 4.50209L35.9311 4.50222C30.8026 6.50352 28.5714 10.0685 28.5714 13.5474C28.5714 17.8604 32.0018 21.8269 36.653 21.8269H52.9906C54.3105 21.8269 55.3212 21.8418 56.0993 21.8876C56.8893 21.9342 57.3775 22.0099 57.6818 22.1059C57.827 22.1518 57.9033 22.1942 57.9406 22.2205C57.9721 22.2426 57.9798 22.2554 57.984 22.2626C57.9937 22.2793 58.01 22.3161 58.0238 22.3952H29.7812C28.998 22.3952 28.4053 22.3778 27.9423 22.3292C27.4768 22.2804 27.1969 22.2051 27.0152 22.1201C26.7487 21.9953 26.5554 21.798 26.3004 20.9802C25.9111 19.6848 25.301 18.6233 24.4105 17.8865C23.5078 17.1395 22.3967 16.7924 21.1387 16.7924C19.578 16.7924 18.2324 17.339 17.2874 18.4079C16.3544 19.4634 15.8976 20.9303 15.8976 22.6242V27.8728C15.8976 28.9299 15.6494 29.6557 15.3013 30.0975C14.9755 30.511 14.4976 30.761 13.7984 30.761C13.1868 30.761 12.689 30.4883 12.3053 29.8949C11.8989 29.2665 11.621 28.2634 11.621 26.8866C11.621 26.4209 11.6662 25.8879 11.7158 25.3572C11.721 25.3013 11.7264 25.2449 11.7317 25.1883C11.7743 24.7383 11.8184 24.2728 11.8184 23.9268C11.8184 22.5363 11.3828 21.2949 10.532 20.3937C9.67606 19.4872 8.47159 19.0018 7.09 19.0018C5.08247 19.0018 3.52219 19.9792 2.51727 21.7697C1.54864 23.4956 1.1 25.956 1.1 29.0179C1.1 33.1937 2.20581 36.6663 4.28387 39.1103C6.37586 41.5708 9.37952 42.9 12.9704 42.9C16.8732 42.9 20.027 41.9798 22.3326 39.936C24.2111 38.2707 25.4383 35.9377 26.0933 32.9769C26.2884 33.1418 26.4981 33.2903 26.7232 33.4216C27.5851 33.9243 28.5977 34.132 29.7274 34.1382C29.7435 34.1392 29.7613 34.1398 29.7806 34.1398H67.7882H67.7888H72.9002C75.7672 34.1398 77.9845 33.634 79.4498 32.1508C80.9119 30.6707 81.4162 28.4279 81.4162 25.5058V20.6521C81.4162 17.6403 79.209 15.3712 76.1758 15.3712C73.221 15.3712 70.9347 17.7179 70.9347 20.6521Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M102.871 8.90189L102.869 8.90179C101.458 8.81089 100.114 9.17289 99.0698 10.003C98.0185 10.839 97.3419 12.0948 97.1812 13.6514C96.8569 16.6681 98.6571 19.113 101.53 19.6801C103.094 19.9963 104.437 20.348 105.386 20.9267C105.846 21.2073 106.182 21.5236 106.406 21.8872C106.499 22.0386 106.577 22.2066 106.637 22.3955H99.6939C98.0016 22.3955 96.5058 22.9852 95.4292 24.0379C94.3513 25.0918 93.7427 26.5622 93.7427 28.2273C93.7427 31.6059 96.2369 34.14 99.6939 34.14H111.374C114.516 34.14 116.852 31.8025 116.852 28.6625V24.8341C116.852 20.2938 115.613 16.4466 113.2 13.6509C110.779 10.8462 107.255 9.19132 102.871 8.90189Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M87.7772 2.58584C86.237 2.58584 84.8902 3.13085 83.9293 4.12243C82.9708 5.11137 82.4572 6.48089 82.4572 8.02335V29.2541C82.4572 30.7971 82.9708 32.1669 83.9292 33.156C84.8903 34.1477 86.237 34.6926 87.7772 34.6926C89.3171 34.6926 90.6637 34.1477 91.6245 33.1559C92.5828 32.1668 93.0961 30.7971 93.0961 29.2541V8.02335C93.0961 6.48097 92.5827 5.11148 91.6245 4.12252C90.6637 3.13089 89.3172 2.58584 87.7772 2.58584Z" fill="#FE5500" stroke="white" stroke-width="1.8"></path>
<path d="M17.174 16.1518L17.1741 16.1519L17.1781 16.1431C17.7005 15.0025 17.8514 13.4057 17.8514 11.4669C17.8514 9.58614 17.6595 8.00573 16.9877 6.8063C16.0458 5.11905 14.4411 4.41055 12.6103 4.41055C10.1666 4.41055 7.56704 6.17454 7.56704 9.37486C7.56704 9.87628 7.70584 10.7481 7.90525 11.6252C8.35769 13.6321 8.84756 15.345 9.62287 16.5585C10.0215 17.1824 10.5136 17.7049 11.1415 18.0669C11.7729 18.4309 12.4876 18.6013 13.2815 18.6013C14.8487 18.6013 16.3755 17.8471 17.174 16.1518Z" fill="#EA4397" stroke="white" stroke-width="1.8"></path>
</svg>
        <?php } else
        {?>
      <a href="#" class="brand-logo"><img src="images/logo.svg" class="responsive-img" alt="logo"></a>
        <?php  } ?>
      
    </div>
  </nav>
       
        <li><a href="faq.php"><i class="material-icons"><img class="menu-icons" src="images/help.svg" ></i>الاسئلة الشائعة</a></li>
        
        <li><a href="about_us.php"><i class="material-icons"><img class="menu-icons" src="images/about.svg" ></i>نبذة عنا</a></li>
        
        <li><a href="branches_list.php?survey=1"><i class="material-icons"><img class="menu-icons" src="images/Survey.svg" ></i>الاستبيان</a></li>
        
        <li><a href="terms.php"><i class="material-icons"><img class="menu-icons" src="images/term.svg" ></i>سياسة الاستخدام</a></li>
                
        <li><a href="policy.php"><i class="material-icons"><img class="menu-icons" src="images/policy.svg" ></i>سياسة الخصوصية</a></li>
        
        
    </ul>
    <ul  class="sidenav sidenav-close" id="mobile-links">
        <a href="index.php"><img class="responsive-img" src="images/LOGO.png"></a>
        
        <li><a href="index.php"><i class="material-icons"><img class="menu-icons" src="images/home.svg" ></i>
            Home
        </a></li>
        
        <li><a href="profile.php" class="sidenav-trigger" data-target="profile-links"><i class="material-icons"><img class="menu-icons" src="images/profile.svg" ></i>
        My Profile
        </a></li>
                
        <li><a href="giftcard_content.php"><i class="material-icons"><img class="menu-icons" src="images/gift.svg" ></i>
        Add Dunkawy Credit</a></li>
        
        <li><a href="loyality_balance.php"><i class="material-icons">credit_card</i>My Loyality Cards</a></li>
        
        <li><a href="transfer_points.php"><i class="material-icons"><img class="menu-icons" src="images/transfer.svg" ></i>Transfer Points</a></li>
        
        <li><a href="partners.php"><i class="material-icons"><img class="menu-icons" src="images/partners.svg" ></i>Delivery Partners</a></li>
              
        <li><a href="contact_us.php"><i class="material-icons"><img class="menu-icons" src="images/contact.svg" ></i>Contact Us</a></li>
               
        <li><a href="#" class="sidenav-trigger" data-target="help-links"><i class="material-icons"><img class="menu-icons" src="images/help.svg" ></i>Help</a></li>
        <?php if(isset($_COOKIE["customer"] )&& isset($_COOKIE["customer_id"])){  ?>     
        <li><a href="logout.php"><i class="material-icons"><img class="menu-icons" src="images/profile.svg" ></i>Logout</a></li>
        <?php } 
        else
        { ?>
         <li><a href="login.php"><i class="material-icons"><img class="menu-icons" src="images/profile.svg" ></i>Login</a></li>
         <?php } ?>
        
        <li><span onclick="setEnglish()" id="en" class="language">EN</span><span onclick="setArabic()" class="language" id="ar">AR</span></li>
        
        <li><div class="menu-social left-align">
            
            <a href="https://twitter.com/DunkinDonutsKSA" class="btn-floating waves-effect twitter">
              <i class="fa fa-twitter"></i> 
            </a>
            <a href="https://snapchat.com/dunkindonutsksa" class="btn-floating waves-effect snapchat">
                <i class="fa fa-snapchat"></i> 
            </a>
            <a href="https://instagram.com/dunkindonutsksa" class="btn-floating waves-effect instagram">
               <i class="fa fa-instagram"></i>
            </a>
            <a href="https://facebook.com//dunkindonutsksa" class="btn-floating waves-effect facebook">
                <i class="fa fa-facebook"></i> 
            </a>
            <span  class="btn-floating waves-effect share share-btn">
                <i class="fa fa-share-alt"></i> 
            </span>
            
            </div>
        </li>
 
    </ul>
    <ul  class="sidenav sidenav-arabic sidenav-close" id="mobile-links-arabic">
        <a href="index.php"><img class="responsive-img" src="images/LOGO.png"></a>
        
        <li class="sidenav-close"><a href="index.php">الرئيسية<i class="material-icons"><img class="menu-icons" src="images/home.svg" ></i>
            
                
            
        </a></li>
        
        <li class="sidenav-close"><a href="profile.php" class="sidenav-trigger" data-target="profile-links-arabic"><i class="material-icons"><img class="menu-icons" src="images/profile.svg" ></i>
  الملف الشخصي
            
        </a></li>
                
        <li class="sidenav-close"><a href="giftcard_content.php">شحن رصيد دنكاوي<i class="material-icons"><img class="menu-icons" src="images/gift.svg" ></i></a></li>
        
        <li class="sidenav-close"><a href="loyality_balance.php"><i class="material-icons">credit_card</i>بطاقة دنكاوي</a></li>
        
        <li class="sidenav-close"><a href="transfer_points.php"><i class="material-icons"><img class="menu-icons" src="images/transfer.svg" ></i>تحويل النقاط</a></li>
        
        <li class="sidenav-close"><a href="partners.php"><i class="material-icons"><img class="menu-icons" src="images/partners.svg" ></i>شركاء التوصيل</a></li>
              
        <li class="sidenav-close"><a href="contact_us.php"><i class="material-icons"><img class="menu-icons" src="images/contact.svg" ></i>تواصل معنا</a></li>
               
        <li class="sidenav-close"><a href="#" class="sidenav-trigger" data-target="help-links-arabic"><i class="material-icons"><img class="menu-icons" src="images/help.svg" ></i>المساعدة</a></li>
        <?php if(isset($_COOKIE["customer"] )&& isset($_COOKIE["customer_id"])){  ?>     
        <li class="sidenav-close"><a href="logout.php"><i class="material-icons"><img class="menu-icons" src="images/profile.svg" ></i>تسجيل خروج</a></li>
        <?php } 
        else
        { ?>
         <li><a href="login.php"><i class="material-icons"><img class="menu-icons" src="images/profile.svg" /></i>تسجيل دخول</a></li>
         <?php } ?>
        
        <li class="sidenav-close"><span onclick="setEnglish()" id="en" class="language">EN</span><span onclick="setArabic()" class="language" id="ar">AR</span></li>
        
        <li class="sidenav-close"><div class="menu-social left-align">
            
            <a href="https://twitter.com/DunkinDonutsKSA" class="btn-floating waves-effect twitter">
              <i class="fa fa-twitter"></i> 
            </a>
            <a href="https://snapchat.com/dunkindonutsksa" class="btn-floating waves-effect snapchat">
                <i class="fa fa-snapchat"></i> 
            </a>
            <a href="https://instagram.com/dunkindonutsksa" class="btn-floating waves-effect instagram">
               <i class="fa fa-instagram"></i>
            </a>
            <a href="https://facebook.com//dunkindonutsksa" class="btn-floating waves-effect facebook">
                <i class="fa fa-facebook"></i> 
            </a>
            <span  class="btn-floating waves-effect share share-btn">
                <i class="fa fa-share-alt"></i> 
            </span>
            
            </div>
        </li>
 
    </ul>
    
      <!--
        <div id="sec-menu">
            <ul>
                <li><a class="active" href="menu.php">All Products</a></li>
                <li><a href="fav_orders.php">Favourite Orders</a></li>
                <li><a href="recent_orders.php">Recent Orders</a></li>
            </ul>
            
        </div>
        -->
         <?php if(isset($_COOKIE["customer"] ) && isset($_COOKIE["customer_id"])){  ?>
        <div id="notifyCount" <?php if($lang=="ar"){ echo 'class="arabic-notify"';} ?> onclick="showNotifys()"><?php echo $count;?></div>
        <?php } ?>
        


        <script>
        //var mouse_is_inside = false;

    

        function rateOrder(name,id,anouncement_id,status)
        {
            if(status==0)
            {
           var customer_id=$.cookie('id');
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
                                        //alert(document.getElementById(anouncement_id).style.background);
                                        if(document.getElementById(anouncement_id).classList.contains('unread') ){
                                            document.getElementById(anouncement_id).classList.remove('unread');

                                            document.getElementById(anouncement_id).style.background="#fff";
                                            document.getElementById(anouncement_id).classList.add('read');
                                            var count=parseInt(document.getElementById('notifyCount').innerHTML,10);
                                            count=count-1;
                                            document.getElementById('notifyCount').innerHTML=count;
                                            
                                        }
                                    });
                                    
            }
            if($.cookie("lang")=="ar")
            {
                var title=" يرجى تقييم طلبك رقم:"+name;
                var rate="ارسال التقييم";
                var survey="ارسال استبيان";
            }
            else
            {
                title='Give us your feedback for the order:'+name;
                var rate="Send Rating";
                var survey="Take A Survey";
            }
            
            Swal.fire({
              title: title,
              showCloseButton: true,
              closeOnConfirm: false,
              showConfirmButton:false,
              html:
              '<form action="form_submit.php" onsubmit="submitFunc(event)"  method="post" enctype="multipart/form-data" id="order_rate">'+
                     
                          
                            '<div class="stars star-rating center-align" id="star-rating-2">'+
                                 '<span class="fa fa-star-o" data-rating="1"></span>'+
                                 '<span class="fa fa-star-o" data-rating="2"></span>'+
                                 '<span class="fa fa-star-o" data-rating="3"></span>'+
                                 '<span class="fa fa-star-o" data-rating="4"></span>'+
                                 '<span class="fa fa-star-o" data-rating="5"></span>'+
                                 '<input type="text" name="order_rating" id="order_rating" required="required" id="rating-services" class="rating-value" required/>'+
                            '</div>'+
                            '<input type="hidden" name="order_id" value='+name+'>'+
                            '<span id="rate_required"></span>'+
                            '<input type="hidden" name="rate_order" value='+name+'><br><br>'+
                            '<button type="submit" class="order_rating_btn">'+rate+'</button>'+
                            '<div class="btns"><span class="take_survey"><a href="rate_us.php?branch='+id+'"><button type="button" class="take_survey">'+survey+'</button></a></span></div>'+
              '</form>', 
              background: '#fff',
              width:'690px',
              customClass: 'custom-padding order_rating',
              
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            }).then(function (result) {
                if (result.value) {
                    var formData = new FormData($('#order_rate')[0]);
                    var rating_value=document.getElementById('order_rating');
                    if(rating_value.value == "") {
                        alert("Rating is required");
                         document.getElementById('rate_required').innerHTML="Rating is required";
                      } 
                      else
                      {
                         
                        $.ajax({
                        type: 'post',
                        url: 'form_submit.php',
                        data: formData,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        
                        beforeSend: function(){
                         $("#loaderIcon").show();
                       },
                        complete:function(data){
                          $("#loaderIcon").hide();
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
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
                        
                            var response=JSON.parse(response);
                            
                            if(response.success == "1")
                            {
                                
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
                                          alert("fff");
                                    
                                      } else {
                                        // handle cancel
                                      }
                                    })
                                   
                                    
                                    
                                    
                                   
                            }
                            else
                            {
                                Swal.fire({
                                  icon: 'error',
                                  title: response.status,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  html:
                                  '<p class="trans-rejected">'+response.message+'</p>',
                                  width:'690px',
                                  customClass: 'error-msg',
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
                           Swal.fire({
                                  icon: 'error',
                                  title: response.status,
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
                            
                        })
                      }
                        
                    
            } 
            else {
                // handle cancel
            }
            });
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
            
        }
        
      function cartCheck()
      {
          if(localStorage.getItem("cartCount")==0)
          {
              var lang=$.cookie("lang");
              if(lang=="ar")
              {
              var message="يرجى اضافة منتجات للسلة";
              var ok="موافق";
              var dunkin="دانكن" 
              }
              else
              {
                  message="Please add items to the cart first";
                  var ok="OK";
                  var dunkin="Dunkin KSA";
              }
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
                                    })
          }
          else
          {
              window.location.href="orders_list.php";
          }
      }
        
        $("#notification-container").hide();
        //   $("form").hide();

        
        $("#pushNotif").change(function() {
            Notification.requestPermission().then(function(permission) { 
               if(permission=="granted")
               {
                   $("#pushNotif").prop("checked", true);
               }
               else
               {
                   $("#pushNotif").prop("checked", false);
                   
               }
            });
         /* if($(this).is(":checked")) {
               Notification.requestPermission().then(function(permission) { console.log('permiss', permission)});
               if(permission=="granted")
               {
                   $("#pushNotif").prop("checked", true);
               }
               else
               {
                   $("#pushNotif").prop("checked", false);
                   
               }
            }
            else {
              Notification.permission = "denied"; 
            } */
          })
        var hideNotification=true;
        localStorage.setItem("notification","false");
         function showNotify()
            {
                localStorage.setItem("notification","true");
                if($("#notification-container").is(":visible")){
                $("#notification-container").hide();
                //$("form").hide();
                } else{
                $("#notification-container").show();
                //$("form").show();
                }
                
            }
            function showNotifys()
            {
                $("#notification-container").show();
                document.getElementById("notification-container").style.display="flex";
                console.log($("#notification-container").show());
                
            }
        $(document).on('click', function (e) {
    if ($(e.target).closest("#notification").length === 0 ) {
        $("#notification-container").hide();
    }
});
     /*     function goBack(e)
          {
              
              if(document.getElementById('menu_icon').textContent=='arrow_back')
              {
                  e.stopPropagation(); 
                  alert("");
                   $('.sidenav').sidenav('hide');
                  window.history.back();
              }
          }
      */    
     
        
        
                            
        
            
              function setEnglish()
              {
                  
                  $.cookie('lang','en');
                  location.reload();
                
              }
                
                function setArabic()
              {
                
                  $.cookie('lang','ar');
                  location.reload();
                  body.setProperty("fontFamily","BigVesta-light","important");

              }    
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
              function submitFunc(event)
              {
                  event.preventDefault();
                  var formData = new FormData($('#order_rate')[0]);
                         
                        $.ajax({
                        type: 'post',
                        url: 'form_submit.php',
                        data: formData,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        
                        beforeSend: function(){
                         $("#loaderIcon").show();
                         $('.swal2-container').hide(); 
                         
                       },
                        complete:function(data){
                          $("#loaderIcon").hide();
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                        
                        var response=JSON.parse(response);
                            
                            if(response.success == "1")
                            {
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
                                    });
                                    return false;
                                   
                            }
                            else
                            {
                                Swal.fire({
                                  
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
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
                           Swal.fire({
                                  title: dunkin,
                                  showCloseButton: false,
                                  showConfirmButton:true,
                                  html:
                                  '<p class="trans-rejected">'+textStatus+'</p>',
                                  width:'690px',
                                  background: '#fff',
                                  backdrop: `
                                   rgba(38, 38, 38, 0.8);
                                  `
                                })
                            
                        })
                      
                        
              }

               $(document).ready(function(){
        if(localStorage.getItem("cartCount")==null)
          {
              localStorage.setItem("cartCount","0");
          }
            
            //document.querySelector(".preloader").style.setProperty("display", "none", "important");
            
            document.querySelector("body").style.visibility = "visible"; 
            $("#loaderIcon").hide();
        
            $('.sidenav').sidenav(
              {
                draggable : false
              });
            $('.sidenav.help-nav').sidenav({
                draggable : false
              });
            $('.sidenav.helpnav-arabic').sidenav({
                edge: 'right',
                draggable : false
            });
            $('.sidenav.arabic-menu').sidenav({
                edge: 'right',
                draggable : false
            });
            $('.sidenav.arabic-side-nav').sidenav({
                edge: 'right',
                draggable : false
            });
            
            $('.sidenav.profilenav_arabic').sidenav({
                edge: 'right',
                draggable : false
            });
            $('.sidenav.profile-nav').sidenav({
                draggable : false
              });

            console.log("Activating right Navigation");
            $('.sidenav.sidenav-arabic').sidenav({
                edge: 'right',
                draggable : false
            });
           
            
            
            
        });
              



    </script>