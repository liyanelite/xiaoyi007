<?php
require_once(dirname(__FILE__)."/"."global.php");
//header('Content-Type: text/html; charset=utf-8'); 
if($fileData){//print_r($_FILES);exit;
	if(!$lfjid){
		alert("�㻹û��¼");
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
	
	$array[updateTable]=1;	//ͳ���û��ϴ����ļ�ռ�ÿռ��С
	$filename=upfile(is_array($fileData)?$_FILES[fileData][tmp_name]:$fileData,$array);

	$newfile="$webdb[www_url]/$webdb[updir]/$dir/$filename";
	
	//�������ݣ��رղ�
	echo '<html>';
	echo '<head>';
	echo '<title>Insert Image</title>';
	echo '<meta http-equiv="content-type" content="text/html; charset=gb2312">';
	echo '</head>';
	echo '<body>';
	if($utype=='311'){
		//�û�û������ͼƬ��С,����ϵͳ�̶���ͼƬ��С,ϵͳ���Զ���ͼ
		$turepath=ROOT_PATH."$webdb[updir]/$dir/$filename";
		if(!$_POST['imgWidth']&&!$_POST['imgHeight']&&$webdb[ArticlePicWidth]&&$webdb[ArticlePicHeight]){
			$img_array=getimagesize($turepath);
			if($img_array[0]>$webdb[ArticlePicWidth]||$img_array[1]>$webdb[ArticlePicHeight]){
				gdpic($turepath,$turepath,$webdb[ArticlePicWidth],$webdb[ArticlePicHeight],1);

				$img_array=getimagesize($turepath);
				$_POST['imgWidth']=$img_array[0];
				$_POST['imgHeight']=$img_array[1];
			}
		}
		echo '<script type="text/javascript">parent.KE.plugin["'.$filetype.'"].insert("' . $_POST['id'] . '", "' . $newfile . '","' . $array[name] . '","' . $_POST['imgWidth'] . '","' . $_POST['imgHeight'] . '","' . $_POST['imgBorder'] . '");</script>';
	}
	elseif(!$_GET[Ctype])
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
    echo '<script type="text/javascript">alert("'.$msg.'");history.back();</script>';
    echo '</body>';
    echo '</html>';
    exit;
}
?>