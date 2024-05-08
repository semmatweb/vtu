<?php

if ($plan_code==301){

  $volume="1.05GB";
  $NETORKID='GLO';
  $PLANID=194;
  $amount=$glo1gb;
}


if ($plan_code==302){

   $volume="2.5GB";
     $NETORKID='GLO';
     $PLANID=195;
   $amount=$glo2gb;
}

   if ($plan_code==303){
   
   $volume="4.5GB";
     $NETORKID='GLO';
     $PLANID=196;
   $amount=$glo4gb;
}

   if ($plan_code==304){
  
  $volume="7.7GB";
      $NETORKID='GLO';
     $PLANID=198;
  $amount=$glo7gb;

}

   if ($plan_code==305){

   $volume="10GB";
     $NETORKID='GLO';
     $PLANID=199;
   $amount=$glo10gb;

}

 if ($plan_code==306){
   
   $volume="13.25GB";
     $NETORKID='GLO';
     $PLANID=200;
   $amount=$glo13gb;

}

 if ($plan_code==307){
  
  $volume="18.25GB";
     $NETORKID='GLO';
     $PLANID=202;
  $amount=$glo18gb;

}

 if ($plan_code==308){
   
     $volume="29.5GB";
     $NETORKID='GLO';
     $PLANID=202;
     $amount=$glo29gb;

}

if ($plan_code==309){
   
     $volume="50GB";
     $NETORKID='GLO';
     $PLANID=203;
     $amount=$glo50gb;

}

if ($plan_code==310){
   
     $volume="5.8GB";
     $NETORKID='GLO';
     $PLANID=197;
     $amount=$glo5gb;

}

if ($plan_code==311){
   
     $volume="93GB";
     $NETORKID='GLO';
     $PLANID=204;
     $amount=$glo93gb;

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
$time2=strtolower($dateTime->format("d-M-y"));

$newbal = $balance-$amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");

$string_message=$NETORKID." ".$volume." TO ".$mobile; 
 $request = array(
        "user"=>$holla_user,
        "pass"=>$holla_pass,
        "from"=>$sitetitle,
        "to"=>$glo_n,
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