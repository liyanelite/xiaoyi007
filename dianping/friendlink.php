<?php
require(dirname(__FILE__)."/"."global.php");

if($job=='apply'){
	if(!$lfjid){
		showerr('���ȵ�¼');
	}
}



$SQL="WHERE yz=1 AND (endtime=0 OR endtime>$timestamp) AND (fid=0 OR fid='$city_id') ";


$colordb[$fid]='red;';
$rows=50;
if($page<1){
	$page=1;
}
$min=($page-1)*$rows;

$showpage=getpage("{$_pre}friendlink","$SQL","?","$rows");
$query = $db->query("SELECT * FROM {$_pre}friendlink $SQL LIMIT $min,$rows");
while($rs = $db->fetch_array($query)){
	$rs[logo]=tempdir($rs[logo]);
	$_listdb[]=$rs;
}

$num=5-count($_listdb)%5;
for($i=0;$i<$num;$i++ ){
	$_listdb[]=array('display'=>'none');
}
$listdb=array_chunk($_listdb,5);


if($_POST)
{
	if(!$lfjid){
		showerr('���ȵ�¼');
	}
	if(!check_imgnum($yzimg))
	{
		showerr("��֤�벻����");
	}
	
	if(!$postdb[name]){
		showerr("վ�����Ʋ���Ϊ��");
	}
	if(!$postdb[fid])
	{
		showerr("��ѡ��һ������");
	}
	if(!ereg('^http://',$postdb[url])){
		showerr('��ַ����,����http://��ͷ');
	}

	foreach( $_FILES AS $key=>$value ){

		if(is_array($value)){
			$postfile=$value['tmp_name'];
			$array[name]=$value['name'];
			$array[size]=$value['size'];
		} else{
			$postfile=$$key;
			$array[name]=${$key.'_name'};
			$array[size]=${$key.'_size'};
		}
		if($ftype[1]=='in'&&$array[name]){

			if(!eregi("(gif|jpg|png)$",$array[name])){
				showerr("LOGO,ֻ���ϴ�GIF,JPG,PNG��ʽ���ļ�,�㲻���ϴ����ļ�:$array[name]");
			}
			$array[path]=$webdb[updir]."/fenlei/friendlink";
	
			$array[updateTable]=1;	//ͳ���û��ϴ����ļ�ռ�ÿռ��С
			$filename=upfile($postfile,$array);
			$postdb[logo]="fenlei/friendlink/$filename";
		}

	}
	if($postdb[logo]&&!eregi("(gif|jpg|png)$",$postdb[logo])){
		showerr("LOGO,ֻ���ϴ�GIF,JPG,PNG��ʽ���ļ�,�㲻���ϴ����ļ�:$array[name]");
	}
	
	if(!strstr($postdb[url],'http://')){
		$postdb[url]="http://".$postdb[url];
	}
	$postdb[name]=filtrate($postdb[name]);
	$postdb[url]=filtrate($postdb[url]);
	$postdb[descrip]=filtrate($postdb[descrip]);
	$postdb[logo]=filtrate($postdb[logo]);
}

if($action=='reg')
{
	$db->query("INSERT INTO `{$_pre}friendlink` (`name` , `url` ,`fid` , `logo` , `descrip` , `list`,ifhide,yz,iswordlink,uid,username,posttime ) VALUES ('$postdb[name]','$postdb[url]','$postdb[fid]','$postdb[logo]','$postdb[descrip]','0','1','0','0','$lfjuid','$lfjid','$timestamp')");
	refreshto("?","������������Ѿ��ύ�ɹ�,��ȴ�����Ա��˺�,�ſ�����ʾ����",'10');
}
else
{
	$select_fid=select_fsort("postdb[fid]",$city_id);
	require(Mpath."inc/head.php");
	require(getTpl("friendlink"));
	require(Mpath."inc/foot.php");
}




function select_fsort($name,$ckfid){
	global $db,$pre;
	$show="<select name='$name'><option value=''>ȫ��</option>";
	$query = $db->query("SELECT * FROM {$pre}city ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$ckk=$ckfid==$rs[fid]?' selected ':'';
		$show.="<option value='$rs[fid]' $ckk>$rs[name]</option>";
	}
	$show.="</select>";
	return $show;
}


?>