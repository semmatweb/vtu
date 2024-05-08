<?php

$getair=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM airtelcgprice WHERE id='1'"));

$air100mb=$getair['air100'];
$air300mb=$getair['air300'];
$air500mb=$getair['air500'];
$air1gb=$getair['air1'];
$air2gb=$getair['air2'];
$air5gb=$getair['air5'];

?>