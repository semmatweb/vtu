<?php
require("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sitetitle; ?> - Administrator</title>

     <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $sitetitle; ?>-  Administrator">
    <meta property="og:image" content="../static/img/bg.jpg">
    <meta property="og:description" content=" Administrator"/>
    <meta property="og:site_name" content="<?php echo $sitetitle; ?>"/>
    <meta property="og:url" content="https://www.<?php echo $sitetitle; ?>.com">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/png" href="templates/img/team-1.jpg">

    <!-- Font Icon -->
    <link rel="stylesheet" href="templates/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Main css -->
    <link rel="stylesheet" href="templates/css/style.css">


</head>
<body style="background-color: <?php echo $theme_color; ?>;color: #fff">

    <?php

    $error="";
    if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $userid=trim(mysqli_real_escape_string($db, $_POST['userid']));
    $password=trim(mysqli_real_escape_string($db, md5($_POST['password'])));

    $check_admin=mysqli_query($db, "SELECT * FROM admin WHERE username='$userid' AND password='$password'");
    if (mysqli_num_rows($check_admin)>0){

      
      while($rxdata=mysqli_fetch_array($check_admin, MYSQLI_ASSOC)){

        session_start();
        $_SESSION['username']=$rxdata['username'];
        $_SESSION['sid']=$rxdata['sid'];
        $_SESSION['passkey']=$rxdata['password'];
        $_SESSION['LAST_ACTIVITY']=$_SERVER['REQUEST_TIME'];
        header("location:dashboard.php");
      }
    }

    else{

   $error='<div class="alert alert-danger">Invalid Username or Password</div>';

    }

}
    ?>

    <center>

               <div class="main" style="width: 500px;">
    
                   
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" onsubmit="return Traficate()" class="register-form" id="register-form">

                
                           <center>
             <h2 style="color: #fff">ADMIN-<?php echo $sitetitle; ?></h2>
         
            </center>

                <h4>Welcome Admin</h4>

        
                    <?php echo $error; ?>
               
                    
                        <div class="form-group">
                            <input type="text" name="userid" id="userid" required placeholder="User ID" autocomplete="off"/>
                        </div>

                       <div class="form-group">

                            <input type="password" name="password" id="password" required placeholder="Password" autocomplete="off"/>

                        </div>

                        <div class="form-submit">
                            <button class="submit" type="submit" id="submit" style="background-color: red;">Sign In</button>
                        </div>

                        <div class="form-group">
                        <p></p>
            
                    </div>
                    </form>
                    
                    <p></p>
                </div>
        
</center>

    <!-- JS -->
    <script src="templates/vendor/jquery/jquery.min.js"></script>
    <script src="templates/js/main.js"></script>

     <script>
      function Traficate(){
        $("#submit").html("Authenticating...");
        return true;
    }
    
</script>

</body>
</html>