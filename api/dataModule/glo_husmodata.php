<?php
if ($glo_access > 0){

require ("../functions/glo_price.php");

if ($plan_id==201){
 $service_price=$glo_105;
 $service="glo";
 $databyte="1000";
 $package_name="GLO 350MB";
 $planCode=252;
 }

 if ($plan_id==202){
 $service_price=$glo_29;
 $service="glo";
 $databyte="2900";
 $package_name="GLO 1.35GB";
 $planCode=37;
 }

 if ($plan_id==203){
 $service_price=$glo_41;
 $service="glo";
 $databyte="4100";
 $package_name="GLO 3.9GB";
 $planCode=32;
 }

 if ($plan_id==204){
 $service_price=$glo_58;
 $service="glo";
 $databyte="5800";
 $package_name="GLO 7.5GB";
 $planCode=31;
 }

 if ($plan_id==205){
 $service_price=$glo_77;
 $service="glo";
 $databyte="7700";
 $package_name="GLO 9.2GB";
 $planCode=30;
 }

 if ($plan_id==206){
 $service_price=$glo_10;
 $service="glo";
 $databyte="10000";
 $package_name="GLO 10.8GB";
 $planCode=29;
 }

 if ($plan_id==207){
 $service_price=$glo_1325;
 $service="glo";
 $databyte="13250";
 $package_name="GLO 14.0GB";
 $planCode=28;
 }

 if ($plan_id==208){
 $service_price=$glo_1825;
 $service="glo";
 $databyte="18250";
 $package_name="GLO 18.0GB";
 $planCode=27;
 }

 if ($plan_id==209){
 $service_price=$glo_295;
 $service="glo";
 $databyte="29500";
 $package_name="GLO 24.0GB";
 $planCode=73;
 }

 if ($plan_id==210){
 $service_price=$glo_50;
 $service="glo";
 $databyte="50000";
 $package_name="GLO 29.5GB";
 $planCode=75;
 }

 if ($plan_id==211){
 $service_price=$glo_93;
 $service="glo";
 $databyte="90300";
 $package_name="GLO 93GB";
 $planCode=74;
 }


 
 if ($account_balance >= $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.husmodata.com/api/data/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "network": 2,
    "mobile_number": "'.$mobile_no.'",
    "plan": "'.$planCode.'", 
    "Ported_number": true
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

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no.'('.$message.')');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

//mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$gdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$gdata_comm;
 //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    $response=array(
    'status' => 'success',
    'api_response' => $message,
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
    'message' => 'GLO data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>