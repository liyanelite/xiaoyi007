<?php
//���¹�˾����
if(!$step){
	@extract($intro=$db->get_one("SELECT * FROM `{$_pre}company` WHERE `uid`='$uid'"));
	//��ʵ��ַ��ԭ
	$content=En_TruePath($content,0);
	$content=editor_replace($content);
	$rsdb[bd_pics]=$intro[bd_pics];
}else{
	if(!$content){
		showerr("���ݲ���Ϊ��");
	}
	
	$content = preg_replace('/javascript/i','java script',$content);//����js����
	$content = preg_replace('/<iframe ([^<>]+)>/i','&lt;iframe \\1>',$content);//���˿�ܴ���
	$content=En_TruePath($content,1);
	$db->query("UPDATE `{$_pre}company` SET 
	`content`='$content'
	WHERE uid='$uid'");

	//���°�ͼƬ	
	bd_pics("{$_pre}company","WHERE  uid='$uid'");
	
	refreshto("?uid=$uid&atn=$atn","�޸ĳɹ�");
	
}

?>