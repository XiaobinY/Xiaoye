<!DOCTYPE html>
<html>
	<!--
	Web Programming Step by Step, Homework 2: Movie Review
	SOLUTION, DO NOT DISTRIBUTE!
	-->
	<?php 
		// get movie codename from url
		$movie = $_GET["film"];

		setcookie("film", $movie, time() + 3600);

		// read from movies info.txt file
		// and parse info into name, year and score
		$info = file($movie."/info.txt", FILE_IGNORE_NEW_LINES);
		list($movie_name, $movie_year, $movie_score) = $info;

		// determine tomato logo base on movie score
		if ((int)$movie_score >= 60) {
			$tomato = "freshbig.png";
			$tomato_alt = "Fresh";
		} else {
			$tomato = "rottenbig.png";
			$tomato_alt = "Rotten";
		}

		// read from movie's overview.txt file
		$overview = file($movie."/overview.txt", FILE_IGNORE_NEW_LINES);

		// retrieve all review txt files' name
		// and count the number of reviews
		$review_files = glob($movie."/review*.txt");
		$review_count = count($review_files);

	?>

	<head>
		<title><?php print $movie_name ?> - Rancid Tomatoes</title>

		<link href="movie.css" type="text/css" rel="stylesheet" />
		<link href="rotten.gif" type="image/gif" rel="shortcut icon" />

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

		<h1><?php print $movie_name." (".$movie_year.")" ?></h1>
		
		<div id="overall">
			<div id="generaloverview">
				<img src="<?php print $movie.'/overview.png' ?>" alt="general overview" />

				<dl>
					<?php
						// display overview info
						// split line into title and description
						foreach ($overview as $line) {
							print "<dt>".explode(":", $line)[0]."</dt>";
							print "<dd>".explode(":", $line)[1]."</dd>";
						}
					?>
				</dl>
			</div>

			<div id="reviews">
				<div id="rottenpane">
					<img src="<?php print $tomato ?>" alt="<?php print $tomato_alt ?>" />
					<span class="rating"><?php print $movie_score ?>%</span>
				</div>
				
				<div class="column">
				<?php
					// determine where to start new colume
					$colunm_break_point = floor(($review_count - 1) / 2);
					
					for ($i = 0; $i < $review_count; $i++) {
						// read from review file
						$review = file($review_files[$i], FILE_IGNORE_NEW_LINES);
						// parse review info
						list($review_quote, $review_rate, $reviewer, $reviewer_publication) = $review;
						// determine small tomato logo base on review rate	
						if ($review_rate == "FRESH") {
							$tomato_small = "fresh.gif";
							$tomato_small_alt = "Fresh";	
						} else {
							$tomato_small = "rotten.gif";
							$tomato_small_alt = "Rotten";
						}
						
						// show review
						// include php file to make code cleaner
						include 'critic_review.php';

						// start new colume
						if ($review_count > 1 && $i == $colunm_break_point) {
							print "</div>";
							print '<div class="column">';
						}
					}
				?>	
				</div>
			</div>
			<p id="footer">(1-<?php print $review_count ?>) of <?php print $review_count ?></p>
		</div>

		<div id="w3c">
			<a href="https://webster.cs.washington.edu/validate-html.php"><img src="http://webster.cs.washington.edu/w3c-html.png" alt="Valid HTML5" /></a> <br />
			<a href="https://webster.cs.washington.edu/validate-css.php"><img src="http://webster.cs.washington.edu/w3c-css.png" alt="Valid CSS" /></a>
		</div>
	</body>
</html>
