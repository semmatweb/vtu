<?php

$service_price=$amount;

if ($cashback_balance >= $service_price && $service_price > 0){

$new_bonus=$cashback_balance-$service_price;
$new_wallet=$account_balance+$service_price;
$setNew=mysqli_query($con, "UPDATE users SET wallets='$new_wallet', cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

if ($setNew){

 $order_report=strtoupper('N'.$service_price.' disbursed successful to your wallet !!!');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', 'WITHDRAWTOWALLET', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
	'old_balance'=> $account_balance, ////// 
	'new_bal'=> $new_wallet, ////// 
	'time' => $time,
    'amountPaid' => $service_price,
	'message' => $order_report,
    );
    echo json_encode($response);
    exit;


}

else{

 $order_report=strtoupper('Disbursment of  N'.$service_price.' failed on process to your wallet !!!');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', 'WITHDRAWTOWALLET', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

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
    'message' => 'Your commission is too low for this transaction !!!',
    );
    echo json_encode($response);
    exit;
}

?>