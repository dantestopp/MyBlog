<?php
$mysqli = new mysqli('localhost','root','','myblog');
echo '<div class="container">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Username</th>
                      <th>Posts</th>                                          
                  </tr>
              </thead> 
        <tbody>';
$sql = "SELECT t_author.*, COUNT(id_blogPost) as zahl FROM t_author,t_blogpost WHERE allowed = 1 AND blogAuthor = id_author";
$result = $mysqli->query($sql);
while($row = $result->fetch_object())
{
echo '            <tr>
                    <td><a href="index.php?section=author&id='.$row->id_author.'">'.$row->username.'</a></td>
                    <td>'.$row->zahl.'</td>
                    </td>                                       
                </tr>';       
}
        
       echo ' </tbody>
            </table>
            </div>
	</div>
</div>';