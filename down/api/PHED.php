<?php
	
$discount=$amount*$phed/100;
$final_amount=$amount-$discount;

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

if ($adminbal<$final_amount){

		$sec=array(
		'code'=>'900', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Error Please Kindly Contact Admin',
	);

	echo json_encode($sec);
  exit();
}

else{

	if ($balance < $final_amount){

			$sec=array(
		'code'=>'800', ////// 
		'status'=>'error', ////// 
		'desc' =>'Wallet Balance Low For This Tranasaction',
	);

	echo json_encode($sec);
  exit();
	}

	else{

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$newbal = $balance-$final_amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");


$postdata=array(
  'billersCode' => $service_number,
  'serviceID' => $service_id,
  'request_id' => $dateTime->format("YmdHi").$request_id,
  'variation_code' => $service_type,
  'amount' => $amount,
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
$rdata=json_decode($request, true);

$status=$rdata['content']['transactions']['status'];
$purchased_code=$rdata['purchased_code'];

if ($status=="delivered." || $status=="delivered"){

	 $descr="₦".$amount." ".strtoupper($service_id)." ".$service_type." on ".$service_number." (".$purchased_code.")";

mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$final_amount."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."')");

  $sec=array(
    'code'=>'200', //// Tranasction Success
    'status'=>'success',
    'value'=>$purchased_code,
    'desc' =>$descr,
  );
  echo json_encode($sec);
  exit();
    
}

else{
 
 $descr2='₦'.$amount.''.strtoupper($service_type).' Payment Unsuccessful';

  $newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");


 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

 $sec=array(
    'code'=>'900', ////Transaction failed
    'status'=>'fail',
    'value'=>'',
    'desc'=> $descr2,
  );
  echo json_encode($sec);
  exit();

}



	}
}

?>