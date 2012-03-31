<?php
require_once(dirname(__FILE__)."/global.php");
require_once(ROOT_PATH."/inc/qq.api.php");

if($lfjuid){
	showerr('�벻Ҫ�ظ���¼!');
}elseif(!$webdb[QQ_login]){
	showerr('�ù����ѹر�!');
}

if(!table_field("{$pre}memberdata",'qq_api')){
	$db->query("ALTER TABLE `{$pre}memberdata` ADD `qq_api` VARCHAR( 32 ) NOT NULL AFTER `username`;");
	$db->query("ALTER TABLE `{$pre}memberdata` ADD INDEX ( `qq_api` );");
}

//�벩�����ӿ�
if($webdb[QQ_login]==2){
	if($_GET[qq_api]){
		list($token,$secret,$openid,$time) = explode("\t",qqmd5($_GET[qq_api],"DE",$webdb[QQ_QBappkey]));
		if(!$openid){
			showerr('��Ϣ��ȫ,������!!');
		}elseif($timestamp-$time>60){
			showerr('��ʱ��!!');
		}
		set_cookie('token_secret',mymd5($token."\t".$secret."\t".$openid),3600);

		if($rs=$db->get_one("SELECT * FROM {$pre}memberdata WHERE `qq_api`='$openid'")){
			$userDB->login($rs[username],'',intval($webdb[QQ_logintime]*3600),true);
			$fromurl=get_cookie('qq_fromurl');
			if($fromurl&&!eregi("login\.php",$fromurl)&&!eregi("reg\.php",$fromurl)){
				$jumpto=$fromurl;
			}else{
				$jumpto="$webdb[www_url]/";
			}
			refreshto("$jumpto","QQ��ʽ��¼�ɹ�{$uc_login_code}",1);
		}else{
			refreshto("qq_bind.php","QQ��¼�ɹ�,������ʺŰ�����",10);
		}

	}else{
		//��¼ǰ
		set_cookie('qq_fromurl',$FROMURL);
		$api_md5=qqmd5("$webdb[www_url]\t$timestamp","EN",$webdb[QQ_QBappkey]);
		header("location:http://www.qibosoft.com/qq_login/api.php?api_md5=$api_md5&api_id=$webdb[QQ_QBappid]");
		exit;
	}
}

//������QQ˽�ܽӿ�

if($_GET["openid"]){
	//tips//
	/**
	 * QQ������¼����Ȩ�ɹ����ص��˵�ַ
	 * ����Ҫ����Ȩ��request token��ȡaccess token
	 * ����QQ�������κ���Դ����Ҫaccess token
	 * Ŀǰaccess token�ǳ�����Ч�ģ������û�������������
	 * �������������access tokenʧЧ���������û����µ�¼QQ��������Ȩ����ȡaccess token
	 */
	//print_r($_GET);

	//��Ȩ�ɹ��󣬻᷵���û���openid
	//��鷵�ص�openid�Ƿ��ǺϷ�id
	//echo $_GET["oauth_signature"];
	if (!is_valid_openid($_GET["openid"], $_GET["timestamp"], $_GET["oauth_signature"]))
	{
		showerr('API�ʺ�����!');
		//demo�Դ���򵥴���
		echo "###invalid openid\n";
		echo "sig:".$_GET["oauth_signature"]."\n";
		exit;
	}

	//tips
	//�����Ѿ���ȡ����openid�����Դ���������˻���openid�İ��߼�
	//�������ǽ���������ȵ���ȡaccesstoken֮���������߼�
	
	list($token,$secret)=explode("\t",mymd5(get_cookie('token_secret'),'DE'));
	//����Ȩ��request token��ȡaccess token

	$access_str = get_access_token($webdb[QQ_appid], $webdb[QQ_appkey], $_GET["oauth_token"], $secret, $_GET["oauth_vericode"]);
	//echo "access_str:$access_str\n";
	$result = array();
	parse_str($access_str, $result);

	//print_r($result);

	//error
	if (isset($result["error_code"]))
	{
		showerr('������,�벻Ҫ�ظ�ˢ����ҳ'.$result["error_code"]);
		//echo "error_code = ".$result["error_code"];
		//exit;
	}

	//��ȡaccess token�ɹ���Ҳ�᷵���û���openid
	//����ǿ�ҽ��������ʹ�ô�openid
	//��鷵�ص�openid�Ƿ��ǺϷ�id
	if (!is_valid_openid($result["openid"], $result["timestamp"], $result["oauth_signature"]))
	{
		showerr('������,��ʱ��!');
		//demo�Դ���򵥴���
		//echo "@@@invalid openid";
		//echo "sig:".$result["oauth_signature"]."\n";
		//exit;
	}
	//echo 'good!!';
	//��access token��openid����!!
	//XXX ��Ϊdemo,��ʱ�����session�У���վӦ�����Լ���ȫ�Ĵ洢ϵͳ���洢��Щ��Ϣ
	//$_SESSION["token"]   = $result["oauth_token"];
	//$_SESSION["secret"]  = $result["oauth_token_secret"]; 
	//$_SESSION["openid"]  = $result["openid"];
	set_cookie('token_secret',mymd5($result["oauth_token"]."\t".$result["oauth_token_secret"]."\t".$result["openid"]),3600);

	if($rs=$db->get_one("SELECT * FROM {$pre}memberdata WHERE `qq_api`='$result[openid]'")){
		$userDB->login($rs[username],'',3600,true);
		$fromurl=get_cookie('qq_fromurl');
		if($fromurl&&!eregi("login\.php",$fromurl)&&!eregi("reg\.php",$fromurl)){
			$jumpto=$fromurl;
		}else{
			$jumpto="$webdb[www_url]/";
		}
		refreshto("$jumpto","QQ��ʽ��¼�ɹ�{$uc_login_code}",1);
	}else{
		refreshto("qq_bind.php","QQ��¼�ɹ�,������ʺŰ�����",10);
	}

	//�����������û����߼�
	//��openid����������ʺ�������
	//bind_to_openid();
}else{
	//��¼ǰ
	set_cookie('qq_fromurl',$FROMURL);
	redirect_to_login($webdb[QQ_appid], $webdb[QQ_appkey], "$webdb[www_url]/do/qq_login.php");
}




