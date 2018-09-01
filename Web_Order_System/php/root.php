<?php
session_start();//SESSION
$username =$_SESSION['username']; //透過 SESSION 取得 使用者名稱

require_once("connect.php");//連接資料庫
//$conn=@mysqli_connect("localhost","root","123456789","order_system");//連接資料庫
//@mysqli_set_charset($conn,"utf8");//編碼

//News_Editor 資料表
$sql= "select * from latest_news"; //選擇資料表 latest_news
$news_result = @mysqli_query($conn,$sql); //執行SQL語法

while($news_row=mysqli_fetch_assoc($news_result))//把 latest_news裡的資料 存進變數
{
    $news_No = $news_row["No"];
    $news_Name = $news_row["Name"];
    $news_Time = $news_row["Time"];
    $news_Title = $news_row["Title"];
    $news_Content = $news_row["Content"];
}

//Menu 資料表
$sql= "select * from menu"; //選擇資料表 Menu
$menu_result = @mysqli_query($conn,$sql); //執行SQL語法
$menu_rows = mysqli_num_rows($menu_result);  //判斷資料有幾列
$menu_c=0;//菜單陣列計數
while($menu_row=mysqli_fetch_assoc($menu_result))//把 Menu裡的資料 存進變數
{
    $menu_c ++;
    $menu_Id[$menu_c] = $menu_row["Id"];
    $menu_Name[$menu_c] = $menu_row["Name"];
    $menu_Kind[$menu_c] = $menu_row["Kind"];
    $menu_Price[$menu_c] = $menu_row["Price"];
}


//Message 資料表
$sql = "select * from message";//選擇資料表 message
$message_result = @mysqli_query($conn,$sql); //執行SQL語法
$message_rows = mysqli_num_rows($message_result);  //判斷資料有幾列
$message_c=0;//菜單陣列計數
while($message_row=mysqli_fetch_assoc($message_result))//把 message裡的資料 存進變數
{
    $message_c ++;
    $message_Id[$message_c] = $message_row["Id"];
    $message_Title[$message_c] = $message_row["Title"];
    $message_Content[$message_c] = $message_row["Content"];
    $message_Name[$message_c] = $message_row["Name"];
    $message_Date[$message_c] = $message_row["Date"];
}
//echo $message_Title[1] ;

//Member 資料表
$sql = "select * from member";//選擇資料表 member
$member_result = @mysqli_query($conn,$sql); //執行SQL語法
$member_rows = mysqli_num_rows($message_result);  //判斷資料有幾列
$member_c=0;//菜單陣列計數
while($member_row=mysqli_fetch_assoc($member_result))//把 member裡的資料 存進變數
{
    $member_c ++;
    $member_Id[$member_c] = $member_row["Id"];
    $member_Username[$member_c] = $member_row["Username"];
    $member_Password[$member_c] = $member_row["Password"];
    $member_Phone_number[$member_c] = $member_row["Phone_number"];
    $member_Grade[$member_c] = $member_row["Grade"];
}
//echo $message_Title[1] ;

?>

