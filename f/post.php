<?php
require_once(dirname(__FILE__)."/global.php");
@include(Mpath."data/guide_fid.php");

if($webdb[post_htmlType]==1){
	//������Ϊ�˼���?��ʽPOST����
	$detail=explode("&",substr(strstr($WEBURL,'?'),1));
	foreach($detail AS $value){
		$d=explode("=",$value);
		$d[0] && $$d[0]=addslashes($d[1]);
	}
	if($action){
		unset($job);
	}
}

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$city_id'");
$detail=explode(',',$rs[admin]);
if($lfjid && in_array($lfjid,$detail)){
	$web_admin=1;
}

if($action!="del"&&$webdb[Info_ClosePost]&&!$web_admin){
	showerr("��վ��ͣ����/�޸���Ϣ,ԭ������:<br>$webdb[Info_ClosePostWhy]");
}
if($webdb[ForbidPostMember]&&$lfjid){
	$detail=explode("\r\n",$webdb[ForbidPostMember]);
	if(in_array($lfjid,$detail)){
		showerr("���ں������б�,��Ȩ����");
	}
}
if($webdb[ForbidPostIp]){
	$detail=explode("\r\n",$webdb[ForbidPostIp]);
	if(in_array($onlineip,$detail)){
		showerr("������IP���ں������б���,��Ȩ����");
	}
}

if($action!="del"&&$webdb[GroupPostInfo]){
	$detail=explode(",",$webdb[GroupPostInfo]);
	if(!$web_admin&&in_array($groupdb['gid'],$detail)){
		if(!$lfjid){
			showerr("ע���¼֮��,�ſ��Է���!");
		}else{
			showerr("�������û���,��Ȩ����");
		}	
	}
}

require(ROOT_PATH."inc/class.inc.php");
$Guidedb=new Guide_DB;

if(!$fid){
	unset($listdb,$linkdb);
	$listdb=array();
	list_allsort($fid,0);


	require(Mpath."inc/head.php");
	require(getTpl("pub"));
	require(Mpath."inc/foot.php");
	exit;
}


/**
*��ȡ��Ŀ�����ļ�
**/
$fidDB=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$fid'");

//SEO
$titleDB[title]		= "$fidDB[name] - $webdb[Info_webname]";

/**
*ģ�Ͳ��������ļ�
**/
$field_db = $module_DB[$fidDB[mid]][field];
$ifdp = $module_DB[$fidDB[mid]][ifdp];
$m_config[moduleSet][useMap] = $module_DB[$fidDB[mid]][config][moduleSet][useMap];

if($fidDB[type]){
	showerr("�����,������������");
}elseif( $fidDB[allowpost] && $action!="del" && in_array($groupdb[gid],explode(",",$fidDB[allowpost])) ){
	showerr("�������û���,��Ȩ�ڱ���Ŀ������Ϣ");
}

//��Ŀ���
$fidDB[style] && $STYLE=$fidDB[style];

/*ģ��*/
$FidTpl=unserialize($fidDB[template]);

$lfjdb[money]=$lfjdb[_money]=intval(get_money($lfjuid));


if($action=="postnew"||$action=="edit"){
	if($ifdp&&!$postdb[address]){
		showerr("�̼ҵ�ַ����Ϊ��!");
	}
	if($webdb[Info_Musttelephone]&&$webdb[Info_Mustmobphone]&&!$postdb[telephone]&&!$postdb[mobphone]){
		showerr("�绰�������ֻ����벻��ͬʱΪ��!");
	}else{
		if($webdb[Info_Musttelephone]&&!$postdb[telephone]){
			showerr("�绰���벻��Ϊ��");
		}
		if($webdb[Info_Mustmobphone]&&!$postdb[mobphone]){
			showerr("�ֻ����벻��Ϊ��");
		}
	}	


	if($webdb[Info_MustQQ]&&!$postdb[oicq]){
		showerr("QQ���벻��Ϊ��");
	}
	if($webdb[Info_MustEmail]&&!$postdb[email]){
		showerr("Email����Ϊ��");
	}

	if ($postdb[email]&&!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$postdb[email])) {
		showerr("���䲻���Ϲ���");
	}
	if ($postdb[msn]&&!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$postdb[msn])) {
		showerr("MSN�����Ϲ���");
	}
	if ($postdb[oicq]&&!ereg("^[0-9]{5,11}$",$postdb[oicq])) {
		showerr("QQ�����Ϲ���");
	}
	if ($postdb[mobphone]&&!ereg("^[0-9]{11,12}$",$postdb[mobphone])) {
		showerr("�ֻ����벻���Ϲ���");
	}

	if($webdb[Info_cityPost]&&$_COOKIE[From_City]!=$postdb[city_id]){
		showerr("ϵͳ�����������Ϣ���ڱ�ĳ���,ֻ�ܷ��������ڵĳ��С�{$city_DB[name][$_COOKIE[From_City]]}��");
	}
	$postdb['title']=filtrate($postdb['title']);
}

