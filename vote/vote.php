<?php
require(dirname(__FILE__)."/"."global.php");
$cid=intval($cid);
$i=0;
$tplcode='';
if($job=="js")
{
	if(!$cid&&!$aid){
		showerr("CID,AID������",1);
	}
	unset($shows,$i,$SQL);
	if($cid){
		$SQL=" WHERE C.cid='$cid' ";
	}else{
		$SQL=" WHERE C.aid='$aid' ";
	}
	$query = $db->query("SELECT C.about,C.type,C.votetype,C.tplcode,V.* FROM {$pre}vote_topic C LEFT JOIN {$pre}vote_element V ON C.cid=V.cid $SQL ORDER BY V.list DESC");
	while($rs = $db->fetch_array($query)){
		$i++;
		if($rs[type]==1){
			$button=$rs[type]="<input type='radio' name='voteId' value='$rs[id]' style='border:0px;'>";
		}else{
			$button=$rs[type]="<input type='checkbox' name='voteId[]' value='$rs[id]' style='border:0px;'>";
		}
		$votenum=$rs[votenum];
		$title=$rs[title];
		$img=tempdir($rs[img]);
		$url=$rs[url];
		$id=$rs[id];
		$cid=$rs[cid];
		$tplcode=str_replace('"','\"',$rs[tplcode]);
		$describes=$rs[describes];
		if($votetype==2&&$i>1){
			$shows.="<div style='float:left;'><img src='$webdb[www_url]/images/default/votevs.gif'></div>";
		}
		eval("\$shows.=\"$tplcode\";");
		$about=$rs[about];
		$votetype=$rs[votetype];
		
		$listdb[]=$rs;
	}
	if(!$tplcode){
		require(Mpath."template/default/vote_js.htm");
	}else{
		if(!$votetype){
print<<<EOT
	<div id="vote_js">
	  <form name="formv" method="post" action="$Murl/vote.php?action=vote&cid=$cid" target="_blank">
		<div class="voteabout"> $about </div>
		$shows 
		<div class="votepost"> 
		  <input type="submit" name="Submit" title="��ҪͶƱ"  value="" style="background:url('$webdb[www_url]/images/default/vote_sub.gif');width:44px;height:21px;border:0px;">
		  &nbsp;&nbsp;
		  <input type="button" name="Submit2" title="�鿴ͶƱ" value="" onclick="window.open('$Murl/vote.php?job=show&cid=$cid')" style="background:url('$webdb[www_url]/images/default/vote_view.gif');width:44px;height:21px;border:0px;">
		</div>
	  </form>
	</div>
EOT;
		}elseif($votetype==1){
print<<<EOT
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="vote_js"><form name="formv" method="post" action="$Murl/vote.php?action=vote&cid=$cid" target="_blank">
		  <tr> 
			<td class="voteabout">$about</td>
		  </tr>
		  <tr> 
			<td class="votechoose">$shows</td>
		  </tr>
		  <tr>
			
      <td class="votepost" align="center"> 
        <input type="submit" name="Submit" title="��ҪͶƱ"  value="" style="background:url('$webdb[www_url]/images/default/vote_sub.gif');width:44px;height:21px;border:0px;">&nbsp;&nbsp;<input type="button" name="Submit2" title="�鿴ͶƱ" value="" onclick="window.open('$Murl/vote.php?job=show&cid=$cid')" style="background:url('$webdb[www_url]/images/default/vote_view.gif');width:44px;height:21px;border:0px;">
      </td>
		  </tr></form>
		</table>
EOT;
		}elseif($votetype==2){
print<<<EOT
	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>$shows</td>
	  </tr>
	  <tr>
		<td>$about</td>
	  </tr>
	</table>
EOT;
		}
	}
	
	if($step!='show'){
		$content=ob_get_contents();
		ob_end_clean();
		$content=str_replace("<!---->","",$content);
		$content=str_replace("\r","",$content);
		$content=str_replace("\n","",$content);
		$content=str_replace("'","\'",$content);
		echo "document.write('$content');";
	}
	exit;
}
elseif($action=="vote")
{
	if(!$voteId){
		showerr("��ѡ��һ��ͶƱѡ��",1);
	}
	if(!is_array($voteId)){
		$v=$voteId;
		unset($voteId);
		$voteId[]=$v;
	}

	@extract($db->get_one("SELECT cid FROM {$pre}vote_element WHERE id='$voteId[0]'"));

	$rsdb=$db->get_one("SELECT * FROM {$pre}vote_topic WHERE cid='$cid'");
	if($rsdb[forbidguestvote]){
		if(!$lfjdb){
			showerr("�㻹û��¼,����Ա���ñ����¼�����ͶƱ",1);
		}
	}
	if($rsdb[begintime]&&$timestamp<$rsdb[begintime]){
		$time=date("Y-m-d H:i:s",$rsdb[begintime]);
		showerr("��û��ͶƱ�Ŀ�ʼʱ��.�����ĵȴ�,ͶƱ��ʼ����Ϊ:$time");
	}
	if($rsdb[endtime]&&$timestamp>$rsdb[endtime]){
		$time=date("Y-m-d H:i:s",$rsdb[endtime]);
		showerr("ͶƱ�Ѿ�����.����������Ϊ:$time");
	}
	
	if($rsdb[limitip])
	{
		if( strstr($rsdb[ip],$onlineip) ){
			showerr("�벻Ҫ�ظ�ͶƱ,���Ѿ�Ͷ����",1);
		}
		$rsdb[ip].="$onlineip ".implode(",",$voteId)."\t";
		$db->query("UPDATE {$pre}vote_topic SET ip='$rsdb[ip]' WHERE cid='$cid'");
	}
	if($rsdb[limittime])
	{
		if($_COOKIE["vote_limittime_$cid"])
		{
			showerr("{$rsdb[limittime]}������,�벻Ҫ�ظ�ͶƱ,���Ѿ�Ͷ����",1);
		}
		$time=$rsdb[limittime]*60;
		setcookie("vote_limittime_$cid",1,$timestamp+$time,"/");
	}	
	foreach($voteId AS $key=>$value)
	{
		$db->query("UPDATE {$pre}vote_element SET votenum=votenum+1 WHERE id='$value' ");
	}
	refreshto("vote.php?job=show&cid=$cid","лл��Ͷ�±����һƱ");
}
elseif($job=="show")
{
	if(!$cid){
		showerr("CID������",1);
	}
	unset($listdb,$numdb,$max,$widthdb);
	
	$query = $db->query("SELECT C.about,C.type,C.votetype,C.tplcode,C.ifcomment,V.* FROM {$pre}vote_topic C LEFT JOIN {$pre}vote_element V ON C.cid=V.cid WHERE C.cid='$cid' ORDER BY V.list DESC");
	$total=0;

	while($rs = $db->fetch_array($query)){
		$total=$total+$rs[votenum];
		if($rs[type]==1){
			$button=$rs[type]="<input type='radio' name='voteId' value='$rs[id]' style='border:0px;'>";
		}else{
			$button=$rs[type]="<input type='checkbox' name='voteId[]' value='$rs[id]' style='border:0px;'>";
		}
		

		//����JS��
		$i++;
		$votenum=$rs[votenum];
		$title=$rs[title];
		$img=tempdir($rs[img]);
		$url=$rs[url];
		$id=$rs[id];
		$cid=$rs[cid];
		$tplcode=str_replace('"','\"',$rs[tplcode]);
		$describes=$rs[describes];
		if($votetype==2&&$i>1){
			$shows.="<div style='float:left;'><img src='$webdb[www_url]/images/default/votevs.gif'></div>";
		}
		eval("\$shows.=\"$tplcode\";");
		$votetype=$rs[votetype];
		//����JS��

		$about=$rs[about];
		$ifcomment=$rs[ifcomment];
		$listdb[$rs[id]]=$rs;
		$numdb[$rs[id]]=$rs[votenum];
	}
	arsort($numdb);
	$max=0;
	foreach($numdb AS $key=>$value){
		if(!$max&&$value){
			$max=$value;
			$widthdb[$key]=311;
		}else{
			$widthdb[$key]=ceil(310*$value/$max)+1;
		}
	}
	$path=$votetype?"vote_$votetype":'vote';
	require(ROOT_PATH."inc/head.php");
	require(getTpl($path));
	require(ROOT_PATH."inc/foot.php");
}
elseif($job=="shownum")
{
	@extract($db->get_one("SELECT votenum FROM {$pre}vote_element WHERE id='$id'"));
	echo "document.write('$votenum');";
}

?>