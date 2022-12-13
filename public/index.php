<?php

require_once __DIR__.'/../vendor/autoload.php';


use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;
use app\controllers\DashboardController;
use app\controllers\ProductsController;
use app\controllers\AdministratorController;
use app\controllers\ServiceProvidersController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
session_start();

$app = new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class, 'home']);

//Authentication routes
$app->router->get('/product-seller-signup', [AuthController::class, 'getProductSellerSignupPage']);
$app->router->post('/product-seller-signup', [AuthController::class, 'registerProductSeller']);

$app->router->get('/product-seller-login', [AuthController::class, 'getProductSellerLoginPage']);
$app->router->post('/product-seller-login', [AuthController::class, 'loginProductSeller']);

//Dashboard routes
$app->router->get('/product-seller-dashboard', [DashboardController::class, 'getProductSellerDashboardPage']);

//Product Controller Routes
$app->router->get('/product-seller-dashboard/categories', [ProductsController::class, 'getProductSellerChooseCategoryPage']);
$app->router->get('/product-seller-dashboard/products', [ProductsController::class, 'getProductSellerMedFruitsVegPage']);

$app->router->post('/product-seller-dashboard/products', [ProductsController::class, 'addProducts']);

$app->router->get('/admin-dashboard/new-registrations', [AdministratorController::class, 'getNewRegistrationPage']);

$app->router->post('/service-providers/verify', [ServiceProvidersController::class, 'verifyServiceProvider']);

$app->run();


?>