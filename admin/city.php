<?php
function_exists('html') OR exit('ERR');

if(!$Apower[city_zone]){
	showmsg('你没权限');
}

$admin_path="index.php?lfj=$lfj";

$linkdb=array("地域/省份管理"=>"$admin_path&job=listsort","城市管理"=>"$admin_path&job=city","城市辖区管理"=>"$admin_path&job=zone","地段管理"=>"$admin_path&job=street","批量操作"=>"$admin_path&job=batch");

if(!function_exists('MODULE_CK')||!in_array('fenlei',$BIZ_MODULEDB)){
	unset($linkdb["批量操作"]);
}

if($job=="listsort")
{

	$fid=intval($fid);
	$sortdb=array();
	list_city_allsort(0,$table='area');
	$sort_fup=$Guidedb->Select("{$pre}area","fup",$fid);

	require("head.php");
	require("template/city/sort.htm");
	require("foot.php");
}
elseif($action=="addsort")
{
	if($fup){
		$rs=$db->get_one("SELECT name,class FROM {$pre}area WHERE fid='$fup' ");
		$class=$rs['class'];
		$db->query("UPDATE {$pre}area SET sons=sons+1 WHERE fid='$fup'");
		$type=0;
	}else{
		$class=0;
	}
	$type=0;	/*分类标志*/
	$class++;
	$db->query("INSERT INTO {$pre}area (name,fup,class,type,allowcomment) VALUES ('$name','$fup','$class','$type',1) ");
	@extract($db->get_one("SELECT fid FROM {$pre}area ORDER BY fid DESC LIMIT 0,1"));
	
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","创建成功");
}
elseif($action=="addcity")
{
	$rs=$db->get_one("SELECT * FROM {$pre}area WHERE fid='$fup' ");
	if(!$rs){
		showerr("请选择一个省份");
	}
	$rs=$db->get_one("SELECT COUNT(*) AS NUM FROM {$pre}area WHERE fup='$fup' ");
	if($rs[NUM]){
		showerr("你不能选择大分类");
	}

	require_once(ROOT_PATH."inc/pinyin.php");

	$detail=explode("\r\n",$name);
	foreach( $detail AS $key=>$name){
		if(!$name){
			continue;
		}
		$letter=change2pinyin($name,1);
		$letter=substr($letter,0,1);
		if(strstr($name,'重庆')&&$letter=='Z'){
			$letter='C';
		}
		$db->query("INSERT INTO {$pre}city (name,fup,class,type,letter) VALUES ('$name','$fup','0','0','$letter') ");
	}
	refreshto("$FROMURL","创建成功");
}
elseif($job=="city")
{
	if($fup){
		$SQL=" WHERE fup='$fup' ";
	}else{
		$SQL=" ";
	}
	unset($sortdb,$infodb);
	$query = $db->query("SELECT * FROM {$pre}city $SQL ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$rs[url]=$city_DB[domain][$rs[fid]]?$city_DB[domain][$rs[fid]]:"../index.php?choose_cityID=$rs[fid]";
		$sortdb[]=$rs;
	}



	$sort_fup=$Guidedb->Select("{$pre}area","fup",$fup);
	require("head.php");
	require("template/city/city.htm");
	require("foot.php");
}
elseif($action=="addzone")
{
	$rs=$db->get_one("SELECT * FROM {$pre}city WHERE fid='$fup' ");
	if(!$rs){
		showerr("请选择一个城市");
	}
	
	$detail=explode("\r\n",$name);
	foreach( $detail AS $key=>$name){
		if(!$name){
			continue;
		}
		$db->query("INSERT INTO {$pre}zone (name,fup,class,type,allowcomment) VALUES ('$name','$fup','0','0',1) ");
	}
	
	refreshto("$FROMURL","创建成功",0);
}
elseif($job=="zone")
{
	if($fup){
		$SQL=" WHERE fup='$fup' ";
	}else{
		$SQL=" ";
	}
	if(!$page){
		$page=1;
	}
	$rows=100;
	$min=($page-1)*$rows;
	$showpage=getpage("{$pre}zone","$SQL","$admin_path&job=$job&fup=$fup",$rows);
	$query = $db->query("SELECT * FROM {$pre}zone $SQL ORDER BY list DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$sortdb[]=$rs;
	}

	$sort_fup=select_fup("{$pre}city",'fup',$fup);
	$get_area_guide=get_area_guide($fup);

	require("head.php");
	require("template/city/zone.htm");
	require("foot.php");
}
elseif($action=="addstreet")
{
	$rs=$db->get_one("SELECT * FROM {$pre}zone WHERE fid='$fup' ");
	if(!$rs){
		refreshto("$admin_path&job=zone","请选择一个城市辖区",3);
	}
	
	$detail=explode("\r\n",$name);
	foreach( $detail AS $key=>$name){
		if(!$name){
			continue;
		}
		$db->query("INSERT INTO {$pre}street (name,fup,class,type,allowcomment) VALUES ('$name','$fup','0','0',1) ");
	}	
	refreshto("$FROMURL","创建成功",0);
}
elseif($job=="street")
{
	if($fup){
		$SQL=" WHERE fup='$fup' ";
	}else{
		$SQL=" ";
	}
	if(!$page){
		$page=1;
	}
	$rows=100;
	$min=($page-1)*$rows;
	$showpage=getpage("{$pre}street","$SQL","$admin_path&job=$job&fup=$fup",$rows);
	$query = $db->query("SELECT * FROM {$pre}street $SQL ORDER BY list DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$_rs=$db->get_one("SELECT name,fup FROM {$pre}zone WHERE fid='$rs[fup]'");
		$rs[zone]=$_rs[name];
		$_rss=$db->get_one("SELECT name,fid FROM {$pre}city WHERE fid='$_rs[fup]'");
		$rs[city]=$_rss[name];
		$rs[cityid]=$_rss[fid];
		$rs[city_id]=$_rss[fid];
		$sortdb[]=$rs;
	}
	$rsdb=$db->get_one("SELECT * FROM {$pre}zone WHERE fid='$fup' ");
	$get_area_guide=get_area_guide(0,$fup);
	
	require("head.php");
	require("template/city/street.htm");
	require("foot.php");
}
//修改栏目信息
elseif($job=="editsort")
{
	$postdb[fid] && $fid=$postdb[fid];
	$rsdb=$db->get_one("SELECT * FROM {$pre}area WHERE fid='$fid'");

	$sort_fid=$Guidedb->Select("{$pre}area","postdb[fid]",$fid,"?job=$job");
	$sort_fup=$Guidedb->Select("{$pre}area","postdb[fup]",$rsdb[fup]);

 	$typedb[$rsdb[type]]=" checked ";

	 
	require("head.php");
	require("template/city/editsort.htm");
	require("foot.php");
}
elseif($job=="edit_city")
{
	$postdb[fid] && $fid=$postdb[fid];
	$rsdb=$db->get_one("SELECT * FROM {$pre}city WHERE fid='$fid'");
	$sort_fup=$Guidedb->Select("{$pre}area","postdb[fup]",$rsdb[fup]);
 
	list($head,$foot,$index)=explode("|",$rsdb[template]);

	$hits[$rsdb[hits]]=' checked ';

	$Adminpath=Adminpath.'apache.txt ';

	
	require("head.php");
	require("template/city/edit_city.htm");
	require("foot.php");
}
elseif($job=="edit_zone")
{
	$postdb[fid] && $fid=$postdb[fid];
	$rsdb=$db->get_one("SELECT * FROM {$pre}zone WHERE fid='$fid'");
	$sort_fup=Select_fup("{$pre}city","postdb[fup]",$rsdb[fup]);

	if(!$rsdb['dirname']){
		require_once(ROOT_PATH."inc/pinyin.php");
		$rsdb['dirname']=change2pinyin($rsdb[name],1);
	}

	
	require("head.php");
	require("template/city/edit_zone.htm");
	require("foot.php");
}
elseif($action=="edit_zone")
{
	if($postdb['dirname']&&!eregi("^([_a-z0-9]+)$",$postdb['dirname'])){
		showerr("目录名只能是英文或数字!");
	}
	if(!$postdb[name]){
		showerr("名称不能为空");
	}
	$db->query("UPDATE {$pre}zone SET fup='$postdb[fup]',name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',dirname='$postdb[dirname]',forbidshow='$postdb[forbidshow]',config='$postdb[config]'$SQL WHERE fid='$postdb[fid]' ");

	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功");
}
elseif($job=="edit_street")
{
	$postdb[fid] && $fid=$postdb[fid];
	$rsdb=$db->get_one("SELECT * FROM {$pre}street WHERE fid='$fid'");

	if(!$rsdb['dirname']){
		require_once(ROOT_PATH."inc/pinyin.php");
		$rsdb['dirname']=change2pinyin($rsdb[name],1);
	}

	
	require("head.php");
	require("template/city/edit_street.htm");
	require("foot.php");
}
elseif($action=="edit_street")
{
	if($postdb['dirname']&&!eregi("^([_a-z0-9]+)$",$postdb['dirname'])){
		showerr("目录名只能是英文或数字!");
	}
	if(!$postdb[name]){
		showerr("名称不能为空");
	}
	$db->query("UPDATE {$pre}street SET name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',dirname='$postdb[dirname]',forbidshow='$postdb[forbidshow]',config='$postdb[config]'$SQL WHERE fid='$postdb[fid]' ");

	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功");
}
elseif($action=="editsort")
{
	//检查父栏目是否有问题
	check_fup("{$pre}area",$postdb[fid],$postdb[fup]);
	unset($SQL);
	$rs_fid=$db->get_one("SELECT * FROM {$pre}area WHERE fid='$postdb[fid]'");
	if($rs_fid[fup]!=$postdb[fup])
	{
		$rs_fup=$db->get_one("SELECT class FROM {$pre}area WHERE fup='$postdb[fup]' ");
		$newclass=$rs_fup['class']+1;
		$db->query("UPDATE {$pre}area SET sons=sons+1 WHERE fup='$postdb[fup]' ");
		$db->query("UPDATE {$pre}area SET sons=sons-1 WHERE fup='$rs_fid[fup]' ");
		$SQL=",class=$newclass";
	}
	$db->query("UPDATE {$pre}area SET fup='$postdb[fup]',name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',dirname='$postdb[dirname]',forbidshow='$postdb[forbidshow]',config='$postdb[config]'$SQL WHERE fid='$postdb[fid]' ");

	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功");
}
elseif($action=="edit_city")
{
	require_once(ROOT_PATH."inc/pinyin.php");
	$letter=change2pinyin($postdb[name],1);
	$letter=substr($letter,0,1);
	if(strstr($postdb[name],'重庆')&&$letter=='Z'){
		$letter='C';
	}

	if($postdb[domain]){
		if(!strstr($postdb[domain],"://")){
			$postdb[domain]="http://$postdb[domain]";
		}
		$postdb[domain]=preg_replace("/(.*)\/$/","\\1",$postdb[domain]);;
		
	}
	

	if($postdb[head]&&!is_file(ROOT_PATH."$postdb[head]")){
		showerr("头部文件不存在");
	}elseif($postdb[foot]&&!is_file(ROOT_PATH."$postdb[foot]")){
		showerr("尾部文件不存在");
	}elseif($postdb[index]&&!is_file(ROOT_PATH."$postdb[index]")){
		showerr("主页文件不存在");
	}
	$postdb[template]="$postdb[head]|$postdb[foot]|$postdb[index]|";

	$db->query("UPDATE {$pre}city SET fup='$postdb[fup]',name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',metakeywords='$postdb[metakeywords]',metadescription='$postdb[metadescription]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',dirname='$postdb[dirname]',forbidshow='$postdb[forbidshow]',letter='$letter',domain='$postdb[domain]',hits='$postdb[hits]' WHERE fid='$postdb[fid]' ");

	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功");
}
elseif($action=="delete")
{
	$db->query(" DELETE FROM `{$pre}area` WHERE fid='$fid' ");
	
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto($FROMURL,"删除成功");
}
elseif($action=="delete_city")
{
	extract( $db->get_one("SELECT COUNT(*) AS NUM FROM `{$pre}city`"));
	if($NUM==1){
		showmsg("你不能把城市全部删除掉!!");
	}
	if($fid==1){
		showmsg('请不要删除FID为1的城市,你可以删除其它城市,而这个城市你改名即可解决!');
	}
	$db->query(" DELETE FROM `{$pre}city` WHERE fid='$fid' ");
	
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto($FROMURL,"删除成功");
}
elseif($action=="delete_zone")
{
	$db->query(" DELETE FROM `{$pre}zone` WHERE fid='$fid' ");
	
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto($FROMURL,"删除成功");
}
elseif($action=="delete_street")
{
	$db->query(" DELETE FROM `{$pre}street` WHERE fid='$fid' ");
	
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto($FROMURL,"删除成功");
}
elseif($action=="editlist")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$pre}area SET list='$value' WHERE fid='$key' ");
	}
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功",1);
}
elseif($action=="editlist_city")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$pre}city SET list='$value' WHERE fid='$key' ");
	}
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功",1);
}
elseif($action=="editlist_zone")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$pre}zone SET list='$value' WHERE fid='$key' ");
	}
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功",1);
}
elseif($action=="editlist_street")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$pre}street SET list='$value' WHERE fid='$key' ");
	}
	mod_sort_class("{$pre}area",0,0);		//更新class
	mod_sort_sons("{$pre}area",0);			//更新sons
	/*更新导航缓存*/
	area_cache_guide();
	refreshto("$FROMURL","修改成功",1);
}
elseif($job=="batch")
{
	
	require("head.php");
	require("template/city/batch.htm");
	require("foot.php");
}
elseif($action=="batch")
{
	set_time_limit(0);
	require_once(ROOT_PATH."inc/pinyin.php");
	if($type=="zone_dir"){
		$query = $db->query("SELECT * FROM {$pre}zone");
		while($rs = $db->fetch_array($query)){
			$rs['dirname']=change2pinyin($rs[name],1);
			$rs['dirname']=preg_replace("/(\/|\\\|-| |')/","_",$rs['dirname']);
			$db->query("UPDATE {$pre}zone SET dirname='{$rs[dirname]}' WHERE fid='$rs[fid]'");
		}
		area_cache_guide();
	}elseif($type=="street_dir"){
		$query = $db->query("SELECT * FROM {$pre}street");
		while($rs = $db->fetch_array($query)){
			$rs['dirname']=change2pinyin($rs[name],1);
			$rs['dirname']=preg_replace("/(\/|\\\|-| |')/","_",$rs['dirname']);
			$db->query("UPDATE {$pre}street SET dirname='{$rs[dirname]}' WHERE fid='$rs[fid]'");
		}
		area_cache_guide();
	}elseif($type=="city_dir"){
		if(!ereg("^([-_a-z0-9\.]+)$",$domain2)){
			showerr("域名有误,只能是这种格式如:abc.com");
		}
		if($page<2){
			$db->query("UPDATE {$pre}city SET dirname=''");
		}
		$rows=5;
		$page<1 && $page=1;
		$min=($page-1)*$rows;
		$query = $db->query("SELECT * FROM {$pre}city ORDER BY fid DESC LIMIT $min,$rows");
		while($rs = $db->fetch_array($query)){
			$rs['dirname']=change2pinyin($rs[name],1);
			$rs['dirname']=str_replace("ZhongQing","ChongQing",$rs['dirname']);
			$rs['dirname']=preg_replace("/(\/|\\\|-| |')/","_",$rs['dirname']);
			//检查一下有没有重名的情况
			if($db->get_one("SELECT * FROM {$pre}city WHERE dirname='{$rs[dirname]}' AND fid!='$rs[fid]'")){
				$rs['dirname'].=$rs[fid];
			}
			$SQL="";
			if($domain2=='null'){
				$SQL="domain=''";
			}elseif($domain2){
				$domain=strtolower($rs['dirname']).".$domain2";
				$SQL="domain='http://$domain'";
			}
			$db->query("UPDATE {$pre}city SET $SQL WHERE fid='$rs[fid]'");

			$ckk++;
		}
		if($ckk){
			$page++;
			echo "请稍候$page....<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$admin_path&action=$action&type=$type&domain2=$domain2&citydir=$citydir&page=$page'>";
			exit;
		}else{
			area_cache_guide();
		}		
	}
	refreshto("$admin_path&job=$action","操作成功",1);
}
/**
*更新缓存
**/
function area_cache_guide(){
	global $db,$_pre,$pre;
	$show="<?php\r\n";
	$query = $db->query("SELECT fid,fup,name FROM {$pre}area ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$rs[name]=addslashes($rs[name]);
		$show.="
		\$area_DB[{$rs[fup]}][{$rs[fid]}]='$rs[name]';
		\$area_DB[name][{$rs[fid]}]='$rs[name]';
		\$area_DB[fup][{$rs[fid]}]='$rs[fup]';
		";
	}
	write_file(ROOT_PATH."data/all_area.php",$show);
	city_cache_guide();
}


