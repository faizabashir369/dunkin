 <?php include 'header.php';?>
 <?php include 'sidebar.php';
 
 ?>
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="card_payment" class="center-align">
                <h2>Debit card payment</h2>
                    <div class="row">
                        <div class="input-field col  s12 m12 l12">
                            <i class="medium material-icons prefix credit_card">credit_card</i>
                                <select name="country" required="" aria-required="true">
                                    <option value=""  selected>SAVED CARDS</option>
                                    <option value="1">SAVED CARDS</option>
                                    <option value="2">SAVED CARDS</option>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col  s12 m12 l12">
                            <h3 class="new-card">Add New Card</h3>
                        </div>
                    </div>
                      
                    <p class="login_p">Please enter your card details as follows:</p>
                    
                    
                        <span>
                            <img class="card-type" src="images/Visa.png" alt="">
                        </span>
                        <span>
                            <img class="card-type" src="images/master_card.png" alt="">
                        </span>
                    
                          
                    
                      
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="email" type="email" name="email" class="validate" required="" aria-required="true">
                          <label for="email">Owners Name</label>
                        </div>
                      </div>
                      
                      
                      <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="card_no" type="password" name="card_no" class="validate" required="" aria-required="true">
                          <label for="card_no">Card Number</label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s5 m5 l5 exp-col">
                          <input id="exp" type="text" name="exp" class="validate" required="" aria-required="true">
                          <label for="exp">EXP DATE</label>
                        </div>
                        <div class="input-field col s2 m2 l2 exp-col">
                            
                        </div>
                        <div class="input-field col s5 m5 l5 cvc-col">
                          <input id="cvc" type="text" name="cvc" class="validate" required="" aria-required="true">
                          <label for="cvc">CVC/CVV2</label>
                        </div>
                      </div>
                      
                        <div class="row save-card">
                            <div class="input-field col s12 m12 l12">
                                <label>
                                    <input type="checkbox" class="filled-in" />
                                    <span>SAVE THE CARD</span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                          
                                <div class="reg-btn">
                                    <button class="submit register log_in" name="submit">Pay Now</button>
                                </div>
                            </div>
                        </div>
                      </div>
                      
                      
                       
    
    
            </form>
            
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    <script>
        $('select').formSelect();
    </script>
    <?php include 'footer.php';?>

