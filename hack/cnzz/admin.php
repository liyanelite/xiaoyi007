<?php
!function_exists('html') && exit('ERR');
if($job=='set')
{
	if($webdb[cnzz_pwd]=='no'){
		$display='';
		$webdb[cnzz_pwd]='';
	}else{
		$display='none;';
	}
	$cnzz_open[intval($webdb[cnzz_open])]=' checked ';

	hack_admin_tpl('set');
}
elseif($action=='set')
{
	if($webdbs[cnzz_open]&&!$webdbs[cnzz_id]){
		showmsg("ͳ���ʺŲ�����");
	}
	write_config_cache($webdbs);
	jump("�޸ĳɹ�",$FROMURL,1);
}
elseif($job=='ask')
{
	if($webdb[cnzz_id]&&$webdb[cnzz_pwd]){
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=index.php?lfj=cnzz&job=set'>";
		exit;
	}
	$mydomain=preg_replace("/http:\/\/([^\/]+)\/(.*)/is","\\1",$WEBURL);

	hack_admin_tpl('ask');
}
elseif($action=='ask')
{
	if(!$mydomain)
	{
		showmsg("��������Ϊ��");
	}
	$key = md5("{$mydomain}A4bkJUxm");
	$url="http://intf.cnzz.com/user/companion/php168.php?domain=$mydomain&key=$key";
	if( ini_get('allow_url_fopen') && $code=file_get_contents($url) )
	{
	}
	elseif( $code=sockOpenUrl($url) )
	{
	}
	
	if(!strstr($code,'@'))
	{
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312">';
		if($code=='-1'){
			die("KEYֵ����");
		}elseif($code=='-2'){
			die("������������1~64��");
		}elseif($code=='-3'){
			die("������������");
		}elseif($code=='-4'){
			die("�����������ݿ�����");
		}elseif($code=='-5'){
			echo("ͬһ��IP,�û������������<hr>");
		}else{
			echo $code;
		}
		$webdbs[cnzz_pwd]='no';
		write_config_cache($webdbs);
		echo "<A HREF='$url'>��ķ�������֧��Զ�̻�ȡ����,�����ֹ���ȡ����,Ȼ���ҳ����ʾ�Ľ�����Ƴ���,��<ͳ���ʺŹ���>���ֹ�����,@ǰ���������ͳ�ƴ�����ʺ�,@���沿�ݵ�������ͳ�ƴ���Ĺ�������,�����ȡ����</A>";
		exit;
	}
	list($webdbs[cnzz_id],$webdbs[cnzz_pwd])=explode("@",$code);

	write_config_cache($webdbs);
	jump("��ϲ��,ͳ���ʺ�����ɹ�","index.php?lfj=cnzz&job=set",2);
}

?>