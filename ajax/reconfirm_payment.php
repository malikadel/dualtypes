<?php
  require_once('../init.php');
  header('Content-Type: application/json');

  # retrieve json from POST body
  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);

  $intent = null;
  try {
    if (isset($json_obj->payment_method_id)) {
      # Create the PaymentIntent
      $intent = \Stripe\PaymentIntent::create([
        'payment_method' => $json_obj->payment_method_id,
        'amount' => $json_obj->amount,
        'currency' => 'GBP',
        'confirmation_method' => 'manual',
        'confirm' => true,
      ]);
    }
    if (isset($json_obj->payment_intent_id)) {
      try{
        $intent = \Stripe\PaymentIntent::retrieve(
          $json_obj->payment_intent_id
        );
        $intent->confirm();        
      }
      catch(Exception $e)
      {
        //email_on_transaction_error($json_obj,$e->getMessage());
        echo json_encode([
          'error' => $e->getMessage()
        ]);exit;
      }

    }
    
    generatePaymentResponse($intent);
  } catch (\Stripe\Error\Base $e) {
    # Display error on client
    echo json_encode([
      'error' => $e->getMessage()
    ]);
    //email_on_transaction_error($json_obj,$e->getMessage());
    exit;
  }

  function generatePaymentResponse($intent) {

    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str);
    if (($intent->status == 'requires_action' or $intent->status == 'requires_source_action') &&
            $intent->next_action->type == 'use_stripe_sdk') {
      # Tell the client to handle the action
      echo json_encode([
        'requires_action' => true,
        'payment_intent_client_secret' => $intent->client_secret
      ]);
    } else if ($intent->status == 'succeeded') {
  
        echo json_encode(array('getcall'=>true,'success'=>true));exit;


/*      echo json_encode([
        "success" => true
      ]);*/
    } else {
      # Invalid status
      //http_response_code(500);
      //email_on_transaction_error($json_obj,'Invalid PaymentIntent status');
      echo json_encode(['error' => 'Invalid PaymentIntent status']);exit;
    }
  }


?>