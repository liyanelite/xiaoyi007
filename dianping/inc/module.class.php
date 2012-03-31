<?php
defined('ROOT_PATH') or die();

class Module_Field{

var $table_module;		//ģ�ͱ�
var $table_title;		//���ݱ����
var $table_content;		//���ݱ�
var $table_field;		//�ֶο��
var $table_class;		//�����ֶα�

var $f_path;			//����Ŀ¼������·��
var $style;				//��ǰʹ�õķ��
var $hidefield;			//������Ȩ�޵��ֶ�
var $classidShowAll;	//�����ֶ������Ƿ�ȫ����ʾ:true/false
var $tpl_index_new;		//ǰ̨��ģ����Ŀ¼

function Module_Field(){
	global $_pre,$webdb,$STYLE;
	$this->table_module = $_pre."module";
	$this->table_title = $_pre."content";
	$this->table_content = $_pre."content_";
	$this->table_field = $_pre."field";
	$this->table_class = $_pre."class";
	$this->style = $STYLE;
	$this->f_path = dirname(dirname(__FILE__)).'/';
	$this->tpl_index_new = $this->f_path."template/{$this->style}/";
}

//ɾ��һ��ģ��
function delete_module($id){
	global $db,$_pre;

	if( $db->get_one("SELECT * FROM {$this->table_title} WHERE mid='$id'") ){
		showerr("��ǰģ����������,����ɾ������,�ſ���ɾ��ģ��.");
	}
	$db->query("DROP TABLE IF EXISTS `{$this->table_content}{$id}`");

	$db->query("DELETE FROM {$this->table_module} WHERE id='$id'");
	$db->query("DELETE FROM {$this->table_field} WHERE mid='$id'");

	@unlink($this->tpl_index_new."post_$id.htm");
	@unlink($this->tpl_index_new."search_$id.htm");
	@unlink($this->tpl_index_new."bencandy_$id.htm");
	@unlink($this->tpl_index_new."list_$id.htm");
}

//�޸�ģ��
function edit_module($id,$array){
	global $db;
	foreach($array AS $key=>$value){
		$sql_array[]="`$key`='$value'";
	}
	$SQL=implode(",",$sql_array);
	$db->query("UPDATE {$this->table_module} SET $SQL WHERE id='$id'");
}

//�´���һ��ģ��
function creat_module($name){
}

//��ȡĳ��ģ��
function module_info($id){
	global $db;
	$rsdb = $db->get_one("SELECT * FROM {$this->table_module} WHERE id='$id'");
	return $rsdb;
}

//��ȡĳ��ģ�����ȫ���ֶ�
function list_field($id){
	global $db;
	$query = $db->query("SELECT * FROM {$this->table_field} WHERE mid='$id' ORDER BY orderlist DESC,id ASC");
	while($rs = $db->fetch_array($query)){
		$array["$rs[field_name]"]=$rs;
	}
	return $array;
}

//�г�����ģ��
function list_module(){
	global $db;
	$query = $db->query("SELECT * FROM {$this->table_module} ORDER BY list DESC,id ASC");
	while($rs = $db->fetch_array($query)){
		$listdb[]=$rs;
	}
	return $listdb;
}


//���ݱ�Ҫ����һ���ֶ�
function table_edit_field($table,$type,$oldfield,$newfield,&$leng){
	global $db;
	if($type=='int'){	
		if( $leng>10 || $leng<1 ){
			$leng=10;
		}
		if($leng<=3){
			$db->query("ALTER TABLE `{$table}` CHANGE `{$oldfield}` `{$newfield}` TINYINT( $leng ) NOT NULL");
		}else{
			$db->query("ALTER TABLE `{$table}` CHANGE `{$oldfield}` `{$newfield}` INT( $leng ) NOT NULL");
		}
	}elseif($type=='varchar'){	
		if( $leng>255 || $leng<1 ){
			$leng=255;
		}
		$db->query("ALTER TABLE `{$table}` CHANGE `{$oldfield}` `{$newfield}` VARCHAR ( $leng ) NOT NULL");
	}elseif($type=='mediumtext'){	
		$db->query("ALTER TABLE `{$table}` CHANGE `{$oldfield}` `{$newfield}` MEDIUMTEXT NOT NULL");
	}
}


//���ݱ�Ҫ����һ���ֶ�
function table_add_field($table,$type,$field,&$leng){
	global $db;
	$leng=intval($leng);
	if($type=='int'){	
		if( $leng>10 || $leng<1 ){
			$leng=10;
		}
		if($leng<=3){
			$db->query("ALTER TABLE `{$table}` ADD `{$field}` TINYINT( $leng ) NOT NULL");
		}else{
			$db->query("ALTER TABLE `{$table}` ADD `{$field}` INT( $leng ) NOT NULL");
		}	
	}elseif($type=='varchar'){	
		if( $leng>255 || $leng<1 ){
			$leng=255;
		}
		$db->query("ALTER TABLE `{$table}` ADD `{$field}` VARCHAR( $leng ) NOT NULL");
	}elseif($type=='mediumtext'){	
		$db->query("ALTER TABLE `{$table}` ADD `{$field}` MEDIUMTEXT NOT NULL");
	}
}

//�ֶ����ݱ�����һ����¼
function add_field_info($array){
	global $db;
	foreach($array AS $key=>$value){
		$sql_array[]="`$key`='$value'";
	}
	$SQL=implode(",",$sql_array);
	$db->query("INSERT INTO {$this->table_field} SET $SQL");
}

//�޸��ֶ����ݱ�һ����¼
function edit_field_info($array,$SQL){
	global $db;
	foreach($array AS $key=>$value){
		$sql_array[]="`$key`='$value'";
	}
	$_SQL=implode(",",$sql_array);
	$db->query("UPDATE {$this->table_field} SET $_SQL WHERE $SQL");
}

//�ֶ�������ʾ,$type='show'����ҳ����,$type='list'�б�ҳ����
function showfield($field_db,&$rsdb,$type='show'){
	foreach($field_db AS $key=>$rs)
	{
		if($type=='list'&&!$rs[listshow]){	//�б�ҳ�Ļ�,��Ҫ��̨�������б�ҳ��ʾ
			continue;
		}
		//����ĳЩ�û���ûȨ�޿����ֶ�
		if($this->hidefield && $rs[allowview]){
			global $groupdb,$web_admin,$lfjuid;
			if(!$web_admin&&$lfjuid!=$rsdb[uid]&&!in_array($groupdb['gid'],explode(",",$rs[allowview]))){
				$rsdb[$key]="<font color=red>Ȩ�޲���,�޷��鿴!</font>";
				continue;
			}
		}
		if($rs[form_type]=='textarea')
		{
			if($type=='show'){	//����ҳ������ʾ
				require_once(ROOT_PATH."inc/encode.php");
				$rsdb[$key]=format_text($rsdb[$key]);
				$rsdb[$key]=highlight_keyword($rsdb[$key]);
			}elseif($type=='list'){	//�б�ҳ������ʾ
				$rsdb[$key]=get_word($rsdb[$key],100);
			}
		}
		elseif($rs[form_type]=='ieedit'||$rs[form_type]=='ieeditsimp')
		{
			if($type=='show'){	//����ҳ������ʾ
				$rsdb[$key]=En_TruePath($rsdb[$key],0,1);
				$rsdb[$key]=highlight_keyword($rsdb[$key]);
			}elseif($type=='list'){	//�б�ҳ������ʾ
				$rsdb[$key]=@preg_replace('/<([^>]*)>/is',"",$rsdb[$key]);
				$rsdb[$key]=get_word($rsdb[$key],100);
			}
		}
		elseif($type=='show'&&($rs[form_type]=='upfile'||$rs[form_type]=='onepic'))
		{
			$rsdb[$key]=tempdir($rsdb[$key]);
		}
		elseif($type=='show'&&($rs[form_type]=='upmorepic'||$rs[form_type]=='upmorefile'))
		{
			$detail=explode("\n",$rsdb[$key]);
			unset($rsdb[$key]);
			foreach( $detail AS $_key=>$value){
				list($_url,$_name)=explode("@@@",$value);
				$rsdb[$key][url][]=tempdir($_url);
				$rsdb[$key][title][]=$_name;
			}
		}
		elseif($rs[form_type]=='classdb')
		{
			$rsdb[$key]=$this->classdb_show($rsdb[$key]);
		}
		elseif($rs[form_type]=='select'||$rs[form_type]=='radio')
		{
			if(strstr($rs[form_set],"|")){
				$rs[form_set]=str_replace("\r","",$rs[form_set]);
				$detail=explode("\n",$rs[form_set]);
				foreach( $detail AS $key2=>$value2){
					list($_key,$_value)=explode("|",$value2);
					$_key==$rsdb[$key] && $_value && $rsdb[$key]=$_value;
				}
			}
		}
		elseif($rs[form_type]=='checkbox')
		{
			if(strstr($rs[form_set],"|")){
				$rs[form_set]=str_replace("\r","",$rs[form_set]);
				$detail=explode("\n",$rs[form_set]);
				foreach( $detail AS $key2=>$value2){
					list($_key,$_value)=explode("|",$value2);
					if($_value){
						//���»���Ҫ��һ���Ľ���
						$rsdb[$key]=str_replace($_key,$_value,$rsdb[$key]);
					}
				}
			}
			$rsdb[$key]=str_replace("/","��",$rsdb[$key]);
		}
		if($rs[field_type]=='int'&&$rsdb[$key]=='0'&&!$rs[form_units]){
			$rsdb[$key]='';
		}elseif($rs[form_units]&&$type=='show'){
			$rsdb[$key] .=" $rs[form_units]";
		}
	}
}


//�����ֶ���ʾ
function classdb_show($string){
	$detail=explode("/",$string);
	foreach($detail AS $key2=>$value2){
		list($fid,$name)=explode("|",$value2);
		if(!$name){
			continue;
		}
		$show[]="$name";
	}
	if($this->classidShowAll){
		$string=@implode(" > ",$show);
	}else{
		$string=$show[count($show)-1];		
	}
	return $string;
}

//�г��������ֶ����ݿ�
function list_classdb($fup){
	global $db;
	$query = $db->query("SELECT * FROM {$this->table_class} WHERE fup='$fup' ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$listdb[]=$rs;
	}
	return $listdb;
}

//����ȡĬ��ֵ
function formGetVale($field_db,&$rsdb,$CKfield=''){
	foreach($field_db AS $key=>$rs){
		if($CKfield&&$key!=$CKfield){
			continue;
		}
		if($rs[form_type]=='select'){
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if($rsdb[$key]==$v1){
					unset($rsdb[$key]);
					$rsdb[$key]["$v1"]=' selected ';
				}
			}
		}elseif($rs[form_type]=='radio'){
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if($rsdb[$key]==$v1){
					unset($rsdb[$key]);
					$rsdb[$key]["$v1"]=' checked ';
				}
			}
		}elseif($rs[form_type]=='checkbox'){
			$_d=explode("/",$rsdb[$key]);
			unset($rsdb[$key]);
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if( @in_array($v1,$_d) ){
					$rsdb[$key]["$v1"]=' checked ';
				}
			}
		}elseif($rs[form_type]=='upmorefile'||$rs[form_type]=='upmorepic'){
			$detail=explode("\n",$rsdb[$key]);
			unset($rsdb[$key]);
			foreach( $detail AS $_key=>$value){
				list($url,$name,$fen)=explode("@@@",$value);
				$rsdb[$key][name][]=$name;
				$rsdb[$key][url][]=$url;
				$rsdb[$key][fen][]=$fen;
			}
		}elseif($rs[form_type]=='ieedit'||$rs[form_type]=='ieeditsimp'){
			$rsdb[$key]=En_TruePath($rsdb[$key],0);
			$rsdb[$key]=editor_replace($rsdb[$key]);
		}elseif($rs[form_type]=='classdb'){
			unset($array);
			$detail=explode("/#/",$rsdb[$key]);
			foreach($detail AS $key2=>$value2){
				if(!$value2){
					continue;
				}
				$array[]='"'.$this->classdb_select("postdb[{$key}][]",$value2,$rs[classid],$key2+1).'"';
			}
			$rsdb[$key]=@implode(",",$array);
		}
	}
}

