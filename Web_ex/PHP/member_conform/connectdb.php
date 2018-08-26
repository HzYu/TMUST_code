<?php
$conn=@mysql_connect("127.0.0.1","root","12345678");
if(!$conn)
{
	die("mysql database fail");
}
else
{
//	echo "mysql database success";
	mysql_select_db("class");
	mysql_query("set names utf8");
}
?>