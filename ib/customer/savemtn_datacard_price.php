<?php
require("session_controller.php");

if (!empty($_POST['mtndatacard_75']) && !empty($_POST['mtndatacard_15']) && !empty($_POST['mtndatacard_2']) && !empty($_POST['level'])){

$mtndatacard_75=mysqli_real_escape_string($con, $_POST['mtndatacard_75']);
$mtndatacard_15=mysqli_real_escape_string($con, $_POST['mtndatacard_15']);
$mtndatacard_2=mysqli_real_escape_string($con, $_POST['mtndatacard_2']);
// $mtnsme_1=mysqli_real_escape_string($con, $_POST['mtnsme_1']);
// $mtnsme_2=mysqli_real_escape_string($con, $_POST['mtnsme_2']);
// $mtnsme_3=mysqli_real_escape_string($con, $_POST['mtnsme_3']);
// $mtnsme_5=mysqli_real_escape_string($con, $_POST['mtnsme_5']);
// $mtnsme_10=mysqli_real_escape_string($con, $_POST['mtnsme_10']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE mtndatacard_plan SET mtndatacard_75='$mtndatacard_75', mtndatacard_15='$mtndatacard_15', mtndatacard_2='$mtndatacard_2' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your mtn-data-card prices has been successfully updated !!!',
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