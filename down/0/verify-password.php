<?php

require('../config.php');

$error=$done="";
if (!isset($_GET['email']) && !isset($_GET['hash'])){

    die("Invalid Parameter Sent");
}

$email=$_GET['email'];
$hash=$_GET['hash'];

$checkInfo=mysqli_query($db, "SELECT emailR, sid FROM users WHERE emailR='".$email."' AND sid='".$hash."'");

$counter5=mysqli_num_rows($checkInfo);

if ($counter5<1){

    die("This reset password link might be expired or Invalid");

}

else{
	
	//$_GET['email']=$email;
	header('location:reset_password?email='.$email.);
}


?>