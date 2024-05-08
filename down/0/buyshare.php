<?php


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr."AP";

if ($amount2>$mallu){

	echo "Insufficient fund";//Insufficient fund
}

else{

  if($network == 'MTN'){

        $serviceID = 'MTH';
        //$cutpercent = $amount2 * $airtime_discount;
    }

   if($network == 'GLO'){
        $serviceID = 'GLO';
        //$cutpercent = $amount2 * $airtime_discount;
    }

 if($network == 'ETISALAT'){
        $serviceID = '9MOBILE';
        // $cutpercent = $amount2 * $airtime_discount;
    }
 if($network == 'AIRTEL'){
        $serviceID = 'AIRTEL';
       //$cutpercent = $amount2 * $airtime_discount;  
    }



if ($amount2>$amount){

//echo "Error ".$adminbal." Contact Admin";
  echo "Share & Sell Timeout. Contatc Admin.";

}

else {


  $newbal = $mallu-$amount2;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

 $senderT=$sitetitle;

    $msgt=urlencode($serviceID." Share & Sell ".$amount." TO ".$phone);


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

  $descr=$network." Share & Sell ".$amount." Purchase On ".$phone;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email', '$username', '$amount2', '$descr', 'Successful', '$time', 'WEB', '$trx', '$mallu','$newbal')");

   //echo $descr;
   echo "200";
}

else {
    
     
  $newbal2 = $mallu;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

  echo "Share & Sell Purchase Not Successful";
  
}


}





}
    
?>