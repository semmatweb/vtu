<?php

if ($plan_code==301){

  $volume="1.05GB";
  $NETORKID='GLO';
  $PLANID=3056;
  $amount=$glo1gb;
}


if ($plan_code==302){

   $volume="2.5GB";
     $NETORKID='GLO';
     $PLANID=3057;
   $amount=$glo2gb;
}

   if ($plan_code==303){
   
   $volume="4.5GB";
     $NETORKID='GLO';
     $PLANID=3058;
   $amount=$glo4gb;
}

   if ($plan_code==304){
  
  $volume="7.7GB";
      $NETORKID='GLO';
     $PLANID=3060;
  $amount=$glo7gb;

}

   if ($plan_code==305){

   $volume="10GB";
     $NETORKID='GLO';
     $PLANID=3061;
   $amount=$glo10gb;

}

 if ($plan_code==306){
   
   $volume="13.25GB";
     $NETORKID='GLO';
     $PLANID=3062;
   $amount=$glo13gb;

}

 if ($plan_code==307){
  
  $volume="18.25GB";
     $NETORKID='GLO';
     $PLANID=3063;
  $amount=$glo18gb;

}

 if ($plan_code==308){
   
     $volume="29.5GB";
     $NETORKID='GLO';
     $PLANID=3064;
     $amount=$glo29gb;

}

if ($plan_code==309){
   
     $volume="50GB";
     $NETORKID='GLO';
     $PLANID=3065;
     $amount=$glo50gb;

}

if ($plan_code==310){
   
     $volume="5.8GB";
     $NETORKID='GLO';
     $PLANID=3059;
     $amount=$glo5gb;

}

if ($plan_code==311){
   
     $volume="93GB";
     $NETORKID='GLO';
     $PLANID=3066;
     $amount=$glo93gb;

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
$time2=strtolower($dateTime->format("d-M-y"));

$newbal = $balance-$amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");

$webhook_url="https://salabeb.com/0/msplug.php";
$postdata = array(
    'network' => $NETORKID,
    'plan_id' => $PLANID,
    'phone' => $mobile,
    'device_id' => $glo_device,
    'sim_slot' => $glo_slot,
    'request_type' => $glo_string,
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