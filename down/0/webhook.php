<?php

require ("../config.php");

$MONNIFY_SIGNATURE = $_SERVER['HTTP_MONNIFY_SIGNATURE'];

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$DEFAULT_MERCHANT_CLIENT_SECRET="$monnify_sk";

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
 $pay_email=$data->eventData->customer->email;
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

if ($MONNIFY_SIGNATURE == $computedHash){
    
    $amount1=50;
    $amount2=$amountPaid-$amount1;
    
    $cx_trx=mysqli_query($db, "SELECT amount, trx FROM mytransaction WHERE amount='".$amount2."' AND trx='".$transactionReference."'");  
    
    if (mysqli_num_rows($cx_trx)<1){
        
    $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email FROM users WHERE emailR='".$pay_email."'"));
            
    $oldbal = $cbal[0];
    $username=$cbal[1];
     
    $newbal=$oldbal+$amount2;
            
    mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$pay_email."'");

    mysqli_query($db, "INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`, `oldbal`, `newbal`) VALUES (NULL, '".$pay_email."', '".$username."', '".$amount2."', 'Auto Funding', 'Credited', '".$time."', 'WEB', '".$transactionReference."', '".$oldbal."', '".$newbal."') ");
            
    }
    
    else{
        
        exit();
    }
}
else{
    
exit();

}


?>