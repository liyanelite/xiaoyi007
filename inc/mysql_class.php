<?php
Class MYSQL_DB {
	var $connet_nums = 0;	//���ݿ⵱ǰҳ�����Ӵ���
	var $IsConnet = 0;		//���ݿ��Ƿ�������
	function connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect = '' ,$ifUC='') {
		global $dbcharset;
		if($pconnect) {
			if(!@mysql_pconnect($dbhost, $dbuser, $dbpw)) {
				$this->Err('MYSQL ���������������ݿ�,��ȷ�����ݿ��û���,����������ȷ,���ҷ�����֧����������<br>');
				if($ifUC){
					$this->uc_err();
				}
				exit;
			}
		} else {
			if(!@mysql_connect($dbhost, $dbuser, $dbpw)) {				
				$this->Err('MYSQL �������ݿ�ʧ��,��ȷ�����ݿ��û���,����������ȷ<br>');
				if($ifUC){
					$this->uc_err();
				}
				exit;
			}
		}
		if(!@mysql_select_db($dbname)){			
			$this->Err("MYSQL ���ӳɹ�,����ǰʹ�õ����ݿ� {$dbname} ������<br>");
			if($ifUC){
				$this->uc_err();
			}
			exit;
		}
		if( mysql_get_server_info() > '4.1' ){
			if($dbcharset){
				//mysql_query("SET NAMES '$dbcharset'");
				mysql_query("SET character_set_connection=$dbcharset,character_set_results=$dbcharset,character_set_client=binary");
			}else{
				mysql_query("SET character_set_client=binary");
			}
			if( mysql_get_server_info() > '5.0' ){
				mysql_query("SET sql_mode=''");
			}
		}
		$this->IsConnet=1;
	}

	function close() {
		$this->IsConnet=0;
		return mysql_close();
	}

	function query($SQL,$method='',$showerr='1') {
		if($this->IsConnet==0){
			global $dbhost, $dbuser, $dbpw, $dbname, $pconnect;
			$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
		}
		
		//����ͳ�Ʋ�ѯʱ��
		$speed_headtime=explode(' ',microtime());
		$speed_headtime=$speed_headtime[0]+$speed_headtime[1];

		if($method=='U_B' && function_exists('mysql_unbuffered_query')){
			$query = mysql_unbuffered_query($SQL);
		}else{
			$query = mysql_query($SQL);
		}
		
		//����ͳ�Ʋ�ѯʱ��
		$speed_endtime=explode(' ',microtime());
		$totaltime=number_format((($speed_endtime[0]+$speed_endtime[1]-$speed_headtime)/1),6);
		$speed_totaltime="TIME $totaltime second(s)\t$SQL\r\n";
		if($totaltime>0.3){
			//write_file(ROOT_PATH."/cache/MysqlTime.txt",$speed_totaltime,'a');
			//����3M,�Զ�ɾ��
			if(filesize(ROOT_PATH."/cache/MysqlTime.txt")>1024*1024*3){
				unlink(ROOT_PATH."/cache/MysqlTime.txt");
			}
		}
		$this->connet_nums++;

		if (!$query&&$showerr=='1')  $this->Err("���ݿ����ӳ���:$SQL<br>");
		return $query;
	}

	function get_one($SQL){

		$query=$this->query($SQL,'U_B');
		
		$rs =& mysql_fetch_array($query, MYSQL_ASSOC);

		return $rs;
	}

	function update($SQL) {
		if($this->IsConnet==0){
			global $dbhost, $dbuser, $dbpw, $dbname, $pconnect;
			$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
		}

		if(function_exists('mysql_unbuffered_query')){
			$query = mysql_unbuffered_query($SQL);
		}else{
			$query = mysql_query($SQL);
		}
		$this->connet_nums++;

		if (!$query)  $this->Err("���ݿ����ӳ���:$SQL<br>");
		return $query;
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function num_rows($query) {
		$rows = mysql_num_rows($query);
		return $rows;
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		$id = mysql_insert_id();
		return $id;
	}

	function insert_file($file,$readfiles=''){
		$readfiles || $readfiles=read_file($file);
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
				if(eregi("^CREATE TABLE",$sql)){
					if( mysql_get_server_info() > '4.1'){
						if(!eregi('DEFAULT CHARSET=',$sql)){
							$sql="$sql DEFAULT CHARSET=".($GLOBALS[dbcharset]?$GLOBALS[dbcharset]:'gbk');
						}						
					}elseif(eregi('DEFAULT CHARSET=',$sql)){
						$sql=preg_replace("/DEFAULT CHARSET=([^ ]+)/is",'',$sql);
					}
				}
				$this->query($sql);
				$check++;
			}
			
	
		}
		return $check;
	}
	function Err($msg='') {
		$sqlerror = mysql_error();
		$sqlerrno = mysql_errno();
		if(strstr($sqlerror,"Can't open file: '")){
			preg_match("/Can't open file: '([^']+)\.MYI'/is",$sqlerror,$array);
			echo "ϵͳ���Զ��޸����ݿ�,���ٴ�ˢ����ҳ,����޸����ɹ�,���������ݿ����޸�<br>";
			$this->query("REPAIR TABLE `$array[1]`");
		}
		if(strstr($sqlerror,"should be repaired")){
			$sqlerror=str_replace("\\","/",$sqlerror);
			preg_match("/([^\/]+)' is marked as/is",$sqlerror,$array);
			echo "ϵͳ���Զ��޸����ݿ�,���ٴ�ˢ����ҳ,����޸����ɹ�,���������ݿ����޸�<br>";
			$this->query("REPAIR TABLE `$array[1]`");
		}
		echo "$msg<br>$sqlerror<br>$sqlerrno";
		//die("");
	}

	function uc_err(){
		echo '<hr><A HREF="http://bbs.qibosoft.com/read-bbs-tid-270806.html" target="_blank">����DZ/UC����,�����鿴����ԭ��:http://bbs.qibosoft.com/read-forum-tid-270806.htm</A>';
		exit;
	}
}

?>