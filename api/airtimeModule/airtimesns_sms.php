<?php
require ("../functions/airtimesns_price.php");

if ($network=="MTN-SNS" || $network=="MTN"){
$service_code="net01";
$service_no=$mtn_n;
$service="MTN-SNS";
$discount=$mtn_discount;
$service_comm=$mair_comm;
}

if ($network=="GLO-SNS" || $network=="GLO"){
$service_code="net02";
$service_no=$glo_n;
$service="GLO-SNS";
$discount=$glo_discount;
$service_comm=$gair_comm;
}

if ($network=="AIRTEL-SNS" || $network=="AIRTEL"){
$service_code="net03";
$service_no=$airtel_n;
$service="AIRTEL-SNS";
$discount=$airtel_discount;
$service_comm=$aair_comm;
}

if ($network=="9MOBILE-SNS" || $network=="9MOBILE" || $network=="ETISALAT-SNS" || $network=="ETISALAT"){
$service_code="net04";
$service_no=$mobile_n;
$service="9MOBILE-SNS";
$discount=$mobile_discount;
$service_comm=$moair_comm;
}

$discount_now=$amount*$discount/100;
$service_price=$amount-$discount_now;

if ($account_balance > $service_price && $service_price > 0){

$new_wallet=$account_balance-$service_price;
mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$message=($service_code." share airtime ".$amount." + ".$mobile_no);
$request = array(
        "user"=>$smsusername,
        "pass"=>$smspassword,
        "from"=> $sitetitle,
        "type"=> "NORMAL",
        "to"=> $service_no,
        "msg"=> $message,
);

$url = 'https://sms.hollatags.com/api/send/';
$ch = curl_init(); //initialize curl handle
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$response = curl_exec($ch);
curl_close($ch); 

if ($response=="sent"){

 $order_report=strtoupper($service.' N'.$amount.' Recharge Successful on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

 //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$service_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$service_comm;
 //mysqli_query($con, "UPDATE vtuapp_customuser SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
	'old_balance'=> $account_balance, ////// 
	'new_bal'=> $new_wallet, ////// 
	'time' => $time,
    'amountPaid' => $service_price,
    'discount' => $discount_now,
	'message' => $order_report,
    );
    echo json_encode($response);
    exit;


}

else{


 $new_wallet=$account_balance;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

 $order_report=strtoupper($service.' N'.$amount.' Recharge failed on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
	'old_balance'=> $account_balance, ////// 
	'new_bal'=> $account_balance, ////// 
	'time' => $time,
	'message' => $order_report,
    );
    echo json_encode($response);
    exit;

}

}

else{

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Your account is too low for this transaction !!!',
    );
    echo json_encode($response);
    exit;
}

?>