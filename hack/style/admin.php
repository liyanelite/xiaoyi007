<?php
!function_exists('html') && exit('ERR');

if($job=="addstyle"&&$Apower[style_editstyle])
{
	$style_select=select_style('keywords');
	$CssCode="/******������Ĭ�ϵ�����,����԰���Ҫ�����޸�********/\r\n\r\n\r\n";
	$CssCode.=read_file(ROOT_PATH."images/default/style.css");


	hack_admin_tpl('style');
}
elseif($action=="addstyle"&&$Apower[style_editstyle])
{
	if(!$postdb[keywords]){
		showmsg("�ؼ��ֲ���Ϊ��");
	}elseif(!$postdb[name]){
		showmsg("������Ʋ���Ϊ��");
	}
	if( is_dir(ROOT_PATH."data/style/$postdb[keywords].php")||is_dir(ROOT_PATH."template/$postdb[keywords]/")||is_dir(ROOT_PATH."images/$postdb[keywords]/") )
	{
		showmsg("�ؼ����Ѿ�������,�뻻һ���ؼ��ְ�");
	}
	$show="<?php	unset(\$styledb);";
	foreach($postdb AS $key=>$value){
		$show.="
		\$styledb['$key']='$value';";
	}
	write_file(ROOT_PATH."data/style/$postdb[keywords].php",$show.'?>');
	makepath(ROOT_PATH."images/$postdb[keywords]");
	makepath(ROOT_PATH."template/$postdb[keywords]");
	write_file(ROOT_PATH."images/$postdb[keywords]/style.css",stripslashes("$CssCode\r\n"));
	copy(ROOT_PATH."template/default/head.htm",ROOT_PATH."template/$postdb[keywords]/head.htm");
	copy(ROOT_PATH."template/default/foot.htm",ROOT_PATH."template/$postdb[keywords]/foot.htm");
	copy(ROOT_PATH."template/default/index.htm",ROOT_PATH."template/$postdb[keywords]/index.htm");
	copy(ROOT_PATH."template/default/list.htm",ROOT_PATH."template/$postdb[keywords]/list.htm");
	copy(ROOT_PATH."template/default/bencandy.htm",ROOT_PATH."template/$postdb[keywords]/bencandy.htm");
	$dir=opendir(ROOT_PATH."images/default/");
	while($file=readdir($dir)){
		if(eregi("(png|jpg|gif)$",$file)){
			copy(ROOT_PATH."images/default/$file",ROOT_PATH."images/$postdb[keywords]/$file");
		}
	}
	jump("��ӳɹ�","index.php?lfj=style&job=editstyle&keywords=$postdb[keywords]");
}
elseif($job=="editstyle"&&$Apower[style_editstyle])
{
	$style_select=select_style('keywords',$keywords,"index.php?lfj=style&job=editstyle");
	@include(ROOT_PATH."data/style/$keywords.php");
	$rsdb=$styledb;
	$keywords_check=" readonly ";
	$CssCode=read_file(ROOT_PATH."images/$styledb[keywords]/style.css");

	hack_admin_tpl('style');
}
elseif($action=="editstyle"&&$Apower[style_editstyle])
{
	//�˴���Ŀ�����൱���滻������
	include(ROOT_PATH."data/style/$postdb[keywords].php");
	foreach($postdb AS $key=>$value){
		if($value!=$styledb[$key]){
			$chang_style.=chang_style($key,$value);
		}
		$styledb[$key]=$value;
	}

	$show="<?php	unset(\$styledb);";
	foreach($styledb AS $key=>$value){
		$show.="
		\$styledb['$key']='$value';";
	}

	write_file(ROOT_PATH."data/style/$postdb[keywords].php",$show."?>");
	write_file(ROOT_PATH."images/$postdb[keywords]/style.css",stripslashes("$CssCode"));
	jump("�޸ĳɹ�","index.php?lfj=style&job=editstyle&keywords=$postdb[keywords]");
}
elseif($action=="deletestyle"&&$Apower[style_editstyle])
{
	if($keywords=='default'){
		showmsg("Ĭ�ϵķ����ɾ��");
	}
	if( $keywords && unlink(ROOT_PATH."data/style/$keywords.php") ){
		del_file(ROOT_PATH."images/$keywords/");
		del_file(ROOT_PATH."template/$keywords/");
		jump("ɾ���ɹ�","index.php?lfj=style&job=deletestyle");
	}else{
		showmsg("ɾ��ʧ��,��ȷ���ļ����Կ�д".ROOT_PATH."data/style/$keywords.php");
	}
	
}
elseif($job=="deletestyle"&&$Apower[style_editstyle])
{
	$style_select=select_style('keywords');


	hack_admin_tpl('deletestyle');
}
elseif($job=='edittpl'&&($Apower[style_editstyle]||$Apower[template_list]))
{
	unset($array,$listdb);
	include("./tplname.php");
	$keywords || $keywords=$STYLE;
	$style_select=select_style('keywords',$keywords,"index.php?lfj=$lfj&job=$job");
	$dir=opendir(ROOT_PATH."template/$keywords/");
	while($file=readdir($dir)){
		if(eregi("htm$",$file)){
			 $array[$file]=array("name"=>$tplName[$file],"file"=>$file);
		}
	}
	foreach( $tplName AS $key=>$value){
		$array[$key] && $listdb[$key]=$array[$key];
	}
	$listdb=$listdb?($listdb+$array):$array;

	
	hack_admin_tpl('tpl');

}
elseif($job=='editcode'&&($Apower[style_editstyle]||$Apower[template_list]))
{
	if(eregi(".php$",$filename)){
		showmsg("ģ���ļ�����!");
	}
	$code=read_file(ROOT_PATH."template/$keywords/$filename");
	
	$code=editor_replace($code);



	hack_admin_tpl('editcode');
}
elseif($action=='editcode'&&($Apower[style_editstyle]||$Apower[template_list]))
{
	$code=stripslashes($code);
	if(eregi(".htm$",$filename)){
		write_file(ROOT_PATH."template/$keywords/$filename",$code);
	}
	jump("�޸ĳɹ�",$FROMURL,1);
}

function chang_style($key,$value){
	if($key=="bodybgcolor"){
		$show="\r\nbody{\r\n\tbackground:$value;\r\n}";
	}elseif($key=="bodyBgImg"){
		$show="\r\nbody{\r\n\tbackground:url($value) center 50%;\r\n}";
	}elseif($key=="wrapWidth"){
		$show="\r\n.wrap{\r\n\twidth:$value;\r\n}";
	}elseif($key=="fontColor"){
		$show="\r\nTD,a,a:visited,a:hover{\r\n\tcolor:$value;\r\n}";
	}elseif($key=="tableBorderColor"){
		$show="\r\n.dragTable{\r\n\tborder:1px $value solid;\r\n}";
	}elseif($key=="tableBgcolor"){
		$show="\r\n.dragTable{\r\n\tbackground:$value;\r\n}";
	}elseif($key=="tableHeadBgColor"){
		$show="\r\n.dragTable .head{\r\n\tbackground:$value;\r\n}";
	}elseif($key=="tableHeadFontColor"){
		$show="\r\n.dragTable .head,.dragTable .head a{\r\n\tcolor:$value;\r\n}";
	}elseif($key=="tableHeadBgImg"){
		$show="\r\n.dragTable .head{\r\n\tbackground:url($value);\r\n}";
	}
	return $show;
}
?>