<?php
error_reporting(7);	
@set_time_limit(0);
set_magic_quotes_runtime(0);
if(!get_magic_quotes_gpc()){
	Add_S($_POST);
	Add_S($_GET);
	Add_S($_COOKIE);
}
if(!ini_get('register_globals')){	
	@extract($_COOKIE,EXTR_SKIP);
	@extract($_FILES,EXTR_SKIP);
}
foreach($_POST as $_key=>$_value){
	!ereg("^\_",$_key) && $$_key=$_POST[$_key];
}
foreach($_GET as $_key=>$_value){
	!ereg("^\_",$_key) && $$_key=$_GET[$_key];
}
function Add_S(&$array){
	foreach($array as $key=>$value){
		if(!is_array($value)){
			$array[$key]=addslashes($value);
		}else{
			Add_S($array[$key]);
		}
	}
}


if(is_file("bbs/data.sql")){
	$addPW=1;
}

//$ifPW=2;
if($ifPW==2){
	$addPW=0;
	$readonly=' readonly ';
	$readonly2=' disabled ';	
	$readonlymsg="onclick=\"alert('��ǰϵͳ�汾Ϊ���벩���&phpwind���ϰ�,������ʹ��Ĭ�Ϲ���Ա�ʺ�.')\";";
}
$default_admin='admin';
$default_weburl='http://life.net/';

define('WEB_LANG','gb2312');		//utf-8 gb2312 big5

if(WEB_LANG!='gb2312'){
	header('Content-Type: text/html; charset='.WEB_LANG);
}

define('ROOT_PATH',__FILE__ ? dirname(__FILE__).'/' : './');
define('PHP168_PATH', ROOT_PATH);

if(!is_file(ROOT_PATH."inc/biz/biz.php")){
	die('��Ȩ�ļ�������,�������Ȩ�ļ��ٰ�װ!');
}

if($_SERVER['HTTP_CLIENT_IP']){
     $onlineip=$_SERVER['HTTP_CLIENT_IP'];
}elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
     $onlineip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
     $onlineip=$_SERVER['REMOTE_ADDR'];
}
$onlineip = preg_replace("/^([\d\.]+).*/", "\\1", $onlineip);

if(!$job&&!$action)
{
	require(ROOT_PATH.'install/index.htm');
	exit;
}

elseif($action=="end_choose")
{
	if($ifpassport==1){
		if($passportType=='pwbbs5'){
			@include(ROOT_PATH."$passportPath/data/bbscache/config.php");
			@include(ROOT_PATH."$passportPath/data/sql_config.php");
			if(!$dbhost){
				showmsg("·������ȷ:$passportPath");
			}
			$_charset=getBbsCharset("{$PW}members");
			if($_charset){
				$charsetdb["$_charset"]=" selected ";
				$charset_msg="ϵͳ������Ӧ��ѡ��:$_charset,$charset";
			}
			$passportPre=$PW;
			
		}elseif($passportType=='dzbbs5'){
			@include(ROOT_PATH."$passportPath/forumdata/cache/cache_settings.php");
			@include(ROOT_PATH."$passportPath/config.inc.php");
			if(!$dbhost){
				showmsg("·������ȷ:$passportPath");
			}
			$_charset=getBbsCharset("{$tablepre}members");
			if($_charset){
				$charsetdb["$_charset"]=" selected ";
				$charset_msg="ϵͳ������Ӧ��ѡ��:$_charset,$dbcharset";
			}
			$passportPre=$tablepre;

		}elseif($passportType=='dvbbs1'){
			define('ISDVBBS', true);
			@include(ROOT_PATH."$passportPath/inc/config.php");
			if(!$dbhost){
				showmsg("·������ȷ:$passportPath");
			}
			$_charset=getBbsCharset("{$tablepre}user");
			if($_charset){
				$charsetdb["$_charset"]=" selected ";
				$charset_msg="ϵͳ������Ӧ��ѡ��:$_charset,$charset";
			}
			$passportPre=$dv;
		}
	}elseif($ifpassport==2){
		$passportPre="pw_";
		$dbhost='localhost';
		$dbuser='root';
	}else{
		$dbhost='localhost';
		$dbuser='root';
	}
	$job='addmysqlpwd';
}

