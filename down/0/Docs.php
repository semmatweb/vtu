

 <?php require("header.php"); ?>

  <?php require("menu.php"); ?>


  <?php

if (isset($_POST['gen_token'])){
    
     $api=$email.$username.$mobile;
     $apiTo=md5($api);
     $apiToken="api_".$apiTo;
     
     $save=mysqli_query($db, "UPDATE users SET token='".$apiToken."' WHERE emailR='".$email."'");
     
     if ($save){
         ?>
         
          <script type="text/javascript">alert("Token Generated Successful");window.location.herf="home";</script>
         <?php
     }
     
     else{
         
         ?>
         
          <script type="text/javascript">alert("Error Generating Token");window.location.herf="home";</script>
         <?php
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
      <span id="" style="font-weight: bold;font-size: 30px;">DEVELOPER API<span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">
  
<br>

    <input type="hidden" name="csrftoken" id="csrftoken" value="<?php echo $_SESSION['csrftoken']; ?>" required="required">

    
    <br>
    <br>
    <div class="alert alert-default" id="DocNote" style="font-weight: bold;font-size: 13px;">

      Your API Token : <br/><br/> <span style="color:red;font-weight:bold;"><?php echo $token; ?></span>
      
      <br/>
      <br/>
      <hr/>
      <br/>
      
      <p>You can now use the above API TOKEN to integrate our API aand after completing your integration, kindly reach us to profile your account as API AGENT to make it work perfectly</p>
      <br/>
      
    </div>
    
    <?php
    
    if ($token==""){
        
        echo '<form action="" method="POST"><button class="btn btn-success btn-block" type="submit" name="gen_token">Generate New Token</button></form>';
    }
    
    else{
        
        
    }
    
    
    ?>

<br>

<div class="alert alert-danger" id="DocLabel" style="display: none;text-transform: uppercase;font-weight: bold;"></div>

<div id="DocLabel">





<a href="<?php echo $mainpage; ?>/doc" target="_blank">
    
    <button class="btn btn-danger btn-block">CHECK OUR API PRICING & DOC.</button>
</a>


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



<?php require("footer.php"); ?>