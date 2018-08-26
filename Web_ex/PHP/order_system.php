<script>
var c=0;
function changecolor(x,y)
{
	
	if(x==undefined || y==undefined)
	{
		alert("未選到表格");
	}
	var tab =document.getElementById("tab");
	var t = tab.rows[x].cells[y];
	if(t.style.background == '')
	{
		
		if(confirm("確定訂位嗎"))
		{
		t.style.background = 'red';	
		}		
		
	}
	else if(t.style.background == 'red')
	{
		if(confirm("確定取消訂位嗎"))
		{
			
			t.style.background = 'white';	
		}
	}
}
</script>


<?php
	$c=0;
	echo'<table id=tab border=1 align=center width=400px height=400px text-align=center onclick="changecolor(event.target.parentNode.rowIndex , event.target.cellIndex)";>';
	for($j=0 ; $j<3 ; $j++)
	{
	echo'<tr>';
	for($i=1 ; $i<4 ; $i++)
	{
		$c+=1;
		echo"<td align=center>$c</td>";
	}	
	echo'</tr>';
	}
	echo'</table>';
?>