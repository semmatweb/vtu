<?php require("site_header.php"); ?>
<?php

require ("request_pin.php");

?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Swap Airtime To Cash</h4>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>Available Balance 
            <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()">Fund Wallet</button></span>
          </span>
          <br/>

           <span style="color: red;font-weight: bold;font-size: 39px;">₦ <?php echo number_format($Account_Balance,2); ?></span>
         
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa-solid fa-signal" style="font-size: 25px;"></i></span>
</div>
<input type="hidden" id="network_discount">
<select class="form-control" id="network_module">
	<option>--Choose--</option>
	<option value="MTN-SWAP">MTN</option>
	<option value="GLO-SWAP">GLO</option>
	<option value="AIRTEL-SWAP">AIRTEL</option>
	<option value="9MOBILE-SWAP">9MOBILE</option>
</select>
</div>
<span id="result"></span>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-phone" style="font-size: 25px;"></i></span>
</div>
<input type="tel" class="form-control" id="mobile_no" placeholder="Mobile No." aria-describedby="basic-addon1">
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><span style="font-weight: bold;font-size: 22px;">₦</span></span>
</div>
<input type="tel" class="form-control" id="amount" onkeyup="CalDiscount()" placeholder="Amount"  aria-describedby="basic-addon1">
</div>
<div>
<small style="color: red;font-weight: bold;" id="valAmount"></small>
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%" onclick="MakePay()">Procced Now</button>

<br>
<br>
<br>

</div>
</div>
</div>


</div>
</div>
</div>

<!-- end-->


</div>




</div>
</div>
</div>

<script type="text/javascript">
$("#network_module").change(function(){
if ($("#network_module").val() !=""){
 var network_module=$("#network_module").val();
 $.LoadingOverlay("show");
$.ajax({
    url:'resources/plans/serviceslists?services='+network_module+'&level=<?php echo $level; ?>',
    method:'GET',
    success:function(RES_data){
 $.LoadingOverlay("hide");
    //$("#result").html(RES_data);
    $("#network_discount").val(RES_data);
    }
})
}
	})

function CalDiscount(){
var amount=$("#amount").val();
var network_discount=$("#network_discount").val();
if (amount !="" && amount>99 && network_discount !=""){
var charges=parseInt(amount)*(15)/100;
var fin_amount=amount-charges;
$("#valAmount").text("You will be paid N"+fin_amount);
}
else {
$("#valAmount").text(""); 
}
}

function MakePay(){
var network_module =$("#network_module").val();
var mobile_no =$("#mobile_no").val();
var amount =$("#amount").val();
var network_discount=$("#network_discount").val();
var charges=parseInt(amount)*(15)/100;
var fin_amount=amount-charges;

if (network_discount !="" && mobile_no !="" && amount !="" && network_module !=""){
window.location.href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp_no; ?>&text=Hello%20admin!%20i%20want%20to%20convert%20"+network_module+"%20₦"+amount+"%20("+fin_amount+"%20)%20to%20cash.";
}
else {
  
}
}
</script>

<?php require("site_footer.php"); ?>
