<?php
ob_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once('init.php');
  header('Content-Type: application/json');
  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);

  try {

/*    $customer = \Stripe\Customer::create([
      'email' => $json_obj->email,
      'name'  => $json_obj->name,
      'payment_method' => $json_obj->payment_method,
      'invoice_settings' => [
        'default_payment_method' => $json_obj->payment_method,
      ],
    ]);

    $subscription = \Stripe\Subscription::create([
      'customer' => $customer->id,
      'items' => [
        [
          'plan' => $json_obj->plan_id,
        ],
      ],
      'expand' => ['latest_invoice.payment_intent'],
    ]);*/

    $pi = \Stripe\PaymentIntent::update(
      $json_obj->payment_intent_id,
      ['amount' => $json_obj->amount]
    );
    

    $merged_response = array('pi'=>$pi);
    echo json_encode($merged_response);
    return;
    
  } catch (\Stripe\Error\Base $e) {
    # Display error on client
    echo json_encode([
      'error' => $e->getMessage()
    ]);
    exit;
  }

  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);
  

  $intent = null;










?>