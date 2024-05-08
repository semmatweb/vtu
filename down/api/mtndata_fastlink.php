<?php

if ($plan_code==500){

   $volume="500MB";
   $server="500";
   $NETORKID='MTN';
   $PLANID=6;
   $msgt="#SM#131***SMEB ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn500mb;
}

   if ($plan_code==1000){

   $volume="1GB";
   $server="1000";
   $NETORKID='MTN';
   $PLANID=7;
   $msgt="#SM#131***SMEC ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn1gb;

}

   if ($plan_code==2000){

   $volume="2GB";
   $server="2000";
   $NETORKID='MTN';
   $PLANID=8;
   $msgt="#SM#131***SMED ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $volume="3GB";
   $server="3000";
   $NETORKID='MTN';
   $PLANID=43;
   $msgt="#SM#131***SMEF ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $volume="5GB";
   $server="5000";
   $NETORKID='MTN';
   $PLANID=11;
   $msgt="#SM#131***SMEE ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn5gb;

}


   if ($plan_code==10000){

   $volume="10GB";
   $server="10000";
   $NETORKID='MTN';
   $PLANID=226;
   $msgt="#SM#131***SMEG ".$mobile." ".$server." "."".$simpin."";
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
'network' => 1,
'plan' => $PLANID,
'mobile_number' => $mobile,
'Ported_number' => true
);

$url = "https://www.fastlink.com.ng/api/data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Token  e357e3e8fd336ae60fb45b313bd79b31e6fd6b23',
    'Content-Type: application/json'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);
$xx=json_decode($request, true);
$status=$xx['Status'];

if ($status=="successful"){


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