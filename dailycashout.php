 <?php

require("functions/web_config.php");

$input = $_GET['msg']; 
$input = $_REQUEST;

$input= $input ['msg'];



          $event = json_encode($input); 
          echo $event;
        file_put_contents("abumpay.txt", $input);
        

$user_reference=$_GET['trx'];

$status=$_GET['status'];
$true_response=$_GET['msg']; 

$event = json_encode($true_response); 
          echo $event;
        file_put_contents("mustech.txt", $event);

$email_query = "SELECT buyer_amount, buyer_email, mobile_number FROM final_transactions WHERE api_ref='".$user_reference."'";  
$email_result = mysqli_query($con, $email_query);
    $email_array = mysqli_fetch_assoc($email_result);
$refund_phone = $email_array['mobile_number'];
$email = $email_array['buyer_email'];
$amout = $email_array['buyer_amount'];
    
// update response as it comes from DAILYCASHOUT
$status = strtolower($status) == 'success' ? "SUCCESSFUL" : "FAILED";
$query = "UPDATE final_transactions SET buyer_descr='".$true_response." on ".$refund_phone."', buyer_status='SUCCESSFUL' WHERE api_ref='".$user_reference."'"; 
$result=mysqli_query($con, $query);


?>