function city_cache_guide(){
	global $db,$_pre,$webdb,$pre;
	$dir=opendir(ROOT_PATH."data/zone/");
	while($f=readdir($dir)){
		if(eregi(".php$",$f)){
			unlink(ROOT_PATH."data/zone/$f");
		}
	}
	$show="<?php\r\nunset(\$city_DB);";
	$query = $db->query("SELECT * FROM {$pre}city ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$rs[name]=addslashes($rs[name]);
		unset($_dirname,$_domain,$_tpl,$_T,$_K,$_D,$_HITS);

		if($rs[domain]){
			$rs[domain]=preg_replace("/^http:\/\/(.*)\/$/is","http://\\1",$rs[domain]);
			$_domain="\$city_DB[domain][{$rs[fid]}]='$rs[domain]';";
			$_url="\$city_DB[url][{$rs[fid]}]='$rs[domain]/';";
		}else{
			$_url="\$city_DB[url][{$rs[fid]}]=\$webdb[www_url].'/index.php?choose_cityID=$rs[fid]';";			
		}
		if($rs[template]&&$rs[template]!='|||'){
			$rs[template]=addslashes($rs[template]);
			$_tpl="\$city_DB[tpl][{$rs[fid]}]='$rs[template]';";
		}
		if($rs[descrip]){
			$rs[descrip]=addslashes($rs[descrip]);
			$_T="\$city_DB[metaT][{$rs[fid]}]='$rs[descrip]';";
		}
		if($rs[metakeywords]){
			$rs[metakeywords]=addslashes($rs[metakeywords]);
			$_K="\r\n\$city_DB[metaK][{$rs[fid]}]='$rs[metakeywords]';";
		}
		if($rs[metadescription]){
			$rs[metadescription]=addslashes($rs[metadescription]);
			$_D="\r\n\$city_DB[metaD][{$rs[fid]}]='$rs[metadescription]';";
		}
		if($rs[hits]){
			$_HITS="\r\n\$city_DB[hits][{$rs[fid]}]='$rs[hits]';";
		}
		
		$show.="
\$city_DB[{$rs[fup]}][{$rs[fid]}]='$rs[name]';
\$city_DB[name][{$rs[fid]}]='$rs[name]';
\$city_DB[fup][{$rs[fid]}]='$rs[fup]';
$_url
$_domain
$_tpl
$_T$_K$_D$_HITS
";
		zone_cache_guide($rs[fid]);
		//$letter=change2pinyin($rs[name],1);
		//$letter=substr($letter,0,1);
		//$db->query("UPDATE {$pre}city SET letter='$letter' WHERE fid='$rs[fid]'");
	}
	write_file(ROOT_PATH."data/all_city.php",$show.'?>');
}
function zone_cache_guide($fup){
	global $db,$_pre,$pre;
	if(!$fup){
		return ;
	}
	$show="<?php\r\n";
	$query = $db->query("SELECT fid,fup,name,dirname FROM {$pre}zone WHERE fup='$fup' ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$rs[name]=addslashes($rs[name]);
		$show.="
		\$zone_DB[name][{$rs[fid]}]='$rs[name]';
		\$zone_DB[fup][{$rs[fid]}]='$rs[fup]';
		\$zone_DB['dirname'][{$rs[fid]}]='$rs[dirname]';
		";
		$query2 = $db->query("SELECT fid,fup,name,dirname FROM {$pre}street WHERE fup='$rs[fid]' ORDER BY list DESC");
		while($rs2 = $db->fetch_array($query2)){
			$rs2[name]=addslashes($rs2[name]);
			$show.="
			\$street_DB[{$rs2[fup]}][{$rs2[fid]}]='$rs2[name]';
			\$street_DB[name][{$rs2[fid]}]='$rs2[name]';
			\$street_DB[fup][{$rs2[fid]}]='$rs2[fup]';
			\$street_DB['dirname'][{$rs2[fid]}]='$rs2[dirname]';
			";
		}
		$ckkk++;
	}
	if(!$ckkk){
		return ;
	}
	if(!is_dir(ROOT_PATH."data/zone/")){
		mkdir(ROOT_PATH."data/zone/");
		chmod(ROOT_PATH."data/zone/",0777);
	}
	write_file(ROOT_PATH."data/zone/$fup.php",$show.'?>');
}

