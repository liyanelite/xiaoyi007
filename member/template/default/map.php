<?php
$pmword = $pmNUM ? "<a href=\"pm.php?job=list\" style=\"color:red;\">�����µ���Ϣ,��ע�����!!</a>" : "<a href=\"pm.php?job=list\" style=\"color:#888;\">����ʱû������Ϣ!</a>";
//�ҵķ�����Ϣ
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}fenlei_content WHERE uid='$lfjuid'");
$data[fenlei_num]=$rt[num];
//�ҵ���Ʒ
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}shop_content WHERE uid='$lfjuid'");
$data[shop_num]=$rt[num];
//�ҵ��Ź�
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}tuangou_content WHERE uid='$lfjuid'");
$data[tuangou_num]=$rt[num];
//�ҵĴ���
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}coupon_content WHERE uid='$lfjuid'");
$data[coupon_num]=$rt[num];
//�������ְλ
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}hr_apply WHERE uid='$lfjuid'");
$data[hr_apply_num]=$rt[num];
//�ҵ�ְλ
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}hr_content WHERE uid='$lfjuid'");
$data[hr_num]=$rt[num];
//�ҵ�����
$rt=$db->get_one("SELECT COUNT(*) AS num FROM {$pre}news_content WHERE uid='$lfjuid'");
$data[article]=$rt[num];
?>