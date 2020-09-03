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

    $customer = \Stripe\Customer::create([
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
    ]);
    $merged_response = array('customer'=>$customer,'subscription'=>$subscription);
    //stripe_payment_callback($merged_response);
    $dumping_array = json_encode($merged_response);
    //stripe_payment_callback($dumping_array);
    echo json_encode(array('status'=>$subscription->status,'pi'=>$subscription->latest_invoice->payment_intent->id,'client_secret'=>$subscription->latest_invoice->payment_intent->client_secret, 'pm'=>$json_obj->payment_method));
    exit;

    
  } catch (\Stripe\Error\Base $e) {
    # Display error on client
    echo json_encode([
      'error' => $e->getMessage()
    ]);
    exit;
  }






?>