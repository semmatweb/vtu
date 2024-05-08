<?php
if ($mobile_access > 0){

require ("../functions/mobile_price.php");

if ($plan_id==401){
 $service_price=$mobile_500;
 $service="9mobile";
 $databyte="500";
 $package_name="9MOBILE 500MB";
 $planCode=3044;
 }

 if ($plan_id==402){
 $service_price=$mobile_15;
 $service="9mobile";
 $databyte="1500";
 $package_name="9MOBILE 1.5GB";
 $planCode=3045;
 }

 if ($plan_id==403){
 $service_price=$mobile_2;
 $service="9mobile";
 $databyte="2000";
 $package_name="9MOBILE 2.0GB";
 $planCode=3046;
 }

 if ($plan_id==404){
 $service_price=$mobile_3;
 $service="9mobile";
 $databyte="3000";
 $package_name="9MOBILE 3.0GB";
 $planCode=3047;
 }

 if ($plan_id==405){
 $service_price=$mobile_45;
 $service="9mobile";
 $databyte="4500";
 $package_name="9MOBILE 4.5GB";
 $planCode=3048;
 }

 if ($plan_id==406){
 $service_price=$mobile_11;
 $service="9mobile";
 $databyte="11000";
 $package_name="9MOBILE 11GB";
 $planCode=3049;
 }

 if ($plan_id==407){
 $service_price=$mobile_150;
 $service="9mobile";
 $databyte="15000";
 $package_name="9MOBILE 15GB";
 $planCode=3050;
 }

 if ($plan_id==408){
 $service_price=$mobile_40;
 $service="9mobile";
 $databyte="40000";
 $package_name="9MOBILE 40GB";
 $planCode=3051;
 }

 if ($plan_id==409){
 $service_price=$mobile_75;
 $service="9mobile";
 $databyte="75000";
 $package_name="9MOBILE 75GB";
 $planCode=3052;
 }


 if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$postdata = array(
    'network' => $service,
    'plan_id' => $planCode,
    'phone' => $mobile_no,
    'device_id' => $mobile_device,
    'sim_slot' => $mobile_slot,
    'request_type' => $mobile_string,
    'webhook_url' => $mainpage.'/webhook.php'
);

$url = "https://www.msplug.com/api/buy-data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Token f8eb09efc0e0b217508af7236a122ddfddc2251c',
    'Content-Type: application/json',
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);

curl_close($ch);
    
 if ($response) {

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");


 //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$modata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$modata_comm;
 //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
	'old_balance'=> $account_balance, ////// 
	'new_balance'=> $new_wallet, ////// 
	'time' => $time,
    'amountPaid' => $service_price,
	'message' => $order_report,
    );
    echo json_encode($response);
    exit;


}


else{

 $new_wallet=$account_balance;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase failed on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte')");

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


 }


 else{

     $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => '9MOBILE data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>