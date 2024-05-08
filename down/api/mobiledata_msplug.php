<?php

if ($plan_code==401){

   $volume="500MB";
   $NETORKID='ETISALAT';
   $PLANID=3044;
   $amount=$mb500mb;
}

   if ($plan_code==402){

   $volume="1.5GB";
   $NETORKID='ETISALAT';
   $PLANID=3045;
   $amount=$mb1gb;

}

   if ($plan_code==403){

   $volume="2GB";
   $NETORKID='ETISALAT';
   $PLANID=3046;
   $amount=$mb2gb;

}

   if ($plan_code==404){

   $volume="3GB";
   $NETORKID='ETISALAT';
   $PLANID=3047;
   $amount=$mb3gb;

}

   if ($plan_code==405){

   $volume="4.5GB";
   $NETORKID='ETISALAT';
   $PLANID=3048;
   $amount=$mb4gb;

}

   if ($plan_code==406){

   $volume="11GB";
   $NETORKID='ETISALAT';
   $PLANID=3049;
   $amount=$mb11gb;

}

   if ($plan_code==407){

   $volume="15GB";
   $NETORKID='ETISALAT';
   $PLANID=3050;
   $amount=$mb15gb;

}

   if ($plan_code==408){

   $volume="40GB";
   $NETORKID='ETISALAT';
   $PLANID=3051;
   $amount=$mb40gb;

}

   if ($plan_code==409){

   $volume="75GB";
   $NETORKID='ETISALAT';
   $PLANID=3052;
   $amount=$mb75gb;

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
    'device_id' => $mobile_device,
    'sim_slot' => $mobile_slot,
    'request_type' => $mobile_string,
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