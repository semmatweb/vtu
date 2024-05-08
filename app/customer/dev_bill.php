<?php
require("../../functions/web_config.php");
error_reporting(0);
$json = file_get_contents('php://input');
// $headers = getallheaders();
$data = json_decode($json, true);

function t($data) {
  global $con;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return mysqli_real_escape_string($con,$data);
}
$token = $data['token'];
// $plan
if ($token != "")
{

    $return_data=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE api_token='".$token."'"));
    
$id=$return_data['id'];
$fullname=$return_data['full_name'];
$reg_date=$return_data['reg_date'];
$mobile=$return_data['mobile'];
$password=$return_data['password'];
$Account_Balance=$return_data['wallets'];
$kyc_update=$return_data['kyc_update'];
$webhook=$return_data['webhook'];
$username=$return_data['username'];
$email=$return_data['email'];
$status=$return_data['status'];
$sk_token=$return_data['sk_token'];
$level=$return_data['level'];
$security=$return_data['security_pin'];
$myreferral=$return_data['ref_by'];
$referral_code=$return_data['ref_code'];

if (!empty($data['service']) && !empty($data['service_plan']) && !empty($data['meter_no']) && !empty($security) && !empty($data['amount']) && $data['amount']>0 && is_numeric($data['amount'])){

$service_module=strtoupper(mysqli_real_escape_string($con, $data['service']));
$service_plan=mysqli_real_escape_string($con, $data['service_plan']);
$smart_no=mysqli_real_escape_string($con, $data['meter_no']);
$amount=mysqli_real_escape_string($con, $data['amount']);
$security_pin=mysqli_real_escape_string($con, $security);
// $req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if ($amount > 499){

if ($security_pin == $security){
  

$payload=array(
  'token' => $sk_token,
  'service_number' => $smart_no,
  'service_id' => $service_module,
  'service_type'=>$service_plan,
  'request_id' => strtoupper(time().rand(10000000, 90000000).mt_rand()),
  'amount' => $amount,
);


$url = $api_url.'/electricity';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$apidata=json_decode($request);
$message=$apidata->message;
$status=$apidata->status;

if ($status == "success"){

 $response=array(
  'title' => 'COMPLETED',
  'icon' => 'success',
  'status'=>'success',
  'message' => $message,
  );

echo json_encode($response);
exit();

}

else{

 $response=array(
  'title' => 'FAILED',
  'icon' => 'error',
    'status'=>'fail',
    'message' => '',
  );

echo json_encode($response);
exit();

}

}

else{


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">sasIncorrect security pin !!!</div>',
  );
  echo json_encode($response);
  exit();


}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Minimum you can purchase is N500 !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}
else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
  );
  echo "Invalid Input";
  exit();
}

?>