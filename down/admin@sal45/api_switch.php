
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
    $airtelcgswitch=$_POST['airtelcgswitch'];
    $mobileswitch=$_POST['mobileswitch'];
    $gifting_switch=$_POST['gifting_switch'];

    $update=mysqli_query($db, "UPDATE general_setting SET api_mtn='$mtnswitch', api_glo='$gloswitch', api_airtel='$airtelswitch', api_mobile='$mobileswitch', api_gift='$gifting_switch', api_airtelcg='$airtelcgswitch' WHERE id='1'");

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
                    <h6 class="font-weight-bold">API DATA SWITCH</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN SME DATA<span style="color:red">*</span></label>
                                  <select id="mtnswitch" class="form-control" name="mtnswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="mtndata_sms.php">SMS (HOLLA-TAGS)</option> 
                                    <option value="mtndata_msplug.php">MSPLUG API</option>
                                    <option value="mtndata_ussd.php">USSDHOSTING</option>
                             <option value="mtndata_abumpay.php">ABUMPAY</option>
                              <option value="mtndata_fastlink.php">FASTLINK</option>
                              <option value="mtndata_ogdams.php">OGDAMS</option>
                                   
                            <option value="mtndata_dailycash.php">DAILYCASHOUT</option>
                            
                             <option value="mtndata_bwsub.php">BWSUB</option>
                             
                             <option value="mtndata_del.php">DELIGHT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail1">MTN GIFT DATA<span style="color:red">*</span></label>
                                <select id="gifting_switch" class="form-control" name="gifting_switch" required="required">
                                  <option selected="" value="">---Select---</option>
                                  <option value="giftdata_sms.php">SMS (HOLLA-TAGS)</option>
                                  <option value="giftdata_fastlink.php">FASTLINK API</option>   
                                  <option value="giftdata_abum.php">ABUMPAY API</option>   
                                  <option value="giftdata_bwsub.php">BWSUB API</option>  
                                  <option value="giftdata_dailycash.php">DAILYCASH API</option>
                                </select>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO DATA<span style="color:red">*</span></label>
                                   <select id="gloswitch" class="form-control" name="gloswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="glodata_sms.php">SMS (HOLLA-TAGS)</option>
                                    <option value="glodata_msplug.php">MSPLUG API</option>
                                <option value="glodata_ogdam.php">OGDAMS API</option>
                                    </select>
                                </div>
                                
                                 <div class="form-group ">
                            <label for="exampleInputEmail1">AIRTEL DATA<span style="color:red">*</span></label>
                                   <select id="airtelswitch" class="form-control" name="airtelswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="airteldata_sms.php">SMS (HOLLA-TAGS)</option>
                                    <option value="airteldata_msplug.php">MSPLUG API</option>
                                 <option value="airteldata_ogdam.php">OGDAMS API</option>
                                    </select>
                                </div>
                                
                                
                                 <div class="form-group ">
                            <label for="exampleInputEmail1">AIRTEL-CG DATA<span style="color:red">*</span></label>
                                   <select id="airtelcgswitch" class="form-control" name="airtelcgswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="airtelcgdata_sms.php">SMS (HOLLA-TAGS)</option>
                                <option value="airtelcgdata_abum.php">ABUMPAY API</option>
                        <option value="airtelcgdata_fastlink.php">FASTLINK API</option>
                                    </select>
                                </div>

                                 <div class="form-group ">
                           <label for="exampleInputEmail1">9MOBILE DATA<span style="color:red">*</span></label>
                                  <select id="mobileswitch" class="form-control" name="mobileswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="mobiledata_sms.php">SMS (HOLLA-TAGS)</option>
                                    <option value="mobiledata_msplug.php">MSPLUG API</option>
                                 <option value="mobiledata_ogdams.php">OGDAMS API</option>
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