<html>
    <head>
        <link href="../css/root.css" rel="stylesheet" type="text/css">
        <link href="../css/Hover_css.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
        <!--import JQ CDN-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!--import JS-->
        <script src="../JS.js"></script>
    </head>
    <body>
        <div class="index_Gradient">
            <!--Navbar-->
            <div class="navbar">
                <div class="index_Logo">
                    TIMEAT
                    <img src="../img/Logo.png" height="50px;">
                </div>
                <div class="navbar-nav">
                    <a class="nav-item1" href="#">
                        最新消息
                        <span class="nav-item-Eng1">Latest News</span>
                    </a>
                    <a class="nav-item2" href="#Menu_link" id="Menu_link">
                        餐點菜單
                        <span class="nav-item-Eng2">Menu</span>
                    </a>
                    <a class="nav-item3" href="#Message_Link" id="Message_Link">
                        留言板
                        <span class="nav-item-Eng3">Message_Board</span>
                    </a>
                    <a class="nav-item4" href="#Join_Link" id="Join_Link">
                        會員管理
                        <span class="nav-item-Eng4">Member</span>
                    </a>
                    <a class="nav-item5" href="../index.html">
                        <span class="nav-item-Chin">系統管理員</span>
                        <?php echo  $username ?>
                    </a>
                </div>
                <!--Latest News-->
                <div class="news_box">
                    <div class=news_chin>
                        最新消息
                        <span class="news_Eng">Latest News</span>
                    </div>
                    <div class="news_title1">
                        標題
                        <span class="news_title1_Eng">Title</span>
                        <hr class="news_title_hr">
                        <div class="news_content_box">
                            <span class="news_content_title">
                            <?php echo $news_Title ?>
                            </span>
                            <span class="news_content">
                            <?php echo $news_Content ?>
                            </span>
                        </div>
                    </div>
                    <div class="subtitle">
                        <span class="subtitle_no">編號：<?php echo $news_No ?></span>
                        <span class="subtitle_name">發布人：<?php echo $news_Name ?></span>
                        <span class="subtitle_time">發布時間：<br><?php echo $news_Time ?></span>
                    </div>
                        <a href="news_editor.php"><span  class="editor_news hvr-underline-reveal">編輯</a></span>
                </div>
            </div>	
        </div>
        <!--Menu-->
        <div class="Second_box" id="Menu_link1">
                <span class="menu_chin">餐點菜單</span>
                <span class="menu_Eng">Menu</span>
                <a href="menu_add.php"><span  class="menu_add hvr-underline-reveal">新增菜單</a></span>
                <table border=0 class="menu_box">
                    <tr align=center class="menu_main_item">
                        <td width=400px>餐點名稱</td>
                        <td width=350px>餐點種類</td>
                        <td width=350px>售價</td>
                        <td width=300px>修改 / 刪除</td>
                    </tr>

                <?php
                    for($i=1 ; $i<=$menu_rows ;$i++)
                    {
                        echo "<tr align=center height=110px; class='menu_item'>";
                        echo "<td width=350px>".$menu_Name[$i]."</td>";
                        echo "<td width=300px>". $menu_Kind[$i]."</td>";
                        echo "<td width=250px>NT ".$menu_Price[$i]."</td>";
                        echo "<td>"."<a href='menu_editor.php?id=$menu_Id[$i]'>修改</a>"." / ". "<a href='menu_delete.php?id=$menu_Id[$i]'>刪除</a>"."</td>";
                        echo "</tr>";
                    }
                ?>          
                    <!--     
                    <tr align=center height=130px; class="menu_item">
                        <td width=350px>網頁超連結在大部分的瀏覽器</td>
                        <td width=300px>中式主餐</td>
                        <td width=250px>NT 80</td>
                        <td >修改 / 刪除</td>
                    </tr>
                    <tr align=center height=130px; class="menu_item">
                        <td width=350px>網頁超連結在大部分的瀏覽器</td>
                        <td width=300px>中式主餐</td>
                        <td width=250px>NT 80</td>
                        <td >修改 / 刪除</td>
                    </tr>
                    <tr align=center height=130px; class="menu_item">
                        <td width=350px>網頁超連結在大部分的瀏覽器</td>
                        <td width=300px>中式主餐</td>
                        <td width=250px>NT 80</td>
                        <td >修改 / 刪除</td>
                    </tr>
                    -->
                </table>
        </div>

        <div class="third_box" id="Message_Link1">
            <span class="message_chin">留言板</span>
            <span class="message_eng">Message  Borard</span>
            <table border="0" class="message_box">
                <tr align=center class="message_main_item">
                    <td width=250px>編號</td>
                    <td width=480px>主題</td>
                    <td width=350px>發佈人</td>
                    <td width=300px>發佈日期</td>
                </tr>
                <?php
                    for($i=1 ; $i<=$message_rows ;$i++)
                    {
                        echo "<tr align=center height=95px; class='message_item'>";
                        echo "<td width=300px>".$message_Id[$i]."</td>";
                        echo "<td width=300px class='hvr-bounce-in'><a href='message1.php?id=$message_Id[$i]'>". $message_Title[$i]."</a></td>";
                        if($message_Name[$i] == 0)
                        {
                            echo "<td width=250px>系統管理員</td>";
                        }
                        else
                        {
                            echo "<td width=250px>###_一般會員</td>";
                        }            
                        echo "<td width=250px>".$message_Date[$i]."</td>";
                        echo "</tr>";
                    }
                ?>          
            </table>
            <a href="message_add.php" class="message_add hvr-underline-reveal">新增主題</a>
        </div>
        
        <div class="fourth_box" id="Join_Link1">
            <span class="member_chin">會員管理</span>
            <span class="member_eng">member management</span>

            <table border=0 class="member_box">
                <tr align=center class="member_main_item">
                    <td width=100x>編號</td>
                    <td width=200px>帳號</td>
                    <td width=200px>密碼</td>
                    <td width=200px>電話號碼</td>
                    <td width=200px>等級</td>
                    <td width=200px>修改 / 刪除</td>
                </tr>

                <?php
                    for($i=1 ; $i<=$member_c ;$i++)
                    {
                        echo "<tr align=center height=110px; class='member_item'>";
                        echo "<td width=200px>".$member_Id[$i]."</td>";
                        echo "<td width=250px>". $member_Username[$i]."</td>";
                        echo "<td width=250px>".$member_Password[$i]."</td>";
                        echo "<td width=250px>".$member_Phone_number[$i]."</td>";
                        if( $member_Grade[$i] == 0)
                        {
                            echo "<td width=250px>系統管理員</td>";
                        }
                        else
                        {
                            echo "<td width=250px>一般會員</td>";
                        }            
                        echo "<td>"."<a href='member_editor.php?id=$member_Id[$i]'>修改</a>"." / ". "<a href='member_del.php?id=$member_Id[$i]'>刪除</a>"."</td>";
                        echo "</tr>";
                    }
                ?>          
            </table>
        </div>

    </body>
</html>