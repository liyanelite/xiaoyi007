<?php
!function_exists('html') && exit('ERR');
unset($menu_partDB,$menudb,$menu_partDB);
$base_menuName=array('base'=>'ϵͳ����','article'=>'CMS����','member'=>'��Ա����','module'=>'ģ������','other'=>'�������');
$menu_partDB = array(
	'base'=>array('��������','��վ���ù��ܹ���','���ݿ⹤��','�˵�����'),
	'article'=>array('���»�������','����/��Ŀ/���۹���','��̬ҳ���ɹ���','���±�ǩ����','ר�����','����Ŀ����'),
	'member'=>array('�û�����','Ȩ�޹���'),
);

$menudb=array(
	'��������'=>array(
		'��վȫ�ֲ�������' => array('power'=>'center_config','link'=>'index.php?lfj=center&job=config'),
		'��Աע������' => array('power'=>'user_reg','link'=>'index.php?lfj=center&job=user_reg'),
		'���е�������' => array('power'=>'city_zone','link'=>'index.php?lfj=city&job=city'),
		'ϵͳģ�����' => array('power'=>'module_list','link'=>'index.php?lfj=module&job=list'),		
		'�������' => array('power'=>'hack_list','link'=>'index.php?lfj=hack&job=list'),
		'�����ⲿ��̳ϵͳ����' => array('power'=>'blend_set','link'=>'index.php?lfj=blend&job=set'),
	),
	'��վ���ù��ܹ���'=>array(
		'�������ӹ���' => array('power'=>'friendlink_mod','link'=>'index.php?lfj=friendlink&job=list'),
		'��ƪ���¶���ҳ�����' => array('power'=>'alonepage_list','link'=>'index.php?lfj=alonepage&job=list'),
	),
	'���ݿ⹤��'=>array(
		'�������ݿ�' => array('power'=>'mysql_out','link'=>'index.php?lfj=mysql&job=out'),
		'���ݿ⻹ԭ' => array('power'=>'mysql_into','link'=>'index.php?lfj=mysql&job=into'),
		'ɾ����������' => array('power'=>'mysql_del','link'=>'index.php?lfj=mysql&job=del'),
		'���ݿ⹤��' => array('power'=>'mysql_sql','link'=>'index.php?lfj=mysql&job=sql'),
	),
	'�˵�����'=>array(
		'��վͷ�������˵�����' => array('power'=>'menu_list','link'=>'index.php?lfj=guidemenu&job=list'),
		'����Ա��̨�˵�����' => array('power'=>'adminmenu_list','link'=>'index.php?lfj=adminguidemenu&job=list'),
		'��Ա���Ĳ˵�����' => array('power'=>'membermenu_list','link'=>'index.php?lfj=memberguidemenu&job=list'),
	),
	'�û�����'=>array(
		'�û����Ϲ���' => array('power'=>'member_list','link'=>'index.php?lfj=member&job=list'),
		'��ҵ���Ϲ���' => array('power'=>'company_list','link'=>'index.php?lfj=company&job=list'),
		'�û������ֶι���' => array('power'=>'regfield','link'=>'index.php?lfj=regfield&job=editsort'),
		'������û�' => array('power'=>'member_addmember','link'=>'index.php?lfj=member&job=addmember'),
	),
	'Ȩ�޹���'=>array(
		'ǰ̨Ȩ�޹���' => array('power'=>'group_list','link'=>'index.php?lfj=group&job=list'),
		'��̨Ȩ�޹���' => array('power'=>'group_list_admin','link'=>'index.php?lfj=group&job=list_admin'),
		'����û���' => array('power'=>'group_add','link'=>'index.php?lfj=group&job=add'),
	),

);


@include(dirname(__FILE__).'/cms_menu.php');

@include(ROOT_PATH."data/hack.php");

if($ForceEnter||$GLOBALS[ForceEnter]){

	//ǿ�ƽ���̨
	foreach( $menu_partDB AS $key1=>$value1){
		if($key1=='base'){
			continue;
		}
		foreach( $value1 AS $key2=>$value2){
			$menu_partDB['base'][]=$value2;
		}
	}
}else{

	if(!table_field("{$pre}module",'ifsys')){
		$db->query("ALTER TABLE `{$pre}module` ADD `ifsys` TINYINT( 1 ) NOT NULL");
	}
	//ģ��
	$query = $db->query("SELECT * FROM {$pre}module WHERE type=2 AND ifclose=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		if(!$rs['dirname']){
			continue;
		}
		if($rs['ifsys']){	//�����Ķ����˵�
			$base_menuName[$rs['pre']]=$rs['name'];
			$menu_partDB[$rs['pre']][]=$rs['name'];
		}else{
			$menu_partDB['module'][]=$rs['name'];
		}		
		$menudb[$rs['name']]=@include(ROOT_PATH."$rs[dirname]/admin/menu.php");
		foreach($menudb[$rs['name']] AS $key=>$value){
			if(eregi('^file=',$menudb[$rs['name']][$key]['link'])){
				$menudb[$rs['name']][$key]['link']="index.php?lfj=module_admin&dirname=$rs[dirname]&".$menudb[$rs['name']][$key]['link'];

				if($menudb[$rs['name']][$key]['power']!=1){
					$menudb[$rs['name']][$key]['power']="Module_".$rs[pre].$menudb[$rs['name']][$key]['power'];					
				}
			}
			if($rs['ifsys']&&$value['sort']){
				$keyname=get_word($rs['name'],4,0).">{$value['sort']}";
				$menu_partDB[$rs['pre']][$keyname]=$keyname;
				$menudb[$keyname][$key]=$menudb[$rs['name']][$key];
				unset($menudb[$rs['name']][$key]);
				
			}
		}
	}
}


?>