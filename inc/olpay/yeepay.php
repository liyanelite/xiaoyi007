<?php
!function_exists('html') && exit('ERR');

if(!$webdb[yeepay_id]){
	showerr('ϵͳû�������ױ�֧���տ��̻����,���Բ�������֧��');
}elseif(!$webdb[yeepay_key]){
	showerr('ϵͳû�������ױ�֧����Կ,���Բ�������֧��');
}

//�벩CMS
if(!function_exists("iconv")){
	function iconv($s,$d,$string){
		require_once(ROOT_PATH."inc/class.chinese.php");
		$cnvert = new Chinese("GB2312","UTF8",$string,ROOT_PATH."./inc/gbkcode/");
		$string = $cnvert->ConvertIT();
		return $string;
	}
}

$p1_MerId=$webdb[yeepay_id];
$merchantKey=$webdb[yeepay_key];
//include 'merchantProperties.php'

/*
* @Description �ױ�֧����Ʒͨ�ýӿڷ��� 
* @V3.0
* @Author rui.xin
*/
 	
#	��Ʒͨ�ýӿ���ʽ�����ַ
$reqURL_onLine = "https://www.yeepay.com/app-merchant-proxy/node";
#	��Ʒͨ�ýӿڲ��������ַ
#$reqURL_onLine = "http://tech.yeepay.com:8080/robot/debug.action";
		
# ҵ������
# ֧�����󣬹̶�ֵ"Buy" .	
$p0_Cmd = "Buy";
		
#	�ͻ���ַ
# Ϊ"1": ��Ҫ�û����ͻ���ַ�����ױ�֧��ϵͳ;Ϊ"0": ����Ҫ��Ĭ��Ϊ "0".
$p9_SAF = "0";


