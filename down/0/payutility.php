<?php

require_once("cable_config.php");

if ($_SERVER['HTTP_REFERER'] != $baseurl."/billPayment"){
    
    $cilu=$_SERVER['HTTP_REFERER'];
    $reason="Bills";
    
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    
     require("fraud.php");
  
 header("location:logout");
 exit();
 
}

    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");

$metertype=$_POST['metertype'];
$meternum=$_POST['meternum'];
$amount=$_POST['amount']+$elect_charge;
$discotype=$_POST['discotype'];
$metername=$_POST['metername'];


if (is_numeric($amount) && $amount > 1000){

if ($discotype=="abuja-electric"){

require("AEDC.php");
}

if ($discotype=="eko-electric"){

	require("EKEDC.php");
}

if ($discotype=="ikeja-electric"){
	require("IKEDC.php");
}
if ($discotype=="ibadan-electric"){

	require("IBEDC.php");
}

if ($discotype=="kaduna-electric"){

	require("KAEDC.php");
}

if ($discotype=="kano-electric"){
	require("KEDCO.php");
}

if ($discotype=="jos-electric"){
	require("JED.php");
}

if ($discotype=="portharcourt-electric"){
	require("PHED.php");
}


}

else {
    
echo "Insufficient Balance. Try Again !!!";
exit();
}




?>