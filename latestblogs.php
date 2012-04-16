<?php
include 'dbinfo.php';
include 'config.php';
?>
<?php $number=10;?>
<center dir=rtl>بی بلاگ هایی که اخیرا به روز شده اند!</center>
<table border="0" style="border-collapse: collapse ;FONT-SIZE: 9pt; FONT-FAMILY: Tahoma" width="100%" dir="rtl" cellspacing="1" align="center">
	<?php
	$SQL = "SELECT DISTINCT blogname FROM posts JOIN blogs ON (posts.post_blogid=blogs.ID) ORDER BY posts.ID DESC LIMIT $number";
	$result = mysql_query ( $SQL );
	while ( $db_field = mysql_fetch_assoc ( $result ) ) {
	?> 
	<tr bgcolor=<?php if($odd){echo "#99CCFF";}else{echo "#CCCCCC";} $odd=!$odd;  ?> align="center" vAlign="top">
    	<td width="100%" class="bTD" height="18"><span dir=ltr><A href="<?php echo $db_field ['blogname']?>/index.php" ><?php echo $db_field ['blogname']?></A></span></td>
	</tr>
	<?php }
	mysql_close ( $db_handle );?>
</table>