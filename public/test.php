<?php
session_start();
$fname=$_COOKIE['first_name'];
$lname=$_COOKIE['last_name'];
$email=$_COOKIE['email'];
$phone=$_COOKIE['phone'];
$res = file_get_contents('php://input');
//print_r($res);
$products=json_decode($res);

//print_r($products);
$my_products=array();
$price=array();
$quantity=array();
$unit_price=array();
//$total=100;
 $total=$_GET['amount'];
 
 if(isset($_GET['order_id']))
 {
     $order_id=$_GET['order_id'];
 }
 else
 {
     $order_id='000';
 }
 if(isset($_GET['discount']))
 {
   $discount_amount=$_GET['discount'];
   if($discount_amount==null)
   {
       $discount_amount=0;
   }
 }
 else
 {
     $discount_amount="";
 }
 if(isset($_GET['shipping_charges']))
 {
   $shipping_charges=$_GET['shipping_charges'];
 }
 else
 {
     $shipping_charges="0.00";
 }
foreach($products as $pro)
{
   $pro->product_name;
   $my_products[]=$pro->product_name;
   $price[]=$pro->product_price;
   $quantity[]=$pro->quantity;
   $unit_price[]=$pro->product_price/$pro->quantity;
}
//print_r($my_products);
    $products_name = implode(' || ',$my_products);
    //echo $products_name;
    $product_price = implode(' || ',$price);
    //echo $product_price;
    $product_quantity = implode(' || ',$quantity);
   // echo $product_quantity;
    $product_unit = implode(' || ',$unit_price);
    //echo $product_unit;
 
// echo $product=$my_products.join("||");

//print_r($product);
/*
 * Trying to create a pay page
 */

require_once 'paytabs.php';
 
$pt = new paytabs("mjehad@dunkindonuts.sa", "NCqgpDmKmTcXAvKO5J6kvV7fDwhfQjnDVNUlqg6NaiKLOuzTeFeJBlZeRhuIBRlwEfS5wYSHgCs471YmHc6iy6xpn28YTtvyJnDf");


//$result = $pt->authentication();

$result = $pt->create_pay_page(array(
    //Customer's Personal Information
    'merchant_email' => "mjehad@dunkindonuts.sa",
	'secret_key' => "NCqgpDmKmTcXAvKO5J6kvV7fDwhfQjnDVNUlqg6NaiKLOuzTeFeJBlZeRhuIBRlwEfS5wYSHgCs471YmHc6iy6xpn28YTtvyJnDf",
    'cc_first_name' => $fname,          //This will be prefilled as Credit Card First Name
    'cc_last_name' => $lname,            //This will be prefilled as Credit Card Last Name
    'cc_phone_number' => "00966",
    'phone_number' => $phone,
    'email' => $email,
  
    
    //Customer's Billing Address (All fields are mandatory)
    //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected. 
    //For other countries, the state can be a string of up to 32 characters.
    'billing_address' => "Riyadh",
    'city' => "Riyadh",
    'state' => "UAE",
    'postal_code' => "00966",
    'country' => "SAU",
    
    //Customer's Shipping Address (All fields are mandatory)
    'address_shipping' => "Street No 2",
    'city_shipping' => "Riyadh",
    'state_shipping' => "Riyadh",
    'postal_code_shipping' => "00966",
    'country_shipping' => "SAU",
   
   //Product Information
  /*
    "products_per_title" => $products_name,   //Product title of the product. If multiple products then add “||” separator
    'quantity' => $product_quantity,                                    //Quantity of products. If multiple products then add “||” separator
    'unit_price' => $product_unit,                                  //Unit price of the product. If multiple products then add “||” separator.
    "other_charges" => "00.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
    
    'amount' => $total,                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
    'discount'=>"0",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
    'currency' => "SAR",                                            //Currency of the amount stated. 3 character ISO currency code 
   */
   /*
   "products_per_title" => $products_name,   //Product title of the product. If multiple products then add “||” separator
    'quantity' => $product_quantity,                                    //Quantity of products. If multiple products then add “||” separator
    'unit_price' => $product_unit,                                  //Unit price of the product. If multiple products then add “||” separator.
    "other_charges" => "0.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
    
    'amount' => $total,                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
    'discount'=>$discount_amount,                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
    'currency' => "SAR",     
    */
    
    "products_per_title" => $products_name,   //Product title of the product. If multiple products then add “||” separator
    'quantity' => $product_quantity,                                    //Quantity of products. If multiple products then add “||” separator
    'unit_price' => $product_unit,                                  //Unit price of the product. If multiple products then add “||” separator.
    "other_charges" => $shipping_charges,                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
    
    'amount' => $total+$shipping_charges,                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
    'discount'=>$discount_amount,                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
    'currency' => "SAR",          
    
    //Invoice Information
    'title' => $fname,               // Customer's Name on the invoice
    "msg_lang" => "en",                 //Language of the PayPage to be created. Invalid or blank entries will default to English.(Englsh/Arabic)
    "reference_no" => $order_id,        //Invoice reference number in your system
   
    
    //Website Information
    "site_url" => "http://www.dunkindonuts.sa",      //The requesting website be exactly the same as the website/URL associated with your PayTabs Merchant Account
    'return_url' => "https://dunkinsa.abstractagency.net/PWA2/public/order_summary.php",
    "cms_with_version" => "API USING PHP",

    "paypage_info" => "1"
));
echo json_encode($result);
/*
echo '<script type="text/javascript">
         window.location = "'.$result->payment_url.'"   </script>'; */
// $_SESSION['paytabs_api_key'] = $result->secret_key;

?>