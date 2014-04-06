<?php
		$mysqli = new mysqli('localhost','root','','myblog');
		
	if(isset($_POST['blogText']) && isset($_POST['blogTitle'])){
			$text = $_POST['blogText'];
			$title = $_POST['blogTitle'];
			$author = $_SESSION['userId'];
			 $sql = 'INSERT INTO `myblog`.`t_blogpost` (`id_blogPost`, `blogTitle`, `blogText`, `blogAuthor`, `blogDate`) VALUES (NULL, '$title', '$text', '$user', CURRENT_TIMESTAMP)';
			$eintrag = $db->prepare( $sql );
	        $eintrag->bind_param( $title, $tezt, $author );
	        $eintrag->execute();
			// Pruefen ob der Eintrag efolgreich war
	        if ($eintrag->affected_rows == 1)
	        {
	            echo 'Der neue Eintrage wurde hinzugef&uuml;gt.';
	        }
	        else
	        {
	            echo 'Der Eintrag konnte nicht hinzugef&uuml;gt werden.';
	        }
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
