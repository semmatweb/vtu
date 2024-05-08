<?php
require("session_controller.php");

if (!empty($_POST['rate_comment'])){

$rate_comment=mysqli_real_escape_string($con, $_POST['rate_comment']);

$rate_message=str_replace("'", "", $rate_comment);
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$save=mysqli_query($con, "INSERT INTO `vtuapp_rating` (`id`, `username`, `email`, `comment`, `date`) VALUES (NULL, '$username', '$email', '$rate_message', '$time')");
mysqli_query($con, "UPDATE vtuapp_customuser SET rating='1' WHERE id='$id' AND email='$email'");

if ($save){

 $response=array(
    'status'=>'success',
    'message' => 'Thank you for your review. We always happy to hear from you !!!',
  );
  echo json_encode($response);
  exit();
}

else{
   $response=array(
    'status'=>'fail',
    'message' => 'We encounter an error when submitting your review !!!',
  );
  echo json_encode($response);
  exit();
}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please write something about us !!!',
  );
  echo json_encode($response);
  exit();

}

?>