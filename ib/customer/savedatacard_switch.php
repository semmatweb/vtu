<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$mtn_datacard=mysqli_real_escape_string($con, $_POST['mtn_datacard']);
// $mtncg_data=mysqli_real_escape_string($con, $_POST['mtncg_data']);
// $glo_data=mysqli_real_escape_string($con, $_POST['glo_data']);
// $glocg_data=mysqli_real_escape_string($con, $_POST['glocg_data']);
// $airtel_data=mysqli_real_escape_string($con, $_POST['airtel_data']);
// $airtelcg_data=mysqli_real_escape_string($con, $_POST['airtelcg_data']);
// $mobile_data=mysqli_real_escape_string($con, $_POST['mobile_data']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET api_mtndatacard='$mtn_datacard' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your data automation has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating website settings !!!',
  );
  echo json_encode($response);
  exit();

}

}

else{

   $response=array(
    'status'=>'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();
}

?>