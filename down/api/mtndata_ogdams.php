<?php

  if ($plan_code==500){

    $server=500*1;
    $NETORKID=1;
    $volume="500MB";
    $plan_code=1;
    $amount=$mtn500mb;
}

   if ($plan_code==1000){

    $server=1000*1;
    $NETORKID=1;
    $volume="1GB";
    $plan_code=2;
    $amount=$mtn1gb;

}

   if ($plan_code==2000){

    $server=2000*1;
    $NETORKID=1;
    $volume="2GB";
    $plan_code=3;
    $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $server=3000*1;
   $NETORKID=1;
   $volume="3GB";
   $plan_code=4;
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $server=5000*1;
   $NETORKID=1;
   $volume="5GB";
   $plan_code=5;
   $amount=$mtn5gb;

}

   if ($plan_code==10000){

   $server=10000*1;
   $NETORKID=1;
   $volume="10GB";
   $plan_code=109;
   $amount=$mtn10gb;

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
'networkId' => $NETORKID,
'planId' => $plan_code,
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