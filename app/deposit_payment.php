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
         <br/>
         <span><span style="color: green; font-weight: bold; font-size: 20px;">Note:  </span>Admin is not available for manual funding less than #2,000 naira. Payment less than #2,000 should be pay through
            <a href="<?php echo $baseurl ?>/automated_pay" style="font-size: 18px" >Auto Funding by Clicking here.</a>
          </span>
          </br>
         <span>After Successful Transaction Contact Admin with Evidence of payment and E-mail &#8614&#8614
            <a href="https://api.whatsapp.com/send?phone=2348064748270&text=Hello%20admin!%20help%20fund%20my%20%20wallet%20@%20E-mail=%20" style="font-size: 25px" >Admin</a>
          </span>
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->

<?php
$list_acctno="";
$xxx= mysqli_query($con, "SELECT * FROM vtuapp_manualfunding ORDER BY id DESC LIMIT 10");
if (mysqli_num_rows($xxx)<1){

echo '<div class="alert" style="font-size: 25px;text-align: center;text-transform: uppercase;">
      NO ACCOUNT ADDED YET
    </div>';
}
else {
while ($Acc_data = mysqli_fetch_array($xxx, MYSQLI_ASSOC)){ 

$list_acctno.='<div class="alert" style="font-size: 25px;text-align: center;text-transform: uppercase;">
      '.$Acc_data['account_name'].'<br/> '.$Acc_data['bank_name'].' - '.$Acc_data['account_no'].'
    </div><hr/>';

}
}


echo $list_acctno;
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
