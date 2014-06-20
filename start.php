<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
      'startingDate' => date('Y-m-d\TH:i:s\Z'),
      'maxTotalAmountOfAllPayments' => '100.00',
      'currencyCode'  => 'USD',
      'memo'  => 'Preapproval of 100 USD',
      'cancelUrl' => 'cancel.php',
      'returnUrl' => 'confirm.php'
  ), "Preapproval"
);

if ($result['responseEnvelope']['ack'] == 'Success' ) {
  $_SESSION['preapprovalKey'] = $result['preapprovalKey'];
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure';
}
