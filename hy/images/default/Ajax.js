<!--

function Ajax(args)
{
	// ��Ϣ��ʾ����ID
	this.MsgID		= "MsgBox_";
	this.MsgIDOpacity	= 100;
	// �����ַ���
	this.ErrorStr 		= null;
	// �����¼�����,����������ʱ����
	this.OnError 		= null;
	// ״̬�¼�����,��״̬�ı�ʱ����
	this.OnState 		= null;
	// ����¼�����,����������ʱ����
	this.OnDownloadEnd 	= null;

	// ������ʾ����
	this.OnErrorOBJ		= null;
	// ״̬��ʾ����
	this.OnStateOBJ 	= null;
	// �����ʾ����
	this.OnDownloadEndOBJ 	= null;

	// XMLHTTP ������������ GET �� POST
	this.method		= "GET";
	// ��Ҫ��ȡ��URL��ַ
	this.URL		= null;
	// ָ��ͬ�����첽��ȡ��ʽ(true Ϊ�첽,false Ϊͬ��)
	this.sync		= true;
	// ��method Ϊ POST ʱ ��Ҫ���͵�����
	this.PostData		= null
	// ���ض�ȡ��ɺ������
	this.RetData 		= null;

	// ����XMLHTTP����
	this.HttpObj 		= this.createXMLHttpRequest();
	if(this.HttpObj == null)
	{
		// ���񴴽�ʧ��ʱ��ֹ����
		return;
	}

	// ��ȡ����
	if(args)
	{
		var iargs = eval(args);
		// ��ȡ�¼����¼�����
		if(iargs.Events)
		{
			
			// ��ȡOnError�¼�
			if(iargs.Events[0].OnError)
			{
				this.OnError		= iargs.Events[0].OnError;
			}
			// ��ȡOnState�¼�
			if(iargs.Events[0].OnState)
			{
				this.OnState		= iargs.Events[0].OnState;
			}
			// ��ȡOnDownloadEnd�¼�
			if(iargs.Events[0].OnDownloadEnd)
			{
				this.OnDownloadEnd	= iargs.Events[0].OnDownloadEnd;
			}
		}

		// ��ȡ����
		if(iargs.Vessels)
		{
			
			// ��ȡError����
			if(document.getElementById(iargs.Vessels[0].OnErrorOBJ))
			{
				this.OnErrorOBJ 	= document.getElementById(iargs.Vessels[0].OnErrorOBJ);
			}
			// ��ȡState����
			if(document.getElementById(iargs.Vessels[0].OnStateOBJ))
			{
				this.OnStateOBJ 	= document.getElementById(iargs.Vessels[0].OnStateOBJ);
			}
			// ��ȡDownloadEnd����
			if(document.getElementById(iargs.Vessels[0].OnDownloadEndOBJ))
			{
				this.OnDownloadEndOBJ	= document.getElementById(iargs.Vessels[0].OnDownloadEndOBJ);
			}
		}


		// ��ȡ�������
		if(iargs.Sender)
		{
			if(iargs.Sender[0].Method)
			{
				this.method	= iargs.Sender[0].Method;
			}

			if(iargs.Sender[0].URL)
			{
				this.URL	= iargs.Sender[0].URL;
			}

			if(iargs.Sender[0].Sync)
			{
				this.Sync	= iargs.Sender[0].Sync;
			}

				
			if(iargs.Sender[0].PostData)
			{
				this.PostData	= iargs.Sender[0].PostData;
			}

			var RxURL = /^http:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?$/;
			if(RxURL.test(this.URL))
			{
				this.send();
			}
		}

	}

	var Obj = this;
	// �����¼����
	this.HttpObj.onreadystatechange = function()
	{
		Ajax.handleStateChange(Obj);
	}
}

// ��Ϣ��ʾ
Ajax.prototype.MsgBox = function(strMsg)
{
	var Msg = "<table id=\""+ this.MsgID +"\" style=\"width: 100%;height: 100%;background-color: #ffffff;border: 0px solid #a9a9a9;color: #c0c0c0;font-size:12px;text-align: center;filter:alpha(opacity=100);\">";
	    Msg+= "<tr><td align=\"center\">"+ strMsg + "</td></tr>";
	    Msg+= "</table>";

	return Msg;
}

// UTF ת�� GB (by:Rimifon)
Ajax.prototype.UTFTOGB = function(strBody)
{
	var Rec=new ActiveXObject("ADODB.RecordSet");
	Rec.Fields.Append("DDD",201,1);
	Rec.Open();
	Rec.AddNew();
	Rec(0).AppendChunk(strBody);
	Rec.Update();
	var HTML=Rec(0).Value;
	Rec.Close();
	delete Rec;
	return(HTML);
}

// ����XMLHTTP����
Ajax.prototype.createXMLHttpRequest = function()
{
	if (window.XMLHttpRequest) 
	{ 
		//Mozilla �����
		return new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
        	var msxmls = new Array('Msxml2.XMLHTTP.5.0','Msxml2.XMLHTTP.4.0','Msxml2.XMLHTTP.3.0','Msxml2.XMLHTTP','Microsoft.XMLHTTP');
        	for (var i = 0; i < msxmls.length; i++)
        	{
                	try 
                	{
                        	return new ActiveXObject(msxmls[i]);
                	}catch (e){}

		}
	}
    	return null;
}

