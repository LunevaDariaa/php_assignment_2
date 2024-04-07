<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    

<?php
session_start(); // Start the session
include 'inc/header.php'; // Include the header file
require 'dbconnect.php'; // Include the database connection file

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}
$stmt= $conn_images->prepare('select * from images');
$stmt->execute();
$result= $stmt->get_result();
//fetch all rows from the table
 $imagelist=$result->fetch_all(MYSQLI_ASSOC);
?>
<?php include('upload.php'); ?>

<section class="view-masthead">
    <div>
        <h1>View Your Images</h1>
    </div>
</section>

<section class="image-row">
    <?php foreach ($imagelist as $image): ?>
        <div class="image-item ">
            <img src="<?= $image['image'] ?>" alt="<?= $image['name'] ?>" class="img-fluid">
            <p><?= $image["name"] ?></p>
            <?php if(isset($_SESSION['username'])): ?>
                <form action="delete_image.php" method="post">
                    <input type="hidden" name="image_id" value="<?= $image['id'] ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>

<?php include('inc/footer.php'); ?>
</body>
</html>
