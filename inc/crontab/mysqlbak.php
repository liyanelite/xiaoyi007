<?php
!function_exists('html') && exit('ERR');

require_once(dirname(__FILE__)."/mysqlbak.function.php");	//ֻ�ܰ���һ��


$rowsnum=100;		//ÿ�ζ�ȡ����������
$baksize=1024*1024;  //ÿ���С

$tabledb=$show=$fileNUM=$page='';

$bak_path=ROOT_PATH.'cache/mysql_bak/'.date("Y-m-d.",time()).strtolower(rands(4));

@mkdir($bak_path,0777);

$db->query("SET SQL_QUOTE_SHOW_CREATE = 1");

$query=$db->query("SHOW TABLE STATUS");
while( $array=$db->fetch_array($query) ){
	if(!ereg("^($pre)",$array[Name])){
		continue;
	}
	$tabledb[]=$array[Name];
	
	//���ݱ�ṹ
	$show.="DROP TABLE IF EXISTS $array[Name];\r\n";
	$ar=$db->get_one("SHOW CREATE TABLE $array[Name]");
	$show.=$ar['Create Table'].";\r\n\r\n";
}

//���ݽṹ��д���ļ�
write_file("$bak_path/0.sql",$show,'a+');

$ifdo=true;
do{
	$ifdo=mysql_bak_out($tabledb);
	sleep(1);	//��Ϣһ��ִ��һ��,������վ����һʱ����
}
while($ifdo);


echo 'qibo';

?>