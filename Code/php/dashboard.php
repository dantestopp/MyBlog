<?php
if(!isset($_SESSION['userId']))
    header("Location:index.php");
?>
<div class="container">
        <?php
        $mysqli = new mysqli('localhost','root','','myblog');
        $result = $mysqli->query("SELECT COUNT(id_blogPost)as zahl, COUNT(DISTINCT blogAuthor) as zahlAuthor FROM t_blogpost");
        $row = $result->fetch_object();
        echo "<h1>".$row->zahl." Posts from ".$row->zahlAuthor." Author(s)</h1>";
        ?>
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Stats</th>
                      <th>Amount</th>                                          
                  </tr>
              </thead> 
                <tbody>

                        <tr>
                            <td>Views</td>
                            <td><span class="glyphicon glyphicon-eye-open"></span> 20'025</td>
                            </td>                                       
                        </tr> 
                        <tr>
                            <td>Shared</td>
                            <td><span class='glyphicon glyphicon-bullhorn'></span> 1'231 </td>
                            </td>                                       
                        </tr>
                        <tr>
                            <td>Favorites</td>
                            <td><span class="glyphicon glyphicon-star"></span> 3'456</td>
                        </tr>
                        <tr>
                            <td>Subscriber</td>
                            <td><span class='glyphicon glyphicon-tags'></span> 256 </td>
                            </td>                                       
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td><span class='glyphicon glyphicon-thumbs-up'></span> 565 </td>
                            </td>                                       
                        </tr>
                        <tr>
                            <td>Google+</td>
                            <td><span class="glyphicon glyphicon-plus"></span> 0</td>
                            </td>                                       
                        </tr>
                        <tr>
                            <td>Donated</td>
                            <td><span class="glyphicon glyphicon-usd"></span> 210</td>
                        </tr>
              </tbody>
            </table>
            </div>
	</div>
    

    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Pending Authors</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Allow</th>
                                                                <th>Delete</th>
							</tr>
						</thead>
						<tbody>
                                                    <?php
                                                    $mysqli = new mysqli('localhost','root','','myblog');
                                                    $result = $mysqli->query("SELECT * FROM t_author WHERE allowed = 0");
                                                    while($row = $result->fetch_object())
                                                    {
                                                       echo '
                                                    
							<tr>
								<td>'.$row->id_author.'</td>
								<td>'.$row->username.'</td>
								<td><a href="index.php?section=allow&id='.$row->id_author.'"><span class="glyphicon glyphicon-ok"></span></a></td>
                                                                <td><a href="index.php?section=deleteAuthor&id='.$row->id_author.'"><span class="glyphicon glyphicon-remove"></span></a></td>   
							</tr>';
                                                    }
                                                    ?>
						</tbody>
					</table>
				</div>
			</div>
        </div>
        <div class="row">
                <div class="col-md-6">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <h3 class="panel-title">Authors</h3>
                                        <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                        <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                        </div>
                                </div>
                                <div class="panel-body">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                                </div>
                                <table class="table table-hover" id="dev-table">
                                        <thead>
                                                <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>Delete</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $mysqli = new mysqli('localhost','root','','myblog');
                                            $result = $mysqli->query("SELECT * FROM t_author WHERE allowed = 1");
                                            while($row = $result->fetch_object())
                                            {
                                               echo '

                                                <tr>
                                                        <td>'.$row->id_author.'</td>
                                                        <td><a href="index.php?section=author&id='.$row->id_author.'">'.$row->username.'</a></td>
                                                        <td><a href="index.php?section=deleteAuthor&id='.$row->id_author.'"><span class="glyphicon glyphicon-remove"></span></a></td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>