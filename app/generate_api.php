<?php require("site_header.php"); ?>


<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Integrate API</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Generate</a></li>
<li class="breadcrumb-item active">APIKEY</li>
</ol>
</div>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 social_media_card">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0">Hey <?php echo $fullname; ?></h3>
<span>Level : <?php echo $level; ?></span>
</div>
</div>

<div class="media_thumb ml_25">
	<center><h3><div id="myapi2" class="media_thumb ml_25 apikey"><?php echo $sk_token ?></div> <i class="fa fa-copy" style="font-size: 13px;cursor: pointer;" onclick="copyFunction()">Copy</i> <span id="refres"></span></h3></center>
</div>

<div class="p-5">
    <hr>

	<p style="color: red;">Copy the above API-key and use that in your request body when integrating our website API.</p>

	<br>

	<h5>USE THE BELOW EXAMPLE TO INTEGRATE DATA</h5>

<hr>

<p style="color: green;font-weight: bold;">See Data Sample Request Below</p>
	<code style="font-weight: bold;">

	$payload=array(<br/>
	'token' => 'YOUR API TOKEN',<br/>
	'network' => 'MTN',<br/>
	'plan_code' => 500,<br/>
	'mobile' => '0806474******',<br/>
	'request_id' => 'REF-UNIQUE72300674352',<br/>
);<br/>

$url = 'https://<?php echo $domain; ?>/api/data';<br/>
$ch = curl_init();<br/>
curl_setopt($ch, CURLOPT_URL, $url);<br/>
curl_setopt($ch, CURLOPT_POST, 1);<br/>
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));<br/>
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);<br/>
$request = curl_exec($ch);<br/>
curl_close($ch);<br/>

echo $request <br/>

	</code>

<hr>

<p style="color: green;font-weight: bold;">See Data Sample Response Below</p>

<code style="font-weight: bold;">
	
	{status:success, status_code:200, old_balance:1000, new_balance:850, time:11-Jul-2022 10:47AM, amountPaid:150, message:MTN 500MB - N150 Data Purchase Successful On 0806474******}

</code>
</div>
<div class="p-5">

	<h5>USE THE BELOW EXAMPLE TO INTEGRATE CABLE SUBSCRIPTION</h5>

<hr>

<p style="color: green;font-weight: bold;">See Cable Sample Request Below</p>
	<code style="font-weight: bold;">

	$payload=array(<br/>
	'token' => 'YOUR API TOKEN',<br/>
    'service' => 'DSTV',<br>
    'cable_id' => 800, //FOR DSTV PADI <br>
    'smart_no' => '7083806229',<br>
	'request_id' => 'REF-UNIQUE72300674352',<br/>
);<br/>

$url = 'https://<?php echo $domain; ?>/api/tv';<br/>
$ch = curl_init();<br/>
curl_setopt($ch, CURLOPT_URL, $url);<br/>
curl_setopt($ch, CURLOPT_POST, 1);<br/>
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));<br/>
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);<br/>
$request = curl_exec($ch);<br/>
curl_close($ch);<br/>

echo $request <br/>

	</code>

<hr>

<p style="color: green;font-weight: bold;">See Cable Sample Response Below</p>

<code style="font-weight: bold;">
	
	<!--{"title":"COMPLETED","icon":"success","status":"success","message":"AIRTEL-VTU N100 RECHARGE SUCCESSFUL ON 07083806229"}-->

</code>
</div>
<div class="alert" style="background-color: #fff; border-radius: 20px 20px 0px 0px;">

