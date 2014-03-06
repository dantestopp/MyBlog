<?php
echo "[";
for($i = 0; $i< 4 ; $i++)
{
echo "{";
echo '"blogTitle":"'.$i.'",';
echo '"blogText":"Text'.$i.'"';
echo "}";
if($i <3)
	echo ",";
}
echo "]";