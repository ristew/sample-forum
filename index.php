<!DOCTYPE html>
<html>
<head>
<script>
	function getPosts() {
		http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			document.getElementById("postarea").innerHTML = http.responseText;
		}
		http.open("GET", "getposts.php", true);
		http.send();
	}
	function updatePosts() {
		getPosts()
		setTimeout(updatePosts, 5000);
	}
</script>
</head>
<title>nuggle forums</title>
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
	.textwidth	{
				width:98%;
				margin-bottom:5px;
				margin-right:3px;
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
				padding:10px;
				border:1px solid grey;
			}
</style>
<?php
	echo "<div class='page'>\n";
	echo "<h1>nuggler forums</h1>\n";
	echo <<<_END
	<form method='post' action = 'post.php' enctype = 'multipart/form-data'>
		<input class='textwidth' type='text' name='uname' size='16' placeholder='  name'>
		<br>
		<textarea class='textwidth' name='upost' rows='2' wrap='off' placeholder=' post'></textarea>
		<br>
		<input type='submit' value='submit'>
	</form>
_END;
	echo "<div class='posts' id='postarea'>\n";
	echo "</div>\n";
	echo "</div>\n";

?>
<script>
	updatePosts()
</script>
</html>
