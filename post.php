<?php
	$conn = new mysqli("localhost", "phpmyadmin", "", "phpmyadmin");
	if ($_POST) {
		extract($_POST);	
		$upost = $conn->real_escape_string($upost);
		$uname = $conn->real_escape_string($uname);
		if ($uname == "")
			$uname = "anonymous";
		$sql = "insert into posts(post, author) values ('$upost', '$uname')";
		$conn->query($sql);
		header( 'Location: index.php');	
	}
