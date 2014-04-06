<?php
$mysqli = new mysqli('localhost','root','','myblog');
$result = $mysqli->query("SELECT * FROM t_author WHERE allowed = 1");
while($row = $result->fetch_object())
{
    echo $row->username."<br/>";
}