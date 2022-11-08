<?php

?>

<!--<form action="/product-seller-signup" method="post">-->
<!--    <input type="email" name="email" >-->
<!--    <button>Submit</button>-->
<!--</form>-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/6fcf003f29.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>Product Seller Signup</title>
</head>
<body>
    <form class="product-seller-signup-form" action="/product-seller-signup" method="post">
        <div class="form-input">
            <input type="text" name="name" placeholder="Name">
            <i class="fas fa-user"></i>
        </div>

        <input type="text" name="nic" placeholder="NIC">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="vehicleType" placeholder="Type of Vehicle">
        <input type="text" name="numberPlate" placeholder="Number Plate">
        <input type="text" name="color" placeholder="Color">
        <input type="text" name="licenceNo" placeholder="Driving Licence Number">
        <input type="text" name="bankNo" placeholder="Bank Account Number">
        <input type="text" name="bankName" placeholder="Bank Name">
        <input type="text" name="branchName" placeholder="Bank Branch Number">
        <input type="file" name="profilePic" placeholder="Profile Picture">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirmPassword" placeholder="Confirm Password">
        <button>Submit</button>
    </form>
</body>
</html>