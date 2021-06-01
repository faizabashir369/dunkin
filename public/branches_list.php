<?php 
if(!$_COOKIE["customer"] && !$_COOKIE["customer_id"] && $_GET['survey']=="1") {
        header("Location:login.php");
    }
    
if(isset($_GET['survey']))
{
    $survey=$_GET['survey'];
    $survey='1';
}
if(isset($_GET['pickup']))
{
    $order_type="pickup";
}
else if(isset($_GET['delivery']))
{
    $order_type="delivery";
}
else if(isset($_GET['reorder']))
{
    $reorder=$_GET['reorder'];
   
}
if(isset($_GET['pickup']))
{ $type="pickup";
}
if(isset($_GET['reorder']))
{?>
    <style>
        .cart
        {
            margin-top:13px !important;
        }
        .circle {
            margin-left: 16px !important;
            margin-top: -30px !important;
        }
        @media only screen and (max-width: 600px){
            .nav-wrapper .brand-logo {
                margin-left: -30px !important;
                margin-top: 20px !important;
            }
        }
    </style>
<?php } 
elseif(isset($_GET['delivery']))
    { $type="delivery"; }
    if(isset($reorder)){
    ?>

                    <form 
                            <?php if(isset($reorder))
                                    { ?> 
                                         action="orders_list.php?reorder=1"
                                    <?php 
                                    }
                                    else 
                                       { ?> 
                                           action="reciept.php" 
                                    <?php }
                            ?> 
                                    
                             method="post" 
                            <?php if(isset($reorder))
                            { ?> 
                                id="reorder_form" 
                                
                            <?php }
                            else {?> 
                                 
                                  id="<?php echo $_POST['order_id'];?>" 
                                 <?php }
                            ?>
                            >
            
                            
                            
                              <?php 
                              
                               array_map(function($id,$vid,$cat,$nam,$variant,$price,$quantity,$note,$image,$milk)
                                { ?>
                                        <input type="hidden" name="variant_title[]" value="<?php echo $variant;?>">
                                        <input type="hidden"   name="variant_milk[]" value="<?php echo $milk;?>">
                                        <input type="hidden" name="product_name[]" value="<?php echo $nam;?>">
                                        <input type="hidden" name="product_price[]" value="<?php echo $price;?>">
                                        <input type="hidden" name="product_quantity[]" value="<?php echo $quantity;?>">
                                        <input type="hidden" name="note[]" value="<?php echo $note;?>">
                                        <input type="hidden" name="product_image[]" value="<?php echo $image;?>">
                                        <input type="hidden" name="product_id[]" value="<?php echo $id;?>">
                                        <input type="hidden" name="product_variant_id[]" value="<?php echo $vid;?>">
                                        <input type="hidden" name="product_category[]" value="<?php echo $cat;?>">
        
                                  <?php },$_POST['product_id'],$_POST['product_variant_id'],$_POST['product_category'], $_POST['product_name'], $_POST['variant_title'],$_POST['product_price'],$_POST['product_quantity'],$_POST['note'],$_POST['product_image'],$_POST['variant_milk']);?>
     
                            
                                   
                        
                            </form>
                            
                            
<?php } ?>
        <?php 
        include 'header.php';
        include 'sidebar.php';
        $order_type="pickup";
        $type="pickup";
        ?>
        
            
            <div id="branches-list">
                <h3 class="heading"><?php if($lang=='ar'){ echo "قائمة الفروع";
                }
                //echo "أبحث عن اقرب فرع دانكن";  
                                else
                                { echo "Branches List";}?></h3>
                <div class="branch_menu">
                <a  id="search_icon" class="search_icon"><i class="material-icons">location_on</i><h5 class="search" onclick="show()"><input type="text"  id="myInput" onkeyup="myFunction()" placeholder="<?php if($lang=='ar'){ echo "بحث";}  
                                else
                                { echo "Search...";}?>"></h5></a>
                <a href="#" class="map_mode" id="mapmode" onclick="openTab(event,'addcards')"> <?php if($lang=='ar'){ echo "خريطة الفروع";}  
                                else
                                { echo "Map Mode";}?></a>
                </div>
               <div id="map"></div>
               <div id="info_div" style="display:none;">
                
                        <div class="row branch map_info" id="overlays">
                                <div class="col s8 m8 l8 no-padding">
                                    <div class="row branch_details">
                                       <div class="col s12 m12 l12 no-padding">
                                           <h5 id="store_name" class="left-align"></h5>
                                       </div>
                                    </div>
                                        <p class="address" id="address"></p>
                                        <p class="hours" id="hours"></p>
                                    </div>
                       
                                <div class="order_col col s4 m4 l4 no-padding">
                                     <span class="distance" id="distance"></span>
                                          <a href="" id="map_link"><img src="images/arrow.svg"></a>
                                    <button class="order order_map" id="order"><?php if($survey==1){
                                         if($lang=='ar'){ echo "الاستبيان";}  
                                else
                                { 
                                        
                                        echo 'Survey';}
                                        }else
                                    
                                { if($lang=='ar'){ echo "طلب";}  
                                else
                                { echo "Order";}
                                        
                                    }
                                
                                ?></button>
                                </div>
                                 <div class="facility col s12 m12 l12 no-padding">
                                       
                                        <img id="smoking" src="images/smoking.png">
                                        
                                        <img id="parking" src="images/parking.png">
                                        
                                        <img id="dnkn" src="images/dnkn.png">
                                        
                                        <img id="drive" src="images/drive.png">
                                        <br>
                                </div>
                            </div>
                </div>
                <div id="active-order-wrapper">
                
                <ul id="branch">
                <?php
                        
                        
                        $url="https://dunkinsa.abstractagency.net/api/v2/locations/?lat=&lng=&lang=$lang&radius=20&page=1&search_term=";
                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => $url,
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => true,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                        ));
                        
                        $response = curl_exec($curl);
                        
                        curl_close($curl);
                        $data = json_decode($response, true);
                          $i=0;
                          if(sizeof($data['data'])==0)
                          {
                              echo '<p class="message">No Branch Found</p>';
                          }
                            foreach($data['data'] as $val) {
                        ?>
                        
                        <li <?php if(isset($survey)){?>data-href="rate_us.php?branch=<?php echo $val['id'];?>"<?php } ?>>
                        <div class="row branch" >
                            <div class="col s8 m9 l8 no-padding">
                                <div class="row branch_details">
                                   <div class="col s12 m12 l10 no-padding">
                                       <h5 class="left-align"><?php echo $val['store_name'];?></h5>
                                   </div>
                                
                                </div>
                                    <p class="address"><?php  echo $val['address']; ?> <br> <span class="branch_timing" <?php if($lang=='ar'){ echo 'style="font-family:dunkin !important"';}?>><?php  echo $val['hours'];?></span></p>
                                </div>
                   
                            <div class="order_col col s4 m3 l2 no-padding">
                                <span class="distance"><?php  echo number_format($val['distance'],1);?>km</span>
                                <a class="map-dir" href="<?php  echo str_replace('"',"'",$val['google_map_link']);?>">
                                          <img src="images/arrow.svg">
                                        </a>
                            <?php  {?>   
                            <a>
                                <?php } ?>
                                    <button class="order" 
                                    <?php  if($val['status']==0 && !isset($survey))
                                    {?> 
                                    onclick="busyBranch()" 
                                    <?php }elseif(isset($survey)) 
                                    {?>
                                    onclick="window.location.href='rate_us.php?branch=<?php echo $val['id']?>'" 
                                    <?php }elseif(isset($reorder)) 
                                    {?>
                                    onclick="clearReorder('<?php echo $val['id']?>','<?php echo $val['store_name']?>')" 
                                    <?php } 
                                    else{?> onclick="clearCart('<?php echo $val['id']?>','<?php echo $val['store_name']?>',
                                    '<?php echo "pickup";?>')" <?php }
                                    ?>
                                    >
                                        
                                        
                             <?php if($val['status']==1 && $survey!=1)
                             { 
                                 if($lang=='ar'){ echo "طلب";}  
                                else
                                { echo "Order";}
                                 
                             }elseif($val['status']==0 && $survey!=1){
                                 if($lang=='ar'){ echo "مشغول";}  
                                else
                                { echo "Busy";}
                                 
                             }
                             elseif(isset($survey)){ 
                                 if($lang=='ar'){ echo "الاستبيان";}  
                                else
                                { 
                                        
                                        echo 'Survey';}
                                        } ?></button> <?php  if($val['status']==1){?>
                             </a><?php } ?>
                            </div>
                             <div class="facility col s12 m12 l12 no-padding">
                                   <?php  if($val['smoking_area']==1){?>
                                    <img src="images/smoking.png">
                                    <?php } ?>
                                    <?php  if($val['parking']==1){?>
                                    <img src="images/parking.png">
                                    <?php } ?>
                                    <?php  if($val['dunkin_cards']==1){?>
                                    <img src="images/dnkn.png">
                                    <?php } ?>
                                    <?php  if($val['drive_thru']==1){?>
                                    <img src="images/drive.png">
                                    <?php } ?>
                            </div>
                        
                        </div>
                       
                        </li>
                        
                <?php
                 $i++;
                 } ?>
            </ul>
            </div>
                </div>
            </div>
            </div>
            </a>
            </div>
            <div class="col s6 m4 l1 no-padding">
            </div>
        </div>
      </div>
    
    </div>
  
    <script>
            
              
              
              
            
            $("#loaderIcon").show();  
             
              
            
            
                        
           
           
            
                
                
                
                
            
           
           
            
            

        $(document).ready(function () {
            getLocation(); 
            function getLocation() {
                if (navigator.geolocation) {
                    console.log("Geolocation is  supported by this browser.");
                    navigator.geolocation.getCurrentPosition(showPosition,showError);
                } 
                else { 
                    console.log("Geolocation is not supported by this browser.");
                }
            }
            function showError(error) {
                            switch (error.code) {
                                case error.PERMISSION_DENIED:
                                    console.log("User denied the request for Geolocation.");
                                     Swal.fire({
                                        title: "Dunkin KSA",
                                        showCloseButton: true,
                                        showConfirmButton:true,
                                        html:
                                        '<p class="trans-rejected">Request for location denied.Please allow location service to browser in Setting>Privacy>Location to browser</p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                        });
                                    break;
                                case error.POSITION_UNAVAILABLE:
                                    console.log("Location information is unavailable.");
                                    Swal.fire({
                                        title: "Dunkin KSA",
                                        showCloseButton: true,
                                        showConfirmButton:true,
                                        html:
                                        '<p class="trans-rejected">Location information is unavailable.</p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                        });
                                    break;
                                case error.TIMEOUT:
                                    console.log("The request to get user location timed out.");
                                    Swal.fire({
                                        title: "Dunkin KSA",
                                        showCloseButton: true,
                                        showConfirmButton:true,
                                        html:
                                        '<p class="trans-rejected">The request to get user location timed out.</p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                        });
                                    
                                    break;
                                case error.UNKNOWN_ERROR:
                                    console.log("An unkown error occurred.");
                                    Swal.fire({
                                        title: "Dunkin KSA",
                                        showCloseButton: true,
                                        showConfirmButton:true,
                                        html:
                                        '<p class="trans-rejected">An unkown error occurred.</p>',
                                        width:'690px',
                                        customClass: 'success-msg',
                                        background: '#fff',
                                        backdrop: `
                                            rgba(38, 38, 38, 0.8);
                                        `
                                        });
                                    
                                    break;
                            }
                        }
            function showPosition(position) {
           
            var latitude=position.coords.latitude;
           
            $.cookie('latCookie',latitude);
            var longitude=position.coords.longitude;
            $.cookie('lngCookie',longitude);
            var lang=$.cookie('lang');

            initMap();
            
    
                    $.ajax({
                        url: 'https://dunkinsa.abstractagency.net/api/v2/locations/?lat='+latitude+'&lng='+longitude+'&lang='+lang+'&radius=20&page=1&search_term=',
                        type: 'get',
                        data: { lat: latitude,lng: longitude },
                        beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                            
                        
                                   
                    
             
                row = '<ul id="branch">';
                i=0;
              
                response=JSON.parse(response);
                        response.data.forEach(el => {
                          
                      row +=    '<li';
                     
                       row+='>';
                         row+='<div class="row branch" >';
                            row+='<div class="col s8 m9 l8 no-padding">';
                                row+='<div class="row branch_details">';
                                   row+='<div class="col s12 m12 l12 no-padding">';
                                       row+='<h5 class="left-align">';
                                       row+=el.store_name;
                                       row+='</h5>';
                                   row+='</div>';
                                   
                                row+='</div>';
                                    row+='<p class="address">';
                                    
                                    var escstr = el.address;
                                    row+=escstr;
                                    row+='<br>';
                                    row+='<span class="branch_timing">'
                                    row+=el.hours;
                                    row+='</span>'
                                    row+='</p>';
                                row+='</div>';
                   
                            row+='<div class="order_col col s4 m3 l2 no-padding">';
                             row+='<span class="distance">';
                                       var distance=el.distance;
                                       row+=parseFloat(distance,10).toFixed(1);
                                       row+='km</span>';
                                       row+='<?php echo str_repeat('&nbsp;', 2);?>';
                                        row+='<a class="map-dir" href="'+el.google_map_link+'">';
                                          row+='<img src="images/arrow.svg">';
                                        row+='</a>';
                                     row+='<button  id="branch_btn" class="order"'; 
                                     var survey="<?php echo $survey;?>";
                                     if(el.status=="0" && survey!="1"){
                                     row+='onclick="busyBranch()"';
                                     }
                                     
									<?php 
									if(isset($reorder)){ 
										?>
									var name=el.store_name;
                                    name = name.replace(/,/g, '');
                                    name = name.replace(/\./g, "");
                                    name="'"+name+"'";
                                    var id="'"+el.id+"'";
                                    console.log(name);
                                    row+='onclick="clearReorder('+id+','+name+')">'; 

                                    var reorder="<?php echo $_GET['reorder'];?>";
                                    var lang="<?php echo $lang;?>";
                                    
                                    if(el.status=="0" && reorder=="1" && lang=='ar'){
                                        
                                        row+='<?php { echo "مشغول";} ?>'; 
                                    }
                                
                                    else if(el.status=="0" && reorder=="1" && lang=='en')
                                    {
                                       
                                        row+='<?php { echo "Busy";} ?>'; 
                                    }
                                    else if(el.status=="1" && reorder=="1" && lang=='ar')
                                    {
                                       
                                        row+='<?php { echo "طلب";} ?>'; 
                                    }
                                    else if(el.status=="1" && reorder=="1" && lang=='en')
                                    {
                                       
                                        row+='<?php { echo "Order";} ?>'; 
                                    }
                                    
                                    <?php }
                                    elseif(isset($survey)){?>
                                     var survey="<?php echo $survey;?>";
                                    var lang="<?php echo $lang;?>";
                                        row+='onclick="window.location='+"'"+'rate_us.php?branch='+el.id+"'"+'">';
                                        if(survey=="1" && lang=='ar')
                                    {
                                        row+='<?php { echo "الاستبيان";} ?>'; 
                                    }
                                    else if(survey=="1" && lang=='en')
                                    {
                                        row+='<?php { echo "Survey";} ?>'; 
                                    } 
                                    <?php
                                    }
                                    else 
                                    { ?> 
                                    	var pickup="'pickup'";
                                    var name=el.store_name;
                                    name = name.replace(/,/g, '');
                                    name = name.replace(/\./g, "");
                                    name="'"+name+"'";
                                    var id="'"+el.id+"'";
                                    
                                    row+='onclick="clearCart('+id+','+name+','+pickup+')">'; 
                                        

                                    var survey="<?php echo $survey;?>";
                                    var lang="<?php echo $lang;?>";
                                    var pickup="<?php echo $_GET['pickup'];?>";
                                    var reorder="<?php echo $_GET['reorder'];?>";
                                   
                                    if(el.status=="0" && survey!="1" && lang=='en'){
                                        
                                        row+='Busy';
                                    }
                                    else if(el.status=="0" && reorder=="1" && lang=='ar')
                                    {
                                       
                                        row+='<?php { echo "مشغول";} ?>'; 
                                    }
                                    else if(el.status=="0" && reorder=="1" && lang=='en')
                                    {
                                       
                                        row+='<?php { echo "Busy";} ?>'; 
                                    }
                                    else if(el.status=="1" && reorder=="1" && lang=='ar')
                                    {
                                       
                                        row+='<?php { echo "طلب";} ?>'; 
                                    }
                                    else if(el.status=="0" && reorder=="1" && lang=='en')
                                    {
                                       
                                        row+='<?php { echo "Order";} ?>'; 
                                    }
                                    else if(el.status=="0" && survey!="1" && lang=='ar')
                                    {
                                       
                                        row+='<?php { echo "مشغول";} ?>'; 
                                    }
                                    
                                    else if(el.status=="1" && survey!="1" && lang=='ar')
                                    {
                                        
                                        row+='<?php { echo "طلب";} ?>'; 
                                    }
                                    else if(el.status=="1" && survey!="1" && lang=='en')
                                    {
                                        row+='<?php { echo "Order";} ?>'; 
                                    }
                                    else if(survey=="1" && lang=='ar')
                                    {
                                        row+='<?php { echo "الاستبيان";} ?>'; 
                                    }
                                    else if(survey=="1" && lang=='en')
                                    {
                                        row+='<?php { echo "Survey";} ?>'; 
                                    }
                                    
                                    <?php 
                                    } 
                                    
                                    ?>
                                   
                                    row+='</button>';
                                     
                                    
                            row+='</div>';
                            row+='<div class="facility col s12 m12 l12 no-padding">';
                            if(el.smoking_area==1)
                            {
                                row+='<img src="images/smoking.png">';
                                
                            }
                            if(el.parking==1)
                            { 
                                row+='<img src="images/parking.png">';
                                
                            } 
                            if(el.dunkin_cards==1)
                            { 
                               row+='<img src="images/dnkn.png">';
                                
                            }
                            if(el.drive_thru==1)
                            {
                                row+='<img src="images/drive.png">';
                                
                            }
                            
                            row+='</div>';
                        
                        row+='</div>';
                       
                        row+='</li>';
                        
                
                
            
            
                        });
            row+='</ul>';
            
            $("#active-order-wrapper").empty();
            
            $("#active-order-wrapper").append(row);
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
        
                                      /*  $(window).load(function(){
                                                //some code after ready 
                                  
                                                const clickable_row=document.querySelectorAll("li[data-href]");
                                                console.log(clickable_row);
                                                clickable_row.forEach(row => {
                                                    
                                                    row.addEventListener('click', () => {
                                                        window.location.href=row.dataset.href;
                                                    });
                                                }); 
                                           }); */
      
                                    /*if (window.performance) {
                                      
                                    }
                                    console.info(performance.navigation.type);
                                    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                                      console.info( "This page is reloaded" );
                                      
                                        
                                       
                                    } else {
                                       
                                      console.info( "This page is not reloaded");
                                      
                                        
                                     // location.reload();
                                    } */
                                    
                                    
                                    
                                    
                                    $("#loaderIcon").hide();
  
        function initMap() {
            	var myMapCenter = {lat: parseFloat($.cookie("latCookie")), lng: parseFloat($.cookie("lngCookie"))};
            	
            	// Create a map object and specify the DOM element for display.
            	var map = new google.maps.Map(document.getElementById('map'), {
            		center: myMapCenter,
            		zoom: 12
            	});
            	var marker = new google.maps.Marker({
                    position: myMapCenter,
                    map: map,
                    title: 'My Location',
                   /* icon: {
                             url: 'images/orange_marker.svg'
                         }*/
                  });
	
                     <?php
                        if(isset($_COOKIE['latCookie'])){
                             $lat=$_COOKIE['latCookie'];
                             $lng=$_COOKIE['lngCookie'];
                        }
                     
                        $url="https://dunkinsa.abstractagency.net/api/v2/locations/?lat=$lat&lng=$lng&radius=20&page=1&lang=$lang&search_term=";
                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => $url,
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => true,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                        ));
                        
                        $response = curl_exec($curl);
                        
                        curl_close($curl);
                        $data = json_decode($response, true);
                            $i=0;
                           
                            foreach($data['data'] as $val) {?>
                            var id="<?php echo $val['id'];?>";
                            var store_location = {lat: <?php echo $val['lat'];?>, lng: <?php echo $val['lng'];?>};
                            var drive_thru="<?php echo $val['drive_thru'];?>";
                            var parking="<?php echo $val['parking'];?>";
                            var smoking="<?php echo $val['smoking_area'];?>";
                            var dunkin_cards="<?php echo $val['dunkin_cards'];?>";
                            var store_name="<?php echo $val['store_name'];?>";
                            
                            
                            var address ="<?php echo $val['store_name'];?>";
                            var map_link="<?php echo str_replace('"', "", $val['google_map_link']);?>";
                            //map_link=map_link.
                            var hours="<?php echo $val['hours'];?>";
                            var distance="<?php echo number_format($val['distance'],1);?>";
                    markStore(id,store_name,address,hours,distance,store_location,map_link,drive_thru,parking,smoking,dunkin_cards);
                            <?php }
                        ?>
                        
                        
                		// Create a marker and set its position.
            function markStore(id,store_name,address,hours,distance,store_location,map_link,drive_thru,parking,smoking,dunkin_cards){
                		var marker = new google.maps.Marker({
                			map: map,
                			position: store_location,
                			title: store_name,
                			icon: {
                                url: 'images/mapicon.svg',
                                scaledSize: new google.maps.Size(36, 45), // scaled size
                              }
                		});
                		
                        
                        
                        
                		// show store info when marker is clicked
                		marker.addListener('click', function(){
                		    
                			showStoreInfo(id,store_name,address,hours,distance,map_link,drive_thru,parking,smoking,dunkin_cards);
                			
                		});
                		}
                
                    	// show store info in text box
                    	function showStoreInfo(id,store_name,address,hours,distance,map_link,drive_thru,parking,smoking,dunkin_cards){
                    	  
                    	    document.getElementById("info_div").style.display = "block";
                    	    document.getElementById('store_name').innerHTML=store_name;
                    	    document.getElementById('address').innerHTML=address; 
                    		document.getElementById('hours').innerHTML=hours; 
                    		document.getElementById('distance').innerHTML=distance+"km";
                    		console.log(document.getElementById('address').innerHTML=address);
                    		console.log(document.getElementById('distance').innerHTML=distance+"km");
                    	//	$('#store_name').text(store_name);
                    	    $('#map_link').attr("href", map_link);
                    		
                    		var link="window.location='menu.php?branch_id="+id+"&store_name="+store_name+"&type=pickup'";
                    		console.log(link);
                    		var b_id="'"+id+"'";
                    		var pickup="'pickup'";
                    		var b_name="'"+store_name+"'";
                    		var url_string = window.location.href;
                            var url = new URL(url_string);
                            var c = url.searchParams.get("reorder");
                            
                            
                    		if(localStorage.getItem("cartCount")>0 && c==null)
                    		{
                    		    
                    		    var clickfunc='clearCart('+b_id+','+b_name+')';
                    		}
                    		else if(c=="1")
                    		{
                    		    var clickfunc='clearReorder('+b_id+','+b_name+')';
                    		}
                    		else
                    		{
                    		    var clickfunc='setOrder('+b_id+','+b_name+')';
                    		}
                    		$('#order').attr("onclick",clickfunc);
                    		//  document.getElementsByClassName('order')[0].attr("href", 

                            

                    		   if(smoking==1){
                            
                    		        document.getElementById("smoking").style.display = "block";
                    		    } 
                                else
                                {
                                    document.getElementById("smoking").style.display = "none";
                                }
                    		    
                    		     if(parking==1){
                                
                    		        document.getElementById("parking").style.display = "block";
                    		     } 
                                 else
                                 {
                                    document.getElementById("parking").style.display = "none";
                                 }
                    		    
                    		     if(drive_thru==1){
                                   
                    		        document.getElementById("drive").style.display = "block";
                    		     }
                                 else
                                 {
                                    document.getElementById("drive").style.display = "none";
                                 } 
                    		    
                    		     if(dunkin_cards==1){
                                    
                    		        document.getElementById("dnkn").style.display = "block";
                    		     } 
                                 else
                                 {
                                    document.getElementById("dnkn").style.display = "none";
                                 }
                           }
    }
    function setOrder(id,name)
    {
        localStorage.setItem("branch",name);
        localStorage.setItem("branch_d",id);
        $.cookie("branch_id",id)
        localStorage.setItem("type","pickup");
        window.location.href="menu.php?branch="+id+"&name="+name+"type=pickup";
    }

        function busyBranch()
        {
             var message="<?php if($lang=='ar'){ echo 'الفرع مشغول حاليا، يرجى البحث عن فرع اخر';}else{ echo 'This branch is busy at the moment. Please check the nearest branch to you on our mapping list.';}?>";
             var ok="<?php if($lang=='ar'){ echo "موافق";      }else{ echo " OK";}?>";
             var dunkin="<?php if($lang=='ar'){ echo "دانكن"; } else{ echo "Dunkin";} ?>";
             
            Swal.fire({
                        
                                          title: dunkin,
                                          showCloseButton: true,
                                          showConfirmButton:true,
                                          focusConfirm: false,
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
</script>

<script>

        function reorderSubmit(id,name)
        {
            localStorage.setItem('type','pickup');
            localStorage.setItem('branch',name);
            localStorage.setItem('branch_id',id);
            document.getElementById('reorder_form').submit();
            
        }
        function clearReorder(id,name)
        {
                        var lang=<?php echo $lang; ?>;
                        
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
            var type=localStorage.getItem('type');
            var branch_name=localStorage.getItem('branch');
            var branch_id=localStorage.getItem('branch_id');
            var order_type="<?php echo $type;?>";
        /*    if(type=="GiftCard")
            {
                <?php if($lang=='ar')
                {?>
                    var ok="موافق";
                    var dunkin="دانكن";
                    var message="لديك طلب بطاقة دنكاوي بالسلة. اختيار فرع اخر سيعمل على ازالتها من السلة";
                <?php }
                else
                {?>
                    var ok="OK";
                    var dunkin="Dunkin";
                    message="You already have gift card in the cart. Selecting branch will remove it from cart. ";
                <?php }
                ?>
                
            }
            else if(type=="delivery")
            {
                <?php if($lang=='ar')
                {?>
                    var ok="موافق";
                    var dunkin="دانكن";
                    var message="لديك طلب بطاقيوجد لديك بالسلة طلب توصيل. اختيار فرع اخر سيعمل على ازالة كل المنتجات ";
                <?php }
                else
                {?>
                      var ok="OK";
                      var dunkin="Dunkin";
                      message='You already have delivery orders  in the cart.  Selecting branch will remove items from the cart';
                <?php }
                ?>
               
            }
            else 
            {
                
                <?php   if($lang=='ar')
                {?>
                    var ok="موافق";
                    var dunkin="دانكن";
                    var message="مسبقاً، تغيير الفرع سيعمل على إزالة كل المنتجات من السلة. ";
                   message="اختيار فرع اخر سيعمل على ازالة كل ";
                   message+="يوجد لديك في السلة طلب استلام من فرع";
                   message+=" "+branch_name;
               
                <?php }
                else
                {?>
                     var ok="OK";
                     var dunkin="Dunkin";
                     message= 'You already have '+type+ ' orders from ' +branch_name+ ' branch in the cart.  Selecting branch will remove items from the cart';
               
                <?php }
                ?>
               
            } */
          /*  if(localStorage.getItem("cartCount")>0){
              
                                   
                                    Swal.fire({
                        
                                          title: dunkin,
                                          showCloseButton: true,
                                          showConfirmButton:true,
                                          focusConfirm: false,
                                          confirmButtonText:ok,
                                          html:
                                          '<p class="trans-rejected">'+message+'</p>',
                                          width:'690px',
                                          customClass: 'success-msg',
                                          background: '#fff',
                                          backdrop: `
                                           rgba(38, 38, 38, 0.8);
                                          `
                                    }).then(function (result) {
                                      if (result.value) {
                                                localStorage.setItem("cartCount","0");
                                                localStorage.removeItem("cart");
                                                localStorage.removeItem("milkOption");
                                                localStorage.setItem("branch_id",id);
                                                localStorage.setItem("branch",name);
                                        
                                                document.getElementById('reorder_form').submit();
                                      } else {
                                        // handle cancel
                                      }
                                    })
                                                
                                    
                               }
                               else
                               {
                                    
                                    
                                    
                               } */
            localStorage.setItem("branch_id",id);
            $.cookie("branch_id",id);
            localStorage.setItem("branch",name);
            document.getElementById('reorder_form').submit();
        }
        function clearCart(id,name,order_type)
        {
            
            var itemCount=localStorage.getItem('cartCount');
            var order_type="<?php echo $type;?>";
            var type=localStorage.getItem('type');
            var branch_name=localStorage.getItem('branch');
            var branch_id=localStorage.getItem('branch_id');
            if(type=="GiftCard" && order_type=='pickup')
            {
                <?php if($lang=='ar')
                {?>
                    var message="لديك طلب بطاقة دنكاوي بالسلة. اختيار فرع اخر سيعمل على ازالتها من السلة";
                <?php }
                else
                {?>
                    message="You already have gift card in the cart. Selecting branch will remove it from cart. ";
                <?php }
                ?>
                
            }
            else if(type=="delivery" && order_type=='pickup')
            {
                
                <?php if($lang=='ar')
                {?>
                    var message="يوجد لديك بالسلة طلب توصيل، إختيار فرع سيعمل على ازالة كل المنتجات. ";
                <?php }
                else
                {?>
                     var message='You already have delivery orders in the cart.  Selecting branch will remove items from the cart';
                <?php }
                ?>
               
            }
        /*    else if(type=="pickup" && order_type=='delivery')
            {    var lang="<?php echo $lang;?>";
                 alert(lang);
                
                <?php if($lang=='ar')
                {?>
                
                    var message="سوف يتم ازالة كل المنتجات من السلة، هل تريد المتابعة؟";
                <?php }
                else
                {?>
                     var message='You already have pickup orders in the cart.  Do you want to delete pickup orders';
                <?php }
                ?>
               
            }
            
            else if(type=="pickup" && order_type=='GiftCard')
            {
                
                <?php if($lang=='ar')
                {?>
                     var message="يوجد لديك بالسلة طلب استلام من فرع، سيتم حذفه في حال الاستمرار. ";
                <?php }
                else
                {?>
                     var message='You already have pickup orders in the carts.  Do you want to delete pickup orders?';
                <?php }
                ?>
               
            }*/
            else if(type=="pickup" && order_type=='pickup' && id!=branch_id)
            {
                
                <?php if($lang=='ar')
                {?>
                    var message=" تم اختيار الفرع";
                message+=" "+branch_name;
                message+=" مسبقاً، تغيير الفرع سيعمل على إزالة كل المنتجات من السلة";
                <?php }
                else
                {?>
                     var message='You already have pickup orders from '+branch_name+' in the cart.  Do you want to delete pickup orders';
                <?php }
                ?>
               
            }
         /*   else
            {
                
                <?php   if($lang=='ar')
                {?>
                   
                    var message="لديك في السلة طلب استلام من فرع. اختيار فرع اخر سيعمل على ازالة كل ";
                    message="اختيار فرع اخر سيعمل على ازالة كل ";
                    message+="يوجد لديك في السلة طلب استلام من فرع";
                    message+=branch_name;
               
                <?php }
                else
                {?>
                   var  message= 'You already have  '+type+ ' orders from' +branch_name+ ' branch in the cart.  Selecting branch will remove items from the cart';
               
                <?php }
                ?>
            } 
            */
            console.log(id);
             console.log(branch_id);
             var lang="<?php echo $lang ?>";
             if(lang=='ar')
             {
             var ok="موافق";
             var dunkin="دانكن";
             }
             else
             {
                 var ok="OK";
             var dunkin="Dunkin";
             }
            if(itemCount>0 && id!=branch_id)
            {
                                Swal.fire({
                    
                                      title: dunkin,
                                      showCloseButton: true,
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
                                   }).then(function (result) {
                                        if (result.value) {
                                                localStorage.setItem("cartCount","0");
                                                localStorage.removeItem("cart");
                                                localStorage.removeItem("milkOption");
                                                localStorage.setItem("branch_id",id);
                                                 localStorage.setItem("branch",name);
                                                 $.cookie("branch_id",id);
                                                 
                                                var type="<?php echo $type;?>";
                                                //alert(type);
                                                
                                                window.location.href="/PWA2/public/menu.php?branch="+id+"&name="+name+"&type="+type;
                                        } 
                                        else {
                                        // handle cancel
                                        }
                                    })
                                               
                                    
                                    
            }
            else
            {
                 var type="<?php echo $type;?>";
                 //alert(type);
                localStorage.setItem("type",type);
                localStorage.setItem("branch",name);
                localStorage.setItem("branch_id",id);
                $.cookie("branch_id",id);
                window.location.href="/PWA2/public/menu.php?branch="+id+"&name="+name+"&type="+type;
            }
        
        }
        
        function openTab(evt, tabName) 
        {
        if(document.getElementById("mapmode")!=null)
        {
            document.getElementById("branch").style.display = "none";
            
            document.getElementById("active-order-wrapper").style.display = "none";
            
            document.getElementById("map").style.display = "block";
            
            document.getElementById("drive").style.display = "none";
            
            document.getElementById("parking").style.display = "none";
            
            document.getElementById("dnkn").style.display = "none";
            
            document.getElementById("smoking").style.display = "none";
            
            document.getElementById("search_icon").style.display = "none";
            
            var lang=$.cookie("lang");
            if(lang=='ar')
            {
                $('#mapmode').text('قائمة الفروع');
            }
            else
            {
                $('#mapmode').text('Branch List');
            }
            
            document.getElementById("mapmode").id = "listMode";
            document.getElementById("listMode").style.cssFloat  = "right";
            
        }
        else
        {
            document.getElementById("branch").style.display = "block";
            document.getElementById("map").style.display = "none";
            document.getElementById("info_div").style.display = "none";
            document.getElementById("search_icon").style.display = "block";
            document.getElementById("active-order-wrapper").style.display = "block";
            var mapmode="<?php if($lang=='ar'){ echo "خريطة الفروع";}  
                                else
                                { echo "Map Mode";}?>"
            $('#listMode').text(mapmode);
            document.getElementById("listMode").id = "mapmode";
            
        }
    }

</script>
<script>
function show()
{
   /* input = document.getElementById("myInput");
    var i=input.style.display;
    if(i=="none")
    {
        input.style.display="block";
        list = document.getElementById("branches-list");
    }
    else
    {
        input.style.display="none";
        
    }
    */
   
}
function myFunction() {
    
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("branch");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h5")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLXKThd0-VJJuYBkPbZ91-hQWtBkuQX1M&regionSA&callback=initMap">
    </script>
            <?php include 'footer.php';?>
