<?php
session_start();
//echo "member";
$username = $_SESSION['username'];
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
?>

<html>
    <head>
        <link href="../css/member.css" rel="stylesheet" type="text/css">
        <link href="../css/Hover_css.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
        <!--import JQ CDN-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!--import JS-->
        <script src="JS.js"></script>
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
                </div>
            </div>	
        </div>
    </body>
</html>