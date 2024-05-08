
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
                            


<!-- Required Js -->
<script src="/static/assets/js/vendor-all.min.js"></script>
<style>
    li{
        font-weight: bolder !important;
    }
</style>

<?php

$users="";
if (isset($_POST['submit'])){

$userid=trim($_POST['userid']);

$ddaa = mysqli_query($db,"SELECT * FROM users WHERE emailR LIKE '%$userid%' OR email LIKE '%$userid%' ORDER BY id DESC");

if (mysqli_num_rows($ddaa)<1){

   $users='<div class="alert" style="background-color:white;">
  <br/>
  <div class="alert alert-danger">
    No User Record Found

  </div>
  <br/>
  <br/>
  </div>';
}

while($data =mysqli_fetch_array($ddaa)){


      $uid=$data['id'];
      $first_name=$data['firstname'];
      $last_name=$data['lastname'];
      $mobile=$data['mobile'];
      $username=$data['email'];
      $email=$data['emailR'];
      $mallu=$data['us_wallets'];
      $LastLogin=$data['LastLogin'];
      $ceov=$data['ceov'];
      $block=$data['block'];
      $reg_active=$data['reg_active'];

    if ($block==0){
          
        $blockbtn='<a href="'.$adminpage.'/b_user.php?email='.$email.'"><button class="btn btn-danger">BLOCK</button></a>';
      }
      
      else{
          
       $blockbtn='<a href="'.$adminpage.'/ub_user.php?email='.$email.'"><button class="btn btn-success">UNBLOCK</button></a>';
      }
       
      if ($reg_active==0){
          
        $passbtn='<a href="'.$adminpage.'/verify_user.php?email='.$email.'"><button class="btn btn-danger">APPROVE NOW</button></a>';
      }
      
      else{
          
       $passbtn='<button class="btn btn-success">VERIFIED</button>';
      }

$users.='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">

      <b>Name :</b> '.$first_name.'-'.$last_name.'
      <hr/>
      <b>User:</b> '.$username.'<br/>
      <b>Email:</b> '.$email.'<br/>
      <p class="mb-0 text-dark" style="font-size: 13px;">
      <b>Mobile:</b> '.$mobile.'<br/>
      <b>LastSeen:</b> '.$LastLogin.'<br/>
      <b>Acct Type:</b> <span class="badge badge-dark"  style="cursor: pointer;">'.strtoupper($ceov).'</span>
      <hr/>

      <b>Current Bal:</b> <span class="badge badge-dark"  style="cursor: pointer;">₦'.number_format($mallu).'</span>

      <span style="float:right">'.$blockbtn.'</span>
      <span style="float:right">'.$passbtn.'</span>
        </p>
            
      
    </div>';
      

      
}

}

?>

<div class="alert" style="background-color:white;">
  <br/>
  <div>
   
   <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email Address/Username <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="userid" id="userid" required autocomplete="off">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-block">LOOKUP</button>
                            </form>
  </div>
  <br/>
  <br/>
  </div>

<?php echo $users; ?>


<!-- datatable Js -->
<script src="/static/assets/plugins/data-tables/js/datatables.min.js"></script>
<!-- <script src="/static/assets/js/pages/data-responsive-custom.js"></script> -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


<?php require("footer.php"); ?>