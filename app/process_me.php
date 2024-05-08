<?php
require_once('session_controller.php');

$postemail = $_POST['email'];
$postamount = $_POST['amountw'];
$cus_name = $_POST['cus_name'];
$charge = $postamount * 1.5 / 100;
$final_amount = ($postamount + $charge) * 100;

$monnify_pk;
$monnify_sk;
$monnify_cc;
$monnify_hashkeys = $monnify_pk . ":" . $monnify_sk;
$stringk = base64_encode($monnify_hashkeys);
$xx = $monnify_cc;

$transid = uniqid();
$payment_reference = "REF" . $transid;

$callback_url = "http://freesub.com.ng/app/webhook_one_time_mpayment.php";
$currency_code = "NGN";

$url = "https://api.monnify.com/api/v1/transactions/initialize";

$headers = array(
    "Content-Type: application/json",
    "Authorization: Basic " . $stringk,
);

$data = array(
    "amount" => $final_amount,
    "customerName" => $cus_name,
    "customerEmail" => $postemail,
    "paymentReference" => $payment_reference,
    "currencyCode" => $currency_code,
    "contractCode" => $xx,
    "redirectUrl" => $callback_url,
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if ($http_status == 200) {
    $payment = json_decode($response, true);
    $payment_url = $payment['responseBody']['paymentUrl'];

    // Insert the transaction into the database
    $sql = "INSERT INTO `deposit_transactions` (`id`, `user_email`, `user_username`, `user_service`, `user_amount`, `user_prebal`, `user_postbal`, `user_descr`, `user_status`, `user_date`, `timestring`, `sys_ref`, `api_ref`, `pay_gateway`, `api_report`, `cashier`) 
            VALUES (NULL, '$postemail', '', 'DEPOSIT', '$final_amount', '$final_amount', '$final_amount', '', 'FAIL', '', '', '', '$transid', 'MONNIFY', 'GOOD', '$postemail')";

    if (mysqli_query($con, $sql)) {
        // Redirect the user to the payment page
        header("Location: " . $payment_url);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
} else {
    echo "Failed to initialize transaction: " . $response;
}
?>
