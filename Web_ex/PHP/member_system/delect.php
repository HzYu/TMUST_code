<?php
require_once("connectdb.php");
$sql_delect="DELETE FROM `student` WHERE id= $_GET[id]";  //sql刪除語法
mysql_query($sql_delect);
//echo $sql_delect;
header("location:score.php");
?>