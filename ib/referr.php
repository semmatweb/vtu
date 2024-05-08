<?php



$percent=$_POST['percentage'];

$host="localhost";
$user="freesubc_freesubc";
$pass="!)ytJB66g58MPt";
$dbanme="freesubc_data";

$con=mysqli_connect($host, $user, $pass, $dbanme);

$update=mysqli_query($con, "UPDATE referal_percentage SET percentage=$percent where id=1");

if($update){
    echo "Referral Bonus Successfully Set";
}





?>