elseif($action=="addmysqlpwd")
{
	if( !$db168 || !$dbname || !$dbuser || !$dbhost )
	{
		showmsg("���ݿ�����,�û���,���ݿ�,���ݱ�ǰ׺����ͬʱΪ��");
	}
	if(!ereg("^([a-z0-9_]+)$",$db168))
	{
		showmsg("���ݱ����ַ�������a-z0-9_");
	}
	if( !@mysql_connect($dbhost,$dbuser,$dbpw) )
	{
		showmsg("���ݿ�����ʧ�ܣ���ȷ��<br><br>���ݿ��ʺ�:<font color=red>{$dbuser}</font><br><br>���ݿ�����:<font color=red>{$dbpw}</font><br><br>�Ƿ���ȷ,������������ռ�����ѯ<br><br>");
	}
	if( !@mysql_select_db($dbname) )
	{
		if( !@mysql_query("CREATE DATABASE `$dbname`") )
		{
			showmsg("���ݿ���Ȼ�����ӳɹ��������ݿ���<font color=red>{$dbname}</font>���ԣ����Ӳ���ȥ������һ�£��Ƿ���ȷ,������������ռ�����ѯ<br>");
		}
	}
	if( mysql_get_server_info() < '4.1' )
	{
		$dbcharset='';
	}
	$dbcharset && mysql_query("SET NAMES '$dbcharset'");

	if( mysql_get_server_info() > '5.0' )
	{
		mysql_query("SET sql_mode=''");
	}

	if(	!is_writable(ROOT_PATH."data/mysql_config.php")	)
	{
		$msg[]=("data/mysql_config.php �ļ�����д���������Ϊ0777");
	}
	if(	!is_writable(ROOT_PATH."upload_files")	)
	{
		$msg[]=("upload_files/ Ŀ¼����д���������Ϊ0777,��Ŀ¼�µ������ļ�ҲҪ��Ϊ0777");
	}
	
	if(	!is_writable(ROOT_PATH."data/")	)
	{
		$msg[]=("data/ Ŀ¼����д���������Ϊ0777,��Ŀ¼�µ������ļ�ҲҪ��Ϊ0777");
	}
	
	if(	!is_writable(ROOT_PATH."data/config.php")	)
	{
		$msg[]=("data/config.php �ļ�����д���������Ϊ0777");
	}

	if(	!is_writable(ROOT_PATH."data/mysql_config.php")	)
	{
		$msg[]=("data/mysql_config.php �ļ�����д���������Ϊ0777");
	}

	if(	!is_writable(ROOT_PATH."cache")	)
	{
		$msg[]=("/cache/ Ŀ¼����д���������Ϊ0777,��Ŀ¼�µ������ļ�ҲҪ��Ϊ0777");
	}


	if(	($ifPW||$addPW) && !is_writable(ROOT_PATH."bbs/data/sql_config.php")	)
	{
		$msg[]=("bbs/data/sql_config.php �ļ�����д���������Ϊ0777");
	}

	if(	($ifPW||$addPW) && !is_writable(ROOT_PATH."bbs/data/bbscache/config.php")	)
	{
		$msg[]=("bbs/data/bbscache/config.php �ļ�����д���������Ϊ0777");
	}

	if(	($ifPW||$addPW) && !is_writable(ROOT_PATH."bbs/data")	)
	{
		$msg[]=("bbs/data Ŀ¼����д����Ѵ�Ŀ¼������Ŀ�������ļ�������Ϊ0777");
	}

	if(	($ifPW||$addPW) && !is_writable(ROOT_PATH."bbs/attachment")	)
	{
		$msg[]=("bbs/attachment Ŀ¼����д����Ѵ�Ŀ¼������Ŀ�������ļ�������Ϊ0777");
	}

	if( is_array($msg) )
	{
		foreach($msg AS $value){
			$show.="|-----$value<br>";
		}
		showmsg("����Ŀ¼���ļ�����д,����ftp���޸�������Ϊ0777,Ȼ����ˢ�±�ҳ��,�ٽ�����һ����װ:<br><br><br>$show");
	}
	
	//����Ƿ��Ѱ�װ����վ
	$query=@mysql_query("select * from {$db168}members");
	
	if(	@mysql_num_rows($query) && $step!='continue'	)
	{
		$job='exist_sql';
		require_once(ROOT_PATH.'install/make.htm');
		exit;
	}
	$writefile="

/**
* ���±�����������ķ�����˵�����޸�
*/
\$dbhost = '$dbhost';		// ���ݿ������(һ�㲻�ظ�)
\$dbuser = '$dbuser';			// ���ݿ��û���
\$dbpw = '$dbpw';					// ���ݿ�����
\$dbname = '$dbname';				// ���ݿ���
\$pre='$db168';				// ��վ�����ַ� 

\$database = 'mysql';		// ���ݿ�����(һ�㲻�ظ�)
\$pconnect = 0;				// ���ݿ��Ƿ�־�����(һ�㲻�ظ�)
\$dbcharset = '$dbcharset';		// ���ݿ����,���������ҳ����,����Գ��Ը�Ϊgbk��latin1��utf8��big5,���ɽ��

	";
	writeover(ROOT_PATH."data/mysql_config.php",'<?php'.$writefile.'?>');

	//��������
	$sql_file=ROOT_PATH."install/data.sql";
	into_sql($sql_file);

	if($ifpassport==2){
		//������̳����
		$sql_file=ROOT_PATH."bbs/data.sql";
		into_sql($sql_file);
	}

	$job='adduser';
}


