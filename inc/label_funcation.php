<?php

/**
*Ϊ�˻�ȡģ��ı�ǩ,��������ֵ,����Ǿɱ�ǩ�Ļ�.�ں����ᱻ��ֵ�滻.�±�ǩ�Ļ�����������,Ҳ���һ��������
**/
function label_array($key){
	global $label,$all_label;
	$key=str_replace(array('"',"'"),array('',''),$key);
	$label[$key]=array();
	$all_label[]=$key;
}

//ͷ��β��
function label_array_hf($key){
	global $label_hf,$all_label;
	$label_hf[$key]=array();
	$all_label[]=$key;
}

/**
*��Ӳ�,��̨��������Ҫ�õ�
**/
function add_div($value,$tag,$type='code',$div_w='',$div_h='',$div_bgcolor='',$if_hf=''){
	global $webdb,$chtype,$ch;
	if($value){
		$div_w>50 || $div_w=50;
		$div_h>21 || $div_h=21;
		$div_bgcolor || $div_bgcolor='#A6A6FF';
		$type=="flash" && $br="<br>";	//��ֹ��FLASH��ס,��������
		
		$value_a="<div id=\"$tag\" style=\"text-align:left;width:{$div_w}px;height:{$div_h}px;position:absolute;z-index:2;border:#ff0000 solid 1.5px;background-color: $div_bgcolor;filter:Alpha(Opacity=50);\" onmouseover=\"showlabel_(this,'over','$type','$if_hf');\" onmouseout=\"showlabel_(this,'out','$type','$if_hf');\" onclick=\"showlabel_(this,'click','$type','$if_hf');\"><div style='position:absolute;z-index:6;' onclick='return false;'  onmouseover=\"ckjump_(0);\" onmouseout=\"ckjump_(1);\"><img src=\"$webdb[www_url]/images/default/position2.gif\"  style='width:21px;height:21px;' border=\"0\" usemap=\"#Map$tag\"  /><map name=\"Map$tag\"><area shape=\"rect\" coords=\"7,0,14,7\" href=\"javascript:\"  onMouseDown=\"change_po_('up',1,'$tag');\"  onMouseUp=\"change_po_('up',0,'$tag');\"  alt=\"����\" /><area shape=\"rect\" coords=\"7,14,14,21\" href=\"javascript:\"  onMouseDown=\"change_po_('down',1,'$tag');\" onMouseUp=\"change_po_('down',0,'$tag');\"  alt=\"����\" /><area shape=\"rect\" coords=\"0,7,7,14\" href=\"javascript:\"  onMouseDown=\"change_po_('left',1,'$tag');\"  onMouseUp=\"change_po_('left',0,'$tag');\"   alt=\"����\" /><area shape=\"rect\" coords=\"14,7,21,14\" href=\"javascript:\" onMouseDown=\"change_po_('right',1,'$tag');\" onMouseUp=\"change_po_('right',0,'$tag');\"  alt=\"����\" /></map></div></div>$br<table border='0' cellspacing='0' cellpadding='0' class='label_$tag'>  <tr>    <td>$value</td> </tr></table>";

		$value_b="<div  class=\"p8label\" id=\"$tag\" style=\"filter:alpha(opacity=50);position: absolute; border: 1px solid #ff0000; z-index: 9999; color: rgb(0, 0, 0); text-align: left; opacity: 0.4; width: {$div_w}px; height:{$div_h}px; background-color:$div_bgcolor;\" onmouseover=\"showlabel_(this,'over','$type','$if_hf');\" onmouseout=\"showlabel_(this,'out','$type','$if_hf');\" onclick=\"showlabel_(this,'click','$type','$if_hf');\"><div onmouseover=\"ckjump_(0);\" onmouseout=\"ckjump_(1);\" style=\"position: absolute; width: 15px; height: 15px; background: url($webdb[www_url]/images/default/se-resize.png) no-repeat scroll -8px -8px transparent; right: 0px; bottom: 0px; clear: both; cursor: se-resize; font-size: 1px; line-height: 0%;\"></div></div>$br<table border='0' cellspacing='0' cellpadding='0' class='label_$tag'>  <tr>   <td>$value</td>  </tr></table>";

		//$value������һ��table,Ŀ����Ϊ�˴������������,��ʱ��ǩ����,�и����ǩ�޷���ʾ
		if(is_file(ROOT_PATH."images/default/label_jq.js")){
			return $value_b;
		}else{	//���ݾɵ�
			return "$value_a";
		}		
	}
}


function rollpic_2js($rolldb){
	global $webdb;
	@extract($rolldb);
	$width || $width=200;
	$height || $height=200;
	$num=count($picurl);
	for($i=0;$i<=$num;$i++){
		if(!$picurl[$i]){
			continue;
		}
		$picurl[$i]=tempdir($picurl[$i]);
		//$picurl[$i]=AddSlashes($picurl[$i]);
		//$piclink[$i]=urlencode(AddSlashes($piclink[$i]));
		//$picalt[$i]=AddSlashes($picalt[$i]);
		$j=$i-1;//��̨�����Ǵ�1��ʼ��.������ʱҪ����
		$show.="<LI style=\"WIDTH: {$width}px; HEIGHT: {$height}px\"><A href=\"{$piclink[$i]}\" target=\"_blank\"><IMG  src=\"{$picurl[$i]}\" style=\"WIDTH: {$width}px; HEIGHT: {$height}px;\"></A><SPAN class=\"title\">{$picalt[$i]}</SPAN></LI>";
	}
	$show="<SCRIPT src=\"$webdb[www_url]/images/default/rollpic.js\" type=\"text/javascript\"></SCRIPT>
<link rel=\"stylesheet\" type=\"text/css\" href=\"$webdb[www_url]/images/default/rollpic.css\">
<DIV class=\"p8rollpic\"><UL class=\"slideshow\">$show</UL></DIV>
<SCRIPT type=\"text/javascript\">runslideshow();</SCRIPT>";
	return $show;
}


/*������Ч��ͼƬ--js��ʽ*/
function rollPic_JS($rolldb){
	global $webdb;
	@extract($rolldb);
	$width || $width=200;
	$height || $height=150;
	$num=count($picurl);
	$rand=rands(5);
	$string='';
	for($i=0;$i<=$num;$i++){
		if(!$picurl[$i]){
			continue;
		}
		$img=tempdir($picurl[$i]);
		$url=$piclink[$i];
		$title=$picalt[$i];
		$string.="<P><A title='$title' href='$url' target=_blank><IMG style='HEIGHT:{$height}px;' alt='$title' src='$img'></A><A title='$title' href='$url' target='_blank'>$title</A></P>";
	}
	//�Զ���õ�Ƭ�ӿ�
	if($RollStyleType&&is_file(ROOT_PATH."template/default/rollpic/$RollStyleType") ){
		foreach($picurl AS $key=>$value){
			$picurl[$key]=addslashes($picurl[$key]);
			$picalt[$key]=addslashes($picalt[$key]);
			$piclink[$key]=urlencode($piclink[$key]);
		}
		$title=implode("|",$picalt);
		$img=implode("|",$picurl);
		$url=implode("|",$piclink);
		include(ROOT_PATH."template/default/rollpic/$RollStyleType");
		return $show;
	}
	$height=$height+30;	
	$rolltype || $rolltype='scrollLeft';
	$rolltime>0 || $rolltime=3;
	$show="<link rel='stylesheet' type='text/css' href='$webdb[www_url]/images/default/rollpic.css'>
<script type='text/javascript' src='$webdb[www_url]/images/default/jquery-1.2.6.min.js'></script>
<SCRIPT type='text/javascript'>
$(function() {
$('#rollpicobj$rand') 
.after('<div id=pager$rand class=pager>') 
.cycle({ 
fx:     '$rolltype', 
speed:   500, 
timeout: {$rolltime}000, 
pause:   1, 
pager:  '#pager$rand' 
});
});
</SCRIPT>
<DIV class='rollpicTB' style='width:{$width}px;FLOAT: left;TEXT-ALIGN: center;'><DIV id='rollpicobj$rand' class='rollpicobj' style='HEIGHT:{$height}px;'>$string</DIV></div>";
	return $show;
}