/**�����ύ���·�������**/
if($action=="postnew")
{
	if(!check_rand_num($$webdb[rand_num_inputname])){
		showerr("ϵͳ�����ʧЧ,�뷵��,ˢ��һ��ҳ��,��������������,�����ύ!");
	}

	if(!$postdb[city_id]){
		showerr("��ѡ�����");
	}

	/*��֤�봦��*/
	if($webdb[Info_GroupPostYzImg]&&in_array($groupdb['gid'],explode(",",$webdb[Info_GroupPostYzImg]))){	
		if(!$web_admin&&!check_imgnum($yzimg)){		
			showerr("��֤�벻����,����ʧ��");
		}
	}

	$postdb['list']=$timestamp;
	if($iftop){		//�Ƽ��ö�
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}content$_erp` WHERE list>'$timestamp' AND fid='$fid' AND city_id='$postdb[city_id]'"));
		if($webdb[Info_TopNum]&&$NUM>=$webdb[Info_TopNum]){
			showerr("��ǰ��Ŀ�ö���Ϣ�Ѵﵽ����!");
		}
		$postdb['list']+=3600*24*$webdb[Info_TopDay];
		if($lfjdb[money]<$webdb[Info_TopMoney]){
			showerr("��Ļ��ֲ���:$webdb[Info_TopMoney],����ѡ���ö�");
		}
		$lfjdb[money]=$lfjdb[money]-$webdb[Info_TopMoney];	//Ϊ���潹����Ϣ���жϻ����Ƿ��㹻
	}

	$time=$timestamp-3600*24;
	$_erp=$Fid_db[tableid][$fid];
	if(!$lfjid){
		if($webdb[Info_GuestDayPostNum]>0){
			if(count(Info_list_content("WHERE ip='$onlineip' AND posttime>$time","","",array_flip($Fid_db[tableid])))>=$webdb[Info_GuestDayPostNum]){
				showerr("�ο�24Сʱ�����ֻ�ܷ���{$webdb[Info_GuestDayPostNum]}�������Ϣ,Ҫ�뷢�����������Ϣ,���ȵ�¼!");
			}
		}
		if(!$webdb[Info_GuestPostRepeat]){
			if(count(Info_list_content("WHERE ip='$onlineip' AND posttime>$time AND title='$postdb[title]'","","",array_flip($Fid_db[tableid])))){
				showerr("�ο�һ���ڲ����ظ�������ͬ��Ϣ");
			}
		}
	}elseif($lfjdb[groupid]==8){
		if($webdb[Info_MemberDayPostNum]>0){
			if(count(Info_list_content("WHERE uid='$lfjuid' AND posttime>$time","","",array_flip($Fid_db[tableid])))>=$webdb[Info_MemberDayPostNum]){
				if(!$webdb[Info_MemberPostMoney]||$lfjdb[money]<$webdb[Info_MemberPostMoney]){
					showerr("��ͨ��Աһ�������ֻ�ܷ���{$webdb[Info_MemberDayPostNum]}�������Ϣ");
				}else{
					$delusermoney=1;
				}
			
			}
		}
		if(!$webdb[Info_MemberPostRepeat]){
			if(count(Info_list_content("WHERE uid='$lfjuid' AND posttime>$time AND title='$postdb[title]'","","",array_flip($Fid_db[tableid])))){
				showerr("��ͨ��Աһ���ڲ����ظ�������ͬ��Ϣ");
			}
		}
	}

	//���ִ���
	$money=0;
	if($buyfid){	
		if(in_array('Index',$buyfid)){
			$money+=$webdb[AdInfoIndexShow];
		}
		if(in_array('Sort',$buyfid)){
			$money+=$webdb[AdInfoSortShow];
		}
		if(in_array('BigSort',$buyfid)){
			$money+=$webdb[AdInfoBigsortShow];
		}
	
		if($money>$lfjdb[money]){
			showerr("���{$webdb[MoneyName]}����,���{$webdb[MoneyName]}Ϊ:$lfjdb[_money]{$webdb[MoneyDW]}");
		}
	}

	$_web=preg_replace("/http:\/\/([^\/]+)\/(.*)/is","http://\\1",$WEBURL);
	if($webdb[Info_forbidOutPost]&&!ereg("^$_web",$FROMURL)){
		showerr("ϵͳ���ò��ܴ��ⲿ�ύ����");
	}

	if(!$postdb[title]){
		showerr("���ⲻ��Ϊ��");
	}elseif(strlen($postdb[title])>80){
		showerr("���ⲻ�ܴ���40������.");
	}
	if(eregi("[a-z0-9]{15,}",$postdb[title])){
		showerr("������д�ñ���!");
	}
	if(eregi("[a-z0-9]{25,}",$postdb[content])){
		showerr("��������д����!");
	}
	
	//�Զ����ֶν���У������Ƿ�Ϸ�
	$Module_db->checkpost($field_db,$postdb,'');

	//�ϴ�����ͼƬ
	post_photo();

	unset($num,$postdb[picurl]);
	foreach( $photodb AS $key=>$value ){
		if(!$value || !eregi("(gif|jpg|png)$",$value)){
			continue;
		}
		if($titledb[$key]>100){
			showerr("���ⲻ�ܴ���50������");
		}
		$num++;
		if(!$postdb[picurl]){
			if(is_file(ROOT_PATH."$webdb[updir]/$value.gif")){
				$postdb[picurl]="$value.gif";
			}else{
				$postdb[picurl]=$value;
			}
		}
	}

	$postdb[ispic]=$postdb[picurl]?1:0;

	/*Ĭ�϶���ͨ����֤*/
	$postdb[yz]=1;
	if($webdb[GroupPassYz]){
		if(!in_array($groupdb[gid],explode(",",$webdb[GroupPassYz]))){
			$postdb[yz]=0;
		}
	}

	//�����Ϲ涨��,������Ϊ�����
	$MSG=yz_check();

	if($postdb[yz]==1){
		add_user($lfjdb[uid],$webdb[PostInfoMoney]);
	}
	
	//��Ч����ʾ������
	if($postdb[showday]){
		$postdb[endtime]=$timestamp+$postdb[showday]*86400;
	}

	if($iftop){
		add_user($lfjuid,-intval($webdb[Info_TopMoney]));
	}

	//��ͨ��Ա,���������Ϣ��������,��Ҫ�շ�
	if($delusermoney){
		add_user($lfjuid,-intval($webdb[Info_MemberPostMoney]));
	}

	$postdb[keywords]=Info_keyword_ck($postdb[keywords]);
	
	//��Ϣ��
	$db->query("INSERT INTO `{$_pre}db` (`id`,`fid`,`city_id`,`uid`) VALUES ('','$fid','$postdb[city_id]','$lfjdb[uid]')");
	$id=$db->insert_id();

	/*��������������*/
	$db->query("INSERT INTO `{$_pre}content$_erp` (`id`, `title` , `mid` , `fid` , `fname` , `info` , `hits` , `comments` , `posttime` , `list` , `uid` , `username` , `titlecolor` , `fonttype` , `picurl` , `ispic` , `yz` , `yzer` , `yztime` , `levels` , `levelstime` , `keywords` , `jumpurl` , `iframeurl` , `style` , `head_tpl` , `main_tpl` , `foot_tpl` , `target` , `ishtml` , `ip` , `lastfid` , `money` , `passwd` , `editer` , `edittime` , `begintime` , `endtime` , `config` , `lastview`, `city_id`, `zone_id`, `street_id`, `editpwd`, `showday`, `telephone`, `mobphone`, `email`, `oicq`, `msn` ,`maps`,`picnum`,`address`,`linkman`) 
	VALUES (
	'$id','$postdb[title]','$fidDB[mid]','$fid','$fidDB[name]','','','','$timestamp','$postdb[list]','$lfjdb[uid]','$lfjdb[username]','','','$postdb[picurl]','$postdb[ispic]','$postdb[yz]','','','','','$postdb[keywords]','$postdb[jumpurl]','$postdb[iframeurl]','$postdb[style]','$postdb[head_tpl]','$postdb[main_tpl]','$postdb[foot_tpl]','$postdb[target]','$postdb[ishtml]','$onlineip','0','$postdb[money]','$postdb[passwd]','','','$postdb[begintime]','$postdb[endtime]','','$postdb[lastview]','$postdb[city_id]','$postdb[zone_id]','$postdb[street_id]','$postdb[editpwd]','$postdb[showday]','$postdb[telephone]','$postdb[mobphone]','$postdb[email]','$postdb[oicq]','$postdb[msn]','$postdb[maps]','$num','$postdb[address]','$postdb[linkman]')");


	//����ͼƬ
	foreach( $photodb AS $key=>$value ){
		if(!$value || !eregi("(gif|jpg|png)$",$value)){
			continue;
		}
		$titledb[$key]=filtrate($titledb[$key]);
		$value=filtrate($value);
		$db->query("INSERT INTO `{$_pre}pic` ( `id` , `fid` , `mid` , `uid` , `type` , `imgurl` , `name` ) VALUES ( '$id', '$fid', '$mid', '$lfjuid', '0', '$value', '{$titledb[$key]}')");
	}

	//���ִ���
	if($buyfid)
	{
		add_user($lfjuid,"-$money");
		$endtime=$timestamp+$webdb[AdInfoShowTime]*24*3600;
		if(in_array('Index',$buyfid)){
			$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('-1','$postdb[city_id]','$id','$rsdb[mid]','$lfjuid','$timestamp','$endtime','$money','')");
		}
		if(in_array('Sort',$buyfid)){
			$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('$fid','$postdb[city_id]','$id','$rsdb[mid]','$lfjuid','$timestamp','$endtime','$money','')");
		}
		if(in_array('BigSort',$buyfid)){
			$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('$fidDB[fup]','$postdb[city_id]','$id','$rsdb[mid]','$lfjuid','$timestamp','$endtime','$money','')");
		}
	}

	unset($sqldb);
	$sqldb[]="id='$id'";
	$sqldb[]="fid='$fid'";
	$sqldb[]="uid='$lfjuid'";

	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	foreach( $field_db AS $key=>$value){
		isset($postdb[$key]) && $sqldb[]="`{$key}`='{$postdb[$key]}'";
	}

	$sql=implode(",",$sqldb);

	/*������Ϣ���������*/
	$db->query("INSERT INTO `{$_pre}content_$fidDB[mid]` SET $sql");

	if(!$MSG){
		$MSG='����ɹ�';
	}

	$url=get_info_url($id,$fid,$postdb[city_id]);

	//ɾ������;
	del_file(Mpath."cache/index/$city_id");
	del_file(Mpath."cache/list/$city_id-$fid");
	refreshto($url,$MSG,1);

}

/*ɾ������,ֱ��ɾ��,������*/
elseif($action=="del")
{
	$_erp=$Fid_db[tableid][$fid];
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content$_erp` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[fid]!=$fidDB[fid])
	{
		showerr("��Ŀ������");
	}
	if(!$lfjid)
	{
		check_power($rsdb);
	}
	elseif($rsdb[uid]!=$lfjuid&&!$web_admin&&!in_array($lfjid,explode(",",$fidDB[admin])))
	{
		check_power($rsdb);
	}

	del_info($id,$_erp,$rsdb);
	//$db->query(" UPDATE `{$_pre}sort` SET contents=contents-1 WHERE fid='$rsdb[fid]' ");
	//$db->query(" UPDATE `{$_pre}sort` SET contents=contents-1 WHERE fid='$fidDB[fup]' ");

	if($rsdb[yz]){
		add_user($lfjdb[uid],-$webdb[PostInfoMoney]);
	}

	$url=get_info_url('',$rsdb[fid],$rsdb[city_id]);
	refreshto($url,"ɾ���ɹ�");
}

