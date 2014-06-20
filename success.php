<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'preapprovalKey'  => $_SESSION['preapprovalKey'],
  ), "PreapprovalDetails"
);

if ($result['responseEnvelope']['ack'] == "Success") {
  echo 'Payment completed';
} else {
  echo 'Handle payment execution failure';
}
