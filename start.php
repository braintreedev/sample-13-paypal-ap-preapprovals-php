<?php
require('includes/config.php');
require('includes/paypal-ap.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
      'startingDate' => date('Y-m-d\TH:i:s\Z'),
      'maxTotalAmountOfAllPayments' => '800.00',
      'currencyCode'  => 'USD',
      'memo'  => 'Example',
      'requestEnvelope' => array(
        'errorLanguage' => 'en_US',
      ),
  ), "Preapproval");

if ($result['responseEnvelope']['ack'] == 'Success') {
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure <br>';
}
