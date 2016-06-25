Requirements:
Symfony2.7 or greater, PHP 5.5 or greater, MySql.

Installation:
1. Please paste bundle to existing Symfony2 / Symfony3 installation.
2. Add 'new Websolutio\PaymentBundle\WebsolutioPaymentBundle(),' to AppKernel.
3. Run 'php app/console doctrine:schema:update --force' from command line or import payment.sql to your database.
4. Change Ip / Host to your one in /Controller/PaymentController.php in line 24.
5. Payment form is aviable under 'your_ip'/app_dev.php/payment/new address.

Components:
1. Entity class: /Entity/Payment.php
2. Form class: /Form/PaymentType.php - form fields definition and basic validation (via Symfony2 FormTypes).
3. Api mockup: /Controller/ApiController.php - simple json respons for testing purposes.
4. Payment Controller: /Controller/PaymentController.php
5. Basic routing and views in /Resources/config and /Resources/views

Thoughts & Security: 
1. This is example code only for development environment.
2. On production site Payment Form should use SSL protocol (https://) - this is a must.
3. Before moving this form to production the code needs some refactoring and at least adding authorization system to make data secure.


