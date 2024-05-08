 <?php require("header.php"); ?>

 <?php require("menu.php"); ?>

  <?php


if ($mode=="ON"){

echo '<script>Swal.fire({ text:"'.htmlspecialchars($popup_msg).'",position:"top",showConfirmButton:false});</script>';

}

  ?>



<?php
  


if ($monnify_mode == "ON" && $wema == "" && $fidelity == "" && $rolez == ""){

	require("monnify_reserved1.php");
	
						   }


?>


		<div class="main-panel ">
				
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<style>
      #process, #process2,#output{
        display: none;
    }


.swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}


.swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #4962B3;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>



<script>

	   

</script>



 <script>

 function greet() {

  var greeting;
  var time = new Date().getHours();
  if (time < 10) {
    greeting = "Good morning,";
  } else if (time < 20) {
    greeting = "Good day,";
  } else {
    greeting = "Good evening,";
  }
  document.getElementById("greet").innerHTML = greeting;
}


    </script>
<div class="container">



	<div class="panel-header py-3 bubble-shadow" style="background-color: #29021C">
		<div class="page-inner py-5"  style="background-color: #29021C">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row py-4"  style="background-color: #29021C">
				<div  style="background-color: #29021C">
					<h2 class="text-white pb-2 fw-bold">Welcome to <?php echo $sitetitle; ?></h2>
					<h5 class="text-white mb-2" style="font-size: 14px;">Refer people to <span style="text-transform: uppercase;"><?php echo $sitetitle; ?></span> and earn ₦500 immediately the person upgrade his/her account to Topuser
</h5>
					<p class="mb-0 text-white" style="font-size: 13px;"> <b>Referal Link:</b>
						<span class="data-toggle=" id="mytext">https://<span style="text-transform: lowercase;"><?php echo $sitetitle; ?></span>.com/0/register?referral=<?php echo $refcode; ?></span>
						<span class="badge badge-dark" onclick="CopyToClipboard('mytext');"  style="cursor: pointer;">copy</span> <span id="linked"></span>

					</p>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
					<button type="button" class="btn btn-warning btn-round mr-2" data-toggle="modal" data-target="#fundWalletModal">
						Fund Wallet
					</button>

					<a href="<?php echo $baseurl; ?>/history">
					<button type="button" class="btn btn-info btn-round mr-2">
						My Transactions
					</button>
				</a>
					

				</div>
			</div>
		</div>
	</div>


	<div class="page-inner mt--5">


		<div class="row mt--2">
			<div class="col-md-12">

				<div class="card full-height">
					<div class="card-body">
						<div class="card-title"><span id="greet"></span> <b><?php echo $first_name; ?></b></div> <hr>

						<?php

						if ($ceov=="enduser"){

							$package_code="EARNER <i class='far fa-frown'></i>";
						}

						else{

							$package_code="TOPUSER <i class='far fa-grin'></i>";
						}

						?>
						 <section id="Axx"><p class="text-center " style='font-size:20px;'><b> Account Type : <?php echo $package_code; ?> <b></p></section>
						 
						  
 


<div class="container">

    <div class="collapse multi-collapse" id="multiCollapseExample2">
            <div class="card card-body">
     <p>When you become TOP USER, you can buy all Data Bundle at low prices and enjoy our unlimited offers</p>
<br>
<p>MTN VTU <?php echo $m_discount; ?>% discount off.</p>
<p>Glo VTU at <?php echo $g_discount; ?>% discount off.</p>
<p>Airtel VTU <?php echo $a_discount; ?>% discount off.</p>
<p>9mobile VTU <?php echo $mo_discount; ?>% discount.</p>


<p><br></p>
<p>Note: This is one time payment no any subsequent payment involved</p></div>
    </div>
  </div>

</div>



 

    <p style="margin:10px; background-image:linear-gradient(45deg,#29021C,#465abdd9);background-color:#ff0000;border-radius:10px;color:white;padding:7px;font-size:14px;"><span style="color:orange"><b>**NEW**</b></span>&nbsp; Own a <?php echo $sitetitle; ?> retailer website and retail all our services; Such as DATA, AIRTIME and BILLS Payment. <a class="w3-btn  w3-border w3-round-large" href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>&text=Hello" style="background-color:white;color:blue;">Click Here</a></p>




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


							

								

