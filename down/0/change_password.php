

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


    <?php

$error=$success="";

if (isset($_POST['change'])){

    $password=mysqli_real_escape_string($db, $_POST['password']);
    $cpassword=mysqli_real_escape_string($db, $_POST['cpassword']);
    $oldpassword=mysqli_real_escape_string($db, md5($_POST['oldpassword']));


    if (strlen($password)<5){

        $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b></strong> Please use a strong password

                         </div>';
    }

    else {

        if ($password != $cpassword){

            $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b></strong> Password not match

                         </div>';
        }
   

    else {

        $ch_oldpass=mysqli_query($db, "SELECT password FROM users WHERE password='".$oldpassword."' AND emailR='".$email."'");

        if (mysqli_num_rows($ch_oldpass)<1){

            $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b></strong> Old password incorrect

                         </div>';
        }

        else {

            $mdpass=md5($password);
            $save=mysqli_query($db, "UPDATE users SET password='".$mdpass."' WHERE emailR='".$email."'");

            if ($save){

               $success='<div class="alert alert-success">
              
                         <strong> Password Change Successfully !!!</strong>

                         </div>';
            }

            else {

                $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b></strong> Unable to change password.

                         </div>';
            }
        }
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
      <span id="" style="font-weight: bold;font-size: 30px;">CHANGE PASSWORD <span style="float: right;" id="img_loader"></span></span>
   </div>

    <div class="">

    <br>
    <div class="alert alert-default" id="PayNote" style="font-weight: bold;font-size: 13px;">

      Dear <?php echo $first_name; ?>! For security purpose, we advice to change password regularly and keep away from friends and families. Your Data's means alot to us at <?php echo $sitetitle; ?>.
    	
    </div>
  

<br>

<?php echo $error; ?>
<?php echo $success; ?>

   
   <form action="" method="POST" id="data-password">


      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
               Old Password<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="password" name="oldpassword" class="textinput textInput form-control"  required id="oldpassword">
                </div>  
    </div>

    <br>

      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
               New Password<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="password" name="password"  class="textinput textInput form-control" required id="password">
                </div>  
    </div>

    <br>

      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
                Confirm Password<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="password" name="cpassword" class="textinput textInput form-control" required id="cpassword">
                </div>  
    </div>

    <br>





    <button type="submit"  class="btn" name="change" style="background-color:<?php echo $theme_color; ?>;color:#fff">  CHANGE PASSWORD </span> </button>


</form>
<br>
<br>

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






<?php require("footer.php"); ?>