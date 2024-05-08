<?php

$baseurl = "https://successfulaffiliate.com.ng/app";
$mainpage = "https://successfulaffiliate.com.ng";
$adminurl = "https://successfulaffiliate.com.ng/ib"; 

$host="localhost";
$user="successf_14";
$pass="oladosu7771";
$dbanme="successf_14";

$con=mysqli_connect($host, $user, $pass, $dbanme);
if (!$con){die("Error Connecting DB".mysql_error());}

$return_setting=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM web_settings WHERE id='1'"));

$sitename=$return_setting['sitename'];
$domain=$return_setting['domain'];
$address=$return_setting['address'];
$contact_no=$return_setting['contact_no'];
$whatsapp_no=$return_setting['whatsapp_no'];
$theme_color=$return_setting['theme_color'];
$vtpass_account=$return_setting['vtpass_account'];
$admin_email=$return_setting['admin_email'];
$group_link=$return_setting['group_link'];
$contact_number=$return_setting['contact_no'];
$sitetitle=$return_setting['sitename'];

///WEB MAIL
$mail_hostname=$return_setting['mail_hostname'];
$mail_username=$return_setting['mail_username'];
$mail_password=$return_setting['mail_password'];

//API TOKEN
$smeplug_token=$return_setting['smeplug_token'];
$abumpay_token=$return_setting['abumpay_token'];
$simserver_token=$return_setting['simserver_token'];
$ogdam_token=$return_setting['ogdam_token'];
$easyaccess_token=$return_setting['easyaccess_token'];

//FOR SMS
$sms_username=$return_setting['sms_username'];
$sms_password=$return_setting['sms_password'];
$sms_sender=$return_setting['sms_sender'];
$sms_token=$return_setting['sms_token'];

///PAYMENTGATEWAY
$paystack_sk=$return_setting['paystack_sk'];
$paystack_pk=$return_setting['paystack_pk'];
$flutterwave_sk=$return_setting['flutterwave_sk'];
$flutterwave_pk=$return_setting['flutterwave_pk'];
$monnify_sk=$return_setting['monnify_sk'];
$monnify_pk=$return_setting['monnify_pk'];
$monnify_cc=$return_setting['monnify_cc'];
$monnify_mode=$return_setting['monnify_mode'];

//
$api_url=$return_setting['api_url'];

//DATA SWITCH
$api_mtn=$return_setting['api_mtn'];
$api_gift=$return_setting['api_gift'];
$api_mtnsme2=$return_setting['api_mtnsme2'];    // mtn sme 2
$api_gift2=$return_setting['api_gift2']; //mtn coorperate gifting 2
$api_mtndc=$return_setting['api_mtndc'];
$api_glo=$return_setting['api_glo'];
$api_glocg=$return_setting['api_glocg'];
$api_airtel=$return_setting['api_airtel'];
$api_airtelcg=$return_setting['api_airtelcg'];
$api_mobile=$return_setting['api_mobile'];
$api_mobilecg=$return_setting['api_mobilecg'];

//DATA CARD SWITCH
$api_mtndatacard=$return_setting['api_mtndatacard'];

//VTU SWITCH
$api_mtn2=$return_setting['api_mtn2'];
$api_mobile2=$return_setting['api_mobile2'];
$api_glo2=$return_setting['api_glo2'];
$api_airtel2=$return_setting['api_airtel2'];

//SNS SWITCH
$api_mtn3=$return_setting['api_mtn3'];
$api_mobile3=$return_setting['api_mobile3'];
$api_glo3=$return_setting['api_glo3'];
$api_airtel3=$return_setting['api_airtel3'];

//ORDER CONTACT
$mtn_n=$return_setting['mtn_n'];
$glo_n=$return_setting['glo_n'];
$airtel_n=$return_setting['airtel_n'];
$mobile_n=$return_setting['mobile_n'];


//NOTIFICATION
$notification_scroll=$return_setting['notification_scroll'];
$scrolling_mode=$return_setting['scrolling_mode'];
$notification=$return_setting['notification'];
$notification_mode=$return_setting['notification_mode'];
$notification1=$return_setting['notification1'];
$notification1_mode=$return_setting['notification1_mode'];
$notification2=$return_setting['notification2'];
$notification2_mode=$return_setting['notification2_mode'];
$notification3=$return_setting['notification3'];
$notification3_mode=$return_setting['notification3_mode'];


