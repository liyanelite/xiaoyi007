<?php
header('Content-Type: text/html; charset=gb2312');

$_erp=$Fid_db[tableid][$fid];

/**
*�����û��ύ������
**/
if($action=="post")
{	
	if( !table_field("{$_pre}content$_erp",'replytime') ){
		$db->query("ALTER TABLE `{$_pre}content$_erp` ADD `replytime` INT( 10 ) NOT NULL");
	}

	$_web=preg_replace("/http:\/\/([^\/]+)\/(.*)/is","http://\\1",$WEBURL);
	if($webdb[Info_forbidOutPost]&&!ereg("^$_web",$FROMURL))
	{
		showerr("ϵͳ���ò��ܴ��ⲿ�ύ����");
	}
	
	/*��֤�봦��*/
	if($webdb[Info_GroupCommentYzImg]&&in_array($groupdb['gid'],explode(",",$webdb[Info_GroupCommentYzImg])))
	{
		if(!check_imgnum($yzimg)){		
			die("��֤�벻����,����ʧ��");
		}
	}

	if(!$content){	
		die("���ݲ���Ϊ��");
	}


	/*�Ƿ����������жϴ���*/
	/*��ֹ�����˽�������*/
	if($webdb[forbidComment])
	{
		$allow=0;
	}
	/*��ֹ�ο�����*/
	elseif(!$webdb[allowGuestComment]&&!$lfjid)
	{
		$allow=0;
	}
	/*��������������*/
	else
	{
		$allow=1;
	}
	
	

	/*�Ƿ����������Զ�ͨ������жϴ���*/
	$yz=1;
	if($webdb[CommentPass_group]&&!in_array($groupdb[gid],explode(",",$webdb[CommentPass_group]))){	
		$yz=0;
	}


	$username=filtrate($username);
	$content=filtrate($content);
	$c_price=filtrate($c_price);
	$c_keywords=filtrate($c_keywords);
	$c_keywords2=filtrate($c_keywords2);

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
	
	$rss=$db->get_one(" SELECT * FROM {$_pre}content$_erp WHERE id='$id' ");
	if(!$rss){
		die("ԭ���ݲ�����");
	}
	$fid=$rss[fid];

	$username || $username=$lfjid;

	$fen6==',' && $fen6='';


	/*���ϵͳ��������,��ô�е����۽������ύ�ɹ�,��û����ʾ����ʧ��*/
	if($allow)
	{
		//�ؼ��ּ������
		//$c_keywords=keyword_ck($c_keywords);
		//$c_keywords2=keyword_ck($c_keywords2);

		$db->query("INSERT INTO `{$_pre}dianping` (`cuid`, `type`, `id`, `fid`, `uid`, `username`, `posttime`, `content`, `ip`, `icon`, `yz`, `fen1`, `fen2`, `fen3`, `fen4`, `fen5`, `price`, `keywords`, `keywords2`, `fen6`) VALUES ('$rss[uid]','0','$id','$fid','$lfjuid','$username','$timestamp','$content','$onlineip','$icon','$yz','$fen1','$fen2','$fen3','$fen4','$fen5','$c_price','$c_keywords','$c_keywords2','$fen6')");

		$db->query(" UPDATE {$_pre}content$_erp SET comments=comments+1,`replytime`='$timestamp' WHERE id='$id' ");
		//�ؼ��ֱ�ǩ����
		//keyword_add($id,$c_keywords,0);
		//keyword_add($id,$c_keywords2,$rss[mid]);
		//if($fen6){
		//	$fen6=str_replace(","," ",$fen6);
		//	keyword_add($id,$fen6,0);
		//}
		//���·�ֵ
		//update_fen($id);
	}
}

