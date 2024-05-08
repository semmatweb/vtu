<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="mtnsme1" || $searc_level=="mtnsme2" || $searc_level=="mtnsme3" || $searc_level=="mtnsme4"){

if ($searc_level=="mtnsme1"){$level=1;}
if ($searc_level=="mtnsme2"){$level=2;}
if ($searc_level=="mtnsme3"){$level=3;}
if ($searc_level=="mtnsme4"){$level=4;}

require ("../../functions/mtnsme_price.php");

$message='

<form method="POST" id="form_submit">

<div>
<label>MTN SME 500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtnsme_500" class="form-control" value="'.$mtnsme_500.'" required>
</div>

<br/>
<div>
<label>MTN SME 1GB</label>
<input type="tel" id="mtnsme_1" class="form-control" value="'.$mtnsme_1.'" required>
</div>

<br/>
<div>
<label>MTN SME 2GB</label>
<input type="tel" id="mtnsme_2" class="form-control" value="'.$mtnsme_2.'" required>
</div>

<br/>
<div>
<label>MTN SME 3GB</label>
<input type="tel" id="mtnsme_3" class="form-control" value="'.$mtnsme_3.'" required>
</div>

<br/>
<div>
<label>MTN SME 5GB</label>
<input type="tel" id="mtnsme_5" class="form-control" value="'.$mtnsme_5.'" required>
</div>

<br/>
<div>
<label>MTN SME 10GB</label>
<input type="tel" id="mtnsme_10" class="form-control" value="'.$mtnsme_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNSME()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////MTNSME PRICE END

if ($searc_level=="mtnsme21" || $searc_level=="mtnsme22" || $searc_level=="mtnsme23" || $searc_level=="mtnsme24"){

if ($searc_level=="mtnsme21"){$level=1;}
if ($searc_level=="mtnsme22"){$level=2;}
if ($searc_level=="mtnsme23"){$level=3;}
if ($searc_level=="mtnsme24"){$level=4;}

require ("../../functions/mtnsme2_price.php");

$message='

<form method="POST" id="form_submit">

<div>
<label>MTN SME 2 500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtnsme_500" class="form-control" value="'.$mtnsme_500.'" required>
</div>

<br/>
<div>
<label>MTN SME 2 1GB</label>
<input type="tel" id="mtnsme_1" class="form-control" value="'.$mtnsme_1.'" required>
</div>

<br/>
<div>
<label>MTN SME 2 2GB</label>
<input type="tel" id="mtnsme_2" class="form-control" value="'.$mtnsme_2.'" required>
</div>

<br/>
<div>
<label>MTN SME 2 3GB</label>
<input type="tel" id="mtnsme_3" class="form-control" value="'.$mtnsme_3.'" required>
</div>

<br/>
<div>
<label>MTN SME 2 5GB</label>
<input type="tel" id="mtnsme_5" class="form-control" value="'.$mtnsme_5.'" required>
</div>

<br/>
<div>
<label>MTN SME 2 10GB</label>
<input type="tel" id="mtnsme_10" class="form-control" value="'.$mtnsme_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNSME2()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////MTNSME 2 PRICE END

if ($searc_level=="mtncg1" || $searc_level=="mtncg2" || $searc_level=="mtncg3" || $searc_level=="mtncg4"){

if ($searc_level=="mtncg1"){$level=1;}
if ($searc_level=="mtncg2"){$level=2;}
if ($searc_level=="mtncg3"){$level=3;}
if ($searc_level=="mtncg4"){$level=4;}

require ("../../functions/mtncg_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>MTN CG 500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtncg_500" class="form-control" value="'.$mtncg_500.'" required>
</div>

<br/>
<div>
<label>MTN CG 1GB</label>
<input type="tel" id="mtncg_1" class="form-control" value="'.$mtncg_1.'" required>
</div>

<br/>
<div>
<label>MTN CG 2GB</label>
<input type="tel" id="mtncg_2" class="form-control" value="'.$mtncg_2.'" required>
</div>

<br/>
<div>
<label>MTN CG 3GB</label>
<input type="tel" id="mtncg_3" class="form-control" value="'.$mtncg_3.'" required>
</div>

<br/>
<div>
<label>MTN CG 5GB</label>
<input type="tel" id="mtncg_5" class="form-control" value="'.$mtncg_5.'" required>
</div>

<br/>
<div>
<label>MTN CG 10GB</label>
<input type="tel" id="mtncg_10" class="form-control" value="'.$mtncg_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNCG()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
///MTNCG PRICE END

if ($searc_level=="mtncg21" || $searc_level=="mtncg22" || $searc_level=="mtncg23" || $searc_level=="mtncg24"){

if ($searc_level=="mtncg21"){$level=1;}
if ($searc_level=="mtncg22"){$level=2;}
if ($searc_level=="mtncg23"){$level=3;}
if ($searc_level=="mtncg24"){$level=4;}

require ("../../functions/mtncg2_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>MTN CG 2 500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtncg_500" class="form-control" value="'.$mtncg_500.'" required>
</div>

<br/>
<div>
<label>MTN CG 2 1GB</label>
<input type="tel" id="mtncg_1" class="form-control" value="'.$mtncg_1.'" required>
</div>

<br/>
<div>
<label>MTN CG 2 2GB</label>
<input type="tel" id="mtncg_2" class="form-control" value="'.$mtncg_2.'" required>
</div>

<br/>
<div>
<label>MTN CG 2 3GB</label>
<input type="tel" id="mtncg_3" class="form-control" value="'.$mtncg_3.'" required>
</div>

<br/>
<div>
<label>MTN CG 2 5GB</label>
<input type="tel" id="mtncg_5" class="form-control" value="'.$mtncg_5.'" required>
</div>

<br/>
<div>
<label>MTN 2 CG 10GB</label>
<input type="tel" id="mtncg_10" class="form-control" value="'.$mtncg_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNCG2()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
///MTNCG 2 PRICE END

if ($searc_level=="mtndc1" || $searc_level=="mtndc2" || $searc_level=="mtndc3" || $searc_level=="mtndc4"){

if ($searc_level=="mtndc1"){$level=1;}
if ($searc_level=="mtndc2"){$level=2;}
if ($searc_level=="mtndc3"){$level=3;}
if ($searc_level=="mtndc4"){$level=4;}

require ("../../functions/mtndc_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>MTN DC 1.0GB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtndc_500" class="form-control" value="'.$mtndc_1.'" required>
</div>

<br/>
<div>
<label>MTN DC 1.50GB</label>
<input type="tel" id="mtndc_1" class="form-control" value="'.$mtndc_15.'" required>
</div>

<br/>
<div>
<label>MTN DC 2.0GB</label>
<input type="tel" id="mtndc_2" class="form-control" value="'.$mtndc_2.'" required>
</div>

<br/>
<div>
<label>MTN DC 3.0GB</label>
<input type="tel" id="mtndc_3" class="form-control" value="'.$mtndc_3.'" required>
</div>

<br/>
<div>
<label>MTN DC 5.0GB</label>
<input type="tel" id="mtndc_5" class="form-control" value="'.$mtndc_5.'" required>
</div>

<br/>
<div>
<label>MTN DC 10.0GB</label>
<input type="tel" id="mtndc_10" class="form-control" value="'.$mtndc_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNDC()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
///MTN DC  PRICE END
if ($searc_level=="glo1" || $searc_level=="glo2" || $searc_level=="glo3" || $searc_level=="glo4"){

if ($searc_level=="glo1"){$level=1;}
if ($searc_level=="glo2"){$level=2;}
if ($searc_level=="glo3"){$level=3;}
if ($searc_level=="glo4"){$level=4;}

require ("../../functions/glo_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>GLO 350MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="glo_105" class="form-control" value="'.$glo_105.'" required>
</div>

<br/>
<div>
<label>GLO 1.35GB</label>
<input type="tel" id="glo_29" class="form-control" value="'.$glo_29.'" required>
</div>

<br/>
<div>
<label>GLO 3.9GB</label>
<input type="tel" id="glo_41" class="form-control" value="'.$glo_41.'" required>
</div>

<br/>
<div>
<label>GLO 7.5GB</label>
<input type="tel" id="glo_58" class="form-control" value="'.$glo_58.'" required>
</div>

<br/>
<div>
<label>GLO 9.2GB</label>
<input type="tel" id="glo_77" class="form-control" value="'.$glo_77.'" required>
</div>

<br/>
<div>
<label>GLO 10.8GB</label>
<input type="tel" id="glo_10" class="form-control" value="'.$glo_10.'" required>
</div>

<br/>
<div>
<label>GLO 14.0GB</label>
<input type="tel" id="glo_1325" class="form-control" value="'.$glo_1325.'" required>
</div>

<br/>
<div>
<label>GLO 18.0GB</label>
<input type="tel" id="glo_1825" class="form-control" value="'.$glo_1825.'" required>
</div>

<br/>
<div>
<label>GLO 24.0GB</label>
<input type="tel" id="glo_295" class="form-control" value="'.$glo_295.'" required>
</div>

<br/>
<div>
<label>GLO 29.5GB</label>
<input type="tel" id="glo_50" class="form-control" value="'.$glo_50.'" required>
</div>

<br/>
<div>
<label>GLO 93.0GB</label>
<input type="tel" id="glo_93" class="form-control" value="'.$glo_93.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveGLO()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

////GLOPRICE END

if ($searc_level=="glocg1" || $searc_level=="glocg2" || $searc_level=="glocg3" || $searc_level=="glocg4"){

if ($searc_level=="glocg1"){$level=1;}
if ($searc_level=="glocg2"){$level=2;}
if ($searc_level=="glocg3"){$level=3;}
if ($searc_level=="glocg4"){$level=4;}

require ("../../functions/glocg_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>GLO CG 500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="glo_105" class="form-control" value="'.$glo_105.'" required>
</div>

<br/>
<div>
<label>GLO CG 1GB</label>
<input type="tel" id="glo_29" class="form-control" value="'.$glo_29.'" required>
</div>

<br/>
<div>
<label>GLO CG 2GB</label>
<input type="tel" id="glo_41" class="form-control" value="'.$glo_41.'" required>
</div>

<br/>
<div>
<label>GLO CG 3GB</label>
<input type="tel" id="glo_58" class="form-control" value="'.$glo_58.'" required>
</div>

<br/>
<div>
<label>GLO CG 5GB</label>
<input type="tel" id="glo_77" class="form-control" value="'.$glo_77.'" required>
</div>

<br/>
<div>
<label>GLO CG 10GB</label>
<input type="tel" id="glo_10" class="form-control" value="'.$glo_10.'" required>
</div>



<br/>
<button class="btn btn-success" type="button" onclick="saveGLOCG()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

// END OF GLO CG
if ($searc_level=="airtel1" || $searc_level=="airtel2" || $searc_level=="airtel3" || $searc_level=="airtel3" || $searc_level=="airtel4"){

if ($searc_level=="airtel1"){$level=1;}
if ($searc_level=="airtel2"){$level=2;}
if ($searc_level=="airtel3"){$level=3;}
if ($searc_level=="airtel4"){$level=4;}

require ("../../functions/airtel_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>AIRTEL 750MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="airtel_750" class="form-control" value="'.$airtel_750.'" required>
</div>

<br/>
<div>
<label>AIRTEL 1.5GB</label>
<input type="tel" id="airtel_15" class="form-control" value="'.$airtel_15.'" required>
</div>

<br/>
<div>
<label>AIRTEL 2.0GB</label>
<input type="tel" id="airtel_2" class="form-control" value="'.$airtel_2.'" required>
</div>

<br/>
<div>
<label>AIRTEL 3.0GB</label>
<input type="tel" id="airtel_3" class="form-control" value="'.$airtel_3.'" required>
</div>

<br/>
<div>
<label>AIRTEL 4.5GB</label>
<input type="tel" id="airtel_45" class="form-control" value="'.$airtel_45.'" required>
</div>

<br/>
<div>
<label>AIRTEL 6.0GB</label>
<input type="tel" id="airtel_6" class="form-control" value="'.$airtel_6.'" required>
</div>
<br/>

<br/>
<div>
<label>AIRTEL 10GB</label>
<input type="tel" id="airtel_10" class="form-control" value="'.$airtel_10.'" required>
</div>

<br/>
<div>
<label>AIRTEL 11GB</label>
<input type="tel" id="airtel_11" class="form-control" value="'.$airtel_11.'" required>
</div>

<br/>
<div>
<label>AIRTEL 20GB</label>
<input type="tel" id="airtel_20" class="form-control" value="'.$airtel_20.'" required>
</div>

<br/>
<div>
<label>AIRTEL 40GB</label>
<input type="tel" id="airtel_40" class="form-control" value="'.$airtel_40.'" required>
</div>

<br/>
<div>
<label>AIRTEL 75GB</label>
<input type="tel" id="airtel_75" class="form-control" value="'.$airtel_75.'" required>
</div>

<br/>
<div>
<label>AIRTEL 120GB</label>
<input type="tel" id="airtel_120" class="form-control" value="'.$airtel_120.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveAIRTEL()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
//AIRTEL-GIFT PRICE END

if ($searc_level=="airtelcg1" || $searc_level=="airtelcg2" || $searc_level=="airtelcg3" || $searc_level=="airtelcg4"){

if ($searc_level=="airtelcg1"){$level=1;}
if ($searc_level=="airtelcg2"){$level=2;}
if ($searc_level=="airtelcg3"){$level=3;}
if ($searc_level=="airtelcg4"){$level=4;}

require ("../../functions/airtelcg_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>AIRTEL CG 100MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="airtelcg_100" class="form-control" value="'.$airtelcg_100.'" required>
</div>

<br/>
<div>
<label>AIRTEL CG 300MB</label>
<input type="tel" id="airtelcg_300" class="form-control" value="'.$airtelcg_300.'" required>
</div>

<br/>
<div>
<label>AIRTEL CG 500MB</label>
<input type="tel" id="airtelcg_500" class="form-control" value="'.$airtelcg_500.'" required>
</div>

<br/>
<div>
<label>AIRTEL CG 1.0GB</label>
<input type="tel" id="airtelcg_1" class="form-control" value="'.$airtelcg_1.'" required>
</div>

<br/>
<div>
<label>AIRTEL CG 2.0GB</label>
<input type="tel" id="airtelcg_2" class="form-control" value="'.$airtelcg_2.'" required>
</div>

<br/>
<div>
<label>AIRTEL CG 5.0GB</label>
<input type="tel" id="airtelcg_5" class="form-control" value="'.$airtelcg_5.'" required>
</div>
<br/>

<div>
<label>AIRTEL CG 10.0GB</label>
<input type="tel" id="airtelcg_10" class="form-control" value="'.$airtelcg_10.'" required>
</div>
<br/>

<br/>
<button class="btn btn-success" type="button" onclick="saveAIRTELCG()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///AIRTELCG PRICE END

if ($searc_level=="mobile1" || $searc_level=="mobile2" || $searc_level=="mobile3" || $searc_level=="mobile4"){

if ($searc_level=="mobile1"){$level=1;}
if ($searc_level=="mobile2"){$level=2;}
if ($searc_level=="mobile3"){$level=3;}
if ($searc_level=="mobile4"){$level=4;}

require ("../../functions/mobile_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>9MOBILE  500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mobile_500" class="form-control" value="'.$mobile_500.'" required>
</div>

<br/>
<div>
<label>9MOBILE  1.5GB</label>
<input type="tel" id="mobile_15" class="form-control" value="'.$mobile_15.'" required>
</div>

<br/>
<div>
<label>9MOBILE  2.0GB</label>
<input type="tel" id="mobile_2" class="form-control" value="'.$mobile_2.'" required>
</div>

<br/>
<div>
<label>9MOBILE  3.0GB</label>
<input type="tel" id="mobile_3" class="form-control" value="'.$mobile_3.'" required>
</div>

<br/>
<div>
<label>9MOBILE  4.5GB</label>
<input type="tel" id="mobile_45" class="form-control" value="'.$mobile_45.'" required>
</div>


<br/>
<div>
<label>9MOBILE  11GB</label>
<input type="tel" id="mobile_11" class="form-control" value="'.$mobile_11.'" required>
</div>

<br/>
<div>
<label>9MOBILE  15GB</label>
<input type="tel" id="mobile_150" class="form-control" value="'.$mobile_150.'" required>
</div>

<br/>
<div>
<label>9MOBILE  40GB</label>
<input type="tel" id="mobile_40" class="form-control" value="'.$mobile_40.'" required>
</div>

<br/>
<div>
<label>9MOBILE  75GB</label>
<input type="tel" id="mobile_75" class="form-control" value="'.$mobile_75.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMOBILE()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

/// 9MOBILE PRICE END

if ($searc_level=="mobilecg1" || $searc_level=="mobilecg2" || $searc_level=="mobilecg3" || $searc_level=="mobilecg4"){

if ($searc_level=="mobilecg1"){$level=1;}
if ($searc_level=="mobilecg2"){$level=2;}
if ($searc_level=="mobilecg3"){$level=3;}
if ($searc_level=="mobilecg4"){$level=4;}

require ("../../functions/mobilecg_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>9MOBILE-CG  500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mobilecg_500" class="form-control" value="'.$mobile_500.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  1.0GB</label>
<input type="tel" id="mobilecg_1" class="form-control" value="'.$mobile_1.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  2.0GB</label>
<input type="tel" id="mobilecg_2" class="form-control" value="'.$mobile_2.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  3.0GB</label>
<input type="tel" id="mobilecg_3" class="form-control" value="'.$mobile_3.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  4.0GB</label>
<input type="tel" id="mobilecg_4" class="form-control" value="'.$mobile_4.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  5.0GB</label>
<input type="tel" id="mobilecg_5" class="form-control" value="'.$mobile_5.'" required>
</div>


<br/>
<div>
<label>9MOBILE-CG  10.0GB</label>
<input type="tel" id="mobilecg_10" class="form-control" value="'.$mobile_10.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  15.0GB</label>
<input type="tel" id="mobilecg_15" class="form-control" value="'.$mobile_15.'" required>
</div>

<br/>
<div>
<label>9MOBILE-CG  20.0GB</label>
<input type="tel" id="mobilecg_20" class="form-control" value="'.$mobile_20.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveMOBILECG()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}



////9MOBILE CG PRICE END HERE



?>