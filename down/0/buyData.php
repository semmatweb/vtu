 <?php require("header.php"); ?>

 <?php require("menu.php"); ?>


     <?php
    include("locker.php");

    if ($MTNDATA_LOCK=="OFF" || $ceov!="enduser" && $activate==0){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN SME DATA</option>';
    }

     if ($gifting_lock=="OFF" || $ceov!="enduser" && $activate==0){
      $gift_opt='';
    }
    else {
      $gift_opt='<option value="GIFTING">MTN GIFTING</option>';
    }


    if ($GLODATA_LOCK=="OFF" || $ceov!="enduser" && $activate==0){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO DATA BUNDLE</option>';
    }


    if ($AIRTELDATA_LOCK=="OFF" || $ceov!="enduser" && $activate==0){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL DATA BUNDLE</option>';
    }


    if ($AIRTELDATA_LOCK2=="OFF" || $ceov!="enduser" && $activate==0){
      $airtel_opt2='';
    }
    else {
      $airtel_opt2='<option value="AIRTEL-CG">AIRTEL-CG DATA BUNDLE</option>';
    }

    if ($MOBILEDATA_LOCK=="OFF" || $ceov!="enduser" && $activate==0){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="9MOBILE">9MOBILE DATA BUNDLE</option>';
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


<?php

if ($ceov=="enduser"){

  $toSellPrice=$buy_price;
}

if ($ceov=="reseller"){

  $toSellPrice=$ceov_price;
}

if ($ceov=="agent"){

  $toSellPrice=$agent_price;
}

?>


<script type="text/javascript">

 var countryLists = new Array(4) 
  countryLists["empty"] = ["Select a Country"]; 
 countryLists["MTN"] = <?php echo $toSellPrice; ?>


 countryLists
 

 function countryChange(selectObj) { 
 // get the index of the selected option 
 var idx = selectObj.selectedIndex; 
 // get the value of the selected option 
 var which = selectObj.options[idx].value; 
 // use the selected option value to retrieve the list of items from the countryLists array 
 cList = countryLists[which]; 
 // get the country select element via its known id 
 var cSelect = document.getElementById("country"); 
 // remove the current options from the country select 
 var len=cSelect.options.length; 
 while (cSelect.options.length > 0) { 
 cSelect.remove(0); 
 } 
 var newOption; 
 // create new options 
 for (var i=0; i<cList.length; i++) { 
 newOption = document.createElement("option"); 
 newOption.value = cList[i];  // assumes option string and value are the same 
 newOption.text=cList[i]; 
 // add the new option 
 try { 
 cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
 } 
 catch (e) { 
 cSelect.appendChild(newOption); 
 } 
 } 
 } 
//]]>
</script>

<div style="padding:90px 15px 20px 15px" >

  <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">DATA BUNDLE <span style="float: right;" id="img_loader"></span></span>
   </div>


        <form method='POST' id="dataform">


    <div class="">
  
    	<br>

    	<div id="DataNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;"></div>
    	<div id="DataPanel">
    
    
    <div id="div_id_network" class="form-group">
            <label for="network" class=" requiredField">
                Choose Network<span class="asteriskField">*</span>
            </label>
                <div class="">
      <select name="network" class="select form-control" required id="network" onchange="countryChange(this);">

  <option value="">---------</option>

   <?php echo $mtn_opt; ?>
   <?php echo $gift_opt; ?>
  <?php echo $glo_opt; ?>
  <?php echo $airtel_opt; ?>
  <?php echo $airtel_opt2; ?>
  <?php echo $mobile_opt; ?>

</select>
                </div>
    			</div>
 


  <div id="div_id_plan_number" class="form-group">
        
            <label for="id_plan_number" class=" requiredField">
                Select Plan<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select class="select form-control" name="plan" id="country" required>
                
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

   

                    <button type="button" class=" btn" style="background-color:<?php echo $theme_color; ?>;color:#fff" id ="btnsubmit"> Purchase Now</button>



    	</div>

                </div>
              
                    <br>
                 
                    <ul class="list-group"> 
                       <li class="list-group-item list-group-item-warning">MTN [SME]     *461*4#  </li>
                       <li class="list-group-item list-group-item-warning">MTN [Gifting]     *131*4# or *460*260#  </li>
                              <li class="list-group-item list-group-item-dark"> 9mobile [Gifting]   *228# </li>
                        <li class="list-group-item list-group-item-danger"> Airtel   *140# </li>
                        <li class="list-group-item list-group-item-success"> Glo  *127*0#. </li>
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
    $("#btnsubmit").click(function() {
        var network = $("#network").val();
        var plan = $("#country").val();
        var phone = $("#phone").val();


        if (network=="" || phone=="" || plan==""){

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


      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to buy " + network + " " + plan + " to " + phone,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

          	if (shallWe){

          	$.LoadingOverlay("show");

          	$.ajax({

          		url:"DataPayment.php",
          		method:"POST",
          		data:{
                phone:phone, network:network, plan:plan
                 },
                success:function(data){

                $.LoadingOverlay("hide");

                 if (data==200){
			swal({
            title: "Data Bundle",
            text: "Transaction Successful",
            icon: "success",
          })
			$("#DataPanel").hide();
			$("#DataNote").show();
			$("#DataNote").text("Data Purchase Completed");

                 }

             else {

             	swal({
            title: "Data Order",
            text: ""+data,
            icon: "error",
          })

           $("#DataPanel").hide();
           $("#DataNote").show();
			$("#DataNote").text(data);
             }


                }
          	})
          	}
          	  
          })
          	

          

    });
</script>


</div>










</div>



		</div>
	</div>


<?php require("footer.php"); ?>