<marquee style="background-color: white; color:#d1026d; padding: 10px; font-size: 25px;;"><?php echo $scroll_msg; ?> </marquee>



						<div class="row">
						
					

					 		


					</div>

					</div>


				</div>
			</div>
		</div>

			
							<div class="container">
		<div class="row mb-3 mt-3">
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="fas fa-wallet"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Wallet Balance</p>
									<h4 class="card-title" id="Mbal">
										
										  <script>

                              $(document).ready(function sendRequest(){

                                $.ajax({

                                  url:"loadbalance.php",
                                  success:
                                  function(cc){
                                  
                                    $("#Mbal").html("&#8358;"+cc);
                                 
                                  setTimeout(function(){

                                    sendRequest();
                                  }, 1000);

                                  }
                                })
                              })

                           
                            </script>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small">
									<i class="flaticon-coins"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Referral Bonus</p>
									<h4 class="card-title">&#8358; <?php echo number_format($refbonus,2); ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="icon-people"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"> My Total Referral </p>
									<h4 class="card-title"><?php echo $report; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>


		<div class="row">
			<div class="col-md-4">
				<div class="card card-dark" style="background-color: #29021C">
					<div class="card-body bubble-shadow">
						<h3>Notifications</h3>
						<h5 class="op-9">Updates! Updates !! Update !!!</h5>
						<br>
						
						<a href="#" class="btn btn-secondary text-white">
								<i class="fas fa-hand-peace-o"></i> <?php echo $message2; ?>
							</a>

					 
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-dark"  style="background-color: #29021C">
					<div class="card-body bubble-shadow">
						<h3>FAQs:</h3>
						<h5 class="op-9">Please go through them to have a better knowledge of this platform</h5>
							<a href="#" class="btn btn-secondary text-white">
								<i class="fas fa-question"></i> Frequently Asked Question's
							</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-dark"  style="background-color: #29021C">
					<div class="card-body bubble-shadow">
						<h3>Amazing Offer:</h3>
						<h5 class="op-9">
							
							<?php

							if ($ceov=="enduser"){

								echo "Our system detect you are running a starter account, Upgrade now and become a Pro !!!";
							}

							else if ($ceov=="reseller" && $activate==0){

								echo "When you pay your activation fee, your group link will be available for you !!!";
							}

							else {

								echo "For more updates join our ".$package_code." group for news and Awoof Yakata."; 
							}


							?>
						</h5>

							<?php

							if ($ceov=="reseller" && $activate==1){

								echo '<a href="https://chat.whatsapp.com/F2Gx1s2" class="btn btn-success"> <i class="fab fa-whatsapp"></i> Join Our TOPUSER Group</a>';
							}

							else {

								echo '<a href="#Axx" class="btn btn-danger"> <i class="fa fa-level-up"></i> Become A Top User or Agent</a>';
							}

							?>
						  <br>

					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/buyAirtime">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/airtime.svg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Airtime TopUp</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/buyData">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/data.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Buy Data</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/Airtime2Cash">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/airtime2cash.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Airtime to cash</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/billPayment">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/utility.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Electricity Bills</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/cableSub">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/cable.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Cable Subscription</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/Bonus2Wallet">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 10px;">
								<img src="static/dashboard/assets/img/fundacc.JPG" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Bonus to wallet</div>
						</div>
					</div>
				</a>
			</div>
			<!--<div class="col-6 col-sm-4 col-lg-3">
				<a href="#">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/transfer.svg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Transfer to other user</div>
						</div>
					</div>
				</a>
			</div>-->
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="#">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/sms.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Bulk SMS</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/WaecPin">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/resultchecker.png" height="83px" width="97px">
							</span>
							<div class="h4 m-2 text-dark">Result Checker</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/profile">
					<div class="card">
					<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/profile.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">My Account</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/ReferralDownline">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/referral.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">My Referrals</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

		<div class="row">

			
		</div>
	</div>
</div>



<!-- Modal STARTS HERER-->
<div class="modal fade" id="fundWalletModal" tabindex="-1" role="dialog" aria-labelledby="fundWalletModalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title fw-bold" id="fundWalletModalTitle">Fund Wallet</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				<div class="row mb-3 mt-3">
				    	
				
			<div class="col-sm-6 col-md-6 col-6">
			<a href="<?php echo $baseurl; ?>/AutoFunding">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small">
									<i class="fas fa-bank"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Automated Bank Funding (N50 charge)</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			
				
			<div class="col-sm-6 col-md-6 col-6">
			<a href="<?php echo $baseurl; ?>/Paysatck">	<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="fas fa-credit-card"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"> ATM Funding (Paystack) </p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			



			<div class="col-sm-6 col-md-6 col-6">
			<a href="<?php echo $baseurl; ?>/BankDeposit">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="fas fa-qrcode"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Bank Depost/ Transfer</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>

			 
				<div class="col-sm-6 col-md-6 col-6">
			<a href="#">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-qrcode"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Airtime to Cash/ Funding</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			

		</div>

							</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
				</div>
		</div>
	</div>
</div>




<script>

        function CopyToClipboard(containerid) {
      if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");

      } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges(); // clear current selection
        window.getSelection().addRange(range); // to select text
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
        //alert("text copied")
        document.getElementById("linked").innerHTML="COPIED";
      }
    }


            </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    
</div>



		</div>
	</div>


<?php require("footer.php"); ?>