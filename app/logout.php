<?php
require("session_controller.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$lastlogin=$dateTime->format("d-M-y  h:i A"); 
$newhash=md5(uniqid().mt_rand());
mysqli_query($con, "UPDATE vtuapp_customuser SET last_login='$lastlogin', users_sid='$newhash' WHERE username='".$_SESSION['username']."'");

session_unset();
session_destroy();
header("location:../login");


?>