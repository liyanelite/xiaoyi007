<?php

//ΪĳЩ����������ʹ��
$search_fid_select="<select name='fid' onChange=\"if(this.options[this.selectedIndex].value=='-1'){alert('�㲻��ѡ������');}\"><option value='0' style='color:#aaa;'>������Ŀ</option>";
foreach( $Fid_db[0] AS $key=>$value){
	$search_fid_select.="<option value='-1' style='color:red;'>$value</option>";
	foreach( $Fid_db[$key] AS $key2=>$value2){
		$search_fid_select.="<option value='$key2'>&nbsp;&nbsp;|--$value2</option>";
	}
}
$search_fid_select.="</select>";
$search_city_fid=select_where("{$pre}city","'postdb[city_id]'  onChange=\"choose_where('getzone',this.options[this.selectedIndex].value,'','1','H')\"",$city_id);



//����JSʱ����ʾ��,����Ի���ͼƬ,'��Ҫ��\
$Load_Msg="<img alt=\"���ݼ�����,���Ժ�...\" src=\"$webdb[www_url]/images/default/ico_loading3.gif\">";


if(!$city_id){
	$city_DB[name][0]=$webdb[Info_areaname]?$webdb[Info_areaname]:'ȫ��';
	$city_DB[fup][0]=0;
}
$GuideFid[$fid]=preg_replace("/list\.php\?fid=([0-9]+)/eis","get_info_url('','\\1','$city_id')",$GuideFid[$fid]);
require(ROOT_PATH."inc/head.php");
?>