<?php
//���¹�˾ģ��

unset($homepage_tpl);
if(is_dir($tpl_dir)){
	if ($handle = opendir($tpl_dir)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				if(is_dir($tpl_dir.$file)){
					if(file_exists($tpl_dir.$file."/style.php")){
						@require($tpl_dir.$file."/style.php");
					}
				}
			}
		}
	}
	closedir($handle);	
}else{
	showerr("��վ���Ŀ¼��������ϵ����Ա!");
}

$web_admin && $groupdb['useHomepageStyle']=1;

if(!$step){

	//�̼������ļ�
	$conf=$db->get_one("SELECT * FROM {$_pre}home WHERE uid='$uid'");

	//�б�����
	$conf[listnum]=unserialize($conf[listnum]);	

	//ģ������ left
	$conf[index_left]=explode(",",$conf[index_left]);
	foreach($conf[index_left] as $key){

		if($key) $index_left.="<option value='$key'>".$tpl_left[$key]."</option>";
	}
	foreach($tpl_left as $key=>$val){

		$index_left_hx.="<option value='$key'>$val</option>";
	}

	//ģ������ right
	$conf[index_right]=explode(",",$conf[index_right]);
	foreach($conf[index_right] as $key){
		if($key) $index_right.="<option value='$key' >".$tpl_right[$key]."</option>";
	}
	foreach($tpl_right as $key=>$val){

		$index_right_hx.="<option value='$key'>$val</option>";
	}



	$bodytpl[$conf[bodytpl]]=" checked";
	//���
	$homepage_style="default";
	if($conf[style] && is_dir($tpl_dir.$conf[style])) $homepage_style=$conf[style];



	//��֤����
	$renzheng_show[$conf[renzheng_show]]=" checked";
	
	//��Ա�Զ���˵�
	$head_menu=unserialize($conf[head_menu]);
	$array=$h_menu=array();
	foreach($head_menu AS $key=>$arr){
		$arr[ifshow] = ($arr[ifshow])? 'checked':'';
		$h_menu[$key]=$arr;
		$array[$arr[url]] = true;
	}

	//��һ,������������ʱ,�Զ������µĿ�ѡ�˵�,���,ԭ�˵���ʧʱ,Ҳ�ɷ��㲹��
	$ar=require(Mpath."inc/homepage/menu.php");
	foreach($ar AS $arr){
		if(!$array[$arr[url]]){
			$h_menu[]=$arr;
		}
	}
	
	
}else{
	
	if($conf[style] && !is_dir($tpl_dir.$conf[style]))showerr('��񲻴���!');
	//ͷ���Զ��嵼��
	$head_menu = array();
	arsort($conf[h_order]);
	foreach ($conf[h_order] as $key=>$val){
		if($conf[h_title][$key] && $conf[h_url][$key]){
			$head_menu[$key][title]=filtrate($conf[h_title][$key]);
			$head_menu[$key][url]=filtrate($conf[h_url][$key]);
			$head_menu[$key][order]=$conf[h_order][$key];
			$conf[h_ifshow][$key]=($conf[h_ifshow][$key])?1:0;
			$head_menu[$key][ifshow]=$conf[h_ifshow][$key];
		}
	}
	$head_menu = addslashes(serialize($head_menu));

	$conf[listnum]=addslashes(serialize($conf[listnum]));
	if(count($conf[index_left])<1){
		showerr("���������Ŀ����Ϊ��");
	}
	$conf[index_left]=implode(",",$conf[index_left]);
	if(count($conf[index_right])<1){
		showerr("�����ұ���Ŀ����Ϊ��");
	}
	$conf[index_right]=implode(",",$conf[index_right]);
			
	//���VIP

	if(substr($conf[style],0,3) == 'vip'){
		if(!$groupdb['useHomepageStyle']) showerr("�㲻��ʹ�ô�ģ�壬��������ͨVIP�̼ҷ��� [ <a href='$webdb[www_url]/member/buygroup.php?job=list'>������￪ͨVIP</a> ] ");
	}

	$db->query("UPDATE {$_pre}home SET
	`style`='$conf[style]',
	`head_menu`='$head_menu',
	`index_left`='$conf[index_left]',
	`index_right`='$conf[index_right]',
	`listnum`='$conf[listnum]',
	`bodytpl`='$conf[bodytpl]',
	renzheng_show='$conf[renzheng_show]'
	WHERE uid='$uid'");

	refreshto("?uid=$uid&atn=$atn","���óɹ�",1);
	
}
?>