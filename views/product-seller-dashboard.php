<?php
/**
 *@var array $product_seller
 */
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


    <title>Product Seller Dashboard</title>
</head>
<body>
<header class="header">
    <div class="brand">

        <div class="header-logo">
            <img class="logo" src="/assets/images/logo.jpg" alt="logo">
        </div>

        <div class="header-title">
            <h2>Aura</h2>
            <h5>Community Health Net</h5>
        </div>
    </div>
    <div class="header-profile">
        <p><?php echo $product_seller["name"]; ?></p>
        <img src="<?php echo $product_seller['profile_picture']?>" alt="">
    </div>
</header>

<div class="title">
    <h2 class="title-text">Dashboard - Product Seller</h2>
</div>

<div class="dashboard-container">
    <div class="navigation">
        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn active">
                    <span class="nav-icon"><i class="fa-solid fa-gauge"></i></span>
                    <span class="nav-title">Dashboard</span>
                </button>

            </li>
        </ul>

        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn">
                    <span class="nav-icon"><i class="fa-solid fa-circle-plus"></i></span>
                    <span class="nav-title">Products</span>
                </button>
            </li>
        </ul>

        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn">
                    <span class="nav-icon"><i class="fa-regular fa-rectangle-list"></i></span>
                    <span class="nav-title">New Orders</span>
                </button>
            </li>
        </ul>

        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn">
                    <span class="nav-icon"><i class="fa-solid fa-chart-line"></i></span>
                    <span class="nav-title">Analytics</span>
                </button>
            </li>
        </ul>

        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn">
                    <span class="nav-icon"><i class="fa-solid fa-clipboard-list"></i></i></span>
                    <span class="nav-title">Feedback</span>
                </button>
            </li>
        </ul>

        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn">
                    <span class="nav-icon"><i class="fa-solid fa-user"></i></span>
                    <span class="nav-title">Profile</span>
                </button>
            </li>
        </ul>
    </div>
</div>



<div class="toggle">
    <i class="fa-solid fa-bars"></i>
</div>

<script src="/assets/javascript/components/sidebar.js"></script>

</body>