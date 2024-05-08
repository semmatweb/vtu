

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

    if ($WAEC=="OFF"){

      $WAEC_OPT='';
    }

    else {

      $WAEC_OPT='<option value="WAEC">WAEC</option>';
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


    <h2 class="w3-center">Waec Scratch Card</h2>

    <div class="box w3-card-4">

      




            <div class="row">

                <div class="col-sm-8">

    
    <br>
    <br>
    <div class="alert alert-default" id="PayNote" style="font-weight: bold;font-size: 13px;">

      Dear <?php echo $first_name; ?>! You can now buy your educational pin on <?php echo $sitetitle; ?>.
    	
    </div>
  

<br>
<div class="alert alert-danger" id="ExamNote" style="display: none;text-transform: uppercase;font-weight: bold;"></div>

<div id="ExamLabel">


     <div id="div_id_examname" class="form-group">
        
            <label for="id_examname" class=" requiredField">
                Exam Type<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <select name="pintype" class="select form-control" required id="pintype">
 
 <option value=""> Please select... </option>
                                                                            
    <?php echo $WAEC_OPT; ?>


</select>
                    
     </div>
         </div>
    
    <br>

          <div id="div_id_examq" class="form-group">
        
            <label for="id_examq" class=" requiredField">
                Quantity<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <select name="variation_code" class="select form-control" required id="variation_code">
 
  <option value="">Please select...</option> 
 <option value="waecdirect">1 piece of waec result checker</option>


</select>
                    
     </div>
         </div>
    <br>

      <div id="amountID" class="form-group">
        
            <label for="amountID" class=" requiredField">
                Amount <span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" readonly="readonly" name="amount" class="textinput textInput form-control" required id="amount" value="<?php echo $waec_price; ?>">
                </div>  
    </div>

    <br>


      <div id="mobileID" class="form-group">
        
            <label for="mobileID" class=" requiredField">
                Mobile No. <span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="number" name="phone" class="textinput textInput form-control" required id="phone" value="<?php echo $mobile; ?>">
                </div>  
    </div>

    <br>





    <button type="submit" id="proceed"  class="btn" name="change">  BUY SCRATCH CARD </span> </button>

<br>
<br>

  
</div>

<br>
<br>
<br>


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
  $("#proceed").click(function(){

    var pintype=$("#pintype").val();
    var variation_code=$("#variation_code").val();
    var phone=$("#phone").val();
    var amount=$("#amount").val();

    if (pintype=="" || variation_code=="" || phone=="" || amount==""){

      swal({
        title:"Warning !!!",
        text:"Pleas fill form correctly",
        icon:"error",
      })
      return false;
    }

    else {


       swal({
          title: "Are you sure?",
          text: "You are about to buy " + pintype + " Pin N"+amount,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

          if (willProccess){
          $.LoadingOverlay("show");

          $.ajax({
        type:"POST",
        url:"pay_waec.php",
        data:{
    pintype:pintype, variation_code:variation_code, phone:phone, amount:amount
      },

     success:function(dataResult){

      $.LoadingOverlay("hide");
      
      alert(dataResult);
        
         if (dataResult==200){

          $("#ExamLabel").hide();

          swal({
          title: "WAEC PIN",
          text: "Waec Pin Purchase Successful",
          icon: "success",
        })
        window.location.href="history";
         }

        else {

           $("#ExamLabel").hide();
           $("#ExamNote").show();
           $("#ExamNote").text(dataResult);
          swal({
          title: "WAEC PIN",
          text: dataResult+"",
          icon: "error",
        })
        }
        

}

      })

           }

        })

    }




  })
</script>



<?php require("footer.php"); ?>