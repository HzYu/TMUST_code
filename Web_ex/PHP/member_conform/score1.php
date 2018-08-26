<html>
<head>
	<meta charset="utf-8" />
</head>
<style>
.text_align{
	text-align:center;
}

div{
	width:350px;    
	margin-right:auto;
	margin-left:auto;
	text-align:left;
	width:210px;
}
</style>
<title>顯示學生成績</title>
<?php
	require_once("connectdb.php");
	$sql="select * from student";
	$result=mysql_query($sql);
	
	$select_id= $_GET['id']; //取得要修改整欄位的id
	
	$editor_sql = "SELECT * FROM `student` WHERE id=$select_id";  //用id搜尋整欄的資料
	$score_id=mysql_query($editor_sql);
	
	$op = $_GET["op"];
	$submit = $_POST["submit"];
	if(!isset($submit))
	{
		switch($op)
		{
			case"add":
				echo "<div>";
				echo "<form name='form1' method='POST' action=''>";
				echo "<p class='text_align'>新增資料</p>";
				echo "<p class='text_align'> 姓名：<input type='text' name='name' autocomplete='off'></p>";
				echo "性別：<select name=sex ><option value=0>0</option><option value=1>1</option></select>";
				echo "<p class='text_align'> 國文：<input type='text' name='chinese' placeholder='0~100' autocomplete='off'></p>";
				echo "<p class='text_align'> 數學：<input type='text' name='math' placeholder='0~100' autocomplete='off'></p>";
				echo "<p class='text_align'> <input type='submit' name='submit' value='新增''>&nbsp&nbsp&nbsp<input type='button' onclick='history.back()' value='返回'></p>";
				echo "</form>";
				echo "</div>";	
				break;
			case"edit":
				echo "<form name='form2' method='POST' action=''>";
				echo "<p class='text_align'>更新資料</p>";
				echo "<p class='text_align'> 姓名：<input type='text' name='name' value=".mysql_result($score_id,0,1)." autocomplete='off'></p>"; //取得0列1行的資料
				echo "<p class='text_align'> 性別：<input type='text' name='sex' placeholder='0女生 1男生' value=".mysql_result($score_id,0,2)." autocomplete='off'></p>"; //取得0列2行的資料
				echo "<p class='text_align'> 國文：<input type='text' name='chinese' placeholder='0~100' value=". mysql_result($score_id,0,3)." autocomplete='off'></p>";
				echo "<p class='text_align'> 數學：<input type='text' name='math' placeholder='0~100' value=".mysql_result($score_id,0,4)." autocomplete='off'></p>";
				echo "<p class='text_align'> <input type='submit' name='submit' placeholder='0~100' value='修改'>&nbsp&nbsp&nbsp<input type='button' onclick='history.back()' value='返回''></p>";
				echo "</form>";
				break;
			case"del":
				$sql_delect="DELETE FROM `student` WHERE id= $select_id";  //sql刪除語法
				mysql_query($sql_delect);
				//echo $sql_delect;
				//header("location:score.php");
				echo "<script type='text/javascript'>"
					 ."window.location.href='score.php'"
					 ."</script>";  
				break;
		}
	}
	else
	{
		$name=$_POST["name"];	
		$sex=$_POST["sex"];
		$chinese=$_POST["chinese"];
		$math=$_POST["math"];
		switch($submit)   //傳submit的name值
		{
			case "新增":
				if($chinese<0 || $chinese>100 || !is_numeric($chinese)) //判斷國文數學成績是否在1~100內 或成績為數字
				{
					echo "<p class='text_align'>國文成績請介於1~100之間或成績為數字</p>";
					echo "<p class='text_align'><input type='button' onclick='history.back()' value='返回'></p>";
				}
				else if($math<0 || $math>100 || !is_numeric($math))
				{
					echo "<p class='text_align'>數學成績請介於1~100之間或成績為數字</p>";
					echo "<p class='text_align'><input type='button' onclick='history.back()' value='返回'></p>";
				}
				else
				{
					$sql_add = "insert into student values ('','$name','$sex','$chinese','$math')";
					mysql_query($sql_add);
					//header("location:score.php"); //連結到score.php
					echo "<script type='text/javascript'>"
						."window.location.href='score.php'"
						."</script>";  
				}
			case "修改":
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
					//echo $sql_editor;
					//header("location:score.php"); //連結到score.php
					echo "<script type='text/javascript'>"
						 ."window.location.href='score.php'"
						 ."</script>";  
				}	
		}
		
	}


?>
</html>