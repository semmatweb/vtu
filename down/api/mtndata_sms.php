<?php

if ($plan_code==500){

   $volume="500MB";
   $server="500";
   $NETORKID='MTN';
   $PLANID=3247;
   $msgt="#SM#131***SMEB ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn500mb;
}

   if ($plan_code==1000){

   $volume="1GB";
   $server="1000";
   $NETORKID='MTN';
   $PLANID=3248;
   $msgt="#SM#131***SMEC ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn1gb;

}

   if ($plan_code==2000){

   $volume="2GB";
   $server="2000";
   $NETORKID='MTN';
   $PLANID=3249;
   $msgt="#SM#131***SMED ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $volume="3GB";
   $server="3000";
   $NETORKID='MTN';
   $PLANID=3252;
   $msgt="#SM#131***SMEF ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $volume="5GB";
   $server="5000";
   $NETORKID='MTN';
   $PLANID=3250;
   $msgt="#SM#131***SMEE ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn5gb;

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
        "to"=>$mtn_n,
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