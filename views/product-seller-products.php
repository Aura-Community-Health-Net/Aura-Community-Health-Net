<?php
/**
 * @var array $products
 * @var string $title
 * @var string $category
 * @var array $product_seller
 *
 */
$stock = $_POST["stock"]??"";
$stock_unit = $_POST["stock_unit"]??"";
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

    <title><?php echo $title ?></title>
</head>
<body class="of-hidden">
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
        <h2 class="title-text"><?php echo $title ?></h2>
    </div>

    <div class="dashboard-container">
        <nav class="navigation">
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
        </nav>

        <main class="dashboard-content">
            <table class="products-table">
                <tr>
                    <th>Produce Image</th>
                    <th>ID Number</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price (Rs.)</th>
                    <?php if($category != 5){
                        echo '<th>Stock</th>';
                    }?>
                    <th id="actions">Actions</th>
                </tr>

                <?php
                foreach ($products as $product) {
                    $price = (int) $product["price"]/100;
                    echo "<tr>
       
        <td id='image-block'>
        <img src='{$product["image"]}' alt='' class='products-img'>
        </td>
        <td>{$product['product_id']}</td>
        <td>{$product['name']}</td>
        <td>{$product['quantity']} {$product['quantity_unit']} </td> 
        <td>{$price}</td>
        <td>{$product['stock']} {$product['stock_unit']}</td>
        <td id='action-block'><button class='action-btn action-btn--edit'><i class='fa-solid fa-pen'></i></button> <button class='action-btn action-btn--delete'><i class='fa-solid fa-trash'></i></button></td>
    </tr>";
                }

                ?>
            </table>

            <form class="products-form" id="add-product-form" action="/product-seller-dashboard/products?category=<?php echo $category ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th><label for="image">Product Image</label></th>
                        <th><label class="products-label" for="name">Product Name</label></th>
                        <th><label class="products-label" for="quantity">Quantity</label></th>
                        <th><label class="products-label" for="quantity_unit">Quantity Unit</label> </th>
                        <th><label class="products-label" for="price">Price (Rs.)</label></th>
                        <?php if($category != 5){
                            echo '<th><label class="products-label" for="stock">Stock</label></th>';
                        }?>
                        <?php if($category != 5){
                            echo '<th><label class="products-label" for="stock_unit">Stock Unit</label> </th>';
                        }?>

                    </tr>

                    <tr>
                        <td><input type="file" id="image" name="image" style="display: none; visibility: hidden" accept="image/*" required>
                            <div class="upload-img">
                                <div class="upload-btn">
                                    <i class="fa-solid fa-plus add-icon"></i>
                                </div>
                            </div>
                        </td>

                        <td><input type="text" id="name" name="name" value="<?php echo $_POST['name'] ?? ''; ?>" required></td>
                        <td><input type="number" id="quantity" name="quantity" value="<?php echo $_POST['quantity'] ?? ''; ?>" required></td>
                        <td><input type="text" id="quantity_unit" name="quantity_unit" value="<?php echo $_POST['quantity_unit'] ?? ''; ?>" required></td>
                        <td><input type="number" id="price" name="price" value="<?php echo $_POST['price'] ?? ''; ?>" required></td>
                        <?php if($category != 5){
                            echo "<td><input type='number' id='stock' name='stock' value='$stock' required></td>";
                        }?>

                        <?php if($category != 5){
                            echo "<td><input type='text' id='stock_unit' name='stock_unit' value='$stock_unit' required></td>";
                        }?>
                    </tr>
                </table>
                <!--    <label for="image">Product Image</label>-->
                <!--    <input type="file" id="image" name="image">-->
                <!---->
                <!--    <label for="name">Product Name</label>-->
                <!--    <input type="text" id="name" name="name">-->
                <!---->
                <!--    <label for="weight">Weight</label>-->
                <!--    <input type="number" id="weight" name="weight">-->
                <!---->
                <!--    <label for="price">Price</label>-->
                <!--    <input type="number" id="price" name="price">-->
                <!---->
                <!--    <label for="stock">Stock</label>-->
                <!--    <input type="number" id="stock" name="stock">-->

                <button id="add-product-btn" type="button"><i class="fa-solid fa-plus"></i></button>
            </form>

        </main>
</div>

    <div class="toggle">
        <i class="fa-solid fa-bars"></i>
    </div>






<div id="overlay">
    <div id="modal">
        <h3>Do you really want to add this Product?</h3>
        <img class="modal-img" src="/assets/images/confirmation.jpg" alt="">
        <div class="form-btn">
            <button class="cancel-btn">Cancel</button>
            <button class="ok-btn" id="ok-btn">Ok</button>
        </div>
    </div>
</div>

<script src="/assets/javascript/pages/products.js"></script>
<script src="/assets/javascript/components/sidebar.js"></script>

</body>

