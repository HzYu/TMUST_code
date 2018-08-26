<html>
<head>
<meta charset="utf-8">
</head>
<title>顯示學生成績</title>
<?php
require_once("connectdb.php");
$sql = "select * from student" ;
$results = mysql_query($sql); //執行SQL語法 取得資料表
$rows = mysql_num_rows($results); //有幾列
$cols = mysql_num_fields($results); //有幾行
?>

<?php
  echo "<table align=center border=1 width=300px>";
  echo"<p style='text-align:center;'><a href='add.php'>新增資料</a></p>";
 
  echo "<tr align=center>";
  for ($i=0;$i<$cols;$i++)
  {
	  echo "<td>".mysql_field_name($results,$i); //列出mysql的title
  }	  
  echo "<td>備註</td>";
  /*
  for ($i=0 ; $i<$rows ; $i++) //列出資料
  {*/
  while($rs=mysql_fetch_array($results)) //索引值可以是數字和字串
  {
	  echo "<tr align=center>";
	  //$rs=mysql_fetch_array($results);
	  echo "<td>" . $rs[id];  
	  echo "<td>" . $rs[name];  
	  echo "<td>" . $rs[sex];  
	  echo "<td>" . $rs[chinese];  
	  echo "<td>" . $rs[math];    
	  /*
	  echo "<td>".mysql_result($results,$i,0);
	  echo "<td>".mysql_result($results,$i,1);
  	  echo "<td>".mysql_result($results,$i,2);
  	  echo "<td>".mysql_result($results,$i,3);
	  echo "<td>".mysql_result($results,$i,4);
	   */
	  echo "<td>"."<a href='editor.php?id=$rs[id]'>修改</a>"."<a href='delect.php?id=$rs[id]'> / 刪除</a>"; // id放在網址後方 方便新增刪除使用
	  echo "</tr>";
  }
?>
</table>
</html>