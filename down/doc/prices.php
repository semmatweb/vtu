<?php

require("../config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pricing</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>


<div class="alert" style="margin: 15px;">

<center>
	<br>
	<br>

	<div><h4 style="color: red;">OUR API PRICES AND PLAN-ID</h4></div>


	<br>


<!--- FOR MTN PRICING PLAN-->
<section id="dataprice">
  <?php include("pricing/mtnprice.php"); ?>
  <h3 style="font-weight: bold;"> MTN DATA BUNDLE (id: mtn)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $mtn500mb; ?></td>
        <td>500MB</td>
        <td>500</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $mtn1gb; ?></td>
        <td>1GB</td>
        <td>1000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn2gb); ?></td>
        <td>2GB</td>
        <td>2000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn3gb); ?></td>
        <td>3GB</td>
        <td>3000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn5gb); ?></td>
        <td>5GB</td>
        <td>5000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn10gb); ?></td>
        <td>10GB</td>
        <td>10000</td>
        </tr>
    </table>
</div>
</section>



<!--- FOR MTN GIFTING PLAN-->
<section id="dataprice">
  <?php include("pricing/giftingprice.php"); ?>
  <h3 style="font-weight: bold;"> MTN GIFTING BUNDLE (id: gifting)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $cmtn500mb; ?></td>
        <td>500MB</td>
        <td>500</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $cmtn1gb; ?></td>
        <td>1GB</td>
        <td>1000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($cmtn2gb); ?></td>
        <td>2GB</td>
        <td>2000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($cmtn3gb); ?></td>
        <td>3GB</td>
        <td>3000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($cmtn5gb); ?></td>
        <td>5GB</td>
        <td>5000</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($cmtn10gb); ?></td>
        <td>10GB</td>
        <td>10000</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($cmtn15gb); ?></td>
        <td>15GB</td>
        <td>15000</td>
        </tr>
    </table>
</div>
</section>

<!--- FOR GLO PRICING PLAN-->


  <?php include("pricing/gloprice.php"); ?>
  <h3 style="font-weight: bold;"> GLO DATA BUNDLE (id: glo)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $glo1gb; ?></td>
        <td>1.05GB</td>
        <td>301</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $glo2gb; ?></td>
        <td>2.5GB</td>
        <td>302</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo4gb); ?></td>
        <td>4.5GB</td>
        <td>303</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo7gb); ?></td>
        <td>7.7GB</td>
        <td>304</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo10gb); ?></td>
        <td>10GB</td>
        <td>305</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo13gb); ?></td>
        <td>13.25GB</td>
        <td>306</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo18gb); ?></td>
        <td>18.25GB</td>
        <td>307</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo29gb); ?></td>
        <td>29GB</td>
        <td>308</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($glo50gb); ?></td>
        <td>50GB</td>
        <td>309</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo5gb); ?></td>
        <td>5.8GB</td>
        <td>310</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($glo93gb); ?></td>
        <td>93GB</td>
        <td>311</td>
        </tr>
    </table>
</div>


<!--- FOR AIRTEL PRICING PLAN-->


  <?php include("pricing/airtelprice.php"); ?>
  <h3 style="font-weight: bold;">AIRTEL DATA BUNDLE (id: airtel)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $air750mb; ?></td>
        <td>750MB</td>
        <td>501</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $air1gb; ?></td>
        <td>1.5GB</td>
        <td>502</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air2gb); ?></td>
        <td>2GB</td>
        <td>503</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air3gb); ?></td>
        <td>3GB</td>
        <td>504</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air4gb); ?></td>
        <td>4.5GB</td>
        <td>505</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air6gb); ?></td>
        <td>6GB</td>
        <td>506</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air8gb); ?></td>
        <td>8GB</td>
        <td>507</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air11gb); ?></td>
        <td>11GB</td>
        <td>508</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air15gb); ?></td>
        <td>15GB</td>
        <td>509</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($air40gb); ?></td>
        <td>40GB</td>
        <td>510</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air75gb); ?></td>
        <td>75GB</td>
        <td>511</td>
        </tr>
    </table>
