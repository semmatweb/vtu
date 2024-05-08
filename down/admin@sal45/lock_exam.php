
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

    $WAEC=$_POST['WAEC'];
    $NECO=$_POST['NECO'];
    $NABTEB=$_POST['NABTEB'];

    $update=mysqli_query($db, "UPDATE locker SET WAEC='".$WAEC."', NECO='".$NECO."', NABTEB='".$NABTEB."' WHERE id='1'");

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
                    <h6 class="font-weight-bold">Exam Services</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">WAEC<span style="color:red">*</span></label>
                                    <select id="WAEC" class="form-control" name="WAEC" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                
                               <div class="form-group">
                                    <label for="exampleInputPassword1">NECO<span style="color:red">*</span></label>
                                    <select id="NECO" class="form-control" name="NECO" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">NABTEB<span style="color:red">*</span></label>
                                    <select id="NABTEB" class="form-control" name="NABTEB" required="required">
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