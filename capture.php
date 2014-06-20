<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'actionType'  => 'PAY',
    'preapprovalKey' => $_SESSION['preapprovalKey'],
    'currencyCode'  => 'USD',
    'memo'  => 'Order number #123',

    'cancelUrl' => 'cancel.php',
    'returnUrl' => 'success.php',

    'receiverList' => array(
      'receiver' => array(
        array(
          'amount'  => '100.00',
          'email'  => 'info-facilitator@commercefactory.org',
          'primary'  => 'true',
        ),
        array(
          'amount'  => '90.00',
          'email'  => 'us-provider@commercefactory.org',
        )
      ),
    ),
  ), 'Pay'
);

if ($result['responseEnvelope']['ack'] == 'Success' && $result['paymentExecStatus'] == 'COMPLETED') {
  echo 'Transaction completed';
} else {
  echo 'Transaction failed';
  var_dump($result);
}
