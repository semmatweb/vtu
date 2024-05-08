<?php


if ($network_code==601){

   $volume="100MB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=216;
   $amount=$air100mb;
}

if ($network_code==602){

   $volume="300MB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=222;
   $amount=$air300mb;
}

if ($network_code==603){
   
   $volume="500MB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=223;
   $amount=$air500mb;
}

   if ($network_code==604){
  
   $volume="1GB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=217;
   $amount=$air1gb;

}

if ($network_code==605){

   $volume="2GB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=224;
   $amount=$air2gb;

}

if ($network_code==606){
   
   $volume="5GB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=225;
   $amount=$air5gb;

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
'network' => 4,
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
    'Authorization: Token  d5afa0e06c9f64c2eb77a9f9eb97682a34a2a8c3',
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