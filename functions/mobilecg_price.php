<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_500,mobile_1, mobile_2, mobile_3, mobile_5, mobile_10, mobile_15, mobile_20, mobile_4 FROM mobiledatacg_plan WHERE id='$level'"));

$mobile_500=$data_query[0];
$mobile_1=$data_query[1];
$mobile_2=$data_query[2];
$mobile_3=$data_query[3];
$mobile_4=$data_query[8];
$mobile_5=$data_query[4];
$mobile_10=$data_query[5];
$mobile_15=$data_query[6];
$mobile_20=$data_query[7];

?>