<?php
require("session_controller.php");

if (!empty($_GET['data'])){

$data_id=$_GET['data'];

$update=mysqli_query($con, "UPDATE users SET status='1' WHERE id='$data_id'");

 if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'This user account has been successfully verified !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when verifying user account !!!',
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