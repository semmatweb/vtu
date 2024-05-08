<?php

$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).time();


if ($amounttopay > $mallu){

    echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}

else{


    $newbal = $mallu-$amounttopay;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");
    

if ($data_vo=="500"){
    $da=$data_vol+0;
    $plan_id=1;
    $msgt=("SMEB ".$phone." ".$da." "."".$simpin."");
}

 if ($data_vo=="1"){
    $da=$data_vol*1000;
    $plan_id=2;
    $msgt=("SMEC ".$phone." ".$da." "."".$simpin."");
}


 if ($data_vo=="2"){
    $da=$data_vol*1000;
    $plan_id=3;
    $msgt=("SMED ".$phone." ".$da." "."".$simpin."");
}


if ($data_vo=="3"){
    $da=$data_vol*1000;
    $plan_id=4;
    $msgt=("SMEF ".$phone." ".$da." "."".$simpin."");
}


 if ($data_vo=="5"){
    $da=$data_vol*1000;
    $plan_id=5;
    $msgt=("SMEE ".$phone." ".$da." "."".$simpin."");
}

 if ($data_vo=="10"){
    $da=$data_vol*1000;
    $plan_id=109;
    $msgt=("SMEE ".$phone." ".$da." "."".$simpin."");
}


$postdata=array(
'networkId' => 1,
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
    exit();
  }

  else{

    $descr='Unsuccessful Data '.$network.' '.$data_vol.' to '.$phone;

    $newbal2 = $mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amounttopay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$trx."','".$mallu."','".$newbal2."')");

 echo ($descr);

}


}

?>