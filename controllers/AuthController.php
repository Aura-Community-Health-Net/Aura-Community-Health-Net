<?php

namespace app\controllers;;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\utilities\Database;

class AuthController extends Controller
{
    public static function getProductSellerSignupPage(): array|bool|string
    {
        return self::render('product-seller-signup');
    }

    public static function registerProductSeller(): array|bool|string
    {
        $businessName = $_POST["businessName"];
        $ownerName = $_POST["ownerName"];
        $nic = $_POST["nic"];
        $email = $_POST["email"];
        $mobileNumber = $_POST["mobileNumber"];
        $address = $_POST["address"];
        $regNumber = $_POST["regNumber"];
        $bankNo = $_POST["bankNo"];
        $bankName = $_POST["bankName"];
        $branchName = $_POST["branchName"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        $file = $_FILES["image"];
        $file_name = $file["name"];
        $file_tmp_name = $file["tmp_name"];

        $random_id = bin2hex(random_bytes(24));
        $new_file_name = $nic.$random_id."profile_pic".$file_name;
        move_uploaded_file($file_tmp_name, Application::$ROOT_DIR."/public/uploads/$new_file_name");

        $db = new Database();

        $errors = [];

        $sql = "SELECT * FROM service_provider WHERE email_address = '$email'";
        $result = $db->connection->query(query: $sql);
        if ($result->num_rows>0){
            $errors["email"] = "This email address already in use.";
        }

        $sql = "SELECT * FROM service_provider WHERE provider_nic = '$nic'";
        $result = $db->connection->query(query: $sql);
        if ($result->num_rows>0){
            $errors["nic"] = "This NIC already in use.";
        }

        $sql = "SELECT * FROM service_provider WHERE mobile_number = '$mobileNumber'";
        $result = $db->connection->query(query: $sql);
        if ($result->num_rows>0){
            $errors["mobileNumber"] = "This Mobile number already in use.";
        }
        $sql = "SELECT * FROM service_provider WHERE bank_account_number = '$bankNo'";$result = $db->connection->query(query: $sql);if ($result->num_rows>0){$errors["bankNo"] = "This Bank account number already in use.";}

        $sql = "SELECT * FROM `healthy_food/natural_medicine_provider`WHERE business_reg_no = '$regNumber'";
        $result = $db->connection->query(query: $sql);
        if ($result->num_rows>0){
            $errors["regNumber"] = "This Business Registration Number already in use";
        }

        if ($password != $confirmPassword){
            $errors["confirmPassword"] = "Password and Confirm Password must match.";
        }

        if (!isset($_POST["ua"])){
            $errors["ua"] = "You need to accept the user agreement";
        }

        if (empty($errors)){
            $hashedPassword = password_hash(password: $password, algo: PASSWORD_DEFAULT);
            $stmt = $db->connection->prepare("INSERT INTO service_provider (provider_nic, 
                            name, 
                            address, 
                            email_address, 
                            password, 
                            mobile_number, 
                            bank_name, 
                            bank_branch_name, 
                            profile_picture, 
                            bank_account_number, 
                            provider_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $image = "/uploads/$new_file_name";
            $type = 'product-seller';
            $stmt->bind_param("sssssisssis", $nic, $ownerName, $address, $email, $hashedPassword, $mobileNumber, $bankName, $branchName, $image, $bankNo, $type);
            $stmt->execute();



//            $sql = "INSERT INTO `healthy_food/natural_medicine_provider` (provider_nic, business_reg_no, business_name) VALUES ('$nic', '$regNumber', '$businessName')";
            $stmt = $db->connection->prepare("INSERT INTO `healthy_food/natural_medicine_provider` (provider_nic, business_reg_no, business_name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nic, $regNumber, $businessName);
            $stmt->execute();
            $result = $stmt->get_result();
            $_SESSION["nic"] =$nic;
            $_SESSION["user_type"] = "product_seller";

        } else {
            return self::render('product-seller-signup', ['errors' => $errors]);
        }
        header("location: /product-seller-dashboard");
        return "";
    }

    public static function getProductSellerLoginPage(): array|bool|string
    {
        return self::render('product-seller-login');
    }

    public static function loginProductSeller(): array|bool|string
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = new Database();
        $errors = [];

//        $sql = "SELECT * FROM service_provider WHERE email_address = '$email'";
        $stmt = $db->connection->prepare("SELECT * FROM service_provider WHERE email_address = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
//        $result = $db->connection->query(query: $sql);

        if ($result->num_rows == 1) {
            $provider = $result->fetch_assoc();

//            echo "<pre>";
//            var_dump($provider);
//            echo "</pre>";
            if ($provider["provider_type"] == 'product-seller'){
                if (password_verify($password, $provider["password"])) {
                    $_SESSION["nic"] = $provider["provider_nic"];
                    $_SESSION["user_type"] = "product_seller";
                    header("location: /product-seller-dashboard");
                    return "";
                } else {
                    $errors["password"] = "Invalid Login. Please try again";
                    return self::render('product-seller-login', ['errors' => $errors]);
                }
            }
            else{
                return "must be a product seller account";
            }

        } else {
            $errors["email"] = "Email is incorrect";
            return self::render('product-seller-login', ['errors' => $errors]);
        }
    }
}