<?php
require("session.php");

if ($_SERVER['HTTP_REFERER'] != $baseurl."/buyAirtime"){
    
    $cilu=$_SERVER['HTTP_REFERER'];
    $reason="Airtime";
    
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    
     require("fraud.php");
  
 header("location:logout");
 exit();
 
}

$airtimetype=$_POST['airtimetype'];
$amount=$_POST['amount'];
$amount2=$_POST['amount2'];
$network=$_POST['network'];
$phone=$_POST['phone'];

if ($airtimetype=="VTU"){

  require("buyvtu.php");
}

else if ($airtimetype=="SHARE"){

  require("buyshare.php");
}

else {


}


    
?>