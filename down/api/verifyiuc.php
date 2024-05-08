<?php
error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$service_number=trim($data['service_number']);   // The IUC/Smart Number or meter number
$service_id=strtolower($data['service_id']);    // The service e.g dstv, gotv, startimes.

if (!empty($service_number) && !empty($service_id)){

	require("../config.php"); // Connecting to MySQL dB.

	$postdata=array(
	'billersCode' => $service_number,
	'serviceID' => $service_id,
);

$url="https://vtpass.com/api/merchant-verify";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Basic '.base64_encode($vtpass_login).'',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$curl_response = curl_exec($ch);
curl_close($ch);
$result=json_decode($curl_response, true);

if (array_key_exists('content', $result) && array_key_exists('Customer_Name', $result['content']) && ($result['content']['Customer_Name']!="")){

 $fullname=$result["content"]["Customer_Name"];

  $sec=array(
		'code'=>'200',
		'status'=>'success', ////// 
		'desc' =>$fullname,
	);

	echo json_encode($sec);
	exit();
}

else{


$sec=array(
		'code'=>'700', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Invalid IUC Number',
	);

	echo json_encode($sec);
	exit();


}

}

else{

	$sec=array(
		'code'=>'500', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Imcomplete Parameters',
	);

	echo json_encode($sec);
	exit();
}
?>