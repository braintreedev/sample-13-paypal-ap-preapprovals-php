<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'preapprovalKey'  => $_SESSION['preapprovalKey'],
  ), 'PreapprovalDetails'
);
if ($result['responseEnvelope']['ack'] == 'Success' && $result['approved']) {
?>
  <h1>Pre-approval accepted</h1>
  <a href='capture.php'>Capture the payment</a>
<?php
} else {
  echo 'Handle payment execution failure';
}
