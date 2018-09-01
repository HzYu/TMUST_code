<?php
    require_once("connect.php");//連接資料庫
    $id = $_GET["id"];
    $sql_message_delete = "DELETE FROM message WHERE Id = $id";
    @mysqli_query($conn,$sql_message_delete);
    header("location:root.php"); //連結到root.php
?>