<?php
if ($airtel_access > 0){

require ("../functions/airtel_price.php");

if ($plan_id==501){
 $service_price=$airtel_750;
 $service="airtel";
 $databyte="750";
 $package_name="AIRTEL 750MB";
 $planCode='airtel_750mb14days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==502){
 $service_price=$airtel_15;
 $service="airtel";
 $databyte="1500";
 $package_name="AIRTEL 1.5GB";
 $planCode='airtel_1_5gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==503){
 $service_price=$airtel_2;
 $service="airtel";
 $databyte="2000";
 $package_name="AIRTEL 2.0GB";
 $planCode='airtel_2gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==504){
 $service_price=$airtel_3;
 $service="airtel";
 $databyte="3000";
 $package_name="AIRTEL 3.0GB";
 $planCode='airtel_3gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==505){
 $service_price=$airtel_45;
 $service="airtel";
 $databyte="4500";
 $package_name="AIRTEL 4.5GB";
 $planCode='airtel_4_5gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==506){
 $service_price=$airtel_6;
 $service="airtel";
 $databyte="6000";
 $package_name="AIRTEL 6.0GB";
 $planCode='airtel_6gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==507){
 $service_price=$airtel_10;
 $service="airtel";
 $databyte="10000";
 $package_name="AIRTEL 10GB";
 $planCode='airtel_10gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==508){
 $service_price=$airtel_11;
 $service="airtel";
 $databyte="11000";
 $package_name="AIRTEL 11GB";
 $planCode='airtel_11gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==509){
 $service_price=$airtel_20;
 $service="airtel";
 $databyte="20000";
 $package_name="AIRTEL 20GB";
 $planCode='airtel_20gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==510){
 $service_price=$airtel_40;
 $service="airtel";
 $databyte="40000";
 $package_name="AIRTEL 40GB";
 $planCode='airtel_40gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==511){
 $service_price=$airtel_75;
 $service="airtel";
 $databyte="75000";
 $package_name="AIRTEL 75GB";
 $planCode='airtel_75gb30days:device:USSD_AIRTEL_BREAK';
 }

 if ($plan_id==512){
 $service_price=$airtel_120;
 $service="airtel";
 $databyte="120000";
 $package_name="AIRTEL 110GB";
 $planCode='airtel_110gb30days:device:USSD_AIRTEL_BREAK';
 }


if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$post_string=array(
	"process"=> "buy",
	"api_key"=> "4iijv46m30nfjlisx20t9vtw253sa9548o5yr5be9lluvjz6aj8t2957xgbh59ti1nxj1rflqd7sbr1hscx3bmil0jpgnanhdpsu6s6o27ofuaravswgaah29pwj3wfi",
	"product_code"=> $planCode,
	"amount"=> "1",
	"recipient"=>$mobile_no,
	"callback"=>"status.php",
	"user_reference"=>$api_reference
);
  
  $url = 'https://api.simservers.io';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_string));  //Post Fields
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $request = curl_exec($ch);
  curl_close($ch);

$xx=json_decode($request, true);

$server=$xx['server_message'];

$status=$xx['status'];

if($status==1){

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

// mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$adata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$adata_comm;
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
    'message' => 'Airtel data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>