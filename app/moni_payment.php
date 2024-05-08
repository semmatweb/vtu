<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Add Money</h4>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>Available Balance 
            <span style="float: right;"></span>
          </span>
          <br/>

           <span style="color: red;font-weight: bold;font-size: 39px;">₦ <?php echo number_format($Account_Balance,2); ?></span>
         
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->
<div id="response"></div>

<form action="process_me.php" method="POST" id="data-payment">
    
<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-envelope" style="font-size: 25px;"></i></span>
</div>

<input type="text" class="form-control" value="<?php echo $email; ?>" aria-describedby="basic-addon1" readonly>
<input type="hidden" class="form-control" value="<?php echo $email; ?>" aria-describedby="basic-addon1" name="email">
<input type="hidden" class="form-control" value="<?php echo $fullname; ?>" aria-describedby="basic-addon1" name="cus_name">
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><span style="font-weight: bold;font-size: 22px;">₦</span></span>
</div>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
<input type="tel" class="form-control" placeholder="Amount" name="amountw" id="amountw" min="100" oninput="amont()" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><span style="font-weight: bold;font-size: 22px;">&#37;</span></span>
</div>
<input type="tel" class="form-control" placeholder="Charges" name="Charges" id="charges" min="100"  aria-describedby="basic-addon1" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><span style="font-weight: bold;font-size: 22px;">Total &nbsp₦ </span></span>
</div>
<input type="tel" class="form-control" placeholder="Total Amount" name="amount" id="amount" min="100"  aria-describedby="basic-addon1" disabled>
</div>
<br>

<?php 

if ($atm_lock == 1){
  echo '<button class="btn btn-success btn-block" type="submit" style="width: 100%">Make Payment Now</button>';
}
else{
  echo '<button class="btn btn-danger btn-block" style="width: 100%" disabled>Payment Disabled</button>';
}
?>

<br>

</div>
</div>
</div>


</div>
</div>
</div>
<!--</form>-->
<!-- end-->


</div>




</div>
</div>
</div>

<script type="text/javascript">
	function amont(){
			document.getElementById("charges").value=(document.getElementById("amountw").value * 0.015);
			document.getElementById("amount").value=(+document.getElementById("amountw").value +(+document.getElementById("charges").value));
// 			document.getElementById("amount").value=(+document.getElementById("A_found").value +(+document.getElementById("Charges").value));
		}
  function makePayment() {
    var amount=$("#amount").val();
    var req_token=$("#req_token").val();
  
  if (amount < 100){
     $("#response").html('<div class="alert alert-danger">Minimum funding is ₦100</div>');
   // alert("Minimum funding is ₦100");
     return false;
        }
    
  }
            </script>

<?php require("site_footer.php"); ?>
