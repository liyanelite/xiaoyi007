<?php
!function_exists('html') && exit('ERR');

require_once(Mpath."function.ad.php");

$array_adtype=array(
					"word"=>"���ֹ��",
					"pic"=>"ͼƬ���",
					"swf"=>"FLASH���",
					"code"=>"������",
					"duilian"=>"�������",
					"updown"=>"�����������",
					);

//�г�����
if($job=="listad"&&ck_power('norm_listad')){
	$query = $db->query("SELECT AD.* FROM {$pre}ad_norm_place AD ORDER BY AD.id DESC");
	while($rs = $db->fetch_array($query)){
		$rs[begintime]=$rs[begintime]?date("Y-m-d H:i:s",$rs[begintime]):'';
		$rs[endtime]=$rs[endtime]?date("Y-m-d H:i:s",$rs[endtime]):'';
		if($rs[ifsale]){
			$rs[_ifsale]='<font color="red">������</font>';
		}else{
			$rs[_ifsale]='��ֹ����';
		}
		$listdb[]=$rs;
	}
	get_admin_html('listad');
}

//��ӹ��
elseif($job=="addplace"&&ck_power('norm_listad'))
{
	$rsdb[type]='word';
	$rsdb[keywords]="AD_".rand(1,9999);
	$_pictarget[blank]=$_wordtarget[blank]=" checked ";
	$rsdb[ifsale]=1;
	$ifsale[$rsdb[ifsale]]=' checked ';
	$autoyz[1]=' checked ';
	get_admin_html('addplace');
}

//�޸Ĺ��
elseif($job=="editadplace"&&ck_power('norm_listad'))
{
	$rsdb=$db->get_one("SELECT * FROM `{$pre}ad_norm_place` WHERE id='$id'");
	@extract(unserialize($rsdb[adcode]));
	$code=stripslashes($code);
	$rsdb[isclose]=intval($rsdb[isclose]);
	$isclose[$rsdb[isclose]]=" checked ";
	$pictarget||$pictarget='blank';
	$wordtarget||$wordtarget='blank';
	$_pictarget[$pictarget]=" checked ";
	$_wordtarget[$wordtarget]=" checked ";
	$ifsale[$rsdb[ifsale]]=' checked ';
	$autoyz[$rsdb[autoyz]]=' checked ';

	$rsdb[begintime]&&$rsdb[begintime]=date("Y-m-d H:i:s",$rsdb[begintime]);
	$rsdb[endtime]&&$rsdb[endtime]=date("Y-m-d H:i:s",$rsdb[endtime]);

	$code=editor_replace($code);

	get_admin_html('addplace');
}

//�����޸Ĺ��
elseif($action=="editadplace"&&ck_power('norm_listad'))
{
	if($postdb[type]=='word'){
		$cdb[linkurl]=$wordlinkurl;
		$cdb[wordtarget]=$wordtarget;
	}elseif($postdb[type]=='pic'||$postdb[type]=='updown'){
		$cdb[width]=$picwidth;
		$cdb[height]=$picheight;
		$cdb[pictarget]=$pictarget;
	}elseif($postdb[type]=='swf'){
		$cdb[width]=$swfwidth;
		$cdb[height]=$swfheight;
	}elseif($postdb[type]=='duilian'){
		$cdb[l_src]=$l_src;
		$cdb[l_link]=$l_link;
		$cdb[l_width]=$l_width;
		$cdb[l_height]=$l_height;
		$cdb[r_src]=$r_src;
		$cdb[r_link]=$r_link;
		$cdb[r_width]=$r_width;
		$cdb[r_height]=$r_height;
	}
	if($postdb[type]=='updown'){
		$cdb[second_time]=$second_time;
		$cdb[hour_time]=$hour_time;
	}


	$cdb[code]=stripslashes($cdb[code]);
	$postdb[adcode]=addslashes(serialize($cdb));

	if($ifsale)
	{
		$begintime=$endtime=0;
	}

	$begintime&&$begintime=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$begintime);
	$endtime&&$endtime=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$endtime);

	$db->query("UPDATE `{$pre}ad_norm_place` SET name='$postdb[name]',demourl='$postdb[demourl]',keywords='$postdb[keywords]',adcode='$postdb[adcode]',type='$postdb[type]',isclose='$isclose',ifsale='$ifsale',moneycard='$moneycard',autoyz='$autoyz',begintime='$begintime',endtime='$endtime' WHERE id='$id' ");
	make_ad_cache();
	jump("�޸ĳɹ�","$admin_path&job=listad",1);
}

