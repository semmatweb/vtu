
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

    $mtn_server=$_POST['mtn_server'];
    $glo_server=$_POST['glo_server'];
    $airtel_server=$_POST['airtel_server'];
    $mobile_server=$_POST['mobile_server'];
    $ussd_token=$_POST['ussd_token'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtn_server='".$mtn_server."', glo_server='".$glo_server."', airtel_server='".$airtel_server."', mobile_server='".$mobile_server."', ussd_token='".$ussd_token."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Settings Updated", text:"settings updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Server Settings</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN SERVER<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mtn_server; ?>" name="mtn_server" id="mtn_server" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO SERVER<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $glo_server; ?>"  name="glo_server" id="glo_server" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">AIRTEL SERVER<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $airtel_server; ?>"  name="airtel_server" id="airtel_server" required autocomplete="off">
                                </div>

                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">9MOBILE SERVER<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mobile_server; ?>"  name="mobile_server" id="mobile_server" required autocomplete="off">
                                </div>


                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">USSD API TOKEN <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $ussd_token; ?>"  name="ussd_token" id="ussd_token" required autocomplete="off">
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