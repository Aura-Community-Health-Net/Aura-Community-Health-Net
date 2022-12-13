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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elsie&family=Raleway:wght@800&family=Roboto&display=swap" rel="stylesheet">


    <title>Product Seller Signup</title>
</head>
<body>
<div>
    <header class="brand">
        <header class="header">
            <div class="header-logo">
                <img class="logo" src="assets/images/logo.jpg" alt="logo">
            </div>

            <div class="header-title">
                <h2>Aura</h2>
                <h5>Community Health Net</h5>
            </div>
        </header>
    </div>


    <div class="title">
        <h2 class="title-text">Register as Healthy Food Product Seller</h2>
    </div>

    <form id="reg-form" class="product-seller-signup-form" action="/product-seller-signup" method="post" enctype="multipart/form-data">
        <div class="form">
            <table class="table">
                <tr>
                    <td>
                        <div class="left">
                            <div class="form-input">
                                <label class="label" for="businessName">Business Name <sup >*</sup></label><br>
                                <input class="input" id="businessName" type="text" name="businessName" value="<?php echo $_POST['businessName'] ?? ''; ?>" required>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="ownerName">Owner Name <sup >*</sup></label><br>
                                <input class="input" id="ownerName" type="text" name="ownerName" value="<?php echo $_POST['ownerName'] ?? ''; ?>" required>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="nic">NIC <sup >*</sup></label><br>
                                <input class="input" id="nic" type="text" name="nic" value="<?php echo $_POST['nic'] ?? ''; ?>" required>
                                <?php
                                if (isset($errors) && isset($errors["nic"])){
                                    echo "<p class = 'errors'> {$errors["nic"]}</p>";
                                }
                                ?>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="email">Email Address <sup >*</sup></label><br>
                                <input class="input"id="email" type="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>" required>
                                <?php
                                if (isset($errors) && isset($errors["email"])){
                                    echo "<p class = 'errors'> {$errors["email"]}</p>";
                                }
                                ?>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="mobileNumber">Mobile Number <sup >*</sup></label><br>
                                <input class="input" id="mobileNumber" type="text" name="mobileNumber" value="<?php echo $_POST['mobileNumber'] ?? ''; ?>" required>
                                <?php
                                if (isset($errors) && isset($errors["mobileNumber"])){
                                    echo "<p class = 'errors'> {$errors["mobileNumber"]}</p>";
                                }
                                ?>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="address">Address <sup >*</sup></label><br>
                                <input class="input" id="address" type="text" name="address" value="<?php echo $_POST['address'] ?? ''; ?>" required>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="regNumber">Business Registration Number <sup >*</sup></label><br>
                                <input class="input" id="regNumber" type="text" name="regNumber" value="<?php echo $_POST['regNumber'] ?? ''; ?>" required>
                                <?php
                                if (isset($errors) && isset($errors["regNumber"])){
                                    echo "<p class = 'errors'> {$errors["regNumber"]}</p>";
                                }
                                ?>
                            </div>
                            <br>
                        </div>
                    </td>

                    <td>
                        <div class="right">
                            <div class="form-input">
                                <label class="label" for="bankNo">Bank Account Number <sup >*</sup></label><br>
                                <input class="input" id="bankNo" type="number" name="bankNo" value="<?php echo $_POST['bankNo'] ?? ''; ?>" required>
                                <?php
                                if (isset($errors) && isset($errors["bankNo"])){
                                    echo "<p class = 'errors'> {$errors["bankNo"]}</p>";
                                }
                                ?>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="bankName">Bank Name <sup >*</sup></label><br>
                                <input class="input" id="bankName" type="text" name="bankName" value="<?php echo $_POST['bankName'] ?? ''; ?>" required>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="branchName">Branch Name <sup >*</sup></label><br>
                                <input class="input" id="branchName" type="text" name="branchName" value="<?php echo $_POST['branchName'] ?? ''; ?>" required>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="profilePic">Profile Picture <sup >*</sup></label><br>

                                <input class="input" id="profilePic" type="file" name="image" style="display: none; visibility: hidden" accept="image/*"  required>

                                <div class="upload-img">
                                    <div class="upload-btn">
                                        <i class="fa-solid fa-plus add-icon"></i>
                                    </div>
                                    <div id="display-image"></div>
                                </div>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="password">Password <sup >*</sup></label><br>
                                <input class="input" id="password" type="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>" required>
                            </div>
                            <br>

                            <div class="form-input">
                                <label class="label" for="confirmPassword">Confirm Password <sup >*</sup></label><br>
                                <input class="input" id="confirmPassword" type="password" name="confirmPassword" value="<?php echo $_POST['confirmPassword'] ?? ''; ?>" required>
                                <?php
                                if (isset($errors) && isset($errors["confirmPassword"])){
                                    echo "<p class = 'errors'> {$errors["confirmPassword"]}</p>";
                                }
                                ?>
                            </div>
                            <br>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <div class="policy">
                <input type="checkbox" name="ua" required><p>I have read and agree the </p> <span><a href="#"> Terms and Conditions and Privacy Policy</a></span>
            </div>
            <?php
            if (isset($errors) && isset($errors["ua"])){
                echo "<p class = 'errors policy-error'> {$errors["ua"]}</p>";
            }
            ?>

            <div class="form-input">
                <button id="reg-btn" class="btn">Register</button>
            </div>
            <br>
    </form>

</div>

    <div id="overlay">
        <div id="modal">
            <h3>Your account will be verified shortly, you are only visible to people after you are verified.</h3>
            <img class="modal-img" src="/assets/images/verification.jpg" alt="">
            <button class="reg-ok-btn" id="ok-btn">Ok</button>
        </div>
    </div>

<script src="/assets/javascript/pages/signup.js"></script>
</body>
</html>
