<?php
	include '../dbinfo.php';
	include '../functions.php';
	include '../config.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<table border="0" style="border-collapse: collapse ;FONT-SIZE: 9pt; FONT-FAMILY: Tahoma" width="570" dir="rtl" cellspacing="1" align="center">
<tr>
<td>
	<?php
	$SQL = "SELECT posts.ID,post_subject,post_date,post_value FROM posts JOIN blogs ON (posts.post_blogid=blogs.ID) WHERE blogs.blogname='{$blogname}'";
	$result = mysql_query ( $SQL );
	while ( $db_field = mysql_fetch_assoc ( $result ) ) {
	include 'onepost.php';
	}
	mysql_close ( $db_handle );?>
	</td>
	</tr>
</table>
</body>
</html>