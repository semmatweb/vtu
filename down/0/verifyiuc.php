<?php

require_once("cable_config.php");


if (!isset($_POST['dtype']) && !isset($_POST['dnumber'])){

	header("location:home");
}


$dtype=$_POST['dtype'];
$dnumber=$_POST['dnumber'];
$country=$_POST['country'];

$service=strtolower($dtype);


$postdata=array(
	'billersCode' => $dnumber,
	'serviceID' => $service,
);

$url = $iuc_url;

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

