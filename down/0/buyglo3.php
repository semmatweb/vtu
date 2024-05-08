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


if ($network=="GLO" && $data_vo=="105"){
     $plan_id=49;
    $msgt=("*127*57*".$phone."#");
}
 if ($network=="GLO" && $data_vo=="29"){
     $plan_id=39;
    $msgt=("*127*53*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="41"){
     $plan_id=52;
    $msgt=("*127*16*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="58"){
     $plan_id=48;
    $msgt=("*127*55*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="77"){
     $plan_id=44;
   $msgt=("*127*58*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="10"){
     $plan_id=47;
   $msgt=("*127*59*".$phone."#");
}

if ($network=="GLO" && $data_vo=="1325"){
    $plan_id=43;
   $msgt=("*127*59*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="1825"){
     $plan_id=41;
   $msgt=("*127*2*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="295"){
     $plan_id=40;
   $msgt=("*127*1*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="50"){
     $plan_id=54;
   $msgt=("*127*11*".$phone."#");
}

 if ($network=="GLO" && $data_vo=="93"){
     $plan_id=42;
   $msgt=("*127*12*".$phone."#");
}


$postdata=array(
'networkId' => 3,
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
 // echo "500";


}


}

?>