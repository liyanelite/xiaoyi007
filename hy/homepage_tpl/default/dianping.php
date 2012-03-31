<?php
unset($listdb);

function setfen($name,$title,$set){
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		$d=explode("=",$value);
		$shows.="<option value='$d[0]' style='color:blue;'>$d[1]</option>";
	}
	$shows=" <select name='$name' id='$name'><option value=''>-{$title}-</option>$shows</select>";
	//$shows="{$title}:<select name='$name' id='$name'><option value=''>请选择</option>$shows</select>";
	return $shows;
}



	$fen1=setfen("fen1",$fendb[fen1][name],$fendb[fen1][set]);
	$fen2=setfen("fen2",$fendb[fen2][name],$fendb[fen2][set]);
	$fen3=setfen("fen3",$fendb[fen3][name],$fendb[fen3][set]);
	$fen4=setfen("fen4",$fendb[fen4][name],$fendb[fen4][set]);
	$fen5=setfen("fen5",$fendb[fen5][name],$fendb[fen5][set]);



?>


<!--
<?php
print <<<EOT
-->
<style type="text/css">
#comment .info{
	background:#F5F5F5;
	border-bottom:1px solid #ccc;
}
#comment .listdianping{
	margin-bottom:5px;
}
#comment .c3{
	color:#F37601;
}
#comment .fen_show{
	color:#7D94B5;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="rightinfo">
  <tr>
    <td  class="head">
	<span class='L'></span>
	<span class='T'>顾客点评({$rsdb[dianping]})</span>
	<span class='R'></span>
	<span class='more'><a href='$Mdomain/homepage.php?uid=$uid&m=msg#do' >我要点评</a></span>

	
	</td>
  </tr>
  <tr>
    <td class="content" id="wydianping"><div id="comment"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" id="posttbale">
                     
                    <!--
EOT;
if($lfjid){$none='none';}
print <<<EOT
--><tr style="display:$none;">
					  <td width="16%"><span class="L">称　　呼:</span><span class="R"></span></td><td width="84%"><span class="R"> 
                        <input type="text" name="textfield2" id="comment_username" value="$lfjid">
                        </span></td>
                    </tr>
                    
					  
                   
                    <tr> 
                      <td width="10%"><span class="L">点　　评:</span><span class="R"></span></td>
                      <td width="90%"><span class="R"> {$fen1} {$fen2} {$fen3} 
                        {$fen4} </span></td>
                    </tr>
                    
                    <!--
EOT;
if(!$web_admin){
$webdb[yzImgComment]=1;
print <<<EOT
-->
                    <tr> 
                      <td width="16%"><span class="L">验 证 码:</span></td>
                      <td width="84%"> 
                        <input id="yzImgNum" type="text" name="yzimg" size="8" onFocus="commentyzimg()">
						<SCRIPT LANGUAGE="JavaScript">
<!--
function commentyzimg(){
	if(/yzimg\.php/.test(document.getElementById("yz_Img").src)==false){
		document.getElementById("yz_Img").style.display='';
		document.getElementById("yz_Img").src='$webdb[www_url]/do/yzimg.php?'+Math.random();
	}
	
}

document.write('<img border="0" id="yz_Img" name="imageField" onclick="this.src=this.src+Math.random();" src="" style="display:none;">');
//-->
</SCRIPT>
                         
                      </td>
                    </tr>
                    <!--
EOT;
}
print <<<EOT
-->
                    <tr> 
                      <td width="16%"><span class="L">内　　容:</span></td>
                      <td width="84%"><span class="R"> 
                        <textarea name="textfield" cols="70" rows="8" id="comment_content" onKeyDown="quickpost(event)"></textarea>
                        </span></td>
                    </tr>
