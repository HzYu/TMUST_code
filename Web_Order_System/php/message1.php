<?php
    require_once("connect.php");//連接資料庫

    //連接 message 資料表
    $sql= "select * from message";
    $result = @mysqli_query($conn,$sql);

    $rows =@mysqli_num_rows($result); //(4)列
    $no = $_GET["id"]; //取的網址的編號
    $sql_select = "SELECT `Id`, `Title`, `Content`, `Name`, `Date` FROM `message` WHERE `Id`= $no";
    $result = @mysqli_query($conn,$sql_select);

    //把資料庫裡的資料存進變數裡
    while($row=mysqli_fetch_assoc($result)) 
    {
        $Id = $row["Id"];
        $Title = $row["Title"];
        $Content = $row["Content"];
        $Name = $row["Name"];
        $Date = $row["Date"];
    }


    //連接 message_member 資料表
    $sql= "select * from message_member";
    $result = @mysqli_query($conn,$sql);
    $member_rows =@mysqli_num_rows($result); //(1)列
    $no = $_GET["id"]; //取的網址的編號

    $sql_select = "SELECT `Id`, `Title`, `Content`, `Name`, `Date`, `Message_name` FROM `message_member` WHERE `Title` = '$Title'";
    $result = @mysqli_query($conn,$sql_select);
    $member_count=0;
    while($row=mysqli_fetch_assoc($result))  //存到陣列裡
    {
        $member_count++;
        $member_Id[$member_count] = $row["Id"];
        $member_Title[$member_count] = $row["Title"];
        $member_Content[$member_count] = $row["Content"];
        $member_Name[$member_count] = $row["Name"];
        $member_Date[$member_count] = $row["Date"];
    }

    //連接 message_re 資料表
    $sql_select = "SELECT `Id`, `Title`, `Content`, `Name`, `Date`, `Message_name` FROM `message_re` WHERE `Title` = '$Title'";
    $result = @mysqli_query($conn,$sql_select );
    $message_re_rows =@mysqli_num_rows($result); //(1)列

    $message_re_count=0;
    while($row=mysqli_fetch_assoc($result))  //存到陣列裡
    {
        $message_re_count++;
        $message_re_Id[$message_re_count] = $row["Id"];
        $message_re_Title[$message_re_count] = $row["Title"];
        $message_re_Content[$message_re_count] = $row["Content"];
        $message_re_Name[$message_re_count] = $row["Name"];
        $message_re_Date[$message_re_count] = $row["Date"];
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="../css/message1.css" rel="stylesheet" type="text/css">
        <link href="../css/Hover_css.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    </head>
    <body>
        <div class="message_theme">
            <div class="message_title">
                <span class="message_title1">
                    編號 <?php echo $Id ?>
                </span>              
                <span class="message_title2">主題 Theme</span>             
                <span class="message_title3"><?php echo $Title ?></span>
            </div>

            <span class="message_name">發佈人：</span>
            <span class="message_name1">系統管理人</span>

            <a href="root.php" style="text-decoration: none;"><span  class="message_return hvr-underline-reveal">返回</a></span>
            <?php
            echo "<a href='message_del.php?id=$no' style='text-decoration: none;'><span  class='message_del hvr-underline-reveal'>刪除主題</a></span>"
            ?>
            <table border="0" class="message_box1">
                <tr align=center class="message_main_item">
                    <td width=300px>系統管理員</td>
                </tr>

                <tr align=center class="message_item1">
                    <td width=300px><?php echo $Content ?></td>
                </tr>
                <tr align=center class="message_item2">
                    <td width=300px><?php echo $Date?></td>
                </tr>
                <tr height=30px></tr>

                <?php      
                    for($i=1 ; $i<=$message_re_rows  ; $i++)
                    {
                        echo "<tr align=center class='message_item1'>";
                        echo "<td width='250px'>". @$message_re_Content[$i] ."</td>";
                        echo "</tr>";

                        echo "<tr align=center class='message_item2'>";
                        echo "<td width=300px>". @$message_re_Date[$i]."</td>";
                        echo "</tr>";
                        echo "<tr height=30px></tr>";
                    }
                ?>
            </table>

            <table border="0" class="message_box2">
                <tr align=center class="message_main_item">
                    <td width=300px>一般會員</td>
                </tr>

                <?php 
                $count=0;
                for($i=1 ; $i<$member_rows ;$i++)
                {         
                    if(@$member_Content[$i] != NULL)
                    {
                        $count++;
                        echo "<tr align=center class='message_item1 hvr-bubble-left'>";
                        echo "<td width='250px'>". @$member_Content[$i] ."</td>";
                        if($count !=  $message_re_rows+1)
                        {
                            echo " <td class='message_member_Re'  style='text-decoration:line-through;'>  Re </td> ";
                        }
                        else
                        {
                            echo " <td class='message_member_Re'> <a href='message_re.php?Id=$Id'> Re </a> </td> ";
                        }
                        

                        echo "</tr>";

                        echo "<tr align=center class='message_item2'>";
                        echo "<td width=300px >". @$member_Date[$i]."</td>";
                        echo "</tr>";
                        echo "<tr height=30px></tr>";
                    }
                }
                ?>

            </table>
        </div>

    </body>
</html>