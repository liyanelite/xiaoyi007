<?php
if(!function_exists('html')){
	die('F');
}

$cityname=str_replace("��","",$city_DB[name][$cityid]);


//require_once(ROOT_PATH."inc/pinyin.php");
//$cityname=change2pinyin($cityname,0);

$cityname || $cityname='guangzhou';	//Ĭ��Ϊ����

print<<<EOT

<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="text/html; charset=GB2312"/>
<meta name="keywords" content="LTEZMarker,JavaScript,��ͼ,51ditu EZMarker API,��ͼ,�����ĵ�,vml"/>
<title>ʹ��ֱ����ʾ��ҳ���ϵ�ezmarker-��ͼ51ditu Maps API����</title>
<style type="text/css">v\:*{behavior:url(#default#VML);}</style>
<script language="javascript" src="http://api.51ditu.com/js/maps.js"></script>
<script language="javascript" src="http://api.51ditu.com/js/ezmarker.js"></script>

</head>
<body>



	<div id="mapDiv" style="position:absolute;width:600px; height:400px;">
	</div>
<script language="javascript">
var ezmarker=new LTEZMarker("ezmarker",1,document.getElementById("mapDiv"));	//����һ��ezmarker
ezmarker.setDefaultView("$cityname",4);//����ezmarker��ͼ��Ĭ����ͼλ�õ�����

function setMap(point,zoom){
	window.opener.document.getElementById('$mapid').value=point.getLongitude()+','+point.getLatitude();
	window.self.close();
//document.getElementById("x").value=point.getLongitude();
//document.getElementById("y").value=point.getLatitude();
//document.getElementById("z").value=zoom;
}

LTEvent.addListener(ezmarker,"mark",setMap);
</script>
	 

</BODY>
</HTML>


EOT;
?>