<?php
    session_start();
    require_once("connect.php");
    $conn=@mysqli_connect("localhost","root","123456789","order_system");

    $username = $_REQUEST['join_Admin'];
    $password = $_REQUEST['join_Password'];
    $phone_number = $_REQUEST['join_Phone'];
    $_SESSION['username'] = $username;

    $sql= "select * from member";
    $result = @mysqli_query($conn,$sql);

    //$cols = @mysqli_num_fields($result);//5
    $rows =@mysqli_num_rows($result);
    $c=0; //計數
    //echo $rows;
    
    //判斷登入的帳號密碼是否和資料庫的帳密是符合的 並記錄他是什麼等級(Grade)
    while($row=mysqli_fetch_assoc($result))
    {
        $c++;
        if($row["Username"] === $username && $row["Password"] === $password)
        {
            
            //儲存他是甚麼權限
            $Grade = $row["Grade"];
            //如果等級為0 則到管理員介面
            if($Grade == 0)
            {        
                echo "<script type='text/javascript'>"  
                ."window.location.href='root.php'" 
                ."</script>";
                break;
            }
            //如果等級為1 則到會員介面
            else if($Grade == 1)
            {
                
                echo "<script type='text/javascript'>"  
                ."window.location.href='member.php'" 
                ."</script>"; 
                
                break;
            }
        }
        
        else if($c == $rows)
        {
            echo "<script>"//連結到index.html
            ."alert('帳號登入失敗')"
            ."</script>";
            echo "<script type='text/javascript'>"  
            ."window.location.href='../index.html'" 
            ."</script>"; 
            break;
        }
    }
?>
