<?php require("site_header.php"); ?>
<?php
if ($manage_automation==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">


<div class="alert" style="background-color: black;color: #000;">

<center>
<h4 style="color: white;">CHANGE DATA AUTOMATION</h4>

<p style="color: white;">click the button to see option.</p>
 <br/>
 <button class="btn btn-danger btn-block" id="data" onclick="switchFun(this.id)">EDIT INFORMATION</button>
  
</center>  
</div>


<br>
<br>

<div class="alert" style="background-color: black;color: #000;">

<center>
<h4 style="color: white;">CHANGE DATA CARD AUTOMATION</h4>

<p style="color: white;">click the button to see option.</p>
 <br/>
 <button class="btn btn-danger btn-block" id="datacard" onclick="switchFun(this.id)">EDIT INFORMATION</button>
  
</center>  
</div>


<br>
<br>
<div class="alert" style="background-color: black;color: #000;">

<center>
<h4 style="color: white;">CHANGE VTU AUTOMATION</h4>

<p style="color: white;">click the button to see option.</p>
 <br/>
 <button class="btn btn-danger btn-block" id="vtu" onclick="switchFun(this.id)">EDIT INFORMATION</button>
  
</center>  
</div>



<br>
<br>

<div class="alert" style="background-color: black;color: #000;">

<center>
<h4 style="color: white;">CHANGE SNS AUTOMATION</h4>

<p style="color: white;">click the button to see option.</p>
 <br/>
 <button class="btn btn-danger btn-block" id="sns" onclick="switchFun(this.id)">EDIT INFORMATION</button>
  
</center>  
</div>

<br>
<br>

</div>
</div>
</div>

<script type="text/javascript">
    function switchFun(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/fetchswitch_data?load_id='+id,
    dataType:'json',
    success:function(responseData){   
    $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
     //console.log(responseData.data)
            }
        });
    }

    function saveDATACARD() {
 $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      mtn_datacard: $("#mtn_datacard").val(),
    //   mtncg_data: $("#mtncg_data").val(),
    //   glo_data: $("#glo_data").val(),
    //   glocg_data: $("#glocg_data").val(),
    //   airtel_data: $("#airtel_data").val(),
    //   airtelcg_data: $("#airtelcg_data").val(),
    //   mobile_data: $("#mobile_data").val(),
      level: 1,
    };
    $.ajax({
    url:'customer/savedatacard_switch',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(savingRes.message);
    }
            }
        });
    
    }
    function saveDATA() {
 $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      mtnsme_data: $("#mtnsme_data").val(),
      mtncg_data: $("#mtncg_data").val(),
      mtndc_data: $("#mtndc_data").val(),
      glo_data: $("#glo_data").val(),
      glocg_data: $("#glocg_data").val(),
      airtel_data: $("#airtel_data").val(),
      airtelcg_data: $("#airtelcg_data").val(),
      mobile_data: $("#mobile_data").val(),
      mobilecg_data: $("#mobilecg_data").val(),
      level: 1,
    };
    $.ajax({
    url:'customer/savedata_switch',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(savingRes.message);
    }
            }
        });
    
    }

    function saveVTU() {
 $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      mtn_vtu: $("#mtn_vtu").val(),
      glo_vtu: $("#glo_vtu").val(),
      airtel_vtu: $("#airtel_vtu").val(),
      mobile_vtu: $("#mobile_vtu").val(),
      level: 1,
    };
    $.ajax({
    url:'customer/savevtu_switch',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(savingRes.message);
    }
            }
        });
    
    }

    function saveSNS() {
 $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      mtn_sns: $("#mtn_sns").val(),
      glo_sns: $("#glo_sns").val(),
      airtel_sns: $("#airtel_sns").val(),
      mobile_sns: $("#mobile_sns").val(),
      level: 1,
    };
    $.ajax({
    url:'customer/savesns_switch',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(savingRes.message);
    }
            }
        });
    
    }
</script>
<?php
}
else {

require ("admin_pushfail.php"); 
echo $admin_pushfail;
}

?>
<?php require("site_footer.php"); ?>
