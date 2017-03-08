<?php
$movie = $_REQUEST["film"];

$info = file("$movie/info.txt", FILE_IGNORE_NEW_LINES);
list($movieName, $movieYear, $movieRate) = $info;
if((int)$movieRate >= 60) {
	$tomato = "fresh";
} else {
	$tomato = "rotten";
}

$overviews = file("$movie/overview.txt", FILE_IGNORE_NEW_LINES);

$reviews = glob("$movie/review*.txt");
$reviewNum = count($reviews);

?>

<!DOCTYPE html>
<html>
	<!--
	Web Programming Step by Step, Homework 2: Movie Review
	SOLUTION, DO NOT DISTRIBUTE!
	-->
	<head>
		<title><?= $movieName?> - Rancid Tomatoes</title>

		<link href="movie.css" type="text/css" rel="stylesheet" />
		<link href="<?= $tomato ?>.gif" type="image/gif" rel="shortcut icon" />

		<!-- not-required feature: meta tags -->
		<meta charset="utf-8" />
		<meta name="author" content="Marty Stepp" />
		<meta name="description"
		 content="Homework assignment focusing on Cascading Style Sheets for layout." />
		<meta name="keywords" content="web programming, html, css" />
	</head>

	<body>
		<div id="topbanner">
			<img src="banner.png" alt="Rancid Tomatoes" />
		</div>

		<h1><?= $movieName ?> (<?= $movieYear?>)</h1>
		
		<div id="overall">
			<div id="generaloverview">
				<img src="<?= $movie?>/overview.png" alt="general overview" />
			
				<dl>
				<?php
				foreach($overviews as $overview) {
					list($term, $desc) = explode(":", $overview);
					print "<dt>$term</dt>";
					print "<dd>$desc</dd>";
				}
				?>
				</dl>
			</div>

			<div id="reviews">
				<div id="rottenpane">
					<img src="<?= $tomato ?>big.png" alt="Rotten" />
					<span class="rating"><?= $movieRate ?>%</span>
				</div>
				
				<div class="column">
				<?php
				$newColumnPoint = (int)(($reviewNum - 1) / 2);
				for($i = 0; $i < $reviewNum; $i++) {
					list($reviewQuo, $reviewRate, $reviewer, $reviewPub) = file($reviews[$i]);
				?>
					<div class="review">
						<p class="quotebubble">
							<img src="<?= strtolower($reviewRate) ?>.gif" alt="<?= $reviewRate ?>" />
							<q><?= $reviewQuo ?></q>
						</p>

						<p>
							<img src="critic.gif" alt="Critic" />
							<?= $reviewer ?><br />
							<span class="publication"><?= $reviewPub ?></span>
						</p>
					</div>
				<?php
					if($i == $newColumnPoint) {
						print "</div>";
						print '<div class = "column">';
					}
				}
				?>
				</div>
			</div>

			<p id="footer">(1-<?= $reviewNum ?>) of <?= $reviewNum ?></p>
		</div>

		<div id="w3c">
			<a href="https://webster.cs.washington.edu/validate-html.php"><img src="http://webster.cs.washington.edu/w3c-html.png" alt="Valid HTML5" /></a> <br />
			<a href="https://webster.cs.washington.edu/validate-css.php"><img src="http://webster.cs.washington.edu/w3c-css.png" alt="Valid CSS" /></a>
		</div>
	</body>
</html>
