<?php
if(isset($_GET['id']))
{
    $mysqli = new mysqli('localhost','root','','myblog');
    $id = $_GET['id'];
    $mysqli->query("UPDATE t_author SET allowed = 1 WHERE id_author = '$id' ");
    header("Location:index.php?section=dashboard");
}