<?php
function_exists('html') OR exit('ERR');

ck_power('replace');

require(Adminpath."../data/module_db.php");

if($job=='list')
{
	get_admin_html('list');
}
elseif($job=="choose")
{
	if(!$mid){
		showerr("MID������");
	}
	$m_config[field_db] = $module_DB[$mid][field];

	$m_config[field_db][title]=array('title'=>'����');
	$m_config[field_db][picurl]=array('title'=>'��ͼ����ͼ');
	$m_config[field_db][keywords]=array('title'=>'�ؼ���');

	get_admin_html('choose');
}
elseif($action=='replace')
{
	

	if(!$page){
		if(!$mid){
			showerr("MID������");
		}
		if(!$field_db){
			showerr("��ѡ��һ���ֶ�");
		}
		if(!$atc_oldword){
			showerr("ԭ�ַ�����Ϊ��!");
		}
		$page=1;
		$sting=implode(",",$field_db);
		$show="<?php
			\$field='$sting';
			\$mid='$mid';
			\$atc_oldword='$atc_oldword';
			\$atc_newword='$atc_newword';
			";
		write_file(Adminpath."../cache/module_db.php",$show);

		$atc_oldword=stripslashes($atc_oldword);
		$atc_newword=stripslashes($atc_newword);
		
	}else{
		require(Adminpath."../cache/module_db.php");
		$field_db=explode(",",$field);
	}
	$rows=500;
	$min=($page-1)*$rows;
	if( in_array("title",$field_db)||in_array("picurl",$field_db)||in_array("keywords",$field_db) )
	{
		$query = $db->query("SELECT * FROM {$_pre}content WHERE mid='$mid' LIMIT $min,$rows");
		while($rs = $db->fetch_array($query))
		{
			$sqldb='';
			if( in_array("title",$field_db) )
			{
				$rs[title]=addslashes(str_replace($atc_oldword,$atc_newword,$rs[title]));
				$sqldb[]="title='$rs[title]'";
			}
			if( in_array("picurl",$field_db) )
			{
				$rs[picurl]=addslashes(str_replace($atc_oldword,$atc_newword,$rs[picurl]));
				$sqldb[]="picurl='$rs[picurl]'";
			}
			if( in_array("keywords",$field_db) )
			{
				$rs[keywords]=addslashes(str_replace($atc_oldword,$atc_newword,$rs[keywords]));
				$sqldb[]="keywords='$rs[keywords]'";
			}
			$sql=implode(",",$sqldb);
			$db->query(" UPDATE {$_pre}content SET $sql WHERE id='$rs[id]' ");
			$ck++;
		}
	}

	foreach( $field_db AS $key=>$value){
		if($value=='title'||$value=='picurl'||$value=='keywords'){
			unset($field_db[$key]);
		}
	}

	if(count($field_db)>0)
	{
		$query = $db->query("SELECT * FROM {$_pre}content_$mid LIMIT $min,$rows");
		while($rs = $db->fetch_array($query))
		{
			$sqldb='';
			foreach( $field_db AS $key=>$value)
			{
				$rs[$value]=addslashes(str_replace($atc_oldword,$atc_newword,$rs[$value]));
				$sqldb[]="`$value`='{$rs[$value]}'";
			}
			$sql=implode(",",$sqldb);
			$db->query(" UPDATE {$_pre}content_$mid SET $sql WHERE id='$rs[id]' ");
			$ck++;
		}
	}

	if($ck)
	{
		$page++;
		echo "���Ժ�,���ڴ�����$page<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$admin_path&action=$action&page=$page'>";
		exit;
	}
	unlink(Adminpath."../cache/module_db.php");
	refreshto("$admin_path&job=list","�������",10);
}