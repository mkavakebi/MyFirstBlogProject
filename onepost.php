<table border="0" style="border-collapse: collapse ;FONT-SIZE: 9pt; FONT-FAMILY: Tahoma" width="100%" dir="rtl" cellspacing="1" align="center">
	<tr bgcolor=<?php if($odd){echo "#99CCFF";}else{echo "#CCCCCC";} $odd=!$odd;  ?> align="left" vAlign="center">
    	<td width="100%" class="bTD" height="18"><span dir=ltr><B><?php echo $db_field ['post_subject']?></B></td>
	</tr>
	<tr bgcolor=<?php if($odd){echo "#99CCFF";}else{echo "#CCCCCC";} $odd=!$odd;  ?> align="center" vAlign="top">
    	<td width="100%" class="bTD" height="18"><span dir=ltr><?php echo $db_field ['post_value']?></td>
	</tr>
	<?php 
	$SQL = "SELECT COUNT(ID) AS commentcount FROM comments WHERE com_postid='{$db_field ['ID']}'";
	$comment_result = mysql_query ( $SQL );
	$comment_array = mysql_fetch_assoc ( $comment_result ) ;?>
	<tr bgcolor= "#444444" align="center" vAlign="top">
    	<td width="100%" class="bTD" height="18"><span dir=ltr>
    	<?php
    	$num=$comment_array ['commentcount'];
    	if ($num){echo '<A href="../comment.php?id='.$db_field ['ID'].'" style="color:#FFFFFF">'.$num.' comments</A>';}
    	else{echo '<A href="../comment.php?id='.$db_field ['ID'].'" style="color:#FFFFFF">no comments</A>';}?></td>
	</tr>
</table>
<hr>