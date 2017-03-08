<?php
if(isset($_COOKIE["film"])) { 
	$filmName = $_COOKIE["film"];
	$filmNameFull = "";
	switch ($filmName) {
		case fightclub:
			$filmNameFull = "Fight Club";
			break;
		case mortalkombat:
			$filmNameFull = "Mortal Kombat";
			break;
		case princessbride:
			$filmNameFull = "Prince Bride";
			break;
		case tmnt:
			$filmNameFull = "Teenage Mutant Ninja Turtles";
			break;
		case tmnt2:
			$filmNameFull = "Teenage Mutant Ninja Turtles II";
			break;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Rancid Tomatoes</title>
	</head>
	<body>
	<?php if(isset($filmName)) { ?>
		<p> Welcome back! Would you like to repeat your recent search for <a href="movie.php?film=<?= $filmName ?>" target="_blank"><?= $filmNameFull?></a>?</p> 
	<?php } ?>
		<p> Select a movie </p>
		<form action="movie.php" method="get">
			<select name="film">
				<option value="fightclub"> Fight Club </option>
				<option value="mortalkombat"> Mortal Kombat </option>
				<option value="princessbride"> Princess Bride </option>
				<option value="tmnt"> Teenage Mutant Ninja Turtles </option>
				<option value="tmnt2"> Teenage Mutant Ninja Turtles II</option>
				<input type="submit" value="submit">
			</select>
		</form>
		
	</body>
</html>