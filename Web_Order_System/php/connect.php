<?php
$conn=@mysqli_connect("localhost","root","123456789","order_system");

if(!$conn)
{
	die("mysql database fail");
}
    //echo "mysql database success";
	//@mysqli_select_db($conn,"order_system");
	@mysqli_set_charset($conn,"utf8");//編碼
?>