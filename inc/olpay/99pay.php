<?php
!function_exists('html') && exit('ERR');

$webdb[pay99_id] && $webdb[pay99_id]="{$webdb[pay99_id]}01";

if(!$webdb[pay99_id]){
	showerr('ϵͳû�����ÿ�Ǯ�տ��̻����,���Բ���ʹ�ÿ�Ǯ����֧��');
}elseif(!$webdb[pay99_key]){
	showerr('ϵͳû�����ÿ�Ǯ��Կ,���Բ���ʹ�ÿ�Ǯ����֧��');
}

if($signMsg){

	$key=$webdb[pay99_key];
	//���ɼ��ܴ������뱣������˳��
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"merchantAcctId",$merchantAcctId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"version",$version);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"language",$language);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"signType",$signType);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"payType",$payType);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"bankId",$bankId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"orderId",$orderId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"orderTime",$orderTime);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"orderAmount",$orderAmount);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"dealId",$dealId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"bankDealId",$bankDealId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"dealTime",$dealTime);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"payAmount",$payAmount);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"fee",$fee);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"ext1",$ext1);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"ext2",$ext2);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"payResult",$payResult);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"errCode",$errCode);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"key",$key);
	$merchantSignMsg= md5($merchantSignMsgVal);

	if( strtoupper($signMsg)!=strtoupper($merchantSignMsg) ){
		showerr( "��֤MD5ǩ��ʧ��"); 
	}

	if( $webdb[pay99_id] != $merchantAcctId ){
		showerr( "������̻����"); 
	}

	if($payResult != "10" ){
		showerr( "֧��ʧ��"); 
	}
	
	olpay_end($orderId);
}
else
{
	$array=olpay_send();
	$array[return_url] = substr($array[return_url],0,-1);
	//����������˻���
	///�����Ǯ��ϵ��ȡ
	////�˻���merchantAcctId�Ĺ��ɣ�
	////��¼��Ǯ�ʻ����ڡ��ҵĿ�Ǯ��-���ʻ���ҳ��������λ����ʾ���û���š���
	////�̻����������ǿ�Ǯ�����֧�����أ���ô�̻����ʻ���merchantAcctId��Ϊ
	////�û���ź��渽������01����{�û����}01
	$merchantAcctId=$webdb[pay99_id];

	//�����������Կ
	///���ִ�Сд.�����Ǯ��ϵ��ȡ
	////�̻���Կ����¼��Ǯ��վ���ڡ���Ǯ���ߡ�-�����ò�Ʒ�������л�ȡ�����á�
	////ע�⣺�̻���Կ�ĳ���ֻ����16λ���̻���Կ��Ӧ���������ַ�������ֻʹ�����ֺ���ĸ��ϣ���
	////����������Ǯ�ʻ�ʱû���յ���Ǯ���͵�֪ͨ�ʼ�������Ϊ����������ɵ���Կ����
	////��������������Կ�����¼�����ڿ�Ǯע��ʱʹ�õ����䣨�����ǵĿ�Ǯ�ʻ�����
	////�����ʼ�����fsc@99bill.com���������������ǵ��̻���Կ���������ʼ���˵������Ҫ���óɵ���Կ����
	$key=$webdb[pay99_key];

	//�ַ���.�̶�ѡ��ֵ����Ϊ�ա�
	///ֻ��ѡ��1��2��3.
	///1����UTF-8; 2����GBK; 3����gb2312
	///Ĭ��ֵΪ1
	$inputCharset="3";

	//����֧�������ҳ���ַ.��[bgUrl]����ͬʱΪ�ա������Ǿ��Ե�ַ��
	///���[bgUrl]Ϊ�գ���Ǯ��֧�����Post��[pageUrl]��Ӧ�ĵ�ַ��
	///���[bgUrl]��Ϊ�գ�����[bgUrl]ҳ��ָ����<redirecturl>��ַ��Ϊ�գ���ת��<redirecturl>��Ӧ�ĵ�ַ
	$pageUrl='';
	//$pageUrl=urlencode($pageUrl);

	//����������֧������ĺ�̨��ַ.��[pageUrl]����ͬʱΪ�ա������Ǿ��Ե�ַ��
	///��Ǯͨ�����������ӵķ�ʽ�����׽�����͵�[bgUrl]��Ӧ��ҳ���ַ�����̻�������ɺ������<result>���Ϊ1��ҳ���ת��<redirecturl>��Ӧ�ĵ�ַ��
	///�����Ǯδ���յ�<redirecturl>��Ӧ�ĵ�ַ����Ǯ����֧�����post��[pageUrl]��Ӧ��ҳ�档
	$bgUrl=$array[return_url];
	
	//���ذ汾.�̶�ֵ
	///��Ǯ����ݰ汾�������ö�Ӧ�Ľӿڴ������
	///������汾�Ź̶�Ϊv2.0
	$version="v2.0";

	//��������.�̶�ѡ��ֵ��
	///ֻ��ѡ��1��2��3
	///1�������ģ�2����Ӣ��
	///Ĭ��ֵΪ1
	$language="1";

	//ǩ������.�̶�ֵ
	///1����MD5ǩ��
	///��ǰ�汾�̶�Ϊ1
	$signType="1";	
   
	//֧��������
	///��Ϊ���Ļ�Ӣ���ַ�
	$payerName="$lfjid";

	//֧������ϵ��ʽ����.�̶�ѡ��ֵ
	///ֻ��ѡ��1��2
	///1����Email��2�����ֻ���
	$payerContactType="1";	

	//֧������ϵ��ʽ
	///ֻ��ѡ��Email���ֻ���
	$payerContact="$lfjdb[email]";

	//�̻�������
	///����ĸ�����֡���[-][_]���
	$orderId=$array[numcode];		

	//�������
	///�Է�Ϊ��λ����������������
	///�ȷ�2������0.02Ԫ
	$orderAmount=$array[money]*100;
	
	//�����ύʱ��
	///14λ���֡���[4λ]��[2λ]��[2λ]ʱ[2λ]��[2λ]��[2λ]
	///�磻20080101010101
	$orderTime=date('YmdHis');

	//��Ʒ����
	///��Ϊ���Ļ�Ӣ���ַ�
	$productName=$array[title];

	//��Ʒ����
	///��Ϊ�գ��ǿ�ʱ����Ϊ����
	$productNum="1";

	//��Ʒ����
	///��Ϊ�ַ���������
	$productId="3";

	//��Ʒ����
	$productDesc=$array[content];
	
	//��չ�ֶ�1
	///��֧��������ԭ�����ظ��̻�
	$ext1="99pay";

	//��չ�ֶ�2
	///��֧��������ԭ�����ظ��̻�
	$ext2="";
	
	//֧����ʽ.�̶�ѡ��ֵ
	///ֻ��ѡ��00��10��11��12��13��14
	///00�����֧��������֧��ҳ����ʾ��Ǯ֧�ֵĸ���֧����ʽ���Ƽ�ʹ�ã�10�����п�֧��������֧��ҳ��ֻ��ʾ���п�֧����.11���绰����֧��������֧��ҳ��ֻ��ʾ�绰֧����.12����Ǯ�˻�֧��������֧��ҳ��ֻ��ʾ��Ǯ�˻�֧����.13������֧��������֧��ҳ��ֻ��ʾ����֧����ʽ��.14��B2B֧��������֧��ҳ��ֻ��ʾB2B֧��������Ҫ���Ǯ���뿪ͨ����ʹ�ã�
	$payType="00";

	//���д���
	///ʵ��ֱ����ת������ҳ��ȥ֧��,ֻ��payType=10ʱ�������ò���
	///�������μ� �ӿ��ĵ����д����б�
	$bankId="";

	//��Ǯ�ĺ��������˻���
	///��δ�Ϳ�Ǯǩ���������Э�飬����Ҫ��д������
	$pid=""; ///��������ڿ�Ǯ���û����


   
	//���ɼ���ǩ����
	///����ذ�������˳��͹�����ɼ��ܴ���
	$signMsgVal=appendParam($signMsgVal,"inputCharset",$inputCharset);
	$signMsgVal=appendParam($signMsgVal,"pageUrl",$pageUrl);
	$signMsgVal=appendParam($signMsgVal,"bgUrl",$bgUrl);
	$signMsgVal=appendParam($signMsgVal,"version",$version);
	$signMsgVal=appendParam($signMsgVal,"language",$language);
	$signMsgVal=appendParam($signMsgVal,"signType",$signType);
	$signMsgVal=appendParam($signMsgVal,"merchantAcctId",$merchantAcctId);
	$signMsgVal=appendParam($signMsgVal,"payerName",$payerName);
	$signMsgVal=appendParam($signMsgVal,"payerContactType",$payerContactType);
	$signMsgVal=appendParam($signMsgVal,"payerContact",$payerContact);
	$signMsgVal=appendParam($signMsgVal,"orderId",$orderId);
	$signMsgVal=appendParam($signMsgVal,"orderAmount",$orderAmount);
	$signMsgVal=appendParam($signMsgVal,"orderTime",$orderTime);
	$signMsgVal=appendParam($signMsgVal,"productName",$productName);
	$signMsgVal=appendParam($signMsgVal,"productNum",$productNum);
	$signMsgVal=appendParam($signMsgVal,"productId",$productId);
	$signMsgVal=appendParam($signMsgVal,"productDesc",$productDesc);
	$signMsgVal=appendParam($signMsgVal,"ext1",$ext1);
	$signMsgVal=appendParam($signMsgVal,"ext2",$ext2);
	$signMsgVal=appendParam($signMsgVal,"payType",$payType);	
	$signMsgVal=appendParam($signMsgVal,"bankId",$bankId);
	$signMsgVal=appendParam($signMsgVal,"pid",$pid);
	$geturl=$signMsgVal;
	$signMsgVal=appendParam($signMsgVal,"key",$key);	
	$signMsg= strtoupper(md5($signMsgVal));
	header("location:https://www.99bill.com/gateway/recvMerchantInfoAction.htm?$geturl&signMsg=$signMsg");
	exit;
}

//���ܺ�����������ֵ��Ϊ�յĲ�������ַ���
Function appendParam($returnStr,$paramId,$paramValue){

	if($returnStr!=""){
			
		if($paramValue!=""){
					
			$returnStr.="&".$paramId."=".$paramValue;
		}
			
	}else{
		
		If($paramValue!=""){
			$returnStr=$paramId."=".$paramValue;
		}
	}
		
	return $returnStr;
}

?>