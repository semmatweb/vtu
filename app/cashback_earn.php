<?php require("site_header.php");
require("../functions/autoload.php");
?>

<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>CashBack Summary</h4>
          <p style="color: red;font-weight: bold;">This shows the proccess of your earning on their each purchase.</p>
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

$checker="SELECT sum(amount) as amount FROM `referal_link` WHERE `referal_username`='$username' and amount>0 and status='no'";
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

   $check3="SELECT count(*) as numb FROM referal_link WHERE referal_username='$username' and status='no'"; 
   $result3 = mysqli_query($con, $check3);
    $row3 = mysqli_fetch_array($result3);
    
    if($row3['numb']>0){      
    ?>
    
    <div>
    Who you referred hasn't made any transaction on this platform that is why the Referral bonus is zero.
    <br>
        <br>
</div>
    <table>
       <th>SN</th> <th>Email</th><th>Referal Bonus</th>
   <?php

   $check="SELECT * FROM referal_link WHERE referal_username='$username' and status='no' order by amount desc"; 
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
    <form id='former'>
        
        <input type='button' id='casher' style='background:black;color:white;border:none;padding:10px;border-radius:3px' onclick='refer()' value='Cash out'/>
    </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $.LoadingOverlay("show");
  $.ajax({
    url:'<?php echo $baseurl; ?>/customer/refearning?load_id=0',
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").html(transactionsRes.ctrlButton);
      }
        });
  });

    function showMore(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'<?php echo $baseurl; ?>/customer/refearning?load_id='+id,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").html(transactionsRes.ctrlButton);
            }
        });
    }
    
     function refer(){  
         document.getElementById('casher').value='Please Wait'
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {

if(this.responseText=='true'){
    document.getElementById('casher').value='Cash Out'
        alert("Your commission amount  has successfully been added to your wallet ")
          setTimeout(()=>{
    location.reload()
   })
}else{
    alert("Your commission amount  has successfully been added to your wallet")
     setTimeout(()=>{
    location.reload()
     document.getElementById('casher').value='Cash Out'
}

    }
  };
   var b="username=<?php echo $username?>";
 xhttp.open("POST", "refe.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(b);
      }

 </script> 
 
 

<?php require("site_footer.php"); ?>
