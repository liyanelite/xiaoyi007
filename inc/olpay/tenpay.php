<?php
if(!function_exists('html') && ($_GET[signMsg]||$_GET[sign])){
	require_once("../common.inc.php");
	$url=str_replace(array('---','--'),array('&','='),substr(strstr($WEBURL,'?'),1));
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$url'>";
	exit;
}
!function_exists('html') && exit('ERR');

if(!$webdb[tenpay_id]){
	showerr('ϵͳû�����òƸ�ͨ�տ��ʺ�,���Բ���ʹ�òƸ�ͨ����֧��');
}elseif(!$webdb[tenpay_key]){
	showerr('ϵͳû�����òƸ�ͨ��Կ,���Բ���ʹ�òƸ�ͨ����֧��');
}

//�������������Ƹ�ͨ���Կ���   0 �رղ���    1 �������ԡ������������

class tenpay_config
{
	var $beta_switch		="0";



	//�������������Ƹ�֧ͨ��������������������

	//����ÿһ�����Ҫ���ã���׼ȷ
	var $spid 				="1210110601";			//�����ʺ�
	var $sp_key				="f1d6a1974041659c8650476dda14bb58";																		//��Կ
	var $domain				="http://www.anodize.cn"	;	//�̻���վ����
	var $tenpay_dir			="/tenpay2";		//�Ƹ�ͨ��װĿ¼
	var $site_name			="�й���������";		//�̻���վ����
	var $attach				="tencent_magichu";		//֧���������ݣ������ı�׼�ַ�
	var $imgtitle			="�Ƹ�֧ͨ��"; 			//ͼƬ˵��
	var $imgsrc				="/image/tenpay_buy.gif";		//ͼƬ��ַ
	var $pay_url			="https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi"; 	//�Ƹ�֧ͨ�����ص�ַ
	var $return_url			='http://www.anodize.cn';
	function tenpay_config()
	{
		//$this->imgsrc.=$this->tenpay_dir;
		global $webdb;
		$this->spid=$webdb[tenpay_id];
		$this->sp_key=$webdb[tenpay_key];
		$this->domain=$webdb[www];
		$this->site_name=$webdb[webname];
	}
}


$tenpay_conf = new tenpay_config();



class tenpay_online_payment  
{
	var  $tenpay_config;
	function tenpay_online_payment()
	{
		global $tenpay_conf;
		$this->tenpay_config = $tenpay_conf;
	}

	//����������
	function ShowExitMsg($msg)
	  {
		if ($tenpay_conf->beta_switch =="0")
			{
				$strMsg="<body><html><meta name=\"TENCENT_ONELINE_PAYMENT\" content=\"China TENCENT\">\n";
			    $strMsg.= "<script language=javascript>\n";
			    $strMsg.= "window.location.href='".$domain . $tenpay_dir ."/tenpay_show.php";
			    $strMsg.= $msg;
			    $strMsg.= "';\n";
			    $strMsg.= "</script></body></html>";
			    Exit($strMsg);
			}
		else
			{
				echo  "do something";
			}
	  }
	  
	  
	  
