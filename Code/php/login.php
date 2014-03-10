<?php
session_start();
if(isset($_SESSION['user']))
{
	return "[{'success': 'false', 'exception':'allready loged in'}]";
}
else
{
	if(isset($_POST['username'])&& isset($_POST['password']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = hash("sha256",mysql_real_escape_string($_POST['password']));
		return true;
	}
	else
		return "[{'success':'false','exception':'Something went wrong'}]";
}