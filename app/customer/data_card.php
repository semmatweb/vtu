<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['network_module']) && !empty($_POST['dataplanloader']) && !empty($_POST['quantity']) && !empty($_POST['security_pin']) && !empty($_POST['req_token'])){

$network_module=strtoupper(mysqli_real_escape_string($con, $_POST['network_module']));
$dataplanloader=mysqli_real_escape_string($con, $_POST['dataplanloader']);
$quantity=mysqli_real_escape_string($con, $_POST['quantity']);
$cus_name=mysqli_real_escape_string($con, $_POST['cus_name']);
$security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

if (is_numeric($quantity)){
    if ($network_module == 'MTN-DATACARD')
    {
            if ($security_pin == $security){
    
                $payload=array(
                  'token' => $sk_token,
                  'quantity' => $quantity,
                  'cus_name' => $cus_name,
                  'network' => $network_module,
                  'request_id' => strtoupper(time().rand(10000000, 90000000).mt_rand()),
                  'plan_code' => $dataplanloader,
                );
                
                $url = $api_url.'/data_card';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));  //Post Fields
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $request = curl_exec($ch);
                curl_close($ch);
                $apidata=json_decode($request);
                $message=$apidata->message;
                $status=$apidata->status;
                
                if ($status == "success"){
                
                 $response=array(
                     'title' => 'COMPLETED',
                     'icon' => 'success',
                    'status'=>'success',
                    'message' => $message,
                  );
                
                echo json_encode($response);
                exit();
                
                }
                
                else{
                
                 $response=array(
                     'title' => 'FAILED',
                     'icon' => 'error',
                    'status'=>'fail',
                    'message' => '<div class="alert alert-danger">'.$message.'</div>',
                  );
                
                echo json_encode($response);
                exit();
                
                }
                
                }
                
                else{
                
                
                 $response=array(
                    'status'=>'fail',
                    'message' => '<div class="alert alert-danger text-left">Incorrect security pin !!!</div>',
                  );
                  echo json_encode($response);
                  exit();
                
                
                }
        
    }
}
else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please Enter Valid Digit !!!</div>',
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