<?php
error_reporting(E_ALL);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dberror1 = "Could not connect";
$db="crl_inventory";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db) 
 or die("Could not connect to MySQL");

?>
