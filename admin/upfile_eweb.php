<?php
require_once(dirname(__FILE__)."/"."global.php");
//header('Content-Type: text/html; charset=utf-8'); 
if($fileData){
	if(!$lfjid){
		//showerr("�㻹û��¼",1);
	}
	//����..��/��ͷ���ǲ������
	if( !ereg("^[0-9a-z_/]+$",$dir)||ereg("^/",$dir) ){
		$dir="other";
	}
	$updir='';
	$path="$updir/$dir";
	$array[name]=is_array($fileData)?$_FILES[fileData][name]:$fileData_name;
	require_once(ROOT_PATH."inc/class.chinese.php");
	$cnvert = new Chinese("UTF8","GB2312",$array[name],ROOT_PATH."./inc/gbkcode/");
	$array[name] = $cnvert->ConvertIT();
	$array[path]=$webdb[updir]."/".$path;
	$array[size]=is_array($fileData)?$_FILES[fileData][size]:$fileData_size;
	
	//$array[updateTable]=1;	//ͳ���û��ϴ����ļ�ռ�ÿռ��С
	$lfjuid=$userdb[uid];	//�����ϴ����ļ�����־
	$filename=upfile(is_array($fileData)?$_FILES[fileData][tmp_name]:$fileData,$array);
	
	$newfile="$webdb[www_url]/$webdb[updir]/$dir/$filename";
	
	//�������ݣ��رղ�
	echo '<html>';
	echo '<head>';
	echo '<title>Insert Image</title>';
	echo '<meta http-equiv="content-type" content="text/html; charset=gb2312">';
	echo '</head>';
	echo '<body>';
	if(!$_GET[Ctype])
	{
		echo "<SCRIPT LANGUAGE=\"JavaScript\">parent.KindInsertImage('$newfile','$imgWidth','$imgHeight','$imgBorder','$imgTitle','$imgAlign','$imgHspace','$imgVspace')</SCRIPT>";
	}
	else
	{
		echo "<SCRIPT LANGUAGE=\"JavaScript\">parent.KindInsertImageP8FLV('$newfile','$imgWidth','$imgHeight','$_GET[Ctype]')</SCRIPT>";
	}
	echo '</body>';
	echo '</html>';
	exit;
}

 

//��ʾ���رղ�
function alert($msg)
{
	echo '<html>';
	echo '<head>';
	echo '<title>error</title>';
	echo '<meta http-equiv="content-type" content="text/html; charset=gb2312">';
	echo '</head>';
	echo '<body>';
	echo '<script type="text/javascript">alert("'.$msg.'");parent.KindDisableMenu();parent.KindReloadIframe();</script>';
	echo '</body>';
	echo '</html>';
	exit;
}
?>