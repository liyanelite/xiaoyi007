<?php
$AD_label=$_AD_label='';
$AD_label['AD_9724']=stripslashes('<SCRIPT LANGUAGE=\'JavaScript\' src=\'http://localhost/qibomenhu/a_d/a_d_s.php?job=js&ad_id=AD_9724\'></SCRIPT>');
$_AD_label['AD_9724']=stripslashes('<SCRIPT LANGUAGE=\"JavaScript\">
function get_roll_cookie(name)
{
	var arr = document.cookie.split(\"; \");
	for(var i = 0;i < arr.length;i++){
		var temp = arr[i].split(\"=\");
		if(temp[0] == name) return unescape(temp[1]);
	}
}

function set_roll_cookie(name,value,expire_hours)
{
	var exp_date = new Date();
	exp_date.setHours(exp_date.getHours() + 0 + expire_hours);
	document.cookie = name + \"=\" +escape(value) + ((expire_hours == null) ? \"\" : \";expires=\" + exp_date.toGMTString()); 
}


var intervalId = null; 

function slideAd(id,nStayTime,sState,nMaxHth,nMinHth)
{ 
				this.stayTime=nStayTime*1000 || 3000; 
				this.maxHeigth=nMaxHth || 100; 
				this.minHeigth=nMinHth || 1; 
				this.state=sState || \"down\" ; 
				var obj = document.getElementById(id); 
				if(intervalId != null)window.clearInterval(intervalId); 
				function openBox()
				{ 
					var h = obj.offsetHeight;
					obj.style.height = ((this.state == \"down\") ? (h + 2) : (h - 2))+\"px\"; 
					if(obj.offsetHeight>this.maxHeigth)
					{ 
						   window.clearInterval(intervalId); 
						   intervalId=window.setInterval(closeBox,this.stayTime); 
					} 
					if (obj.offsetHeight<this.minHeigth)
					{ 
						   window.clearInterval(intervalId); 
						   obj.style.display=\"none\"; 
					} 
				} 
				function closeBox()
				{ 
				    slideAd(id,this.stayTime,\"up\",nMaxHth,nMinHth); 
				} 
				intervalId = window.setInterval(openBox,30); 
}

</SCRIPT><SCRIPT type=text/javascript>
document.write(\"<DIV style=\'HEIGHT: 0px; OVERFLOW: hidden\' id=\'scroll_ad\'><a href=\'http://localhost/qibomenhu/a_d/a_d_s.php?job=jump&id=23&u_id=&url=aHR0cDovL3d3dy5xaWJvc29mdC5jb20v\' target=\'blank\'><img width=\'980\' height=\'90\' src=\'http://localhost/qibomenhu/upload_files/ad/gttls32e.gif\' border=0></a></DIV>\");
var ad = get_roll_cookie(\'scroll_ad\');
if (ad != 1312451955){
	slideAd(\'scroll_ad\',3, \'down\',90, 0); 
	set_roll_cookie(\'scroll_ad\', 1312451955, 24);
}			
</SCRIPT>');
