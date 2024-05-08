<?php
require("session_controller.php");

if (!empty($_POST['mobilecg_500']) &&  !empty($_POST['mobilecg_1']) &&  !empty($_POST['mobilecg_2']) &&  !empty($_POST['mobilecg_3']) &&  !empty($_POST['mobilecg_4']) &&  !empty($_POST['mobilecg_5']) &&  !empty($_POST['mobilecg_10']) && !empty($_POST['level'])){

$mobile_500=mysqli_real_escape_string($con, $_POST['mobilecg_500']);
$mobile_1=mysqli_real_escape_string($con, $_POST['mobilecg_1']);
$mobile_2=mysqli_real_escape_string($con, $_POST['mobilecg_2']);
$mobile_3=mysqli_real_escape_string($con, $_POST['mobilecg_3']);
$mobile_4=mysqli_real_escape_string($con, $_POST['mobilecg_4']);
$mobile_5=mysqli_real_escape_string($con, $_POST['mobilecg_5']);
$mobile_10=mysqli_real_escape_string($con, $_POST['mobilecg_10']);
$mobile_15=mysqli_real_escape_string($con, $_POST['mobilecg_15']);
$mobile_20=mysqli_real_escape_string($con, $_POST['mobilecg_20']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE mobiledatacg_plan SET mobile_500='$mobile_500', mobile_1='$mobile_1', mobile_2='$mobile_2', mobile_3='$mobile_3', mobile_4='$mobile_4', mobile_5='$mobile_5', mobile_10='$mobile_10', mobile_15='$mobile_15', mobile_20='$mobile_20' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your 9mobile-cg prices has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating price !!!',
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