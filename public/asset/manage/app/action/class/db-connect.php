<?php
error_reporting(0);
class Database
{
public $con;
public function __construct(){
$hostname = "localhost";
$username = "u920553048_asset_user";
$password = "P@55word#V";
    $this->con = new PDO("mysql:host=$hostname;dbname=u920553048_asset",$username,$password);
    $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        if (!$this->con) {
         echo "Error in Connecting ".mysqli_connect_error();
        }
}
}
?>