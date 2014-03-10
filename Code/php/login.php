<?php
session_start();
unset($_SESSION['user']);
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
		echo '{"success":"true"}';
	}
	else
		echo '{"success":"false","exception":"Something went wrong"}';
}