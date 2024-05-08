<?php

require("../config.php");

$update_user=mysqli_query($db, "UPDATE users SET reg_active='1' WHERE sid='".$_GET['token']."' AND emailR='".$_GET['email']."'");
if ($update_user){

$newhash=md5(uniqid().mt_rand());

mysqli_query($db, "UPDATE users SET sid='$newhash' WHERE emailR='".$_GET['email']."'");

header("Location:login");

}

else{

	die("ERROR ACTIVATING ACCOUNT.");
}
?>