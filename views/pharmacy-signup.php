<?php

//if(isset($errors))
//{
  //  print_r($errors["emailaddress"]);
//}
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
    <script src="https://kit.fontawesome.com/4ed005b64c.js" crossorigin="anonymous"></script>
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
            <p>Register as Pharmacy</p>

        </div>
    </div>









    <form action="/pharmacy-signup" method="post" enctype="multipart/form-data">
        <div class = "form_part">

            <div class="first">
                <div class="one">

                    <label>Pharmacy Name<sup>*</sup></label><br><input type="text"   name="pharmacyname"    class="x"   value="<?php echo $_POST['pharmacyname'] ?? '';?>"   required><br>
                    <label>Owner Name<sup>*</sup></label><br><input type="text"   name="ownername"   value="<?php echo $_POST['ownername'] ?? '';?>"    class="x"   required><br>
                    <label>NIC<sup>*</sup></label><br><input type="text"    name="nic"     class="x"     value="<?php echo $_POST['nic'] ?? '';?>"   required><br>

                    <?php if(isset($errors) && isset($errors['nic']))
                    {
                        echo "<p class='error'>{$errors["nic"]}</p>";
                    }
                    ?>

                    <label>Email Address<sup>*</sup></label><br><input type="text"   name="emailaddress"    value="<?php echo $_POST['emailaddress'] ?? '';?>"    class="x"  required><br>
                    <?php if(isset($errors) && isset($errors['emailaddress']))
                        {
                            echo "<p class='error'>{$errors["emailaddress"]}</p>";
                        }
                        ?>
                    <label>Mobile Number<sup>*</sup></label><br><input type="text"     name="mobile"    class="x"        value="<?php echo $_POST['mobile'] ?? '';?>"   required><br>
                    <label>Address<sup>*</sup></label><br><input type="text"   name="address"   class="x"   value="<?php echo $_POST['address'] ?? '';?>"  required><br>
                    <label>Pharmacist Registration No<sup>*</sup></label><br><input type="text"    name="pharmacyregno"   class="x"     value="<?php echo $_POST['pharmacyregno'] ?? '';?>"   required><br>

                    <?php if(isset($errors) && isset($errors['pharmacyregno']))
                    {
                        echo "<p class='error'>{$errors["pharmacyregno"]}</p>";
                    }
                    ?>


                </div>
                <div class="two">
                    <label for="nmra_id">NMRA Certificate<sup>*</sup></label><br><input type="file"   name="nmra"   class="y"    id="nmra_id"  value="<?php echo $_POST['nmra'] ?? '';?>"  required>  <br>


                    <div class="pls1">
                        <!--<i class="fa fa-plus-circle" aria-hidden="true"></i>-->
                        <i class="fa fa-plus" aria-hidden="true"></i>

                    </div>



                    <label>Bank Account Number<sup>*</sup></label><br><input type="number"    name="bankaccno"    value="<?php echo $_POST['bankaccno'] ?? '';?>" class="x"  required><br>
                    <label>Bank Name</label><sup>*</sup><br><input type="text"    name="bankname"     class="x"     value="<?php echo $_POST['bankname'] ?? '';?>" required><br>
                    <label>Bank Branch Name<sup>*</sup></label><br><input type="text"  name="bankbranch"   class="x"    value="<?php echo $_POST['bankbranch'] ?? '';?>" required><br>
                    <label>Profile picture<sup>*</sup></label><br><input type="file"    name="pic"  class="y"  value="<?php echo $_POST['pic'] ?? '';?>" required><br>


                    <div class="pls2">
                       <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i>-->
                        <i class="fa fa-plus" aria-hidden="true"></i>

                    </div>


                    <label>Password<sup>*</sup></label><br><input type="password"  name="password"   class="x"  value="<?php echo $_POST['password'] ?? '';?>" required><br>
                    <label>Confirm Password<sup>*</sup></label><br><input type="password"  name="confirmpassword" value="<?php echo $_POST['confirmpassword'] ?? '';?>"  class="x" required><br>
                    <?php if(isset($errors) && isset($errors['confirmpassword']))
                    {
                        echo "<p class='error'>{$errors["confirmpassword"]}</p>";
                    }
                    ?>

                </div>

            </div>



            <div class="policy">
                <input type="checkbox" name="ua" required><p>I have read and agree the </p> <span><a href="#"> Terms and Conditions and Privacy Policy</a></span>
            </div>
            <?php
            if (isset($errors) && isset($errors["ua"])){
                echo "<p class = 'errors policy-error'> {$errors["ua"]}</p>";
            }
            ?>



            <div class = "btn">
                      <button>Register</button>
            </div>

        </div>


    </form>






</div>







</body>
</html>

