defaultmode = "divmode";
var text = "";


var js_bits 			='�����ֽ���';
var js_help				='��Ч ���� - ������Ϣ�����Ӧ�Ĵ��밴ť���ɻ����Ӧ��˵������ʾ';
var js_direct			='��Ч ���� - ֱ�Ӳ��������밴ť�󲻳�����ʾ��ֱ�Ӳ�����Ӧ����';
var js_remind			='��Ч ���� - ��ʾ���������밴ť������򵼴��ڰ�������ɴ������';
var js_size_help		='���ִ�С����������ִ�С.�ɱ䷶Χ 1 - 6. 1 Ϊ��С 6 Ϊ���.�÷�:  ';
var js_size				='��С';
var js_font_help		='�����Ǹ�������������.�÷�: ';
var js_font				='Ҫ�������������';
var js_word				='����';
var js_color_help		='��ɫ��������ı���ɫ.  �κ���ɫ�������Ա�ʹ��.�÷�: ';
var js_color			='ѡ�����ɫ��:  ';
var js_bold_help		='�Ӵֱ��ʹ�ı��Ӵ�.�÷�: [b]���ǼӴֵ�����[/b]';
var js_bold				='���ֽ������.';
var js_italic_help		='б����ʹ�ı������Ϊб��.�÷�: [i]����б����[/i]';
var js_italic			='���ֽ���б��';
var js_quote_help		='���ñ������һЩ����.�÷�: [quote]��������[/quote]';
var js_quote			='�����õ�����';
var js_fly_help			='���б��ʹ���ַ���.�÷�: [fly]����Ϊ��������[/fly]';
var js_fly				='��������';
var js_move_help		='�ƶ����ʹ���ֲ����ƶ�Ч��.�÷�: [move]Ҫ�����ƶ�Ч��������[/move]';
var js_move				='Ҫ�����ƶ�Ч��������';
var js_shadow_help		='��Ӱ���ʹ���ֲ�����ӰЧ��.�÷�: [SHADOW=���, ��ɫ, �߽�]Ҫ������ӰЧ��������[/SHADOW]';
var js_shadow			='Ҫ������ӰЧ��������';
var js_glow_help		='���α��ʹ���ֲ�������Ч��.�÷�: [GLOW=���, ��ɫ, �߽�]Ҫ��������Ч��������[/GLOW]';
var js_glow_size		='���ֵĳ��ȡ���ɫ�ͱ߽��С';
var js_glow				='Ҫ��������Ч��������';
var js_align_help		='������ʹ��������, ����ʹ�ı�����롢���С��Ҷ���.�÷�: [align=center|left|right]Ҫ������ı�[/align]';
var js_align_type		='������ʽ���� ��center�� ��ʾ����, ��left�� ��ʾ�����, ��right�� ��ʾ�Ҷ���.';
var js_align_error		='����!����ֻ������ ��center�� �� ��left�� ���� ��right��.';
var js_align			='Ҫ������ı�';
var js_rm				='RM���ֱ�ǲ���һ��RM���ӱ��ʹ�÷���: [rm]http://www.mmcbbs.com/rm/php.rm[/rm]';
var js_img				='ͼƬ��ǲ���ͼƬ�÷�: [img]http://www.mmcbbs.com/image/php.gif[/img]';
var js_wmv				='wmv��ǲ���wmv�÷�: [wmv]http://www.mmcbbs.com/wmv/php.wmv[/wmv]';
var js_url_help			='url���ʹ��url���,����ʹ�����url��ַ�Գ����ӵ���ʽ����������ʾ.ʹ�÷���: [url]url��ַ[/url]';
var js_url_name			='URL ����: ݼݼ��̳(����Ϊ��)';
var js_url				='URL ��ַ';
var js_code_help		='������ʹ�ô�����,����ʹ��ĳ����������� html �ȱ�־���ᱻ�ƻ�.ʹ�÷���: [code]�����Ǵ�������[/code]';
var js_code				='�������';
var js_list_help		='�б��ǽ���һ�����ֻ��������б�.USE: [list][*]item1[*]item2[*]item3[/list]';
var js_list_type		='�б��������� ��a�� ��ʾ��ĸ�б�, ��1�� ��ʾ�����б�, ���ձ�ʾ��ͨ�б�.';
var js_list_error		='����!����ֻ������ ��a������A�� �� ��1�� ��������.';
var js_list				='�б���հױ�ʾ�����б�';
var js_underline_help	='�»��߱�Ǹ����ּ��»���.�÷�: [u]Ҫ���»��ߵ�����[/u]';
var js_underline		='�»�������';
var js_flash			='Flash �������� Flash ����.�÷�: [flash=���,�߶�]Flash �ļ��ĵ�ַ[/flash]';
var js_height			='���,�߶�';
var js_js_replace		='';
var js_search			='��������ѰĿ��ؼ���';
var js_keyword			='�ؼ����滻Ϊ:';


