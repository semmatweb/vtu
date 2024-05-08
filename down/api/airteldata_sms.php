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
   $PLANID=3257;
   $amount=$air1gb;

}

   if ($plan_code==503){

   $volume="2GB";
   $NETORKID='AIRTEL';             
   $PLANID=3258;
   $amount=$air2gb;

}

   if ($plan_code==504){

   $volume="3GB";
   $NETORKID='AIRTEL';             
   $PLANID=3259;
   $amount=$air3gb;

}

   if ($plan_code==505){

   $volume="4.5GB";
   $NETORKID='AIRTEL';             
   $PLANID=3260;
   $amount=$air4gb;

}

   if ($plan_code==506){

   $volume="6GB";
   $NETORKID='AIRTEL';             
   $PLANID=3261;
   $amount=$air6gb;

}

   if ($plan_code==507){

   $volume="8GB";
   $NETORKID='AIRTEL';             
   $PLANID=3262;
   $amount=$air8gb;

}

   if ($plan_code==508){

   $volume="11GB";
   $NETORKID='AIRTEL';             
   $PLANID=3263;
   $amount=$air11gb;

}

   if ($plan_code==509){

   $volume="15GB";
   $NETORKID='AIRTEL';             
   $PLANID=3264;
   $amount=$air15gb;

}

   if ($plan_code==510){

   $volume="40GB";
   $NETORKID='AIRTEL';             
   $PLANID=3265;
   $amount=$air40gb;

}

   if ($plan_code==511){

   $volume="75GB";
   $NETORKID='AIRTEL';             
   $PLANID=3266;
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

$string_message=$NETORKID." ".$volume." TO ".$mobile; 
 $request = array(
        "user"=>$holla_user,
        "pass"=>$holla_pass,
        "from"=>$sitetitle,
        "to"=>$airtel_n,
        "msg"=>$string_message,
);

$url = 'https://sms.hollatags.com/api/send/'; //this is the url of the gateway's interface
$ch = curl_init(); //initialize curl handle
curl_setopt($ch, CURLOPT_URL, $url); //set the url
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request)); //set the POST variables
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
curl_setopt($ch, CURLOPT_POST, 1); //set POST method
$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
curl_close($ch);

if ($response=="sent"){

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