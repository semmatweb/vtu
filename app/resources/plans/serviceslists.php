<?php
error_reporting(0);
$rtdata="";

if (!empty($_GET['services']) && !empty($_GET['level'])){
require("../../../functions/web_config.php");

$level=$_GET['level'];
$getservices=strtolower($_GET['services']);
if ($getservices=="mtn-datacard"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtndatacard_15, mtndatacard_2, mtndatacard_75, mtnsme_3, mtnsme_5 FROM mtndatacard_plan WHERE id='$level'"));

echo '
	<option value="75">MTN DATA CARD 750MB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="15">MTN DATA CARD 1.5GB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="2">MTN DATA CARD 2.0GB - ₦'.$data_query[1].' (1 Month Validity)</option>
';
}


if ($getservices=="mtn-dc"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtndc_1, mtndc_2, mtndc_3, mtndc_4, mtndc_5, mtndc_6 FROM mtndc_plan WHERE id='$level'"));

echo '
    <option value="10">MTN DATA COUPON (DC) 1.0GB - ₦'.$data_query[0].' (1 WEEK VALIDITY)</option>
	<option value="15">MTN DATA COUPON (DC) 1.50GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="20">MTN DATA COUPON (DC) 2.0GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="30">MTN DATA COUPON (DC) 3.0GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="50">MTN DATA COUPON (DC) 5.0GB - ₦'.$data_query[4].' (1 Month Validity)</option>

';
}

if ($getservices=="mtn"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtnsme_500,mtnsme_1, mtnsme_2, mtnsme_3, mtnsme_5, mtnsme_10 FROM mtnsmedata_plan WHERE id='$level'"));

echo '
	<option value="500">MTN SME 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="1000">MTN-SME 1GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="2000">MTN-SME 2GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="3000">MTN-SME 3GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="5000">MTN-SME 5GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="10000">MTN-SME 10GB - ₦'.$data_query[5].' (1 Month Validity)</option>
';
}

if ($getservices=="mtn2"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtnsme_500,mtnsme_1, mtnsme_2, mtnsme_3, mtnsme_5, mtnsme_10 FROM mtnsme2data_plan WHERE id='$level'"));

echo '
	<option value="500">MTN-SME 2 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="1000">MTN-SME 2 1GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="2000">MTN-SME 2 2GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="3000">MTN-SME 2 3GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="5000">MTN-SME 2 5GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="10000">MTN-SME 2 10GB - ₦'.$data_query[5].' (1 Month Validity)</option>
';
}

if ($getservices=="mtn-cg"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtncg_500,mtncg_1, mtncg_2, mtncg_3, mtncg_5, mtncg_10 FROM mtncgdata_plan WHERE id='$level'"));

echo '
	<option value="500">MTN-CG 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="1000">MTN-CG 1GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="2000">MTN-CG 2GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="3000">MTN-CG 3GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="5000">MTN-CG 5GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="10000">MTN-CG 10GB - ₦'.$data_query[5].' (1 Month Validity)</option>
';
}

if ($getservices=="mtn-cg2"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtncg_500,mtncg_1, mtncg_2, mtncg_3, mtncg_5, mtncg_10 FROM mtncg2data_plan WHERE id='$level'"));

echo '
	<option value="500">MTN-CG 2 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="1000">MTN-CG 2 1GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="2000">MTN-CG 2 2GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="3000">MTN-CG 2 3GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="5000">MTN-CG 2 5GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="10000">MTN-CG 2 10GB - ₦'.$data_query[5].' (1 Month Validity)</option>
';
}

if ($getservices=="glo"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_105,glo_29, glo_41, glo_58, glo_77, glo_10, glo_1325, glo_1825, glo_295, glo_50, glo_93  FROM glodata_plan WHERE id='$level'"));

echo '
	<option value="201">GLO 350MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="202">GLO 1.35GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="203">GLO 3.9GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="204">GLO 7.5GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="205">GLO 9.2GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="206">GLO 10.8GB - ₦'.$data_query[5].' (1 Month Validity)</option>
	<option value="207">GLO 14.0GB - ₦'.$data_query[6].' (1 Month Validity)</option>
	<option value="208">GLO 18.0GB - ₦'.$data_query[7].' (1 Month Validity)</option>
	<option value="209">GLO 24.0GB - ₦'.$data_query[8].' (1 Month Validity)</option>
	<option value="210">GLO 29.5GB - ₦'.$data_query[9].' (1 Month Validity)</option>
	<option value="211">GLO 93GB - ₦'.$data_query[10].' (1 Month Validity)</option>
';
}

if ($getservices=="glo-cg"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_105,glo_29, glo_41, glo_58, glo_77, glo_10  FROM glocgdata_plan WHERE id='$level'"));

echo '
	<option value="201">GLO-CG 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="202">GLO-CG 1.0GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="203">GLO-CG 2.0GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="204">GLO-CG 3.0GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="205">GLO-CG 5.0GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="206">GLO-CG 10.0GB - ₦'.$data_query[5].' (1 Month Validity)</option>
';
}
if ($getservices=="airtel"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_750,airtel_15, airtel_2, airtel_3, airtel_45, airtel_6, airtel_10, airtel_11, airtel_20, airtel_40, airtel_75,airtel_120  FROM airteldata_plan WHERE id='$level'"));

echo '
	<option value="501">AIRTEL 750MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="502">AIRTEL 1.5GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="503">AIRTEL 2GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="504">AIRTEL 3GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="505">AIRTEL 4.5GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="506">AIRTEL 6GB - ₦'.$data_query[5].' (1 Month Validity)</option>
	<option value="507">AIRTEL 10GB - ₦'.$data_query[6].' (1 Month Validity)</option>
	<option value="508">AIRTEL 11GB - ₦'.$data_query[7].' (1 Month Validity)</option>
	<option value="509">AIRTEL 20GB - ₦'.$data_query[8].' (1 Month Validity)</option>
	<option value="510">AIRTEL 40GB - ₦'.$data_query[9].' (1 Month Validity)</option>
	<option value="511">AIRTEL 75GB - ₦'.$data_query[10].' (1 Month Validity)</option>
	<option value="512">AIRTEL 120GB - ₦'.$data_query[11].' (1 Month Validity)</option>
';
}

if ($getservices=="airtel-cg"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtelcg_100,airtelcg_300, airtelcg_500, airtelcg_1, airtelcg_2, airtelcg_5, airtelcg_10  FROM airtelcgdata_plan WHERE id='$level'"));

echo '
	<option value="601">AIRTEL-CG 100MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="602">AIRTEL-CG 300MB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="603">AIRTEL-CG 500MB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="604">AIRTEL-CG 1GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="605">AIRTEL-CG 2GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="606">AIRTEL-CG 5GB - ₦'.$data_query[5].' (1 Month Validity)</option>
	<option value="607">AIRTEL-CG 10GB - ₦'.$data_query[6].' (1 Month Validity)</option>
';
}

if ($getservices=="9mobile"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_500,mobile_15, mobile_2, mobile_3, mobile_45, mobile_11, mobile_150, mobile_40, mobile_75  FROM mobiledata_plan WHERE id='$level'"));

echo '
	<option value="401">9MOBILE 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="402">9MOBILE 1.5GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="403">9MOBILE 2GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="404">9MOBILE 3GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="405">9MOBILE 4.5GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="406">9MOBILE 11GB - ₦'.$data_query[5].' (1 Month Validity)</option>
	<option value="407">9MOBILE 15GB - ₦'.$data_query[6].' (1 Month Validity)</option>
	<option value="408">9MOBILE 40GB - ₦'.$data_query[7].' (1 Month Validity)</option>
	<option value="409">9MOBILE 75GB - ₦'.$data_query[8].' (1 Month Validity)</option>
';
}

if ($getservices=="9mobile-cg"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_500,mobile_1, mobile_2, mobile_3, mobile_5, mobile_10, mobile_15, mobile_20, mobile_4 FROM mobiledatacg_plan WHERE id='$level'"));

echo '
	<option value="401">9MOBILE-CG 500MB - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="402">9MOBILE-CG 1.0GB - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="403">9MOBILE-CG 2.0GB - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="404">9MOBILE-CG 3.0GB - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="409">9MOBILE-CG 4.0GB - ₦'.$data_query[8].' (1 Month Validity)</option>
	<option value="405">9MOBILE-CG 5.0GB - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="406">9MOBILE-CG 10.0GB - ₦'.$data_query[5].' (1 Month Validity)</option>

';
}

// 	<option value="407">9MOBILE-CG 15.0GB - ₦'.$data_query[6].' (1 Month Validity)</option>
// 	<option value="408">9MOBILE-CG 20.0GB - ₦'.$data_query[7].' (1 Month Validity)</option>
/////////////// DATA ENDS

if ($getservices=="gotv"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gotv_1,gotv_2, gotv_3, gotv_4, gotv_5 FROM gotv_planlist WHERE id='1'"));

echo '
	<option value="600">Gotv Supa - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="601">Gotv Max - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="603">Gotv Jolli - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="602">Gotv Jinja - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="604">Gotv Smallie - ₦'.$data_query[4].' (1 Month Validity)</option>
';
}

if ($getservices=="startimes"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT star_1,star_2, star_3, star_4, star_5, star_6, star_7, star_8, star_9, star_10 FROM startime_planlist WHERE id='1'"));

echo '
	<option value="701">Nova Weekly - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="702">Nova Monthly - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="703">Basic Weekly - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="704">Basic Monthly - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="705">Smart Weekly - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="706">Smart Monthly - ₦'.$data_query[5].' (1 Month Validity)</option>
	<option value="707">Classic Weekly - ₦'.$data_query[6].' (1 Month Validity)</option>
	<option value="708">Classic Monthly - ₦'.$data_query[7].' (1 Month Validity)</option>
	<option value="709">Super Weekly - ₦'.$data_query[8].' (1 Month Validity)</option>
	<option value="710">Super Monthly - ₦'.$data_query[9].' (1 Month Validity)</option>
';
}

if ($getservices=="dstv"){
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT dstv_1,dstv_2, dstv_3, dstv_4, dstv_5, dstv_6, dstv_7, dstv_8, dstv_9, dstv_10, dstv_11,dstv_12 FROM dstv_planlist WHERE id='1'"));

echo '
	<option value="800">Dstv Padi - ₦'.$data_query[0].' (1 Month Validity)</option>
	<option value="801">Dstv Yanga - ₦'.$data_query[1].' (1 Month Validity)</option>
	<option value="802">Dstv Confam - ₦'.$data_query[2].' (1 Month Validity)</option>
	<option value="803">Dstv Padi Extra - ₦'.$data_query[3].' (1 Month Validity)</option>
	<option value="804">Dstv Yanga Extra - ₦'.$data_query[4].' (1 Month Validity)</option>
	<option value="805">Dstv Asia - ₦'.$data_query[5].' (1 Month Validity)</option>
	<option value="806">Dstv Confam Extra - ₦'.$data_query[6].' (1 Month Validity)</option>
	<option value="807">Dstv Compact - N'.$data_query[7].' (1 Month Validity)</option>
	<option value="808">Dstv Compact Plus - ₦'.$data_query[8].' (1 Month Validity)</option>
	<option value="811">Dstv Extra View Access - ₦'.$data_query[9].' (1 Month Validity)</option>
	<option value="809">Dstv Premium - ₦'.$data_query[10].' (1 Month Validity)</option>
	<option value="810">Dstv Premium Asia - ₦'.$data_query[11].' (1 Month Validity)</option>
';
}
/////////////////CABLTEV ENDS

//AIRTIME VTU-START

if ($getservices=="mtn-vtu"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_discount FROM airtimevtu_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="glo-vtu"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_discount FROM airtimevtu_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="airtel-vtu"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_discount FROM airtimevtu_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="9mobile-vtu"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_discount FROM airtimevtu_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

///AIRTIME VTU-END


//AIRTIME SNS-START

if ($getservices=="mtn-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="glo-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="airtel-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="9mobile-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

///AIRTIME SNS-END

//AIRTIME SWAP-START

if ($getservices=="mtn-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="glo-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="airtel-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="9mobile-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

///AIRTIME SWAP-END

//EPINS-START

if ($getservices=="waec"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT waec FROM epin_planlist WHERE id='$level'"));

echo '
	<div class="alert alert-warning">WAEC = ₦'.$data_query[0].'</div>
';
}

if ($getservices=="neco"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT neco FROM epin_planlist WHERE id='$level'"));

echo '
	<div class="alert alert-success">NECO = ₦'.$data_query[0].'</div>
';
}

if ($getservices=="nabteb"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT nabteb FROM epin_planlist WHERE id='$level'"));

echo '
	<div class="alert alert-danger">NABTEB = ₦'.$data_query[0].'</div>
';
}

if ($getservices=="nbais"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT nbais FROM epin_planlist WHERE id='$level'"));

echo '
	<div class="alert alert-danger">NBAIS = ₦'.$data_query[0].'</div>
';
}

///EPINS-END


//BILLS-START

if ($getservices=="abuja-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT abuja FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="ibadan-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT ibadan FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="eko-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT eko FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="jos-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT jos FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="kaduna-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT kaduna FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="kano-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT kano FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="ikeja-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT ikeja FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="portharcourt-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT portharcourt FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}


}

else{

echo "NULL";
exit();
}

?>