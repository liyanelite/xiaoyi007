<?php
require_once(ROOT_PATH."inc/label_funcation.php");

//Ŀ����Ϊ�˼�������Ƶ��ģ��
if(!function_exists('getTpl')){
	function getTpl($a,$b){
		return html($a,$b);
	}
}

/**
*��ȡģ�����еı�ǩ
**/
unset($haveCache,$all_label);
if($jobs=='show')
{
	if(!$_COOKIE[Admin]&&!$web_admin)
	{
		showerr("����Ȩ�鿴");
	}
	//��ȡͷ��β�ı�ǩ
	preg_replace('/\$label\[([\'a-zA-Z0-9\_]+)\]/eis',"label_array_hf('\\1')",read_file(getTpl("head",$head_tpl)));
	preg_replace('/\$label\[([\'a-zA-Z0-9\_]+)\]/eis',"label_array_hf('\\1')",read_file(getTpl("foot",$foot_tpl)));
	
	//$label_hfΪͷ���ļ�������,���ͷ���ж��ٸ���ǩ
	
	is_array($label_hf) || $label_hf=array();
	foreach($label_hf AS $key=>$value)
	{
		$rs=$db->get_one("SELECT * FROM {$pre}label WHERE tag='$key' AND chtype='99'");

		if($rs[tag])
		{
			$divdb=unserialize($rs[divcode]);
			$label[$key]=add_div($label[$key]?$label[$key]:'&nbsp;',$rs[tag],$rs[type],$divdb[div_w],$divdb[div_h],$divdb[div_bgcolor],'99');
		}
		else
		{
			$label[$key] || $label[$key]=add_div("�±�ǩ,������",$key,'NewTag','','','','99');
		}
	}	
}
else
{
	$FileName=ROOT_PATH."cache/label_cache/";
	if(!is_dir($FileName)){
		makepath($FileName);
	}
	$FileName.=(ereg("\.php",basename($WEBURL))?preg_replace("/\.php(.*)/","",basename($WEBURL)):'index')."_".intval($ch)."_".intval($ch_pagetype)."_".intval($ch_module)."_".intval($ch_fid)."_".intval($city_id).'_'.substr(md5(getTpl("index",$chdb[main_tpl])),0,5).".php";
	
	//Ĭ�ϻ���3����.
	if(!$webdb[label_cache_time]){
		$webdb[label_cache_time]=3;
	}
	if( (time()-filemtime($FileName))<($webdb[label_cache_time]*60) ){
		@include($FileName);
	}
}

if(!$haveCache){

	//��ȡ����ҳ�ı�ǩ
	preg_replace('/\$label\[([\'a-zA-Z0-9\_]+)\]/eis',"label_array('\\1')",read_file(getTpl("index",$chdb[main_tpl])));

	unset($label_rubbish);
	//�����˴���.���ǵ���ʱ�л�����ϵͳ��ʱ��SQL����д�
	$query=$db->query("SELECT * FROM {$pre}label WHERE pagetype='$ch_pagetype' AND module='$ch_module' AND fid='$ch_fid' AND chtype='0'");
	while( $rs=$db->fetch_array($query) ){
		
		//�����ݿ�ı�ǩ
		if( $rs[typesystem] )
		{
			if( !is_array($label["$rs[tag]"]) ){
				$label_rubbish[$rs[lid]]=$rs[tag];	//����ľɱ�ǩ,������ʾ	
				continue;	//ҳ��û�еı�ǩ.�Ͳ�Ҫ�����ݿ�
			}

			$_array=unserialize($rs[code]);

			if($_array[SYS]=='artcile'){
				$_array[sql]=preg_replace("/ORDER BY A.aid/is","ORDER BY A.list",$_array[sql]);
				//�ٶ��Ż�����,��ʹ�û���,�ͺ����ٶ�
				//$webdb[label_cache_time]=='-1' || $_array[sql]=preg_replace("/AND R.topic=1/is","",$_array[sql]);				
			}

			$value=($rs[type]=='special')?Get_sp($_array):Get_Title($_array);
			if(strstr($value,"(/mv)")){
				$value=get_label_mv($value);
			}
			if($_array[c_rolltype])
			{
				$value="<marquee direction='$_array[c_rolltype]' scrolldelay='1' scrollamount='1' onmouseout='if(document.all!=null){this.start()}' onmouseover='if(document.all!=null){this.stop()}' height='$_array[roll_height]'>$value</marquee>";
			}
		}
		//�����ǩ
		elseif( $rs[type]=='code' )
		{
			$value=stripslashes($rs[code]);
			//����һ�²�������javascript����,������Ȩ���ж�,��ͨ�û�Ҳ��ɾ��
			if(eregi("<SCRIPT",$value)&&!eregi("<\/SCRIPT",$value)){
				if($delerror){
					$db->query("UPDATE `{$pre}label` SET code='' WHERE lid='$rs[lid]'");
				}else{
					die("<A HREF='$WEBURL?&delerror=1'>�ˡ�{$rs[tag]}����ǩ����,���ɾ��֮!</A><br>$value");
				}			
			}
			//��ʵ��ַ��ԭ
			$value=En_TruePath($value,0);
		}
		//����ͼƬ
		elseif( $rs[type]=='pic' )
		{	
			unset($width,$height);
			$picdb=unserialize($rs[code]);
			
			$picdb[width] && $width=" width='$picdb[width]'";
			$picdb[height] && $height=" height='$picdb[height]'";
			$picdb[imgurl]=En_TruePath($picdb[imgurl],0);
			$picdb[imglink]=En_TruePath($picdb[imglink],0);
			$picdb[imgurl]=tempdir($picdb[imgurl]);
			if($picdb['imglink'])
			{
				$value="<a href='$picdb[imglink]' target=_blank><img src='$picdb[imgurl]' $width $height border='0' /></a>";
			}
			else
			{
				$value="<img src='$picdb[imgurl]' $width $height  border='0' />";
			}
		}
		//����FLASH
		elseif( $rs[type]=='swf' )
		{
			$flashdb=unserialize($rs[code]);
			$flashdb[flashurl]=En_TruePath($flashdb[flashurl],0);
			$flashdb[flashurl]=tempdir($flashdb[flashurl]);
			$flashdb[width] && $width=" width='$flashdb[width]'";
			$flashdb[height] && $height=" height='$flashdb[height]'";
			$value="<object type='application/x-shockwave-flash' data='$flashdb[flashurl]' $width $height wmode='transparent'><param name='movie' value='$flashdb[flashurl]' /><param name='wmode' value='transparent' /></object>";
		}
		//��ͨ�õ�Ƭ
		elseif( $rs[type]=='rollpic' )
		{	
			$detail=unserialize($rs[code]);
			foreach($detail[picurl] AS $key=>$value){
				$detail[picurl][$key]=En_TruePath($value,0);
			}
			foreach($detail[piclink] AS $key=>$value){
				$detail[piclink][$key]=En_TruePath($value,0);
			}
			if($detail[rolltype]==2){	//�Զ�����ʽ
				unset($_listdb);
				foreach($detail[picurl] AS $key=>$value){
					$_listdb[]=array(
						'picurl'=>tempdir($value),
						'link'=>$detail[piclink][$key],
						'url'=>$detail[piclink][$key],
						'title'=>$detail[picalt][$key],
					  );
				}
				$_listdb[0][tpl_1code]=En_TruePath($detail[tplpart_1code],0);
				$value=run_label_php($_listdb);
			}elseif($detail[picalt][1]==''){	//û�б�������
				$value=rollPic_no_title_js($detail);
			}else{
				if($detail[rolltype]==1){
					$value=rollPic_flash($detail);
				}else{
					$value=rollpic_2js($detail);
				}
			}
			
		}
		//������ʽ��
		else
		{
			$value=stripslashes($rs[code]);
			//��ʵ��ַ��ԭ
			$value=En_TruePath($value,0);
		}

		//���±�ǩʱ��ʾ��ҳ��
		if($jobs=='show')
		{
			if(!$value)
			{
				$value='&nbsp;';
			}
			$divdb=unserialize($rs[divcode]);
			$value=add_div($value,$rs[tag],$rs[system_type]?$rs[system_type]:$rs[type],$divdb[div_w],$divdb[div_h],$divdb[div_bgcolor]);
		}
		//��Щ��ǩ��������ʱ����
		elseif($rs[hide])
		{
			$value='';
		}
		$label[$rs[tag]]=$value;
	}
}


