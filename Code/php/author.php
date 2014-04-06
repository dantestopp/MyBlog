<?php
echo' <div class="container">';
$mysqli = new mysqli('localhost','root','','myblog');
$userid = $_GET['id'];
$result = $mysqli->query("SELECT * FROM t_author WHERE id_author = '$userid'");
$row = $result->fetch_object();
    echo "<h1>".$row->username."</h1>";
$rand1 = rand(10,100);
$rand2 = rand(10,100);
$rand3 = rand(10,100);
$rand4 = rand(10,100);
$rand5 = rand(10,100);

echo '
	<div class="row">                   
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="'.$rand1.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$rand1.'%;">
                <span class="sr-only">'.$rand1.'% Complete</span>
            </div>
            <span class="progress-type">HTML / HTML5</span>
            <span class="progress-completed">'.$rand1.'%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$rand2.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$rand2.'%">
                <span class="sr-only">'.$rand2.'% Complete (success)</span>
            </div>
            <span class="progress-type">ASP.Net</span>
            <span class="progress-completed">'.$rand2.'%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$rand3.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$rand3.'%">
                <span class="sr-only">'.$rand3.'% Complete (info)</span>
            </div>
            <span class="progress-type">Java</span>
            <span class="progress-completed">'.$rand3.'%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="'.$rand4.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$rand4.'%">
                <span class="sr-only">'.$rand4.'% Complete (warning)</span>
            </div>
            <span class="progress-type">JavaScript / jQuery</span>
            <span class="progress-completed">'.$rand4.'%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$rand5.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$rand5.'%">
                <span class="sr-only">'.$rand5.'% Complete (danger)</span>
            </div>
            <span class="progress-type">CSS / CSS3</span>
            <span class="progress-completed">'.$rand5.'%</span>
        </div>
	</div>
';
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