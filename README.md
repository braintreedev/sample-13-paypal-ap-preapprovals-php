<h2>This repo is on a path to being archived, checkout our other resources in github.com/paypal</h2>


# Using the PayPal Adaptive Payment API in PHP to make a Pre-Approval payment

This is an example of the PayPal Adaptive Payment API in PHP to make a Pre-Approval payment.

This code does not use an SDK although it uses a basic wrapper to handle the NVP API. You can use [this library](https://github.com/commercefactory/paypal-adaptive-payments-wrapper-php) as a drop in for your project.

## Technology

This demo uses

* PHP

## Running the demo

* Clone this repo `git clone https://github.com/commercefactory/paypal-adaptive-payments-preapprovals-php.git`
* Change into the folder `cd paypal-adaptive-payments-preapprovals-php`
* Initialise the submodule `git submodule init`
* Update the submodule `git submodule update`
* Run `php -S 127.0.0.1:8080` to start the app (requires PHP 5.4 or above) or load it in your web server of choice.
* Visit `http://127.0.0.1:8080/` in your browser
* Click the __"Make a payment"__ link
* You will be redirected to PayPal
* Login using the following credentials:
  * Username: `us-customer@commercefactory.org`
  * Password: `test1234`
* Complete the payment instructions
* You will receive a message that says __"Pre-approval accepted"__
* Now click the link to actually capture the payment
* You will receive a message that says __"Transaction completed"__

## Running the test

* Requirements:
  * [Firefox](http://getfirefox.com) with the [Selenium IDE](http://seleniumhq.org/projects/ide/plugins.html)
  * PHP 5.4
* Start the app by running `php -S 127.0.0.1:8080`
* Load the [test script](tests/payment.html) in the Selenium IDE and run the script. Note if you are running the webserver of your choice you will need to change the base url in the test script to match.

## Useful link

* [List of methods available on the Adaptive Payments API](https://developer.paypal.com/docs/classic/api/#ap)
