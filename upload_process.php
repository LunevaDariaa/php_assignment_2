<?php
session_start();
include('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Sorry, file already exists.');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "<script>alert('The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.');</script>";
            
            $image_name = $_FILES["image"]["name"];
            $image_path = $target_file;
            $sql = "INSERT INTO images (name, image) VALUES ('$image_name', '$image_path')";
            if (mysqli_query($conn_images, $sql)) {
                echo "<script>alert('Image data inserted into database.');</script>";
                // Redirect to view.php after successful upload
                header("Location: view.php");
                exit(); // Make sure to exit after sending the header
            } else {
                echo "<script>alert('Error inserting image data: " . mysqli_error($conn_images) . "');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}
?>
