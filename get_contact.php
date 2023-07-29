<?php
session_start();
include("database.php");

if (!isset($_SESSION["user"])) {
  header("Location: publicpage.php");
  exit(); // Make sure to exit after redirecting
}

$currentUserEmail = $_SESSION["user"];


// Retrieve the contact ID from the request
$contactId = $_GET['id'];

require_once "database.php";
// Fetch the contact with the specified ID
$sql = "SELECT * FROM contacts WHERE id = " . (int)$contactId;
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
  // Convert the contact data to JSON and send the response
  header('Content-Type: application/json');
  echo json_encode($row);
} else {
  echo 'Contact not found';
}

// Close the database connection
mysqli_close($conn);
?>
