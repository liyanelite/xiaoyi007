<?php
!function_exists('html') && exit('ERR');
if($action=='mod'){

	unset($SQL);
	$postdb[imgurl]=En_TruePath($imgurl);
	$postdb[imglink]=En_TruePath($imglink);
	$postdb[width]=$width;
	$postdb[height]=$height;
	$code=addslashes(serialize($postdb));
	$div_db[div_w]=$div_w;
	$div_db[div_h]=$div_h;
	$div_db[div_bgcolor]=$div_bgcolor;
	$div=addslashes(serialize($div_db));
	$typesystem=0;



	//�������±�ǩ��
	do_post();

}else{
	


	$rsdb=get_label();
	$div=unserialize($rsdb[divcode]);
	@extract($div);
	$code=unserialize($rsdb[code]);
	@extract($code);
	$rsdb[hide]?$hide_1='checked':$hide_0='checked';
	if($rsdb[js_time]){
		$js_time='checked';
	}
	$div_width && $div_w=$div_width;
	$div_height && $div_h=$div_height;
	$hide=(int)$rsdb[hide];

	$imgurl=En_TruePath($imgurl,0);
	$imglink=En_TruePath($imglink,0);

	$hidedb["$hide"]="checked";

 	require("head.php");
	require("template/label/pic.htm");
	require("foot.php");

}

?>