//����֧�����
if($_GET[hmac]){
	#	ֻ��֧���ɹ�ʱ�ױ�֧���Ż�֪ͨ�̻�.
	##֧���ɹ��ص������Σ�����֪ͨ������֧����������е�p8_Url�ϣ�������ض���;��������Ե�ͨѶ.

	#	�������ز���.
	//$return = getCallBackValue($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);

	#	�жϷ���ǩ���Ƿ���ȷ��True/False��
	$bRet = CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
	#	���ϴ���ͱ�������Ҫ�޸�.
			
	#	У������ȷ.
	if($bRet){
		if($r1_Code=="1"){
			
		#	��Ҫ�ȽϷ��صĽ�����̼����ݿ��ж����Ľ���Ƿ���ȣ�ֻ����ȵ�����²���Ϊ�ǽ��׳ɹ�.
		#	������Ҫ�Է��صĴ������������ƣ����м�¼�������Դ�����ֹ��ͬһ�������ظ��������������.      	  	
			
			if($r9_BType=="1"){
				//echo "���׳ɹ�";
				//echo  "<br />����֧��ҳ�淵��";
			}elseif($r9_BType=="2"){
				#�����ҪӦ�����������д��,��success��ͷ,��Сд������.
				echo "success";
				echo "<br />���׳ɹ�";
				echo  "<br />����֧������������";      			 
			}elseif($r9_BType=="3"){ 
				echo  "�绰֧��֪ͨҳ�淵��";      			
			}
			
			olpay_end($r6_Order);
		}
		
	}else{
		echo "������Ϣ���۸�";
		exit;
	}
}
else
{
	$array=olpay_send();

	#	�̼������û�������Ʒ��֧����Ϣ.
	##�ױ�֧��ƽ̨ͳһʹ��GBK/GB2312���뷽ʽ,�������õ����ģ���ע��ת��

	#	�̻�������,ѡ��.
	##����Ϊ""���ύ�Ķ����ű����������˻�������Ψһ;Ϊ""ʱ���ױ�֧�����Զ�����������̻�������.
	$p2_Order					= $array[numcode];

	#	֧�����,����.
	##��λ:Ԫ����ȷ����.
	$p3_Amt						= $array[money];

	#	���ױ���,�̶�ֵ"CNY".
	$p4_Cur						= "CNY";

	#	��Ʒ����
	##����֧��ʱ��ʾ���ױ�֧���������Ķ�����Ʒ��Ϣ.
	$p5_Pid						= $array[title];

	#	��Ʒ����
	//$p6_Pcat					= $_REQUEST['p6_Pcat'];

	#	��Ʒ����
	$p7_Pdesc					= $array[content];

	#	�̻�����֧���ɹ����ݵĵ�ַ,֧���ɹ����ױ�֧������õ�ַ�������γɹ�֪ͨ.
	$p8_Url                     = $array[return_url];
	//$p8_Url						= $_REQUEST['p8_Url'];	

	#	�̻���չ��Ϣ
	##�̻�����������д1K ���ַ���,֧���ɹ�ʱ��ԭ������.												
	$pa_MP						= 'endpay';

	#	���б���
	##Ĭ��Ϊ""�����ױ�֧������.��������ʾ�ױ�֧����ҳ�棬ֱ����ת�������С�������֧��������һ��ͨ��֧��ҳ�棬���ֶο����ո�¼:�����б����ò���ֵ.			
	//$pd_FrpId					= $_REQUEST['pd_FrpId'];

	#	Ӧ�����
	##Ϊ"1": ��ҪӦ�����;Ϊ"0": ����ҪӦ�����.
	$pr_NeedResponse=1;
	//$pr_NeedResponse	= $_REQUEST['pr_NeedResponse'];
	
	#����ǩ����������ǩ����
	$hmac = getReqHmacString($p2_Order,$p3_Amt,$p4_Cur,$p5_Pid,$p6_Pcat,$p7_Pdesc,$p8_Url,$pa_MP,$pd_FrpId,$pr_NeedResponse);

	echo "
<html>
<head>
<title>To YeePay Page</title>
</head>
<body onLoad='document.yeepay.submit();'>
<form name='yeepay' action='$reqURL_onLine' method='post'>
<input type='hidden' name='p0_Cmd'					value='$p0_Cmd'>
<input type='hidden' name='p1_MerId'				value='$p1_MerId'>
<input type='hidden' name='p2_Order'				value='$p2_Order'>
<input type='hidden' name='p3_Amt'					value='$p3_Amt'>
<input type='hidden' name='p4_Cur'					value='$p4_Cur'>
<input type='hidden' name='p5_Pid'					value='$p5_Pid'>
<input type='hidden' name='p6_Pcat'					value='$p6_Pcat'>
<input type='hidden' name='p7_Pdesc'				value='$p7_Pdesc'>
<input type='hidden' name='p8_Url'					value='$p8_Url'>
<input type='hidden' name='p9_SAF'					value='$p9_SAF'>
<input type='hidden' name='pa_MP'						value='$pa_MP'>
<input type='hidden' name='pd_FrpId'				value='$pd_FrpId'>
<input type='hidden' name='pr_NeedResponse'	value='$pr_NeedResponse'>
<input type='hidden' name='hmac'						value='$hmac'>
</form>
</body>
</html>
	";
		exit;
}
	
#ǩ����������ǩ����
function getReqHmacString($p2_Order,$p3_Amt,$p4_Cur,$p5_Pid,$p6_Pcat,$p7_Pdesc,$p8_Url,$pa_MP,$pd_FrpId,$pr_NeedResponse)
{
  global $p0_Cmd;
  global $p9_SAF;
	//�벩CMS
  global $p1_MerId,$merchantKey;
	//include 'merchantProperties.php';
		
	#����ǩ������һ�������ĵ��б�����ǩ��˳�����
  $sbOld = "";
  #����ҵ������
  $sbOld = $sbOld.$p0_Cmd;
  #�����̻����
  $sbOld = $sbOld.$p1_MerId;
  #�����̻�������
  $sbOld = $sbOld.$p2_Order;     
  #����֧�����
  $sbOld = $sbOld.$p3_Amt;
  #���뽻�ױ���
  $sbOld = $sbOld.$p4_Cur;
  #������Ʒ����
  $sbOld = $sbOld.$p5_Pid;
  #������Ʒ����
  $sbOld = $sbOld.$p6_Pcat;
  #������Ʒ����
  $sbOld = $sbOld.$p7_Pdesc;
  #�����̻�����֧���ɹ����ݵĵ�ַ
  $sbOld = $sbOld.$p8_Url;
  #�����ͻ���ַ��ʶ
  $sbOld = $sbOld.$p9_SAF;
  #�����̻���չ��Ϣ
  $sbOld = $sbOld.$pa_MP;
  #����֧��ͨ������
  $sbOld = $sbOld.$pd_FrpId;
  #�����Ƿ���ҪӦ�����
  $sbOld = $sbOld.$pr_NeedResponse;
	logstr($p2_Order,$sbOld,HmacMd5($sbOld,$merchantKey));
  return HmacMd5($sbOld,$merchantKey);
  
} 

