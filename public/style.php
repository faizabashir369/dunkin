<style>
    <?php

                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dunkinsa.abstractagency.net/api/v2/homepage?lang=$lang",
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
                <?php foreach($data['data'] as $val) {  $banner='https://dunkinsa.abstractagency.net'.$val['mobile_img'];} ?>
                
                
                

@font-face {
             font-family: BigVesta-bold;
             src: url(font/GESSTwoBold.otf);
        }
        @font-face {
             font-family: BigVesta-light;
             src: url(font/GESSTwoLight.otf);
        }
        @font-face {
             font-family: Montserrat-SemiBold;
             src: url(font/Montserrat-SemiBold.otf);
        }
        @font-face {
             font-family: Montserrat-ExtraBold;
             src: url(font/Montserrat-ExtraBold.otf);
        }
        @font-face {
             font-family: BigVesta-medium;
             src: url(font/GESSTwoMedium.otf);
        }
        @font-face {
             font-family: Montserrat;
             src: url(font/Montserrat-Regular.otf);
        }
        @font-face {
             font-family: Montserrat-bold;
             src: url(font/Montserrat-Bold.otf);
        }
        @font-face {
             font-family: dunkin;
             src: url(font/DunkinSans-Display.otf);
        }
        @font-face {
             font-family: dunkin-bold;
             src: url(font/DunkinSans-Book.otf);
        }
        @font-face {
             font-family: dunkin-light;
             src: url(font/GESSTwoLight.otf);
        }
        @font-face {
             font-family: dunkin-medium;
             src: url(font/GESSTwoMedium.otf);
        }

        body
        {
            font-family:dunkin-bold;
        }
        .wf-text-1 {
            font-size: 15px;
            margin-top: 30px;
        }
        html {
          scroll-behavior: smooth;
        }
        .no-avail
        {
            padding: 5%;
            color: #FF671F;
            font-weight: bold;
            font-size: 13px;
        }
        /* newspopup */
        
        .newsBox.active {
            position: absolute;
            max-height: 660px;
            padding: 0px 15px 0;
            margin-bottom: 20px;
            top: 140%;
            width: 91%;
            z-index:999;
        }
        .arabic
        {
            font-family:dunkin-bold;
        }
.newsBox {
    display: block;
    width: 100%;
    clear: both;
    max-height: 0px;
    transition: 1s all ease;
    overflow: hidden;
    padding: 0;
}
.newsBox.show .news-box-inner:before, .newsBox.show .news-box-inner {
    opacity: 1;
}

.news-box-inner {
    padding: 50px 60px;
    background-color: #efefef;
    position: relative;
    transition: 0.3s all ease-in-out;
    opacity: 0;
}

