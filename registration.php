<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
      body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url(https://i.imgur.com/OPYWhOa.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        font-family: Arial, sans-serif;
        background-attachment: fixed;
      }

      .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff87;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        margin-top: 100px;
      }

      .container h1 {
        text-align: center;
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
        margin-top: -17px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      .form-group input[type="text"],
      .form-group input[type="email"],
      .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      .form-group input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      .form-group input[type="submit"]:hover {
        background-color: #45a049;
      }

      .login-link {
        text-align: center;
        margin-top: 10px;
      }

      .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
        font-size: 14px;
      }

      .alert.alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
      }

      .alert.alert-success {
        background-color: #65ff6c63;
        border-color: #a04545;
        color: #006804;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img src="assets/img/team/d.png" class="img-fluid" alt style="width: 200px; padding-left:95px;">
      <h1>Jesie's Website</h1> <?php
        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $address = "null";
            $password = $_POST["password"];
            $repeat_password = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            if (empty($fullname) || empty($email) || empty($password) || empty($repeat_password)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $repeat_password) {
                array_push($errors, "Password does not match");
            }

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "
							<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users (full_name, email, address, password ) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $address, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "
							<div class = 'alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?> <form action="registration.php" method="post">
        <div class="form-group">
          <input type="text" name="fullname" placeholder="Full Name" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email" required>
          </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <input type="password" name="repeat_password" placeholder="Repeat Password" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Register" name="submit">
        </div>
      </form>
      <div class="login-link">
        <p>Already Registered? <a href="login.php">Login Here</a>
        </p>
      </div>
    </div>
  </body>
</html>