<?php
if (isset($_GET['email']) &&  $_GET['email'] !=""){
    
    require("session.php");
    
    $email=$_GET['email'];
    
    $check=mysqli_query($db, "SELECT emailR FROM users WHERE emailR='".$email."'");
    
    if (mysqli_num_rows($check)<1){
        
        ?>
        
        
    <script>
        alert("NO EMAIL FOUND IN DATABASE");
        window.location.href="view_blockuser.php";
    </script>
        
        <?php
    }
    
    else{
        
    $activate=mysqli_query($db, "UPDATE users SET block='0' WHERE emailR='".$email."'");
    
    if ($activate===TRUE){
        
          ?>
        
        
    <script>
        alert("ACCOUNT UNBLOCK SUCCESSFULLY");
        window.location.href="view_blockuser.php";
    </script>
        
        <?php
    }
    
    else{
      ?>
        
        
    <script>
        alert("UNABLE TO UNBLOCK USERS");
        window.location.href="view_blockuser.php";
    </script>
        
        <?php
    }
    }
}

else{
    
     ?>
        
        
    <script>
        alert("NO PARAMETERS GIVEN");
        window.location.href="view_blockuser.php";
    </script>
        
        <?php
    }

?>