
<?php
session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$amount = $_POST["amount"];

$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["phone"] = $phone;
$_SESSION["amount"] = $amount;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Payment Form</title>
        <link rel="stylesheet" href="styless.css" />
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        
    </head>
    <body>
        <section class="wrapper">
            <div class="form ">
            <header>Payment Gateway</header>
            <p style="color: white; text-align: center; padding: 10px 0px;"><span style="color: yellow;">* </span>Please Confirm the deatils before Proceed</p>
            <form action="confirmation.php">
                <input type="text" name="name" placeholder="Full name" required />
                <input type="text" name="email" placeholder="Email address" required />
                <input type="number" name="phone" placeholder="Phone No" required />
                <input type="number" name="amount" placeholder="₹ Amount" required />
                
                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" />
                    <label for="signupCheck">Confirm to Proceed</label>
                </div>
                <div class="btn">
                    <input id="btn" type="submit" value="Proceed" />
                </div>
            </form>
        </div>
    </section>

</body>
</html>