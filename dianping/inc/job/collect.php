<?php
if(!function_exists('html')){
die('F');
}
if(!$lfjid){
	showerr("���ȵ�¼");
}elseif(!$id){
	showerr("ID������");
}
if($db->get_one("SELECT * FROM `{$_pre}collection` WHERE `id`='$id' AND uid='$lfjuid'")){
	showerr("�벻Ҫ�ظ��ղر�����Ϣ",1); 
}
if(!$web_admin){
	if($webdb[Info_CollectArticleNum]<1){
		$webdb[Info_CollectArticleNum]=50;
	}
	$rs=$db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}collection` WHERE uid='$lfjuid'");
	if($rs[NUM]>=$webdb[Info_CollectArticleNum]){
		showerr("�����ֻ���ղ�{$webdb[Info_CollectArticleNum]}����Ϣ",1);
	}
}
$db->query("INSERT INTO `{$_pre}collection` (  `id` , `uid` , `posttime`) VALUES ('$id','$lfjuid','$timestamp')");

refreshto("$Mdomain/member/?main=collection.php","�ղسɹ�!",1);
?>