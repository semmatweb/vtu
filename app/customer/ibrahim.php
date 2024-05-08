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
$token = mysqli_real_escape_string($con, $_POST['req_token']);
// $plan
if ($token != "")
{
// if ($_SESSION['csrftoken'] == $_POST['req_token']){
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

if (!empty($_POST['service_module']) && !empty($_POST['smart_no']) ){

// && !empty($_POST['security_pin'])
if (!empty($_POST['dataplanloader'])){

$service_module=strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
$dataplanloader=mysqli_real_escape_string($con, $_POST['dataplanloader']);
$smart_no=mysqli_real_escape_string($con, $_POST['smart_no']);
$security_pin=mysqli_real_escape_string($con, $security);
// $req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$button='<button class="btn btn-success btn-block" onclick="pay4Tv()">Make Payment</button> <button class="btn btn-danger" onclick="closeModal()">Close</button>';
$payload=array(
  'service_id' => $service_module,
  'service_number' => $smart_no,
);


$verify_link = $api_url.'/verifyiuc';

}

else{

$service_module=strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
$service_plan=mysqli_real_escape_string($con, $_POST['service_plan']);
$smart_no=mysqli_real_escape_string($con, $_POST['smart_no']);
$security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$button='<button class="btn btn-success btn-block" onclick="pay4Bills()">Make Payment</button> <button class="btn btn-danger" onclick="closeModal()">Close</button>';
$payload=array(
  'service_id' => $service_module,
  'service_type' => $service_plan,
  'service_number' => $smart_no,
);

$verify_link = $api_url.'/verifymeter';


}


if (strlen($smart_no)>5 && is_numeric($smart_no)){

if ($security_pin == $security){
    
   
    
$url = $verify_link;
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

if ($status=="success"){

 $response=array(
    'status'=>'success',
    'message' => $message.'<br/>'.$service_module.'<br/><br/>'.$button.'',
  );

echo json_encode($response);
exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger">'.$message.'</div>',
  );

echo json_encode($response);
exit();

}

}

else{


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Incorrect security pin !!!</div>',
  );
  echo json_encode($response);
  exit();


}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please enter a valid smart no !!!</div>',
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
  echo json_encode($response);
  exit();
}

?>