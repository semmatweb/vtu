<?php
require("session_controller.php");

if (!empty($_POST['mtndc_500']) &&  !empty($_POST['mtndc_1']) &&  !empty($_POST['mtndc_2']) &&  !empty($_POST['mtndc_3']) &&  !empty($_POST['mtndc_5']) &&  !empty($_POST['mtndc_10']) && !empty($_POST['level'])){

$mtncg_500=mysqli_real_escape_string($con, $_POST['mtndc_500']);
$mtncg_1=mysqli_real_escape_string($con, $_POST['mtndc_1']);
$mtncg_2=mysqli_real_escape_string($con, $_POST['mtndc_2']);
$mtncg_3=mysqli_real_escape_string($con, $_POST['mtndc_3']);
$mtncg_5=mysqli_real_escape_string($con, $_POST['mtndc_5']);
$mtncg_10=mysqli_real_escape_string($con, $_POST['mtndc_10']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE mtndc_plan SET mtndc_1='$mtncg_500', mtndc_2='$mtncg_1', mtndc_3='$mtncg_2', mtndc_4='$mtncg_3', mtndc_5='$mtncg_5', mtndc_6='$mtncg_10' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your mtn-dc prices has been successfully updated !!!',
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