<!-- start -->
<!--api table-->
    <table class="table table-striped table-hover">
        <tr>
            <th>SN</th>
            <th>NETWORK NAME</th>
            <th>PLAN CODE</th>
            <th>DATA PLAN</th>
        </tr>
        <tr>
            <td>1</td>
            <td>AIRTEL</td>
            <td>501</td>
            <td>750MB</td>
        </tr>
        <tr>
            <td>2 </td>
            <td>AIRTEL</td>
            <td>502</td>
            <td>1.5GB</td>
        </tr>
        <tr>
            <td>3</td>
            <td>AIRTEL</td>
            <td>503</td>
            <td>2GB</td>
        </tr>
        <tr>
            <td>4</td>
            <td>AIRTEL</td>
            <td>504</td>
            <td>3GB</td>
        </tr>
        <tr>
            <td>5</td>
            <td>AIRTEL</td>
            <td>505</td>
            <td>4.5GB</td>
        </tr>
        <tr>
            <td>6</td>
            <td>AIRTEL</td>
            <td>506</td>
            <td>6GB</td>
        </tr>
        <tr>
            <td>7</td>
            <td>AIRTEL</td>
            <td>507</td>
            <td>10GB</td>
        </tr>
        <tr>
            <td>8</td>
            <td>AIRTEL</td>
            <td>508</td>
            <td>11GB</td>
        </tr>
        <tr>
            <td>9</td>
            <td>AIRTEL</td>
            <td>509</td>
            <td>20GB</td>
        </tr>
        <tr>
            <td>10</td>
            <td>AIRTEL</td>
            <td>510</td>
            <td>40GB</td>
        </tr>
        <tr>
            <td>11</td>
            <td>AIRTEL</td>
            <td>511</td>
            <td>75GB</td>
        </tr>
        <tr>
            <td>12</td>
            <td>AIRTEL</td>
            <td>512</td>
            <td>120GB</td>
        </tr>
        <tr>
            <td>13</td>
            <td>AIRTEL-CG</td>
            <td>601</td>
            <td>100MB</td>
        </tr>
        <tr>
            <td>14</td>
            <td>AIRTEL-CG</td>
            <td>602</td>
            <td>300MB</td>
        </tr>
        <tr>
            <td>15</td>
            <td>AIRTEL-CG</td>
            <td>603</td>
            <td>500MB</td>
        </tr>
        <tr>
            <td>16</td>
            <td>AIRTEL-CG</td>
            <td>604</td>
            <td>1GB</td>
        </tr>
        <tr>
            <td>17</td>
            <td>AIRTEL-CG</td>
            <td>605</td>
            <td>2GB</td>
        </tr>
        <tr>
            <td>18</td>
            <td>AIRTEL-CG</td>
            <td>606</td>
            <td>5GB</td>
        </tr>
        <tr>
            <td>19</td>
            <td>GLO</td>
            <td>201</td>
            <td>1.05GB</td>
        </tr>
        <tr>
            <td>20</td>
            <td>GLO</td>
            <td>202</td>
            <td>2.9GB</td>
        </tr>
        <tr>
            <td>21</td>
            <td>GLO</td>
            <td>203</td>
            <td>4.1GB</td>
        </tr>
        <tr>
            <td>22</td>
            <td>GLO</td>
            <td>204</td>
            <td>5.8GB</td>
        </tr>
        <tr>
            <td>23</td>
            <td>GLO</td>
            <td>205</td>
            <td>7.7GB</td>
        </tr>
        <tr>
            <td>24</td>
            <td>GLO</td>
            <td>206</td>
            <td>10GB</td>
        </tr>
        <tr>
            <td>25</td>
            <td>GLO</td>
            <td>207</td>
            <td>13.25GB</td>
        </tr>
        <tr>
            <td>26</td>
            <td>GLO</td>
            <td>208</td>
            <td>18.25GB</td>
        </tr>
        <tr>
            <td>27</td>
            <td>GLO</td>
            <td>209</td>
            <td>29.5GB</td>
        </tr>
        <tr>
            <td>28</td>
            <td>GLO</td>
            <td>210</td>
            <td>50GB</td>
        </tr>
        <tr>
            <td>29</td>
            <td>GLO</td>
            <td>211</td>
            <td>93GB</td>
        </tr>
        <tr>
            <td>30</td>
            <td>9MOBILE</td>
            <td>401</td>
            <td>500MB</td>
        </tr>
        <tr>
            <td>31</td>
            <td>9MOBILE</td>
            <td>402</td>
            <td>1.5GB</td>
        </tr>
        <tr>
            <td>32</td>
            <td>9MOBILE</td>
            <td>403</td>
            <td>2.0GB</td>
        </tr>
        <tr>
            <td>33</td>
            <td>9MOBILE</td>
            <td>404</td>
            <td>3.0GB</td>
        </tr>
        <tr>
            <td>34</td>
            <td>9MOBILE</td>
            <td>405</td>
            <td>4.5GB</td>
        </tr>
        <tr>
            <td>35</td>
            <td>9MOBILE</td>
            <td>406</td>
            <td>11GB</td>
        </tr>
        <tr>
            <td>36</td>
            <td>9MOBILE</td>
            <td>407</td>
            <td>15GB</td>
        </tr>
        <tr>
            <td>37</td>
            <td>9MOBILE</td>
            <td>408</td>
            <td>40GB</td>
        </tr>
        <tr>
            <td>38</td>
            <td>9MOBILE</td>
            <td>409</td>
            <td>75GB</td>
        </tr>
        <tr>
            <td>39</td>
            <td>MTN-CG</td>
            <td>500</td>
            <td>500MB</td>
        </tr>
        <tr>
            <td>40</td>
            <td>MTN-CG</td>
            <td>1000</td>
            <td>1GB</td>
        </tr>
        <tr>
            <td>41</td>
            <td>MTN-CG</td>
            <td>2000</td>
            <td>2GB</td>
        </tr>
        <tr>
            <td>42</td>
            <td>MTN-CG</td>
            <td>3000</td>
            <td>3GB</td>
        </tr>
        <tr>
            <td>43</td>
            <td>MTN-CG</td>
            <td>5000</td>
            <td>5GB</td>
        </tr>
        <tr>
            <td>44</td>
            <td>MTN-CG</td>
            <td>10000</td>
            <td>10GB</td>
        </tr>
        <tr>
            <td>45</td>
            <td>MTN-SME</td>
            <td>500</td>
            <td>500MB</td>
        </tr>
        <tr>
            <td>46</td>
            <td>MTN-SME</td>
            <td>1000</td>
            <td>1GB</td>
        </tr>
        <tr>
            <td>47</td>
            <td>MTN-SME</td>
            <td>2000</td>
            <td>2GB</td>
        </tr>
        <tr>
            <td>48</td>
            <td>MTN-SME</td>
            <td>3000</td>
            <td>3GB</td>
        </tr>
        <tr>
            <td>49</td>
            <td>MTN-SME</td>
            <td>5000</td>
            <td>5GB</td>
        </tr>
        <tr>
            <td>50</td>
            <td>MTN-SME</td>
            <td>10000</td>
            <td>10GB</td>
        </tr>
    </table>
