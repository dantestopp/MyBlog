<?php
require "db.php";
session_start();
if(isset($_SESSION['user']))
{
	echo '{"success": "false", "exception":"allready loged in"}';
}
else
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = hash("sha256",mysql_real_escape_string($_POST['password']));
		$sql ="SELECT id_author, username,password FROM t_user WHERE username = '$username' AND password = '$password'";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0)
		{
			$row = $result->fetch_object();
			echo '{"success":"true"}';
			$_SESSION['user'] = $row->id_author;
		}
		else
			echo '{"success":"false","exception":"Something went wrong"}';

	}
	else
		echo '{"success":"false","exception":"Something went wrong"}';
}