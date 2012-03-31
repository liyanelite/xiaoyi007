<?php
!function_exists('html') && exit('ERR');

if($job=='js'){
	header('Content-Type: text/html; charset=gb2312');
	$query = $db->query("SELECT * FROM {$pre}sell_telephone WHERE endtime>$timestamp AND city_id='$city_id'");
	while($rs = $db->fetch_array($query)){
		echo "<div class='list' title='{$rs[about]}'><span>{$rs[title]} µç»°:</span><a >$rs[telephone]</a></div>";
	}
	exit;
}

?>