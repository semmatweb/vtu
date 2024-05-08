<!-- Sidebar -->
			<div class="sidebar sidebar-style-2" data-background-color="dark">
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar avatar-online avatar-sm float-left mr-2">
								<img src="static/dashboard/assets/img/avatar.png" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<?php echo $username; ?>
										<span class="user-level" id="bal"></span>


                            <script>

                              $(document).ready(function sendRequest(){

                                $.ajax({

                                  url:"loadbalance.php",
                                  success:
                                  function(cc){
                                  
                                    $("#bal").html("&#8358;"+cc);
                                 
                                  setTimeout(function(){

                                    sendRequest();
                                  }, 1000);

                                  }
                                })
                              })

                           
                            </script>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-primary">
							
								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/home">
										<i class="fas fa-home"></i> <p>Dashboard</p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/buyData">
										<i class="fas fa-signal"></i> <p>Buy Data Bundle</p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/buyAirtime">
										<i class="fas fa-phone-square"></i>
										<p>Buy Airtime VTU</p>
									</a>
								</li>

									<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/Airtime2Cash">
										<i class="fas fa-money"></i>
										<p>Airtime 2 Cash</p>
									</a>
								</li>
							
								<li class="nav-item">
							
								<a data-toggle="collapse" href="#utilities">
									<i class="fas fa-lightbulb"></i>
									<p>Utilities Payment</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="utilities">
									<ul class="nav nav-collapse">
										<li>
											<a href="<?php echo $baseurl; ?>/billPayment"> <span class="sub-item">Electricity Payment</span> </a>
										</li>
										<li>
											<a href="<?php echo $baseurl; ?>/cableSub"> <span class="sub-item">Cable Subscription</span> </a>
										</li>
									</ul>
								</div>
							</li>

							
								<li class="nav-item">
							
								<a data-toggle="collapse" href="#fund">
									<i class="fas fa-credit-card"></i>
									<p>Select Fund Wallet</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="fund">
									<ul class="nav nav-collapse">
										

        	
										
										<li>
											<a href="<?php echo $baseurl; ?>/AutoFunding"> <span class="sub-item">Automated Bank Transfer (N50 charge)</span> </a>
										</li>
										
										<li>
											<a href="<?php echo $baseurl; ?>/Paystack"> <span class="sub-item">Fund with payment gateway (ATM)</span> </a>
										</li>
									
										
										<li>
											<a href="<?php echo $baseurl; ?>/BankDeposit"> <span class="sub-item">Fund with Bank Deposit</span> </a>
										</li>

									</ul>
								</div>
							</li>

						
							
								<li class="nav-item">
							
								<a href="<?php echo $baseurl; ?>/history">
									<i class="fas fa-book"></i>
									<p>My Transactions</p>
								</a>
							</li>

							
								<li class="nav-item">
							
								<a href="<?php echo $baseurl; ?>/change_password">
									<i class="fas fa-key"></i>
									<p>Change Password</p>
								</a>
							</li>

							
								<li class="nav-item">
							
								<a href="<?php echo $baseurl; ?>/profile">
									<i class="fas fa-cog"></i>
									<p>My Account</p>
								</a>
							</li>
							
								<li class="nav-item">
								<a href="<?php echo $baseurl; ?>/Docs">
								<p><span class="badge badge-danger">New</span> Developer API </p>
								</a>
							</li>


							<li class="nav-item">
								<a href="<?php echo $baseurl; ?>/logout">
									<i class="fas fa-sign-out-alt"></i>
									<p>Logout</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#">
									<i class="fas fa-logs"></i>
									<p>Version 7.0</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!-- End Sidebar -->
