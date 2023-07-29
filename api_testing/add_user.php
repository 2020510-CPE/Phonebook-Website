<?php
include_once 'connect.php';
include_once 'db_class.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $phoneNumber = $_POST["phoneNumber"];

    $db_test = new db_test($connection);
    if ($db_test->addUser($firstname, $lastname, $gender, $age, $address, $phoneNumber)) {
        header("Location: read_api.php");
        exit;
    } else {
        echo "Failed to add user";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <h2>Add New User</h2>
    <form action="add_user.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required><br>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" required><br>

        <label for="age">Age:</label>
        <input type="text" name="age" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" required><br>

        <input type="submit" value="Add User">
    </form>
</body>
</html>
