<?php

require("../functions/web_config.php");

$MONNIFY_SIGNATURE = $_SERVER['HTTP_MONNIFY_SIGNATURE'];

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=time();

$DEFAULT_MERCHANT_CLIENT_SECRET="$monnify_sk"; // SK

$json = file_get_contents('php://input');
$data = json_decode($json);

 $amountPaid=$data->eventData->amountPaid;
 $totalPayable=$data->eventData->totalPayable;
 $paidOn=$data->eventData->paidOn;
 $paymentReference=$data->eventData->paymentReference;
 $transactionReference=$data->eventData->transactionReference;
 $reference=$data->eventData->product->reference;
 $type=$data->eventData->product->type;
 $paymentDescription=$data->eventData->paymentDescription;
  
 $code=$data->eventData->offlineProductInformation->code;//
 $type2=$data->eventData->offlineProductInformation->type;//
 $paymentMethod=$data->eventData->paymentMethod;
 $currency=$data->eventData->currency;
 $settlementAmount=$data->eventData->settlementAmount;
 $paymentStatus=$data->eventData->paymentStatus;
 $customer_email=$data->eventData->customer->email;
 $pay_name=$data->eventData->customer->name;
 $eventType=$data->eventType;

 class CustomTransactionHashUtil {

    public static function computeSHA512TransactionHash($stringifiedData, $clientSecret) {
      $computedHash = hash_hmac('sha512', $stringifiedData, $clientSecret);
      return $computedHash;
    }
}

$data_decod=$json;
$computedHash = CustomTransactionHashUtil::computeSHA512TransactionHash($data_decod, $DEFAULT_MERCHANT_CLIENT_SECRET);

if ($MONNIFY_SIGNATURE == $computedHash && $amountPaid > 50){
    
    $amount1=$amountPaid*1.075/100;
    $final_amount=ceil($amountPaid-$amount1);
    
 $cx_trx=mysqli_query($con, "SELECT user_amount, sys_ref FROM deposit_transactions WHERE user_amount='".$final_amount."' AND sys_ref='".$transactionReference."'");
    
  if (mysqli_num_rows($cx_trx)<1){
      
 $api_reference=strtoupper("MY".$timexx.uniqid().rand(10000, 90000));

  $cbal = mysqli_fetch_array(mysqli_query($con, "SELECT wallets,username, mobile, level FROM users WHERE email='".$customer_email."'"));
            
      $walletBal=$cbal[0];
      $username=$cbal[1];
      $userMobile=$cbal[2];
      $userType=$cbal[3];
      
      
      
       $checker2="SELECT percentage FROM `referal_percentage` WHERE `id`=1";
          $result22 = mysqli_query($con, $checker2);  
          $row22 = mysqli_fetch_array($result22);
      $percentage=$row22['percentage'];
      
      
      
      
      
      
      
      
      
    $checker="SELECT * FROM `referal_link` WHERE `email`='$customer_email'";
          $result2 = mysqli_query($con, $checker);  
          $row2 = mysqli_fetch_array($result2);
          
      //  $referal_username=$row2['referal_username'];
      
      
      /*  $sender_email="abass@gmail.com";
                $message="Customer Email is $customer_email while percentage is $percentage and status is  ".$row2['status'];
                $name="abass";
                $headers = "From: $sender_email " . "\r\n" ."CC:$name";
                 mail('dacodingsalafi@gmail.com','Dacodingsalaf you have message from',$message,$headers);
                */
      
      
        if($row2['status']=='no'&&$row2['amount']==0){
            
    $percentage_money=intval($final_amount)*(intval($percentage)/100);
    
      mysqli_query($con, "UPDATE referal_link SET amount='$percentage_money' WHERE email='$customer_email' ");
        
            
        }
      
    
    





$NewBal=$walletBal+$final_amount;
    $order_descr='Wallet funding of N'.$final_amount.' was successful...';

   mysqli_query($con, "UPDATE users SET wallets='$NewBal' WHERE email='$customer_email'");

   mysqli_query($con, "INSERT INTO `deposit_transactions` (`id`, `user_email`, `user_username`, `user_service`, `user_amount`, `user_prebal`, `user_postbal`, `user_descr`, `user_status`, `user_date`, `timestring`, `sys_ref`, `api_ref`, `pay_gateway`, `api_report`, `cashier`) VALUES (NULL, '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', '$transactionReference', '$api_reference', 'MONNIFY', 'GOOD', '$customer_email')");

   mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`) VALUES (NULL, '$userMobile', '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', 'AUTO', '$userType', '$transactionReference', '$api_reference', 'GOOD')");
            
    }
    
    else{
        
        exit();
    }
}
else{
    
exit();

}


?>