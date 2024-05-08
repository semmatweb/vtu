<?php

if ($plan_code==500){

   $volume="500MB";
   $plan_id=212;
   $amount=$mtn500mb;
}

   if ($plan_code==1000){

   $volume="1GB";
   $plan_id=208;
   $amount=$mtn1gb;

}

   if ($plan_code==2000){

   $volume="2GB";
   $plan_id=209;
   $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $volume="3GB";
   $plan_id=210;
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $volume="5GB";
   $plan_id=211;
   $amount=$mtn5gb;

}

   if ($plan_code==10000){

   $volume="10GB";
   $plan_id=43;
   $amount=$mtn10gb;

}

   if ($plan_code==15000){

   $volume="15GB";
   $plan_id='';
   $amount=$mtn15gb;

}

   if ($plan_code==20000){

   $volume="20GB";
   $plan_id='';
   $amount=$mtn20gb;

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
'plan' => $plan_id,
'mobile_number' => $mobile,
'Ported_number' => true

);

$url = "https://www.bwsub.com/api/data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Token  fe74e70dfdea0abcb3e6f0c47b60b86fa099ca66',
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