 <?php require("header.php"); ?>


 <?php
if ($ceov=="reseller" && $activate==0){
  ?>
  <script type="text/javascript">window.location.href="home";</script>
  <?php
}

else {

  
}
?>

		<?php require("menu.php"); ?>

    <?php
    include("locker.php");

    if ($MTN_LOCK=="OFF"){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN</option>';
    }


    if ($GLO_LOCK=="OFF"){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO</option>';
    }


    if ($AIRTEL_LOCK=="OFF"){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL</option>';
    }


    if ($MOBILE_LOCK=="OFF"){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="ETISALAT">9MOBILE</option>';
    }


    ?>

		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    #process{
        display: none;
    }



     /*--thank you pop starts here--*/
     .thank-you-pop{
      width:100%;
       padding:20px;
      text-align:center;
    }
    .thank-you-pop img{
      width:76px;
      height:auto;
      margin:0 auto;
      display:block;
      margin-bottom:25px;
    }

    .thank-you-pop h1{
      font-size: 42px;
        margin-bottom: 25px;
      color:#5C5C5C;
    }
    .thank-you-pop p{
      font-size: 20px;
        margin-bottom: 27px;
       color:#5C5C5C;
    }
    .thank-you-pop h3.cupon-pop{
      font-size: 25px;
        margin-bottom: 40px;
      color:#222;
      display:inline-block;
      text-align:center;
      padding:10px 20px;
      border:2px dashed #222;
      clear:both;
      font-weight:normal;
    }
    .thank-you-pop h3.cupon-pop span{
      color:#03A9F4;
    }
    .thank-you-pop a{
      display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }
    .thank-you-pop a i{
      margin-right:5px;
      color:#fff;
    }
    #ignismyModal .modal-header{
        border:0px;
    }
    /*--thank you pop ends here--*/

</style>

<div style="padding:90px 15px 20px 15px" >

  <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">AIRTIME 2 CASH <span style="float: right;" id="img_loader"></span></span>
   </div>


        <form method='POST' id="dataform">


    <div class="">

    	<br>

    	<div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
    	<div id="AirtimePanel">
    
    
    <div id="div_id_network" class="form-group">
            <label for="network" class=" requiredField">
                Network<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="network" class="select form-control" required id="network">
  <option value="" selected>---------</option>

  <?php echo $mtn_opt; ?>
  <?php echo $glo_opt; ?>
  <?php echo $airtel_opt; ?>
  <?php echo $mobile_opt; ?>
</select>
                </div>
    			</div>
 


    
    <div id="div_id_mobile_number" class="form-group">
        
            <label for="id_mobile_number" class=" requiredField">
                Mobile number<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <input type="text" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control" required id="phone">
                    
                </div>
    			</div>



    
    		<div id="div_amount" class="form-group">
            <label for="id_amount" class=" requiredField">
                Amount<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <input type="number" name="amount" min="100" class="numberinput form-control" required id="amount" autocomplete="off">
                </div>
   				 </div>
   
    

                  	<div id="div_id_amount" class="form-group" style="display: none;">
            <label for="id_amount" class=" requiredField">
                Amount To Pay<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <input type="number" name="amount2" min="100" class="numberinput form-control" required readonly="readonly" id="amount2" style="color: red;font-weight: bold;">
                </div>
   				 </div>
   

                    <button type="button" class=" btn" style="background-color:<?php echo $theme_color; ?>;color:#fff" id ="btnsubmit"> Convert Now</button>



    	</div>

                </div>
                
                    <br>
               
                    <ul class="list-group"> 
                       <li class="list-group-item list-group-item-warning">MTN    <span id="RightT"> *600*phone_number*amount*pin#  </span></li>
                     
                        <li class="list-group-item list-group-item-dark"> 9mobile   *223*PIN*Amount*Phone Number# </li>
                        <li class="list-group-item list-group-item-danger"> Airtel   *432# > Select 1 (Airtel to Airtel) > Enter Airtel Number > Enter Amount > Enter Pin > Press Send/Ok </li>
                        <li class="list-group-item list-group-item-success"> Glo *131*phone_number*amount*pin#. </li>
                        </ul>


                    

            </div>

                

            </div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  

  <script>
                                  $("#amount").keyup(function(){
                                    var amount=$("#amount").val();
                                    var network=$("#network").val();

                                    if (amount=="" || amount==null){

                                      $("#div_id_amount").hide()
                                     
                                    }
                                    else if (network=="MTN"){

                                      var mc=amount*(<?php echo $m_discount3; ?>)/100;
                                      var fc=amount-mc;
                                     
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="GLO"){

                                      var mc=amount*(<?php echo $g_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="AIRTEL"){

                                      var mc=amount*(<?php echo $a_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="ETISALAT"){

                                      var mc=amount*(<?php echo $mo_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }
                                  })
                                </script>

<script>
    $("#btnsubmit").click(function() {
        var network = $("#network").val();
        var amount = $("#amount").val();
        var amount2=$("#amount2").val();
        var phone = $("#phone").val();


        if (network=="" || phone=="" || amount=="" || amount2==""){

        swal({

        		title:"Warning !!!",
        		text:"Please make sure all form are fill correctly",
        		icon:"warning"
        	})

        	return false;
        }

        if (phone.length < 11 || phone.length > 11){


        	swal({

        		title:"Warning !!!",
        		text:"Please input a valid number. 11digits expected",
        		icon:"warning"
        	})

        	return false;
        }


        if (amount < 1000){


          swal({

            title:"Warning !!!",
            text:"Minimum to Convert is ₦1000",
            icon:"warning"
          })

          return false;
        }

      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to Convert Airtime " + network + " ₦" + amount + " to ₦" + amount2,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

          	if (shallWe){

                window.location.href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>&text=Hello%20Admin!%20i%20want%20to%20covert%20"+network+"%20₦"+amount+"%20to%20cash.";
          	}
          	  
          })
          	

          

    });
</script>


</div>










</div>



		</div>
	</div>


<?php require("footer.php"); ?>