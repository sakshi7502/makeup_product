<?php 
session_start();
require_once 'admin/config/db.php'; 
if(isset($_POST) & !empty($_POST)){

  //$email = mysqli_real_escape_string($connection, $_POST['email']);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];
$current_date = date("Y-m-d H:i:s");
  //$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  echo $sql = "INSERT INTO users (email, password,timestamp) VALUES ('$email', '$password','$current_date')";
  $result = mysqli_query($con, $sql) or die(mysqli_error($con));
  if($result){
    //echo "User exits, create session";
    $_SESSION['customer'] = $email;
    $_SESSION['customerid'] = mysqli_insert_id($con);
    header("location: single.php");
  }else{
    //$fmsg = "Invalid Login Credentials";
    header("location: login.php?message=2");
  }
}

?>