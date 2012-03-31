<?php
$pmword = $pmNUM ? "<a href=\"pm.php?job=list\" style=\"color:red;\">你有新的消息,请注意查收!!</a>" : "<a href=\"pm.php?job=list\" style=\"color:#888;\">你暂时没有新消息!</a>";
//我的分类信息
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}fenlei_content WHERE uid='$lfjuid'");
$data[fenlei_num]=$rt[num];
//我的商品
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}shop_content WHERE uid='$lfjuid'");
$data[shop_num]=$rt[num];
//我的团购
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}tuangou_content WHERE uid='$lfjuid'");
$data[tuangou_num]=$rt[num];
//我的促销
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}coupon_content WHERE uid='$lfjuid'");
$data[coupon_num]=$rt[num];
//我申请的职位
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}hr_apply WHERE uid='$lfjuid'");
$data[hr_apply_num]=$rt[num];
//我的职位
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}hr_content WHERE uid='$lfjuid'");
$data[hr_num]=$rt[num];
//我的文章
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}news_content WHERE uid='$lfjuid'");
$data[article]=$rt[num];
?>