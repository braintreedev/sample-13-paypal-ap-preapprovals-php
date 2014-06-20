<?php

require('includes/config.php');
require('includes/paypal-ap.php');

if (@!$_GET['preapprovalkey']) {
  echo 'preapprovalkey not available';
} else {

  $paypal = new PayPal($config);

  $result = $paypal->call(
    array(
      'preapprovalKey'  => $_GET['preapprovalkey'],
      'requestEnvelope'  => array(
          'errorLanguage'  => 'en_US',
    )
  ), "PreapprovalDetails");

  if ($result['responseEnvelope']['ack'] == "Success") {
    echo 'Payment completed';
  } else {
    echo 'Handle payment execution failure';
  }
}