elseif($action=="adduser")
{
	mysql_connect($dbhost,$dbuser,$dbpw);
	mysql_select_db($dbname);
	if( mysql_get_server_info() < '4.1' )
	{
		$dbcharset='';
	}
	$dbcharset && mysql_query("SET NAMES '$dbcharset'");

	if( mysql_get_server_info() > '5.0' )
	{
		mysql_query("SET sql_mode=''");
	}

	if(!$admin_name)
	{
		$show="<CENTER>�ʺŲ���Ϊ��,<a href='#' onClick='javascript:history.go(-1);'>��������޸�</a></CENTER>";
		require_once(ROOT_PATH.'install/make.htm');
		exit;
	}

	if(!$admin_pwd)
	{
		$show=("<CENTER>���벻��Ϊ��,<a href='#' onClick='javascript:history.go(-1);'>��������޸�</a></CENTER>");
		require_once(ROOT_PATH.'install/make.htm');
		exit;
	}

	if($admin_pwd!=$admin_pwd2)
	{
		$show="<CENTER>�����������벻��ͬ,<a href='#' onClick='javascript:history.go(-1);'>��������޸�</a></CENTER>";
		require_once(ROOT_PATH.'install/make.htm');
		exit;
	}

	include(ROOT_PATH."data/config.php");


	$timestamp=time();
	
	if($ifpassport==2)
	{
		$webdb['passport_type']='pwbbs5';
		$webdb['passport_pre']="pw_";
		$webdb['passport_path']="bbs";
		$passportPath='bbs';
		$admin_pwd=md5($admin_pwd);
		
		if($delete_all){
			mysql_query("TRUNCATE TABLE pw_members");
			mysql_query("TRUNCATE TABLE pw_memberdata");
			mysql_query("TRUNCATE TABLE pw_membercredit");
			mysql_query("TRUNCATE TABLE pw_memberinfo");

			mysql_query("TRUNCATE TABLE {$db168}members");
			mysql_query("TRUNCATE TABLE {$db168}memberdata");
			mysql_query("TRUNCATE TABLE {$db168}memberdata_1");
			mysql_query("INSERT INTO {$db168}memberdata (uid,username,groupid, yz,regdate,regip,lastvist) VALUES ('$rs[uid]','$admin_name','3', '1','$timestamp','$onlineip','$timestamp')");
			
			mysql_query("INSERT INTO pw_members (uid,username, password,email,groupid,memberid,regdate,yz) VALUES ('1','$admin_name', '$admin_pwd','$admin_email',3,8,'$timestamp',1)");
			mysql_query("INSERT INTO pw_memberdata (uid,money) VALUES ('1','9999')");
			mysql_query("INSERT INTO {$db168}memberdata (uid,username, groupid,money,regip,regdate, yz,lastvist,totalspace) VALUES ('1','$admin_name', '3','9999','$onlineip','$timestamp',1,'$timestamp','999999')");
			$rs[uid]=1;
		}

		mysql_query("UPDATE {$db168}memberdata SET username='$admin_name' WHERE username='$default_admin'");
		mysql_query("UPDATE {$passportPre}members SET username='$admin_name',password='$admin_pwd' WHERE username='$default_admin'");
		mysql_query("UPDATE {$db168}members SET username='$admin_name',password='$admin_pwd' WHERE username='$default_admin'");
		mysql_query("UPDATE {$db168}article SET username='$admin_name' WHERE username='$default_admin'");
		mysql_query("UPDATE {$passportPre}threads SET author='$admin_name' WHERE author='$default_admin'");
		
		$query=@mysql_query("SELECT uid FROM {$passportPre}members ORDER BY uid DESC LIMIT 1 ");
		$r3=@mysql_fetch_array($query);
		if($r3[uid]){
			mysql_query("DELETE FROM {$db168}memberdata WHERE uid>$r3[uid] ");
			mysql_query("DELETE FROM {$db168}memberdata_1 WHERE uid>$r3[uid] ");
		}
	}
	elseif($ifpassport==1)
	{
		if($passportType=="pwbbs5")
		{
			if(!$ifPW){
				$query=@mysql_query("SELECT * FROM {$passportPre}members WHERE username='$admin_name' ");
				$rs=@mysql_fetch_array($query);
				if(!$rs){
					showmsg("��̳�в����ڴ��û�:$admin_name");
				}
				if($rs[password]!=md5($admin_pwd)){
					showmsg("���ʺ�����̳�е����벻��");
				}
			}

			$webdb['passport_type']='pwbbs5';
			$webdb['passport_pre']="$passportPre";
			$webdb['passport_path']="$passportPath";

		}
		elseif($passportType=="dzbbs5")
		{
			@include(ROOT_PATH."$passportPath/config.inc.php");

			$query=@mysql_query("SELECT * FROM {$passportPre}members WHERE username='$admin_name' ");
			$rs=@mysql_fetch_array($query);
			if(!$rs){
				showmsg("��̳�в����ڴ��û�:$admin_name");
			}
			if(!defined("UC_CONNECT")&&$rs[password]!=md5($admin_pwd)){
				showmsg("���ʺ�����̳�е����벻��");
			}
			$webdb['passport_type']='dzbbs5';
			$webdb['passport_pre']="$passportPre";
			$webdb['passport_path']="$passportPath";


		}
		elseif($passportType=="dvbbs1")
		{
			$webdb['passport_type']='dvbbs1';
			$webdb['passport_pre']="$passportPre";
			$webdb['passport_path']="$passportPath";
		}
		$admin_pwd=md5($admin_pwd);

		if($ifPW){
			mysql_query("UPDATE {$db168}memberdata SET username='$admin_name' WHERE username='$default_admin'");
			mysql_query("UPDATE {$passportPre}members SET username='$admin_name',password='$admin_pwd' WHERE username='$default_admin'");
			mysql_query("UPDATE {$db168}members SET username='$admin_name',password='$admin_pwd' WHERE username='$default_admin'");
			mysql_query("UPDATE {$db168}article SET username='$admin_name' WHERE username='$default_admin'");
			mysql_query("UPDATE {$passportPre}threads SET author='$admin_name' WHERE author='$default_admin'");
		}else{
			mysql_query("TRUNCATE TABLE {$db168}members");
			mysql_query("TRUNCATE TABLE {$db168}memberdata");
			mysql_query("INSERT INTO {$db168}memberdata (uid,username,groupid, yz,regdate,regip,lastvist) VALUES ('$rs[uid]','$admin_name','3', '1','$timestamp','$onlineip','$timestamp')");
		}
		$query=@mysql_query("SELECT uid FROM {$passportPre}members ORDER BY uid DESC LIMIT 1 ");
		$r3=@mysql_fetch_array($query);
		if($r3[uid]){
			mysql_query("DELETE FROM {$db168}memberdata WHERE uid>$r3[uid] ");
			mysql_query("DELETE FROM {$db168}memberdata_1 WHERE uid>$r3[uid] ");
		}
	}
	else
	{
		$admin_pwd=md5($admin_pwd);
		$webdb['passport_type']='';
		/*
		mysql_query("TRUNCATE TABLE {$db168}members");
		mysql_query("TRUNCATE TABLE {$db168}memberdata");
		mysql_query("TRUNCATE TABLE {$db168}memberdata_1");
		mysql_query("INSERT INTO {$db168}members (uid,username, password) VALUES ('1','$admin_name', '$admin_pwd')");
		mysql_query("INSERT INTO {$db168}memberdata (uid,username, groupid,money,regip,regdate, yz,lastvist,totalspace) VALUES ('1','$admin_name', '3','9999','$onlineip','$timestamp',1,'$timestamp','999999')");
		*/

		mysql_query("UPDATE {$db168}memberdata SET username='$admin_name' WHERE username='$default_admin'");
		mysql_query("UPDATE {$db168}members SET username='$admin_name',password='$admin_pwd' WHERE username='$default_admin'");
		mysql_query("UPDATE {$db168}company SET username='$admin_name' WHERE username='$default_admin'");
		mysql_query("UPDATE {$db168}article SET username='$admin_name' WHERE username='$default_admin'");

		$rs[uid]=1;
	}	

	writeover(ROOT_PATH."data/admin.php",'<?php	 '."\$admin_name='$admin_name';".' ?>');
	
	mysql_query("TRUNCATE TABLE {$db168}config");

	$PHP_SELF_TEMP=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$PHP_SELF=$_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:$PHP_SELF_TEMP;
	$HTTP_HOST=$_SERVER['HTTP_HOST']?$_SERVER['HTTP_HOST']:$HTTP_SERVER_VARS['HTTP_HOST'];
	$WEBURL='http://'.$HTTP_HOST.$PHP_SELF;
	$webdb['www_url']=preg_replace("/(.*)\/([^\/]*)/is","\\1",$WEBURL);

	$webdb[passport_url]="$webdb[www_url]/$passportPath";
	
	$webdb['webmail']="$admin_email";

	$webdb[mymd5]=rand(100000,99999999);


	
	$writefile="<?php
	";
	$SQL='';
	foreach( $webdb AS $key=>$value ){
		$value=addslashes($value);
		$SQL.="('$key', '$value', ''),";

		$writefile.="\$webdb['$key']='$value';\r\n";
	}
	$SQL=$SQL.";";
	$SQL=str_Replace("'),;","')",$SQL);
	mysql_query(" INSERT INTO `{$db168}config` VALUES  $SQL ");

	writeover(ROOT_PATH."data/config.php",$writefile);

	
	@unlink(ROOT_PATH."cache/MysqlTime.txt");
	@unlink(ROOT_PATH."cache/admin_logs.php");
	@unlink(ROOT_PATH."cache/adminlogin_logs.php");
	@unlink(ROOT_PATH."cache/gather_list.begin_preg.php");
	@unlink(ROOT_PATH."cache/gather_morepage.php");
	@unlink(ROOT_PATH."cache/gather_show.begin_preg.php");
	@unlink(ROOT_PATH."cache/gather_show.endfile_preg.php");
	@unlink(ROOT_PATH."cache/gather_title.php");
	@unlink(ROOT_PATH."cache/copysina.php");
	
	$cache=readover(ROOT_PATH."data/ad_cache.php");
	$cache=str_replace($default_weburl,"$webdb[www_url]/",$cache);
	writeover(ROOT_PATH."data/ad_cache.php",$cache);

	$cache=readover(ROOT_PATH."data/friendlink.php");
	$cache=str_replace($default_weburl,"$webdb[www_url]/",$cache);
	writeover(ROOT_PATH."data/friendlink.php",$cache);
	
	
	if($is_del){
		if( !is_writable(ROOT_PATH."install") ){
			$msg[]="��װĿ¼ install/ ���Բ���д,���ֹ�ɾ��";
		}
		if( !is_writable(ROOT_PATH."install.php") ){
			$msg[]="��װ�ļ� install.php ���Բ���д,���ֹ�ɾ��";
		}
	}
	if(is_array($msg)){
		foreach($msg AS $value){
			$show.="$value<br>";
		}
		$show="��ʾ:<br>$show<br>";
	}

	$job='succee';
	
	if($ifPW||$ifpassport==2){
		mysql_query("UPDATE {$passportPre}config SET db_value='$webdb[passport_url]/' WHERE db_name='db_bbsurl'");

		writeover(ROOT_PATH."bbs/data/bbscache/config.php","<?php \$db_bbsurl='$webdb[passport_url]/';?>",'a');
		$show_sql="
\$dbhost = '$dbhost';
\$dbuser = '$dbuser';
\$dbpw = '$dbpw';
\$dbname = '$dbname';
\$database = 'mysql';
\$PW = 'pw_';
\$charset = '$dbcharset';
\$manager = array('$admin_name');
\$manager_pwd = array('$admin_pwd');
\$db_hostweb = '1';		
		";
		writeover(ROOT_PATH."bbs/data/sql_config.php","<?php $show_sql?>");
	}

	if(strlen($db168)!=3){
		$query=@mysql_query("SELECT * FROM {$db168}label WHERE typesystem=1 ");
		while($rs=@mysql_fetch_array($query)){
			$rs[code]=preg_replace("/s:([\d]+):\"(.*?)\";/e","strlen_lable('\\1','\\2')",$rs[code]);
			$rs[code]=addslashes($rs[code]);
			@mysql_query("UPDATE {$db168}label SET code='$rs[code]' WHERE lid='$rs[lid]' ");
		}
	}
	
	if($delete_all){
		mysql_query("TRUNCATE TABLE {$db168}article_db");
		mysql_query("TRUNCATE TABLE {$db168}article");
		mysql_query("TRUNCATE TABLE {$db168}article_content_100");
		mysql_query("TRUNCATE TABLE {$db168}article_content_101");
		mysql_query("TRUNCATE TABLE {$db168}article_content_102");
		mysql_query("TRUNCATE TABLE {$db168}article_content_106");
		mysql_query("TRUNCATE TABLE {$db168}reply");
		mysql_query("TRUNCATE TABLE {$db168}keyword");
		mysql_query("TRUNCATE TABLE {$db168}keywordid");
		mysql_query("TRUNCATE TABLE {$db168}special");
		mysql_query("TRUNCATE TABLE {$db168}spsort");
		mysql_query("TRUNCATE TABLE {$db168}special_comment");
		mysql_query("TRUNCATE TABLE {$db168}comment");
		mysql_query("TRUNCATE TABLE {$db168}pm");
		mysql_query("TRUNCATE TABLE {$db168}upfile");
		mysql_query("TRUNCATE TABLE {$db168}report");
		mysql_query("TRUNCATE TABLE {$db168}memberdata_1");

		mysql_query("TRUNCATE TABLE {$db168}fenlei_db");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_content");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_content_1");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_content_3");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_content_5");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_content_6");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_content_7");
		mysql_query("TRUNCATE TABLE {$db168}fenlei_pic");

		mysql_query("DELETE FROM {$db168}members WHERE uid!=1");
		mysql_query("DELETE FROM {$db168}memberdata WHERE uid!=1");
		mysql_query("DELETE FROM {$db168}memberdata_1 WHERE uid!=1");
		mysql_query("DELETE FROM {$db168}company WHERE uid!=1");
		mysql_query("DELETE FROM {$db168}homepage WHERE uid!=1");

		deldir(ROOT_PATH."upload_files/article");
		deldir(ROOT_PATH."upload_files/special");
	}
	require_once(ROOT_PATH.'inc/biz/function.php');
