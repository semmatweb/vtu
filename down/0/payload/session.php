<?php  
require("../../config.php");


if (!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['sid'])){
    
    session_destroy();
    header("location:login");
}

else{

$email=$_SESSION['email'];
$password=$_SESSION['password'];
$sid=$_SESSION['sid'];

$ch_ss=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND password='".$password."' AND sid='".$sid."'");
    if (mysqli_num_rows($ch_ss)<1){

        session_destroy();
        header("location:login");
    }

    else{

        while ($data=mysqli_fetch_array($ch_ss, MYSQLI_ASSOC)) {
            
            $myid=$data['id'];
            $email=$data['emailR'];
            $username=$data['email'];
            $mobile=$data['mobile'];
            $mallu=$data['us_wallets'];
            $refby=$data['referredby'];
            $refbonus=$data['us_bonus'];
            $first_name=$data['firstname'];
            $last_name=$data['lastname'];
            $refcode=$data['refcode'];
            $ceov=$data['ceov'];
            $activate=$data['activate'];
            $lastlogin=$data['LastLogin'];
            $reg_active=$data['reg_active'];
            $report=$data['report'];
            $block=$data['block'];
            
            
            $bankname=$data['bankname'];
            $acctno=$data['acctno'];
            $acctname=$data['acctname'];
            $ref=$data['ref'];
            $gen_bank=$data['gen_bank'];
           
        }
    
}

if (strpos($mallu, "-") !== false){

    mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");

   }

if ($block==1){

    header("location:logout");
}


    
}
?>