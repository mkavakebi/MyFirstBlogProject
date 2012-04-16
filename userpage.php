<?PHP
include 'dbinfo.php';
include 'functions.php';
include 'config.php';

if (! (isset ( $_SESSION ['login'] ) && $_SESSION ['userblogname'] != '')) {
	header ( "Location: login.php" );
}
?>
<?PHP

if ($_GET ['menu'] == 'signout') {
	session_start ();
	session_destroy ();
	header ( "Location:index.php" );
}

mysql_close ( $db_handle );
?>
<html>
<head>
<title>User Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	background-color: #FF8000;
}
a:link, a:visited {text-decoration: none; color: white}
a:hover {text-decoration: underline; color: red; background: black}

-->
</style></head>
<BODY>
<table width="100%" border="0" bgcolor="#000000">
<tr>
		<th width="17%"><A href="profile.php" >صفحه ی مشخصات </A></th>
		<th width="14%"><A href="post.php" >ارسال جدید </A></th>
		<th width="17%"><A href="<?php echo $_SESSION ['userblogname'];?>" style="color:#FFFFFF">مشاهده ی وبلاگ </A></th>
		<th width="18%"><A href="signup.php" >ایجاد وبلاگ جدید</A> </th>
		<th width="15%"><A href="userpage.php?menu=signout"   >اتمام کار </A></th>
</tr>
</table>
<table width="100%" height="506" border="1" bgstyle="color:#FFFFFF">
	<tr>
		<td height="500" bgcolor="#CCCCCC">&nbsp;</td>	
		<th width="120" bgcolor="#333333">	  <table width="100%" height="100%" border="1">
          <tr>
            <th><A href="post.php" >ارسال جدید </A></th>
          </tr>
          <tr>
            <th><A href="allposts.php">لیست ارسال ها</A></th>
          </tr>
          <tr>
            <th><A href="post.php?postid=last" >ویرایش آخرین ارسال</A></th>
          </tr>
          <tr>
            <th><A href="<?php echo $_SESSION ['userblogname'];?>" >مشاهده ی وبلاگ</A></th>
          </tr>
          <tr>
            <th><A href="userpage.php?menu=changepass" >تغییر رمز</A></th>
          </tr>
          <tr>
            <th><A href="userpage.php?menu=signout" >اتمام کار</A></th>
          </tr>
          <tr>
            <th>&nbsp;</th>
          </tr>
        </table>		  </th>
	</tr>
</table>

<p align="center"><a href="xx">Designer</a>|<a href="xx">FAQ</a>|<a href="xx">Info</a>|<a href="xx">Report.A.Bug</a></p>
</BODY>
</html>
