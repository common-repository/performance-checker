<?
ini_set('max_execution_time', 0);
$username = 'devs@tecsys.in';
$apikey = 'c0a9dc8bd8b5c839b112c1d579024026';
$test = new Services_WTF_Test($username,$apikey);
$url_to_test = get_site_url();
$test->test(array('url' => $url_to_test));
$test->get_results();
$fully_loaded_time='';
$onload_time='';
$page_size='';
$yslow_score='';
$pagespeed_score='';
$onload_duration='';
$page_load_time='';
$html_load_time='';
if($test->error()) {
    echo "<br /><br />";
    die($test->error());
}
else 
{
$results = $test->results();
$resources = $test->resources();
$fully_loaded_time=round($results['fully_loaded_time']/1000,1);
$onload_time=round($results['onload_time']/1000,1);
$page_size=round($results['page_bytes']/1000000,1);
$yslow_score=$results['yslow_score'];
$pagespeed_score=$results['pagespeed_score'];
$onload_duration=$results['onload_duration'];
$report_url=$results['report_url'];
$page_load_time=round($results['page_load_time']/1000,1);
$html_load_time=round($results['html_load_time']/1000,1);
}
 ?>
<div class="container" style="padding-bottom: 20px">
<h2 style="text-align: center">
GT-Metrix Performance Overview for <?=$url_to_test;?> <button class="btn btn-info btn-xs" onclick="goBack()">Go Back</button></h2>
</div>
<div class="container" style="padding-bottom: 30px">
 <div class="col-md-3">
 	<div class="card" style="background:<?if($fully_loaded_time<=6){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Fully Loaded Time</h4> 
    <p><?=$fully_loaded_time;?> s</p> 
    </div>
    </div>
 </div>
 <div class="col-md-3">
 	<div class="card" style="background:<?if($onload_time<=6){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>On Load Time</h4> 
    <p><?=$onload_time;?> s</p> 
    </div>
    </div>
 </div>
 <div class="col-md-3">
 	<div class="card" style="background:<?if($page_size<=4){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Total Page Size</h4> 
    <p><?=$page_size;?> MB</p> 
    </div>
    </div>
 </div> 
 <div class="col-md-3">
 	<div class="card" style="background:<?if($page_load_time<=6){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Page Load Time</h4> 
    <p><?=$page_load_time;?> s</p> 
    </div>
    </div>
 </div>
 </div>
 <div class="container" style="padding-bottom: 20px">
  <div class="col-md-3">
 	<div class="card"  style="background:<?if($html_load_time<=6){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>HTML Load Time</h4> 
    <p><?=$html_load_time;?> s</p> 
    </div>
    </div>
 </div>
  <div class="col-md-3">
 	<div class="card" style="background:<?if($yslow_score<80 OR $yslow_score>=70){echo "#cbb708";}elseif($yslow_score<=100 OR $yslow_score>=80){echo "#23ab11";}elseif($yslow_score<70 OR $yslow_score>=50){echo "#e29b20";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Y-Slow Score</h4> 
    <p><?=$yslow_score;?> %</p> 
    </div>
    </div>
 </div>
  <div class="col-md-3">
 	<div class="card" style="background:<?if($pagespeed_score<80 OR $pagespeed_score>=70){echo "#cbb708";}elseif($pagespeed_score<=100 OR $pagespeed_score>=80){echo "#23ab11";}elseif($pagespeed_score<70 OR $pagespeed_score>=50){echo "#e29b20";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>Page Speed Score</h4> 
    <p><?=$pagespeed_score;?> %</p> 
    </div>
    </div>
 </div>
  <div class="col-md-3">
 	<div class="card" style="background:<?if($onload_duration<=6){echo "#23ab11";}else{echo "#e34947";} ?>">
    <div class="container">
    <h4>On Load Duration</h4> 
    <p><?=$onload_duration;?> s</p> 
    </div>
    </div>
 </div>
 </div>
<div class="container" style="text-align: center" id="skip">
	<h4><a href="<?=$report_url;?>/pdf">Click to Download Full Report(includes recommendation details)</a></h4>
</div>
