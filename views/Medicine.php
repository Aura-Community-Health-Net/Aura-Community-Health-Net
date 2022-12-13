<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Database;

if (isset($medicine['med_id']))
{

}


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
            <p>Medicines List</p>

        </div>
    </div>


    <table class="table1">

        <tr>
            <th>Medicine Image</th>
            <th>ID_Number</th>
            <th >Medicine Name</th>
            <th>Price(Rs.)</th>
            <th>quantity</th>
            <th>quantity unit</th>
            <th>Stock</th>
            <th>stock unit</th>
        </tr>


        <?php
        foreach ($medicines as $medicine) {
            echo"
                      <tr>
                   
                
                    <td><img class='med_img' src='{$medicine['image']}' alt=''></td>
                    <td>{$medicine['med_id']}</td>
                    <td>{$medicine['name']}</td>
                    <td>{$medicine['price']}</td>
                    <td>{$medicine['quantity']}</td>
                    <td>{$medicine['quantity_unit']}</td>
                    <td>{$medicine['stock']}</td>
                    <td>{$medicine['stock_unit']}</td>
                    
                    <td id='editx_button'><a href='Medicine.php?id='{$medicine['med_id']}'><button class='edit_button' id='edit_button'><img class='pencil' src='/assets/images/edit.png' alt=''></button> </a> </td>
                    <td id='deletex_button'><a href='Medicine.php?id='{$medicine['med_id']}'><button class='delete_button' id='delete_button'><img class='bin' src='/assets/images/bin.png' alt=''></button></a></td>

                    
                    

        </tr>";   }?>



    </table>

    <form action="/pharmacy-dashboard/Medicine" class="form3" method="post" enctype="multipart/form-data">
        <table class="table2">

            <tr>
                <th><label>Med_IMage</label></th>
                <th>ID_Number</th>
                <th >Medicine Name</th>
                <th>Price(Rs.)</th>
                <th>quantity</th>
                <th>quantity unit</th>
                <th>Stock</th>
                <th>stock unit</th>


            </tr>




            <tr>
                <td><label for="add_img">
                        <div class="med_add">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                        <!--<img src="/assets/images/plus.png" class="plus_img" >--><input type="file"  style="display: none; visibility: hidden"    id="add_img"   name="image" class="nostyle" value="<?php echo $_POST['image'] ?? ''; ?>"></label> </td>
                <td><input type="text" name="med_id"  class="nostyle" value="<?php echo $_POST['med_id'] ?? ''; ?>"></td>
                <td><input type="text" name="med_name" class="nostyle" value="<?php echo $_POST['med_name'] ?? ''; ?>"></td>
                <td><input type="number" name="price" class="nostyle" value="<?php echo $_POST['price'] ?? ''; ?>"></td>
                <td><input type="number" name="quantity"  class="nostyle" value="<?php echo $_POST['quantity'] ?? '';?>"></td>
                <td><input type="text" name="quantity_unit" class="nostyle" value="<?php echo $_POST['quantity_unit'] ?? '';?>"></td>
                <td><input type="number" name="stock" class="nostyle" value="<?php echo $_POST['stock'] ?? '';?>"></td>
                <td><input type="text" name="stock_unit" class="nostyle" value="<?php echo $_POST['stock_unit'] ?? ''; ?>"></td>


            </tr>





        </table>







        <div id = "overlay">
            <div id="modal">
                <h3>Do you really want to add this product?</h3>
                 <img class="modal_img" src="/assets/images/confirmation.jpg">
                <button class="modal_button">ok</button>
            </div>

        </div>









    </form>


    <button class="submit" id="modalbutton">

        <img  class="plusbutton" src="/assets/images/button.png">
    </button>




   <!-- <form action="/pharmacy-dashboard/DeleteMed" class="delete_form">-->

      <!--   <button class="delete_button" id="delete_button">delete</button>-->


        <div id = "overlay1">
            <div id="modal1">
                <h3>Do you really want to delete this product?</h3>
                <img class="modal1_img" src="/assets/images/confirmation.jpg">
                <button class="modal_button1">ok</button>
            </div>

        </div>


<!--
    </form>-->









</div>

<script src="/assets/JS/script.js"></script>
<script src="/assets/JS/deleteMed.js"></script>

</body>
</html>