<?php
if ($mobile_access > 0){

require ("../functions/mobilecg_price.php");

if ($plan_id==401){
 $service_price=$mobile_500;
 $service="9mobile";
 $databyte="500";
 $package_name="9MOBILE 500MB";
 $planCode=270;
 }

 if ($plan_id==402){
 $service_price=$mobile_1;
 $service="9mobile";
 $databyte="1500";
 $package_name="9MOBILE 1.0GB";
 $planCode=262;
 }

 if ($plan_id==403){
 $service_price=$mobile_2;
 $service="9mobile";
 $databyte="2000";
 $package_name="9MOBILE 2.0GB";
 $planCode=263;
 }

 if ($plan_id==404){
 $service_price=$mobile_3;
 $service="9mobile";
 $databyte="3000";
 $package_name="9MOBILE 3.0GB";
 $planCode=264;
 }
 
 if ($plan_id==409){
 $service_price=$mobile_4;
 $service="9mobile";
 $databyte="4000";
 $package_name="9MOBILE 4.0GB";
 $planCode=265;
 }
 
 if ($plan_id==405){
 $service_price=$mobile_5;
 $service="9mobile";
 $databyte="5000";
 $package_name="9MOBILE 5.0GB";
 $planCode=266;
 }

 if ($plan_id==406){
 $service_price=$mobile_10;
 $service="9mobile";
 $databyte="10000";
 $package_name="9MOBILE 10GB";
 $planCode=267;
 }

 if ($plan_id==407){
 $service_price=$mobile_15;
 $service="9mobile";
 $databyte="15000";
 $package_name="9MOBILE 15GB";
 $planCode=268;
 }

 if ($plan_id==408){
 $service_price=$mobile_40;
 $service="9mobile";
 $databyte="20000";
 $package_name="9MOBILE 20GB";
 $planCode=269;
 }


 if ($account_balance >= $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://geodnatechsub.com/api/data/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "network": 3,
    "mobile_number": "'.$mobile_no.'",
    "plan": "'.$planCode.'", 
    "Ported_number": true
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token 9d5de4220805e3ffd93725154f08d3137065f60b',
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

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no.'{'.$message.'}');

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
    'message' => '9MOBILE-CG data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>