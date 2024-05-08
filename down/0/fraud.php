<?php

    mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");
  mysqli_query($db, "INSERT INTO `fraud` (`id`,`location`, `reason`, `email`, `date`) VALUES (NULL, '".$cilu."', '".$reason."', '".$email."', '".$time."') ");
?>