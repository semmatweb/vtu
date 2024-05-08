<?php
require ("config.php");

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$json = file_get_contents('php://input');
$data = json_decode($json);

 $return_ref=$data->event->data->reference;
 $status=$data->status;

 if ($status == "false" || $status == "False"){
 
        
       $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT amount,username,descr, email FROM mytransaction WHERE trx='".$return_ref."'"));
            
            $amount_buy = $cbal[0];
            $buyer_username=$cbal[1];
            $buyer_descr=$cbal[2];
            $buyer_email=$cbal[3];
            
       $cdata = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets FROM users WHERE emailR='".$buyer_email."'"));
            
            $current_bal = $cdata[0];
            $new_bal= $current_bal+$amount_buy;
        
            
       mysqli_query($db, "UPDATE users SET us_wallets='$new_bal' WHERE emailR='$buyer_email'");

       mysqli_query($db, "INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`, `oldbal`, `newbal`) VALUES (NULL, '$buyer_email', '$buyer_username', '$amount_buy', '$buyer_descr', 'Refund', '$time', 'WEB', '$return_ref', '$current_bal', '$new_bal')");
          
        
    }


?>