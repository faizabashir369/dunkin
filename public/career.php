 <?php 
 if(isset($_POST['job_ids']))
{
    $job_id=$_POST['job_ids'];
}
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
            <div id="registration_form" class="no-padding">
                <br>
                <h2><?php if($lang=='ar'){ echo "الوظائف";}else{ echo 'Careers';} ?></h2>
               <!-- <p class="career-p">Get directions and details on the Dunkin', nearest to you</p> -->
                <br><br>
                <div class="">
                    <div class="row">

                          <?php
                          
                          $curl = curl_init();

                            curl_setopt_array($curl, array(
                              CURLOPT_URL => 'https://dunkinsa.abstractagency.net/api/v2/jobs/',
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'GET',
                            ));
                            
                            $response = curl_exec($curl);
                
                            curl_close($curl);
                            $data = json_decode($response, true);
                            foreach($data['data'] as $val) {
                          ?>
                        <div class="career c1 col s12 m6 l6">
                            <div class="career-inner">
                             <div class="career-inner-text">
                            <h1><?php echo $val['job_title']; ?></h1>
                            <h2><?php echo $val['location']; ?></h2>

                            <div class="career-location">
                                <img class="lazy" src="https://dunkin.tedmob.com/images/website/dunkin_map_icon_pink.png" style="">
                                <span class="location-text"><?php echo $val['shop_details']; ?></span>
                                <br><br>
                            </div>
                        </div>
                            <div class="career-inner-btn">
                                <form action="career.php" method="post"  class="career_form" id="<?php echo $val['id'];?>" class="form_career">
                        <input type="hidden" class="career-apply-now-emails" name="job_ids" value="<?php echo $val['id']; ?>">
                    
                            <button type="submit" class="career-apply-now-btn">
                                <?php if($lang=='ar'){ echo "تقديم";}else{ echo "APPLY NOW";} ?>
                               
                            </button>
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    
                    <?php } ?>
                    

                       
                   </div>
               </div>
                   <br><br><br><br><br><br>

                   <section id="careers-page-section" class="careers-page-section container-fluid overflow-visible pt-5 full-height active">
        <div class="row">
            <div class="col s12 m12 l12 cps-apply-section">
                <h2 class="cps-section-title" id="cps-section-title" style="display:none">
                    
                   <?php if($lang=='ar'){ echo "تقديم";}else{ echo "APPLY NOW";} ?>
                               
                </h2>

                <div class="cpsas-section-outer">
                    <form action="form_submit.php" method="post" style="display:none" id="cv_form" class="cpsas-section-form" enctype="multipart/form-data">
                        <div class="cpsas-section col s12 m6 l6">
                            
                            <h3 class="cpsas-title">
                                
                                <?php if($lang=='ar'){ echo "المعلومات الشخصية";}  
                                else
                                { echo "Personal Information";} ?>
                            </h3>

                            <div class="cpsas-inputs-section">
                                <div class="input-field col s12">
          <input placeholder="<?php if($lang=='ar'){ echo "الاسم الاول";}  
                                else
        { echo "First Name";} ?>" id="first_name"  name="first_name"type="text" class="validate" required>
         
        </div>
        <div class="input-field col s12">
          <input placeholder="<?php if($lang=='ar'){ echo "الاسم الاخير";}  
                                else
            { echo "Last Name";} ?>"   id="last_name" name="last_name" type="text" class="validate" required>
    
        </div>

        <div class="row">
            <div class="input-field col s12 m6 l6">
          <input placeholder="<?php if($lang=='ar'){ echo "تاريخ الميلاد";}  
                                else
                                { echo "Date of Birth";} ?>" id="date_of_birth" name="dob" type="text" class="datepicker" required>
          
        </div>
        <div class="input-field col s12 m6 l6">
    <select class="browser-default" name="gender" required>
      <option value="" selected><?php if($lang=='ar'){ echo "الجنس";}  
                                else
                                { echo "Select Gender";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "ذكر";}  
                                else
                                { echo "Male";} ?>"><?php if($lang=='ar'){ echo "ذكر";}  
                                else
                                { echo "Male";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "انثى";}  
                                else
                                { echo "Female";} ?>"><?php if($lang=='ar'){ echo "انثى";}  
                                else
                                { echo "Female";} ?></option>
    
    </select>
  </div>
        </div>

        <div class="row">
        	<?php
           $arabic_array=array(
'أفغانستان',
'ألبانيا',
'جزر آلاند',
'الجزائر',
'ساموا-الأمريكي',
'أندورا',
'أنغولا',
'أنغويلا',
'أنتاركتيكا',
'أنتيغوا وبربودا',
'أرمينيا',
'أروبه',
'أستراليا',
'النمسا',
'أذربيجان',
'الباهاماس',
'البحرين',
'بنغلاديش',
'بربادوس',
'روسيا البيضاء',
'بلجيكا',
'بيليز',
'بنين',
'سان بارتيلمي',
'جزر برمودا',
'بوتان',
'بوليفيا',
'البوسنة و الهرسك',
'بوتسوانا',
'جزيرة بوفيه',
'البرازيل',
'إقليم المحيط الهندي البريطاني',
'بروني',
'بلغاريا',
'بوركينا فاسو',
'بوروندي',
'كمبوديا',
'كاميرون',
'كندا',
'الرأس الأخضر',
'جزر كايمان',
'جمهورية أفريقيا الوسطى',
'تشاد',
'شيلي',
'الصين',
'جزيرة عيد الميلاد',
'جزر كوكوس',
'كولومبيا',
'جزر القمر',
'الكونغو',
'جزر كوك',
'كوستاريكا',
'كرواتيا',
'كوبا','Cuban',
'قبرص',
'كوراساو',
'الجمهورية التشيكية',
'الدانمارك',
'جيبوتي',
'دومينيكا',
'الجمهورية الدومينيكية',
'إكوادور',
'مصر',
'إلسلفادور',
'غينيا الاستوائي',
'إريتريا',
'استونيا',
'أثيوبيا',
'جزر فوكلاند',
'جزر فارو',
'فيجي',
'فنلندا',
'فرنسا',
'غويانا الفرنسية',
'بولينيزيا الفرنسية',
'أراض فرنسية جنوبية وأنتارتيكية',
'الغابون',
'غامبيا',
'جيورجيا',
'ألمانيا',
'غانا',
'جبل طارق',
'غيرنزي',
'اليونان',
'جرينلاند',
'غرينادا',
'جزر جوادلوب',
'جوام',
'غواتيمال',
 'غينيا',
'غينيا-بيساو',
'غيانا',
'هايتي',
'جزيرة هيرد وجزر ماكدونالد',
'هندوراس',
'هونغ كونغ',
'المجر',
'آيسلندا',
'الهند',
'جزيرة مان',
'أندونيسيا',
'إيران',
'العراق',
'إيرلندا',
'إسرائيل',
'إيطاليا',
'ساحل العاج',
'جيرزي',
'جمايكا',
'اليابان',
'الأردن',
'كازاخستان',
'كينيا',
'كيريباتي',
'كوريا الشمالية',
'كوريا الجنوبية',
'كوسوفو',
'الكويت',
'قيرغيزستان',
'لاوس',
'لاتفيا',
'لبنان',
'ليسوتو',
'ليبيريا',
'ليبيا',
'ليختنشتين',
'لتوانيا',
'لوكسمبورغ',
'سريلانكا',
'ماكاو',
'مقدونيا',
'مدغشقر',
'مالاوي',
'ماليزيا',
'المالديف',
'مالي',
'مالطا',
'جزر مارشال',
'مارتينيك',
'موريتانيا',
'موريشيوس',
'مايوت','Mahoran',
'المكسيك',
'مايكرونيزيا',
'مولدافيا',
'موناكو',
'منغوليا',
'الجبل الأسود',
'مونتسيرات',
'المغرب',
'موزمبيق',
'ميانمار',
'ناميبيا',
'نورو',
'نيبال',
'هولندا',
'جزر الأنتيل الهولندي',
'كاليدونيا الجديدة',
'نيوزيلندا',
'نيكاراجوا',
'النيجر',
'نيجيريا',
'ني',
'جزيرة نورفولك',
'جزر ماريانا الشمالية',
'النرويج',
'عمان',
'باكستان',
'بالاو',
'فلسطين',
'بنما',
'بابوا غينيا الجديدة',
'باراغواي',
'بيرو',
'الفليبين',
'بيتكيرن',
'بولونيا',
'البرتغال',
'بورتو ريكو',
'قطر','Qatari',
'ريونيون',
'رومانيا',
'روسيا',
'رواندا',
'سانت كيتس ونيفس,',
'سانت فنسنت وجزر غرينادين',
'ساموا',
'سان مارينو',
'ساو تومي وبرينسيبي',
'المملكة العربية السعودية',
'السنغال',
'صربيا',
'سيشيل',
'سيراليون',
'سنغافورة',
'سلوفاكيا',
'سلوفينيا',
'جزر سليمان',
'الصومال',
'جنوب أفريقيا',
'المنطقة القطبية الجنوبية',
'السودان الجنوبي',
'إسبانيا',
'سانت هيلانة',
'السودان',
'سورينام',
'سفالبارد ويان ماين',
'سوازيلند',
'السويد',
'سويسرا',
'سوريا',
'تايوان',
'طاجيكستان',
'تنزانيا',
'تايلندا',
'تيمور الشرقية',
'توغو',
'توكيلاو',
'تونغا',
'ترينيداد وتوباغو',
'تونس',
'تركيا',
'تركمانستان',
'جزر توركس وكايكوس',
'توفالو',
'أوغندا',
'أوكرانيا',
'الإمارات العربية المتحدة',
'المملكة المتحدة',
'الولايات المتحدة',
'قائمة الولايات والمناطق الأمريكية',
'أورغواي',
'أوزباكستان',
'فانواتو',
'فنزويلا',
'فيتنام',
'الجزر العذراء الأمريكي',
'فنزويلا',
'والس وفوتونا',
'الصحراء الغربية',
'اليمن',
'زامبيا',
'زمبابوي');