/*�༭����*/
elseif($job=="edit")
{
	$_erp=$Fid_db[tableid][$fid];
	$rsdb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content$_erp` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if(!$lfjid){
		check_power($rsdb);
	}elseif($rsdb[uid]!=$lfjuid&&!$web_admin&&!in_array($lfjid,explode(",",$fidDB[admin]))){	
		check_power($rsdb);
		setcookie("editpwd_$id",$_POST[pwd]);
	}
	
	/*��Ĭ�ϱ���������*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="edit";

	//���ִ���
	$query = $db->query("SELECT * FROM `{$_pre}buyad` WHERE id='$id'");
	while($adrs = $db->fetch_array($query)){
		if($adrs[sortid]=='-1'){
			$buyfid['Index']=' checked ';
		}
		if($adrs[sortid]==$fid){
			$buyfid['Sort']=' checked ';
		}
		if($adrs[sortid]==$fidDB[fup]){
			$buyfid['BigSort']=' checked ';
		}
	}

	//$showtypeMSG="���޸�{$webdb[MoneyName]},ֻ������,ȡ������ٶ���Ч;�����ϸ�������,����ζ������һ��,";

	$city_id=$rsdb[city_id];
	$zone_id=$rsdb[zone_id];
	$street_id=$rsdb[street_id];

	$city_fid=select_where("{$pre}city","'postdb[city_id]'  onChange=\"choose_where('getzone',this.options[this.selectedIndex].value,'','1','')\"",$city_id);

	;
	$rsdb['list']>$timestamp?($ifTop[1]=' checked '):($ifTop[0]=' checked ');

	$rsdb[price]==0&&$rsdb[price]='';

	$query = $db->query("SELECT * FROM {$_pre}pic WHERE id='$id'");
	while($rs = $db->fetch_array($query)){
		$listdb[$rs[pid]]=$rs;
	}
	if(!$listdb){
		$listdb[]='';
	}

	require(Mpath."inc/head.php");
	require(getTpl("post_$fidDB[mid]",$FidTpl['post']));
	require(Mpath."inc/foot.php");
	$content=ob_get_contents();
	ob_end_clean();
	echo str_replace("document.domain","//document.domain",$content);
}

/*�����ύ���������޸�*/
elseif($action=="edit")
{
	if(!$postdb[city_id]){
		showerr("��ѡ�����");
	}
	$_erp=$Fid_db[tableid][$fid];
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content$_erp` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if(!$lfjid){	
		if(!$rsdb[editpwd]){
			showerr("�㻹û�е�¼");
		}elseif($rsdb[editpwd]!=$editpwd2){
			showerr("�������벻��!");
		}
	}elseif($rsdb[uid]!=$lfjuid&&!$web_admin&&!in_array($lfjid,explode(",",$fidDB[admin]))){
		if(!$rsdb[editpwd] || ($rsdb[editpwd]!=$editpwd2&&$rsdb[editpwd]!=$_COOKIE["editpwd_$id"])){
			showerr("����Ȩ�޸�");
		}	
	}

	if(!$postdb[title]){	
		showerr("��һ��������Ʋ���Ϊ��");
	}
	if($iftop){
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}content$_erp` WHERE list>'$timestamp' AND fid='$fid' AND city_id='$postdb[city_id]'"));
		if($webdb[Info_TopNum]&&$NUM>=$webdb[Info_TopNum]){
			showerr("��ǰ��Ŀ�ö���Ϣ�Ѵﵽ����!");
		}
		if($rsdb['list']<$timestamp){
			if($lfjdb[money]<$webdb[Info_TopMoney]){
				showerr("��Ļ��ֲ���:$webdb[Info_TopMoney],����ѡ���ö�");
			}
			$lfjdb[money]=$lfjdb[money]-$webdb[Info_TopMoney];
		}
	}

	//���ִ���
	$money=0;
	unset($adrs);
	$query = $db->query("SELECT * FROM `{$_pre}buyad` WHERE id='$id'");
	while($rs = $db->fetch_array($query)){
		$adrs[]=$rs[sortid];
	}	
	if(in_array('Index',$buyfid)&&!in_array('-1',$adrs)){
		$money+=$webdb[AdInfoIndexShow];
	}
	if(in_array('Sort',$buyfid)&&!in_array($fid,$adrs)){
		$money+=$webdb[AdInfoSortShow];
	}
	if(in_array('BigSort',$buyfid)&&!in_array($fidDB[fup],$adrs)){
		$money+=$webdb[AdInfoBigsortShow];
	}
	
	if($money>$lfjdb[money]){	
		showerr("���{$webdb[MoneyName]}����,���{$webdb[MoneyName]}Ϊ:$lfjdb[_money]{$webdb[MoneyDW]}");
	}
	
	//�Զ����ֶν���У������Ƿ�Ϸ�
	$Module_db->checkpost($field_db,$postdb,$rsdb);

	//�ϴ�����ͼƬ
	post_photo();

	unset($num,$postdb[picurl]);
	foreach( $photodb AS $key=>$value ){

		if(!$value&&$piddb[$key]){
			$db->query("DELETE FROM `{$_pre}pic` WHERE pid='{$piddb[$key]}' AND id='$id'");
		}

		if(!$value || !eregi("(gif|jpg|png)$",$value)){
			continue;
		}
		$titledb[$key]=filtrate($titledb[$key]);
		$value=filtrate($value);
		if($titledb[$key]>100){
			showerr("���ⲻ�ܴ���50������");
		}
		$num++;
		if($piddb[$key]){		
			$db->query("UPDATE `{$_pre}pic` SET name='{$titledb[$key]}',imgurl='$value' WHERE pid='{$piddb[$key]}' AND id='$id'");
		}else{
			$db->query("INSERT INTO `{$_pre}pic` ( `id` , `fid` , `mid` , `uid` , `type` , `imgurl` , `name` ) VALUES ( '$id', '$fid', '$mid', '$lfjuid', '0', '$value', '{$titledb[$key]}')");
		}
		if(!$postdb[picurl]){
			if(is_file(ROOT_PATH."$webdb[updir]/$value.gif")){
				$postdb[picurl]="$value.gif";
			}else{
				$postdb[picurl]=$value;
			}
		}
	}

	/*�ж��Ƿ�ΪͼƬ����*/
	$postdb[ispic]=$postdb[picurl]?1:0;

	if($postdb[showday]){
		if($rsdb[showday]){
			$postdb[endtime]=$rsdb[posttime]+$postdb[showday]*86400;
		}else{
			$postdb[endtime]=$timestamp+$postdb[showday]*86400;
		}
	}

	$SQL='';
	if($iftop){
		if($rsdb['list']<$timestamp){
			$list=$timestamp+3600*24*$webdb[Info_TopDay];
			$SQL=",list='$list'";
			add_user($lfjuid,-intval($webdb[Info_TopMoney]));
		}	
	}else{
		if($rsdb['list']>$timestamp){
			$SQL=",list='$rsdb[posttime]'";
		}
	}


	$postdb[keywords]=Info_keyword_ck($postdb[keywords]);

	if(isset($postdb[editpwd])){
		$SQL.=",editpwd='$postdb[editpwd]'";
	}

	/*��������Ϣ������*/
	$db->query("UPDATE `{$_pre}content$_erp` SET title='$postdb[title]',keywords='$postdb[keywords]',picurl='$postdb[picurl]',ispic='$postdb[ispic]',showday='$postdb[showday]',endtime='$postdb[endtime]',city_id='$postdb[city_id]',zone_id='$postdb[zone_id]',street_id='$postdb[street_id]',telephone='$postdb[telephone]',mobphone='$postdb[mobphone]',email='$postdb[email]',oicq='$postdb[oicq]',msn='$postdb[msn]',address='$postdb[address]',maps='$postdb[maps]',linkman='$postdb[linkman]',picnum='$num'$SQL WHERE id='$id'");


	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*���¸���Ϣ��*/
	$db->query("UPDATE `{$_pre}content_$fidDB[mid]` SET $sql WHERE id='$id'");


	add_user($lfjuid,"-$money");
	$endtime=$timestamp+$webdb[AdInfoShowTime]*24*3600;
	if(in_array('Index',$buyfid)&&!in_array('-1',$adrs)){
		$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('-1','$postdb[city_id]','$id','$rsdb[mid]','$lfjuid','$timestamp','$endtime','$money','')");
	}
	if(in_array('Sort',$buyfid)&&!in_array($fid,$adrs)){
		$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('$fid','$postdb[city_id]','$id','$rsdb[mid]','$lfjuid','$timestamp','$endtime','$money','')");
	}
	if(in_array('BigSort',$buyfid)&&!in_array($fidDB[fup],$adrs)){
		$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('$fidDB[fup]','$postdb[city_id]','$id','$rsdb[mid]','$lfjuid','$timestamp','$endtime','$money','')");
	}

	if(!in_array('Index',$buyfid)&&in_array('-1',$adrs)){
		$db->query("DELETE FROM `{$_pre}buyad` WHERE `sortid`='-1' AND id='$id'");
	}
	if(!in_array('Sort',$buyfid)&&in_array($fid,$adrs)){
		$db->query("DELETE FROM `{$_pre}buyad` WHERE `sortid`='$fid' AND id='$id'");
	}
	if(!in_array('BigSort',$buyfid)&&in_array($fidDB[fup],$adrs)){
		$db->query("DELETE FROM `{$_pre}buyad` WHERE `sortid`='$fidDB[fup]' AND id='$id'");
	}
	$url=get_info_url($id,$fid,$postdb[city_id]);

	refreshto($url,"�޸ĳɹ�",1);
}
else
{
	/*ģ������ʱ,��Щ�ֶ���Ĭ��ֵ*/
	foreach( $field_db AS $key=>$rs){	
		if($rs[form_value]){		
			$rsdb[$key]=$rs[form_value];
		}
	}

	/*��Ĭ�ϱ���������*/
	$Module_db->formGetVale($field_db,$rsdb);

	/*�����ֶ�,һ�㲻��*/
	$fid_bak1 && $rsdb[fid_bak1]=$fid_bak1;
	$fid_bak2 && $rsdb[fid_bak2]=$fid_bak2;
	$fid_bak3 && $rsdb[fid_bak3]=$fid_bak3;

	$atc="postnew";
	$buyfid[0]=' checked ';
	if(!$city_id){
		$city_id=$_COOKIE[city_id];
	}
	$city_fid=select_where("{$pre}city","'postdb[city_id]'  onChange=\"choose_where('getzone',this.options[this.selectedIndex].value,'','1','')\" ",$city_id);

	$ifTop[0]=' checked ';

	$rsdb[linkman]=$lfjid;
	$rsdb[telephone]=$lfjdb[telephone];
	$rsdb[mobphone]=$lfjdb[mobphone];
	$rsdb[email]=$lfjdb[email];
	$rsdb[oicq]=$lfjdb[oicq];
	$rsdb[msn]=$lfjdb[msn];

	$listdb[]='';

	require(Mpath."inc/head.php");
	require(getTpl("post_$fidDB[mid]",$FidTpl['post']));
	require(Mpath."inc/foot.php");
	$content=ob_get_contents();
	ob_end_clean();
	echo str_replace("document.domain","//document.domain",$content);
}


function set_table_value($field_db){
	global $rsdb;
	foreach( $field_db AS $key=>$rs){
		if($rs[form_type]=='select'){
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if($rsdb[$key]==$v1){
					unset($rsdb[$key]);
					$rsdb[$key]["$v1"]=' selected ';
				}
			}
		}elseif($rs[form_type]=='radio'){
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if($rsdb[$key]==$v1){
					unset($rsdb[$key]);
					$rsdb[$key]["$v1"]=' checked ';
				}
			}
		}elseif($rs[form_type]=='checkbox'){
			$_d=explode("/",$rsdb[$key]);
			unset($rsdb[$key]);
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if( @in_array($v1,$_d) ){
					$rsdb[$key]["$v1"]=' checked ';
				}
			}
		}
	}
}


function yz_check(){
	global $webdb,$postdb,$onlineip,$db,$_pre,$timestamp,$lfjuid,$Fid_db,$fid;
	$_erp=$Fid_db[tableid][$fid];
	$Info_YzKeyword=explode("\r\n",$webdb[Info_YzKeyword]);
	$Info_DelKeyword=explode("\r\n",$webdb[Info_DelKeyword]);

	//�������վ�ıȽϹؼ�,����Ҫ��ǰ�ȴ���
	foreach( $postdb AS $key=>$value){
		foreach( $Info_DelKeyword AS $key2=>$value2){
			if( $value2 && strstr($value,$value2) ){
				$postdb[$key]=str_replace($value2,"**�Ƿ�����**",$postdb[$key])."<hr>�������紿�������𷢲��Ƿ���Ϣ��";
				$postdb[yz]=2;
			}
		}
	}
	if($postdb[yz]==2){
		add_user($lfjuid,-abs($webdb[illInfoMoney]));
		return "���ݵ��а����зǷ�����,�����ѱ�ϵͳ�Զ��������վ";
	}

	if( $webdb[Info_postCkIp]&&$fromcityid=get_area($onlineip)&&$postdb[city_id] ){
		if($fromcityid!=$postdb[city_id]){
			$postdb[yz]=0;
			return "��ѡ��ĳ��и������ڳ��в�����,������Ҫ����Ա���";
		}
	}
	foreach( $postdb AS $key=>$value){
		foreach( $Info_YzKeyword AS $key2=>$value2){
			if(!$value2){
				continue;
			}
			if($webdb[Info_YzKeyword_DO]==1&&strstr(preg_replace("/ |��/is","",$postdb[$key]),$value2)){
				$postdb[yz]=2;
				return "���ݵ��а����зǷ�����,�����ѱ�ϵͳ�Զ��������վ";
			}elseif($webdb[Info_YzKeyword_DO]==2&&strstr(preg_replace("/ |��/is","",$postdb[$key]),$value2)){
				showerr("���ݵ��а����зǷ�����");
			}else{
				if(strstr(preg_replace("/ |��/is","",$postdb[$key]),$value2)){
					$postdb[$key]=str_replace($value2,"***",preg_replace("/ |��/is","",$postdb[$key]));
				}			
			}		
		}
		if($webdb[Info_PostMaxLeng]&&strlen($value)>$webdb[Info_PostMaxLeng]){
			$postdb[yz]=0;
			return "���ݹ���,������Ҫ����Ա���";
		}
	}
	if( $webdb[Info_postCkMob] && $fromcityid=get_mob_cityid($postdb[mobphone]) && $postdb[city_id] ){
		if($fromcityid!=$postdb[city_id]){
			$postdb[yz]=0;
			return "�ֻ��������ڵ��������ڳ��в�����,������Ҫ����Ա���";
		}		
	}
}

function get_mob_cityid($phone){
	global $city_DB;
	$mob_area=get_mob_area($phone);
	foreach( $city_DB[name] AS $key2=>$value2 ){
		$value2=str_replace("��","",$value2);
		if(strstr($mob_area,$value2)){
			return $key2;
		}
	}
}


function list_allsort($fid,$Class){
	global $db,$_pre,$listdb,$web_admin,$lfjdb,$lfjid,$webdb,$groupdb;
	$Class++;
	$query=$db->query("SELECT S.*,M.name AS m_name FROM {$_pre}sort S LEFT JOIN {$_pre}module M ON S.mid=M.id where S.fup='$fid' ORDER BY S.list DESC");
	while( $rs=$db->fetch_array($query) ){
		$icon="";
		for($i=1;$i<$Class;$i++){
			$icon.="&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($icon){
			$icon=substr($icon,0,-24);
			$icon.="--";
		}
		$rs[icon]=$icon;

		$rs[allow]=1;
		if( $webdb[GroupPostInfo]&&in_array($groupdb[gid],explode(",",$webdb[GroupPostInfo])) )
		{
			if( !$web_admin&&(!$lfjid||!in_array($lfjid,explode(",",$rs[admin]))) ){
				$rs[allow]=0;
			}
		
		}
		if($rs[allowpost]&&!in_array($groupdb[gid],explode(",",$rs[allowpost]))){
			if(!$web_admin&&(!$lfjid||!in_array($lfjid,explode(",",$rs[admin])))){
				$rs[allow]=0;
			}
		}
		if($rs[type]==2){
			$rs[_alert]="onclick=\"alert('��ƪ�����²�������Ŀ,�������¿�������Ŀ');return false;\" style='color:#ccc;'";
			$rs[color]="red";
			$rs[_ifcontent]="onclick=\"alert('��ƪ�����²����ж�ƪ��������,Ҳ���ܷ����ƪ��������,����Ŀ�¿���������');return false;\" style='color:#ccc;'";
		}elseif($rs[type]==1){
			$rs[_alert]="";
			$rs[color]="red";
			$rs[_ifcontent]="onclick=\"alert('�����²���������,Ҳ���ܷ�������,����Ŀ�¿���������');return false;\" style='color:#ccc;'";
		}elseif(!$rs[allow]){
			$rs[_alert]="onclick=\"alert('��ûȨ���ڱ���Ŀ��������');return false;\" style='color:#ccc;'";
			$rs[color]="";
			$rs[_ifcontent]="onclick=\"alert('��ûȨ���ڱ���Ŀ��������');return false;\" style='color:#ccc;'";
		}
		$listdb[]=$rs;
		list_allsort($rs[fid],$Class);
	}
}

//�ϴ�ͼƬ
function post_photo(){
	global $ftype,$fid,$webdb,$photodb,$groupdb,$_pre;

	if($groupdb['gid']==2){
		$picnum=$webdb[Info_GuestPostPicNum]!=''?intval($webdb[Info_GuestPostPicNum]):3;
	}elseif($groupdb['gid']==8){
		$picnum=$webdb[Info_MemberPostPicNum]!=''?intval($webdb[Info_MemberPostPicNum]):10;
	}else{
		$picnum=80;
	}

	foreach( $_FILES AS $key=>$value ){
		$i=(int)substr($key,10);
		if(is_array($value)){
			$postfile=$value['tmp_name'];
			$array[name]=$value['name'];
			$array[size]=$value['size'];
		} else{
			$postfile=$$key;
			$array[name]=${$key.'_name'};
			$array[size]=${$key.'_size'};
		}
		if($ftype[$i]=='in'&&$array[name]){

			$jj++;
			if($jj>$picnum){
				unset($photodb[$i]);
				continue;
			}

			if(!eregi("(gif|jpg|png)$",$array[name])){
				showerr("ֻ���ϴ�GIF,JPG,PNG��ʽ���ļ�,�㲻���ϴ����ļ�:$array[name]");
			}
			$array[path]=$webdb[updir]."/$_pre/$fid";

			$array[updateTable]=1;	//ͳ���û��ϴ����ļ�ռ�ÿռ��С
			$filename=upfile($postfile,$array);
			$photodb[$i]="$_pre/$fid/$filename";

			$smallimg=$photodb[$i].'.gif';
			$Newpicpath=ROOT_PATH."$webdb[updir]/$smallimg";
			gdpic(ROOT_PATH."$webdb[updir]/{$photodb[$i]}",$Newpicpath,300,220,array('fix'=>1));

			/*��ˮӡ*/
			if( $webdb[is_waterimg] && $webdb[if_gdimg] )
			{
				include_once(ROOT_PATH."inc/waterimage.php");
				$uploadfile=ROOT_PATH."$webdb[updir]/$photodb[$i]";
				imageWaterMark($uploadfile,$webdb[waterpos],ROOT_PATH.$webdb[waterimg]);
			}
		}
	}
}


function check_power($rs){
	unset($GLOBALS[rs]);
	extract($GLOBALS);

	if(!$rs[editpwd]){
		showerr("����Ȩ����!");
	}
	if($_POST[pwd]&&$_POST[pwd]!=$rs[editpwd]){
		showerr("���벻��ȷ!");	
	}elseif(!$_POST[pwd]){
		require(Mpath."inc/head.php");
print<<<EOT
<form name="form1" method="post" action="">
  <div align="center" style="margin:20px;">�����뱾����Ϣ�Ĺ�������: 
    <input type="password" name="pwd" size="15">
    <input type="submit" name="Submit" value="�ύ">
    <input type="button" name="Submit2" value="����" onclick="window.location.href='$FROMURL'">
  </div>
</form>
EOT;
		require(Mpath."inc/foot.php");
		exit;
	}
}
?>