<?php

require("session.php");
error_reporting();

if ($_SERVER['HTTP_REFERER'] != $baseurl."/buyAirtime"){
    
    $cilu=$_SERVER['HTTP_REFERER'];
    $reason="Airtime";
    
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    
     require("fraud.php");
  
 header("location:logout");
 exit();
 
 
}

else{

$airtimetype=mysqli_real_escape_string($db, $_POST['airtimetype']);
$amount=mysqli_real_escape_string($db, $_POST['amount']);
$network=mysqli_real_escape_string($db, $_POST['network']);
$phone=mysqli_real_escape_string($db, $_POST['phone']);
$Xamount=preg_replace('/\D+/', '', $amount);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(rand(100,900).uniqid()."AP");

if ($network=="MTN" && $airtimetype=="VTU"){$discount=$m_discount;}
if ($network=="GLO" && $airtimetype=="VTU"){$discount=$g_discount;}
if ($network=="AIRTEL" && $airtimetype=="VTU"){$discount=$a_discount;}
if ($network=="ETISALAT" && $airtimetype=="VTU"){$discount=$mo_discount;}

$purchase_discount=$Xamount*$discount/100;
$amount_to_pay=$Xamount-$purchase_discount;

if ($amount_to_pay<$mallu){

  $descr=$network."  ".$Xamount." Airtime Purchase on ".$phone;
	$newbal=$mallu-$amount_to_pay;
	$debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

	$save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '".$network."', '".$descr."', '".$phone."', '".$sid."', '".$email."', '".$amount_to_pay."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."')");

	if ($save_pre_order){

	mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

	require("billing_airtime.php");


}

else{
 
 $reason="Buypassing Airtime Storage Table";
 require("fraud.php");
 exit();
}
}

else{

    echo "Airtime Purchase Fail Due To Insufficient Fund"; //Insufficient
    exit();
}




}



?>