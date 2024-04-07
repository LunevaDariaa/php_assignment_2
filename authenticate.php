<?php
session_start();
require 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

//query to fetch user from the database

$stmt=$conn_users->prepare("select * from users where username=?");
$stmt->bind_param("s",$username);
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows ==1)
{
    $row= $result->fetch_assoc();
    if(password_verify($password,$row['password'])){
        //authentication successfull
        $_SESSION['loggedin']=true;
        $_SESSION['username']= $username ;
        $_SESSION['role'] = $role;
        header("Location:index.php");
        exit;
    }
}
  else
    {
        header("Location: login.php?error=auth");
      exit;
    }
}

else{
 header("Location: login.php?error=auth");
 exit;

}


?>