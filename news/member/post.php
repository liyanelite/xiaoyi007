<?php
require_once(dirname(__FILE__)."/global.php");

if(!$fid){
	showerr("FID������");
}

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$city_id'");
$detail=explode(',',$rs[admin]);
if($lfjid && in_array($lfjid,$detail)){
	$web_admin=1;
}

if(!$lfjid){
	refreshto("$webdb[www_url]/do/login.php","����ǰ̨��û��¼,������ǰ̨��¼",30);
}

/**
*��ȡ��Ŀ��ģ��������ļ�
**/

$fidDB=$db->get_one("SELECT A.* FROM {$_pre}sort A WHERE A.fid='$fid'");

if( !$web_admin ){
	if($fidDB[allowpost]){
		if( !in_array($groupdb[gid],explode(",",$fidDB[allowpost])) ){
			showerr("�������û�����Ȩ����");
		}
	}elseif($webdb[allowGroupPost]){
		if( !in_array($groupdb[gid],explode(",",$webdb[allowGroupPost])) ){
			showerr("�������û�����Ȩ����!");
		}
	}
}



//SEO
$titleDB[title]		= "$fidDB[name] - $webdb[Info_webname] - $titleDB[title]";


if($fidDB[type]){
	showerr("�����,������������");
}




if($_FILES||$postdb[picurl]){
	foreach( $_FILES AS $key=>$value ){

		$i=(int)substr($key,10);
		if(is_array($value)){
			$postfile=$value['tmp_name'];
			$array[name]=$value['name'];
			$array[size]=$value['size'];
		} else{
			$postfile=$$key;
			$array[name]=${$key.'_name'};
			$array[size]=${$key.'_size'};
		}
		if($ftype[$i]=='in'&&$array[name]){

			if($i==1&&!eregi("(gif|jpg|png)$",$array[name])){
				showerr("����ͼ,ֻ���ϴ�GIF,JPG,PNG��ʽ���ļ�,�㲻���ϴ����ļ�:$array[name]");
			}
			$array[path]=$webdb[updir]."/$_pre/$fid";
	
			$array[updateTable]=1;	//ͳ���û��ϴ����ļ�ռ�ÿռ��С
			$filename=upfile($postfile,$array);
			if($i==1){
				$postdb[picurl]="$_pre/$fid/$filename";
				if($webdb[if_gdimg])
				{
					$Newpicpath=ROOT_PATH."$webdb[updir]/$postdb[picurl]";
					gdpic($Newpicpath,$Newpicpath,200,150);
				}
			}
		}
	}
	if($postdb[picurl]&&!eregi("(gif|jpg|png)$",$postdb[picurl])){
		showerr("����ͼ,ֻ���ϴ�GIF,JPG,PNG��ʽ���ļ�,�㲻���ϴ����ļ�:$array[name]");
	}
}


if($action=="edit"||$action=="postnew")
{
	if(strlen($postdb[title])>150){
		showerr("�����ֽڸ������ܴ���150");
	}
	if(strlen($postdb[keywords])>100){
		showerr("�ؼ����ֽڸ������ܴ���100");
	}
	if(strlen($postdb[author])>50){
		showerr("�����ֽڸ������ܴ���50");
	}
	if(strlen($postdb[copyfrom])>70){
		showerr("��Դ�ֽڸ������ܴ���70");
	}
	if(strlen($postdb[copyfromurl])>150){
		showerr("��Դ��ַ�ֽڸ������ܴ���150");
	}

	if(!$postdb[title]){	
		showerr("�������Ʋ���Ϊ��");
	}
}

