<?php
class qb_user{
	var $db;			//��ϵͳ�����ݿ�������
	var $db_uc;			//UC�����ݿ�������
	var $db_passport;	//ͨ��֤���ݱ��������
	var $pre;
	var $memberTable;	//ͨ��֤ʹ�õ�����

	function __construct() {
		$this->qb_user();
	}
	
	//��ʼ��
	function qb_user() {
		$this->db =& $GLOBALS[db];
		$this->db_uc =& $GLOBALS[db_uc];
		$this->pre = $GLOBALS[pre];
		$this->memberTable = $this->get_passport_memberTable();
	}
	
	//��ȡͨ��֤������
	function get_passport_memberTable(){
		global $webdb;
		if(eregi("^pwbbs",$webdb[passport_type])){
			$this->db_passport =& $GLOBALS[db];
			return "{$webdb[passport_pre]}members";
		}elseif(defined("UC_CONNECT")){
			$this->db_passport =& $GLOBALS[db_uc];
			return strstr(UC_DBTABLEPRE,'.')?UC_DBTABLEPRE."members":UC_DBNAME.'.'.UC_DBTABLEPRE."members";
		}else{
			$this->db_passport =& $GLOBALS[db];
			return "{$this->pre}members";
		}		
	}
	
	//����ȡ�û�ͨ��֤������������Ϣ
	function get_passport($value,$type='id') {
		$sql = $type=='id' ? "uid='$value'" : "username='$value'";
		$rs = $this->db_passport->get_one("SELECT * FROM {$this->memberTable} WHERE $sql");
		return $rs;
	}
	
	//����ȡ�û���ϸ��Ϣ
	function get_info($value,$type='id'){
		$sql = $type=='id' ? "uid='$value'" : "username='$value'";
		$rs = $this->db->get_one("SELECT * FROM {$this->pre}memberdata WHERE $sql");
		return $rs;
	}
	
	//��ȡ�û�������Ϣ
	function get_allInfo($value,$type='id'){
		global $webdb;
		$array1=$this->get_passport($value,$type);
		if(!$array1){
			return ;
		}
		$array2=$this->get_info($value,$type);
		if($array2){
			$array1=$array2+$array1;
		}else{
			$array=array(
				'uid'=>$array1[uid],
				'username'=>$array1[username],
				'email'=>$array1[email],
				'yz'=>$webdb[RegYz],
			);
			$this->register_data($array);
			add_user($array1[uid],$webdb[regmoney],'ע��÷�');
			$array1[yz]=$webdb[RegYz];
		}
		return $array1;
	}
	
	//��������Ƿ���ȷ
	function check_password($username,$password){
		$rs=$this->get_passport($username,'name');
		if(!$rs){
			return 0;
		}
		if(defined("UC_CONNECT")){
			if(md5(md5($password).$rs[salt])==$rs[password]){
				return $rs;
			}
		}else{
			if(md5($password)==$rs[password]){
				return $rs;
			}
		}
		return -1;
	}
	