function classdb_select($name,$fid,$classid,$NUM){
	global $db;
	$fid=intval($fid);

	extract($db->get_one("SELECT fup FROM {$this->table_class} WHERE fid='$fid'"));

	$show="<select name='$name' onChange='chooseclass_{$classid}(this.options[this.selectedIndex].value,$NUM)'><option value=''>---</option>";

	$listdb = $this->list_classdb($fup);
	foreach($listdb AS $rs){
		$ck=$rs[fid]==$fid?' selected ':'';
		$show.="<option value='$rs[fid]|$rs[name]' $ck>$rs[name]</option>";
		$ckk++;
	}
	$show.="</select>";
	if($ckk){
		return $show;
	}	
}
//������ģ��
function make_template($id){
	require_once(dirname(__FILE__)."/module.class.tpl.php");
	$tplDB = new template_module($this);

	$rsdb = $this->module_info($id);
	$field_db = $this->list_field($id);
	//$parts=$this->part_info($rsdb['parts']);
	$tpldb = unserialize($rsdb[template]);

	//��ȡ��Ӧ��ĸģ��,ģ��������Զ���ĸģ��
	$_type=$rsdb[ifdp]?'dp':'0';
	$indexshow_tpl = $tplDB->read_tpl("bencandy_{$_type}.htm",$tpldb['show'],'index');
	$indexpost_tpl = $tplDB->read_tpl("post_{$_type}.htm",$tpldb['post'],'index');
	$indexsearch_tpl = $tplDB->read_tpl("search_{$_type}.htm",$tpldb['search'],'index');	
	$indexlist_tpl = $tplDB->read_tpl("list_{$_type}.htm",$tpldb['list'],'index');

	//��ĸģ������Զ����ֶ�����
	foreach($field_db AS $key=>$rs){
		//$rs['parts']=$parts;
		$tplDB->show_tpl($rs,$indexshow_tpl);	//ǰ̨����ҳ

		$tplDB->post_tpl($rs,$indexpost_tpl);	//ǰ̨����ҳ
	
		$rs[listfilter] && $tplDB->listfilter_tpl($rs,$field_db,$indexlist_tpl);	//ǰ̨�б�ҳɸѡ�ֶ�
		if($rs[listshow]){
			$tplDB->list_tpl($rs,$indexlist_tpl);	//ǰ̨�б�ҳ
			$tplDB->list_tpl($rs,$indexsearch_tpl);	//ǰ̨����ҳ
		}
		if($rs[search]){
			$tplDB->search_tpl($rs,$indexsearch_tpl);	//ǰ̨����ҳ
			$tplDB->search_tpl($rs,$indexlist_tpl);		//ǰ̨�б�ҳ
		}
	}

	//д����ģ��
	$tplDB->write_tpl("post_$id",$indexpost_tpl,'index');
	$tplDB->write_tpl("search_$id",$indexsearch_tpl,'index');
	$tplDB->write_tpl("bencandy_$id",$indexshow_tpl,'index');
	$tplDB->write_tpl("list_$id",$indexlist_tpl,'index');
}

