<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$mtndatacard_lock=mysqli_real_escape_string($con, $_POST['mtndatacard_lock']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET mtndatacard_lock1='$mtndatacard_lock' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your store control has been successfully updated !!!',
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