<?php
require ("session_controller.php");
$data=$_GET['data'];



$host="localhost";
$user="freesubc_freesubc";
$pass="!)ytJB66g58MPt";
$dbanme="freesubc_data";

// $host="localhost";
// $user="salaolid_salabeb39028";
// $pass="Ayoson@faq67";
// $dbanme="salaolid_SalabebDB39";

$con=mysqli_connect($host, $user, $pass, $dbanme);
$check="SELECT * FROM users order by email asc";
$result = mysqli_query($con, $check);
// foreach ($result as $user)
// // {
// //     echo $user['email'];
// // }

if ($data != ""){

$message='
<form id="form-data">

<div>
<label>Email Address:</label>
<input type="text" id="api_email" class="form-control" required>
</div>

<br/>

    <label>ACCESS TO MTN-SME *</label>
    <select class="form-control" id="access_mtnsme" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MTN-CG *</label>
    <select class="form-control" id="access_mtncg" required>

        <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO GLO *</label>
    <select class="form-control" id="access_glo" required>

        <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO AIRTEL *</label>
    <select class="form-control" id="access_airtel" required>

        <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO AIRTEL-CG *</label>
    <select class="form-control" id="access_airtelcg" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO 9MOBILE *</label>
    <select class="form-control" id="access_mobile" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO AIRTIME *</label>
    <select class="form-control" id="access_airtime" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO CABLTV *</label>
    <select class="form-control" id="access_cable" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO BILLS *</label>
    <select class="form-control" id="access_bills" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO E-PINS *</label>
    <select class="form-control" id="access_epin" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveNEWAPI()">CREATE DEAL</button>

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