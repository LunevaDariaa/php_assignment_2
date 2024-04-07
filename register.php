<?php

require 'dbconnect.php'; // Assuming you have a file named database.php for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $conn_users->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit;
    } else {
        // Error occurred, handle appropriately
        echo "Error: " . $conn_users->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
<?php
include 'inc/header.php';

?>


<div class="loginform">
    <form action="register.php" method="post" class="registration-form">
        <div class="form-group">
            <h1 class="u">REGISTER</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

    <?php include('inc/footer.php'); ?>
</body>
</html>