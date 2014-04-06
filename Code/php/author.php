<?php
$mysqli = new mysqli('localhost','root','','myblog');
$userid = $_GET['id'];
$result = $mysqli->query("SELECT * FROM t_author WHERE id_author = '$userid'");
while($row = $result->fetch_object())
{
    echo $row->username."<br/>";
}