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
        $name = $_POST["email"];
        return $name;
    }

    public static function getProductSellerLoginPage(){
        return self::render('product-seller-login');
    }

    public static function loginProductSeller(){

    }
}