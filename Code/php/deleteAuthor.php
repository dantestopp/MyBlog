<?php
	$mysqli = new mysqli('localhost','root','','myblog');
        $id = $_GET['id'];
        $mysqli->query("DELETE FROM t_author WHERE id_author = '$id'");
        header("Location: index.php?section=dashboard");