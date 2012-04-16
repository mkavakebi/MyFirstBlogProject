<?php

function Submitpost($user_blogname, $user_subj, $user_com) {
	$SQL = "SELECT * FROM blogs WHERE blogname='{$user_blogname}'";
	$result = mysql_query ( $SQL );
	$db_field = mysql_fetch_assoc ( $result );
	$user_blogid = $db_field ['ID'];
	//*********add new comment in comments table
	$SQL = "INSERT INTO posts (post_blogid,post_date,post_subject,post_value) VALUES ('{$user_blogid}',NOW(),'{$user_subj}','{$user_com}') ";
	$result = mysql_query ( $SQL );
}

function LoginUser($user_name, $user_pass) {
	$SQL = "SELECT blogname FROM users JOIN blogs ON (users.blogid=blogs.ID) WHERE username='{$user_name}' AND pass='{$user_pass}'";
	$result = mysql_query ( $SQL );
	if ($db_field = mysql_fetch_assoc ( $result )) {
		session_start ();
		$_SESSION ['login'] = '1';
		$_SESSION ['userblogname'] = $db_field ['blogname'];
		header ( 'Location:userpage.php' );
		return '';
	} else {
		session_start ();
		$_SESSION ['login'] = '';
		$_SESSION ['userblogname'] = '';
		return 'چنین فردی یافت نشد';
	}
}

function SignUpUser($user_blogname, $user_name, $user_pass,$user_email,$user_realname) {
	$SQL = "SELECT * FROM users JOIN blogs ON(users.blogid=blogs.ID) WHERE blogname='{$user_blogname}'  OR (username='{$user_name}' AND pass='{$user_pass}')";
	$result = mysql_query ( $SQL );
	if ($db_field = mysql_fetch_assoc ( $result )) {
		if ($db_field ['blogname'] == $user_blogname)
			return 'بلاگ دیگری با این نام ثبت شده';
		else if ($db_field ['username'] == $user_name)
			return 'کاربر دیگری با این نام ثبت شده!';
	} else {
		$SQL = "INSERT INTO blogs (blogname) VALUES ('{$user_blogname}')";
		$result = mysql_query ( $SQL );
		
		$SQL = "SELECT ID FROM blogs WHERE blogname='{$user_blogname}'";
		$result = mysql_query ( $SQL );
		$db_field = mysql_fetch_assoc ( $result );
		
		$SQL = "INSERT INTO users (username,pass,blogid,email,realname) VALUES ('{$user_name}','{$user_pass}','{$db_field['ID']}','{$user_email}','{$user_realname}')";
		$result = mysql_query ( $SQL );
		//***********post hellow world!
		Submitpost ( $user_blogname, '<B>Hello World!</B>', 'Free Accesability(FreeHand)...' );
		//*********Make Her Directory
		mkdir ( $user_blogname );
		
		$file_content = array ('<?PHP $blogname=', $user_blogname, ';?><?PHP include "../common.php" ; ?>' );
		$file_content = implode ( '', $file_content );
		$file_handle = fopen ( "{$user_blogname}/index.php", "w" );
		fwrite ( $file_handle, $file_content );
		fclose ( $file_handle );
	
	}
}

function FilterBlogName($string) {
	$CharsB = '*ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$CharsS = 'abcdefghijklmnopqrstuvwxyz';
	$CharsC = '.!@#%^&*()-_=+|<>~?';
	$CharsN = '0123456789';
	$CharsAll = $CharsB . $CharsS . $CharsC . $CharsN;
	
	if (strlen ( $string ) < 5) {
		return '1';
	}
	for($i = 0; $i < strlen ( $string ); $i ++) {
		if (strpos ( $CharsAll, $string [$i] ) === false) {
			return '2';
		}
	}
	$string = str_replace ( '.', ':', $string );
	return $string;
}

function filtercontent($string) {
	return htmlspecialchars ( $string );
}

function defiltercontent($string) {
	$newstring = '';
	$flag = false;
	for($i = 0; $i < strlen ( $string ); $i ++) {
		if ($string [$i] == '/') {
			$i ++;
		}
		$newstring = $newstring . $string [$i];
	}
	return $newstring;
}

?>