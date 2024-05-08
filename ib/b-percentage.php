<?php require("site_header.php"); ?>

<?php 

if ($finance==1){
?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Deposit Money</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Fund</a></li>
<li class="breadcrumb-item active">Default</li>
</ol>
</div>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 social_media_card" style="background-color:#fff;">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0"><?php echo strtoupper($domain); ?></h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
  

  <?php
  
$host="localhost";
$user="freesubc_freesubc";
$pass="!)ytJB66g58MPt";
$dbanme="freesubc_data";

$con=mysqli_connect($host, $user, $pass, $dbanme);
   $check="SELECT * FROM referal_percentage WHERE id=1 "; 
   $result = mysqli_query($con, $check);
  $row = mysqli_fetch_array($result);
           	     
  
  ?>

    <label>Referral Bonus Percentage</label>
    <input type="number" id="percentage" class="form-control" placeholder="Amount To Deposit" value="<?php echo $row['percentage']?>" required>

    <br/>


    <input type='button' value='SET' class="btn btn-success btn-block" onclick='refer()' id="casher" style="width:100%">

   

  <br>
  <br>
  <br/>
</div>


</div>
</div>



</div>
</div>
</div>


    <script type="text/javascript">

     $("#form-data").submit(function (event) {
     var formData = {
      buyer_email: $("#buyer_email").val(),
      buyer_amount: $("#buyer_amount").val(),
      buyer_narration: $("#buyer_narration").val(),
      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/fundwallet',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
     $.LoadingOverlay("hide");
     if (response_fd.status == 'success'){
     $("#successModal").modal("show");
      $("#successModal .modal-body").html(response_fd.message);
                    setTimeout(function() {
                        window.location.reload();
                    }, 5000);
     }
    else {
   $("#resultHandle").html(response_fd.message);
    }
}
    });

      event.preventDefault();
     });
     
      function refer(){  
         document.getElementById('casher').value='Please Wait'
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {


    document.getElementById('casher').value='Set'
        alert(this.responseText);
          setTimeout(()=>{
    location.reload()
   })


    }
  };
   var b="percentage="+document.getElementById('percentage').value;
 xhttp.open("POST", "referr.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(b);
      }
     
  </script>
<?php
}
else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>

<?php require("site_footer.php"); ?>
