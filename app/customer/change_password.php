<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['retype_password']) && !empty($_POST['req_token'])){

$old_password=mysqli_real_escape_string($con, $_POST['old_password']);
$new_password=mysqli_real_escape_string($con, $_POST['new_password']);
$retype_password=mysqli_real_escape_string($con, $_POST['retype_password']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if (password_verify($old_password, $password)){

if (strlen($new_password)> 4){

if ($new_password != $retype_password){


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Password entered not match !!!</div>',
  );
  echo json_encode($response);
  exit();
}

else{


//  $new_hashPassword=md5($new_password);
 $options = [
        'cost' => 12,
        ];
    $hashpass= password_hash($new_password, PASSWORD_BCRYPT, $options);
 mysqli_query($con, "UPDATE users SET password='$hashpass' WHERE id='$id' AND email='$email'");

 $response=array(
  'title' => 'COMPLETED',
  'icon' => 'success',
    'status'=>'success',
    'message' => 'Password was successfully reset !!!',
  );
  echo json_encode($response);
  exit();

}


}

else{


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use a strong password !!!</div>',
  );
  echo json_encode($response);
  exit();


}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Incorrect old password !!!</div>',
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