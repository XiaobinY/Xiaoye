<?php
	$name = $email = $comment = "default";
	$nameErr = $emailErr = $commentErr = "";
	$validInput = True;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
	    	$nameErr = "* Name is required";
	    	$validInput = False;
	 	} else {
	    	$name = trim($_POST["name"]);
	  	}
		
		if (empty($_POST["email"])) {
			$emailErr = "* Email is required";
			$validInput = False;
		} else {
			$email = trim($_POST["email"]);
		}

		if (empty($_POST["comment"])) {
			$commentErr = "* Comment is required";
			$validInput = False;
		} else {
			$comment = trim($_POST["comment"]);
		}

		if ($validInput) {
			$conn = new mysqli("192.168.0.3", "scu", "scu", "scu");
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "INSERT INTO guest_book (name, email, comment) VALUES ('".$name."', '".$email."', '".$comment."')";
			
			if ($conn->query($sql) === TRUE) {
				$message = "New record inserted successfully";
			} else {
				$message = "Error: ".$sql."<br>".$conn->error;
			}

			print "<script>console.log( 'Debug Objects: ".$message."' );</script>";

			$conn->close();	
		}


	}

?>


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

		<style>
			h1   {margin-top: 15px; margin-bottom: 15px}
			form {margin-top: 15px; margin-bottom: 15px}
			.error {color: red}
			#viewbook {margin-top: 20px}
		</style>
	</head>

	<body>
		<h1> Guestbook </h1>

		<form action="guestbook.php" method="post">
			Name: <input type="text" name="name"> 
			<span class="error"><?php print $nameErr ?></span> 
			<br><br>
			Email: <input type="email" name="email"> 
			<span class="error"><?php print $emailErr ?></span>
			<br><br>
			Comment: <input type="text" name="comment">
			<span class="error"><?php print $commentErr ?></span>
			<br><br>
			<input type="submit">
		</form>
		<a id="viewbook" href="viewguestbook.php"> View Guestbook</a>

	</body>
</html>




