<?php
if(!function_exists('html')){
	die('F');
}

if($vid){
	if(!is_numeric($vid)){
		$vid=base64_decode($vid);
	}
	$mob=substr($vid,0,7);
	$string=read_file(Mpath."inc/mobilebook.dat");
	$string=strstr($string,$mob);
	$num=strpos($string,"\n");
	$end=substr($string,0,$num);
	list($a,$area)=explode(",",$end);
	if(!$end){
		showerr("�ܱ�Ǹ,û����Ҫ��ѯ������");
	}
	unset($string);
}



require(Mpath."inc/head.php");
require(getTpl("mob"));
require(Mpath."inc/foot.php");
?>