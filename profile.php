<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include('inc/header.php'); ?>

    <h2>User Profile</h2>
    <!-- Display User Profile -->
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        echo "<p>Welcome, " . $_SESSION['username'] . "!</p>";
    } else {
        echo "<p>You are not logged in.</p>";
    }
    ?>

    <?php include('inc/footer.php'); ?>
</body>
</html>
