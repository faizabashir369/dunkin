 <?php 
  $_COOKIE["url"] = $_SERVER['REQUEST_URI'];
    if($_COOKIE["shopify_customer_id"] && $_COOKIE["customer_id"]){
        $customer_id=$_COOKIE["customer_id"];
        $shopify_customer_id=$_COOKIE["shopify_customer_id"];
    }
    else
    {
        $customer_id="0";
    }


 include 'header.php';
 ?>
 
    
 
                         <?php

                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://2891e62039758c683b5e8acd645f259a:03982c997e9239e6922cdc4c5df2f254@dunkinsa.myshopify.com/admin/api/2021-01/articles.json?tag=news",
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
                
                ?>
            <div id="registration_form" class="no-padding">
                <div class="space-20"></div>
                <h2>
                <?php if($lang=='ar'){ echo "الأخبار والفعاليات";}else{ echo 'News & Events.';} ?></h2>
                
                      <div class="row">
                          <?php 
                foreach($data['articles'] as $val) {
                    $image=$val['image'];
                    $img=$image['src'];
                    
                ?> 
                
                        <div class="event col s12 m3 l3 gallery-col npnc-news-item npnc-news-the-item" onclick="showDetails('<?php echo $val['id'];?>')">
                          <input type="hidden" class="type" value="news">
                          <input type="hidden" class="news_id" value="<?php echo $val['id']; ?>">
                          <div class="event_img">
                              <img src="<?php echo $img;?>">
                          </div>
                          <div class="event-text">
                              <h1 class="event_time"><?php echo $myDateTime = DateTime::createFromFormat('Y-m-d', $val['created_at']);
                                ?></h1>
                              <h2 class="event_title left-align"><?php echo $val['title'];?></h2>
                          </div>
                        </div>
                       <?php }
                       ?>   

                      
                
                      </div>
<?php   foreach($data['articles'] as $val) {
                    $image=$val['image'];
                    $img=$image['src'];
                    ?>
                <div class="newsBox active show"  style="display:none" id="<?php echo $val['id'];?>"><div class="news-box-inner">

    <!-- Collapse button -->
    <button class="navbar-toggler third-button sm-third-btn open close-news-box" type="button" onclick="closeBox('<?php echo $val['id']?>')">
        <div class="animated-icon3 open"><span></span><span></span><span></span></div>
    </button>


    <div class="nb-inner-title">
        <?php echo $val['title'];?>
    </div>

    <div class="nb-inner-content-container">
        <div class="nbicc-image-container">
            <div class="nbicc-image lazy background-lazy" style="background-image: url(<?php echo $img;?>);"></div>
        </div>

        <div class="nbicc-text-container">
            <div class="nbicc-text-container-inner">
               <?php echo $val['body_html'];?>


                
            </div>
        </div>
    </div>
</div>
</div>  
<?php } ?>
            </div>
            
           
    <script language="JavaScript" type="text/javascript">
        function closeBox(id)
        {
            document.getElementById(id).style.display='none';
            /* $('html, body').animate({
                scrollTop: 100
            }, 1000); */
        }
        function setNewsBoxs(){
            var windowsize = $(window).width();
            var news = $('.npnc-news-the-item');
          
            if(windowsize > 700){
                var total = news.length;
          
                news.each(function(index){
                    index = index+1;

                    //if( index == 3 ||(index - 3 > 0 && (index -3) % 4 == 0))
                    if( index % 4 == 0 || index === total)
                        $(this).after("<div class='newsBox'></div>");

                });
            }else{
                news.each(function(){
                    $(this).after("<div class='newsBox'></div>");

                });
            }
        }

        $(document).ready(function(){
            setNewsBoxs();
        });
        $(document).on('click', '.npnc-news-the-item', function(){
            
            var id = $(this).find('.news_id').val();
			var type = $(this).find('.type').val();
            var ele = $(this);
            var container = ele.nextAll('.newsBox').first();


            //calculate the position of the newsbox marker
            var offset = ele.offset();
            var width = ele.outerWidth();
            var centerX = offset.left + width / 2;
            var ofset=offset.top;
            console.log(ofset);
            const realWidth = window.screen.width * window.devicePixelRatio;
            if(realWidth<600)
            {
               $('html, body').animate({
                scrollTop: 300
            }, 1000);  
            }
            else
            {
                $('html, body').animate({
                scrollTop: ofset
            }, 1000); 
            }
            var height=ele.height();
            console.log(height);
            ofset=ofset+100;
            
          //  document.getElementById(id).style.setProperty("--selection-background", centerX);

            $('html, body').animate({
                scrollTop: ofset
            }, 1000); 
            //check if container already opened
            //do some animation cause it's fun


            

            if(!container.hasClass('active')){
             
            }else{

            }


        });
        function showDetails(id)
        {
            $('.newsBox').hide();
            //document.getElementsByClassName('newsBox').style.display='none';
            document.getElementById(id).style.display='block';
        }
    </script>
    <?php include 'footer.php';?>

