<?php
include 'dbinfo.php';
include 'functions.php';
include 'config.php';
?>
<?php 
if (isset ( $_POST ['signup'] )) {
	if($_POST ['repassword']==$_POST ['password'])
	{
		$Error=SignUpUser ( $_POST ['blogname'], $_POST ['username'], $_POST ['password'],$_POST ['email'],$_POST ['realname'] );
		if (!$Error)
		{
			loginuser ( $_POST ['username'], $_POST ['password'] );
		}
	}else{
		$Error='رمز عبور را دوباره وارد کنید';
	}
}
mysql_close ( $db_handle );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<Form Method="POST" action="signup.php">
  <p align="center">
    <?php if ($Error){print $Error;}else{print'!اطلاعات شما کاربر جدید'; }?>
  </p>
  <table width="100%" border="0" dir="rtl">
    <tr>
      <td width="50%" height="30"><div align="left">اسمتون : </div></td>
      <td width="100%" height="30"><input type="text" name="username"></td>
    </tr>
    <tr>
      <td width="50%"><div align="left">رمزتون : </div></td>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <td width="50%"><div align="left">دوباره رمزتون : </div></td>
      <td><input type="password" name="repassword"></td>
    </tr>
    <tr>
      <td width="50%"><div align="left">نام وبلاگتون : </div></td>
      <td><input type="text" name="blogname"></td>
    </tr>
    <tr>
      <td width="50%"><div align="left">Eمیلتون : </div></td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td width="50%"><div align="left">اسم واقعیتون : </div></td>
      <td><input type="text" name="realname"></td>
    </tr>
    <tr>
      <td width="50%"><div align="left">
        <p>نمایش چند ارسال در </p>
        <p>هر صفحه از وبلاگتون؟ </p>
      </div></td>
      <td><input name="postperpage" type="text" value="10"></td>
    </tr>
  </table>
		
 	<center><input type="submit" name="signup"	value="تایید و عضویت">
 	</center>
  
</Form>
</body>
</html>
