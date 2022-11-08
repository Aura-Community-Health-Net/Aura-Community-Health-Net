<?php

require_once __DIR__.'/../vendor/autoload.php';


use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;


$app = new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/product-seller-signup', [AuthController::class, 'getProductSellerSignupPage']);
$app->router->post('/product-seller-signup', [AuthController::class, 'registerProductSeller']);
$app->router->get('/product-seller-login', [AuthController::class, 'getProductSellerLoginPage']);
$app->router->post('/product-seller-login', [AuthController::class, 'loginProductSeller']);



$app->run();


?>