if (defaultmode == "nomode") {
        helpmode = false;
        divmode = false;
        nomode = true;
} else if (defaultmode == "helpmode") {
        helpmode = true;
        divmode = false;
        nomode = false;
} else {
        helpmode = false;
        divmode = true;
        nomode = false;
}
function checkmode(swtch){
        if (swtch == 1){
                nomode = false;
                divmode = false;
                helpmode = true;
                alert(js_help);
        } else if (swtch == 0) {
                helpmode = false;
                divmode = false;
                nomode = true;
                alert(js_direct);
        } else if (swtch == 2) {
                helpmode = false;
                nomode = false;
                divmode = true;
                alert(js_remind);
        }
}
function getActiveText(selectedtext) {
  text = (document.all) ? document.selection.createRange().text : document.getSelection();
  if (selectedtext.createTextRange) {	
    selectedtext.caretPos = document.selection.createRange().duplicate();	
  }
	return true;
}
function submitonce(theform)
{
	if (document.all||document.getElementById)
	{
		for (i=0;i<theform.length;i++)
		{
			var tempobj=theform.elements[i];
			if(tempobj.type.toLowerCase()=="submit"||tempobj.type.toLowerCase()=="reset")
				tempobj.disabled=true;
		}
	}
}
/*
function checklength(theform)
{
	alert(js_bits+theform.atc_content.value.length);
}
*/
function AddText(NewCode) 
{
	if (FORM.content.createTextRange && FORM.content.caretPos) 
	{
		var caretPos = FORM.content.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? NewCode + ' ' : NewCode;
	} 
	else 
	{
		FORM.content.value+=NewCode
	}
	setfocus();
}
function setfocus()
{
  FORM.content.focus();
}


function showsize(size) {
	if (helpmode) {
		alert(js_size_help+"[size="+size+"] "+size+js_word+"[/size]");
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[size="+size+"]"+text+"[/size]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_size+size,js_word);
		if (txt!=null) {
			AddTxt="[size="+size+"]"+txt;
			AddText(AddTxt);
			AddTxt="[/size]";
			AddText(AddTxt);
		}
	}
}

function showfont(font) {
 	if (helpmode){
		alert(js_font_help+" [font="+font+"]"+font+"[/font]");
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[font="+font+"]"+text+"[/font]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_font+font,js_word);
		if (txt!=null) {
			AddTxt="[font="+font+"]"+txt;
			AddText(AddTxt);
			AddTxt="[/font]";
			AddText(AddTxt);
		}
	}
}
function showcolor(color) {
	if (helpmode) {
		alert(js_color_help+"[color="+color+"]"+color+"[/color]");
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[color="+color+"]"+text+"[/color]";
		AddText(AddTxt);
	} else {  
     	txt=prompt(js_color+color,js_word);
		if(txt!=null) {
			AddTxt="[color="+color+"]"+txt;
			AddText(AddTxt);
			AddTxt="[/color]";
			AddText(AddTxt);
		}
	}
}

function bold() {
	if (helpmode) {
		alert(js_bold_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[b]"+text+"[/b]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_bold,js_word);
		if (txt!=null) {
			AddTxt="[b]"+txt;
			AddText(AddTxt);
			AddTxt="[/b]";
			AddText(AddTxt);
		}
	}
}

function italicize() {
	if (helpmode) {
		alert(js_italic_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[i]"+text+"[/i]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_italic,js_word);
		if (txt!=null) {
			AddTxt="[i]"+txt;
			AddText(AddTxt);
			AddTxt="[/i]";
			AddText(AddTxt);
		}
	}
}

