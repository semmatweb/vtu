<?php
if ($airtelcg_access > 0){

require ("../functions/airtelcg_price.php");

 if ($plan_id==601){
 $service_price=$airtelcg_100;
 $service="airtel-cg";
 $databyte="100";
 $package_name="AIRTEL CG 100MB";
 $planCode=100;
 }

 if ($plan_id==602){
 $service_price=$airtelcg_300;
 $service="airtel-cg";
 $databyte="300";
 $package_name="AIRTEL CG 300MB";
 $planCode=300;
 }

  if ($plan_id==603){
 $service_price=$airtelcg_500;
 $service="airtel-cg";
 $databyte="500";
 $package_name="AIRTEL CG 500MB";
 $planCode=500;
 }

  if ($plan_id==604){
 $service_price=$airtelcg_1;
 $service="airtel-cg";
 $databyte="1000";
 $package_name="AIRTEL CG 1GB";
 $planCode=10;
 }

 if ($plan_id==605){
 $service_price=$airtelcg_2;
 $service="airtel-cg";
 $databyte="2000";
 $package_name="AIRTEL CG 2GB";
 $planCode=20;
 }

 if ($plan_id==606){
 $service_price=$airtelcg_5;
 $service="airtel-cg";
 $databyte="5000";
 $package_name="AIRTEL CG 5GB";
 $planCode=50;
 }


 if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$service_url = 'https://dailycashout.com.ng/api/buydataet.php?api_key=626a67dfc22e9cd1345975f0c2d91fb4&network=AIRTEL_CGD&plans='.$planCode.'&phonenumber='.$mobile_no.'';
  
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);

$status=$xx['status'];
$message=$xx['msg'];

  if ($status=='success'){

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no.' {'.$message.'}');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

 //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$acdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

  //$new_bonus=$account_bonus+$acdata_comm;
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
    'message' => 'Airtel-CG data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>