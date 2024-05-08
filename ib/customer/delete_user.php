<?php
require("session_controller.php");

if (!empty($_GET['data'])){

$data_id=$_GET['data'];

$update=mysqli_query($con, "DELETE FROM `users` WHERE id='$data_id'");

 if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'This user has been successfully Removed !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when removing user account !!!',
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