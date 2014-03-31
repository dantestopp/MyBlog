<?php
$mysqli = new mysqli('localhost','root','','myblog');
if(isset($_GET['page']))
	$page = $_GET['page']*10-10;
else
	$page = 0;
$myArray = array();
	if ($result = $mysqli->query("SELECT id_blogPost, blogTitle, blogText, blogAuthor, blogDate FROM t_blogpost, t_author WHERE t_author.id_author = blog_Author ORDER BY id_blogPost DESC LIMIT $page ,10")) {
		 echo' <div class="container">';
	    while($row = $result->fetch_object()) {
	         
	  

        echo '<div class="row">
            <div class="col-lg-8">

                <!-- the actual blog post: title/author/date/content -->
                <h1>'.$row->blogTitle.'</h1>
                <p class="lead">by <a href="index.php?section=author&id='.$row->blogAuthor.'">'.$row->username.' </a>
                </p>
                <hr>
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on '.$row->blogDate.'</p>
                <hr>
                <p>'.substr($row->blogText,0,200).'</p>

                <hr>
                </div>
                </div>';

	         
	    }
	    echo "</div>";
	}
	else
	{
		echo' <div class="container">

        <div class="row">
            <div class="col-lg-8">
				<h1>No more Posts</h1>
			</div>
		</div>';
	}

$result->close();
$mysqli->close();