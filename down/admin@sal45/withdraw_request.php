
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

$history="";

$ddaa = mysqli_query($db,"SELECT * FROM withdraw_request  ORDER BY id DESC LIMIT 20000");

if (mysqli_num_rows($ddaa)<1){

   $history='<div class="alert" style="background-color:white;">
  <br/>
  <div class="alert alert-danger">
    No Withdraw Request Found

  </div>
  <br/>
  <br/>
  </div>';
}

while($data =mysqli_fetch_array($ddaa)){


      $status=strtolower($data['status']);
      $amount=$data['amount'];
      $trx=$data['trx'];
      $descr=$data['descr'];
      $date=$data['date'];
      $oldbal=$data['oldbal'];
      $newbal=$data['newbal'];
      $email=$data['email'];


      if ($status !="successful"){

        $facemode='background-color:steelblue';
        $paidbtn='<a href="'.$baseurl.'/confirm_payment.php?trx='.$trx.'"><button class="btn btn-danger"> VERIFY </button></a>';
      }

      else{

        $facemode='background-color:steelblue';
        $paidbtn='<button class="btn btn-success"> PAYMENT SENT</button>';
      }


      $history.='<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

                <div class="card-body" style="'.$facemode.'">
                                     
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
        
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Order ||  Date: '.$date.'</a>
                      </li>
                     

                    </ul>
                    <div class="tab-content border border-top-0 p-3" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <h6 class="card-title">Amount: ₦'.($amount).'<span style="float: right;'.$facemode.';border-radius: 10%;width: 150px;text-align: center;color: white;">'.$trx.'</span></h6>
                        
                            <div class="form-group">
                             
                                <label style="color: black;font-weight: bold;">Email: </label>
                                <span>'.$email.'</span>
                                <br>

                                <label style="color: black;font-weight: bold;">Descr: </label>
                                <span>'.$descr.'</span>
                                <br>
                                
                                 <label style="color: red;font-weight: bold;">OldBal: </label>
                                <span>₦ '.$oldbal.'</span>

                                <span style="float: right;"><span style="color: green;font-weight: bold;">NewBal: </span>₦ '.($newbal).'</span>
                        
                            </div>
                  
                          
                      </div>
                    
                     
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>';
      
}



?>


<?php echo $history; ?>


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