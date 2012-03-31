<?php
!function_exists('html') && exit('ERR');
@set_time_limit(0);
$db->query("SET SQL_QUOTE_SHOW_CREATE = 1");

/**
*�г����ݱ�
**/
if($job=='out'&&$Apower[mysql_out]){
	$query=$db->query("SHOW TABLE STATUS");
	while( $array=$db->fetch_array($query) ){
		if($choose!='all'){
			if($choose=='out'){
				if(ereg("^($pre)",$array[Name])){
					continue;
				}
			}else{
				if(!ereg("^($pre)",$array[Name])){
					continue;
				}
			}
		}
		$j++;
		$totalsize=$totalsize+$array['Data_length'];
		$array['Data_length']=number_format($array['Data_length']/1024,3);
		$array[j]=$j;
		$listdb2[$array[Name]]=$array;
	}

	@include("tablename.php");$array='';
	foreach($tableName AS $key=>$value){
		$listdb2[$key] && $array[$key]=$listdb2[$key];
	}
	$listdb=$array?$array+$listdb2:$listdb2;

	$totalsize=number_format($totalsize/(1024*1024),3);
	if(file_exists(ROOT_PATH."cache/bak_mysql.txt"))
	{
		$breakbak=read_file(ROOT_PATH."cache/bak_mysql.txt");
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/mysql/menu.htm");
	require(dirname(__FILE__)."/"."template/mysql/out.htm");
	require(dirname(__FILE__)."/"."foot.php");
	
}
//���ݿ��Ż����޸�
elseif($job=='do'&&$Apower[mysql_out]){
	if($step=='yh'){
		$db->query("OPTIMIZE TABLE `$table`");
	}elseif($step=='xf'){
		$db->query("REPAIR TABLE `$table`");
	}
	jump("�����ɹ����������",$FROMURL,1);
}

/**
*������������
**/
elseif($action=='out'&&$Apower[mysql_out]){
	if(!$tabledb&&!$tabledbreto){
		showmsg('��ѡ��һ�����ݱ�');
	}
	if(!$tabledb&&$tabledbreto){
		$detail=explode("|",$tabledbreto);
		$num=count($detail);
		for($i=0;$i<$num-1;$i++){
			$tabledb[]=$detail[$i];
		}
	}
	$rsdb=bak_out($tabledb);
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/mysql/menu.htm");
	require(dirname(__FILE__)."/"."template/mysql/outaction.htm");
	require(dirname(__FILE__)."/"."foot.php");
}

/**
*ѡ��Ҫ���뻹ԭ������
**/
elseif($job=='into'&&$Apower[mysql_into]){
	$selectname=bak_time();
	if(file_exists(ROOT_PATH."cache/mysql_insert.txt")){
		echo "<CENTER><table><tr bgcolor=#FF0000><td colspan=5 height=30><div align=center><A HREF=".read_file(ROOT_PATH."cache/mysql_insert.txt")."><b><font color=ffffff>�ϴλ�ԭ���ݱ��ж��Ƿ����,�������</font></b></A></div></td></tr></table></CENTER>";
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/mysql/menu.htm");
	require(dirname(__FILE__)."/"."template/mysql/into.htm");
	require(dirname(__FILE__)."/"."foot.php");
}

/**
*�����뻹ԭ����
**/
elseif($action=='into'&&$Apower[mysql_into])
{
	bak_into();
}

/**
*ѡ��Ҫɾ���ı�������
**/
elseif($job=='del'&&$Apower[mysql_del]){
	$selectname=bak_time();
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/mysql/menu.htm");
	require(dirname(__FILE__)."/"."template/mysql/del.htm");
	require(dirname(__FILE__)."/"."foot.php");
}

/**
*ɾ��ѡ���ı�������
**/
elseif($action=='del'&&$Apower[mysql_del]){
	if(!$baktime){
		showmsg('��ѡ��һ��');
	}
	del_file(ROOT_PATH."cache/mysql_bak/$baktime");
	if(!is_dir(ROOT_PATH."cache/mysql_bak/$baktime")){
		jump("����ɾ���ɹ�","index.php?lfj=mysql&job=del",5);
	}else{
		jump("����ɾ��ʧ��,��ȷ��Ŀ¼����Ϊ0777","index.php?lfj=mysql&job=del",5);
	}
}


/**
*�ӱ����ϴ�SQL�ı���������
**/
elseif($job=='sql'&&$Apower[mysql_sql]){
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/mysql/menu.htm");
	require(dirname(__FILE__)."/"."template/mysql/sql.htm");
	require(dirname(__FILE__)."/"."foot.php");
}

/**
*�������ϴ���SQL����
**/
elseif($action=='sql'&&$Apower[mysql_sql]){
	if($t==2){
		$sqlfile=ROOT_PATH."$webdb[updir]/$upsql";
		$db->insert_file($sqlfile);
		@unlink($sqlfile);
	}elseif($t==1){
		$sql=StripSlashes($sql);
		if($pre!='qb_'){
			$sql=str_replace("qb_",$pre,$sql);
		}		
		write_file(ROOT_PATH."cache/$timestamp.sql",$sql);
		$db->insert_file(ROOT_PATH."cache/$timestamp.sql");
		unlink(ROOT_PATH."cache/$timestamp.sql");
		//$db->query("$sql");
	}
	jump("�����ҳ�Ϸ�û�������룬������ɹ�","index.php?lfj=mysql&job=sql",10);
	
}

function show_field($table){
	global $db;
	$query=$db->query(" SELECT * FROM $table limit 0,1");
	$num=mysql_num_fields($query);
	for($i=0;$i<$num;$i++){
		$f_db=mysql_fetch_field($query,$i);
		$field=$f_db->name;
		$show.="`$field`,";
	}
	$show.=")";
	$show=str_replace(",)","",$show);
	return $show;
}


function create_table($table){
	global $db,$repair,$mysqlversion,$Charset;
	$show="DROP TABLE IF EXISTS $table;\n";
	if($repair){
		$db->query("OPTIMIZE TABLE `$table`");
	}
	$array=$db->get_one("SHOW CREATE TABLE $table");

	if(!$mysqlversion){
		$show.=$array['Create Table'].";\n\n";
		return $show;
	}

	$array['Create Table']=preg_replace("/DEFAULT CHARSET=([0-9a-z]+)/is","",$array['Create Table']);

	if($mysqlversion=='new'){
		$Charset || $Charset='latin1';
		$array['Create Table'].=" DEFAULT CHARSET=$Charset";
	}
	$show.=$array['Create Table'].";\n\n";
	return $show;
}


function bak_table($table,$start=0,$row=3000){
	global $db;
	$limit=" limit $start,$row ";
	//$field=show_field($table);
	$query=$db->query(" SELECT * FROM $table $limit ");
	$num=mysql_num_fields($query);
	while ($array=mysql_fetch_row($query)){
		$rows='';
		for($i=0;$i<$num;$i++){
			$rows.="'".mysql_escape_string($array[$i])."',";
		}
		$rows.=")";
		$rows=str_replace(",)","",$rows);
		//$show.="INSERT INTO `$table` ($field) VALUES ($rows);\n";
		$show.="INSERT INTO `$table` VALUES ($rows);\n";
	}
	return $show;
}


function create_table_all($tabledb){
	foreach($tabledb as $table){
		$show.=create_table($table)."\n";
	}
	return $show;
}


function bak_out($tabledb){
	global $db,$pre,$rowsnum,$tableid,$page,$timestamp,$step,$rand_dir,$lfj,$baksize;
	//��û���������Ŀ¼֮ǰ
	if(!$rand_dir){
		/*�صش�����Щ���������ܴ���Ŀ¼�����,��ʱ�����ֹ�����mysqlĿ¼*/
		if( file_exists(ROOT_PATH."cache/mysql_bak/mysql") )
		{
			if( !is_writable(ROOT_PATH."cache/mysql_bak/mysql") ){
				showmsg(ROOT_PATH."cache/mysql_bak/mysqlĿ¼����д,�������Ϊ0777");
			}
			$rand_dir="mysql";

			$d=opendir(ROOT_PATH."cache/mysql_bak/mysql/");
			while($f=readdir($d)){
				if(eregi("\.sql$",$f)){
					unlink(ROOT_PATH."cache/mysql_bak/mysql/$f");
				}
			}
			
			write_file(ROOT_PATH."cache/mysql_bak/mysql/index.php",str_replace('<?php die();','<?php',read_file('mysql_into.php')));
			$show=create_table_all($tabledb);	//�������ݱ�ṹ
			//$db->query("TRUNCATE TABLE {$pre}bak");
			//bak_dir('../data/');		//���ݻ���
		}else{
			$rand_dir=date("Y-m-d.",time()).strtolower(rands(3));
			$show=create_table_all($tabledb);	//�������ݱ�ṹ
			if( !file_exists(ROOT_PATH."cache/mysql_bak") ){
				if( !@mkdir(ROOT_PATH."cache/mysql_bak",0777) ){
					showmsg(ROOT_PATH."cache/mysql_bakĿ¼���ܴ���");
				}
			}
			if(	!@mkdir(ROOT_PATH."cache/mysql_bak/$rand_dir",0777)	)
			{
				showmsg(ROOT_PATH."cache/mysql_bak/$rand_dir,Ŀ¼����д,�������Ϊ0777");
			}
			//����һ���Զ���ԭ���ļ���SQLĿ¼.�����պ�ԭ
			write_file(ROOT_PATH."cache/mysql_bak/$rand_dir/index.php",str_replace('<?php die();','<?php',read_file('mysql_into.php')));
			//$db->query("TRUNCATE TABLE {$pre}bak");
			//bak_dir('../data/');		//���ݻ���
		}
	}
	!$rowsnum && $rowsnum=500;	//ÿ�ζ�ȡ����������
	//��pageָ����ÿ������ʱ��.��Ҫ�����תҳ���ȡ
	if(!$page)
	{
		$page=1;
	}
	$min=($page-1)*$rowsnum;
	$tableid=intval($tableid);

	//$show.=$tablerows=bak_table($tabledb[$tableid],$min,$rowsnum);
	//��ǰ����ȡ������ʱ,�����˱���һҳȡ����,�������һ�����0��ʼ

	if( $tablerows=bak_table($tabledb[$tableid],$min,$rowsnum) )
	{
		$show.=$tablerows;
		unset($tablerows);	//�ͷ��ڴ�
		$page++;
	}
	else
	{
		$page=0;
		$tableid++;
	}

	//�־��Ǵ�0��ʼ��
	$step=intval($step);
	$filename="$step.sql";
	write_file(ROOT_PATH."cache/mysql_bak/".$rand_dir."/".$filename,$show,'a+');

	//�����ָ��ÿ���С.��Ĭ��Ϊ1M
	$baksize=$baksize?$baksize:1024;
	
	//���ļ�����ȷ��С�־���
	$step=cksize(ROOT_PATH."cache/mysql_bak/".$rand_dir."/".$filename,$step,1024*$baksize);
	
	//��������ڱ�ʱ.����,�������
	if($tabledb[$tableid])
	{
		foreach($tabledb as $value)
		{
			$Table.="$value|";
		}
		//��¼����.��ֹ��;����ʧ��
		write_file(ROOT_PATH."cache/bak_mysql.txt","index.php?lfj=$lfj&action=out&page=$page&rowsnum=$rowsnum&tableid=$tableid&rand_dir=$rand_dir&step=$step&tabledbreto=$Table&baksize=$baksize");

		echo "<CENTER>�ѱ��� <font color=red>$step</font> ��, ������ <font color=blue>{$page}</font> ��ǰ���ڱ������ݿ� <font color=red>$tabledb[$tableid]</font></CENTER>";

print<<<EOT
<form name="form1" method="post" action="index.php?lfj=$lfj&action=out&page=$page&rowsnum=$rowsnum&tableid=$tableid&rand_dir=$rand_dir&step=$step&baksize=$baksize">
  <input type="hidden" name="tabledbreto" value="$Table">
</form>
<SCRIPT LANGUAGE="JavaScript">
<!--
function autosub(){
	document.form1.submit();
}
autosub();
//-->
</SCRIPT>
EOT;
		//echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=index.php?lfj=$lfj&action=out&page=$page&rowsnum=$rowsnum&tableid=$tableid&rand_dir=$rand_dir&step=$step&tabledbreto=$Table&baksize=$baksize'>";
		exit;
	}
	else
	{
		$dir=opendir(ROOT_PATH."cache/mysql_bak/$rand_dir");
		while($file=readdir($dir)){
			if(eregi('.sql$',$file))
			{
				$totalsize+=$sqlfilesize=@filesize(ROOT_PATH."cache/mysql_bak/$rand_dir/$file");
				$rs[sqlsize][]=number_format($sqlfilesize/1024,3);
			}
			
		}
		$totalsize=number_format($totalsize/1048576,3);
		@unlink(ROOT_PATH."cache/bak_mysql.txt");
		$rs[totalsize]=$totalsize;
		$rs[timedir]=$rand_dir;
		if( !@is_writable(ROOT_PATH."cache/mysql_bak/$rand_dir/0.sql") ){
			showmsg("����ʧ�ܣ�����cache/mysql_bak/Ŀ¼�´���һ��Ŀ¼mysqlȻ���������Ϊ0777,�����Ŀ¼�Ѵ��ڣ���ɾ���������´�������������Ϊ0777");
		}
		return $rs;
	}
}

function bak_time(){
	$show="<select  name='baktime'><option value='' selected>��ѡ�񱸷��ļ�</option>";
	$dir=opendir(ROOT_PATH."cache/mysql_bak/");
	while( $file=readdir($dir) ){
		if( is_dir(ROOT_PATH."cache/mysql_bak/$file")&&$file!='.'&&$file!='..' ){
			$show.="<option value='$file'>$file</option>";
		}
	}
	$show.="</select>";
	return $show;
}

function bak_into(){
	global $step,$baktime,$db,$pre;
	$step=intval($step);
	$file=ROOT_PATH."cache/mysql_bak/$baktime/{$step}.sql";
	if( file_exists($file) ){
		$db->insert_file($file);
	}
	$step++;
	if( file_exists(ROOT_PATH."cache/mysql_bak/$baktime/{$step}.sql") ){
		write_file(ROOT_PATH."cache/mysql_insert.txt","?lfj=mysql&action=into&baktime=$baktime&step=$step");
		echo "�ѵ���� {$step} ��<META HTTP-EQUIV=REFRESH CONTENT='0;URL=index.php?lfj=mysql&action=into&baktime=$baktime&step=$step'>";
		exit;
	}else{
		//$query=$db->query("SELECT * FROM {$pre}bak ");
		//while(@extract($db->fetch_array($query))){
		//	write_file(ROOT_PATH."A/$bak_dir",$bak_txt);
		//}
		@unlink(ROOT_PATH."cache/mysql_insert.txt");
		jump("�������",'index.php?lfj=mysql&job=into','5');
	}
}
/*
function bak_dir($path){
	global $db,$filedb,$pre;
	if (file_exists($path)){
		if(is_file($path)){
			$files=read_file($path);
			$files=mysql_escape_string($files);
			$db->query("INSERT INTO {$pre}bak (bak_dir,bak_txt) VALUES ('$path','$files') ");
		} else{
			$handle = opendir($path);
			while ($file = readdir($handle)) {
				if( ($file!=".") && ($file!="..") && ($file!="") ){
					if (is_dir("$path/$file")){
						bak_dir("$path/$file");
					} else{
						$files=read_file("$path/$file");
						$files=mysql_escape_string($files);
						if("mysql_config.php"!=$file){
							$db->query("INSERT INTO {$pre}bak (bak_dir,bak_txt) VALUES ('$path/$file','$files') ");
						}
					}
				}
			}
			closedir($handle);
		}
	}
}
*/

/*���ݵķ־��ļ����̶���С������*/
function cksize($lastSqlFile,$step,$size){
	if( @filesize($lastSqlFile)<($size+10*1024) )
	{
		return $step;
	}
	//����һ��������ɵĴ���ָ����С��SQL�ļ�������
	copy($lastSqlFile,"{$lastSqlFile}.bak");
	$filePre=str_replace(basename($lastSqlFile),"",$lastSqlFile);
	$readfile=read_file("{$lastSqlFile}.bak");
	$detail=explode("\n",$readfile);
	unset($readfile); //�ͷ��ڴ�
	foreach($detail AS $key=>$value){
		$NewSql.="$value\n";
		if(strlen($NewSql)>$size){
			write_file("$filePre/$step.sql",$NewSql);
			$step++;
			$NewSql='';
		}
	}
	//���µ���д�����ļ�,��ʱstep�Ѿ��ۼӹ���
	if($NewSql){
		write_file("$filePre/$step.sql",$NewSql);
	}
	@unlink("{$lastSqlFile}.bak");
	return $step;
}
?>