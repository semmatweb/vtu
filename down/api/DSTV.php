<?php

if ($plan_code==801){

	$package="Dstv Yanga";
	$variation_code="dstv-yanga";
	$amount=$dstv_yanga;
}

if ($plan_code==802){

	$package="Dstv Confam";
	$variation_code="dstv-confam";
	$amount=$dstv_confam;
}

if ($plan_code==803){

	$package="Dstv Padi Extra";
	$variation_code="padi-extra";
	$amount=$dstv_padi_extra;

}

if ($plan_code==804){

	$package="Dstv Yanga Extra";
	$variation_code="yanga-extra";
	$amount=$dstv_yanga_extra;
}

if ($plan_code==805){

	$package="Dstv Asia";
	$variation_code="dstv6";
	$amount=$dstv_asia;
}

if ($plan_code==806){

	$package="Dstv Confam Extra";
	$variation_code="confam-extra";
	$amount=$dstv_confam_extra;
}

if ($plan_code==807){

	$package="Dstv Compact";
	$variation_code="dstv79";
	$amount=$dstv_compact;
}

if ($plan_code==808){

	$package="Dstv Compact Plus";
	$variation_code="dstv7";
	$amount=$dstv_compact_plus;
}

if ($plan_code==809){

	$package="Dstv Premium";
	$variation_code="dstv3";
	$amount=$dstv_premium;
}

if ($plan_code==810){

	$package="Dstv Premium Asia";
	$variation_code="dstv10";
	$amount=$dstv_premium_asia;
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

else{

 $service_url="https://vtpass.com/api/balance";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Basic '.base64_encode($vtpass_login).'',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);
$adminbal=$data['contents']['balance'];

if ($adminbal<$amount){

		$sec=array(
		'code'=>'900', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Error Please Kindly Contact Admin',
	);

	echo json_encode($sec);
  exit();
}

else{

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$time2=strtolower($dateTime->format("d-M-y"));

$newbal = $balance-$amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");

$postdata=array(
  'billersCode' => $service_number,
  'serviceID' => $service_id,
  'request_id' => $dateTime->format("YmdHi").$request_id,
  'variation_code' => $variation_code,
  'phone' => $contact_number,
);

$url ="https://vtpass.com/api/pay";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Basic '.base64_encode($vtpass_login).'',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$request = curl_exec($ch);
curl_close($ch);


if ($request){

	$descr="₦".$amount." ".strtoupper($package)." Subscribe on ".$service_number;

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`,`buyerdate`,`receiver`,`sales`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."', '".$time2."', '', '')");

  $sec=array(
    'code'=>'200', //// Tranasction Success
    'status'=>'success',
    'desc' =>$descr,
  );
  echo json_encode($sec);
  exit();

}

else{

  $descr2='₦'.$amount.''.strtoupper($package).' Payment Unsuccessful';
  $newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

 $sec=array(
    'code'=>'900', //// Tranasction Success
    'status'=>'fail',
    'desc' =>$descr2,
  );
  echo json_encode($sec);
  exit();

}

}


}


?>