	//����û����Ƿ�Ϸ�
	function check_username($username) {
		$guestexp = '\xA1\xA1|\xAC\xA3|^Guest|^\xD3\xCE\xBF\xCD|\xB9\x43\xAB\xC8';
		$len = strlen($username);
		if($len > 15 || $len < 3 || preg_match("/\s+|^c:\\con\\con|[%,\*\"\s\<\>\&]|$guestexp/is", $username)) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	//����û����Ƿ����
	function check_userexists($username) {
		$rs = $this->db_passport->get_one("SELECT username FROM {$this->memberTable} WHERE username='$username'");
		return $rs;
	}

	//��������Ƿ����
	function check_emailexists($email) {
		if($webdb[passport_type]){
			$rs = $this->db_passport->get_one("SELECT * FROM {$this->memberTable} WHERE email='$email'");
		}else{
			$rs = $this->db_passport->get_one("SELECT * FROM {$this->pre}memberdata WHERE email='$email'");
		}		
		return $rs;
	}
	
	//ע���û�ͨ��֤�������������Ϣ
	function register_passport($array) {
		global $webdb,$timestamp,$onlineip;
		if(eregi("^pwbbs",$webdb[passport_type])){
			$array[password] = md5($array[password]);
			$this->db->query("INSERT INTO {$webdb[passport_pre]}members SET uid='$array[uid]',username='$array[username]',password='$array[password]',email='$array[email]',groupid='-1',memberid=8,regdate='$timestamp',yz=1");
			$uid=$this->db->insert_id();
			$this->db->query("INSERT INTO {$webdb[passport_pre]}memberdata SET uid='$uid',lastvisit='$array[lastvisit]',thisvisit='$array[thisvisit]',onlineip='$onlineip'");
		}elseif(defined("UC_CONNECT")){
			$uid=uc_user_register($array[username], $array[password], $array[email]);
			if($uid=='-1'){
				showerr('�û������Ϸ�');
			}elseif($uid=='-2'){
				showerr('����������ע��Ĵ���');
			}elseif($uid=='-3'){
				showerr('�û����Ѿ�����');
			}elseif($uid=='-4'){
				showerr('email ��ʽ����');
			}elseif($uid=='-5'){
				showerr('email ������ע��');
			}elseif($uid=='-6'){
				showerr('�� email �Ѿ���ע��');
			}
			if($uid&&eregi("^dzbbs7",$webdb[passport_type])){
				$this->db->query("INSERT INTO {$webdb[passport_pre]}memberfields SET uid='$uid'");
				$pwd=md5($array[password]);
				$this->db->query("INSERT INTO {$webdb[passport_pre]}members SET uid='$uid',username='$array[username]',password='$pwd',groupid=10,regip='$onlineip',regdate='$timestamp',email='$array[email]',newsletter='1',timeoffset='9999',editormode=2,customshow=26");
			}
		}else{
			$array[password] = md5($array[password]);
			$this->db->query("INSERT INTO {$this->pre}members SET uid='$array[uid]',username='$array[username]',password='$array[password]'");
			$uid=$this->db->insert_id();
		}
		
		return $uid;
	}
	
	//ע���û���ϸ��Ϣ
	function register_data($array){
		global $webdb,$timestamp,$onlineip;
		if(!$array[uid]||!$array[username]){
			return false;
		}
		$array[groupid] || $array[groupid]=8;
		isset($array[yz]) || $array[yz]=1;
		$array[regdate] = $timestamp;
		$array[lastvist] = $timestamp;
		$array[regip] = $onlineip;
		$array[lastip] = $onlineip;

		$fieldArry=table_field("{$this->pre}memberdata");
		foreach($array AS $key=>$value){
			if(!in_array($key,$fieldArry)){
				continue;
			}
			$sqlDB[]="`{$key}`='$value'";
		}
		$this->db->query("INSERT INTO {$this->pre}memberdata SET ".implode(",",$sqlDB));
	}
	
	//�û�ע��
	function register_user($array){
		global $webdb;
		if($this->get_passport($array[username],'name')){
			return '��ǰ�û��Ѿ�������';
		}
		if(!$array[username]){
			return '�û�������Ϊ��';
		}elseif(!$array[email]){
			return '���䲻��Ϊ��';
		}elseif(!$array[password]){
			return '���벻��Ϊ��';
		}elseif(strlen($array[username])>15||strlen($array[username])<3){
			return '�û�������С��3���ֽڻ����15���ֽ�';
		}elseif (strlen($array[password])>30 || strlen($array[password])<5){
			return '���벻��С��5���ַ������30���ַ�';
		}elseif(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$array[email])){
			return '���䲻���Ϲ���';
		}elseif( $webdb[emailOnly] && $this->check_emailexists($array[email])){
			return '��ǰ�����ѱ�ע����,�����һ������!';
		}
		$S_key=array('|',' ','��',"'",'"','/','*',',','~',';','<','>','$',"\\","\r","\t","\n","`","!","?","%","^");
		foreach($S_key as $value){
			if (strpos($array[username],$value)!==false){ 
				return '�û����а����н�ֹ�ķ��š�{$value}��'; 
			}
			if (strpos($password,$value)!==false){
				return '�����а����н�ֹ�ķ��š�{$value}��';
			}
		}
		
		foreach($array AS $key=>$value){
			$array[$key]=filtrate($value);
		}
		$array[uid]=$this->register_passport($array);		
		$this->register_data($array);
		return $array[uid];
	}
	
	//�޸��û�������Ϣ
	function edit_user($array) {
		if(!$array[username]){
			$rs = $this->get_info($array[uid]);
			if(!$rs[username]){
				return ;
			}
			$array[username] = $rs[username];			
		}
		$this->edit_passport($array);
		$fieldArry=table_field("{$this->pre}memberdata");
		foreach($array AS $key=>$value){
			if($key=='uid'||$key=='password'||$key=='username'||!in_array($key,$fieldArry)){
				continue;
			}
			$sqlDB[]="`{$key}`='$value'";
		}
		if($sqlDB){
			$this->db->query("UPDATE {$this->pre}memberdata SET ".implode(",",$sqlDB)." WHERE username='$array[username]'");
		}		
	}

	//���޸�ͨ��֤����������
	function edit_passport($array) {
		global $webdb;

		if( $webdb[emailOnly]&&$array[email] ){
			$r=$this->check_emailexists($array[email]);
			if($r && $r[username]!=$array[username]){				
				showerr("��ǰ���������,�����һ��!");
			}
		}

		if(eregi("^pwbbs",$webdb[passport_type])){
			if($array[password]){
				$array[password] = md5($array[password]);
				$sql[]="password='$array[password]'";
			}
			if($array[email]){
				$sql[]="email='$array[email]'";
			}
			if($sql){
				$this->db->query("UPDATE {$webdb[passport_pre]}members SET ".implode(",",$sql)." WHERE username='$array[username]' ");
				return 1;
			}
		}elseif(defined("UC_CONNECT")){
			$rs = uc_user_edit($array[username] , '' , $array[password] , $array[email] , 1 );
			return $rs;
		}else{
			if($array[password]){
				$array[password] = md5($array[password]);
				$this->db->query("UPDATE {$this->pre}members SET password='$array[password]' WHERE username='$array[username]' ");
				return 1;
			}			
		}
	}
	
