<?php
    session_start();
    $username = $_SESSION['username'];
    header ( "Content-type:text/html;charset=utf-8" ); 
    require_once("connect.php");//連接資料庫
    // $conn=@mysqli_connect("localhost","root","123456789","order_system");//連接資料庫
    // @mysqli_set_charset($conn,"utf8");//編碼
    date_default_timezone_set("Asia/Shanghai");  //建立時間
    $currtime = date("Y-m-d H:i:s");


    $sql= "select * from message";//連接資料表
    $result = @mysqli_query($conn,$sql);

    //$cols = @mysqli_num_fields($result);//5
    $rows =@mysqli_num_rows($result); //2

    //把資料庫了的資料存進變數裡
    while($row=mysqli_fetch_assoc($result)) 
    {
        $Id = $row["Id"];
        $Title = $row["Title"];
        $Content = $row["Content"];
        $Name = $row["Name"];
        $Date = $row["Date"];
    }
    
    //取得按鈕按下送出按鈕的值 (對應form1)
    //沒有值NULL
    //有值 "Value='送出'"
    @$submit = $_POST["submit"];
    //echo $editor;
?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="../css/message_add.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="index_Gradient">
        <span class="message_add">新增主題</span>
            <div class="message_add_box">

            <?php if($submit == ""){ //如果按送出按鈕後 是空白的話就顯示出編輯畫面?>  
                <form id="form1" method="post" action=""><!--root.php-->
                <span class="message_add_no_c">編號 No：</span>
                    <input type="text" id="message_add_no" name="message_add_no" class="message_add_textbox1" value="<?php echo $Id+1 ?>" placeholder="請輸入文章編號" autocomplete="off" disabled>
                    
                    <span class="message_add_name_c">發布人 Name：</span>
                    <input type="text" id="message_add_name" name="message_add_name" class="message_add_textbox2" value="<?php echo $username .'_一般會員' ?>" placeholder="請輸入發布人姓名" autocomplete="off" disabled>

                    <span class="message_add_time_c">發布時間 Time：</span>
                    <input type="text" id="message_add_time" name="message_add_time" class="message_add_textbox3" value="<?php  echo $currtime ?>"  placeholder="請輸入發布時間" autocomplete="off" disabled>

                    <span class="message_add_title_c">標題 Title：</span>
                    <input type="text" id="message_add_title" name="message_add_title" class="message_add_textbox4"  placeholder="請輸入標題" autocomplete="off">

                    <span class="message_add_content_c">內容 Content：</span>
                    <textarea rows=4 cols=30 id="message_add_content" name=message_add_content  class="message_add_textarea"  placeholder="請輸入內容"></textarea>

                    <input type="submit" name="submit" id="submit" value="送出" class="Sign_up">
                    <a href="member.php" style="text-decoration: none;"><span  class="message_add_return">返回</a></span>
                </form>
                <?php } 
                else // 如果按送出按鈕後 是"送出"的話 則取得上面text輸入的值 並執行SQL修改語法
                { 
                    //把 News_editor 裡編輯的資料存到變數
                    @$message_add_no = $_REQUEST['message_add_no'];
                    @$message_add_name = $_REQUEST['message_add_name'];
                    @$message_add_time = $_REQUEST['"message_add_time'];
                    @$message_add_title = $_REQUEST['message_add_title'];
                    @$message_add_content = $_REQUEST['message_add_content'];
                    //SQL新增
                    $sql_message_add= "INSERT INTO  message  VALUES ('','$message_add_title','$message_add_content','1','$currtime','$username')" ;
                    // echo $sql_message_add;
                    @mysqli_query($conn,$sql_message_add);
                    header("location:member.php"); //連結到member.php
                }
                ?>
			</div>			
        </div>
    </body>
</html>