<?php

if ($plan_code==401){

   $volume="500MB";
   $NETORKID='ETISALAT';
   $PLANID=85;
   $amount=$mb500mb;
}

   if ($plan_code==402){

   $volume="1.5GB";
   $NETORKID='ETISALAT';
   $PLANID=75;
   $amount=$mb1gb;

}

   if ($plan_code==403){

   $volume="2GB";
   $NETORKID='ETISALAT';
   $PLANID=76;
   $amount=$mb2gb;

}

   if ($plan_code==404){

   $volume="3GB";
   $NETORKID='ETISALAT';
   $PLANID=77;
   $amount=$mb3gb;

}

   if ($plan_code==405){

   $volume="4.5GB";
   $NETORKID='ETISALAT';
   $PLANID=78;
   $amount=$mb4gb;

}

   if ($plan_code==406){

   $volume="11GB";
   $NETORKID='ETISALAT';
   $PLANID=79;
   $amount=$mb11gb;

}

   if ($plan_code==407){

   $volume="15GB";
   $NETORKID='ETISALAT';
   $PLANID=80;
   $amount=$mb15gb;

}

   if ($plan_code==408){

   $volume="40GB";
   $NETORKID='ETISALAT';
   $PLANID=81;
   $amount=$mb40gb;

}

   if ($plan_code==409){

   $volume="75GB";
   $NETORKID='ETISALAT';
   $PLANID=82;
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

$postdata=array(
'networkId' => 4,
'planId' => $PLANID,
'phoneNumber' => $mobile,
'reference' => $request_id
);

$url = "https://simhosting.ogdams.ng/api/v1/vend/data";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Bearer sk_live_c30b4355-60ee-4696-82a4-f1e9583130ca',
    'Content-Type: application/json'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);

$dataX=json_decode($request);
$status=$dataX->status;

 if ($status=="true") {

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