</div>


<!--- FOR AIRTEL-CG PRICING PLAN-->


  <?php include("pricing/airtelcgprice.php"); ?>
	<h3 style="font-weight: bold;">FOR AIRTEL-CG DATA BUNDLE (id: airtel_cg)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $air100mbx; ?></td>
        <td>100MB</td>
        <td>601</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $air300mbx; ?></td>
        <td>300MB</td>
        <td>602</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $air500mbx; ?></td>
        <td>500MB</td>
        <td>603</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $air1gbx; ?></td>
        <td>1GB</td>
        <td>604</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air2gbx); ?></td>
        <td>2GB</td>
        <td>605</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air5gbx); ?></td>
        <td>5GB</td>
        <td>606</td>
        </tr>

     
    </table>
</div>






<!--- FOR 9MOBILE PRICING PLAN-->

  <?php include("pricing/mobileprice.php"); ?>
  <h3 style="font-weight: bold;">ETISALAT DATA BUNDLE (id: etisalat)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $mb500mb; ?></td>
        <td>750MB</td>
        <td>401</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb1gb); ?></td>
        <td>1.5GB</td>
        <td>402</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb2gb); ?></td>
        <td>2GB</td>
        <td>403</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb3gb); ?></td>
        <td>3GB</td>
        <td>404</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb4gb); ?></td>
        <td>4.5GB</td>
        <td>405</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb11gb); ?></td>
        <td>11GB</td>
        <td>406</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb15gb); ?></td>
        <td>15GB</td>
        <td>407</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb40gb); ?></td>
        <td>40GB</td>
        <td>408</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb75gb); ?></td>
        <td>75GB</td>
        <td>409</td>
        </tr>
    </table>
</div>


<!--- FOR AIRTIME VTU-->

  <?php include("pricing/airtimediscount.php"); ?>
  <h3 style="font-weight: bold;">AIRTIME-VTU DISCOUNT</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> DISCOUNT </b></th>
        <th><b> NETWORK </b></th>
        <th><b> SERVICE ID </b></th>
        </tr>
        </thead>
        <tr>
        <td><?php echo $mtn_discount; ?>%</td>
        <td>MTN</td>
        <td>mtn</td>
        </tr>

         <tr>
        <td><?php echo $glo_discount; ?>%</td>
        <td>GLO</td>
        <td>glo</td>
        </tr>

         <tr>
        <td><?php echo($airtel_discount); ?>%</td>
        <td>AIRTEL</td>
        <td>airtel</td>
        </tr>

         <tr>
        <td><?php echo ($mobile_discount); ?>%</td>
        <td>9MOBILE</td>
        <td>etisalat</td>
        </tr>

    </table>
</div>

<!--- FOR GOTV PRICING PLAN-->
<section id="tvprice">
  <?php include("pricing/gotvprice.php"); ?>
  <h3 style="font-weight: bold;">GOTV PACKAGES (id: gotv)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PACKAGE </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($gotv_max); ?></td>
        <td>Gotv Max</td>
        <td>601</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($gotv_jinja); ?></td>
        <td>Gotv Jinja</td>
        <td>602</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($gotv_jolli); ?></td>
        <td>Gotv Jolli</td>
        <td>603</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($gotv_smallie); ?></td>
        <td>Gotv Smallie</td>
        <td>604</td>
        </tr>
    </table>
</div>
</section>



<!--- FOR DSTV PRICING PLAN-->

  <?php include("pricing/dstvprice.php"); ?>
  <h3 style="font-weight: bold;">DSTV PACKAGES (id: dstv)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PACKAGE </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($dstv_yanga); ?></td>
        <td>Dstv Yanga</td>
        <td>801</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($dstv_confam); ?></td>
        <td>Dstv Confam</td>
        <td>802</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($dstv_padi_extra); ?></td>
        <td>Dstv Padi Extra</td>
        <td>803</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($dstv_yanga_extra); ?></td>
        <td>Dstv Yanga Extra</td>
        <td>804</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_asia); ?></td>
        <td>Dstv Asia</td>
        <td>805</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_confam_extra); ?></td>
        <td>Dstv Confam Extra</td>
        <td>806</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_compact); ?></td>
        <td>Dstv Compact</td>
        <td>807</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_compact_plus); ?></td>
        <td>Dstv Compact Plus</td>
        <td>808</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($dstv_premium); ?></td>
        <td>Dstv Premium</td>
        <td>809</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($dstv_premium_asia); ?></td>
        <td>Dstv Premium Asia</td>
        <td>810</td>
        </tr>
    </table>
