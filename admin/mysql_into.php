<?php die();
error_reporting(7);
@set_time_limit(0);
$_dbhost='localhost';
$_dbuser='';
$_dbpw='';
$_dbname='';
$_Charset='latin1';


foreach($_POST as $_key=>$_value){
	!ereg("^\_",$_key) && $$_key=$_POST[$_key];
}
foreach($_GET as $_key=>$_value){
	!ereg("^\_",$_key) && $$_key=$_GET[$_key];
}



if(!$job&&!$page){
print <<<EOT

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<form name="form1" method="post" action="?a">
  <p>���ݿ�����: 
    <input type="text" name="dbhost" value="$_dbhost">һ��Ϊ:localhost
    <br>
    ���ݿ��ʺ�: 
    <input type="text" name="dbuser" value="$_dbuser">
    <br>
    ���ݿ�����: 
    <input type="text" name="dbpw" value="$_dbpw">
    <br>
    ���ݿ���: 
    <input type="text" name="dbname" value="$_dbname">
    <br>
    ���ݿ����: 
    <input type="text" name="Charset" value="$_Charset">
    �ɹ�ѡ�����<font color="#FF0000">latin1</font>,<font color="#FF0000">gbk</font>,<font color="#FF0000">utf8</font>,<font color="#FF0000">big5</font> 
    ���ѡ�� <font color="#FF0000">latin1</font> <br>
  </p>
  <p> 
    <input type="submit" name="Submit" value="��ʼ����">
    <input type="hidden" name="job" value="1">
  </p>
</form>


EOT;
exit;
}

if($page>0){
	list($dbhost,$dbuser,$dbpw,$dbname,$Charset)=explode("\t",$_COOKIE[mysqlconfig]);
}

if(!@mysql_connect($dbhost, $dbuser, $dbpw)) {
	die('MYSQL �������ݿ�ʧ��,��ȷ�����ݿ��û���,����������ȷ<br><A HREF="#" onclick="history.back(-1)">�������</A>');
}
if(!@mysql_select_db($dbname)){
	die("MYSQL ���ӳɹ�,����ǰʹ�õ����ݿ� {$dbname} ������<br><A HREF=\"#\" onclick=\"history.back(-1)\">�������</A>");
}

$mysqlV=mysql_get_server_info();

if($mysqlV>'4.1'){
	mysql_query("SET NAMES '$Charset'");
}

if( mysql_get_server_info() > '5.0' ){
	mysql_query("SET sql_mode=''");
}

if(!$page){
	setcookie("mysqlconfig","$dbhost\t$dbuser\t$dbpw\t$dbname\t$Charset");
}

$page=intval($page);
if(is_file("$page.sql")){
	insert_file("$page.sql");
	$page++;
	echo "���ڵ����{$page}��,���Ժ�...<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?page=$page'>";
	exit;
}else{
	echo "���ݵ������,������ǴӾɿռ�ת�����ݵ��¿ռ�,��Ѿɿռ�/data/Ŀ¼�µ�ȫ���ļ��Ƶ��¿ռ��Ӧ��/data/Ŀ¼��.��mysql_config.php������.��Ϊ�µ����ݿ�������ɵ�һ�㲻��ͬ,�������Ҫ�ֹ����ú��¿ռ������ļ�mysql_config.php";
}

function insert_file($file,$replace=''){
	global $Charset;
	$readfiles=read_file($file);
	if($replace){
		$readfiles=str_replace('$timestamp',"$timestamp",$readfiles);
	}
	$detail=explode("\n",$readfiles);
	$count=count($detail);
	for($j=0;$j<$count;$j++){
		$ck=substr($detail[$j],0,4);
		if( ereg("#",$ck)||ereg("--",$ck) ){
			continue;
		}
		$array[]=$detail[$j];
	}
	$read=implode("\n",$array); 
	$sql=str_replace("\r",'',$read);
	$detail=explode(";\n",$sql);
	$count=count($detail);
	for($i=0;$i<$count;$i++){
		$sql=str_replace("\r",'',$detail[$i]);
		$sql=str_replace("\n",'',$sql);
		$sql=trim($sql);
		if($sql){
			if(eregi("CREATE TABLE",$sql)){
				$mysqlV=mysql_get_server_info();
				$sql=preg_replace("/DEFAULT CHARSET=([a-z0-9]+)/is","",$sql);
				$sql=preg_replace("/TYPE=MyISAM/is","ENGINE=MyISAM",$sql);
				if($mysqlV>'4.1'){
					$sql=str_replace("ENGINE=MyISAM"," ENGINE=MyISAM DEFAULT CHARSET=$Charset ",$sql);
				}
			}
			
			$query=mysql_query($sql);
			if (!$query) die("���ݿ����:$sql");
			$check++;
		}	
	}
	return $check;
}
function read_file($filename,$method="rb"){
	if($handle=@fopen($filename,$method)){
		@flock($handle,LOCK_SH);
		$filedata=@fread($handle,@filesize($filename));
		@fclose($handle);
	}
	return $filedata;
}