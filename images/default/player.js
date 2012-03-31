var Browser = navigator.userAgent.toLowerCase();
var IF_IE = ((Browser.indexOf("msie") != -1) && (Browser.indexOf("opera") == -1));


function qibo_player(url,width,height,type,ifautostart){
	mp3_RE=/(\.mid|\.mp3|\.wma|\.wav|\.asf|\.aac|\.flac|\.ape)$/i
	avi_RE=/(\.avi|\.avi|\.asf|\.asx|\.wmv|\.mpg|\.mpeg)$/i
	RM_RE=/(\.ra|\.rm|\.ram|\.rmvb)$/i
	SWF_RE=/(\.swf)$/i
	FLV_RE=/(\.flv)$/i
	if (type=='mp3'||mp3_RE.test(url))
	{
		player_avi(url,width,70,ifautostart);
	}
	else if (type=='avi'||type=='wmv'||avi_RE.test(url))
	{
		player_avi(url,width,height,ifautostart);
	}
	else if (type=='rm'||type=='rmvb'||RM_RE.test(url))
	{
		player_rm(url,width,height,ifautostart);
	}
	else if (type=='swf'||type=='flash'||SWF_RE.test(url))
	{
		player_swf(url,width,height);
	}
	else if (type=='flv'||FLV_RE.test(url))
	{
		player_flv(url,width,height,ifautostart);
	}
	else
	{
		document.write("��ý���ļ���ַ:"+url+"����,����֮!!!");
	}
}

function player_rm(url,width,height,ifautostart){
	if (IF_IE) {
		document.write( "<object classid=\"CLSID:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" width=\""+width+"\" height=\""+height+"\"><param name=\"src\" value=\""+url+"\" /><param name=\"controls\" value=\"Imagewindow\" /><param name=\"console\" value=\"clip1\" /><param name=\"autostart\" value=\""+ifautostart+"\" /></object><br /><object classid=\"CLSID:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" width=\""+width+"\" height=\"44\"><param name=\"src\" value=\""+url+"\" /><param name=\"controls\" value=\"ControlPanel,StatusBar\" /><param name=\"console\" value=\"clip1\" /><param name=\"autostart\" value=\""+ifautostart+"\" /></object>");
	} else if (Browser.indexOf('firefox')!=-1) {
		document.write( "<object data=\""+url+"\" type=\"audio/x-pn-realaudio-plugin\" width=\""+width+"\" height=\""+height+"\" autostart=\""+ifautostart+"\" console=\"clip1\" controls=\"Imagewindow\"><embed src=\""+url+"\" type=\"audio/x-pn-realaudio-plugin\" autostart=\""+ifautostart+"\" console=\"clip1\" controls=\"Imagewindow\" width=\""+width+"\" height=\""+height+"\"></embed></object><br /><object data=\""+url+"\" type=\"audio/x-pn-realaudio-plugin\" width=\""+width+"\" height=\"44\" autostart=\""+ifautostart+"\" console=\"clip1\" controls=\"ControlPanel,StatusBar\"><embed src=\""+url+"\" type=\"audio/x-pn-realaudio-plugin\" autostart=\""+ifautostart+"\" console=\"clip1\" controls=\"ControlPanel,StatusBar\" width=\""+width+"\" height=\"44\"></embed></object>");
	} else if (Browser.indexOf('safari')!=-1) {
		document.write( "<object type=\"audio/x-pn-realaudio-plugin\" width=\""+width+"\" height=\""+height+"\"><param name=\"src\" value=\""+url+"\" /><param name=\"controls\" value=\"Imagewindow\" /><param name=\"console\" value=\"clip1\" /><param name=\"autostart\" value=\""+ifautostart+"\" /></object><br /><object type=\"audio/x-pn-realaudio-plugin\" width=\""+width+"\" height=\"44\"><param name=\"src\" value=\""+url+"\" /><param name=\"controls\" value=\"ControlPanel,StatusBar\" /><param name=\"console\" value=\"clip1\" /><param name=\"autostart\" value=\""+ifautostart+"\" /></object>");
	} else {
		document.write( "<object classid=\"clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" width=\""+width+"\" height=\""+height+"\"><param name=\"src\" value=\""+url+"\" /><param name=\"controls\" value=\"Imagewindow\" /><param name=\"console\" value=\"clip1\" /><param name=\"autostart\" value=\""+ifautostart+"\" /><embed src=\""+url+"\" type=\"audio/x-pn-realaudio-plugin\" autostart=\""+ifautostart+"\" console=\"clip1\" controls=\"Imagewindow\" width=\""+width+"\" height=\""+height+"\"></embed></object><br /><object classid=\"clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" width=\""+width+"\" height=\"44\"><param name=\"src\" value=\""+url+"\" /><param name=\"controls\" value=\"ControlPanel\" /><param name=\"console\" value=\"clip1\" /><param name=\"autostart\" value=\""+ifautostart+"\" /><embed src=\""+url+"\" type=\"audio/x-pn-realaudio-plugin\" autostart=\""+ifautostart+"\" console=\"clip1\" controls=\"ControlPanel,StatusBar\" width=\""+width+"\" height=\"44\"></embed></object>");
	}
}
function player_swf(url,width,height,ifautostart){
	if (IF_IE) {
		document.write( "<object classid=\"CLSID:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+width+"\" height=\""+height+"\"><param name=\"src\" value=\""+url+"\" /><param name=\"autostart\" value=\""+ifautostart+"\" /><param name=\"loop\" value=\"true\" /><param name=\"quality\" value=\"high\" /></object>");
	} else {
		document.write( "<object data=\""+url+"\" type=\"application/x-shockwave-flash\" width=\""+width+"\" height=\""+height+"\"><param name=\"autostart\" value=\""+ifautostart+"\" /><param name=\"loop\" value=\"true\" /><param name=\"quality\" value=\"high\" /><EMBED src=\""+url+"\" quality=\"high\" width=\""+width+"\" height=\""+height+"\" TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\"></EMBED></object>");
	}
}

