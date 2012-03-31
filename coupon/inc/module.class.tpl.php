<?php
defined('ROOT_PATH') or die();

class template_module{

var $sys;

function template_module(&$system){
	$this->sys = $system;
}

//��ȡĸģ��
function read_tpl($filea,$fileb,$type='index'){
	if($type=='index'){
		if($fileb){
			$file="{$this->sys->f_path}template/{$this->sys->style}/$fileb";
			$code=read_file($file);
			if(!$code){
				$file="{$this->sys->f_path}template/default/$fileb";
				$code=read_file($file);
			}
		}
		if(!$code){
			$file="{$this->sys->f_path}template/{$this->sys->style}/$filea";
			$code=read_file($file);
		}
		if(!$code){
			$file="{$this->sys->f_path}template/default/$filea";
			$code=read_file($file);
		}
		
		//������ȥĬ�Ϸ���ĸģ��,��Ϊ��һ����ƥ���
		/*
		if($fileb&&is_file($file="{$this->sys->f_path}template/{$this->sys->style}/$fileb")){
			$code=read_file($file);
		}elseif($fileb&&is_file($file="{$this->sys->f_path}template/default/$fileb")){
			$code=read_file($file);
		}elseif(is_file($file="{$this->sys->f_path}template/{$this->sys->style}/$filea")){
			$code=read_file($file);
		}else{
			$file="{$this->sys->f_path}template/default/$filea";
			$code=read_file($file);
		}
		*/


		//�����ǰ�ɰ��
		if(ereg("^bencandy_",$filea)&&strstr($code,'$TempLate')){
			$code=str_replace('$TempLate','<!--{template}--><span>{title}:</span>{value}<br><!--{/template}-->',$code);
			$write++;
		}elseif(ereg("^post_",$filea)&&strstr($code,'$TempLate')){
			$code=str_replace('$TempLate',"<!--{template}--><tr> <td align='right'>{title}</td> <td >{value}</td></tr><!--{/template}-->",$code);
			$write++;
		}elseif(ereg("^list_",$filea)&&strstr($code,'$Temp_list_rs')){
			$code=str_replace('$Temp_list_rs',"<!--{template}--><span class='field $field'>{value}</span><!--{/template}-->",$code);
			$code=str_replace('$Temp_list_top',"<!--{template}--><span class='field'>{title}</span><!--{/template}-->",$code);
			$code=str_replace('$TempSearch_1',"<!--{filter}--><div><span class='t'>{title}��</span><span class='f'>{value}</span></div><!--{/filter}-->",$code);
			$code=str_replace('$TempLate1',"<!--{choose}-->&nbsp;{value}{title} <!--{/choose}-->",$code);
			$code=str_replace('$TempLate2',"<!--{select}--><tr><td>{title}</td><td>{value}</td></tr><!--{/select}-->",$code);
			$write++;
		}elseif(ereg("^search_",$filea)&&strstr($code,'$TempLate1')){
			$code=str_replace('$TempLate1',"<!--{choose}-->&nbsp;{value}{title} <!--{/choose}-->",$code);
			$code=str_replace('$TempLate2',"<!--{select}--><tr><td>{title}</td><td>{value}</td></tr><!--{/select}-->",$code);
			$write++;
		}
		if($write){
			write_file($file,$code);
			if(!is_writable($file)){
				echo("�ļ�����д,���޸�������Ϊ��д:$file");
			}
		}
	}elseif($type=='admin'){
		if($fileb&&is_file($file="{$this->sys->f_path}template/admin/$fileb")){
			$code=read_file($file);
		}else{
			$file="{$this->sys->f_path}template/admin/$filea";
			$code=read_file($file);
		}
	}elseif($type=='member'){
		if($fileb&&is_file($file="{$this->sys->f_path}template/member/$fileb")){
			$code=read_file($file);
		}else{
			$file="{$this->sys->f_path}template/member/$filea";
			$code=read_file($file);
		}
	}
	return $code;
}

//д����ģ��
function write_tpl($file,$code,$type='index'){
	if($type=='index'){
		$path=$this->sys->tpl_index_new."{$file}.htm";
	}elseif($type=='admin'){
		$path=$this->sys->tpl_admin_new."{$file}.htm";
	}elseif($type=='member'){
		$path=$this->sys->tpl_member_new."{$file}.htm";
	}
	$code=preg_replace("/{template}(.*?){\/template}/is","",$code);
	$code=preg_replace("/{choose}(.*?){\/choose}/is","",$code);
	$code=preg_replace("/{select}(.*?){\/select}/is","",$code);
	$code=preg_replace("/{filter}(.*?){\/filter}/is","",$code);
	$code && write_file($path,$code);
}

//����ҳģ��
function post_tpl($rs,&$tplcode){

	//���ģ���д����������INPUTԪ��,�Ͳ���Ҫ��д��ȥ,������ظ�
	if($tplcode&&strstr($tplcode,"\$rsdb[{$rs[field_name]}]")){
		return ;
	}

	//�Ƿ�Ϊ����ѡ��
	if($rs[mustfill]=='1'){
		$mustfill='<font color=red>*</font>';
		$ifmust=" ifmust=1 ";
	}

	if($rs[form_type]=='text')
	{
		//�����
		if($rs[js_check]){
			$rs[js_checkmsg] || $rs[js_checkmsg]='��������ݲ����Ϲ���!';
			$jsck='onBlur="if(this.value!=\'\'&&'.$rs[js_check].'.test(this.value)==false){alert(\''.$rs[js_checkmsg].'\');this.focus();}"';
		}

		$rs[field_inputwidth]>20 || $rs[field_inputwidth]=100;
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show=" <input $ifmust $jsck type='text' name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' style='width:{$rs[field_inputwidth]}px;' value='\$rsdb[{$rs[field_name]}]'> $rs[form_units]$rs[form_js]";
	}
	//�����ֶ�
	elseif($rs[form_type]=='classdb')
	{
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="<SCRIPT LANGUAGE='JavaScript'>
					var dbvalue=new Array(\$rsdb[{$rs[field_name]}]);
					document.write('<iframe id=dbiframe_{$rs[classid]} name=dbiframe_{$rs[classid]} width=0 height=0 src=about:blank></iframe>');
					for(var i=0;i<10 ;i++ ){
						value = i<dbvalue.length ? dbvalue[i] : '';
						document.write('<span id=dbspan_{$rs[classid]}_'+i+'>'+value+'</span>');
					}
					function chooseclass_{$rs[classid]}(fup,num){
						window.open('job.php?job=classid&ifmust=$rs[mustfill]&formname={$rs[field_name]}&classid={$rs[classid]}&fup='+fup+'&ID=dbspan_{$rs[classid]}_'+num+'&'+Math.random(),'dbiframe_{$rs[classid]}');
					
					}
					if(dbvalue.length<1){
						chooseclass_{$rs[classid]}($rs[classid],0);
					}
					</SCRIPT>$rs[form_js]";
	}
	//����ѡ���
	elseif($rs[form_type]=='time')
	{
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="<input  onclick=\"setday(this,1)\" type='text' name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' size='20' value='\$rsdb[{$rs[field_name]}]'>  $rs[form_units]$rs[form_js]";
	}
	//��ͼƬ�ϴ�
	elseif( $rs[form_type]=='onepic' )
	{
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="<input type='text' name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' size='50' value='\$rsdb[{$rs[field_name]}]'> $rs[form_units]<br><iframe frameborder=0 height=23 scrolling=no src='\$webdb[www_url]/do/upfile.php?fn=upfile&dir=\$_pre/\$fid&label=atc_{$rs[field_name]}' width=310></iframe>";
	}
	//���ļ��ϴ�
	elseif($rs[form_type]=='upfile')
	{	
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="<input type='text' name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' size='50' value='\$rsdb[{$rs[field_name]}]'> $rs[form_units]<br><iframe frameborder=0 height=23 scrolling=no src='\$webdb[www_url]/do/upfile.php?fn=upfile&dir=\$_pre/\$fid&label=atc_{$rs[field_name]}' width=310></iframe>$rs[form_js]";
	}
	//�����ı���
	elseif($rs[form_type]=='textarea')
	{
		$rs[field_inputwidth]>50 || $rs[field_inputwidth]=400;
		$rs[field_inputheight]>20 || $rs[field_inputheight]=100;
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="<textarea $ifmust name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' style='width:{$rs[field_inputwidth]}px;height:{$rs[field_inputheight]}px;'>\$rsdb[{$rs[field_name]}]</textarea> $rs[form_js]";
	}
	//���ӻ��༭��
	elseif($rs[form_type]=='ieeditsimp')
	{
		$rs[field_inputwidth]>400 || $rs[field_inputwidth]=600;
		$rs[field_inputheight]>50 || $rs[field_inputheight]=100;
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="	<script type='text/javascript' charset='utf-8' src='\$webdb[www_url]/ewebeditor/3.1.1/kindeditor.js'></script>
<script type='text/javascript'>
    KE.show({
        id : 'atc_{$rs[field_name]}',
        cssPath : '\$webdb[www_url]/ewebeditor/common.css',items : ['source', 'undo', 'redo', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline','removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist','link', 'unlink']
    });
</script><textarea name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' style='width:{$rs[field_inputwidth]}px;height:{$rs[field_inputheight]}px;visibility:hidden;'>\$rsdb[{$rs[field_name]}]</textarea>$rs[form_js]";
	}
	elseif($rs[form_type]=='ieedit')
	{
		$rs[field_inputwidth]>400 || $rs[field_inputwidth]=600;
		$rs[field_inputheight]>50 || $rs[field_inputheight]=100;
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="	<textarea name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}' style='width:{$rs[field_inputwidth]}px;height:{$rs[field_inputheight]}px;visibility:hidden;'>\$rsdb[{$rs[field_name]}]</textarea>$rs[form_js] 
<script type='text/javascript'>
CKEDITOR.replace( 'atc_{$rs[field_name]}',
{
width:'100%',
height:'{$rs[field_inputheight]}px',
filebrowserBrowseUrl : '\$webdb[www_url]/ewebeditor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '\$webdb[www_url]/ewebeditor/ckfinder/ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '\$webdb[www_url]/ewebeditor/ckfinder/ckfinder.html?Type=Flash',
filebrowserUploadUrl : '\$webdb[www_url]/ewebeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '\$webdb[www_url]/ewebeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '\$webdb[www_url]/ewebeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>";
	}
	//������
	elseif($rs[form_type]=='select')
	{
		$detail=explode("\r\n",$rs[form_set]);
		foreach( $detail AS $key=>$value){
			if($value===''){
				continue;
			}
			list($v1,$v2)=explode("|",$value);
			$v2 || $v2=$v1;
			$_show.="<option value='$v1' {\$rsdb[{$rs[field_name]}]['{$v1}']}>$v2</option>";
		}
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="<select name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}'>$_show</select>$rs[form_units]$rs[form_js]";
	}
	elseif($rs[form_type]=='radio')
	{
		$detail=explode("\r\n",$rs[form_set]);
		foreach( $detail AS $key=>$value){
			if($value===''){
				continue;
			}
			list($v1,$v2)=explode("|",$value);
			$v2 || $v2=$v1;
			$_show.=" <input type='radio' style='border:0;' name='postdb[{$rs[field_name]}]' value='$v1' {\$rsdb[{$rs[field_name]}]['{$v1}']}>$v2 ";
		}
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="$_show $rs[form_js]";
	}
	elseif($rs[form_type]=='checkbox')
	{
		$detail=explode("\r\n",$rs[form_set]);
		foreach( $detail AS $key=>$value){
			if($value===''){
				continue;
			}
			list($v1,$v2)=explode("|",$value);
			$v2 || $v2=$v1;
			$_show.=" <input style='border:0;' type='checkbox' name='postdb[{$rs[field_name]}][]' value='$v1' {\$rsdb[{$rs[field_name]}]['{$v1}']}>$v2 ";
		}
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="$_show $rs[form_js]";
	}
	elseif($rs[form_type]=='upmorefile'||$rs[form_type]=='upmorepic')
	{
		$filter=$rs[form_type]=='upmorepic'?"filter: {jpg: 0, gif: 0,png: 0},":"";
		$show0="{$rs[title]}:$mustfill<br>{$rs[form_title]}";
		$show="	<script type=\"text/javascript\" src=\"\$webdb[www_url]/images/default/jquery-1.2.6.min.js\"></script>
        <script type=\"text/javascript\" src=\"\$webdb[www_url]/images/default/swfobject.js\"></script>
        <div id=\"sapload\"></div>
        <script type=\"text/javascript\">
	var so = new SWFObject(\"\$webdb[www_url]/images/default/uploadmore.swf\", \"sapload\", \"450\", \"30\", \"9\", \"#ffffff\");
	so.addParam('wmode','transparent');
	so.addVariable('config','\$webdb[www_url]/do/swfuploadxml.php?filetype=jpg,png,gif');
	so.write(\"sapload\");
	var titledb = new Array();
	var urldb = new Array();
	
	function showFiles(t){
		totalnum=totalnum_{$rs[field_name]};
		showinput_{$rs[field_name]}();
		arr=t.split('|');
		urldb[totalnum]=arr[0];
		arr2=arr[1].split('.');
		titledb[totalnum]=arr2[0];
		for(var i=0;i<=totalnum;i++){
			if(document.getElementById(\"atc_{$rs[field_name]}_url\"+i)!=null){
				if(urldb[i]!=undefined){
					document.getElementById(\"atc_{$rs[field_name]}_url\"+i).value=urldb[i];
					document.getElementById(\"atc_{$rs[field_name]}_name\"+i).value=titledb[i];
				}
			}
		}
	}
	</script>
<!--\r\nEOT;\r\n\$num=count(\$rsdb[{$rs[field_name]}][url]);
\$job=='postnew' && \$num=0;\r\nfor( \$i=0; \$i<\$num ;\$i++ ){print <<<EOT\r\n-->
 <span id=span\$i>����: <input type=\"text\" name=\"postdb[{$rs[field_name]}][name][]\" id=\"atc_{$rs[field_name]}_name\$i\" size=\"15\" value=\"{\$rsdb[{$rs[field_name]}][name][\$i]}\"> 	
 ��ַ: 	
                    <input type=\"text\" name=\"postdb[{$rs[field_name]}][url][]\" id=\"atc_{$rs[field_name]}_url\$i\" size=\"30\" value=\"{\$rsdb[{$rs[field_name]}][url][\$i]}\">	
                    [<a href='javascript:' onClick='window.open(\"\$webdb[www_url]/do/upfile.php?fn=upfile_{$rs[field_name]}&dir=\$_pre\$fid&label=\$i\",\"\",\"width=350,height=50,top=200,left=400\")'><font color=\"#FF0000\">�������ͼƬ</font></a>] 	[<A HREF=\"javascript:delpic('\$i')\">�Ƴ�</A>]
                    <br></span><!--\r\nEOT;\r\n}print <<<EOT\r\n-->
<div id=\"input_{$rs[field_name]}\"></div>	
<script LANGUAGE=\"JavaScript\">
function kill_Err(){
	return true;
}
window.onerror=kill_Err;
totalnum_{$rs[field_name]}=\$num;
function delpic(t){
	document.getElementById('atc_{$rs[field_name]}_url'+t).value='';
	document.getElementById('span'+t).style.display='none';
}
function showinput_{$rs[field_name]}(){	
	var str=document.getElementById(\"input_{$rs[field_name]}\").innerHTML;	

	if(parent.document.getElementById('member_mainiframe')!=null){
	parent.document.getElementById('member_mainiframe').height=parseInt(parent.document.getElementById('member_mainiframe').height)+18;
	}
	    str+='<span id=span'+totalnum_{$rs[field_name]}+'>����: &nbsp;<input type=\"text\" name=\"postdb[{$rs[field_name]}][name][]\" id=\"atc_{$rs[field_name]}_name'+totalnum_{$rs[field_name]}+'\" size=\"15\">  ��ַ: &nbsp;<input type=\"text\" name=\"postdb[{$rs[field_name]}][url][]\" id=\"atc_{$rs[field_name]}_url'+totalnum_{$rs[field_name]}+'\" size=\"30\" > [<a href=\'javascript:\' onClick=\'window.open(\"\$webdb[www_url]/do/upfile.php?fn=upfile_{$rs[field_name]}&dir=\$_pre\$fid&label='+totalnum_{$rs[field_name]}+'\",\"\",\"width=350,height=50,top=200,left=400\")\'><font color=\"#FF0000\">�ϴ�����ͼƬ</font></a>] [<a href=\"javascript:delpic(\''+totalnum_{$rs[field_name]}+'\')\">�Ƴ�</a>]<br></span>';	
	totalnum_{$rs[field_name]}++;
	document.getElementById(\"input_{$rs[field_name]}\").innerHTML=str;	
}	
	
function upfile_{$rs[field_name]}(url,name,size,label){	
	document.getElementById(\"atc_{$rs[field_name]}_url\"+label).value=url;	
	arr=name.split('.');	
	document.getElementById(\"atc_{$rs[field_name]}_name\"+label).value=arr[0];	
}	
</SCRIPT><input type='button' onclick='showinput_{$rs[field_name]}()' name='button' value='����һ��'> $rs[form_js]</td></tr>";	

	}
	
	if(strstr($tplcode,"{\$V[{$rs[field_name]}]}"))
	{
		//�����Զ���ģ��Ԫ�ز���λ��.
		$tplcode=str_replace(array("{\$T[{$rs[field_name]}]}","{\$V[{$rs[field_name]}]}"),array($show0,$show),$tplcode);
		return ;
	}

	preg_match_all("/<!--{template}-->(.*?)<!--{\/template}-->/is",$tplcode,$array);
	foreach($array[1] AS $k=>$v){
		$v=str_replace(array('{title}','{value}'),array($show0,$show),$v);
		//��Щ�ֶβ�����ĳЩ��Ա�鷢��.
		if($rs[allowpost]){
			$v="<!--\r\nEOT;\r\nif( in_array(\$groupdb[gid],explode(',','$rs[allowpost]')) ){print <<<EOT\r\n-->$v<!--\r\nEOT;\r\n}print <<<EOT\r\n-->";
		}
		$array[1][$k]=$v.$array[0][$k];
	}
	$tplcode=str_replace($array[0],$array[1],$tplcode);

}

//�б�ҳ��ʾ�ֶ�
function list_tpl($rs,&$tplcode){
	if(strstr($tplcode,"{\$V[{$rs[field_name]}]}"))
	{
		//�����Զ���ģ��Ԫ�ز���λ��.
		$tplcode=str_replace(array("{\$T[{$rs[field_name]}]}","{\$V[{$rs[field_name]}]}"),array("{$rs[title]}","{\$rs[{$rs[field_name]}]} {$rs[form_units]}"),$tplcode);
		return ;
	}
	$show0 = "$rs[title]";
	$show = "{\$rs[{$rs[field_name]}]} {$rs[form_units]}";

	preg_match_all("/<!--{template}-->(.*?)<!--{\/template}-->/is",$tplcode,$array);
	foreach($array[1] AS $k=>$v){
		$v=str_replace(array('{title}','{value}'),array($show0,$show),$v);
		$array[1][$k]=$v.$array[0][$k];
	}
	$tplcode=str_replace($array[0],$array[1],$tplcode);
}

//����ҳģ��
function search_tpl($rs,&$tplcode){

	if($rs[form_type]=="select"||$rs[form_type]=="radio")
	{
		$detail=explode("\r\n",$rs[form_set]);
		foreach( $detail AS $key=>$value){
			if(!$value){
				continue;
			}
			list($v1,$v2)=explode("|",$value);
			$v2 || $v2=$v1;
			$_show.="<option value='$v1' {\$rsdb[{$rs[field_name]}]['{$v1}']}>$v2</option>";
		}
		$show="<select name='postdb[{$rs[field_name]}]' id='atc_{$rs[field_name]}'><option value=''>����</option>$_show</select> {$rs[form_units]} ";	
	}
	elseif($rs[form_type]=="checkbox")
	{
		$detail=explode("\r\n",$rs[form_set]);
		foreach( $detail AS $key=>$value){
			if(!$value){
				continue;
			}
			list($v1,$v2)=explode("|",$value);
			$v2 || $v2=$v1;
			$show.=" <input style='border:0;' type='checkbox' name='postdb[{$rs[field_name]}][]' value='$v1' {\$rsdb[{$rs[field_name]}]['{$v1}']}>$v2 ";
		}
	}
	elseif($rs[form_type]=="classdb")
	{
		$show="<SCRIPT LANGUAGE='JavaScript'>
				var dbvalue=new Array(\$rsdb[{$rs[field_name]}]);
				document.write('<iframe id=dbiframe_{$rs[classid]} name=dbiframe_{$rs[classid]} width=0 height=0 src=about:blank></iframe>');
				for(var i=0;i<10 ;i++ ){
					value = i<dbvalue.length ? dbvalue[i] : '';
					document.write('<span id=dbspan_{$rs[classid]}_'+i+'>'+value+'</span>');
				}
				function chooseclass_{$rs[classid]}(fup,num){
					window.open('job.php?job=classid&formname={$rs[field_name]}&classid={$rs[classid]}&fup='+fup+'&ID=dbspan_{$rs[classid]}_'+num+'&'+Math.random(),'dbiframe_{$rs[classid]}');
				
				}
				if(dbvalue.length<1){
					chooseclass_{$rs[classid]}($rs[classid],0);
				}
				</SCRIPT> $rs[form_units]";
	}
	elseif($rs[search]==2)
	{
		$show="<input type='text' name='postdb[{$rs[field_name]}][0]' size='5' value='{\$postdb[{$rs[field_name]}][0]}'>{$rs[form_units]} �� <input type='text' name='postdb[{$rs[field_name]}][1]' size='5' value='{\$postdb[{$rs[field_name]}][1]}'>{$rs[form_units]}";
	}

	if(!$show){
		$choose=1;
		$show="<input style='border:0;' type='radio' name='type' value='{$rs[field_name]}' \$typedb[{$rs[field_name]}]>";
	}

	if(strstr($tplcode,"{\$V[{$rs[field_name]}]}")){//�����Զ���ģ��Ԫ�ز���λ��
		$tplcode=str_replace(array("{\$T[{$rs[field_name]}]}","{\$V[{$rs[field_name]}]}"),
							 array($rs[title],$show),$tplcode);
		return ;
	}
	if($choose){	//ѡ��ť,�����,����֮��ؼ��ֵ�ѡ��
		preg_match_all("/<!--{choose}-->(.*?)<!--{\/choose}-->/is",$tplcode,$array);
	}else{
		preg_match_all("/<!--{select}-->(.*?)<!--{\/select}-->/is",$tplcode,$array);
	}
	foreach($array[1] AS $k=>$v){
		$v=str_replace(array('{title}','{value}'),array($rs[title],$show),$v);
		$array[1][$k]=$v.$array[0][$k];
	}
	$tplcode=str_replace($array[0],$array[1],$tplcode);
}


//�б�ҳɸѡ�ֶ�
function listfilter_tpl($rs,$field_db,&$tplcode)
{
	$field=$rs[field_name];
	unset($TempSearch_array);
	foreach($field_db AS $key2=>$value2){
		if(!$value2[listfilter]){
			continue;
		}
		if($field!=$key2){
			$TempSearch_array.="'$key2'=>\"\$$key2\",";
		}	
	}
	$show="<!--\r\nEOT;\r\n\$url=get_info_url('',\$fid,array($TempSearch_array),\$listfilter_file);\r\nprint <<<EOT\r\n--><A HREF='\$url' {\$search_fieldDB[{$rs[field_name]}][0]}>����</A> ";


	$detail=explode("\r\n",$rs[form_set]);
	foreach( $detail AS $key=>$value){
		if(!$value){
			continue;
		}
		list($v1,$v2)=explode("|",$value);
		$v2 || $v2=$v1;
		$show .="<!--\r\nEOT;\r\n\$url=get_info_url('',\$fid,array($TempSearch_array'$rs[field_name]'=>'$v1'),\$listfilter_file);\r\nprint <<<EOT\r\n--> <A HREF='\$url' {\$search_fieldDB[{$rs[field_name]}]['{$v1}']}>$v2</A>";
	}
	@preg_match_all("/<!--{filter}-->(.*?)<!--{\/filter}-->/is",$tplcode,$array);
	foreach((array)$array[1] AS $k=>$v){
		$v=str_replace(array('{title}','{value}'),array($rs[title],$show),$v);
		$array[1][$k]=$v.$array[0][$k];
	}
	$tplcode=str_replace($array[0],$array[1],$tplcode);
}

//����ҳģ��
function show_tpl($rs,&$tplcode){
	if($tplcode&&strstr($tplcode,"\$rsdb[{$rs[field_name]}]")){
		return ;
	}

	$show0=$rs[title];
	$show="{\$rsdb[{$rs[field_name]}]} ";
	if($rs[form_type]=='onepic'){
		$show="<A HREF='{\$rsdb[{$rs[field_name]}]}' target=_blank><img onerror='this.style.display=\"none\";' onload='this.width=500' border=0 src='{\$rsdb[{$rs[field_name]}]}'></A>";
	}elseif($rs[form_type]=='upfile'){
		$show="<A HREF='{\$rsdb[{$rs[field_name]}]}' target=_blank>�������</A>";
	}elseif($rs[form_type]=='upmorepic'){
		$show = $this->showPhotos($rs);
	}elseif($rs[form_type]=='upmorefile'){
		$show = $this->showdowns($rs);
	}

	if(strstr($tplcode,"{\$V[{$rs[field_name]}]}"))
	{
		//�����Զ���ģ��Ԫ�ز���λ��.
		$tplcode=str_replace(array("{\$T[{$rs[field_name]}]}","{\$V[{$rs[field_name]}]}"),array("{$show0}:",$show),$tplcode);
		return ;
	}

	preg_match_all("/<!--{template}-->(.*?)<!--{\/template}-->/is",$tplcode,$array);
	foreach($array[1] AS $k=>$v){
		$v=str_replace(array('{title}','{value}'),array($show0,$show),$v);
		$v="<!--\r\nEOT;\r\nif(\$rsdb['{$rs[field_name]}']){print <<<EOT\r\n-->$v<!--\r\nEOT;\r\n}print <<<EOT\r\n-->";
		$array[1][$k]=$v.$array[0][$k];
	}
	$tplcode=str_replace($array[0],$array[1],$tplcode);
}



//��ͼ����ʾ��ʽ
function showPhotos($rs){	
	return "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"5\">
			  <tr>
				<td align=\"center\"><a name='LOOK'></a><A HREF=\"#LOOK\" onclick=\"showMorePic_{$rs[field_name]}(1)\"><img border=\"0\" id=\"upfilePicUrl_{$rs[field_name]}\"></A></td>
			  </tr>
			  <tr>
				<td align=\"center\"><div id=\"pictitle_{$rs[field_name]}\"></div> <div>(<a href=\"#LOOK\" onclick=\"showMorePic_{$rs[field_name]}('head')\">����</a>) (<a href=\"#LOOK\" onclick=\"showMorePic_{$rs[field_name]}(-1)\">��һ��</a>) ��<span id=\"upfilePicNum_{$rs[field_name]}\">1/2</span>��(<a href=\"#LOOK\" onclick=\"showMorePic_{$rs[field_name]}(1)\">��һ��</a>) (<a href=\"#LOOK\" onclick=\"showMorePic_{$rs[field_name]}('end')\">β��</a>)</div></td>
			  </tr>
			</table><!--\r\nEOT;\r\n\$ImgLinks=@implode('\",\"',\$rsdb[{$rs[field_name]}][url]);\$ImgTitle=@implode('\",\"',\$rsdb[{$rs[field_name]}][title]);\r\nprint <<<EOT\r\n-->
		<SCRIPT LANGUAGE=\"JavaScript\">
		 
		var upfilePicNum_{$rs[field_name]}Id=0;
		function showMorePic_{$rs[field_name]}(todo){

			var ImgLinks= new Array(\"\$ImgLinks\");
			var ImgTitle= new Array(\"\$ImgTitle\");

			if(todo==1){
				upfilePicNum_{$rs[field_name]}Id++;
			}else if(todo==-1){
				upfilePicNum_{$rs[field_name]}Id--;
			}else if(todo=='head'){
				upfilePicNum_{$rs[field_name]}Id=0;
			}else if(todo=='end'){
				upfilePicNum_{$rs[field_name]}Id=ImgLinks.length-1;
			}
			if(upfilePicNum_{$rs[field_name]}Id<0){
				alert(\"�Ѿ��ǵ�һ����!\");
				upfilePicNum_{$rs[field_name]}Id=0;
			}
			if( upfilePicNum_{$rs[field_name]}Id>(ImgLinks.length-1) ){
				alert(\"�Ѿ������һ����!\");
				upfilePicNum_{$rs[field_name]}Id=ImgLinks.length-1;
			}

			document.getElementById(\"upfilePicNum_{$rs[field_name]}\").innerHTML=\"<font color=red>\"+(upfilePicNum_{$rs[field_name]}Id+1)+\"</font>/\"+ImgLinks.length;
			document.getElementById(\"upfilePicUrl_{$rs[field_name]}\").src=ImgLinks[upfilePicNum_{$rs[field_name]}Id];

			var srcImage = new Image();
			srcImage.src=ImgLinks[upfilePicNum_{$rs[field_name]}Id];
		
			srcImage.onload=function (){
				document.getElementById(\"upfilePicUrl_{$rs[field_name]}\").width=srcImage.width
				if(srcImage.width>500){document.getElementById(\"upfilePicUrl_{$rs[field_name]}\").width=500;}
			}

			document.getElementById(\"upfilePicUrl_{$rs[field_name]}\").alt=ImgTitle[upfilePicNum_{$rs[field_name]}Id];
			document.getElementById(\"pictitle_{$rs[field_name]}\").innerHTML=ImgTitle[upfilePicNum_{$rs[field_name]}Id]+\" (<A HREF='\"+ImgLinks[upfilePicNum_{$rs[field_name]}Id]+\"' target='blank'>ԭʼ�ߴ�</A>)\"
		}
		showMorePic_{$rs[field_name]}()
		 
		</SCRIPT>
		";
}

//�฽������ʾ��ʽ
function showdowns($rs){
	return "<!--{foreach \$rsdb[{$rs[field_name]}][url]  \$key \$value}--><!--{eval \$title=\$rsdb['{$rs[field_name]}'][title][\$key]?\$rsdb['{$rs[field_name]}'][title][\$key]:'�������';}--><A HREF='\$value' target=_blank>\$title</A><br><!--{/foreach}-->";
}


}

?>