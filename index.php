<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="p.css">
  <title>Payment Form</title>
</head>
<body>

  <section class="wrapper">
            <div class="form ">
            <header>Payment Gateway</header>
            <p style="color: white; text-align: center; padding: 10px 0px;"><span style="color: yellow;">* </span>Please Confirm the deatils before Proceed</p>
            <form action="pay.php" method="post">
                <input type="text" name="customername" placeholder="Full name" required />
                <input type="text" name="email" placeholder="Email address" required />
                <input type="number" name="contactno" placeholder="Phone No" required />
                <input type="number" name="price" placeholder="₹ Amount" required />
                
                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" required />
                    <label for="signupCheck">Confirm to Proceed</label>
                </div>
                <div class="btn">
                    <input id="btn" type="submit" name="submit" value="Proceed" />
                </div>
            </form>
        </div>
    </section>

    <script>
    const checkbox = document.getElementById('signupCheck');
    const label = document.querySelector('label[for="signupCheck"]');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            label.style.color = 'green';
        }
        if(checkbox === null){
            alert("Null");
        }
         else {
            label.style.color = 'black';
        }
        }
    });
</script>
</body>
</html>