<?php
	$mysqli = new mysqli('localhost','root','','myblog');
	
	if(isset($_POST['blogText'])) {
            $blogText = strip_tags($_POST['blogText']);
            $id = $_GET['id'];
		$mysqli->query("UPDATE t_blogPost SET blogText='".$blogText."' WHERE id_blogPost='".$id."'");
                header("Location: index.php?section=fullPost&id=$id");
	}
	
	 echo '
	  <div class="container">';
		//bearbeiten
		$id = $_GET['postID'];
		
		 $sql = 'SELECT * FROM t_blogpost WHERE id_blogPost = "'.$id.'"';
		 $result = $mysqli->query($sql);
		 $row = $result->fetch_object();
		 
				echo '<div class="row">
				<form action="index.php?section=editPost&id='.$id.'" method="POST">
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