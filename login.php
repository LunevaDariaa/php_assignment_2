<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Login</title>
   
</head>
<body>

<?php include('inc/header.php'); ?>

<div class="loginform">
    <form action="authenticate.php" method="post">
        <h1 class="u">USER LOGIN</h1>


        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
<?php
        // Check if error parameter exists in URL
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == 'auth') {
                // Display the floating error message
                echo '<div id="error-message" class="error-message">Authentication failed. Please check your username and password.</div>';
            }
        }
        ?>
<?php include('inc/footer.php'); ?>
<script>
    // After 3 seconds, hide the error message
    setTimeout(function() {
        document.getElementById('error-message').style.display = 'none';
    }, 3000);
</script>
</body>
</html>
