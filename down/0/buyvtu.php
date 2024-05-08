<?php
require("cable_config.php");

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr."AP";

if ($amount2>$mallu){

	echo "Insufficient fund";//Insufficient fund
}

else{

  if($network == 'MTN'){

        $serviceID = 'mtn';
        //$cutpercent = $amount2 * $airtime_discount;
    }

   if($network == 'GLO'){
        $serviceID = 'glo';
        //$cutpercent = $amount2 * $airtime_discount;
    }

 if($network == 'ETISALAT'){
        $serviceID = 'etisalat';
        // $cutpercent = $amount2 * $airtime_discount;
    }
 if($network == 'AIRTEL'){
        $serviceID = 'airtel';
       //$cutpercent = $amount2 * $airtime_discount;  
    }



$service_url=$balance_url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Basic '.$us.'',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);
$adminbal=$data['contents']['balance'];


if ($amount2>$adminbal){

//echo "Error ".$adminbal." Contact Admin";
  echo "Airtime Timeout. Contatc Admin.";
  exit();
  

}

else {


  $newbal = $mallu-$amount2;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");
  $postdata=array(
  'serviceID' => $serviceID,
  'request_id' => $trx,
  'amount' => $amount,
  'phone' => $phone,
);


  $url =$airtime_url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Basic '.$us.'',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$request = curl_exec($ch);

curl_close($ch);
$rdata=json_decode($request, true);

$code=$rdata['code'];
$reqid=$rdata['requestId'];

if ($code==000){


  $descr=$network." Airtime ".$amount." Purchase On ".$phone;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email', '$username', '$amount2', '$descr', 'Successful', '$time', 'WEB', '$trx', '$mallu','$newbal')");

   //echo $descr;
   echo "200";
   exit();
}

else {
    
     
  $newbal2 = $mallu;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

  echo "Airtime Purchase Not Successful";
  exit();
  
}


}





}
    
?>