//������ӹ��
elseif($action=="addplace"&&ck_power('norm_listad'))
{
	if($postdb[type]=='word'){
		$cdb[linkurl]=$wordlinkurl;
		$cdb[wordtarget]=$wordtarget;
	}elseif($postdb[type]=='pic'||$postdb[type]=='updown'){
		$cdb[width]=$picwidth;
		$cdb[height]=$picheight;
		$cdb[pictarget]=$pictarget;
		if(!$cdb[width]||!$cdb[height]) showmsg('�߶����Ȳ���Ϊ��!');
	}elseif($postdb[type]=='swf'){
		$cdb[width]=$swfwidth;
		$cdb[height]=$swfheight;
		if(!$cdb[width]||!$cdb[height]) showmsg('�߶����Ȳ���Ϊ��!');
	}elseif($postdb[type]=='duilian'){
		$cdb[l_src]=$l_src;
		$cdb[l_link]=$l_link;
		$cdb[l_width]=$l_width;
		$cdb[l_height]=$l_height;
		$cdb[r_src]=$r_src;
		$cdb[r_link]=$r_link;
		$cdb[r_width]=$r_width;
		$cdb[r_height]=$r_height;
	}
	if($postdb[type]=='updown'){
		$cdb[second_time]=$second_time;
		$cdb[hour_time]=$hour_time;
	}
	$cdb[code]=stripslashes($cdb[code]);
	$postdb[adcode]=addslashes(serialize($cdb));
	
	if($ifsale)
	{
		$begintime=$endtime=0;
	}

	$begintime&&$begintime=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$begintime);
	$endtime&&$endtime=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$endtime);

	$db->query("INSERT INTO `{$pre}ad_norm_place` (`name` ,`demourl` , `keywords` , `adcode` , `type`, `ifsale`, `moneycard`, `autoyz`, `begintime`, `endtime` ) 
				VALUES (
		'$postdb[name]','$postdb[demourl]','$postdb[keywords]','$postdb[adcode]','$postdb[type]','$ifsale','$moneycard','$autoyz','$begintime','$endtime'
		)");
	make_ad_cache();
	jump("��ӳɹ�","$admin_path&job=listad",1);
}

