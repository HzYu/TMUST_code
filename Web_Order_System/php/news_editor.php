<?php
    header ( "Content-type:text/html;charset=utf-8" ); 
    require_once("connect.php");//連接資料庫
    // $conn=@mysqli_connect("localhost","root","123456789","order_system");//連接資料庫
    // @mysqli_set_charset($conn,"utf8");//編碼
    date_default_timezone_set("Asia/Shanghai");  //建立時間
    $currtime = date("Y-m-d H:i:s");

    $sql= "select * from latest_news";//連接資料表
    $result = @mysqli_query($conn,$sql);

    //$cols = @mysqli_num_fields($result);//5
    $rows =@mysqli_num_rows($result); //1

    //把資料庫了的資料存進變數裡
    while($row=mysqli_fetch_assoc($result)) 
    {
        $No = $row["No"];
        $Name = $row["Name"];
        $Time = $row["Time"];
        $Title = $row["Title"];
        $Content = $row["Content"];
    }
    //取得按鈕按下送出按鈕的值 (對應form1)
    //沒有值NULL
    //有值 "Value='送出'"
    @$editor = $_POST["editor"];
    //echo $editor;
?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../css/news_editor.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="index_Gradient">
        <span class="news_editor">編輯最新消息</span>
            <div class="news_editor_box">

				<?php if($editor == ""){ //如果按送出按鈕後 是空白的話就顯示出編輯畫面?>  
                <form id="form1" method="post" action=""><!--root.php-->
                    <span class="news_editor_no_c">編號 No：</span>
                    <input type="text" id="news_editor_no" name="news_editor_no" class="news_editor_textbox1" value="<?php echo $No ?>" placeholder="請輸入文章編號" autocomplete="off" disabled>
                    
                    <span class="news_editor_name_c">發布人 Name：</span>
                    <input type="text" id="news_editor_name" name="news_editor_name" class="news_editor_textbox2" value="系統管理員" placeholder="請輸入發布人姓名" autocomplete="off" disabled>

                    <span class="news_editor_time_c">發布時間 Time：</span>
                    <input type="text" id="news_editor_time" name="news_editor_time" class="news_editor_textbox3" value="<?php echo $currtime  ?>" placeholder="請輸入發布時間" autocomplete="off" disabled>

                    <span class="news_editor_title_c">標題 Title：</span>
                    <input type="text" id="news_editor_title" name="news_editor_title" class="news_editor_textbox4" value="<?php echo $Title ?>" placeholder="請輸入標題" autocomplete="off">

                    <span class="news_editor_content_c">內容 Content：</span>
                    <textarea rows=4 cols=30 id="news_editor_content" name=news_editor_content  class="news_editor_textarea"  placeholder="請輸入內容"> <?php echo $Content ?> </textarea>

                    <input type="submit" name="editor" id="editor" value="送出" class="Sign_up">
                    <a href="root.php" style="text-decoration: none;"><span  class="editor_return">返回</a></span>
				</form>
                <?php } 
                else // 如果按送出按鈕後 是"送出"的話 則取得上面text輸入的值 並執行SQL修改語法
                { 
                    //把 News_editor 裡編輯的資料存到變數
                    @$news_editor_no = $_REQUEST['news_editor_no'];
                    @$news_editor_name = $_REQUEST['news_editor_name'];
                    @$news_editor_time = $_REQUEST['news_editor_time'];
                    @$news_editor_title = $_REQUEST['news_editor_title'];
                    @$news_editor_content = $_REQUEST['news_editor_content'];
                    echo $news_editor_no;
                    //SQL修改
                    $sql_news_editor = "UPDATE latest_news SET Name='系統管理員' , Time='$currtime' , Title='$news_editor_title' , Content='$news_editor_content' WHERE No='$No'";
                    @mysqli_query($conn,$sql_news_editor);
                    header("location:root.php"); //連結到root.php
                }
                    ?>
			</div>			
        </div>
    </body>
</html>