<?php

namespace app\utilities;

use mysqli;

class Database
{

  public mysqli $connection;

  public function _construct()
  {
      $hostname = $_ENV['HOSTNAME'];
      $username = $_ENV['USERNAME'];
      $password = $_ENV['PASSWORD'];
      $database = $_ENV['DB_NAME'];
      $this->connection = new mysqli(hostname: $hostname, username: $username , password: $password);

      if($this->connection->connect_error)
      {
            echo "Database connection failed";
      }
     else{
            echo "Database connected successfully";
          }

  }




}
?>