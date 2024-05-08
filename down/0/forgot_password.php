<?php
require("../config.php");

?>
<!doctype html>
<html lang="en">
  <head>
  	<title><?php echo $sitetitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="frt/css/style.css">

	</head>
	<body style="background-color: #fff">

<?php

 $error=$success="";

if (isset($_POST['reset'])){

    $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));

    $seluser=mysqli_query($db, "SELECT email,sid,emailR,firstname FROM users WHERE emailR='".$email."'");
    if ($count1=mysqli_num_rows($seluser)<1){

        $error='<div class="alert alert-danger">
                       This email is not registered with us
                        </div>';
    }

else{

$new_stringhash=md5(uniqid().mt_rand());
    $new_password=strtoupper(uniqid());
    $new_password_string=md5($new_password);

 	mysqli_query($db, "UPDATE users SET password='$new_password_string', sid='$new_stringhash' WHERE emailR='$email'");

    $subject = "Request For Password Recovery Link";
	$body ='<p>Hello!</p>';
	$body .='<p>Your request for password reset was successful and the below code is your new password'.'<br/></p>';
    $body .='<p><b>'.$new_password.'</b></p>';
    $body .='<p>If the password reset was not initiated by you, kindly reach us immediately on '.$contact_number.'</p>';
     $body .='<p>Thanks for choosing '.$sitetitle.'</p>';

     $email_to =$email;
     $email_from =$mail_user; // Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $send_link=mail($email_to, $subject, $body, $headers);

    if ($send_link){

    $success='<div class="alert alert-success">Password Reset Has Been Successfully Sent !!!</div>';
    	exit();
    }
    else{

    $error='<div class="alert alert-danger">Error sending password reset link. !!!</div>';
 	exit();

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
				<?php echo $success; ?>
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h5 class="mb-4">Lost Password</h5>
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
			      			<label class="label" for="name">Email Address</label>
			      			<input type="email" name="email" class="form-control" placeholder="Email Address" required>
			      		</div>

		            <div class="form-group">
		            	<button type="submit" name="reset" class="form-control btn btn rounded submit px-3" style="background-color:<?php echo $theme_color; ?>;color:#fff">Reset</button>
		            </div>
		            <div class="form-group d-md-flex">
		     
					<div class="w-50 text-md-left">
						<a href="<?php echo $baseurl; ?>/login"  style="color:<?php echo $theme_color; ?>">Login Back</a>
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

