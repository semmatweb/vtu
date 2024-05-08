<?php
require "session_controller.php";


$con=mysqli_connect($host, $user, $pass, $dbanme);
if (!$con){die("Error Connecting DB".mysql_error());}



$email = $_SESSION['useremail'];
$pass = $_SESSION['userpas'];
$query = mysqli_query($con, "SELECT sk_token FROM `users` WHERE email = '$email' AND users_sid = '$pass'");
$return_data=mysqli_fetch_assoc($query);
$token=$return_data['sk_token'];

if ($token == "")
{
  $token=uniqid().md5($email);  
}

if($_POST['action']=="action"){
$sql = mysqli_query($con, "UPDATE users SET api_token='$token' WHERE email = '$email' && users_sid = '$pass'");
echo "Your api token has successfully been generated";
}
?>