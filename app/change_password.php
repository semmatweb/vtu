<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Change Password</h4>
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
<div id="response"></div>

<form id="form-data">

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Old Password" id="old_password" required>
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
<input type="password" class="form-control" placeholder="New Password"  id="new_password" required>
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Confirm Password" id="retype_password" required>
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%" id="submitBtn">SUBMIT</button>

<br>

</form>

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
     $("#form-data").submit(function (event) {
      var formData = {
      old_password: $("#old_password").val(),
      new_password: $("#new_password").val(),
      retype_password: $("#retype_password").val(),
      req_token: $("#req_token").val(),
    };

     $.LoadingOverlay("show");
    $.ajax({
      url:'<?php echo $baseurl; ?>/customer/change_password',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
     $.LoadingOverlay("hide");
     if (response_fd.status == 'success'){
    $("#successModal").modal("show");
    $("#successModal .modal-body").html(response_fd.message);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
     }
    else {
    $("#errorModal").modal("show");
    $("#errorModal .modal-body").html(response_fd.message);
    }
}
    });

    event.preventDefault();
     });
</script>

<?php require("site_footer.php"); ?>
