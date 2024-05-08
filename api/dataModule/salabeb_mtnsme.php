<?php
if ($mtnsme_access > 0){

require ("../functions/mtnsme_price.php");

if ($plan_id==500){
 $service_price=$mtnsme_500;
 $service="mtn-sme";
 $databyte="500";
 $package_name="MTN SME 500MB";
 $planCode=500;
 }

 if ($plan_id==1000){
 $service_price=$mtnsme_1;
 $service="mtn-sme";
 $databyte="1000";
 $package_name="MTN SME 1GB";
 $planCode=10;
 }

 if ($plan_id==2000){
 $service_price=$mtnsme_2;
 $service="mtn-sme";
 $databyte="2000";
 $package_name="MTN SME 2GB";
 $planCode=20;
 }

 if ($plan_id==3000){
 $service_price=$mtnsme_3;
 $service="mtn-sme";
 $databyte="3000";
 $package_name="MTN SME 3GB";
 $planCode=30;
 }

 if ($plan_id==5000){
 $service_price=$mtnsme_5;
 $service="mtn-sme";
 $databyte="5000";
 $package_name="MTN SME 5GB";
 $planCode=50;
 }

 if ($plan_id==10000){
 $service_price=$mtnsme_10;
 $service="mtn-sme";
 $databyte="10000";
 $package_name="MTN SME 10GB";
 $planCode=100;
 }



 if ($account_balance >= $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://salabebdata.com/api/buydata.php?api_key=aa7d646df6c73b7da1b01902538061de&network=MTN&plans='.$planCode
.'&phonenumber='.$mobile_no.'&return_url=https://salabebdata.com',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    // 'Authorization: Token 8f00fa816b1e3b485baca8f44ae5d361ef803311',
    'Content-Type:  application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$xx=json_decode($response,true);
$status=$xx['status'];
$message=$xx['msg'];
$api_reference=$xx['reference'];

  if ($status=='success' || $status == 'pending' || $status == 'proccessing'){

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no.'('.$message.')');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

// mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$mdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$mdata_comm;
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
    'message' => 'MTN-SME data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>