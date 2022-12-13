<?php

namespace app\controllers;

use app\core\Controller;
use app\utilities\Database;

class DashboardController extends Controller
{
    public static function getProductSellerDashboardPage(): array|bool|string
    {
        $nic = $_SESSION["nic"];
        if(!$nic){
            header("location: /product-seller-login");
            return "";
        } else {
            $db = new Database();
            $stmt = $db->connection->prepare("SELECT * FROM service_provider WHERE provider_nic = ?");
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $result = $stmt->get_result();
            $product_seller = $result->fetch_assoc();

            return self::render('product-seller-dashboard', [
                "product_seller" => $product_seller
            ]);
        }

    }
}

