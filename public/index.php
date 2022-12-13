<?php

require_once __DIR__.'/../vendor/autoload.php';


use app\controllers\MedicinesController;
use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;
use app\core\Database;
use app\controllers\DashBoardController;


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
session_start();
//$database = new Database();


$app = new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class, 'home']);

//Authentication Routes

$app->router->get('/product-seller-signup', [AuthController::class, 'getProductSellerSignupPage']);
$app->router->post('/product-seller-signup', [AuthController::class, 'registerProductSeller']);
$app->router->get('/product-seller-signup', [AuthController::class, 'getProductSellerLoginPage']);
$app->router->post('/product-seller-signup', [AuthController::class, 'loginProductSeller']);

$app->router->get('/pharmacy-signup', [AuthController::class, 'getPharmacySignupPage']);
$app->router->post('/pharmacy-signup', [AuthController::class, 'registerPharmacy']);
$app->router->get('/pharmacy-login', [AuthController::class,'getPharmacyLoginPage']);
$app->router->post('/pharmacy-login',[AuthController::class,'loginPharmacy']);

$app->router->get('/service-consumer-signup',[AuthController::class,'getServiceConsumerSignupPage']);
$app->router->post('/service-consumer-signup',[AuthController::class,'registerServiceConsumer']);
$app->router->get('/service-consumer-login',[AuthController::class,'getServiceConsumerLoginPage']);
$app->router->post('/service-consumer-login',[AuthController::class,'loginServiceConsumer']);

//DashBoard Route

$app->router->get('/pharmacy-dashboard',[DashBoardController::class,'getpharmacydashboard']);


$app->router->get('/pharmacy-dashboard/Medicine',[MedicinesController::class,'viewmedpage']);
$app->router->post('/pharmacy-dashboard/Medicine',[MedicinesController::class,'AddMed']);

//sidebar

$app->router->get('/pharmacy-dashboard/sidebar',[MedicinesController::class,'getsidepane']);

/*$app->router->post('/pharmacy-dashboard/Medicine?id="{$medicine[med_id]}"',[MedicinesController::class,'deletemed']);*/

$app->router->get('/pharmacy-dashboard/Medicine.php?id="{$medicine[med_id]}"',[MedicinesController::class,'deleteMed']);









$app->run();


?>