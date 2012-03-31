/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.language = 'zh-cn';
	config.skin = 'v2';
	//config.toolbar = 'Full';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.scayt_autoStartup = false;	//去除拼写检查（波浪线）
	// config.uiColor = '#AADC6E';
	config.toolbar = 
		[
		['Source','-','Preview','-','Templates'], 
		['Cut','Copy','Paste','PasteText','PasteFromWord'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'], 
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'], 
		['NumberedList','BulletedList','-','Outdent','Indent'], 
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], 
		['Link','Unlink'], 
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'], 
		['Styles','Format','Font','FontSize'], 
		['TextColor','BGColor'], 
		['Maximize', 'ShowBlocks','-','About'] 
		];

};



/*
config.toolbar = 
[
['Source','-','Save','NewPage','Preview','-','Templates'], 
['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'], 
['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'], 

['Bold','Italic','Underline','Strike','-','Subscript','Superscript'], 
['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'], 
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], 
['Link','Unlink','Anchor'], 
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'], 
['Styles','Format','Font','FontSize'], 
['TextColor','BGColor'], 
['Maximize', 'ShowBlocks','-','About'] 
];
*/