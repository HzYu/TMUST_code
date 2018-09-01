<?php
    require_once("connect.php");//連接資料庫
    $id = $_GET["id"];
    $sql_menu_delete = "DELETE FROM menu WHERE Id = $id";
    @mysqli_query($conn,$sql_menu_delete);
    header("location:root.php"); //連結到root.php
?>