/*栏目列表*/
function list_city_allsort($fid,$table='sort'){
	global $db,$_pre,$sortdb,$pre;
	$query=$db->query("SELECT * FROM {$pre}$table where fup='$fid' ORDER BY list DESC");
	while( $rs=$db->fetch_array($query) ){
		$_rs=$db->get_one("SELECT COUNT(*) AS sons FROM {$pre}$table where fup='$rs[fid]'");
		$rs[sons]=$_rs[sons];
		$_rs=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}city where fup='$rs[fid]'");
		$rs[num]=$_rs[num];
		$icon="";
		for($i=1;$i<$rs['class'];$i++){
			$icon.="&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($icon){
			$icon=substr($icon,0,-24);
			$icon.="--";
		}
		$rs[config]=unserialize($rs[config]);
		$rs[icon]=$icon;
		$sortdb[]=$rs;
		list_city_allsort($rs[fid],$table);
	}
}

function select_fup($table,$name='fup',$ck=''){
	global $db;
	$query = $db->query("SELECT * FROM $table ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$ckk=$ck==$rs[fid]?" selected ":" ";
		$show.="<option value='$rs[fid]' $ckk>$rs[name]</option>";
	}
	return "<select name='$name'><option value=''>请选择</option>$show</select>";
}

function get_area_guide($cityid=0,$zoneid=0){
	global $db,$_pre,$pre;
	if($zoneid){
		$SQL="SELECT A.name AS city,A.fid AS cityid,B.name AS zone,B.fid AS zoneid FROM {$pre}city A LEFT JOIN {$pre}zone B ON A.fid=B.fup WHERE B.fid='$zoneid'";
		$rs=$db->get_one($SQL);
		$show="<A HREF='$admin_path&job=zone&fup=$rs[cityid]'>$rs[city]</A> -> <A HREF='$admin_path&job=street&fup=$rs[zoneid]'>$rs[zone]</A>";
	}elseif($cityid){
		$SQL="SELECT A.name AS city,A.fid AS cityid,B.name AS pro,B.fid AS proid FROM {$pre}area B LEFT JOIN {$pre}city A ON A.fup=B.fid WHERE A.fid='$cityid'";
		$rs=$db->get_one($SQL);
		$show="<A HREF='$admin_path&job=city&fup=$rs[proid]'>$rs[pro]</A> -> <A HREF='$admin_path&job=zone&fup=$rs[cityid]'>$rs[city]</A>";
	}
	return $show;
}

?>