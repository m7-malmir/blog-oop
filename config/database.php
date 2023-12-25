<?php
// session_start();
// require_once 'constants.php';
// $mysqli = new mysqli("localhost","egator","mamad1234","egator");

// // Check connection
// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   exit();
session_start();
define("ROOT_URL",'http://localhost/amini/');
class Dbh{
  public function connect(){
        try {
            $username="root";
            $password="";
            $dbh=new PDO("mysql:host=localhost;dbname=subasayesh",$username,$password);
            return $dbh;
        } catch (\Throwable $th) {
            print 'Error!: '. $th->getMessage() ."<br/>";
            die();
        }
  }
}

}