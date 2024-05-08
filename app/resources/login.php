<?php
session_start();
require("../../functions/web_config.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['req_token'])){

$username=strtolower(mysqli_real_escape_string($con, $_POST['username']));
$password=mysqli_real_escape_string($con, $_POST['password']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$check_username=mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
if (mysqli_num_rows($check_username)<1){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid Email or password !!!</div>',
  );
  echo json_encode($response);
  exit();

}

else {

$check_username=mysqli_query($con, "SELECT * FROM users WHERE email='$username' AND status='1'");

if (mysqli_num_rows($check_username)>0){

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email='$username'"));

 if (password_verify($password, ($return_info['password']))){

    $_SESSION['username']=$username;
    $_SESSION['users_sid']=$return_info['users_sid'];
    $_SESSION['LAST_ACTIVITY']=$_SERVER['REQUEST_TIME'];
    $_SESSION['useremail']=$username;
    $_SESSION['userpas']=$return_info['users_sid'];

 $response=array(
    'status'=>'success',
    'redirect' => 'app/dashboard',
    'message' => 'Welcome '.$return_info['username'].'',
  );
  echo json_encode($response);
  exit();
 }

 else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid Email or Password</div>',
  );
  echo json_encode($response);
  exit();

 }


}

else {

  $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please check your email and verify this account !!!</div>',
  );
  echo json_encode($response);
  exit(); 
}

}

}

else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();
}

}

else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Session expired. reload and try again...</div>',
  );
  $_SESSION['useremail']=$username;
  $_SESSION['userpas']=$return_info['users_sid'];
  echo json_encode($response);
  exit();
}

?>