<?php require("site_header.php");
require("../functions/autoload.php");
?>

<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>My Downlines</h4>
          <p style="color: red;font-weight: bold;">This shows the lists of who used your referral code.</p>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>Commission Balance 
            <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()">Fund Wallet</button></span>
          </span>
          <br/>

          <span style="color: red;font-weight: bold;font-size: 39px;">₦ <?php
//           $host2="localhost";
// $user2="salaolid_salabeb39028";
// $pass2="Ayoson@faq67";
// $dbanme2="salaolid_SalabebDB39";
// $con2=mysqli_connect($host2, $user2, $pass2, $dbanme2);
$checker="SELECT sum(amount) as amount FROM `referal_link` WHERE `referal_username`='$username'";
          $result2 = mysqli_query($con, $checker);  
          $row2 = mysqli_fetch_array($result2);
           echo number_format($row2['amount'],2); ?></span>
         
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="background-color: #fff">


<div>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: red;
  color: white;
}
</style>
    
    
    <?php
    
    // $host2="localhost";
// $user2="salaolid_salabeb39028";
// $pass2="Ayoson@faq67";
// $dbanme2="salaolid_SalabebDB39";

// $con2=mysqli_connect($host2, $user2, $pass2, $dbanme2);
   $check3="SELECT count(*) as numb FROM referal_link WHERE referal_username='$username' and status='no'"; 
   $result3 = mysqli_query($con, $check3);
    $row3 = mysqli_fetch_array($result3);
    
    if($row3['numb']>0){      
    ?>
    
    <div>
    This Page is just for the history of those that use your referral code, to cash out your referral bonus navigate to <b>Cashback Earn Page.</b> 
    <br>
        <br>
</div>
    <table>
       <th>SN</th> <th>Email</th><th>Referal Bonus</th>
   <?php
// $host2="localhost";
// $user2="salaolid_salabeb39028";
// $pass2="Ayoson@faq67";
// $dbanme2="salaolid_SalabebDB39";

// $con2=mysqli_connect($host2, $user2, $pass2, $dbanme2);
   $check="SELECT * FROM referal_link WHERE referal_username='$username' order by amount desc"; 
   $result = mysqli_query($con, $check);
   $t=1;
         while($row = mysqli_fetch_array($result)){
         	       	
?>
		<tr><td><?echo $t?></td><td><?php echo $row['email'];?></td><td><?php echo $row['amount'];?></td></tr>

		<?php
		$t++;
         }
         echo mysqli_error($con);


		?>
    
    </table>
    <br>
   
    <?php
    }else{
        echo "<br>";
        echo "No new referral";
    }
    ?>
</div>
</div>
<br>

<div id="loadMoreDiv"></div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $.LoadingOverlay("show");
  $.ajax({
    url:'<?php echo $baseurl; ?>/customer/refdownline?load_id=0',
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
      }
        });
  });

    function showMore(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'<?php echo $baseurl; ?>/customer/refdownline?load_id='+id,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
            }
        });
    }

 </script> 

<?php require("site_footer.php"); ?>
