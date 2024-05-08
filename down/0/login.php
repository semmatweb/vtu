<?php
require("../config.php");


if (isset($_REQUEST['true'])){

$txt=$_REQUEST['true'];

}

else{

    $txt="Welcome Back !!!";
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title><?php echo $sitetitle; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="frt/css/style.css">

	</head>
	<body style="background-color: #fff">


<?php

    $error="";
    if (isset($_POST['submit'])){

        $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));
        $password=trim(mysqli_real_escape_string($db, $_POST['password']));

        $mdpass=md5($password);

        if (empty($email) || empty($password)){

        $error='<div class="alert alert-danger"> Please fill all field and proceed</div>';
        }

        else{
            $ch_e=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."'");
            if (mysqli_num_rows($ch_e)<1){

            $error='<div class="alert alert-danger">This email is not associated with '.$sitetitle.'</div>';
            }

        else{
            $ch_bk=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND block='1'");
            if (mysqli_num_rows($ch_bk)>0){

               $error='<div class="alert alert-danger">This account has been suspended</div>';
            }

            else{

            $ch_at=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND reg_active='1'");

            if (mysqli_num_rows($ch_at)<1){

             $error='<div class="alert alert-danger"> Please check your email and verify your account</div>';
            }

            else{

                $ch_up=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND password='".$mdpass."'");

                if (mysqli_num_rows($ch_up)<1){

                $error='<div class="alert alert-danger">Invalid Username or Password</div>';
                    
                }
else{
                    

                    while($rows=mysqli_fetch_array($ch_up, MYSQLI_ASSOC)){

                        
                        $email=$rows['emailR'];
                        $password=$rows['password'];
                        $sid=$rows['sid'];

                    session_start();

                        $_SESSION['email']=$email;
                        $_SESSION['password']=$password;
                        $_SESSION['sid']=$sid;

                        header("location:home");
                    
}
                    }
                
            }

            }
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
			      			<h5 class="mb-4">Sign In</h5>
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
			      			<input type="email" class="form-control" name="email" placeholder="Email Address" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit" class="form-control btn btn rounded submit px-3" style="background-color:<?php echo $theme_color; ?>;color:#fff">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		     
					<div class="w-50 text-md-left">
										<a href="<?php echo $baseurl; ?>/forgot_password"  style="color:<?php echo $theme_color; ?>">Forgot Password</a>
					</div>
		            </div>
		          </form>
		          <p class="text-left">Not a member? <a href="<?php echo $baseurl; ?>/register"  style="color:<?php echo $theme_color; ?>">Sign Up</a></p>
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

