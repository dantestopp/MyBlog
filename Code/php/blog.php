<?php
$mysqli = new mysqli('localhost','root','','myblog');
if(isset($_GET['page']))
	$page = $_GET['page']*10-10;
else
{
	$page = 0;
        $_GET['page']=0;
}
$myArray = array();
	if ($result = $mysqli->query("SELECT id_blogPost, blogTitle, blogText, blogAuthor, blogDate, username FROM t_blogpost, t_author WHERE t_author.id_author = blogAuthor ORDER BY id_blogPost DESC LIMIT $page ,10")) {
		 echo' <div class="container">';
		 
		 if(isset($_SESSION['userId'])){
			echo '<a href="index.php?section=newPost" ><button class="btn btn-primary ">new Post</button></a>';
		 }
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
	    $valid = false;
	    echo "</div>";
	    $page += 10;
            echo '<div class="container"><div class="row">';
	    if($_GET['page'] == 0 || $_GET['page'] == 1)
	    {
	    	echo "<a href='index.php?page=2'><span class='glyphicon glyphicon-chevron-right'></span></a>";
	    	$valid = true;
	    }
	    else
		{	
                        $page += 10;
			$result = $mysqli->query("SELECT id_blogPost FROM t_blogpost ORDER BY id_blogPost DESC LIMIT  $page,10");
                        if($result->num_rows > 0)
			{
                               	$temp_page = $_GET['page']-1;
				echo "<a href='index.php?page=".$temp_page."'><span class='glyphicon glyphicon-chevron-left'></span></a>";
				$valid = true;
			}
			
		}
		if(!$valid)
		{
			$temp_page = $_GET['page']-1;
			echo "<a href='index.php?page=".$temp_page."'><span class='glyphicon glyphicon-chevron-left'></span></a>";
			$temp_page+= 2;
			echo "<a href='index.php?page=".$temp_page."'><span class='glyphicon glyphicon-chevron-right'></span></a>";
		}
                echo "</div></div>";
	}
	else
	{
		echo' <div class="container">

        <div class="row">
            <div class="col-lg-8">
				<h1>No more Posts</h1>
			</div>
		</div>';
	}
echo "<div style='min-height:20px'></div>";
$result->close();
$mysqli->close();