</div>


<!--- FOR STARTIMES PRICING PLAN-->
  <?php include("pricing/startimeprice.php"); ?>
  <h3 style="font-weight: bold;">STARTIMES PACKAGES (id: startimes)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PACKAGE </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($nova_week); ?></td>
        <td>Nova Weekly</td>
        <td>701</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($nova_month); ?></td>
        <td>Nova Monthly</td>
        <td>702</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($basic_week); ?></td>
        <td>Basic Weekly</td>
        <td>703</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($basic_month); ?></td>
        <td>Basic Monthly</td>
        <td>704</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($smart_week); ?></td>
        <td>Smart Weekly</td>
        <td>705</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($smart_month); ?></td>
        <td>Smart Monthly</td>
        <td>706</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($classic_week); ?></td>
        <td>Classic Weekly</td>
        <td>707</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($classic_month); ?></td>
        <td>Classic Monthly</td>
        <td>708</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($super_week); ?></td>
        <td>Super Weekly</td>
        <td>709</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($super_month); ?></td>
        <td>Super Monthly</td>
        <td>710</td>
        </tr>
    </table>
</div>

<!--- FOR ELECTRICITY DISCOUNT-->
<section id="electprice">
  <?php include("pricing/electprice.php"); ?>
  <h3 style="font-weight: bold;">ELECTRICITY DISCOUNT</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> DISCOUNT </b></th>
        <th><b> DISCO </b></th>
        <th><b> SERVICE ID </b></th>
        </tr>
        </thead>
        <tr>
        <td><?php echo $aedc; ?>%</td>
        <td>AEDC</td>
        <td>abuja-elctric</td>
        </tr>

         <tr>
        <td><?php echo $ekedc; ?>%</td>
        <td>EKEDC</td>
        <td>ekedc-electric</td>
        </tr>

         <tr>
        <td><?php echo number_format($ikedc); ?>%</td>
        <td>IKEDC</td>
        <td>ikeja-electric</td>
        </tr>

         <tr>
        <td><?php echo number_format($ibedc); ?>%</td>
        <td>IBEDC</td>
        <td>ibedc-electric</td>
        </tr>


         <tr>
        <td><?php echo number_format($jed); ?>%</td>
        <td>JED</td>
        <td>jos-electric</td>
        </tr>

         <tr>
        <td><?php echo number_format($kaedco); ?>%</td>
        <td>KAEDCO</td>
        <td>kaduna-electric</td>
        </tr>


         <tr>
        <td><?php echo number_format($kedco); ?>%</td>
        <td>KEDCO</td>
        <td>kano-electric</td>
        </tr>


         <tr>
        <td><?php echo number_format($phed); ?>%</td>
        <td>PHED</td>
        <td>portharcourt-electric</td>
        </tr>
    </table>
</div>
</section>

<!--- FOR EDUCATION PIN-->
<section id="examprice">
  <?php include("pricing/waec_neco_price.php"); ?>
  <h3 style="font-weight: bold;">WAEC, NABTEB & NECO PRICE</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PIN-TYPE </b></th>
        <th><b> SERVICE ID </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($waec_price); ?></td>
        <td>1 WAEC PIN</td>
        <td>waec</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($neco_price); ?></td>
        <td>1 NECO PIN</td>
        <td>neco</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($nabteb_price); ?></td>
        <td>1 NABTEB PIN</td>
        <td>nabteb</td>
        </tr>

    </table>
</div>
</section>

	</center>
</div>


</body>
</html>
