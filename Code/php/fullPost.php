<?php 
	$mysqli = new mysqli('localhost','root','','myblog');
	
	$id = $_GET['id'];
	 $sql = 'SELECT * FROM t_blogpost, t_author WHERE id_blogPost = "'.$id.'" and id_author = blogAuthor';
	 $result = $mysqli->query($sql);
	 $row = $result->fetch_object();
	  echo '
	  <div class="container">
		<div class="row">
				<div class="col-lg-8">
					<!-- the actual blog post: title/author/date/content -->
					<h1>'.$row->blogTitle.'</h1>
					<p class="lead">by <a href="index.php?section=author&id='.$row->blogAuthor.'">'.$row->username.' </a>
					</p>
					<hr>
					<p>
						<span class="glyphicon glyphicon-time"></span> Posted on '.$row->blogDate.'</p>
					<hr>
					<p>'.$row->blogText.'</p>

					<hr>';
					 if(isset($_SESSION['userId'])){
						echo '<a href="index.php?section=editPost&postID='.$row->id_blogPost.'" ><button class="btn btn-primary ">edit</button></a>';
					 }
				echo'</div>
            </div></div>';
