<?php
  require_once('../init.php');
  header('Content-Type: application/json');
  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);
  

  $intent = null;

  try {
    if (isset($json_obj->payment_method_id)) {
      $intent = \Stripe\PaymentIntent::create([
        'payment_method' => $json_obj->payment_method_id,
        'amount' => $json_obj->amount,
        'currency' => 'GBP',
        'confirmation_method' => 'manual',
        'confirm' => true,
      ]);

    }
    if (isset($json_obj->payment_intent_id)) {
      $intent = \Stripe\PaymentIntent::retrieve(
        $json_obj->payment_intent_id
      );
      $intent->confirm();
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
    # Note that if your API version is before 2019-02-11, 'requires_action'
    # appears as 'requires_source_action'.
    if (($intent->status == 'requires_action' or $intent->status == 'requires_source_action') &&
            $intent->next_action->type == 'use_stripe_sdk') {
      # Tell the client to handle the action
      echo json_encode([
        'requires_action' => true,
        'payment_intent_client_secret' => $intent->client_secret,
        'token'=> $intent->id,
        'PaymentType'=>'Authorized',
        'Amount'=>($json_obj->amount/100),
      ]);exit;

    } else if ($intent->status == 'succeeded') {

        $post = [
        'token'=> $intent->id,
        'PaymentType'=>'Approved',
        'Amount'=>($json_obj->amount/100),
        ];
        $post['getcall'] = true;
        $post['success'] = true;
        $jamount = ($json_obj->amount/100);


        $dboperationstatus = '';//save_in_db($json_obj,$intent->id);
        $post['db_op_status'] = $dboperationstatus;
        $payment_intent_id = $intent->id;
        echo json_encode($post);exit;
      } 
      else 
      {
        echo json_encode(['error' => 'Invalid PaymentIntent status']);
        exit;
      }
  }



?>


​

​
