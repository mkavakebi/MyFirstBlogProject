<?php

include 'dbinfo.php';
include 'functions.php';
include 'config.php';
?>
<?php



if (isset ( $_POST ['Submit'] )) {
	$Error=LoginUser ( $_POST ['username'], $_POST ['password'] );
}else{
	$_SESSION ['login'] = '';
	$_SESSION ['userblogname'] = '';
}

mysql_close ( $db_handle );
?>
<html>
<head>
<title>Login Page</title>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<BODY>
<p align="center">&nbsp;</p>
<center><Form Method="POST" action="login.php" style="line-height:1 ">
<?php if ($Error){print $Error;}else{if (isset ( $_POST ['Submit'] )) { print'Loging In!'; }}?>
<table border="0" dir="rtl">
    <tr align="center">
      <td colspan="3" dir="rtl"><p dir="rtl" >اگر قبلا عضو این سایت بوده اید... </p></td>
      </tr>
    <tr>
      <td height="21" align="left" dir="rtl">اسمتون :</td>
      <td rowspan="2"><div align="right">
          <input name="username" type="text" maxlength="40">
        </div>
          <div align="right">
            <input name="password" type="password" maxlength="40" >
        </div></td>
      <td rowspan="2"><input type="submit" name="Submit"	value="ورود" align="bottom" height="100%"></td>
    </tr>
    <tr>
      <td height="21" align="left" dir="rtl">رمزتون :</td>
    </tr>
  </table>
	<p dir="rtl" style="height:5" >اگر تا به حال عضو این سایت نبوده اید...<br><a href="signup.php" dir="rtl" style="height:5 ;text-decoration:blink ;" >خود را به عنوان کاربر معرفی کنید!</a></p>
</Form></center>
</BODY>
</html>
