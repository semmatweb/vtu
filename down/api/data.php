<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token
$network=strtolower($data['network']); // getting user post network
$mobile=trim($data['mobile']);  // getting user post mobile no.
$plan_code=($data['plan_code']);   // getting user post plan code
$request_id=trim($data['request_id']);   // getting user post unique id

if (!empty($Token) && !empty($network) && !empty($mobile) && !empty($plan_code) && !empty($request_id)){

	require("../config.php"); // Connecting to MySQL dB.
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


////////////////////// FOR MTN

 	if ($network=='mtn'){

 		require("api_price/mtnprice.php");
 		require("$api_mtn");
 	}
 	
 	
 ////////////////////// FOR GIFTING
 	
 	if ($network=='gifting'){

 		require("api_price/giftingprice.php");
 		require("$api_gift");
 	}
 	
/////////////////////////// FOR GLO
 	
 	if ($network=='glo'){

 		require("api_price/gloprice.php");
 		require("$api_glo");
 	}

////////////////// FOR AIRTEL

 	if ($network=='airtel'){

 		require("api_price/airtelprice.php");
 		require("$api_airtel");
 	}


////////////////// FOR AIRTEL-CG

 	if ($network=='airtel-cg'){

 		require("api_price/airtelcgprice.php");
 		require("$api_airtelcg");
 	}

 	
/////////////////////// FOR 9MOBILE

 	if ($network=='etisalat' || $network=='9mobile'){

 		require("api_price/mobileprice.php");
 		require("$api_mobile");
 	}

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