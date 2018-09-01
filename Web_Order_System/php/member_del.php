<?php
    require_once("connect.php");//連接資料庫
    $id = $_GET["id"];
    $sql_member_delete = "DELETE FROM member WHERE Id = $id";
    @mysqli_query($conn, $sql_member_delete);
    header("location:root.php"); //連結到root.php
?>