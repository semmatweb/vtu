

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
    require("locker.php");

    if ($AEDC=="OFF"){
      $AEDC='';
    }

    else {
      $AEDC='<option value="abuja-electric">ABUJA ELECTRIC</option>';
    }

     if ($IBEDC=="OFF"){
      $IBEDC='';
    }

    else {
      $IBEDC='<option value="ibadan-electric">IBADAN ELECTRIC</option>';
    }


     if ($EKEDC=="OFF"){
      $EKEDC='';
    }

    else {
      $EKEDC='<option value="eko-electric">EKO ELECTRIC</option>';
    }


     if ($IKEDC=="OFF"){
      $IKEDC='';
    }

    else {
      $IKEDC='<option value="ikeja-electric">IKEJA ELECTRIC</option>';
    }

      if ($PHED=="OFF"){
      $PHED='';
    }

    else {
      $PHED=' <option value="portharcourt-electric">PORTHARCOURT ELECTRIC</option>';
    }

     if ($JED=="OFF"){
      $JED='';
    }

    else {
      $JED=' <option value="jos-electric">JOS ELECTRIC</option>';
    }

    if ($KAEDCO=="OFF"){
      $KAEDCO='';
    }

    else {
      $KAEDCO=' <option value="kaduna-electric">KADUNA ELECTRIC</option>';
    }

    if ($KEDCO=="OFF"){
      $KEDCO='';
    }

    else {
      $KEDCO='<option value="kano-electric">KANO ELECTRIC</option>';
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



<div style="padding:90px 15px 20px 15px" >

  <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">BILLS PAYMENT <span style="float: right;" id="img_loader"></span></span>
   </div>

    <div class="">

     
    <br>
    <div class="alert alert-danger" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
    	
    </div>
    <div id="electPanel">
   
   <div class="alert alert-danger">₦<?php echo $elect_charge; ?> charges apply.</div>
    <div id="discotypeID" class="form-group">
        
            <label for="discotypeID" class=" requiredField">
                Disco Type<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <select name="discotype" class="select form-control" required id="discotype">
  <option selected>---------</option>
    <?php echo $AEDC; ?>
    <?php echo $EKEDC; ?>
    <?php echo $IBEDC; ?>
    <?php echo $IKEDC; ?>
    <?php echo $JED; ?>
    <?php echo $KAEDCO; ?>
    <?php echo $KEDCO; ?>
    <?php echo $PHED; ?>

</select>
                    
     </div>
         </div>
    







    
    <div id="metertypeID" class="form-group">
        
            <label for="metertypeID" class=" requiredField">
                Meter Type<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="metertype" class="select form-control" required id="metertype">

  <option selected>---------</option>
  <option value="prepaid">PrePaid Meter</option>
    <option value="postpaid">PostPaid Meter</option>

</select>
     </div>    
    </div>



 <div id="phoneID" class="form-group">
        
            <label for="phoneID" class=" requiredField">
                Mobile No.<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control" required id="phone">
                </div>  
    </div>






    
    <div id="meternumID" class="form-group">
        
            <label for="meternumID" class=" requiredField">
                Meter Number<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="meternum" maxlength="15" minlength="5" class="textinput textInput form-control" required id="meternum">
                </div>  
    </div>
    




  <div id="amountID" class="form-group">
        
            <label for="amountID" class=" requiredField">
                Amount To Buy<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="number" name="amount" maxlength="15" minlength="2" class="textinput textInput form-control" required id="amount">
                </div>  
    </div>


    


    <div id="meterinfo" class="form-group" style="display: none;">
        
            <label for="dname" class="">
                Customer Name
            </label>
    
                <div class="">
                    <input type="text" name="metername" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="metername">
                </div>
           
    </div>
                    
                

                  
                 
             <button type="button"  class="btn process" id="paybtn" style="background-color:<?php echo $theme_color; ?>;color:#fff">  Make Payment Now </span> </button>



                    <button type="button"  id="verify" class=" btn" style="background-color:<?php echo $theme_color; ?>;color:#fff">Validate Meter Number </button>

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
      var discotype=$("#discotype").val();
      var metertype=$("#metertype").val();
      var meternum=$("#meternum").val();
      var phone=$("#phone").val();
      var amount=$("#amount").val();

      var fnumber=phone.replace(/\s/g, '');

     if (metertype=="" || meternum=="" || discotype=="" || phone=="" || amount==""){
        
        swal({

               title:"Warning !!!",
                text:"Please fill all the field",
                icon:"error",
                 })
        return false;
    }

   else if (fnumber.length<11 || fnumber.length>11){

     swal({

               title:"Warning !!!",
                text:"Please enter a valid number",
                icon:"error",
                 })
        return false;
   }

   else if (amount < 500){

     swal({

               title:"Warning !!!",
                text:"Minimum Purchase is #500",
                icon:"error",
                 })
        return false;
   }
   
   
    else {
     $.LoadingOverlay("show");

      $("#verify").attr("disabled, true");
      $("#verify").html("Wait while verifying...");
      
      $.ajax({
          
           url:"verifymeter.php",
            method:"POST",
            
            data:{

                metertype:metertype, meternum:meternum, discotype:discotype
            },
            //dataType:"json",
            success:function(data){
                
             $.LoadingOverlay("hide");
                
               if (data==100){

              $("#verify").attr("disabled, false");
             $("#verify").html("Validate Meter Number");
                
                swal({

               title:"Warning !!!",
                text:"Invalid Meter Number",
                icon:"error",
                 })

               }

               else {

              $("#metertype").prop('disabled',true);
              $("#meternum").prop('disabled',true);
              $("#discotype").prop('disabled',true);
              $("#phone").prop('disabled',true);
              $("#amount").prop('disabled',true);
              $("#meterinfo").show();
                $("#metername").val(data);
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
	       
	      var discotype=$("#discotype").val();
         var metertype=$("#metertype").val();
         var meternum=$("#meternum").val();
         var amount=$("#amount").val();
         var metername=$("#metername").val();
         var phone=$("#phone").val();

	        swal({
          title: "Are you sure?",
          text: "You are about to buy ₦" +amount+" "+discotype+"("+metertype+") on "+meternum,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

        	if (willProccess){


     $.LoadingOverlay("show");
	    $.ajax({
	        
	       url:"payutility.php",
	       method:"POST",
	       data:{
	            discotype:discotype, metertype:metertype, meternum:meternum, amount:amount, metername:metername, phone:phone
	       },
	       //dataType:"json",
	       success:function(respo){

	     $.LoadingOverlay("hide");

	     if (respo==200){

	     	$("#electPanel").hide();
	 
	     	 swal({

        		title:"Transaction Successful",
        		text:"Electricity Payment Successful",
        		icon:"success",
        	})

    window.location.href="history";
	     }

	     else {

	     	$("#electPanel").hide();
        $("#ElectNote").show();
	     	$("#ElectNote").text(respo);
	     	 swal({

        		title:"Electricity Payment",
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