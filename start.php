<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
      'startingDate' => date('Y-m-d\TH:i:s\Z'),
      'maxTotalAmountOfAllPayments' => '800.00',
      'currencyCode'  => 'USD',
      'memo'  => 'Preapproval of 800 USD',
      'cancelUrl' => 'cancel.php',
      'returnUrl' => 'success.php'
  ), "Preapproval"
);

if ($result['responseEnvelope']['ack'] == 'Success') {
  $_SESSION['preapprovalKey'] = $result['preapprovalKey'];
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure';
}
