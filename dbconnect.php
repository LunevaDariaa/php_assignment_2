<?php
// $server = "localhost";
// $username = "root";
// $password = "4507";
// $database = "users";

// $conn = mysqli_connect($server, $username, $password, $database);
// if (!$conn){
// //     echo "success";
// // }
// // else{
//     die("Error". mysqli_connect_error());
// }

?>
<?php
$server = "localhost";
$username = "root";
$password = "4507";
$database_users = "users";
$database_images = "images";

// Connection to the users database
$conn_users = mysqli_connect($server, $username, $password, $database_users);
if (!$conn_users) {
    die("Error connecting to the users database: " . mysqli_connect_error());
}

// Connection to the images database
$conn_images = mysqli_connect($server, $username, $password, $database_images);
if (!$conn_images) {
    die("Error connecting to the images database: " . mysqli_connect_error());
}
?>