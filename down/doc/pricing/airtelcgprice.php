<?php

$getair=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM airtelcgprice WHERE id='1'"));

$air100mbx=$getair['air100'];
$air300mbx=$getair['air300'];
$air500mbx=$getair['air500'];
$air1gbx=$getair['air1'];
$air2gbx=$getair['air2'];
$air5gbx=$getair['air5'];

?>