	function tenpay_check_config ()//��������ļ���Ŀ
	{
			$retcode = "0";
		
		 if (empty($this->tenpay_config->spid))
			 {
			 	$retcode = "09001";
				$retmsg  = "ȱ���̻���spid";
				
			 }
			 
			 if (empty($this->tenpay_config->sp_key))
			 {
			 	$retcode = "090002";
				$retmsg  = "ȱ����Կsp_key";
				
			 }
			 
			 if (empty($this->tenpay_config->domain))
			 {
			 	$retcode = "09003";
				$retmsg  = "ȱ����վ��ַdomain";
				
			 }
			 
			 if (empty($this->tenpay_config->tenpay_dir))
			 {
				$retcode = "09004";
				$retmsg  = "ȱ�ٲƸ�ͨ��װĿ¼tenpay_dir";
			 }
			 
			 
			 
			 
			 if (empty($this->tenpay_config->site_name))
			 {
			 	$retcode = "09005";
				$retmsg = "ȱ����վ����";
			 }
			 
			 if (empty($this->tenpay_config->attach))
			 {
				$retcode = "09006";
				$retmsg = "ȱ�ٸ�����Ϣ��Ĭ������Ϊ��";
				$this->tenpay_config->attach = "";
			 }
			 
			  if (empty($this->tenpay_config->imgtitle))
			 {
				$retcode = "09007";
				$retmsg = "ȱ��ͼƬ˵����Ĭ������Ϊ�Ƹ�֧ͨ��";
				$this->tenpay_config->imgtitle = "�Ƹ�֧ͨ��";
			 }
			 
			 if (empty($this->tenpay_config->imgsrc))
			 {
				$retcode = "09008";
				$retmsg = "ȱ��ͼƬ��ַ��Ĭ������Ϊ/tenpay/image/tenpay_buy.gif";
				$this->tenpay_config->imgsrc = "/image/tenpay_buy.gif";
			 }
			 
			 if (empty($this->tenpay_config->pay_url))
			 {
				$retcode = "09009";
				$retmsg = "ȱ��֧�����ص�ַ����������Ϊhttps://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi";
				$this->tenpay_config->pay_url = "https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi";
			 }
				
			return $retcode;

	}

	

	
	
	
	//����֧������
	function tenpay_interface_pay ($bank_type,$desc,$purchaser_id,$sp_billno,$total_fee,$attach,$ip)
	{
		
		$ip =  $ip ? $ip : $_SERVER['REMOTE_ADDR'];
		$config_retcode = $this->tenpay_check_config ();
		if ($config_retcode!="0")
			die("���������ļ�tenpay_config.php�еĸ��������Ƿ���ȷ����");
			
		if (empty($sp_billno))
			 {
			 	$retcode = "09001";
				$retmsg  = "ȱ��sp_billno";
				
			 }
			 
			 if (empty($total_fee))
			 {
			 	$retcode = "090012";
				$retmsg  = "ȱ��total_fee";
				
			 }
			 
			 if ($bank_type=="")
			 {
			 	$retcode = "06001";
				$retmsg  = "ȱ��bank_type������Ĭ������Ϊ0";
				$bank_type = "0";
			 }
			 
			 if ($desc=="")
			 {

				$retcode = "06002";
				$retmsg  = "ȱ����Ʒ����desc������Ĭ������Ϊ".$this->tenpay_config->site_name."������" . $sp_billno;;
				$desc = $this->tenpay_config->site_name."������" . $sp_billno;
				}
			 
			 
			 
			 
			 if (empty($purchaser_id))
			 {
			 	$retcode = "06003";
				$retmsg = "ȱ������ʺ���Ϣ������Ĭ������Ϊ��";
				$purchaser_id = "";
			 }
			 
			 if (empty($attach))
			 {
				$retcode = "06004";
				$retmsg = "ȱ�ٸ�����Ϣ��Ĭ������Ϊ��";
				$attach = "";
			 }
				
		
		 		  
		if ($retcode < "09000")//�ж��Ƿ�Ϊ���ش���>09000Ϊ���ش���
		{
			if ($beta_switch == "1") //�жϲ��Կ��أ�����������ԣ�֧�����Ϊ1�� 
			{
				$total_fee = "0";
					
				
				$sign_text ="cmdno=1" . "&date=" . date('Ymd') . "&bargainor_id=" . $this->tenpay_config->spid ."&transaction_id=" . $this->tenpay_config->spid . date('Ymd').time()."&sp_billno=" . $sp_billno . "&total_fee=" . $total_fee . "&fee_type=1"  . "&return_url=" . $this->tenpay_config->return_url . "&attach=" . $attach ;
				
				if($ip != "")
				{
					$sign_text = $sign_text . "&spbill_create_ip=" . $ip;
				}
				$strSign = strtoupper(md5($sign_text."&key=".$this->tenpay_config->sp_key));
				$redurl = $this->tenpay_config->pay_url . "?".$sign_text . "&sign=" . $strSign."&desc=".$desc."&bank_type=".$bank_type;
				
				echo $retcode . "<br></br>".$retmsg."<br></br>";
				echo $redurl;
				
				
				return $redurl;
			}
			else
			{
				$sign_text ="cmdno=1" . "&date=" . date('Ymd') . "&bargainor_id=" . $this->tenpay_config->spid ."&transaction_id=" . $this->tenpay_config->spid . date('Ymd').time()."&sp_billno=" . $sp_billno . "&total_fee=" . $total_fee . "&fee_type=1"  . "&return_url=" . $this->tenpay_config->return_url . "&attach=" . $attach ;

				if($ip != "")
				{
					$sign_text = $sign_text . "&spbill_create_ip=" . $ip;
				}
				$strSign = strtoupper(md5($sign_text."&key=".$this->tenpay_config->sp_key));
				$redurl = $this->tenpay_config->pay_url . "?".$sign_text . "&sign=" . $strSign."&desc=".$desc."&bank_type=".$bank_type;
				return $redurl;
			}
		}
		 
		
		
	}
	
}



