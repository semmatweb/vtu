use function header;
<?php
$weblink=$_SERVER['REQUEST_URI'];
$weblink_bn=basename($weblink);

$route_arr=array("login","Login","data_card", "datacardPrice", "moni_payment","delete_user", "dev_airtime", "own_a_website", "user_level_api", "user_level_affiliate", "user_level_topuser", "user_level_enduser", "dev_cable", "dev_epins", "dev_bill", "dev_data", "documentation", "dev_api_generator", "register","forgotpassword", "index", "web_route", "logout", "session_control", "resetpassword", "wallet", "referral", "withdraw", "profile", "404", "data", "airtime_vtu", "airtime_sns", "exchange_airtime",  "cable", "bills", "epins", "change_password", "logout", "generate_api","kyc", "dashboard", "cable2", "automated_pay", "deposit_payment", "card_payment", "moni_payment", "kyc_register", "reset_pin", "forgot_pin", "create_pin", "transactions", "wallet_summary", "success_transactions", "fail_transactions", "record", "invoice", "update_webhook","get_flyer","sales_analysis","withdraw", "ref_downlines", "cashback_earn","wallet_option","bulk_sms");

if (!in_array($weblink_bn, $route_arr)){
    header("location:../index");
header("location:../index");
}

?>