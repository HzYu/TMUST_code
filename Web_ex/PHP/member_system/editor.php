<html>
<head>
	<meta charset="utf-8" />
</head>

<style>
.text_align{
	text-align:center;
}
</style>

<body>
<?php
	require_once("connectdb.php");
	$sql = "select * from student" ;
	$results = mysql_query($sql); //執行SQL語法 取得資料表
	$rows = mysql_num_rows($results); //有幾列
	$cols = mysql_num_fields($results); //有幾行
	
	$select_id= $_GET['id']; //取得要修改整欄位的id
	  
	$editor_sql = "SELECT * FROM `student` WHERE id=$select_id";  //用id搜尋整欄的資料
	$score_id=mysql_query($editor_sql);
  	
	$editor=$_POST["editor"];  //修改按鈕
	
	if($editor == "")
	{
		echo "<form name='form2' method='POST' action=''>";
		echo "<p class='text_align'>更新資料</p>";
	//	echo "<p class='text_align'><input type='hidden' name='id' value='$_GET[id]'";
		echo "<p class='text_align'> 姓名：<input type='text' name='name' value=".mysql_result($score_id,0,1)." autocomplete='off'></p>"; //取得0列1行的資料
		echo "<p class='text_align'> 性別：<input type='text' name='sex' placeholder='0女生 1男生' value=".mysql_result($score_id,0,2)." autocomplete='off'></p>"; //取得0列2行的資料
		echo "<p class='text_align'> 國文：<input type='text' name='chinese' placeholder='0~100' value=". mysql_result($score_id,0,3)." autocomplete='off'></p>";
		echo "<p class='text_align'> 數學：<input type='text' name='math' placeholder='0~100' value=".mysql_result($score_id,0,4)." autocomplete='off'></p>";
		echo "<p class='text_align'> <input type='submit' name='editor' placeholder='0~100' value='修改'>&nbsp&nbsp&nbsp<input type='button' onclick='history.back()' value='返回''></p>";
		echo "</form>";
	}
	else
	{
		$id=$_POST["id"];
		$name=$_POST["name"];	
		$sex=$_POST["sex"];
		$chinese=$_POST["chinese"];
		$math=$_POST["math"];
		
		if($chinese<0 || $chinese>100 || !is_numeric($chinese)) //判斷國文數學成績是否在1~100內 和性別 或成績為數字
		{
			echo "<p class='text_align'>國文成績請介於1~100之間或成績為數字</p>";
			echo "<p class='text_align'><input type='button' onclick='history.back()' value='返回'></p>";
		}
		else if($math<0 || $math>100 || !is_numeric($math))
		{
			echo "<p class='text_align'>數學成績請介於1~100之間或成績為數字</p>";
			echo "<p class='text_align'><input type='button' onclick='history.back()' value='返回'></p>";
		}
		else if($sex>1 || $sex<0 || !is_numeric($sex))
		{
			echo "<p class='text_align'>0女生 1男生</p>";
			echo "<p class='text_align'><input type='button' onclick='history.back()' value='返回'></p>";
		}
		else
		{
			$sql_editor = "UPDATE student SET name='$name' , sex='$sex' , chinese='$chinese' ,math='$math' WHERE id='$_GET[id]'" ;  ////利用索引id去尋找欄位，並修改資料
			mysql_query($sql_editor);
			header("location:score.php"); //連結到score.php
		}	
	}
?>
</body>
</html>