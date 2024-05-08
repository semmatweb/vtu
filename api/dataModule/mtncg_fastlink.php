<?php
if ($mtncg_access > 0){

require ("../functions/mtncg_price.php");

if ($plan_id==500){
 $service_price=$mtncg_500;
 $service="mtn-cg ";
 $databyte="500";
 $package_name="MTN CG 500MB";
 $planCode=210;
 }

 if ($plan_id==1000){
 $service_price=$mtncg_1;
 $service="mtn-cg ";
 $databyte="1000";
 $package_name="MTN CG 1GB";
 $planCode=52;
 }

 if ($plan_id==2000){
 $service_price=$mtncg_2;
 $service="mtn-cg ";
 $databyte="2000";
 $package_name="MTN CG 2GB";
 $planCode=51;
 }

 if ($plan_id==3000){
 $service_price=$mtncg_3;
 $service="mtn-cg ";
 $databyte="3000";
 $package_name="MTN CG 3GB";
 $planCode=43;
 }

 if ($plan_id==5000){
 $service_price=$mtncg_5;
 $service="mtn-cg ";
 $databyte="5000";
 $package_name="MTN CG 5GB";
 $planCode=50;
 }

 if ($plan_id==10000){
 $service_price=$mtncg_10;
 $service="mtn-cg ";
 $databyte="10000";
 $package_name="MTN CG 10GB";
 $planCode=206;
 }



 if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$postdata=array(
'network' => 1,
'plan' => $planCode,
'mobile_number' => $mobile_no,
'Ported_number' => true
);

$url = "https://www.fastlink.com.ng/api/data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Token  e357e3e8fd336ae60fb45b313bd79b31e6fd6b23',
    'Content-Type: application/json'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);
$xx=json_decode($request, true);
$status=$xx['Status'];

if ($status=='successful'){

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

//mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$mcdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$mcdata_comm;
// mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

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
    'message' => 'MTN-CG data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>