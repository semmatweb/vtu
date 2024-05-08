

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

$error=$success="";

if (isset($_POST['withdraw'])){

    $amount_withdraw=mysqli_real_escape_string($db, $_POST['amount_withdraw']);

      $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
      $time=$dateTime->format("d-M-y  h:i A");
      $trx=rand(10000000, 900000000)."WB";
  

      if (empty($amount_withdraw)){


        $error='<div class="alert alert-danger">
              
              <strong> Oops! Please fill all form</strong>

               </div>';
      }

      else if ($amount_withdraw>$refbonus){

        $error='<div class="alert alert-danger">
              
                         <strong> Oops! Withdraw fail due to Insufficient Referral Bonus</strong>

                         </div>';
      }

  else if ($amount_withdraw<500){

    $error='<div class="alert alert-danger">
              
                         <strong> Oops! You can not withdraw below N500</strong>

                         </div>';
  }

  else {

            $new_bonus=$refbonus-$amount_withdraw;
            $new_bal=$mallu+$amount_withdraw;
           
            mysqli_query($db, "UPDATE users SET us_wallets='".$new_bal
                ."' WHERE emailR='".$email."'");
                
            $set_bonus=mysqli_query($db, "UPDATE users SET us_bonus='".$new_bonus
                ."' WHERE emailR='".$email."'");



            if ($set_bonus){

                $descr="Withdraw of ".$amount_withdraw." Refferal Bonus";
                mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username` ,`amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_withdraw."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$new_bal."')");

            $success='<div class="alert alert-success">
              
                         <strong> '.$descr.' was Successful</strong>

                         </div>';


            }

            else{

                $error='<div class="alert alert-danger alert-dismissible">
              
                         Unable to withdraw earning now.

                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                         </div>';


            }



  }


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
      <span id="" style="font-weight: bold;font-size: 30px;">WITHDRAW BONUS <span style="float: right;" id="img_loader"></span></span>
   </div>

    <div class="">

    <br>
    <div class="alert alert-default" id="PayNote" style="font-weight: bold;font-size: 13px;">

      Enjoy what you have worked for, withdraw your Bonus on <?php echo $sitetitle; ?> with N0 charges.
    	
    </div>
  

     <br>

<?php echo $error; ?>
<?php echo $success; ?>

<br>

 <div class="alert alert-default" id="PayNote" style="font-weight: bold;font-size: 19px;color: red;">

     Earning : <span id="bal3"></span>
      
    </div>

      <script>

                              $(document).ready(function sendRequest(){

                                $.ajax({

                                  url:"loadearning.php",
                                  success:
                                  function(cc){
                                  
                                    $("#bal3").html("&#8358;"+cc);
                                 
                                  setTimeout(function(){

                                    sendRequest();
                                  }, 1000);

                                  }
                                })
                              })

                           
                            </script>

 

   
   <form action="" method="POST" id="data-password">

      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
               Enter Amount To Withdraw<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="tel" name="amount_withdraw"  class="textinput textInput form-control" required id="amount_withdraw">
                </div>  
    </div>

    <br>

      




    <button type="submit"  class="btn" name="withdraw"  style="background-color:<?php echo $theme_color; ?>;color:#fff">  WITHDRAW NOW </span> </button>


</form>
<br>
<br>

<br>
<br>
<br>


    </div>
                
 

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






<?php require("footer.php"); ?>