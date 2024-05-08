<?php

$getmtn=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM giftingprice WHERE id='1'"));

$cmtn500mb=$getmtn['mtn500mb'];
$cmtn1gb=$getmtn['mtn1gb'];
$cmtn2gb=$getmtn['mtn2gb'];
$cmtn3gb=$getmtn['mtn3gb'];
$cmtn5gb=$getmtn['mtn5gb'];
$cmtn10gb=$getmtn['mtn10gb'];
$cmtn15gb=$getmtn['mtn15gb'];

?>