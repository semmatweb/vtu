<?php

$PDATA=mysqli_fetch_array(mysqli_query($db, "SELECT amount, service, pre_balance, post_balance, buyer_email, recharge_phone, trx FROM system_recharge WHERE  buyer_email='".$email."' AND trx='".$trx."' ORDER BY id DESC LIMIT 1"));

$amount_to_buy=$PDATA[0];
$service=$PDATA[1];
$pre_balance=$PDATA[2];
$post_balance=$PDATA[3];
$buyer_email=$PDATA[4];
$recharge_phone=$PDATA[5];
$order_id=$PDATA[6];



if ($amount_to_buy !=='0' && $amount_to_buy < $pre_balance){

	require("airtime_sub.php");
}

else{

	echo "Purchase Fail Due To Insufficient Fund, Please Try again"; //Insufficient
    exit();

}


?>