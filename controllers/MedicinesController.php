<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Database;

class MedicinesController extends Controller{

    public static function AddMed(): array|bool|string
    {


        $med_name = $_POST["med_name"];
        $image = $_FILES["image"];
        $price = (int)$_POST["price"];
        $quantity = (int)$_POST["quantity"];
        $quantity_unit = $_POST["quantity_unit"];
        $stock = (int)$_POST["stock"];
        $stock_unit = $_POST["stock_unit"];

        $filename = $image["name"];
        $file_full_path = $image["full_path"];
        $filetype = $image["type"];
        $file_tmp_name = $image["tmp_name"];
        $file_error = $image["error"];
        $file_size = $image["size"];
        move_uploaded_file($file_tmp_name , Application::$ROOT_DIR." /public/uploads/$filename");


        $nic = $_SESSION["nic"];

        $db = new Database();




     /*   $sql = "INSERT INTO medicine(name,
                                   image, 
                     price,
                     stock,
                     provider_nic) VALUES ('$med_name' ,
                                           'https://www.google.com/url?sa=i&url=https%3A%2F%2Fpixabay.com%2Fimages%2Fsearch%2Fnature%2F&psig=AOvVaw2fBYwE8YDAH-XZ4gp68HzW&ust=1668855833687000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCPD4w8vKt_sCFQAAAAAdAAAAABAE',
                                           $price ,
                                           $stock ,
                                           $nic
                                           )";*/

        $stmt = $db->connection->prepare("INSERT INTO medicine(
                     name,
                     image, 
                     price,
                     stock,
                     quantity,
                     quantity_unit,
                     stock_unit,
                     provider_nic) VALUES (?,?,?,?,?,?,?,?)");


            $image = "/uploads/$filename";
          $stmt->bind_param("ssiiisss",$med_name, $image, $price, $stock, $quantity, $quantity_unit, $stock_unit, $nic);

          $stmt->execute();
          $result = $stmt->get_result();
          /*var_dump($result);*/

     /*   if($result)
        {
            header("location:/pharmacy-dashboard/Medicine");
        }*/

          return "";

     /*

          else{
              return "server-error";
          }
          return "";*/
        /*  return self::render('Medicines');*/

    }


    public static function viewmedpage()
    {
         $nic = $_SESSION["nic"];

        $db = new Database();
        $sql = "SELECT * FROM medicine WHERE provider_nic='$nic'";
        $result = $db->connection->query($sql);

        $medicines = [];
        while($row = $result->fetch_assoc())
        {
            $medicines[] = $row;
        }





        return self::render('Medicine',[
            "medicines" => $medicines
        ]);

    }


    public  static function getsidepane()
    {
        return self::render('/sidebar');
    }



    public static function deleteMed()
    {
       /* return self::render('/DeleteMed');*/
        $nic = $_SESSION["nic"];

       /* $med_id = $_POST["med_id"];*/

        $db = new Database();
        $sql = "DELETE  FROM medicine WHERE med_id='deletex_button'";
        $result = $db->connection->query($sql);

      /*  $medicines = [];
        while($row = $result->fetch_assoc())
        {
            $medicines[] = $row;
        }*/





   /*     return self::render('Medicine',[
            "medicines" => $medicines
        ]);*/

    }






}