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

 if ($network=="MTN" && $data_vo=="500"){
    $da=$data_vo*1;
    $msgt="#SM#131***SMEB ".$phone." ".$da." "."".$simpin."";
}
 if ($network=="MTN" && $data_vo=="1"){
    $da=$data_vo*1000;
    $msgt="#SM#131***SMEC ".$phone." ".$da." "."".$simpin."";
}

 if ($network=="MTN" && $data_vo=="2"){
    $da=$data_vo*1000;
   $msgt="#SM#131***SMED ".$phone." ".$da." "."".$simpin."";
}

 if ($network=="MTN" && $data_vo=="3"){
    $da=$data_vo*1000;
    $msgt="#SM#131***SMEF ".$phone." ".$da." "."".$simpin."";
}

 if ($network=="MTN" && $data_vo=="5"){
    $da=$data_vo*1000;
    $msgt="#SM#131***SMEE ".$phone." ".$da." "."".$simpin."";
}

 if ($network=="MTN" && $data_vo=="10"){
    $da=$data_vo*1000;
    $msgt="#SM#131***SMEG ".$phone." ".$da." "."".$simpin."";
}

        $baseurl = "https://ussd.simhosting.ng/api/ussd/?";
        $ussdArray = array (
          "ussd"=> $msgt,
          "servercode" => 'HQ6A3CUK572ORMWT4EBT',
          "token" => 'AdkQnv16ID1Yb7o0DMsuNOZG5nopmfIuCJ8hST5lnkA5YLhkfV',
          "refid" => $trx,
        
         ); 
        $params = http_build_query($ussdArray); 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL,$baseurl); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
        $response = curl_exec($ch); curl_close($ch); 
    
  if ($response){

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