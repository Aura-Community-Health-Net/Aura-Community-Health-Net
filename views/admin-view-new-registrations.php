<?php
/**
 * @var array $new_registrations ;
 */
$provider_type = $_GET["provider_type"]??"doctor";
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
    <link href="https://fonts.googleapis.com/css2?family=Elsie&family=Raleway:wght@800&family=Roboto&display=swap"
          rel="stylesheet">


    <title>New Registrations</title>
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
</header>

<div class="title">
    <h2 class="title-text">New Registrations</h2>
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
                    <span class="nav-icon"><i class="fa-solid fa-address-card"></i></i></span>
                    <span class="nav-title">New Registrations</span>
                </button>
            </li>
        </ul>

        <ul>
            <li class="list">
                <a href="#"></a>
                <button class="navbtn">
                    <span class="nav-icon"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                    <span class="nav-title">Payments</span>
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
        <form action="/admin-dashboard/new-registrations">
            <?php
            $doctor_selected = $provider_type == "doctor";
            $pharmacy_selected = $provider_type == "pharmacy";
            $product_seller_selected = $provider_type == "product-seller";
            $care_rider_selected = $provider_type == "care_rider";
            ?>

            <select name="provider_type" id="provider_type">
                <?php
                if ($doctor_selected){
                    echo "<option value='doctor' selected>Doctor</option>";
                } else {
                    echo "<option value='doctor'>Doctor</option>";
                }

                if ($pharmacy_selected){
                    echo "<option value='pharmacy' selected>Pharmacy</option>";
                } else {
                    echo "<option value='pharmacy'>Pharmacy</option>";
                }

                if ($product_seller_selected){
                    echo "<option value='product-seller' selected>Product-Seller</option>";
                } else {
                    echo "<option value='product-seller'>Product-Seller</option>";
                }

                if ($care_rider_selected){
                    echo "<option value='care-rider' selected>Care-Rider</option>";
                } else {
                    echo "<option value='care-rider'>Care Rider</option>";
                }
                ?>
            </select>

            <input type="submit">
        </form>

        <div class="reg-details">
            <?php
            foreach ($new_registrations as $registration) {
                echo "<div class='registration-card'>";
//            echo "<div>";
//            echo "<pre>";
//            echo $registration["name"];
//            echo "</pre>";
//            echo "</div>";
                if ($provider_type == "doctor"){
                    echo "<ul>";
                    echo "<li class='detail-name'> <img src='{$registration['profile_picture']}'> <div>{$registration['name']} <span>Care Rider</span> </div>  </li>";
                    echo "<br>";
                    echo "<li class='detail-name'> <div>NIC </div> <div>{$registration['provider_nic']}</div></li>";
                    echo "<li class='detail-name'> <div>Email Address</div> <div>{$registration['email_address']}</div></li>";
                    echo "<li class='detail-name'> <div>Mobile Number</div> <div>{$registration['mobile_number']}</div></li>";
                    echo "<li class='detail-name'> <div>Address</div> <div>{$registration['address']}</div></li>";
                    echo "<li class='detail-name'> <div>SLMC Reg No</div> <div>{$registration['slmc_reg_no']}</div></li>";
                    echo "<li class='detail-name'> <div>Field of study</div> <div>{$registration['field_of_study']}</div></li>";
                    echo "<li class='detail-name'> <div>Certificate of MBBS</div> <div>{$registration['certificate_of_mbbs']}</div></li>";
                    echo "<li class='detail-name'> <div>Qualifications</div> <div>{$registration['qualifications']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Account Number</div> <div>{$registration['bank_account_number']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Name</div> <div>{$registration['bank_name']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Branch Number</div> <div>{$registration['bank_branch_name']}</div></li>";
                    echo "</ul>";

                } elseif ($provider_type == "pharmacy") {
                    echo "<ul>";
                    echo "<li class='detail-name'> <img src='{$registration['profile_picture']}'> <div>{$registration['name']} <span>Pharmacy</span> </div>  </li>";

                    echo "<br>";
                    echo "<li class='detail-name'> <div>Pharmacy Name</div> <div>{$registration['pharmacy_name']}</div></li>";
                    echo "<li class='detail-name'> <div>NIC</div> <div>{$registration['provider_nic']}</div></li>";
                    echo "<li class='detail-name'> <div>Email Address</div> <div>{$registration['email_address']}</div></li>";
                    echo "<li class='detail-name'> <div>Mobile Number</div> <div>{$registration['mobile_number']}</div></li>";
                    echo "<li class='detail-name'> <div>Address</div> <div>{$registration['address']}</div></li>";
                    echo "<li class='detail-name'> <div>NMRA Certificate</div><div>{$registration['slmc_reg_no']}</div></li>";
                    echo "<li class='detail-name'> <div>Field of study</div> <div>{$registration['field_of_study']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Account Number</div> <div>{$registration['bank_account_number']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Name</div> <div>{$registration['bank_name']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Branch Number</div> <div>{$registration['bank_branch_name']}</div></li>";
                    echo "</ul>";

                } elseif ($provider_type == "product-seller") {
                    echo "<ul>";
                    echo "<li class='detail-name'> <img src='{$registration['profile_picture']}'> <div>{$registration['name']} <span>Product Seller</span> </div>  </li>";

                    echo "<br>";
                    echo "<li class='data-title'> <div> Business Name </div> <div>{$registration['business_name']}</div></li>";
                    echo "<li class='data-title'> <div>NIC</div> <div>{$registration['provider_nic']}</div> </li>";
                    echo "<li class='data-title'> <div>Email Address</div> <div>{$registration['email_address']} </div></li>";
                    echo "<li class='data-title'> <div>Mobile Number </div> <div>{$registration['mobile_number']}</div></li>";
                    echo "<li class='data-title'> <div>Address </div> <div>{$registration['address']}</div></li>";
                    echo "<li class='data-title'> <div>Bank Account Number </div> <div>{$registration['bank_account_number']}</div></li>";
                    echo "<li class='data-title'> <div>Bank Name</div> <div>{$registration['bank_name']}</div></li>";
                    echo "<li class='data-title'> <div>Bank Branch Number</div> <div>{$registration['bank_branch_name']}</div></li>";
                    echo "</ul>";

                } elseif ($provider_type == "care-rider") {
                    echo "<ul>";
                    echo "<li class='detail-name'> <img src='{$registration['profile_picture']}'> <div>{$registration['name']} <span>Care Rider</span> </div>  </li>";
                    echo "<br>";
                    echo "<li class='detail-name'> <div>NIC </div> <div>{$registration['provider_nic']}</div></li>";
                    echo "<li class='detail-name'> <div>Email Address</div> <div>{$registration['email_address']}</div></li>";
                    echo "<li class='detail-name'> <div>Mobile Number </div> <div>{$registration['mobile_number']}</div></li>";
                    echo "<li class='detail-name'> <div>Address</div> <div>{$registration['address']}</div></li>";
                    echo "<li class='detail-name'> <div>Type of Vehicle </div> <div>{$registration['type_of_vehicle']} </div></li>";
                    echo "<li class='detail-name'> <div>Number Plate</div> <div>{$registration['number_plate']}</div></li>";
                    echo "<li class='detail-name'> <div>Color</div> <div>{$registration['color']}</div></li>";
                    echo "<li class='detail-name'> <div> Type of Vehicle </div> <div>{$registration['driving_licence_number']}</div></li>";
                    echo "<li class='detail-name'> <div> Bank Account Number </div> <div>{$registration['bank_account_number']}</div></li>";
                    echo "<li class='detail-name'> <div> Bank Name </div> <div>{$registration['bank_name']}</div></li>";
                    echo "<li class='detail-name'> <div>Bank Branch Number</div> <div>{$registration['bank_branch_name']}</div></li>";
                    echo "</ul>";
                }
                echo "<form class='verify' action='/service-providers/verify?nic={$registration['provider_nic']}&provider_type=$provider_type' method='post'>
                    <button class='verify-btn'>Verify</button>
                  </form>";
                echo "</div>";

            }
            ?>
        </div>

    </main>



</div>


<div class="toggle">
    <i class="fa-solid fa-bars"></i>
</div>

<script src="/assets/javascript/components/sidebar.js"></script>

</body>

