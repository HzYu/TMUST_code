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

<body>
<?php
	require_once("connectdb.php");
		
	$submit=$_POST["submit"];
	if($submit == "")
	{
		echo "<div>";
		echo "<form name='form1' method='POST' action=''>";
		echo "<p class='text_align'>新增資料</p>";
	  //echo "<p class='text_align'> 學號：<input type='text' name='id'></p>";
		echo "<p class='text_align'> 姓名：<input type='text' name='name' autocomplete='off'></p>";
		echo "性別：<select name=sex ><option value=0>0</option><option value=1>1</option></select>";
		echo "<p class='text_align'> 國文：<input type='text' name='chinese' placeholder='0~100' autocomplete='off'></p>";
		echo "<p class='text_align'> 數學：<input type='text' name='math' placeholder='0~100' autocomplete='off'></p>";
		echo "<p class='text_align'> <input type='submit' name='submit' value='新增''>&nbsp&nbsp&nbsp<input type='button' onclick='history.back()' value='返回'></p>";
		echo "</form>";
		echo "</div>";
	}
	else
	{
		//$id=$_POST["id"];
		$name=$_POST["name"];	
		$sex=$_POST["sex"];
		$chinese=$_POST["chinese"];
		$math=$_POST["math"];
		
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
			header("location:score.php"); //連結到score.php
		}
	}
?>
</body>
</html>