<?php
echo' <div class="container">';
$mysqli = new mysqli('localhost','root','','myblog');
$userid = $_GET['id'];
$result = $mysqli->query("SELECT * FROM t_author WHERE id_author = '$userid'");
while($row = $result->fetch_object())
{
    echo "<h1>".$row->username."</h1>";
}
if ($result = $mysqli->query("SELECT id_blogPost, blogTitle, blogText, blogAuthor, blogDate, username FROM t_blogpost, t_author WHERE t_author.id_author = blogAuthor AND id_author = '$userid' ORDER BY id_blogPost DESC")) {
		 
	    while($row = $result->fetch_object()) {
	         
	  

        echo '<div class="row">
            <div class="col-lg-8">

                <!-- the actual blog post: title/author/date/content -->
               	<h1><a href="index.php?section=fullpost&id='.$row->id_blogPost.'">'.$row->blogTitle.'</a></h1>
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
}
echo "</div>";