function quoteme() {
	if (helpmode){
		alert(js_quote_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[quote]"+text+"[/quote]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_quote,js_word);
		if(txt!=null) {
			AddTxt="[quote]"+txt;
			AddText(AddTxt);
			AddTxt="[/quote]";
			AddText(AddTxt);
		}
	}
}
function setfly() {
 	if (helpmode){
		alert(js_fly_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[fly]"+text+"[/fly]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_fly,js_word);
		if (txt!=null) {
			AddTxt="[fly]"+txt;
			AddText(AddTxt);
			AddTxt="[/fly]";
			AddText(AddTxt);
		}
	}
}

function movesign() {
	if (helpmode) {
		alert(js_move_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[move]"+text+"[/move]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_move,js_word);
		if (txt!=null) {
			AddTxt="[move]"+txt;
			AddText(AddTxt);
			AddTxt="[/move]";
			AddText(AddTxt);
		}
	}
}

function shadow() {
	if (helpmode) {
		alert(js_shadow_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[SHADOW=255,blue,1]"+text+"[/SHADOW]";
		AddText(AddTxt);
	} else {
		headtxt=prompt(js_glow_size,"255,blue,1");
		if (headtxt!=null) {
			txt=prompt(js_shadow,js_word);
			if (txt!=null) {
				if (headtxt=="") {
					AddTxt="[shadow=255, blue, 1]"+txt;
					AddText(AddTxt);
					AddTxt="[/shadow]";
					AddText(AddTxt);
				} else {
					AddTxt="[shadow="+headtxt+"]"+txt;
					AddText(AddTxt);
					AddTxt="[/shadow]";
					AddText(AddTxt);
				}
			}
		}
	}
}

function glow() {
	if (helpmode) {
		alert(js_glow_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[glow=255,red,2]"+text+"[/glow]";
		AddText(AddTxt);
	} else {
		headtxt=prompt(js_glow_size,"255,red,2");
		if (headtxt!=null) {
			txt=prompt(js_glow,js_word);
			if (txt!=null) {
				if (headtxt=="") {
					AddTxt="[glow=255,red,2]"+txt;
					AddText(AddTxt);
					AddTxt="[/glow]";
					AddText(AddTxt);
				} else {
					AddTxt="[glow="+headtxt+"]"+txt;
					AddText(AddTxt);
					AddTxt="[/glow]";
					AddText(AddTxt);
				}
			}
		}
	}
}

function center() {
 	if (helpmode) {
		alert(js_align_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[align=center]"+text+"[/align]";
		AddText(AddTxt);
	} else {
		headtxt=prompt(js_align_type,"center");
		while ((headtxt!="") && (headtxt!="center") && (headtxt!="left") && (headtxt!="right") && (headtxt!=null)) {
			headtxt=prompt(js_align_error,"");
		}
		txt=prompt(js_align,js_word);
		if (txt!=null) {
			AddTxt="\r[align="+headtxt+"]"+txt;
			AddText(AddTxt);
			AddTxt="[/align]";
			AddText(AddTxt);
		}
	}
}

function rming() {
	if (helpmode) {
		alert(js_rm);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[rm]"+text+"[/rm]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_url,"http://");
		if(txt!=null) {
			AddTxt="\r[rm]"+txt;
			AddText(AddTxt);
			AddTxt="[/rm]";
			AddText(AddTxt);
		}
	}
}

function image() {
	if (helpmode){
		alert(js_img);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[img]"+text+"[/img]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_url,"http://");
		if(txt!=null) {
			AddTxt="\r[img]"+txt;
			AddText(AddTxt);
			AddTxt="[/img]";
			AddText(AddTxt);
		}
	}
}

function wmv() {
	if (helpmode){
		alert(js_wmv);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[wmv]"+text+"[/wmv]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_url,"http://");
		if(txt!=null) {
			AddTxt="\r[wmv]"+txt;
			AddText(AddTxt);
			AddTxt="[/wmv]";
			AddText(AddTxt);
		}
	}
}

