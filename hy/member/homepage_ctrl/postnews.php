<?php
//�������޸�����

if(!$id&&!$web_admin){

	if(!$groupdb[post_news_num]){
		showerr("�������û��鲻����������,�㻹��Ҫ�����Ļ�,������");
	}

	$r=$db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}news WHERE uid='$uid'");
	if($r[NUM]>=$groupdb[post_news_num]){		
		showerr("�������û������������{$groupdb[post_news_num]}������,�㻹��Ҫ�����Ļ�,������,������ɾ��һЩ�ɵ�.");
	}
}

if(!$step){	
	if($id){
		$news=$db->get_one("SELECT * FROM {$_pre}news WHERE id='$id'");
	
		//��ʵ��ַ��ԭ
		$news[content]=En_TruePath($news[content],0);
	}
	$rsdb[bd_pics]=$news[bd_pics];
}else{
	$title=filtrate($title);
	if(strlen($title)<10 || strlen($title)>60) showerr("����ֻ����5-30����");
	if(!$content) showerr("���ݲ���Ϊ��");
	if(strlen($content)>50000) showerr("���ݹ��������50000�ַ�(����HTML����)");
	
	$content = preg_replace('/javascript/i','java script',$content);//����js����
	$content = preg_replace('/<iframe ([^<>]+)>/i','&lt;iframe \\1>',$content);//���˿�ܴ���
	$content =En_TruePath($content,1);

	$rsdb=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid' LIMIT 1");
	if(!$rsdb) showerr("�̼���Ϣδ�Ǽ�");

	if($id){
	
		$db->query("UPDATE `{$_pre}news` SET `title`='$title',`content`='$content' WHERE id='$id'");
	
	}else{
		$db->query("INSERT INTO `{$_pre}news` ( `id` , `title` , `content` , `hits` , `posttime` , `list` , `uid` , `username` ,  `titlecolor` , `fonttype` , `picurl` , `ispic` , `yz` ) VALUES ('', '$title', '$content', '0', '$timestamp', '0', '$uid', '$lfjid',  '', '0', '', '0', '1');");
		$id=$db->insert_id();
	}
	//���°�ͼƬ	
	bd_pics("{$_pre}news"," where id='$id' ");

	refreshto("?uid=$uid&atn=news","�ύ�ɹ�");
}

?>