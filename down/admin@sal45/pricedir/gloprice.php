<?php

$getglo=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM gloprice WHERE id='1'"));

$glo1gb=$getglo['glo1gb'];
$glo2gb=$getglo['glo2gb'];
$glo4gb=$getglo['glo4gb'];
$glo5gb=$getglo['glo5gb'];
$glo7gb=$getglo['glo7gb'];
$glo10gb=$getglo['glo10gb'];
$glo13gb=$getglo['glo13gb'];
$glo18gb=$getglo['glo18gb'];
$glo29gb=$getglo['glo29gb'];
$glo50gb=$getglo['glo50gb'];
$glo93gb=$getglo['glo93gb'];


?>