//����̨ʹ�������ֶ����ݿ�
function list_class($name,$fid){
	$show="<select name='$name'>";
	$listdb = $this->list_classdb(0);
	foreach($listdb AS $rs){
		$ck=$rs[fid]==$fid?' selected ':'';
		$show.="<option value='$rs[fid]' $ck>$rs[name]</option>";
	}
	$show.="</select>";
	return $show;
}


//�ύ��Ϣʱ���ļ�鴦��
function checkpost($field_db,&$postdb,$rsdb=''){
	foreach($field_db AS $key=>$rs)
	{
		//��������Ŀ
		if( $rs[mustfill]==1 )
		{
			if(is_array($postdb[$rs[field_name]])){
				if(implode('',$postdb[$rs[field_name]])===''){
					showerr("$rs[title],�����ѡ��һ��");
				}
			}elseif( $postdb[$rs[field_name]]===''||!isset($postdb[$rs[field_name]]) ){
				showerr("$rs[title],����Ϊ��");
			}
		}
		//����Ƿ�������
		if($rs[field_type]=='int'&&$postdb[$rs[field_name]]&&!ereg("^[0-9]+$",$postdb[$rs[field_name]]))
		{
			showerr("$rs[title] ����Ϊ����");
		}
		//����Ƿ񳬳�����
		if($rs[field_type]=='varchar')
		{
			$rs[field_leng]=$rs[field_leng]?$rs[field_leng]:255;
			if(strlen( $postdb[$rs[field_name]] )>$rs[field_leng])
			{
				showerr("$rs[title] ���ܳ��� {$rs[field_leng]} ����");
			}
		}
		if($rs[field_type]=='int')
		{
			$rs[field_leng]=$rs[field_leng]?$rs[field_leng]:10;
			if(strlen( $postdb[$rs[field_name]] )>$rs[field_leng])
			{
				showerr("$rs[title] ���ܳ��� {$rs[field_leng]} ����");
			}
		}
		if($rs[form_type]=='upmorefile'||$rs[form_type]=='upmorepic')
		{
			//�޸ĵ�ʱ��
			$array=array();
			if($rsdb[$rs[field_name]]){				
				$detail=explode("\n",$rsdb[$rs[field_name]]);
				foreach($detail AS $value){
					$d=explode("@@@",$value);
					$array[]=$d[0];
				}
			}

			foreach( $postdb[$rs[field_name]][url] AS $key=>$value)
			{
				if(!$value){
					continue;
				}

				//�޸ĵ�ʱ��.�Ͳ���Ҫ
				if(!@in_array($value,$array)){
					//$this->cut_img($value,$postdb);		//�ø�Сͼ����
					//$this->img_water($value);			//��ˮӡ		
				}
				//�������ͼ
				if(!$postdb[picurl]){
					$postdb[picurl]=$value;
					$postdb[ispic]=1;
				}
				$_array[]="$value@@@{$postdb[$rs[field_name]][name][$key]}@@@{$postdb[$rs[field_name]][fen][$key]}";
			}
			$postdb[$rs[field_name]]=implode("\n",$_array);
		}

		if($rs[form_type]=='ieedit'||$rs[form_type]=='ieeditsimp')
		{
			global $lfjdb,$_pre;
			$postdb[$key]=str_replace("<img ","<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' ",$postdb[$key]);
			$postdb[$key]=move_attachment($lfjdb[uid],$postdb[$key],"{$_pre}/".date("W"));
			$postdb[$key]=En_TruePath($postdb[$key]);
			//����js����
			$postdb[$key] = preg_replace('/javascript/i','java script',$postdb[$key]);
			//���˿�ܴ���
			$postdb[$key] = preg_replace('/<iframe ([^<>]+)>/i','&lt;iframe \\1>',$postdb[$key]);
		}
		elseif($rs[form_type]=='classdb')
		{
			$postdb[$key]=filtrate(implode("/#/",$postdb[$key]));
		}
		else
		{
			if(is_array($postdb[$key])){			
				$postdb[$key]=implode("/",$postdb[$key]);
			}
			//���˲���ȫ���ַ�
			$postdb[$key]=filtrate($postdb[$key]);
		}
		if(strlen($postdb[$key])>30000){
			showerr("���ݲ��ܴ���1.5�������");
		}
	}
}