function showurl() {
 	if (helpmode){
		alert(js_url_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[url="+text+"]"+text+"[/url]";
		AddText(AddTxt);
	} else {
			headtxt=prompt(js_url_name,"");
		if (headtxt!=null) {
			txt=prompt(js_url,"http://");
			if (headtxt!=null) {
				if (headtxt=="") {
					AddTxt="[url]"+txt;
					AddText(AddTxt);
					AddTxt="[/url]";
					AddText(AddTxt);
				} else {
					if(txt==""){
						AddTxt="[url]"+headtxt;
						AddText(AddTxt);
						AddTxt="[/url]";
						AddText(AddTxt);
					} else{
						AddTxt="[url="+txt+"]"+headtxt;
						AddText(AddTxt);
						AddTxt="[/url]";
						AddText(AddTxt);
					}
				}
			}
		}
	}
}

function showcode() {
	if (helpmode) {
		alert(js_code_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="\r\n[code]"+text+"[/code]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_code,"");
		if (txt!=null) { 
			AddTxt="\r[code]"+txt;
			AddText(AddTxt);
			AddTxt="[/code]";
			AddText(AddTxt);
		}
	}
}

function list() {
	if (helpmode) {
		alert(js_list_help);
	} else if (nomode) {
		AddTxt="\r[list]\r[*]\r[*]\r[*]\r[/list]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_list_type,"");
		while ((txt!="") && (txt!="A") && (txt!="a") && (txt!="1") && (txt!=null)) {
			txt=prompt(js_list_error,"");
		}
		if (txt!=null) {
			if (txt==""){
				AddTxt="\r[list]\r\n";
			} else if (txt=="1") {
				AddTxt="\r[list=1]\r\n";
			} else if(txt=="a") {
				AddTxt="\r[list=a]\r\n";
			}
			ltxt="1";
			while ((ltxt!="") && (ltxt!=null)) {
				ltxt=prompt(js_list,"");
				if (ltxt!="") {
					AddTxt+="[*]"+ltxt+"\r";
				}
			}
			AddTxt+="[/list]\r\n";
			AddText(AddTxt);
		}
	}
}
function underline() {
  	if (helpmode) {
		alert(js_underline_help);
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[u]"+text+"[/u]";
		AddText(AddTxt);
	} else {
		txt=prompt(js_underline,js_word);
		if (txt!=null) {
			AddTxt="[u]"+txt;
			AddText(AddTxt);
			AddTxt="[/u]";
			AddText(AddTxt);
		}
	}
}

function setswf() {
 	if (helpmode){
		alert('Flash ����\n���� Flash ����.\n�÷�: [flash=���,�߶�]Flash �ļ��ĵ�ַ[/flash]');
	} else if (nomode || document.selection && document.selection.type == "Text") {
		AddTxt="[flash=400,300]"+text+"[/flash]";
		AddText(AddTxt);
	} else {
			headtxt=prompt("�� ��,�߶�","400,300");
		if (headtxt!=null) {
			txt=prompt('URL ��ַ',"http://");
			if (txt!=null) {
				if (headtxt=="") {
					AddTxt="[flash=400,300]"+txt;
					AddText(AddTxt);
					AddTxt="[/flash]";
					AddText(AddTxt);
				} else {
					AddTxt="[flash="+headtxt+"]"+txt;
					AddText(AddTxt);
					AddTxt="[/flash]";
					AddText(AddTxt);
				}
			}
		}
	}
}

function add_title(addTitle) 
{ 
	var revisedTitle; 
	var currentTitle = document.FORM.atc_title.value; 
	revisedTitle = currentTitle+addTitle; 
	document.FORM.atc_title.value=revisedTitle; 
	document.FORM.atc_title.focus(); 
	return;
}

function Addaction(addTitle)
{ 
	var revisedTitle; 
	var currentTitle = FORM.content.value; revisedTitle = currentTitle+addTitle; FORM.content.value=revisedTitle; FORM.content.focus(); 
	return; 
}

function copytext(theField) 
{
	var tempval=eval("document."+theField);
	tempval.focus();
	tempval.select();
	therange=tempval.createTextRange();
	therange.execCommand("Copy");
}

function replac()
{
	if (helpmode)
	{
		alert(js_replace);
	}
	else
	{
		headtxt=prompt(js_search,"");
		if (headtxt != null)
		{
			if (headtxt != "") 
			{
				txt=prompt(js_keyword,headtxt);
			}
			else
			{
				replac();
			}
			var Rtext = headtxt; var Itext = txt;
			Rtext = new RegExp(Rtext,"g");
			FORM.content.value =FORM.content.value.replace(Rtext,Itext);
		}
	}
}

function addsmile(NewCode) {
  FORM.content.value += ' '+NewCode+' '; 
}