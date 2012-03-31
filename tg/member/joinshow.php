<?php
require("global.php");

$mid=2;

/**
*获取信息正文的内容
**/
$rsdb=$db->get_one("SELECT A.*,B.*,M.icon FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id LEFT JOIN {$pre}memberdata M ON A.uid=M.uid WHERE A.id='$id'");


if(!$rsdb){
	showerr("内容不存在");
}elseif(!$web_admin&&$rsdb[uid]!=$lfjuid){
	showerr("你无权查看");
}

$rsdb[picurl] = tempdir($rsdb[icon]);


$rsdb[C]=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$rsdb[cid]'");

$field_db = $module_DB[$mid]['field'];

/**
*对信息内容字段的处理
**/
$Module_db->hidefield=true;
$Module_db->classidShowAll=true;
$Module_db->showfield($field_db,$rsdb,'show');


$rsdb[posttime]=date("Y-m-d H:i:s",$rsdb[posttime]);

require(ROOT_PATH."member/head.php");
require(getTpl("bencandy_$mid"));
require(ROOT_PATH."member/foot.php");

?>