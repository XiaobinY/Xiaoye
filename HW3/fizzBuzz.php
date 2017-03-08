<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
for($x = 1; $x <= 50; $x ++) {
	print "<p>";
	if($x % 3 == 0 && $x % 5 == 0) {
		print "FizzBuzz";
	} elseif($x % 3 == 0) {
		print "Fizz";
	} elseif($x % 5 == 0) {
		print "Buzz";
	} else {
		print $x;
	}
	print "<br></p>";
}
?>

</body>
</html>