/**�����ύ���·�������**/
if($action=="postnew")
{
	/*��֤�봦��*/
	if(!$web_admin){
		if(!check_imgnum($yzimg)){
			showerr("��֤�벻����");
		}
	}

	if($isiframe==1){
		$postdb[jumpurl]='';
	}elseif($isiframe==2){
		$postdb[iframeurl]='';
	}else{
		$postdb[iframeurl]=$postdb[jumpurl]='';
	}

	//�跨��������ͼ
	if( !$postdb[picurl] && $file_db=get_content_attachment($postdb[content]) ){
		if( $file_db[0] && eregi("(jpg|gif|png)$",$file_db[0]) && !eregi("sysimage\/file",$file_db[0]) ){
			$postdb[picurl]=$file_db[0];
			if($webdb[if_gdimg]){			
				$postdb[picurl]=str_replace(".","_",$file_db[0]).'.gif';
				$Newpicpath=ROOT_PATH."$webdb[updir]/$postdb[picurl]";
				gdpic(ROOT_PATH."$webdb[updir]/$file_db[0]",$Newpicpath,200,150);
				if(!file_exists($Newpicpath)){
					$postdb[picurl]=$file_db[0];
				}
			}
		}
	}

	if($postdb[picurl]){	
		$postdb[ispic]=1;
	}else{	
		$postdb[ispic]=0;
	}
	
	$postdb[yz]=1;
	if(!$web_admin){
		if( $webdb[Info_GroupPostYZ] && !in_array($groupdb['gid'],explode(",",$webdb[Info_GroupPostYZ])) ){		
			$postdb[yz]=0;
		}
	}

	
	//ͼƬĿ¼ת��
	$postdb[content]=move_attachment($lfjdb[uid],$postdb[content],"{$_pre}/$fid");
	//��ȡԶ��ͼƬ
	$postdb[content] = get_outpic($postdb[content],$fid,$GetOutPic);
	$postdb[content] = En_TruePath($postdb[content]);
	$postdb[content] = preg_replace('/javascript/i','java script',$postdb[content]);	//����js����
	$postdb[content] = preg_replace('/<iframe ([^<>]+)>/i','&lt;iframe \\1>',$postdb[content]);	//���˿�ܴ���

	
 	foreach($postdb AS $key=>$value){	
		if($key=='content'){		
			continue;
		}
		$postdb[$key]=filtrate($value);
	}
	
	$db->query("INSERT INTO `{$_pre}content` ( `title` , `mid` , `fid` , `fname` , `city_id` , `posttime` , `list` , `uid` , `username` ,  `picurl` , `ispic` , `yz` ,`keywords` , `jumpurl` , `iframeurl` , `ip` ,`author`, `copyfrom`, `copyfromurl`) VALUES ('$postdb[title]','1','$fid','$fidDB[name]','$city_id','$timestamp','$timestamp','$lfjdb[uid]','$lfjdb[username]','$postdb[picurl]','$postdb[ispic]','$postdb[yz]','$postdb[keywords]','$postdb[jumpurl]','$postdb[iframeurl]','$onlineip','$postdb[author]','$postdb[copyfrom]','$postdb[copyfromurl]')");

	$id=$db->insert_id();

	$db->query("INSERT INTO `{$_pre}content_1` (`id` , `fid` , `uid` , `topic` , `content`) VALUES ('$id', '$fid', '$lfjdb[uid]', '1', '$postdb[content]')");
	//�Ƹ�����
	$array = array('title'=>$postdb[title],'fid'=>$fid,'id'=>$id);
	if($postdb[yz]){
		Give_article_money($lfjuid,'yz',$array);
	}
	if($postdb[com]){
		Give_article_money($lfjuid,'com',$array);
	}
 	refreshto("list.php?job=list","<a href='$Mdomain/bencandy.php?fid=$fid&id=$id' target='_blank'>�鿴Ч��</a> <a href='post.php?fid=$fid'>��������</a> <a href='list.php?job=list'>�����б�</a>",300);
}

/*ɾ������,ֱ��ɾ��,������*/
elseif($action=="del")
{
	$rsdb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_1` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[fid]!=$fidDB[fid]){	
		showerr("��Ŀ������");
	}

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ����");
	}


	$db->query("DELETE FROM `{$_pre}content` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}content_1` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}comments` WHERE id='$id' ");
	//�Ƹ�����
	Give_article_money($rsdb[uid],'del');
	if($rsdb[levels]){
		Give_article_money($rsdb[uid],'uncom');
	}
	//ȱ�ٶԸ�����ɾ��
	refreshto("list.php?job=list",'ɾ���ɹ�',1);
}

/*�༭����*/
elseif($job=="edit")
{
	$rsdb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_1` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb["jumpurl"]){
		$chooseiframe='2';
		$isiframe[2]=" checked ";
	}elseif($rsdb["iframeurl"]){
		$chooseiframe='1';
		$isiframe[1]=" checked ";
	}else{
		$chooseiframe='0';
		$isiframe[0]=" checked ";
	}

	$rsdb[content]=En_TruePath($rsdb[content],0);
	$rsdb[content] = editor_replace($rsdb[content]);

	$atc="edit";

	require(ROOT_PATH."member/head.php");
	require(dirname(__FILE__)."/template/post.htm");
	require(ROOT_PATH."member/foot.php");
}

