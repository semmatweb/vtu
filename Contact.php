<?php
require("private/web_autoload.php");
?>

<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $sitename; ?> - Request A Quote</title>
		  <!--Favicons -->
  <link href="homepage/assets/img/mylogo2.png" rel="icon">
  <link href="homepage/assets/img/mylogo2.png" rel="apple-touch-icon">
        <!-- Custom CSS -->
        <link href="view/assets/css/styles.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
	
    <body>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
             <!-- Start Navigation -->
			<div class="header header-light dark-text">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="<?php echo $mainpage; ?>">
							<h3 style="text-transform: uppercase;color: <?php echo $theme_color; ?>;font-family: impact;"><?php echo $sitename; ?></h3>
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
								
									<li class="account-drop">
										<a href="<?php echo $mainpage; ?>/register" class="crs_yuo12" >
											<span class="embos_45"><i class="fas fa fa-user-plus"></i></span>
										</a>
									
									</li>

									<li>
										<a href="<?php echo $mainpage; ?>/login"  class="crs_yuo12">
											<span class="embos_45"><i class="fas fa-sign-in-alt"></i></span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper">
							<ul class="nav-menu">
								<li class="active"><a href="<?php echo $mainpage; ?>">Home</a></li>
								<li class=""><a href="#">Services<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
									                        						                         <li>
<a href="<?php echo $mainpage; ?>/login">Airtime Recharge</a>
</li>
<li class="nav-item">
<a href="<?php echo $mainpage; ?>/login">Data TopUp</a>
</li>
<li class="nav-item">
<a href="<?php echo $mainpage; ?>/login">Decoder Recharge</a>
</li>
<li class="nav-item">
<a href="<?php echo $mainpage; ?>/login">Electricity Bill</a>
</li>
<li class="nav-item">
<a href="<?php echo $mainpage; ?>/login">Exam Pins</a>
</li>
<li class="nav-item">
<a href="<?php echo $mainpage; ?>/login">Airtime To Cash</a>
</li>
									</ul>
									
								</li>
								
						
								<li class=""><a href="<?php echo $mainpage; ?>/About">About</a></li>
									<li class=""><a href="<?php echo $mainpage; ?>/Contact">Contact</a></li>
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								
								<li>
									<a href="<?php echo $mainpage; ?>/login" class="">
										<i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
									</a>
								</li>
								<li class="add-listing" style="background-color: <?php echo $theme_color; ?>">
									<a href="<?php echo $mainpage; ?>/register" class="text-white">Register</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->			
			

<section class="page-title gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Get In Touch</h1>
								<nav class="transparent">
									<ol class="breadcrumb p-0">
										<li class="breadcrumb-item"><a href="<?php echo $mainpage; ?>">Home</a></li>
										<li class="breadcrumb-item active theme-cl" aria-current="page">Contact Us</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="container">
					<div class="row align-items-start">
						<div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
							<div class="form-group">
								<h4>We'd love to here from you</h4>
								<span>Send a message and we'll responed as soos as possible </span>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" placeholder="Name">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label>Company</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<button class="btn theme-bg text-white btn-md" type="button">Send Message</button>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
							<div class="lmp_caption pl-lg-5">
								<ol class="list-unstyled p-0">
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
									  <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-home"></i></div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Reach Us</h4>
									  <p>
										<?php echo $address; ?>
									  </p>
									</div>
								  </li>
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
									  <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-at"></i></div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Drop A Mail</h4>
									  <p>
										<span style="text-transform: lowercase;">support@<?php echo $sitename; ?>.com</span>
									  </p>
									</div>
								  </li>
								   <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
									  <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-phone-alt"></i></div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Make a Call</h4>
									  <p>
									<?php echo $contact_no; ?>
									  </p>
									</div>
								  </li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call_action_wrap-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call_action_wrap">
								<div class="call_action_wrap-head">
									<h3>Do You Have Questions ?</h3>
									<span>We'll help you to grow your career and growth.</span>
								</div>
								<a href="tel:<?php echo $contact_no; ?>" class="btn btn-call_action_wrap">Contact Us Today</a>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->
			
	<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer style-2">
				<div class="footer-middle">
					<div class="container">
						<div class="row">
							
							<div class="col-lg-5 col-md-5">
								<div class="footer_widget">
							
									<h4 class="extream mb-3"><?php echo $sitename; ?></h4>
									<p><?php echo $sitename; ?> Enterprises is a private limited liability company registered under the Laws of the Federal Republic of Nigeria. We Are The Best
Recharge & Utility Bills Payment Platform</p>
								
								</div>
							</div>
							
							<div class="col-lg-6 col-md-7 ml-auto">
								<div class="row">
								
									<div class="col-lg-6 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Quick Links</h4>
											<ul class="footer-menu">
											<li><a href="<?php echo $mainpage; ?>">Home</a></li>
<li><a href="<?php echo $mainpage; ?>/About">About</a></li>
<li><a href="<?php echo $mainpage; ?>/Contact">Contact</a></li>
<li><a href="<?php echo $mainpage; ?>/register">Register</a></li>
<li><a href="<?php echo $mainpage; ?>/login">Login</a></li>
											</ul>
										</div>
									</div>
											
									<div class="col-lg-6 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Services</h4>
											
											<ul class="footer-menu">
											<li><a href="<?php echo $mainpage; ?>/login">Airtime Recharge</a></li>
<li><a href="#">Airtime To Cash</a></li>
<li><a href="<?php echo $mainpage; ?>/login">Data Recharge</a></li>
<li><a href="<?php echo $mainpage; ?>/login">Decoder Tv Subscription</a></li>
<li><a href="<?php echo $mainpage; ?>/login">Electricity Bill</a></li>
<li><a href="<?php echo $mainpage; ?>/login">Exam Pin Checker</a></li>
											</ul>
										</div>
									</div>
							
								
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-12 col-md-12 text-center">
								 <div class="copyright">
        &copy; Copyright <strong><span><?php echo $sitename; ?></span></strong>. All Rights Reserved
      </div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			
		
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="view/assets/js/jquery.min.js"></script>
		<script src="view/assets/js/popper.min.js"></script>
		<script src="view/assets/js/bootstrap.min.js"></script>
		<script src="view/assets/js/select2.min.js"></script>
		<script src="view/assets/js/slick.js"></script>
		<script src="view/assets/js/moment.min.js"></script>
		<script src="view/assets/js/daterangepicker.js"></script> 
		<script src="view/assets/js/summernote.min.js"></script>
		<script src="view/assets/js/metisMenu.min.js"></script>	
		<script src="view/assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->		

	</body>
</html>