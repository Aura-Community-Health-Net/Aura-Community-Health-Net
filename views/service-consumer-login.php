<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elsie&family=Raleway:wght@800&family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elsie&family=Raleway&display=swap" rel="stylesheet">


    <title>Document</title>
</head>
<body>
<div class = "wrapper">

    <div class = "title">
        <div class="logo">
            <img src="/assets/images/logo.jpg" alt="">


        </div>

        <div class="header">

            <h3>Aura</h3>
            <h6>Community Health Net</h6>
        </div>

    </div>
    <div class="middle">
        <div class="box">
            <p>Login</p>

        </div>
    </div>









    <div class="formpart">

        <div class="img">
            <img src="/assets/images/pic.png">
        </div>

        <div class="form">

            <form action="/service-consumer-login" method="post">

                <div class="f1"> <label>Email</label><br><input type="text" class="x" name="emailaddress"></div>
                <?php if(isset($errors) && isset($errors['emailaddress']))
                {
                    echo "<p class='error'>{$errors["emailaddress"]}</p>";
                }
                ?>
                <br>

                <div class="f2"> <label>Password</label><br><input type="password" class="x" name="password"></div>
                <?php if(isset($errors) && isset($errors['password']))
                {
                    echo "<p class='error'>{$errors["password"]}</p>";
                }
                ?>
                <br>


                <div class="b">
                    <div class="b1">
                        <label>Remember me</label><input type="checkbox">
                    </div>
                    <div class="link">
                        <a href="">Forgot Password</a>
                    </div>
                </div>
                <br>
                <br>

                <div class="btn1">
                    <button >Log in</button>
                </div>


            </form>
        </div>
    </div>
</div>
</body>
</html>



