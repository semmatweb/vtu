
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

    $mtn=$_POST['mtn'];
    $glo=$_POST['glo'];
    $airtel=$_POST['airtel'];
    $mobile=$_POST['mobile'];
    $gifting=$_POST['gifting'];
    $airtel2=$_POST['airtel2'];

    $update=mysqli_query($db, "UPDATE locker SET mtn_data='".$mtn."', glo_data='".$glo."', airtel_data='".$airtel."', mobile_data='".$mobile."', gifting_lock='".$gifting."', airtel_data2='".$airtel2."' WHERE id='1'");

  if ($update){

    
        echo '<script>Swal.fire({type:"success", title:"Change Updated", text:"settings updated right now",position:"top",showConfirmButton:true});</script>';

    }

    else{

     echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }

}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Data Services</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MTN SME DATA<span style="color:red">*</span></label>
                                    <select id="mtn" class="form-control" name="mtn" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                
                               <div class="form-group">
                                    <label for="exampleInputPassword1">MTN GIFTING DATA<span style="color:red">*</span></label>
                                    <select id="gifting" class="form-control" name="gifting" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">GLO DATA<span style="color:red">*</span></label>
                                    <select id="glo" class="form-control" name="glo" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                        <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL DATA<span style="color:red">*</span></label>
                                    <select id="airtel" class="form-control" name="airtel" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL-CG DATA<span style="color:red">*</span></label>
                                    <select id="airtel2" class="form-control" name="airtel2" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE DATA<span style="color:red">*</span></label>
                                    <select id="mobile" class="form-control" name="mobile" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                
                                
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">UPDATE SETTINGS</button>
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