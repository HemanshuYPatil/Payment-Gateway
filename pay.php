<?php


require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
// Create the Razorpay Order
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);
//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$price = $_POST['price'];
$_SESSION['price'] = $price;
$customername = $_POST['customername'];
$email = $_POST['email'];
$_SESSION['email'] = $email;
$contactno = $_POST['contactno'];
$orderData = [
'receipt'         => 3456,
'amount'          => $price * 100, // 2000 rupees in paise
'currency'        => 'INR',
'payment_capture' => 1 // auto capture
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];
if ($displayCurrency !== 'INR')
{
$url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
$exchange = json_decode(file_get_contents($url), true);
$displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$data = [
"key"               => $keyId,
"amount"            => $amount,
"name"              => "Travelling Website",
"description"       => "",
"image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
"prefill"           => [
"name"              => $customername,
"email"             => $email,
"contact"           => $contactno,
],
"notes"             => [
"address"           => "Hello World",
"merchant_order_id" => "12312321",
],
"theme"             => [
"color"             => "#F37254"
],
"order_id"          => $razorpayOrderId,
];
if ($displayCurrency !== 'INR')
{
$data['display_currency']  = $displayCurrency;
$data['display_amount']    = $displayAmount;
}
$json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <title>Confirmation</title>
  </head>
  <body>
   <section class="wrapper">
      <div class="form">
      <header>Confirmation</header>
      <form method="post" action="verify.php">
        <input type="text" name="name" value="<?php echo $customername; ?>" readonly />
        <input type="text" name="email" value="<?php echo $email; ?>" readonly />
        <input type="number" name="phone" value="<?php echo $contactno; ?>" readonly />
        <input type="number" name="amount" value="<?php echo $price; ?>" readonly />
        <div class="btn">
          <input type="button" onclick="payWithRazorpay()" value="Payment" style="cursor: pointer;" />
        </div>
      </form>
    </div>
  </section>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <script>
  function payWithRazorpay() {
  var options = {
  key: "<?php echo $data['key']?>",
  amount: "<?php echo $data['amount']?>",
  currency: "INR",
  name: "<?php echo $data['name']?>",
  image: "<?php echo $data['image']?>",
  description: "<?php echo $data['description']?>",
  prefill: {
  name: "<?php echo $data['prefill']['name']?>",
  email: "<?php echo $data['prefill']['email']?>",
  contact: "<?php echo $data['prefill']['contact']?>"
  },
  notes: {
  shopping_order_id: "3456"
  },
  order_id: "<?php echo $data['order_id']?>",
  <?php if ($displayCurrency !== 'INR') { ?>
  display_amount: "<?php echo $data['display_amount']?>",
  display_currency: "<?php echo $data['display_currency']?>"
  <?php } ?>
  };
  var rzp = new Razorpay(options);
  rzp.open();
  }
  </script>
</body>
</html>