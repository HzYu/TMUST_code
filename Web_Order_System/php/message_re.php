<?php
    header ( "Content-type:text/html;charset=utf-8" ); 
    require_once("connect.php");//連接資料庫
    // $conn=@mysqli_connect("localhost","root","123456789","order_system");//連接資料庫
    // @mysqli_set_charset($conn,"utf8");//編碼
    date_default_timezone_set("Asia/Shanghai");  //建立時間
    $currtime = date("Y-m-d H:i:s");

    $no = $_GET["Id"]; //取的網址的編號

    $sql_select = "SELECT `Id`, `Title`, `Content`, `Name`, `Date` FROM `message` WHERE `Id`= $no";
    $result = @mysqli_query($conn,$sql_select);

    //$cols = @mysqli_num_fields($result);//5
    $rows =@mysqli_num_rows($result); 

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
        <link href="../css/message_re.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="index_Gradient">
        <span class="message_re">回覆 Re.</span>
            <div class="message_re_box">
                
                <?php if($submit == ""){ //如果按送出按鈕後 是空白的話就顯示出編輯畫面?>  
                    <form id="form1" method="post" action=""><!--root.php-->
                    <span class="message_re_no_c">編號 No：</span>
                        <input type="text" id="message_re_no" name="message_re_no" class="message_re_textbox1" value="<?php echo $Id ?>" placeholder="請輸入文章編號" autocomplete="off" disabled>
                        
                        <span class="message_re_name_c">回覆者 Name：</span>
                        <input type="text" id="message_re_name" name="message_re_name" class="message_re_textbox2" value="<?php echo '系統管理員' ?>" placeholder="請輸入回覆者姓名" autocomplete="off" disabled>

                        <span class="message_re_name_c1">回覆對象 Re_Name：</span>
                        <input type="text" id="message_re_name1" name="message_re_name1" class="message_re_textbox5" value="<?php echo '###' ?>" placeholder="請輸入回覆者姓名" autocomplete="off" disabled>

                        <span class="message_re_time_c">發布時間 Time：</span>
                        <input type="text" id="message_re_time" name="message_re_time" class="message_re_textbox3" value="<?php  echo $currtime ?>"  placeholder="請輸入發布時間" autocomplete="off" disabled>

                        <span class="message_re_title_c">主題 Title：</span>
                        <input type="text" id="message_re_title" name="message_re_title" class="message_re_textbox4" value="<?php  echo $Title ?>"  placeholder="請輸入標題" autocomplete="off" disabled>

                        <span class="message_re_content_c">內容 Content：</span>
                        <textarea rows=4 cols=30 id="message_re_content" name=message_re_content  class="message_re_textarea"  placeholder="請輸入內容"></textarea>

                        <input type="submit" name="submit" id="submit" value="送出" class="Sign_up">
                        <?php
                            echo "<a href='message1.php?id=$no' style='text-decoration: none;'><span  class='message_re_return'>返回</a></span>";
                        ?>
                    </form>
                    <?php } 
                else // 如果按送出按鈕後 是"送出"的話 則取得上面text輸入的值 並執行SQL修改語法
                { 
                    //把 News_editor 裡編輯的資料存到變數
                    @$message_re_no = $_REQUEST['message_re_no'];
                    @$message_re_name = $_REQUEST['message_re_name'];
                    @$message_re_time = $_REQUEST['message_re_time'];
                    @$message_re_title = $_REQUEST['message_re_title'];
                    @$message_re_content = $_REQUEST['message_re_content'];
                    //SQL新增
                    $sql_message_add= "INSERT INTO  message_re  VALUES ('','$Title','$message_re_content','0','$currtime','系統管理員')" ;
                    //echo $sql_message_add;
                    @mysqli_query($conn,$sql_message_add);
                    header("location:message1.php?id=$no"); //連結到root.php
                }
                ?>
			</div>			
        </div>
    </body>
</html>