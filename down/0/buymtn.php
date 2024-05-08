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


    $network2=str_replace(" ", "%20", $network);
    $data_vol2=str_replace(" ", "%20", $data_vo);
    $data_vol3=str_replace(" ", "%20", $data_vol);

    if ($network=="MTN" && $data_vo=="500"){
        $da=$data_vol2+0;
    $msgt=urlencode("SMEB ".$phone." ".$data_vol2." "."".$simpin."");
}
else if ($network=="MTN" && $data_vo=="1"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEC ".$phone." ".$da." "."".$simpin."");
}

else if ($network=="MTN" && $data_vo=="2"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMED ".$phone." ".$da." "."".$simpin."");
}

else if ($network=="MTN" && $data_vo=="3"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEF ".$phone." ".$da." "."".$simpin."");
}

else if ($network=="MTN" && $data_vo=="5"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEE ".$phone." ".$da." "."".$simpin."");
}

else {
$da=$data_vol3;
    $msgt=urlencode("SEND ".$network2." ".$da." TO ".$phone);
}


    $msgto=$msgt;

    $my_order_num=str_replace(" ", "%20", $mtn_n);

$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$sms_token.'&from=BulkSMS.ng&to='.$my_order_num.'&body='.$msgto.'';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xres=json_decode($response, true);
$status=$xres['data']['status'];
    
 if ($status=="success") {

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