

 <?php require("header.php"); ?>

 <?php require("menu.php"); ?>

   <?php
    include("locker.php");

    if ($DSTV=="OFF" || $ceov!="enduser" && $activate==0){

      $dstv_opt='';

    }

    else {

      $dstv_opt='<option value="DSTV">DSTV</option>';
    }

      if ($GOTV=="OFF" || $ceov!="enduser" && $activate==0){

      $gotv_opt='';

    }

    else {

      $gotv_opt='<option value="GOTV">GOTV</option>';
    }

  if ($STARTIMES=="OFF" || $ceov!="enduser" && $activate==0){

      $startimes_opt='';

    }

    else {

      $startimes_opt='<option value="STARTIMES">STARTIMES</option>';
    }

    ?>



		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
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

    .process{
        display: none;
      }

      #name{
        display: none;
      }

      #process, #process2{
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
    #div_id_customer_name{
      display: none;
    }
</style>

<script type="text/javascript">
 //<![CDATA[ 
 // array of possible countries in the same order as they appear in the country selection list MTN, 9MOBILE, GLO or AIRTEL
 var countryLists = new Array(4) 
 countryLists["empty"] = ["Select a Country"]; 
  
 <?php echo $cable_prices; ?>

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
      <span id="" style="font-weight: bold;font-size: 30px;">CABLE PAYMENT <span style="float: right;" id="img_loader"></span></span>
   </div>

    <div class="">

    <br>
    <div class="alert alert-danger" id="CableNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
    	
    </div>
    <div id="cablePanel">

      <div class="alert alert-danger">₦<?php echo $cable_charge; ?> charges apply.</div>
   
    <div id="div_id_cablename" class="form-group">
        
            <label for="id_cablename" class=" requiredField">
                Cablename<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <select name="dtype" class="select form-control" required id="dtype"   onchange="countryChange(this)">
  <option value="" selected>---------</option>

                     <?php echo $dstv_opt; ?>
                    <?php echo $gotv_opt; ?>
                    <?php echo $startimes_opt; ?>


</select>
                    
     </div>
         </div>
    







    
    <div id="div_id_cableplan" class="form-group">
        
            <label for="id_cableplan" class=" requiredField">
                Cableplan<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="country" class="select form-control" required id="country">

  <option value="" selected>---------</option>

</select>
     </div>    
    </div>





    
    <div id="div_id_smart_card_number" class="form-group">
        
            <label for="dnumber" class=" requiredField">
                Smart Card number / IUC number<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="dnumber" maxlength="15" minlength="5" class="textinput textInput form-control" required id="dnumber">
                </div>  
    </div>
    


    


    <div id="dinfo" class="form-group" style="display: none;">
        
            <label for="dname" class="">
                Customer name
            </label>
    
                <div class="">
                    <input type="text" name="dname" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="dname">
                </div>
           
    </div>
                    
                    
                    <!-- <label><b>Customer Name</b></label>
                    <p class="control" id="name"> </p> -->


                  
                 
                    <button type="button"  class="btn process" id="paybtn" style="background-color:<?php echo $theme_color; ?>;color:#fff"'>  Make Payment Now </button>



                    <button type="button"  id="verify" class=" btn"  style="background-color:<?php echo $theme_color; ?>;color:#fff">Validate Iuc/Smart Card </button>

                </div>


    </div>
                

                <div class="col-sm-4 ">
 

            </div>



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
</div>
</div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


<script>
	    
	   $("#verify").click(function(){
	       var dtype=$("#dtype").val();
	      var dnumber=$("#dnumber").val();
	       var country=$("#country").val();
	  if (dtype=="" || dnumber=="" || country==""){
	      
	     alert("Fill All Form !!!");
	      return false;
	  }
	  
	  else {
	    $.LoadingOverlay("show");
	    $("#verify").attr("disabled, true");
	    $("#verify").html("Wait while verifying...");
	    
	    $.ajax({
	        
	         url:"verifyiuc.php",
            method:"POST",
            
            data:{

                dtype:dtype, dnumber:dnumber, country:country
            },
            //dataType:"json",
            success:function(data){
                
             $.LoadingOverlay("hide");
                
               if (data==100){
               $("#verify").attr("disabled, false");
	    	   $("#verify").html("Validate Iuc/Smart Card");
                
                swal({

        		title:"Warning !!!",
        		text:"Invalid Iuc/Smart Card Number",
        		icon:"error",
        	})

               }
               else {
                $("#dtype").prop('disabled',true);
	            $("#dnumber").prop('disabled',true);
	            $("#country").prop('disabled',true);
                $("#dinfo").show();
                $("#dname").val(data);
                $("#verify").hide();
                $("#paybtn").show();
                
               }
            }
	    })
	  }
	   })
	

</script>


<script>
	
	 $("#paybtn").click(function(){
	       
	       var country=$("#country").val();
	       var dtype=$("#dtype").val();
	       var dnumber=$("#dnumber").val();
	       var dname=$("#dname").val();

	        swal({
          title: "Are you sure?",
          text: "You are about to subscribe " + dtype + " for "+ dname + " - " + dnumber,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

        	if (willProccess){


        		 $.LoadingOverlay("show");
	    $.ajax({
	        
	       url:"paycable.php",
	       method:"POST",
	       data:{
	            country:country, dtype:dtype, dnumber:dnumber, dname:dname
	       },
	       //dataType:"json",
	       success:function(respo){
	     $.LoadingOverlay("hide");

	     if (respo==200){

	     	$("#cablePanel").hide();
	     	$("#CableNote").show();
	     	$("#CableNote").text("Decoder Payment Successful");

	     	 swal({

        		title:"Transaction Successful",
        		text:"Decoder Payment Successful",
        		icon:"success",
        	})
	     }

	     else {

	     	$("#cablePanel").hide();
	     	$("#CableNote").show();
	     	$("#CableNote").text(respo);
	     	 swal({

        		title:"Cable Subscription",
        		text:respo+".",
        		icon:"error",
        	})
	     }

	 }

	 })
        	}

        	 else {
                swal("Payment Cancel");
              }

        })

	   
	   

	 })
</script>




<?php require("footer.php"); ?>