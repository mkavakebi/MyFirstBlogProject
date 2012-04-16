<?php
	include 'dbinfo.php';
	include 'functions.php';
	include 'config.php';
?>
<?php
if (isset($_POST['newadded']))
{
	$SQL = "INSERT INTO comments (com_postid,com_date,com_writer,com_value) VALUES ('{$_GET['id']}',NOW(),'{$_POST ['txtTitle']}', '{$_POST ['txtContent']}') ";
	$result = mysql_query ( $SQL );
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<table border="0" style="border-collapse: collapse ;FONT-SIZE: 9pt; FONT-FAMILY: Tahoma" width="570" dir="rtl" cellspacing="1" align="center">

<?php 
	if (isset($_GET['id'])){
	$SQL = "SELECT * FROM comments WHERE com_postid='{$_GET ['id']}'";
	$result = mysql_query ( $SQL );
	while($comment_array = mysql_fetch_assoc ( $result )){?>
	<tr bgcolor= "#444444" align="center" vAlign="top">
    	<td width="100%" class="bTD" height="18"><span dir=ltr> 
    	<?php   echo $comment_array ['com_writer'];?>
    	</td>
	</tr>
	<tr bgcolor= "#595959" align="center" vAlign="top">
    	<td width="100%" class="bTD" height="18"><span dir=ltr> 
    	<?php   echo $comment_array ['com_value'];?>
    	</td>
	</tr>
	<?php }}?>
</table>
<form name="frmPost" method="post" action="comment.php?id=<?php echo $_GET['id'];?>" id="frmPost">
  <div class="box" style="WIDTH: 598px">
    <div class="header">
      <div class="title">
        <div align="right">کامنت جدید : </div>
      </div>
    </div>
    <div class="content" align="center">
      <!-- START TABLE -->
      <table dir='rtl' align="center"
	style="FONT-SIZE: 9pt; FONT-FAMILY: Tahoma; BORDER-COLLAPSE: collapse"
	cellSpacing="1" width="97%" border="0">
        <tr>
          <td style="HEIGHT: 21px" width="100%" height="21"><div align="right">نام شما : 
              <input
			name="txtTitle" type="text"
			value="" id="txtTitle"
			class="TextBox" style="width: 480px;" />
          </div></td>
        </tr>
        <tr>
          <td width="100%">
            <div align="center">
              <textarea name="txtContent" id="txtContent"
			class="TextBox" style="WIDTH: 580px; HEIGHT: 241px" rows="15"
			cols="67"></textarea>
          </div></td>
        </tr>
        <tr>
          <td align="left" width="100%" height="20"><div align="right">
              <input type="submit"
			name="newadded"
			value="تایید و ارسال" class="oBtn" style="width: 163px;" />
&nbsp;</div></td>
        </tr>
      </table>
      <!--END TABLE -->
      <br>
    </div>
  </div>
</form>
