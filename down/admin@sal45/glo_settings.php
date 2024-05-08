
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

require ("pricedir/gloprice.php");

if (isset($_POST['submit'])){

 $glo1gb=mysqli_real_escape_string($db, $_POST['glo1gb']);
  $glo2gb=mysqli_real_escape_string($db, $_POST['glo2gb']);
  $glo4gb=mysqli_real_escape_string($db, $_POST['glo4gb']);
  $glo5gb=mysqli_real_escape_string($db, $_POST['glo5gb']);
  $glo7gb=mysqli_real_escape_string($db, $_POST['glo7gb']);
  $glo10gb=mysqli_real_escape_string($db, $_POST['glo10gb']);
  $glo13gb=mysqli_real_escape_string($db, $_POST['glo13gb']);
  $glo18gb=mysqli_real_escape_string($db, $_POST['glo18gb']);
  $glo29gb=mysqli_real_escape_string($db, $_POST['glo29gb']);
  $glo50gb=mysqli_real_escape_string($db, $_POST['glo50gb']);
  $glo93gb=mysqli_real_escape_string($db, $_POST['glo93gb']);
  

  $update=mysqli_query($db, "UPDATE gloprice SET glo1gb='".$glo1gb."', glo2gb='".$glo2gb."', glo4gb='".$glo4gb."', glo5gb='".$glo5gb."', glo7gb='".$glo7gb."', glo10gb='".$glo10gb."', glo13gb='".$glo13gb."', glo18gb='".$glo18gb."', glo29gb='".$glo29gb."', glo50gb='".$glo50gb."', glo93gb='".$glo93gb."' WHERE id='1'");
  
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
                    <h6 class="font-weight-bold">GLO DATA API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">GLO 1.05GB <span style="color:red">*</span></label>
                                 <input name="glo1gb" class="form-control" type="number" value="<?php echo $glo1gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">GLO 2.5GB<span style="color:red">*</span></label>
                                <input name="glo2gb" class="form-control" type="number" value="<?php echo $glo2gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 4.5GB<span style="color:red">*</span></label>
                               <input name="glo4gb" class="form-control" type="number" value="<?php echo $glo4gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 5.8GB<span style="color:red">*</span></label>
                                <input name="glo5gb" class="form-control" type="number" value="<?php echo $glo5gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 7.7GB<span style="color:red">*</span></label>
                               <input name="glo7gb" class="form-control" type="number" value="<?php echo $glo7gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 10GB<span style="color:red">*</span></label>
                               <input name="glo10gb" class="form-control" type="number" value="<?php echo $glo10gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 13.25GB<span style="color:red">*</span></label>
                                <input name="glo13gb" class="form-control" type="number" value="<?php echo $glo13gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 18.25GB<span style="color:red">*</span></label>
                               <input name="glo18gb" class="form-control" type="number" value="<?php echo $glo18gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 29.5GB<span style="color:red">*</span></label>
                                <input name="glo29gb" class="form-control" type="number" value="<?php echo $glo29gb; ?>" required = "required" autocomplete="off">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 50GB<span style="color:red">*</span></label>
                                <input name="glo50gb" class="form-control" type="number" value="<?php echo $glo50gb; ?>" required = "required" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 93GB<span style="color:red">*</span></label>
                                <input name="glo93gb" class="form-control" type="number" value="<?php echo $glo93gb; ?>" required = "required" autocomplete="off">
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