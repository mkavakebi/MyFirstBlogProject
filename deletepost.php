<?php
include 'dbinfo.php';
include 'functions.php';
include 'config.php';
?>
<?php

if (isset ( $_GET ['postid'] )) {
	
	$SQL = "SELECT * FROM posts JOIN blogs ON (blogs.ID=post_blogid) WHERE posts.ID='{$_GET ['postid']}' AND blogname='{$_SESSION ['userblogname']}'";
	$result = mysql_query ( $SQL );
	if ($db_field = mysql_fetch_assoc ( $result ))
	{
		$SQL = "DELETE FROM posts WHERE ID='{$_GET ['postid']}'";
		$result = mysql_query ( $SQL );
	}
	header ( "Location:userpage.php" );
}
?>