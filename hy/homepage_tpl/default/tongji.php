<?php
@extract($db->get_one("SELECT COUNT(*) AS guestbookNUM  FROM {$_pre}guestbook  WHERE cuid='$uid'" ));
?>
<!--
<?php
print <<<EOT
-->   
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="leftinfo">
  <tr>
    <td  class="head">
	<span class='L'></span>
	<span class='T'>ͳ����Ϣ</span>
	<span class='R'></span>
	<span class='more'></span>
	
	</td>
  </tr>
  <tr>
    <td  class="content">

	<li>���ÿ����Թ�:{$guestbookNUM} ��</li>
	<li>��ҳ������:{$rsdb[hits]} ��</li>

	
	</td>
  </tr>
</table>
<!--
EOT;
?>
-->