$eng_array=array(
'Afghanistan',
'Albania',
'Aland Islands',
'Algeria',
'American Samoa',
'Andorra',
'Angola',
'Anguilla',
'Antarctica',
'Antigua and Barbuda',
'Armenia',
'Aruba',
'Australia',
'Austria',
'Azerbaijan',
'Bahamas',
'Bahrain',
'Bangladesh',
'Barbados',
'Belarus',
'Belgium',
'Belize',
'Benin',
'Saint Barthelemy',
'Bermuda',
'Bhutan',
'Bolivia',
'Bosnia and Herzegovina',
'Botswana',
'Bouvet Island',
'Brazil',
'British Indian Ocean Territory',
'Brunei Darussalam',
'Bulgaria',
'Burkina Faso',
'Burundi',
'Cambodia',
'Cameroon',
'Canada',
'Cape Verde',
'Cayman Islands',
'Central African Republic',
'Chad',
'Chile',
'China',
'Christmas Island',
'Cocos (Keeling) Islands',
'Colombia',
'Comoros',
'Congo',
'Cook Islands',
'Costa Rica',
'Croatia',
'Cuba',
'Cyprus',
'Curaçao',
'Czech Republic',
'Denmark',
'Djibouti',
'Dominica',
'Dominican Republic',
'Ecuador',
'Egypt',
'El Salvador',
'Equatorial Guinea',
'Eritrea',
'Estonia',
'Ethiopia',
'Falkland Islands (Malvinas)',
'Faroe Islands',
'Fiji',
'Finland',
'France',
'French Guiana',
'French Polynesia',
'French Southern and Antarctic Lands',
'Gabon',
'Gambia',
'Georgia',
'Germany',
'Ghana',
'Gibraltar',
'Guernsey',
'Greece',
'Greenland',
'Grenada',
'Guadeloupe',
'Guam',
 'Guatemala',
 'Guinea',
'Guinea-Bissau',
'Guyana',
'Haiti',
'Heard and Mc Donald Islands',
'Honduras',
'Hong Kong',
'Hungary',
'Iceland',
'India',
'Isle of Man',
'Indonesia',
'Iran',
'Iraq',
'Ireland',
'Israel',
'Italy',
'Ivory Coast',
'Jersey',
'Jamaica',
'Japan',
'Jordan',
'Kazakhstan',
'Kenya',
'Kiribati',
'Korea(North Korea)',
'Korea(South Korea)',
'Kosovo',
'Kuwait',
'Kyrgyzstan',
'Lao PDR',
'Latvia',
'Lebanon',
'Lesotho',
'Liberia',
'Libya',
'Liechtenstein',
 'Lithuania',
'Luxembourg',
'Sri Lanka',
'Macau',
'Macedonia',
'Madagascar',
'Malawi',
'Malaysia',
'Maldives',
'Mali',
'Malta',
'Marshall Islands',
'Martinique',
'Mauritania',
'Mauritius',
'Mayotte',
'Mexico',
'Micronesia',
'Moldova',
'Monaco',
'Mongolia',
'Montenegro',
'Montserrat',
'Morocco',
'Mozambique',
'Myanmar',
'Namibia',
'Nauru',
'Nepal',
'Netherlands',
'Netherlands Antilles',
'New Caledonia',
'New Zealand',
'Nicaragua',
'Niger',
'Nigeria',
'Niue',
'Norfolk Island',
'Northern Mariana Islands',
'Norway',
'Oman',
'Pakistan',
'Palau',
'Palestine',
'Panama',
'Papua New Guinea',
'Paraguay',
'Peru',
'Philippines',
'Pitcairn',
'Poland',
'Portugal',
'Puerto Rico',
'Qatar',
'Reunion Island',
'Romania',
'Russian',
'Rwanda',
'Saint Kitts and Nevis',
'Saint Martin (French part)',
'Sint Maarten (Dutch part)',
'Saint Pierre and Miquelon',
'Saint Vincent and the Grenadines',
'Samoa',
'San Marino',
'Sao Tome and Principe',
'Saudi Arabia',
'Senegal',
'Serbia',
'Seychelles',
'Sierra Leone',
'Singapore',
'Slovakia',
'Slovenia',
'Solomon Islands',
'Somalia',
'South Africa',
'South Georgia and the South Sandwich',
'South Sudan',
'Spain',
'Saint Helena',
'Sudan',
'Suriname',
'Svalbard and Jan Mayen',
'Swaziland',
'Sweden',
'Switzerland',
'Syria',
'Taiwan',
'Tajikistan',
'Tanzania',
'Thailand',
'Timor-Leste',
'Togo',
'Tokelau',
'Tonga',
'Trinidad and Tobago',
'Tunisia',
'Turkey',
'Turkmenistan',
'Turks and Caicos Islands',
'Tuvalu',
'Uganda',
'Ukraine',
'United Arab Emirates',
'United Kingdom',
'United States',
'US Minor Outlying Islands',
'Uruguay',
'Uzbekistan',
'Vanuatu',
'Venezuela',
'Vietnam',
'Virgin Islands (U.S.)',
'Vatican City',
'Wallis and Futuna Islands',
'Western Sahara',
'Yemen',
'Zambia',
'Zimbabwe');

        	?>
