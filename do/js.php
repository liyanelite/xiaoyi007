<?php
error_reporting(0);extract($_GET);
require_once(dirname(__FILE__)."/../data/config.php");
if(!eregi("^([0-9]+)$",$id)){
	die("document.write('ID������');");
}
$FileName=dirname(__FILE__)."/../cache/js/";

$FileName.="{$id}.php";
//Ĭ�ϻ���3����.
if(!$webdb["cache_time_js"]){
	$webdb["cache_time_js"]=3;
}
if( (time()-filemtime($FileName))<($webdb["cache_time_js"]*60) ){
	@include($FileName);
	$show=str_replace(array("\n","\r","'"),array("","","\'"),stripslashes($show));
	if($iframeID){	//��ܷ�ʽ����������ҳ����ٶ�,�Ƽ�
		//�����������
		if($webdb[cookieDomain]){
			echo "<SCRIPT LANGUAGE=\"JavaScript\">document.domain = \"$webdb[cookieDomain]\";</SCRIPT>";
		}
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
		parent.document.getElementById('$iframeID').innerHTML='$show';
		</SCRIPT>";
	}else{			//JSʽ��������ҳ����ٶ�,���Ƽ�
		echo "document.write('$show');";
	}
	exit;
}

require(dirname(__FILE__)."/"."global.php");
require_once(ROOT_PATH."inc/label_funcation.php");


	$query=$db->query(" SELECT * FROM {$pre}label WHERE lid='$id' ");
	while( $rs=$db->fetch_array($query) ){
		//�����ݿ�ı�ǩ
		if( $rs[typesystem] )
		{
			$_array=unserialize($rs[code]);
			$value=($rs[type]=='special')?Get_sp($_array):Get_Title($_array);
			if(strstr($value,"(/mv)")){
				$value=get_label_mv($value);
			}
			if($_array[c_rolltype])
			{
				$value="<marquee direction='$_array[c_rolltype]' scrolldelay='1' scrollamount='1' onmouseout='if(document.all!=null){this.start()}' onmouseover='if(document.all!=null){this.stop()}' height='$_array[roll_height]'>$value</marquee>";
			}
		}
		//�����ǩ
		elseif( $rs[type]=='code' )
		{
			$value=stripslashes($rs[code]);
			//����һ�²�������javascript����,������Ȩ���ж�,��ͨ�û�Ҳ��ɾ��
			if(eregi("<SCRIPT",$value)&&!eregi("<\/SCRIPT",$value)){
				if($delerror){
					$db->query("UPDATE `{$pre}label` SET code='' WHERE lid='$rs[lid]'");
				}else{
					die("<A HREF='$WEBURL?&delerror=1'>�ˡ�{$rs[tag]}����ǩ����,���ɾ��֮!</A><br>$value");
				}			
			}
			//��ʵ��ַ��ԭ
			$value=En_TruePath($value,0);
		}
		//����ͼƬ
		elseif( $rs[type]=='pic' )
		{	
			unset($width,$height);
			$picdb=unserialize($rs[code]);
			$picdb[imgurl]=tempdir("$picdb[imgurl]");
			$picdb[width] && $width=" width='$picdb[width]'";
			$picdb[height] && $height=" height='$picdb[height]'";
			if($picdb['imglink'])
			{
				$value="<a href='$picdb[imglink]' target=_blank><img src='$picdb[imgurl]' $width $height border='0' /></a>";
			}
			else
			{
				$value="<img src='$picdb[imgurl]' $width $height  border='0' />";
			}
		}
		//����FLASH
		elseif( $rs[type]=='swf' )
		{
			$flashdb=unserialize($rs[code]);
			$flashdb[flashurl]=tempdir($flashdb[flashurl]);
			$flashdb[width] && $width=" width='$flashdb[width]'";
			$flashdb[height] && $height=" height='$flashdb[height]'";
			$value="<object type='application/x-shockwave-flash' data='$flashdb[flashurl]' $width $height wmode='transparent'><param name='movie' value='$flashdb[flashurl]' /><param name='wmode' value='transparent' /></object>";
		}
		//��ͨ�õ�Ƭ
		elseif( $rs[type]=='rollpic' )
		{
			$value=rollPic_flash(unserialize($rs[code]));
		}
		//������ʽ��
		else
		{
			$value=stripslashes($rs[code]);
			//��ʵ��ַ��ԭ
			$value=En_TruePath($value,0);
		}
	}

$show=stripslashes($value);

if(!is_dir(dirname($FileName))){
	makepath(dirname($FileName));
}
if( (time()-filemtime($FileName))>($webdb["cache_time_js"]*60) ){
	if($webdb["cache_time_js"]!=-1){
		write_file($FileName,"<?php \r\n\$show=stripslashes('".addslashes($show)."'); ?>");
	}
}

$show=str_replace(array("\r","\n","'"),array("","","\'"),$show);

if($iframeID){	//��ܷ�ʽ����������ҳ����ٶ�,�Ƽ�
	//�����������
	if($webdb[cookieDomain]){
		echo "<SCRIPT LANGUAGE=\"JavaScript\">document.domain = \"$webdb[cookieDomain]\";</SCRIPT>";
	}
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
	parent.document.getElementById('$iframeID').innerHTML='$show';
	</SCRIPT>";
}else{			//JSʽ��������ҳ����ٶ�,���Ƽ�
	echo "document.write('$show');";
}
?>