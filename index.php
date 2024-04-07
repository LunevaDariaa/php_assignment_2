<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    $username = "Guest"; // If not logged in, set username as Guest
}
?>

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
    <main>
        <?php include('inc/header.php'); ?>

        <h1 class="welcome">Welcome Image Store Website!</h1>

        <?php include('upload.php'); ?>

        <section class="gallery">
    <h2>Explore Our Gallery</h2>
    <?php if (!isset($_SESSION['username'])): ?>
        <p style="background-color: white">Register now and start manipulating photos!</p>
    <?php endif; ?>
    <div class="gallery-images">
        <div class="gallery-slideshow">
            <img class="slideshow-image" src="gallery/1.jpg" alt="Gallery Image 1">
            <img class="slideshow-image" src="gallery/2.jpg" alt="Gallery Image 2">
            <img class="slideshow-image" src="gallery/3.jpg" alt="Gallery Image 3">
        </div>
        <div class="gallery-slideshow">
        <img class="slideshow-image" src="gallery/3.jpg" alt="Gallery Image 3">
        <img class="slideshow-image" src="gallery/1.jpg" alt="Gallery Image 1">
        <img class="slideshow-image" src="gallery/2.jpg" alt="Gallery Image 2">
        </div>
        <div class="gallery-slideshow">
        <img class="slideshow-image" src="gallery/2.jpg" alt="Gallery Image 2">
        <img class="slideshow-image" src="gallery/3.jpg" alt="Gallery Image 3">
        <img class="slideshow-image" src="gallery/1.jpg" alt="Gallery Image 1">
        </div>
    </div>
</section>

    </main>
    <?php include('inc/footer.php'); ?>
    <script>
    // JavaScript for slideshow
    const slideshows = document.querySelectorAll('.gallery-slideshow');

    function showSlides() {
        slideshows.forEach(slideshow => {
            const images = slideshow.querySelectorAll('.slideshow-image');
            let index = 0;

            const changeSlide = () => {
                images.forEach(image => {
                    image.style.opacity = 0;
                });
                images[index].style.opacity = 1;
                index = (index + 1) % images.length;
            };

            setInterval(changeSlide, 3000); // Change slide every 3 seconds
            changeSlide(); // Change slide immediately
        });
    }

    showSlides(); // Start slideshow
</script>
</body>
</html>
