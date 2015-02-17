<html>
<?php
$servername = "localhost";
	$username = "phpmyadmin";
	$password = "";
	$dbname = "phpmyadmin";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("you did it wrong");
	}
	$sql = "SELECT * FROM posts ORDER BY date DESC LIMIT 30";
	$results = $conn->query($sql);
	for ($i = 0; $i < $results->num_rows; $i++) {
		$results->data_seek($i);
		$row = $results->fetch_assoc();
		echo "\n<p>";
		$postnum = $results->num_rows - $i;
		echo htmlentities("post $postnum: " . $row['author'] . " at " . $row['date']) . "<br>\n";
		echo htmlentities($row['post']) . "<br>\n";
		echo "</p>\n";
	}
?>
</html>
