<?php
session_start ();
$db_handle = mysql_connect ( $server, $user_name, $password );
$db_found = mysql_select_db ( $database, $db_handle );
if (! $db_found) {
        echo 'not found';
	$SQL="CREATE DATABASE $database";
	$result = mysql_query ( $SQL );	
	$db_handle = mysql_connect ( $server, $user_name, $password );
	$db_found = mysql_select_db ( $database, $db_handle );
}

$SQL = "CREATE TABLE IF NOT EXISTS users
			(ID int(7) NOT NULL auto_increment,
			blogid int(7) NOT NULL,
			username varchar(50) NOT NULL,
			pass varchar(50) NOT NULL,
			realname varchar(50) NOT NULL,
			email varchar(50) NOT NULL,
			PRIMARY KEY (ID),
			UNIQUE id (ID))";
$result = mysql_query ( $SQL );

$SQL = "CREATE TABLE IF NOT EXISTS blogs
			(ID int(7) NOT NULL auto_increment,
			blogname varchar(50) NOT NULL,
			postperpage int(3) NOT NULL,
			PRIMARY KEY (ID),
			UNIQUE id (ID))";
$result = mysql_query ( $SQL );

$SQL = "CREATE TABLE IF NOT EXISTS owners
			(ID int(7) NOT NULL auto_increment,
			blogid int(7) NOT NULL,
			userid int(7) NOT NULL,
			type varchar(50) NOT NULL,
			PRIMARY KEY (ID),
			UNIQUE id (ID))";
$result = mysql_query ( $SQL );

$SQL = "CREATE TABLE IF NOT EXISTS posts 
			(ID int(7) NOT NULL auto_increment,
			post_blogid int(7) NOT NULL,
			post_date varchar(50) NOT NULL,
			post_subject varchar(50) NOT NULL,
			post_value longtext,
			PRIMARY KEY (ID),
			UNIQUE id (ID))";
$result = mysql_query ( $SQL );

$SQL = "CREATE TABLE IF NOT EXISTS messages 
			(ID int(7) NOT NULL auto_increment,
			writerid int(7) NOT NULL,
			readerid int(7) NOT NULL,
			mes_date varchar(50) NOT NULL,
			mes_subject varchar(50) NOT NULL,
			mes_value longtext,
			PRIMARY KEY (ID),
			UNIQUE id (ID))";
$result = mysql_query ( $SQL );


$SQL = "CREATE TABLE IF NOT EXISTS comments 
			(ID int(7) NOT NULL auto_increment,
			com_postid int(7) NOT NULL,
			com_date varchar(50) NOT NULL,
			com_writer varchar(50) NOT NULL,
			com_subject varchar(50) NOT NULL,
			com_value varchar(50),
			com_visiblity varchar(10),
			PRIMARY KEY (ID),
			UNIQUE id (ID))";
$result = mysql_query ( $SQL );

$test_ip = $_SERVER ['REMOTE_ADDR'];
?>