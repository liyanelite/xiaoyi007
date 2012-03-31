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
parent.document.getElementById('$iframeID').innerHTML='<div>分类信息: $fenlei_num 条</div><div>商家店铺: $hy_num 间</div><div>商家产品: $shop_num 个</div><div>会员总数: $member_num 人</div>';
</SCRIPT>";
?>