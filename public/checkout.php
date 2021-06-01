<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Express Checkout(JS API)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <script src="https://paytabs.com/express/v4/paytabs-express-checkout.js"></script>
    <script type="text/javascript">
        Paytabs.initWithIframe(document.body,{
          settings: {
            secret_key: "NCqgpDmKmTcXAvKO5J6kvV7fDwhfQjnDVNUlqg6NaiKLOuzTeFeJBlZeRhuIBRlwEfS5wYSHgCs471YmHc6iy6xpn28YTtvyJnDf",
            merchant_id: "10064077",
            url_redirect: "https://dunkinsa.abstractagency.net/PWA2/public/index.php",
            amount: "50.0",
            title: "John Doe",
            currency: "SAR",
            product_names: "test test",
            order_id: "25",
            ui_type: "iframe",
            is_popup: "true",
            ui_show_header: "true"
          },
          customer_info: {
            first_name: "Ramy",
            last_name: "Sabry",
            phone_number: "123456",
            email_address: "mail@example.com",
            country_code: "966"
          },
          billing_address: {
            full_address: "Business Bay",
            city: "Juffair",
            state: "UAE",
            country: "SAU",
            postal_code: "12345"
          }
        });
    </script>
  </body>
</html>