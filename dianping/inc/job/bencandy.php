<?php
header('Content-Type: text/html; charset=gb2312'); 
if(!$lfjid)
{
	die("<A HREF='$webdb[www_url]/do/login.php' onclick=\"clickEdit.cancel('clickEdit_$TagId')\">���ȵ�¼</A>");
}
if($act=="do"){
	if(!$lfjuid){
		$power=0;
	}elseif($web_admin){
		$power=2;
	}else{
		$rs=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");
		if($rs[uid]==$lfjuid){
			$power=1;
		}else{
			$power=0;
		}
	}
	if($power==0){
		die("����Ȩ����");
	}

	echo "<A HREF=\"$Murl/post.php?job=postnew&fid=$fid\">�·���</A><br><A  HREF=\"$Murl/post.php?job=edit&fid=$fid&id=$id\">�޸�</A><br><A HREF=\"$Murl/post.php?action=del&fid=$fid&id=$id\" onclick=\"return confirm('��ȷ��Ҫɾ����?');\">ɾ��</A><br>";

}
?>