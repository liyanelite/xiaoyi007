<?php
require_once(dirname(__FILE__)."/global.php");

$typedb=array('f'=>'fenlei_');

if(!$typedb[$type]){
	showerr('���Ͳ�����!');
}
$_pre=$pre.$typedb[$type];


/**
*ÿҳ��ʾ40��
**/
$rows=15;

if(!$page)
{
	$page=1;
}
$min=($page-1)*$rows;

$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;

unset($listdb,$i);

$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}db WHERE city_id='$city_id' ORDER BY id DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage('','',"?type=$type",$rows,$totalNum);
while($rs = $db->fetch_array($query))
{
	$s=$db->get_one("SELECT tableid FROM {$_pre}sort WHERE fid='$rs[fid]'");
	$_erp=$s[tableid];
	$_id=$rs[id];
	$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id='$rs[id]'");
	if(!$rs){
		$db->query("DELETE FROM {$_pre}db WHERE id='$_id'");
	}

	if($timestamp-$rs[posttime]<(3600*$webdb[UpdatePostTime])){
		$rs[update]='<A HREF="#" style="color:#ccc;" onclick="alert(\'�����ϴθ���ʱ��'.$webdb[UpdatePostTime].'Сʱ��,�ſ��Խ���ˢ��!\')">ˢ��</A>';
	}else{
		$rs[update]="<A HREF=\"$webdb[www_url]/$type/job.php?job=update&fid=$rs[fid]&id=$rs[id]\">ˢ��</A>";
	}
	if($rs['list']>$timestamp){
		$rs[dotop]='<A HREF="#" style="color:#ccc;" onclick="alert(\'�Ѿ��ö���\')">�ö�</A>';
	}else{
		$rs[dotop]="<A HREF=\"$webdb[www_url]/$type/job.php?job=dotop&fid=$rs[fid]&id=$rs[id]\">�ö�</A>";
	}
	$rs[pop1]="<A HREF=\"$webdb[www_url]/$type/job.php?job=popshow&type=1&fid=$rs[fid]&id=$rs[id]\">��ҳ����</A>";	
	$rs[pop2]="<A HREF=\"$webdb[www_url]/$type/job.php?job=popshow&type=2&fid=$rs[fid]&id=$rs[id]\">��Ŀ����</A>";
	$rs[pop3]="<A HREF=\"$webdb[www_url]/$type/job.php?job=popshow&type=3&fid=$rs[fid]&id=$rs[id]\">���ཹ��</A>";
	$query2 = $db->query("SELECT * FROM `{$_pre}buyad` WHERE `id`='$rs[id]' AND `endtime`>'$timestamp'");
	while($rs2 = $db->fetch_array($query2)){
		if($rs2[sortid]==-1){
			$rs[pop1]='<A HREF="#" style="color:#ccc;" onclick="alert(\'�Ѿ���ҳ������ʾ��\')">��ҳ����</A>';
		}elseif($rs2[sortid]==$rs[fid]){
			$rs[pop3]='<A HREF="#" style="color:#ccc;" onclick="alert(\'�Ѿ���Ŀ������ʾ��\')">���ཹ��</A>';
		}elseif($rs2[sortid]){
			$rs[pop2]='<A HREF="#" style="color:#ccc;" onclick="alert(\'�Ѿ����ཹ����ʾ��\')">��Ŀ����</A>';
		}
	}
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

	$i++;
	$rs[cl]=$i%2==0?'t2':'t1';
	$rs[url]="$webdb[www_url]/$type/bencandy.php?fid=$rs[fid]&id=$rs[id]&city_id=$rs[city_id]";
	$rs[Lurl]="$webdb[www_url]/$type/list.php?fid=$rs[fid]&city_id=$rs[city_id]";

	$listdb[]=$rs;
}

require(dirname(__FILE__)."/head.php");
require(dirname(__FILE__)."/template/list.htm");
require(dirname(__FILE__)."/foot.php");
?>