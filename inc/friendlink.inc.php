<?php
//友情链接缓存
function write_friendlink(){
	global $db,$pre,$timestamp,$webdb,$_pre;
	$query = $db->query("SELECT * FROM {$pre}friendlink WHERE ifhide=0 AND yz=1 AND (endtime=0 OR endtime>$timestamp) AND city_id=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		foreach( $rs AS $key=>$value){
			$rs[$key]=AddSlashes($rs[$key]);
		}
		if($rs[logo]&&!$rs[iswordlink]){
			$rs[logo]=tempdir($rs[logo]);
			$logodb[]="'$rs[id]'=>array('name'=>'$rs[name]','url'=>'$rs[url]','logo'=>'$rs[logo]','descrip'=>'$rs[descrip]')";
		}else{
			$worddb[]="'$rs[id]'=>array('name'=>'$rs[name]','url'=>'$rs[url]','descrip'=>'$rs[descrip]')";
		}

		$listdb[]=$rs;
	}
	$write="<?php\r\nunset(\$friendlinkDB);\r\n\$friendlinkDB[1]=array(".implode(",\r\n",$logodb).");\r\n\$friendlinkDB[0]=array(".implode(",\r\n",$worddb).");";
	
	//以上是供首页调用显示.以下是供其它页面调用显示
	$query2 = $db->query("SELECT * FROM {$pre}city");
	while($rs2 = $db->fetch_array($query2)){
		unset($logodb,$worddb);
		$query = $db->query("SELECT * FROM {$pre}friendlink WHERE city_id='$rs2[fid]' AND yz=1 AND (endtime=0 OR endtime>$timestamp) ORDER BY list DESC");
		while($rs = $db->fetch_array($query)){

			foreach( $rs AS $key=>$value){
				$rs[$key]=AddSlashes($rs[$key]);
			}
			if($rs[logo]&&!$rs[iswordlink]){
				$rs[logo]=tempdir($rs[logo]);
				$logodb[]="'$rs[id]'=>array('name'=>'$rs[name]','url'=>'$rs[url]','logo'=>'$rs[logo]','descrip'=>'$rs[descrip]')";
			}else{
				$worddb[]="'$rs[id]'=>array('name'=>'$rs[name]','url'=>'$rs[url]','descrip'=>'$rs[descrip]')";
			}
		}
		if($logodb||$worddb)$write.="\r\n\r\n\$friendlink_DB[{$rs2[fid]}][1]=array(".implode(",\r\n",$logodb).");\r\n\$friendlink_DB[{$rs2[fid]}][0]=array(".implode(",\r\n",$worddb).");";
	}
	write_file(ROOT_PATH."data/friendlink.php",$write);
}

?>