/*�����ύ���������޸�*/
elseif($action=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_1` B ON A.id=B.id WHERE A.id='$id' LIMIT 1");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ�޸�");
	}

	if($isiframe==1){
		$postdb[jumpurl]='';
	}elseif($isiframe==2){
		$postdb[iframeurl]='';
	}else{
		$postdb[iframeurl]=$postdb[jumpurl]='';
	}

	
	//�跨��������ͼ
	if( !$postdb[picurl] && $file_db=get_content_attachment($postdb[content]) ){
		if( $file_db[0] && eregi("(jpg|gif)$",$file_db[0]) && !eregi("sysimage\/file",$file_db[0]) ){
			$postdb[picurl]=$file_db[0];
			if($webdb[if_gdimg])
			{
				$postdb[picurl]=str_replace(".","_",$file_db[0]).'.gif';
				$Newpicpath=ROOT_PATH."$webdb[updir]/$postdb[picurl]";
				gdpic(ROOT_PATH."$webdb[updir]/$file_db[0]",$Newpicpath,200,150);
				if(!file_exists($Newpicpath)){
					$postdb[picurl]=$file_db[0];
				}
			}
		}
	}

	if($postdb[picurl]){	
		$postdb[ispic]=1;
	}else{	
		$postdb[ispic]=0;
	}
	
	//ͼƬĿ¼ת��
	$postdb[content] = move_attachment($lfjdb[uid],$postdb[content],"{$_pre}/$fid");

	//��ȡԶ��ͼƬ
	$postdb[content] = get_outpic($postdb[content],$fid,$GetOutPic);

	$postdb[content] = En_TruePath($postdb[content]);
	$postdb[content] = preg_replace('/javascript/i','java script',$postdb[content]);	//����js����
	$postdb[content] = preg_replace('/<iframe ([^<>]+)>/i','&lt;iframe \\1>',$postdb[content]);	//���˿�ܴ���

	foreach($postdb AS $key=>$value){
		if($key=='content'){		
			continue;
		}
		$postdb[$key]=filtrate($value);
	}	
	

	$db->query("UPDATE `{$_pre}content` SET title='$postdb[title]',keywords='$postdb[keywords]',picurl='$postdb[picurl]',ispic='$postdb[ispic]',city_id='$city_id',iframeurl='$postdb[iframeurl]',jumpurl='$postdb[jumpurl]',author='$postdb[author]',copyfrom='$postdb[copyfrom]',copyfromurl='$postdb[copyfromurl]' WHERE id='$id'");

	$db->query("UPDATE `{$_pre}content_1` SET content='$postdb[content]' WHERE id='$id'");

	refreshto("list.php?job=list","<a href='$Mdomain/bencandy.php?fid=$fid&id=$id&rid=$rid' target='_blank'>�鿴Ч��</a> <a href='list.php?job=list'>�����б�</a> <a href='$FROMURL'>�����޸�</a>",600);	

}
else
{
	$atc="postnew";

 	$isiframe[0]=" checked ";

	require(ROOT_PATH."member/head.php");
	require(dirname(__FILE__)."/template/post.htm");
	require(ROOT_PATH."member/foot.php");
}

//�ɼ��ⲿͼƬ
function get_outpic($str,$fid=0,$getpic=1){
	global $webdb,$_pre;
	if(!$getpic){
		return $str;
	}
	preg_match_all("/http:\/\/([^ '\"<>]+)\.(gif|jpg|png)/is",$str,$array);
	$filedb=$array[0];
	foreach( $filedb AS $key=>$value){
		if( strstr($value,$webdb[www_url]) ){
			continue;
		}
		$listdb["$value"]=$value;
	}
	unset($filedb);
	foreach( $listdb AS $key=>$value){
		$filedb[]=$value;
		$name=rands(5)."__".basename($value);
		if(!is_dir(ROOT_PATH."$webdb[updir]/$_pre")){
			makepath(ROOT_PATH."$webdb[updir]/$_pre");
		}
		if(!is_dir(ROOT_PATH."$webdb[updir]/$_pre/$fid")){
			makepath(ROOT_PATH."$webdb[updir]/$_pre/$fid");
		}
		$ck=0;
		if( @copy($value,ROOT_PATH."$webdb[updir]/$_pre/$fid/$name") ){
			$ck=1;
		}elseif($filestr=file_get_contents($value)){
			$ck=1;
			write_file(ROOT_PATH."$webdb[updir]/$_pre/$fid/$name",$filestr);
		}
	
		/*��ˮӡ*/
		if($ck&&$webdb[is_waterimg]&&$webdb[if_gdimg])
		{
			include_once(ROOT_PATH."inc/waterimage.php");
			$uploadfile=ROOT_PATH."$webdb[updir]/$_pre/$fid/$name";
			imageWaterMark($uploadfile,$webdb[waterpos],ROOT_PATH.$webdb[waterimg]);
		}

		if($ck){
			$str=str_replace("$value","http://www_qibosoft_com/Tmp_updir/$_pre/$fid/$name",$str);
		}
	}
	return $str;
}


//���û������������Ƽ����µĽ���yz,unyz,com,uncom,del
function Give_article_money($uid,$type='',$rsdb){
	global $db,$pre,$webdb;
	if($type=='yz'){
		$money	=	$webdb[postArticleMoney];
		$msg = '��������ͨ����˽���';
	}elseif($type=='unyz'){
		$money	=	-$webdb[postArticleMoney];
		$msg = '��������ȡ����˿۷�';
	}elseif($type=='com'){
		$money	=	$webdb[comArticleMoney];
		$msg = '���±��Ƽ�����';
	}elseif($type=='uncom'){
		$money	=	-$webdb[comArticleMoney];
		$msg = '���±�ȡ���Ƽ��۷�';
	}
	
	if($type=='del'){
		$money	=	$webdb[deleteArticleMoney];
		$msg = '���±�ɾ���۷�:'.$rsdb[title];
	}else{
		$msg .= "<A HREF='$webdb[www_url]$webdb[path]/bencandy.php?fid=$rsdb[fid]&id=$rsdb[id]' target=_blank>".get_word($rsdb[title],30)."</A>";
	}
	if(!$money||!$uid){
		return ;
	}
	add_user($uid,$money,$msg);
}

?>