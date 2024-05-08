<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$api_token=trim($data['token']);
$quantity=trim($data['quantity']);  // getting mobile no
$cus_name=trim($data['cus_name']);
$plan_id=$data['plan_code'];
$network=strtoupper($data['network']);
$reference=$data['request_id'];

if (!empty($quantity) && !empty($plan_id) && !empty($reference) && !empty($network) && !empty($api_token)){

require("../functions/web_config.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=$dateTime->format("YmdHi");
$timestring=time();
$api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

$check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

if (mysqli_num_rows($check_user)>0){

$check_mobile = mysqli_query($con, "SELECT add_mobile FROM blacklist_mobiles WHERE add_mobile='$quantity'");

if (mysqli_num_rows($check_mobile)>0){


    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Mobile no. found in blacklist !!!',
    );
    echo json_encode($response);
    exit;

}

else {

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'"));

 $account_balance=$return_info['wallets'];
 $account_bonus=$return_info['cashback'];
 $account_webhook=$return_info['webhook'];
 $account_email=$return_info['email'];
 $account_username=$return_info['username'];
 $account_refby=$return_info['ref_by'];
 $mtndatacard_access=$return_info['mtndatacard_access'];
 $level=$return_info['level'];
 $user_id=$return_info['id'];
 $account_mobile=$return_info['mobile'];
 $mobile_no = $account_mobile;

 if ($network=="MTN-DATACARD" && $mtndatacard_lock1==1 && $mtndatacard_access==1){

    require("dataCardModule/$api_mtndatacard");
}

// else if ($network=="MTN-CG" && $mg_lock1==1 && $mtncg_access==1 || $network=="GIFTING" && $mg_lock1==1 && $mtncg_access==1){

//     require("dataModule/$api_gift");
// }


else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Service is currently down or Restricted for this account. kindly check and try again !!!',
    );
    echo json_encode($response);
    exit;
}

}


}

else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Basic Authorization Failed! Unable to fetch user record',
    );
    echo json_encode($response);
    exit;
}

}

else {


    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Please make sure all the parameters are included',
    );
    echo json_encode($response);
    exit();
}


?>