<?php

$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).time();


if ($amounttopay > $mallu || $amounttopay < 1){

    echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}

else{


    $newbal = $mallu-$amounttopay;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");
    

if ($data_vo=="500"){
    $da=$data_vol+0;
    $plan_id=500;
    $msgt=("SMEB ".$phone." ".$da." "."".$simpin."");
}

 if ($data_vo=="1"){
    $da=$data_vol*1000;
    $plan_id=10;
    $msgt=("SMEC ".$phone." ".$da." "."".$simpin."");
}


 if ($data_vo=="2"){
    $da=$data_vol*1000;
    $plan_id=20;
    $msgt=("SMED ".$phone." ".$da." "."".$simpin."");
}


if ($data_vo=="3"){
    $da=$data_vol*1000;
    $plan_id=30;
    $msgt=("SMEF ".$phone." ".$da." "."".$simpin."");
}


 if ($data_vo=="5"){
    $da=$data_vol*1000;
    $plan_id=50;
    $msgt=("SMEE ".$phone." ".$da." "."".$simpin."");
}

 if ($data_vo=="10"){
    $da=$data_vol*1000;
    $plan_id=100;
    $msgt=("SMEE ".$phone." ".$da." "."".$simpin."");
}


$url='https://dailycashout.com.ng/api/buydatav2.php?api_key=7a47e347acbec4a7e3466ff19dfff782&network=MTN&plans='.$plan_id.'&phonenumber='.$phone.'&return_url=https://salabeb.com';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xx=json_decode($response, true);
$status=$xx['status'];

if ($status=="success"){

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