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

$sql= "select * from menu"; //選擇資料表 menu
$menu_result = @mysqli_query($conn,$sql); //執行SQL語法
$menu_rows =  mysqli_num_rows($menu_result);  //判斷資料有幾列
$count=0;

$menu_pic=0;
while($menu_row=mysqli_fetch_assoc($menu_result))//把 menu裡的資料 存進變數
{
    $menu_pic++;
    @$menu_No[$menu_pic] = $menu_row["No"];
    $menu_Name[$menu_pic] = $menu_row["Name"];
    $menu_Kind[$menu_pic] = $menu_row["Kind"];
    $menu_Price[$menu_pic] = $menu_row["Price"];
    $menu_Pic[$menu_pic] = $menu_row["Pic"];
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
    $message_Name_re[$message_c] = $message_row["Name_re"];
}
//echo $message_Title[1] ;
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


        <script type="text/javascript">	
            var total_price=0;
            function ck1(check,menu_price)  //傳check的id 和 menu的價錢
            {		
                var price = menu_price; //存價錢到變數
                var menu_check = document.getElementById("check"+check); //因為有很多的checkbox 所以check是數字
                
                if(menu_check.checked) //如果menu_check勾選
                {
                    // alert("OK");
                    total_price+=price;
                    //alert(total_price);
                }
                else//如果menu_check沒有勾選
                {
                    // alert("X ");
                    total_price-=price;
                    // alert(total_price);
                }
            }

            function price ()
            {
                var menu_total_price  = document.getElementById("menu_total_price");
                menu_total_price.innerHTML=total_price;
            }
        </script>
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
                        <span class="nav-item-Chin">一般管理員</span>
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
        <!--菜單-->
        <div class="second_box"  onchange="price();">
            <span class="menu_chin">餐點菜單</span>
            <span class="menu_Eng">Menu</span>
            <span class="menu_chin1" >共花費<span id="menu_total_price">0</span>元</span>

            <table border=0 class="menu_box" >
                <?php
                    echo "<tr>";
                    for($i=1 ;$i<=$menu_rows ;$i++)
                    {
                            echo"<td><img src=".$menu_Pic[$i]." width=400px; height=300px; ><br>";
                            echo "<div align=center><span class='menu_name'>".$menu_Name[$i]."</sapn></div><br>";
                            echo "<div align=center><span class='menu_kind'>".$menu_Kind[$i]."</sapn></div><br>";
                            echo "<div align=center><span class='menu_pric '>$".$menu_Price[$i]."</sapn></div><br>";
                            echo "<div align=center><span class='menu_ok'>確定訂購：<input class='menu_ck' type=checkbox id=check$i onclick='ck1($i ,$menu_Price[$i]);'></sapn></div><br><br><br><br>";
                            echo"<td class='img_spac'></td>";
                            if($i == 3)
                            {
                                echo "</tr>";
                            }
                            echo "</td>";
                    }
                    echo "<a href='message_add.php' class='menu_total hvr-underline-reveal'>菜單送出</a>";
                ?>
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
                        echo "<td width=300px class='hvr-bounce-in'><a href='message1_mem.php?id=$message_Id[$i]'>". $message_Title[$i]."</a></td>";
                        if($message_Name[$i] == 0)
                        {
                            echo "<td width=250px>系統管理員</td>";
                        }
                        else
                        {
                            echo "<td width=250px>".$message_Name_re[$i]."_一般會員</td>";
                        }            
                        echo "<td width=250px>".$message_Date[$i]."</td>";
                        echo "</tr>";
                    }
                ?>          
            </table>
            <a href="message_add_mem.php" class="message_add hvr-underline-reveal">新增主題</a>
        </div>
    </body>
</html>