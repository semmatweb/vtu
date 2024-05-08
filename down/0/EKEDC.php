
<?php


$trxID=rand(1000000,900000).time();
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A"); 


if ($amount>$mallu){

 echo "Electricity Payment Fail Due To Insufficient Fund"; //Insufficient Fund

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

echo "Timeout, Please Contact Admin"; //Admin Balance Low

}

else {

   $newbal = $mallu-$amount;
   mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

$final_amount=$amount-$elect_charge;

$postdata=array(
  'billersCode' => $meternum,
  'serviceID' => $discotype,
  'request_id' => $dateTime->format("YmdHi").$trxID,
  'variation_code' => $metertype,
  'amount' => $final_amount,
  'phone' => $adminphone,
);


$url =$elect_url;

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
$mainToken=$rdata['mainToken'];
$purchased_code=$rdata['purchased_code'];

////////////////////  ENd

$final_amount=$amount-$elect_charge;

if ($status=="delivered." || $status=="delivered"){
  
    $descr1="#".$final_amount." ".strtoupper($discotype)." ".$metertype." on ".$meternum." Token (".$purchased_code.")";

     $descr2='YOUR TOKEN=('.$purchased_code.')';

 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email', '$username', '$amount', '$descr1', 'Successful', '$time', 'WEB', '$trxID', '$mallu','$newbal')");
    
echo "200";

}

else {


   $descr='#'.$final_amount.''.strtoupper($discotype).' Payment Unsuccessful';

    $newbal2=$mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email','$username', '$amount', '$descr', 'Unsuccessful', '$time', 'WEB', '$trxID','$mallu','$newbal2')");
    
    echo $descr;

}







}



}


?>