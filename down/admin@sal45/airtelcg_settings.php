
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

require ("pricedir/airtelcgprice.php");

if (isset($_POST['submit'])){

  $air100mb=mysqli_real_escape_string($db, $_POST['air100mb']);
  $air300mb=mysqli_real_escape_string($db, $_POST['air300mb']);
  $air500mb=mysqli_real_escape_string($db, $_POST['air500mb']);
  $air1gb=mysqli_real_escape_string($db, $_POST['air1gb']);
  $air2gb=mysqli_real_escape_string($db, $_POST['air2gb']);
  $air5gb=mysqli_real_escape_string($db, $_POST['air5gb']);
  

  $update=mysqli_query($db, "UPDATE airtelcgprice SET air100='".$air100mb."', air300='".$air300mb."', air500='".$air500mb."', air1='".$air1gb."', air2='".$air2gb."', air5='".$air5gb."' WHERE id='1'");

   if ($update){

                 echo '<script>Swal.fire({type:"success", title:"Price Updated", text:"price updated right now",position:"top",showConfirmButton:true});</script>';
            }

            else{

                 echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"ERror Updating Record",position:"top",showConfirmButton:true});</script>';
            }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">AIRTEL-CG DATA API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">AIRTEL-CG 100MB <span style="color:red">*</span></label>
                                <input name="air100mb" class="form-control" type="number" value="<?php echo $air100mb; ?>" required = "required" autocomplete="off">
                                </div>
                                

                                <div class="form-group">
                                  <label for="exampleInputEmail1">AIRTEL-CG 300MB <span style="color:red">*</span></label>
                                <input name="air300mb" class="form-control" type="number" value="<?php echo $air300mb; ?>" required = "required" autocomplete="off">
                                </div>
                                

                                <div class="form-group">
                                  <label for="exampleInputEmail1">AIRTEL-CG 500MB <span style="color:red">*</span></label>
                                <input name="air500mb" class="form-control" type="number" value="<?php echo $air500mb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">AIRTEL-CG 1GB<span style="color:red">*</span></label>
                                <input name="air1gb" class="form-control" type="number" value="<?php echo $air1gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL-CG 2GB<span style="color:red">*</span></label>
                               <input name="air2gb" class="form-control" type="number" value="<?php echo $air2gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL-CG 5GB<span style="color:red">*</span></label>
                                <input name="air5gb" class="form-control" type="number" value="<?php echo $air5gb; ?>" required = "required" autocomplete="off">
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