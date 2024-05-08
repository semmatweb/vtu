<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$api_token=trim($data['token']);
$mobile_no=trim($data['mobile']);  // getting mobile no
$plan_id=$data['plan_code'];
$network=strtoupper($data['network']);
$reference=$data['request_id'];
$bypass=$data['bypass'];

$number = $mobile_no;
$newnumber = substr($number, 0, 4);
$array = array('0803','0806','0703','0706','0813','0816','0810','0814','0903','0906','0913','0916','0702','0704','0708','0701','0902','0808','0812','0802','0901','0904','0907','0912','0805','0807','0705','0815','0811','0905','0915','0809','0818','0817','0909','0908','0911');

if (in_array($newnumber, $array) || $bypass == 'ON'){
if (!empty($mobile_no) && !empty($plan_id) && !empty($reference) && !empty($network) && !empty($api_token)){

require("../functions/web_config.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=$dateTime->format("YmdHi");
$timestring=time();
$api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

$check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

if (mysqli_num_rows($check_user)>0){

$check_mobile = mysqli_query($con, "SELECT add_mobile FROM blacklist_mobiles WHERE add_mobile='$mobile_no'");

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
 $mtnsme_access=$return_info['mtnsme_access'];
 $mtnsme2_access=$return_info['mtnsme2_access'];
 $mtncg_access=$return_info['mtncg_access'];
 $mtncg2_access=$return_info['mtncg2_access'];
 $mtndc_access=$return_info['mtndc_access'];
 $glo_access=$return_info['glo_access'];
 $glocg_access=$return_info['glocg_access'];
 $airtel_access=$return_info['airtel_access'];
 $airtelcg_access=$return_info['airtelcg_access'];
 $mobile_access=$return_info['mobile_access'];
 $mobilecg_access=$return_info['mobilecg_access'];
 $level=$return_info['level'];
 $user_id=$return_info['id'];
 $account_mobile=$return_info['mobile'];

 if ($network=="MTN" && $m_lock1==1 && $mtnsme_access==1){

    require("dataModule/$api_mtn");
}

else if ($network=="MTN2" && $m2_lock1==1 && $mtnsme2_access==1){

    require("dataModule/$api_mtnsme2");
}

else if ($network=="MTN-CG" && $mg_lock1==1 && $mtncg_access==1){

    require("dataModule/$api_gift");
}

else if ($network=="MTN-CG2" && $mg2_lock1==1 && $mtncg2_access==1){

    require("dataModule/$api_gift2");
}

else if ($network=="MTN-DC" && $mdc_lock1==1 && $mtndc_access==1){

    require("dataModule/$api_mtndc");
}

else if ($network=="9MOBILE" && $mo_lock1==1 && $mobile_access==1 || $network=="ETISALAT" && $mo_lock1==1 && $mobile_access==1 ){

    require("dataModule/$api_mobile");
}

else if ($network=="9MOBILE-CG" && $mocg_lock1==1 && $mobilecg_access==1 || $network=="ETISALAT" && $mocg_lock1==1 && $mobilecg_access==1){

    require("dataModule/$api_mobilecg");
}

else if ($network=="AIRTEL" && $a_lock1==1 && $airtel_access==1){

    require("dataModule/$api_airtel");
}

else if ($network=="AIRTEL-CG" && $ag_lock1==1 && $airtelcg_access==1){

    require("dataModule/$api_airtelcg");
}

else if ($network=="GLO" && $g_lock1==1 && $glo_access==1){

    require("dataModule/$api_glo");
}
else if ($network=="GLO-CG" && $gcg_lock1==1 && $glocg_access==1){

    require("dataModule/$api_glocg");
}

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

}
else
{
    $response=array(
    'status' => 'fail',
    'status_code' =>'101',
    'message' => 'Please check entered number is not valid User ',
    );
     echo json_encode($response);
      exit();
}



?>