// ����HTTP����
Ajax.prototype.send = function()
{

	this.MsgID = this.MsgID + ((new Date()).getTime()).toString();

	if(this.HttpObj == null)
	{
		// ���񴴽�ʧ��ʱ��ֹ����
		this.ErrorStr = "����������֧��XMLHttpRequest����"
		// ��Ӧ�������¼�
		if(this.OnError)
		{
			this.OnError(this.ErrorStr);
		}
		// ��Ӧ����������
		if(this.OnErrorOBJ)
		{
			this.OnErrorOBJ.innerHTML = this.MsgBox(this.ErrorStr);
		}
		return;
	}

	if (this.HttpObj !== null)
	{
		this.URL = this.URL + "?t=" + new Date().getTime();
		this.HttpObj.open(this.method, this.URL, this.sync);
		if(this.method.toLocaleUpperCase() == "GET")
		{
			this.HttpObj.send(null);
		}
		else if(this.method.toLocaleUpperCase() == "POST")
		{
			this.HttpObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			this.HttpObj.send(this.PostData);
		}
		else
		{
			this.ErrorStr = "�����[method]���"
			// ��Ӧ�������¼�
			if(this.OnError)
			{
				this.OnError(this.ErrorStr);
			}
			// ��Ӧ����������
			if(this.OnErrorOBJ)
			{
				this.OnErrorOBJ.style.display = "block";
				this.OnErrorOBJ.innerHTML = this.MsgBox(this.ErrorStr);
			}
			return;
		}

	}

}

// ȡ��״̬
Ajax.prototype.GetState = function(State)
{
	var StateValue = null;
	switch (State)
	{
   		case 0:
		StateValue = "δ��ʼ��...";
		break;

   		case 1:
		StateValue = "��ʼ��ȡ����...";
		break;

   		case 2:
		StateValue = "�ѿ�ʼ��ȡ����...";
		break;

   		case 3:
		StateValue = "��ȡ������...";
		break;

   		case 4:
		StateValue = "��ȡ���...";
		break;

   		default: 
		StateValue = "δ��ʼ��...";
		break;
	}
	return (StateValue);
}

// �¼����
Ajax.handleStateChange = function(Obj)
{
	var StateStr = Obj.GetState(Obj.HttpObj.readyState);
	// ��Ӧ��״̬�¼�
	if(Obj.OnState)
	{
		Obj.OnState(StateStr);
	}
	// ��Ӧ��״̬����
	if(Obj.OnStateOBJ)
	{
		Obj.OnStateOBJ.style.display = "block";
		Obj.OnStateOBJ.innerHTML = Obj.MsgBox(StateStr);
	}

	if (Obj.HttpObj.readyState == 4)
	{
		// �ж϶���״̬
            	if (Obj.HttpObj.status == 200) 
                { 
					Obj.RetData = Obj.UTFTOGB(Obj.HttpObj.responseBody);
					// ��Ӧ��DownloadEnd�¼�
					if(Obj.OnDownloadEnd)
					{
						Obj.OnDownloadEnd(Obj.RetData);
					}
					// ��Ӧ��DownloadEnd����
					if(Obj.OnDownloadEndOBJ)
					{
		
						Obj.OnErrorOBJ.style.display = "none";
						Obj.OnStateOBJ.style.display = "none";
						Obj.OnDownloadEndOBJ.style.display = "block";
						Obj.OnDownloadEndOBJ.innerHTML = Obj.RetData;
					}
                        return;
                } 
		else 
		{ 
			Obj.ErrorStr = "���������ҳ�����쳣��"
			// ��Ӧ�������¼�
			if(Obj.OnError)
			{
				Obj.OnError(Obj.ErrorStr);
			}
			// ��Ӧ����������
			if(Obj.OnErrorOBJ)
			{
				Obj.OnErrorOBJ.style.display = "block";
				Obj.OnErrorOBJ.innerHTML = Obj.MsgBox(Obj.ErrorStr);
			}
			return;
		}
	}
}
//-->


<!--

// ����ص��¼�����
function EventError(strValue){
	document.getElementById("Events").value = strValue;
}

// ״̬�ص��¼�����
function EventState(strValue){
	document.getElementById("Events").value = strValue;
}

// ��ɻص��¼�����
function EventDownloadEnd(strValue){
	document.getElementById("Events").value = strValue;
}

function ajax2get(requestfile,data,showdiv){
var A = new Ajax();
// ָ����������
A.OnErrorOBJ 		= document.getElementById(showdiv);
// ָ��״̬����
A.OnStateOBJ 		= document.getElementById(showdiv);
// ָ���������
A.OnDownloadEndOBJ 	= document.getElementById(showdiv);

A.method 	= "POST";
A.URL		= requestfile;
A.Sync		= false;
A.PostData  = data;
A.send();
}
//-->