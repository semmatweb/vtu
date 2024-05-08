<?php

require("../config.php");

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A"); 

$result = array();
$url = 'https://api.paystack.co/transaction/verify/'. $_GET['reference'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
    $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '.$paystack_sk.'']
);
$request = curl_exec($ch);
curl_close($ch);
$result = json_decode($request, true);

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {

 $status=$result['data']['status'];
 $trans_amount=$result['data']['amount']/100;
 $customer_email=$result['data']['customer']['email'];
 $trans_reference=$result['data']['reference'];

 $chargeback=$trans_amount*2.0/100;
 $final_amount=ceil($trans_amount-$chargeback);

 $cx_trx=mysqli_query($db, "SELECT * FROM mytransaction WHERE amount='$final_amount' AND trx='$trans_reference' AND email='$customer_email'");
    
  if (mysqli_num_rows($cx_trx)<1){

  $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email FROM users WHERE emailR='".$customer_email."'"));
            
      $oldbal = $cbal[0];
      $username=$cbal[1];
      
    $newbal=$oldbal+$final_amount;

    mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$customer_email."'");

     mysqli_query($db, "INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`, `oldbal`, `newbal`) VALUES (NULL, '".$customer_email."', '".$username."', '".$final_amount."', 'ATM Funding', 'Successful', '".$time."', 'WEB', '".$trans_reference."', '".$oldbal."', '".$newbal."') ");

   header("Location:history");
   exit();

    }

 else{

 header("Location:history");
 mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='$customer_email'");
 exit();

 }
	

}


else{
	
 header("Location:history");
 exit();

}


?>