<!--api table-->

</div>
<div class="alert" style="background-color: #fff; border-radius: 20px 20px 0px 0px;">
<!--api table-->
  <table class="table table-striped table-hover">
        <tr>
            <th>SN</th>
            <th>CABLE NAME</th>
            <th>CABLE ID</th>
            <th>CABLE PACKAGE NAME</th>
        </tr>
        <tr>
            <td>1</td>
            <td>DSTV</td>
            <td>800</td>
            <td>DSTV PADI</td>
        </tr>
        <tr>
            <td>2</td>
            <td>DSTV</td>
            <td>801</td>
            <td>DSTV YANGA</td>
        </tr>
        <tr>
            <td>3</td>
            <td>DSTV</td>
            <td>802</td>
            <td>DSTV CONFAM</td>
        </tr>
        <tr>
            <td>4</td>
            <td>DSTV</td>
            <td>803</td>
            <td>DSTV PADI EXTRA</td>
        </tr>
        <tr>
            <td>5</td>
            <td>DSTV</td>
            <td>804</td>
            <td>DSTV YANGA EXTRA</td>
        </tr>
        <tr>
            <td>6</td>
            <td>DSTV</td>
            <td>805</td>
            <td>DSTV ASIA</td>
        </tr>
        <tr>
            <td>7</td>
            <td>DSTV</td>
            <td>806</td>
            <td>DSTV CONFAM EXTRA</td>
        </tr>
        <tr>
            <td>8</td>
            <td>DSTV</td>
            <td>807</td>
            <td>DSTV COMPACT</td>
        </tr>
        <tr>
            <td>9</td>
            <td>DSTV</td>
            <td>808</td>
            <td>DSTV COMPACT PLUS</td>
        </tr>
        <tr>
            <td>10</td>
            <td>DSTV</td>
            <td>809</td>
            <td>DSTV PREMIUM</td>
        </tr>
        <tr>
            <td>11</td>
            <td>DSTV</td>
            <td>810</td>
            <td>DSTV PREMIUM ASIA</td>
        </tr>
        <tr>
            <td>12</td>
            <td>DSTV</td>
            <td>811</td>
            <td>DSTV EXTRA VIEW</td>
        </tr>
        <tr>
            <td>13</td>
            <td>GOTV</td>
            <td>600</td>
            <td>GOTV SUPA</td>
        </tr>
        <tr>
            <td>14</td>
            <td>GOTV</td>
            <td>601</td>
            <td>GOTV MAX</td>
        </tr>
        <tr>
            <td>15</td>
            <td>GOTV</td>
            <td>602</td>
            <td>GOTV JINJA</td>
        </tr>
        <tr>
            <td>16</td>
            <td>GOTV</td>
            <td>603</td>
            <td>GOTV JOLLI</td>
        </tr>
        <tr>
            <td>17</td>
            <td>GOTV</td>
            <td>604</td>
            <td>GOTV SMALLIE</td>
        </tr>
        <tr>
            <td>18</td>
            <td>STARTIMES</td>
            <td>701</td>
            <td>STARTIMES NOVA WEEKLY</td>
        </tr>
        <tr>
            <td>19</td>
            <td>STARTIMES</td>
            <td>702</td>
            <td>STARTIMES NOVA MONTHLY</td>
        </tr>
        <tr>
            <td>20</td>
            <td>STARTIMES</td>
            <td>703</td>
            <td>STARTIMES BASIC WEEKLY</td>
        </tr>
        <tr>
            <td>21</td>
            <td>STARTIMES</td>
            <td>704</td>
            <td>STARTIMES BASIC MONTHLY</td>
        </tr>
        <tr>
            <td>22</td>
            <td>STARTIMES</td>
            <td>705</td>
            <td>STARTIMES SMART WEEKLY</td>
        </tr>
        <tr>
            <td>23</td>
            <td>STARTIMES</td>
            <td>706</td>
            <td>STARTIMES SMART MONTHLY</td>
        </tr>
        <tr>
            <td>24</td>
            <td>STARTIMES</td>
            <td>707</td>
            <td>STARTIMES CLASSIC WEEKLY</td>
        </tr>
        <tr>
            <td>25</td>
            <td>STARTIMES</td>
            <td>708</td>
            <td>STARTIMES CLASSIC MONTHLY</td>
        </tr>
        <tr>
            <td>26</td>
            <td>STARTIMES</td>
            <td>709</td>
            <td>STARTIMES SUPER WEEKLY</td>
        </tr>
        <tr>
            <td>27</td>
            <td>STARTIMES</td>
            <td>710</td>
            <td>STARTIMES SUPER MONTHLY</td>
        </tr>
    </table>
<!--api table-->
</div>
</div>
</div>


</div>
</div>

<button class="btn btn-primary" style="width: 100%">OUR API PRICE DEPENDS ON YOUR LEVEL AND IT'S AVAILABLE IN YOUR DASHBOARD</button>
</div>

<!-- end-->
 <input type="text" id="myapi" value="<?php echo $sk_token ?>" style="background-color: transparent; color: transparent; height: 0px;border: none;">
<script type="text/javascript">
  function copyFunction(){
  var copyText = document.getElementById("myapi");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  navigator.clipboard.writeText(copyText.value);
  $("#refres").text("COPIED");
  }
    function gen()
    {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
  alert(this.responseText)
//   swal({
//   title: "Notification",
//   text: this.responseText,
//   type: "success",
//   confirmButtonText: "Ok" 
//  });
   setTimeout(()=>{
    location.reload()
   })
    }
  };
  
   var b="action="+"action";
 xhttp.open("POST", "dev_api_generator", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(b);
    }
</script>

</div>




</div>
</div>
</div>

<?php require("site_footer.php"); ?>
