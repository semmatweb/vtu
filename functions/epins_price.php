<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT waec, neco, nabteb, nbais FROM epin_planlist WHERE id='$level'"));

$waec=$data_query[0];
$neco=$data_query[1];
$nabteb=$data_query[2];
$nbais=$data_query[3];


?>