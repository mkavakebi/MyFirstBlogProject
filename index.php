<?PHP
include 'dbinfo.php';
//include 'functions.php';
include 'config.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style11 {font-size: 120px}
.style17 {color: #FF0000}

a:link, a:visited {text-decoration: none; color: Green}
a:hover {text-decoration: underline; color: red; background: black}

-->
</style>
</head>

<body>
<center>
</center>
<label></label>
<table width="100%" height="200" border="0" style="margin:0 ;padding:0; ">
  <tr>
    <td width="152" rowspan="2" valign="bottom" style="margin:0;padding:0; "><img src="documents.gif" width="150" height="188" align="bottom"></td>
    <th width="50%" height="162" style="line-height:0;" ><?php include 'login.php';?></th>
    <th width="50%"><span class="style11">بی بلاگ </span></th>
  </tr>
  <tr>
    <td width="100%" height="52" colspan="2" valign="bottom" background="desk.gif" style="margin:0;padding:0; "><table width="100%" height="100%" border="0" dir="rtl" style="margin:0 ;padding:0 ">
      <tr>
        <th height="32"><span class="style17">خروج</span></th>
        <th><span class="style17">ورود</span></th>
        <th><span class="style17">درباره ما</span></th>
        <th><span class="style17">ایجاد کاربر</span></th>
        <th><span class="style17">راهنما</span></th>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="100" border="1">
  <tr>
    <td width="148">&nbsp;</td>
    <td width="40%" rowspan="2"><?php
		include ('latestblogs.php');
		?></td>
  <td width="40%" rowspan="2"><?php
		include ('latestposts.php');
		?></td>
  </tr>
  <tr>
    <td width="148">&nbsp;</td>
  </tr>
</table>
</body>
</html>
