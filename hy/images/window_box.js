/********************
 * ȡ���ڹ������߶� 
 ******************/
function getScrollTop()
{
	var scrollTop=0;
	if(document.documentElement&&document.documentElement.scrollTop)
	{
		scrollTop=document.documentElement.scrollTop;
	}
	else if(document.body)
	{
		scrollTop=document.body.scrollTop;
	}
	return scrollTop;
}
/********************
 * ȡ���ڿ��ӷ�Χ�ĸ߶� 
 *******************/
function getClientHeight()
{
	var clientHeight=0;
	if(document.body.clientHeight&&document.documentElement.clientHeight)
	{
		var clientHeight = (document.body.clientHeight<document.documentElement.clientHeight)?document.body.clientHeight:document.documentElement.clientHeight;		
	}
	else
	{
		var clientHeight = (document.body.clientHeight>document.documentElement.clientHeight)?document.body.clientHeight:document.documentElement.clientHeight;	
	}
	return clientHeight;
}

/********************
 * ȡ�ĵ�����ʵ�ʸ߶� 
 *******************/
function getScrollHeight()
{
	return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight);
}

function showLightBox(msg,style,width,height)
{
		
	if(width<200) width=200;
	if(height<50) height=50;
	var scrollTop=getScrollTop();
	var clientHeight=getClientHeight();
	var scrollHeight=getScrollHeight();
	
	var overlay = document.createElement("div");
	overlay.className = "overlay";
	overlay.id = "all_page_div";
	overlay.style.height = scrollHeight+'px';
	
	var overlay2 = document.createElement("div");
	overlay2.className = style;
	overlay2.style.left = (document.body.clientWidth-width)/2+'px';
	overlay2.style.top = scrollTop+(clientHeight-height)/2+'px';	
	if(width>document.body.clientWidth) width=document.body.clientWidth;

	
	overlay2.style.width=width+"px";
	overlay2.style.height=height+"px";

	overlay.onclick = function (){
		document.body.removeChild(overlay2);
		document.body.removeChild(overlay);
		};
		
	/*overlay2.onclick = function (){
		document.body.removeChild(overlay2);
		document.body.removeChild(overlay);
		};*/

	
	overlay2.innerHTML="<div class='Boxtitle'><font style='cursor:hand;' onclick=\"unshowLightBox();\">[<b>�ر���ҳ�Ի���</b>] ����ܱ߰�����ɹر�</font></div><div class='Boxcontent'>"+msg+"</div>";

	document.body.appendChild(overlay);	
	document.body.appendChild(overlay2);
}

function unshowLightBox()
{
	try{
	document.getElementById('all_page_div').click();
	}catch(e){
		
	}
}