<?php

include("cable_config.php");

$phone=$_POST['phone'];
$amount=$_POST['amount'];
$variation_code=$_POST['variation_code'];
$pintype=strtolower($_POST['pintype']);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A"); 
$trx=rand(1000000,900000000)."WP";

   if ($amount>$mallu){

    echo "Purchase Fail Due To Insufficient balance.";
    //echo "100";
    exit();

   }

   else{



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

if ($amount>$adminbal){

  echo "Error ".$adminbal." Contact Admin and Try Again.";
  //echo "200"; //Low Admin Balance;
  exit();
}

else {

  $newbal = $mallu-$amount;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

$postdata=array(
  'variation_code' => 'waecdirect',
  'serviceID' => 'waec',
  'request_id' => $trx,
  'phone' => $adminphone,
);

$url =$waec_url;

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

$status=$rdata['content']['transactions']['status'];
$reqid=$rdata['requestId'];
$response_description=$rdata['response_description'];
$purchased_code=$rdata['purchased_code'];
///////////////////// ENd of waec pin API

if ($status=="delivered"){


$descr="Waec Card Purchase ".$purchased_code;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

   echo ("200");
   exit();


}

else {


  $newbal2=$mallu;
    mysqli_query($db, "UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

    echo "Can not purchase Scratch Card Now, Try Again.";
    //echo "300"; //Unable to buy

}
  
}

}

?>