    <?php include 'header.php';?>
    <?php include 'sidebar.php';?>
    <form action="form_submit.php" method="post" enctype="multipart/form-data" id="registration_form">
                <h2>Register Account</h2><br><br><br><br>
                
                
                      
                <div class="row">
                    <div class="input-field col  s12 m12 l12">
                        <i class="material-icons prefix">people</i>
                            <select name="gender" required="" aria-required="true">
                                <option value="0"  selected>Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                </div> 
                
                <div class="row">
                    <div class="input-field col  s12 m12 l12">
                        <i class="material-icons prefix">people</i>
                            <select name="gender" required="" aria-required="true">
                                <option value="0"  selected>Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="f_name" name="f_name" type="text" class="validate" required="required">
                        <label for="f_name">First Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col  s12 m12 l12">
                        <i class="material-icons prefix">location_city</i>
                              <?php $array = array("Abha",
        "Abu Areish",
        "Dammam",
        "Daelim",
        "Dere'iyeh",
        "Dawadmi",
        "Dhahran",
        "Afif",
        "Ahad Masarha", 
        "Ahad Rufaidah",
        "Al Hassa",
        "Badaya",
        "Baha",
        "Bukeiriah",
        "Alghat",
        "Hareeq",
        "Hofuf",
        "Jubail", 
        "Jumum",
        "Khafji",
        "Kharj",
        "Khobar", 
        "Khurma",
        "Madinah",
        "Majarda",
        "Majma",
        "Midinhab",
        "Mubaraz",
        "Muzahmiah",
        "Qatif",
        "Qunfudah",
        "Qurayat",
        "Oula", 
        "Wajeh (Al Wajh)",
        "Noweirieh",
        "AlRass", 
        "Arar",
        "Sulaiyl",
        "Hail", 
        "Taif",
        "Zulfi",
        "Bader", 
        "Balasmar",
        "Bisha",
        "Abqaiq", 
        "Buraidah",
        "Domat Al Jandal", 
        "Duba", 
        "Dhurma", 
        "Hafer Al Batin", 
        "Hail",
        "Haqil", 
        "Hawtat Bani Tamim",
        "Horaimal", 
        "Anak",
        "Gizan", 
        "Jeddah", 
        "Khamis Mushait", 
        "Khaibar",
        "Khulais",
        "Towal",
        "Makkah", 
        "Mohayel Aseer",
        "Najran",
        "Qariya Al Olaya",
        "Quwei'ieh",
        "Rabigh",
        "Rafha",
        "Ras Tanura",
        "Riyadh Al Khabra",
        "Riyadh", 
        "Sabya", 
        "Safwa", 
        "Sakaka", 
        "Samtah",
        "Seihat",
        "Shaqra", 
        "Sharourah", 
        "Tabuk", 
        "Tarut", 
        "Tatleeth", 
        "Tayma", 
        "Thadek", 
        "Towal",
        "Thumair", 
        "Turaif", 
        "Turba",
        "Umluj",
        "Onaiza",
        "Yanbu");?>
                            <select name="city" required="required" aria-required="true">
                                <option value="" disabled selected>City</option>
                                <?php foreach($array as  $value){ ?>
                                <option value="<?php echo $value;?>"><?php echo $value;?></option>
                                <?php } ?>
                            </select>
            </div>
        </div>
                
                
    </form>
        <div id="verify_c">
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="v_form">
                 <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="v_code" name="v_code" type="text" class="validate" required="" aria-required="true">
                          <label for="v_code">Enter Verification Code</label>
                        </div>
                        <button class="submit verify" name="submit">Verify</button>
                 </div>
            </form>
            <form action="form_submit.php" method="post" enctype="multipart/form-data" id="resend_form">
                 <div class="row">
                        <div class="input-field col s12 m12 l12">
                          <input id="resend_code" name="resend_code" type="hidden" value="resend" class="validate">
                        </div>
        
                        <button class="submit re-send" name="re-send">Resend Verification code</button>
                 </div>
            </form>
                <div>
                
            </div>
        </div>
    <div class="col s6 m4 l1">
            
            </div>
        </div>
    </div>
    
    <?php include 'footer.php';?>
    <script>
    $(document).ready(function(){
    $('select').formSelect();
    })
    </script>