function getCallbackHmacString($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType)
{
  
	//�벩CMS
  global $p1_MerId,$merchantKey;
	//include 'merchantProperties.php';
  
	#ȡ�ü���ǰ���ַ���
	$sbOld = "";
	#�����̼�ID
	$sbOld = $sbOld.$p1_MerId;
	#������Ϣ����
	$sbOld = $sbOld.$r0_Cmd;
	#����ҵ�񷵻���
	$sbOld = $sbOld.$r1_Code;
	#���뽻��ID
	$sbOld = $sbOld.$r2_TrxId;
	#���뽻�׽��
	$sbOld = $sbOld.$r3_Amt;
	#������ҵ�λ
	$sbOld = $sbOld.$r4_Cur;
	#�����ƷId
	$sbOld = $sbOld.$r5_Pid;
	#���붩��ID
	$sbOld = $sbOld.$r6_Order;
	#�����û�ID
	$sbOld = $sbOld.$r7_Uid;
	#�����̼���չ��Ϣ
	$sbOld = $sbOld.$r8_MP;
	#���뽻�׽����������
	$sbOld = $sbOld.$r9_BType;

	logstr($r6_Order,$sbOld,HmacMd5($sbOld,$merchantKey));
	return HmacMd5($sbOld,$merchantKey);

}


#	ȡ�÷��ش��е����в���
function getCallBackValue(&$r0_Cmd,&$r1_Code,&$r2_TrxId,&$r3_Amt,&$r4_Cur,&$r5_Pid,&$r6_Order,&$r7_Uid,&$r8_MP,&$r9_BType,&$hmac)
{  
	$r0_Cmd		= $_REQUEST['r0_Cmd'];
	$r1_Code	= $_REQUEST['r1_Code'];
	$r2_TrxId	= $_REQUEST['r2_TrxId'];
	$r3_Amt		= $_REQUEST['r3_Amt'];
	$r4_Cur		= $_REQUEST['r4_Cur'];
	$r5_Pid		= $_REQUEST['r5_Pid'];
	$r6_Order	= $_REQUEST['r6_Order'];
	$r7_Uid		= $_REQUEST['r7_Uid'];
	$r8_MP		= $_REQUEST['r8_MP'];
	$r9_BType	= $_REQUEST['r9_BType']; 
	$hmac			= $_REQUEST['hmac'];
	
	return null;
}

function CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac)
{
	if($hmac==getCallbackHmacString($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType))
		return true;
	else
		return false;
}
		
  
function HmacMd5($data,$key)
{
// RFC 2104 HMAC implementation for php.
// Creates an md5 HMAC.
// Eliminates the need to install mhash to compute a HMAC
// Hacked by Lance Rushing(NOTE: Hacked means written)

//��Ҫ���û���֧��iconv���������Ĳ���������������
$key = iconv("GB2312","UTF-8",$key);
$data = iconv("GB2312","UTF-8",$data);

$b = 64; // byte length for md5
if (strlen($key) > $b) {
$key = pack("H*",md5($key));
}
$key = str_pad($key, $b, chr(0x00));
$ipad = str_pad('', $b, chr(0x36));
$opad = str_pad('', $b, chr(0x5c));
$k_ipad = $key ^ $ipad ;
$k_opad = $key ^ $opad;

return md5($k_opad . pack("H*",md5($k_ipad . $data)));
}

function logstr($orderid,$str,$hmac)
{
	return ;
//�벩CMS
	$logName	= "YeePay_HTML.log";
  global $p1_MerId,$merchantKey;
	//include 'merchantProperties.php';
$james=fopen($logName,"a+");
fwrite($james,"\r\n".date("Y-m-d H:i:s")."|orderid[".$orderid."]|str[".$str."]|hmac[".$hmac."]");
fclose($james);
}


?>