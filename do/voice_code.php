<?PHP
require(dirname(__FILE__)."/"."global.php");


header('Content-type: audio/mpeg');

//�������
list($usec, $sec) = explode(' ', microtime());
$randtime =  (float) $sec + ((float) $usec * 100000);
srand($randtime);
//�����֤��
$authnum = '';
$str = 'efhklmnopqrstuvwxyz';
$l = strlen($str);
for($i=1;$i<=4;$i++)
{
	$num=rand(0,$l);
	$authnum.= $str[$num];
}
//ת���ַ������������������
$code = strval($authnum);
$db->query("REPLACE INTO `{$pre}yzimg` ( `sid` , `imgnum` , `posttime` ) VALUES ('$usr_sid', '$code', '$timestamp')");
for($i=0;$i<strlen($code);$i++)
{
	$soundNum = $code[$i];
	readfile(ROOT_PATH."images/default/sound/$soundNum.mp3");
}
?>
