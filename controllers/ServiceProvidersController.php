<?php

namespace app\controllers;

use app\core\Controller;
use app\utilities\Database;

class ServiceProvidersController extends Controller
{
    public static function verifyServiceProvider(): string
    {
        $nic = $_GET["nic"];
        $provider_type = $_GET["provider_type"];

        $db = new Database();
        $stmt = $db->connection->prepare("UPDATE service_provider SET is_verified = 1 WHERE provider_nic = ?");
        $stmt->bind_param("s", $nic);
        $stmt->execute();

        header("location: /admin-dashboard/new-registrations?provider_type=$provider_type");
        var_dump($_GET);
        return "";
    }
}