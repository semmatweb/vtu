<?php
require ("../functions/airtimevtu_price.php");

if ($network=="MTN-VTU" || $network=="MTN"){
$service_code=1;
$service="MTN-VTU";
$discount=$mtn_discount;
$service_comm=$mair_comm;
}

if ($network=="GLO-VTU" || $network=="GLO"){
$service_code=2;
$service="GLO-VTU";
$discount=$glo_discount;
$service_comm=$gair_comm;
}

if ($network=="AIRTEL-VTU" || $network=="AIRTEL"){
$service_code=4;
$service="AIRTEL-VTU";
$discount=$airtel_discount;
$service_comm=$aair_comm;
}

if ($network=="9MOBILE-VTU" || $network=="9MOBILE" || $network=="ETISALAT-VTU" || $network=="ETISALAT"){
$service_code=3;
$service="9MOBILE-VTU";
$discount=$mobile_discount;
$service_comm=$moair_comm;
}

$discount_now=$amount*$discount/100;
$service_price=$amount-$discount_now;

if ($account_balance >= $service_price && $service_price > 0){

$new_wallet=$account_balance-$service_price;
mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.husmodata.com/api/topup/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "network": '.$service_code.',
    "amount":'.$amount.',
    "mobile_number": "'.$mobile_no.'",
    "Ported_number": true,
    "airtime_type": "VTU"
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token 4aef51f25e6c622beb79ecf20e52ea801d6ef2b8',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$xx=json_decode($response,true);

$status=$xx['Status'];
$message=$xx['api_response'];
$api_reference=$xx['ident'];


if ($status=='successful' || $status=='processing'){

 $order_report=strtoupper($service.' N'.$amount.' Recharge Successful on '.$mobile_no.'('.$message.')');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

 //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$service_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

// $new_bonus=$account_bonus+$service_comm;
// mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

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