<?php
    require_once("connect.php");//連接資料庫
    $sql= "select * from menu";//連接資料表
    $result = @mysqli_query($conn,$sql);
    $rows =@mysqli_num_rows($result); //1
    
    //取得按鈕按下送出按鈕的值 (對應form1)
    //沒有值NULL
    //有值 "Value='送出'"
    @$editor = $_POST["editor"];
    //echo $editor;

?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../css/menu_add.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="index_Gradient">
        <span class="menu_add_title">新增菜單</span>
            <div class="menu_add_box">

            <?php if($editor == ""){ //如果按送出按鈕後 是空白的話就顯示出編輯畫面?>  
                <form id="form1" method="post" action="">
                    <span class="menu_add_name_c">餐點名稱 Name：</span>
                    <input type="text" id="menu_add_name" name="menu_add_name" class="menu_add_textbox1"  placeholder="請輸入餐點名稱" autocomplete="off">
                    
                    <span class="menu_add_kind_c">餐點種類 Kind：</span>
                    <input type="text" id="menu_add_kind" name="menu_add_kind" class="menu_add_textbox2"  placeholder="請輸入餐點種類" autocomplete="off">

                    <span class="menu_add_price_c">餐點價錢 Price：</span>
                    <input type="text" id="menu_add_price" name="menu_add_price" class="menu_add_textbox3"  placeholder="請輸入餐點價錢" autocomplete="off">

                    
                    <span class="menu_add_pic_c">新增圖片 Add_Price：</span>
                    <input type="file" id="upload_input" name="upload_input" class="upload_file">

                    <input type="submit" name="editor" id="editor" value="送出" class="Sign_up">
                    <a href="root.php" style="text-decoration: none;"><span  class="editor_return">返回</a></span>
                </form>
                <?php } 
                else // 如果按送出按鈕後 是"送出"的話 則取得上面text輸入的值 並執行SQL新增語法
                { 
                    //把 menu_add 裡新增的資料存到變數
                    @$menu_add_name = $_REQUEST['menu_add_name'];
                    @$menu_add_kind = $_REQUEST['menu_add_kind'];
                    @$menu_add_price = $_REQUEST['menu_add_price'];
                    @$upload_input = $_REQUEST['upload_input'];
                    
                    //SQL新增
                    $sql_menu_add = "INSERT INTO menu VALUES ('','$menu_add_name','$menu_add_kind','$menu_add_price','../img/$upload_input')";
                    // echo $sql_menu_add;
                    @mysqli_query($conn,$sql_menu_add);
                    header("location:root.php"); //連結到root.php
                }
                    ?>
            </div>
        </div>
    </body>
    
</html>