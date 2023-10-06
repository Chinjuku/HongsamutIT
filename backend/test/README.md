# Prebuilt checkout page with subscriptions

Explore a full, working code sample of an integration with Stripe Checkout and the customer portal. The client- and server-side code redirects to a prebuilt payment page hosted on Stripe. Included are some basic build and run scripts you can use to start up the application.

## Running the sample

1. Build the server

~~~
composer install
~~~

2. Run the server

~~~
php -S 127.0.0.1:4242 --docroot=public
~~~

3. Go to [http://localhost:4242/checkout.html](http://localhost:4242/checkout.html)