<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public static function getProductSellerSignupPage(Request $request){
        if ($request->isPost()){
            return 'Handle submitted data';
        }
        return self::render('product-seller-signup');
    }

    public static function registerProductSeller(){
        $name = $_POST["name"];
        return $name;

        $nic = $_POST["nic"];
        return $nic;

        $email = $_POST["email"];
        return $email;

        $address = $_POST["address"];
        return $address;

        $vehicleType = $_POST["vehicleType"];
        return $vehicleType;

        $numberPlate = $_POST["numberPlate"];
        return $numberPlate;

        $color = $_POST["color"];
        return $color;

        $licenceNo = $_POST["licenceNo"];
        return $licenceNo;

        $bankNo = $_POST["bankNo"];
        return $bankNo;

        $branchName = $_POST["branchName"];
        return $branchName;

        $profilePic = $_POST["profilePic"];
        return $profilePic;

        $password = $_POST["password"];
        return $password;

        $confirmPassword = $_POST["confirmPassword"];
        return $confirmPassword;


    }

    public static function getProductSellerLoginPage(){
        return self::render('product-seller-login');
    }

    public static function loginProductSeller(){

    }
}