<?php

require ('session.php');

mysqli_query($db, "UPDATE admin SET sid='".$_SESSION['runtime_id']."' WHERE username='".$_SESSION['username']."'");

session_unset();
session_destroy();
header('location:index');
exit();

?>