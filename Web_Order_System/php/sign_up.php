<?php
    require_once("connect.php");
    $conn=@mysqli_connect("localhost","root","123456789","order_system");

    $username = $_REQUEST['Sign_up_username'];
    $password = $_REQUEST['Sign_up_Password'];
    $phone_number = $_REQUEST['Sign_up_Phone'];
    $purview = $_REQUEST['user_purview'];
    //如果text是 NULL 則新增失敗
    if(empty($username) || empty($password) || empty($phone_number))
    {
        echo "<script>"
        ."alert('帳號新增失敗')"
        ."</script>";
        echo "<script type='text/javascript'>";
        echo "window.location.href='../index.html'";
        echo "</script>";
    }
    else
    {
        $sql_insert = "INSERT INTO member (Username,Password,Phone_number,Grade) values ('$username' , '$password' ,'$phone_number' , '$purview')";
        $result = @mysqli_query($conn,$sql_insert);
    }

        echo "<script>"//連結到index.html
        ."alert('帳號新增成功')"
        ."</script>";
        echo "<script type='text/javascript'>"  
        ."window.location.href='../index.html'" 
        ."</script>"; 

     //$sql= "select * from member";
    //$result = @mysqli_query($conn,$sql);

    //$rows = @mysqli_num_rows($result);
    //$cols = @mysqli_num_fields($result);

?>

