<?php 
$json_url = "https://www.coursera.org/api/courses.v1";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
echo "<a href=\"savedcourses.php\">Click to see saved courses</a>";
echo "<table>";
echo "<tr><th>Course Id</th><th>Course Name</th><th>Course Type</th><th>Click to Save</th></tr>";
for($i=0;$i<count($data['elements']);$i++){
	echo "<tr>";
	print_r("<td>".$data['elements'][$i]['id']."</td>");
	print_r("<td>".$data['elements'][$i]['name']."</td>");
	print_r("<td>".$data['elements'][$i]['courseType']."</td>");
	print_r("<td><button type=\"button\" value=\"$i\" onclick=\"abc()\">Save</button></td>");
	echo "</tr>";
}
echo "</table>";
?>
<html>
	<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script>
			
			$("button").click(function() {
				var fired_button = $(this).val();				
				$.ajax({
				url: 'update.php',
				type: 'post',
				data: { "callFunc1": fired_button},
				success: function(response) { alert(response); }
				});					
			});
		</script>
	</head>
</html>