
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

    $mtn_device=$_POST['mtn_device'];
    $glo_device=$_POST['glo_device'];
    $airtel_device=$_POST['airtel_device'];
    $mobile_device=$_POST['mobile_device'];
    $msplug_token=$_POST['msplug_token'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtn_device='".$mtn_device."', glo_device='".$glo_device."', airtel_device='".$airtel_device."', mobile_device='".$mobile_device."', msplug_token='".$msplug_token."' WHERE id='1'");

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
                    <h6 class="font-weight-bold">Device Settings</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN Device ID<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mtn_device; ?>" name="mtn_device" id="mtn_device" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO Device ID<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $glo_device; ?>"  name="glo_device" id="glo_device" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">AIRTEL Device ID<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $airtel_device; ?>"  name="airtel_device" id="airtel_device" required autocomplete="off">
                                </div>

                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">9MOBILE Device ID<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mobile_device; ?>"  name="mobile_device" id="mobile_device" required autocomplete="off">
                                </div>


                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">API TOKEN <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $msplug_token; ?>"  name="msplug_token" id="msplug_token" required autocomplete="off">
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