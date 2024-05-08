
<?php
require("header.php");
?>

   
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            
    
<style>
   label.error{
        color:red !important;
    }

    #ReceipientBox{
        display:none;
    }
</style>

<?php

if (isset($_POST['submit'])){

    $mtnswitch=$_POST['mtnswitch'];
    $gloswitch=$_POST['gloswitch'];
    $airtelswitch=$_POST['airtelswitch'];
    $mobileswitch=$_POST['mobileswitch'];
    $gifting_switch=$_POST['gifting_switch'];
    $airtelcgswitch=$_POST['airtelcgswitch'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtnswitch='".$mtnswitch."', gloswitch='".$gloswitch."', airtelswitch='".$airtelswitch."', mobileswitch='".$mobileswitch."', gifting_switch='".$gifting_switch."', airtelcgswitch='".$airtelcgswitch."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Switching Updated", text:"data switching updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating switching",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">WEB Data Switch</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputBULKSMS1">MTN SME DATA<span style="color:red">*</span></label>
                                     <select id="mtnswitch" class="form-control" name="mtnswitch" required="required">
                                    <option selected="" value="">---Select---</option>
    <option value="buymtn.php">MTN DATA ON SMS</option>
    <option value="buymtn2.php">MTN DATA ON MSPLUG</option>
    <option value="buymtn3.php">MTN DATA ON SIMHOSTING</option>
    <option value="buymtn4.php">MTN DATA ON ABUMPAY</option>
    <option value="buymtn5.php">MTN DATA ON FASTLINK</option>
    <option value="buymtn6.php">MTN DATA ON OGDAMS</option>
    <option value="buymtn7.php">MTN DATA ON DAILYCASHOUT</option>
    <option value="buymtn8.php">MTN DATA ON BWSUB</option>
    <option value="buymtn9.php">MTN DATA ON DELIGHT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputBULKSMS1">MTN GIFT DATA<span style="color:red">*</span></label>
                                <select id="gifting_switch" class="form-control" name="gifting_switch" required="required">
                                    <option selected="" value="">---Select---</option>
    <option value="buy_gift.php">MTN GIFTING ON SMS</option>
    <option value="buy_gift2.php">MTN GIFTING ON FASTLINK</option>
     <option value="buy_gift3.php">MTN GIFTING ON ABUMPAY</option>
     <option value="buy_gift3.php">MTN GIFTING ON ABUMPAY</option>
     <option value="buy_gift4.php">MTN GIFTING ON BWSUB</option>
      <option value="buy_gift5.php">MTN GIFTING ON DAILYCASH</option>
                                    </select>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputBULKSMS1">GLO DATA<span style="color:red">*</span></label>
                                   <select id="gloswitch" class="form-control" name="gloswitch" required="required">
                                    <option selected="" value="">---Select---</option>
    <option value="buyglo.php">GLO DATA ON SMS</option>
    <option value="buyglo2.php">GLO DATA ON MSPLUG</option>
     <option value="buyglo3.php">GLO DATA ON OGGDAMS</option>
                                    </select>
                                </div>
                                
                                 <div class="form-group ">
                            <label for="exampleInputBULKSMS1">AIRTEL DATA<span style="color:red">*</span></label>
                                   <select id="airtelswitch" class="form-control" name="airtelswitch" required="required">
                                    <option selected="" value="">---Select---</option>
    <option value="buyairtel.php">AIRTEL DATA ON SMS</option>
    <option value="buyairtel2.php">AIRTEL DATA ON MSPLUG</option>
    <option value="buyairtel3.php">AIRTEL DATA ON OGDAMS</option>
                                    </select>
                                </div>
                                
                                
                                 <div class="form-group ">
                            <label for="exampleInputBULKSMS1">AIRTEL-CG DATA<span style="color:red">*</span></label>
                                   <select id="airtelcgswitch" class="form-control" name="airtelcgswitch" required="required">
                                    <option selected="" value="">---Select---</option>
    <option value="buy_airtelcg1.php">AIRTEL-CG DATA ON ABUMPAY</option>
    <option value="buy_airtelcg2.php">AIRTEL-CG DATA ON FASTLINK</option>
                                    </select>
                                </div>

                                 <div class="form-group ">
                           <label for="exampleInputBULKSMS1">9MOBILE DATA<span style="color:red">*</span></label>
                                  <select id="mobileswitch" class="form-control" name="mobileswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="mobiledata_sms.php">BULKSMS</option>
    <option value="buymobile.php">9MOBILE DATA ON SMS</option>
    <option value="buymobile2.php">9MOBILE DATA ON MSPLUG</option>
    <option value="buymobile3.php">9MOBILE DATA ON OGDAMS</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">SAVE</button>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 

    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


<?php require("footer.php"); ?>