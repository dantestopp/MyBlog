<?php
	$mysqli = new mysqli('localhost','root','','myblog');
	
	if(isset($_POST['blogText']) && isset($_POST['blogTitle'])){
		 $sql = 'INSERT INTO `myblog`.`t_blogpost` (`id_blogPost`, `blogTitle`, `blogText`, `blogAuthor`, `blogDate`) VALUES (NULL, '$_POST["blogTitle"]', '$_POST["blogText"]', '$_SESSION[["userId"]', CURRENT_TIMESTAMP)';
	}
	
	 echo '
	  <div class="container">
		<div class="row">
				<form action="#" method="POST">
				<div class="col-lg-8">
					<!-- the actual blog post: title/author/date/content -->
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