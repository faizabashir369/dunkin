<?php include 'header.php';?>
<?php include 'sidebar.php';?>
                
                <div id="products_menu" class="faq center-align">
                    <?php if($lang=="ar")
                    {?>
                    <h2>الأسئلة الشائعة </h2>
                    <?php 
                    }else{?>
                    <h2>Frequently Asked Questions</h2>
                    <?php } ?>
                   
                <?php

                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/faq?request=1&lang=$lang",
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
                <ul class="collapsible">
                <?php 
                foreach($data['data'] as $val) {
                ?>
                
                    <li>
                      <div class="collapsible-header"><?php echo $val['que'];?><i class="material-icons arrow-down" id="arrow-down">keyboard_arrow_down</i></div>
                      <div class="collapsible-body left-align">
                            <div class="ans"><?php echo $val['ans'];?></div>
                      </div>
                    </li>
                <?php 
                $i++;
                }
                ?>
                </ul>
                <br><br><br><br>
               <!-- <button class="submit_que center-align">Submit Your Question</button> -->
                 </div>
                </div>
                
                            
                            </div>
                       </div>
                    </div>
                <script>
                    $(document).ready(function(){
                        $('.collapsible').collapsible();
                      });
                      //change arrow on collapsing and expandion faqs
                    	$('.collapsible-header').click(function(){
                    	    if($(this).children("i").text()=="keyboard_arrow_down")
                    	    {
                    	        $(this).children("i").text('keyboard_arrow_up');
                    	    }
                    	    else
                    	    {
                    	        $(this).children("i").text('keyboard_arrow_down');
                    	    }
	                });
            
                </script>
<?php include 'footer.php';?>
