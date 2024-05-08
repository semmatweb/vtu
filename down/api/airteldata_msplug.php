<?php

if ($plan_code==501){

   $volume="750MB";
   $NETORKID='AIRTEL';             
   $PLANID='';
   $amount=$air750mb;
}

   if ($plan_code==502){

   $volume="1.5GB";
   $NETORKID='AIRTEL';             
   $PLANID=3035;
   $amount=$air1gb;

}

   if ($plan_code==503){

   $volume="2GB";
   $NETORKID='AIRTEL';             
   $PLANID=3036;
   $amount=$air2gb;

}

   if ($plan_code==504){

   $volume="3GB";
   $NETORKID='AIRTEL';             
   $PLANID=3037;
   $amount=$air3gb;

}

   if ($plan_code==505){

   $volume="4.5GB";
   $NETORKID='AIRTEL';             
   $PLANID=3038;
   $amount=$air4gb;

}

   if ($plan_code==506){

   $volume="6GB";
   $NETORKID='AIRTEL';             
   $PLANID=3039;
   $amount=$air6gb;

}

   if ($plan_code==507){

   $volume="10GB";
   $NETORKID='AIRTEL';             
   $PLANID=3040;
   $amount=$air8gb;

}

   if ($plan_code==508){

   $volume="11GB";
   $NETORKID='AIRTEL';             
   $PLANID=3041;
   $amount=$air11gb;

}

   if ($plan_code==509){

   $volume="15GB";
   $NETORKID='AIRTEL';             
   $PLANID=3042;
   $amount=$air15gb;

}

   if ($plan_code==510){

   $volume="40GB";
   $NETORKID='AIRTEL';             
   $PLANID=3043;
   $amount=$air40gb;

}

   if ($plan_code==511){

   $volume="75GB";
   $NETORKID='AIRTEL';             
   $PLANID=3053;
   $amount=$air75gb;

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


$webhook_url="https://salabeb.com/0/msplug.php";
$postdata = array(
    'network' => $NETORKID,
    'plan_id' => $PLANID,
    'phone' => $mobile,
    'device_id' => $airtel_device,
    'sim_slot' => $airtel_slot,
    'request_type' => $airtel_string,
    'webhook_url' => $webhook_url
);

$url = "https://www.msplug.com/api/buy-data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Token f8eb09efc0e0b217508af7236a122ddfddc2251c',
    'Content-Type: application/json',
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
curl_close($ch);
    
if ($response) {

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