<?php
if(!function_exists('html')){
	die('F');
}

header('Content-Type: text/html; charset=gbk');

/**
*�����û��ύ������
**/
if($action=="post")
{
	
	$_web=preg_replace("/http:\/\/([^\/]+)\/(.*)/is","http://\\1",$WEBURL);
	if($webdb[Info_forbidOutPost]&&!ereg("^$_web",$FROMURL))
	{
		showerr("ϵͳ���ò��ܴ��ⲿ�ύ����");
	}
	
	/*��֤�봦��*/
	if($groupdb['comment_img'])
	{
		if(!check_imgnum($yzimg))
		{
			die("��֤�벻����,����ʧ��");
		}
	}

	if(!$content)
	{
		die("���ݲ���Ϊ��");
	}


	/*�Ƿ����������жϴ���*/

		$time=$timestamp-3600*24;
		if(!$lfjuid){
			$SQL="ip='$onlineip' AND posttime>$time";
		}else{
			$SQL="uid='$lfjuid' AND posttime>$time";
		}

	
	

	/*�Ƿ����������Զ�ͨ������жϴ���*/
	$yz=1;


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
	$fid=$rss[fid];

	$username || $username=$lfjid;

	if(WEB_LANG=='big5'){
		require_once(ROOT_PATH."inc/class.chinese.php");
		$cnvert = new Chinese("GB2312","BIG5",$content,ROOT_PATH."./inc/gbkcode/");
		$content = $cnvert->ConvertIT();
		$cnvert = new Chinese("GB2312","BIG5",$username,ROOT_PATH."./inc/gbkcode/");
		$username = $cnvert->ConvertIT();
	}

	$db->query("INSERT INTO `{$_pre}comments` (`cuid`, `type`, `id`, `fid`, `uid`, `username`, `posttime`, `content`, `ip`, `icon`, `yz`) VALUES ('$rss[uid]','0','$id','$fid','$lfjuid','$username','$timestamp','$content','$onlineip','$icon','$yz')");

	$db->query(" UPDATE {$_pre}content SET comments=comments+1 WHERE id='$id' ");
}

/*ɾ������*/
elseif($action=="del")
{
	
	$rs=$db->get_one("SELECT * FROM `{$_pre}comments` WHERE cid='$cid'");
	if(!$lfjuid)
	{
		die("�㻹û��¼,��Ȩ��");
	}
	elseif(!$web_admin&&$rs[uid]!=$lfjuid&&$rs[cuid]!=$lfjuid)
	{
		die("��ûȨ��");
	}
	if(!$web_admin&&$rs[uid]!=$lfjuid){
		$lfjdb[money]=get_money($lfjdb[uid]);
		if(abs($webdb[DelOtherCommentMoney])>$lfjdb[money]){
			die("���{$webdb[MoneyName]}����");
		}
		add_user($lfjdb[uid],-abs($webdb[DelOtherCommentMoney]));
	}
	$db->query(" DELETE FROM `{$_pre}comments` WHERE cid='$cid' ");
	$db->query("UPDATE {$_pre}content SET comments=comments-1 WHERE id='$rs[id]' ");
}
elseif($action=="flowers"||$action=="egg")
{
	if(get_cookie("{$action}_$cid")){
		echo "err<hr>";
	}else{
		set_cookie("{$action}_$cid",1,3600);
		$db->query("UPDATE `{$_pre}comments` SET `$action`=`$action`+1 WHERE cid='$cid'");
	}
}
/**
*�Ƿ�ֻ��ʾͨ����֤������,������ȫ����ʾ
**/
if(!$webdb[showNoPassComment])
{
	$SQL=" AND yz=1 ";
}
else
{
	$SQL="";
}

/**
*ÿҳ��ʾ��������
**/
$rows=$webdb[showCommentRows]?$webdb[showCommentRows]:8;

if($page<1)
{
	$page=1;
}
$min=($page-1)*$rows;


//$rsdb=$db->get_one("SELECT M.* FROM {$_pre}sort S LEFT JOIN {$_pre}module M ON S.mid=M.id WHERE S.fid='$fid'");

/*���������ٶ�Ҳֻ������ʾ1000����*/
$leng=1000;

$query=$db->query("SELECT SQL_CALC_FOUND_ROWS * FROM `{$_pre}comments` WHERE id=$id $SQL ORDER BY cid DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
while( $rs=$db->fetch_array($query) )
{
	if(!$rs[username])
	{
		$detail=explode(".",$rs[ip]);
		$rs[username]="$detail[0].$detail[1].$detail[2].*";
	}

	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

	$rs[full_content]=$rs[content];

	$rs[content]=get_word($rs[content],$leng);

	if($rs[type]){
		$rs[content]="<img style='margin-top:3px;' src=$webdb[www_url]/images/default/good_ico.gif> ".$rs[content];
	}

	$rs[content]=str_replace("\n","<br>",$rs[content]);

	$listdb[]=$rs;
}

/**
*���۷ֲ�����
**/
$showpage=getpage("","","?fid=$fid&id=$id",$rows,$totalNum);
$showpage=preg_replace("/\?fid=([\d]+)&id=([\d]+)&page=([\d]+)/is","javascript:getcomment('$city_url/job.php?job=comment_ajax&fid=\\1&id=\\2&page=\\3')",$showpage);


require_once(getTpl('comment_ajax'));

?>