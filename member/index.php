<?php
require_once(dirname(__FILE__)."/"."global.php");

if(!$lfjid){
	showerr("�㻹û��¼");
}

if($web_admin){
	$power=3;
}else{
	$power=1;
}

//if( $db->get_one("SELECT fid FROM {$pre}sort WHERE BINARY admin LIKE '%$lfjid%' LIMIT 1") ){
//	$power=2;
//}

preg_match("/(.*)\/(index\.php|)\?main=(.+)/is",$WEBURL,$UrlArray);
$MainUrl=$UrlArray[3]?$UrlArray[3]:"map.php?uid=$lfjuid";
if(eregi('^http',$MainUrl)&&!eregi("^$webdb[www_url]",$MainUrl)){
	showerr('URL����ֹ��!');
}

unset($menudb);

//�跨��ȡ��̨�Զ���˵�
$query = $db->query("SELECT * FROM {$pre}admin_menu WHERE groupid='-$lfjdb[groupid]' AND fid=0 ORDER BY list DESC");
while($rs = $db->fetch_array($query)){
	$query2 = $db->query("SELECT * FROM {$pre}admin_menu WHERE fid='$rs[id]' ORDER BY list DESC");
	while($rs2 = $db->fetch_array($query2)){
		$menudb[$rs[name]][$rs2[name]]['link']=$rs2['linkurl'];
	}
}

//��̨�������Զ���˵�,����Ĭ�ϵ�
if(!$menudb){

	require_once(dirname(__FILE__)."/"."menu.php");

	//��ȡģ��ϵͳ�Ļ�Ա�˵�
	$query = $db->query("SELECT * FROM {$pre}module WHERE type=2 AND ifclose=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$array=@include(ROOT_PATH."$rs[dirname]/member/menu.php");
		foreach($array AS $key=>$value){
			$value['link']="$webdb[www_url]/$rs[dirname]/member/".$value['link'];
			$menudb["$rs[name]"][$key]=$value;
		}
	}
}


require(get_member_tpl('index'));


//��������������,�����Ļ�$webdb[www_url]='/.';
if($webdb[www_url]=='/.'){
	$content=str_replace('/./','/',ob_get_contents());
	ob_end_clean();
	echo $content;
}

?>