<?php


if ($network_code==601){

   $volume="100MB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=601;
   $amount=$air100mb;
}

if ($network_code==602){

   $volume="300MB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=602;
   $amount=$air300mb;
}

if ($network_code==603){
   
   $volume="500MB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=603;
   $amount=$air500mb;
}

   if ($network_code==604){
  
   $volume="1GB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=604;
   $amount=$air1gb;

}

if ($network_code==605){

   $volume="2GB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=605;
   $amount=$air2gb;

}

if ($network_code==606){
   
   $volume="5GB";
   $NETORKID='AIRTEL-CG';             
   $PLANID=606;
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

$url='https://abumpay.com/api/airtel_cg?apiToken=e5f0fa0dc39526c11a1fb4bcbf398f6a7699b3e7047397cd0c559173ddc27a8e801bf6e8c8859d5ed7f9a4cc11a09a6f3c1b5cfb85503ecbe302b3e016ba5af5&network=AIRTEL-CG&mobile='.$mobile.'&network_code='.$PLANID.'&ref='.$request_id.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xx=json_decode($response);
$status=$xx->code;

if ($status==200){

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