<?php
if($job=="do"){
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
		if($action=="levels"&&$power==2){
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
		
		if($rs[levels]&&$power==2){
			echo "(���Ƽ�)<A HREF=\"$Mdomain/ajax.php?inc=$inc&job=$job&step=2&action=levels&levels=0&id=$id\">ȡ���Ƽ�</A><br>";
		}elseif($power==2){
			echo "(δ�Ƽ�)<A HREF=\"$Mdomain/ajax.php?inc=$inc&job=$job&step=2&action=levels&levels=1&id=$id\">�Ƽ�</A><br>";
		}
		if($rs[yz]==1&&$power==2){
			echo "(�����)<A HREF=\"$Mdomain/ajax.php?inc=$inc&job=$job&step=2&action=yz&yz=0&id=$id\">ȡ�����</A><br>";
		}elseif($power==2){
			echo "(δ���)<A HREF=\"$Mdomain/ajax.php?inc=$inc&job=$job&step=2&action=yz&yz=1&id=$id\">���ͨ��</A><br>";
		}
		if($rs['list']>$timestamp&&$power==2){
			echo "(���ö�)<A HREF=\"$Mdomain/ajax.php?inc=$inc&job=$job&step=2&action=top&top=$timestamp&id=$id\">ȡ���ö�</A></A><br>";
		}elseif($power==2){
			$times=$timestamp*1.3;
			echo "(δ�ö�)<A HREF=\"$Mdomain/ajax.php?inc=$inc&job=$job&step=2&action=top&top=$times&id=$id\">�ö�</A><br>";
		}
		echo "<A HREF=\"$webdb[www_url]/member/?main=$Murl/member/post.php?fid=$fid\">��������</A><br>";
		echo "<A HREF=\"$webdb[www_url]/member/?main=$Murl/member/post.php?fid=$fid&id=$id\">��������</A><br>";
		echo "<A HREF=\"$webdb[www_url]/member/?main=$Murl/member/post.php?job=edit&fid=$fid&id=$id&rid=$rid\">�޸�����</A><br>";
		echo "<A HREF=\"$webdb[www_url]/member/?main=$Murl/member/post.php?action=del&fid=$fid&id=$id&rid=$rid\" onclick=\"return confirm('��ȷ��Ҫɾ����?���ɻָ�');\">ɾ������</A><br>";
	}
}
?>