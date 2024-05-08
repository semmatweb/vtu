
<?php 
require("../config.php");

if (isset($_REQUEST['referral'])){

$refby=$_REQUEST['referral'];

}

else{

    $refby="admin";
}

    ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Register - <?php echo $sitetitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="frt/css/style.css">

	</head>
	<body style="background-color: #fff">


    <?php

     $error="";

     if (isset($_POST['register'])){

     $mallu=0;
     $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
     $lastlogin=$dateTime->format("d-M-y  H:i A"); 
     $sid=md5(rand(1000, 300000));
     $refcode=strtolower(uniqid()).rand(100,900);

     $firstname=trim(mysqli_real_escape_string($db, $_POST['firstname']));
     $lastname=trim(mysqli_real_escape_string($db, $_POST['lastname']));
     $username=trim(strtoupper(mysqli_real_escape_string($db, $_POST['username'])));
     $mobile=trim(mysqli_real_escape_string($db, $_POST['mobile']));
     $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));
     $refby=trim(mysqli_real_escape_string($db, $_POST['refby']));
     $password=trim(mysqli_real_escape_string($db, $_POST['password']));

    $ch_u=mysqli_query($db, "SELECT email FROM users WHERE email='".$username."'");
    $ch_e=mysqli_query($db, "SELECT emailR FROM users WHERE emailR='".$email."'");
    $ch_r=mysqli_query($db, "SELECT refcode FROM users WHERE refcode='".$refby."'");


     if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($mobile) || empty($refby) || empty($password)){

    $error='<div class="alert alert-danger">  Please fill all form </div>';

      }

     else if (strlen($firstname)<3 || strlen($lastname)<3){

     $error='<div class="alert alert-danger">  Please use valid name </div>';

      }

     else if (strlen($mobile)<11 || strlen($mobile)>11){

     $error='<div class="alert alert-danger">  Please use valid mobile no. </div>';

      }

     else if (mysqli_num_rows($ch_u)>0){

     $error='<div class="alert alert-danger">
                          Username Already Taken
                 </div>';
      }

      else if (mysqli_num_rows($ch_e)>0){

    $error='<div class="alert alert-danger">
                          Email Already Taken
                 </div>';
    }

    else if (mysqli_num_rows($ch_r)<1){
    $error='<div class="alert alert-danger">
                          Invalid Referral Code
                 </div>';
    }

      else if (strlen($password)<5){
    $error='<div class="alert alert-danger">
                        Use strong password ex.(Folk$390)
                 </div>';
    }


    else{


      $mdpass=md5($password);
        

     $insave=mysqli_query($db, "INSERT INTO `users` (`ID`, `firstname`, `lastname`, `refcode`, `referredby`, `mobile`, `email`, `password`, `us_wallets`, `us_bonus`, `block`, `sid`,`report`, `ceov`, `activate`, `LastLogin`, `reg_active`, `emailR`,`bankname`,`wema`,`sterling`, `rolez`, `fidelity`, `acctname`,`ref`, `gen_bank`, `token`) VALUES (NULL, '".$firstname."', '".$lastname."', '".$refcode."', '".$refby."', '".$mobile."', '".$username."', '".$mdpass."', '0', '0', '0', '".$sid."', '0', 'reseller', '1', '".$lastlogin."', '0', '".$email."', '', '', '', '', '','', '', '0', '')");

      if ($insave){
          
    mysqli_query($db, "UPDATE users SET report=report+1 WHERE refcode='".$refby."'");

    $error='<div class="alert alert-success">
                  Thank you for sigining up on '.$sitetitle.', We have sent you an email regarding your account status. Check your inbox me or spam box.
                 </div>';

    $subject = "Welcome To ".$sitetitle;
    $body ='<p>Hello! '.$firstname.'</p>';
    $body .='<p>Ready to take your business to the next level ?<br/> You can unlock special perks by just purchasing Data Bundles, AirtimeVTU, Cable Subscription, Billspayment e.t.c. on '.$sitetitle.' <br/><b>To have you fully on our platform, click the link below to activate your account</b><br/><br/>'.$baseurl.'/ValidateReg?email='.$email.'&token='.$sid.'<br/><br/>You Are Welcome,<br/>Your Customer Support at '.$sitetitle.'.</p>';

     $email_to =$email;
     $email_from ="noreply@salabeb.com"; // Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $subject, $body, $headers);
      }

      else{

         $error='<div class="alert alert-danger">
                        Unable To Create Account. Try Again
                 </div>';
      }

   


        
    }



    
     }

    ?>
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
				<center><img src="frt/images/logo.png" height="100px"></center>

				<?php echo $error; ?>
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h5 class="mb-4">Get Started</h5>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="" class="signin-form" method="POST">


					    <div class="form-group mb-3">
			      			<label class="label" for="name">First Name</label>
			      			<input type="text" class="form-control" name="firstname" placeholder="First Name" required>
			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Last Name</label>
			      			<input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Mobile No.</label>
			      			<input type="tel" class="form-control" name="mobile" placeholder="Mobile No" required>
			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" name="username" placeholder="Username" required>
			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email Address</label>
			      			<input type="email" class="form-control" name="email" placeholder="Email Address" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		               <input type="hidden" name="refby"  required="required" class="form-control" maxlength="50" autocomplete="off" id="refby" readonly="" value="<?php echo $refby; ?>">

		              <input type="password" class="form-control" name="password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="register" class="form-control btn btn rounded submit px-3" style="background-color:<?php echo $theme_color; ?>;color:#fff">Create Account</button>
		            </div>
		            <div class="form-group d-md-flex">
		     
					<div class="w-50 text-md-left">
					<a href="<?php echo $baseurl; ?>/login"  style="color:<?php echo $theme_color; ?>">Already a member ? Login</a>
					</div>
		            </div>
		          </form>
		         
		        </div>
		      </div>
				</div>
			</div>
		
	</section>

	<script src="frt/js/jquery.min.js"></script>
  <script src="frt/js/popper.js"></script>
  <script src="frt/js/bootstrap.min.js"></script>
  <script src="frt/js/main.js"></script>

	</body>
</html>

