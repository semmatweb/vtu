<?php

require_once("cable_config.php");


if (!isset($_POST['meternum']) && !isset($_POST['metertype']) && !isset($_POST['discotype'])){

	header("location:home");
}

$meternum=$_POST['meternum'];
$metertype=$_POST['metertype'];
$discotype=$_POST['discotype'];

$token=rand(100000,90000)."EP";
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=time(); 


$postdata=array(
	'billersCode' => $meternum,
	'serviceID' => $discotype,
	'type' => $metertype,
);

$url = $elect_url_verify;

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

$curl_response = curl_exec($ch);

curl_close($ch);

$xdata=json_decode($curl_response, true);

if (array_key_exists('content', $xdata) && array_key_exists('Customer_Name', $xdata['content']) && ($xdata['content']['Customer_Name']!="")){

 $fullname=$xdata["content"]["Customer_Name"];
 $data=$fullname;
  echo ($data);
}

else {

	echo "100";
}





 



?>

