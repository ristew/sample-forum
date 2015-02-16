<!DOCTYPE html>
<html>
<title>forums</title>
<style>
	html 	{	
				background-color:#ccffff;
				color:#502000;
			}
	h1		{
				text-align:center;
	}
	.page   {
				margin-left:25%;
				margin-right:25%;	
			}
	.posts	{
				margin-top:10px;
				padding:10px;
				border:1px solid grey;
			}
	input	{
				width:100%;
			}
	textarea{
				width:100%;
			}
	p		{
				background-color:#d8ffff;
				margin-top:5px;
				padding:5px;
				border:1px solid grey;
				font-family:"monospace";
				font-size:14px;
				word-wrap:break-word;
	}
	form	{
				padding:5px;
				border:1px solid grey;
			}
</style>
<?php
	$servername = "localhost";
	$username = "phpmyadmin";
	$password = "";
	$dbname = "phpmyadmin";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("you did it wrong");
	}
	echo "<div class='page'>\n";
	echo "<h1>forums</h1>\n";
	echo <<<_END
	<form method='post' action = 'post.php' enctype = 'multipart/form-data'>
		<input type='text' name='uname' size='16' placeholder='name'>
		<br>
		<textarea name='upost' cols='48' rows='2' wrap='off' placeholder='post'></textarea>
		<br>
		<input type='submit' value='submit'>
	</form>
_END;
	echo "<div class='posts'>\n";
	$sql = "SELECT * FROM posts ORDER BY date DESC LIMIT 30";
	$results = $conn->query($sql);
	for ($i = 0; $i < $results->num_rows; $i++) {
		$results->data_seek($i);
		$row = $results->fetch_assoc();
		echo "\n<p>";
		$postnum = $results->num_rows - $i;
		echo htmlentities("post $postnum: " . $row['author'] . " at " . $row['date']) . "<br>\n";
		echo htmlentities($row['post']) . "<br>";
		echo "</p>\n";
	}
	echo "</div>\n";
	echo "</div>\n";

?>
</html>
