<?php
//����POST�ϴ�ͼƬ

$psids="psid_".$ind;
$psid=$$psids;

	
$r=$db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}pic` WHERE uid='$uid'");
if(!$web_admin&&$r[NUM]>$groupdb[post_photo_num]){

	if(!$groupdb[post_photo_num]){
		$msg=("�������û��鲻������ͼƬ,�㻹��Ҫ�����Ļ�,������");
	}else{
		$msg=("�������û������������{$groupdb[post_sell_num]}��ͼƬ,�㻹��Ҫ�����Ļ�,������,������ɾ��һЩ�ɵ�.");
	}

}elseif($psid){
	
	if(is_uploaded_file($_FILES[postfile][tmp_name])){
		$array[name]=is_array($postfile)?$_FILES[postfile][name]:$postfile_name;
		$title=$title?$title:$array[name];
		$myname_str=explode(".",strtolower($array[name]));
		$myname=$myname_str[(count($myname_str)-1)];
		if(!in_array($myname,array('gif','jpg'))) $msg="{$array[name]}ͼƬֻ����gif����jpg�ĸ�ʽ";		
		$array[path]="$webdb[updir]/homepage/pic/".ceil($uid/1000)."/$uid";//�̼�ͼƬ���
		$array[size]=is_array($postfile)?$_FILES[postfile][size]:$postfile_size;
		$webdb[company_uploadsize_max]=$webdb[company_uploadsize_max]?$webdb[company_uploadsize_max]:100;
		//if($array[size]>$webdb[company_uploadsize_max]*1024)	$msg="{$array[name]}ͼƬ�������{$webdb[company_uploadsize_max]}K����";
		
		if($msg==''){
			$picurl=upfile(is_array($postfile)?$_FILES[postfile][tmp_name]:$postfile,$array);
			//��Ӧ������������ͼ
			
			if($picurl){
					
				$Newpicpath=ROOT_PATH."$array[path]/{$picurl}.gif";
				gdpic(ROOT_PATH."$array[path]/$picurl",$Newpicpath,120,120);
				if(!file_exists($Newpicpath)){
					copy(ROOT_PATH."$array[path]/{$picurl}",$Newpicpath);
				}
				$picurl="homepage/pic/".ceil($uid/1000)."/$uid/$picurl";
				$msg="{$array[name]}�ϴ��ɹ�";
				$title=get_word($title,32);
				$db->query("INSERT INTO `{$_pre}pic` ( `pid` , `psid` , `uid` , `username` ,  `title` , `url` , `level` , `yz` , `posttime` , `isfm` , `orderlist`  ) VALUES ('', '$psid', '$uid', '$lfjid', '$title', '$picurl', '0', '{$webdb[auto_userpostpic]}', '$timestamp', '0', '0');");
					
			}else{
				$msg="{$array[name]}�ϴ�ʧ�ܣ����Ժ����ԡ�";
			}
		}	

	}else{
		$msg="����Ҫ�ϴ����ļ�,�����ϴ�";
	}

}else{

	$msg="����ѡ��һ��ͼ��"; 

}

echo "<SCRIPT LANGUAGE=\"JavaScript\">
	<!--
	parent.document.getElementById(\"userpostpic_$ind\").innerHTML='<strong>[{$ind}]</strong> $msg';
	parent.userpost_pic_do(".($ind+1).");			
	//-->
	</SCRIPT>";exit;

?>