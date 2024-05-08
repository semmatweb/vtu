<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="datacardlock"){

$message='
<form id="form-data">
    <label>MTN-DATA-CARD *</label>
    <select class="form-control" id="mtndatacard_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>
    <br/>
<button class="btn btn-success" type="button" onclick="saveDATACARDLOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////DATA END

if ($searc_level=="datalock"){

    $checker2="SELECT * FROM `web_settings`";
          $result22 = mysqli_query($con, $checker2);  
          $row22 = mysqli_fetch_array($result22);
          
          
          function wer($aa,$sec){
              if($aa==$sec){
                  return 'selected';
              }
          }
$message='
<form id="form-data">
    <label>MTN-SME *</label>
    <select class="form-control" id="mtnsme_lock" required>

    <option value="1" '.wer('1',$row22['m_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['m_lock1']).'>DISABLE</option>
    </select>

    <br/>
    
    <label>MTN-SME 2 *</label>
    <select class="form-control" id="mtnsme2_lock" required>

    <option value="1" '.wer('1',$row22['m2_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['m2_lock1']).'>DISABLE</option>
    </select>

    <br/>
    
    <label>MTN-CG *</label>
    <select class="form-control" id="mtncg_lock" required>

    <option value="1" '.wer('1',$row22['mg_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['mg_lock1']).'>DISABLE</option>
    </select>
    
    <br/>
    <label>MTN-CG 2 *</label>
    <select class="form-control" id="mtncg2_lock" required>

    <option value="1" '.wer('1',$row22['mg2_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['mg2_lock1']).'>DISABLE</option>
    </select>


    <br/>
    <label>MTN-DC (Data Coupon) *</label>
    <select class="form-control" id="mtndc_lock" required>

    <option value="1" '.wer('1',$row22['mdc_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['mdc_lock1']).'>DISABLE</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_lock" required>

    <option value="1" '.wer('1',$row22['g_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['g_lock1']).'>DISABLE</option>
    </select>

    <br/>
    
    <label>GLO-CG*</label>
    <select class="form-control" id="glocg_lock" required>

    <option value="1" '.wer('1',$row22['gcg_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['gcg_lock1']).'>DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_lock" required>

    <option value="1" '.wer('1',$row22['a_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['a_lock1']).'>DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL-CG *</label>
    <select class="form-control" id="airtelcg_lock" required>

    <option value="1" '.wer('1',$row22['ag_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['ag_lock1']).'>DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_lock" required>

    <option value="1" '.wer('1',$row22['mo_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['mo_lock1']).'>DISABLE</option>
    </select>

<br/>
    <label>9MOBILE-CG*</label>
    <select class="form-control" id="mobilecg_lock" required>

    <option value="1" '.wer('1',$row22['mocg_lock1']).'>ENABLE</option>
    <option value="0" '.wer('0',$row22['mocg_lock1']).'>DISABLE</option>
    </select>
    <br/>
<button class="btn btn-success" type="button" onclick="saveDATALOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////DATA END

if ($searc_level=="vtulock"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveVTULOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
///VTULOCK END

if ($searc_level=="snslock"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveSNSLOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

////SNSLOCK END

if ($searc_level=="cablelock"){

$message='
<form id="form-data">
    <label>GOTV *</label>
    <select class="form-control" id="gotv" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>DSTV *</label>
    <select class="form-control" id="dstv" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>STARTIMES *</label>
    <select class="form-control" id="startime" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveCABLELOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
//CABLELOCK END

if ($searc_level=="epinslock"){

$message='
<form id="form-data">
    <label>WAEC *</label>
    <select class="form-control" id="waec" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>NECO *</label>
    <select class="form-control" id="neco" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>NABTEB *</label>
    <select class="form-control" id="nabteb" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>
    
    <br/>
    <label>NBAIS *</label>
    <select class="form-control" id="nbais" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveEPINSLOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///E-PINSLOCK END

if ($searc_level=="billslock"){

$message='
<form id="form-data">
    <label>ABUJA ELECTRIC *</label>
    <select class="form-control" id="abuja" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>EKO ELECTRIC *</label>
    <select class="form-control" id="eko" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>IBADAN ELECTRIC *</label>
    <select class="form-control" id="ibadan" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>IKEJA ELECTRIC *</label>
    <select class="form-control" id="ikeja" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>JOS ELECTRIC *</label>
    <select class="form-control" id="jos" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>KANO ELECTRIC *</label>
    <select class="form-control" id="kano" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>KADUNA ELECTRIC *</label>
    <select class="form-control" id="kaduna" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

      <br/>
    <label>PORTHA. ELECTRIC *</label>
    <select class="form-control" id="portharcourt" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveBILLSLOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
/////BILLS END

if ($searc_level=="paymentlock"){

$message='
<form id="form-data">
    <label>CARD PAYMENT *</label>
    <select class="form-control" id="atm_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="savePAYLOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}



?>