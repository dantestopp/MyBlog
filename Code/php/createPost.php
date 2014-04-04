<?php
	$mysqli = new mysqli('localhost','root','root001','myblog');
	 echo '
	  <div class="container">';
	if(isset($_GET['id'])){
		//bearbeiten
		$id = $_GET['id'];
		
		 $sql = 'SELECT * FROM t_blogpost, t_author WHERE id_blogPost = "'.$id.'" and id_author = blogAuthor';
		 $result = $mysqli->query($sql);
		 $row = $result->fetch_object();
		 
		 
		echo '<div class="row">
				<div class="col-lg-8">
					<!-- the actual blog post: title/author/date/content -->
					<h1>'.$row->blogTitle.'</h1>
					
					<hr>
					<p>
						<span class="glyphicon glyphicon-time"></span> Posted on '.$row->blogDate.'</p>
					<hr>
					<p>'.$row->blogText.'</p>

					<hr>
				</div>
            </div>';
	}
	else{
		echo '<h1>please log in first!</h1>';
	}
	echo '</div>';
?>