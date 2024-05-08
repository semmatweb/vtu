<?php session_start(); ?>

<?php
$baseurl = "https://salabeb.com/0";
$mainpage = "https://salabeb.com";
//$adminpage = "https://salabeb.com/admin-salabeb063"; 
$adminpage = "https://salabeb.com/admin@sal45"; 

$dbname = "salaolid_salaDatabaseClode";
$dbhost = "localhost";
$dbuser = "salaolid_clouduseronlin087";
$dbpass = "YB4vxIJPB3Hw_Sala#";
$db = mysqli_connect('localhost','salaolid_clouduseronlin087','YB4vxIJPB3Hw_Sala#','salaolid_salaDatabaseClode');

////------------------>>>>>>>>> DO NOT EDIT BELOW IF NOT NEEDED

$timezone_string = 'Africa/Lagos';
date_default_timezone_set($timezone_string);
$tm = time();
error_reporting(E_ALL);

$dbsetting = mysqli_connect('localhost','salaolid_clouduseronlin087','YB4vxIJPB3Hw_Sala#','salaolid_salaDatabaseClode');

$querysetting = "SELECT * FROM general_setting";
                $resultsetting = mysqli_query($dbsetting, $querysetting);
                while($rowsetting = mysqli_fetch_assoc($resultsetting)) {
                    
      // Display your datas on the page
 $sitetitle = $rowsetting['sitetitle'];

 ///GUEST FRONT PRICE
 $mtn_guest=$rowsetting['mtn_guest'];
 $glo_guest=$rowsetting['glo_guest'];
 $airtel_guest=$rowsetting['airtel_guest'];
 $mobile_guest=$rowsetting['mobile_guest'];


/// FOR SITE CONTACTS
$contact_body= $rowsetting['contact_body'];
$contact_number= $rowsetting['contact_number'];
$whatsapp= $rowsetting['whatsapp'];


$paystack_sk= $rowsetting['paystack_sk'];
$paystack_pk= $rowsetting['paystack_pk'];

// FOR SITE DATA PIN
$simpin=$rowsetting['simpin'];
$airtelpin=$rowsetting['airtelpin'];


$smsusername= $rowsetting['smsusername'];
$smspassword= $rowsetting['smspassword'];
$sms_token=$rowsetting['sms_token'];


/// FOR SITE AIRTIME DISCOUNT
$m_discount=$rowsetting['m_discount']; 
$g_discount=$rowsetting['g_discount'];
$a_discount=$rowsetting['a_discount'];
$mo_discount=$rowsetting['mo_discount'];

/// FOR SITE SHARE&SELL DISCOUNT
$m_discount2=$rowsetting['m_discount2'];
$g_discount2=$rowsetting['g_discount2'];
$a_discount2=$rowsetting['a_discount2'];
$mo_discount2=$rowsetting['mo_discount2'];

/// FOR SITE AIRTIME2CASH DISCOUNT
$m_discount3=$rowsetting['m_discount3'];
$g_discount3=$rowsetting['g_discount3'];
$a_discount3=$rowsetting['a_discount3'];
$mo_discount3=$rowsetting['mo_discount3'];

/// FOR SITE CHARGES
$cable_charge=$rowsetting['cable_charge'];
$elect_charge=$rowsetting['elect_charge'];
$waec_price=$rowsetting['waec_price'];
$neco_price=$rowsetting['neco_price'];
$nabteb_price=$rowsetting['nabteb_price'];
		
		
$cable_num=$rowsetting['cable_num'];
$elect_num=$rowsetting['elect_num'];

/// FOR SITE ORDER MOBILE		
$glo_n= $rowsetting['glo_n'];
$mtn_n= $rowsetting['mtn_n'];
$airtel_n= $rowsetting['airtel_n'];
$mobile_n= $rowsetting['mobile_n'];


//MONNIFY
$monnify_pk=$rowsetting['monnify_pk'];
$monnify_sk=$rowsetting['monnify_sk'];
$monnify_cc=$rowsetting['monnify_cc'];
$monnify_mode=$rowsetting['monnify_mode'];

$gladapi=$rowsetting['gladapi'];

/// FOR SITE SWITCHING
$mtnswitch=$rowsetting['mtnswitch'];
$gloswitch=$rowsetting['gloswitch'];
$airtelswitch=$rowsetting['airtelswitch'];
$mobileswitch=$rowsetting['mobileswitch'];
$gifting_switch=$rowsetting['gifting_switch'];
$airtimeswitch=$rowsetting['airtimeswitch'];


/// FOR SITE PRICING
$mtn_gifting=$rowsetting['mtn_gifting'];
$cable_prices= $rowsetting['cable_prices'];
$buy_price=$rowsetting['buy_price'];
$ceov_price=$rowsetting['ceov_price'];
$agent_price=$rowsetting['agent_price'];
			
			
/// FOR EMAIL ACCOUNT
$mail_host=$rowsetting['mail_host'];
$mail_user=$rowsetting['mail_user'];
$mail_pass=$rowsetting['mail_pass'];


/// MSPLUG SERVER
$mtn_slot=$rowsetting['mtn_slot'];
$glo_slot=$rowsetting['glo_slot'];
$airtel_slot=$rowsetting['airtel_slot'];
$mobile_slot=$rowsetting['mobile_slot'];

$mtn_device=$rowsetting['mtn_device'];
$glo_device=$rowsetting['glo_device'];
$airtel_device=$rowsetting['airtel_device'];
$mobile_device=$rowsetting['mobile_device'];

$mtn_string=$rowsetting['mtn_string'];
$glo_string=$rowsetting['glo_string'];
$airtel_string=$rowsetting['airtel_string'];
$mobile_string=$rowsetting['mobile_string'];

$msplug_token=$rowsetting['msplug_token'];


/// SIM SERVER

$mtn_server=$rowsetting['mtn_server'];
$glo_server=$rowsetting['glo_server'];
$airtel_server=$rowsetting['airtel_server'];
$mobile_server=$rowsetting['mobile_server'];
$ussd_token=$rowsetting['ussd_token'];

$vtpass_login=$rowsetting['vtpass_login'];

$holla_user=$rowsetting['holla_user'];
$holla_pass=$rowsetting['holla_pass'];

$theme_color=$rowsetting['theme_color'];

$popup_msg=$rowsetting['popup_msg'];
$mode=$rowsetting['mode'];
$scroll_msg=$rowsetting['scroll_msg'];

///API SWITCH
$api_mtn=$rowsetting['api_mtn'];
$api_glo=$rowsetting['api_glo'];
$api_airtel=$rowsetting['api_airtel'];
$api_mobile=$rowsetting['api_mobile'];
$api_gift=$rowsetting['api_gift'];
$api_airtelcg=$rowsetting['api_airtelcg'];

$airtelcgswitch=$rowsetting['airtelcgswitch'];
$admin_email=$rowsetting['admin_email'];
$deposit_num=$rowsetting['deposit_num'];

}

?>