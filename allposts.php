<?php
include 'dbinfo.php';
include 'functions.php';
include 'config.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table border="0" style="border-collapse: collapse ;FONT-SIZE: 9pt; FONT-FAMILY: Tahoma" width="570" dir="rtl" cellspacing="1" align="center">
	<?php
	$SQL = "SELECT posts.ID,post_subject,post_date FROM posts JOIN blogs ON (posts.post_blogid=blogs.ID) WHERE blogs.blogname='{$_SESSION ['userblogname']}'";
	$result = mysql_query ( $SQL );
	while ( $db_field = mysql_fetch_assoc ( $result ) ) {
	?> 
	<tr bgcolor=<?php if($odd){echo "#99CCFF";}else{echo "#CCCCCC";} $odd=!$odd;  ?> align="center" vAlign="top">
    	<td width="120" class="bTD" height="18"><span dir=ltr><?php echo $db_field ['post_date']?></span></td>
		<td width="368" class="bTD" height="18"><?php	echo $db_field ['post_subject']?></td>
		<td width="37" class="bTD" height="18" align="center"><a href="post.php?action=edit&postid=<?php echo $db_field ['ID']?>"><img border="0" src="../images/edit.gif" width="16" height="16" alt="Edit"></a></td>
		<td width="30" class="bTD" height="18" align="center"><a href="deletepost.php?postid=<?php echo $db_field ['ID']?>"> <img border="0" src="../images/delete.gif" width="16" height="16" alt="delete"  ></a></td>
	</tr>
	<?php }
	mysql_close ( $db_handle );?>
</table>
</body>
</html>