/**
 * @brief get a access token 
 *        rfc1738 urlencode
 * @param $appid
 * @param $appkey
 * @param $request_token
 * @param $request_token_secret
 * @param $vericode
 *
 * @return a string, as follows:
 *      oauth_token=xxx&oauth_token_secret=xxx&openid=xxx&oauth_signature=xxx&oauth_vericode=xxx&timestamp=xxx
 */
function get_access_token($appid, $appkey, $request_token, $request_token_secret, $vericode)
{
    //��ȡaccess token�ӿڣ���Ҫ������!!
    $url    = "http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token?";
    //����ǩ����.Դ��:����[GET|POST]&uri&����������ĸ��������
    $sigstr = "GET"."&".rawurlencode("http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token")."&";

    //��Ҫ��������Ҫ������!!
    $params = array();
    $params["oauth_version"]          = "1.0";
    $params["oauth_signature_method"] = "HMAC-SHA1";
    $params["oauth_timestamp"]        = time();
    $params["oauth_nonce"]            = mt_rand();
    $params["oauth_consumer_key"]     = $appid;
    $params["oauth_token"]            = $request_token;
    $params["oauth_vericode"]         = $vericode;

    //�Բ���������ĸ���������л�
    $normalized_str = get_normalized_string($params);
    $sigstr        .= rawurlencode($normalized_str);

    //echo "sigstr = $sigstr";

    //ǩ��,ȷ��php�汾֧��hash_hmac����
    $key = $appkey."&".$request_token_secret;
    $signature = get_signature($sigstr, $key);
    //��������url
    $url      .= $normalized_str."&"."oauth_signature=".rawurlencode($signature);

    return file_get_contents($url);
}




 /**
 * @brief get a request token by appid and appkey
 *        rfc1738 urlencode
 * @param $appid
 * @param $appkey
 *
 * @return a string, the format as follow: 
 *      oauth_token=xxx&oauth_token_secret=xxx
 */
function get_request_token($appid, $appkey)
{
    //��ȡrequest token�ӿ�, ��Ҫ������!!
    $url    = "http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token?";
    //����ǩ����.Դ��:����[GET|POST]&uri&����������ĸ��������
    $sigstr = "GET"."&".rawurlencode("http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token")."&";

    //��Ҫ����,��Ҫ������!!
    $params = array();
    $params["oauth_version"]          = "1.0";
    $params["oauth_signature_method"] = "HMAC-SHA1";
    $params["oauth_timestamp"]        = time();
    $params["oauth_nonce"]            = mt_rand();
    $params["oauth_consumer_key"]     = $appid;

    //�Բ���������ĸ���������л�
    $normalized_str = get_normalized_string($params);
    $sigstr        .= rawurlencode($normalized_str);

    //ǩ��,��Ҫȷ��php�汾֧��hash_hmac����
    $key = $appkey."&";
    $signature = get_signature($sigstr, $key);
    //��������url
    $url      .= $normalized_str."&"."oauth_signature=".rawurlencode($signature);

    //echo "$sigstr\n";
    //echo "$url\n";

    return file_get_contents($url);
}

//for test
//echo get_request_token($_SESSION["appid"], $_SESSION["appkey"]);


/**
 * @brief redirect to QQ login page
 *        rfc1738 urlencode
 * @param $appid
 * @param $appkey
 * @param $callback
 */
function redirect_to_login($appid, $appkey, $callback)
{
    //��Ȩ��¼ҳ
    $redirect = "http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize?oauth_consumer_key=$appid&";

    //��ȡrequest token
    $result = array();
    $request_token = get_request_token($appid, $appkey);
    parse_str($request_token, $result);

    //request token, request token secret ��Ҫ��������
    //��demo��ʾ�У�ֱ�ӱ�����ȫ�ֱ�����.��ʵ�����Ҫ��վ�Լ�����
    //$_SESSION["token"]        = $result["oauth_token"];
    //$_SESSION["secret"]       = $result["oauth_token_secret"];
	set_cookie('token_secret',mymd5($result["oauth_token"]."\t".$result["oauth_token_secret"]),3600);

    if ($result["oauth_token"] == "")
    {
		showerr('API��Ϣ����!');
        //demo�в��Դ������������
        //��վ��Ҫ�Լ�����������
       // exit;
    }

    //302��ת����Ȩҳ��
    $redirect .= "oauth_token=".$result["oauth_token"]."&oauth_callback=".rawurlencode($callback);
    header("Location:$redirect");
}



?>