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
 $planCode=1000;
 }

 if ($plan_id==2000){
 $service_price=$mtnsme_2;
 $service="mtn-sme";
 $databyte="2000";
 $package_name="MTN SME 2GB";
 $planCode=2000;
 }

 if ($plan_id==3000){
 $service_price=$mtnsme_3;
 $service="mtn-sme";
 $databyte="3000";
 $package_name="MTN SME 3GB";
 $planCode=3000;
 }

 if ($plan_id==5000){
 $service_price=$mtnsme_5;
 $service="mtn-sme";
 $databyte="5000";
 $package_name="MTN SME 5GB";
 $planCode=5000;
 }

 if ($plan_id==10000){
 $service_price=$mtnsme_10;
 $service="mtn-sme";
 $databyte="10000";
 $package_name="MTN SME 10GB";
 $planCode=1000;
 }



 if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$request_msg=($package_name." TO ".$mobile_no);  
$request = array(
        "user"=>$sms_username,
        "pass"=>$sms_password,
        "from"=> $sms_sender,
        "type"=> "NORMAL",
        "to"=> $mtn_n,
        "msg"=> $request_msg,
);

$url = 'https://sms.hollatags.com/api/send/'; //this is the url of the gateway's interface
$ch = curl_init(); //initialize curl handle
curl_setopt($ch, CURLOPT_URL, $url); //set the url
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request)); //set the POST variables
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
curl_setopt($ch, CURLOPT_POST, 1); //set POST method
$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
curl_close($ch); //close the curl handle

if ($response=="sent"){

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no);

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