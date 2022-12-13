<?php

namespace app\controllers;

use app\core\Controller;
use app\utilities\Database;

class AdministratorController extends Controller
{
    public static function getNewRegistrationPage(): array|bool|string
    {
        $db = new Database();

        $provider_type = $_GET["provider_type"] ?? "doctor";

        if ($provider_type == "doctor"){
            $sql = "SELECT * FROM service_provider INNER JOIN doctor d on service_provider.provider_nic = d.provider_nic INNER JOIN doc_qualifications dq on d.provider_nic = dq.provider_nic WHERE is_verified = 0";
        } elseif ($provider_type == "pharmacy"){
            $sql = "SELECT * FROM service_provider INNER JOIN pharmacy p on service_provider.provider_nic = p.provider_nic WHERE is_verified = 0";
        } elseif ($provider_type == "product-seller"){
            $sql = "SELECT * FROM service_provider INNER JOIN `healthy_food/natural_medicine_provider` `hf/nmp` on service_provider.provider_nic = `hf/nmp`.provider_nic WHERE
                                                                                                                                                         is_verified = 0";
        } elseif ($provider_type == "care-rider"){
            $sql = "SELECT * FROM service_provider INNER JOIN care_rider cr on service_provider.provider_nic = cr.provider_nic WHERE is_verified = 0";
        }
        $result = $db->connection->query(query: $sql);
        $new_registrations = [];

        while ($row = $result->fetch_assoc()){
            $new_registrations[] = $row;
        }

        return self::render('admin-view-new-registrations', [
            "new_registrations" => $new_registrations
        ]);
    }
}

