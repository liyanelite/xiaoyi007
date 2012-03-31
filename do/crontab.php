<?php

$filename = dirname(__FILE__)."/../cache/crontab.php";

@ignore_user_abort(TRUE);
if(@set_time_limit(0)){
	$wait_time=1800;
}else{
	$wait_time=30;
}

if(time()-@filemtime($filename)>$wait_time){	//���ĳ��ʱ����û���޸Ĺ�,�ǾͿ����߳�������

	require_once(dirname(__FILE__)."/global.php");
	$cdo = true;
	do{
		if(!touch($filename)){
			die('�ļ�����д/cache/crontab.php');
		}
		$cdo = false;
		$times = time();
		$query = $db->query("SELECT * FROM {$pre}crontab WHERE ifstop=0");
		while($rs = $db->fetch_array($query)){
			$cdo = true;
			$run=0;
			if($rs[minutetime]){	//ÿ��������ִ��һ��
				if($times-$rs[lasttime]>$rs[minutetime]*60){
					$run++;
				}
			}elseif($rs[daytime]){	//ÿ��ִ��һ��,ʱ+�ָ�ʽ�� 1403
				if(date("md",$rs[lasttime])!=date("md",$times)&&date("Hi",$times)>$rs[daytime]){
					$run++;
				}

				if(date("md",$rs[lasttime])==date("md",$times)&&date("Hi",$rs[lasttime])<$rs[daytime]){
					$run++;
				}
			}elseif($rs[whiletime]){	//δ��ĳ��ʱ���,ִֻ��һ��
				if($rs[lasttime]<$rs[whiletime]&&$times>$rs[whiletime]){
					$run++;
				}
			}
			if($run){
				$db->query("UPDATE {$pre}crontab SET lasttime='$times' WHERE id='$rs[id]'");
				@include(ROOT_PATH."$rs[filepath]");				
			}			
		}

		sleep(50);	//��Ϣ50��ִ��һ��
	}while($cdo);	
}

?>qibo