	//ɾ����Ա
	function delete_user($uid) {
		global $webdb;
		if(eregi("^pwbbs",$webdb[passport_type])){
			$this->db->query("DELETE FROM {$webdb[passport_pre]}members WHERE uid='$uid'");
			$this->db->query("DELETE FROM {$webdb[passport_pre]}memberdata WHERE uid='$uid'");
		}elseif(defined("UC_CONNECT")){
			$rs = $this->get_passport($uid);
			uc_user_delete($rs[username]);
		}else{
			$this->db->query("DELETE FROM {$this->pre}members WHERE uid='$uid'");
		}
		$this->db->query("DELETE FROM {$this->pre}memberdata WHERE uid='$uid'");
		//$this->db->query("DELETE FROM {$this->pre}memberdata_1 WHERE uid='$uid'");		
	}
	
	//��ȡ��Ա����
	function total_num($sql = '') {
		$rs = $this->db_passport->get_one("SELECT COUNT(*) AS NUM FROM {$this->memberTable} $sql");
		return $rs[NUM];
	}
	
	//��ȡһ����Ա������Ϣ
	function get_list($start, $num, $sql) {
		$query = $this->db_passport->query("SELECT * FROM {$this->memberTable} $sql LIMIT $start, $num");
		while($rs = $this->db_passport->fetch_array($query)){
			$listdb[]=$rs;
		}
		return $listdb;
	}
	
	//���ڸ߰汾���ݿ�,��ȡ���ݿ�ı���
	function get_passport_charset(){
		$array=$this->db_passport->get_one("SHOW CREATE TABLE {$this->memberTable}");
		preg_match("/DEFAULT CHARSET=([-0-9a-z]+)/is",$array['Create Table'],$ar);
		return $ar[1];
	}
	
	//�޸�PW��̳����,��Ҫ���ڶ���Ϣ��ʾ�����޸�
	function edit_pw_member($array){
		if(!$array[uid]){
			return false;
		}
		$fieldArry=table_field("{$this->memberTable}");
		foreach($array AS $key=>$value){
			if($key=='uid'||$key=='username'||!in_array($key,$fieldArry)){
				continue;
			}
			$sqlDB[]="`{$key}`='$value'";
		}
		if($sqlDB){
			$this->db_passport->query("UPDATE {$this->memberTable} SET ".implode(",",$sqlDB)." WHERE uid='$array[uid]'");
		}
	}
	
	//�û���¼
	function login($username,$password,$cookietime,$not_pwd=false){
		extract($GLOBALS);
		if($not_pwd){	//����Ҫ֪��ԭʼ������ܵ�¼
			$rs=$this->get_passport($username,'name');
		}else{
			$rs = $this->check_password($username,$password);
			if(!is_array($rs)){
				return $rs;		//0Ϊ�û�������,-1Ϊ���벻��ȷ
			}
		}
		if(eregi("^pwbbs",$webdb[passport_type])){
			if($db_ifsafecv){
				$_r = $this->get_passport($username,'name');
				$safecv = $_r[safecv];
			}
			set_cookie(CookiePre().'_winduser',StrCode($rs[uid]."\t".PwdCode($rs[password])."\t$safecv"),$cookietime);
			set_cookie('lastvisit','',0);			
		}else{
			set_cookie("passport","$rs[uid]\t$username\t".mymd5("$rs[password]"),$cookietime);
		}
		if(defined("UC_CONNECT")){
			global $uc_login_code;
			$uc_login_code=uc_user_synlogin($rs[uid]);
		}
		return $rs[uid];
	}
	
	//�û��˳�
	function quit(){
		extract($GLOBALS);		
		if( ereg("^pwbbs",$webdb[passport_type]) ){
			set_cookie(CookiePre().'_winduser',"");
		}else{
			set_cookie("passport","");
		}
		set_cookie("token_secret","");
		setcookie("adminID","",0,"/");	//ͬ����̨�˳�
		if(defined("UC_CONNECT")){
			global $uc_login_code;
			$uc_login_code = uc_user_synlogout();
		}
	}
	
	//�û���¼״̬����Ϣ
	function login_info(){
		list($uid,$name,$pwd) = explode("\t",get_cookie('passport'));
		if( !$uid || !$pwd )
		{
			return '';
		}
		$detail = $this->get_allInfo($uid);
		if( mymd5($detail[password]) != $pwd ){
			$this->quit();
			return ;
		}
		return $detail;
	}

	//�����ͨ��֤
	function passport_server($username,$url){
		global $WEBURL;
		if(eregi("^$WEBURL",$url)){
			showerr("��ַ����!");
		}
		if(!strstr($url,'?')){
			$url.='?';
		}else{
			$url.='&';
		}
		$rs=$this->get_allInfo($username,'name');
		$md5code="uid=$rs[uid]&username=$rs[username]&password=$rs[password]&email=$rs[email]";
		$md5code=urlencode(mymd5($md5code));
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL={$url}md5code=$md5code'>";
		exit;
	}
}
?>