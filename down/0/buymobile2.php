<?php

$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr;


if ($amounttopay > $mallu){

    echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}

else{


$newbal = $mallu-$amounttopay;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

if ($network=="9MOBILE" && $data_vo=="500"){
     $plan_id=3044;
    $msgt=("*229*2*12*".$phone."#");
}

 if ($network=="9MOBILE" && $data_vo=="15"){
     $plan_id=3045;
    $msgt=("*229*2*7*".$phone."#");
}


 if ($network=="9MOBILE" && $data_vo=="2"){
     $plan_id=3046;
    $msgt=("*229*2*25*".$phone."#");
}


 if ($network=="9MOBILE" && $data_vo=="3"){
     $plan_id=3047;
    $msgt=("*229*2*3*".$phone."#");
}


 if ($network=="9MOBILE" && $data_vo=="45"){
     $plan_id=3048;
   $msgt=("*229*2*8*".$phone."#");
}


 if ($network=="9MOBILE" && $data_vo=="11"){
     $plan_id=3049;
   $msgt=("*229*2*36*".$phone."#");
}

 if ($network=="9MOBILE" && $data_vo=="155"){
     $plan_id=3050;
   $msgt=("*229*2*37*".$phone."#");
}

 if ($network=="9MOBILE" && $data_vo=="40"){
     $plan_id=3051;
   $msgt=("*229*4*1*".$phone."#");
}

 if ($network=="9MOBILE" && $data_vo=="75"){
     $plan_id=3052;
   $msgt=("*229*2*4*".$phone."#");
}

$webhook_url="https://salabeb.com/0/msplug.php";
$postdata = array(
    'network' => $network,
    'plan_id' => $plan_id,
    'phone' => $phone,
    'device_id' => $mobile_device,
    'sim_slot' => $mobile_slot,
    'request_type' => $mobile_string,
    'webhook_url' => $webhook_url
);

$url = "https://www.msplug.com/api/buy-data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Token f8eb09efc0e0b217508af7236a122ddfddc2251c',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

curl_close($ch);
    
 if ($response) {


    $descr=$network.' '.$data_vol.' Data Purchase To '.$phone;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amounttopay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");
            
    echo ("200");
    exit();
  }

  else{

    $descr='Unsuccessful Data '.$network.' '.$data_vol.' to '.$phone;

    $newbal2 = $mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amounttopay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$trx."','".$mallu."','".$newbal2."')");

 echo ($descr);
 // echo "500";


}


}

?>