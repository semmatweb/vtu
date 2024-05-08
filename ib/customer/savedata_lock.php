<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$mtnsme_lock=mysqli_real_escape_string($con, $_POST['mtnsme_lock']);
$mtnsme2_lock=mysqli_real_escape_string($con, $_POST['mtnsme2_lock']);
$mtncg_lock=mysqli_real_escape_string($con, $_POST['mtncg_lock']);
$mtncg2_lock=mysqli_real_escape_string($con, $_POST['mtncg2_lock']);
$mtndc_lock=mysqli_real_escape_string($con, $_POST['mtndc_lock']);
$glo_lock=mysqli_real_escape_string($con, $_POST['glo_lock']);
$glocg_lock=mysqli_real_escape_string($con, $_POST['glocg_lock']);
$airtel_lock=mysqli_real_escape_string($con, $_POST['airtel_lock']);
$airtelcg_lock=mysqli_real_escape_string($con, $_POST['airtelcg_lock']);
$mobile_lock=mysqli_real_escape_string($con, $_POST['mobile_lock']);
$mobilecg_lock=mysqli_real_escape_string($con, $_POST['mobilecg_lock']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET m_lock1='$mtnsme_lock', mg_lock1='$mtncg_lock', m2_lock1='$mtnsme2_lock', mg2_lock1='$mtncg2_lock', mdc_lock1='$mtndc_lock', g_lock1='$glo_lock', gcg_lock1='$glocg_lock', a_lock1='$airtel_lock', ag_lock1='$airtelcg_lock', mo_lock1='$mobile_lock', mocg_lock1='$mobilecg_lock' WHERE id='$level'");

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