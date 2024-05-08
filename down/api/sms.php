<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token
$message_id=($data['message_id']); // getting user post sender ID
$mobile=trim($data['mobile']);  // getting user post mobile no.
$message_body=($data['message_body']);   // getting user post Message Body
$request_id=trim($data['request_id']);   // getting user post unique id

if (!empty($Token) && !empty($message_id) && !empty($mobile) && !empty($message_body) && !empty($request_id)){

	require("../private/web_config.php"); // Connecting to MySQL dB.
	$check_rec=mysqli_query($db, "SELECT * FROM users WHERE token='".$Token."'");
	$counter=mysqli_num_rows($check_rec);
	if ($counter < 1){


		$sec=array(
		'code'=>'300', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Error Retrieving Users Account',
	);

	echo json_encode($sec);
	exit();

	}

	else{

 while($getrec=mysqli_fetch_array($check_rec, MYSQLI_ASSOC)){
 	$balance=$getrec['us_wallets'];
 	$username=$getrec['email'];
 	$email=$getrec['emailR'];
 	$apiToken=$getrec['token'];


   require("api_price/smsprice.php");
   require("sms_hollatags.php");

 }

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