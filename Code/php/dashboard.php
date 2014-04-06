<div class="container">
    <?php
        $mysqli = new mysqli('localhost','root','','myblog');
        $result = $mysqli->query("SELECT COUNT(id_blogPost)as zahl, COUNT(DISTINCT blogAuthor) as zahlAuthor FROM t_blogpost");
        $row = $result->fetch_object();
        echo $row->zahl." Posts from ".$row->zahlAuthor." Author(s).";
        ?>
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
								<td><a href="index.php?section=allow&id='.$row->id_author.'">X</a></td>
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
                                                        <td>'.$row->username.'</td>
                                                        <td><a href="index.php?section=allow&id='.$row->id_author.'">X</a></td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>