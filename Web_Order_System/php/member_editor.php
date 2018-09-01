
<?php
    require_once("connect.php");//連接資料庫
    $sql= "select * from member";//連接資料表
    $result = @mysqli_query($conn,$sql);

    $rows =@mysqli_num_rows($result); //4
    
    $no = $_GET["id"];
    $sql_select = "SELECT `Id`, `Username`, `Password`, `Phone_number`, `Grade` FROM `member` WHERE `Id`= $no";
    $result = @mysqli_query($conn,$sql_select);
    

    //把資料庫了的資料存進變數裡
    while($row=mysqli_fetch_assoc($result)) 
    {
        $Id = $row["Id"];
        $Username = $row["Username"];
        $Password = $row["Password"];
        $Phone_number = $row["Phone_number"];
        $Grade = $row["Grade"];
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
        <link href="../css/member_editor.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="index_Gradient">
        <span class="member_editor_title">編輯會員</span>
            <div class="member_editor_box">

            <?php if($editor == ""){ //如果按送出按鈕後 是空白的話就顯示出編輯畫面?>  
                <form id="form1" method="post" action="">
                    <span class="member_editor_Username_c">會員名稱 Username：</span>
                    <input type="text" id="member_editor_Username" name="member_editor_Username" class="member_editor_textbox1" value="<?php echo $Username ?>"  placeholder="請輸入會員名稱" autocomplete="off">
                    
                    <span class="member_editor_Ps_c">密碼 Password：</span>
                    <input type="text" id="member_editor_Ps" name="member_editor_Ps" class="member_editor_textbox2" value="<?php echo $Password ?>"  placeholder="請輸入密碼" autocomplete="off">

                    <span class="member_editor_num_c">電話號碼 Phone_Number：</span>
                    <input type="text" id="member_editor_num" name="member_editor_num" class="member_editor_textbox3" value="<?php echo $Phone_number ?>"  placeholder="請輸入電話號碼" autocomplete="off">

                    <span class="member_editor_Grade_c">會員等級 Member_Grade：</span>
                    <input type="text" id="member_editor_Grade" name="member_editor_Grade" class="member_editor_textbox4" value="<?php echo $Grade ?>"  placeholder="請輸入會員等級" autocomplete="off">

                    <input type="submit" name="editor" id="editor" value="送出" class="Sign_up">
                    <a href="root.php" style="text-decoration: none;"><span  class="editor_return">返回</a></span>
                </form>
                <?php } 
                else // 如果按送出按鈕後 是"送出"的話 則取得上面text輸入的值 並執行SQL新增語法
                { 
                    //把 member_editor 裡新增的資料存到變數

                    @$member_editor_Username = $_REQUEST['member_editor_Username'];
                    @$member_editor_Ps = $_REQUEST['member_editor_Ps'];
                    @$member_editor_num = $_REQUEST['member_editor_num'];
                    @$member_editor_Grade = $_REQUEST['member_editor_Grade'];
                    
                    //SQL編輯
                    $sql_member_editor = "UPDATE member SET Username='$member_editor_Username' , Password='$member_editor_Ps' , Phone_number='$member_editor_num' , Grade='$member_editor_Grade' WHERE Id='$no'";
                    // echo $sql_member_editor;
                    @mysqli_query($conn,$sql_member_editor);
                    header("location:root.php"); //連結到root.php
                }
                    ?>
            </div>
        </div>
    </body>
    
</html>