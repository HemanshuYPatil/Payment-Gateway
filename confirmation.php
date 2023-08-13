<?php
session_start();

$name = $_SESSION["name"];
$email = $_SESSION["email"];
$phone = $_SESSION["phone"];
$amount = $_SESSION["amount"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmation</title>
        <link rel="stylesheet" href="styless.css">
        <script src="script.js"></script>
    </head>
    <body>
        <section class="wrapper">
            <div class="form">
            <header>Confirmation</header>

            <form method="post" action="#" >
                <input type="text" name="name"> value="<?php echo $name; ?>" readonly />
                <input type="text"name="email"  value="<?php echo $email; ?>" readonly />
                <input type="number" name="phone">  value="<?php echo $phone; ?>" readonly />
                <input type="number" name="amount">  value="<?php echo $amount; ?>" readonly />
                <div class="btn">
                    <input type="submit" onclick="pay()"  value="Pay" />
                </div>
            </form>
        </div>
    </section>
</body>
</html>