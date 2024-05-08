<?php
require("session.php");

if ($_SERVER['HTTP_REFERER'] != $baseurl."/buyData"){
    
    $cilu=$_SERVER['HTTP_REFERER'];
    $reason="Data";
    
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    
     require("fraud.php");
  
 header("location:logout");
 exit();
 
}

$network=$_POST['network'];
$phone=$_POST['phone'];
$plans=$_POST['plan'];

$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);

if ($amounttopay > 0 && $amounttopay < $mallu){


if ($network=="MTN"){

  include("$mtnswitch");
}

else if ($network=="GLO"){

  require("$gloswitch");
}

else if ($network=="AIRTEL"){

  require("$airtelswitch");
}

else if ($network=="AIRTEL-CG"){

  require("$airtelcgswitch");
}

else if ($network=="9MOBILE"){

  require("$mobileswitch");
}

else if ($network=="GIFTING"){

  require("$gifting_switch");
}

else {


}

}

else{
    
echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
exit();
    
}


    
?>