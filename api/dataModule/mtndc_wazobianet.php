<?php
if ($mtndc_access > 0){

require ("../functions/mtndc_price.php");

if ($plan_id==10){
 $service_price=$mtndc_1;
 $service="mtn-dc";
 $databyte="500";
 $package_name="MTN DC 1.0GB";
 $planCode=96;
 }

 if ($plan_id==15){
 $service_price=$mtndc_15;
 $service="mtn-dc";
 $databyte="1000";
 $package_name="MTN DC 1.50GB";
 $planCode=97;
 }

 if ($plan_id==20){
 $service_price=$mtndc_2;
 $service="mtn-dc";
 $databyte="2000";
 $package_name="MTN DC 2.0GB";
 $planCode=98;
 }

 if ($plan_id==30){
 $service_price=$mtndc_3;
 $service="mtn-dc";
 $databyte="3000";
 $package_name="MTN DC 3.0GB";
 $planCode=99;
 }

 if ($plan_id==50){
 $service_price=$mtndc_5;
 $service="mtn-dc";
 $databyte="5000";
 $package_name="MTN DC 5.0GB";
 $planCode=100;
 }

 if ($plan_id==100){
 $service_price=$mtndc_10;
 $service="mtn-dc";
 $databyte="10000";
 $package_name="MTN DC 10.0GB";
 $planCode=101;
 }


 if ($account_balance >= $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");


$url = "https://wazobianet.com/api/data/";
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array(
"network_id"=>"1",
"plan_id"=>"$planCode",
"phone_number"=>"$mobile_no",
"ported"=> false
));

curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization: Token fc23f2c7913db5a8a3876d59c3fc34a8cc3f2166', 'Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$response = curl_exec($ch);
curl_close($ch);
$xx=json_decode($response,true);

$status=$xx['status'];
$message=$xx['message'];
// $CUS_Name=$xx['name_on_card'];
// $data_cards=$xx['data_cards'];
$api_reference=$xx['transaction_id'];
$cards_info = '';

// foreach ($data_cards as $card) {
//     $cards_info .= 'PIN: ' . $card['pin'] . ', Serial No: ' . $card['serial_no'] . ', Reference: ' . $card['ref'] . '<br>';
// }



 if ($status =='successful' || $status=='processing'){

// N'.$service_price.'

$order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no.'('.$message.')');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$cards_info', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

 //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$acdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

  //$new_bonus=$account_bonus+$acdata_comm;
 //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
	'old_balance'=> $account_balance, ////// 
	'new_balance'=> $new_wallet, ////// 
	'time' => $time,
    // 'amountPaid' => $service_price,
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
    'message' => 'MTN-DC data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>