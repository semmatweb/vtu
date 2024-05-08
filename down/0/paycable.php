
<?php

require("cable_config.php");
if ($_SERVER['HTTP_REFERER'] != $baseurl."/cableSub"){
    
    $cilu=$_SERVER['HTTP_REFERER'];
    $reason="Cable";
    
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    
     require("fraud.php");
  
 header("location:logout");
 exit();
 
}

$dtype=$_POST['dtype'];
$dname=$_POST['dname'];
$dnumber=$_POST['dnumber'];
$country=$_POST['country'];


$plan=preg_replace("/(.*?)=(.*)/", "$2", $country);
$package=preg_replace("/(.*?)=(.*)/", "$1", $country);
$xamount=preg_replace('/\D+/', '', $plan);

$sell_package=strtolower(str_replace(" ", "-", $package));

$yamount=$xamount+$cable_charge;
$amounttopay=$yamount;

$mydc=strtolower($dtype);

if ($mydc=="gotv"){
    require("gotvbiller.php");
}

 if ($mydc=="dstv"){
    require("dstvbiller.php");
}

if ($mydc=="startimes") {
    require("startimesbiller.php");
}


    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");

$trxID=$mydc.rand(100,900).time();

$sell_package2=urlencode($package);

if ($amounttopay>$mallu){
    
    echo "Cable Subscription Fail Due To Insufficient Fund"; //Insufficient Fund
}

else {
    
    
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

if ($amounttopay>$adminbal){
    
    echo "Cable Subscription Timeout, Please Contact Admin"; // Admin Bal Low
}

else {
    
  $newbal = $mallu-$amounttopay;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");
  
  $postdata=array(
  'billersCode' => $dnumber,
  'serviceID' => $mydc,
  'request_id' => $dateTime->format("YmdHi").$trxID,
  'variation_code' => $variation_code,
  'phone' => $adminphone,
);

$url =$cable_url;

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
$transactionId=$rdata['content']['transactions']['transactionId'];
$reqid=$rdata['requestId'];
$response_description=$rdata['response_description'];

//////////////////// Cable Subscription ENd

$postdata=array(
  'request_id' => $reqid
);

$url =$query_url;

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

$request2 = curl_exec($ch);

curl_close($ch);
$rquery=json_decode($request2, true);


$status2=$rquery['content']['transactions']['status'];
$transactionId2=$rquery['content']['transactions']['transactionId'];
$reqid2=$rquery['requestId'];
$response_description2=$rquery['response_description'];

if ($request2){
    
    $descr=$package.' Subscription on '.$dnumber.'-'.$dname;
    
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email', '$username', '$amounttopay', '$descr', 'Successful', '$time', 'WEB', '$transactionId', '$mallu','$newbal')");
    
    echo "200"; //Successful Order
}

else {
    
    $descr='Unsuccessful '.$package.' Subscription on '.$dnumber.'-'.$dname;
    
    $newbal2=$mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
    
   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email','$username', '$amounttopay', '$descr', 'Unsuccessful', '$time', 'WEB', '$transactionId','$mallu','$newbal2')");
  
    
    echo $descr; //Unsuccessful Order
}













}

}














?>