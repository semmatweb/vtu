

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


      <?php

        $error=$history="";

        $xxx= mysqli_query($db,"SELECT * FROM mytransaction WHERE email='".$email."' OR username='".$username."' ORDER BY id DESC LIMIT 300");

        $count=mysqli_num_rows($xxx);

        if ($count<1){

          $history='<div class="alert alert-danger alert-dismissible">
              
                         No Transaction Yet

                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                         </div>';
        }
        while ($data = mysqli_fetch_array($xxx, MYSQLI_ASSOC))
    { 

      $status=$data['status'];
      $amount=$data['amount'];
      $trx=$data['trx'];
      $active=$data['active'];
      $descr=$data['descr'];
      $date=$data['date'];
      $oldbal=$data['oldbal'];
      $newbal=$data['newbal'];

      $faxST=strtolower($status);

      if ($faxST=="successful" || $faxST=="credited"){

        $actmode="alert-success";
      }

      else {

        $actmode="alert-danger";

      }

      $history.=' <a href="'.$baseurl.'/receipt.php?refrence='.$trx.'" style="color:black;text-decoration:none;"><div class="alert '.$actmode.'">
                        <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            
                                                <th><b> Service </b></th>
                                                <th><b> Amount </b></th>
                                                <th><b> Reference </b></th>
                                                <th><b> Old Bal </b></th>
                                                <th><b> New Bal </b></th>
                                                <th><b> Date/Time </b></th>
                                                <th><b> Status </b></th>
                                            </tr>
                                        </thead>
                                        <tr>
                                        <td>'.$descr.'</td>
                                        <td>&#8358;'.$amount.'</td>
                                        <td>'.$trx.'</td>
                                        <td>&#8358;'.$oldbal.'</td>
                                        <td>&#8358;'.$newbal.'</td>
                                        <td>'.$date.'</td>
                                        <td>'.$status.'</td>
                                        </tr>
                                        <tbody>


  </tbody>
                                      

                                    </table>

                                      
                                </div>
                                  </div></a>';


    }


        ?>


		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    

    <div style="margin: 15px 15px;">
    <br>
    <br>
    <br>
   


   <?php echo $history; ?>
   

   </div>
   
<br>
<br>

<br>
<br>
<br>


                  <br>
                <br>
                <br>
                <br> 

                  <br>
                <br>
              
</div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>






<?php require("footer.php"); ?>