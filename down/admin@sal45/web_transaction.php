
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

$ddaa = mysqli_query($db,"SELECT * FROM mytransaction WHERE status='Successful' AND active='WEB' ORDER BY id DESC LIMIT 20000");

if (mysqli_num_rows($ddaa)<1){

   $history='<div class="alert" style="background-color:white;">
  <br/>
  <div class="alert alert-danger">
    No Transaction Record Found

  </div>
  <br/>
  <br/>
  </div>';
}

while($data =mysqli_fetch_array($ddaa)){


      $status=strtolower($data['status']);
      $amount=$data['amount'];
      $trx=$data['trx'];
      $active=$data['active'];
      $descr=$data['descr'];
      $date=$data['date'];
      $oldbal=$data['oldbal'];
      $newbal=$data['newbal'];
      $username=$data['username'];
      $email=$data['email'];

      if ($active !="API"){

        $act="WEB";
      }
      else{

        $act="API";
      }


      if ($status !="successful" && $status != "credited" && $status != "credit" && $status != "debit"){

        $facemode='badge-danger';
      }

      else{

        $facemode='badge-success';
      }


      $history.='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">

      <b>Refrence No. :</b> '.$trx.'
      <span style="float:right;font-weight:bold;">'.$act.'</span>
      <hr/>
      <b>User:</b> '.$username.'<br/>
      <b>Email:</b> '.$email.'<br/>
      <p class="mb-0 text-dark" style="font-size: 13px;">
      <b>Order:</b> '.$descr.'<br/>
      <b>Date:</b> '.$date.'<br/>
      <b>Amount:</b> ₦'.number_format($amount).'<br/>
      <b>Status:</b> <span class="badge '.$facemode.'"  style="cursor: pointer;">'.$status.'</span>
      <hr/>

      <b>Prev Bal:</b> <span class="badge badge-dark"  style="cursor: pointer;">₦'.number_format($oldbal).'</span>

      <span style="float:right"><b>Post Bal:</b> <span class="badge badge-dark"  style="cursor: pointer;">₦'.number_format($newbal).'</span></span>
        </p>
            
      
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