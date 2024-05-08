<?php

if ($plan_code==401){

   $volume="500MB";
   $NETORKID='ETISALAT';
   $PLANID=3266;
   $amount=$mb500mb;
}

   if ($plan_code==402){

   $volume="1.5GB";
   $NETORKID='ETISALAT';
   $PLANID=3267;
   $amount=$mb1gb;

}

   if ($plan_code==403){

   $volume="2GB";
   $NETORKID='ETISALAT';
   $PLANID=3268;
   $amount=$mb2gb;

}

   if ($plan_code==404){

   $volume="3GB";
   $NETORKID='ETISALAT';
   $PLANID=3269;
   $amount=$mb3gb;

}

   if ($plan_code==405){

   $volume="4.5GB";
   $NETORKID='ETISALAT';
   $PLANID=3270;
   $amount=$mb4gb;

}

   if ($plan_code==406){

   $volume="11GB";
   $NETORKID='ETISALAT';
   $PLANID=3271;
   $amount=$mb11gb;

}

   if ($plan_code==407){

   $volume="15GB";
   $NETORKID='ETISALAT';
   $PLANID=3272;
   $amount=$mb15gb;

}

   if ($plan_code==408){

   $volume="40GB";
   $NETORKID='ETISALAT';
   $PLANID=3273;
   $amount=$mb40gb;

}

   if ($plan_code==409){

   $volume="75GB";
   $NETORKID='ETISALAT';
   $PLANID=3274;
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

$string_message=$NETORKID." ".$volume." TO ".$mobile; 
 $request = array(
        "user"=>$holla_user,
        "pass"=>$holla_pass,
        "from"=>$sitetitle,
        "to"=>$mobile_n,
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