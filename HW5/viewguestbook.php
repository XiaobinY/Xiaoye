<!DOCTYPE html>
<html>
	<head>
		<title>Guest Book System</title>

		<link href="guestbook.png" type="image/png" rel="shortcut icon" />

		<meta charset="utf-8" />
		<meta name="author" content="Xiaoye" />
		<meta name="description"
		 content="Homework assignment focusing on php and database" />
		<meta name="keywords" content="web programming, php, database" />
	</head>

	<body>

	<?php
		// Create connection
		$conn = new mysqli("192.168.0.3", "scu", "scu", "scu");
		// Check connection
		if ($conn->connect_error) {
		     die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT name, email, comment FROM guest_book";
		$result = $conn->query($sql);

		$conn->close();
	?>  

	<table border="1px">
		<tbody>
			<?php while($row = $result->fetch_assoc()) {
		         print "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["comment"]."</td></tr>";
		     } ?>
	     </tbody>
	</table>
	</body>
</html>