if(!$life_more){
	mysql_query("DELETE FROM {$db168}city WHERE fid!=1");
	mysql_query("DELETE FROM {$db168}zone WHERE fup!=1");
	mysql_query("DELETE FROM {$db168}street WHERE fup!=1");
	$_show='<?php unset($city_DB); $city_DB[1][1]="����"; $city_DB[name][1]="����"; $city_DB[fup][1]="1";$city_DB[url][1]=$webdb[www_url]."/index.php?choose_cityID=1";'."?>";
	writeover(ROOT_PATH."data/all_city.php",$_show);
	deldir(ROOT_PATH.'city_admin');
}

	if(WEB_LANG=='big5'){
		$head_menu=require(ROOT_PATH."hy/inc/homepage/menu.php");
		$s=addslashes(serialize($head_menu));
		mysql_query("UPDATE {$db168}homepage SET head_menu='$s'");
		$array=require(ROOT_PATH."data/form_module.php");
		foreach($array AS $key=>$rs){
			$s=addslashes(serialize($rs[config]));
			mysql_query("UPDATE {$db168}form_module SET config='$s' WHERE id='$key'");
		}

		require(ROOT_PATH."data/article_module.php");
		foreach($article_moduleDB AS $key=>$rs){
			$s=addslashes(serialize($rs[config]));
			mysql_query("UPDATE {$db168}article_module SET config='$s' WHERE id='$key'");
		}

		$array=array(
			'fenlei_'=>'f','shop_'=>'shop','tuangou_'=>'tg','coupon_'=>'coupon','gift_'=>'gift','hy_'=>'hy');
		foreach($array AS $_e=>$path){
			require(ROOT_PATH."$path/data/module_db.php");
			foreach($module_DB AS $key=>$rs){
				$config=addslashes(serialize($rs[config]));
				$config2=addslashes(serialize($rs[config2]));
				mysql_query("UPDATE {$db168}{$_e}module SET config='$config',config2='$config2' WHERE id='$key'");
			}
		}
	}

	if(is_writable("install")&&is_writable("install.php")){
		require_once(ROOT_PATH.'install/make.htm');
		deldir("install");
		deldir("install.php");
		//deldir(ROOT_PATH."bbs/data.sql");
	}else{
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312">';
		echo "<CENTER>��װ�ɹ�,���ֹ�ɾ����װ�ļ�install.php��Ŀ¼install/���ܽ�����ҳ</CENTER>";
	}
	exit;

}

