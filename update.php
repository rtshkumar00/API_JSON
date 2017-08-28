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

	$json_url = "https://www.coursera.org/api/courses.v1";
	$json = file_get_contents($json_url);
	$data = json_decode($json, TRUE);
	$i = $_POST['callFunc1'];
	$id = echo $data['elements'][$i]['id'];
	$name = echo $data['elements'][$i]['name'];
	$courseType = echo $data['elements'][$i]['courseType'];
	
	$sql = "INSERT INTO savedCourses (id, name, courseType)
		VALUES ('$id', '$name', '$courseType')";
	mysqli_query($conn, $sql);
	
?>