/**
*��̨���±�ǩ
**/
if($jobs=='show')
{
	unlink($FileName);	//�ѻ����ļ�ɾ����,ǰ̨��������������

	if($label_rubbish){
		if($delete_label_rubbish){
			//$db->query("DELETE FROM {$pre}label WHERE tag IN ('".implode("','",$label_rubbish)."')");
		}else{
			//echo "<CENTER><br><br>����:::<A HREF='$WEBURL&delete_label_rubbish=1'>�� ".count($label_rubbish)." ������ı�ǩ,���Ƿ�Ҫɾ����,�������ɾ��:".implode(",",$label_rubbish)."</A><br><br><br><br></CENTER>";
		}		
	}
	$label || $label=array();
	foreach($label AS $key=>$value)
	{
		//����Ǿɱ�ǩ�Ļ�.$value�Ѿ��Ǿ�����ֵ��,����Ϊ����,����������
		if(is_array($value))
		{
			$label[$key]=add_div("�±�ǩ,��������:$key",$key,'NewTag');
		}
	}

	//$all_label�ں���label_array()label_array_hf()��ͳ��������Ч�ı�ǩ
	$fromurl=urlencode($WEBURL);
	$label[$all_label[0]]="<SCRIPT LANGUAGE='JavaScript' src='$webdb[www_url]/images/default/label_jq.js'></SCRIPT><SCRIPT LANGUAGE='JavaScript' src='$webdb[www_url]/images/default/label.js'></SCRIPT><SCRIPT LANGUAGE='JavaScript'>
	\$(document).ready(function(){ \$('.p8label').each(function(){ \$(this).hover(function(){ \$(this).css({'opacity':'0.8','filter':'alpha(opacity=70)'});}, function(){ \$(this).css({'opacity':'0.4','filter':'alpha(opacity=50)'});}).jqResize(\$('div', this))});});
	var admin_url='$webdb[admin_url]';var ch='$ch';var ch_fid='$ch_fid';var ch_pagetype='$ch_pagetype';var ch_module='$ch_module';var fromurl='$fromurl';var mystyle='$STYLE';</SCRIPT>{$label[$all_label[0]]}";

}
else
{
	foreach($label AS $key=>$value)
	{
		//������±�ǩʱ,��Ϊ����array(),Ҫ���
		if(is_array($value))
		{
			$label[$key]='';
		}
	}
	//д����
	if( (time()-filemtime($FileName))>($webdb[label_cache_time]*60) ){
		$_shows="<?php\r\n\$haveCache=1;\r\n";
		foreach($label AS $key=>$value){
			$value=addslashes($value);
			$_shows.="\$label['$key']=stripslashes('$value');\r\n";
		}
		write_file($FileName,$_shows.'?>');
	}	
}
?>