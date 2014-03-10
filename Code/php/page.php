<?php
$page = $_GET['page']*10-10;
$mysqli = new mysqli('localhost','root','','myblog');
$myArray = array();
	if ($result = $mysqli->query("SELECT id_blogPost, blogTitle, blogText, blogAuthor, blogDate FROM t_blogpost ORDER BY id_blogPost DESC LIMIT $page ,10")) {

	    while($row = $result->fetch_array(MYSQL_ASSOC)) {
	            $myArray[] = $row;
	    }
	    echo json_encode($myArray);
	}

$result->close();
$mysqli->close();