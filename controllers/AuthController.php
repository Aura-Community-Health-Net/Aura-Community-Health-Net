<?php

namespace app\controllers;





use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Database;
use http\QueryString;


class AuthController extends Controller
{
    public static function getProductSellerSignupPage(Request $request): array|bool|string
    {
        if ($request->isPost()){
            return 'Handle submitted data';
        }
        return self::render('product-seller-signup');
    }

    public static function registerProductSeller(){


    }

    public static function getProductSellerLoginPage(): array|bool|string
    {
        return self::render('product-seller-login');
    }

    public static function loginProductSeller(){
         
    }







    public  static function getPharmacySignupPage(Request $request)
    {


        return self::render('pharmacy-signup');
    }


    public static function registerPharmacy()
    {
        $pharmacyname = $_POST["pharmacyname"];
        $ownername = $_POST["ownername"];
        $nic = $_POST["nic"];
        $emailaddress = $_POST["emailaddress"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];
        $pharmacyregno = $_POST["pharmacyregno"];
        $nmra = $_FILES["nmra"];
        $bankaccno = $_POST["bankaccno"];
        $bankname = $_POST["bankname"];
        $bankbranch = $_POST["bankbranch"];
        $picfile = $_FILES["pic"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

       /* echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";*/

       /* return "";*/

        $file1_name = $picfile["name"];
        $file1_full_path = $picfile["full_path"];
        $file1_type = $picfile["type"];
        $file1_tmp_name = $picfile["tmp_name"];
        $file1_error = $picfile["error"];
        $file1_size = $picfile["size"];
        move_uploaded_file($file1_tmp_name , Application::$ROOT_DIR." /public/uploads/files/$file1_name");


        $file2_name = $nmra["name"];
        $file2_full_path = $nmra["full_path"];
        $file2_type = $nmra["type"];
        $file2_tmp_name = $nmra["tmp_name"];
        $file2_error = $nmra["error"];
        $file2_size = $nmra["size"];
        move_uploaded_file($file2_tmp_name , Application::$ROOT_DIR." /public/uploads/files/$file2_name");





        $db = new Database();
        $errors = [];
        $sql = "SELECT * FROM `service_provider` WHERE email_address = '$emailaddress' ";
        $result = $db->connection->query($sql);


        if ($result->num_rows > 0) {


            $errors["emailaddress"] = "Email already exists";

        }

        if ($result->num_rows > 0) {


            $errors["address"] = "Address already exists";

        }

        if ($result->num_rows > 0) {


            $errors["pharmacyregno"] = "pharmacy reg number already exists";

        }

        if ($result->num_rows > 0) {


            $errors["mobile"] = "Mobile number already exists";

        }

        if ($result->num_rows > 0) {


            $errors["bankaccno"] = "Bank account number already exists";

        }


        if ($password != $confirmpassword) {
            $errors["confirmpassword"] = "password and confirm password isn't match ";
        }


        if (!isset($_POST["ua"])) {
            $errors["ua"] = "You need to accept the user agreement";
        }


        if (empty($errors)) {
            $hashedPassword = password_hash(password: $password, algo: PASSWORD_DEFAULT);

            $result= $db->connection->prepare("INSERT INTO service_provider(
                             provider_nic,
                             name,
                             address,
                             email_address,
                             password,
                             mobile_number,
                             bank_name,
                             bank_branch_name,
                             profile_picture,
                             bank_account_number,
                             provider_type) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

            $picfile = "/uploads/files/$file1_name";
            $provider_type = "pharmacy";

            $result->bind_param("sssssssssis",$nic,$pharmacyname,$address,$emailaddress,$hashedPassword,$mobile,$bankname,$bankbranch,$picfile,$bankaccno,$provider_type);
            $result->execute();
            $RESULT = $result->get_result();



            $result = $db->connection->prepare("INSERT INTO pharmacy(
                     provider_nic,
                     pharmacist_reg_no,
                     pharmacy_name,
                     nmra_certificate) VALUES (?,?,?,?)");

            $nmra = "/uploads/files/$file2_name";

            $result->bind_param("ssss",$nic,$pharmacyregno,$pharmacyname,$nmra);
            $result->execute();
            $RESULT = $result->get_result();






























        } else {
            return self::render('pharmacy-signup', ['errors' => $errors]);
        }

        //header("location: /pharmacy-dashboard");
        //return "";
        //echo $result->num_rows;

        /* print_r($result->fetch_assoc());
         print_r($result->fetch_assoc());
         print_r($result->fetch_assoc());
         print_r($result->fetch_assoc());
         print_r($result->fetch_assoc());
        print_r($result->fetch_assoc());*/

    }


    public static function  getPharmacyLoginPage()
    {
        return self::render('pharmacy-login');
    }

    public static function loginPharmacy()
    {

        $emailaddress = $_POST['emailaddress'];
        $password = $_POST['password'];
        //var_dump($emailaddress);
        //var_dump($password);

        $db = new Database();
        $errors = [];
        $sql = "SELECT * FROM `service_provider` WHERE email_address = '$emailaddress' ";
        $result = $db->connection->query($sql);


        if($result->num_rows == 1)
        {
            $provider = $result->fetch_assoc();

            if($provider['provider_type']== "pharmacy")//
                //var_dump($provider);
            {
                if(password_verify($password,$provider["password"]))
                {
                    /*echo "ok";*/
                    $_SESSION['nic'] = $provider['provider_nic'];
                    header("location: /pharmacy-dashboard");
                    return "";
                }

                else {
                    $errors["password"] = "Incorrect Password";
                    return self::render('pharmacy-login',['errors' => $errors]);

                }

            }

            else
            {
                return "must be a pharmacy";
            }



        }


        else{
            $errors["emailaddress"] = "incorrect email";
            return self::render('pharmacy-login',['errors'=>$errors]);
        }







    }










    public static function  getServiceConsumerLoginPage()
    {
        return self::render('service-consumer-login');
    }








}

