<?php
!function_exists('html') && exit('ERR');

function mysql_get_table_value($table,$start=0,$row=3000){
	global $db;
	$query=$db->query(" SELECT * FROM $table LIMIT $start,$row ");
	$num=mysql_num_fields($query);
	while ($array=mysql_fetch_row($query)){
		$rows='';
		for($i=0;$i<$num;$i++){
			$rows.="'".mysql_escape_string($array[$i])."',";
		}
		$rows.=")";
		$rows=str_replace(",)","",$rows);
		$show.="INSERT INTO `$table` VALUES ($rows);\r\n";
	}
	return $show;
}

function mysql_bak_out($tabledb){
	global $db,$rowsnum,$fileNUM,$bak_path,$baksize,$tableid,$page;

	//��pageָ����ÿ�������ݴ��ʱ��.��Ҫ�����תҳ���ȡ
	if(!$page){	
		$page=1;
	}
	$min=($page-1)*$rowsnum;
	$tableid=intval($tableid);

	if( $show=mysql_get_table_value($tabledb[$tableid],$min,$rowsnum) ){	//����������,��Ҫ������ȡ
		$page++;
	}else{			//���������ݵ����,������һ����
		$page=0;
		$tableid++;
	}

	//�־��Ǵ�0��ʼ��
	$fileNUM=intval($fileNUM);
	$filename="$fileNUM.sql";
	$show && write_file("$bak_path/$filename",$show,'a+');


	//���ļ�����ȷ��С�־���
	$show && cksize("$bak_path/$filename",$baksize);
	
	//��������ڱ�ʱ.����,�������
	if($tabledb[$tableid]){
		//���ϱ仯�ı����� $page,$tableid,$fileNUM
		return true;
	}else{
		@unlink(ROOT_PATH."cache/bak_mysql.txt");
		return false;
	}
}


//*���ݵķ־��ļ����̶���С������*
function cksize($lastSqlFile,$size){
	global $fileNUM,$bak_path;

	//����һ��������ɵ��Է����ȡ�ļ���С,�����ȡ������ʵ�ļ��Ĵ�С.����ܹؼ�
	copy($lastSqlFile,"{$lastSqlFile}.bak");

	if( @filesize("{$lastSqlFile}.bak")<$size ){	
		unlink("{$lastSqlFile}.bak");
		return ;
	}
	
	$filePre=str_replace(basename($lastSqlFile),"",$lastSqlFile);
	$readfile=read_file("{$lastSqlFile}.bak");
	$detail=explode("\r\n",$readfile);
	unset($readfile); //�ͷ��ڴ�
	foreach($detail AS $key=>$value){
		$NewSql.="$value\r\n";
		if(strlen($NewSql)>$size){
			write_file("$filePre/$fileNUM.sql",$NewSql);
			$fileNUM++;
			$NewSql='';
		}
	}
	//���µ���д�����ļ�,��ʱstep�Ѿ��ۼӹ���
	if($NewSql){
		write_file("$filePre/$fileNUM.sql",$NewSql);
	}
	@unlink("{$lastSqlFile}.bak");
}


?>