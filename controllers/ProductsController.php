<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\utilities\Database;

class ProductsController extends Controller
{
    public static function getProductSellerChooseCategoryPage(): array|bool|string
    {
        $nic = $_SESSION["nic"];
        if (!$nic){
            header("location: /product-seller-login");
            return "";
        } else {
            $db = new Database();

            $stmt = $db->connection->prepare("SELECT * FROM service_provider WHERE provider_nic = ?");
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $result = $stmt->get_result();
            $product_seller = $result->fetch_assoc();
        }
        return self::render('product-seller-choose-category', [
            "product_seller" => $product_seller
        ]);
    }

    public static function getProductSellerMedFruitsVegPage(): array|bool|string
    {
        $nic = $_SESSION["nic"];
        if (!$nic){
            header("location: /product-seller-login");
            return "";
        } else {
            $category_id = $_GET["category"];
            $db = new Database();

//        $sql = "SELECT * FROM product WHERE category_id = $category_id";
            $stmt = $db->connection->prepare("SELECT * FROM product WHERE category_id = ? AND provider_nic = ?");
            $stmt->bind_param("is", $category_id, $nic);
            $stmt->execute();
            $result = $stmt->get_result();
//        $result = $db->connection->query(query: $sql);
            $products = [];

            while ($row = $result->fetch_assoc()){
                $products[] = $row;
            }

            $stmt = $db->connection->prepare("SELECT category_name FROM product_category WHERE category_id = ?");
            $stmt->bind_param("i", $category_id);
            $stmt->execute();
            $result = $stmt->get_result();
//        $result = $db->connection->query(query: $sql);

            $row = $result->fetch_assoc();

            $stmt = $db->connection->prepare("SELECT * FROM service_provider WHERE provider_nic = ?");
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $result = $stmt->get_result();
            $product_seller = $result->fetch_assoc();

            return self::render('product-seller-products', [
                "products" => $products, "title" => $row["category_name"], "category" => $category_id, "product_seller" => $product_seller
            ]);
        }
    }

    public static function addProducts(): string
    {
        $product_name = $_POST["name"];
        $quantity = (int)$_POST["quantity"];
        $quantity_unit = $_POST["quantity_unit"];
        $price = (int) $_POST["price"]*100;
        $category = (int) $_GET["category"];
        if ($category != 5){
            $stock = (int)$_POST["stock"];
            $stock_unit = $_POST["stock_unit"];
        }
        $file = $_FILES["image"];
        $file_name = $file["name"];
        $file_full_path = $file["full_path"];
        $file_type = $file["type"];
        $file_tmp_name = $file["tmp_name"];
        $file_error = $file["error"];
        $file_size = $file["size"];
        $nic = $_SESSION["nic"];

        $random_id = bin2hex(random_bytes(24));
        $new_file_name = $nic.$random_id."products".$file_name;
        move_uploaded_file($file_tmp_name, Application::$ROOT_DIR."/public/uploads/$new_file_name");

        $db = new Database();

        $stmt = $db->connection->prepare("INSERT INTO product (
                     image,
                     name, 
                     quantity,
                     quantity_unit,
                     price, 
                     stock,
                     stock_unit,
                     provider_nic, 
                     category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $image = "/uploads/$new_file_name";
        $stmt->bind_param("ssisiissi", $image,$product_name, $quantity, $quantity_unit, $price, $stock, $stock_unit, $nic, $category);
        $result = $stmt->execute();
        header("location: /product-seller-dashboard/products?category=$category");
        return "";
    }

}