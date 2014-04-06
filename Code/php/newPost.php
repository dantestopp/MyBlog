<?php
		$mysqli = new mysqli('localhost','root','','myblog');
		
		if(isset($_POST['blogText']) && isset($_POST['blogTitle']))
        {
			$text = $_POST['blogText'];
			$title = $_POST['blogTitle'];
			$author = $_SESSION['userId'];
			
            $mysqli->query("INSERT INTO t_blogPost(blogTitle, blogText, blogAuthor) VALUES ('$title', '$text', '$author')");
            header("Location:index.php?section=fullPost&id=$mysqli->insert_id");
        }
		
	
		 echo '
		  <div class="container">
			<div class="row">
					<form action="index.php?section=newPost" method="POST">
					<div class="col-lg-8">
						<h1>Title</h1>
						<input name="blogTitle" type="text" size="113" />
						<hr>
						<h1>Text</h1>
							<textarea name="blogText" style="resize: none;" class="form-control" rows="10"></textarea>
						<hr>
						    <button type="Submit" class="btn btn-primary ">create</button>
					</div>
					</form>
	            </div>
			</div>';
	?>
