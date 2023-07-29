<?php

session_start();
include("database.php");

if (!isset($_SESSION["user"])) {
  header("Location: publicpage.php");
  exit(); // Make sure to exit after redirecting
}

$currentUserEmail = $_SESSION["user"];

// Connect to the database
require_once "database.php";
// Fetch all contacts
$sql = "SELECT * FROM contacts WHERE owner='$currentUserEmail'";
$result = mysqli_query($conn, $sql);

$contacts = array();
while ($row = mysqli_fetch_assoc($result)) {
  $contacts[] = $row;
}

// Convert the contacts array to JSON and send the response
header('Content-Type: application/json');
echo json_encode($contacts);

// Close the database connection
mysqli_close($conn);
?>
