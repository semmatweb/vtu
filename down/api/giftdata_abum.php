<?php

if ($plan_code==500){

   $volume="500MB";
   $plan_id=500;
   $amount=$mtn500mb;
}

   if ($plan_code==1000){

   $volume="1GB";
   $plan_id=1000;
   $amount=$mtn1gb;

}

   if ($plan_code==2000){

   $volume="2GB";
   $plan_id=2000;
   $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $volume="3GB";
   $plan_id=3000;
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $volume="5GB";
   $plan_id=5000;
   $amount=$mtn5gb;

}

   if ($plan_code==10000){

   $volume="10GB";
   $plan_id=10000;
   $amount=$mtn10gb;

}

   if ($plan_code==15000){

   $volume="15GB";
   $plan_id=15000;
   $amount=$mtn15gb;

}

   if ($plan_code==20000){

   $volume="20GB";
   $plan_id=20000;
   $amount=$mtn20gb;

}


if ($balance<$amount){

	$sec=array(
		'code'=>'800', ////// 
		'status'=>'error', ////// 
		'desc' =>'Wallet Balance Low For This Tranasaction',
	);

	echo json_encode($sec);
  exit();

}

else {

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$newbal = $balance-$amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");


$url='https://abumpay.com/api/gifting?apiToken=e5f0fa0dc39526c11a1fb4bcbf398f6a7699b3e7047397cd0c559173ddc27a8e801bf6e8c8859d5ed7f9a4cc11a09a6f3c1b5cfb85503ecbe302b3e016ba5af5&network=GIFTING&mobile='.$mobile.'&network_code='.$plan_id.'&ref='.$request_id.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$char=json_decode($response, true);
$status=$char['code'];

if ($status==200){

   $descr=strtoupper($network).' '.$volume.' purchase successfully on '.$mobile;

     mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."')");

   $sec=array(
    'code'=>'200', //// Tranasction Success
    'status'=>'success',
    'desc' =>$descr,
  );
  echo json_encode($sec);
  exit();
 }


 else{

 $newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

 $descr2='Unsuccessful '.strtoupper($network).' '.$volume.' on '.$mobile;

 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

$sec=array(
    'code'=>'900', ////Transaction failed
    'code'=>'fail',
    'desc'=> $descr2,
  );
  echo json_encode($sec);
  exit();

}
}



?>