//JS�õ�Ƭ,û�б����
function rollPic_no_title_js($rolldb){
	global $webdb;
	@extract($rolldb);
	$width || $width=200;
	$height || $height=200;
	$jsnum=$num=count($picurl);
	for($i=1;$i<=$num;$i++){
		if(!$picurl[$i]){
			$jsnum--;
			continue;
		}
		$picurl[$i]=tempdir($picurl[$i]);
		$picurl[$i]=AddSlashes($picurl[$i]);
		$piclink[$i]=(AddSlashes($piclink[$i]));
		$picalt[$i]=AddSlashes($picalt[$i]);
		$show.="
				img{$i}=new Image ();img{$i}.src='$picurl[$i]';
				url{$i}=new Image ();url{$i}.src='$piclink[$i]';
				";
	}
	$show="

<script type='text/javascript'>
var widths=$width;
var heights=$height;
var counts=$jsnum;
$show
var nn=1;
var key=0;
function change_img()
{if(key==0){key=1;}
else if(document.all)
{document.getElementById(\"pic\").filters[0].Apply();document.getElementById(\"pic\").filters[0].Play(duration=2);}
eval('document.getElementById(\"pic\").src=img'+nn+'.src');
eval('document.getElementById(\"url\").href=url'+nn+'.src');
eval('document.getElementById(\"url\").target=\"blank\"');
for (var i=1;i<=counts;i++){document.getElementById(\"xxjdjj\"+i).className='axx';}
document.getElementById(\"xxjdjj\"+nn).className='bxx';
nn++;if(nn>counts){nn=1;}
tt=setTimeout('change_img()',4000);}
function changeimg(n){nn=n;window.clearInterval(tt);change_img();}
document.write('<style>');
document.write('.axx{padding:1px 7px;border-left:#cccccc 1px solid;}');
document.write('a.axx:link,a.axx:visited{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#666;}');
document.write('a.axx:active,a.axx:hover{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#999;}');
document.write('.bxx{padding:1px 7px;border-left:#cccccc 1px solid;}');
document.write('a.bxx:link,a.bxx:visited{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#D34600;}');
document.write('a.bxx:active,a.bxx:hover{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#D34600;}');
document.write('</style>');
document.write('<div style=\"width:'+widths+'px;height:'+heights+'px;overflow:hidden;text-overflow:clip;\">');
document.write('<div><a id=\"url\"><img id=\"pic\" style=\"border:0px;filter:progid:dximagetransform.microsoft.wipe(gradientsize=1.0,wipestyle=4, motion=forward)\" width='+widths+' height='+heights+' /></a></div>');
document.write('<div style=\"filter:alpha(style=1,opacity=10,finishOpacity=80);background: #888888;width:100%-2px;text-align:right;top:-12px;position:relative;margin:1px;height:12px;padding:0px;margin:0px;border:0px;\">');
for(var i=1;i<counts+1;i++){document.write('<a href=\"javascript:changeimg('+i+');\" id=\"xxjdjj'+i+'\" class=\"axx\" target=\"_self\">'+i+'</a>');}
document.write('</div></div>');
change_img();
</script>
	
	";

	return $show;
}


/*������Ч��ͼƬ--FLASH��ʽ*/
function rollPic_flash($rolldb){
	global $webdb;
	@extract($rolldb);
	$width || $width=200;
	$height || $height=200;
	$num=count($picurl);
	for($i=0;$i<=$num;$i++){
		if(!$picurl[$i]){
			continue;
		}
		$picurl[$i]=tempdir($picurl[$i]);
		$picurl[$i]=AddSlashes($picurl[$i]);
		$piclink[$i]=urlencode(AddSlashes($piclink[$i]));
		$picalt[$i]=AddSlashes($picalt[$i]);
		$j=$i-1;//��̨�����Ǵ�1��ʼ��.������ʱҪ����
		$show.="
				imgUrl[{$j}]='{$picurl[$i]}';
				imgLink[{$j}]='{$piclink[$i]}';
				imgtext[{$j}]='{$picalt[$i]}';
				";
	}
	$show="

<script type='text/javascript'>
var imgUrl = new Array();
var imgtext = new Array();
var imgLink = new Array();

$show

var pics=imgUrl[0];
var links=imgLink[0];
var texts=imgtext[0];
for(var i=1;i<imgUrl.length;i++){
	pics+='|'+imgUrl[i];
	links+='|'+imgLink[i];
	texts+='|'+imgtext[i];
}

var focus_width=$width
var focus_height=$height
if(window.ActiveXObject){
	var text_height=22;
}else{
	var text_height=40;
	focus_height=focus_height+40;
}
var swf_height = focus_height+text_height

document.write('<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\">');
document.write('<param name=\"allowScriptAccess\" value=\"sameDomain\" /><param name=\"movie\" value=\"$webdb[www_url]/images/default/rollpic.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"bgcolor\" value=\"#F0F0F0\">');
document.write('<param name=\"menu\" value=\"false\"><param name=wmode value=\"opaque\">');
document.write('<param name=\"FlashVars\" value=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\">');
document.write('<embed src=\"$webdb[www_url]/images/default/rollpic.swf\" wmode=\"opaque\" FlashVars=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\" menu=\"false\" bgcolor=\"#F0F0F0\" quality=\"high\" width=\"'+ focus_width +'\" height=\"'+ focus_height +'\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />');
document.write('</object>');

</script>
	
	";

	return $show;
}

/**
*��ȡ�����б�,����ͼƬ������
**/
function Get_Title($format){
	global $db,$webdb,$pre,$ModuleDB;
	
	//CMS��������ר���������
	if($format['SYS']=='CMS'&&$format['ctype']=='special'){
		return CMS_special($format);
	}


	//��������õ�URL����ʵ�б��ַ
	$page=1;
	
	if(strstr($format[sql],'$GLOBALS[')){
		eval("\$format[sql]=\"$format[sql]\";");
	}
	if(strstr($format[sql2],'$GLOBALS[')){
		eval("\$format[sql2]=\"$format[sql2]\";");
	}
	//�˴����ϱ���,��Ҫ�Ǵ���ͬ�汾֮����ڵ�һЩ����������
	$query=$db->query("$format[sql]",'','0');
	if(!$query){
		return ;
	}
	//����ģ�����,���Ҹ���SQL���ڵĻ�,Ҫ�����ݿ�
	if($format[tplpart_2code]&&$format[sql2]){
		$query2=$db->query($format[sql2],'','0');
		$rs2=$db->fetch_array($query2);
		$rs2=label_set_rs($format,$rs2);
	}
	while($rs=$db->fetch_array($query)){
		
		//�и���ģ��ʱ,Ҫ�ر���,CK�����ȡ��һ������
		if($format[tplpart_2code]){
			if($format[sql2]){			//�����SQL���Ļ�,Ҫ������ͬ�ļ�¼
				if($rs2[id]==$rs[id]){
					$ck++;
					continue;
				}				
			}elseif(!$ck){				//ûSQL���,���Ҹ���ģ���б���ʱ,Ҫ��ȡһ����¼,$contentһ�㲻�ᵥ������
				if(strstr($format[tplpart_2code],'$title')||strstr($format[tplpart_2code],'$picurl')){
					$rs2=label_set_rs($format,$rs);
					$ck++;
					continue;
				}
			}
		}
		$listdb[]=label_set_rs($format,$rs);
	}

	//�и���ģ��ʱ,û�н�ȡ������ʱ,Ҫ�������һ����¼
	if($format[tplpart_2code]&&!$ck){
		array_pop($listdb);
		//�������û�б����ĸ���ģ��
		if(!$format[sql2]){
			$rs2=label_set_rs($format,'');
		}
	}
	
	//ִ��PHP�߼�
	if(strstr($listdb[0][tpl_1code],'print <<<EOT')){
		return run_label_php($listdb);
	}

	//�õ�Ƭ,=='rollpic'�ɰ�,=='r'��V6
	if($format[stype]=='rollpic'||$format[stype]=='r')
	{
		foreach( $listdb AS $key=>$rs){
			$iii++;
			$picurl[$iii]=$rs[picurl];
			unset($rs[picurl]);
			$picalt[$iii]=$rs[title];
			@extract($rs);			
			eval("\$showurl=\"$showurl\";");
			$piclink[$iii]=$showurl;
		}
		$format[picurl]=$picurl;
		$format[picalt]=$picalt;
		$format[piclink]=$piclink;
		return rollPic_JS($format);
	}

	//������е�����
	$listdb=array_chunk($listdb,$format[colspan]);
	$width=floor((1/$format[colspan])*100);
	foreach($listdb AS $key1=>$array1){
		$show.="<tr>";
		//�и���ģ��ʱ,��һ����ѭ��,Ҫ�ر���һ��,����ѭ���Ӷ�һ��
		if($format[tplpart_2code]&&$key1==0){
			$array1[-1]=$rs2;
			ksort($array1);
		}

		foreach($array1 AS $key2=>$rs){
			$jjj++;
			@extract($rs);			
			//if($format[tplpath]=='/common_zh_title/zh_bigtitle.jpg'){	die("fd$tpl_2code");}
			//�и���ģ��ʱ,��һ����ѭ��,��һ����ѭ��ʱ,�ر�����ģ��
			if($tpl_2code&&$key1==0&&$jjj==1){
				$format[titlenum2] && $title=get_word($full_title,$format[titlenum2]);
				$format[content_num2] && $content=get_word($full_content,$format[content_num2]);
				$htmlcode=addslashes($tpl_2code);
				eval("\$htmlcode=\"$htmlcode\";");
				$htmlcode=$htmlcodeTOP=StripSlashes($htmlcode);
			}else{
				$i++;	//����ģ�������

				//�Զ���ģ�͵���,��ȡ������select,radio,checkbox�������ơ�1|�й�����ʵֵ
				if($format[SYS]=='form'){
					$m_array=unserialize($M_config);
					foreach( $m_array[listshow_db] AS $key3=>$rs3){
						$$key3=SRC_true_value($m_array[field_db][$key3],$$key3);
					}
				}

				$htmlcode=addslashes($tpl_1code);
				eval("\$htmlcode=\"$htmlcode\";");
				$htmlcode=StripSlashes($htmlcode);
				$show.="<td width=$width%>$htmlcode</td>";
			}
			$DivTpl.=$htmlcode;
		}
		$show.="</tr>";
	}
	if($format[DivTpl]){
		//DIV����
		return $DivTpl;
	}else{
		//table����
		return "$htmlcodeTOP<table width='100%' border='0' cellspacing='0' cellpadding='0'>$show</table>";
	}
}


//CMS��������ר��
function CMS_special($format){
	global $db,$pre,$webdb,$TB_pre,$TB_url,$timestamp;
	$_pre = $pre.$format['PRE'];
	//��������õ�URL����ʵ�б��ַ
	$page=1;
	$rsdb=$db->get_one("SELECT * FROM {$_pre}special WHERE id='$format[spid]'");

	//�������ڿ��ܴ�����ַ���.����',1,2'��������
	$array_a=explode(",",$rsdb[aids]);
	foreach( $array_a AS $key=>$value){
		if(!$value){
			unset($array_a[$key]);
		}
	}
	$rsdb[aids]=implode(",",$array_a);
	unset($array_a);
	$array_a=explode(",",$rsdb[tids]);
	foreach( $array_a AS $key=>$value){
		if(!$value){
			unset($array_a[$key]);
		}
	}
	$rsdb[tids]=implode(",",$array_a);
	
	$Rows=$format[rowspan]*$format[colspan];
	
	//�и���ģ��ʱ,Ҫ�Ӷ�һ��
	if($format[tplpart_2code]){
		$Rows++;
	}

	if($rsdb[aids])
	{
		//��ȡ��������
		$detail=CMS_sp_article($format,$rsdb,$Rows);
		$detail[0] && $listdb=$detail[0];
		$rs2=$detail[1];
	}
	

	//��������л�ȡ�ļ�¼����,���������̳�л�ȡ
	if($rsdb[tids]){
		if($format[tplpart_2code]){
			if(count($listdb)<($Rows-1)){
				$getbbs=1;
			}
		}else{
			if(count($listdb)<$Rows){
				$getbbs=1;
			}
		}
	}
	
	if($getbbs)
	{
		$Rows2=$Rows-count($listdb);
		if(ereg("^pwbbs",$webdb[passport_type]))
		{
			$detail=get_sp_pwbbs($format,$rsdb,$Rows2,$rs2);
			$_listdb=$detail[0];
			$rs3=$detail[1];
		}
		elseif(ereg("^dzbbs",$webdb[passport_type]))
		{
			$detail=get_sp_dzbbs($format,$rsdb,$Rows2,$rs2);
			$_listdb=$detail[0];
			$rs3=$detail[1];
		}
		if($format[order]=='default'){
			$tidsdb=explode(",",$rsdb[tids]);
			foreach($tidsdb AS $key=>$value){
				if($_listdb[$value]){
					$listdb[]=$_listdb[$value];
				}
			}
		}else{
			//������Զ����
			foreach($_listdb AS $key=>$value){
				$listdb[]=$value;
			}
		}
		//��Ը���ģ��
		if($format[tplpart_2code]){
			//��������¼û���㹻ָ��������,�򲻱�ȥ��һ����¼,�����Ҫȥ�����һ��
			if(count($listdb)>($Rows-1)){
				array_pop($listdb);
			}
			//�������ϵͳ�ﲻ����,���ȡ��̳��
			if($rs3){
				$rs2=$rs3;
			}
		}
	}

	$listdb||$listdb=array();

	//ִ��PHP�߼�
	if(strstr($listdb[0][tpl_1code],'print <<<EOT')){
		return run_label_php($listdb);
	}

	//�õ�Ƭ
	if($format[stype]=='rollpic'||$format[stype]=='r')
	{
		foreach( $listdb AS $key=>$rs){
			$iii++;
			$picurl[$iii]=$rs[picurl];
			unset($rs[picurl]);
			$picalt[$iii]=$rs[title];
			@extract($rs);
			eval("\$showurl=\"$rs[showurl]\";");
			$piclink[$iii]=$showurl;
		}
		$format[picurl]=$picurl;
		$format[picalt]=$picalt;
		$format[piclink]=$piclink;
		return rollPic_JS($format);
	}

	$listdb=array_chunk($listdb,$format[colspan]);
	$width=floor((1/$format[colspan])*100);
	foreach($listdb AS $key1=>$array1){
		$show.="<tr>";

		//�и���ģ��ʱ,��һ����ѭ��,Ҫ�ر���һ��,����ѭ���Ӷ�һ��
		if($format[tplpart_2code]&&$key1==0){
			$array1[-1]=$rs2;
			ksort($array1);
		}

		foreach($array1 AS $key2=>$rs){
			$jjj++;
			@extract($rs);
			//�и���ģ��ʱ,��һ����ѭ��,��һ����ѭ��ʱ,�ر�����ģ��
			if($tpl_2code&&$key1==0&&$jjj==1){
				$format[titlenum2] && $title=get_word($full_title,$format[titlenum2]);
				$format[content_num2] && $content=get_word($full_content,$format[content_num2]);
				$htmlcode=addslashes($tpl_2code);
				eval("\$htmlcode=\"$htmlcode\";");
				$htmlcode=$htmlcodeTOP=StripSlashes($htmlcode);
			}else{
				$i++;	//����ģ�������
				//$htmlcode=addslashes($format[tplpart_1code]);
				$htmlcode=addslashes($rs[tpl_1code]);
				eval("\$htmlcode=\"$htmlcode\";");
				$htmlcode=StripSlashes($htmlcode);
			}
			$show.="<td width=$width%>$htmlcode</td>";
			$DivTpl.=$htmlcode;
		}
		$show.="</tr>";
	} 
	if($format[DivTpl]){
		//DIV����
		return $DivTpl;
	}else{
		//table����
		return "$htmlcodeTOP<table width='100%' border='0' cellspacing='0' cellpadding='0'>$show</table>";
	}
}

//ϵͳר��
function Get_sp($format){
	global $db,$pre,$webdb,$TB_pre,$TB_url,$timestamp;
	//��������õ�URL����ʵ�б��ַ
	$page=1;
	$rsdb=$db->get_one("SELECT * FROM {$pre}special WHERE id='$format[spid]'");

	//�������ڿ��ܴ�����ַ���.����',1,2'��������
	$array_a=explode(",",$rsdb[aids]);
	foreach( $array_a AS $key=>$value){
		if(!$value){
			unset($array_a[$key]);
		}
	}
	$rsdb[aids]=implode(",",$array_a);
	unset($array_a);
	$array_a=explode(",",$rsdb[tids]);
	foreach( $array_a AS $key=>$value){
		if(!$value){
			unset($array_a[$key]);
		}
	}
	$rsdb[tids]=implode(",",$array_a);
	
	$Rows=$format[rowspan]*$format[colspan];
	
	//�и���ģ��ʱ,Ҫ�Ӷ�һ��
	if($format[tplpart_2code]){
		$Rows++;
	}

	if($rsdb[aids])
	{
		//��ȡ��������
		$detail=get_sp_article($format,$rsdb,$Rows);
		$detail[0] && $listdb=$detail[0];
		$rs2=$detail[1];
	}
	

	//��������л�ȡ�ļ�¼����,���������̳�л�ȡ
	if($rsdb[tids]){
		if($format[tplpart_2code]){
			if(count($listdb)<($Rows-1)){
				$getbbs=1;
			}
		}else{
			if(count($listdb)<$Rows){
				$getbbs=1;
			}
		}
	}
	
	if($getbbs)
	{
		$Rows2=$Rows-count($listdb);
		if(ereg("^pwbbs",$webdb[passport_type]))
		{
			$detail=get_sp_pwbbs($format,$rsdb,$Rows2,$rs2);
			$_listdb=$detail[0];
			$rs3=$detail[1];
		}
		elseif(ereg("^dzbbs",$webdb[passport_type]))
		{
			$detail=get_sp_dzbbs($format,$rsdb,$Rows2,$rs2);
			$_listdb=$detail[0];
			$rs3=$detail[1];
		}
		if($format[order]=='default'){
			$tidsdb=explode(",",$rsdb[tids]);
			foreach($tidsdb AS $key=>$value){
				if($_listdb[$value]){
					$listdb[]=$_listdb[$value];
				}
			}
		}else{
			//������Զ����
			foreach($_listdb AS $key=>$value){
				$listdb[]=$value;
			}
		}
		//��Ը���ģ��
		if($format[tplpart_2code]){
			//��������¼û���㹻ָ��������,�򲻱�ȥ��һ����¼,�����Ҫȥ�����һ��
			if(count($listdb)>($Rows-1)){
				array_pop($listdb);
			}
			//�������ϵͳ�ﲻ����,���ȡ��̳��
			if($rs3){
				$rs2=$rs3;
			}
		}
	}

	$listdb||$listdb=array();

	//ִ��PHP�߼�
	if(strstr($listdb[0][tpl_1code],'print <<<EOT')){
		return run_label_php($listdb);
	}

	//�õ�Ƭ
	if($format[stype]=='rollpic'||$format[stype]=='r')
	{
		foreach( $listdb AS $key=>$rs){
			$iii++;
			$picurl[$iii]=$rs[picurl];
			unset($rs[picurl]);
			$picalt[$iii]=$rs[title];
			@extract($rs);
			eval("\$showurl=\"$rs[showurl]\";");
			$piclink[$iii]=$showurl;
		}
		$format[picurl]=$picurl;
		$format[picalt]=$picalt;
		$format[piclink]=$piclink;
		return rollPic_JS($format);
	}

	$listdb=array_chunk($listdb,$format[colspan]);
	$width=floor((1/$format[colspan])*100);
	foreach($listdb AS $key1=>$array1){
		$show.="<tr>";

		//�и���ģ��ʱ,��һ����ѭ��,Ҫ�ر���һ��,����ѭ���Ӷ�һ��
		if($format[tplpart_2code]&&$key1==0){
			$array1[-1]=$rs2;
			ksort($array1);
		}

		foreach($array1 AS $key2=>$rs){
			$jjj++;
			@extract($rs);
			//�и���ģ��ʱ,��һ����ѭ��,��һ����ѭ��ʱ,�ر�����ģ��
			if($tpl_2code&&$key1==0&&$jjj==1){
				$format[titlenum2] && $title=get_word($full_title,$format[titlenum2]);
				$format[content_num2] && $content=get_word($full_content,$format[content_num2]);
				$htmlcode=addslashes($tpl_2code);
				eval("\$htmlcode=\"$htmlcode\";");
				$htmlcode=$htmlcodeTOP=StripSlashes($htmlcode);
			}else{
				$i++;	//����ģ�������
				//$htmlcode=addslashes($format[tplpart_1code]);
				$htmlcode=addslashes($rs[tpl_1code]);
				eval("\$htmlcode=\"$htmlcode\";");
				$htmlcode=StripSlashes($htmlcode);
			}
			$show.="<td width=$width%>$htmlcode</td>";
			$DivTpl.=$htmlcode;
		}
		$show.="</tr>";
	} 
	if($format[DivTpl]){
		//DIV����
		return $DivTpl;
	}else{
		//table����
		return "$htmlcodeTOP<table width='100%' border='0' cellspacing='0' cellpadding='0'>$show</table>";
	}
}

/**
*��$url,$listurl������ͨ����ַ������,�Ա��ȡ����ʵ����ַ
**/
function make_ture_path($format,$rs){
	global $ModuleDB,$webdb,$Html_Type,$showHtml_Type,$city_DB;
	
	//CMS���������б���������ַ
	if($format[SYS]=='CMS'){
		if($ModuleDB[$format['PRE']]['domain']){
			$list_url=$show_url=$ModuleDB[$format['PRE']]['domain'].'/';	//Ƶ����������
		}else{
			$list_url=$show_url="$webdb[www_url]/{$ModuleDB[$format['PRE']]['dirname']}/";
		}
		
		if(!$Html_Type[CMS][$format['PRE']]){
			$Html_Type[CMS][$format['PRE']]=@include(ROOT_PATH."{$ModuleDB[$format['PRE']]['dirname']}/data/htmltype.php");
		}
		$_Html_Type =& $Html_Type[CMS][$format['PRE']];
		if($format[ctype]=='article'||$format[ctype]=='fu_article'){

			if($_Html_Type[IF_HTML]==1){
				//����Ŀ�Զ�����ļ�������
				$filename_l=$_Html_Type['list'][$rs[fid]]?$_Html_Type['list'][$rs[fid]]:$_Html_Type['list'][0];

				//���Զ��������ҳ�ļ�������
				if($_Html_Type[bencandy_id][$id]){
					$filename_b=$_Html_Type[bencandy_id][$id];
				}elseif($_Html_Type[bencandy][$rs[fid]]){
					$filename_b=$_Html_Type[bencandy][$rs[fid]];
				}else{
					$filename_b=$_Html_Type[bencandy][0];
				}

				$list_url.=$filename_l;
				$show_url.=$filename_b;
				
				//���ļ���ȥ��,����Ĭ��/�ĵ�
				$list_url=preg_replace("/(.*)\/([^\/]+)/is","\\1/",$list_url);

				//��������ҳ����ҳ��$pageȥ����
				$show_url=preg_replace("/(.*)(-{\\\$page}|_{\\\$page})(.*)/is","\\1\\3",$show_url);
				//��������ҳ����ĿС��1000ƪ����ʱ,��DIR��Ŀ¼ȥ����
				if(floor($rs[aid]/1000)==0){
					$show_url=preg_replace("/(.*)(-{\\\$dirid}|_{\\\$dirid})(.*)/is","\\1\\3",$show_url);
				}
			}else{
				$list_url.='list.php?fid={$fid}';
				$show_url.='bencandy.php?fid={$fid}&id={$aid}';
			}

		}elseif($format[ctype]=='specialsort'){
			if($_Html_Type[IF_HTML]==1){
				//����Ŀ�Զ�����ļ�������
				$filename_l=$_Html_Type[SPlist][$rs[fid]]?$_Html_Type[SPlist][$rs[fid]]:$_Html_Type[SPlist][0];

				//���Զ��������ҳ�ļ�������
				if($_Html_Type[special_bencandy][$id]){
					$filename_b=$_Html_Type[special_bencandy][$id];
				}elseif($_Html_Type[SPbencandy][$rs[fid]]){
					$filename_b=$_Html_Type[SPbencandy][$rs[fid]];
				}else{
					$filename_b=$_Html_Type[SPbencandy][0];
				}

				$list_url.=$filename_l;
				$show_url.=$filename_b;
			}else{
				$list_url.='listsp.php?fid=$fid';
				$show_url.='showsp.php?fid=$fid&id=$id';
			}
		}elseif($format[ctype]=='special'){
		}elseif($format[ctype]=='comment'){
			$show_url.='comment.php?fid=$fid&id=$aid';
		}
		
		//��ǩ����PHP�߼�,��Ծ�̬��ʱ��,��ͬ��Ŀ���Զ���URL
		if($_Html_Type[IF_HTML]==1&&strstr($format[tplpart_1code],'print <<<EOT')){
			$array[urlDB][show_url]=$show_url;
			$array[urlDB][list_url]=$list_url;
			$show_url='{$show_urldb[$id]}';
			$list_url='{$list_urldb[$id]}';
		}

		$tpl_1code=str_replace('{$url}',$show_url,$format[tplpart_1code]);
		$tpl_1code=str_replace('$url',$show_url,$tpl_1code);
		$tpl_1code=str_replace('{$list_url}',$list_url,$tpl_1code);
		$tpl_1code=str_replace('$list_url',$list_url,$tpl_1code);

		$tpl_2code=str_replace('{$url}',$show_url,$format[tplpart_2code]);
		$tpl_2code=str_replace('$url',$show_url,$tpl_2code);
		$tpl_2code=str_replace('{$list_url}',$list_url,$tpl_2code);
		$tpl_2code=str_replace('$list_url',$list_url,$tpl_2code);
		$array[tpl_1code]=$tpl_1code;
		$array[tpl_2code]=$tpl_2code;
	}
	
	//���������,���ϰ治�������
	elseif($format[SYS]=='fenlei'){
		$keyname=$format[wninfo];
		//������ߵ���,��ʹ�ñ�׼��URL����,������ģ����õĻ�,���ö�̬����
		if( $ModuleDB[$keyname][id]==$webdb['module_id']&&function_exists('get_info_url') ){
			$list_url=get_info_url('',$rs[fid],$rs[city_id]);
			$show_url=get_info_url($rs[id],$rs[fid],$rs[city_id]);
		}else{
			$list_url=$show_url="$webdb[www_url]/";
			$list_url.='list.php?city_id=$rs[city_id]&fid=$rs[fid]';
			$show_url.='bencandy.php?city_id=$rs[city_id]&fid=$rs[fid]&id=$rs[id]';
		}
		$tpl_1code=str_replace(array('{$url}','$url','{$list_url}','$list_url'),array($show_url,$show_url,$list_url,$list_url),$format[tplpart_1code]);

		$tpl_2code=str_replace(array('{$url}','$url','{$list_url}','$list_url'),array($show_url,$show_url,$list_url,$list_url),$format[tplpart_2code]);

		$array[tpl_1code]=$tpl_1code;
		$array[tpl_2code]=$tpl_2code;
	}

	//wnָ����ģ��,normalָ5.0���е�ͼ��.��Ƶ,����,FLASH��Ƶ�����б�������ҳ��ַ
	elseif($format[SYS]=='normal'||$format[SYS]=='wn'){
		$keyname=$format[SYS]=='normal'?$format[SYS_type]:$format[wninfo];
		if($city_DB[domain][$rs[city_id]]){		//���ж�������
			$list_url=$show_url=$city_DB[domain][$rs[city_id]]."/{$ModuleDB[$keyname][dirname]}/";
		}elseif($ModuleDB[$keyname][domain]){	//Ƶ����������
			$list_url=$show_url=$ModuleDB[$keyname][domain]."/";
		}else{									//Ƶ������Ŀ¼
			$list_url=$show_url="$webdb[www_url]/{$ModuleDB[$keyname][dirname]}/";
		}
		$CF=unserialize($ModuleDB[$keyname][config]);
		if($CF[MakeHtml]==2){
			$list_url.=$CF[list_HtmlName2];
			$show_url.=$CF[show_HtmlName2];
		}elseif($CF[MakeHtml]==1){
			$list_url.=$CF[list_HtmlName][$rs[fid]]?$CF[list_HtmlName][$rs[fid]]:$CF[list_HtmlName1];
			$show_url.=$CF[show_HtmlName][$rs[fid]]?$CF[show_HtmlName][$rs[fid]]:$CF[show_HtmlName1];
			$list_url=preg_replace("/(.*)\/([^\/]+)/is","\\1/",$list_url);
		}else{
			$list_url.=$CF[list_PhpName];
			$show_url.=$CF[show_PhpName];
		}


		//��ǩ����PHP�߼�,��Ծ�̬��ʱ��,��ͬ��Ŀ���Զ���URL
		if($CF[MakeHtml]==1&&strstr($format[tplpart_1code],'print <<<EOT')){
			$array[urlDB][show_url]=$show_url;
			$array[urlDB][list_url]=$list_url;
			$show_url='{$show_urldb[$id]}';
			$list_url='{$list_urldb[$id]}';
		}

		$tpl_1code=str_replace('{$url}',$show_url,$format[tplpart_1code]);
		$tpl_1code=str_replace('$url',$show_url,$tpl_1code);
		$tpl_1code=str_replace('{$list_url}',$list_url,$tpl_1code);
		$tpl_1code=str_replace('$list_url',$list_url,$tpl_1code);

		$tpl_2code=str_replace('{$url}',$show_url,$format[tplpart_2code]);
		$tpl_2code=str_replace('$url',$show_url,$tpl_2code);
		$tpl_2code=str_replace('{$list_url}',$list_url,$tpl_2code);
		$tpl_2code=str_replace('$list_url',$list_url,$tpl_2code);

		$array[tpl_1code]=$tpl_1code;
		$array[tpl_2code]=$tpl_2code;
	}

	//��վϵͳ�������б���������ַ
	elseif($format[SYS]=='artcile'){
		$list_url=$show_url="$webdb[www_url]$webdb[path]/";
		if($webdb[NewsMakeHtml]==2){
			$list_url.=$webdb[list_filename2];
			$show_url.=$webdb[bencandy_filename2];
		}elseif($webdb[NewsMakeHtml]==1){
			$list_url=$show_url="$webdb[www_url]/";
			//����Ŀ�Զ�����ļ�������
			$filename_l=$Html_Type['list'][$rs[fid]]?$Html_Type['list'][$rs[fid]]:$webdb[list_filename];
			//���Զ��������ҳ�ļ�������
			if($showHtml_Type[bencandy][$id]){
				$filename_b=$showHtml_Type[bencandy][$id];
			}elseif($Html_Type[bencandy][$rs[fid]]){
				$filename_b=$Html_Type[bencandy][$rs[fid]];
			}else{
				$filename_b=$webdb[bencandy_filename];
			}
			//�Զ�������Ŀ����
			if($Html_Type[domain][$rs[fid]]&&$Html_Type[domain_dir][$rs[fid]]){
				$rule=str_replace("/","\/",$Html_Type[domain_dir][$rs[fid]]);
				$show_url=preg_replace("/^$rule/is","{$Html_Type[domain][$rs[fid]]}/",$filename_b);
				$list_url=preg_replace("/^$rule/is","{$Html_Type[domain][$rs[fid]]}/",$filename_l);
				//�ر���һ��Щ�Զ�������ҳ�ļ��������.
				if(!eregi("^http:\/\/",$show_url)){
					$show_url="$webdb[www_url]/$filename_b";
				}
			}else{
				$list_url.=$filename_l;
				$show_url.=$filename_b;
			}			
			//���ļ���ȥ��,����Ĭ��/�ĵ�
			$list_url=preg_replace("/(.*)\/([^\/]+)/is","\\1/",$list_url);


			//��������ҳ����ҳ��$pageȥ����
			$show_url=preg_replace("/(.*)(-{\\\$page}|_{\\\$page})(.*)/is","\\1\\3",$show_url);
			//��������ҳ����ĿС��1000ƪ����ʱ,��DIR��Ŀ¼ȥ����
			if(floor($rs[aid]/1000)==0){
				$show_url=preg_replace("/(.*)(-{\\\$dirid}|_{\\\$dirid})(.*)/is","\\1\\3",$show_url);
			}

		}else{
			$list_url.='list.php?fid={$fid}';
			$show_url.='bencandy.php?fid={$fid}&id={$aid}';
		}

		//��ǩ����PHP�߼�,��Ծ�̬��ʱ��,��ͬ��Ŀ���Զ���URL
		if($webdb[NewsMakeHtml]==1&&strstr($format[tplpart_1code],'print <<<EOT')){
			$array[urlDB][show_url]=$show_url;
			$array[urlDB][list_url]=$list_url;
			$show_url='{$show_urldb[$id]}';
			$list_url='{$list_urldb[$id]}';
		}		
		
		$tpl_1code=str_replace('{$url}',$show_url,$format[tplpart_1code]);
		$tpl_1code=str_replace('$url',$show_url,$tpl_1code);
		$tpl_1code=str_replace('{$list_url}',$list_url,$tpl_1code);
		$tpl_1code=str_replace('$list_url',$list_url,$tpl_1code);

		$tpl_2code=str_replace('{$url}',$show_url,$format[tplpart_2code]);
		$tpl_2code=str_replace('$url',$show_url,$tpl_2code);
		$tpl_2code=str_replace('{$list_url}',$list_url,$tpl_2code);
		$tpl_2code=str_replace('$list_url',$list_url,$tpl_2code);
		$array[tpl_1code]=$tpl_1code;
		$array[tpl_2code]=$tpl_2code;
	}

	//phpwind��DISCUZ��̳���������б���ַ
	elseif($format[SYS]=='pwbbs'||$format[SYS]=='dzbbs')
	{
		if($format[SYS]=='pwbbs'){
			$show_url='$webdb[passport_url]/read.php?tid=$tid&page=1';
			$list_url='$webdb[passport_url]/thread.php?fid=$fid';
		}else{
			$show_url='$webdb[passport_url]/viewthread.php?tid=$tid&page=1';
			$list_url='$webdb[passport_url]/forumdisplay.php?fid=$fid';
		}

		$tpl_1code=str_replace('{$url}',$show_url,$format[tplpart_1code]);
		$tpl_1code=str_replace('$url',$show_url,$tpl_1code);
		$tpl_1code=str_replace('{$list_url}',$list_url,$tpl_1code);
		$tpl_1code=str_replace('$list_url',$list_url,$tpl_1code);

		$tpl_2code=str_replace('{$url}',$show_url,$format[tplpart_2code]);
		$tpl_2code=str_replace('$url',$show_url,$tpl_2code);
		$tpl_2code=str_replace('{$list_url}',$list_url,$tpl_2code);
		$tpl_2code=str_replace('$list_url',$list_url,$tpl_2code);
		$array[tpl_1code]=$tpl_1code;
		$array[tpl_2code]=$tpl_2code;
	}

	else
	{
		$array[tpl_1code]=$format[tplpart_1code];
		$array[tpl_2code]=$format[tplpart_2code];
	}
	//��Ҫ��Իõ�Ƭ��������ַ
	$array[showurl]=$show_url;
	return $array;
}

//��������ÿ����¼Ҫ��ʽ������
function label_set_rs($format,$rs){
	global $db,$pre,$timestamp,$webdb,$TB_url;
	
	//����Ļ�,���ڷֱ�����,Ҫ�ر���,��֧������Ƶ������,�����
	if($format[SYS]=='fenlei'&&!$rs[posttime]){
		global $Fid_db;
		$_erp=$Fid_db[tableid][$rs[fid]];		
		$rs=$db->get_one("SELECT * FROM {$pre}{$format[wninfo]}content$_erp WHERE id='$rs[id]' ");
	}

	//��ȡ�Զ����ֶεı�,�������,���������noReadMid�Ͳ�Ҫ����
	if($format[wninfo]&&$rs[mid]&&!$format[noReadMid]){
		$_rss=$db->get_one("SELECT * FROM {$pre}{$format[wninfo]}content_{$rs[mid]} WHERE id='$rs[id]' ");
		$_rss && $rs=$rs+$_rss;
	//����Ҫ��ȡ�Զ����ֶεı�,�������
	}elseif($format[SYS]=='artcile'&&$rs[mid]){
		$_rss=$db->get_one("SELECT * FROM {$pre}article_content_{$rs[mid]} WHERE aid='$rs[aid]' ");
		$_rss && $rs=$rs+$_rss;
	}

	//��չ�ӿ�,����
	if($format[eval_code]){
		eval($format[eval_code]);
	}

	//��������
	if($format[SYS]=='pwbbs'){
		//���ػ������
		if($ifhide||strstr($rs[content],'[sell=')){
			$rs[content]='******';
		}
		$rs[content]=preg_replace("/\[([^\]]+)\]/is","",$rs[content]);
		global $db_attachname;
		$rs[picurl]='';
		if($rs[attachurl]){
			//���ݾɰ����������ͼƬ��.
			if(is_file(ROOT_PATH."$webdb[passport_path]/$db_attachname/thumb/$rs[attachurl]")){
				$rs[picurl]="$webdb[passport_url]/$db_attachname/thumb/$rs[attachurl]";
			}else{
				$rs[picurl]="$webdb[passport_url]/$db_attachname/$rs[attachurl]";
			}
		}
		$dfont=explode("~",$rs[titlefont]);
		$rs[titlecolor]=$dfont[0];
	}elseif($format[SYS]=='dzbbs'){
		$rs[content]=preg_replace("/\[([^\]]+)\]/is","",$rs[content]);
		global $_DCACHE;
		$rs[picurl]='';
		$rs[attachment] && $rs[picurl]="$webdb[passport_url]/{$_DCACHE[settings][attachurl]}/$rs[attachment]";
	}

	$rs[full_time]=$rs[posttime];
	$rs[full_title]=$rs[title];
	//����
	$rs[description] && $rs[content]=$rs[description];
	$rs[content]=preg_replace('/<([^<]*)>/is',"",$rs[content]);	//��HTML������˵�
	$rs[content]=preg_replace('/ |��|&nbsp;/is',"",$rs[content]);	//�Ѷ���Ŀո�ȥ����
	$rs[full_content]=$rs[content];
	$rs[content]=get_word($rs[content],$format[content_num]);
	//������ʽ
	$rs[fontweight]=$rs[fontcolor]='';
	$rs[fonttype]==1 && $rs[fontweight]='font-weight:bold;';
	$rs[titlecolor] && $rs[fontcolor]="color:$rs[titlecolor];";
	//����
	$rs[smalltitle] && $rs[title] = $rs[smalltitle];	//����м�̱���Ļ�,��ʹ�ü�̱���
	$rs[title]=preg_replace('/<([^<]*)>/is',"",$rs[title]);
	$rs[title]=get_word($rs[title],$format[titlenum],$format[titleflood]);
	if(!$format[timeformat]){
		$format[timeformat]="Y/m/d";
	}
	$rs[posttime]=date($format[timeformat],$rs[posttime]);
	if($rs[picurl]){
		$rs[picurl] = filtrate($rs[picurl]);
		$rs[picurl]=tempdir($rs[picurl]);		//4:3��ͼ
		$rs[picurl2]="$rs[picurl].jpg";			//3:4��ͼ
		$rs[picurl3]="$rs[picurl].jpg.jpg";		//1:1��ͼ
	}else{
		$rs[picurl2]=$rs[picurl3]="";
	}
	
	//��������
	if(($timestamp-$rs[full_time])<($format[newhour]*3600)){
		$rs['new']="<img src='$webdb[www_url]/images/default/new.gif' border=0>";
	}else{
		$rs['new']="";
	}
	
	//��������
	if( $format[hothits]&&($rs[hits]>$format[hothits]) ){
		$rs[hot]="<img src='$webdb[www_url]/images/default/hot.gif' border=0>";
	}else{
		$rs[hot]="";
	}

	//V6��ǰ�İ汾��Ҫ�õ�
	if($format[SYS]=='artcile'){
		$rs[id]=$rs[aid];
	}
			
	//��Ҫ�����$url,$listurl��������ַ�õ�����ʵ��ַ
	$detail=make_ture_path($format,$rs);
	$rs[tpl_1code]=$detail[tpl_1code];

	$rs[showurl]=$detail[showurl];		//��Ҫ��Իõ�Ƭ

	$detail[urlDB] && $rs[urlDB]=$detail[urlDB];	//��Ա�ǩ���PHP�߼�,���Զ���URLҪ������

	$rs[tpl_2code]=$detail[tpl_2code];	//��һ�������ڵ�

	$rs[dirid]=floor($rs[id]/1000);

	$rs[time_Y]=date("Y",$rs[full_time]);
	$rs[time_W]=date("W",$rs[full_time]);
	$rs[time_y]=date("y",$rs[full_time]);
	$rs[time_m]=date("m",$rs[full_time]);
	$rs[time_d]=date("d",$rs[full_time]);
	$rs[time_H]=date("H",$rs[full_time]);
	$rs[time_i]=date("i",$rs[full_time]);
	$rs[time_s]=date("s",$rs[full_time]);

	return $rs;
}

//ר�⵱��,��ȡ���µ�����
function CMS_sp_article($format,$rsdb,$Rows){
	global $db,$pre;
	
	$_pre = $pre.$format['PRE'];

	if($format[order]=='list'){
		$order='A.list';
	}elseif($format[order]=='hits'){
		$order='A.hits';
	}elseif($format[order]=='comments'){
		$order='A.comments';
	}else{
		$order='A.aid';
	}
	if($format[yz]==1){
		$_SQL=" AND A.yz=1 ";
	}
	

	//����ڸ���ģ�����Ĵ���,��Ϊ��ָ����ID,���Զ���һ������,Ч��Ӱ�첻��
	if(strstr($format[tplpart_2code],'$picurl')){
		$_SQL2PIC=" AND A.ispic=1 ";
	}
	//������,Ĭ������Ļ�,������Ƕ�ȡͼƬ�Ļ�,ֻ��ȡ��һ��ID����
	//�����Ĭ��,Ȼ����ͼƬ�Ļ�.���������ͱȽ��鷳
	if(!$_SQL2PIC&&$format[order]=='default'){
		$string2id=preg_replace("/([0-9]+)(.*)/is","\\1",$rsdb[aids]);
		$_SQL2ORDER="";
	}else{
		$string2id=$rsdb[aids];
		//��ͼƬ,��ר���趨����ʱ,Ҫȫ��������.�����ͼƬ����������
		if($_SQL2PIC&&$format[order]=='default'){
			$_SQL2ORDER="";
			$getpic++;
		}else{
			$_SQL2ORDER="ORDER BY $order DESC LIMIT 1";
		}		
	}
	if(strstr($format[tplpart_2code],'$content')){		
		$SQL2="SELECT A.*,A.aid AS id,B.content FROM {$_pre}article A LEFT JOIN {$_pre}reply B ON A.aid=B.aid WHERE A.aid IN ($string2id) AND B.topic=1 $_SQL $_SQL2PIC $_SQL2ORDER";
	}elseif($format[tplpart_2code]){
		$SQL2="SELECT A.*,A.aid AS id FROM {$_pre}article A WHERE A.aid IN ($string2id) $_SQL $_SQL2PIC $_SQL2ORDER";
	}
	if($SQL2){
		//ר���ڿɿ�����Ļ�.Ҫȫ��������,��������.
		if($getpic){
			$query = $db->query($SQL2);
			while($rss = $db->fetch_array($query)){
				$Ls[$rss[aid]]=$rss;
			}
			$aidsdb=explode(",",$rsdb[aids]);
			foreach($aidsdb AS $key=>$value){
				if($Ls[$value]){
					$rs2=$Ls[$value];
					break;
				}
			}
		}else{
			$rs2=$db->get_one($SQL2);
		}		
		if($rs2){
			$_format=$format;
			$_format[CMS]='artcile';$_format[ctype]='article';		//α��,�Ա��ȡURL��ַ
			$rs2=label_set_rs($_format,$rs2);
		}			
	}

	//'rollpic','6'����V6��ǰ�İ汾,rָ�õ�Ƭ
	if(in_array($format[stype],array('rollpic','6','r','p','cp'))){ 
		$_SQL.=" AND A.ispic=1 ";
	}

	//�����ר������Ļ�,Ҫ���������ݶ�������,�����500�ǹ������Ҳ����500������
	$sqlmin=intval($format[start_num])-1;
	$sqlmin<0 && $sqlmin=0;
	if($format[order]=='default'){
		$sqlRows="500";
	}else{		
		$sqlRows="$sqlmin,$Rows";
	}

	$DESC=$format[asc]=='DESC'?'DESC':'ASC';

	if(strstr($format[tplpart_1code],'$content')){
		$SQL="SELECT A.*,B.content,A.aid AS id FROM {$_pre}article A LEFT JOIN {$_pre}reply B ON A.aid=B.aid WHERE A.aid IN ($rsdb[aids]) AND B.topic=1 $_SQL ORDER BY $order $DESC LIMIT $sqlRows";
	}else{
		$SQL="SELECT A.*,A.aid AS id FROM {$_pre}article A WHERE A.aid IN ($rsdb[aids]) $_SQL ORDER BY $order $DESC LIMIT $sqlRows";
	}
	$query = $db->query($SQL);
	while($rs = $db->fetch_array($query)){

		//��Ը���ģ�������ͬ��¼
		if($format[tplpart_2code]&&$rs[id]==$rs2[id]){
			$ck++;
			continue;
		}

		//���ע��::����α����Ϣ,��Ϊ�˵õ����µ�$url,$listurl��ַ
		$_format=$format;
		$_format[CMS]='artcile';$_format[ctype]='article';		//α��,�Ա��ȡURL��ַ
		$_listdb[$rs[aid]]=label_set_rs($_format,$rs);
	}
	//����
	if($format[order]=='default'){
		$aidsdb=explode(",",$rsdb[aids]);
		$startnum=0;
		if($format[asc]=='DESC'){
			foreach($aidsdb AS $key=>$value){
				if($key<$sqlmin){
					continue;
				}
				$startnum++;
				if($startnum>$Rows){
					break;
				}
				if($_listdb[$value]){
					$listdb[]=$_listdb[$value];
				}
			}
		}else{
			$max=count($aidsdb)-1-$sqlmin;
			for($i=$max;$i>($max-$Rows);$i--){
				if($_listdb[$aidsdb[$i]]){
					$listdb[]=$_listdb[$aidsdb[$i]];
				}
			}
		}
	}else{
		foreach($_listdb AS $key=>$value){
			$listdb[]=$value;
		}
	}

	//��Ը���ģ�����û����ͬ��¼,��Ҫ�������һ����¼.
	if($format[tplpart_2code]&&!$ck){
		//��������¼û���㹻ָ��������,�򲻱�ȥ��һ����¼,�����Ҫȥ�����һ��
		if(count($listdb)>($Rows-1)){
			array_pop($listdb);
		}
	}
	return array($listdb,$rs2);
}


//ר�⵱��,��ȡ���µ�����
function get_sp_article($format,$rsdb,$Rows){
	global $db,$pre;

	if($format[order]=='list'){
		$order='A.aid';
	}elseif($format[order]=='hits'){
		$order='A.hits';
	}elseif($format[order]=='comments'){
		$order='A.comments';
	}else{
		$order='A.aid';
	}
	if($format[yz]==1){
		$_SQL=" AND A.yz=1 ";
	}
	

	//����ڸ���ģ�����Ĵ���,��Ϊ��ָ����ID,���Զ���һ������,Ч��Ӱ�첻��
	if(strstr($format[tplpart_2code],'$picurl')){
		$_SQL2PIC=" AND A.ispic=1 ";
	}
	//������,Ĭ������Ļ�,������Ƕ�ȡͼƬ�Ļ�,ֻ��ȡ��һ��ID����
	//�����Ĭ��,Ȼ����ͼƬ�Ļ�.���������ͱȽ��鷳
	if(!$_SQL2PIC&&$format[order]=='default'){
		$string2id=preg_replace("/([0-9]+)(.*)/is","\\1",$rsdb[aids]);
		$_SQL2ORDER="";
	}else{
		$string2id=$rsdb[aids];
		//��ͼƬ,��ר���趨����ʱ,Ҫȫ��������.�����ͼƬ����������
		if($_SQL2PIC&&$format[order]=='default'){
			$_SQL2ORDER="";
			$getpic++;
		}else{
			$_SQL2ORDER="ORDER BY $order DESC LIMIT 1";
		}		
	}
	if(strstr($format[tplpart_2code],'$content')){		
		$SQL2="SELECT A.*,A.aid AS id,B.content FROM {$pre}article A LEFT JOIN {$pre}reply B ON A.aid=B.aid WHERE A.aid IN ($string2id) AND B.topic=1 $_SQL $_SQL2PIC $_SQL2ORDER";
	}elseif($format[tplpart_2code]){
		$SQL2="SELECT A.*,A.aid AS id FROM {$pre}article A WHERE A.aid IN ($string2id) $_SQL $_SQL2PIC $_SQL2ORDER";
	}
	if($SQL2){
		//ר���ڿɿ�����Ļ�.Ҫȫ��������,��������.
		if($getpic){
			$query = $db->query($SQL2);
			while($rss = $db->fetch_array($query)){
				$Ls[$rss[aid]]=$rss;
			}
			$aidsdb=explode(",",$rsdb[aids]);
			foreach($aidsdb AS $key=>$value){
				if($Ls[$value]){
					$rs2=$Ls[$value];
					break;
				}
			}
		}else{
			$rs2=$db->get_one($SQL2);
		}		
		if($rs2){
			$_format=$format;
			$_format[SYS]='artcile';			//α��,�Ա��ȡURL��ַ
			$rs2=label_set_rs($_format,$rs2);
		}			
	}

	//'rollpic','6'����V6��ǰ�İ汾,rָ�õ�Ƭ
	if(in_array($format[stype],array('rollpic','6','r','p','cp'))){ 
		$_SQL.=" AND A.ispic=1 ";
	}

	if(strstr($format[tplpart_1code],'$content')){
		$SQL="SELECT A.*,B.content,A.aid AS id FROM {$pre}article A LEFT JOIN {$pre}reply B ON A.aid=B.aid WHERE A.aid IN ($rsdb[aids]) AND B.topic=1 $_SQL ORDER BY $order DESC LIMIT $Rows";
	}else{
		$SQL="SELECT A.*,A.aid AS id FROM {$pre}article A WHERE A.aid IN ($rsdb[aids]) $_SQL ORDER BY $order DESC LIMIT $Rows";
	}
	$query = $db->query($SQL);
	while($rs = $db->fetch_array($query)){

		//��Ը���ģ�������ͬ��¼
		if($format[tplpart_2code]&&$rs[id]==$rs2[id]){
			$ck++;
			continue;
		}

		//���ע��::����α����Ϣ,��Ϊ�˵õ����µ�$url,$listurl��ַ
		$_format=$format;
		$_format[SYS]='artcile';
		$_listdb[$rs[aid]]=label_set_rs($_format,$rs);
	}
	//����
	if($format[order]=='default'){
		$aidsdb=explode(",",$rsdb[aids]);
		foreach($aidsdb AS $key=>$value){
			if($_listdb[$value]){
				$listdb[]=$_listdb[$value];
			}
		}
	}else{
		foreach($_listdb AS $key=>$value){
			$listdb[]=$value;
		}
	}

	//��Ը���ģ�����û����ͬ��¼,��Ҫ�������һ����¼.
	if($format[tplpart_2code]&&!$ck){
		//��������¼û���㹻ָ��������,�򲻱�ȥ��һ����¼,�����Ҫȥ�����һ��
		if(count($listdb)>($Rows-1)){
			array_pop($listdb);
		}
	}
	return array($listdb,$rs2);
}

//ר���л�ȡPW��̳����
function get_sp_pwbbs($format,$rsdb,$Rows2,$rs2){
	global $db,$pre,$TB_pre;

	if($format[order]=='list'){
		$order='A.tid';
	}elseif($format[order]=='hits'){
		if(ereg("^dzbbs",$webdb[passport_type])){
			$order='A.views';
		}else{
			$order='A.hits';
		}
	}elseif($format[order]=='comments'){
		$order='A.replies';
	}else{
		$order='A.tid';
	}
	$SQL="ORDER BY $order DESC ";
		
	//�Ƿ���֤,û������
	if($format[yz]==1){			
	}

	//����ڸ���ģ�����Ĵ���
	if($format[tplpart_2code]&&!$rs2){
		$_SQL1=$_SQL2='';
		if(strstr($format[tplpart_2code],'$fname')){
			$_SQL1=" ,F.name AS fname ";
			$_SQL2=" LEFT JOIN {$TB_pre}forums F ON F.fid=A.fid ";
		}
		//��ͼƬ,Ĭ������Ļ�,ֻ��ȡ��һ��ID����.
		if(!strstr($format[tplpart_2code],'$picurl')&&$format[order]=='default'){
			$string2id=preg_replace("/([0-9]+)(.*)/is","\\1",$rsdb[tids]);
		}else{
			$string2id=$rsdb[tids];
		}
		if(strstr($format[tplpart_2code],'$content')&&strstr($format[tplpart_2code],'$picurl')){
			$getpic++;
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime,C.content,Att.attachurl$_SQL1 FROM {$TB_pre}attachs Att LEFT JOIN {$TB_pre}threads A ON Att.tid=A.tid LEFT JOIN {$TB_pre}tmsgs C ON A.tid=C.tid$_SQL2 WHERE A.tid IN ($string2id) AND Att.type='img' GROUP BY A.tid $SQL";
		}elseif(strstr($format[tplpart_2code],'$content')){
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime,C.content$_SQL1 FROM {$TB_pre}threads A LEFT JOIN {$TB_pre}tmsgs C ON A.tid=C.tid$_SQL2 WHERE A.tid IN ($string2id) $SQL LIMIT 1 ";
		}elseif(strstr($format[tplpart_2code],'$picurl')){
			$getpic++;
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime,Att.attachurl$_SQL1 FROM {$TB_pre}attachs Att LEFT JOIN {$TB_pre}threads A ON Att.tid=A.tid$_SQL2 WHERE A.tid IN ($string2id) AND Att.type='img' GROUP BY tid $SQL";
		}else{
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime$_SQL1 FROM {$TB_pre}threads A$_SQL2 WHERE A.tid IN ($string2id) $SQL LIMIT 1 ";
		}
		//ר���ڿɿ�����Ļ�.Ҫȫ��������,��������.
		if($getpic&&$format[order]=='default'){
			$query = $db->query($SQL2);
			while($rss = $db->fetch_array($query)){
				$Ls[$rss[tid]]=$rss;
			}
			$aidsdb=explode(",",$rsdb[tids]);
			foreach($aidsdb AS $key=>$value){
				if($Ls[$value]){
					$rs3=$Ls[$value];
					break;
				}
			}
		}else{
			$rs3=$db->get_one($SQL2);
		}
		if($rs3){
			$_format=$format;
			$_format[SYS]='pwbbs';	//α��,�Ա��ȡURL��ַ
			$rs3=label_set_rs($_format,$rs3);
		}
	}

	//��ģ�����Ҫ��ȡ��Ŀ���ƵĻ�.Ҫ����һ����
	$_SQL1=$_SQL2='';
	if(strstr($format[tplpart_1code],'$fname')){
		$_SQL1=" ,F.name AS fname ";
		$_SQL2=" LEFT JOIN {$TB_pre}forums F ON F.fid=A.fid ";
	}
	if(strstr($format[tplpart_1code],'$picurl')&&strstr($format[tplpart_1code],'$content')){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime,C.content,At.attachurl$_SQL1 FROM {$TB_pre}attachs At LEFT JOIN {$TB_pre}threads A ON At.tid=A.tid LEFT JOIN {$TB_pre}tmsgs C ON A.tid=C.tid$_SQL2 WHERE A.tid IN ($rsdb[tids]) AND At.type='img' GROUP BY At.tid $SQL LIMIT $Rows2 ";
	}elseif(strstr($format[tplpart_1code],'$content')){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime,C.content$_SQL1 FROM {$TB_pre}threads A LEFT JOIN {$TB_pre}tmsgs C ON A.tid=C.tid$_SQL2 WHERE A.tid IN ($rsdb[tids]) $SQL LIMIT $Rows2 $rows ";
	}elseif($format[stype]=='r'||strstr($format[tplpart_1code],'$picurl')){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime,At.attachurl$_SQL1 FROM {$TB_pre}attachs At LEFT JOIN {$TB_pre}threads A ON At.tid=A.tid$_SQL2 WHERE A.tid IN ($rsdb[tids]) AND At.type='img' GROUP BY At.tid $SQL LIMIT $Rows2 ";
	}else{
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.postdate AS posttime$_SQL1 FROM {$TB_pre}threads A $_SQL2 WHERE A.tid IN ($rsdb[tids]) $SQL LIMIT $Rows2 ";
	}
	$query = $db->query($SQL);
	while($rs = $db->fetch_array($query)){
		//��Ը���ģ�������ͬ��¼
		if($format[tplpart_2code]&&$rs[id]==$rs3[id]){
			continue;
		}
		$_format=$format;
		$_format[SYS]='pwbbs';	//α��,�Ա��ȡURL��ַ
		$_listdb[$rs[tid]]=label_set_rs($_format,$rs);
	}
	
	return array($_listdb,$rs3);
}

//ר���л�ȡDZ��̳����
function get_sp_dzbbs($format,$rsdb,$Rows2,$rs2){
	global $db,$pre,$TB_pre;
	
	if($format[order]=='list'){
		$order='A.tid';
	}elseif($format[order]=='hits'){
		if(ereg("^dzbbs",$webdb[passport_type])){
			$order='A.views';
		}else{
			$order='A.hits';
		}
	}elseif($format[order]=='comments'){
		$order='A.replies';
	}else{
		$order='A.tid';
	}
	$SQL="ORDER BY $order DESC ";
		
	//�Ƿ���֤,û������
	if($format[yz]==1){			
	}

	//����ڸ���ģ�����Ĵ���
	if($format[tplpart_2code]&&!$rs2){
		$_SQL1=$_SQL2='';
		if(strstr($format[tplpart_2code],'$fname')){
			$_SQL1=" ,F.name AS fname ";
			$_SQL2=" LEFT JOIN {$TB_pre}forums F ON F.fid=T.fid ";
		}
		//��ͼƬ,Ĭ������Ļ�,ֻ��ȡ��һ��ID����.
		if(!strstr($format[tplpart_2code],'$picurl')&&$format[order]=='default'){
			$string2id=preg_replace("/([0-9]+)(.*)/is","\\1",$rsdb[tids]);
		}else{
			$string2id=$rsdb[tids];
		}
		if(strstr($format[tplpart_2code],'$content')&&strstr($format[tplpart_2code],'$picurl')){
			$getpic++;
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content,Att.attachment$_SQL1 FROM {$TB_pre}attachments Att LEFT JOIN {$TB_pre}threads A ON Att.tid=A.tid LEFT JOIN {$TB_pre}posts C ON A.tid=C.tid$_SQL2 WHERE C.first=1 AND A.tid IN ($string2id) AND Att.isimage='1' GROUP BY Att.tid $SQL  ";
		}elseif(strstr($format[tplpart_2code],'$content')){
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content$_SQL1 FROM {$TB_pre}threads A LEFT JOIN {$TB_pre}posts C ON A.tid=C.tid$_SQL2 WHERE C.first=1 AND A.tid IN ($string2id) $SQL LIMIT 1 ";
		}elseif(strstr($format[tplpart_2code],'$picurl')){
			$getpic++;
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,Att.attachment$_SQL1 FROM {$TB_pre}attachments Att LEFT JOIN {$TB_pre}threads A ON Att.tid=A.tid$_SQL2 WHERE A.tid IN ($string2id) AND Att.isimage='1' GROUP BY Att.tid $SQL  ";
		}else{
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime$_SQL1 FROM {$TB_pre}threads A $_SQL2 WHERE A.tid IN ($string2id) $SQL LIMIT 1 ";
		}
		//ר���ڿɿ�����Ļ�.Ҫȫ��������,��������.
		if($getpic&&$format[order]=='default'){
			$query = $db->query($SQL2);
			while($rss = $db->fetch_array($query)){
				$Ls[$rss[tid]]=$rss;
			}
			$aidsdb=explode(",",$rsdb[tids]);
			foreach($aidsdb AS $key=>$value){
				if($Ls[$value]){
					$rs3=$Ls[$value];
					break;
				}
			}
		}else{
			$rs3=$db->get_one($SQL2);
		}
		if($rs3){
			$_format=$format;
			$_format[SYS]='dzbbs';	//α��,�Ա��ȡURL��ַ
			$rs3=label_set_rs($_format,$rs3);
		}
	}

	//��ģ�����Ҫ��ȡ��Ŀ���ƵĻ�.Ҫ����һ����
	$_SQL1=$_SQL2='';
	if(strstr($format[tplpart_1code],'$fname')){
		$_SQL1=" ,F.name AS fname ";
		$_SQL2=" LEFT JOIN {$TB_pre}forums F ON F.fid=T.fid ";
	}
	if(strstr($format[tplpart_1code],'$picurl')&&strstr($format[tplpart_1code],'$content')){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content,At.attachment$_SQL1 FROM {$TB_pre}attachments At LEFT JOIN {$TB_pre}threads A ON At.tid=A.tid LEFT JOIN {$TB_pre}posts C ON A.tid=C.tid$_SQL2 WHERE C.first=1 AND A.tid IN ($rsdb[tids]) AND At.isimage='1' GROUP BY A.tid $SQL LIMIT $Rows2 ";
	}elseif(strstr($format[tplpart_1code],'$content')){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content$_SQL1 FROM {$TB_pre}threads A LEFT JOIN {$TB_pre}posts C ON A.tid=C.tid$_SQL2 WHERE C.first=1 AND A.tid IN ($rsdb[tids]) $SQL LIMIT $Rows2 $rows ";
	}elseif($format[stype]=='r'||strstr($format[tplpart_1code],'$picurl')){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,At.attachment$_SQL1 FROM {$TB_pre}attachments At LEFT JOIN {$TB_pre}threads A ON At.tid=A.tid$_SQL2 WHERE A.tid IN ($rsdb[tids]) AND At.isimage='1' GROUP BY A.tid $SQL LIMIT $Rows2 ";
	}else{
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime$_SQL1 FROM {$TB_pre}threads A$_SQL2 WHERE A.tid IN ($rsdb[tids]) $SQL LIMIT $Rows2 ";
	}
	$query = $db->query($SQL);
	while($rs = $db->fetch_array($query)){
		//��Ը���ģ�������ͬ��¼
		if($format[tplpart_2code]&&$rs[id]==$rs3[id]){
			continue;
		}
		$_format=$format;
		$_format[SYS]='dzbbs';	//α��,�Ա��ȡURL��ַ
		$_listdb[$rs[tid]]=label_set_rs($_format,$rs);
	}
	
	return array($_listdb,$rs3);
}

//��ȡ��ǩ�е���Ƶ
function get_label_mv($string){
	global $jobs;
	preg_match_all("/\(mv,([\d]+),([\d]+),(false|true)\)([^\(]+)\(\/mv\)/is",$string,$array);
	foreach($array[4] AS $key=>$value){
		$value=str_replace("\r","",$value);
		$detail=explode("\n",$value);
		foreach( $detail AS $key2=>$value2){
			list($url,$name,$fen,$type)=explode("@@@",$value2);
			if(!$url||$fen){
				continue;
			}
			$url=tempdir($url);
			$string=preg_replace("/\(mv,([\d]+),([\d]+),(false|true)\)([^\(]+)\(\/mv\)/is","",$string);
			$playcode=player($url,$array[1][$key],$array[2][$key],$array[3][$key],$type);
			if($jobs=='show'){
				//��Ƶ�ᵵס��ǩ,����Ҫ�ر���
				return "<div class='player' style='padding-top:20px;'>$playcode</div>$string";
			}
			return "<div class='player'>$playcode</div>$string";
		}
	}
}

//ִ�б�ǩ��ߵ�PHP�߼�
function run_label_php($listdb){
	if($listdb[0][urlDB]){//�����Ϊ�˵õ�URL��ַ,��Ϊ��ͬ��Ŀ���Զ��岻ͬ��URL		
		foreach($listdb AS $_array){
			@extract($_array);
			$id || $id=$aid;
			eval("\$show_urldb[{$id}]=\"{$_array[urlDB][show_url]}\";");
			eval("\$list_urldb[{$id}]=\"{$_array[urlDB][list_url]}\";");
		}
	}
	eval(str_replace(array('<?php','<?','?>','print','<<<EOT','EOT;'),
		array('EOT;','EOT;','print <<<EOT','$showcode.=',"<<<EOT\r\n","\r\nEOT;\r\n"),'print <<<EOT'.$listdb[0][tpl_1code].'EOT;'));
	return $showcode;
}

?>