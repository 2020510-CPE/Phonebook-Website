<?php
// Retrieve the contact ID from the request
$contactId = $_GET['id'];

require "database.php";
// Delete the contact with the specified ID
$sql = "DELETE FROM contacts WHERE id = " . (int)$contactId;
if (mysqli_query($conn, $sql)) {
  echo 'Contact deleted successfully';
} else {
  echo 'Error: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