/**************************************************/
function check_field_name($id,$field_name){

	if(!ereg("^([a-z])([a-z0-9_]+)$",$field_name)){
		showerr("���ݿ��ֶ�IDֻ�������ֻ���ĸ,��������ĸ��ͷ");
	}
	if( table_field($this->table_title,$field_name)
		|| table_field($this->table_content.$id,$field_name)){
		return true;
	}
}

//��������
function add_index($id,$field_name){
	global $db;
	$rs=$db->get_one("SHOW CREATE TABLE {$this->table_content}$id ");
	if(!eregi("KEY `([_a-z0-9]+)` \(`{$field_name}`\)",$rs['Create Table'])){
		$db->query("ALTER TABLE `{$this->table_content}$id` ADD INDEX ( `{$field_name}` )");
	}
}

//����һ���ֶ�
function creat_field($id,$postdb){

	//ɸѡ�ֶ���Ҫ�������
	if($postdb['listfilter']){
		if($postdb[field_type]=='mediumtext'){
			showerr("ɸѡ�ֶ�,���ݿ��ֶδ�����������㲻�����ı��ĵ�!");
		}
	}

	is_array($postdb[allowview]) && $postdb[allowview]=@implode(",",$postdb[allowview]);

	$this->check_field_name($id,$postdb[field_name]) &&	showerr("��ǰ�ֶ��Ѿ�������!");
	$this->table_add_field($this->table_content.$id,$postdb[field_type],$postdb[field_name],$postdb[field_leng]);

	//ɸѡ�ֶ���Ҫ�������
	if($postdb['listfilter']){
		$this->add_index($id,$postdb[field_name]);
	}

	$this->add_field_info(array('mid'=>$id,
	'title'=>$postdb['title'],
	'field_name'=>$postdb['field_name'],
	'field_type'=>$postdb['field_type'],
	'field_leng'=>$postdb['field_leng'],
	'form_type'=>$postdb['form_type'],
	'field_inputwidth'=>$postdb['field_inputwidth'],
	'field_inputheight'=>$postdb['field_inputheight'],
	'form_set'=>$postdb['form_set'],
	'form_value'=>$postdb['form_value'],
	'form_units'=>$postdb['form_units'],
	'form_title'=>$postdb['form_title'],
	'mustfill'=>$postdb['mustfill'],
	'listshow'=>$postdb['listshow'],
	'listfilter'=>$postdb['listfilter'],
	'search'=>$postdb['search'],
	'allowview'=>$postdb['allowview'],
	'allowpost'=>$postdb['allowpost'],
	'js_check'=>$postdb['js_check'],
	'js_checkmsg'=>$postdb['js_checkmsg'],
	'classid'=>$postdb['classid']));
}

