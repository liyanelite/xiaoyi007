

var AJAX99={
	http_request99:false,
	DivObj99:null,
	waitstate99:null,
	success99:null,
	get:function (divid,url) {
		AJAX99.http_request99 = false;
		AJAX99.DivObj99 = document.getElementById(divid);
		if(window.XMLHttpRequest) { //Mozilla �����
			AJAX99.http_request99 = new XMLHttpRequest();
			if (AJAX99.http_request99.overrideMimeType) {//����MiME���
				AJAX99.http_request99.overrideMimeType('text/xml');
			}
		}else if (window.ActiveXObject) { // IE�����
			try {
				AJAX99.http_request99 = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					AJAX99.http_request99 = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		if (!AJAX99.http_request99) {
			window.alert("���ܴ���XMLHttpRequest����ʵ��.");
			return false;
		}
		AJAX99.http_request99.onreadystatechange = AJAX99.processRequest;
		AJAX99.http_request99.open("GET", url+"&"+Math.random(), true);
		AJAX99.http_request99.send(null);
	},
	post:function (divid,url,postvalue) {
		AJAX99.http_request99 = false;
		AJAX99.DivObj99 = document.getElementById(divid);
		if(window.XMLHttpRequest) { //Mozilla �����
			AJAX99.http_request99 = new XMLHttpRequest();
			if (AJAX99.http_request99.overrideMimeType) {//����MiME���
				AJAX99.http_request99.overrideMimeType('text/xml');
			}
		}else if (window.ActiveXObject) { // IE�����
			try {
				AJAX99.http_request99 = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					AJAX99.http_request99 = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		if (!AJAX99.http_request99) {
			window.alert("���ܴ���XMLHttpRequest����ʵ��.");
			return false;
		}
		AJAX99.http_request99.onreadystatechange = AJAX99.processRequest;
		AJAX99.http_request99.open("POST", url , true);
		AJAX99.http_request99.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		AJAX99.http_request99.send(poststr);
	},
    processRequest:function () {
        if (AJAX99.http_request99.readyState == 4) {
            if (AJAX99.http_request99.status == 200) {
				if(AJAX99.DivObj99!=null){
					AJAX99.DivObj99.innerHTML=AJAX99.http_request99.responseText;
				}
            } else {
                alert("���������ҳ�����쳣��");
            }
        }else{
			if(AJAX99.DivObj99!=null){
				AJAX99.DivObj99.innerHTML='��ȴ�...';
			}
		}
    }
}

function get_div_S(showThisId,fuid,inputid,type,fid,ckfid){
	AJAX99.get(showThisId,file+"?fuid="+fuid+"&inputid="+inputid+"&type="+type+"&fid="+fid+"&ckfid="+ckfid);
}


function showfid_S(showThisId,obj,fuid,inputid,type)
{
	//��Ҫ�Ǵ���ֵ��Ҫ�л�.��Ҫ����һЩ���ڵ�ѡ��
	oo=document.body.getElementsByTagName("span");
	ppck=0;
	for(var i=0;i<oo.length;i++){
		if(oo[i].id==showThisId){
			ppck=1;
		}
		if(ppck==1&&oo[i].getAttribute("divname")==fuid){
			oo[i].style.display='none';
		}
	}
	
	/*
	if (document.getElementById(showThisId)!=null)
	{
		if(document.getElementById(showThisId).innerHTML!='')
		{
			document.getElementById(showThisId).style.display='';
		}
	}
	*/

	for(i=1;i<obj.options.length;i++){
		obj.options[i].style.color='';
		if(i==obj.selectedIndex){
			obj.options[i].style.color='red';
		}
	}
	fid=parseInt(obj.options[obj.selectedIndex].value);
	if(fid>0)
	{
		document.getElementById(inputid).value=fid;
	}
	else
	{
		document.getElementById(inputid).value='';
	}
	if(fid<0){
		fid=-fid;
		get_div_S(showThisId,fuid,inputid,type,fid,'');
	}
	if (document.getElementById(showThisId)!=null)
	{
		if(document.getElementById(showThisId).innerHTML!='')
		{
			document.getElementById(showThisId).style.display='';
		}
	}
}




