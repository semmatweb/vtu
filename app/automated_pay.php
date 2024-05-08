<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Add Money</h4>
          <p style="color: red;font-weight: bold;">Transfer money into one of the reserved account below and your wallet will be automatically credited.</p>
            <br/>
         <span>If you have any Issue Contact Admin &#8614&#8614
            <a href="https://api.whatsapp.com/send?phone=2348064748270&text=Hi%20there!%20" style="font-size: 25px" >Admin</a>
          </span>
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

<?php
 if ($wema ==""){
  echo '<div class="alert" style="font-size: 20px;text-align: center;text-transform: uppercase;">
      NO RESERVERD ACCOUNT YET
    </div>';
 }

 else {

  echo '

     <div class="alert" style="font-size: 20px;text-align: center;text-transform: uppercase;">
      '.$acctname.' - '.$sitename.'
    <p style="color: red;font-weight: bold;">1.075% charges apply to all deposit</p>
    </div><hr/>

    <div class="alert" style="font-size: 20px;text-align: center;text-transform: uppercase;">
      WEMA BANK - '.$wema.'
    </div><hr/>
    <div class="alert" style="font-size: 20px;text-align: center;text-transform: uppercase;">
      MONIEPOINT BANK - '.$rolez.'
    </div><hr/>

    <div class="alert" style="font-size: 20px;text-align: center;text-transform: uppercase;">
      FIDELITY BANK - '.$fidelity.'
    </div><hr/>

    <div class="alert" style="font-size: 20px;text-align: center;text-transform: uppercase;">
      STERLING BANK - '.$sterling.'
    </div><hr/>';
 }
?>

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


<?php require("site_footer.php"); ?>
