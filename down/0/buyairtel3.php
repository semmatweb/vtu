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

 if ($network=="AIRTEL" && $data_vo=="750"){
     $plan_id=61;
    $msgt=("*141*6*2*2*3*1*".$phone."*".$airtelpin."#");
}
 if ($network=="AIRTEL" && $data_vo=="15"){
     $plan_id=62;
    $msgt=("*141*6*2*1*7*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="2"){
     $plan_id=63;
    $msgt=("*141*6*2*1*6*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="3"){
     $plan_id=64;
    $msgt=("*141*6*2*1*5*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="45"){
     $plan_id=65;
   $msgt=("*141*6*2*1*4*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="6"){
     $plan_id=66;
   $msgt=("*141*6*2*1*3*1*".$phone."*".$airtelpin."#");
}

if ($network=="AIRTEL" && $data_vo=="8"){
    $plan_id=67;
   $msgt=("*141*6*2*1*2*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="11"){
     $plan_id=68;
   $msgt=("*141*6*2*1*1*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="155"){
     $plan_id=69;
   $msgt=("*141*6*2*4*4*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="40"){
     $plan_id=70;
   $msgt=("*141*6*2*4*3*1*".$phone."*".$airtelpin."#");
}

 if ($network=="AIRTEL" && $data_vo=="75"){
     $plan_id=71;
   $msgt=("*141*6*2*4*2*1*".$phone."*".$airtelpin."#");
}


$postdata=array(
'networkId' => 2,
'planId' => $plan_id,
'phoneNumber' => $phone,
'reference' => $trx

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

    $descr=$network.' '.$data_vol.' Data Purchase To '.$phone;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amounttopay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");
            
    echo ("200");
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