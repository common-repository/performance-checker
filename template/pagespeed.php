<?php
 defined( 'ABSPATH' ) or die('Hey, I am unable to help you if you called me directly'); 
ini_set('max_execution_time', 0);
$url=get_site_url();
$get = wp_remote_get( 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url='.$url, array(
        'timeout'     => 120,
        'httpversion' => '1.1',
    ));
$response =$get['body'];
$result = array();
$result = json_decode($response,true);
$audits = $result['lighthouseResult']['audits'];
$firstcontentfulpaint= $audits['first-contentful-paint']['displayValue'];
$firstmeaningfulpaint= $audits['first-meaningful-paint']['displayValue'];
$speedindex= $audits['speed-index']['displayValue'];
$firstcpuidle= $audits['first-cpu-idle']['displayValue'];
$interactive= $audits['interactive']['displayValue']; 
$estimatedinputlatency= $audits['estimated-input-latency']['displayValue'];
$renderblockingresources= $audits['render-blocking-resources']['displayValue']; 
$timetofirstbyte= $audits['time-to-first-byte']['displayValue']; 
$RemoveunusedCSS= $audits['unused-css-rules']['displayValue']; 
?> 
<html>
<body>
<div class="container" style="padding-bottom: 20px">
<h2 style="text-align: center">
PageSpeed Insights Desktop Performance for <?=$url;?> <button class="btn btn-info btn-xs" onclick="goBack()">Go Back</button></h2>
</div>
<h3 style="text-align: center;color: #880000"><b>Lab Data</b></h3>
<div class="container" style="padding-bottom: 30px">
 <div class="col-md-4">
 	<div class="card" style="background:<?if($firstcontentfulpaint<=2){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>First Contentful Paint</h4> 
    <p><?=$firstcontentfulpaint;?></p> 
    </div> 
    </div>
 </div>
 <div class="col-md-4">
 	<div class="card" style="background:<?if($firstmeaningfulpaint<=2){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>First Meaningful Paint</h4> 
    <p><?=$firstmeaningfulpaint;?></p> 
    </div>
    </div>
 </div>
 <div class="col-md-4">
 	<div class="card" style="background:<?if($speedindex<=4){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Speed Index</h4> 
    <p><?=$speedindex;?></p> 
    
    </div>
    </div>
 </div> 

 </div>
<div class="container" style="padding-bottom: 20px">
  <div class="col-md-4">
 	<div class="card" style="background:<?if($firstcpuidle<=4){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>First CPU Idle</h4> 
    <p><?=$firstcpuidle;?></p> 
    </div>
    </div>
 </div>
  <div class="col-md-4">
 	<div class="card" style="background:<?if($interactive<=4){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Time to Interactive</h4> 
    <p><?=$interactive;?></p> 
    </div>
    </div>
 </div>
  <div class="col-md-4">
 	<div class="card" style="background:<?if($interactive<=45){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Estimated Input Latency</h4> 
    <p><?=$estimatedinputlatency;?></p> 
    </div>
    </div>
 </div>
 </div>

<h3 style="text-align: center;color: #880000"><b>Opportunities</b></h3>
<div class="container" style="padding-bottom: 30px" id="skip">
 <div class="col-md-4">
 	<div class="card">
    <div class="container">
    <h4>Eliminate render-blocking resources</h4> 
    <p><?=$renderblockingresources;?></p> 
    </div>
    </div>
 </div>
 <div class="col-md-4">
 	<div class="card">
    <div class="container">
    <h4>Reduce server response times</h4> 
    <p><?=$timetofirstbyte;?></p> 
    </div>
    </div>
 </div>
  <div class="col-md-4">
 	<div class="card">
    <div class="container">
    <h4>Remove unused CSS</h4> 
    <p><?=$RemoveunusedCSS;?></p> 
    </div>
    </div>
 </div> 
 </div>
 </body>
 </html>
