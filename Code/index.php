<?php
	session_start();
	?>
<html>
<head>
	<title>My Blog</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="CSS/myBlog.css">
        <script src="JS/myBlog.js"></script>
</head>
<body>
	<?php
		include "php/header.php";
		echo "<div style='min-height:100px'></div>";
		if(isset($_GET['section']))
			if(file_exists("php/".$_GET['section'].".php"))
				include "php/".$_GET['section'].".php";
			else
				include "php/blog.php";
		else
			include "php/blog.php";
		include "php/footer.php";
?>
</body>
</html>