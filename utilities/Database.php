<?php
namespace app\utilities;
use mysqli;

 class Database{
     public mysqli $connection;

     public function __construct(){

         $hostname = $_ENV['HOSTNAME'];
         $username = $_ENV['USERNAME'];
         $password = $_ENV['PASSWORD'];
         $database = $_ENV['DATABASE'];
         $port = $_ENV['PORT'];

         $this->connection = new mysqli(hostname: $hostname, username: $username, password: $password, database: $database, port: $port);
         if ($this->connection->connect_error){
            echo "Database connection failed";
         }
     }
 }
