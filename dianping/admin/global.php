<?php
function_exists('html') OR exit('ERR');

define('Mdirname', preg_replace("/(.*)\/([^\/]+)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );
define('Mpath', preg_replace("/(.*)\/([^\/]+)\/([^\/]+)/is","\\1/\\2/",str_replace("\\","/",dirname(__FILE__))) );

define('Madmindir', preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );


$Mpath = Mpath;
define('Adminpath',dirname(__FILE__).'/');

require(Mpath."data/config.php");
require(Mpath."inc/function.php");
require_once(Mpath."data/all_fid.php");
require_once(Mpath."inc/module.class.php");

$Murl=$webdb[www_url].'/'.Mdirname;
$_pre="{$pre}{$webdb[module_pre]}";					//���ݱ�ǰ׺
$Module_db=new Module_Field();						//�Զ���ģ�����

$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;



?>