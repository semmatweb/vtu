<?php

if ($plan_code==501){

   $volume="750MB";
   $NETORKID=2;             
   $PLANID=61;
   $amount=$air750mb;
}

   if ($plan_code==502){

   $volume="1.5GB";
   $NETORKID=2;             
   $PLANID=62;
   $amount=$air1gb;

}

   if ($plan_code==503){

   $volume="2GB";
   $NETORKID=2;             
   $PLANID=63;
   $amount=$air2gb;

}

   if ($plan_code==504){

   $volume="3GB";
   $NETORKID=2;             
   $PLANID=64;
   $amount=$air3gb;

}

   if ($plan_code==505){

   $volume="4.5GB";
   $NETORKID=2;             
   $PLANID=65;
   $amount=$air4gb;

}

   if ($plan_code==506){

   $volume="6GB";
   $NETORKID=2;             
   $PLANID=66;
   $amount=$air6gb;

}

   if ($plan_code==507){

   $volume="10GB";
   $NETORKID=2;             
   $PLANID=67;
   $amount=$air8gb;

}

   if ($plan_code==508){

   $volume="11GB";
   $NETORKID=2;             
   $PLANID=68;
   $amount=$air11gb;

}

   if ($plan_code==509){

   $volume="15GB";
   $NETORKID=2;             
   $PLANID=69;
   $amount=$air15gb;

}

   if ($plan_code==510){

   $volume="40GB";
   $NETORKID=2;             
   $PLANID=70;
   $amount=$air40gb;

}

   if ($plan_code==511){

   $volume="75GB";
   $NETORKID=2;             
   $PLANID=71;
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


$postdata=array(
'networkId' => $NETORKID,
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