/*ɾ������*/
elseif($action=="del")
{
	$rs=$db->get_one("SELECT * FROM `{$_pre}dianping` WHERE cid='$cid'");
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
	$db->query(" DELETE FROM `{$_pre}dianping` WHERE cid='$cid' ");
	$db->query("UPDATE {$_pre}content$_erp SET comments=comments-1 WHERE id='$rs[id]' ");
	
	//��ǩ����
	//if($rs[fen6]){
	//	$rs[fen6]=str_replace(","," ",$rs[fen6]);
	//}
	//keyword_del($rs[id],"$rs[keywords] $rs[keywords2] $rs[fen6]");
	//���·�ֵ
	//update_fen($rs[id]);
}
/*�ʻ���������*/
elseif($action=="flowers"||$action=="egg")
{
	if(get_cookie("{$action}_$cid")){
		echo "�벻Ҫ�ظ�����!!<hr>";
	}else{
		set_cookie("{$action}_$cid",1,3600);
		$db->query("UPDATE `{$_pre}dianping` SET `$action`=`$action`+1 WHERE cid='$cid'");
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

$fendb = $module_DB[$Fid_db[mid][$fid]][config2];
$fendb[fen1][name] || $fendb[fen1][name]="����";
$fendb[fen2][name] || $fendb[fen2][name]="����";
$fendb[fen3][name] || $fendb[fen3][name]="����";
$fendb[fen4][name] || $fendb[fen4][name]="��λ";
$fendb[fen5][name] || $fendb[fen5][name]="ϲ���̶�";

$fendb[fen1][set] || $fendb[fen1][set]="1=��\r\n2=һ��\r\n3=��\r\n4=�ܺ�\r\n5=�ǳ���";
$fendb[fen2][set] || $fendb[fen2][set]="1=��\r\n2=һ��\r\n3=��\r\n4=�ܺ�\r\n5=�ǳ���";
$fendb[fen3][set] || $fendb[fen3][set]="1=��\r\n2=һ��\r\n3=��\r\n4=�ܺ�\r\n5=�ǳ���";
$fendb[fen4][set] || $fendb[fen4][set]="1=����\r\n2=����\r\n3=��\r\n4=�ܹ�";
$fendb[fen5][set] || $fendb[fen5][set]="1=��ϲ��\r\n2=����ν\r\n3=ϲ��\r\n4=��ϲ��";


/*���������ٶ�Ҳֻ������ʾ1000����*/
$leng=1000;

$query=$db->query("SELECT SQL_CALC_FOUND_ROWS * FROM `{$_pre}dianping` WHERE id=$id $SQL ORDER BY cid DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
while( $rs=$db->fetch_array($query) )
{
	$rs[fen]='';
	$rs[fen].=fen_value($fendb[fen1][name],$fendb[fen1][set],$rs[fen1]);
	$rs[fen].=fen_value($fendb[fen2][name],$fendb[fen2][set],$rs[fen2]);
	$rs[fen].=fen_value($fendb[fen3][name],$fendb[fen3][set],$rs[fen3]);
	$rs[fen].=fen_value($fendb[fen4][name],$fendb[fen4][set],$rs[fen4]);
	$rs[fen].=fen_value($fendb[fen5][name],$fendb[fen5][set],$rs[fen5]);
	$rs[fen6]=fen6_value($fendb[fen6][name],$fendb[fen6][set],$rs[fen6]);

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

	if($rs[keywords]){
		unset($array);
		$detail=explode(" ",$rs[keywords]);
		foreach( $detail AS $key=>$value){
			$_value=urlencode($value);
			$array[]="<A HREF='search.php?action=search&type=keyword&keyword=$_value' target=_blank>$value</A>";
		}
		$rs[keywords]=implode(" ",$array);
	}
	if($rs[keywords2]){
		unset($array);
		$detail=explode(" ",$rs[keywords2]);
		foreach( $detail AS $key=>$value){
			$_value=urlencode($value);
			$array[]="<A HREF='search.php?action=search&type=keyword&keyword=$_value' target=_blank>$value</A>";
		}
		$rs[keywords2]=implode(" ",$array);
	}

	$listdb[]=$rs;
}

/**
*���۷ֲ�����
**/
$showpage=getpage("","","?fid=$fid&id=$id",$rows,$totalNum);
$showpage=preg_replace("/\?fid=([\d]+)&id=([\d]+)&page=([\d]+)/is","javascript:getcomment('$city_url/job.php?job=dianping_ajax&fid=\\1&id=\\2&page=\\3')",$showpage);


require_once(getTpl('dianping_ajax'));

function fen_value($title,$set,$v){
	global $Murl;
	$shows="";
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		$d=explode("=",$value);
		if($d[0]==$v){
			$va ="$d[1]";
		}
	}
	$shows.=" <span class='title'>$title:</span>";
	for($i=0;$i<$v;$i++){
		$shows.="<img alt='$va' src='$webdb[www_url]/images/default/icon_star_2.gif'>";
	}
	for($j=(count($detail)-$i);$j>0 ;$j-- ){
		$shows.="<img alt='$va' src='$webdb[www_url]/images/default/icon_star_1.gif'>";
	}
	return $shows;
}
function fen6_value($title,$set,$v){
	$array=explode(",",$v);
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		if(in_array($value,$array)){
			$va[] ="$value";
		}
	}
	if(!$va){
		return ;
	}
	$shows =" <span class='title'>{$title}��</span>";
	$shows.=implode(" ",$va);
	if($title){
		return $shows;
	}	
}
?>