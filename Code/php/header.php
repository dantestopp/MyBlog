<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class=" navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
					<li><a class="navbar-brand" href="index.php">Home</a></li>
                    <li><a href="index.php?section=authors">Authors</a>
                    </li>
					<li></li>
                </ul>
                <?php
                    if(isset($_SESSION['userId']))
                    {
                        echo '<div class="navbar-right">
                                        <a href="index.php?section=dashboard"><button type="button" class="btn btn-default navbar-btn ">Dashboard</button></a>
					<a href="index.php?section=logout"><button type="button" class="btn btn-default navbar-btn ">Sign out</button></a>
				</div>';
                    }
                    else
                    {
                        echo '<div class="navbar-right">
					<a href="index.php?section=login"><button type="button" class="btn btn-default navbar-btn ">Sign in</button></a>
				</div>';
                    }
                    ?>
            </div>
        </div>
    </nav>