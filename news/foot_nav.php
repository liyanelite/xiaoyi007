<?php
require_once(dirname(__FILE__)."/global.php");
@include(dirname(__FILE__)."/data/guide_fid.php");

$forum_ups="<A HREF='$Murl/'>��ҳ</A>".$GuideFid[$fid];
require_once(getTpl("foot_nav"));
?>