<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtndc_1, mtndc_2, mtndc_3, mtndc_4, mtndc_5, mtndc_6 FROM mtndc_plan WHERE id='$level'"));

$mtndc_1=$data_query[0];
$mtndc_15=$data_query[1];
$mtndc_2=$data_query[2];
$mtndc_3=$data_query[3];
$mtndc_5=$data_query[4];
$mtndc_10=$data_query[5];

?>