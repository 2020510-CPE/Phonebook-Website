<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'connect.php';
include_once 'db_class.php';

$db_test = new db_test($connection);

$sysArr = array();
$sysArr["body"] = array();
$itemCount = 0;

$stmt = $db_test->readData();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $e = array(
        "id" => $row['id'],
        "firstname" => $row['firstname'],
        "lastname" => $row['lastname'],
        "gender" => $row['gender'],
        "age" => $row['age'],
        "address" => $row['address'],
        "phoneNumber" => $row['phoneNumber'],
    );

    array_push($sysArr["body"], $e);
    $itemCount++;
}

$sysArr["itemCount"] = $itemCount;

echo json_encode($sysArr);
?>
