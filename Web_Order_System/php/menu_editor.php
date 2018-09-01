<?php
    require_once("connect.php");//連接資料庫
    $sql= "select * from menu";//連接資料表
    $result = @mysqli_query($conn,$sql);

    $rows =@mysqli_num_rows($result); //4
    
    $no = $_GET["id"];
    $sql_select = "SELECT `Id`, `Name`, `Kind`, `Price`, `Pic` FROM `menu` WHERE `Id`= $no";
    $result = @mysqli_query($conn,$sql_select);
    

    //把資料庫了的資料存進變數裡
    while($row=mysqli_fetch_assoc($result)) 
    {
        $Id = $row["Id"];
        $Name = $row["Name"];
        $Kind = $row["Kind"];
        $Price = $row["Price"];
        $Pic = $row["Pic"];
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
        <link href="../css/menu_editor.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="index_Gradient">
        <span class="menu_editor_title">編輯菜單</span>
            <div class="menu_editor_box">

            <?php if($editor == ""){ //如果按送出按鈕後 是空白的話就顯示出編輯畫面?>  
                <form id="form1" method="post" action="">
                    <span class="menu_editor_name_c">餐點名稱 Name：</span>
                    <input type="text" id="menu_editor_name" name="menu_editor_name" class="menu_editor_textbox1" value="<?php echo $Name ?>"  placeholder="請輸入餐點名稱" autocomplete="off">
                    
                    <span class="menu_editor_kind_c">餐點種類 Kind：</span>
                    <input type="text" id="menu_editor_kind" name="menu_editor_kind" class="menu_editor_textbox2" value="<?php echo $Kind ?>"  placeholder="請輸入餐點種類" autocomplete="off">

                    <span class="menu_editor_price_c">餐點價錢 Price：</span>
                    <input type="text" id="menu_editor_price" name="menu_editor_price" class="menu_editor_textbox3" value="<?php echo $Price ?>"  placeholder="請輸入餐點價錢" autocomplete="off">

                    
                    <span class="menu_editor_pic_c">編輯圖片 Editor_Pic：</span>
                    <input type="file" id="upload_input" name="upload_input" class="upload_file">

                    <input type="submit" name="editor" id="editor" value="送出" class="Sign_up">
                    <a href="root.php" style="text-decoration: none;"><span  class="editor_return">返回</a></span>
                </form>
                <?php } 
                else // 如果按送出按鈕後 是"送出"的話 則取得上面text輸入的值 並執行SQL新增語法
                { 
                    //把 menu_editor 裡新增的資料存到變數

                    @$menu_editor_name = $_REQUEST['menu_editor_name'];
                    @$menu_editor_kind = $_REQUEST['menu_editor_kind'];
                    @$menu_editor_price = $_REQUEST['menu_editor_price'];
                    @$upload_input = $_REQUEST['upload_input'];
                    
                    //SQL編輯
                    $sql_menu_editor = "UPDATE menu SET Name='$menu_editor_name' , kind='$menu_editor_kind' , price='$menu_editor_price' , Pic='$upload_input' WHERE Id='$no'";
                    // echo $sql_menu_editor;
                    @mysqli_query($conn,$sql_menu_editor);
                    header("location:root.php"); //連結到root.php
                }
                    ?>
            </div>
        </div>
    </body>
    
</html>