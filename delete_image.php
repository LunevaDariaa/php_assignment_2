<?php
session_start();
include('dbconnect.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the image ID is set
    if (isset($_POST['image_id'])) {
        $image_id = $_POST['image_id'];

        // Fetch the image path from the database
        $sql = "SELECT image FROM images WHERE id = ?";
        $stmt = $conn_images->prepare($sql);
        $stmt->bind_param("i", $image_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $image_path = $row['image'];

        // Delete the image from the database
        $sql = "DELETE FROM images WHERE id = ?";
        $stmt = $conn_images->prepare($sql);
        $stmt->bind_param("i", $image_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Image deleted successfully from the database, now delete the file
            if (unlink($image_path)) {
                // File deleted successfully
                header("Location: view.php");
                exit;
            } else {
                // Error occurred while deleting file
                echo "Error deleting file.";
            }
        } else {
            // Error occurred while deleting image from database
            echo "Error deleting image: " . $conn_images->error;
        }
    } else {
        // Image ID not set
        echo "Image ID not provided.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
