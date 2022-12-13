<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/6fcf003f29.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elsie&family=Raleway:wght@800&family=Roboto&display=swap" rel="stylesheet">


    <title>Product Seller Login</title>
</head>
<body>
    <header class="header">
        <div class="brand">
            <div class="header-logo">
                <img class="logo" src="assets/images/logo.jpg" alt="logo">
            </div>

            <div class="header-title">
                <h2>Aura</h2>
                <h5>Community Health Net</h5>
            </div>
        </div>

    </header>

    <div class="title">
        <h2 class="title-text">Login</h2>
    </div>

    <div class="form-login">
        <img class="login-img" src="assets/images/login.jpg" alt="">

        <form class="product-seller-login-form" action="/product-seller-login" method="post">

            <div class="/form-input">
                <label class="label" for="email">Email Address</label><br>
                <input class="input" id="email" type="email" name="email" required>
                <?php
                if (isset($errors) && isset($errors["email"])){
                    echo "<p class = 'errors'> {$errors["email"]}</p>";
                }
                ?>
            </div>
            <br>

            <div class="/form-input">
                <label class="label" for="password">Password</label><br>
                <input class="input" id="password" type="password" name="password" required>
                <?php
                if (isset($errors) && isset($errors["password"])){
                    echo "<p class = 'errors'> {$errors["password"]}</p>";
                }
                ?>
            </div>
            <br>

            <div class="text-login">
                <h4 class="remember-me">Remember me</h4>
                <input type="checkbox">
                <a class="forgot-pw" href="#">Forgot Password ?</a>
<!--                <h4 class="forgot-pw">Forgot Password ?</h4>-->
            </div>
            <button class="btn login-btn">Login</button>
        </form>
    </div>










        
    </form>    


</body>

</html>
