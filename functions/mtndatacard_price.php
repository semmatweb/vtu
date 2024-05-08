<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtndatacard_15, mtndatacard_2, mtndatacard_75, mtnsme_3, mtnsme_5 FROM mtndatacard_plan WHERE id='$level'"));

$mtndatacard_15=$data_query[0];
$mtndatacard_2=$data_query[1];
$mtndatacard_75=$data_query[2];
$airtelcg_1=$data_query[3];
$airtelcg_2=$data_query[4];
$airtelcg_5=$data_query[5];
$airtelcg_10=$data_query[6];

?>