function player_avi(url,width,height,ifautostart) {
	if (height<70) height = 70;
	if (IF_IE) {
		document.write( "<object classid=\"CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95\" width=\""+width+"\" height=\""+height+"\"><param name=\"src\" value=\""+url+"\" /><param name=\"ShowStatusBar\" value=\"true\" /><param name=\"autostart\" value=\""+ifautostart+"\" /></object>");
	} else if (Browser.indexOf('firefox')!=-1) {
		document.write( "<object data=\""+url+"\" type=\"application/x-mplayer2\" width=\""+width+"\" height=\""+height+"\" ShowStatusBar=\"true\"><embed type=\"application/x-mplayer2\" src=\""+url+"\" width=\""+width+"\" height=\""+height+"\" ShowStatusBar=\"true\"></embed></object>");
	} else if (Browser.indexOf('safari')!=-1) {
		document.write( "<object type=\"application/x-mplayer2\" width=\""+width+"\" height=\""+height+"\"><param name=\"src\" value=\""+url+"\" /><param name=\"ShowStatusBar\" value=\"true\" /><param name=\"autostart\" value=\""+ifautostart+"\" /></object>");
	} else {
		document.write( "<object classid=\"CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95\" width=\""+width+"\" height=\""+height+"\"><param name=\"autostart\" value=\""+ifautostart+"\" /><param name=\"src\" value=\""+url+"\" /><param name=\"ShowStatusBar\" value=\"true\" /><embed type=\"application/x-mplayer2\" src=\""+url+"\" width=\""+width+"\" height=\""+height+"\" ShowStatusBar=\"true\"></embed></object>");
	}
}

