<?php

require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="data"){
    
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
    <select class="form-control" id="mtnsme_data" required> 
    <option value="salabeb_mtnsme.php" '.wer('salabeb_mtnsme.php',$row22['api_mtn']).'>SALABEB</option>
   
    <option value="mtnsme_husmodata.php" '.wer('mtnsme_husmodata.php',$row22['api_mtn']).'>HUSMODATA</option>
     <option value="mtnsme_ridamsub.php" '.wer('mtnsme_ridamsub.php',$row22['api_mtn']).'  >RIDAMSUB</option>
    </select>

    <br/>
    <label>MTN-CG *</label>
    <select class="form-control" id="mtncg_data" required>
    <option value="mtncg_husmodata.php" '.wer('mtncg_husmodata.php',$row22['api_gift']).'>HUSMODATA</option>
    <option value="salabeb_mtncg.php" '.wer('salabeb_mtncg.php',$row22['api_gift']).'>SALABEB</option>
    <option value="mtncg_wazobianet.php" '.wer('mtncg_wazobianet.php',$row22['api_gift']).'>WAZOBIANET</option>
    
    </select>

    <br/>
    
     <label>MTN-DC *</label>
    <select class="form-control" id="mtndc_data" required>
    <option value="mtndc_husmodata.php" '.wer('mtndc_husmodata.php',$row22['api_mtndc']).'>HUSMODATA</option>
    <option value="mtndc_wazobianet.php" '.wer('mtndc_wazobianet.php',$row22['api_mtndc']).'>WAZOBIANET</option>
    
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_data" required>
<option value="glo_husmodata.php" '.wer('glo_husmodata.php',$row22['api_glo']).'>HUSMODATA</option>
    
    <option value="salabeb_glo.php" '.wer('salabeb_glo.php',$row22['api_glo']).'>SALABEB</option>
    
    </select>

    
       <br/>
    <label>GLO-CG*</label>
    <select class="form-control" id="glocg_data" required>
<option value="glocg_husmodata.php" '.wer('glocg_husmodata.php',$row22['api_glocg']).'>HUSMODATA</option>
    
    <option value="glocg_salabeb.php" '.wer('glocg_salabeb.php',$row22['api_glocg']).'>SALABEB</option>
    
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_data" required>
    <option value="airtel_husmodata.php" '.wer('airtel_husmodata.php',$row22['api_airtel']).'>HUSMODATA</option>
    

    <option value="airtel_salabeb.php" '.wer('airtel_salabeb.php',$row22['api_airtel']).'>SALABEB</option>
    
    </select>

    <br/>
    <label>AIRTEL-CG *</label>
 
    <select class="form-control" id="airtelcg_data" required>
    
<option value="airtelcg_husmodata.php" '.wer('airtelcg_husmodata.php',$row22['api_airtelcg']).'>HUSMODATA</option>
.<option value="airtelcg_salabeb.php" '.wer('airtelcg_salabeb.php',$row22['api_airtelcg']).'>SALABEB</option>
.<option value="airtelcg_wazobianet.php" '.wer('airtelcg_wazobianet.php',$row22['api_airtelcg']).'>WAZOBIANET</option>

    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_data" required>
    <option value="salabeb_mobile.php" '.wer('salabeb_mobile.php',$row22['api_mobile']).'>SALABEB</option>

<option value="mobile_husmodata.php" '.wer('mobile_husmodata.php',$row22['api_mobile']).'>HUSMODATA</option>

    </select>
    
     <br/>
    <label>9MOBILE-CG *</label>
    <select class="form-control" id="mobilecg_data" required>
    <option value="mobilecg_husmodata.php" '.wer('mobilecg_husmodata.php',$row22['api_mobilecg']).'>HUSMODATA</option>
    <option value="mobilecg_salabeb.php" '.wer('mobilecg_salabeb.php',$row22['api_mobilecg']).'>SALABEB</option>
    </select>
    <br/>
<button class="btn btn-success" type="button" onclick="saveDATA()">Save</button>

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

if ($searc_level=="datacard"){
    
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
    <label>MTN-DATA-CARD *</label>
    <select class="form-control" id="mtn_datacard" required> 
    <option value="mtndatacard_wazobianet.php" '.wer('mtndatacard_wazobianet.php',$row22['api_mtndatacard']).'>WAZOBIANET</option>
   
    <option value="mtnsme_husmodata.php" '.wer('mtnsme_husmodata.php',$row22['api_mtndatacard']).'>HUSMODATA</option>
    <option value="mtnsme_ridamsub.php" '.wer('mtnsme_ridamsub.php',$row22['api_mtndatacard']).'  >RIDAMSUB</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveDATACARD()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////DATA CARD END

if ($searc_level=="vtu"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_vtu" required>

    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_husmodata.php">HUSMODATA</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_vtu" required>
    <option value="airtimevtu_husmodata.php">HUSMODATA</option>
    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_vtu" required>
    <option value="airtimevtu_husmodata.php">HUSMODATA</option>
    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_vtu" required>
    <option value="airtimevtu_husmodata.php">HUSMODATA</option>
    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveVTU()">Save</button>

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

if ($searc_level=="sns"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveSNS()">Save</button>

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

?>