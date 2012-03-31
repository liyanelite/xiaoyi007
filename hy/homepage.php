<?php
require(dirname(__FILE__)."/global.php");
require(dirname(__FILE__)."/bd_pics.php");

require(Mpath."inc/homepage/global.php");



if($uid=intval($uid)){
	$rsdb=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid'");
}else{

	$host=preg_replace("/http:\/\/([^\.]+)\.(.*)/is","\\1",$WEBURL);
	$rsdb=$db->get_one("SELECT * FROM {$_pre}company WHERE host='$host'");
	if($rsdb[uid]){
		$uid=$rsdb[uid];
	}elseif(!$lfjuid){
		showerr("��Ǹ,û���ҵ���Ҫ���ʵ�ҳ�棡");
	}else{
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?uid=$lfjuid'>";
		exit;
	}
}

if(!$rsdb[if_homepage]){

	if($uid==$lfjuid){
		showerr("����û�������̼���ҳ��<a href='$webdb[www_url]/member/index.php?main=$Murl/member/post_company.php'><b>�������</b></a>����");
	}else{
		showerr("�̼һ�û��������ҳ");
	}
}


//���������ļ�
$conf=$db->get_one("SELECT * FROM {$_pre}home WHERE uid='$uid'");
if(!$conf[uid]) {
	caretehomepage($rsdb);		//�����̼���Ϣ
}


//��˾����,��bannerʱ������
if(!$conf[banner]){
	$rsdb[company_name_big]=$rsdb[title];
}else{
	$conf[banner]=" style='background:url(".tempdir($conf[banner]).");'";
}

//���
$homepage_style="default";
if($conf[style] && is_dir($tpl_dir.$conf[style])) $homepage_style=$conf[style];

//ģ��
$conf[bodytpl]=$conf[bodytpl]?$conf[bodytpl]:"left";

//���ݴ���
$rsdb[logo]=tempdir($rsdb[picurl]);
$rsdb[renzheng]=getrenzheng($rsdb[renzheng]);
$conf[listnum]=unserialize($conf[listnum]);

$conf[index_left]=explode(",",$conf[index_left]);
$conf[index_right]=explode(",",$conf[index_right]);

//ͷ������ 
$head_menu=unserialize($conf[head_menu]);
foreach($head_menu as $key=>$arr){
	if(!$arr[ifshow]){continue;}
	if(!preg_match("/http/i",$arr[url])){
		$arr[url]=str_replace("homepage.php","",$arr[url]).'&uid='.$uid;
	}else{
	$arr[target]='_blank';
	}
	$h_menu[$key]=$arr;
}

//SEO
$titleDB[title]			= filtrate(strip_tags("$rsdb[title]"));
$titleDB[keywords]		= filtrate(strip_tags("$webdb[Info_metakeywords]"));
$titleDB[description]	= strip_tags( $webdb[Info_metadescription]);


//�ÿ�
if($lfjuid)
{
	if($lfjuid!=$conf[uid]){
		$conf[visitor]="{$lfjuid}\t{$lfjid}\t{$timestamp}\r\n$conf[visitor]";
	}
}
else
{
	$conf[visitor]="0\t{$onlineip}\t{$timestamp}\r\n$conf[visitor]";
}
$detail=explode("\r\n",$conf[visitor]);
foreach( $detail AS $key=>$value)
{
	if($key>0&&(strstr($value,"{$lfjuid}\t{$lfjid}\t")||strstr($value,"0\t$onlineip")))
	{
		unset($detail[$key]);
	}
	if($key>20||!$value)
	{
		unset($detail[$key]);
	}
}
$conf[visitor]=implode("\r\n",$detail);

$db->query("UPDATE {$_pre}home SET hits=hits+1,visitor='$conf[visitor]' WHERE uid='$uid' ");
$db->query("UPDATE {$_pre}company  set hits=hits+1 WHERE uid='$uid'");


//���

require(get_homepage_tpl("head"));
require(get_homepage_tpl("main"));
require(get_homepage_tpl("foot"));
$content=ob_get_contents();
$content=str_replace("<!---->","",$content);
$content=str_replace('<!--include','',$content);
$content=str_replace('include-->','',$content);
ob_end_clean();
echo $content;


function get_homepage_tpl($file){
	global $STYLE,$homepage_style;
	if(is_file(Mpath."images/homepage_style/{$homepage_style}/{$file}.htm")){
		return Mpath."images/homepage_style/{$homepage_style}/{$file}.htm";
	}elseif(is_file(Mpath."homepage_tpl/{$STYLE}/{$file}.htm")){
		return Mpath."homepage_tpl/{$STYLE}/{$file}.htm";
	}else{
		return Mpath."homepage_tpl/default/{$file}.htm";
	}
}

function get_homepage_module($modulename){
	extract($GLOBALS);
	if(is_file(Mpath."images/homepage_style/$homepage_style/{$modulename}.php")){
		include(Mpath."images/homepage_style/$homepage_style/{$modulename}.php");
	}elseif(is_file(Mpath."homepage_tpl/$STYLE/{$modulename}.php")){
		include(Mpath."homepage_tpl/$STYLE/{$modulename}.php");
	}elseif(is_file(Mpath."homepage_tpl/default/{$modulename}.php")){
		include(Mpath."homepage_tpl/default/{$modulename}.php");
	}
}
?>