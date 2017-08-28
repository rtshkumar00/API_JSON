<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "courses";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM savedCourses";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "Id" . $row["id"]. "  Name" . $row["name"]. " Course Type" . $row["courseType"]. "<br>";
		}
	} else {
		echo "0 results";
	}
?>