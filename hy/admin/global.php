<?php
function_exists('html') OR exit('ERR');

define('Mdirname', preg_replace("/(.*)\/([^\/]+)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );
define('Mpath', preg_replace("/(.*)\/([^\/]+)\/([^\/]+)/is","\\1/\\2/",str_replace("\\","/",dirname(__FILE__))) );

define('Madmindir', preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );

$Mpath = Mpath;
define('Adminpath',dirname(__FILE__).'/');

require_once(Adminpath."../data/config.php");
$Fid_db = include(Mpath."data/all_fid.php");

$Murl=$webdb[www_url].'/'.Mdirname;
$_pre="{$pre}{$webdb[module_pre]}";					//���ݱ�ǰ׺


$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;

?>