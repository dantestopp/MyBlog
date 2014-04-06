<?php
	$mysqli = new mysqli('localhost','root','root001','myblog');
	
	if(isset($_POST['blogText'])) {
		mysql_query("UPDATE t_blogPost SET blogText='".$_POST['blogText']."' WHERE id_blogPost='".$_GET['id']."'");
	}
	
	 echo '
	  <div class="container">';
		//bearbeiten
		$id = $_GET['id'];
		
		 $sql = 'SELECT * FROM t_blogpost, t_author WHERE id_blogPost = "'.$id.'" and id_author = blogAuthor';
		 $result = $mysqli->query($sql);
		 $row = $result->fetch_object();
		 
				echo '<div class="row">
				<form action="#&?id='.$_GET['id'].'" method="POST">
				<div class="col-lg-8">
					<!-- the actual blog post: title/author/date/content -->
					<h1>'.$row->blogTitle.'</h1>
						
					<hr>
					<p>
						<span class="glyphicon glyphicon-time"></span> Posted on '.$row->blogDate.'</p>
					<hr>
						<textarea name="blogText" style="resize: none;" class="form-control" rows="10">'.$row->blogText.'</textarea>
					<hr>
					    <button type="Submit" class="btn btn-primary ">Update</button>
				</div>
				</form>
            </div>';
?>