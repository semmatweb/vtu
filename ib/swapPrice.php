<?php require("site_header.php"); ?>
<?php 
$host="localhost";
$user="freesubd_doublehigh";
$pass="nX?(R.LEAEP&;[3;hl";
$dbanme="freesubd_free_db_01";

$con=mysqli_connect($host, $user, $pass, $dbanme);
if (!$con){die("Error Connecting DB".mysql_error());}

$query = mysqli_query($con, "SELECT * FROM `airtimeswap_plan` WHERE id = 1");

foreach($query as $percent)
{
    $mtn_discount = $percent['mtn_rate'];
}
?>
<?php
if ($manage_prices==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<center>
<div class="alert" style="background-color: white;color: #000;">
<h4 style="color: #fff">SET AIRTIME VTU DISCOUNT</h4>
<p style="color: black">Input Airtime Pecentage eg. 10 for 10%.</p>
 <br/>
</center>
<form method="POST">

<div>
<label>MTN DISCOUNT</label>
<?php
foreach($query as $percent)
{
    $mtn_discount = $percent['mtn_rate'];
    echo '<input type="number" name="mtn_discount" id="mtn" oninput="me()" class="form-control" value="'.$mtn_discount.'" required>';
}
?>
</div>

<div>
<label>GLO DISCOUNT</label>
<?php
foreach($query as $percent)
{
    $glo_discount = $percent['glo_rate'];
    echo '<input type="number" name="glo_discount" class="form-control" value="'.$glo_discount.'" required>';
}
?>
</div>

<div>
<label>AIRTEL DISCOUNT</label>
<?php
foreach($query as $percent)
{
   $airtel_discount = $percent['airtel_rate'];
    echo '<input type="number" name="airtel_discount" class="form-control" value="'.$airtel_discount.'" required>';
}
?>
</div>

<div>
<label>9MOBILE DISCOUNT</label>
<?php
foreach($query as $percent)
{
   $mobile_discount = $percent['mobile_rate'];
    echo '<input type="number" name="mobile_discount" class="form-control" value="'.$mobile_discount.'" required>';
}
?>
</div>

<br/>
<input type="submit" class="btn btn-success" name="btnSubmit" value="Save">

</form>

</div>


<br>


</div>
</div>
</div>

<?php
if (isset($_POST['btnSubmit'])) {
  $mtn = $POST['mtn_discount'];
  $glo = $POST['glo_discount'];
  $airtel = $POST['airtel_discount'];
  $mobile = $POST['mobile_discount'];
  
//   echo $mtn.$glo.$airtel.$mobile;
  
$host="localhost";
$user="freesubd_doublehigh";
$pass="nX?(R.LEAEP&;[3;hl";
$dbanme="freesubd_free_db_01";

$con=mysqli_connect($host, $user, $pass, $dbanme);
if (!$con){die("Error Connecting DB".mysql_error());}

$query=mysqli_query($con,"UPDATE `airtimeswap_plan` SET `mtn_rate`='$mtn',`glo_rate`='$glo',`airtel_rate`= '$airtel',`mobile_rate`='$mobile' WHERE id = 1");

if($query)
{
echo "Update Successully";
}
else
{
    echo "Update Fail";
}
mysqli_close($con);
  
}
?>
<?php
}
else {

require ("admin_pushfail.php"); 
echo $admin_pushfail;
}
?>
<?php require("site_footer.php"); ?>
