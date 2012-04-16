<?php
include 'dbinfo.php';
include 'functions.php';
include 'config.php';
?>
<?php

if (isset ( $_POST ['newadded'] )) {
	Submitpost ( $_SESSION ['userblogname'], $_POST ['txtTitle'], $_POST ['txtContent'] );
	header ( "Location: userpage.php" );
}

if (isset ( $_POST ['edited'] )) {
	$post_id = $_SESSION ['idtoedit'];
	$post_subj = $_POST ['txtTitle'];
	$post_value = $_POST ['txtContent'];

	$SQL = "SELECT * FROM posts JOIN blogs ON(post_blogid=blogs.ID) WHERE posts.ID='{$post_id}' AND blogname='{$_SESSION ['userblogname']}'";
	$result = mysql_query ( $SQL );
	if ($db_field = mysql_fetch_assoc ( $result )) {
		$SQL = "UPDATE posts SET  post_subject='{$post_subj}' ,post_value='{$post_value}' WHERE ID='{$post_id}'";
		$result = mysql_query ( $SQL );
	}
	header ( "Location: userpage.php" );
}

if (isset ( $_GET ['postid'] )) {
		if ($_GET ['postid'] == 'last') {
		$SQL = "SELECT post_value,post_subject,posts.ID FROM posts JOIN blogs ON(post_blogid=blogs.ID) WHERE blogname='{$_SESSION ['userblogname']}' ORDER BY posts.ID DESC LIMIT 1";
		 
	} else {
		$SQL = "SELECT post_value,post_subject,posts.ID FROM posts JOIN blogs ON(post_blogid=blogs.ID) WHERE posts.ID='{$_GET ['postid']}' AND blogname='{$_SESSION ['userblogname']}'";
	}
	
	$result = mysql_query ( $SQL );
	if ($db_field = mysql_fetch_assoc ( $result )) {
		$_SESSION ['idtoedit'] = $db_field['ID'];
	} else {
		header ( "Location: userpage.php" );
	}
}

mysql_close ( $db_handle );
?>
<form name="frmPost" method="post" action="post.php" id="frmPost">
<div class="box" style="WIDTH: 598px">
<div class="header">
<div class="title">
  <div align="right">:&#1575;&#1585;&#1587;&#1575;&#1604; &#1580;&#1583;&#1740;&#1583; </div>
</div>
</div>
<div class="content" align="center"><!-- START TABLE -->
<table dir='rtl'
	style="FONT-SIZE: 9pt; FONT-FAMILY: Tahoma; BORDER-COLLAPSE: collapse"
	cellSpacing="1" width="97%" border="0">
	<tr>
		<td style="HEIGHT: 21px" width="100%" height="21"><div align="right">&#1593;&#1606;&#1608;&#1575;&#1606; : 
		    <input
			name="txtTitle" type="text"
			value="<?php echo
			$db_field ['post_subject'];?>" id="txtTitle"
			class="TextBox" style="width: 480px;" />
		  </div></td>
	</tr>
	<tr>
		<td width="100%">
		  <div align="center">
		    <textarea name="txtContent" id="txtContent"
			class="TextBox" style="WIDTH: 580px; HEIGHT: 241px" rows="15"
			cols="67"><?php echo
			$db_field ['post_value'];?></textarea>
	      </div></td>
	</tr>

	<tr>
		<td align="left" width="100%" height="20"><div align="right">
		  <input type="submit"
			name="<?php
			if (isset ( $_GET ['postid'] )) {
				echo 'edited';
			} else {
				echo 'newadded';
			}
			?>"
			value="&#1578;&#1575;&#1740;&#1740;&#1583; &#1608; &#1575;&#1585;&#1587;&#1575;&#1604;" class="oBtn" style="width: 163px;" /> 
		&nbsp;</div></td>
	</tr>
</table>
<!--END TABLE --> <br>
</div>
</div>
</form>
