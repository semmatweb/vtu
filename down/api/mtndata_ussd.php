<?php

if ($plan_code==500){

   $volume="500MB";
   $server="500";
   $NETORKID='MTN';
   $PLANID=60;
   $msgt="#SM#131***SMEB ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn500mb;
}

   if ($plan_code==1000){

   $volume="1GB";
   $server="1000";
   $NETORKID='MTN';
   $PLANID=51;
   $msgt="#SM#131***SMEC ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn1gb;

}

   if ($plan_code==2000){

   $volume="2GB";
   $server="2000";
   $NETORKID='MTN';
   $PLANID=50;
   $msgt="#SM#131***SMED ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $volume="3GB";
   $server="3000";
   $NETORKID='MTN';
   $PLANID=49;
   $msgt="#SM#131***SMEF ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $volume="5GB";
   $server="5000";
   $NETORKID='MTN';
   $PLANID=44;
   $msgt="#SM#131***SMEE ".$mobile." ".$server." "."".$simpin."";
   $amount=$mtn5gb;

}


   if ($plan_code==10000){

   $volume="10GB";
   $server="10000";
   $NETORKID='MTN';
   $PLANID=150;
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

        $baseurl = "https://ussd.simhosting.ng/api/ussd/?";
        $ussdArray = array (
          "ussd"=> $msgt,
          "servercode" => 'HQ6A3CUK572ORMWT4EBT',
          "token" => 'AdkQnv16ID1Yb7o0DMsuNOZG5nopmfIuCJ8hST5lnkA5YLhkfV',
          "refid" => $request_id,
        
         ); 
        $params = http_build_query($ussdArray); 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL,$baseurl); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
        $response = curl_exec($ch); curl_close($ch); 
    
  if ($response){


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