

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


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
      <span id="" style="font-weight: bold;font-size: 30px;">AUTO PAYMENT <span style="float: right;" id="img_loader"></span></span>
   </div>

    <div class="">

    <br>
    <div class="alert alert-danger" id="AutoNote" style="font-weight: bold;font-size: 10px;">

      It is our pleasure to introduce this new payment system to you. For your convinience wallet funding, here is Automated Payment System for you. 
    	
    </div>
  




<?php

if ($wema==""){


}

else{

	echo '<div class="mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Wema bank</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Fidelity bank</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="monie-tab" data-toggle="tab" href="#monie" role="tab" aria-controls="monie" aria-selected="false">Moniepoint Microfinance Bank</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="wema-tab" data-toggle="tab" href="#wema" role="tab" aria-controls="wema" aria-selected="false">Sterling bank</a>
                </li>
                
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="card card-dark bg-secondary-gradient">
                <div class="card-body skew-shadow"> 
                
                
                
                <h2 class="py-4 mb-0">'.$wema.'</h2>
                <div class="row">
                <div class="col-8 pr-0">
                <h3 class="fw-bold mb-1">'.$acctname.'-'.$sitetitle.'</h3>
                <h3 class="fw-bold mb-1">Wema bank</h3>
                <br>
                
                  
                      <div class="text-small text-uppercase fw-bold op-8">Automated Bank Transfer</div>
                      <p class="text-small ">Make transfer to this account to fund your wallet </p>
                    </div>
                    <div class="col-4 pl-0 text-right">
                      <h3 class="fw-bold mb-1">N50</h3>
                      <div class="text-small text-uppercase fw-bold op-8">Charge</div>
                    </div>
                  </div>
                </div></div></div>


        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card card-dark bg-secondary-gradient">
                <div class="card-body skew-shadow">
                  
                 
                  
                  <h2 class="py-4 mb-0">'.$fidelity.'</h2>
                  <div class="row">
                  <div class="col-8 pr-0">
                  <h3 class="fw-bold mb-1">'.$acctname.'-'.$sitetitle.'</h3>
                  <h3 class="fw-bold mb-1">Fidelity bank</h3>
                  <br>
                  
                      <div class="text-small text-uppercase fw-bold op-8">Automated Bank Transfer</div>
                      <p class="text-small ">Make transfer to this account to fund your wallet </p>
                    </div>
                    <div class="col-4 pl-0 text-right">
                      <h3 class="fw-bold mb-1">N50</h3>
                      <div class="text-small text-uppercase fw-bold op-8">Charge</div>
                    </div>
                  </div>
                </div></div></div>
                
                <div class="tab-pane fade" id="monie" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card card-dark bg-secondary-gradient">
                <div class="card-body skew-shadow">
               
                
                <h2 class="py-4 mb-0">'.$rolez.'</h2>
                <div class="row">
                <div class="col-8 pr-0">
                <h3 class="fw-bold mb-1">'.$acctname.'-'.$sitetitle.'</h3>
                <h3 class="fw-bold mb-1">Moniepoint Microfinance Bank</h3>
                <br>
                <div class="text-small text-uppercase fw-bold op-8">Automated Bank Transfer</div>
                <p class="text-small ">Make transfer to this account to fund your wallet </p>
                </div>
                <div class="col-4 pl-0 text-right">
                <h3 class="fw-bold mb-1">N50</h3>
                <div class="text-small text-uppercase fw-bold op-8">Charge</div>
                </div>
                </div>
                </div></div></div>
                
                
                <div class="tab-pane fade" id="wema" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card card-dark bg-secondary-gradient">
                <div class="card-body skew-shadow">
                
                <h2 class="py-4 mb-0">'.$sterling.'</h2>
                <div class="row">
                <div class="col-8 pr-0">
                <h3 class="fw-bold mb-1">'.$acctname.'-'.$sitetitle.'</h3>
                <h3 class="fw-bold mb-1">Sterling bank</h3>
                <br>
                <div class="text-small text-uppercase fw-bold op-8">Automated Bank Transfer</div>
                <p class="text-small ">Make transfer to this account to fund your wallet </p>
                </div>
                <div class="col-4 pl-0 text-right">
                <h3 class="fw-bold mb-1">N50</h3>
                <div class="text-small text-uppercase fw-bold op-8">Charge</div>
                </div>
                </div>
                </div></div></div>
                

                </div>';
}

?>




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