<select class="browser-default" name="country" required>


      <option value="" selected disabled=""><?php if($lang=='ar'){ echo "الجنسية";}  
                                else
                                { echo "Select Country";} ?>
    </option>

    <?php 
                                foreach (array_combine($eng_array, $arabic_array) as $value => $arabic) {
                                
                                 ?>
                                <option  value="<?php if($lang=='ar')
                                    { 
                                        echo $arabic;
                                    }
                                    else
                                    { 
                                        echo $value;
                                    }?>">
                                    <?php

                                     if($lang=='ar')
                                    { 
                                        echo $arabic;
                                    }
                                    else
                                    { 
                                        echo $value;
                                    }
                                    ?></option>
                                <?php } ?>



                                               
    
    </select>
        </div>

                    
                                </div>

                            </div>


                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "معلومات الاتصال";}  
                                else
                                { echo "Contact Information";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">
                                <div class="col-12 input-field">
                                    
                                    <select class="browser-default" name="visa_status">
      <option value="" selected> <?php if($lang=='ar'){ echo "الهوية";}  
                                else
                                { echo "Visa Status";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "مواطن";}  
                                else
                                { echo "Citizen";} ?>"><?php if($lang=='ar'){ echo "مواطن";}  
                                else
                                { echo "Citizen";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "إقامة قابلة للتحويل";}  
                                else
                                { echo "Transferable Iqama";} ?>"><?php if($lang=='ar'){ echo "إقامة قابلة للتحويل";}  
                                else
                                { echo "Transferable Iqama";} ?></option>
      <option value="Non-transferable Iqama"><?php if($lang=='ar'){ echo "إقامة غير قابلة للتحويل";}  
                                else
                                { echo "Non-transferable Iqama";} ?></option>
    
    </select>

                                </div>


                                <div class="col-12 input-field">
                                     <input id="email" type="email" name="email" class="validate" required>
                                    <label for="email"><?php if($lang=='ar'){ echo "البريد الالكتروني";}  
                                else
                                { echo "Email";} ?></label>
                                </div>

                                <div class="col-12 input-field">
                                     <input placeholder="<?php if($lang=='ar'){ echo "الجوال";}  
                                else
                                { echo "Telephone";} ?>" id="telephone" type="tel" min=13 max=13 name="phone" class="validate"  required>
                                     
                                </div>
<div class="row">
            <div class="input-field col s12 m6 l6">
          <input placeholder="<?php if($lang=='ar'){ echo "مكان الميلاد";}  
                                else
                                { echo "Birth Address";} ?>" id="birth_address" name="address" type="text" required>
         
          
        </div>
        <div class="input-field col s12 m6 l6">
    <select class="browser-default" name="religion" required>
      <option value="" selected><?php if($lang=='ar'){ echo "الديانة";}  
                                else
                                { echo "Select Religion";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "مسلم";}  
                                else
                                { echo "Muslim";} ?>"><?php if($lang=='ar'){ echo "مسلم";}  
                                else
                                { echo "Muslim";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "مسيحي";}  
                                else
                                { echo "Christian";} ?>"><?php if($lang=='ar'){ echo "مسيحي";}  
                                else
                                { echo "Christian";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "اخرى";}  
                                else
                                { echo "Other";} ?>"><?php if($lang=='ar'){ echo "اخرى";}  
                                else
                                { echo "Other";} ?></option>
    
    </select>
  </div>
        </div>

        <div class="input-field col s12 m12 l12">
          <input placeholder="<?php if($lang=='ar'){ echo "مكان السكن";}  
                                else
                                { echo "Current Location";} ?>" id="current_location" name="current_location" type="text" required>
      
          
        </div>


                            </div>

                        </div>

                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "البيانات الدراسية";}  
                                else
                                { echo "Education Information";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">



    <div class="input-field col s12">
          <input placeholder="<?php if($lang=='ar'){ echo "اسم الجامعة/الكلية";}  
                                else
                                { echo "University Name\College";} ?>" id="college_name" name="university" type="text" class="validate" required>
         
        </div>
        <div class="input-field col s12">
          <input placeholder="<?php if($lang=='ar'){ echo "التخصص";}  
                                else
                                { echo "Major";} ?>" id="major" name="major" type="text" class="validate" required>
    
        </div>

        <div class="row">
            <div class="input-field col s12 m6 l6">
                <?php $years = range(1900, strftime("%Y", time())); ?>

<select class="browser-default" id="study_start_date" name="start_date">
  <option selected disabled><?php if($lang=='ar'){ echo "تاريخ بدء الدراسة ";}  
                                else
                                { echo "Study start date";} ?></option>
  <?php foreach($years as $year) : ?>
    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
  <?php endforeach; ?>
</select>




          </div>
       
   <div class="input-field col s12 m6 l6">
         <select class="browser-default" id="study_end_date" name="end_date">
  <option selected disabled><?php if($lang=='ar'){ echo "تاريخ انتهاء الدراسة ";}  
                                else
                                { echo "Select Study end date";} ?></option>
  <?php foreach($years as $year) : ?>
    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
  <?php endforeach; ?>
</select>
  </div>
        </div>

        <div class="col-12 input-field">
                                    
                                    <select class="browser-default" name="grade" required>
      <option value="" selected><?php if($lang=='ar'){ echo "الدرجة العلمية";}  
                                else
                                { echo "Grade";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "ثانوية  ";}  
                                else
                                { echo "High School";} ?>"><?php if($lang=='ar'){ echo "ثانوية ";}  
                                else
                                { echo "High School";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "دبلوم";}  
                                else
                                { echo "Diploma";} ?>"><?php if($lang=='ar'){ echo "دبلوم";}  
                                else
                                { echo "Diploma";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "بكالوريوس ";}  
                                else
                                { echo "Bachelor";} ?>"><?php if($lang=='ar'){ echo "بكالوريوس ";}  
                                else
                                { echo "Bachelor";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "ماجستير ";}  
                                else
                                { echo "Master";} ?>"><?php if($lang=='ar'){ echo "ماجستير ";}  
                                else
                                { echo "Master";} ?></option>
    
    </select>

                                </div>

                                <div class="input-field col s12 m12 l12">
          <input placeholder="<?php if($lang=='ar'){ echo "مكان الدراسة";}  
                                else
                                { echo "Current Location";} ?>" id="current_location_education" name="current_location" type="text" required>
      
          
        </div>

                              
                            </div>

                        </div>

                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "مستوى اللغة";}  
                                else
                                { echo "Languages Information";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">

                                <div class="col-12 input-field">
                                    
                                    <select class="browser-default" name="eng_level">
      <option value="" selected><?php if($lang=='ar'){ echo "مستوى اللغة الانجليزية";}  
                                else
                                { echo "English Level";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "مبتدىء ";}  
                                else
                                { echo "Beginner";} ?>"><?php if($lang=='ar'){ echo "مبتدىء ";}  
                                else
                                { echo "Beginner";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "متوسط";}  
                                else
                                { echo "Intermediate";} ?>"><?php if($lang=='ar'){ echo "متوسط";}  
                                else
                                { echo "Intermediate";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "جيد";}  
                                else
                                { echo "Expert";} ?>"><?php if($lang=='ar'){ echo "جيد";}  
                                else
                                { echo "Expert";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "ممتاز";}  
                                else
                                { echo "Native";} ?>"><?php if($lang=='ar'){ echo "ممتاز";}  
                                else
                                { echo "Native";} ?></option>
    
    </select>

                                </div>

                                <div class="col-12 input-field">
                                    
                                    <select class="browser-default" name="arabic_level">
      <option value="" selected><?php if($lang=='ar'){ echo "مستوى اللغة العربية";}  
                      
                                else
                                { echo "English Level";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "مبتدىء ";}  
                                else
                                { echo "Beginner";} ?>"><?php if($lang=='ar'){ echo "مبتدىء ";}  
                                else
                                { echo "Beginner";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "متوسط";}  
                                else
                                { echo "Intermediate";} ?>"><?php if($lang=='ar'){ echo "متوسط";}  
                                else
                                { echo "Intermediate";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "جيد";}  
                                else
                                { echo "Expert";} ?>"><?php if($lang=='ar'){ echo "جيد";}  
                                else
                                { echo "Expert";} ?></option>
      <option value="<?php if($lang=='ar'){ echo "ممتاز";}  
                                else
                                { echo "Native";} ?>"><?php if($lang=='ar'){ echo "ممتاز";}  
                                else
                                { echo "Native";} ?></option>
    
    </select>

                                </div>




                            </div>

                        </div>

                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "الخبرات العملية";}  
                                else
                                { echo "Work Experience";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">

                                <div class="input-field col s12">
          <input placeholder=" <?php if($lang=='ar'){ echo "عدد سنوات الخبرة";}  
                                else
                                { echo "Year of Experience";} ?>"  id="year_exp" name="years_exp" min="1" type="number" class="validate">
    
        </div>

        <div class="input-field col s12">
            <input type="hidden" class="career-apply-now-emails" id="job_id" name="job_id" value="<?php echo $job_id; ?>">
                                
          <input placeholder="<?php if($lang=='ar'){ echo "فئة الوظيفة";}  
                                else
                                { echo "Job Category";} ?>"  id="job_category" name="job_category" type="text" class="validate" >
    
        </div>

        <div class="input-field col s12">
          <input placeholder="<?php if($lang=='ar'){ echo "طبيعة الوظيفة";}  
                                else
                                { echo "Job Role";} ?>"  id="job_role" name="job_role" type="text" class="validate" >
    
        </div>


                            </div>

                        </div>

                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "معلومات المرجع";}  
                                else
                                { echo "References Information";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">

                               <div class="input-field col s12">
          <input placeholder="<?php if($lang=='ar'){ echo "اسم المرجع";}  
                                else
                                { echo "Referee Name";} ?>"  id="referee_name"  name="referee_name" type="text" class="validate" required>
    
        </div>

        <div class="input-field col s12">
          <input id="referee_email" type="email" name="referee_email" class="validate" required>
          <label for="referee_email"><?php if($lang=='ar'){ echo "البريد الالكتروني للمرجع";}  
                                else
                                { echo "Referee Email";} ?></label>
    
        </div>

        <div class="input-field col s12">
          <input id="referee_mobile" type="tel" min=13 max=13 name="referee_phone" class="validate" value="+966" required>
          <label for="referee_mobile"><?php if($lang=='ar'){ echo "رقم الجوال للمرجع";}  
                                else
                                { echo "Referee Mobile";} ?></label>
    
        </div>

                            </div>

                        </div>

                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "حدثنا عن نفسك";}  
                                else
                                { echo "About Yourself";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">

                                 <div class="input-field col s12">
          <textarea placeholder="<?php if($lang=='ar'){ echo "حدثنا عن نفسك";}  
                                else
                                { echo "Information About Yourself";} ?>
                                " id="about_yourseld" name="about" class="materialize-textarea"></textarea>
    
    
        </div>
                            </div>
                        </div>

                        <div class="cpsas-section col s12 m6 l6">
                            <h3 class="cpsas-title">
                                <?php if($lang=='ar'){ echo "السيرة الذاتية";}  
                                else
                                { echo "Your CV";} ?>
                                
                            </h3>

                            <div class="cpsas-inputs-section">

                                <div class="file-field input-field">
      <div class="btn">
        <span>CV</span>
        <input type="file" id="file" name="cv" onchange="return fileValidation()">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="<?php if($lang=='ar'){ echo "المرفقات ";}  
                                else
                                { echo "PDF Your Attached CV";} ?>">
      </div>
    </div>

                    
                            </div>
                        </div>



                        <div class="cpsas-section col-md-12">
                            <button type="submit" class="hpts_e_btn cpsas-section-submit-btn col s12 m6 l6"><?php if($lang=='ar'){ echo "ارسال";}  
                                else
                                { echo "Send";} ?></button>
                            <input type="hidden" name="vacancy_id" id="emails" value="2">

                            <div class="rate-us-msg career-error-msg col s12 m6 l6">
                                <div class="message-error"></div>
                                
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>

    </section>
                  <!-- <section id="subscribe">
                       <div class="shade"></div>
                       <div class="cbbi-text-container">
                <h1>Careers Subscribe</h1>
                <h2>
                    To be subscribed to latest careers, please enter your email address
                </h2>
                <form action="#" method="POST">
                    <input type="hidden" name="_token" value="TayGAd2UI3eR66XoMBRpDmjGVvb19rRcCD0aas4W">                    
                    <div class="hplulu-btn-container cbbi-btn-container">
                        <div class="hplulub-input">
                            <div>
                                <input class="careers_subscribe_email_input" name="email" type="text">
                            </div>
                        </div>
                        <button type="submit" class="hplulub-btn arrow_btn">
                            <span>Send</span>
                        </button>
                    </div>
                </form>
            </div>
                   </section>-->
           <div>
           </div>
    
     </div>

     <script>
     	function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf|\.doc|\.docx)$/i;
    if(!allowedExtensions.exec(filePath)){
    	Swal.fire({
                                      title: dunkin,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
                                      html:
   '<p class="trans-rejected">Please upload  jpeg,jpg,png,pdf,doc,docx only.</p>',
                                      width:'690px',
                                      customClass: 'success-msg',
                                      background: '#fff',
                                      backdrop: `
                                       rgba(38, 38, 38, 0.8);
                                      `
                                    })
        
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               // document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
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
         $(document).ready(function(){
            var d = new Date();
            var n = d.getFullYear();
     
            
            $('.datepicker').datepicker({
                    selectMonths: true,
                    format: 'yyyy-mm-dd',
                    yearRange: [1900,n],
                    maxDate: d
                });
        });
               $('form').on('submit', function (e) {
            
                      e.preventDefault();
                      var id=$(this).attr("id");
                      if(id!='cv_form')
                      {
                          document.getElementById('cv_form').style.display="block";
                          document.getElementById('cps-section-title').style.display="block";
                          $('html, body').animate({
                            scrollTop: $("#cv_form").offset().top
                        }, 2000);
                      }
                      
                     var post_url = $(this).attr("action"); 
                     var formData = new FormData($(this)[0]);
                    
                      $.ajax({
                        type: 'post',
                        url: post_url,
                        data: formData,
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        beforeSend: function(){
                        $("#loaderIcon").show();
                        },
                        complete:function(data){
                            $('#loaderIcon').hide();
                            var job_id=encodeURI(formData.get('job_ids')); 
                              
                              document.getElementById('job_id').value=job_id;
                              
                        }
                        })
                        .done  (function(response, textStatus, jqXHR)        
                        { 
                           // alert(document.getElementById('job_id').value);                             
                            if(id=='cv_form')
                            {
                           //response=JSON.parse(response);
                            
                           console.log(response);
                            
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
                                               document.getElementById('cv_form').style.display="none";
                                              document.getElementById('cps-section-title').style.display="none";
                                              document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
   $('html, body').animate({
                            scrollTop: 0
                        }, 1000);

                                      } else {
                                        // handle cancel
                                      }
                                    })
                               
                            }
                            else if(response.success == "0")
                            {
                                Swal.fire({
                                  title: dunkin,
                                      showCloseButton: false,
                                      showConfirmButton:true,
                                      confirmButtonText:ok,
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
                            }
                            else
                            {
                              
                            }
                        })
                        .fail  (function(jqXHR, textStatus, errorThrown) 
                        {  
                           /* Swal.fire(
                                      errorThrown,
                                      textStatus,
                                      'error'
                                    )
                            */
                        })
                        
                                
                    });
                    
     </script>
     <style>
         label.active
         {
             transform:translateY(50px) scale(0.999) !important;
         }
     </style>
    <?php include 'footer.php';?>

