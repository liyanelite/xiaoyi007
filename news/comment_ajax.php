<?php
require_once(dirname(__FILE__)."/global.php");

header('Content-Type: text/html; charset=gb2312');

$rsdb=$db->get_one("SELECT A.*,S.* FROM {$_pre}content A LEFT JOIN {$_pre}sort S ON A.fid=S.fid WHERE A.id='$id'");

if(!$rsdb)
{
	die("��ַ����,����֮");
}

/**
*�����û��ύ������
**/
if($action=="post")
{
	/*��֤�봦��*/
	if(!$web_admin){
		if(!check_imgnum($yzimg)){
			die("��֤�벻����");
		}
	}

	if(!$content){	
		die("���ݲ���Ϊ��");
	}
	
	$yz=1;
	if(!$web_admin){
		if($webdb[Info_PostCommentType]==2){
			die('����Ա���ò����Է�������');
		}elseif($webdb[Info_PostCommentType]==1&&!$lfjuid){
			die('����Ա�����οͲ����Է�������');
		}
		
		if($webdb[Info_PassCommentType]==2){
			$yz=0;
		}elseif($webdb[Info_PassCommentType]==1&&!$lfjuid){
			$yz=0;
		}
	}



	$username=filtrate($username);
	$content=filtrate($content);
	$content=str_replace("@@br@@","<br>",$content);

	//���˲���������
	$username=replace_bad_word($username);
	$content=replace_bad_word($content);

	//�������˶����������ʺ���������
	if($username)
	{
		$rs=$db->get_one(" SELECT $TB[uid] AS uid FROM $TB[table] WHERE $TB[username]='$username' ");
		if($rs[uid]!=$lfjuid)
		{
			$username="����";
		}
	}
	
	$rss=$db->get_one(" SELECT * FROM {$_pre}content WHERE id='$id' ");
	if(!$rss){
		die("ԭ���ݲ�����");
	}

	$username || $username=$lfjid;

	$type=2;//�����ο�,û̫������
	
	/*���ϵͳ��������,��ô�е����۽������ύ�ɹ�,��û����ʾ����ʧ��*/
	$db->query("INSERT INTO `{$_pre}comments` (`cuid`,  `id`, `fid`, `uid`, `username`, `posttime`, `content`, `ip`, `icon`, `yz`) VALUES ('$rss[uid]','$id','$rsdb[fid]','$lfjuid','$username','$timestamp','$content','$onlineip','$icon','$yz')");

	$db->query(" UPDATE {$_pre}content SET comments=comments+1 WHERE id='$id' ");
}

/*ɾ������*/
elseif($action=="del")
{
	$rs=$db->get_one("SELECT * FROM `{$_pre}comments` WHERE cid='$cid'");
	
	if($rs[id]!=$id)
	{
		die("ID����");
	}
	if(!$lfjuid)
	{
		die("�㻹û��¼,��Ȩ��");
	}
	elseif(!$web_admin&&$rs[uid]!=$lfjuid&&$rs[cuid]!=$lfjuid)
	{
		die("��ûȨ��");
	}
	$db->query(" DELETE FROM `{$_pre}comments` WHERE cid='$cid' ");
	if($rs){
		$db->query("UPDATE {$_pre}content SET comments=comments-1 WHERE id='$rs[id]' ");
	}
}
elseif($action=='vote')
{

	if(get_cookie("agree_$cid"))
	{
		die("�벻Ҫ�ظ�ͶƱ!!<br><br>");
	}
	else
	{
		set_cookie("agree_$cid",1,3600);
	}

	$rs=$db->get_one("SELECT * FROM `{$_pre}comments` WHERE cid='$cid'");
	if($job=='agree')
	{
		$db->query("UPDATE {$_pre}comments SET agree=agree+1 WHERE cid='$rs[cid]' ");
	}
	elseif($job=='disagree')
	{
		$db->query("UPDATE {$_pre}comments SET disagree=disagree+1 WHERE cid='$rs[cid]' ");
	}



	if($posttype!='ajax')
	{
		refreshto("лл���ͶƱ!!",$FROMURL);
	}
}

$SQL=" AND A.yz=1 ";

/**
*ÿҳ��ʾ��������
**/
$rows=$webdb[Info_ShowCommentRows]?$webdb[Info_ShowCommentRows]:8;

if($page<1)
{
	$page=1;
}
$min=($page-1)*$rows;

/*���������ٶ�Ҳֻ������ʾ1000����*/
$leng=10000;

$query=$db->query("SELECT A.*,B.icon FROM `{$_pre}comments` A LEFT JOIN {$pre}memberdata B ON A.uid=B.uid WHERE A.id=$id $SQL ORDER BY A.cid DESC LIMIT $min,$rows");
while( $rs=$db->fetch_array($query) )
{
	if(!$rs[username])
	{
		$detail=explode(".",$rs[ip]);
		$rs[username]="$detail[0].$detail[1].$detail[2].*";
	}

	if($rs[icon])
	{
		$rs[icon]=tempdir($rs[icon]);
	}

	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

	$rs[full_content]=$rs[content];

	$rs[content]=kill_badword($rs[content]);
	$rs[username]=kill_badword($rs[username]);

	
	$rs[title]=preg_replace("/\[quote\](.*)\[\/quote\]/","",$rs[content]);
	$rs[title]=get_word($rs[title],50);
	$rs[content]=get_word($rs[content],$leng);
	$rs[content]=preg_replace("/\[quote\](.*)\[\/quote\]/","<div class='quotecomment_div'>\\1</div>",$rs[content]);
	

	$rs[content]=str_replace("\n","<br>",$rs[content]);

	if($lfjuid)
	{
		if($lfjuid===$rs[cuid]||$web_admin||$lfjuid===$rs[uid]||in_array($lfjid,explode(",",$rsdb[admin])))
		{
			$rs[ifadmin]=1;
		}
		else
		{
			$rs[ifadmin]=0;
		}
	}
	else
	{
		$rs[ifadmin]=0;
	}

	$listdb[]=$rs;
}

/**
*���۷�ҳ����
**/
$showpage=getpage("`{$_pre}comments` A"," WHERE A.id='$id' $SQL","?fid=$fid&id=$id",$rows);
$showpage=preg_replace("/\?fid=([\d]+)&id=([\d]+)&page=([\d]+)/is","javascript:getcomment('comment_ajax.php?fid=\\1&id=\\2&page=\\3')",$showpage);


require_once(getTpl('comment_ajax'));


?>