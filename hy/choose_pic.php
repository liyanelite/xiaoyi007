<?php
require(dirname(__FILE__)."/global.php");
$webdb[company_uploadsize_max]=$webdb[company_uploadsize_max]?$webdb[company_uploadsize_max]:100;


if($action=='upload'){
		
	if(is_uploaded_file($_FILES[postfile][tmp_name])){
		
		$array[name]=is_array($postfile)?$_FILES[postfile][name]:$postfile_name;
		$title=$title?$title:$array[name];
		$myname_str=explode(".",strtolower($array[name]));
		$myname=$myname_str[(count($myname_str)-1)];
		if(!in_array($myname,array('gif','jpg'))) $msg="{$array[name]}ͼƬֻ����gif����jpg�ĸ�ʽ";		
		$array[path]="$webdb[updir]/homepage/pic/".ceil($lfjuid/1000)."/$lfjuid";	//�̼�ͼƬ���
		$array[size]=is_array($postfile)?$_FILES[postfile][size]:$postfile_size;
		$webdb[company_uploadsize_max]=$webdb[company_uploadsize_max]?$webdb[company_uploadsize_max]:100;
		//if($array[size]>$webdb[company_uploadsize_max]*1024)	$msg="{$array[name]}ͼƬ�������{$webdb[company_uploadsize_max]}K����";
		
		if($msg==''){
			$picurl=upfile(is_array($postfile)?$_FILES[postfile][tmp_name]:$postfile,$array);

			if($picurl){
					
					$Newpicpath=ROOT_PATH."$array[path]/{$picurl}.gif";
					gdpic(ROOT_PATH."$array[path]/$picurl",$Newpicpath,120,120);
					if(!file_exists($Newpicpath)){
						copy(ROOT_PATH."$array[path]/{$picurl}",$Newpicpath);
					}
					//$msg="{$array[name]}�ϴ��ɹ�";

					$picurl="homepage/pic/".ceil($lfjuid/1000)."/$lfjuid/$picurl";
					$title=get_word($title,32);
					$db->query("INSERT INTO `{$_pre}pic` ( `pid` , `psid` , `uid` , `username` ,  `title` , `url` , `level` , `yz` , `posttime` , `isfm` , `orderlist`  ) VALUES ('', '$psid', '$lfjuid', '$lfjid', '$title', '$picurl', '0', '{$webdb[auto_userpostpic]}', '$timestamp', '0', '0');");
					$pid=$db->insert_id();
					$ok=1;						
			}else{
				$msg="{$array[name]}�ϴ�ʧ�ܣ����Ժ����ԡ�";
			}
		}	
		
		//�������ݿ�Ŷ
	
	
	}else{
		$msg="����Ҫ�ϴ����ļ�";
	}

	echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />';
	if($msg){
		$load_fun="alert('$msg');";
	}
	if($ok){
		$picurl=tempdir($picurl);
		$load_fun.=" \r\n parent.set_choooooooooooosed('$pid','$picurl.gif','$title');";
	}
	
	echo "<script>
	
	$load_fun

	window.location='?';
	</script>";
	exit;
}



$webdb[company_picsort_Max]=$webdb[company_picsort_Max]?$webdb[company_picsort_Max]:10;
//��Ŀ
$query=$db->query("SELECT * FROM {$_pre}picsort WHERE uid='$lfjuid' ORDER BY orderlist DESC LIMIT 0,$webdb[company_picsort_Max];");
while($rs=$db->fetch_array($query)){
	$sortlistdb[]=$rs;
}
//�б�
$where=" WHERE  uid='$lfjuid'";
if($psid){
	$where.=" AND psid='$psid'";
}

$rows=10;
if($page<1){
	$page=1;
}
$min=($page-1)*$rows;
$query=$db->query("SELECT * FROM {$_pre}pic $where ORDER BY orderlist DESC LIMIT $min,$rows;");
while($rs=$db->fetch_array($query)){
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
	$rs[url_show]=tempdir($rs[url]);
	$listdb[]=$rs;
}
$showpage=getpage("{$_pre}pic",$where,"?psid=$psid",$rows);


	


require(getTpl("choose_pic"));

?>