<!--
EOT;
if($fendb[fen5][set]&&$fendb[fen5][name]){
print <<<EOT
-->
                    <tr> 
                      <td width="10%"><span class="L">{$fendb[fen5][name]}:</span><span class="R"></span></td>
                      <td width="90%"><span class="R"> 
                        <!--
EOT;
$detail=explode("\r\n",$fendb[fen5][set]);
foreach($detail AS $key=>$value){
$d=explode("=",$value);
print <<<EOT
-->
                        <input type="radio" name="fen5" value="$d[0]" style="border:0px;">
                        $d[1] 
                        <!-- 
EOT;
}
print <<<EOT
-->
                        </span></td>
                    </tr>
<!-- 
EOT;
}
print <<<EOT
-->
                    <tr> 
                      <td width="16%">人均消费:</td>
                      <td width="84%"> 
                        <input type="text" name="textfield4" size="5" id="c_price">
                        元/人 </td>
                    </tr>
                    
                        <!--
EOT;
if($fendb[fen6][set]&&$fendb[fen6][name]){
print <<<EOT
-->
					<tr>
                      <td width="16%"><span class="L">{$fendb[fen6][name]}</span>:</td>
                      <td width="84%"> <span class="R">
                        <!--
EOT;
$detail=explode("\r\n",$fendb[fen6][set]);
foreach($detail AS $key=>$value){
print <<<EOT
-->
                        <input type="checkbox" name="fen6" value="$value" style="border:0px;">
                        $value 
                        <!-- 
EOT;
}
print <<<EOT
-->
                        </span>
</td>
                    </tr>
<!-- 
EOT;
}
print <<<EOT
-->      

					
                   <tr> 
                      <td width="16%"> 
                        <script language="JavaScript">
<!--

getcomment("$Mdomain/job.php?job=dianping_ajax&fid=$fid&id=$uid");
cnt = 0;
function quickpost(event)
{
	if((event.ctrlKey && event.keyCode == 13)||(event.altKey && event.keyCode == 83))
	{
		cnt++;
		if (cnt==1){
			post_comment();
		}else{
			alert('内容正在提交...');
		}
	}	
}

function post_comment(){
	value='';
	fen6_v=',';
	if(document.getElementById("fen1")!=null){
		value="&fen1="+document.getElementById("fen1").options[document.getElementById("fen1").selectedIndex].value;
		value+="&fen2="+document.getElementById("fen2").options[document.getElementById("fen2").selectedIndex].value;
		value+="&fen3="+document.getElementById("fen3").options[document.getElementById("fen3").selectedIndex].value;
		value+="&fen4="+document.getElementById("fen4").options[document.getElementById("fen4").selectedIndex].value;
		oo=document.body.getElementsByTagName('input');
		for(var i=0;i<oo.length;i++){
			if(oo[i].name=='fen5'){
				if(oo[i].checked==true){
					value+="&fen5="+oo[i].value;
				}
			}else if(oo[i].name=='fen6'){
				if(oo[i].checked==true){
					fen6_v+=oo[i].value+',';
				}
			}
		}
	}
	value+="&c_price="+document.getElementById("c_price").value;
	//value+="&c_keywords="+document.getElementById("c_keywords").value;
	if(document.getElementById("c_keywords2")!=null){
		//value+="&c_keywords2="+document.getElementById("c_keywords2").value;
	}
	postcomment('$Mdomain/job.php?job=dianping_ajax&action=post&fid=$fid&id=$uid'+value+"&fen6="+fen6_v,'$webdb[yzImgComment]');
	
	if(document.getElementById("yz_Img")!=null){
		document.getElementById("yz_Img").src='';
		document.getElementById("yz_Img").style.display='none';
	}
	

}
//-->
</script>
                      </td>
                      <td width="84%"><span class="R"> 
                        <input type="button" id="comment_submit" name="Submit" value="提交" onClick="post_comment();">
                        </span></td>
                    </tr>
                  </table>
                
	 
        </td>
  </tr>
</table>
 
<!--
EOT;
?>
-->