//�޸�һ���ֶ�
function edit_field($id,$field_name,$postdb){

	//ɸѡ�ֶ���Ҫ�������
	if($postdb['listfilter']){
		if($postdb[field_type]=='mediumtext'){
			showerr("ɸѡ�ֶ�,���ݿ��ֶδ�����������㲻��ѡ���ı��ĵ�!");
		}
	}

	is_array($postdb[allowview]) && $postdb[allowview]=@implode(",",$postdb[allowview]);
	is_array($postdb[allowpost]) && $postdb[allowpost]=@implode(",",$postdb[allowpost]);

	$postdb[field_name]!=$field_name && $this->check_field_name($id,$postdb[field_name]) && 	showerr("��ǰ�ֶ��Ѿ�������,�����һ����!");

	$this->table_edit_field($this->table_content.$id,$postdb[field_type],$field_name,$postdb[field_name],$postdb[field_leng]);

	//ɸѡ�ֶ���Ҫ�������
	if($postdb['listfilter']){
		$this->add_index($id,$postdb[field_name]);
	}

	$this->edit_field_info(array('title'=>$postdb['title'],
	'field_name'=>$postdb['field_name'],
	'field_type'=>$postdb['field_type'],
	'field_leng'=>$postdb['field_leng'],
	'form_type'=>$postdb['form_type'],
	'field_inputwidth'=>$postdb['field_inputwidth'],
	'field_inputheight'=>$postdb['field_inputheight'],
	'form_set'=>$postdb['form_set'],
	'form_value'=>$postdb['form_value'],
	'form_units'=>$postdb['form_units'],
	'form_title'=>$postdb['form_title'],
	'mustfill'=>$postdb['mustfill'],
	'listshow'=>$postdb['listshow'],
	'listfilter'=>$postdb['listfilter'],
	'search'=>$postdb['search'],
	'allowview'=>$postdb['allowview'],
	'allowpost'=>$postdb['allowpost'],
	'js_check'=>$postdb['js_check'],
	'js_checkmsg'=>$postdb['js_checkmsg'],
	'classid'=>$postdb['classid']),"mid='$id' AND field_name='$field_name'");

}

function delete_field($id,$field_name){
	global $db;
	if($field_name=="content"){
		showerr("�ܱ����ֶ�,�㲻��ɾ��");
	}
	$db->query("ALTER TABLE `{$this->table_content}$id` DROP `$field_name`");
	$db->query("DELETE FROM `{$this->table_field}` WHERE mid='$id' AND field_name='$field_name'");
}

}
?>