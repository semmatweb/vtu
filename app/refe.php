<?php
require("../functions/autoload.php");
$username=trim(mysqli_real_escape_string($con,$_POST['username']));
$checker="SELECT sum(amount) as amount FROM `referal_link` WHERE `referal_username`='$username' and amount>0 and status='no'";
          $result2 = mysqli_query($con, $checker);  
          $row2 = mysqli_fetch_array($result2);
$cashout=$row2['amount'];
if(empty($cashout)){
    $cashout=0;
}
if($cashout==0){
        echo "false";
}else{
    
    $sql ="UPDATE referal_link SET status='yes' WHERE referal_username='$username' and amount>0";
if (mysqli_query($con, $sql)) {
 // echo "Record updated successfully";
} else {
  //echo "Error updating record: " . mysqli_error($con);
}

    
    $checker2="SELECT wallets FROM `users` WHERE `username`='$username' ";
          $result3 = mysqli_query($con, $checker2);  
          $row3 = mysqli_fetch_array($result3);
        $total= intval($row3['wallets'])+intval($cashout);
    
    $sql2 ="UPDATE users SET wallets=$total WHERE username='$username'";
if (mysqli_query($con, $sql2)) {
  echo "true";
} else {
  //echo "Error updating record: " . mysqli_error($con);
}
    
    
}



?>