//ɾ�����
elseif($action=='deleteadplace'&&ck_power('norm_listad'))
{
	$db->query("DELETE FROM `{$pre}ad_norm_place` WHERE id='$id'");
	$db->query("DELETE FROM `{$pre}ad_norm_user` WHERE id='$id'");
	make_ad_cache();
	jump("ɾ���ɹ�","$FROMURL",1);
}
elseif($job=="listuserad"&&ck_power('norm_listuserad'))
{
	if($page<1){
		$page=1;
	}
	$rows=30;
	$min=($page-1)*$rows;
	$query = $db->query("SELECT A.*,B.* FROM `{$pre}ad_norm_user` A LEFT JOIN `{$pre}ad_norm_place` B ON A.id=B.id ORDER BY A.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		if($rs[u_begintime]){
			$rs[u_begintime]=date("Y-m-d H:i",$rs[u_begintime]);
		}else{
			$rs[u_begintime]='';
		}
		if($rs[u_endtime]){
			$rs[u_endtime]=date("Y-m-d H:i",$rs[u_endtime]);
		}else{
			$rs[u_endtime]='';
		}
		/*if($rs[u_yz]){
			$rs[u_yz]="<A HREF='#' style='color:red;'>����</A>";
		}else{
			$rs[u_yz]="<A HREF='?lfj=$lfj&action=yz&yz=1&u_id=$rs[u_id]' style='color:blue;'>δ��</A>";
		}*/
		if($rs[u_yz]){
            $rs[u_yz]="<A HREF='$admin_path&action=yz&yz=0&u_id=$rs[u_id]' style='color:red;'>����</A>";
        }else{ 
            $rs[u_yz]="<A HREF='$admin_path&action=yz&yz=1&u_id=$rs[u_id]' style='color:blue;'>δ��</A>";
        }
		
		$rs[u_posttime]=date("Y-m-d H:i",$rs[u_posttime]);
		$listdb[]=$rs;
	}

	get_admin_html('listuserad');
}
elseif($action=='yz'&&ck_power('norm_listuserad'))
{
	$rsdb=$db->get_one("SELECT * FROM `{$pre}ad_norm_user` WHERE u_id='$u_id'");

	$SQL='';
	if($yz&&!$rsdb[u_begintime])
	{
		$_rs[money]=intval(get_money($rsdb[u_uid]));
		if($_rs[money]<$rsdb[u_moneycard]){
			showmsg("��ǰ�û���{$webdb[MoneyName]}����:{$rsdb[u_moneycard]},������{$webdb[MoneyName]}:$_rs[money]");
		}
		$rsdb[u_endtime]=$timestamp+3600*24*$rsdb[u_day];
		$SQL=",u_begintime='$timestamp',u_endtime='$rsdb[u_endtime]'";
		add_user($rsdb[u_uid],-$rsdb[u_moneycard],'������ͨ���۷�');	//�۳�����
	}
	$db->query("UPDATE `{$pre}ad_norm_user` SET u_yz='$yz'$SQL WHERE u_id='$u_id'");
	make_ad_cache();
	jump("�����ɹ�",$FROMURL,0);
}
elseif($action=='delete_u_ad'&&ck_power('norm_listuserad'))
{
	$db->query("DELETE FROM {$pre}ad_norm_user WHERE u_id='$u_id'");
	make_ad_cache();
	jump("�����ɹ�",$FROMURL,2);
}
elseif($job=="edituserad"&&ck_power('norm_listuserad'))
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM {$pre}ad_norm_user B LEFT JOIN {$pre}ad_norm_place A ON A.id=B.id WHERE B.u_id='$u_id'");
	@extract(unserialize($rsdb[u_code]));
	if($rsdb[autoyz]){
		$rsdb[_ifyz]='�Զ�ͨ�����';
	}else{
		$rsdb[_ifyz]='�ֹ����';
	}
	$id=$rsdb[id];

	get_admin_html('edituserad');
}
elseif($action=="edituserad"&&ck_power('norm_listuserad'))
{
	if($atc_day<1)
	{
		showmsg("����Ĺ�治��С��һ��");
	}
	
	$rsdb=$db->get_one("SELECT A.*,B.* FROM {$pre}ad_norm_user B LEFT JOIN {$pre}ad_norm_place A ON A.id=B.id WHERE B.u_id='$u_id'");

	if($rsdb[u_endtime]<$timestamp)
	{
		showmsg("���ڹ�治�����޸�");
	}
	elseif((($rsdb[u_endtime]-$timestamp)<24*3600)&&$atc_day<$rsdb[u_day])
	{
		showmsg("�����ڽ�Ҫ���ڵĹ�治�ܰ����ڸ�С");
	}
	//$rsdb=$db->get_one("SELECT * FROM {$pre}ad_norm_place WHERE id='$id'");

	$totalmoneycard=$u_moneycard=$rsdb[moneycard]*$atc_day;
	$lfjdb[moneycard]=intval($lfjdb[moneycard]);
	
	$cdb=unserialize($rsdb[adcode]);
	
	if($rsdb[type]=='word'){
		$cdb[word]=$atc_word;
		$cdb[linkurl]=$atc_url;
	}elseif($rsdb[type]=='pic'||$postdb[type]=='updown'){
		$cdb[picurl]=$atc_img;
		$cdb[linkurl]=$atc_url;
	}elseif($rsdb[type]=='swf'){
		$cdb[flashurl]=$atc_url;
	}elseif($rsdb[type]=='duilian'){
		$cdb[l_src]=$l_src;
		$cdb[l_link]=$l_link;
		$cdb[r_src]=$r_src;
		$cdb[r_link]=$r_link;
	}
	$cdb[code]=stripslashes($atc_code);
	$u_code=addslashes(serialize($cdb));

	$u_yz=$rsdb[autoyz];
	if($rsdb[autoyz])
	{
		$u_begintime=$rsdb[u_begintime];
		$u_endtime=$rsdb[u_endtime]+($atc_day-$rsdb[u_day])*3600*24;

		if(!$rsdb[u_yz])
		{
			if($totalmoneycard>$lfjdb[moneycard])
			{
				//showmsg("����$totalmoneycard,����:$lfjdb[moneycard]");
			}

		}
		else
		{
			if( $totalmoneycard>($lfjdb[moneycard]+$rsdb[u_money]) )
			{
				//showmsg("����,����:$lfjdb[moneycard]");
			}
		}			
	}
	else
	{
		if($totalmoneycard>$lfjdb[moneycard])
		{
			//showmsg("����$totalmoneycard,����:$lfjdb[moneycard]");
		}
		$u_begintime=$u_endtime=0;
	}

	$u_hits=0;
	$db->query("UPDATE `{$pre}ad_norm_user` SET `u_day`='$atc_day',`u_begintime`='$u_begintime',`u_endtime`='$u_endtime',`u_code`='$u_code',`u_money`='$u_money',`u_moneycard`='$u_moneycard' WHERE u_id='$u_id'");
	
	make_ad_cache();
	jump("�޸ĳɹ�",$FROMURL,"3");
}
?>