<?php
$error = false;
$mysqli = new mysqli('localhost','root','','myblog');
if(isset($_POST['username'])&&isset($_POST['password']))
{
    if(isset($_POST['register']))
    {
        $username = $_POST['username'];
        $password = hash("sha256",$_POST['password']);
        $result = $mysqli->query("SELECT * FROM t_author WHERE username = '$username'");
        if($result->num_rows>0)
        {
            $error = true;
        }  
        else
        {
            $mysqli->query("INSERT INTO t_author(username, password) VALUES ('$username','$password')");
            header("Location: index.php?section=login");
        }
            
    }
    else
    {
    $username = $_POST['username'];
    $password = hash("sha256",$_POST['password']);
    $result = $mysqli->query("SELECT * FROM t_author WHERE username = '$username' AND password = '$password' AND allowed = 1");
    if($result->num_rows>0)
    {    
    $row = $result->fetch_object();
    $_SESSION['userId'] = $row->id_author;
    header("Location:index.php?section=dashboard");
        }
    else
        $error = true;
            
    }
}


if($error)
{
    echo '<div class="alert alert-danger">Something went wrong</div>';
}
?>
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form method="POST" action="index.php?section=login<?php if(isset($_GET['register'])){echo '&register=1';}?>">
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input name="username" id="username" class="form-control input-lg" placeholder="Username">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
                                <?php if(isset($_GET['register'])){echo '<input type="hidden" name="register">';}?>
				<hr class="colorgraph">
				<div class="row">
                                    <?php if(isset($_GET['register'])){echo '<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Register">
                                        </div>';}else{echo'<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="index.php?section=login&register=1" class="btn btn-lg btn-primary btn-block">Register</a>
					</div>';}?>
					
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>