function player_flv(url,width,height,ifautostart){
	if (ifautostart=='false'||ifautostart=='0')
	{
		ifautostart='0';
	}
	else 
	{
		ifautostart='1';
	}
	var swf_width=width;
	var swf_height=height;
	var IsAutoPlay=ifautostart;
	var BarPosition=1;
	var IsShowBar=1;
	var LogoUrl='';
	var files=url;
	//var www_url='';
		
	document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
	document.write('<param name="movie" value="'+ www_url +'/images/default/player.swf"><param name="quality" value="high"><param name="menu" value="false"><param name="allowFullScreen" value="true" />');
	document.write('<param name="FlashVars" value="vcastr_file='+files+'&vcastr_title=&IsAutoPlay='+IsAutoPlay+'&BarPosition='+BarPosition+'&IsShowBar='+IsShowBar+'&LogoUrl='+LogoUrl+'">');
	document.write('<embed src="'+ www_url +'/images/default/player.swf" allowFullScreen="true" FlashVars="vcastr_file='+files+'&vcastr_title=&IsAutoPlay='+IsAutoPlay+'&BarPosition='+BarPosition+'&IsShowBar='+IsShowBar+'&LogoUrl='+LogoUrl+'" menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>');
}

/*
FLV��������������
����˵�� Ĭ��ֵ 
vcastr_file ����2����ӰƬflv�ļ���ַ���������ʹ��|�ֿ� �� 
vcastr_title ӰƬ������������ʹ��|�ֿ����뷽��2���ʹ�� �� 
vcastr_xml ����3 ����ӰƬflv�ļ���ַ����������ο� http://www.ruochi.com/product/vcastr2/vcastr.xml  vcastr.xml 
IsAutoPlay ӰƬ�Զ����Ų�����0��ʾ���Զ����ţ�1��ʾ�Զ����� 0 
IsContinue ӰƬ�������Ų�����0��ʾ���������ţ�1��ʾ����ѭ���� 1 
IsRandom ӰƬ������Ų�����0��ʾ��������ţ�1��ʾ������� 0 
DefaultVolume Ĭ���������� ��0-100 ����ֵ������ӰƬ��ʼĬ��������С 100 
BarPosition ������λ�ò��� ��0��ʾ��ӰƬ�ϸ�����ʾ��1��ʾ��ӰƬ�·���ʾ 0 
IsShowBar ��������ʾ���� ��0��ʾ����ʾ��1��ʾһֱ��ʾ��2��ʾ�����ͣʱ��ʾ��3��ʾ��ʼ����ʾ�������ͣ����ʾ 2 
BarColor ���ſ�������ɫ����ɫ����0x��ʼ16�������ֱ�ʾ 0x000033 
BarTransparent ���ſ�����͸���� 60 
GlowColor ����ͼ����ɫ����ɫ����0x��ʼ16�������ֱ�ʾ 0x66ff00 
IconColor �����ͣʱ������ɫ����ɫ����0x��ʼ16�������ֱ�ʾ 0xFFFFFF 
TextColor ������������ɫ����ɫ����0x��ʼ16�������ֱ�ʾ 0xFFFFFF 
LogoText ��������Լ���վ���Ƶ���Ϣ(Ӣ��) �� 
LogoUrl ���Դ��ⲿ��ȡlogoͼƬ,ע���Լ�����logo��С,֧��ͼƬ��ʽ��swf��ʽ �� 
EndSwf ӰƬ���Ž�����,���ⲿ��ȡswf�ļ�������������ӰƬ��Ϣ��ӰƬ�������Ϣ�����Լ����� �� 
BeginSwf ӰƬ��ʼ����֮ǰ,���ⲿ��ȡswf�ļ���������ӹ�棬������վ��Ϣ�����Լ����� �� 
IsShowTime �Ƿ���ʾʱ�� : 0��ʾ����ʾʱ�䣬1��ʾ��ʾʱ�� 1 
BufferTime ӰƬ����ʱ�䣬��λ���룩 2 
*/