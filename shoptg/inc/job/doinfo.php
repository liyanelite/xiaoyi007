<?php
if(!function_exists('html')){
	die('F');
}
header('Content-Type: text/html; charset='.WEB_LANG);

if(!$lfjid)
{
	die("<A HREF='$webdb[www_url]/login.php' onclick=\"clickEdit.cancel('clickEdit_$TagId')\">���ȵ�¼</A>");
}
if($atc=="do"){

	if(!$lfjuid){
		$power=0;
	}elseif($web_admin){
		$power=2;
		$rs=$db->get_one("SELECT S.admin,S.fid,A.uid,A.mid FROM {$_pre}content A LEFT JOIN {$_pre}sort S ON A.fid=S.fid WHERE A.id='$id'");
	}else{
		$rs=$db->get_one("SELECT S.admin,S.fid,A.uid,A.mid FROM {$_pre}content A LEFT JOIN {$_pre}sort S ON A.fid=S.fid WHERE A.id='$id'");
		$detail=@explode(",",$rs[admin]);
		if($rs[uid]==$lfjuid){
			$power=1;
		}elseif($lfjid&&@in_array($lfjid,$detail)){
			$power=2;
		}else{
			$power=0;
		}
	}
	if($power==0){
		die("����Ȩ����");
	}
	if($step==2){
		if($action=="del"){
			del_info($id,$rs);
			$rs[url]=get_info_url('',$rs[fid],$rs[city_id]);
			refreshto($rs[url],"ɾ���ɹ�",1);
		}elseif($action=="levels"&&$power==2){
			$db->query("UPDATE {$_pre}content SET levels='$levels' WHERE id='$id'");
			refreshto("$FROMURL","�����ɹ�",1);
		}elseif($action=="yz"&&$power==2){
			$db->query("UPDATE {$_pre}content SET yz='$yz' WHERE id='$id'");
			refreshto("$FROMURL","�����ɹ�",1);
		}elseif($action=="top"&&$power==2){
			$db->query("UPDATE {$_pre}content SET list='$top' WHERE id='$id'");
			refreshto("$FROMURL","�����ɹ�",1);
		}
	}else{
		$rs=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");
		echo "<A HREF=\"$Murl/member/post.php?job=edit&fid=$fid&id=$id\">�޸�</A><br><A HREF=\"$city_url/post.php?action=del&fid=$fid&id=$id\" onclick=\"return confirm('��ȷ��Ҫɾ����?');\">ɾ��</A><br>";
		if($rs[levels]&&$power==2){
			echo "(���Ƽ�)<A HREF=\"$city_url/job.php?job=$job&atc=$atc&step=2&action=levels&levels=0&id=$id&fid=$fid\">ȡ���Ƽ�</A><br>";
		}elseif($power==2){
			echo "(δ�Ƽ�)<A HREF=\"$city_url/job.php?job=$job&atc=$atc&step=2&action=levels&levels=1&id=$id&fid=$fid\">�Ƽ�</A><br>";
		}
		if($rs[yz]&&$power==2){
			echo "(�����)<A HREF=\"$city_url/job.php?job=$job&atc=$atc&step=2&action=yz&yz=0&id=$id&fid=$fid\">ȡ�����</A><br>";
		}elseif($power==2){
			echo "(δ���)<A HREF=\"$city_url/job.php?job=$job&atc=$atc&step=2&action=yz&yz=1&id=$id&fid=$fid\">���ͨ��</A><br>";
		}
		if($rs['list']>$timestamp&&$power==2){
			echo "(���ö�)<A HREF=\"\"><A HREF=\"$city_url/job.php?job=$job&atc=$atc&step=2&action=top&top=$rs[posttime]&id=$id&fid=$fid\">ȡ���ö�</A></A><br>";
		}elseif($power==2){
			$times=$timestamp*1.3;
			echo "(δ�ö�)<A HREF=\"$city_url/job.php?job=$job&atc=$atc&step=2&action=top&top=$times&id=$id&fid=$fid\">�ö�</A><br>";
		}
	}
}
?>