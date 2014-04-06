<?php
	$mysqli = new mysqli('localhost','root','root001','myblog');
	
	if()
	
	 echo '
	  <div class="container">
		<div class="row">
				<form action="#" method="POST">
				<div class="col-lg-8">
					<!-- the actual blog post: title/author/date/content -->
					<h1>Title</h1>
					<input type="text" size="113" />
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