require_once(ROOT_PATH.'install/make.htm');


function readover($filename,$method="rb"){
	if($handle=@fopen($filename,$method)){
		flock($handle,LOCK_SH);
		$filedata=fread($handle,filesize($filename));
		fclose($handle);
	}
	return $filedata;
}
function writeover($filename,$data,$method="rb+",$iflock=1){
	touch($filename);
	$handle=fopen($filename,$method);
	if($iflock){
		flock($handle,LOCK_EX);
	}
	$show=fputs($handle,$data);
	if($method=="rb+") ftruncate($handle,strlen($data));
	fclose($handle);
	return $show;
}

function write_file($filename,$data,$method="rb+",$iflock=1){
	@touch($filename);
	$handle=@fopen($filename,$method);
	if($iflock){
		@flock($handle,LOCK_EX);
	}
	@fputs($handle,$data);
	if($method=="rb+") @ftruncate($handle,strlen($data));
	@fclose($handle);
	@chmod($filename,0777);	
	if( is_writable($filename) ){
		return 1;
	}else{
		return 0;
	}
}

function into_sql($file){
	global $dbhost,$dbuser,$dbpw,$dbname,$db168,$dbcharset;
	mysql_connect($dbhost,$dbuser,$dbpw);
	mysql_select_db($dbname);
	if( mysql_get_server_info() < '4.1' ){
		$dbcharset='';
	}
	$dbcharset && mysql_query("SET NAMES '$dbcharset'");
	if( mysql_get_server_info() > '5.0' ){
		mysql_query("SET sql_mode=''");
	}
	$file2=readover($file);
	$file2=str_replace(" qb_"," $db168",$file2);
	$file2=str_replace("`qb_","`$db168",$file2);
	if($dbcharset){
		//$file2=str_replace("TYPE=MyISAM"," ENGINE=MyISAM DEFAULT CHARSET=$dbcharset ",$file2);
	}
	$file2=explode("\n",$file2);
	$c1=count($file2);
	for($j=0;$j<$c1;$j++){
		$ck=substr($file2[$j],0,4);
		if( ereg("#",$ck)||ereg("--",$ck) ){
			continue;
		}
		$arr[]=$file2[$j];
	}
	$read=implode("\n",$arr); 
	$sql=str_replace("\r",'',$read);
	$detail=explode(";\n",$sql);
	$count=count($detail);
	for($i=0;$i<$count;$i++){
		$sql=str_replace("\r",'',$detail[$i]);
		$sql=str_replace("\n",'',$sql);
		$sql=trim($sql);
		if($sql){
			if(eregi("CREATE TABLE",$sql)){
				//$mysqlV=mysql_get_server_info();
				$sql=preg_replace("/DEFAULT CHARSET=([a-z0-9]+)/is","",$sql);
				$sql=preg_replace("/TYPE=MyISAM/is","ENGINE=MyISAM",$sql);
				if($dbcharset){
					$sql=str_replace("ENGINE=MyISAM"," ENGINE=MyISAM DEFAULT CHARSET=$dbcharset ",$sql);
				}
				if(mysql_get_server_info()<'4.1'){
					$sql=preg_replace("/ENGINE=MyISAM/is","TYPE=MyISAM",$sql);
				}
			}
			mysql_query($sql);
		}

	}
}
function deldir($path){
	if (file_exists($path)){
		if(is_file($path)){
			@unlink($path);
		} else{
			$handle = opendir($path);
			while ($file = readdir($handle)) {
				if (($file!=".") && ($file!="..") && ($file!="")){
					if (is_dir("$path/$file")){
						deldir("$path/$file");
					} else{
						@unlink("$path/$file");
					}
				}
			}
			closedir($handle);
			@rmdir($path);
		}
	}
}

function getBbsCharset($table){
	global $dbhost,$dbuser,$dbpw,$dbname;
	@mysql_connect($dbhost,$dbuser,$dbpw);
	if( @mysql_get_server_info() < '4.1' ){
		return ;
	}
	@mysql_select_db($dbname);
	$query=@mysql_query("SHOW CREATE TABLE $table");
	if(!$query){
		return ;
	}
	while($rs=mysql_fetch_array($query)){
		$table=$rs['Create Table'];
	}
	$table=preg_replace("/(.*)DEFAULT CHARSET=([a-z0-9]+)(.*)/is","\\2",$table);
	return $table;
}

function showmsg($msg){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312">';
	echo "������ʾ:$msg<br><br>";
	echo '<input type="button" name="Submit" value="�������" id="post_bt" onclick="history.back(-1)">';
	exit;
}

function strlen_lable($num,$sring){
	$sring=stripslashes($sring);
	$num=strlen($sring);
	return "s:$num:\"$sring\";";
}
?>