.news-box-inner:before {
    content: '';
    display: block;
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
    border-bottom: 25px solid #efefef;
    position: absolute;
    top: -36px;
    left: 15px;
    transform: translateX(-50%);
    opacity: 1;
    transition: 0.3s all ease-in-out;
    height: 38px;
}
.news-box-inner .navbar-toggler {
    left: initial;
    right: -23px;
}
.navbar-toggler {
    padding: 0.25rem 0.75rem;
    font-size: 1.125rem;
    line-height: 1;
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
button, [type=button], [type=reset], [type=submit] {
    -webkit-appearance: button;
}
.navbar-toggler {
    padding: .25rem .75rem;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: .25rem;
}
[type=button], [type=reset], [type=submit], button {
    -webkit-appearance: button;
}
.sm-third-btn {
    background-color: #fe6e0b !important;
    border-radius: 100% !important;
    width: 45px;
    height: 45px;
    padding: 11px 4px !important;
    position: absolute;
    top: 40px;
    transform: translateY(-50%) translateX(-100%);
    left: 70px;
    /* box-shadow: 0 2px rgba(0, 0, 0, 0.3); */
    box-shadow: 0 2px #f20c90;
}

.third-button {
}
.nb-inner-title {
    text-align: center;
    font-size: 28px;
    padding-bottom: 50px;
}
.nb-inner-content-container {
    display: table;
    width: 100%;
}
.nbicc-image-container {
    padding-right: 20px;
}
.nbicc-image {
    padding-top: 60%;
    background-size: 100%;
}
.nb-inner-content-container > div {
    display: table-cell;
    width: 50%;
    vertical-align: top;
    position: relative;
}
.nbicc-text-container {
    padding-left: 20px;
}
.sm-third-btn .animated-icon3 {
    height: 24px;
    width: 27px;
}
.animated-icon3 {
    width: 30px;
    height: 20px;
    position: relative;
    margin: 0px;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .5s ease-in-out;
    -moz-transition: .5s ease-in-out;
    -o-transition: .5s ease-in-out;
    transition: .5s ease-in-out;
    cursor: pointer;
}
.animated-icon3 span:nth-child(1) {
    top: 0px;
    -webkit-transform-origin: left center;
    -moz-transform-origin: left center;
    -o-transform-origin: left center;
    transform-origin: left center;
}
.animated-icon3.open span {
    background-color: #fff;
}
.animated-icon3 span {
    display: block;
    position: absolute;
    height: 4px;
    width: 100%;
    border-radius: 0px;
    opacity: 1;
    left: 0;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .25s ease-in-out;
    -moz-transition: .25s ease-in-out;
    -o-transition: .25s ease-in-out;
    transition: .25s ease-in-out;
}
.animated-icon3 span {
    background-color: #fe6e0b;
}
.animated-icon3.open span:nth-child(2) {
    width: 0%;
    opacity: 0;
}
.sm-third-btn .animated-icon3.open span:nth-child(3) {
    top: 19px;
}
.animated-icon3.open span:nth-child(3) {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
    top: 21px;
    left: 8px;
}
.news-box-inner .navbar-toggler span {
    background-color: white;
}
.animated-icon3 span:nth-child(3) {
    top: 20px;
    -webkit-transform-origin: left center;
    -moz-transform-origin: left center;
    -o-transform-origin: left center;
    transform-origin: left center;
}
.animated-icon3.open span {
    background-color: #fff;
}
.animated-icon3 span {
    display: block;
    position: absolute;
    height: 4px;
    width: 100%;
    border-radius: 0px;
    opacity: 1;
    left: 0;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .25s ease-in-out;
    -moz-transition: .25s ease-in-out;
    -o-transition: .25s ease-in-out;
    transition: .25s ease-in-out;
}
.animated-icon3 span {
    background-color: #fe6e0b;
}
.animated-icon3.open span:nth-child(1) {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
    top: 0px;
    left: 8px;
}

.news-box-inner .navbar-toggler span {
    background-color: white;
}
.animated-icon3 span:nth-child(1) {
    top: 0px;
    -webkit-transform-origin: left center;
    -moz-transform-origin: left center;
    -o-transform-origin: left center;
    transform-origin: left center;
}
.animated-icon3.open span {
    background-color: #fff;
}
.animated-icon3 span {
    display: block;
    position: absolute;
    height: 4px;
    width: 100%;
    border-radius: 0px;
    opacity: 1;
    left: 0;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .25s ease-in-out;
    -moz-transition: .25s ease-in-out;
    -o-transition: .25s ease-in-out;
    transition: .25s ease-in-out;
}
.nbicc-text-container-inner {
    position: absolute;
    top: 0;
    left: 20px;
    width: calc(100% - 20px);
    height: 100%;
    overflow-y: scroll;
}
.sidenav-arabic .material-icons,#profile-links-arabic .material-icons,#help-links-arabic .material-icons
{
    float:right !important;
    margin:0 0 0 20px !important;
    
}
#help-links-arabic .menu-clr,#profile-links-arabic .menu-clr
{
    
}

.sidenav-arabic a,#profile-links-arabic a,#help-links-arabic a
{
    text-align:right;
}
.arabic-side-nav
{
    float: right !important;
    margin-left: 200px !important;
    right: -150px;
    left: auto;
}


        .gallery
        {
           margin-left: 2% !important;
           margin-right: 2% !important; 
        }
        .hpts_e_btn
        {
            z-index:1;
            margin-left:auto;
            margin-right:auto;
            padding: 10px 50px;
            margin-top: 20px;
            font-size: 18px;
            background-color: #fe6e0b;
            display: table;
            padding: 10px 20px;
            border-radius: 7px;
            cursor: pointer;
            box-shadow: 0 4px #f20c90;
            position: relative;
            font-family: Dunkin !important;
            color: #fff !important;
            text-transform: uppercase;
            border: none;
            -webkit-appearance: none !important;
            outline: none !important;
            width:195px;
            height:50px;
        }
        .datepicker-cancel, .datepicker-clear, .datepicker-today, .datepicker-done
        {
            color:#FF671F !important;
            font-family:dunkin-bold;
        }
        .rating-stars ul {
            list-style-type: none;
            padding: 0;
            -moz-user-select: none;
            -webkit-user-select: none;
        }
        #rate-website
        {
            background:#fafafa;
        }
        #rate-website .star-rating .fa-star-o,#rate-website .star-rating .fa-star {
            color: #fe6e0b;
            font-size: 20px !important;
        }
        .col .row
        {
            margin-left:0 !important;
            margin-right:0 !important;
        }
        .rating-stars ul > li.star {
            display: inline-block;
        }
        .rating-stars {
            display: table;
            margin: 0 auto;
            margin-top: 60px;
        }
        .wf-scroll-top-btn {
            width: 60px !important;
            height: 60px !important;
            top: 0 !important;
            left: 50% !important;
            transform: translateY(-50%) translateX(-50%) !important;
            background-image: url(../images/website/goToTop.png) !important;
            background-size: 100% !important;
            position: absolute !important;
            cursor: pointer !important;
            z-index: 5 !important;
        }
        .gallery-col
        {
           margin-bottom:20px; 
        }
        .success-msg .trans-rejected
        {
            margin-top:0;
        }
        .input-field>label
        {
            left:10px !important;
        }
        .flavor.notes
        {
            margin-top:15px;
        }
        .is-disabled .datepicker-day-button
        {
            color:#ccc !important;
        
        }
        .event_img
        {
            
        }
        .event_img img
        {
            width:100%;
            height:200px;
            object-fit:cover
        }
        
        .event-text
        {
            height:150px;
        }
        
        #notifyCount
        {
          position:absolute;
          top:24px;
          right:7px;
          width: 22px;
          height: 22px;
          line-height: 16px;
          border-radius: 50%;
          border:2px solid #fff;
          font-size: 13px;
          color: #fff;
          text-align: center;
          background: #FF671F;
        }
        .event-text
        {
            background:#efefef;
            padding:20px;
            height:100px;
        }
        .event_time
        {
            font-size:23px;
            color:#fe6e0b;
            margin:0px;
            font-family:dunkin-bold;
            
        }
        .career-inner {
            display: table;
            width: 100%;
            background-color: #efefef;
            padding: 20px !important;
        }
        .career-inner-text {
            display: table-cell;
            vertical-align: middle;
        }
        .career-inner-text h2
        {
           margin-left:0; 
        }
        @media screen and (max-width: 767px) {
            .career-inner-text {
            display: block;
        }
        }
        .career-inner-btn {
            display: table-cell;
            vertical-align: middle;
        }
        @media screen and (max-width: 767px) {
            .career-inner-btn {
            display: block;
        }
    }
    .cpsas-section-form > .cpsas-section:nth-child(2n + 1) {
    clear: both;
}
.cpsas-section-submit-btn {
margin-bottom: 50px;

}
        .career-apply-now-btn
        {
            display:none;
        }
        .career h2
        {
            font-size: 19px !important;
            font-weight: 900 !important;
            color:#212529 !important;
            margin:10px 10px 10px 0;
            text-align:left !important;
            font-family:dunkin-bold !important;
        }
        .career-location
        {
            margin-left: 0px;
            margin-top: 10px;
        }
        .career-p
        {
           text-align:center; 
           font-size:20px;
        }
        .cbbi-text-container {
            display: table;
            width: 100%;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }
        .cbbi-text-container h2 {
            color: white !important;
            max-width: 600px;
            margin: 0 auto;
            font-size: 27px !important;
            font-family: dunkin-bold !important;
            font-weight: 500;
            line-height: 1.2;
        }
        .cbbi-text-container h1 {
            color: white;
            font-family: dunkin;
            text-transform: uppercase;
            font-size: 50px;
            text-align:center;
        }
        .hplulub-input input.careers_subscribe_email_input {
            padding-left: 30px !important;
            border-bottom: none !important;
        }
        .hplulub-input input {
            height: 4.6rem !important;
            width: 100%;
            border: none;
            margin: 0px !important;
            padding: 0px !important;
            margin: 0 0 0 10px !important;
        }
        .careers_subscribe_email_input {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            padding-left: 20px;
        }
        .fav-re
        {
            margin-left:0;
        }
        .shade
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .arrow_btn {
            color: white !important;
            font-family:dunkin;
            font-size:21px;
        }
        .hplulub-btn {
            width: 22%;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #fe6e0b;
            cursor: pointer;
            overflow: hidden;
            border: none;
        }
        .hplulu-btn-container > * {
            display: table;
            height: 100%;
            float: left;
        }
        .hplulub-input {
            width: 78%;
            background-color: #fff;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .hplulu-btn-container > * {
            display: table;
            height: 100%;
            float: left;
        }
        .hplulu-btn-container {
            display: table;
            width: 600px;
            height: 70px;
            margin: 0 auto;
            margin-top: 20px;
        }
        #subscribe
        {
                background-image: url(https://dunkin.tedmob.com/images/pages_content/1570710866careers_bottom_banner.png);
                width: 100%;
                padding-bottom: 33%;
                background-size: 100%;
                position: relative;
                background-color: rgba(0,0,0,0.5);


        }
        .career-apply-now-btn
        {
            background-color: #fe6e0b;
            float:right;
            display: table;
            line-height:1.6;
            font-size:18px;
            font-weight:400;
            padding: 10px 20px;
            border-radius: 7px;
            cursor: pointer;
            box-shadow: 0 4px #f20c90;
            position: relative;
            font-family: dunkin;
            color: #fff !important;
            text-transform: uppercase;
            border: none;
            -webkit-appearance: none !important;
            outline: none !important;
            /*width:115px;*/
            /*margin-top: 12%;*/
            text-align:center;
        }
        .location-text
        {
            font-size: 16px;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            vertical-align:super;
        }
        .flex
        {
            display:flex;
        }
        .no-margin-left
        {
            margin-left:0 !important;
        }
        .c2
        {
            width:11.5% !important;
            padding:30px 30px 30px 10px !important;
        }
        .career.c2
        {
            padding-left:10px !important;
        }
        .career
        {
          
            
            cursor: pointer;
            margin: 10px 0;
        }
        .career-location img
        {
            width:20px;
        }
        .career h1
        {
        
        color: #fe6e0b;
        font-size: 19px;
        font-weight: 900;
        margin:0px;
        text-align:left !important;
        line-height: 25px;
        }
        .event_title
        {
            font-family:dunkin-bold !important;
            color: #212529 !important;
            font-size: 18px !important;
            margin:10px 0 0 0;
            font-weight:bold !important;
        }
        .left-align
        {
            text-align:left !important;
        }
        #loaderIcon {
        position: fixed;
        top: 0%;
        width: 100%;
        left: 0%;
        background: #fff;
        height: 100%;
        text-align: center;
        z-index:9999;
        
            }
        #loaderIcon img {
            max-width: 100% ;
            width: 100px;
            margin: 0 auto;
            margin-top: 300px;
            visibility: visible;
            
        }
        .cs
        {
            margin:0;
            color:#C0C0C0;
            font-weight:bold;
            padding-bottom: 10px;
        }
        .browser-default
        {
            width:100% !important;
            height:3rem !important;
            border:none;
            color: #9e9e9e !important;
            font-family:dunkin;
            font-size:14px;
            transition: box-shadow .3s, border .3s, -webkit-box-shadow .3s;
            border-bottom: 2px solid rgba(37, 32, 29, 0.5) !important;
        }
        .eng-menu
        {
            margin-left:295px;
        }
        .product-size
        {
           margin-left:50px !important; 
           margin-right:50px !important; 
        }
        #map_link
        {
            margin-left:0px;
        }
        #overlays .order_col
        {
            padding-top:20px !important;
        }
        .headin1_arabic
        {
            font-size:80px !important;
            margin-left: 12%;
            
        }
        
        .heading2_arabic
        {
            margin-left: 12% !important;
        }
        .subtotal
        {
            font-family:dunkin;
            font-size:16px;
            float:right;
        }
        #total-num,#discount-num
        {
            font-family:dunkin;
            float:right;
            font-size:17px;
        }
        
        .fa-star:before
        {
            font-size:40px;
        }
        #discount-num
        {
            font-family:dunkin;
            float:right;
            font-size:17px;
        }
        footer a
        {
            font-size:16px !important;
          
        }
        .order_rating_btn
        {
            background:#EA4397;
            position: absolute;
            left: -70px;
            top: auto;
            bottom: 35px;
            border-radius: 27px;
            width: 210px;
            height: 47px;
            border: none;
            font-family: dunkin;
            font-size: 18px !important;
            color: #fff;
            word-spacing: 6px;
            margin-left: 180px;
        }
        .heading
        {
           padding:11px 0px 0px 14px;
           color:#EA4397 !important;
           text-decoration:none;
           font-size:45px;
           font-family:Dunkin;
        }
        .remove-text
        {
            font-family: 'dunkin';
            color: #80868F;
            font-size: 12px;
            text-align: center;
            margin-left: 22px;
            margin-top: -20px;
            z-index: 9999;
            line-height: 0;
            vertical-align: top;
        }
        .rating-value
        {
            opacity: 0;
            height:0 !important;
            float: left;
        }
        
        .pink_font
        {
            color:#EA4397;
        }
        .select-wrapper .caret
        {
            margin:0 !important;
        }
        .star-rating .fa-star-o,.star-rating .fa-star
        {
            color: #EA4397;
            font-size: 20px !important;
        }
        .select_prefix
        {
            left:0px;
        }
       #verify_c
        {
            text-align:center;
            margin-top:90px;
            margin-left:50px;
            margin-right:50px;
            box-shadow6: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
            padding:20px 190px 100px;
            display:none;
        }
        #update_profile
        {
            display:none;
        }
       
        input::placeholder
        {
            font-family:dunkin !important;
        }
        input[type=text]::placeholder, input[type=email]::placeholder
        {
            font-family:dunkin !important;
        }
        .login_phone
           {
               margin-left:-50%;
           }
        .verify,.re-send
        {
            color: #fff;
            font-family: Dunkin;
            font-size: 14px;
            background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
            background: linear-gradient(0deg, #EC4E98, #EC4E98);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border: none;
            border-radius: 50px;
            letter-spacing: 1px;
            padding: 10px;
            text-align: center;
        }
        .meal
        {
            font-family:dunkin;
            color:#000;
            font-size:15px;
            word-spacing:5px;
            margin:0 0 0 18px !important;
        }
        .input-field.col label
        {
            line-height:0;
            left:10px !important;
        }
        .list-img
        {
            width:80px !important;
        }
        .container
        {
            width:100%;
            max-width: 100%;
        }
        html, body 
        { 
            height: 100%; 
            width: 100%;
            margin: 0; 
        }
        .row
        {
            margin:0;
        }
        .wf-scroll-top-btn {
            width: 60px;
            height: 60px;
            top: 0;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
            background-image: url(../images/website/goToTop.png);
            background-size: 100%;
            position: absolute;
            cursor: pointer;
            z-index: 5;
        }
        .brand-logo
        {
         margin-left:160px;
        }
        .brand-logo img
        {
            
        width:181px;
        height:32px;
        }
        

        .card
        {
            width:100%;
        }
        .card .card-content
        {
            padding:0 !important;
        }
        .float-right
        {
            float:right;
        }
        #notification
        {
            position:absolute;
            right:20px;
            font-size:30px;
            cursor: pointer;
        }
        #notification-li li
        {
            color:#000;
            border-bottom:1px solid #000;
            width:100%;
            padding:10px;
            line-height:25px;
        }
        
        #active-order
        {
            position: absolute;
            left: auto;
            margin-top: 1px;
            right: 100px;
        }
        .material-icons.star
        {
        color:#EA4397 !important;
        }
        .stars .unchecked
        {
        color:#EA4397;
        }
        .active_orders
        {
            padding:30px 150px;
            border-bottom:2px solid #F4F4F4 !important;
        }
        .summary .active_orders
        {
            padding:30px 100px 30px 80px;
        }
        #orders row.active_orders
        {
            border-bottom:2px solid #F4F4F4 !important;
        }
        .active_orders:last-child
        {
            border-bottom:none !important;
        }
        .banner p
        {
            letter-spacing:1px;
            
        }
        .module-border-wrap {
           background:-webkit-linear-gradient(left, #FF671F 0%, #EA4397 100%);
           background:linear-gradient(90deg, #FF671F 0%, #EA4397 100%);
           border-radius: 52px;
           display: inline-block;
           width: auto;
           padding:2px;
        }
        .banner span p
        {
            text-align: justify;
            color:#542400;
            font-family: dunkin;
            width: 25em;
        }
           #menu .tabs-content.carousel.carousel-slider
           {
              height: 800px !important;
              overflow-y: auto; 
           }
        .banner h1
        {
            font-family: dunkin;
            color: #FF671F;
            font-size:75px;
            margin-bottom:0px;
            padding-bottom:0px;
            line-height:0px;
            font-weight:normal !important;
           
        }
        .no-padding
        {
           padding:0 !important; 
        }
        .save-card
        {
            padding:5px 0;   
        }
        .fill
        {
            margin-left:329px;
            margin-top:-45px;
            height:45px;
        }
        .banner h2
        {
            font-family: dunkin;
            font-size:50px;
            color: #FF671F;
            margin-top:20px;
        }
        .navbar
        {
            padding-bottom:0px;
            font-family: dunkin;
        }
        ul.nav
        {
            margin-right:200px;
        }
        nav
        {
            background-color:#fff !important;
            padding-top:13px;
            padding-bottom:87px !important;
        
        }
        nav .nav-wrapper
        {
            padding-right:150px !important;
           
        }
        nav ul a
        {
            color: #542400 !important;
            font-family: dunkin;
            font-style: normal;
            font-weight: normal;
            font-size: 17px !important;
            margin-bottom:0px;

        }
        #sec-menu
        {
            background: #FFEEDC;
            padding-top:34px;
           padding-bottom:34px;
        }
         #sec-menu ul 
         {
            text-align:center;
            margin-left:100px;
            margin-bottom:0px;
            padding-bottom:0px;
            line-height:3px;
             
         }
        #sec-menu ul li
        {
           display:inline;
           padding-right:60px;
           margin-bottom:0px;
           padding-bottom:0px;
        }
        .float-btns
        {
            padding-top:76px;
            padding-left:29px;
        }
        h3.active
        {
            padding:11px 0px 0px 14px;
            border-left:4px solid #EA4397; 
            margin-left:30px;
           color:#EA4397 !important;
           text-decoration:none;
           font-size:20px;
           font-family:Dunkin;
        }
        ul.side-nav
        {
            margin-left:50px;
        }
        
        a.active
        {
           border-bottom:4px solid #EA4397; 
           color:#EA4397;
           text-decoration:none;
           font-size:15px;
           margin-bottom:0px;
        }
        input
        {
            font-family:dunkin !important;
            color:#EA4397;
        }
        .userName
        {
            font-family:dunkin;
        }
        .user
        {
            padding-bottom:12px ;
        }
        #sec-menu
        {
            padding-top:41px;
            padding-bottom:41px;
        }
        #sec-menu ul li a
        {
           padding:30px 20px;
           color:#EA4397;
           text-decoration:none;
           font-family:Dunkin;
           font-size:15px;
        }
        #sec-menu ul li:last-child
        {
            padding-right:0px;
        }
        
        .size img{
        width:50%;
        }
        .selected{
            background: #f5f0f0;
            border-radius:15px;
            
        }

        .size
        {
            padding-top: 10px !important;
        }
        .all-navs
        {
           padding-top:140px;
        }
        h3.center-align
        {
            color: #FF671F !important;
        }
        .message,#message
        {
            color:red;
            
            text-align:center;
            
        }
        #products_menu h2
        {
            font-family:Dunkin;
            text-align:center;
            color: #EA4397;
            padding:50px;
            margin:0;
            font-size:45px;
            
        }
        .order-time
        {
            font-family: dunkin;
            font-size: 14px;
            line-height: 17px;
            margin:0;
            
            
        }
        .dropdown-content li>a, .dropdown-content li>span {
       
        color: #EA4397 !important;
        font-family:dunkin;
        }
         .order-time span
         {
             vertical-align: -webkit-baseline-middle;
         }
        .clock
        {
            font-size:20px !important;
            margin:0 8px 0 0!important;
           
        }
        .order-img
        {
            width:82px;
            height:65px;
        }
        #orders .active_orders
        {
            border-bottom:2px solid  #F4F4F4 !important;
        }
        
        .calander.btn-floating
        {
            position:absolute;
            top:50%;
            
        }
        .order-no
        {
            font-family: dunkin;
            font-size:20px;
            margin:0;
            color:#313131;
            text-transform: capitalize;
        }
        .order-status
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: 900;
            color: #FF671F;
            font-size:17px;
            margin:0;
        }
        .align-content
        {
            text-align:left;
            padding-left:0px !important;
            margin-top:0px;
        }
        .order-active
        {
            background: #EA4397;
            border-radius: 10px;
            color:#fff;
            border:none;
            font-family: dunkin;
            font-style: normal;
            font-weight: 900;
            font-size: 11px;
            line-height: 10px;
            width:67px;
            height:23px;
            text-transform:uppercase;
        }
        
        #registration_form h2,#login_form h2,#contact-form h2,#orders h2,#card_payment h2
        {
            font-family:dunkin;
            font-weight:500;
            text-align:center;
            color: #EA4397;
            font-size:50px;
        }
        .credit_card
        {
            left:-5px;
            font-size:40px !important;
        }
        .new-card
        {
            font-family:dunkin;
            font-size:30px;
            color:#FF671F;
            word-spacing:10px;
        }
        .preloader {
           position: fixed;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           z-index: 9999;
           background-image: url('images/loader.gif');
           background-repeat: no-repeat; 
           background-color: #FFF;
           background-position: center;
           display:block !important;
        }
        #branches-list
        {
            margin-top:90px;
            margin-left:50px;
            margin-right:50px;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
            padding:20px 50px 0px 50px;
            text-align:center;
        }
        .login_p
        {
            font-family: dunkin;
            font-size: 16px;
            text-align: center;
            color: #928F8D;

        }
        #card_payment .login_p
        {
            text-align:center;
            padding:0;
            color: #928F8D;
            font-size:16px;
        }
        #orders.list-orders.branch_address
        {
            padding:100px;
        }
        .product_name
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: 900;
            font-size: 20px;
            line-height: 22px;
            color:#000;
            padding-left:0px;
        }
        .product_details label
        {
            display:block;
            margin-left:140px;
        }
        .pink-font
        {
            color:#EA4397;
        }
        .price
        {
            border-radius:45px;
            background:rgb(236, 78, 152);
            color:#fff;
            border:none;
            font-weight:bold;
            font-size:10px;
            padding:4px 8px;
            margin-right:40px;
        }
        tr {
             border-bottom: 0 !important;
            }
        #registration_form,#products_menu,.product_details,#login_form,#contact-form,#orders,#card_payment,#choose_card
        {
            margin:90px 50px 100px 50px;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
            padding:20px 150px 100px;
        }
        #card_payment
        {
            padding:20px 120px 100px;
        }
        #orders
        {
           padding:30px 0 100px 0; 
           margin-left:50px;
           margin-right:0;
           
        }
         .product_details
        {
            padding:20px 40px;
        }
        #products_menu
        {
             padding:0;
        }
        #success_m
            {
               color:#32CD32; 
               text-align:center;
            }
        p.login
        {
            font-size:19px;
            color:#928F8D !important;
            padding-top:48px;
            text-align:center;
            font-family:dunkin;
        }
        a.login
        {
            color: #FE6E0D;
            font-weight:900 !important;
        }
        .cart
        {
            float:right;
            margin-right:5vw;
            margin-top:0;
            display:inline;
        }
        .cart img
        {
           width:24px;
           height:24px;
        }
        .circle {
          margin-left:16px;
          margin-top:-55px;
          width: 22px;
          height: 22px;
          line-height: 16px;
          border-radius: 50%;
          border:2px solid #fff;
          font-size: 13px;
          color: #fff;
          text-align: center;
          background: #FF671F;
        }
        .location h3
        {
            padding-top:300px;
            font-family: dunkin;
            color: #FF671F !important;
            font-style: normal;
            font-weight: normal;
            font-size: 60px;
            line-height: 107%;
            
        }
        
        .sidenav li>a>i.material-icons
        {
            color:#FF671F !important;
        }
         .sidenav li> a .btn-floating
        {
           
            background:#FF671F !important;
            padding:0;
            height:20px;
            width:20px;
            line-height:20px !important;
        }
        .sidenav li>a .btn-floating i.material-icons
        {
            color:#FFF !important;
            vertical-align:middle;
            font-size:14px;
            line-height:0 !important;
        }
        .sidenav li>a
        {
            color: #5A352C !important;
            font-family: dunkin;
            
        }
        #calander
        {
            position:absolute;
            top:300px;
            left:600px;
            float:right;
        }
        .language
        {
            font-weight:900;
            color:#FF671F;
            margin-left:33px;
            cursor: pointer;
        }
        .mobile-menu
        {
            color:#FF671F !important;
        }
        
        .s6
        {
        
        overflow:hidden;
        
        }
        .s6 h3
        {
            color: #FF671F;
        }
        .s6 p:not(.item-no)
        {
     
        }
        .notify_det_img
        {
            height:300px;
        }
         .pickup
        {
        font-family:dunkin;
        color:#fff;
        background: -webkit-linear-gradient(left, #FF671F 0%, #EA4397 100%);
        background: linear-gradient(90deg, #FF671F 0%, #EA4397 100%);
        box-shadow: 0px 8px 19px rgba(0, 0, 0, 0.1);
        border-radius: 52px;
        border:none;
        letter-spacing:1px;
        padding:15px;
        padding-right:70px;
        padding-left:70px;
        }
        .reg-btn
        {
            text-align:center;
            margin-top:50px;
        }
        .transfer
        {
        color:#fff;
        font-family:Dunkin;
        font-size:20px;
        background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
        background: linear-gradient(0deg, #EC4E98, #EC4E98);
        box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
        border:none;
        border-radius: 50px;
        letter-spacing:1px;
        width:90% !important;
        padding:15px;
        text-align:center;
        }
        .register
        {
       
        color:#fff;
        font-family:Dunkin;
        font-size:20px;
        background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
        background: linear-gradient(0deg, #EC4E98, #EC4E98);
        box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
        border:none;
        border-radius: 50px;
        letter-spacing:1px;
        width:100% !important;
        padding:15px;
        text-align:center;
        }
        
        .loc
        {
        font-family:Dunkin;
        color:#fff;
        text-align:center;
        background: -webkit-linear-gradient(left, #FF671F 0%, #EA4397 100%);
        background: linear-gradient(90deg, #FF671F 0%, #EA4397 100%);
        box-shadow: 0px 8px 19px rgba(0, 0, 0, 0.1);
        border-radius: 52px;
        border:none;
        letter-spacing:1px;
        padding:15px 0;
        width:25%;
        }
       .location
        {
          
           border : 3px solid #FF671F;
           border-radius: 52px;
           letter-spacing:1px;
           background-color:#fff;
           padding:12px;
           font-weight:bold;
           padding-right:70px;
           padding-left:70px;
           color: #FF671F;
           font-family:dunkin;
           
        }
        .notes_survey
        {
            margin-left:50px;
        }
        #overlays {
            position: absolute !important;
            top: 800px;
            left: 600px;
            background:#fff;
            width:30%;
            padding:10px 0 15px 10px !important;
         
        }
        
        .map_info
        {
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12) !important;
            border-radius: 15px !important;
            padding:0 0 0 10px !important;
        
        }
        .view_loc
        {
            width:40%;
        }
        .svg-icons
        {
            width:20px !important;
        }
        .email{
            border: 2px solid #FF671F !important;
            border-radius: 52px !important;
            letter-spacing:1px;
            width:65% !important;
            padding:0px;
        }
        .mobile_card
        {
           display:none; 
        }
        .center
        {
            text-align:center;
        }
        footer
        {
            background: #FFEEDC;
            padding-top:90px;
            padding-bottom:100px;
            padding-left:150px;
            padding-right:100px;
            
        }
         footer ul
         {
             padding-bottom:35px;
             line-height:25px;
         }
        footer a
        {
            text-decoration:none;
            line-height:80px;
            font-family: dunkin;
            color: #EA4397; 
            text-align:left;
            font-size:22px;
            
            
        }
        input[type=text],input[type=email],input[type=password],input[type=tel]
        {
            font-family:dunkin;
            color:#EA4397;
        }
        input[type=email]::-webkit-input-placeholder {
            font-family:dunkin-book;
            color: #542400;
            padding-left:20px;
            font-size:12px;
         }
        input[type=email]::-moz-placeholder {
            font-family:dunkin-book;
            color: #542400;
            padding-left:20px;
            font-size:12px;
         }
        input[type=email]:-ms-input-placeholder {
            font-family:dunkin-book;
            color: #542400;
            padding-left:20px;
            font-size:12px;
         }
        input[type=email]::placeholder {
            font-family:dunkin-book;
            color: #542400;
            padding-left:20px;
            font-size:12px;
         }
         input:focus
         {
         border-bottom:1px solid #9e9e9e !important;
         box-shadow:0 1px 0 0 #9e9e9e !important;
         }
         input:focus + label
         {
             color: #FF671F !important;
         }
         .input-field .prefix.active
         {
             color: #FF671F !important;
         }
        .side-nav li
        {
            font-family:dunkin;
            font-size:14px;
            color: #000;
        }
        footer ul li a
        {
            line-height:0;
        }
         footer ul li a,.news
         {
            font-family:dunkin;
            color: #542400 !important;
            font-size:12px;
         }
        .social
        {
            text-align:center;
            padding-bottom:50px;
           
        }
        .re-send,.verify
        {
            width:100% !important;
        }
        .pad-top
        {
            padding-bottom:100px !important;
        }
        .flex {
           display: -webkit-box;
           display: -ms-flexbox;
           display: flex;
           -ms-flex-wrap: wrap;
               flex-wrap: wrap;
        }
        .fills
        { 
            position:absolute;
            font-family: dunkin;
            font-size: 100px;
            top: 200px;
            left: 420px;
        }
        .banner
        {
            font-family: dunkin !important;
            background: url("<?php echo $banner; ?>");
            margin-right:0px;
            padding-left:20px;
            margin-top:0px;
            padding-top:0px;
            padding-bottom:100px;
            background-repeat: no-repeat;
            background-size: 67%;
            background-position: right;
            
            
        }
        .banner h1
        {
            padding-right:0px;
        }
        .p-color
        {
            font-family: dunkin;
            color: #EA4397;
            font-size:25px;
            margin-left:0;
        }
        .icon-block
        {
            display:block;
        }
     
        .copyright
        {
            font-family: dunkin;
            color: #EA4397;
        }
        
        .menu-clr
        {
            color:#FF671F;
            background-color:#fff;
        }
        .container {
            max-width: 100% !important;
            width: 100% !important;
            margin:0px;
            padding:0px;
            padding-right:0px !important;
            padding-left:0px !important;
        }
        .visit
        {
            font-family:dunkin;
            font-size:100px;
            padding-top:0px;
        }
        .mobile_banner
        {
            display:none;
        }
        .social .btn-floating
        {
           background:#542400 !important;
        }
        .menu-social
        {
            margin-left:32px;
            padding-bottom:30px;
        }
        button.reorder
        {
           width:80% !important; 
           margin-left:auto;
           margin-right:auto;
        }
        .menu-social .btn-floating
        {
            width:25px;
            height:25px;
            font-size:0;
            margin-right:6px;
        }
        .twitter
        {
            background :#00ACEE !important;
        }
        .facebook
        {
             background : #3B5998 !important;
        }
        .snapchat
        {
             background :#FFFC00 !important;
        }
        .instagram
        {
             background :-webkit-linear-gradient(top, #C2019A 0%, #EE0018 100%);
             background :linear-gradient(180deg, #C2019A 0%, #EE0018 100%);
        }
        .share
        {
            background:#EC4E98 !important;
        }
        .menu-social .btn-floating i
        {
            font-size:15px;
            line-height:0;
        }
       
        select {
            color:#333 !important;
        }
        .card_balance
        {
            margin:100px 50px 100px 100px;
            text-align:center;
            border-radius: 15px;
            padding-bottom:0px;
            padding-top:0;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
            
        }
        div.clear_both {
    margin: 0;
    padding: 0;
    font-size: 0;
    height: 0;
    line-height: 0;
    clear: both;
}
        
        #calander
        {
            position:absolute;
            top: 650px;
            left:970px;
        }
        .notif_title
        {
            font-family:dunkin;
            font-size:22px;
            text-align:left;
            color:#EA4397;
            word-spacing:8px;
            margin-bottom:10px;
        }
        .notes_survey.active
        {
            font-size:18px !important;
            
        }
        .notes_survey.active:focus
        {
            color:#FF671F !important;
        }
        .notification_details
        {
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            margin:100px 18px 100px 50px;
            border-radius: 12px;
            text-align:center;
            padding-bottom:50px;
        }
        .time
        {
            font-family: dunkin;
            font-size:13px;
            float:left;
            color: #313131;
        }
        .notification_details p
        {
            text-align:justify;
            margin:0;
            padding-bottom:30px;
            font-family: dunkin;
            color: #6C6C6C;
            font-size:13px;
        }
        .details
        {
             padding-left:80px;
             padding-right:80px;
        }
        .card_balance h2
         {
             font-family:dunkin;
             color:#EC4E98;
             font-size:32px;
         }
        .card_balance h4
         {
             font-family:dunkin;
             color:#EC4E98;
             font-size:25px;
         }
         .h_points
         {
             font-family:dunkin !important;
         }
         .bottom-text
         {
             text-align:center;
         }
         .space-20
         {
             padding-top:40px;
         }
        .card_balance p
         {
             text-align:center;
             font-weight:600;
             text-align:center;
             color:#ABABAB;
             font-size:18px;
         }
        .login-btn
        {
            margin-left:0px;
        }
        #myInput
        {
            cursor: context-menu;
            margin-left:10px;
            width:250px;
            display:inline;
            font-size:20px;
        }
        #myInput::placeholder
        {
            color:#000;
        }
        #datetime
        {
            color:#fff;
            border-bottom:none;
            height:1rem;
            font-size:13px;
            text-align:center;
            margin-bottom:0;
        }
        #datetime::-webkit-input-placeholder {
            color:#fff;
            text-align:center;
        
        }
        #datetime::-moz-placeholder {
            color:#fff;
            text-align:center;
        
        }
        #datetime:-ms-input-placeholder {
            color:#fff;
            text-align:center;
        
        }
        #datetime::placeholder {
            color:#fff;
            text-align:center;
        
        }

        #datetimepicker7
        {
            color:#fff;
            border-bottom:none;
            height:1rem;
            font-size:10px;
            text-align:center;
            margin-bottom:0;
        }
        #datetimepicker7::-webkit-input-placeholder {
            color:#fff;
            text-align:center;
        
        }
        #datetimepicker7::-moz-placeholder {
            color:#fff;
            text-align:center;
        
        }
        #datetimepicker7:-ms-input-placeholder {
            color:#fff;
            text-align:center;
        
        }
        #datetimepicker7::placeholder {
            color:#fff;
            text-align:center;
        
        }
        .datepicker-day-button
        {
            color:#000 !important;
        }
        .collections
        {
            margin:0 !important;
        }
        .transfer_points
        {
            margin-top:100px;
            text-align:center;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
            padding:8.6vh 13.9vw;
        }
        .custom-padding
        {
            padding:50px 100px;
        }
        .save-fav
        {
            padding:50px 100px !important;
        }
        .product-row
        {
            padding-top:10px;
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
        .transfer_points h4
        {
           color:#EC4E98; 
           font-family:dunkin;
           font-size:26px;
        }
        .transfer_points .input-field>label
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
        }
         .transfer_points input.select-dropdown
         {
            font-family: dunkin;
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
         }
        .transfer_points p
        {
            font-family:dunkin;
            color: #5A352C;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            letter-spacing:2px;
            padding:0 15px;
        }
        
        .product_image
        {
            max-width: 100%;
            height: auto !important;
            width: 150px;
        }
        .minus
        {
            margin-bottom:4px;
            padding-right:20px;
        }
        .plus
        {
            padding-left:20px;
        }
        .quantity
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: 800;
            font-size: 20px;
            color: #EC4E98;
        }
        .img_web
        {
             text-align:center;
             
        }
        .img_mobile
        {
            display:none;
        }
        input.select-dropdown
        {
            color:#9e9e9e;
            font-family: dunkin;
            font-size:14px !important;
        }
        .reg-btn
        {
          text-align:center !important;  
        }
        .input-field>label
        {
            color: #9e9e9e;
            font-family: dunkin;
            font-size:14px !important;
            width:100% !important;
            left:0  !important;
            /* margin-left:30px !important; */
        }
        #card_payment .input-field>label
        {
            color: #9e9e9e;
            font-family: dunkin;
            font-size:14px !important;
            margin-left:0 !important;
            text-transform:uppercase;
            left:0 !important;
        }
        
        .partner_name
        {
            font-family: Dunkin;
            font-weight: bold;
            font-size: 34px;
            color: #5E3613;
            line-height:100%;
            vertical-align:middle;

        }
        .p_name
        {
            margin-left:30px !important;
        }
        #partners
        {
            padding:24px 200px 16px;
        }
        #partners:first-child
        {
            padding-bottom:47px;
        }
        #partners:last-child
        {
            padding-bottom:67px;
        }
        .space-70
        {
          padding-top:70px;  
        }
        .gift_cards
        {
            padding:0 20px;
        }
         #products_menu h2.about
        {
            padding:30px 0 0 !important;
        }
       .carousel h3
       {
           font-family:Dunkin;
           font-size:40px;
           margin:0px;
       }
       .h_points
       {
            color: #EC4E98;
            font-family: dunkin;
            font-size: 30px !important;
            font-weight:900;
       }
       .carousel h5
       {
           font-weight:bold;
            margin:8px 0;
            font-size:20px;
       }
       .card_btn
       {
           background:#fff;
           color:#EA4397;
           font-weight:bold;
           border:none;
           border-radius:50px;
           padding:10px 30px;
       }
       .carousel img
       {
           border-radius:15px !important;
       }
       .slider .slides {
            background-color: #fff !important;
       }
       #mycards .carousel
       {
           width:350px !important;
           height:700px !important;
           text-align:center !important;
           margin: auto;
           
       }
       #mycards .carousel-item
       {
           background:url("images/card_bg1.png");
           background-size: 300px 177px;
           border-radius:15px;
           -webkit-transform: translateX(25px) translateY(0) translateX(0px) translateX(0px) translateZ(0px) !important;
                   transform: translateX(25px) translateY(0) translateX(0px) translateX(0px) translateZ(0px) !important;
         
       }
       #mycards .carousel.carousel-slider .carousel-item
       {
           width:300px !important;
           min-height:177px !important;
           height:177px !important;
           
       }
       
       .fav_btn,.fav-btn
       {
           border:none;
           background:#fff;
           font-family: dunkin;
           color: #000;
           font-size: 15px;
           word-spacing: 5px;
           
       }
       .fav-btn
       {
           border:none;
           background:#fff;
           width:100% !important;
       }
       .caption
        {
           line-height:30px !important;
        }
        .third-menu 
        {
            width: 100%;
            background: #FFFDFA;
            border-bottom:2px solid rgba(236, 78, 152, 0.2);
            overflow: auto;
        }
        .branch_menu i
        {
            padding-top:5px;
            font-size:22px;
        }
        .branch_menu h5
        {
            margin:0px;
            padding-bottom:5px;
            line-height:0px;
            font-weight:bold;
            font-family: dunkin;
            padding:2px;
            font-size:22px;
            cursor:pointer;
        }
        .contact_label
        {
            margin-left:50px !important;
        }
        .input-field input[type]
        {
            border-bottom:2px solid rgba(37, 32, 29, 0.5) !important;
            
        }
        
        .branch_menu i,h5
        {
            display:inline;
            
        }
        .contact_message
        {
            
            width:100% !important;
        }
        .switch label input[type=checkbox]:checked+.lever:after
        {
            background:#FF671F !important;
        }
        .switch label input[type=checkbox]:checked+.lever {
             background-color: rgba(0,0,0,0.38) !important;
        }
       
        h2.about
        {
            font-family:dunkin;
        }
        p.about
        {
            font-family:dunkin;
            color: #6C6C6C;
            text-align:center;
            font-size:18px;
        }
        .about_us .row
        {
            border-bottom:2px solid  #F4F4F4;
            padding:20px 60px;
        }
        .about_us .row:last-child
        {
            border-bottom:0px;
        }
         h5.about
        {
            color: #FF671F;
            text-align:center;
            font-family:dunkin;
            display:block;
            font-size:30px;
            margin-bottom:20px;
        }
        .card_row
            {
                padding-bottom:20px !important;
            }
        h5.about_eng
        {
            color: #FF671F;
            text-align:center;
            font-family:dunkin;
            display:block;
            font-size:30px;
            font-weight:800;
        }
        p.about_eng
        {
            font-family:dunkin !important;
            color: #6C6C6C;
            text-align:justify;
            font-size:18px;
        }
        .menu_again
        {
            border-bottom:2px solid #F4F4F4;
            padding:20px 70px;
        }
        .menu_again:last-child
        {
            border-bottom:none;
            padding-bottom:40px;
        }
        .float-left
        {
            float:left;
            margin-left:10px;
        }
        .menu_again .img-circle
        {
           
        }
        .msg-padding
        {
            padding-right:50px;
            padding-left:50px;
            margin:0;
        }
        .select-wrapper label.invalid {
            margin-top: 62px;
            margin-left: -11px;
            color: #F44336;
        }
        .branch
        {
            padding:50px;
            border-bottom:2px solid #F4F4F4;
        }
        .rate-order
        {
            float:right;
        }
        .nav-wrapper .brand-logo
        {
            margin-left: 95px;
        }
        .sidenav
        {
            width:300px !important;
        }
        
        .sidenav.profilenav,.sidenav.helpnav
        {
            width:300px !important;
        }
        .branch_menu a
        {
           float: left;
            padding: 40px 0;
            color: #000;
            text-decoration: none;
            font-family: Dunkin;
            font-size: 20px;
            width: 50%; /* Four links of equal widths */
            text-align: center;
        }    
        .sidenav li
        {
            border-bottom:1px solid #F4F4F4;
            color: #5A352C;
        }
        .menu-icons
        {
            vertical-align:baseline;
            width:25px;
            height:25px
        }
        .menu-social .fa
        {
            vertical-align:initial;
        }
        
        .third-menu a {
            float: left;
            padding: 20px 20px;
            color: #EA4397;
            text-decoration: none;
            font-family: Dunkin;
            font-size: 20px;
            width: 50%; 
            text-align: center;
        }
        #products_menu .third-menu a {
            width: 33.33%;
        } 
        #orders .third-menu a {
            width: 50%;
        } 
        .third-menu a:hover {
             
        }
            
        .third-menu a.active {
              
            }
       
        
        .indicators
        {
           top:200px !important;
        }
        #mycards .carousel .indicators .indicator-item
        {
            margin:0 3px !important;
             
            width:10px !important;
            height:10px !important;
            background-color:#696969;
        }
        .remove
        {
            width:35px;
            display:block;
            
        }
        .margin-left
        {
            margin-left:30px;
        }
        .add_address
        {
            border-radius:50px;
            border:none;
            width:70%;
            padding:18px 0;
            font-family:dunkin;
            font-weight:bold;
            font-size: 22px;
            color:#fff;
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
        }
        .address-heading,.addresses
        {
            font-family: dunkin;
            font-size: 20px;
            line-height: 22px;
            margin:0;
            color: #5A352C; 
        }
        .addresses
        {
            font-family: dunkin;
            font-size: 16px;
            margin-left:0;
            margin-top:10px;
        }
        .balance
        {
            text-align:right;
            padding-right:50px;
            line-height:0px;
            background:rgba(236, 78, 152, 0.2);
            padding-top:10px;
            padding-bottom:15px;
            margin-bottom:0px;
        }
        .balance h4
        {
            color:#000;
            margin-top:0px;
        }
        .balance h3
        {
            color: #FF671F;
            font-size:30px;
            margin-bottom:0px;
            margin-top:0px;
            font-weight:600;
        }
        .logo-img
        {
            width:330px;
        }
        .row .col 
        {
            padding-left:0px ;
            padding-right:0px ;
        }
        .static-code
        {
            margin-left:30px;
            margin-bottom:0px;
        }
        #cell-phone
        {
         /*   width:83% !important;
            height:25px;
            */
            float:right;
        }
        input.invalid
        {
            box-shadow: 0 0px 0 0 #a69a99 !important;
        }
        #phone-label
        {
           /* margin-left:70px !important; */
        }
        .containers {
            position: relative;
            text-align: center;
            color: black;
        }
        .containers img
        {
            width:350px;
            height:195px;
            border-radius:15px;
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
        }
        .gift_cards
        {
            padding:0 20px;
        }
       .containers h3
        {
           font-family:Dunkin;
           color: #fff;
           font-size:40px;
           margin:0px;
       }
       .h_points
       {
            color: #EC4E98;
            font-family: dunkin;
            font-size: 30px !important;
            font-weight:900;
       }
       .containers h5
       {
           font-weight:bold;
           color: #fff;
           margin:8px;
           font-size:20px;
       }
       #addcards
       {
           position:relative;
           display:none;
           margin-top:45px;
       }
       .containers .row
       {
           margin-bottom:0px !important;
           padding-top:50px !important;
           padding-bottom:50px !important;
       }
       .containers .col
       {
           padding-top:20px !important;
       }
       li::marker {
           font-size:0;
           display:none;
       }
       .card_r
       {
           margin-bottom:0 !important;
           padding-right:50px;
           padding-left:50px;
           padding-bottom:0;
       }
       .map_mode
       {
           color:#EA4397 !important;
           font-family:Dunkin;
       }
       .distance
       {
           border-radius:25px;
           background:#EA4397;
           display:inline;
           color:#fff;
           font-size:15px;
           padding:2px 6px;
           font-family:dunkin;
           float:left;
       }
       #city
       { 
                background:transparent;
                position:inherit !important;
                top: 0px !important;
                left: 0 !important;
                opacity: 1 !important;
                width:100% !important;
                height:3rem !important;
                border-bottom: 2px solid rgba(37, 32, 29, 0.5) !important;
                pointer-events: auto !important;
                


       }
       .search_icon
       {
           text-align:left !important;
           padding-left:36px !important;
       }
       .branch_details
       {
           margin:0px !important;
       }
       .branch h5
       {
           display:inline;
           margin:0;
           float:left;
           font-size:22px;
           font-weight:bold;
           color:#000;
           line-height:40px;
       }
       .branch a
       {
          color:#000;
       }
       .facilities
       {
           float:left;
       }
       .order
       {
          background:#EA4397;
          color:#fff;
          border-radius:25px;
          border:none;
          font-family:dunkin;
          width:107px;
          height:40px;
          font-size:18px;
          text-transform:uppercase;
          text-align:center;
          padding:0 !important;
          display: inline-block;
       }
       .order_map {
            background: #EA4397;
            color: #fff;
            border-radius: 25px;
            border: none;
            font-family: dunkin;
            width: 70px;
            height: 30px;
            font-size: 15px;
            text-transform: uppercase;
        
        }
       .facility
       {
          text-align:left;
          margin-left:0px;
       }
       .facility img
       {
           margin-left:0;
           float:left;
           padding-right:10px;
       }
       .address,#hours
       {
           color: #928F8D;
           margin:0px;
           display:block;
           text-align:left;
       }
       button.order
       {
           margin-top:40px;
       }
        a.map-dir
        {
            display:inline;
            margin-left:20px;
            vertical-align:top;
            margin-top:0;
        }
        
        @media screen and (max-width: 767px) {
           a.map-dir
        {
            display:inline;
            margin-left:0px;
            margin-top: 10px;
        } 
        }
       .order_col
       {
           padding-top:15px !important;
       }
        .horizontal-space
        {
            padding-left:0px;
        }
        #map{
                    display:none;
                	width: 100%;
                	max-width: 100%;
                	height: 500px;
        }
        .sidebar-form .row
        {
            margin-bottom:0px !important;
        }
        .product 
        {
            width:100%;
            margin-left:0 !important;
        }
        .product_details .product-name
        {
            margin-left:0;
        }
        .product .col
        {
            border:1px dotted rgba(196, 196, 196, 0.16);
            text-align:center;
            padding-top:30px !important;
            padding-bottom:20px  !important;
        }
        .collecion_name
        {
            font-family:dunkin;
            background: #E70074;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            border-radius: 45px;
            border:none;
            width: 134px;
            height: auto;
            padding:8px;
            font-weight:500;
            color:#fff;
            font-size:12px;
        }
        .product-size
        {
            margin:0px 50px!important;
        }
        [type="checkbox"].filled-in:checked+span::before
        {
           width:8px !important;
           height:14px !important;
           color:rgb(236, 78, 152) !important;
           background:#fff !important;
           border-right: 2px solid rgb(236, 78, 152) !important;
           border-bottom: 2px solid rgb(236, 78, 152) !important;
        }
        [type="checkbox"].filled-in:checked+span::after
        {
            color:#000 !important;
            background:yellow !important;
            border: 2px solid rgb(236, 78, 152) !important;
            background-color: #fff !important;
        }
        .edit
        {
            font-size: 14px !important;
        }
        textarea.materialize-textarea:focus
        {
            border-bottom:0 !important;
            box-shadow:none !important;
        }
        .calories
        {
            color: #92908E;
            background: #F0F0F0;
            border-radius: 6px;
            font-family: dunkin;
            font-style: normal;
            font-weight: 800;
            font-size: 15px;
            padding:3px 5px;
        }
        .overview
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: normal;
            font-size: 15px;
            color: #6C6C6C;
        }
        .order_price,.go_to_cart,.submit_que
        {
            background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
            background: linear-gradient(0deg, #EC4E98, #EC4E98);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 50px;
            color:#fff;
            font-family: dunkin;
            font-style: normal;
            font-weight: 800;
            font-size: 14px;
            border:none;
            padding:15px;
            width:50%;
        }
        .go_to_cart
        {
            background: -webkit-linear-gradient(bottom, #FF671F, #FF671F);
            background: linear-gradient(0deg, #FF671F, #FF671F);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            padding:15px 0;
            margin-top:30px;
            margin-bottom:50px;
            
        }
        .submit_que
        {
            font-family: dunkin;
            font-size:22px;
            margin-top:30px;
        }
       
        #notes,#notes_survey
        {
            width:85%;
            overflow-y: scroll;
            resize: none;
            height:100px;
            max-height:100px;
            background: #F0F0F0;
            border-radius:15px;
            border:0px;
            padding:10px;
            font-family:dunkin;
        }
        #notes_survey
        {
            width:97%;
            height:150px;
            max-height:150px;
            border-radius:8px;
            margin-left:4px;
            padding:10px !important;
        }
        .notes_survey
        {
            left:18px !important;
            font-family: dunkin;
            font-style: normal;
            font-weight: bold;
            color: rgba(37, 32, 29, 0.5);
        }
        .edit
        {
            font-size:20px !important;
            padding:0 6px 0 15px;
        }
        [type="checkbox"]+span
        {
            font-weight:700 !important;
        }
        label.notes
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: bold;
            font-size: 12px !important;
            margin-left:20px;
        }
       .faq
        {
            padding:80px 100px 100px 100px !important;
            margin:90px 50px 70px 50px !important;
        }
        .faq h2
        {
            padding:0  0 50px 0 !important;
            font-size:33px;
            word-spacing: 23px;
            
        }
        .question
        {
            font-family: dunkin;
            font-size: 15px;
            margin-bottom:20px;
        }
        .track_order
        {
            background: -webkit-linear-gradient(350.13deg, #FE6F0D 14.56%, #FFAE76 99.99%);
            background: linear-gradient(99.87deg, #FE6F0D 14.56%, #FFAE76 99.99%);
            border-radius: 15px;
            margin:30px 50px;
            color:#fff;
            font-family:dunkin;
            text-align:center;
            padding:25px;
        }
        .track_order h2
        {
            color:#fff !important;
            font-size:53px !important;
        }
        .track_order h2,.track_order h5,p
        {
            margin:10px;
        }
        .track_order h5
        {
            font-size:30px;
        }
        .order-msg
        {
            color: #313131;
            font-family: dunkin;
            font-size:22px;
            font-weight:900 !important;
        }
        .v_align
        {
            z-index: 3;
            position: relative;
            text-align:center;
        }
        .v_align::after{ 
          content: '';
          width: 3px;
          height: 50px;
          position: absolute;
          left: 50%;
          top: 60%;
          background-color: #ABABAB;
          -webkit-transform: translateX(-50%);
                  transform: translateX(-50%);
          -webkit-transition: all .2s ease-in-out  ;
          transition: all .2s ease-in-out  ;
        }
        .order-time
        {
            color: #313131 !important;
            
        }
        .order-stats
        {
            padding:0;
            margin:0 100px !important;
            border-bottom: none !important;
        }
        .track_order i.large
        {
            margin:0 10px 0 0;
            font-size:20px;
            vertical-align:top;
        }
        .order-time i.large
        {
            vertical-align:-webkit-baseline-middle;
        }
        
        .collapsible-header i
        {
            margin-right:0 !important;
        }
        .collapsible-header
        {
            background: #F2F2F2 !important;
            border-radius: 15px !important;
            margin-bottom:30px;
            padding:20px !important;
            font-family: dunkin;
            font-style: normal;
            font-weight: 600;
            font-size: 15px;   
            text-transform: capitalize;
            text-align:left;
            color: #656565;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                    justify-content: space-between;
        }
        .collapsible
        {
            border:0px  !important;
            box-shadow:0 0 0 0 rgba(0,0,0,0.2) !important;
        }
        .collapsible-body
        {
            padding-top:20px !important;
            background: #FAFAFA;
            border-radius: 15px;
            margin-bottom:30px;
            font-family: dunkin;
            font-style: normal;
            font-weight: 500;
            font-size: 15px;
            color: #A5A5A5;
        }
        .attachment_btn
        {
            float:right !important;
            margin-top:-20px !important;
            background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
            background: linear-gradient(0deg, #EC4E98, #EC4E98);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 8px !important;
            width:80px;
            padding-top:8px;
            height:43px;
        }
        .file-path-wrapper
        {
            margin-right:0;
            margin-left:38px;
            width:85%;
        }
        
        .log_in
        {
            width:90% !important;
        }
        .survey .submit_que
        {
            margin-bottom:100px;
            width:77%;
        }
        .attachment_btn img
        {
            margin-top:5px;
            height:35px;
        }
        .survey_row.survey_last
        {
            border-bottom:none !important;
            padding-bottom:0 !important;
        }
        .survey_row
        {
            border-bottom:2px solid  #F4F4F4;
            margin:0 !important;
            padding-left:120px;
            padding-right:120px;
            
        }
        .unread
        {
            background:#C0C0C0;
        }
        #survey_padding
        {
            padding-top:0 !important;
            padding-bottom:0 !important;
        }
        .survey_row:last-child
        {
            border-bottom:none !important;
        }
        .survey_row p
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: 800;
            font-size:17px;
            text-align:left;
            color:#000;
            margin:0;
        }
        .survey
        {
            padding:0;
        }
        .stars
        {
            margin-top:5%;
        }
        .item-no
        {
            font-family: dunkin;
            font-size: 20px;
            text-transform: capitalize;
            color: #FF671F;
            
            
        }
        .item-size
        {
            margin: 0;
            color: #fff;
            display: inline;
            font-family: dunkin;
            background: #FF671F;
            border-radius: 50px;
            font-size: 10px;
            margin-bottom: 5px !important;
            margin-left: 15px;
            position: relative;
            bottom: 4px;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height:17px;
            padding:2px 5px;
        }
        .swal-height2
        {
            height:700px !important;
            padding:50px 0 50px;
        }
        .sugar,.flavor
        {
            background: #F4F4F4;
            border-radius: 25px;
            color: #6C6C6C;
            font-family: dunkin;
            text-transform: capitalize;
            border:none;
            font-size:15px;
            padding:8px 12px;
            margin-right:5px;
        }
        .item-qua
        {
            font-family: dunkin;
            color:#FF671F;
            font-size:20px;
        }
        .item-price
        {
            font-family: dunkin;
            font-size: 18px;
            color: #000000;

        }
        .full_width
        {
            width:80%;
            border:none;
            color:#fff;
            border-radius:50px;
            display:block;
            float:left;
            margin-right:10%;
            margin-left:10%;
            padding:12px;
            font-family:dunkin;
            font-size:20px;
        }
        .active_orders:last-child,.bor.active_orders:last-child,.bor.active_orders:nth-last-child(2),.bor.active_orders:nth-last-child(3),.bor.active_orders:nth-last-child(4),.bor.active_orders:nth-last-child(5),.bor.active_orders:nth-last-child(6)
        {
            border-bottom:none !important;
            padding-top:10px;
            padding-bottom:10px;
        }
        
        .discount-code
        {
            background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
            background: linear-gradient(0deg, #EC4E98, #EC4E98);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 8px;
            font-family:dunkin;
            color:#fff;
            border:none;
            font-size:20px;
            width:25%;
            height:56px;
            border-radius:4px;

        }
        .choose-method
        {
            color: #928F8D;
            font-family: dunkin;
            font-size: 15px;

        }
        .remove-code
        {
            background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
            background: linear-gradient(0deg, #EC4E98, #EC4E98);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 8px;
            font-family:dunkin;
            color:#fff;
            border:none;
            font-size:20px;
            width:10%;
            height:56px;
            border-radius:4px;
            vertical-align: top;
        }
        #discount_code
        {
            width:57%;
            border-bottom: 1px solid #CCCCCC !important;
            border:1px solid #CCCCCC;
            height:34px;
            border-radius:4px;
            padding:10px;
            background:#fff;
            z-index:-1;
            display:inline;
            
            
        }
        #discount
        {
            color: #CCCCCC;
            font-family:dunkin !important;
            padding:5px 15px;
            margin-top:-20px;
            top:0;
            left:20px !important;
            position:absolute;
            font-size:16px;
            letter-spacing:1px;
            z-index:1;
            background:#fff;
            opacity:1;
            width:200px !important;
            transform:none;
        }
        .total-price
        {
            font-family: dunkin;
            font-size: 17px;
            color: #000;
            float:right;
        }
        .total
        {
            font-family: dunkin;
            font-size: 16px;
            text-transform:uppercase;
            float:left;
        }
        .no-variant
        {
          color:red;  
        }
        .right
        {
            text-align:right;
        }
        i.plus,i.subtr
        {
           color:#80868F;
           padding-left:12px;
           padding-right:12px;
           vertical-align:middle;
        }
        #list_heading
        {
            margin-bottom:0 !important;
        }
        #orders.list-orders .active_orders 
        {
            padding:30px 50px !important;
        }
        #orders.list-orders .fav_orders 
        {
            padding:10px 50px !important;
            border-bottom:2px solid #F4F4F4;;
        }
        #orders.list-orders .fav_orders:last-child
        {
            border-bottom:none;
        }
        .material-icons
        {
            vertical-align:middle;
        }
        
        .btn-add
        {
            position:absolute;
            top:-30px;
            left:85%;
            width:45px !important;
            height:45px  !important;
            font-size:0 !important;
            line-height:40px !important;
            
        }
        .add-item
        {
            margin-top:-20px;
            font-family:dunkin;
        }
        .btn-add i
        {
            font-size:28px !important;
            line-height:48px !important;
        }
        .pink-clr
        {
            background-color:#EA4397 !important;
        }
        .large_icon
        {
            font-size:35px !important;
        }
        
        .orange-clr
        {
            background:#FF671F;
        }
        .orange-font
        {
            color:#FF671F;
        }
        .datepicker-date-display,.timepicker-digital-display{
          background-color: #FF671F !important;
        }
        .timepicker-close {
            color: #FF671F !important;
        }
        .datepicker-day.picker__day--today { color: #FF671F !important; }
        .datepicker-day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected { background-color: #FF671F !important;}
        .datepicker-close { color: #FF671F !important;}
        .datepickertoday { color: #FF671F !important;}
        .timepicker-tick:hover { background: #FF671F !important; }
        .timepicker-canvas line { stroke: #FF671F !important; }
        .timepicker-canvas-bearing { fill: #FF671F !important; }
        .timepicker-canvas-bg { fill: #FF671F !important; }
        .pickup-btn,#pickup_time
        {
            font-size:15px;
            font-family:dunkin;
            width:80% !important;
            margin:0;
            text-align:center;
            margin-top:30px;
            height:60px;
            margin-left:10%;
            margin-right:10%;
        }
        .pickup-btn .material-icons,#pickup_time .material-icons
        {
            color:#fff;
        }
        .btns
        {
            margin-top:42px;
        }
        form>.input-field>label
        {
            font-family:dunkin;
            color: rgba(37, 32, 29, 0.5);
        }
        form i.material-icons
        {
            color: rgba(37, 32, 29, 0.5);
        }
        .collapsible
        {
            margin:0  !important;
        }
        button.take_survey
        {
            background: #EA4397;
            border-radius: 27px;
            width:210px;
            height:47px;
            border:none;
            font-family: dunkin;
            font-size:18px !important;
            color: #fff;
            margin-left: 250px;
            margin-top: -100px;
        }
        span.send_rating
        {
             margin-right:50px; 
        }
        button.swal2-confirm.swal2-styled
        {
            font-family: dunkin;
            font-size:18px !important;
            color:#fff;
            background: #EC4E98;
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 27px;
            border:none;
            word-spacing:3px;
            width:auto;
            padding:0 20px;
            height:47px;
            border-radius:25px;
        }
        button.orange-clr
        {
            font-family:dunkin !important;
            height:60px;
            font-size:22px;
        }
        .fav-item-no
        {
            font-family: dunkin;
            font-size:20px;
            padding-left:15px;
        }
        .place-order
        {
            font-family:dunkin;
            font-weight:900;
            color: #313131;
            font-size:25px !important;
            padding:10px 150px;
            text-align:center;
        }
        
        .pick_up_loc
        {
            color: #313131;
            padding:10px 150px;
            text-align:center;
            font-size:20px !important;
            
        }
        h1.pick_up_loc
        {
            font-family:dunkin;
            
        }
        .map_image
        {
            max-width: 100%;
            max-height:110%;
        }
        .get-directions
        {
            color:#EA4397;
            font-family:dunkin;
            font-size:20px !important;
            margin:0;
            text-align:left;
        }
        h1.pick_up_loc
        {
            font-family:dunkin;
            padding:0 0 0 10px!important;
            text-align:left;
            margin:20px 0 10px 0;
            font-size:25px !important;
            
        }
        p.pick_up_loc
        {
            color: #ABABAB;
            font-size:20px;
            padding:0 0 0 10px;
            margin:0;
            text-align:left;
            font-family:dunkin;
        }
        .ordr
        {
            font-family: dunkin;
            font-weight:900;
            color: #313131;
            font-size: 26px !important;
            padding: 10px 150px;
            text-align: center;
        }
        .tm
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: bold;
            font-size: 19px;
            color: #ABABAB;
        }
        p.tm
        {
            font-size:16px;
        }
        .tn
        {
            font-family: dunkin;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            color: #FF671F;
            
        }
        .favourite-btn
        {
            background: #EC4E98;
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 27px;
            color:#fff;
            font-family:dunkin;
            width:229px;
            height:41px;
            border:none;
            padding:0;
            margin-bottom:10px;
            font-size:16px;
        }
       
       .reciepts
        {
            background: #FFFFFF;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
            margin-left:60px !important;
            margin-right:60px !important;
            padding:25px;
        }
        .row.reciepts.last
        {
            padding-bottom:0 !important;
            
        }
         .col:first-child
        {
            padding-bottom:30px;
        }
        .reciept
        {
            background: #FFFFFF;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 0px;
            margin-left:60px !important;
            margin-right:60px !important;
            padding:15px 111px;
        }
        .fav-orders .reciept:first-child
        {
            box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.12);
            margin-bottom:0px !important;
            border-top-left-radius:15px;
            border-top-right-radius:15px;
            border-bottom:none;
            padding:50px 0 15px;
        }
        .fav-orders a.tablinks
        {
            width:33.33% !important;
        }
        
        .offset-l7.right
        {
            margin-top:20px;
        }
        .cart-btn
        {
            padding:20px;
            font-family:dunkin;
            margin:0;
            margin-left:50px;
            width:85% !important;
            margin-top:30px;
        }
        .fav
        {
            border-bottom:1px solid #F4F4F4 !important;
            padding:10px 150px;
        }
        .item-name
        {
            font-family: dunkin;
            color:#FF671F;
            font-size:21px;
            padding-left:15px;
        }
        .fav-orders .flavor
        {
            margin-left:15px !important;
            margin-top:15px;
        }
        .fav-orders p
        {
            margin:0 ;
            font-family:dunkin;
        }
        .img-circle
        {
            border-radius: 100%;
        }
        .about_us
        {
            padding:50px 0 15px 0 !important;
        }
        .about_us h2:not(.about)
        {
            padding-bottom:10px !important;
            word-spacing:17px;
            letter-spacing:3px;
            font-size:50px !important;
        }
        .partner-logo
        {
            width:93px;
            height:92px;
            border-radius:12px;
        }
        .map_img
        {
            width:210px;
            height:auto;
        }
       
        #orders.edit_branch_address .input-field>label,#orders.edit_branch_address .input-field>input
        {
            font-family: dunkin !important;
            font-size: 16px !important;
            color:#FE6E0D;
            left:0;
        }
        #orders.edit_branch_address .input-field>input
        {
            font-size: 19px !important;
            color: rgba(37, 32, 29, 0.5);
        }
         #orders.edit_branch_address input.validate.valid{
            border-bottom: 1px solid #9e9e9e !important;
           box-shadow: 0 1px 0 0 #9e9e9e;
        }
        #orders.edit_branch_address
        {
            padding:60px 150px;
        }
        #orders.edit_branch_address input.select-dropdown {
            font-family:dunkin;
            font-size:19px;
            color:rgba(37, 32, 29, 0.5);
            top:0;
        }
        .select_row .input-field
        {
            margin-top:0 !important;
        }
        .edit_address
        {
            width:100% !important;
            margin-top:25px;
            margin-bottom:120px;
        }
         .swal2-popup
        {
            height:330px;
            border-radius:25px !important;
        }
        .swal2-close
        {
            border:2px solid #fff !important;
            border-radius:50px !important;
            color:#5A352C !important;
            top:-15px !important;
            right:-15px !important;
            font-weight:900;
            background:#fff !important;
            font-size:54px !important;
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
        }
        #date_time
        {
            width:370px;
            font-size:28px ;
            margin-top:0;
            margin-bottom:30px;
        }
        #chose_date,#chose_time,#save_fav
        {
            width:93%;
            border-bottom: 1px solid #CCCCCC !important;
            border:1px solid #CCCCCC;
            height:54px;
            border-radius:4px;
            font-size:25px;
            font-weight:bold;
            
            padding:10px;
            background:#fff;
            z-index:-1;
            display:inline;
            margin-bottom:43px;
            
            
        }
        #pickup_time
        {
            margin-right:2.5%;
            margin-left:2.5%;
        }
        #pickup_location
        {
           margin-right:2.5%;
           margin-left:0%;
           float:right;
           
           
        }
          #lbl_date, #lbl_fav
        {
            color: #CCCCCC;
            font-family:dunkin !important;
            padding:5px 35px 0px 17px;
            top:186px;
            left:90px;
            position:absolute;
            font-size:18px;
            letter-spacing:1px;
            z-index:1;
            background:#fff;
            opacity:1;
        }
        #lbl_fav
        {
            top:126px;
            left:125px;
        }
        #lbl_time
        {
            color: #CCCCCC;
            font-family:dunkin !important;
            padding:5px 35px 5px 17px;
            bottom:240px;
            left:90px;
            position:absolute;
            font-size:18px;
            letter-spacing:1px;
            z-index:1;
            background:#fff;
            opacity:1;
        }
        .swal-height {
          height: 580px;
        }

        .swal2-title
        { 
          color: #FF671F !important;  
          font-family:dunkin;
          font-size:33px !important;
        }
        .swal2-popup img.star
        {
            margin-right:15px;
            margin-top:20px;
            width:50px;
            height:50px;
        }
         h2#active_order
        {
            font-size:47px !important;
            word-spacing:15px;
            
        }
        .order-status,.order-time,.order-no
        {
            padding-left:20px;
            
        }
        .trans-rejected
        {
            font-family: Dunkin;
            font-size: 21px;
            text-align: center;
            color: #5A352C;
            word-spacing:10px;
            margin-left:0 !important;
            margin-right:0 !important;

        }
        .margin-bottom
        {
            margin-bottom:50px !important;
        }
         .transfer_p
        {
            font-family: dunkin;
            color:#fff;
            font-size:16px;
            width:220px;
            height:40px;
            word-spacing:10px;
            background: #EC4E98 !important;
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 27px;
            border:none;
           
        }
        .transfer_p:focus
        {
            background:red;
        }
        .check_avail
        {
            font-family: dunkin;
            color:#fff;
            font-size:29px;
        }
        .progress .indeterminate {
            background-color: #EA4397 !important;
         }
        .progress
        {
            background:#fff !important;
            width:100% !important;
            height:10px !important;
            border-radius: 17px !important;
        }
        input[type=text]#save_fav
        {
            font-family:dunkin !important;
            color:#000;
            font-size:20px;
            padding-left:22px;
        }
        .recent_articles .meal
        {
            text-align:left;
            font-size:17px;
            margin:0;
        }
        #orders.list-orders.recent_articles .fav_orders
        {
            padding:17px 90px !important;
            border-bottom:2px solid #F4F4F4;
        }
        #orders.list-orders.recent_articles .fav_orders:last-child
        {
            border-bottom:none;
            padding-bottom:20px;
        }
        #orders.list-orders.recent_articles .list-img
        {
            width:70px !important;
        }
        .recent_articles .meal
        {
            font-size:17px;
            margin-left:20px !important;
        }
        .notify_time
        {
            font-family: dunkin;
            font-weight: bold;
            font-size: 12px;
            color: #80868F;
            margin:0;
        }
        .card-type
        {
            margin-left:10px;
            margin-right:10px;
        }
        #orders.recent_orders .order-no
        {
            padding-left:0;
        }
        .product-img
        {
            height:150px !important;
        }
        #large
        {
            margin-top:17px;
        }
        #no-milk,#low-fat,#full-fat
        {
            background:#fff;
        }
        #no-milk:active,#low-fat:active,#full-fat:active
        {
            background:#f0f0f0;
        }
         #no-milk.active,#low-fat.active,#full-fat.active
         {
             background:#f0f0f0;
         }
        .milk
        {
            background:#fff;
        }
        .milk.active
        {
            background:#F4F4F4;
        }
        .last_row
        {
            border-bottom:0 !important;
        }
        .row.active_orders.address_row#last_row
        {
            border-bottom:0 !important;
        }
        .swal2-styled.swal2-confirm
        {
            background-color:#EC4E98 !important;
        }
        .swal2-icon.swal2-error
        {
            border-color:red !important;
        }
        .swal2-x-mark
        {
            color:red !important;
        }
        .swal2-actions
        {
            margin-top:0;
        }
        .swal2-container
        {
            z-index:9999 !important;
        }
        .swal2-icon.swal2-error [class^=swal2-x-mark-line]
        {
             background-color:red !important;
        }
        .error-msg .swal2-icon.swal2-error
        {
            display:block !important;
        }
        .error-msg .swal2-title
        {
            color:red !important;
            text-transform:Capitalize;
        }
        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]
        {
            right:-4rem !important;
        }
        .order-time i.large
        {
            vertical-align:sub;
        }
        .sugar .flavor
        {
            float:left;
        }
        .cart
        {
            position: relative;
            left: auto;
            margin-top: 8px;
            right: 0px;
        }
        #login-label
        {
            margin-left:40px;
            font-size:17px !important;
        }
        .login_static_code
        {
            margin-right: 35%;
        }
        #orders.fav-orders.fav_details
        {
            padding:20px !important;
        }
        .tabs .tab
        {
            padding-bottom:0px !important;
        }
        .tabs .tab a
        {
            font-family:dunkin;
            color:#EA4397 !important;
        }
        .cart
        {
            position: relative;
            left: auto;
            margin-top: 0.1%;
            right: 0px;
        }
        .active-map
            {
                height: 300px;
                width: auto;
                float: right;
                border-bottom-right-radius: 15px;
                border-top-right-radius: 15px;
            }
        .input-field>label
        {
           font-size:16px !important; 
        }
        .reorder-text
        {
            font-family: 'dunkin';
            color: #80868F;
            font-size: 11px;
            text-align: center;
            margin-left: 2px;
            margin-top: -20px;
            z-index: 9999;
            line-height: 0;
            vertical-align: top;
        
        }
        .reorder 
        {
           display:block; 
        }
        .fav-reorder
        {
            margin-left:32px;
        }
        .center-align
        {
            text-align:center !important;
        }
        .fa-star-o:before
        {
            font-size:40px;
        }
        @media only screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)
        {
            button.take_survey {
                width: 90px;
                height: 20px;
                font-family: dunkin;
                font-size: 8px !important;
                margin-left: 140px;
                position: absolute;
                top: auto;
                bottom: 20px;
                right: 20px;
            }
            .order_rating_btn{
                background: #EA4397;
                position: absolute;
                left: -60px;
                top: auto;
                bottom: 20px;
                border-radius: 27px;
                width: 100px;
                height: 20px;
                border: none;
                font-family: dunkin;
                font-size: 11px !important;
                color: #fff;
                word-spacing: 3px;
                margin-left: 90px;
            }
            #card-label
            {
                font-size:8px !important;
            }
            #products_menu
            {
                margin:0px;
            }
        
            
            
        }
        /* Surface DUO */
        @media only screen and (min-width: 450px) and (max-width: 600px) and (-webkit-device-pixel-ratio: 2.5){
            .card_balance
            {
                margin-top:0;
                padding-top:90px;
                border-radius:0;
            }
            
            .notes
            {
                margin-left:50px !important;
            }
            
            #products_menu
            {
                margin:0px;
            }
            .item-price
            {
                margin:0;
            }
            .survey .submit_que
            {
                width:70% !important;
            }
            #active-order {
                right:120px;
            }
            #file-path-wrapper {
                position:absolute;
                left:30px;
                margin-right:50px;
                top:30px;
                width:84% !important;
                
            }
               .notes_survey
               {
                   left:30px;
               }
            
        
        .fa-star:before
        {
            font-size:20px;
        }
        .fa-star-o:before
        {
            font-size:20px;
        }
        
            
        }
        
        @media only screen and (max-width: 600px) {
            .event_img img
        {
            width:100%;
            height:250px;
            object-fit:cover
        }
            .sm-third-btn {
                width: 35px;
                height: 35px;
            }
            .animated-icon3.open span:nth-child(3) {
                top: 15px !important;
                left: 2px;
            }
            .animated-icon3.open span:nth-child(1) {
                -webkit-transform: rotate(45deg);
                -moz-transform: rotate(45deg);
                -o-transform: rotate(45deg);
                transform: rotate(45deg);
                top: -4px;
                left: 2px;
            }
           .nb-inner-title {
                
                font-size: 15px;
                padding-bottom: 10px;
                text-align: left;
            }
            .news-box-inner .navbar-toggler {
                left: initial;
                right: -30px;
            }
            .newsBox.active {
                width:100%;
                top:101%;
            }
            .news-box-inner {
                padding: 20px;
            }
            .event_title
            {
                margin: 10px 0 0 0 !important;
            }
            .hpts_e_btn {
                font-size: 14px;
                padding: 5px 20px;
                width: 100px;
                height: 30px;
            }
            .remove-text
            {
                font-size:11px;
                margin-top:20px;
                margin-left:2px;
            }
            .wf-text-1 {
                font-size: 15px;
                margin-top: 0px;
            }
            .fav-re
        {
            margin-left:0 !important;
        }
        .logo-img
        {
            width:47%;
        }
        .active-icon
        {
            font-size: 25px;
            float: right;
            color: #FF671F;
            margin-right: 100px;
        }
        
        .btn-add
        {
            width:30px !important;
            height:30px !important;
            line-height:32px !important;
            
        }
        .btn-add i
        {
            line-height:0 !important;
            font-size:20px !important;
        }
        .large_icon
        {
            font-size:25px !important;
        }
            #verify_c
            {
                margin:0;
                padding:40px;
            }
            .verify,.re-send
            {
                width:90%;
                
            }
        .material-icons.prefix.phone_icon
        {
            margin-left:-165px !important;
        }
        .contact#phone-label {
            margin-left: 42px !important;
        }
        .static-code.contact
        {
            margin-left:-85px ;
        }
        .slider .indicators .indicator-item
        {
            margin:0 3px !important;
            width:6px !important;
            height:6px !important;
        }
        .success-msg.swal2-popup
        {
            height:180px;
            width:80%;
            margin-left:20%;
            margin-right:20%;
        }
        .preloader {
            background-size:100px 100px;
        }
        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]
        {
            right:-2.3rem !important;
        }
        .error-msg
        {
            padding-top:0 !important;
            height:200px !important;
        }
        .swal2-icon.swal2-error .swal2-x-mark
        {
            width:25px;
            height:25px;
            margin-bottom:50px;
        }
        .swal2-icon.swal2-error
        {
            width:40px;
            height:40px;
            margin-top:20px;
            
        }
        .error-msg .trans-rejected
        {
            font-size:12px;
        }
        .swal2-icon.swal2-error
        {
            font-size:8px;
        }
        .swal2-x-mark
        {
            color:red !important;
        }
        .swal2-actions
        {
            margin-top:0 !important;
        }
        .swal2-styled.swal2-confirm
        {
            padding:5px 10px;
        }
        
        .reg-btn {
            margin-top: 0;
        }
        #discount
        {
            left:10px !important;
            width:170px !important;
        }
        .card-type
        {
            width:70px;
        }
        
       
        #calander
        {
            left:290px !important;
            top:395px !important;
            width:40px;
            height:40px;
            line-height:0 !important;
            font-size:0 !important;
            
        }
        #calander i.material-icons
        {
            font-size:22px !important;
            width:22px;
            height:32px;
            vertical-align:middle;
            line-height:45px !important;
        }
        
        
        input[type=text]#save_fav
        {
            font-size:10px;
            padding-right:5px;
        }
        i.plus, i.subtr {
            font-size: 16px;
        }
        .swal-height2
        {
            padding:0px !important;
            height:365px !important;
        }
        .save-fav
        {
            padding:40px 20px 50px !important;
            height:190px !important;
        }
        .save-padding
        {
            padding-left:50px;
            padding-right:50px;
        }
        .msg-padding
        {
           padding:0 20px 0 20px; 
        }
        .item-qua
        {
            font-size:12px;
        }
        .item-price
        {
            font-size:12px;
            margin:0;
        }
        .menu_again
        {
            padding:12px 20px 12px 20px;
            padding-bottom:9px !important;
            
        }
        .menu_again:last-child
        {
            padding-bottom:12px !important;
        }
        .item-size {
            font-size:12px;
            padding:1px 3.5px;
        }
        .order-img
        {
            width:40px;
            height:40px;
        }
        .sugar
        {
            margin:0 0 0 5px;
            font-size:5px;
            padding:5px 8px;
        }
        .menu_again .item-no
        {
            margin:0 0 3px 5px !important;
            font-size:12px;
            margin:0;
        }
        /*#cell-phone
        {
            width:70% !important;
        }*/
        p.login
        {
            font-size:14px;
            text-align:center;
            margin:0;
        }
        .login_p
        {
            font-family: dunkin;
            font-size: 14.5px;
            text-align: center;
            color: #5A352C;
            text-align:center;
            padding:0 55px;

        }
        .contact_p
        {
            font-family: dunkin;
            font-size: 12.5px;
            text-align: center;
            color: #5A352C;
            margin:0;
        }
        .card_balance
            {
                padding-top:17px;
            }
        .order-time i.large {
            vertical-align: top;
        }
        .fav-orders .reciept:first-child .ordr
        {
            padding:0;
            font-size:19px !important;
        }
        .favourite-btn
        {
            background: #EC4E98;
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            border-radius: 27px;
            color:#fff;
            font-family:dunkin;
            width:132px;
            height:25px;
            border:none;
            padding:0;
            margin-bottom:10px;
            font-size:11px;
        }
        #orders.reciept_page h2
        {
            padding-top:32px;
            margin-bottom:30px;
        }
        #partners
            {
                padding:15px 41px 10px;
            }
        #partners:first-child
        {
            
            padding-top:68px;
            padding-bottom:10px;
        }
        .p_name
        {
            margin-left:20px !important;
        }
        .btn.attachment_btn 
        {
            width:48px;
            height:25px !important;
            border-radius:4px !important;
            margin-top:0px !important;
            font-size:0;
        }
        .btn.attachment_btn img
        {
            width:20px !important;
            height:20px !important;
            margin-top:0;
        }
         .file-field input.file-path
            {
                 height:30px !important;
                 margin-right:0px;
                 margin-top:12px;
                 text-align:left;
            }
         .file-field .file-path-wrapper
            {
                width:100% !important;
            }
        .survey .submit_que
        {
            width:87% !important;
            margin-bottom:100px;
        }
        .check_avail
        {
            font-size:14px;
            margin:0;
            text-align:left;
        }
        .progress
        {
            height:5px !important;
        }
        
        .location_img
        {
            width:27px;
            height:36px !important;
        }
        .p_logo
        {
            margin:0 !important;
        }
        .partner_name
        {
            font-size:22px !important;
            margin-left:0px;
        }
        .about_us .row
        {
            padding:16px 33px;
        }
        .about_us h2:not(.about)
        {
            padding-bottom:10px !important;
            word-spacing:7px;
            letter-spacing:3px;
            font-size:26px !important;
        }
        p.about
        {
            font-size:16px;
        }
        h5.about
        {
            font-size:22px;
            margin-bottom:16px;
        }
        h5.about_eng
        {
            font-size:20px;
            font-weight:800;
        }
        p.about_eng
        {
            font-size:16px;
            text-align:justify;
        }
        
        .s12
        {
           width:100% !important; 
        }
        .pick_up_loc,.get_directions
        {
            text-align:center;
            font-size:15px !important;
        }
        h1.pick_up_loc
        {
            font-size:18px !important;
        }
        .place-order
        {
            padding:0px 50px;
            font-size:17px !important;
            margin-top:10px;
        }
        .reciepts ,.reciept
        {
            padding:20px;
            margin:0 23px !important;
            padding-bottom:20px !important;
        }
        .reciept_page .space-20
        {
          padding-top:25px;  
        }
        .cart-btn
        {
            padding:10px;
            margin-left:35px;
            width:80% !important;
        }
        .fav
        {
            padding:15px 0;
            padding-bottom:15px !important;
        }
        .fav-orders .total,.fav-orders .total-price
        {
            font-size:15px;
        }
        .fav-orders .item-name,.fav-orders .item-no
            {
                font-size:15px !important;
            }
        .fav-orders .flavor,.fav-orders .sugar
        {
            font-size:9px !important;
        }
        i.plus, i.subtr 
        {
            padding:0;
        }
        .list-orders .sugar,.list-orders .flavor
        {
            font-size:12px;
            text-align:center;
        }
        .list-orders .item-no
        {
            font-size:14px !important;
        }
        .pickup-btn, #pickup_time
        {
            font-size:11px;
            height:60px;
            
            
            border-radius:10px;
            width:95% !important;
            margin-top:30px;
            margin-left:0%;
            margin-right:0%;
            
        }
        #pickup_location
        {
            width:100%;
        }
        .pickup-btn .material-icons, #pickup_time .material-icons {
            font-size:15px;
        }
        button.orange-clr
        {
            font-family:dunkin !important;
            padding:20px !important;
            font-size:18px;
        }
        #orders.list-orders .active_orders {
            padding: 10px 20px !important;
        }
        #orders.list-orders .fav_orders,#orders.list-orders.recent_articles .fav_orders {
            padding: 8px 10px !important;
            border-bottom:2px solid #F4F4F4;
        }
        #orders.list-orders.recent_articles .fav_orders
        {
            padding: 14px 10px !important;
        }
        #orders.list-orders .fav_orders:first-child{
            padding-top:42px !important;
        }
        #orders.list-orders.recent_articles .fav_orders:first-child 
        {
            padding-top:10px !important;
        }
        #orders.list-orders .fav_orders:last-child {
            padding-bottom:30px !important;
        }
        #orders.list-orders.recent_articles .fav_orders:last-child
        {
            padding-bottom:25px !important;
        }
        .notification_details p
        {
            padding-bottom:15px;
        }
        .notify_det_img
        {
            width:300px;
            height:auto;
        }
        .notification_details
        {
            margin:0;
            padding-bottom:45px;
        }
        
        .details
        {
            padding:0 25px;
        }
        .order-msg
        {
            font-size:15px;
        }
        
        .order-status,.order-time,.order-no
        {
            padding-left:5px;
        }
        .order-no
        {
            font-size:14px;
        }
        .order-status
        {
             font-size:14px;
        }
        .order-time
        {
            font-size:12px;
            padding-left:5px !important;
            line-height:7px;
            vertical-align:middle !important;
            
        }
        .arow
        {
            vertical-align: -webkit-baseline-middle;
        }
        
        .order-active
        {
            width:42px !important;
            height:15px;
            font-size:7px !important;
            background:#FF671F;
            margin-bottom:0;
        }
        .active_orders {
            padding:20px !important;
        }
        i.large
        {
            width:20px !important;
            height:20px !important;
        }
        #login_form,#registration_form,#contact-form,#orders,#card_payment
        {
            margin:0;
        }
        #login_form,#card_payment
        {
            padding:50px !important;
        }
        #contact-form
        {
            padding:50px 20px 50px !important;
        }
        #orders.favourite_orders
        {
            padding:0 !important;
        }
        #orders.fav-orders
        {
            padding-top:0 ;
        }
         #notes_survey
            {
                width:100% !important;
                height:85px;
                max-height:85px;
                padding:0;
                
            }
        #products_menu.survey label.notes_survey
            {
                font-family:dunkin;
                font-size:11px !important;
                padding-left:5px;
                position:absolute;
                top:-10px;
                
            }
        .survey_name
        {
            padding-left:8px !important;
            font-size:13.5px !important;
        }
        .survey_row
        {
           padding:10px 33px 7px !important;
        }
        .survey_row p
        {
            font-size:12.5px;
            margin:0 0 7px 0;
        }
        #products_menu.survey
        {
            padding-top:33px !important;
        }
            .faq h2
            {
                display:block !important;
                font-size:32px !important;
                word-spacing:15px;
                padding:80px 40px 40px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:15px !important;
                margin-left:40px;
                margin-right:40px;
                text-transform: capitalize;
            }
            
            .collapsible-body
            {
                font-size:12px;
            }
            .submit_que
            {
                font-size:22px !important;
                padding:13px 54px !important;
                width:300px;
                margin-bottom:60px;
            }
        #notes
        {
            width:85%px !important;
        }
         [type="checkbox"].filled-in:checked+span::before
        
        {
           width:8px !important;
           height:13px !important;
        }
        
        .edit
        {
            font-size: 14px !important;
        }
        textarea.materialize-textarea:focus
        {
            border-bottom:0 !important;
            box-shadow:none !important;
        }
        .calories
        {
            
            margin-left:25px;
        }
        .overview
        {
            padding:0 25px;
            text-align:center;
            
            font-size:13px;
        }
        
        .product_details
        {
          margin:0;  
        }
        .order_price,.go_to_cart,.submit_que
        {
            background: -webkit-linear-gradient(bottom, #EC4E98, #EC4E98);
            background: linear-gradient(0deg, #EC4E98, #EC4E98);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            font-family: dunkin;
            border-radius: 50px;
            color:#fff;
            font-family: dunkin;
            font-style: normal;
            font-weight: 800;
            font-size: 14px;
            border:none;
            padding:15px;
            width:80%;
        }
        .submit_que
        {
             font-family: dunkin;
             font-size:20px !important;
        }
        .go_to_cart
        {
            background: -webkit-linear-gradient(bottom, #FF671F, #FF671F);
            background: linear-gradient(0deg, #FF671F, #FF671F);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.16);
            padding:16px;
            margin-top:30px;
            margin-bottom:50px;
            
        }
       
        #notes
        {
            width:85%;
            height:100px;
        }
        label.notes
        {
            font-size: 12px !important;
            margin-left:40px !important;
        }
        .product_name
        {
            padding-left:25px;
        }
        
        .product_details label
        {
            margin-left:80px;
        }
        row.product-size
            {
                padding-left:100px !important;
                padding-right:100px !important;
                margin-left:60px;
                margin-right:60px;
            }
        
         .product .col
         {
             padding-top:20px !important;
         }
        .banner span p
            {
                font-size:12px;
            }
            .p-color
            {
                font-size:16px !important;
                text-align:left;
                
            }
        .p-color,.center-align
        {
            padding-left:0px !important;
            padding-right:0px !important;
        }
        
        #card-label
        {
            font-size:14px !important;
        }
        
        #overlays {
            top: 640px;
            left: 15px;
            background:white;
            width:90%;
        }
        .map_info
        {
            margin-left:20px !important;
            margin-right:20px !important;
        }
        .order_col
        {
            padding-top:12% !important;
        }
        .heading
        {
            font-size:30px;
            padding:0;
        }
        #branches-list
        {
            margin:0;
            box-shadow: none;
            border-radius: 0;
            padding:20px 0 0 0;
            text-align:center;
        }
        .branch_menu i
        {
            padding-top:5px;
            font-size:22px;
        }
        .branch_menu h5
        {
            margin:0px;
            padding-bottom:5px;
            line-height:0px;
            font-weight:bold;
            font-family: dunkin;
            padding:2px;
            font-size:22px;
        }
        .branch_menu i,h5
        {
            display:inline;
            
        }
        .branch
        {
            padding:20px !important;
            margin:0px !important;
        }
        .branch_menu a
        {
           float: left;
            padding: 40px 0;
            color: #000;
            text-decoration: none;
            font-family: Dunkin;
            font-size: 20px;
            width: 50%; /* Four links of equal widths */
            text-align: center;
        }    
          .card_r
       {
           margin-bottom:0 !important;
           padding-right:50px;
           padding-left:50px;
           padding-bottom:50px;
       }
       .map_mode
       {
           color:#EA4397 !important;
           font-family:Dunkin;
       }
       .distance
       {
           border-radius:25px;
           background:#EA4397;
           display:inline;
           color:#fff;
           font-size:12px;
           padding:2px 6px;
       }
       .search_icon
       {
           text-align:left !important;
           padding-left:16px !important;
       }
       .branch_details
       {
           margin:0px !important;
           
       }
       .branch h5
       {
           display:inline;
           margin:0;
           float:left;
           font-weight:bold;
           color:#000;
           font-size:15px;
       }
       .facilities
       {
           float:left;
       }
       .facility img
       {
           width:30px;
           padding-right:5px;
       }
       .order
       {
          background:#EA4397;
          color:#fff;
          border-radius:25px;
          border:none;
          font-family:dunkin;
          width:70px;
          height:30px;
          font-size:15px;
          text-transform:uppercase;
       }
       .map-dir
       {
           margin-left:0px !important;
       }
       .overlays .facility
       {
           padding-bottom:0px !important;
       }
       .facility
       {
          text-align:left; 
          padding-top:10px!important;
          margin:0;
       }
       .address
       {
           color: #928F8D;
           font-size:14px;
           margin:0;
           display:block;
           text-align:left;
       }
       #hours
       {
           color: #928F8D;
           font-size:14px;
           margin:0;
           display:block;
           text-align:left;
           
       }
        .card_row
            {
                padding-bottom:20px !important;
            }
        .card_btn
       {
           background:#fff;
           color:#EA4397;
           font-weight:bold;
           border:none;
           border-radius:50px;
           padding:5px 18px;
       }
        .containers h3
       {
           font-family:Dunkin;
           color: #fff;
           font-size:30px;
           margin:0px !important;
       }
       .containers h5
       {
           font-weight:bold;
           color: #fff;
           margin:8px;
           font-size:15px;
           margin:0;
       }
            .containers img
            {
                width:300px;
                border-radius:15px;
            }
            .sidebar-form
            {
                margin-bottom:0px;
                padding-bottom:0px;
                display:block;
            }
            .card_balance
            {
                margin-top:0px;
                margin-bottom:0px;
                border-radius:0px;
                padding-top:0;
            }
            .balance h3
            {
                color: #FF671F;
                font-size:24px;
                margin-bottom:0px;
                margin-top:0px;
                font-weight:600;
                
            }
            .bottom-text
            {
                padding:0 40px;
            }
            .space-70
            {
                padding-top:35px;
            }
            .space-40
            {
                padding-top:40px;
            }
            .product-img
            {
                height:150px !important;
                width:auto;
            }
            .third-menu
            {
                display:block !important;
            }
            .third-menu a {
                font-size:13px;
                padding:20px 10px;
            }
            .slider h3 {
                font-size:32px;
                margin-top:4px;
            }
            .slider h5 {
                font-size:16px;
                margin:0;
                line-height:0px;
                
            }
            .indicators
            {
                top:500px;
            }
            .slider img {
                border-radius: 8px !important;
                height:177px  !important;
            }
            .card_btn
            {
                font-family:dunkin;
                font-size:9px;
                padding-left:20px;
                padding-right:20px;
            }
            .tablinks.active
            {
                border-bottom:3px solid #EA4397;
                height:100%;
            }
             .slider
               {
                   width:300px !important;
                   text-align:center !important;
                   margin: auto;
                   margin-top:40px;
               }
            .transfer_points
            {
                margin-top:0px;
            }
            .transfer
            {
                
                padding:10px 0 !important;
                width:250px !important;
                font-size:12px;
            
            }
            .img_mobie img
            {
               
                
            }
            .img_mobile
            {
                display:block;
                text-align:center;
            }
            .img_web
            {
                display:none;
            }
            .all-navs
        {
           padding-top:10px;
        }
         #registration_form h2,#products_menu h2,#login_form h2,#contact-form h2,#orders h2,#card_payment h2
        {
            font-family:Dunkin;
            text-align:center;
            color: #EA4397;
            font-size:28px;
            margin:0;
            margin-top:40px;
        }
        #choose_card h2
        {
            margin-top:0;
            padding-top:60px;
        }
        #contact-form h2,#orders h2
        {
            font-size:28px !important;
            margin-bottom:40px;
        }
         #login_form h2,#card_payment h2
         {
             margin-top:10px;
         }
        #contact-form h2
        {
            margin-top:10px;
        }
        h2#active_order
        {
            margin-bottom:17px;
            margin-top:30px;
            
        }
        #products_menu h2
        {
           
            display:none;
        }
        #registration_form,#products_menu,.product_details,#login_form,#contact-form,#orders,#card_payment,#choose_card,.card_balance
        {
            margin:0;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.12);
            border-radius: 0px;
            padding:25px;
           
        }
        #registration_form
        {
        	padding:0 13% !important;
        }
        #login_form,#contact-form
        {
             padding:13% !important;
        }
        #choose_card
        {
            padding:0;
            margin:0;
        }
        #orders
        {
            padding:20px 0;
        }
        .product_details
        {
            padding:0;
        }
            #sec-menu ul li a
        {
           padding:30px 0px;
           color:#EA4397;
           text-decoration:none;
           font-family:Dunkin;
           font-size:12px;
           
        }
        a.active
        {
            border-bottom:0px;
        }
        .cart
        {
            position: absolute;
            float: right;
            left: auto;
            margin-top: 8px;
            right: 0px;
            margin-right:3.5vw;
            
        }
        .cart img
        {
            width:24px;
            height:24px;
        }
        .circle {
            margin-left: 16px;
            margin-top: -57px;
            width: 22px;
            height: 22px;
            line-height: 18px;
            border-radius: 50%;
            border: 2px solid #fff;
            font-size: 11px;
            color: #fff;
            text-align: center;
            background: #FF671F;
        }
            #sec-menu
        {
            background: #FFEEDC;
            padding-left:80px;
            padding-top:34px;
            padding-bottom:34px;
            text-align:center;
        }
         #sec-menu ul 
         {
            text-align:center;
            margin-left:0px;
            margin-bottom:0px;
            padding-bottom:0px;
            line-height:3px;
             
         }
        #sec-menu ul li
        {
           display:block;
           padding-right:2px;
           width:40%;
           padding-bottom:30px;
          
        }
        #sec-menu
        {
            display:none;
        }
        .register
        
        {
            font-family:dunkin;
            padding:10px 30px;
            font-size:14px;
        }
        footer
        {
            padding-left:30px !important;
            padding-right:30px !important;
            padding-top:50px;
        }
        .mobile_row
        {
              padding-bottom:0px !important;
        }
        footer ul
        {
            padding-bottom:0px;
        }
        .banner {
            background: none;
            margin-top:0px;
            padding-top:0px;
            padding-left:5px;
            text-align:center;
        }
        .banner h1{
            font-family: Dunkin;
            text-align:center;
            font-weight:300 !important;
            padding-left:32px;
            font-size: 58px;
            letter-spacing:-2.5px;
            margin-top:0px;
        }
        .banner h2{
            font-size:30px;
            text-align:center;
            margin-top:0px;
        }
        .fills
        {
            top: 140px !important;
            left: 320px !important;
        }
        .banner span p
        {
            text-align:center;
            width: 20em;
            font-family:dunkin;
            margin:auto;
        }
        .banner p{
            font-size:18px;
            text-align:center;
            
        }
          .map{
              height:450px !important;
          }
          .loc
          {
               padding:7px;
               padding-left:7px;
               padding-right:7px;
               width:250px;
          }
          .visit
          {
              font-size:50px;
              padding-top:30px;
          }
          .pickup
          {
              margin-bottom:20px;
              padding-top:7px;
              padding-bottom:7px;
              
          }
          .location
          {
              padding-top:5px;
              padding-bottom:5px;
          }
          .row
          {
              margin-bottom:0px;
              padding-bottom:0px;
          }
          .mobile_banner{
             display:block;
             overflow:hidden;
             margin-right:0px;
        
          }
          
         .submit
         {
           width:40%;  
           padding:7px;
           padding-top:12px;
           padding-bottom:12px;
         }
         .fill
         {
             margin-left:170px;
             height:40px;
             width:20px;
         }
         
        .brand-logo
        {
            text-align:center;
            margin-left:-30px;
        }
          .brand-logo img
        {
         width:120px;
         height:50px;
        }
         .flex {
           display: -webkit-box;
           display: -ms-flexbox;
           display: flex;
           -ms-flex-wrap: wrap;
               flex-wrap: wrap;
        }
        #products_menu
        {
            padding:0 !important;
            margin:0;
        }
        #orders h2
         {
             word-spacing:10px;
         }
         .active_orders.order-stats
        {
            margin:0 30px !important;
            padding:10px !important;
        }
        .v_align::after{ 
            height:60px;
        }
        .track_order h2
        {
            font-size:16px !important;
            margin:0 !important;
        }
        .track_order h5
        {
            font-size:20px;
        }
        .order-time
        {
            text-align:left;
            padding:0;
        }
         .about_us h2
        {
            display:block !important;
            padding:60px 0 21px 0 !important;
            margin:0 !important;
            font-size:26px !important;
        }
        .about_us h2.about
        {
            padding:0 !important;
        }
        .address_row
        {
            padding:0 44px;
        }
        .edit_branch_address .map_img
        {
            padding-bottom:20px;
        }
        .addresses
        {
            font-size:12px !important;
            font-family:dunkin !important;
            padding-right:20px;
        }
        .address-heading
        {
            font-size:14px !important;
        }
        .partner-logo
        {
            width:60px;
            height:63px;
        }
       
        .add_address
        {
            font-size:14px !important;
            font-family:dunkin !important;
            padding:13px 0;
            width:70%;
        }
        .list-img
        {
            width:40px !important;
        }
       
        .remove
        {
            width:35px !important;
            margin-left:5px;
            margin-bottom:8px;
        }
        .meal
        {
            font-family:dunkin;
            color:#000;
            font-size:12px;
        }
        #orders.list-orders.branch_address
        {
            padding-bottom:70px !important;
            padding-top:55px !important;
    
        }
        #orders.list-orders.branch_address h2
        {
            margin:12px 0 0 0;
        }
        .location-img
        {
            vertical-align:top;
            margin-top:0;
            top:0;
        }
        .map_img
        {
            width:160px;
            height:160px;
        }
         #orders.edit_branch_address .input-field>input
        {
            font-size: 14px !important;
        }
        
        #orders.edit_branch_address input.select-dropdown {
          font-size: 14px !important;
        }
        .select_row .input-field
        {
            margin-top:0 !important;
        }
        .edit_address
        {
            width:75% !important;
            margin-top:10px;
            margin-bottom:0;
        }
        .btns
        {
            margin-top:22px;
        }
        button.take_survey
        {
            
            width: 35%;
            height: 12.5%;
            font-family: dunkin;
            font-size: 60% !important;
            margin-left: 0%;
            position: absolute;
            top: auto;
            bottom: 15%;
        }
        span.send_rating
        {
             margin-right:10px; 
             margin-bottom:50px !important;
        }
        .swal2-close
        {
            font-size:22px !important;
            top:-5px !important;;
            right:-5px !important;
        }
        .swal2-title
        {
           font-size:15px !important; 
           margin-top:0px !important;
        }
        .trans-rejected
        {
            font-size:14px;
            word-spacing:3px;
        }
         .transfer_p
        {
            font-family: dunkin;
            font-size:12px;
            width:169px;
            height:28px;
            word-spacing:2px;

        }
        .success-msg.swal2-popup .trans-rejected
        {
            font-size:14px;
        }
        img.star
        {
            width:20px !important;
            height:20px !important;
            margin-right:5px !important;
            margin-top:5px !important;
        }
        .swal2-confirm.swal2-styled
        {
            font-family: dunkin;
            font-size:8px !important;
            word-spacing:3px;
            width:100px;
            height:20px;
            margin-left:0;
            letter-spacing:1px;
        }
        .swal2-popup {
            width: 85% !important;
            height: 25%;
            padding: 35px 40px;
            border-radius: 25px !important;
            border-radius:15px !important;
        }
        .swal-height
        {
            height:250px;
        }
        #date_time
        {
            font-size:11px;
            margin-top:0;
            margin-bottom:20px;
        }
        #chose_date,#chose_time,#save_fav
        {
            width:93%;
            height:8px;
            font-size:12px;
            padding:10px;
            background:#fff;
            margin-bottom:25px;
            
            
        }
        #save_fav
        {
           margin-bottom:13px; 
        }
        #lbl_fav
        {
            position:absolute;
            font-family:dunkin;
            font-weight:bold;
            color:#CCCCCC;;
            padding:0 8px 0px 13px;
            top:38%;
            left:30px;
            font-size:14px;
            background:#fff;
        }
          #lbl_date
        {
            padding:0 8px 0px 13px;
            top:67px;
            left:50px;
            font-size:10px;
           
        }
        #lbl_time
        {
            padding:0 8px 0px 13px;
            bottom:113px;
            left:50px;
            font-size:10px;
        }
        .notes_survey,.notes_survey.input-field>label
            {
               left:20px !important;
                
            }
        .recent_articles .meal
            {
                font-size:13px;
                color: #5A352C;
            }
        .notify_time
            {
                font-size:12px;
            }
        .ordr_stat
        {
            width:auto;
            height:20px;
            padding:5px !important;
            font-size:12px !important;
            letter-spacing:0.5px;
            
        }
        .recent_orders .order-no
        {
            font-family:dunkin;
            font-size:12px;
            color:#000;
            padding-left:15px;
        }
        .recent_orders .reorder
        {
            margin-left:15px;
        }
        .recent_orders h2
        {
            display:none;
        }
        #orders.recent_orders,#orders.fav_orders
        {
            padding-top:0 !important;
        }
        #orders.list-orders.favourite_orders h2
        {
            display:none;
            padding-top:0 !important;
        }
        .pickup,.location
        {
            width: 150px;
            height:35px;
            display:block;
            padding:0;
            font-weight:bold;
            margin-left: auto;
            margin-right: auto;
        }
        .align-content
        {
            text-align:center;
            padding-left:0px !important;
            
        }
        .pickup
        {
           margin-bottom:20px; 
        }
        #orders .track_order h5
        {
            font-size:15px;
        }
        #orders .track_order h2
        {
            font-size:20px !important;
        }
        footer .email
        {
            width:70% !important;
            padding-left:10px !important;
        }
        footer .submit
        {
            width:24% !important;
        }
        
        
        .fills {
    
    font-size: 70px;
    top: 90px;
    left: 295px;
        }
        
            button.swal2-confirm.swal2-styled
            {
                font-size:12px !important;
                width: auto;
                height: 20px;
                padding: 0 20px;

            }
        /*    .banner h2,.banner h1,.banner span p,.pickup, .location
            {
                position: absolute;
               
                left: 50%;
                transform: translate(-50%, -50%);
            }
             .banner h1
            {
                top:15%;
            }
            .banner h2
            {
                top:20%;
            }
            .banner p
            {
                top:30%;
            }
            .pickup
            {
                top:35%;
                margin:0 !important;
            }
            .location
            {
                top:60%;
                 margin:0 !important;
            } */
            
        
        .order_rating_btn
        {
            background: #EA4397;
            position: absolute;
            left: -20%;
            top: auto;
            bottom: 15%;
            border-radius: 27px;
            width: 35%;
            height: 12.5%;
            border: none;
            font-family: dunkin;
            font-size: 65% !important;
            color: #fff;
            word-spacing: 3px;
            margin-left: 32%;
        }
        
        
        .cart
        {
            position: absolute;
            left: auto;
            margin-top: 8px;
            right: 35px;
        }
        
            .custom-padding.order_rating
            {
                height:35%;
            }
        
            .product_image
            {
                max-width: 100%;
                height: auto !important;
                width: 150px;
            }
        
            .active-map
            {
              width: 100%;
              height: auto;
              border-bottom-right-radius:15px;
              border-top-right-radius:15px;  
            }
            nav i, nav i.material-icons {
            font-size: 28px !important;
            height: 58px !important;
            line-height: 58px !important;
        }
        
            .nav-wrapper .brand-logo
            {
                margin-left:-30px;
            }
        
            #notifyCount
            {
                font-size:11px;
                top:20px;
            }
        
            
           #login-label
           {
            font-size:15px;
           }
        button.order
        {
            margin-top:0px;
        }
            #myInput {
                cursor: context-menu;
                margin-left: 0px;
                width: 110px;
                display: inline;
                font-size: 16px;
                height: 30px;
            }
            .reorder-text
            {
                margin-left:20px;
            }
            .fav-reorder
            {
              margin-left:5px;
            }
           .reorder-img
            {
               margin-left:auto !important;
               margin-right:auto !important;
            }
            .reorder-text.fav-reorder
            {
               text-align:center; 
               padding-left:20%;
            }
            .fa-star:before {
                font-size: 20px;
            }
            .fa-star-o:before
            {
                font-size: 20px;
            }
            
           
        
            .arabic-cart
            {
                left: 50px !important;
                margin-top: 8px;
                right: auto;
            }
        
            
            .arabic-logo
            {
                
                position:absolute;
                left: auto;
                right: 50px;
       
            }
            
            
        
        .headin1_arabic
        {
            font-size:40px ;
            margin-left:0;
            
        }
        
        .heading2_arabic
        {
            margin-left: 0 !important;
        }
        
            .full_width
            {
                width:95%;
                margin-left:2.5%;
                margin-right:2.5%;
            }
        }
        
        
        /* media quesry for IPAD pro */
        @media only screen 
              and (device-width: 1024px) 
              and (device-height: 1366px)  
              {
            #branches-list
            {
                padding-left:0;
                padding-right:0;
            }
            .map-dir
            {
               margin-left:0;
            }
            .branch
            {
                padding:30px 50px;
            }
            
                #choose_card
                {
                    padding-left:0;
                    padding-right:0;
                    margin-right:0;
                    margin-left:0;
                    
                }
                #choose_card .card_r,#choose_card .card_row
                {
                   padding:10px;
                }
                  #choose_card h2
                {
                    margin-top:0;
                    padding-top:60px;
                }
                #discount
                {
                    left:10px !important;
                    width:170px !important;
                }
                 #calander
                {
                    top:755px !important;
                    left:780px !important;
                }
                #calander i.material-icons
                {
                    font-size:26px !important;
                    line-height:20px !important;
                }
                .meal
                {
                    margin:0;
                }
                .reorder,.remove
                {
                    margin-left:0;
                }
                
                .menu_again {
                    padding: 20px 30px;
                }
                  .card_balance
                    {
                        margin-top:0;
                        padding-top:90px;
                        border-radius:0;
                    }
                 .order-time i.large {
                        vertical-align: top;
                    }
                .active_orders.order-stats
                    {
                        margin:0 100px !important;
                        padding:10px !important;
                    }
                 .active_orders 
                  {
                      padding:30px 50px;
                  }
                i.large
                {
                    width:30px !important;
                    height:30px !important;
                }
                
                  #login_form,#registration_form,#contact-form,#orders,#card_payment
                {
                    margin:0;
                }
                 .product_details
                 {
                     margin-top:80px !important;
                     margin-bottom:80px !important;
                 }
                .product-img
                {
                    height:130px !important;
                }  
                h3.active
                {
                    margin-left:0;
                }
                ul.side-nav
                {
                    margin-left:0;
                }
                #products_menu
                {
                    margin-top:70px !important;
                }
                     .faq h2
            {
                display:block !important;
                font-size:26px !important;
                word-spacing:15px;
                padding:80px 40px 40px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:15px !important;
                font-size:14px;
                margin-left:40px;
                margin-right:40px;
                text-transform: capitalize;
            }
            
            .collapsible-body
            {
                font-size:18px;
            }
            .submit_que
            {
                font-size:18px !important;
                padding:13px 5px !important;
                width:230px;
                margin-bottom:60px;
            }
            .survey .submit_que
            {
                margin-top:80px;
            }
            #notes_survey
            {
                width:100%;
            }
            .log_in
                {
                    width:100% !important;
                }
            #login_form,#contact-form,#orders,#card_payment
            {
                 margin-top:120px;
                 margin-bottom:120px;
                 margin-left:30px;
            }
            #orders div.row.active_orders
            {
                padding:36px !important;
            }
            #orders div.row.active_orders.order-stats
            {
                padding:0 !important;
            }
            .btn.attachment_btn
            {
                margin-bottom:0;
                margin-top:15px !important;
            }
            .file-field .file-path-wrapper
            {
                position: absolute;
                top: 40px;
                right:26px;
            }
            #orders.recent_orders .fav_orders
            {
                padding:30px 50px !important;
            }
            #orders.recent_orders .ordr_stat
            {
                width:auto;
                font-size:14px;
                margin-top:10px;
                margin-left:20px;
            }
            #orders.recent_orders .reorder
            {
                width:45px;
            }
             #orders.recent_orders .notify_time
            {
                font-size:18px;
            }
            
        }
        
        /* media query for Surface Duo */
        @media (min--moz-device-pixel-ratio: 1.5),
           (-webkit-min-device-pixel-ratio: 1.5),
           (min-device-pixel-ratio: 1.5),
           (min-resolution: 144dpi),
           (min-resolution: 1.5dppx) {
            #calander
             {
                 top:500px  !important;
                 left:470px !important;
             }
            .notes_survey
                   {
                       margin-left:30px;
                   }
            .card_balance
            {
                margin:0;
                padding-top:0px;
                border-radius:0;
                padding:0;
            }
            #notes_survey
            {
                width:100% !important;
            }
            #notes
            {
                width:85% !important;
            }
            .product_table label
            {
                margin-left:80px;
            }
            
            
            .submit_que
            {
                font-family: dunkin;
                width:75% !important;
            }
            .survey .submit_que
            {
                width:100%;
                margin-bottom:53px;
                margin-top:20px;
            }
            .survey_msg,#notes_survey
            {
                margin-bottom:0 !important;
            }
            

        
               #orders.recent_orders .reorder
            {
                width:45px;
            }
           }
         @media only screen 
              and (device-width: 280px) 
              and (device-height: 653px)
            {
                button.take_survey {
                width: 90px;
                height: 20px;
                font-family: dunkin;
                font-size: 8px !important;
                margin-left: 140px;
                position: absolute;
                top: auto;
                bottom: 20px;
                right: 20px;
            }
            .order_rating_btn{
                background: #EA4397;
                position: absolute;
                left: -60px;
                top: auto;
                bottom: 20px;
                border-radius: 27px;
                width: 100px;
                height: 20px;
                border: none;
                font-family: dunkin;
                font-size: 11px !important;
                color: #fff;
                word-spacing: 3px;
                margin-left: 90px;
            }
                .login_p
                {
                    padding-left:20px;
                    padding-right:20px; 
                }
                .card_r
                {
                    padding-left:15px;
                    padding-right:15px;
                }
                .card-type
                {
                    width:60px;
                }
                #calander
                {
                    left:210px !important;
                    top:355px !important;
                    width:40px;
                    height:40px;
                    line-height:0 !important;
                    font-size:0 !important;
                    
                }
                #calander i.material-icons
                {
                    font-size:22px !important;
                    width:22px;
                    height:32px;
                    vertical-align:middle;
                    line-height:45px !important;
                }
                #orders .active_orders
                {
                    padding:20px !important;
                }
                h2#active_order {
                    font-size:20px !important;
                }
                #orders.recent_orders .order-no
                {
                    font-size:12px;
                    padding-left:7px
                }
            
                #orders.recent_orders .reorder
            {
                width:45px;
            }
            }
        /* media query for Galaxy Fold */
        @media only screen 
              and (device-width: 280px) 
              and (device-height: 653px) and (-webkit-min-device-pixel-ratio: 3)
            {
                button.take_survey {
                width: 90px;
                height: 20px;
                font-family: dunkin;
                font-size: 8px !important;
                margin-left: 140px;
                position: absolute;
                top: auto;
                bottom: 20px;
                right: 20px;
            }
            #notification
            {
                right:12px;
            }
            #notifyCount
            {
                right:2px;
            }
            .cart
            {
                    margin-right: 0.9vw;
            }
            #active-order {
                right:80px;
            }
            .recent_orders .reorder {
                margin-left: 0px;
            }
            .reorder-text {
              margin-left: 0px;
              font-size:10px;
            }
            .notify_time {
                font-size: 7px;
            }
            .ordr_stat {
                font-size:9px !important;
            }
            #orders.recent_orders .order-no {
                font-size: 10px;
                padding-left: 0px;
            }
            .order_rating_btn{
                background: #EA4397;
                position: absolute;
                left: -60px;
                top: auto;
                bottom: 20px;
                border-radius: 27px;
                width: 100px;
                height: 20px;
                border: none;
                font-family: dunkin;
                font-size: 11px !important;
                color: #fff;
                word-spacing: 3px;
                margin-left: 90px;
            }
        #choose_card
        {
            padding:0 10px;
            margin:0
        }
        .meal
        {
            font-size:9px;
        }
        .remove
        {
            width:35px;
        }
        .reorder
        {
            width:35px !important;
        }
            .swal-height2
        {
            padding:0px !important;
            height:365px !important;
        }
        .msg-padding
        {
           padding:0 20px 0 20px; 
        }
        .item-qua
        {
            font-size:12px;
        }
        .item-price
        {
            font-size:14px;
        }
        .menu_again
        {
            padding:12px 10px 12px 10px;
            padding-bottom:9px !important;
            
        }
        .menu_again:last-child
        {
            padding-bottom:12px !important;
        }
        .item-size {
            font-size:6px;
            padding:1px 3.5px;
        }
        .order-img
        {
            width:40px;
            height:40px;
        }
        .sugar
        {
            margin:0 0 0 5px;
            font-size:5px;
            padding:5px 8px;
        }
        .menu_again .item-no
        {
            margin:0 0 3px 5px !important;
            font-size:12px;
            margin:0;
        }
            .notes_survey,.notes_survey.input-field>label
            {
                margin-left:10px !important;
                
            }
            
            .qr
            {
                 margin-top:30px;   
            }
            .slider
            {
                margin-left:15px;
                width:250px !important;
                
            }
            
             #profile-links .switch label .lever
            {
                margin:0;
            }
            #profile-links.sidenav li>a
            {
                padding-right:5px;
            }
            .list-orders p
            {
                margin:0;
            }
            .discount-code 
            {
                width:20%;
                font-size:12px;
            }
            .item-no
            {
                font-size: 12px;
                padding-left:0px;
                
            }
            .item-size
            {
                font-size:7px;
                padding:1px 3.5px;
                margin-left:10px;
            }
    
            .sugar,.flavor
            {
                font-size:4.5px;
                padding:5px 0px;
            }
            .item-qua
            {
                font-size:12px;
            }
            .item-price
            {
                font-size: 12px;
                margin:0;
    
            }
            .active_orders 
            {
                padding: 13px 35px !important;
            }
            .order-active
            {
               width:42px !important;
               font-size:7px !important;
            }
            i.clock
            {
                font-size:16px !important;
                margin-right:0 !important;
            }
            .order_price, .go_to_cart {
                padding: 10px;
                width:80%;
            }
            .go_to_cart {
                 padding: 10px;
            }
            
            #notes_survey
            {
                width:100% !important;
                
            }
            
            #notes
            {
                width:85% !important;
            }
            .product_table label
            {
                margin-left:30px;
            }
            .size img
            {
                width:60px;
                height:70px;
            }
            .product_name
            {
                font-size:16px;
                padding-left:25px;
            }
            .minus
            {
                padding-right:10px;
            }
            .plus
            {
                padding-left:10px;
            }
            .product_image
            {
                max-width: 100%;
                height: auto !important;
                width: 150px;
            }
            .product-img
            {
                width:150px !important;
                height:150px !important;
            } 
            a.tablinks
            {
                padding:20px 10px !important;
            }
            .collecion_name
            {
                width:100px;
            }
            .faq h2
            {
                display:block !important;
                font-size:20px !important;
                word-spacing:15px;
                padding:58px 40px 35px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:5px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:11px 15px !important;
                font-size:13px;
                margin-left:20px;
                margin-right:20px;
                margin-bottom:20px;
                text-transform: capitalize;
            }
            .question {
                font-family:dunkin;
                font-size:13px;
                font-weight:600;
                margin-bottom:5px;
                
            }
            .ans
            {
                font-size:9px;
                line-height:18px;
            }
            .collapsible-body
            {
                font-size:18px;
            }
            .submit_que
            {
                font-family:dunkin !important;
                font-size:14px !important;
                padding:11px 5px !important;
                width:75%;
                margin-bottom:50px;
                margin-top:20px;
            }
            
        
                #orders.recent_orders .reorder
            {
                width:45px;
            }
            }
        /* Media query for pixel 2 */
        @media only screen and (device-width: 411px) {
            .order-time i.large 
            {
                vertical-align: -webkit-baseline-middle;
            }
             .submit_que
            {
                font-family:dunkin !important;
                font-size:16px !important;
                padding:13px !important;
                width:75%;
                margin-top:20px;
                margin-bottom:48px;
                word-spacing:5px;
            }
            .faq h2
            {
                padding: 50px 40px 40px 40px !important;
            }
            .item-price
            {
                margin:0;
            }
            #notes_survey
            {
                width:100% !important;
                
            }
            .notes_survey
            {
                margin-left:10px;
            }
            .notes
            {
                margin-left:60px !important;
            }
            #notes
                {
                    width:85% !important;
                }
            .collapsible-header,.collapsible-body
            {
                margin-left:30px;
                margin-right:30px;
            }
            
        
        
            #orders.recent_orders .reorder
            {
                width:45px;
            }
        }
        /* Media query for pixel 2 XL */
        @media only screen and (device-width: 411px)  {
            #calander
            {
                left:340px !important;
                top:440px !important;
            }
            .order-time i.large {
                vertical-align: top;
            }
            .notes
            {
                margin-left:60px !important;
            }
            #notes
                {
                    width:85% !important;
                }
            .faq h2
            {
                font-size:26px !important;
            }
        }
        
        
        /* Iphone X */
        @media only screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) {
            #calander
            {
                top:420px !important;
                left:310px !important;
            }
            .reorder-text {
                font-size:12px;
                margin-left: 5px;
            }
            .recent_orders .reorder
            {
                margin-left:0;
            }
            .notify_time {
                font-size: 11px;
            }
        .size img {
            width: 60%;
        }
        .swal-height2
        {
            width:99% !important;
            padding:0px !important;
            height:365px !important;
        }
        .msg-padding
        {
           padding:0 20px 0 20px; 
        }
        .item-qua
        {
            font-size:12px;
        }
        .item-price
        {
            font-size:14px;
        }
        .menu_again
        {
            padding:12px 0 12px 0;
            padding-bottom:9px !important;
            
        }
        .menu_again:last-child
        {
            padding-bottom:12px !important;
        }
        .item-size {
            font-size:6px !important;
            padding:1px 3.5px !important;
        }
        .order-img
        {
            width:40px;
            height:40px;
        }
        .sugar
        {
            margin:0 0 0 5px;
            font-size:5px;
            padding:5px 8px;
        }
        .menu_again .item-no
        {
            margin:0 0 3px 5px !important;
            font-size:12px;
            margin:0;
        }
            #notes
            {
                width:85% !important;
            }
            #notes_survey
            {
                width:85% !important;
                
            }
            .notes_survey
            {
                margin-left:15px;
            }
            
            .file-field .file-path-wrapper
            {
                width:90% !important;
                margin-left:8px;
                margin-right:0 !important;
            }
            .collapsible-header,.collapsible-body 
            {
              margin:0px 30px 15px 30px;  
            }
            .faq h2
            {
                padding:40px 40px 40px 40px;
            }
           
            
             
        
            #orders.recent_orders .reorder
            {
                width:45px;
            }
        }
        
        /* Media query for Iphone 5 SE */
        @media only screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) {
        .menu_again {
                padding: 20px 5px;
            }
            .cart
            {
               right:35px; 
            }
            #active-order
            {
                right:100px;
            }
            .reorder-text {
                font-size:9px;
                margin-left: 3px;
            }
            .recent_orders .reorder
            {
                margin-left:0;
            }
            .notify_time {
                font-size: 9px;
            }
        .sugar {
            margin: 0 0 0 5px;
            font-size: 5px;
            padding: 5px 8px;
            float:left;
        }
        .item-size {
                font-size: 6px;
                padding: 1px 3.5px;
            }
        .order-time i.large {
            vertical-align: -webkit-baseline-middle;
        }
         #profile-links .switch label .lever
        {
            margin:0;
        }
        #profile-links.sidenav li>a
        {
            padding-right:5px;
        }
         .list-orders .item-no
        {
            padding-left:0;
            font-size:15px !important;
        }
         .list-orders .sugar,.flavor
         {
             font-size:5px;
         }
          .item-no
            {
                font-size: 16px;
                padding-left:10px;
                margin:0;
                
            }
        .swal-height2 
            {
                width:99% !important;
            }
        .list-orders .item-size
        {
            font-size:6px;
            padding:1px 2px;
        }

        .sugar,.flavor
        {
            font-size:6px;
            padding:5px 4px;
        }
        .item-qua
        {
            font-size:16px;
        }
        .item-price
        {
            font-size: 14px;
            margin:0;

        }
            #notes_survey
            {
                width:87% !important;
                
            }
            .notes_survey
            {
                margin-left:15px;
            }
            .minus
            {
                padding-right:15px;
            }
            .plus
            {
                padding-left:15px;
            }
            .notes
            {
                 margin-left:60px !important;
            }
            #notes
            {
                width:85%px !important;
            }
            .product_image
            {
               max-width: 100%;
               height: auto !important;
               width: 150px;
            }
            
            .size img
            {
                width:60px;
                height:70px;
            }
            .product_name
            {
                margin-left:0px;
                padding-left:30px;
            }
            .large
            {
                margin:0;
            }
            .faq h2
            {
                display:block !important;
                font-size:24px !important;
                word-spacing:15px;
                padding:55px 40px 40px 40px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                margin-left:30px;
                margin-right:30px;
                font-size:13px;
                margin-bottom:20px;
                padding:12px 15px !important;
            }
            .ans
            {
                font-size:10px;
            }
            .question
            {
                font-size:13px;
                margin-bottom:10px;
            }
            .submit_que
            {
                
                font-size:13px !important;
                font-family:dunkin !important;
                width:70%;
                margin-bottom:50px;
                margin-top:15px;
            }
            .login_p
            {
               padding:0 40px; 
            }
           
        
            #orders.recent_orders .reorder
            {
                width:45px;
            }
        }
        /* Moto G4 */
        @media only screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
            .reorder-text {
                font-size:12px;
                margin-left: 3px;
            }
            .recent_orders .reorder
            {
                margin-left:0;
            }
            .notify_time {
                font-size: 10px;
            }
            #notes_survey
            {
                width:90% !important;
                height:85px;
                max-height:85px;
                padding:0;
                
            }
            .survey label.notes_survey
            {
                font-family:dunkin;
                font-size:11px !important;
            }
            
            .size img
            {
                width:60px;
                height:70px;
            }
            
            #notes
            {
                width:85% !important;
            }
            .faq h2
            {
                display:block !important;
                font-size:26px !important;
                word-spacing:15px;
                padding:58px 40px 35px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:15px 8px 9px 15px !important;
                margin-left:30px;
                margin-right:30px;
                margin-bottom:20px;
                text-transform: capitalize;
            }
            .question {
                font-family:dunkin;
                font-size:13px;
                font-weight:600;
                margin-bottom:5px;
                
            }
            .ans
            {
                font-size:9px;
                line-height:18px;
            }
            .collapsible-body
            {
                font-size:12px;
            }
            .submit_que
            {
                font-family:dunkin !important;
                font-size:13px !important;
                padding:13px !important;
                width:75%;
                margin-top:20px;
                margin-bottom:48px;
                word-spacing:5px;
            }
            
            
        }
        @media only screen and (device-width: 375px) {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
        .item-no
        {
            font-size: 16px;
            padding-left:0px;
                
        }
        .item-size
        {
            font-size:12px;
            padding:2px 6px;
            margin-left:15px;
        }

        .sugar,.flavor
        {
            font-size:8px;
            padding:5px 4px;
        }
        .item-qua
        {
            font-size:16px;
        }
        .item-price
        {
            font-size: 14px;
            margin:0;

        }
            
        }
         /* Responsive */
        @media only screen and (device-width: 798px) and (-webkit-device-pixel-ratio: 2) {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
        .item-no
        {
            font-size: 16px;
            padding-left:10px;
                
        }
        .item-size
        {
            font-size:12px;
            padding:2px 6px;
            margin-left:15px;
        }

        .sugar,.flavor
        {
            font-size:8px;
            padding:5px 4px;
        }
        .item-qua
        {
            font-size:16px;
        }
        .item-price
        {
            font-size: 14px;
            margin:0;

        }
            #orders
            {
                margin:0;
            }
            i.large
            {
                width:30px !important;
                height:30px !important;
            }
            
            #notes_survey {
            width: 100%;
            }
            .size img
            {
                width:60px;
                height:70px;
            }
            
            #notes
            {
                width:85% !important;
            }
                 .faq h2
            {
                display:block !important;
                font-size:26px !important;
                word-spacing:15px;
                padding:80px 40px 40px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:15px !important;
                font-size:20px;
                margin-left:40px;
                margin-right:40px;
                text-transform: capitalize;
            }
            
            .collapsible-body
            {
                font-size:18px;
            }
            .submit_que
            {
                font-size:18px !important;
                padding:13px 5px !important;
                width:230px;
                margin-bottom:60px;
            }
            
        }
        
         /* Iphone 6/7/8 plus */
        @media only screen and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) {
           #orders.recent_orders .reorder
            {
                width:45px;
            }
           #card-label
           {
               font-size:14px;
           }
            .fill {
                margin-left: 120px;
            }
            #calander
            {
                top:430px !important;
                left:350px !important;
            }
            .question {
                font-family:dunkin;
                font-size:14px;
                font-weight:600;
                margin-bottom:5px;
                
            }
            .ans
            {
                font-size:12px;
                line-height:18px;
            }
            #notes_survey
            {
                width:100% !important;
                
            }
            
            .file-field .file-path-wrapper
            {
                width:100% !important;
                margin-left:0;
                padding-left:7px !important;
                margin-right:0;
            }
            .notes_survey
            {
                margin-left:15px;
            }
            
            .size img
            {
                width:60px;
                height:70px;
            }
            
            #notes
            {
                width:85% !important;
            }
            .faq h2
            {
                display:block !important;
                font-size:26px !important;
                word-spacing:15px;
                padding:55px 40px 40px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:12px 15px !important;
                font-size:14px;
                margin-left:40px;
                margin-right:40px;
                text-transform: capitalize;
            }
            
            .collapsible-body
            {
                font-size:18px;
            }
            .submit_que
            {
                font-family:dunkin !important;
                font-size:14px !important;
                padding:13px 5px !important;
                width:75%;
                margin-bottom:60px;
            }
            
        }
        
                 /* Iphone 6/7/8  */
        @media only screen and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
         #calander
            {
                top:410px !important;
                left:310px !important;
            }
            .notify_time {
                font-size: 10px;
            }
            .swal-height2
        {
            padding:0px !important;
            height:365px !important;
        }
        .msg-padding
        {
           padding:0 20px 0 20px; 
        }
        .item-qua
        {
            font-size:12px;
        }
        .item-price
        {
            font-size:14px;
        }
        .menu_again
        {
            padding:12px 20px 12px 20px;
            padding-bottom:9px !important;
            
        }
        .menu_again:last-child
        {
            padding-bottom:12px !important;
        }
        .item-size {
            font-size:6px;
            padding:1px 3.5px;
        }
        .order-img
        {
            width:40px;
            height:40px;
        }
        .sugar
        {
            margin:0 0 0 5px;
            font-size:5px;
            padding:5px 8px;
        }
        .menu_again .item-no
        {
            margin:0 0 3px 5px !important;
            font-size:12px;
            margin:0;
        }
            
            .file-field input.file-path,.file-field
            {
                 height:30px !important;
                 width:90%;
                 margin-top:12px;
            }
            .file-field .file-path-wrapper
            {
                margin-top:8px;
                
            }
            #notes_survey
            {
                width:100% !important;
                margin:0;
            }
            .notes_survey
            {
                margin-left:15px;
            }
            .size img
            {
                width:60px;
                height:70px;
            }
            .product_name
            {
                margin-left:0px !important;
                padding-left:30px;
            }
            
            #notes
            {
                width:85% !important;
            }
            label.notes
            {
                margin-left:60px !important;
            }
            .faq h2
            {
                display:block !important;
                font-size:26px !important;
                word-spacing:15px;
                padding:58px 40px 40px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:12px 15px !important;
                font-size:14px;
                margin-left:40px;
                margin-right:40px;
                margin-bottom:20px;
                text-transform: capitalize;
            }
            
            .collapsible-body
            {
                font-size:18px;
            }
            
            .question
            {
                 font-size:14px;
                 margin-bottom:10px;
            }
            
            .ans
            {
                 font-size:12px;
            }
            .submit_que
            {
               font-family:dunkin !important; 
                font-size:14px !important;
                padding:13px 5px !important;
                width:75%;
                margin-bottom:60px;
            }
            
            .file-field .file-path-wrapper
            {
                width:106% !important;
            }
            .log_in.register
            {
                margin-top:40px;
            }
        }
              /* IPAD */
        @media only screen 
              and (device-width: 768px) 
              and (device-height: 1024px) 
              
        {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
            #choose_card
            {
                margin:0;
            }
            #choose_card h2
            {
                margin-top:0;
                padding-top:60px;
            }
            #discount
            {
                left:10px !important;
                width:170px !important;
            }
            #calander
            {
                top:710px !important;
                left:610px !important;
            }
            .menu_again {
                padding: 20px 30px;
            }
            #contact-form .attachment_btn
            {
                right:0;
            }
            #contact-form .register.log_in
            {
                margin-top:40px;
                width:70%;
            }
            .recent_articles .col.s7.m5
            {
                margin-left:20px !important;
            }
            .card_balance
            {
                margin:50px 0 50px ;
                padding-top:0;
            }
            .order-time i.large {
                vertical-align: -webkit-baseline-middle;
                margin-right:0 !important;
                line-height:1;
            }
            .track_order .order-time i.large {
                vertical-align: -webkit-baseline-middle;
                margin-right:0 !important;
                line-height:1 !important;
            }
            .order-stats
            {
                margin-left:190px !important;
                margin-right:190px !important;
                
            }
            #orders
            {
                padding:0 !important;
            }
            .log_in
            {
                width:100% !important;
            }
            i.large
            {
                width:30px !important;
                height:30px !important;
            }
            #login_form,#registration_form,#contact-form,#orders,#card_payment,#card_payment
            {
                margin:0;
            }
            #contact-form 
            {
                padding-left:120px !important;
                padding-right:120px !important;
            }
            .register.login
            {
                width:70%;
            }
            #notes_survey
            {
                width:100% !important;
                
            }
            .notes_survey
            {
                margin-left:40px;
            }
            .attachment_btn
            {
                margin-top:20px !important;
                margin-right:-16px;
            }
            .file-field input.file-path,.file-field
            {
                 height:30px !important;
                 width:89%;
                 margin-top:12px;
            }
            .file-field .file-path-wrapper
            {
                margin-top:8px;
                position:absolute;
                width:96%;
                top:55px;
                
            }
            .product_name
            {
                font-size:30px;
            }
            
            .overview
            {
                font-size:23px !important;
                text-align:center;
            }
            #notes
            {
                width:85% !important;
            }
            [type="checkbox"].filled-in:checked+span:not(.lever):after,[type="checkbox"].filled-in+span:not(.lever):after {
                width:25px !important;
                height:25px !important;
                
               
            }
            .price
            {
                padding:10px 22px;
                font-size:16px;
            }
            .product_table tr td span
            {
                font-size:23px !important;
            }
            label.notes
            {
                margin-left:30px !important;
                font-size:20px !important;
                
            }
            .order_price, .go_to_cart
            {
                font-size:18px;
            }
            .edit
            {
                font-size:20px !important;
            }
            .calories
            {
                font-size:23px;
                padding:5px 10px;
            }
            .product_details
            {
                margin:0 !important;
            }
            .brand-logo
            {
                margin-left:-30px;
            }
            #products_menu
            {
                margin:0px;
            }
            #products_menu h2
            {
                display:none;
            }
            .third-menu
            {
                display:block !important;
            }
            .product-img
            {
                height:200px !important;
            }     
            #overlays {
            position: absolute !important;
            top: 740px;
            left: 123px;
            background:#fff;
            width:70%;
            padding:10px 0 15px 10px !important;
         
            }
            .register
            {
                padding:10px;
            }
            #registration_form h2,#login_form h2,#contact-form h2,#orders h2,#card_payment h2
            {
                font-family:Dunkin;
                text-align:center;
                color: #FF671F;
                font-size:20px;
            }
            #registration_form,#login_form,#contact-form,#orders,#card_payment
            {
                margin:0;
                box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.12);
                border-radius: 0;
                padding:20px 100px;
            }
            #login_form h2,#contact-form h2,#orders h2,#card_payment h2
            {
                color:#EA4397;
                font-size:40px;
            }
            #sec-menu
            {
                display:none;
            }
            .faq h2
            {
                display:block !important;
                font-size:40px !important;
                word-spacing:15px;
                padding:80px 40px 40px 40px !important;
                margin:0 !important;
            }
            .faq
            {
                padding:10px !important;
                margin:0 !important;
            }
            .collapsible-header,.collapsible-body
            {
                padding:15px !important;
                font-size:20px;
                margin-left:40px;
                margin-right:40px;
                text-transform: capitalize;
            }
            
            .collapsible-body
            {
                font-size:18px;
            }
            .submit_que
            {
                font-family:dunkin;
                font-size:20px !important;
                padding:13px 5px !important;
                width:75%;
                margin-bottom:60px;
            }
            .survey .submit_que
            {
                margin-top:80px;
            }
            #orders.edit_branch_address
            {
                margin:0;
                padding:100px 100px 0 100px!important;
            }
            .p_name 
            {
                margin-left:30px;
            }
            #orders.recent_orders h2
            {
                display:none
            }
            #orders.recent_orders .fav_orders
            {
                padding:30px 50px !important;
            }
            #orders.recent_orders
            {
                padding-top:0;
            }
            #orders.recent_orders .order-no
            {
                font-family:dunkin !important;
                font-size:25px;
                
            }
            #orders.recent_orders .reorder
            {
                width:45px;
            }
            .notify_time
            {
                font-size:18px;
                font-family:dunkin;
            }
            .ordr_stat
            {
                width:124px;
                height:27px;
                font-size:14px;
                margin-left:20px;
                vertical-align:middle;
                padding:0;
                margin-top:10px;
                font-family:dunkin;
            }
            #branches-list
            {
                margin:0;
                padding-left:0;
                padding-right:0;
            }
            .map-dir
            {
               margin-left:0;
            }
            .branch
            {
                padding:30px 100px;
            }
            
            
        }
         @media only screen  and (device-width: 320px)
        {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
            .login_p
            {
                padding:0 40px;
            }
        }
         @media only screen  and (device-width: 240px)
        {
            #orders.recent_orders .reorder
            {
                width:45px;
            }
            .login_p
            {
                padding:0;
            }
        }

        button:focus,button:active {
            background: #EC4E98 !important;
        }
        .card_btn:focus,.card_btn:active
        {
            background:#fff;
        }
        .carousel-indicators .active {
            width: 48px;
            height: 48px;
            margin: 10px;
            background-color: #ffff99;
        }
        .tabs .indicator {
            background-color: #EC4E98 !important;
        }
        [type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:after {
           background-color: #EC4E98 !important;
        }
        [type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:before, [type="radio"].with-gap:checked+span:after {
            border: 2px solid #EC4E98 !important;
        }
        #menu .tabs-content.carousel.carousel-slider
        {
            height:800px !important;
        }
        .indicators .indicator-item.active
        {
            background-color: #EC4E98 !important;
        }
        .is-today
        {
                background-color: #FF671F !important;

        }
        .is-disabled
        {
            color:#ccc !important;
        
        }
    .arabic-notify
    {
        position: absolute;
        top: 24px;
        right: auto;
        left: 27px;
        width: 22px;
        height: 22px;
        line-height: 16px;
        border-radius: 50%;
        border: 2px solid #fff;
        font-size: 13px;
        color: #fff;
        text-align: center;
        background: #FF671F;
    }
    #notification.arabic-notification {
        position: absolute;
        right: auto;
        left: 10px;
        font-size: 30px;
        cursor: pointer;
    }
    .arabic-logo
    {
        position:absolute;
        left: auto;
        right: 110px;
       
    }
    .arabic-cart
    {
       left:60px; 
       float:left;
    }
    .arabic-menu
    {
        left: 150px;
    position: absolute;
      
    }
    .arabic-active
    {
        left: 90px !important;
        margin-top: 1px !important;
        right: auto !important;
    }
        
        </style>
        <?php
        if($lang=='ar'){?>
        <style>
        input::placeholder
        {
            text-align:right;
        }
        #notification-li li .col.s9.m9.l9
        {
            float: right;
            direction: rtl;
            text-align: right;
        }
        #notification-li li .col.s3.m3.l3
        {
            float:left;
            text-align:left;
        }
        .item-size
        {
            right:5% !important;
        }
        .total-price
        {
            float:left;
            
        }
        .total
        {
            float:right;
        }
         .row:not(.banner)
             {
                 direction: rtl !important;
             }
             .banner p.center-align
             {
                 margin-left:5%;
             }
             .reorder-text
             {
                 margin-left: 12%;
                text-align: right;
                position: relative;
                left: 6%;
            }
        @media only screen and (max-width: 600px)
        {
            .reorder-text
            {
                float: left;
                width: 100px;
                text-align: left;
                vertical-align: top;
                margin-top: 5px;
            }
            .recent_orders .reorder {
              margin-right:0px;
            }
            .reorder-text {
                margin-left: 0px;
            }
            .remove-text
            {
                 margin-right: 7px;
            }
            #pass_label
            {
                margin-left: 0rem;
                padding-right:50px !important;
            }
            .row:(.banner)
             {
                 direction: rtl;
             }
             .banner p.center-align
             {
                 margin-left:auto !important;
                 margin-right:auto !important;
             }
        }
            
             label,select
             {
                text-align:right !important; 
                padding-right:30px !important;
             }
            .input-field>input
            {
                direction: rtl;
                
            }
            
            ul {
               padding-inline-start: 0px !important;
            }
            a,h1,h2,h3,p,button, input, optgroup, select, textarea,input,.copyright,span:not(.fa)
            {
                font-family:dunkin-medium !important;
            }
            .material-icons.prefix
            {
                padding-left: 100px ;
            
            }
            .input-field input:not([type=submit]),
            {
                padding-right: 60px !important;
            }
            input[type=tel],input[type=number],input[type=email],input[type=password],#phone_no {
            float: right;
            direction: ltr;
            font-family: 'dunkin' !important;
            }
                       .circle {
                border-radius: 50%;
                font-family: 'dunkin';
            }
            .lock-icon
            {
                position:absolute;
                right:0;
                
            }
            .login_phone {
               
            }
            #pass_label
            {
                margin-left: 0rem;
                padding-right:50px !important;
            }
            .input-field>#login-label:not(.label-icon).active,.input-field>#pass_label:not(.label-icon).active {
                -webkit-transform: translateY(14px) scale(0) !important;
                transform: translateY(14px) scale(0) !important;
                -webkit-transform-origin: 0 0 !important ;
                transform-origin: 0 0 !important;
            }
            .input-field>label:not(.label-icon).active {
                -webkit-transform: translateY(0px) scale(0.95) !important; 
                transform: translateY(0px) scale(0.95) !important;
                -webkit-transform-origin: 0 0 !important;
                transform-origin: 0 0 !important;
            }
            .input-field .prefix
            {
                right:0;
            }
            .left-align
            {
                text-align:right !important;
            }
            h5.about
            {
                font-family:dunkin-medium;
            }
            input
            {
                margin-left:0;
            }
            .survey_row p
            {
                text-align:right;
            }
            #discount
            {
                right:20px !important;
            }
            .branch_timing
            {
                font-family:dunkin !important;
            }
            .row.branch
            {
                direction:ltr;
            }
            #card_to,input.amount
            {
                font-family:dunkin !important;
                direction:ltr;
            }
            #card_select,#quantity,span.number
            {
                 font-family:dunkin !important;
            }
            .plus
            {
                padding-right:20px;
            }
            .minus
            {
              padding-left:20px;  
            }
            .quantity-selector
            {
                direction:ltr;
                float:right;
            }
            button.order_price
            {
                direction:ltr;
            }
            .collapsible-header
            {
                text-align:right;
            }
            .change_password label
            {
                padding-right:60px !important;
            }
            footer .col
            {
                text-align:right;
            }
            .distance {
                margin-right: 0%;
            }
            button.order {
               margin-top: 30px;
            }
        }
        .item-size
        {
           right:5% !important; 
        }
        .ltr
        {
            direction:ltr !important;
            text-align:center;
        }
        .career-apply-now-btn
        {
           float:left; 
        }
        .career h1,.career h2
        {
            text-align:right !important;
        }
        .branch h5,.address, #hours,.facility img,.branch_timing
        {
            float:right;
            text-align:right;
        }
        .order_col
        {
            float:left;
        }
        
        .row .col.l4
        {
            float:left;
        }
        a.map-dir
        {
            margin-top:0;
        }
        .distance
        {
            float:right;
        }
        .arabic-menu
        {
            right:20%;
            float:right;
            left:auto;
        }
        .row .col {
    float: right !important;
        }
        #pickup_time {
    margin-right: 0px;
    width:95%;
    float:right;
}
#pickup_location {
    margin-right: 0px;
    margin-left: 0%;
    width:95%;
    float:left;
}
.pick_up_loc
{
    text-align:right !important;
}
.reorder-text.fav-reorder
            {
            
               padding-left:0%;
            }
.reorder-text
{
   
}
#lbl_fav {
    top: 25%;
    right: 15%;
    width: 100px;
    float: right;
    left: auto;
}
input[type=text]#save_fav
{
    direction:rtl;
}

a.map-dir {
    margin-top: 0;
    float: right !important;
}
.distance {
    float: left !important;
    text-align: left;
    direction: rtl !;
}  
#overlays
{
    padding:20px !important;
}   

.xdsoft_datetimepicker {
left: 10px !important;
}

        </style>
        <?php }
        ?>