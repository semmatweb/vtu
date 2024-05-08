<?php
require("../config.php");

session_start();
$time=$_SERVER['REQUEST_TIME'];
$timeout_duration=1800; 

$rec_check_admin=mysqli_query($db, "SELECT * FROM admin WHERE username='".$_SESSION['username']."' AND sid='".$_SESSION['sid']."'");
if (mysqli_num_rows($rec_check_admin)>0){

$runtime_user=sha1(uniqid().time());
$_SESSION['runtime_id']=$runtime_user;
}

else{

session_unset();
session_destroy();
header("location:index");

}

if (isset($_SESSION['LAST_ACTIVITY']) && ($time-$_SESSION['LAST_ACTIVITY']) > $timeout_duration){

  mysqli_query($db, "UPDATE admin SET sid='".$_SESSION['runtime_id']."' WHERE username='".$_SESSION['username']."'");

  session_unset();
  session_destroy();
  header("location:index?message=1");
}

?>