////LOCK CABLE
$dstv_lock=$return_setting['dstv_lock'];
$gotv_lock=$return_setting['gotv_lock'];
$star_lock=$return_setting['star_lock'];

////LOCK EPINS
$waec_lock=$return_setting['waec_lock'];
$neco_lock=$return_setting['neco_lock'];
$nabt_lock=$return_setting['nabt_lock'];
$nbais_lock=$return_setting['nbais_lock'];

////LOCK VTU
$m_lock2=$return_setting['m_lock2'];
$g_lock2=$return_setting['g_lock2'];
$a_lock2=$return_setting['a_lock2'];
$mo_lock2=$return_setting['mo_lock2'];

////LOCK SNS
$m_lock3=$return_setting['m_lock3'];
$g_lock3=$return_setting['g_lock3'];
$a_lock3=$return_setting['a_lock3'];
$mo_lock3=$return_setting['mo_lock3'];

////LOCK DATA
$m_lock1=$return_setting['m_lock1'];
$m2_lock1=$return_setting['m2_lock1'];
$mg_lock1=$return_setting['mg_lock1'];
$mg2_lock1=$return_setting['mg2_lock1'];
$mdc_lock1=$return_setting['mdc_lock1'];
$g_lock1=$return_setting['g_lock1'];
$gcg_lock1=$return_setting['gcg_lock1'];
$a_lock1=$return_setting['a_lock1'];
$ag_lock1=$return_setting['ag_lock1'];
$mo_lock1=$return_setting['mo_lock1'];
$mocg_lock1=$return_setting['mocg_lock1'];

////LOCK DATA
$mtndatacard_lock1=$return_setting['mtndatacard_lock1'];

////LOCK BILLS
$abuja_lock=$return_setting['abuja_lock'];
$eko_lock=$return_setting['eko_lock'];
$ibadan_lock=$return_setting['ibadan_lock'];
$ikeja_lock=$return_setting['ikeja_lock'];
$jos_lock=$return_setting['jos_lock'];
$kano_lock=$return_setting['kano_lock'];
$kaduna_lock=$return_setting['kaduna_lock'];
$port_lock=$return_setting['port_lock'];

///
$sms_access=$return_setting['sms_access'];
$withdraw_access=$return_setting['withdraw_access'];
$withdraw_charge=$return_setting['withdraw_charge'];
$flyer_charge=$return_setting['flyer_charge'];
$level2_charge=$return_setting['level2_charge'];
$level2_adminch=$return_setting['level2_adminch'];
$level3_charge=$return_setting['level3_charge'];
$level3_adminch=$return_setting['level3_adminch'];
$level4_charge=$return_setting['level4_charge'];
$level4_adminch=$return_setting['level4_adminch'];

//DATA COMMISSION
$mdata_comm=$return_setting['mdata_comm'];
$mcdata_comm=$return_setting['mcdata_comm'];
$adata_comm=$return_setting['adata_comm'];
$acdata_comm=$return_setting['acdata_comm'];
$gdata_comm=$return_setting['gdata_comm'];
$gcgdata_comm=$return_setting['gcgdata_comm'];
$modata_comm=$return_setting['modata_comm'];

//AIRTIME COMMISSION
$mair_comm=$return_setting['mair_comm'];
$gair_comm=$return_setting['gair_comm'];
$aair_comm=$return_setting['aair_comm'];
$moair_comm=$return_setting['moair_comm'];

//CABLE COMMISSION
$gotv_comm=$return_setting['gotv_comm'];
$dstv_comm=$return_setting['dstv_comm'];
$star_comm=$return_setting['star_comm'];

///E-PINS COMMSSION
$waec_comm=$return_setting['waec_comm'];
$neco_comm=$return_setting['neco_comm'];
$nabteb_comm=$return_setting['nabteb_comm'];

//BILLS COMMSSION
$bills_comm=$return_setting['bills_comm'];

//SMS COMMSSION
$sms_comm=$return_setting['sms_comm'];

$atm_lock=$return_setting['atm_lock'];



$don_token='';
$smeplug_token='';
$simpin='';

////
$airtel_device='';
$airtel_slot='';
$airtel_string='';

$mtn_device='';
$mtn_slot='';
$mtn_string='';

$glo_device='';
$glo_slot='';
$glo_string='';

$mobile_device='';
$mobile_slot='';
$mobile_string='';

?>