<?php
if(!function_exists('html')){
die('F');
}

@extract($db->get_one("SELECT COUNT(*) AS fenlei_num FROM {$pre}fenlei_content"));
@extract($db->get_one("SELECT COUNT(*) AS hy_num FROM {$pre}hy_company"));
@extract($db->get_one("SELECT COUNT(*) AS shop_num FROM {$pre}shop_content"));
@extract($db->get_one("SELECT COUNT(*) AS member_num FROM {$pre}memberdata"));
if($webdb[cookieDomain]){
	echo "<SCRIPT LANGUAGE=\"JavaScript\">document.domain = \"$webdb[cookieDomain]\";</SCRIPT>";
}
echo "<SCRIPT LANGUAGE=\"JavaScript\">
parent.document.getElementById('$iframeID').innerHTML='<div>������Ϣ: $fenlei_num ��</div><div>�̼ҵ���: $hy_num ��</div><div>�̼Ҳ�Ʒ: $shop_num ��</div><div>��Ա����: $member_num ��</div>';
</SCRIPT>";
?>