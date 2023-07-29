<?php
$hostName = "localhost";
$dbUser = "id21003544_jesie";
$dbPassword = "123Verysecure.";
$dbName = "id21003544_login_register";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if(!$conn){
    die("Something went wrong;");
}
?>