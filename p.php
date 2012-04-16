<?PHP
include 'dbinfo.php';
$db_handle = mysql_connect ( $server, $user_name, $password );
$db_found = mysql_select_db ( $database, $db_handle );
$SQL="DROP DATABASE $database";
print mysql_query ( $SQL );
?>
