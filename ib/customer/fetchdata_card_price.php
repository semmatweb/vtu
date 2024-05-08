<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="datacard1" || $searc_level=="datacard2" || $searc_level=="datacard3" || $searc_level=="datacard4"){

if ($searc_level=="datacard1"){$level=1;}
if ($searc_level=="datacard2"){$level=2;}
if ($searc_level=="datacard3"){$level=3;}
if ($searc_level=="datacard4"){$level=4;}

require ("../../functions/mtndatacard_price.php");

$message='

<form method="POST" id="form_submit">
<div>
<label>MTN DATA CARD 750MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtndatacard_75" class="form-control" value="'.$mtndatacard_75.'" required>
</div>
<br/>
<div>
<label>MTN DATA CARD 1.5GB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtndatacard_15" class="form-control" value="'.$mtndatacard_15.'" required>
</div>
 <br/>
<div>
<label>MTN DATA CARD 2.0GB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtndatacard_2" class="form-control" value="'.$mtndatacard_2.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNDATACARD()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////MTN DATACARD PRICE END




?>