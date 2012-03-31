<?php
require(dirname(__FILE__)."/global.php");

$mid || $mid=1;

$field_db = $module_DB[$mid][field];

if($action=="search")
{
	if(!$webdb[Info_allowGuesSearch]&&!$lfjid)
	{
		showerr("���ȵ�¼");
	}

	$keyword=trim($keyword);
	$keyword=str_replace("%",'\%',$keyword);
	$keyword=str_replace("_",'\_',$keyword);

	if(!$keyword)
	{
		showerr("�ؼ��ֲ���Ϊ��!");
	}
	if($Fid_db[tableid]&&!$fid){
		showerr("��ѡ��һ����Ŀ!");
	}

	/*ÿҳ��ʾ50��*/
	$rows=50;
	if(!$page)
	{
		$page=1;
	}
	$min=($page-1)*$rows;

	/*ûָ��ģ���ģ�鸨��Ϣ������ʱ,������������Ϣ*/
	if(!$mid||!is_table("{$_pre}content_$mid"))
	{
		showerr('û��ָ����ģ��!');
	}
	else
	{
		if($keyword){
			if( $type && table_field("{$_pre}content_$mid",$type) ){			
				$field="B.$type";
			}elseif($type=='username'){
				$field="A.username";
			}else{
				if($mid==1){
					$field="A.title";
				}elseif($mid==2){
					$field="B.truename";
				}
			}

			$_SQL=" $field LIKE '%$keyword%' ";
		}else{
			$_SQL=" 1 ";
		}

		if($fid>0){
			$_SQL.=" AND A.fid='$fid' ";
		}
	
		$search_url='';
		foreach( $postdb AS $key=>$value)
		{
			if( $value && table_field("{$_pre}content_$mid",$key) )
			{
				$_SQL.=" AND B.`$key`='$value' ";
				$rsdb[$key][$value]=" selected ";
				$value=urlencode($value);
			}
			$search_url.="&postdb[{$key}]=$value";
		}

		//��ҳ����
		$showpage=getpage("{$_pre}content A LEFT JOIN {$_pre}content_$mid B ON A.id=B.id","WHERE A.mid='$mid' AND  $_SQL","?mid=$mid&fid=$fid&keyword=$keyword&action=search&type=$type$search_url",$rows);

		$TABLE = $mid==1?'content':'person';

		$SQL="SELECT A.*,B.* FROM {$_pre}$TABLE A LEFT JOIN {$_pre}content_$mid B ON A.id=B.id WHERE A.mid='$mid' AND $_SQL ORDER BY A.posttime DESC LIMIT $min,$rows ";
	}

	$query = $db->query("$SQL");
	while($rs = $db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
		$rs[content]=@preg_replace('/<([^>]*)>/is',"",$rs[content]);
		$rs[content]=get_word($rs[content],150);
		if(!$rs[username])
		{
			$detail=explode(".",$rs[ip]);
			$rs[username]="$detail[0].$detail[1].$detail[2].*";
		}
		$field_db && $Module_db->showfield($field_db,$rs,'list');
		$listdb[]=$rs;
	}

	if(!$listdb)
	{
		//showerr("�ܱ�Ǹ��û���ҵ���Ҫ��ѯ������");
	}
	$typedb[$type]=" checked ";
}

else
{
	$typedb[title]=" checked ";
}

$mid=intval($mid);

$module_select="<select name='mid' onChange=\"window.location.href='?mid='+this.options[this.selectedIndex].value\"><option value='0'  style='color:#aaa;'>����ģ��</option>";
foreach($module_db AS $key=>$value){
	$ckk=$mid==$key?' selected ':' ';
	$module_select.="<option value='$key' $ckk>$value</option>";
}
$module_select.="</select>";

if($mid){
	$SQL=" AND mid='$mid' ";
}else{
	$SQL="";
}

$fid_select="<select name='fid' onChange=\"if(this.options[this.selectedIndex].value=='-1'){alert('�㲻��ѡ������');}\"><option value='0' style='color:#aaa;'>������Ŀ</option>";
foreach( $Fid_db[0] AS $key=>$value){
	$fid_select.="<option value='-1' style='color:red;'>$value</option>";
	foreach( $Fid_db[$key] AS $key2=>$value2){
		$ckk=$fid==$key2?' selected ':' ';
		$fid_select.="<option value='$key2' $ckk>&nbsp;&nbsp;|--$value2</option>";
	}
}
$fid_select.="</select>";

if(!$mid){
	showerr('MID������');
}

require(ROOT_PATH."inc/head.php");
require(getTpl("search_".intval($mid)));
require(ROOT_PATH."inc/foot.php");

?>