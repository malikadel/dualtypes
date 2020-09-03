<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{

  require_once('vendor/autoload.php');
  
  //Dev Account Test keys.
  //$stripe_public_key = "pk_test_3em0UdmPQCFgObmPCOfKUTdm00vSFa4pIP";
  //$stripe_secret_key = "sk_test_LuXOLNnsQh1s8RKifEvSuD8X00VL77P49Y";
  //User Account Test keys.

  //User Account Test Keys.
  $stripe_pk = "pk_test_51HL8PeE2rm5ZVYkjzO6zfSKdfTfVIMFNGLSNuBxEwqTbHmRnPBR1mcby71i3ZAxmZC4dJFnVs7eY7Mah17J9nd2200p09hh698";
  $stripe_sk = "sk_test_51HL8PeE2rm5ZVYkjXfQSnz9jAQDIWRDns4DQ0TAD9s5r40mX0fOABoMQziWS6LIAduYnkxggreibBeSNWGRY1KLk004oX5qUjT";
  
  //User Account Live keys.
  $stripe_pk = "pk_test_51HL8PeE2rm5ZVYkjzO6zfSKdfTfVIMFNGLSNuBxEwqTbHmRnPBR1mcby71i3ZAxmZC4dJFnVs7eY7Mah17J9nd2200p09hh698";
  $stripe_sk = "sk_test_51HL8PeE2rm5ZVYkjXfQSnz9jAQDIWRDns4DQ0TAD9s5r40mX0fOABoMQziWS6LIAduYnkxggreibBeSNWGRY1KLk004oX5qUjT";





  if($_SERVER['HTTP_HOST'] == "localhost")
  {
    $ajaxpath = 'http://localhost/stevenbrasier/ajax/';  
  }
  else
  {
    $ajaxpath = 'https://stripe.maxnetix.com/ajax/';

  }
  $stripe = \Stripe\Stripe::setApiKey($stripe_sk);
  
}
catch(Throwable $t){echo "Captured Throwable: " . $t->getMessage() . PHP_EOL;}
?>
