<?php
error_reporting(0);




$json = file_get_contents('php://input');
$data = json_decode($json, true);
$api_token=trim($data['token']);
$service_type=$data['service_type'];
$service=$data['service_id'];
$smart_no=strtoupper($data['service_number']);
$reference=$data['request_id'];
$amount=$data['amount'];

/*echo json_encode(array(
        'service'=>$service    
    ));
    exit();*/
if (!empty($smart_no) && !empty($service_type) && !empty($reference) && !empty($service) && !empty($api_token)){




require("../functions/web_config.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=$dateTime->format("YmdHi");
$timestring=time();
$api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

$check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

if (mysqli_num_rows($check_user)>0){
    
  

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'"));
 $account_balance=$return_info['wallets'];
 $account_bonus=$return_info['cashback'];
 $account_webhook=$return_info['webhook'];
 $account_email=$return_info['email'];
 $account_username=$return_info['username'];
 $account_refby=$return_info['ref_by'];
 $mtnsme_access=$return_info['mtnsme_access'];
 $mtncg_access=$return_info['mtncg_access'];
 $glo_access=$return_info['glo_access'];
 $airtel_access=$return_info['airtel_access'];
 $airtelcg_access=$return_info['airtelcg_access'];
 $mobile_access=$return_info['mobile_access'];
 $level=$return_info['level'];
 $user_id=$return_info['id'];
 $account_mobile=$return_info['mobile'];
 

    require("billModule/bills_vtpass.php");






}else {

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