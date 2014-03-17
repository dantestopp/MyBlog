<?php
require "db.php";
$id = $_GET['id'];
$myArray = array();
	if ($result = $mysqli->query("SELECT id_blogPost, blogTitle, blogText, blogAuthor, blogDate FROM t_blogpost WHERE id_blogPost = $id")) {

	    while($row = $result->fetch_array(MYSQL_ASSOC)) {
	            $myArray[] = $row;
	    }
	    echo json_encode($myArray);
	}

$result->close();
$mysqli->close();