if($_GET[signMsg]||$_GET[sign]){
	$tenpay = new tenpay_online_payment;

	import_request_variables("gpc", "frm_");

	  /*ȡ���ز���*/
	  $strCmdno			= $frm_cmdno;
	  $strPayResult		= $frm_pay_result;
	  $strPayInfo		= $frm_pay_info;
	  $strBillDate		= $frm_date;
	  $strBargainorId	= $frm_bargainor_id;
	  $strTransactionId	= $frm_transaction_id;
	  $strSpBillno		= $frm_sp_billno;
	  $strTotalFee		= $frm_total_fee;
	  $strFeeType		= $frm_fee_type;
	  $strAttach			= $frm_attach;
	  $strMd5Sign		= $frm_sign;

	$retcode = "0";
	$retmsg ="֧���ɹ�";


	//��������Ϣ
	//retcode = "0"					 ֧���ɹ�	
	//retmsg = "֧���ɹ�"				

	//retcode = "1"					 �̻��Ŵ���
	//retmsg = " �̻��Ŵ���"				

	//retcode = "2"					ǩ������
	//retmsg = "ǩ������"				

	//retcode = "3"					 �Ƹ�ͨ����֧��ʧ��	
	//retmsg = "�Ƹ�ͨ����֧��ʧ��"	  



	  /*��ǩ*/
	$strResponseText  = "cmdno=" . $strCmdno . "&pay_result=" . $strPayResult . 
							  "&date=" . $strBillDate . "&transaction_id=" . $strTransactionId .
								"&sp_billno=" . $strSpBillno . "&total_fee=" . $strTotalFee .
								"&fee_type=" . $strFeeType . "&attach=" . $strAttach .
								"&key=" . $tenpay_conf->sp_key;
	$strLocalSign = strtoupper(md5($strResponseText));     
	  
	if( $strLocalSign  != $strMd5Sign)
	{
		//��֤MD5ǩ��ʧ��
		//ֲ��ҵ���߼�������ע���λ�Ƿ֣��Ƹ�ͨ�п��ܶ��֪ͨ�̻�֧���ɹ�����Ҫ�ԲƸ�ͨ���ظ�֪ͨ��ȥ�ش���
		$retcode = "2";
		$retmsg = "��֤MD5ǩ��ʧ��";
		die( "��֤MD5ǩ��ʧ�� "); 
	}  

	if($tenpay_conf->spid != $strBargainorId )
	 {
		//������̻���
		//ֲ��ҵ���߼�������ע���λ�Ƿ֣��Ƹ�ͨ�п��ܶ��֪ͨ�̻�֧���ɹ�����Ҫ�ԲƸ�ͨ���ظ�֪ͨ��ȥ�ش���

		echo $strBargainorId,"<br/>";
		echo $tenpay_conf->spid;
		$retcode = "1";
		$retmsg = "������̻���";
		die( "������̻��� "); 
	}

	if( $strPayResult != "0" )
	{
		//֧��ʧ�ܣ�ϵͳ����
		//ֲ��ҵ���߼�������ע���λ�Ƿ֣��Ƹ�ͨ�п��ܶ��֪ͨ�̻�֧���ɹ�����Ҫ�ԲƸ�ͨ���ظ�֪ͨ��ȥ�ش���

		$retcode = "3";
		$retmsg = "֧��ʧ�ܣ�ϵͳ����";
		die( "֧��ʧ�ܣ�ϵͳ���� "); 
	}
	  
	if ($retcode == "0")
	{
		//֧���ɹ�
		//ֲ��ҵ���߼�������ע���λ�Ƿ֣��Ƹ�ͨ�п��ܶ��֪ͨ�̻�֧���ɹ�����Ҫ�ԲƸ�ͨ���ظ�֪ͨ��ȥ�ش���
		olpay_end($strSpBillno);
		die( "֧���ɹ�. "); 
	}

	
	
}
else
{
	$array=olpay_send();

	//URL��֧��=��&�ַ�,����Ҫ�ر���,�Ƚ��鷳
	$tenpay_conf->return_url="$webdb[www]/inc/olpay/tenpay.php?".str_replace(array("=","&"),array("--","---"),$array[return_url]);

	$tenpay = new tenpay_online_payment;

	$url=$tenpay->tenpay_interface_pay ("0",$array[title],"",$array[numcode],$array[money]*100,"",'');

	header("location:$url");
	exit;
}

?>