<?php
require_once(dirname(__FILE__)."/"."global.php");
@include_once(ROOT_PATH."data/all_area.php");
if(!$lfjid){
	showerr("�㻹û��¼");
}

if($lfjdb[sex]==1){
	$lfjdb[sex]='��';
}elseif($lfjdb[sex]==2){
	$lfjdb[sex]='Ů';
}else{
	$lfjdb[sex]='����';
}

$group_db=$db->get_one("SELECT totalspace,grouptitle FROM {$pre}group WHERE gid='$lfjdb[groupid]' ");

//�û���ʹ�ÿռ�
$lfjdb[usespace]=number_format($lfjdb[usespace]/(1024*1024),3);

//ϵͳ����ʹ�ÿռ�
$space_system=number_format($webdb[totalSpace],0);

//�û�������ʹ�ÿռ�
$space_group=number_format($group_db[totalspace],0);

//�û�������еĿռ�
$space_user=number_format($lfjdb[totalspace]/(1024*1024),0);

//�û����¿��ÿռ��С
$onlySpace=number_format($webdb[totalSpace]+$group_db[totalspace]+$lfjdb[totalspace]/(1024*1024)-$lfjdb[usespace],3);

$lfjdb[lastvist]=date("Y-m-d H:i:s",$lfjdb[lastvist]);
$lfjdb[regdate]=date("Y-m-d H:i:s",$lfjdb[regdate]);
$lfjdb[money]=get_money($lfjdb[uid]);

if($lfjdb[C][endtime]&&$lfjdb[groupid]!=8){
	$lfjdb[C][endtime]=date("Y-m-d",$lfjdb[C][endtime]);
	$lfjdb[C][endtime]="��{$lfjdb[C][endtime]}��ֹ";
}else{
	$lfjdb[C][endtime]='������Ч';
}

if( ereg("^dzbbs",$webdb[passport_type]) ){
	if($webdb[passport_type]=='dzbbs7'){
		$pmNUM=uc_pm_checknew($lfjuid);
	}else{
		@extract($db->get_one("SELECT COUNT(*) AS pmNUM FROM {$TB_pre}pms WHERE `msgtoid`='$lfjuid' AND folder='inbox' AND new=1"));
	}			
}else{
	@extract($db->get_one("SELECT COUNT(*) AS pmNUM FROM `{$pre}pm` WHERE `touid`='$lfjuid' AND type='rebox' AND ifnew='1'"));
}

unset($fenleiNum,$tgNum,$shopNum,$couponNum,$companyNum);


extract($db->get_one(" SELECT COUNT(*) AS fenleiNum FROM {$pre}fenlei_db WHERE city_id='$city_id'"));
extract($db->get_one(" SELECT COUNT(*) AS tgNum FROM {$pre}tuangou_content WHERE city_id='$city_id'"));
extract($db->get_one(" SELECT COUNT(*) AS shopNum FROM {$pre}shop_content WHERE city_id='$city_id'"));
extract($db->get_one(" SELECT COUNT(*) AS couponNum FROM {$pre}coupon_content WHERE city_id='$city_id'"));
extract($db->get_one(" SELECT COUNT(*) AS companyNum FROM {$pre}hy_company WHERE city_id='$city_id'"));



$companyDB=$db->get_one("SELECT * FROM `{$pre}hy_company` WHERE uid='$lfjuid'");

require(dirname(__FILE__)."/"."head.php");
require(dirname(__FILE__)."/"."template/map.htm");
require(dirname(__FILE__)."/"."foot.php");

?>